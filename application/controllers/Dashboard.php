<?php
/**
 * ScholaCBT - Dashboard Controller
 * De-obfuscated and Updated by Antigravity
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->load->model('Master_model', 'master');
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->model('Log_model', 'logging');
        $this->load->model('Dropdown_model', 'dropdown');
        $this->load->model('Cbt_model', 'cbt');
    }

    public function index() {
        $user = $this->ion_auth->user()->row();
        $setting = $this->dashboard->getSetting();
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();

        $data = [
            'user' => $user,
            'judul' => 'Beranda',
            'subjudul' => 'Halaman Utama',
            'setting' => $setting,
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $tp,
            'smt_active' => $smt,
        ];

        if ($this->ion_auth->is_admin()) {
            $data['info_box'] = $this->admin_box($setting, $tp->id_tp, $smt->id_smt);
            $data['ujian_box'] = $this->ujian_box();
            $data['profile'] = $this->dashboard->getProfileAdmin($user->id);
            $data['token'] = $this->cbt->getToken();

            // Additional data for Admin Dashboard
            $data['jadwals_ujian'] = $this->cbt->getAllJadwal($tp->id_tp, $smt->id_smt);
            $data['ruangs'] = $this->cbt->getRuangSesi($tp->id_tp, $smt->id_smt);
            $data['pengawas'] = $this->dashboard->totalPengawas();
            $data['gurus'] = $this->dropdown->getAllGuru();
            $data['ada_ujian'] = $this->cbt->getJadwalCbtKelas($tp->id_tp, $smt->id_smt);
            
            // Tambahkan System Stats untuk Admin
            $data['system_stats'] = $this->get_system_stats();

            $this->load->view('_templates/dashboard/_header', $data);
            $this->load->view('dashboard');
            $this->load->view('_templates/dashboard/_footer');
        } elseif ($this->ion_auth->in_group('guru')) {
            $guru = $this->dashboard->getDataGuruByUserId($user->id, $tp->id_tp, $smt->id_smt);
            if ($guru == null) {
                $this->load->view('disable_login', $data);
            } else {
                $data['info_box'] = $this->guru_box($setting);
                $data['ujian_box'] = $this->ujian_box();
                $data['guru'] = $guru;
                $this->load->view('members/guru/templates/header', $data);
                $this->load->view('members/guru/dashboard');
                $this->load->view('members/guru/templates/footer');
            }
        } elseif ($this->ion_auth->in_group('siswa')) {
            $siswa = $this->dashboard->getDataSiswa($user->username, $tp->id_tp, $smt->id_smt);
            if ($siswa == null) {
                $this->load->view('disable_login', $data);
            } else {
                $data['login'] = $siswa;
                $data['siswa'] = $siswa;
                $data['menu'] = $this->menu_siswa_box();
                
                // Get KBM and Jadwal
                $day = date('N');
                $jadwal = $this->dashboard->loadJadwalHariIni($tp->id_tp, $smt->id_smt, $siswa->id_kelas, $day);
                $data['jadwals'] = $jadwal;
                
                $this->load->view('members/siswa/templates/header', $data);
                $this->load->view('members/siswa/dashboard');
                $this->load->view('members/siswa/templates/footer');
            }
        }
    }

    private function get_system_stats() {
        $stats = [
            'cpu_usage' => 0,
            'mem_usage' => 0,
            'mem_total' => 0,
            'disk_usage' => 0
        ];

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows Fallback (Since it's Laragon)
            $stats['cpu_usage'] = "N/A (Windows)";
            $stats['mem_usage'] = "N/A";
        } else {
            // Linux/VPS Stats (For Dokploy)
            // CPU Load
            $load = sys_getloadavg();
            $stats['cpu_usage'] = $load[0] * 100 / 2; // Estimation based on 2 cores

            // Memory usage
            $free = shell_exec('free');
            $free = (string)trim($free);
            $free_arr = explode("\n", $free);
            $mem = explode(" ", $free_arr[1]);
            $mem = array_filter($mem);
            $mem = array_merge($mem);
            $stats['mem_total'] = round($mem[1] / 1024 / 1024, 2); // GB
            $stats['mem_usage'] = round($mem[2] / $mem[1] * 100, 2); // %
        }

        // Disk Usage
        $stats['disk_usage'] = round((1 - (disk_free_space("/") / disk_total_space("/"))) * 100, 2);
        
        return $stats;
    }

    public function admin_box($setting, $tp, $smt) {
        $box = [
            [
                'box' => 'blue',
                'total' => $this->dashboard->total('master_siswa'),
                'title' => 'Siswa',
                'url' => 'datasiswa',
                'icon' => 'users'
            ],
            [
                'box' => 'cyan',
                'total' => $this->dashboard->total('master_kelas', "id_tp=$tp AND id_smt=$smt"),
                'title' => 'Rombel',
                'url' => 'datakelas',
                'icon' => 'bell'
            ],
            [
                'box' => 'teal',
                'total' => $this->dashboard->total('master_guru'),
                'title' => 'Guru',
                'url' => 'dataguru',
                'icon' => 'user'
            ],
            [
                'box' => 'success',
                'total' => $this->dashboard->total('master_mapel'),
                'title' => 'Mapel',
                'url' => 'datamapel',
                'icon' => 'book'
            ]
        ];
        return json_decode(json_encode($box), FALSE);
    }

    public function ujian_box() {
        $box = [
            [
                'box' => 'indigo',
                'total' => $this->dashboard->total('cbt_ruang'),
                'title' => 'Ruang Ujian',
                'url' => 'cbtruang',
                'icon' => 'school'
            ],
            [
                'box' => 'maroon',
                'total' => $this->dashboard->total('cbt_sesi'),
                'title' => 'Sesi',
                'url' => 'cbtsesi',
                'icon' => 'clock'
            ],
            [
                'box' => 'green',
                'total' => $this->dashboard->total('cbt_bank_soal'),
                'title' => 'Bank Soal',
                'url' => 'cbtbanksoal',
                'icon' => 'folder'
            ],
            [
                'box' => 'teal',
                'total' => $this->dashboard->totalJadwal(),
                'title' => 'Jadwal',
                'url' => 'cbtjadwal',
                'icon' => 'calendar-alt'
            ]
        ];
        return json_decode(json_encode($box), FALSE);
    }

    public function guru_box($setting) {
        $box = [
            ['box' => 'teal', 'total' => $this->dashboard->total('master_kelas'), 'title' => 'Rombel', 'icon' => 'user'],
            ['box' => 'blue', 'total' => $this->dashboard->total('master_siswa'), 'title' => 'Siswa', 'icon' => 'users'],
            ['box' => 'fuchsia', 'total' => $this->dashboard->total('master_guru'), 'title' => 'Guru', 'icon' => 'user'],
            ['box' => 'success', 'total' => $this->dashboard->total('master_mapel'), 'title' => 'Mapel', 'icon' => 'book']
        ];
        return json_decode(json_encode($box), FALSE);
    }

    public function menu_siswa_box() {
        $box = [
            ['title' => 'Jadwal Pelajaran', 'icon' => 'ic_online.png', 'link' => 'siswa/jadwalpelajaran'],
            ['title' => 'Materi', 'icon' => 'ic_elearning.png', 'link' => 'siswa/materi'],
            ['title' => 'Tugas', 'icon' => 'ic_questions.png', 'link' => 'siswa/tugas'],
            ['title' => 'Ujian / Ulangan', 'icon' => 'ic_question.png', 'link' => 'siswa/cbt'],
            ['title' => 'Nilai Hasil', 'icon' => 'ic_exam.png', 'link' => 'siswa/hasil'],
            ['title' => 'Absensi', 'icon' => 'ic_clipboard.png', 'link' => 'siswa/kehadiran'],
            ['title' => 'Catatan Guru', 'icon' => 'ic_student.png', 'link' => 'siswa/catatan']
        ];
        return json_decode(json_encode($box), FALSE);
    }

    public function output_json($data, $encode = true) {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function logout() {
        $this->ion_auth->logout();
        redirect('login', 'refresh');
    }
}
