<?php
/*   ________________________________________
    |                 ScholaCBT              |
    |    #    |
    |________________________________________|
*/
defined("BASEPATH") or exit("No direct script access allowed");

class Datakelas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect("auth");
        }
        if (!$this->ion_auth->is_admin()) {
            show_error("Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href=\"".base_url("dashboard")."\">Kembali ke menu awal</a>", 403, "Akses Terlarang");
        }
        $this->load->library(["datatables", "form_validation"]);
        $this->load->model("Kelas_model", "kelas");
        $this->load->model("Dashboard_model", "dashboard");
        $this->load->model("Master_model", "master");
        $this->load->model("Dropdown_model", "dropdown");
        $this->form_validation->set_error_delimiters('', '');
    }

    public function output_json($data, $encode = true) {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type("application/json")->set_output($data);
    }

    public function index() {
        $user = $this->ion_auth->user()->row();
        $setting = $this->dashboard->getSetting();
        $data = [
            "user" => $user,
            "judul" => "Kelas",
            "subjudul" => "Data Kelas",
            "setting" => $setting
        ];
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $data["tp"] = $this->dashboard->getTahun();
        $data["tp_active"] = $tp;
        $data["smt"] = $this->dashboard->getSemester();
        $data["smt_active"] = $smt;
        $data["profile"] = $this->dashboard->getProfileAdmin($user->id);
        
        $chek = $this->kelas->count_all();
        $kelas = [];
        $kelas_lama = [];
        if ($chek > 0) {
            $kelas = $this->kelas->getKelasList($tp->id_tp, $smt->id_smt);
            $kelas_lama = $this->kelas->getKelasList($tp->id_tp - 1, "2");
        }
        $data["kelas"] = $kelas;
        $data["kelas_lama"] = $kelas_lama;
        $data["jurusan"] = $this->kelas->get_jurusan();
        $data["level"] = $this->kelas->getLevel($setting->jenjang);
        $data["guru"] = $this->kelas->get_guru();
        $data["siswa"] = $this->kelas->getAllSiswa($tp->id_tp, $smt->id_smt);

        $this->load->view("_templates/dashboard/_header", $data);
        $this->load->view("master/kelas/data");
        $this->load->view("_templates/dashboard/_footer");
    }

    public function detail($id) {
        $user = $this->ion_auth->user()->row();
        $setting = $this->dashboard->getSetting();
        $data = [
            "user" => $user,
            "judul" => "Detail Kelas",
            "subjudul" => "Detail Kelas",
            "setting" => $setting
        ];
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $data["tp"] = $this->dashboard->getTahun();
        $data["tp_active"] = $tp;
        $data["smt"] = $this->dashboard->getSemester();
        $data["smt_active"] = $smt;
        $data["profile"] = $this->dashboard->getProfileAdmin($user->id);
        $data["kelas"] = $this->kelas->get_one($id);
        $data["jurusan"] = $this->kelas->get_jurusan();
        $data["level"] = $this->kelas->getLevel($setting->jenjang);
        $data["guru"] = $this->kelas->get_guru();
        $data["siswas"] = $this->kelas->get_siswa_kelas($id, $tp->id_tp, $smt->id_smt);
        
        $struktur = $this->kelas->getStrukturKelas($id);
        if ($struktur == null) {
            $data["struktur"] = json_decode(json_encode($this->kelas->dummyStruktur()));
        } else {
            $data["struktur"] = $struktur;
        }

        $this->load->view("_templates/dashboard/_header", $data);
        $this->load->view("master/kelas/detail");
        $this->load->view("_templates/dashboard/_footer");
    }

    public function add() {
        $user = $this->ion_auth->user()->row();
        $setting = $this->dashboard->getSetting();
        $data = [
            "user" => $user,
            "judul" => "Kelas",
            "subjudul" => "Tambah Kelas",
            "setting" => $setting
        ];
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $data["tp"] = $this->dashboard->getTahun();
        $data["tp_active"] = $tp;
        $data["smt"] = $this->dashboard->getSemester();
        $data["smt_active"] = $smt;
        $data["profile"] = $this->dashboard->getProfileAdmin($user->id);
        $data["kelas"] = json_decode(json_encode($this->kelas->dummy()));
        $data["jurusan"] = $this->kelas->get_jurusan();
        $data["level"] = $this->kelas->getLevel($setting->jenjang);
        $data["guru"] = $this->kelas->get_guru();
        $data["siswa"] = $this->kelas->getAllSiswa($tp->id_tp, $smt->id_smt);
        $data["siswakelas"] = array();

        $this->load->view("_templates/dashboard/_header", $data);
        $this->load->view("master/kelas/add");
        $this->load->view("_templates/dashboard/_footer");
    }

    public function edit($id = '') {
        $user = $this->ion_auth->user()->row();
        $setting = $this->dashboard->getSetting();
        $data = [
            "user" => $user,
            "judul" => "Kelas",
            "subjudul" => "Edit Kelas",
            "setting" => $setting
        ];
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $data["tp"] = $this->dashboard->getTahun();
        $data["tp_active"] = $tp;
        $data["smt"] = $this->dashboard->getSemester();
        $data["smt_active"] = $smt;
        $data["profile"] = $this->dashboard->getProfileAdmin($user->id);
        $data["id_kelas"] = $id;
        $data["kelas"] = $this->kelas->get_one($id);
        $data["jurusan"] = $this->kelas->get_jurusan();
        $data["level"] = $this->kelas->getLevel($setting->jenjang);
        $data["guru"] = $this->kelas->getWaliKelas($tp->id_tp, $smt->id_smt);
        $data["siswa"] = $this->kelas->getAllSiswa($tp->id_tp, $smt->id_smt);
        $data["siswakelas"] = $this->kelas->get_siswa_kelas($id, $tp->id_tp, $smt->id_smt);

        $this->load->view("_templates/dashboard/_header", $data);
        $this->load->view("master/kelas/add");
        $this->load->view("_templates/dashboard/_footer");
    }

    public function save() {
        $id = $this->input->post("id_kelas", true);
        $guru_id = $this->input->post("guru_id", TRUE);
        $id_tp = $this->master->getTahunActive()->id_tp;
        $id_smt = $this->master->getSemesterActive()->id_smt;
        $siswas = $this->input->post("siswa", true);
        
        $siswakelas = [];
        if ($siswas) {
            foreach ($siswas as $id_siswa) {
                if ($id_siswa != null) {
                    $siswakelas[] = ["id" => $id_siswa];
                }
            }
        }
        $jumlah = serialize($siswakelas);

        $insert_data = [
            "nama_kelas" => $this->input->post("nama_kelas", TRUE),
            "kode_kelas" => $this->input->post("kode_kelas", TRUE),
            "jurusan_id" => $this->input->post("jurusan_id", TRUE),
            "id_tp" => $id_tp,
            "id_smt" => $id_smt,
            "level_id" => $this->input->post("level_id", TRUE),
            "guru_id" => $this->input->post("guru_id", TRUE) ?? '',
            "siswa_id" => $this->input->post("siswa_id", TRUE),
            "jumlah_siswa" => $jumlah
        ];

        $config = [
            ["field" => "nama_kelas", "label" => "Nama Kelas", "rules" => "trim"],
            ["field" => "kode_kelas", "label" => "Kode Kelas", "rules" => "trim"],
            ["field" => "jurusan_id", "label" => "Jurusan", "rules" => "trim"],
            ["field" => "level_id", "label" => "Level", "rules" => "trim"],
            ["field" => "guru_id", "label" => "Guru", "rules" => "trim"],
            ["field" => "siswa_id", "label" => "Siswa", "rules" => "trim"]
        ];
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == TRUE) {
            if ($id != null && $id != '') {
                $this->db->where("id_kelas", $id);
                $status = $this->db->update("master_kelas", $insert_data);
                $new_id_kelas = $id;
            } else {
                $status = $this->db->insert("master_kelas", $insert_data);
                $new_id_kelas = $this->db->insert_id();
            }

            if ($status) {
                // Update jabatan guru
                $this->db->set("id_kelas", $new_id_kelas);
                $this->db->where("id_jabatan_guru", $guru_id . $id_tp . $id_smt);
                $this->db->update("jabatan_guru");

                // Update siswa kelas
                $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
                
                // Get current students in this class
                $siswa_kelas_current = $this->kelas->get_status_siswa_kelas($new_id_kelas, $id_tp, $id_smt);
                foreach ($siswa_kelas_current as $sid => $s) {
                    $upd = [
                        "id_kelas_siswa" => $id_tp . $id_smt . $sid,
                        "id_tp" => $id_tp,
                        "id_smt" => $id_smt,
                        "id_kelas" => 0,
                        "id_siswa" => $sid
                    ];
                    $this->db->replace("kelas_siswa", $upd);
                }

                // Add new students
                if ($siswas) {
                    foreach ($siswas as $sid) {
                        if ($sid != null) {
                            $ins = [
                                "id_kelas_siswa" => $id_tp . $id_smt . $sid,
                                "id_tp" => $id_tp,
                                "id_smt" => $id_smt,
                                "id_kelas" => $new_id_kelas,
                                "id_siswa" => $sid
                            ];
                            $this->db->replace("kelas_siswa", $ins);
                        }
                    }
                }
                $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
            }
        } else {
            $status = FALSE;
        }

        $this->output_json(["status" => $status]);
    }

    public function manage() {
        $user = $this->ion_auth->user()->row();
        $setting = $this->dashboard->getSetting();
        $data = [
            "user" => $user,
            "judul" => "Copy Kelas",
            "subjudul" => "Copy Data Kelas ke SMT II",
            "setting" => $setting
        ];
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $data["tp"] = $this->dashboard->getTahun();
        $data["tp_active"] = $tp;
        $data["smt"] = $this->dashboard->getSemester();
        $data["smt_active"] = $smt;
        $data["profile"] = $this->dashboard->getProfileAdmin($user->id);
        $data["kelas"] = $this->dropdown->getAllKelas($tp->id_tp, "1");
        $data["kelas2"] = $this->dropdown->getAllKelas($tp->id_tp, "2");

        $this->load->view("_templates/dashboard/_header", $data);
        $this->load->view("master/kelas/persemester");
        $this->load->view("_templates/dashboard/_footer");
    }

    public function getFromSmt1($kelas) {
        $tp = $this->dashboard->getTahunActive();
        $data1 = $this->kelas->getKelasSiswa($kelas, $tp->id_tp, "1");
        $data2 = $this->kelas->getKelasSiswa($kelas, $tp->id_tp, "2");
        $ids = [];
        foreach ($data2 as $s) {
            $ids[] = $s->id_siswa;
        }
        $this->output_json(["smt1" => $data1, "smt2" => $ids]);
    }

    public function copyFromSmt1() {
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $kelas1_id = $this->input->post("kelas_lama", true);
        $kelas2_nama = $this->input->post("kelas_baru", true);
        
        $kelas1 = $this->kelas->get_one($kelas1_id, $tp->id_tp, "1");
        $data = array(
            "nama_kelas" => $kelas2_nama,
            "kode_kelas" => $kelas1->kode_kelas,
            "jurusan_id" => $kelas1->jurusan_id,
            "id_tp" => $tp->id_tp,
            "id_smt" => $smt->id_smt,
            "level_id" => $kelas1->level_id,
            "guru_id" => $kelas1->guru_id,
            "siswa_id" => $kelas1->siswa_id,
            "jumlah_siswa" => $kelas1->jumlah_siswa
        );
        $this->db->insert("master_kelas", $data);
        $idk = $this->db->insert_id();
        
        $arrSiswa = unserialize($kelas1->jumlah_siswa);
        $res = [];
        if ($arrSiswa) {
            foreach ($arrSiswa as $value) {
                $id_siswa = $value["id"];
                if ($id_siswa != null) {
                    $insert = [
                        "id_kelas_siswa" => $tp->id_tp . $smt->id_smt . $id_siswa,
                        "id_tp" => $tp->id_tp,
                        "id_smt" => $smt->id_smt,
                        "id_kelas" => $idk,
                        "id_siswa" => $id_siswa
                    ];
                    $res[] = $this->db->replace("kelas_siswa", $insert);
                }
            }
        }
        $this->output_json($res);
    }

    public function copySiswaFromSmt1() {
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $posts = json_decode($this->input->post("kelas", true));
        
        $siswakelas = [];
        $idkelases = [];
        if ($posts) {
            foreach ($posts as $d) {
                $idkelases[] = $d->id_kelas;
                $siswakelas[$d->id_kelas][] = ["id" => $d->id_siswa];
            }
        }
        $idkelases = array_unique($idkelases);
        $res = [];
        foreach ($idkelases as $ik) {
            if ($ik != '') {
                $kelas = $this->kelas->get_one($ik, $tp->id_tp, "1");
                $jumlah = serialize($siswakelas[$ik]);
                $data = array(
                    "nama_kelas" => $kelas->nama_kelas,
                    "kode_kelas" => $kelas->kode_kelas,
                    "jurusan_id" => $kelas->jurusan_id,
                    "id_tp" => $tp->id_tp,
                    "id_smt" => $smt->id_smt,
                    "level_id" => $kelas->level_id,
                    "guru_id" => $kelas->guru_id,
                    "siswa_id" => $kelas->siswa_id,
                    "jumlah_siswa" => $jumlah
                );
                $this->db->insert("master_kelas", $data);
                $idk = $this->db->insert_id();
                
                foreach ($siswakelas[$ik] as $s) {
                    $insert = [
                        "id_kelas_siswa" => $tp->id_tp . $smt->id_smt . $s["id"],
                        "id_tp" => $tp->id_tp,
                        "id_smt" => $smt->id_smt,
                        "id_kelas" => $idk,
                        "id_siswa" => $s["id"]
                    ];
                    $res[] = $this->db->replace("kelas_siswa", $insert);
                }
            }
        }
        $this->output_json($res);
    }

    public function hapus($id_kelas) {
        $delete["siswa"] = $this->master->delete("kelas_siswa", $id_kelas, "id_kelas");
        $delete["kelas"] = $this->master->delete("master_kelas", $id_kelas, "id_kelas");
        $this->output_json($delete);
    }
}
