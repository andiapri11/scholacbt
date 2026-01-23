?>

<style>
    .info-box-modern {
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 12px;
        padding: 1.25rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        height: 100%;
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
    }
    .info-box-modern:hover { 
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        border-color: #e2e8f0;
    }
    .info-box-icon {
        min-width: 54px;
        height: 54px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-right: 1.25rem;
    }
    .stat-card {
        background: #fff;
        border-radius: 16px;
        padding: 1.25rem;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
        height: 100%;
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
    .stat-label { 
        font-size: 0.7rem; 
        color: #94a3b8; 
        text-transform: uppercase; 
        font-weight: 700; 
        letter-spacing: 0.05em;
        margin-bottom: 0.5rem;
        display: block;
    }
    .stat-value { 
        font-size: 1.75rem; 
        font-weight: 800; 
        color: #1e293b;
        line-height: 1;
    }
    
    .nav-pills-modern {
        background: #f1f5f9;
        padding: 8px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #e2e8f0;
        width: 100%;
        overflow-x: auto;
        white-space: nowrap;
    }
    .nav-pills-modern::-webkit-scrollbar { display: none; }
    
    .nav-pills-modern .nav-link {
        background: #fff !important;
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 700;
        color: #4361ee !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #e2e8f0 !important;
        font-size: 1rem;
        display: flex;
        align-items: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.03);
        margin: 0 !important; /* Reset bootstrap margins */
    }
    .nav-pills-modern .nav-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        border-color: #4361ee !important;
    }
    .nav-pills-modern .nav-link.active {
        background: #4361ee !important;
        color: #fff !important;
        border-color: #4361ee !important;
        box-shadow: 0 8px 20px rgba(67, 97, 238, 0.25) !important;
    }
    
    .tab-status-icon {
        font-size: 1.15rem;
        margin-left: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        vertical-align: middle;
    }
    
    .text-danger.tab-status-icon {
        color: #ff4d4d !important;
    }
    
    .text-success.tab-status-icon {
        color: #2ecc71 !important;
    }
    
    .nav-pills-modern .nav-link.active .tab-status-icon {
        color: #fff !important;
        filter: brightness(0) invert(1); /* Ensure icons turn white on active */
    }
    
    .nav-pills-modern .nav-link.active .tab-status-icon.text-danger {
        color: #fff !important;
    }
    
    .question-row {
        background: #fff;
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.25rem;
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
        position: relative;
    }
    .question-row:hover {
        border-color: #4361ee;
        box-shadow: 0 10px 30px rgba(67, 97, 238, 0.05);
    }
    
    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    
    .opsi-list {
        list-style-type: none;
        padding-left: 0;
    }
    .opsi-item {
        display: flex;
        align-items: flex-start;
        padding: 8px 12px;
        border-radius: 8px;
        margin-bottom: 4px;
        transition: all 0.2s;
    }
    .opsi-item:hover {
        background: #f8fafc;
    }
    .opsi-label {
        min-width: 28px;
        height: 28px;
        border-radius: 6px;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
        margin-right: 12px;
        color: #64748b;
    }
    .opsi-correct {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
        font-weight: 600;
    }
    .opsi-correct .opsi-label {
        background: #10b981;
        color: #fff;
    }
    .bg-soft-info { background-color: rgba(13, 202, 240, 0.1); }
    .bg-soft-danger { background-color: rgba(220, 53, 69, 0.1); }
    .bg-soft-success { background-color: rgba(25, 135, 84, 0.1); }
    .bg-soft-warning { background-color: rgba(255, 193, 7, 0.1); }
    .bg-soft-primary { background-color: rgba(67, 97, 238, 0.1); }
    
    .badge-soft-primary {
        background: rgba(67, 97, 238, 0.1);
        color: #4361ee;
        border: none;
    }
    
    .btn-pill { 
        border-radius: 30px; 
        padding-left: 1.5rem !important;
        padding-right: 1.5rem !important;
        white-space: nowrap;
    }
    
    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        border: none;
    }
    
    .font-weight-500 { font-weight: 500; }
    
    /* Ensure images in questions are responsive */
    .question-row img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 10px 0;
    }
    /* Modern Premium Loader */
    .swal2-popup.modern-swal-popup {
        border-radius: 20px !important;
        padding: 2rem !important;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }
    .swal2-title.modern-swal-title {
        font-size: 1.25rem !important;
        font-weight: 700 !important;
        color: #1e293b !important;
        margin-top: 1rem !important;
    }
    .modern-loader {
        width: 48px;
        height: 48px;
        border: 5px solid #f1f5f9;
        border-bottom-color: #4361ee;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
        margin: 15px auto;
    }
    @keyframes rotation {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="content-wrapper bg-white pt-1">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between mb-2">
                <h1 class="m-0 text-dark" style="font-weight: 700; font-size: 1.5rem;"><?= $subjudul ?></h1>
                <a href="<?= base_url('cbtbanksoal') ?>" type="button" class="btn btn-sm btn-danger float-right">
                    <i class="fas fa-arrow-circle-left"></i><span
                            class="d-none d-sm-inline-block ml-1">Kembali</span>
                </a>
            </div>
        </div>
    </section>

    <section class="content mt-1">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools">
                        <button type="button" onclick="javascript:window.location.reload()"
                                class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                        <button id="convert" class="btn btn-sm btn-primary">
                            <i class="fas fa-download"></i> <span
                                    class="d-none d-sm-inline-block ml-1">Download Soal</span>
                        </button>
                        <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank) ?>"
                           type="button" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> <span
                                    class="d-none d-sm-inline-block ml-1">Tambah/Edit Soal</span>
                        </a>
                    </div>
                </div>
                <div id="tabel-konten" class="card-body">
                    <div id="alert-download" class="alert alert-success align-content-center d-none" role="alert">
                        <div id="download-area"></div>
                    </div>

                    <?php
                    $soals_pg = [];
                    $soals_pg2 = [];
                    $soals_jodohkan = [];
                    $soals_isian = [];
                    $soals_essai = [];
                    foreach ($soals as $soal) {
                        if ($soal->jenis == "1") {
                            $soals_pg[] = $soal;
                        } elseif ($soal->jenis == "2") {
                            $soals_pg2[] = $soal;
                        } elseif ($soal->jenis == "3") {
                            $soals_jodohkan[] = $soal;
                        } elseif ($soal->jenis == "4") {
                            $soals_isian[] = $soal;
                        } elseif ($soal->jenis == "5") {
                            $soals_essai[] = $soal;
                        }
                    }

                    $badge_success = '<i class="fas fa-check-circle text-success tab-status-icon"></i>';
                    $badge_danger = '<i class="fas fa-exclamation-circle text-danger tab-status-icon"></i>';

                    $total_pg = count($soals_pg);
                    $total_pg_tampil = isset(array_count_values(array_column($soals_pg, 'tampilkan'))['1']) ? array_count_values(array_column($soals_pg, 'tampilkan'))['1'] : 0;
                    $badge_pg = $total_pg_tampil < $bank->tampil_pg ? $badge_danger : $badge_success;

                    $total_pg2 = count($soals_pg2);
                    $total_pg2_tampil = isset(array_count_values(array_column($soals_pg2, 'tampilkan'))['1']) ? array_count_values(array_column($soals_pg2, 'tampilkan'))['1'] : 0;
                    $badge_pg2 = $total_pg2_tampil < $bank->tampil_kompleks ? $badge_danger : $badge_success;

                    $total_jodohkan = count($soals_jodohkan);
                    $total_jodohkan_tampil = isset(array_count_values(array_column($soals_jodohkan, 'tampilkan'))['1']) ? array_count_values(array_column($soals_jodohkan, 'tampilkan'))['1'] : 0;
                    $badge_jodohkan = $total_jodohkan_tampil < $bank->tampil_jodohkan ? $badge_danger : $badge_success;

                    $total_isian = count($soals_isian);
                    $total_isian_tampil = isset(array_count_values(array_column($soals_isian, 'tampilkan'))['1']) ? array_count_values(array_column($soals_isian, 'tampilkan'))['1'] : 0;
                    $badge_isian = $total_isian_tampil < $bank->tampil_isian ? $badge_danger : $badge_success;

                    $total_essai = count($soals_essai);
                    $total_essai_tampil = isset(array_count_values(array_column($soals_essai, 'tampilkan'))['1']) ? array_count_values(array_column($soals_essai, 'tampilkan'))['1'] : 0;
                    $badge_essai = $total_essai_tampil < $bank->tampil_esai ? $badge_danger : $badge_success;

                    $total_soal_tampil = isset(array_count_values(array_column($soals, 'tampilkan'))['1']) ? array_count_values(array_column($soals, 'tampilkan'))['1'] : 0;
                    $total_soal_seharusnya_tampil = $bank->tampil_pg + $bank->tampil_kompleks + $bank->tampil_jodohkan + $bank->tampil_isian + $bank->tampil_esai;

                    //echo '<pre>';
                    //var_dump($total_soal_seharusnya_tampil);
                    //var_dump($total_soal_tampil);
                    //echo '</pre>';
                    //
                    $tampil_kurang = ($total_pg_tampil + $total_pg2_tampil + $total_jodohkan_tampil + $total_isian_tampil + $total_essai_tampil) < $total_soal_seharusnya_tampil;
                    $soal_kurang = $total_pg_tampil <> $bank->tampil_pg && $total_pg2_tampil <> $bank->tampil_kompleks
                        && $total_jodohkan_tampil <> $bank->tampil_jodohkan && $total_isian_tampil <> $bank->tampil_isian
                        && $total_essai_tampil <> $bank->tampil_esai;
                    $status_soal = $soal_kurang || $tampil_kurang ? 'Belum Selesai' : 'SELESAI';
                    $ket_soal = count($soals) < $total_soal_seharusnya_tampil ? 'pembuatan soal masih kurang'
                        : ($tampil_kurang ? 'soal yang ditampilkan masih kurang' : ($soal_kurang ? 'soal yang ditampilkan tidak sama dengan seharusnya' : 'soal sudah cukup dan siap digunakan'));
                    $bg_color = $total_soal_tampil < $total_soal_seharusnya_tampil ? 'bg-danger' : 'bg-success';

                    $jk = json_decode(json_encode($bank->bank_kelas));
                    $jumlahKelas = json_decode(json_encode(unserialize($jk ?? '')));

                    $kelasbank = '';
                    $no = 1;
                    foreach ($jumlahKelas as $j) {
                        foreach ($kelas as $k) {
                            if ((isset($j->kelas_id) && isset($k->id_kelas)) && $j->kelas_id === $k->id_kelas) {
                                if ($no > 1) {
                                    $kelasbank .= ', ';
                                }
                                $kelasbank .= $k->nama_kelas;
                                $no++;
                            }
                        }
                    }
                    //var_dump($check_soal);
                    ?>

                    <div class="row">
                        <div class="col-lg-7 col-md-12 mb-4">
                            <div class="card card-modern h-100 border-0 shadow-sm">
                                <div class="card-body p-0">
                                    <div class="p-4 border-bottom bg-light">
                                        <h5 class="mb-0 font-weight-bold text-dark">Informasi Bank Soal</h5>
                                    </div>
                                    <div class="p-4">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <div class="info-box-modern">
                                                    <div class="info-box-icon bg-soft-primary text-primary">
                                                        <i class="fas fa-barcode"></i>
                                                    </div>
                                                    <div>
                                                        <span class="stat-label">Kode Bank</span>
                                                        <span class="font-weight-bold"><?= $bank->bank_kode ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="info-box-modern">
                                                    <div class="info-box-icon bg-soft-success text-success">
                                                        <i class="fas fa-book"></i>
                                                    </div>
                                                    <div>
                                                        <span class="stat-label">Mata Pelajaran</span>
                                                        <span class="font-weight-bold"><?= $bank->nama_mapel ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="info-box-modern">
                                                    <div class="info-box-icon bg-soft-info text-info">
                                                        <i class="fas fa-user-tie"></i>
                                                    </div>
                                                    <div>
                                                        <span class="stat-label">Guru Pengampu</span>
                                                        <span class="font-weight-bold"><?= $bank->nama_guru ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="info-box-modern">
                                                    <div class="info-box-icon bg-soft-warning text-warning">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                    <div>
                                                        <span class="stat-label">Kelas</span>
                                                        <span class="font-weight-bold"><?= $kelasbank ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-5 col-md-12 mb-4">
                            <div class="card card-modern h-100 border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="mb-0 font-weight-bold text-dark">Statistik Soal</h5>
                                        <span class="badge <?= $total_soal_tampil < $total_soal_seharusnya_tampil ? 'badge-soft-danger' : 'badge-soft-success' ?> px-3 py-2">
                                            Status: <?= $status_soal ?>
                                        </span>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="stat-card">
                                                <span class="stat-label">Target</span>
                                                <span class="stat-value"><?= $total_soal_seharusnya_tampil ?></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="stat-card">
                                                <span class="stat-label">Dibuat</span>
                                                <span class="stat-value"><?= count($soals) ?></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="stat-card border-<?= $total_soal_tampil < $total_soal_seharusnya_tampil ? 'danger' : 'success' ?>">
                                                <span class="stat-label">Tampil</span>
                                                <span class="stat-value text-<?= $total_soal_tampil < $total_soal_seharusnya_tampil ? 'danger' : 'success' ?>"><?= $total_soal_tampil ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 p-3 rounded-xl <?= $total_soal_tampil < $total_soal_seharusnya_tampil ? 'bg-soft-danger' : 'bg-soft-success' ?>">
                                        <div class="d-flex align-items-center">
                                            <i class="fas <?= $total_soal_tampil < $total_soal_seharusnya_tampil ? 'fa-exclamation-triangle text-danger' : 'fa-check-circle text-success' ?> mr-3 fa-lg"></i>
                                            <div>
                                                <p class="mb-0 font-weight-bold text-dark" style="font-size: 0.9rem"><?= $ket_soal ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php if ($total_soal_tampil < $total_soal_seharusnya_tampil) : ?>
                                    <div class="mt-3">
                                        <div class="alert alert-warning border-0 p-2 mb-0" style="font-size: 0.8rem">
                                            <i class="fas fa-info-circle mr-1"></i> Klik <b>Simpan Soal Terpilih</b> di bawah jika soal tidak muncul di siswa.
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-default my-shadow mb-4">
                <div class="card-header p-3 bg-white border-bottom-0">
                    <div class="nav nav-pills nav-pills-modern shadow-none border-0" role="tablist">
                        <a class="nav-link active" id="pills-ganda-tab" data-toggle="pill" href="#ganda" role="tab" aria-controls="ganda" aria-selected="true">
                            Pilihan Ganda <?= $badge_pg ?>
                        </a>
                        <a class="nav-link" id="pills-kompleks-tab" data-toggle="pill" href="#kompleks" role="tab" aria-controls="kompleks" aria-selected="false">
                            Kompleks <?= $badge_pg2 ?>
                        </a>
                        <a class="nav-link" id="pills-jodoh-tab" data-toggle="pill" href="#jodoh" role="tab" aria-controls="jodoh" aria-selected="false">
                            Menjodohkan <?= $badge_jodohkan ?>
                        </a>
                        <a class="nav-link" id="pills-isian-tab" data-toggle="pill" href="#isian" role="tab" aria-controls="isian" aria-selected="false">
                            Isian <?= $badge_isian ?>
                        </a>
                        <a class="nav-link" id="pills-essai-tab" data-toggle="pill" href="#essai" role="tab" aria-controls="essai" aria-selected="false">
                            Essai <?= $badge_essai ?>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <?php
                        $disable_delete = $bank->digunakan > 0 || $total_siswa > 0;
                        $dis = $disable_delete ? 'disabled' : '';
                        ?>
                        <div class="tab-pane table-responsive active" id="ganda">
                            <div class="row mt-3">
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Target Tampil</span>
                                        <span class="stat-value text-primary"><?= $bank->tampil_pg ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Total Dibuat</span>
                                        <span class="stat-value"><?= $total_pg ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card border-<?= $total_pg_tampil <> $bank->tampil_pg ? 'warning' : 'success' ?>">
                                        <span class="stat-label">Ditampilkan</span>
                                        <span class="stat-value text-<?= $total_pg_tampil <> $bank->tampil_pg ? 'warning' : 'success' ?>"><?= $total_pg_tampil ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Point/Soal</span>
                                        <span class="stat-value text-info">
                                            <?= $bank->bobot_pg > 0 ? round(($bank->bobot_pg / max($total_pg_tampil, $bank->tampil_pg)), 2) : 0 ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <?php if ($total_pg_tampil <> $bank->tampil_pg || $total_pg < $bank->tampil_pg || $bank->digunakan > 0 || $total_siswa > 0) : ?>
                            <div class="alert bg-soft-warning border-0 mb-4">
                                <ul class="mb-0 p-0 list-unstyled" style="font-size: 0.85rem">
                                    <?php if ($total_pg < $bank->tampil_pg) : ?>
                                        <li><i class="fas fa-exclamation-triangle mr-2"></i> Soal PILIHAN GANDA masih kurang, klik <b>Tambah/Edit Soal</b>.</li>
                                    <?php endif; ?>
                                    <?php if ($total_pg > 0 && $bank->tampil_pg == '0') : ?>
                                        <li><i class="fas fa-info-circle mr-2"></i> Ada soal PILIHAN GANDA tapi tidak ada yang ditampilkan (target 0).</li>
                                    <?php endif; ?>
                                    <?php if ($total_pg_tampil <> $bank->tampil_pg) : ?>
                                        <li><i class="fas fa-exclamation-circle mr-2"></i> Jumlah soal yang ditampilkan (<?= $total_pg_tampil ?>) tidak sama dengan target (<?= $bank->tampil_pg ?>).</li>
                                    <?php endif; ?>
                                    <?php if ($bank->digunakan > 0 || $total_siswa > 0) : ?>
                                        <li><i class="fas fa-lock mr-2"></i> Soal sudah dijadwalkan atau digunakan, tidak bisa menghapus/memilih ulang.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <hr>
                            
                            <?php if ($total_pg > 0) : ?>
                                <?= form_open('', array('id' => 'select-pg')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="1">
                                
                                <div class="card bg-light border-0 mb-4">
                                    <div class="card-body p-3">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="d-flex align-items-center mb-2 mb-md-0">
                                                <div class="custom-control custom-checkbox mr-3">
                                                    <input type="checkbox" class="custom-control-input check-pg-all" id="all-pg" <?=$dis?>>
                                                    <label class="custom-control-label font-weight-bold ml-1" for="all-pg">Pilih Semua PG</label>
                                                </div>
                                                <div class="px-3 border-left">
                                                    <span class="text-muted small text-uppercase font-weight-bold">Terpilih: </span>
                                                    <span id="total-pg" class="h5 mb-0 font-weight-bold text-primary ml-1">0</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary shadow-sm btn-pill" id="save-pg">
                                                <i class="fa fa-save mr-2"></i> Simpan Soal Terpilih
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="table-pg">
                                    <?php foreach ($soals_pg as $s) : 
                                        $checked = $s->tampilkan == 1 ? 'checked' : ''; ?>
                                        <div class="question-row shadow-sm">
                                            <div class="d-flex align-items-start">
                                                <div class="mr-3 pt-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input check-pg" 
                                                               id="pg-<?= $s->id_soal ?>" name="soal[]" 
                                                               value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                        <label class="custom-control-label" for="pg-<?= $s->id_soal ?>"></label>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="badge badge-soft-primary px-2">No. <?= $s->nomor_soal ?></span>
                                                        <div class="action-buttons">
                                                            <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=1') ?>"
                                                               class="btn-action bg-soft-info text-info mr-1" title="Edit Soal">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <button type="button" class="btn-action bg-soft-danger text-danger"
                                                                    data-idsoal="<?= $s->id_soal ?>"
                                                                    data-nomor="<?= $s->nomor_soal ?>"
                                                                    data-jenis="1"
                                                                    onclick="hapusSoal(this)" <?= $dis ?> title="Hapus Soal">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="question-text mb-4 text-dark font-weight-500">
                                                        <?= $s->soal ?>
                                                    </div>
                                                    
                                                    <div class="opsi-list">
                                                        <?php 
                                                        $opts = ['a', 'b', 'c', 'd', 'e'];
                                                        foreach ($opts as $o) :
                                                            if ($o == 'd' && $bank->opsi < 4) continue;
                                                            if ($o == 'e' && $bank->opsi < 5) continue;
                                                            
                                                            $opsi_key = 'opsi_' . $o;
                                                            $is_correct = strtoupper($s->jawaban ?? '') == strtoupper($o ?? '');
                                                            $opsi_content = str_replace(['<p>', '</p>'], '', $s->$opsi_key ?? '');
                                                        ?>
                                                            <div class="opsi-item <?= $is_correct ? 'opsi-correct' : '' ?>">
                                                                <div class="opsi-label"><?= strtoupper($o) ?></div>
                                                                <div class="opsi-content"><?= $opsi_content ?></div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Pilihan Ganda
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane table-responsive" id="kompleks">
                            <div class="row mt-3">
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Target Tampil</span>
                                        <span class="stat-value text-primary"><?= $bank->tampil_kompleks ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Total Dibuat</span>
                                        <span class="stat-value"><?= $total_pg2 ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card border-<?= $total_pg2_tampil <> $bank->tampil_kompleks ? 'warning' : 'success' ?>">
                                        <span class="stat-label">Ditampilkan</span>
                                        <span class="stat-value text-<?= $total_pg2_tampil <> $bank->tampil_kompleks ? 'warning' : 'success' ?>"><?= $total_pg2_tampil ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Point/Soal</span>
                                        <span class="stat-value text-info">
                                            <?= $bank->bobot_kompleks > 0 ? round(($bank->bobot_kompleks / max($total_pg2_tampil, $bank->tampil_kompleks)), 2) : 0 ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <?php if ($total_pg2_tampil <> $bank->tampil_kompleks || $total_pg2 < $bank->tampil_kompleks || $bank->digunakan > 0 || $total_siswa > 0) : ?>
                            <div class="alert bg-soft-warning border-0 mb-4">
                                <ul class="mb-0 p-0 list-unstyled" style="font-size: 0.85rem">
                                    <?php if ($total_pg2 < $bank->tampil_kompleks) : ?>
                                        <li><i class="fas fa-exclamation-triangle mr-2"></i> Soal PILIHAN GANDA KOMPLEKS masih kurang, klik <b>Tambah/Edit Soal</b>.</li>
                                    <?php endif; ?>
                                    <?php if ($total_pg2 > 0 && $bank->tampil_kompleks == '0') : ?>
                                        <li><i class="fas fa-info-circle mr-2"></i> Ada soal PILIHAN GANDA KOMPLEKS tapi tidak ada yang ditampilkan.</li>
                                    <?php endif; ?>
                                    <?php if ($total_pg2_tampil <> $bank->tampil_kompleks) : ?>
                                        <li><i class="fas fa-exclamation-circle mr-2"></i> Jumlah soal yang ditampilkan (<?= $total_pg2_tampil ?>) tidak sama dengan target (<?= $bank->tampil_kompleks ?>).</li>
                                    <?php endif; ?>
                                    <?php if ($bank->digunakan > 0 || $total_siswa > 0) : ?>
                                        <li><i class="fas fa-lock mr-2"></i> Soal sudah dijadwalkan atau digunakan, tidak bisa menghapus/memilih ulang.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <hr>
                            
                            <?php if ($total_pg2 > 0) : ?>
                                <?= form_open('', array('id' => 'select-pg2')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="2">
                                
                                <div class="card bg-light border-0 mb-4">
                                    <div class="card-body p-3">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="d-flex align-items-center mb-2 mb-md-0">
                                                <div class="custom-control custom-checkbox mr-3">
                                                    <input type="checkbox" class="custom-control-input check-pg2-all" id="all-pg2" <?=$dis?>>
                                                    <label class="custom-control-label font-weight-bold ml-1" for="all-pg2">Pilih Semua Kompleks</label>
                                                </div>
                                                <div class="px-3 border-left">
                                                    <span class="text-muted small text-uppercase font-weight-bold">Terpilih: </span>
                                                    <span id="total-pg2" class="h5 mb-0 font-weight-bold text-primary ml-1">0</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary shadow-sm btn-pill" id="save-pg2">
                                                <i class="fa fa-save mr-2"></i> Simpan Soal Terpilih
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="table-pg2">
                                    <?php foreach ($soals_pg2 as $s) : 
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <div class="question-row shadow-sm">
                                            <div class="d-flex align-items-start">
                                                <div class="mr-3 pt-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input check-pg2" 
                                                               id="pg2-<?= $s->id_soal ?>" name="soal[]" 
                                                               value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                        <label class="custom-control-label" for="pg2-<?= $s->id_soal ?>"></label>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="badge badge-soft-primary px-2">No. <?= $s->nomor_soal ?></span>
                                                        <div class="action-buttons">
                                                            <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=2') ?>"
                                                               class="btn-action bg-soft-info text-info mr-1" title="Edit Soal">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <button type="button" class="btn-action bg-soft-danger text-danger"
                                                                    data-idsoal="<?= $s->id_soal ?>"
                                                                    data-nomor="<?= $s->nomor_soal ?>"
                                                                    data-jenis="2"
                                                                    onclick="hapusSoal(this)" <?= $dis ?> title="Hapus Soal">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="question-text mb-4 text-dark font-weight-500">
                                                        <?= $s->soal ?>
                                                    </div>
                                                    
                                                    <?php
                                                    $opsis = unserialize($s->opsi_a ?? '');
                                                    $jawabs = unserialize($s->jawaban ?? '');
                                                    $jwb_pg2 = $jawabs ? implode(', ', array_filter($jawabs)) : '';
                                                    
                                                    if ($opsis) : ?>
                                                        <div class="opsi-list">
                                                            <?php foreach ($opsis as $key => $val) : 
                                                                $is_correct = $jawabs && in_array($key, $jawabs);
                                                                $opsi_content = str_replace(['<p>', '</p>'], '', $val ?? '');
                                                            ?>
                                                                <div class="opsi-item <?= $is_correct ? 'opsi-correct' : '' ?>">
                                                                    <div class="opsi-label"><?= strtoupper($key) ?></div>
                                                                    <div class="opsi-content"><?= $opsi_content ?></div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Pilihan Ganda Kompleks
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane table-responsive" id="jodoh">
                            <div class="row mt-3">
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Target Tampil</span>
                                        <span class="stat-value text-primary"><?= $bank->tampil_jodohkan ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Total Dibuat</span>
                                        <span class="stat-value"><?= $total_jodohkan ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card border-<?= $total_jodohkan_tampil <> $bank->tampil_jodohkan ? 'warning' : 'success' ?>">
                                        <span class="stat-label">Ditampilkan</span>
                                        <span class="stat-value text-<?= $total_jodohkan_tampil <> $bank->tampil_jodohkan ? 'warning' : 'success' ?>"><?= $total_jodohkan_tampil ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Point/Soal</span>
                                        <span class="stat-value text-info">
                                            <?= $bank->bobot_jodohkan > 0 ? round(($bank->bobot_jodohkan / max($total_jodohkan_tampil, $bank->tampil_jodohkan)), 2) : 0 ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <?php if ($total_jodohkan_tampil <> $bank->tampil_jodohkan || $total_jodohkan < $bank->tampil_jodohkan || $bank->digunakan > 0 || $total_siswa > 0) : ?>
                            <div class="alert bg-soft-warning border-0 mb-4">
                                <ul class="mb-0 p-0 list-unstyled" style="font-size: 0.85rem">
                                    <?php if ($total_jodohkan < $bank->tampil_jodohkan) : ?>
                                        <li><i class="fas fa-exclamation-triangle mr-2"></i> Soal MENJODOHKAN masih kurang, klik <b>Tambah/Edit Soal</b>.</li>
                                    <?php endif; ?>
                                    <?php if ($total_jodohkan > 0 && $bank->tampil_jodohkan == '0') : ?>
                                        <li><i class="fas fa-info-circle mr-2"></i> Ada soal MENJODOHKAN tapi tidak ada yang ditampilkan.</li>
                                    <?php endif; ?>
                                    <?php if ($total_jodohkan_tampil <> $bank->tampil_jodohkan) : ?>
                                        <li><i class="fas fa-exclamation-circle mr-2"></i> Jumlah soal yang ditampilkan (<?= $total_jodohkan_tampil ?>) tidak sama dengan target (<?= $bank->tampil_jodohkan ?>).</li>
                                    <?php endif; ?>
                                    <?php if ($bank->digunakan > 0 || $total_siswa > 0) : ?>
                                        <li><i class="fas fa-lock mr-2"></i> Soal sudah dijadwalkan atau digunakan, tidak bisa menghapus/memilih ulang.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <hr>
                            
                            <?php if ($total_jodohkan > 0) : ?>
                                <?= form_open('', array('id' => 'select-jodohkan')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="3">
                                
                                <div class="card bg-light border-0 mb-4">
                                    <div class="card-body p-3">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="d-flex align-items-center mb-2 mb-md-0">
                                                <div class="custom-control custom-checkbox mr-3">
                                                    <input type="checkbox" class="custom-control-input check-jodohkan-all" id="all-jodohkan" <?=$dis?>>
                                                    <label class="custom-control-label font-weight-bold ml-1" for="all-jodohkan">Pilih Semua Menjodohkan</label>
                                                </div>
                                                <div class="px-3 border-left">
                                                    <span class="text-muted small text-uppercase font-weight-bold">Terpilih: </span>
                                                    <span id="total-jodohkan" class="h5 mb-0 font-weight-bold text-primary ml-1">0</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary shadow-sm btn-pill" id="save-jodohkan">
                                                <i class="fa fa-save mr-2"></i> Simpan Soal Terpilih
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="table-jodohkan">
                                    <?php foreach ($soals_jodohkan as $s) : 
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <div class="question-row shadow-sm">
                                            <div class="d-flex align-items-start">
                                                <div class="mr-3 pt-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input check-jodohkan" 
                                                               id="jodoh-<?= $s->id_soal ?>" name="soal[]" 
                                                               value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                        <label class="custom-control-label" for="jodoh-<?= $s->id_soal ?>"></label>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="badge badge-soft-primary px-2">No. <?= $s->nomor_soal ?></span>
                                                        <div class="action-buttons">
                                                            <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=3') ?>"
                                                               class="btn-action bg-soft-info text-info mr-1" title="Edit Soal">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <button type="button" class="btn-action bg-soft-danger text-danger"
                                                                    data-idsoal="<?= $s->id_soal ?>"
                                                                    data-nomor="<?= $s->nomor_soal ?>"
                                                                    data-jenis="3"
                                                                    onclick="hapusSoal(this)" <?= $dis ?> title="Hapus Soal">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="question-text mb-4 text-dark font-weight-500">
                                                        <?= $s->soal ?>
                                                    </div>
                                                    
                                                    <?php $jawaban = unserialize($s->jawaban ?? '');
                                                    if (!isset($jawaban['jawaban'])) $jawaban['jawaban'] = [];
                                                    ?>
                                                    <div class="p-3 rounded bg-light">
                                                        <div class="mb-2 font-weight-bold"><i class="fas fa-link mr-2 text-primary"></i>Jawaban Menjodohkan:</div>
                                                        <div class='list-jodohkan' data-nomor="<?= $s->nomor_soal ?>"
                                                             data-list='<?= json_encode($jawaban) ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Menjodohkan
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane table-responsive" id="isian">
                            <div class="row mt-3">
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Target Tampil</span>
                                        <span class="stat-value text-primary"><?= $bank->tampil_isian ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Total Dibuat</span>
                                        <span class="stat-value"><?= $total_isian ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card border-<?= $total_isian_tampil <> $bank->tampil_isian ? 'warning' : 'success' ?>">
                                        <span class="stat-label">Ditampilkan</span>
                                        <span class="stat-value text-<?= $total_isian_tampil <> $bank->tampil_isian ? 'warning' : 'success' ?>"><?= $total_isian_tampil ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Point/Soal</span>
                                        <span class="stat-value text-info">
                                            <?= $bank->bobot_isian > 0 ? round(($bank->bobot_isian / max($total_isian_tampil, $bank->tampil_isian)), 2) : 0 ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <?php if ($total_isian_tampil <> $bank->tampil_isian || $total_isian < $bank->tampil_isian || $bank->digunakan > 0 || $total_siswa > 0) : ?>
                            <div class="alert bg-soft-warning border-0 mb-4">
                                <ul class="mb-0 p-0 list-unstyled" style="font-size: 0.85rem">
                                    <?php if ($total_isian < $bank->tampil_isian) : ?>
                                        <li><i class="fas fa-exclamation-triangle mr-2"></i> Soal ISIAN SINGKAT masih kurang, klik <b>Tambah/Edit Soal</b>.</li>
                                    <?php endif; ?>
                                    <?php if ($total_isian > 0 && $bank->tampil_isian == '0') : ?>
                                        <li><i class="fas fa-info-circle mr-2"></i> Ada soal ISIAN SINGKAT tapi tidak ada yang ditampilkan.</li>
                                    <?php endif; ?>
                                    <?php if ($total_isian_tampil <> $bank->tampil_isian) : ?>
                                        <li><i class="fas fa-exclamation-circle mr-2"></i> Jumlah soal yang ditampilkan (<?= $total_isian_tampil ?>) tidak sama dengan target (<?= $bank->tampil_isian ?>).</li>
                                    <?php endif; ?>
                                    <?php if ($bank->digunakan > 0 || $total_siswa > 0) : ?>
                                        <li><i class="fas fa-lock mr-2"></i> Soal sudah dijadwalkan atau digunakan, tidak bisa menghapus/memilih ulang.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <hr>
                            
                            <?php if ($total_isian > 0) : ?>
                                <?= form_open('', array('id' => 'select-isian')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="4">
                                
                                <div class="card bg-light border-0 mb-4">
                                    <div class="card-body p-3">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="d-flex align-items-center mb-2 mb-md-0">
                                                <div class="custom-control custom-checkbox mr-3">
                                                    <input type="checkbox" class="custom-control-input check-isian-all" id="all-isian" <?=$dis?>>
                                                    <label class="custom-control-label font-weight-bold ml-1" for="all-isian">Pilih Semua Isian</label>
                                                </div>
                                                <div class="px-3 border-left">
                                                    <span class="text-muted small text-uppercase font-weight-bold">Terpilih: </span>
                                                    <span id="total-isian" class="h5 mb-0 font-weight-bold text-primary ml-1">0</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary shadow-sm btn-pill" id="save-isian">
                                                <i class="fa fa-save mr-2"></i> Simpan Soal Terpilih
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="table-isian">
                                    <?php foreach ($soals_isian as $s) : 
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <div class="question-row shadow-sm">
                                            <div class="d-flex align-items-start">
                                                <div class="mr-3 pt-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input check-isian" 
                                                               id="isian-<?= $s->id_soal ?>" name="soal[]" 
                                                               value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                        <label class="custom-control-label" for="isian-<?= $s->id_soal ?>"></label>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="badge badge-soft-primary px-2">No. <?= $s->nomor_soal ?></span>
                                                        <div class="action-buttons">
                                                            <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=4') ?>"
                                                               class="btn-action bg-soft-info text-info mr-1" title="Edit Soal">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <button type="button" class="btn-action bg-soft-danger text-danger"
                                                                    data-idsoal="<?= $s->id_soal ?>"
                                                                    data-nomor="<?= $s->nomor_soal ?>"
                                                                    data-jenis="4"
                                                                    onclick="hapusSoal(this)" <?= $dis ?> title="Hapus Soal">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="question-text mb-4 text-dark font-weight-500">
                                                        <?= $s->soal ?>
                                                    </div>
                                                    
                                                    <div class="p-3 rounded bg-soft-success">
                                                        <div class="mb-1 font-weight-bold text-success" style="font-size: 0.85rem">Jawaban Benar:</div>
                                                        <div class="text-dark font-weight-bold"><?= $s->jawaban ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Isian Singkat
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane table-responsive" id="essai">
                            <div class="row mt-3">
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Target Tampil</span>
                                        <span class="stat-value text-primary"><?= $bank->tampil_esai ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Total Dibuat</span>
                                        <span class="stat-value"><?= $total_essai ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card border-<?= $total_essai_tampil <> $bank->tampil_esai ? 'warning' : 'success' ?>">
                                        <span class="stat-label">Ditampilkan</span>
                                        <span class="stat-value text-<?= $total_essai_tampil <> $bank->tampil_esai ? 'warning' : 'success' ?>"><?= $total_essai_tampil ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="stat-card">
                                        <span class="stat-label">Point/Soal</span>
                                        <span class="stat-value text-info">
                                            <?= $bank->bobot_esai > 0 ? round(($bank->bobot_esai / max($total_essai_tampil, $bank->tampil_esai)), 2) : 0 ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <?php if ($total_essai_tampil <> $bank->tampil_esai || $total_essai < $bank->tampil_esai || $bank->digunakan > 0 || $total_siswa > 0) : ?>
                            <div class="alert bg-soft-warning border-0 mb-4">
                                <ul class="mb-0 p-0 list-unstyled" style="font-size: 0.85rem">
                                    <?php if ($total_essai < $bank->tampil_esai) : ?>
                                        <li><i class="fas fa-exclamation-triangle mr-2"></i> Soal ESSAI masih kurang, klik <b>Tambah/Edit Soal</b>.</li>
                                    <?php endif; ?>
                                    <?php if ($total_essai > 0 && $bank->tampil_esai == '0') : ?>
                                        <li><i class="fas fa-info-circle mr-2"></i> Ada soal ESSAI tapi tidak ada yang ditampilkan.</li>
                                    <?php endif; ?>
                                    <?php if ($total_essai_tampil <> $bank->tampil_esai) : ?>
                                        <li><i class="fas fa-exclamation-circle mr-2"></i> Jumlah soal yang ditampilkan (<?= $total_essai_tampil ?>) tidak sama dengan target (<?= $bank->tampil_esai ?>).</li>
                                    <?php endif; ?>
                                    <?php if ($bank->digunakan > 0 || $total_siswa > 0) : ?>
                                        <li><i class="fas fa-lock mr-2"></i> Soal sudah dijadwalkan atau digunakan, tidak bisa menghapus/memilih ulang.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <hr>
                            
                            <?php if ($total_essai > 0) : ?>
                                <?= form_open('', array('id' => 'select-essai')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="5">
                                
                                <div class="card bg-light border-0 mb-4">
                                    <div class="card-body p-3">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="d-flex align-items-center mb-2 mb-md-0">
                                                <div class="custom-control custom-checkbox mr-3">
                                                    <input type="checkbox" class="custom-control-input check-essai-all" id="all-essai" <?=$dis?>>
                                                    <label class="custom-control-label font-weight-bold ml-1" for="all-essai">Pilih Semua Essai</label>
                                                </div>
                                                <div class="px-3 border-left">
                                                    <span class="text-muted small text-uppercase font-weight-bold">Terpilih: </span>
                                                    <span id="total-essai" class="h5 mb-0 font-weight-bold text-primary ml-1">0</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary shadow-sm btn-pill" id="save-essai">
                                                <i class="fa fa-save mr-2"></i> Simpan Essai Terpilih
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="table-essai">
                                    <?php foreach ($soals_essai as $s) : 
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <div class="question-row shadow-sm">
                                            <div class="d-flex align-items-start">
                                                <div class="mr-3 pt-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input check-essai" 
                                                               id="essai-<?= $s->id_soal ?>" name="soal[]" 
                                                               value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                        <label class="custom-control-label" for="essai-<?= $s->id_soal ?>"></label>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="badge badge-soft-primary px-2">No. <?= $s->nomor_soal ?></span>
                                                        <div class="action-buttons">
                                                            <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=5') ?>"
                                                               class="btn-action bg-soft-info text-info mr-1" title="Edit Soal">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <button type="button" class="btn-action bg-soft-danger text-danger"
                                                                    data-idsoal="<?= $s->id_soal ?>"
                                                                    data-nomor="<?= $s->nomor_soal ?>"
                                                                    data-jenis="5"
                                                                    onclick="hapusSoal(this)" <?= $dis ?> title="Hapus Soal">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="question-text mb-4 text-dark font-weight-500">
                                                        <?= $s->soal ?>
                                                    </div>
                                                    
                                                    <div class="p-3 rounded bg-soft-info border-left border-info" style="border-left-width: 4px !important">
                                                        <div class="mb-1 font-weight-bold text-info" style="font-size: 0.85rem">Referensi Jawaban / Kisi-kisi:</div>
                                                        <div class="text-dark"><?= $s->jawaban ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Uraian
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="temp-list"></div>
            <div id="for-export" class="d-none">
                <p><b>I. Soal Pilihan Ganda</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 1px solid black; border-collapse: collapse; border-spacing: 0; page-break-after: always">
                    <thead>
                    <tr style="background-color: lightgrey">
                        <th style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            SOAL
                        </th>
                        <th style="width:100px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold">
                            JENIS
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold">
                            OPSI
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold">
                            JAWABAN
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse;  text-align: center; font-weight: bold; padding: 12px">
                            KUNCI
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $rows1 = count($soals_pg) > 50 ? count($soals_pg) : 50;
                    for ($i = 0; $i < $rows1; $i++) :
                        $s = isset($soals_pg[$i]) ? (array)$soals_pg[$i] : [
                            'nomor_soal' => $i + 1,
                            'soal' => '',
                            'opsi_a' => '',
                            'opsi_b' => '',
                            'opsi_c' => '',
                            'opsi_d' => '',
                            'opsi_e' => '',
                            'jawaban' => ''
                        ] ?>
                        <tr>
                            <td rowspan="5" style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s['nomor_soal'] ?>
                            </td>
                            <td rowspan="5" style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s['soal'] ?>
                            </td>
                            <td rowspan="5" style="border: 1px solid black;vertical-align: top;text-align: center;">
                                1
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">A</td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px"><?= $s['opsi_a'] ?></td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px"><?= strtolower($s['jawaban'] ?? '') == 'a' ? 'v' : '' ?></td>
                        </tr>
                        <?php
                        $post_char = 98;
                        for ($a = 0; $a < 4; $a++) :
                            $abjad = chr($post_char);
                            ?>
                            <tr>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= strtoupper($abjad ?? '') ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= $s['opsi_' . $abjad] ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px"><?= strtolower($s['jawaban'] ?? '') == $abjad ? 'v' : '' ?></td>
                            </tr>
                            <?php $post_char++; endfor; endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p><b>II. Soal Pilihan Ganda Kompleks</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 3px solid black; border-collapse: collapse; border-spacing: 0; page-break-after: always">
                    <thead>
                    <tr style="border-bottom: 3px solid black; background-color: lightgrey">
                        <th style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            SOAL
                        </th>
                        <th style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold; padding: 12px">
                            JENIS
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold; padding: 12px">
                            OPSI
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold; padding: 12px">
                            JAWABAN
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse;  text-align: center; font-weight: bold; padding: 12px">
                            KUNCI
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $rows2 = count($soals_pg2) > 10 ? count($soals_pg2) : 10;
                    for ($sp = 0; $sp < $rows2; $sp++) :
                        $s = isset($soals_pg2[$sp]) ? $soals_pg2[$sp] : json_decode(json_encode([
                            'jawaban' => serialize([]),
                            'nomor_soal' => $sp + 1,
                            'soal' => '',
                            'opsi_a' => serialize(['a' => '', 'b' => '', 'c' => ''])
                        ]));
                        $opsis = unserialize($s->opsi_a ?? '');
                        $opsis = $opsis ? $opsis : ['a'=>'','b'=>'','c'=>''];
                        $rows = $opsis ? count($opsis) : 3;
                        $jawabs = $opsis ? unserialize($s->jawaban ?? '') : [];
                        $bg = $s->nomor_soal % 2 == 0 ? '#FFFFFF' : '#F2F2F2';
                        //if ($opsis) :
                        ?>
                        <tr style="border-top: 3px solid black;background-color: <?= $bg ?>">
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s->nomor_soal ?>
                            </td>
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->soal ?>
                            </td>
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black;vertical-align: top;text-align: center;">
                                2
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center; width: 50px">
                                A
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;padding-left: 6px;">
                                <?= $opsis ? $opsis['a'] : '' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $jawabs && in_array('a', $jawabs) ? 'v' : '' ?>
                            </td>
                        </tr>
                        <?php

                        $post_char = 98;
                        for ($i = 1; $i < count($opsis); $i++) :
                            $abjad = chr($post_char); ?>
                            <tr style="background-color: <?= $bg ?>">
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= strtoupper($abjad ?? '') ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;padding-left: 6px">
                                    <?= $opsis[$abjad] ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= $jawabs && in_array($abjad, $jawabs) ? 'v' : '' ?>
                                </td>
                            </tr>
                            <?php $post_char++; endfor;
                        //endif;
                    endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p><b>III. Soal Menjodohkan</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 3px solid black; border-collapse: collapse; border-spacing: 0; page-break-after: always">
                    <thead>
                    <tr style="border-bottom: 3px solid black; background-color: lightgrey">
                        <th rowspan="2"
                            style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th rowspan="2"
                            style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 300px">
                            SOAL
                        </th>
                        <th rowspan="2"
                            style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            JENIS
                        </th>
                        <th colspan="2"
                            style="border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            BARIS
                        </th>
                        <th colspan="2"
                            style="width:100px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            KOLOM
                        </th>
                        <th colspan="2"
                            style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 200px">
                            KUNCI
                        </th>
                    </tr>
                    <tr style="background-color: lightgrey;font-weight: bold;">
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:60px;">
                            KODE
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:140px; ">
                            NAMA BARIS
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:60px;">
                            KODE
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:140px; ">
                            NAMA KOLOM
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:60px;">
                            KODE BARIS
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:140px; ">
                            KODE KOLOM
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $count = 0;
                    $rows3 = count($soals_jodohkan) > 10 ? count($soals_jodohkan) : 10;
                    for ($sj = 0; $sj < $rows3; $sj++) :
                        $s = isset($soals_jodohkan[$sj]) ? $soals_jodohkan[$sj] : json_decode(json_encode(
                            ['jawaban' => '', 'nomor_soal' => $sj + 1, 'soal' => '']
                        ));
                        $count++;
                        $bg = $count % 2 == 0 ? '#FFFFFF' : '#F2F2F2';

                        $jawaban = isset($s->jawaban) ? unserialize($s->jawaban ?? '') : [];
                        if (isset($jawaban['jawaban']) && $jawaban['jawaban'] != null) {
                            foreach ($jawaban['jawaban'] as $kk => $jwbn) {
                                $jawaban['jawaban'][$kk] = (array)$jwbn;
                            }
                        }

                        $jml_kolom = $jawaban && isset($jawaban['jawaban']) && $jawaban['jawaban'] != null ? count((array)$jawaban['jawaban'][0]) : 0;
                        $jml_baris = $jawaban ? count($jawaban['jawaban']) : 0;
                        $rows = $jml_kolom > 0 && $jml_baris > 0 ? max(($jml_kolom - 1), ($jml_baris - 1)) : 5;

                        $jwb_benar = [];
                        if (isset($jawaban['jawaban']) && $jawaban['jawaban'] != null) {
                            foreach ($jawaban['jawaban'] as $kk => $jb) {
                                foreach ($jb as $ki => $item) {
                                    if ($item == '1') $jwb_benar[$kk][] = strtoupper(chr($ki + 96));
                                }
                            }
                        }
                        ?>
                        <tr style="border-top: 3px solid black;background-color: <?= $bg ?>">
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s->nomor_soal ?>
                            </td>
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->soal; ?>
                            </td>
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black;vertical-align: top;text-align: center;">
                                3
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][1][0]) && isset($jawaban['jawaban'][1][0]) != "" ? '1' : '&nbsp;' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][1][0]) ? $jawaban['jawaban'][1][0] : '' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][0][1]) && $jawaban['jawaban'][0][1] != "" ? 'A' : '' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][0][1]) ? $jawaban['jawaban'][0][1] : '' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][1][0]) && isset($jawaban['jawaban'][1][0]) != "" ? '1' : '' ?>
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?php
                                echo
                                isset($jwb_benar[1]) ? implode(', ', $jwb_benar[1]) : '';
                                ?>

                            </td>
                        </tr>
                        <?php
                        $post_char = 98;
                        for ($i = 1; $i < $rows; $i++) :
                            $abjad = chr($post_char);
                            $index = $i + 1;
                            ?>
                            <tr style="background-color: <?= $bg ?>">
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][$index][0]) && $jawaban['jawaban'][$index][0] != "" ? $index : '&nbsp;' ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][$index][0]) ? $jawaban['jawaban'][$index][0] : '' ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][0][$index]) && $jawaban['jawaban'][0][$index] != "" ? strtoupper($abjad ?? '') : ''; ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][0][$index]) ? $jawaban['jawaban'][0][$index] : '' ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][$index][0]) && $jawaban['jawaban'][$index][0] != "" ? $index : '' ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;padding-left: 6px">
                                    <?php
                                    echo isset($jwb_benar[$index]) ? implode(', ', $jwb_benar[$index]) : '';
                                    ?>
                                </td>
                            </tr>
                            <?php $post_char++; endfor; endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p><b>IV. Soal Isian Singkat</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 1px solid black; border-collapse: collapse; border-spacing: 0; page-break-after: always">
                    <thead>
                    <tr style="background-color: lightgrey">
                        <th style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 300px">
                            SOAL
                        </th>
                        <th style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            JENIS
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 200px">
                            JAWABAN BENAR
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $count = 0;
                    $rows4 = count($soals_jodohkan) > 10 ? count($soals_jodohkan) : 10;
                    for ($si = 0; $si < $rows4; $si++) :
                        $s = isset($soals_isian[$si]) ? $soals_isian[$si] : json_decode(json_encode(
                            ['jawaban' => '', 'nomor_soal' => $si + 1, 'soal' => '']
                        ));
                        $count++;
                        ?>
                        <tr>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s->nomor_soal ?>
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->soal ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                4
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->jawaban ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p><b>V. Soal Essai</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 1px solid black; border-collapse: collapse; border-spacing: 0;">
                    <thead>
                    <tr style="background-color: lightgrey">
                        <th style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 300px">
                            SOAL
                        </th>
                        <th style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            JENIS
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 200px">
                            JAWABAN BENAR
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $count = 0;
                    $rows5 = count($soals_essai) > 10 ? count($soals_essai) : 10;
                    for ($se = 0; $se < $rows4; $se++) :
                        $s = isset($soals_essai[$se]) ? $soals_essai[$se] : json_decode(json_encode(
                            ['jawaban' => '', 'nomor_soal' => $se + 1, 'soal' => '']
                        ));
                        //foreach ($soals_essai as $s) :
                        $count++;
                        ?>
                        <tr>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s->nomor_soal ?>
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->soal ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                5
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->jawaban ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'up')) ?>
<?= form_close() ?>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>

