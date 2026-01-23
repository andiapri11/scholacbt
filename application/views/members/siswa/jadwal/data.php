<?php
/**
 * Adjusted for Exam Schedule only (Jadwal Ujian)
 * Based on date-specific scheduling rather than weekly rhythm
 */
$CI =& get_instance();
if (!isset($CI->cbt)) {
    $CI->load->model('Cbt_model', 'cbt');
}

// Fetch all exam schedules for this level/class
$cbt_jadwal = $CI->cbt->getJadwalCbt($tp_active->id_tp, $smt_active->id_smt, $siswa->level_id);

// Group by Date
$grouped_jadwal = [];
if ($cbt_jadwal) {
    foreach ($cbt_jadwal as $j) {
        // Filter for this student's class (same logic as dashboard/cbt method)
        $kk = unserialize($j->bank_kelas ?? '');
        $arrKelasCbt = [];
        if (is_array($kk)) {
            foreach ($kk as $k) {
                if (isset($k['kelas_id'])) array_push($arrKelasCbt, $k['kelas_id']);
            }
        }
        
        if (in_array($siswa->id_kelas, $arrKelasCbt)) {
            $date = date('Y-m-d', strtotime($j->tgl_mulai));
            $grouped_jadwal[$date][] = $j;
        }
    }
    ksort($grouped_jadwal);
}

// Helper for Indonesian Months
function tgl_indo($tanggal) {
    $bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

function hari_indo($date) {
    $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    return $days[date('w', strtotime($date))];
}
?>

<div class="content-wrapper bg-light">
    <style>
        .premium-section-card {
            background: #ffffff;
            border-radius: 1.5rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            overflow: hidden;
            height: 100%;
        }
        .activity-header {
            padding: 1.5rem 2rem;
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .activity-header h5 {
            font-weight: 800;
            color: #1e293b;
            margin: 0;
            display: flex;
            align-items: center;
            font-size: 1.1rem;
            letter-spacing: -0.025em;
        }

        .date-section {
            margin-bottom: 2.5rem;
            position: relative;
        }
        .date-sticky-header {
            position: sticky;
            top: 60px;
            z-index: 100;
            background: #f8fafc;
            padding: 1rem 1.5rem;
            margin: 0 0 1.5rem 0;
            border-radius: 1rem;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }
        .date-sticky-header h6 {
            margin: 0;
            font-weight: 800;
            color: #1e293b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }
        .date-badge {
            background: linear-gradient(135deg, #6366f1 0%, #4338ca 100%);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(99, 102, 241, 0.2);
        }

        .exam-item-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.25rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }
        .exam-item-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: #3b82f6;
        }
        .exam-item-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            transform: translateX(5px);
        }
        .exam-time-box {
            min-width: 100px;
            text-align: center;
            padding: 10px;
            background: #eff6ff;
            border-radius: 12px;
            border: 1px solid #dbeafe;
        }
        .exam-time-range {
            font-size: 0.9rem;
            font-weight: 800;
            color: #2563eb;
            display: block;
        }
        .exam-label {
            font-size: 0.65rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        @media (max-width: 576px) {
            .activity-header { padding: 1.25rem !important; }
            .exam-item-card { flex-direction: column; align-items: flex-start; gap: 1rem; }
            .exam-time-box { width: 100%; text-align: left; display: flex; justify-content: space-between; align-items: center; }
            .date-sticky-header { top: 60px; padding: 0.85rem 1rem; }
        }
    </style>

    <div class="container pt-5">
    </div>

    <section class="content px-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="premium-section-card">
                        <div class="activity-header">
                            <div>
                                <h5 class="mb-1"><i class="fas fa-calendar-alt mr-3 text-primary"></i> JADWAL UJIAN</h5>
                                <small class="text-muted font-weight-bold">
                                    <i class="fas fa-graduation-cap mr-1"></i> Kelas <?= $siswa->nama_kelas ?> &bull; 
                                    TP <?= $tp_active->tahun ?> (Sem <?= $smt_active->smt ?>)
                                </small>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <?php if (count($grouped_jadwal) > 0) : ?>
                                <?php foreach ($grouped_jadwal as $date => $exams) : ?>
                                    <div class="date-section">
                                        <div class="date-sticky-header">
                                            <h6><i class="far fa-calendar-check mr-3 text-primary"></i> <?= hari_indo($date) ?></h6>
                                            <div class="date-badge"><?= tgl_indo($date) ?></div>
                                        </div>

                                        <div class="timeline-content">
                                            <?php foreach ($exams as $uj) : ?>
                                                <div class="exam-item-card">
                                                    <div class="exam-time-box">
                                                        <span class="exam-label">Waktu</span>
                                                        <span class="exam-time-range">
                                                            <?= date('H:i', strtotime($uj->jam_ke)) ?>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="font-weight-bold mb-1 text-dark" style="font-size: 1.1rem;"><?= $uj->nama_mapel ?></h6>
                                                        <div class="d-flex flex-wrap gap-3 text-muted" style="font-size: 0.8rem;">
                                                            <span class="mr-3"><i class="fas fa-file-alt mr-1"></i> <?= $uj->kode_jenis ?></span>
                                                            <span><i class="far fa-clock mr-1"></i> <?= $uj->durasi_ujian ?> Menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-md-block text-right">
                                                        <div class="exam-label">Metode</div>
                                                        <span class="badge badge-soft-success px-3 py-2 rounded-pill font-weight-bold">
                                                            Computer Based Test
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="text-center py-5">
                                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow-inner" style="width: 120px; height: 120px;">
                                        <i class="fas fa-calendar-times fa-4x text-muted opacity-25"></i>
                                    </div>
                                    <h4 class="font-weight-bold text-dark">Belum Ada Jadwal Ujian</h4>
                                    <p class="text-muted">Jadwal ujian untuk kelas Anda belum tersedia pada periode ini.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
