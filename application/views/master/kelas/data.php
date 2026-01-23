<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-school mr-2"></i>Manajemen Kelas & Rombongan Belajar
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('datakelas/add') ?>" class="btn btn-sm btn-white px-4 rounded-pill shadow-sm border-0 font-weight-bold" style="color: #1e3c72">
                        <i class="fas fa-plus mr-2"></i> Rombel Baru
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="card-title font-weight-bold text-dark">
                    <i class="fas fa-list-ul mr-2 text-primary"></i>Daftar Kelas Aktif
                </div>
                <div class="card-tools">
                    <div class="d-flex align-items-center">
                         <?php if ($smt_active->id_smt == '2') : ?>
                             <a href="<?= base_url('datakelas/manage') ?>" class="btn btn-sm btn-outline-primary px-3 rounded-pill mr-2 font-weight-bold shadow-none">
                                 <i class="fas fa-tools mr-1"></i> Atur Semester
                             </a>
                         <?php endif; ?>
                         <a href="<?= base_url('datakelas') ?>" class="btn btn-sm btn-reload shadow-sm px-3 rounded-pill">
                             <i class="fas fa-sync-alt mr-1"></i> Reload
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                 <?php if ($smt_active->id_smt == '2'): ?>
                <div class="alert alert-info-light border-0 shadow-none d-flex align-items-center mb-4 p-3 rounded-lg">
                    <div class="bg-info p-2 rounded-circle mr-3" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center">
                        <i class="fas fa-info-circle text-white small"></i>
                    </div>
                        <div class="small">
                            Fitur <b class="text-dark">Atur Kelas Semester</b> digunakan untuk menyalin seluruh konfigurasi data kelas dari Semester I ke Semester II secara otomatis.
                        </div>
                </div>
                <?php endif; ?>

                <?php if (count($kelas) === 0) : ?>
                    <div class="text-center py-5">
                        <i class="fas fa-folder-open fa-3x text-muted opacity-20 mb-3"></i>
                        <h5 class="text-muted font-weight-bold">Belum Ada Data Kelas</h5>
                        <p class="text-muted small">Tahun Pelajaran <?= $tp_active->tahun ?> Semester <?= $smt_active->smt ?> belum memiliki data rombel.</p>
                        <a href="<?= base_url('datakelas/add') ?>" class="btn btn-primary rounded-pill px-4 mt-2 shadow-sm font-weight-bold">
                            <i class="fas fa-plus mr-2"></i> Buat Rombel Sekarang
                        </a>
                    </div>
                <?php else: ?>
                <div class="table-responsive p-1">
                    <table id="table-kelas" class="table-modern-list">
                        <thead>
                        <tr>
                            <th width="60" class="text-center">NO.</th>
                            <th>NAMA KELAS</th>
                            <th width="120">KODE</th>
                            <?php if ($setting->jenjang == '3') : ?>
                                <th>JURUSAN</th>
                            <?php endif; ?>
                            <th>WALI KELAS</th>
                            <th width="150" class="text-center">SISWA</th>
                            <th width="150" class="text-center">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($kelas as $kls) : ?>
                            <tr>
                                <td class="text-center font-weight-bold text-muted small"><?= $no ?></td>
                                <td>
                                    <div class="font-weight-bold text-dark" style="font-size: 0.95rem text-transform: uppercase"><?= $kls->nama_kelas ?></div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-primary font-weight-bold px-2 py-1 border"><?= $kls->kode_kelas ?></span>
                                </td>
                                <?php if ($setting->jenjang == '3') : ?>
                                    <td>
                                        <span class="badge badge-soft-info px-2 py-1 border-0" style="font-size: 0.75rem"><?= $kls->nama_jurusan ?></span>
                                    </td>
                                <?php endif; ?>
                                <td><i class="fas fa-user-tie mr-2 text-muted"></i><?= $kls->nama_guru ?></td>
                                <td class="text-center">
                                    <span class="badge badge-soft-primary px-3 py-1 font-weight-bold" style="font-size: 0.85rem">
                                        <i class="fas fa-users mr-1"></i> <?= $kls->jml_siswa ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('datakelas/detail/' . $kls->id_kelas) ?>" class="btn btn-sm btn-white text-info bordershadow-hover mr-1" data-toggle="tooltip" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url('datakelas/edit/' . $kls->id_kelas) ?>" class="btn btn-sm btn-white text-warning bordershadow-hover mr-1" data-toggle="tooltip" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button data-id="<?= $kls->id_kelas ?>" class="btn btn-sm btn-white text-danger bordershadow-hover hapuskelas" data-toggle="tooltip" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<style>
    .card-modern { border-radius: 16px; }
    .btn-white { background: white; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }
    .btn-white:hover { background: #f8fafc; border-color: #cbd5e1; transform: scale(1.05); }
    .alert-info-light { background-color: rgba(66, 153, 225, 0.1); color: #2b6cb0; }
    .badge-soft-primary { background: rgba(30, 60, 114, 0.08); color: #1e3c72; }
    .badge-soft-info { background: rgba(14, 165, 233, 0.08); color: #0ea5e9; }
    
    /* Modern Card-List Table */
    .table-modern-list {
        border-collapse: separate !important;
        border-spacing: 0 12px !important;
        background: transparent !important;
        width: 100% !important;
    }

    .table-modern-list thead th {
        border: none !important;
        color: #94a3b8 !important;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 1px;
        padding: 0 20px 10px 20px !important;
    }

    .table-modern-list tbody tr {
        background: #ffffff !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02) !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 12px !important;
    }

    .table-modern-list tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(67, 97, 238, 0.06) !important;
        background: #fdfdfd !important;
    }

    .table-modern-list tbody td {
        border: none !important;
        padding: 16px 20px !important;
        vertical-align: middle !important;
        color: #334155;
    }

    .table-modern-list tbody td:first-child {
        border-top-left-radius: 12px !important;
        border-bottom-left-radius: 12px !important;
    }

    .table-modern-list tbody td:last-child {
        border-top-right-radius: 12px !important;
        border-bottom-right-radius: 12px !important;
    }
</style>

<script src="<?= base_url() ?>/assets/app/js/master/kelas/crud.js"></script>