<script src="<?= base_url() ?>/assets/app/js/linker-list.js"></script>
<script src="<?= base_url() ?>/assets/plugins/element-queries/ElementQueries.js"></script>
<script src="<?= base_url() ?>/assets/plugins/element-queries/ResizeSensor.js"></script>

<script>
    var jmlPgTampil = '<?=$bank->tampil_pg?>';
    var jmlPg2Tampil = '<?=$bank->tampil_kompleks?>';
    var jmlJodohkanTampil = '<?=$bank->tampil_jodohkan?>';
    var jmlIsianTampil = '<?=$bank->tampil_isian?>';
    var jmlEssaiTampil = '<?=$bank->tampil_esai?>';
    var arrJenis = ['', 'Pilihan Ganda', 'PG Kompleks', 'Menjodohkan', 'Isian Singkat', 'Uraian/Essai'];

    $(document).ready(function () {
        var pathUpload = 'uploads';
        var $imgs = $('img');
        $.each($imgs, function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
            } else {
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
        });

        $.each($(`video`), function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
            } else {
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
        });

        $.each($(`audio`), function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
            } else {
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
        });

        var $div_lists = $('.list-jodohkan');
        let isMounted = false;
        $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
            //e.target // newly activated tab
            //e.relatedTarget // previous active tab
            if ($(this).attr('href') === "#jodoh" && !isMounted) {
                initJodohkan();
            }
        });

        // Trigger if jodoh is already active
        if ($('#pills-jodoh-tab').hasClass('active') && !isMounted) {
            initJodohkan();
        }

        function initJodohkan() {
            $.each($div_lists, function () {
                var noSoal = $(this).data('nomor');
                var lists = $(this).data('list');
                console.log('res', lists)
                if ($(this).children().length > 1) return
                $(this).linkerList({
                    enableSelect: false,
                    enableEditor: false,
                    data: lists,
                    id: noSoal,
                    onInit: function (msg) {
                        isMounted = true
                    }
                });
            });
        }

        var pgCount = $('#table-pg .check-pg').length;
        var pg2Count = $('#table-pg2 .check-pg2').length;
        var jodohkanCount = $('#table-jodohkan .check-jodohkan').length;
        var isianCount = $('#table-isian .check-isian').length;
        var essaiCount = $('#table-essai .check-essai').length;

        //console.log('count', jodohkanCount);

        var pgUnchecked = [];
        var pg2Unchecked = [];
        var jodohkanUnchecked = [];
        var isianUnchecked = [];
        var essaiUnchecked = [];

        function findUnchecked() {
            pgUnchecked = [];
            pg2Unchecked = [];
            jodohkanUnchecked = [];
            isianUnchecked = [];
            essaiUnchecked = [];

            $("#table-pg .check-pg:not(:checked)").each(function () {
                pgUnchecked.push($(this).val());
            });

            $("#table-pg2 .check-pg2:not(:checked)").each(function () {
                pg2Unchecked.push($(this).val());
            });

            $("#table-jodohkan .check-jodohkan:not(:checked)").each(function () {
                jodohkanUnchecked.push($(this).val());
            });

            $("#table-isian .check-isian:not(:checked)").each(function () {
                isianUnchecked.push($(this).val());
            });

            $("#table-essai .check-essai:not(:checked)").each(function () {
                essaiUnchecked.push($(this).val());
            });

            var pgchecked = $("#table-pg .check-pg:checked").length;
            $('#total-pg').html(`<b>${pgchecked}</b>`);
            $("#all-pg").prop("checked", pgchecked == pgCount);

            var pg2checked = $("#table-pg2 .check-pg2:checked").length;
            $('#total-pg2').html(`<b>${pg2checked}</b>`);
            $("#all-pg2").prop("checked", pg2checked == pg2Count);

            var jodohkanchecked = $("#table-jodohkan .check-jodohkan:checked").length;
            $('#total-jodohkan').html(`<b>${jodohkanchecked}</b>`);
            $("#all-jodohkan").prop("checked", jodohkanchecked == jodohkanCount);

            var isianchecked = $("#table-isian .check-isian:checked").length;
            $('#total-isian').html(`<b>${isianchecked}</b>`);
            $("#all-isian").prop("checked", isianchecked == isianCount);

            var essaiChecked = $("#table-essai .check-essai:checked").length;
            $('#total-essai').html(`<b>${essaiChecked}</b>`);
            $("#all-essai").prop("checked", essaiChecked == essaiCount);
        }

        findUnchecked();

        $("#table-pg").on("change", ".check-pg", function () {
            findUnchecked();
        });

        $("#table-pg2").on("change", ".check-pg2", function () {
            findUnchecked();
        });

        $("#table-jodohkan").on("change", ".check-jodohkan", function () {
            findUnchecked();
        });

        $("#table-isian").on("change", ".check-isian", function () {
            findUnchecked();
        });

        $("#table-essai").on("change", ".check-essai", function () {
            findUnchecked();
        });

        $("#all-pg").on("click", function () {
            if (this.checked) {
                $(".check-pg").each(function () {
                    this.checked = true;
                    $("#all-pg").prop("checked", true);
                });
            } else {
                $(".check-pg").each(function () {
                    this.checked = false;
                    $("#all-pg").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $("#all-pg2").on("click", function () {
            if (this.checked) {
                $(".check-pg2").each(function () {
                    this.checked = true;
                    $("#all-pg2").prop("checked", true);
                });
            } else {
                $(".check-pg2").each(function () {
                    this.checked = false;
                    $("#all-pg2").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $("#all-jodohkan").on("click", function () {
            if (this.checked) {
                $(".check-jodohkan").each(function () {
                    this.checked = true;
                    $("#all-jodohkan").prop("checked", true);
                });
            } else {
                $(".check-jodohkan").each(function () {
                    this.checked = false;
                    $("#all-jodohkan").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $("#all-isian").on("click", function () {
            if (this.checked) {
                $(".check-isian").each(function () {
                    this.checked = true;
                    $("#all-isian").prop("checked", true);
                });
            } else {
                $(".check-isian").each(function () {
                    this.checked = false;
                    $("#all-isian").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $("#all-essai").on("click", function () {
            if (this.checked) {
                $(".check-essai").each(function () {
                    this.checked = true;
                    $("#all-essai").prop("checked", true);
                });
            } else {
                $(".check-essai").each(function () {
                    this.checked = false;
                    $("#all-essai").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $('#save-pg').on('click', function (e) {
            var dataPost = $('#select-pg').serialize() + "&uncheck=" + JSON.stringify(pgUnchecked);
            console.log(dataPost);

            var checked = $("#table-pg .check-pg:checked").length;
            if (checked !== parseInt(jmlPgTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Pilihan Ganda terpilih: ${checked} <br>Seharusnya: ${jmlPgTampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        $('#save-pg2').on('click', function (e) {
            var dataPost = $('#select-pg2').serialize() + "&uncheck=" + JSON.stringify(pg2Unchecked);
            console.log(dataPost);

            var checked = $("#table-pg2 .check-pg2:checked").length;
            if (checked !== parseInt(jmlPg2Tampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Ganda Kompleks terpilih: ${checked} <br>Seharusnya: ${jmlPg2Tampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        $('#save-jodohkan').on('click', function (e) {
            var dataPost = $('#select-jodohkan').serialize() + "&uncheck=" + JSON.stringify(jodohkanUnchecked);
            console.log(dataPost);

            var checked = $("#table-jodohkan .check-jodohkan:checked").length;
            if (checked !== parseInt(jmlJodohkanTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Menjodohkan terpilih: ${checked} <br>Seharusnya: ${jmlJodohkanTampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        $('#save-isian').on('click', function (e) {
            var dataPost = $('#select-isian').serialize() + "&uncheck=" + JSON.stringify(isianUnchecked);
            console.log(dataPost);

            var checked = $("#table-isian .check-isian:checked").length;
            if (checked !== parseInt(jmlIsianTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Isian terpilih: ${checked} <br>Seharusnya: ${jmlIsianTampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        $('#save-essai').on('click', function (e) {
            var dataPost = $('#select-essai').serialize() + "&uncheck=" + JSON.stringify(essaiUnchecked);
            console.log(dataPost);

            var checked = $("#table-essai .check-essai:checked").length;
            if (checked !== parseInt(jmlEssaiTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Uraian terpilih: ${checked} <br>Seharusnya: ${jmlEssaiTampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        function saveSoalSelected(dataPost) {
            swal.fire({
                title: "Sedang Menyimpan...",
                html: '<div class="modern-loader"></div><p class="text-muted mt-2" style="font-size: 0.9rem">Memproses pilihan soal Anda</p>',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                customClass: {
                    popup: 'modern-swal-popup',
                    title: 'modern-swal-title'
                }
            });
            $.ajax({
                url: base_url + "cbtbanksoal/saveSelected",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    swal.fire({
                        title: "Sukses",
                        html: data.check+' Soal terpilih berhasil disimpan',
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            window.location.reload();
                        }
                    });
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        }

        $("#convert").click(function (e) {
            e.preventDefault();

            var contentDocument = $('#for-export').convertToHtmlFile('detail', '');

            var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
            var converted = htmlDocx.asBlob(content, {
                orientation: 'landscape',
                size: 'A4',
                margins: {top: 700, bottom: 700, left: 1000, right: 1000}
            });
            saveAs(converted, 'Soal <?= $bank->bank_kode ?> <?= $bank->nama_mapel ?> Kls <?= $bank->bank_level ?>.docx');

            var link = document.createElement('a');
            link.href = URL.createObjectURL(converted);
            link.download = 'Soal <?= $bank->nama_mapel ?> Kls <?= $bank->bank_level ?>.docx';
            link.appendChild(
                document.createTextNode('Click here if your download has not started automatically'));
            var downloadArea = document.getElementById('download-area');
            downloadArea.innerHTML = '';
            downloadArea.appendChild(link);

            $('#alert-download').removeClass('d-none');

            $("#alert-download").fadeTo(10000, 500).slideUp(500, function () {
                $("#alert-download").slideUp(500);
            });

        });
    });

    function hapusSoal(btn) {
        const id = $(btn).data('idsoal');
        const no = $(btn).data('nomor');
        const jn = $(btn).data('jenis');

        swal.fire({
            title: "HAPUS ?",
            html: "Soal berikut akan dihapus<br>Nomor: <b>" + no + "</b><br>Jenis: <b>" + arrJenis[jn] + "</b>",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                swal.fire({
                    text: "Silahkan tunggu....",
                    button: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    onOpen: () => {
                        swal.showLoading();
                    }
                });
                $.ajax({
                    url: base_url + "cbtbanksoal/hapussoal",
                    method: "POST",
                    data: $('#up').serialize() + '&soal_id=' + id,
                    success: function (result) {
                        console.log("result", result);
                        var tit = result ? 'BERHASIL' : 'GAGAL';
                        var msg = result ? 'berhasil' : 'gagal';
                        var ic = result ? 'success' : 'error';
                        swal.fire({
                            title: tit,
                            text: "Soal " + msg + " dihapus",
                            icon: ic,
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                        const err = JSON.parse(xhr.responseText)
                        swal.fire({
                            title: "Error",
                            text: err.Message,
                            icon: "error"
                        });
                    }
                });
            }
        })
    }
</script>
