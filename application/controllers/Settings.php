<?php
/**
 * ScholaCBT - Settings Controller
 * Improved and De-obfuscated by Antigravity
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Admin yang boleh mengakses halaman ini', 403, 'Akses dilarang');
        }
        
        $this->load->library('upload');
        $this->load->model('Settings_model', 'settings');
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->helper('directory');
    }

    public function output_json($data, $encode = true) {
        if ($encode) {
            $data = json_encode($data);
        }
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function index() {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user'          => $user,
            'judul'         => 'Profile Sekolah',
            'subjudul'      => '',
            'profile'       => $this->dashboard->getProfileAdmin($user->id),
            'setting'       => $this->dashboard->getSetting(),
            'tp'            => $this->dashboard->getTahun(),
            'tp_active'     => $this->dashboard->getTahunActive(),
            'smt'           => $this->dashboard->getSemester(),
            'smt_active'    => $this->dashboard->getSemesterActive()
        ];

        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/data');
        $this->load->view('_templates/dashboard/_footer');
    }

    public function dbManager() {
        $data = [
            'user'          => $this->ion_auth->user()->row(),
            'judul'         => 'Backup dan Restore',
            'subjudul'      => 'Backup dan Restore',
            'tp'            => $this->dashboard->getTahun(),
            'tp_active'     => $this->dashboard->getTahunActive(),
            'smt'           => $this->dashboard->getSemester(),
            'smt_active'    => $this->dashboard->getSemesterActive(),
            'setting'       => $this->settings->getSetting(),
            'list'          => directory_map('./backups/')
        ];

        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/db');
        $this->load->view('_templates/dashboard/_footer');
    }

    public function saveSetting() {
        $id_setting = 1;
        
        $insert = [
            'sekolah'           => $this->input->post('nama_sekolah', true),
            'nss'               => $this->input->post('nss', true),
            'npsn'              => $this->input->post('npsn', true),
            'jenjang'           => $this->input->post('jenjang', true),
            'satuan_pendidikan' => $this->input->post('satuan_pendidikan', true),
            'alamat'            => $this->input->post('alamat', true),
            'desa'              => $this->input->post('desa', true),
            'kota'              => $this->input->post('kota', true),
            'kecamatan'         => $this->input->post('kec', true),
            'kode_pos'          => $this->input->post('kode_pos', true),
            'provinsi'          => $this->input->post('provinsi', true),
            'web'               => $this->input->post('web', true),
            'fax'               => $this->input->post('fax', true),
            'email'             => $this->input->post('email', true),
            'telp'              => $this->input->post('tlp', true),
            'kepsek'            => $this->input->post('kepsek', true),
            'nip'               => $this->input->post('nip', true),
            'nama_aplikasi'     => $this->input->post('nama_aplikasi', true)
        ];

        // Handle Tanda Tangan if present
        $tanda_tangan = $this->input->post('tanda_tangan', true);
        if ($tanda_tangan !== null) {
            $insert['tanda_tanggan'] = str_replace(base_url(), '', $tanda_tangan);
        }

        // Upload Configuration
        $config['upload_path']   = './uploads/settings/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
        $config['overwrite']     = true;

        // Process Logo Kiri
        if (!empty($_FILES['logo_kiri']['name'])) {
            $config['file_name'] = 'logo_kiri_' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('logo_kiri')) {
                $upload_data = $this->upload->data();
                $insert['logo_kiri'] = 'uploads/settings/' . $upload_data['file_name'];
            }
        } else {
            $old_logo_kiri = $this->input->post('old_logo_kiri', true);
            $insert['logo_kiri'] = str_replace(base_url(), '', $old_logo_kiri ?? '');
        }

        // Process Logo Kanan
        if (!empty($_FILES['logo_kanan']['name'])) {
            $config['file_name'] = 'logo_kanan_' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('logo_kanan')) {
                $upload_data = $this->upload->data();
                $insert['logo_kanan'] = 'uploads/settings/' . $upload_data['file_name'];
            }
        } else {
            $old_logo_kanan = $this->input->post('old_logo_kanan', true);
            $insert['logo_kanan'] = str_replace(base_url(), '', $old_logo_kanan ?? '');
        }

        $this->db->where('id_setting', $id_setting);
        $update = $this->db->update('setting', $insert);
        
        $this->output_json($update);
    }

    public function uploadFile($logo) {
        $data = ['status' => false];
        if (isset($_FILES['logo']['name'])) {
            $config['upload_path']   = './uploads/settings/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
            $config['overwrite']     = true;
            $config['file_name']     = $logo;

            $this->upload->initialize($config);
            if ($this->upload->do_upload('logo')) {
                $result = $this->upload->data();
                $data['status']   = true;
                $data['src']      = base_url() . 'uploads/settings/' . $result['file_name'];
                $data['filename'] = pathinfo($result['file_name'], PATHINFO_FILENAME);
                $data['type']     = $_FILES['logo']['type'];
                $data['size']     = $_FILES['logo']['size'];
            } else {
                $data['src'] = $this->upload->display_errors();
            }
        } else {
            $data['src'] = '';
        }
        $this->output_json($data);
    }

    public function deleteFile() {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src ?? '');
        if (file_exists($file_name)) {
            if (unlink($file_name)) {
                echo "File Deleted Successfully";
            }
        }
    }
}
