<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-graduation-cap mr-2"></i>Pengaturan Program Keahlian / Jurusan
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="card-title font-weight-bold text-dark">
                    <i class="fas fa-list mr-2 text-primary"></i><?= $subjudul ?>
                </div>
                <div class="card-tools">
                    <button type="button" data-toggle="modal" data-target="#createJurusanModal"
                            class="btn btn-sm btn-primary px-3 rounded-pill shadow-sm">
                        <i class="fas fa-plus mr-1"></i> Tambah Jurusan
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="alert alert-info-light border-0 shadow-none d-flex align-items-center mb-4 p-3 rounded-lg">
                    <div class="bg-info p-2 rounded-circle mr-3" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center">
                        <i class="fas fa-info-circle text-white small"></i>
                    </div>
                    <div class="small">
                        Abaikan halaman ini jika sekolah tidak memiliki jurusan (khusus jenjang SMP/MTs atau SD/MI).
                    </div>
                </div>

                <?= form_open('', array('id' => 'bulk')) ?>
                <div class="table-responsive p-1">
                    <table id="jurusan" class="table-modern-list">
                        <thead>
                        <tr>
                            <th width="40" class="text-center">
                                <div class="custom-control custom-checkbox ml-1">
                                    <input type="checkbox" class="custom-control-input" id="select_all">
                                    <label class="custom-control-label" for="select_all"></label>
                                </div>
                            </th>
                            <th width="60" class="text-center">NO.</th>
                            <th width="120">KODE</th>
                            <th>NAMA JURUSAN</th>
                            <th>MAPEL PEMINATAN</th>
                            <th width="80" class="text-center">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($jurusans as $row) :
                            $badges = '';
                            foreach (explode(',', $row->mapel_peminatan ?? '') as $mid) {
                                if ($mid != '')
                                    $badges .= '<span class="badge badge-soft-success border-0 px-2 py-1 mr-1 mb-1" style="font-size: 0.75rem">' . $jurusan_mapels[$row->id_jurusan][$mid] . '</span>';
                            }
                            ?>
                            <tr>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox ml-1">
                                        <input type="checkbox" class="custom-control-input check" id="check<?= $row->id_jurusan ?>" name="checked[]" value="<?= $row->id_jurusan ?>">
                                        <label class="custom-control-label" for="check<?= $row->id_jurusan ?>"></label>
                                    </div>
                                </td>
                                <td class="text-center font-weight-bold text-muted small"><?= $no ?></td>
                                <td><span class="badge bg-light text-primary font-weight-bold px-2 py-1 border"><?= $row->kode_jurusan ?></span></td>
                                <td class="font-weight-bold"><?= $row->nama_jurusan ?></td>
                                <td><?= empty($badges) ? '<span class="text-muted small italic">Tidak ada mapel peminatan</span>' : $badges ?></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-white text-warning bordershadow-hover editRecord" data-toggle="modal"
                                       data-target="#editJurusanModal" data-deletable="<?= $row->deletable ?>"
                                       data-mapel="<?= $row->mapel_peminatan ?>"
                                       data-id='<?= $row->id_jurusan ?>'
                                       data-nama='<?= $row->nama_jurusan ?>'
                                       data-kode='<?= $row->kode_jurusan ?>'>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </section>
</div>

