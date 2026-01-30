<style>
    :root {
        --primary-brand: #4361ee;
        --secondary-brand: #3f37c9;
        --dark-brand: #1b263b;
        --bg-main: #f0f2f5;
        --card-border: #e9ecef;
        --card-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
    }

    .content-wrapper {
        background: var(--bg-main) !important;
    }

    .dashboard-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 40px 0 80px 0;
        color: white;
        border-bottom-left-radius: 24px;
        border-bottom-right-radius: 24px;
        position: relative;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .dashboard-header h2 {
        font-size: 1.6rem;
        letter-spacing: -0.5px;
        font-weight: 700;
    }

    @media (max-width: 576px) {
        .dashboard-header h2 {
            font-size: 0.95rem;
            white-space: nowrap;
            letter-spacing: -0.2px;
            padding: 0 5px;
        }
        .dashboard-header p {
            font-size: 0.7rem !important;
        }
        .academic-pill {
            font-size: 0.65rem !important;
            padding: 4px 12px !important;
        }
    }

    .academic-pill {
        display: inline-block;
        background: rgba(255, 255, 255, 0.15);
        color: white;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-top: 12px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        letter-spacing: 0.5px;
        text-transform: uppercase;
        backdrop-filter: blur(4px);
    }

    .stat-card {
        border: 1px solid var(--card-border);
        border-radius: 12px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        background: white;
        z-index: 10;
        box-shadow: var(--card-shadow);
        position: relative;
    }

    .stat-cards-row {
        margin-top: -50px;
        position: relative;
        z-index: 10;
    }

    @media (max-width: 991px) {
        .stat-cards-row {
            margin-top: -30px;
        }
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }

    .stat-card .inner {
        padding: 20px;
    }

    .stat-card h5 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 2px;
        color: #212529;
    }

    .stat-card span {
        font-size: 0.75rem;
        color: #adb5bd;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .stat-card .icon-box {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
        font-size: 1.1rem;
    }

    .stat-card.bg-blue .icon-box { background: #e7f0ff; color: #4361ee; }
    .stat-card.bg-teal .icon-box { background: #e6fffa; color: #38b2ac; }
    .stat-card.bg-orange .icon-box { background: #fffaf0; color: #ed8936; }
    .stat-card.bg-pink .icon-box { background: #fff5f7; color: #d53f8c; }
    .stat-card.bg-indigo .icon-box { background: #ebf4ff; color: #5a67d8; }
    .stat-card.bg-green .icon-box { background: #e3f9ef; color: #2ec4b6; }
    .stat-card.bg-yellow .icon-box { background: #fff8e6; color: #ff9f1c; }
    .stat-card.bg-red .icon-box { background: #fbe9e7; color: #e71d36; }

    .stat-card[class*="bg-"] {
        background: white !important;
    }

    .card-modern {
        border: 1px solid var(--card-border);
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        background: white;
        margin-bottom: 24px;
        overflow: hidden;
    }

    .card-modern .card-header {
        background: #fff;
        border-bottom: 1px solid #f1f3f5;
        padding: 18px 20px;
    }

    .card-modern .card-title {
        font-weight: 700;
        color: #495057;
        font-size: 0.95rem;
        letter-spacing: 0.2px;
        text-transform: uppercase;
    }

    .btn-action {
        width: 30px;
        height: 30px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f1f3f5;
        color: #495057;
        transition: all 0.2s;
    }

    .btn-action:hover {
        background: var(--primary-brand);
        color: white !important;
    }

    .token-box {
        background: #f8f9fa;
        padding: 24px;
        border-radius: 12px;
        text-align: center;
        border: 1.5px dashed #dee2e6;
    }

    .token-value {
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: 4px;
        margin: 12px 0;
        color: #212529;
        font-family: 'Courier New', Courier, monospace;
    }

    .jadwal-table th {
        background: #f8f9fa;
        font-weight: 700;
        color: #868e96;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .jadwal-table td {
        vertical-align: middle;
        padding: 14px 12px;
        border-top: 1px solid #f1f3f5;
        font-size: 0.9rem;
    }

    .info-box-sm {
        border-radius: 10px;
        padding: 16px;
        border: 1px solid #f1f3f5;
        transition: all 0.2s;
        height: 100%;
        background: white;
    }

    .info-box-sm:hover {
        background: #fafbfc;
        transform: translateY(-2px);
    }

    .nav-pills-modern .nav-link {
        border-radius: 8px;
        padding: 6px 14px;
        font-weight: 600;
        color: #868e96;
        margin-right: 6px;
        font-size: 0.8rem;
    }

    .nav-pills-modern .nav-link.active {
        background: var(--primary-brand) !important;
        box-shadow: 0 4px 8px rgba(67, 97, 238, 0.2);
    }

    .activity-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        color: var(--primary-brand);
        font-weight: 700;
        font-size: 0.9rem;
    }

    /* Pacman Loader Styling */
    .pacman-loader-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        padding: 2rem 0;
    }
    .pacman-loader {
        width: 45px;
        aspect-ratio: 1;
        border-radius: 50%;
        background:
            radial-gradient(farthest-side,#000 98%,#0000) 55% 20%/8px 8px no-repeat,  
            #ffcc00;
        box-shadow: 2px -6px 12px 0px inset rgba(0, 0, 0, 0.7);
        animation: l4 .5s infinite steps(5) alternate;
    }
    @keyframes l4{ 
        0% {clip-path: polygon(50% 50%,100%   0,100% 0,0 0,0 100%,100% 100%,100% 100%)}
        100% {clip-path: polygon(50% 50%,100% 65%,100% 0,0 0,0 100%,100% 100%,100%  35%)}
    }
    .loader-text {
        font-size: 0.75rem;
        font-weight: 700;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
</style>

<div class="content-wrapper">
    <!-- Header Section -->
    <div class="dashboard-header">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <h2 class="mb-1">Selamat Datang, <?= $user->first_name . ' ' . $user->last_name ?></h2>
                    <p class="mb-0 opacity-75 small font-weight-bold" style="letter-spacing: 0.5px">
                        <i class="far fa-calendar-alt mr-1"></i> <?= buat_tanggal(date('D, d M Y')) ?> 
                        <span class="mx-2">|</span>
                        <i class="far fa-clock mr-1"></i> <span id="clock-header"></span>
                    </p>
                    <div class="academic-pill">
                        TP: <?= isset($tp_active) ? $tp_active->tahun : "Belum di set" ?> 
                        <span class="mx-2 opacity-50">•</span>
                        SMT: <?= isset($smt_active) ? $smt_active->nama_smt : "Belum di set" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <section class="content container-fluid px-4">
        <div class="row justify-content-center stat-cards-row">
            <!-- Token Card -->
            <div class="col-lg col-md-4 col-6 mb-4">
                <div class="stat-card bg-red">
                    <div class="inner">
                        <div class="icon-box">
                            <i class="fas fa-key"></i>
                        </div>
                        <h5 id="token-view"><?= $token->token != null ? $token->token : '- - -' ?></h5>
                        <span>TOKEN AKTIF</span>
                    </div>
                </div>
            </div>
            <?php 
            $colors = ['blue', 'teal', 'orange', 'indigo'];
            $icons = [
                'Siswa' => 'fa-user-graduate',
                'Rombel' => 'fa-chalkboard',
                'Guru' => 'fa-user-tie',
                'Mapel' => 'fa-book-open'
            ];
            $i = 0;
            foreach ($info_box as $info) : 
                if ($info->title == 'Ekstrakurikuler' || $info->title == 'Wali Kelas') continue;
                $color = $colors[$i % count($colors)];
                $icon = isset($icons[$info->title]) ? $icons[$info->title] : 'fa-'.$info->icon;
            ?>
                <div class="col-lg col-md-4 col-6 mb-4">
                    <div class="stat-card bg-<?= $color ?>">
                        <div class="inner">
                            <div class="icon-box">
                                <i class="fas <?= $icon ?>"></i>
                            </div>
                            <h5><?= $info->total; ?></h5>
                            <span><?= $info->title; ?></span>
                        </div>
                        <a href="<?= base_url() . $info->url ?>" class="position-absolute" style="bottom: 12px; right: 15px; color: #ced4da;">
                            <i class="fas fa-arrow-right small"></i>
                        </a>
                    </div>
                </div>
            <?php $i++; endforeach; ?>
        </div>
        
        <!-- Server Monitoring Row (Admin Only) -->
        <?php if ($this->ion_auth->is_admin() && isset($system_stats)) : ?>
        <div class="row mt-2">
            <div class="col-12">
                <div class="card card-modern shadow-sm border-0" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-md-0 mb-3 border-right">
                                <div class="d-flex align-items-center">
                                    <div class="activity-icon bg-soft-primary mr-3">
                                        <i class="fas fa-server"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 font-weight-bold">Server Health</h6>
                                        <small class="text-muted">Real-time status</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 border-right">
                                <div class="px-2">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small font-weight-bold text-uppercase">CPU Load</span>
                                        <span class="small font-weight-bold"><?= $system_stats['cpu_usage'] ?><?= is_numeric($system_stats['cpu_usage']) ? '%' : '' ?></span>
                                    </div>
                                    <div class="progress progress-xxs mb-0" style="height: 6px;">
                                        <div class="progress-bar <?= is_numeric($system_stats['cpu_usage']) && $system_stats['cpu_usage'] > 80 ? 'bg-danger' : 'bg-primary' ?>" role="progressbar" style="width: <?= is_numeric($system_stats['cpu_usage']) ? $system_stats['cpu_usage'] : 0 ?>%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 border-right">
                                <div class="px-2">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small font-weight-bold text-uppercase">RAM Usage (<?= $system_stats['mem_total'] ?> GB)</span>
                                        <span class="small font-weight-bold"><?= $system_stats['mem_usage'] ?><?= is_numeric($system_stats['mem_usage']) ? '%' : '' ?></span>
                                    </div>
                                    <div class="progress progress-xxs mb-0" style="height: 6px;">
                                        <div class="progress-bar <?= is_numeric($system_stats['mem_usage']) && $system_stats['mem_usage'] > 80 ? 'bg-danger' : 'bg-success' ?>" role="progressbar" style="width: <?= is_numeric($system_stats['mem_usage']) ? $system_stats['mem_usage'] : 0 ?>%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="px-2">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small font-weight-bold text-uppercase">Disk Storage</span>
                                        <span class="small font-weight-bold"><?= $system_stats['disk_usage'] ?>%</span>
                                    </div>
                                    <div class="progress progress-xxs mb-0" style="height: 6px;">
                                        <div class="progress-bar <?= $system_stats['disk_usage'] > 90 ? 'bg-danger' : 'bg-warning' ?>" role="progressbar" style="width: <?= $system_stats['disk_usage'] ?>%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row mt-4">
            <!-- Main Column: Assessment and Announcements -->
            <div class="col-lg-12">
                <div class="card card-modern">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="fas fa-file-signature mr-2 text-primary"></i>Ringkasan Penilaian</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <?php foreach ($ujian_box as $info) : ?>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="info-box-sm text-center">
                                        <div class="text-muted small font-weight-bold mb-2"><?= strtoupper($info->title); ?></div>
                                        <div class="h3 font-weight-bold mb-2" style="color: var(--dark-brand)"><?= $info->total; ?></div>
                                        <a href="<?= base_url() . $info->url ?>" class="btn btn-xs btn-outline-primary px-3 rounded-pill">Kelola</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="section-divider mb-4 mt-2">
                            <h6 class="font-weight-bold text-uppercase small text-muted" style="letter-spacing: 1px">
                                <i class="far fa-clock mr-2"></i>Status Ujian Berlangsung (Hari Ini)
                            </h6>
                            <hr class="mt-2">
                        </div>

                        <div class="table-responsive">
                            <?php
                            $jadwal_ujian = $jadwals_ujian[date('Y-m-d')] ?? [];
                            if (count($jadwal_ujian) > 0) : ?>
                                <table id="tbl-penilaian" class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-center" width="50">NO</th>
                                            <th>RUANG & SESI</th>
                                            <th>MATA PELAJARAN</th>
                                            <th>PENGAWAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($ruangs as $ruang => $sesis) :
                                        foreach ($sesis as $sesi) :
                                            foreach ($jadwal_ujian as $jadwal) :
                                                $id_guru = isset($pengawas[$jadwal[0]->id_jadwal])
                                                && isset($pengawas[$jadwal[0]->id_jadwal][$ruang]) &&
                                                isset($pengawas[$jadwal[0]->id_jadwal][$ruang][$sesi->sesi_id])
                                                    ? explode(',', $pengawas[$jadwal[0]->id_jadwal][$ruang][$sesi->sesi_id]->id_guru ?? '')
                                                    : [];

                                                $total_peserta = 0;
                                                foreach ($jadwal as $jdw) {
                                                    foreach ($jdw->peserta as $peserta) {
                                                        $total_peserta += isset($peserta[$ruang]) && isset($peserta[$ruang][$sesi->sesi_id]) ? count($peserta[$ruang][$sesi->sesi_id]) : 0;
                                                    }
                                                }

                                                if ($total_peserta > 0) :
                                                    ?>
                                                    <tr>
                                                        <td class="text-center align-middle"><?= $no++ ?></td>
                                                        <td class="align-middle">
                                                            <div class="font-weight-bold text-dark"><?= $sesi->nama_ruang ?></div>
                                                            <div class="small text-muted text-uppercase font-weight-bold"><?= $sesi->nama_sesi ?></div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="text-primary font-weight-bold"><?= $jadwal[0]->kode ?></div>
                                                            <div class="small text-muted mt-1"><i class="fa fa-users mr-1"></i><?= $total_peserta ?> Peserta</div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?php foreach ($id_guru as $ig) {
                                                                echo isset($gurus[$ig]) ? '<div class="small text-dark mb-1"><i class="fa fa-user-circle mr-1 text-muted opacity-50"></i>' . $gurus[$ig] . '</div>' : '';
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; endforeach; endforeach; endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="py-5 text-center text-muted">
                                    <i class="far fa-calendar-check mb-3 d-block fa-3x opacity-25"></i>
                                    <p>Semua jadwal penilaian telah selesai atau belum tersedia hari ini.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card card-modern">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="far fa-bell mr-2 text-warning"></i>Pengumuman Sekolah</h3>
                    </div>
                    <div class="card-body p-4">
                        <div id="pengumuman"></div>
                        <div id="loading-post" class="text-center d-none">
                            <div class="pacman-loader-wrapper">
                                <div class="pacman-loader"></div>
                                <span class="loader-text">Memuat Pengumuman...</span>
                            </div>
                        </div>
                        <div id="loadmore-post" onclick="getPosts()" class="text-center mt-4 d-none">
                            <button class="btn btn-outline-secondary rounded-pill btn-sm px-4">Muat Informasi Sebelumnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="komentarModal" tabindex="-1" role="dialog" aria-labelledby="komentarLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="komentarLabel">Tulis Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid img-circle img-sm" src="<?= base_url('assets/img/siswa.png') ?>" alt="Alt Text">
                <div class="img-push">
                    <?= form_open('create', array('id' => 'komentar')) ?>
                    <input type="hidden" id="id-post" name="id_post" value="">
                    <div class="input-group">
                        <input type="text" name="text" placeholder="Tulis komentar ..."
                               class="form-control form-control-sm" required>
                        <span class="input-group-append">
                                <button type="submit" class="btn btn-success btn-sm">Komentari</button>
                            </span>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="balasanModal" tabindex="-1" role="dialog" aria-labelledby="balasanLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balasanLabel">Tulis Balasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid img-circle img-sm" src="<?= base_url('assets/img/siswa.png') ?>" alt="Alt Text">
                <div class="img-push">
                    <?= form_open('create', array('id' => 'balasan')) ?>
                    <input type="hidden" id="id-comment" name="id_comment" value="">
                    <div class="input-group">
                        <input type="text" name="text" placeholder="Tulis balasan ...."
                               class="form-control form-control-sm" required>
                        <span class="input-group-append">
                                <button type="submit" class="btn btn-success btn-sm">Balas</button>
                            </span>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function updateClock() {
        var now = new Date();
        var h = now.getHours();
        var m = now.getMinutes();
        var s = now.getSeconds();
        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        h = h < 10 ? '0' + h : h;
        $('#clock-header').text(h + ":" + m + ":" + s);
        setTimeout(updateClock, 1000);
    }

    $(document).ready(function() {
        updateClock();
        
        // Sync main token view with existing token logic
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === "childList") {
                    $('#token-main-view').text($('#token-view').text());
                }
            });
        });
        
        const target = document.querySelector('#token-view');
        if (target) {
            observer.observe(target, { childList: true });
        }
    });

    adaJadwalUjian = '<?=count($ada_ujian)?>';
    localStorage.setItem('ada_jadwal_ujian', adaJadwalUjian);
</script>
<script src="<?= base_url() ?>/assets/app/js/jquery.rowspanizer.js"></script>
<script src="<?= base_url() ?>/assets/app/js/dashboard.js"></script>

