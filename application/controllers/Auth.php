<?php
/**
 * ScholaCBT - Auth Controller
 * De-obfuscated and Updated by Antigravity
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {
    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function output_json($data) {
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function index() {
        $this->load->model('Settings_model', 'settings');
        
        if (count($this->db->list_tables()) == 0) {
            redirect('init');
        }

        $setting = $this->settings->getSetting();
        if ($setting == null) {
            redirect('init');
        }

        if ($this->ion_auth->logged_in()) {
            redirect('dashboard');
        }

        $this->data['setting'] = $setting;
        $this->data['message'] = validation_errors() ? validation_errors() : $this->session->flashdata('message');
        
        $this->data['identity'] = [
            'name' => 'identity',
            'id' => 'identity',
            'type' => 'text',
            'placeholder' => 'Username',
            'autofocus' => 'autofocus',
            'class' => 'form-control',
            'autocomplete' => 'off'
        ];
        $this->data['password'] = [
            'name' => 'password',
            'id' => 'password',
            'type' => 'password',
            'placeholder' => 'Password',
            'class' => 'form-control'
        ];

        $this->load->view('_templates/auth/_header', $this->data);
        $this->load->view('auth/login');
        $this->load->view('_templates/auth/_footer');
    }

    public function cek_login() {
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required|trim');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required|trim');

        if ($this->form_validation->run() === TRUE) {
            $remember = (bool)$this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                
                // --- STRATEGY 1: KICK-OUT IMPLEMENTATION ---
                $user = $this->ion_auth->user()->row();
                $new_session_id = session_id();
                $this->db->where('id', $user->id);
                $this->db->update('users', ['session_id' => $new_session_id]);
                // -------------------------------------------

                $this->cek_akses();
            } else {
                if ($this->ion_auth->is_max_login_attempts_exceeded($this->input->post('identity'))) {
                    $data = [
                        'status' => false,
                        'failed' => 'Anda sudah 3x melakukan percobaan login, silakan hubungi Administrator',
                        'akses' => 'attempts'
                    ];
                } else {
                    $data = [
                        'status' => false,
                        'failed' => 'Incorrect Login',
                        'akses' => 'no attempts'
                    ];
                }
                $this->output_json($data);
            }
        } else {
            $invalid = [
                'identity' => form_error('identity'),
                'password' => form_error('password')
            ];
            $data = [
                'status' => false,
                'invalid' => $invalid,
                'akses' => 'no valid'
            ];
            $this->output_json($data);
        }
    }

    public function cek_akses() {
        if (!$this->ion_auth->logged_in()) {
            $status = false;
            $url = 'auth';
        } else {
            $status = true;
            $this->load->model('Log_model', 'logging');
            $this->logging->saveLog(1, 'Login');
            $url = 'dashboard';
        }

        $data = [
            'status' => $status,
            'url' => $url,
            'role' => $this->ion_auth->is_admin() ? 'admin' : ($this->ion_auth->in_group('guru') ? 'guru' : 'siswa')
        ];
        $this->output_json($data);
    }

    public function logout() {
        $this->ion_auth->logout();
        redirect('login', 'refresh');
    }

    // Helper for CSRF Nonce
    public function _get_csrf_nonce() {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);
        return array($key => $value);
    }

    public function _valid_csrf_nonce() {
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue')) {
            return TRUE;
        }
        return FALSE;
    }

    public function _render_page($view, $data = NULL, $returnhtml = FALSE) {
        $viewdata = (empty($data)) ? $this->data : $data;
        $view_html = $this->load->view($view, $viewdata, $returnhtml);
        if ($returnhtml) return $view_html;
    }
}
