<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guruview extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->load->model('Master_model', 'master');
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->library('upload');
        $this->load->library(['datatables', 'form_validation']);
        $this->form_validation->set_error_delimiters('', '');
    }

    public function output_json($data, $encode = true) {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function index() {
        $tp = $this->master->getTahunActive();
        $smt = $this->master->getSemesterActive();
        $user = $this->ion_auth->user()->row();
        
        if ($user == null) {
            redirect('auth');
        }

        $guru = $this->dashboard->getDetailGuruByUserId($user->id, $tp->id_tp, $smt->id_smt);
        
        $data = [
            'user' => $user,
            'judul' => "Profile",
            'subjudul' => "Profile Saya",
            'setting' => $this->dashboard->getSetting(),
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $tp,
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $smt,
            'guru' => $guru
        ];

        $data['input_profile'] = json_decode(json_encode([
            ['label' => "Nama Lengkap", 'name' => "nama_guru", 'value' => $guru->nama_guru, 'icon' => "far fa-user", 'type' => "text"],
            ['label' => "Email", 'name' => "email", 'value' => $guru->email, 'icon' => "far fa-envelope", 'type' => "text"],
            ['label' => "NIP / NUPTK", 'name' => "nip", 'value' => $guru->nip, 'icon' => "far fa-id-card", 'type' => "text"],
            ['label' => "Jenis Kelamin", 'name' => "jenis_kelamin", 'value' => $guru->jenis_kelamin, 'icon' => "fas fa-venus-mars", 'type' => "text"],
            ['label' => "No. Handphone", 'name' => "no_hp", 'value' => $guru->no_hp, 'icon' => "fa fa-phone", 'type' => "number"],
            ['label' => "Agama", 'name' => "agama", 'value' => $guru->agama, 'icon' => "far fa-user", 'type' => "text"]
        ]), FALSE);

        $data['input_alamat'] = json_decode(json_encode([
            ['label' => "NIK", 'name' => "no_ktp", 'value' => $guru->no_ktp, 'icon' => "far fa-id-card", 'type' => "number"],
            ['label' => "Tempat Lahir", 'name' => "tempat_lahir", 'value' => $guru->tempat_lahir, 'icon' => "fa fa-map-marker", 'type' => "text"],
            ['label' => "Tgl. Lahir", 'name' => "tgl_lahir", 'value' => $guru->tgl_lahir, 'icon' => "fa fa-calendar", 'type' => "text"],
            ['label' => "Alamat", 'name' => "alamat_jalan", 'value' => $guru->alamat_jalan, 'icon' => "fa fa-map-marker", 'type' => "text"],
            ['label' => "Kecamatan", 'name' => "kecamatan", 'value' => $guru->kecamatan, 'icon' => "fa fa-map-marker", 'type' => "text"],
            ['label' => "Kota/Kab.", 'name' => "kabupaten", 'value' => $guru->kabupaten, 'icon' => "fa fa-map-marker", 'type' => "text"],
            ['label' => "Provinsi", 'name' => "provinsi", 'value' => $guru->provinsi, 'icon' => "fa fa-map-marker", 'type' => "text"],
            ['label' => "Kode Pos", 'name' => "kode_pos", 'value' => $guru->kode_pos, 'icon' => "fa fa-envelope", 'type' => "number"]
        ]), FALSE);

        $this->load->view('members/guru/templates/header', $data);
        $this->load->view('members/guru/profile');
        $this->load->view('members/guru/templates/footer');
    }

    public function save() {
        $id_guru = $this->input->post('id_guru', true);
        $nip = $this->input->post('nip', true);
        $nama_guru = $this->input->post('nama_guru', true);
        $email = $this->input->post('email', true);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $no_hp = $this->input->post('no_hp', true);
        $agama = $this->input->post('agama', true);
        $no_ktp = $this->input->post('no_ktp', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $alamat_jalan = $this->input->post('alamat_jalan', true);
        $kecamatan = $this->input->post('kecamatan', true);
        $kabupaten = $this->input->post('kabupaten', true);
        $provinsi = $this->input->post('provinsi', true);
        $kode_pos = $this->input->post('kode_pos', true);

        $tp = $this->master->getTahunActive();
        $smt = $this->master->getSemesterActive();
        $dbdata = $this->master->getGuruById($id_guru, $tp->id_tp, $smt->id_smt);
        
        $u_nip = $dbdata->nip === $nip ? '' : '|is_unique[master_guru.nip]';
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|min_length[7]|max_length[30]' . $u_nip);
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim|min_length[1]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'status' => false,
                'errors' => [
                    'nip' => form_error('nip'),
                    'nama_guru' => form_error('nama_guru')
                ]
            ];
            $this->output_json($data);
        } else {
            $input = [
                'nip' => $nip,
                'nama_guru' => $nama_guru,
                'email' => $email,
                'jenis_kelamin' => $jenis_kelamin,
                'no_hp' => $no_hp,
                'agama' => $agama,
                'no_ktp' => $no_ktp,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => (strpos($tgl_lahir, '0000-') !== false) ? null : $tgl_lahir,
                'alamat_jalan' => $alamat_jalan,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'kode_pos' => $kode_pos
            ];
            $action = $this->master->update('master_guru', $input, 'id_guru', $id_guru);
            if ($action) {
                $this->output_json(['status' => true]);
            } else {
                $this->output_json(['status' => false]);
            }
        }
    }

    public function uploadfile($id_guru_param = null) {
        $user = $this->ion_auth->user()->row();
        $id_guru = $id_guru_param;
        if ($id_guru == null) $id_guru = $this->input->post('id_guru');

        // Secure Guru resolution
        if (!$this->ion_auth->is_admin()) {
            // Non-admins can only upload for their own linked guru record
            $guru = $this->db->get_where('master_guru', ['id_user' => $user->id])->row();
        } else {
            // Admins can upload for anyone if ID is provided, otherwise themselves
            if ($id_guru) {
                $guru = $this->db->get_where('master_guru', ['id_guru' => $id_guru])->row();
            } else {
                $guru = $this->db->get_where('master_guru', ['id_user' => $user->id])->row();
            }
        }

        if (!$guru) {
            $this->output_json(['status' => false, 'src' => 'Gagal: Profil guru tidak tertaut dengan akun user ini.']);
            return;
        }

        $id_guru = $guru->id_guru;

        if (isset($_FILES['foto']['name'])) {
            $config['upload_path'] = FCPATH . 'uploads/profiles/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
            $config['overwrite'] = true;
            $config['file_name'] = 'guru_' . $id_guru; 

            if (!is_dir($config['upload_path'])) {
                if (!mkdir($config['upload_path'], 0777, true)) {
                    $this->output_json(['status' => false, 'src' => 'Gagal membuat folder upload.']);
                    return;
                }
            }

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors('', '');
                $this->output_json(['status' => false, 'src' => $error]);
            } else {
                $result = $this->upload->data();
                $path = 'uploads/profiles/' . $result['file_name'];
                
                $this->db->set('foto', $path);
                $this->db->where('id_guru', $id_guru);
                if ($this->db->update('master_guru')) {
                    $data['status'] = true;
                    $data['src'] = base_url($path) . '?t=' . time();
                    $data['filename'] = pathinfo($result['file_name'], PATHINFO_FILENAME);
                } else {
                    $data['status'] = false;
                    $data['src'] = 'Gagal menyimpan perubahan ke database.';
                }
                $this->output_json($data);
            }
        } else {
            $this->output_json(['status' => false, 'src' => 'Tidak ada file yang dipilih.']);
        }
    }

    public function deletefile($id_guru_param = null) {
        $user = $this->ion_auth->user()->row();
        $id_guru = $id_guru_param;
        if (!$id_guru) $id_guru = $this->input->get('id_guru');

        if (!$this->ion_auth->is_admin()) {
            $guru = $this->db->get_where('master_guru', ['id_user' => $user->id])->row();
        } else {
            if ($id_guru) {
                $guru = $this->db->get_where('master_guru', ['id_guru' => $id_guru])->row();
            } else {
                $guru = $this->db->get_where('master_guru', ['id_user' => $user->id])->row();
            }
        }

        if (!$guru) {
            echo "Error: Guru record not found.";
            return;
        }

        $src = $this->input->get('src');
        if ($src) {
            $file_path = str_replace(base_url(), '', $src);
            if (file_exists(FCPATH . $file_path) && !is_dir(FCPATH . $file_path)) {
                unlink(FCPATH . $file_path);
            }
        }

        $this->db->set('foto', null);
        $this->db->where('id_guru', $guru->id_guru);
        $this->db->update('master_guru');
        echo "File Delete Successfully";
    }
}
