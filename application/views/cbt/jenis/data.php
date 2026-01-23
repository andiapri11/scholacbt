<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-tags mr-2"></i>Manajemen Kategori & Jenis Ujian
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-white px-3 rounded-pill shadow-sm border-0 font-weight-bold mr-2">
                        <i class="fas fa-sync-alt mr-2"></i> Reload
                    </button>
                    <button type="button" data-toggle="modal" data-target="#createJenisModal" class="btn btn-sm btn-white px-4 rounded-pill shadow-sm border-0 font-weight-bold" style="color: #1e3c72">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah Kategori
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="card-title font-weight-bold text-dark">
                    <i class="fas fa-list-alt mr-2 text-primary"></i>Daftar Jenis Ujian
                </div>
            </div>
            <div class="card-body p-4">
                <?= form_open('cbtjenis/delete', array('id' => 'bulk')); ?>
                <div class="table-responsive">
                    <table id="jenis" class="table-modern-list">
                        <thead>
                        <tr>
                            <th width="40" class="text-center p-0">
                                <div class="custom-control custom-checkbox ml-2">
                                    <input type="checkbox" class="custom-control-input select_all" id="select_all">
                                    <label class="custom-control-label" for="select_all"></label>
                                </div>
                            </th>
                            <th width="40" class="text-center">NO.</th>
                            <th>JENIS UJIAN</th>
                            <th>KODE</th>
                            <th width="100" class="text-center">AKSI</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </section>
</div>

<!-- Modal Create -->
<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createJenisModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-primary text-white py-3 border-0">
                <h6 class="modal-title font-weight-bold" id="createModalLabel">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Jenis Ujian
                </h6>
                <button type="button" class="close text-white opacity-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-group">
                    <label for="nama_jenis" class="small font-weight-bold text-muted uppercase mb-2">Nama Jenis Ujian <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-right-0"><i class="fas fa-tag text-muted"></i></span>
                        </div>
                        <input type="text" class="form-control border-left-0" name="nama_jenis" placeholder="Contoh: Penilaian Harian" required style="background: #f8fafc">
                    </div>
                </div>
                <div class="form-group mb-0">
                    <label for="kode_jenis" class="small font-weight-bold text-muted uppercase mb-2">Kode Singkatan <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-right-0"><i class="fas fa-code text-muted"></i></span>
                        </div>
                        <input type="text" class="form-control border-left-0" name="kode_jenis" placeholder="Contoh: PH" required style="background: #f8fafc">
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0 py-3">
                <button type="button" class="btn btn-secondary rounded-pill px-4 shadow-none" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm font-weight-bold">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<!-- Modal Edit -->
<?= form_open('update', array('id' => 'update')) ?>
<div class="modal fade" id="editJenisModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-warning text-white py-3 border-0">
                <h6 class="modal-title font-weight-bold text-white" id="editModalLabel">
                    <i class="fas fa-edit mr-2"></i>Edit Jenis Ujian
                </h6>
                <button type="button" class="close text-white opacity-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-group">
                    <label class="small font-weight-bold text-muted uppercase mb-2">Nama Jenis Ujian <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-right-0"><i class="fas fa-tag text-muted"></i></span>
                        </div>
                        <input type="text" id="namaEdit" class="form-control border-left-0" required style="background: #f8fafc">
                    </div>
                </div>
                <div class="form-group mb-0">
                    <label class="small font-weight-bold text-muted uppercase mb-2">Kode Singkatan <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-right-0"><i class="fas fa-code text-muted"></i></span>
                        </div>
                        <input type="text" id="kodeEdit" class="form-control border-left-0" required style="background: #f8fafc">
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0 py-3">
                <input type="hidden" id="editIdJenis" class="form-control">
                <button type="button" class="btn btn-secondary rounded-pill px-4 shadow-none" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning text-white rounded-pill px-4 shadow-sm font-weight-bold">
                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<style>
    .card-modern { border-radius: 16px; }
    .btn-white { background: white; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }
    .btn-white:hover { background: #f8fafc; border-color: #cbd5e1; transform: scale(1.05); }
    
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
        font-size: 0.75rem;
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
    
    .table-modern-list tbody td:first-child { border-top-left-radius: 12px; border-bottom-left-radius: 12px; }
    .table-modern-list tbody td:last-child { border-top-right-radius: 12px; border-bottom-right-radius: 12px; }
</style>

<script src="<?= base_url() ?>/assets/app/js/cbt/jenis/crud.js"></script>


