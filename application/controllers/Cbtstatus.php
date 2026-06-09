<?php
/*   ________________________________________
    |                 ScholaCBT              |
    |    #    |
    |________________________________________|
*/
 class Cbtstatus extends CI_Controller { public function __construct() { goto X1wNt; XM__O: $this->load->model("\103\x62\x74\x5f\155\x6f\x64\145\x6c", "\x63\142\164"); goto K8nyq; K8nyq: $this->load->model("\x44\x72\157\160\144\x6f\167\156\137\x6d\x6f\144\x65\x6c", "\144\162\x6f\x70\144\x6f\x77\x6e"); goto E06Tl; fcyzN: $this->load->library(["\x64\x61\x74\x61\x74\141\142\x6c\145\163", "\146\157\x72\155\137\166\x61\154\x69\144\141\x74\151\x6f\x6e"]); goto SB7jq; E06Tl: $this->form_validation->set_error_delimiters('', ''); goto fgDPS; fLAsI: redirect("\141\x75\164\150"); goto n5wKn; sifWg: JZe2d: goto fLAsI; n5wKn: iUgF3: goto fcyzN; yj93J: $this->load->model("\x44\x61\x73\x68\142\157\141\x72\144\x5f\x6d\157\x64\x65\154", "\x64\141\163\150\142\157\141\162\x64"); goto XM__O; PYhgD: if (!(!$this->ion_auth->is_admin() && !$this->ion_auth->in_group("\147\165\162\165"))) { goto w2DqZ; } goto ETu0f; H5phx: $this->load->model("\x4d\141\163\164\145\162\x5f\155\x6f\144\x65\154", "\155\141\x73\164\x65\x72"); goto yj93J; ETu0f: show_error("\110\x61\156\x79\x61\40\101\x64\x6d\x69\x6e\151\x73\x74\x72\x61\x74\157\x72\40\171\x61\156\x67\40\144\x69\142\x65\162\151\40\x68\141\153\x20\165\x6e\164\165\153\40\x6d\x65\x6e\x67\141\153\163\145\x73\40\x68\141\x6c\x61\x6d\141\x6e\40\151\x6e\151\x2c\x20\x3c\x61\40\150\162\145\x66\x3d\42" . base_url("\x64\141\x73\150\142\157\141\x72\144") . "\42\76\x4b\145\x6d\x62\141\x6c\151\x20\153\x65\x20\155\145\156\165\40\x61\167\141\154\x3c\x2f\141\x3e", 403, "\x41\153\x73\145\x73\40\124\145\162\x6c\x61\x72\x61\x6e\x67"); goto ksyHp; xn7yX: goto iUgF3; goto sifWg; t6I4l: if (!$this->ion_auth->logged_in()) { goto JZe2d; } goto PYhgD; SB7jq: $this->load->library("\x75\160\x6c\157\x61\x64"); goto H5phx; X1wNt: parent::__construct(); goto t6I4l; ksyHp: w2DqZ: goto xn7yX; fgDPS: } public function output_json($data, $encode = true) { goto XiKc5; XiKc5: if (!$encode) { goto Hm_e_; } goto tfRNf; jOVVC: Hm_e_: goto b11pu; tfRNf: $data = json_encode($data); goto jOVVC; b11pu: $this->output->set_content_type("\x61\x70\160\154\151\143\141\164\x69\157\156\x2f\152\x73\157\156")->set_output($data); goto zKU71; zKU71: } public function index() { goto OoR2F; xtSSk: zydGc: goto IjPni; ssONp: $this->load->view("\x6d\145\155\x62\x65\162\x73\57\147\165\162\165\x2f\164\x65\x6d\x70\x6c\x61\x74\145\163\57\146\x6f\157\164\145\162"); goto ASeDJ; IjPni: $data["\x72\x75\x61\x6e\147\163"] = $this->cbt->getDistinctRuang($tp->id_tp, $smt->id_smt, $arrKls); goto ITrQ8; RfwrD: $data["\163\145\163\x69"] = $this->dropdown->getAllSesi(); goto hcPLE; EbXNU: $this->load->view("\143\x62\164\x2f\x73\164\141\x74\x75\x73\57\144\141\x74\x61"); goto S0ioy; XlkU2: $data["\x72\x75\x61\x6e\x67"] = $this->dropdown->getAllRuang(); goto kuuAH; uUb2V: $jadwals = $this->cbt->getJadwalGuru($tp->id_tp, $smt->id_smt, $guru->id_guru); goto giX2y; dpzUW: $data["\163\x6d\164"] = $this->dashboard->getSemester(); goto XVg70; j0R7n: $tp = $this->dashboard->getTahunActive(); goto nadz5; OoR2F: $user = $this->ion_auth->user()->row(); goto fRbKN; fxoJ0: foreach ($jadwals as $jad) { goto oUcXV; u8xvU: IM2vs: goto yZUNP; oUcXV: $kls = unserialize($jad->bank_kelas ?? ''); goto pk9pT; pk9pT: foreach ($kls as $kl) { array_push($arrKls, $kl["\153\x65\x6c\x61\163\137\151\144"]); P46US: } goto u8xvU; yZUNP: f_7KU: goto fFzZL; fFzZL: } goto iCGZO; KcQi1: $data["\x6a\141\x64\167\x61\x6c"] = $this->dropdown->getAllJadwalGuru($tp->id_tp, $smt->id_smt, $guru->id_guru); goto GVyyR; nadz5: $smt = $this->dashboard->getSemesterActive(); goto EObKP; v58qB: if ($this->ion_auth->is_admin()) { goto UatHv; } goto CJZwW; ZdaP3: foreach ($jadwals as $jad) { goto H6K_f; H6K_f: $kls = unserialize($jad->bank_kelas ?? ''); goto MHSAq; E025H: q1Dqs: goto T_9lG; MHSAq: foreach ($kls as $kl) { array_push($arrKls, $kl["\153\145\x6c\x61\163\137\151\x64"]); W3Ve1: } goto aq6xV; aq6xV: cVkjP: goto E025H; T_9lG: } goto xtSSk; fRbKN: $data = ["\x75\163\145\162" => $user, "\x6a\165\x64\165\x6c" => "\123\164\x61\164\165\x73\x20\x55\x6a\x69\x61\x6e\x20\x53\x69\163\167\x61", "\x73\x75\x62\x6a\165\144\165\154" => "\x53\x74\x61\164\x75\163\40\123\151\x73\167\141", "\x73\145\164\x74\151\x6e\147" => $this->dashboard->getSetting()]; goto j0R7n; GVyyR: $data["\162\x75\x61\x6e\x67"] = $this->dropdown->getAllRuang(); goto RfwrD; i9ELP: $data["\160\x72\157\146\151\x6c\x65"] = $this->dashboard->getProfileAdmin($user->id); goto SY4iC; ZfHUM: $jadwals = $this->cbt->getJadwalKelas($tp->id_tp, $smt->id_smt); goto mSGm0; mSGm0: $arrKls = []; goto fxoJ0; kuuAH: $data["\x73\x65\x73\x69"] = $this->dropdown->getAllSesi(); goto ZfHUM; XVg70: $data["\x73\x6d\164\137\x61\143\164\151\x76\145"] = $smt; goto v58qB; j7auW: $data["\164\x70\x5f\x61\143\164\x69\166\145"] = $tp; goto dpzUW; SY4iC: $data["\152\x61\144\x77\141\154"] = $this->dropdown->getAllJadwal($tp->id_tp, $smt->id_smt); goto XlkU2; S0ioy: $this->load->view("\x5f\164\145\155\160\154\141\164\145\163\57\144\x61\x73\x68\142\157\x61\x72\144\57\x5f\x66\157\157\x74\145\162"); goto FTzUa; CJZwW: $guru = $this->dashboard->getDataGuruByUserId($user->id, $tp->id_tp, $smt->id_smt); goto xvMHK; xvMHK: $data["\147\x75\x72\165"] = $guru; goto KcQi1; giX2y: $arrKls = []; goto ZdaP3; FTzUa: YGwSU: goto d6yZg; In3Vl: $this->load->view("\x6d\145\155\142\x65\162\x73\x2f\x67\165\x72\x75\57\143\x62\164\57\x73\164\x61\x74\x75\163\57\x64\141\164\141"); goto ssONp; ITrQ8: $this->load->view("\x6d\145\155\x62\x65\x72\163\57\x67\165\x72\x75\57\x74\145\x6d\160\x6c\x61\x74\x65\x73\57\x68\x65\x61\144\x65\162", $data); goto In3Vl; Zp1Qp: UatHv: goto i9ELP; D8ZAS: $this->load->view("\x5f\164\145\155\x70\x6c\x61\x74\145\x73\57\x64\141\163\x68\142\157\141\x72\144\57\x5f\150\145\141\x64\x65\162", $data); goto EbXNU; hcPLE: $data["\160\x65\156\x67\x61\167\x61\x73"] = $this->cbt->getPengawasByGuru($tp->id_tp, $smt->id_smt, $guru->id_guru); goto uUb2V; ASeDJ: goto YGwSU; goto Zp1Qp; iCGZO: ihBfp: goto EWNeI; EWNeI: $data["\162\x75\141\x6e\x67\163"] = $this->cbt->getDistinctRuang($tp->id_tp, $smt->id_smt, $arrKls); goto D8ZAS; EObKP: $data["\x74\160"] = $this->dashboard->getTahun(); goto j7auW; d6yZg: } public function status_ruang() {
        $ruang = $this->input->get("ruang");
        $sesi = $this->input->get("sesi");
        $jadwal = $this->input->get("jadwal");
        
        $user = $this->ion_auth->user()->row();
        
        $data = [
            "user" => $user,
            "judul" => "Status Ujian Siswa",
            "subjudul" => "Status Siswa",
            "setting" => $this->dashboard->getSetting()
        ];
        
        $this->db->trans_start();
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $data["tp"] = $this->dashboard->getTahun();
        $data["tp_active"] = $tp;
        $data["smt"] = $this->dashboard->getSemester();
        $data["smt_active"] = $smt;
        
        $guru = $this->dashboard->getDataGuruByUserId($user->id, $tp->id_tp, $smt->id_smt);
        $data["guru"] = $guru;
        
        $info = $this->cbt->getJadwalById($jadwal);
        $siswas = $this->cbt->getSiswaByRuang($tp->id_tp, $smt->id_smt, $ruang, $sesi, $info->bank_level);
        
        $durasies = $this->cbt->getDurasiSiswaByJadwal($jadwal);
        $logs = $this->cbt->getLogUjianByJadwal($jadwal);
        $pengawas = $this->cbt->getPengawasByJadwal($tp->id_tp, $smt->id_smt, $jadwal, $sesi, $ruang);
        
        $ids_pengawas = [];
        if ($pengawas && count($pengawas) > 0) {
            foreach ($pengawas as $pws) {
                $ids_pengawas = explode(",", $pws->id_guru ?? '');
            }
        }
        
        // Optimize loops from O(N*M) to O(N+M)
        $durMap = [];
        foreach ($durasies as $durasi) {
            if ($durasi->lama_ujian == null) {
                $mins = (strtotime($durasi->selesai) - strtotime($durasi->mulai)) / 60;
                $durasi->lama_ujian = round($mins, 2) . " m";
            } else {
                $lamanya = $durasi->lama_ujian;
                if (strpos($lamanya, ":") !== false) {
                    $elap = explode(":", $lamanya ?? '');
                    $ed = $elap[2] == "00" ? 0 : 1;
                    $ej = $elap[0] == "00" ? '' : intval($elap[0]) . " j ";
                    $em = $elap[1] == "00" ? '' : intval($elap[1]) + $ed . " m";
                    $dd = $ej . $em;
                    $durasi->lama_ujian = $dd == '' ? "0 m" : $dd;
                } else {
                    $durasi->lama_ujian .= "m";
                }
            }
            $durMap[$durasi->id_siswa] = $durasi;
        }
        
        $logMap = [];
        foreach ($logs as $log) {
            $logMap[$log->id_siswa][] = $log;
        }
        
        $arrDur = [];
        foreach ($siswas as $siswa) {
            $dur_siswa = isset($durMap[$siswa->id_siswa]) ? $durMap[$siswa->id_siswa] : null;
            $log_siswa = isset($logMap[$siswa->id_siswa]) ? $logMap[$siswa->id_siswa] : [];
            $arrDur[$siswa->id_siswa] = ["dur" => $dur_siswa, "log" => $log_siswa];
        }
        
        $this->db->trans_complete();
        
        $data["siswa"] = $siswas;
        $data["durasi_siswa"] = $arrDur;
        $data["info"] = $info;
        $data["ids_pengawas"] = $ids_pengawas;
        
        $guru_ngawas = [];
        if ($ids_pengawas && count($ids_pengawas) > 0) {
            $guru_ngawas = $this->master->getGuruByArrId($ids_pengawas);
        }
        $data["pengawas"] = $guru_ngawas;
        
        $this->load->view("members/guru/templates/header", $data);
        $this->load->view("members/guru/cbt/status/status");
        $this->load->view("members/guru/templates/footer");
    } public function getJadwalUjianByJadwal() { goto D_cJm; Feu8S: $data["\x74\x70"] = $this->dashboard->getTahun(); goto YP5WM; YP5WM: $data["\164\160\x5f\x61\x63\x74\151\x76\x65"] = $tp; goto TOIZ9; TOIZ9: $data["\163\155\x74"] = $this->dashboard->getSemester(); goto LEkD_; axMae: K6_qI: goto oo_pZ; EFxUC: $kelas = unserialize($info->bank_kelas ?? ''); goto I1gMC; MxmGQ: foreach ($kelas as $key => $value) { $kelases[$value["\153\x65\154\141\x73\137\x69\x64"]] = $this->dropdown->getNamaKelasById($info->id_tp, $info->id_smt, $value["\x6b\145\154\x61\163\x5f\151\x64"]); V6l_r: } goto axMae; y02qP: $tp = $this->dashboard->getTahunActive(); goto kSLkD; LEkD_: $data["\x73\155\164\137\141\x63\164\151\166\145"] = $smt; goto EFxUC; kSLkD: $smt = $this->dashboard->getSemesterActive(); goto Feu8S; I1gMC: $kelases = []; goto MxmGQ; oo_pZ: $this->output_json($kelases); goto EUly9; nkRac: $info = $this->cbt->getJadwalById($jadwal); goto y02qP; D_cJm: $jadwal = $this->input->get("\x69\x64\137\x6a\141\x64\167\x61\x6c"); goto nkRac; EUly9: } public function getJadwalUjianByKelas() { goto mEj0J; UiVAZ: $id_guru = $guru->id_guru; goto X8fJB; fV6cr: uET21: goto xd8pd; YPZq0: $jadwals = $this->cbt->getAllJadwal($tp->id_tp, $smt->id_smt, $id_guru); goto EUe2S; FyNsn: $guru = $this->dashboard->getDataGuruByUserId($user->id, $tp->id_tp, $smt->id_smt); goto UiVAZ; PdW1J: $this->output_json($jdwl); goto VQ9QL; mEj0J: $kelas = $this->input->get("\x69\x64\137\x6b\145\x6c\x61\163"); goto lbgD4; aurVX: goto AOAXv; goto fV6cr; A45zz: foreach ($jadwals as $jadwal) { goto PIJAU; msGe8: xHNEp: goto XDQjw; HdWTd: foreach ($kls as $kl) { goto uQfdq; Hd7Vv: ovGQp: goto jReHF; uQfdq: if (!($kl["\153\x65\154\x61\163\137\x69\x64"] == $kelas)) { goto ovGQp; } goto rDFWv; rDFWv: $jdwl[$jadwal->id_jadwal] = $jadwal->bank_kode; goto Hd7Vv; jReHF: obM78: goto nn3zo; nn3zo: } goto msGe8; PIJAU: $kls = unserialize($jadwal->bank_kelas ?? ''); goto HdWTd; XDQjw: sSvmJ: goto A7og7; A7og7: } goto F6Imr; EUe2S: $jdwl = []; goto A45zz; AQVR_: if ($this->ion_auth->in_group("\x67\165\x72\165")) { goto uET21; } goto KL4oZ; Drkul: $smt = $this->dashboard->getSemesterActive(); goto AQVR_; xd8pd: $user = $this->ion_auth->user()->row(); goto FyNsn; KL4oZ: $id_guru = null; goto aurVX; X8fJB: AOAXv: goto YPZq0; F6Imr: gb0Gq: goto PdW1J; lbgD4: $tp = $this->dashboard->getTahunActive(); goto Drkul; VQ9QL: } public function getSiswaKelas() {
        $kelas = $this->input->get("kelas");
        $jadwal = $this->input->get("jadwal");
        
        $this->db->trans_start();
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        
        $info = $this->cbt->getJadwalById($jadwal);
        $siswas = $this->cbt->getSiswaByKelas($tp->id_tp, $smt->id_smt, $kelas);
        
        $durasies = $this->cbt->getDurasiSiswaByJadwal($jadwal);
        $logs = $this->cbt->getLogUjianByJadwal($jadwal);
        $pengawas = $this->cbt->getPengawasByJadwal($tp->id_tp, $smt->id_smt, $jadwal);
        
        $ids_pengawas = [];
        if ($pengawas && count($pengawas) > 0) {
            foreach ($pengawas as $pws) {
                $ids_pengawas = explode(",", $pws->id_guru ?? '');
            }
        }
        
        // Optimize loops from O(N*M) to O(N+M)
        $durMap = [];
        foreach ($durasies as $durasi) {
            $mulai = new DateTime($durasi->mulai);
            $interval = $mulai->diff(new DateTime());
            $minutes = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;
            $durasi->ada_waktu = $minutes < $info->durasi_ujian;
            
            if ($durasi->lama_ujian == null) {
                $mins = (strtotime($durasi->selesai) - strtotime($durasi->mulai)) / 60;
                $durasi->lama_ujian = round($mins, 2) . " m";
            } else {
                $lamanya = $durasi->lama_ujian;
                if (strpos($lamanya, ":") !== false) {
                    $elap = explode(":", $lamanya ?? '');
                    $ed = $elap[2] == "00" ? 0 : 1;
                    $ej = $elap[0] == "00" ? '' : intval($elap[0]) . " j ";
                    $em = $elap[1] == "00" ? '' : intval($elap[1]) + $ed . " m";
                    $dd = $ej . $em;
                    $durasi->lama_ujian = $dd == '' ? "0 m" : $dd;
                } else {
                    $durasi->lama_ujian .= "m";
                }
            }
            $durMap[$durasi->id_siswa] = $durasi;
        }
        
        $logMap = [];
        foreach ($logs as $log) {
            $logMap[$log->id_siswa][] = $log;
        }
        
        $arrDur = [];
        foreach ($siswas as $siswa) {
            $dur_siswa = isset($durMap[$siswa->id_siswa]) ? $durMap[$siswa->id_siswa] : null;
            $log_siswa = isset($logMap[$siswa->id_siswa]) ? $logMap[$siswa->id_siswa] : [];
            $arrDur[$siswa->id_siswa] = ["dur" => $dur_siswa, "log" => $log_siswa];
        }
        
        $this->db->trans_complete();
        
        $data["siswa"] = $siswas;
        $data["durasi"] = $arrDur;
        $data["info"] = $info;
        $data["pengawas"] = $this->master->getGuruByArrId($ids_pengawas);
        
        $this->output_json($data);
    } public function getSiswaRuang() {
        $ruang = $this->input->get("ruang");
        $sesi = $this->input->get("sesi");
        $jadwal = $this->input->get("jadwal");
        
        $this->db->trans_start();
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        
        $info = $this->cbt->getJadwalById($jadwal);
        $siswas = $this->cbt->getSiswaByRuang($tp->id_tp, $smt->id_smt, $ruang, $sesi, $info->bank_level);
        
        $durasies = $this->cbt->getDurasiSiswaByJadwal($jadwal);
        $logs = $this->cbt->getLogUjianByJadwal($jadwal);
        $pengawas = $this->cbt->getPengawasByJadwal($tp->id_tp, $smt->id_smt, $jadwal, $sesi, $ruang);
        
        $ids_pengawas = [];
        if ($pengawas && count($pengawas) > 0) {
            foreach ($pengawas as $pws) {
                $ids_pengawas = explode(",", $pws->id_guru ?? '');
            }
        }
        
        // Optimize loops from O(N*M) to O(N+M)
        $durMap = [];
        foreach ($durasies as $durasi) {
            $mulai = new DateTime($durasi->mulai);
            $interval = $mulai->diff(new DateTime());
            $minutes = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;
            $durasi->ada_waktu = $minutes < $info->durasi_ujian;
            
            if ($durasi->lama_ujian == null) {
                $mins = (strtotime($durasi->selesai) - strtotime($durasi->mulai)) / 60;
                $durasi->lama_ujian = round($mins, 2) . " m";
            } else {
                $lamanya = $durasi->lama_ujian;
                if (strpos($lamanya, ":") !== false) {
                    $elap = explode(":", $lamanya ?? '');
                    $ed = $elap[2] == "00" ? 0 : 1;
                    $ej = $elap[0] == "00" ? '' : intval($elap[0]) . " j ";
                    $em = $elap[1] == "00" ? '' : intval($elap[1]) + $ed . " m";
                    $dd = $ej . $em;
                    $durasi->lama_ujian = $dd == '' ? "0 m" : $dd;
                } else {
                    $durasi->lama_ujian .= "m";
                }
            }
            $durMap[$durasi->id_siswa] = $durasi;
        }
        
        $logMap = [];
        foreach ($logs as $log) {
            $logMap[$log->id_siswa][] = $log;
        }
        
        $arrDur = [];
        foreach ($siswas as $siswa) {
            $dur_siswa = isset($durMap[$siswa->id_siswa]) ? $durMap[$siswa->id_siswa] : null;
            $log_siswa = isset($logMap[$siswa->id_siswa]) ? $logMap[$siswa->id_siswa] : [];
            $arrDur[$siswa->id_siswa] = ["dur" => $dur_siswa, "log" => $log_siswa];
        }
        
        $this->db->trans_complete();
        
        $data["siswa"] = $siswas;
        $data["durasi"] = $arrDur;
        $data["info"] = $info;
        $data["pengawas"] = $this->master->getGuruByArrId($ids_pengawas);
        
        $this->output_json($data);
    } public function detail() { goto FYsLt; DU3JS: $this->load->view("\143\142\164\57\x73\x74\x61\164\165\x73\x2f\144\x65\164\141\151\x6c"); goto dCjuy; PZuNM: $data["\x67\165\162\165"] = $guru; goto aYG3E; FYsLt: $siswa = $this->input->get("\163\x69\x73\x77\141"); goto oR5Yz; dCjuy: $this->load->view("\137\x74\145\x6d\x70\154\x61\164\145\163\57\144\x61\163\x68\x62\x6f\x61\x72\144\57\137\x66\x6f\x6f\x74\145\162"); goto qLZG1; V31ve: $user = $this->ion_auth->user()->row(); goto h9AsH; odCc7: $data["\164\160"] = $this->dashboard->getTahun(); goto znrUO; h9AsH: $data = ["\x75\x73\145\x72" => $user, "\152\165\144\165\154" => "\104\x65\164\141\x69\x6c\x20\x53\164\x61\164\165\163\40\123\x69\163\167\x61", "\x73\165\x62\x6a\x75\144\x75\x6c" => "\x53\164\x61\164\165\x73\x20\x53\151\x73\167\x61", "\x73\x65\x74\164\151\156\147" => $this->dashboard->getSetting()]; goto zic8c; VWL1_: $smt = $this->dashboard->getSemesterActive(); goto odCc7; l7UCl: $data["\160\162\x6f\146\151\154\145"] = $this->dashboard->getProfileAdmin($user->id); goto jwB_l; aYG3E: $this->load->view("\155\145\x6d\142\x65\x72\x73\x2f\147\165\x72\x75\x2f\x74\145\x6d\x70\154\x61\x74\145\163\x2f\x68\x65\x61\x64\x65\x72", $data); goto TOaap; znrUO: $data["\x74\x70\137\x61\x63\164\x69\x76\x65"] = $tp; goto c139O; IcF1r: goto lL207; goto V_tNK; qLZG1: lL207: goto QvE1f; GES8i: $data["\163\155\164\x5f\141\x63\164\151\x76\145"] = $smt; goto z6RLi; z6RLi: $data["\x73\x69\163\x77\141"] = $this->master->getSiswaById($siswa); goto SaoZs; c139O: $data["\x73\x6d\164"] = $this->dashboard->getSemester(); goto GES8i; jwB_l: $this->load->view("\137\164\x65\x6d\160\154\x61\164\145\163\57\144\x61\163\150\142\157\141\x72\144\57\137\150\x65\x61\x64\145\x72", $data); goto DU3JS; TOaap: $this->load->view("\143\142\164\x2f\163\164\x61\x74\165\x73\x2f\144\x65\164\141\x69\x6c"); goto wyQXq; wyQXq: $this->load->view("\x6d\x65\x6d\142\145\x72\163\57\x67\x75\162\x75\57\164\145\155\160\x6c\x61\x74\145\x73\x2f\x66\x6f\157\x74\145\x72"); goto IcF1r; F5TgH: $guru = $this->dashboard->getDataGuruByUserId($user->id, $tp->id_tp, $smt->id_smt); goto PZuNM; SaoZs: $data["\x73\157\x61\154"] = $this->cbt->getSoalSiswaByJadwal($jadwal, $siswa); goto e2s9n; oR5Yz: $jadwal = $this->input->get("\152\141\144\x77\x61\154"); goto V31ve; zic8c: $tp = $this->dashboard->getTahunActive(); goto VWL1_; e2s9n: if ($this->ion_auth->is_admin()) { goto spnbn; } goto F5TgH; V_tNK: spnbn: goto l7UCl; QvE1f: } }