<style>
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

    .alert-info-light { background-color: rgba(66, 153, 225, 0.1); color: #2b6cb0; }
    .badge-soft-success { background-color: #ecfdf5; color: #059669; }
    .card-modern { border-radius: 16px; }
    .btn-white { background: white; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s; }
    .btn-white:hover { background: #f8fafc; border-color: #cbd5e1; transform: scale(1.05); }
</style>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createJurusanModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title font-weight-bold" id="createModalLabel" style="font-size: 1.1rem">
                    <i class="fas fa-graduation-cap mr-2"></i>Tambah Jurusan
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Nama Jurusan <span class="text-danger">*</span></label>
                    <input type="text" id="createnama" name="nama_jurusan" class="form-control border-light-dark" placeholder="Contoh: IPA, IPS, Teknik" required style="background: #f8fafc">
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kode Jurusan <span class="text-danger">*</span></label>
                    <input type="text" id="createkode" name="kode_jurusan" class="form-control border-light-dark" placeholder="Contoh: IPA, TITL" required style="background: #f8fafc">
                </div>
                
                <hr class="my-4">
                <h6 class="font-weight-bold text-muted mb-3 uppercase" style="font-size: 0.7rem; letter-spacing: 1px">Mapel Peminatan</h6>
                
                <?php foreach ($kode_peminatan as $kode) : ?>
                    <div class="form-group mb-3">
                        <?php if (isset($mapel_peminatan[$kode->kode_kel_mapel])) : ?>
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem"><?= $kode->nama_kel_mapel ?></label>
                            <?php if (count($mapel_peminatan) === 0) : ?>
                                <select class="form-control" disabled>
                                    <option value="0" selected disabled>Belum ada mapel <?= $kode->nama_kel_mapel ?></option>
                                </select>
                            <?php else:
                                foreach ($mapel_peminatan as $k_mpl=>$mapels) :
                                    if ($k_mpl === $kode->kode_kel_mapel) : ?>
                                        <select name="mapel[]" id="create_mapel_peminatan<?= $kode->kode_kel_mapel ?>"
                                                class="form-control mapel_peminatan select2" multiple="" data-placeholder="Pilih mapel peminatan">
                                            <?php foreach ($mapels as $kd_mpl=>$mapel) :?>
                                                <option value="<?= $kd_mpl ?>"><?= $mapel ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; endforeach; endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer bg-light border-0 py-3 px-4">
                <button type="button" class="btn btn-link text-muted font-weight-bold" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary px-4 shadow-sm font-weight-bold">
                    <i class="fas fa-save mr-2"></i> Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= form_open('update', array('id' => 'update')) ?>
<div class="modal fade" id="editJurusanModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-warning text-white border-0 py-3">
                <h5 class="modal-title font-weight-bold" id="editModalLabel" style="font-size: 1.1rem">
                    <i class="fas fa-edit mr-2"></i>Edit Jurusan
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Nama Jurusan <span class="text-danger">*</span></label>
                    <input type="text" id="namaEdit" name="nama_jurusan" class="form-control border-light-dark" required style="background: #f8fafc">
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kode Jurusan <span class="text-danger">*</span></label>
                    <input type="text" id="kodeEdit" name="kode_jurusan" class="form-control border-light-dark" required style="background: #f8fafc">
                </div>

                <hr class="my-4">
                <h6 class="font-weight-bold text-muted mb-3 uppercase" style="font-size: 0.7rem; letter-spacing: 1px">Mapel Peminatan</h6>

                <?php foreach ($kode_peminatan as $kode) : ?>
                    <div class="form-group mb-3">
                        <?php if (isset($mapel_peminatan[$kode->kode_kel_mapel])) : ?>
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem"><?= $kode->nama_kel_mapel ?></label>
                            <?php if (count($mapel_peminatan) === 0) : ?>
                                <select class="form-control" disabled>
                                    <option value="0" selected disabled>Belum ada mapel <?= $kode->nama_kel_mapel ?></option>
                                </select>
                            <?php else:
                                foreach ($mapel_peminatan as $k_mpl=>$mapels) :
                                    if ($k_mpl === $kode->kode_kel_mapel) : ?>
                                        <select name="mapel[]" id="mapel_peminatan<?= $kode->kode_kel_mapel ?>"
                                                class="form-control mapel_peminatan select2" multiple="" data-placeholder="Pilih mapel peminatan">
                                        </select>
                                    <?php endif; endforeach; endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer bg-light border-0 py-3 px-4">
                <input type="hidden" id="editIdJurusan" name="id_jurusan" class="form-control">
                <button type="button" class="btn btn-link text-muted font-weight-bold" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning text-white px-4 shadow-sm font-weight-bold">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<!--
<div class="template-demo d-flex justify-content-between flex-wrap">
    <button type="button" class="btn btn-success btn-fw" onclick="showSuccessToast()">Success</button>
    <button type="button" class="btn btn-info btn-fw" onclick="showInfoToast()">Info</button>
    <button type="button" class="btn btn-warning btn-fw" onclick="showWarningToast()">Warning</button>
    <button type="button" class="btn btn-danger btn-fw" onclick="showDangerToast()">Danger</button>
</div>
-->
<script>
    var mapels = JSON.parse('<?= json_encode($mapel_peminatan) ?>');
</script>
<script src="<?= base_url() ?>/assets/app/js/master/jurusan/crud.js"></script>
