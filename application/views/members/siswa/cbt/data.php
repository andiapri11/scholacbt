<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

$arrGuru = [];
foreach ($guru as $g) {
    $arrGuru[$g->id_guru] = $g->nama_guru;
}

$jam_pertama = null;
$jadwal_selesai = [];
$cbt_setting = [];
?>
<div class="content-wrapper bg-light">
    <style>

        .premium-section-card {
            background: #ffffff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
            height: 100%;
            transition: all 0.3s ease;
        }
        .activity-header {
            padding: 1.5rem 2rem;
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
        }
        .activity-header h5 {
            font-weight: 800;
            color: #1e293b;
            margin: 0;
            font-size: 1.15rem;
            letter-spacing: -0.025em;
        }
        
        /* Exam Card Styling */
        .card-exam-item {
            border-radius: 18px;
            border: 1px solid #f1f5f9;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #fff;
            position: relative;
            overflow: hidden;
        }
        .card-exam-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border-color: #4361ee;
        }
        .subject-badge {
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 6px 12px;
            border-radius: 8px;
        }
        .rules-box {
            background: #fff5f5;
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid #fee2e2;
        }
        .rules-item {
            display: flex;
            align-items: start;
            margin-bottom: 10px;
            color: #7f1d1d;
            font-size: 0.9rem;
        }
        .rules-item i {
            margin-top: 4px;
            margin-right: 12px;
            color: #ef4444;
        }
    </style>

    <div class="container pt-5">
    </div>

    <section class="content px-4">
        <div class="container">
            <div class="row">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="premium-section-card">
                        <div class="activity-header">
                            <h5><i class="fas fa-info-circle mr-3 text-info"></i> INFO PESERTA & ATURAN</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-5 mb-4 mb-md-0">
                                    <?php if ($cbt_info == null) : ?>
                                        <div class="alert alert-light border text-center p-4">
                                            <i class="fas fa-calendar-times fa-2x text-muted mb-3"></i>
                                            <p class="mb-0 text-muted font-weight-bold">Tidak ada jadwal penilaian aktif saat ini.</p>
                                        </div>
                                    <?php else: ?>
                                        <div class="bg-light p-4 rounded-lg border">
                                            <h5 class="font-weight-bold text-dark mb-3"><i class="fas fa-user-circle mr-2"></i> <?= $siswa->nama ?></h5>
                                            <ul class="list-group list-group-flush bg-transparent">
                                                <?php
                                                $arrTitle = ['No. Peserta', 'Ruang', 'Sesi', 'Dari', 'Sampai'];
                                                $waktu_mulai = isset($cbt_info->waktu_mulai) ? substr($cbt_info->waktu_mulai, 0, -3) : '';
                                                $waktu_akhir = isset($cbt_info->waktu_akhir) ? substr($cbt_info->waktu_akhir, 0, -3) : '';
                                                $arrSub = [$cbt_info->no_peserta->nomor_peserta ?? '', $cbt_info->nama_ruang ?? '', $cbt_info->nama_sesi ?? '', $waktu_mulai, $waktu_akhir];
                                                foreach ($arrTitle as $key => $title) :
                                                    $val = $arrSub[$key];
                                                    if ($val == null || $val === '') {
                                                        array_push($cbt_setting, $title);
                                                        $val = '<i class="text-danger small">Belum diisi</i>';
                                                    }
                                                    ?>
                                                    <li class="list-group-item bg-transparent px-0 d-flex justify-content-between align-items-center">
                                                        <span class="text-muted"><?= $title ?></span>
                                                        <span class="font-weight-bold text-dark"><?= $val ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-7">
                                    <div class="rules-box">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-danger text-white rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
                                            <h6 class="font-weight-extrabold mb-0 text-danger">TATA TERTIB PESERTA</h6>
                                        </div>
                                        <div class="rules-item"><i class="fas fa-check-circle"></i> <span><b>Dilarang Keluar Ruangan</b> tanpa izin pengawas selama ujian berlangsung.</span></div>
                                        <div class="rules-item"><i class="fas fa-check-circle"></i> <span><b>Dilarang Logout</b> sebelum ujian selesai atau tanpa instruksi khusus.</span></div>
                                        <div class="rules-item"><i class="fas fa-check-circle"></i> <span><b>Dilarang Bekerjasama</b> atau menggunakan alat bantu ilegal (contek).</span></div>
                                        <div class="rules-item"><i class="fas fa-check-circle"></i> <span><b>HP & Perangkat Lain</b> wajib dititipkan kepada pengawas/proktor.</span></div>
                                        <div class="rules-item"><i class="fas fa-check-circle"></i> <span><b>Ketertiban</b> adalah faktor penilaian kelulusan integritas Anda.</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="premium-section-card">
                        <div class="activity-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock mr-3 text-warning"></i>
                                <div>
                                    <h5 class="mb-0">JADWAL HARI INI</h5>
                                    <small class="text-muted text-uppercase font-weight-bold"><?= buat_tanggal(date('D, d M Y')) ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row" id="jadwal-content">
                                <?php
                                if ($cbt_info == null || count($cbt_setting) > 0) : ?>
                                    <div class="col-12">
                                        <div class="alert alert-light border-warning text-center p-5">
                                            <i class="fas fa-lock fa-3x text-warning mb-3"></i>
                                            <h5>Akses Ujian Terkunci</h5>
                                            <p class="text-muted">Hubungi Proktor atau Admin untuk informasi lebih lanjut.</p>
                                        </div>
                                    </div>
                                <?php else:
                                    $jamSesi = $cbt_info == null ? '0' : (isset($cbt_info->sesi_id) ? $cbt_info->sesi_id : $cbt_info->id_sesi);
                                    if (isset($cbt_jadwal[date('Y-m-d')]) && count($cbt_jadwal[date('Y-m-d')]) > 0) :
                                        foreach ($cbt_jadwal[date('Y-m-d')] as $key => $jadwal)  :
                                            $kk = unserialize($jadwal->bank_kelas ?? '');
                                            $arrKelasCbt = [];
                                            foreach ($kk as $k) {
                                                array_push($arrKelasCbt, $k['kelas_id']);
                                            }

                                            $startDay = strtotime($jadwal->tgl_mulai);
                                            $endDay = strtotime($jadwal->tgl_selesai);
                                            $today = strtotime(date('Y-m-d'));

                                            $hariMulai = new DateTime($jadwal->tgl_mulai);
                                            $hariSampai = new DateTime($jadwal->tgl_selesai);

                                            $sesiMulai = new DateTime($sesi[$jamSesi]['mulai']);
                                            $sesiSampai = new DateTime($sesi[$jamSesi]['akhir']);
                                            $now = strtotime(date('H:i'));

                                            $durasi = $elapsed[$jadwal->id_jadwal];
                                            $jadwal_selesai[$jadwal->tgl_mulai][$jadwal->jam_ke] = $durasi != null
                                                ? $durasi->status == '2'
                                                : false;

                                            // Determine colors and status
                                            if ($durasi != null) {
                                                $selesai = $durasi->selesai != null;
                                                $lanjutkan = $durasi->lama_ujian != null;
                                                $reset = $durasi->reset;
                                                if ($lanjutkan != null && !$selesai) $statusColor = 'warning';
                                                elseif ($selesai) $statusColor = 'success';
                                                else $statusColor = 'danger';
                                            } else {
                                                $selesai = false;
                                                $lanjutkan = false;
                                                $reset = 0;
                                                $statusColor = 'danger';
                                            }
                                            
                                            $jam_ke = $jadwal->jam_ke == '0' ? '1' : $jadwal->jam_ke;
                                            ?>
                                            <div class="col-md-6 col-lg-4 mb-4">
                                                <div class="card-exam-item h-100 d-flex flex-column">
                                                    <div class="p-4 flex-grow-1">
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <span class="subject-badge bg-soft-primary text-primary">JAM KE-<?= $jam_ke ?></span>
                                                            <span class="text-xs font-weight-extrabold text-muted"><i class="fas fa-hourglass-half mr-1"></i> <?= $jadwal->durasi_ujian ?> MIN</span>
                                                        </div>
                                                        <h5 class="font-weight-extrabold text-dark mb-1" style="font-size: 1.1rem; line-height: 1.3"><?= $jadwal->nama_mapel ?></h5>
                                                        <div class="text-muted small font-weight-bold mb-3 uppercase tracking-wider"><?= $jadwal->nama_jenis ?></div>
                                                        
                                                        <div class="d-flex align-items-center text-xs text-muted bg-light p-2 rounded-lg">
                                                            <i class="far fa-clock mr-2 text-primary"></i>
                                                            <span class="font-weight-bold"><?= $sesi[$jamSesi]['mulai'] ?> — <?= $sesi[$jamSesi]['akhir'] ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="p-3 bg-light-50 border-top mt-auto">
                                                        <?php
                                                        if (!$lanjutkan && $reset == 0 && !$selesai) : ?>
                                                            <?php if ($today < $startDay) : ?>
                                                                <button class="btn btn-secondary btn-block rounded-lg disabled font-weight-bold" disabled>
                                                                    <i class="fas fa-lock mr-2"></i> BELUM DIMULAI
                                                                </button>
                                                            <?php elseif ($today > $endDay) : ?>
                                                                <button class="btn btn-danger btn-block rounded-lg disabled font-weight-bold" disabled style="opacity: 0.6">
                                                                    <i class="fas fa-calendar-times mr-2"></i> KEDALUWARSA
                                                                </button>
                                                            <?php else: ?>
                                                                <?php if ($now < strtotime($sesiMulai->format('H:i'))) : ?>
                                                                    <button class="btn btn-warning btn-block rounded-lg disabled font-weight-bold text-white" disabled>
                                                                        <i class="fas fa-hourglass-start mr-2"></i> BELUM SESINYA
                                                                    </button>
                                                                <?php elseif ($now > strtotime($sesiSampai->format('H:i'))) : ?>
                                                                    <button class="btn btn-danger btn-block rounded-lg disabled font-weight-bold" disabled>
                                                                        <i class="fas fa-hourglass-end mr-2"></i> SESI BERAKHIR
                                                                    </button>
                                                                <?php else : ?>
                                                                    <?php if (isset($jadwal_selesai[$jadwal->tgl_mulai][$jadwal->jam_ke - 1]) && $jadwal_selesai[$jadwal->tgl_mulai][$jadwal->jam_ke - 1] == false) : ?>
                                                                        <button class="btn btn-info btn-block rounded-lg disabled font-weight-bold text-white" disabled>
                                                                            <i class="fas fa-spinner fa-spin mr-2"></i> ANTRIAN UJIAN
                                                                        </button>
                                                                    <?php else : ?>
                                                                        <button onclick="location.href='<?= base_url('siswa/konfirmasi/' . $jadwal->id_jadwal) ?>'"
                                                                                class="btn btn-primary btn-block rounded-lg shadow-sm font-weight-extrabold py-2"
                                                                                style="letter-spacing: 0.5px;">
                                                                            KERJAKAN SEKARANG <i class="fas fa-arrow-right ml-2"></i>
                                                                        </button>
                                                                    <?php endif; endif; endif; ?>
                                                        <?php elseif ($lanjutkan && !$selesai) : ?>
                                                            <button onclick="location.href='<?= base_url('siswa/konfirmasi/' . $jadwal->id_jadwal) ?>'"
                                                                    class="btn btn-warning btn-block rounded-lg shadow-sm font-weight-extrabold text-white py-2">
                                                                LANJUTKAN UJIAN <i class="fas fa-play ml-2"></i>
                                                            </button>
                                                        <?php else : ?>
                                                            <div class="py-2 text-center text-success font-weight-extrabold">
                                                                <i class="fas fa-check-circle mr-2"></i> UJIAN SELESAI
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            endforeach;
                                        else: ?>
                                            <div class="col-12">
                                                <div class="text-center py-5 text-muted">
                                                    <i class="fas fa-mug-hot fa-3x mb-3 text-gray-300"></i>
                                                    <p class="font-weight-bold">Tidak ada jadwal penilaian hari ini.</p>
                                                    <small>Silakan istirahat atau pelajari materi untuk ujian berikutnya.</small>
                                                </div>
                                            </div>
                                        <?php
                                        endif;
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-5">
                    <div class="premium-section-card">
                        <div class="activity-header">
                            <h5><i class="fas fa-history mr-3 text-secondary"></i> JADWAL PENILAIAN SEBELUMNYA</h5>
                        </div>
                        <div class="card-body p-4">
                            <?php
                            $hasHistory = false;
                            foreach ($cbt_jadwal as $tgl => $jadwals) {
                                if ($tgl != date('Y-m-d')) {
                                    $hasHistory = true;
                                    break;
                                }
                            }

                            if (!$hasHistory): ?>
                                <div class="text-center py-5 text-muted">
                                    <i class="fas fa-history fa-3x mb-3 text-gray-300"></i>
                                    <p class="font-weight-bold">Tidak ada riwayat penilaian.</p>
                                </div>
                            <?php else:
                                foreach ($cbt_jadwal as $tgl => $jadwals) :
                                    if ($tgl != date('Y-m-d')) : ?>
                                        <div class="d-flex align-items-center mb-3 mt-4">
                                            <i class="far fa-calendar-alt text-muted mr-2"></i>
                                            <h6 class="text-secondary font-weight-bold mb-0">
                                                <?= buat_tanggal(date('D, d M Y', strtotime($tgl))) ?>
                                            </h6>
                                            <div class="flex-grow-1 ml-3 border-bottom"></div>
                                        </div>
                                        <div class="row">
                                            <?php
                                            foreach ($jadwals as $key => $jadwal) :
                                                $jam_ke = $jadwal->jam_ke == '0' ? '1' : $jadwal->jam_ke;
                                                $jamSesi = $cbt_info == null ? '0' : (isset($cbt_info->sesi_id) ? $cbt_info->sesi_id : $cbt_info->id_sesi); // Re-declare or ensure scope if needed, though usually available

                                                $startDay = strtotime($jadwal->tgl_mulai);
                                                $endDay = strtotime($jadwal->tgl_selesai);
                                                $today = strtotime(date('Y-m-d'));
                                                $now = strtotime(date('H:i'));
                                                
                                                // Assuming $sesi is available globally in view as passed from controller
                                                $sesiMulai = new DateTime($sesi[$jamSesi]['mulai']);
                                                $sesiSampai = new DateTime($sesi[$jamSesi]['akhir']);

                                                $durasi = $elapsed[$jadwal->id_jadwal];
                                                $jadwal_selesai[$jadwal->tgl_mulai][$jadwal->jam_ke] = $durasi != null
                                                    ? $durasi->status == '2'
                                                    : false;
                                                
                                                $selesai = false;
                                                $lanjutkan = false;
                                                $reset = 0;

                                                if ($durasi != null) {
                                                    $selesai = $durasi->selesai != null;
                                                    $lanjutkan = $durasi->lama_ujian != null;
                                                    $reset = $durasi->reset;
                                                }

                                                $statusBtn = '';
                                                $btnClass = "btn btn-block rounded-pill font-weight-bold shadow-sm py-2";

                                                if (!$lanjutkan && $reset == 0 && !$selesai) {
                                                    if ($today < $startDay) {
                                                        $statusBtn = '<button class="' . $btnClass . ' btn-secondary disabled" disabled><i class="fas fa-lock mr-2"></i>BELUM DIMULAI</button>';
                                                    } elseif ($today > $endDay) {
                                                        $statusBtn = '<button class="' . $btnClass . ' btn-secondary disabled" disabled><i class="fas fa-calendar-times mr-2"></i> SUDAH BERAKHIR</button>';
                                                    } else {
                                                        // Fallback logic for same day mixed in list? (Unlikely due to if check above)
                                                         $statusBtn = '<button class="' . $btnClass . ' btn-secondary disabled" disabled>BERAKHIR</button>';
                                                    }
                                                } elseif ($lanjutkan && !$selesai) {
                                                     $statusBtn = '<button class="' . $btnClass . ' btn-warning text-white" onclick="location.href=\'' . base_url() . 'siswa/konfirmasi/' . $jadwal->id_jadwal . '\'"><i class="fas fa-play mr-2"></i> LANJUTKAN</button>';
                                                } else {
                                                    $statusBtn = '<button class="' . $btnClass . ' btn-success disabled" disabled><i class="fas fa-check-circle mr-2"></i> SELESAI</button>';
                                                }
                                                ?>
                                                <div class="col-md-6 col-lg-4 mb-4">
                                                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 1rem; overflow: hidden; background: #fff;">
                                                        <div class="card-body p-4 d-flex flex-column">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <span class="badge badge-soft-secondary px-3 py-1 rounded-pill">Jam Ke-<?= $jam_ke ?></span>
                                                                <small class="text-muted font-weight-bold"><i class="fas fa-clock mr-1"></i> <?= $jadwal->durasi_ujian ?>m</small>
                                                            </div>
                                                            <h6 class="font-weight-bold text-dark mb-1"><?= $jadwal->nama_mapel ?></h6>
                                                            <span class="text-xs text-muted mb-4 d-block"><?= $jadwal->nama_jenis ?></span>
                                                            
                                                            <div class="mt-auto">
                                                                <?= $statusBtn ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif;
                                endforeach;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
