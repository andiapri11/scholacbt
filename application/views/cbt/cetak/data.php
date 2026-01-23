<style>
    .content-wrapper {
        background: #f4f6f9 !important;
    }
    .my-shadow {
        box-shadow: 0 10px 25px rgba(0,0,0,0.05) !important;
        border: none !important;
        border-radius: 15px !important;
        overflow: hidden;
    }
    .card-header {
        background-color: #111c43 !important;
        border-bottom: 3px solid #4361ee !important;
        padding: 1.25rem 1.5rem !important;
    }
    .card-title h6 {
        color: #ffffff !important;
        font-weight: 600 !important;
        margin: 0;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-size: 0.9rem;
    }
    .card-body {
        padding: 2rem !important;
    }
    .info-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        border-color: #4361ee;
    }
    .info-card i {
        font-size: 2.5rem;
        margin-right: 1.25rem;
        background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        transition: all 0.3s ease;
    }
    .info-card:hover i {
        transform: scale(1.1);
    }
    .info-card h5 {
        margin: 0;
        color: #1a202c;
        font-weight: 700;
        font-size: 1.1rem;
    }
    .info-card p {
        margin: 0.25rem 0 0;
        color: #718096;
        font-size: 0.85rem;
    }
    .btn-reload {
        border-radius: 8px !important;
        padding: 0.5rem 1rem !important;
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        color: #4a5568 !important;
        font-weight: 600 !important;
        transition: all 0.2s ease;
    }
    .btn-reload:hover {
        background: #f8fafc !important;
        color: #4361ee !important;
        border-color: #4361ee !important;
    }
</style>

<div class="content-wrapper pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-6">
                    <h1 class="font-weight-bold text-dark" style="font-size: 1.5rem;"><i class="fas fa-print mr-2 text-primary"></i> <?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a type="button" href="<?= base_url('cbtcetak') ?>" class="btn btn-sm btn-reload float-right shadow-sm"
                       data-toggle="tooltip" title="Reload Halaman">
                        <i class="fa fa-sync-alt mr-2"></i><span>Reload</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6><i class="fas fa-file-invoice mr-2 text-info"></i> Pilih Dokumen yang Akan Dicetak</h6>
                    </div>
                </div>
                <?php
                $isAdmin = $this->ion_auth->is_admin();
                $dnone = $isAdmin ? '' : 'd-none';
                if ($isAdmin || (isset($guru) && isset($ids_pengawas) && in_array($guru->id_guru, $ids_pengawas))) :
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 <?=$dnone?> mb-4">
                            <a href="<?= base_url('cbtcetak/kartupeserta') ?>" class="text-decoration-none h-100 d-block">
                                <div class="info-card">
                                    <i class="fas fa-id-card"></i>
                                    <div>
                                        <h5>Kartu Peserta</h5>
                                        <p>Cetak kartu ujian siswa</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="<?= base_url('cbtcetak/absenpeserta') ?>" class="text-decoration-none h-100 d-block">
                                <div class="info-card">
                                    <i class="fas fa-clipboard-list"></i>
                                    <div>
                                        <h5>Daftar Hadir</h5>
                                        <p>Cetak absensi peserta ujian</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 <?=$dnone?> mb-4">
                            <a href="<?= base_url('cbtcetak/pengawas') ?>" class="text-decoration-none h-100 d-block">
                                <div class="info-card">
                                    <i class="fas fa-user-shield"></i>
                                    <div>
                                        <h5>Jadwal Pengawas</h5>
                                        <p>Cetak pembagian tugas pengawas</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="<?= base_url('cbtcetak/pesertaujian') ?>" class="text-decoration-none h-100 d-block">
                                <div class="info-card">
                                    <i class="fas fa-users"></i>
                                    <div>
                                        <h5>Peserta Ujian</h5>
                                        <p>Daftar lengkap peserta per ruang</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="<?= base_url('cbtcetak/beritaacara') ?>" class="text-decoration-none h-100 d-block">
                                <div class="info-card">
                                    <i class="fas fa-file-signature"></i>
                                    <div>
                                        <h5>Berita Acara</h5>
                                        <p>Laporan pelaksanaan ujian</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                    <div class="card-body text-center py-5">
                        <i class="fas fa-lock fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Halaman CETAK hanya dapat diakses oleh Admin atau Pengawas Ujian.</h5>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

