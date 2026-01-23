<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-book mr-2"></i>Pengaturan Mata Pelajaran & Kelompok
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <!-- Kelompok Section -->
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="card-title font-weight-bold text-dark">
                    <i class="fas fa-layer-group mr-2 text-primary"></i>Kelompok Mata Pelajaran
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <!-- Kelompok Utama -->
                    <div class="col-md-6 mb-4 mb-md-0 pl-3 border-md-right">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0 font-weight-bold text-muted uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px">Kelompok Utama</h6>
                            <button type="button" data-toggle="modal" data-target="#editKelompokModal"
                                    class="btn btn-xs btn-primary shadow-sm rounded-pill px-2">
                                <i class="fa fa-plus mr-1"></i> Tambah
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="tableKelompok" class="w-100 table-modern-list">
                                <thead>
                                <tr>
                                    <th>KATEGORI</th>
                                    <th>KODE</th>
                                    <th>NAMA</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- Sub Kelompok -->
                    <div class="col-md-6 pl-md-4 pr-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0 font-weight-bold text-muted uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px">Sub Kelompok</h6>
                            <button type="button" data-toggle="modal" data-target="#editSubKelompokModal"
                                    class="btn btn-xs btn-primary shadow-sm rounded-pill px-2">
                                <i class="fa fa-plus mr-1"></i> Tambah
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="tableSubKelompok" class="w-100 table-modern-list">
                                <thead>
                                <tr>
                                    <th>KODE</th>
                                    <th>NAMA</th>
                                    <th>KEL. UTAMA</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Subject List -->
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="card-title font-weight-bold text-dark">
                    <i class="fas fa-list-ul mr-2 text-primary"></i><?= $subjudul ?>
                </div>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body p-4">
                <div class="alert alert-info-light border-0 shadow-none d-flex align-items-center mb-4 p-3 rounded-lg">
                    <div class="bg-info p-2 rounded-circle mr-3" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center">
                        <i class="fas fa-info-circle text-white small"></i>
                    </div>
                    <div class="small">
                        <b>Kelompok</b> diperlukan untuk pengelompokan Mata Pelajaran.
                    </div>
                </div>
                
                <?= form_open('', array('id' => 'bulk')) ?>
                <div class="table-responsive p-2">
                    <table id="tableMapel" class="table-modern-list">
                        <thead>
                        <tr>
                            <th width="40" class="text-center">
                                <div class="custom-control custom-checkbox ml-1">
                                    <input type="checkbox" class="custom-control-input select_all" id="select_all_top">
                                    <label class="custom-control-label" for="select_all_top"></label>
                                </div>
                            </th>
                            <th width="100" class="text-center">URUTAN</th>
                            <th>MATA PELAJARAN</th>
                            <th class="text-center">KODE MAPEL</th>
                            <th class="text-center">KELOMPOK</th>
                            <th class="text-center">STATUS</th>
                            <th width="80" class="text-center">AKSI</th>
                        </tr>
                        </thead>
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
        padding: 18px 20px !important;
        vertical-align: middle !important;
        color: #334155;
    }

    /* Rounding the corners of each row */
    .table-modern-list tbody td:first-child {
        border-top-left-radius: 12px !important;
        border-bottom-left-radius: 12px !important;
    }

    .table-modern-list tbody td:last-child {
        border-top-right-radius: 12px !important;
        border-bottom-right-radius: 12px !important;
    }

    /* Group Headers */
    .group-header-row {
        background: transparent !important;
    }

    .group-header-row td {
        padding: 20px 10px 10px 10px !important;
        font-weight: 800;
        color: #475569 !important;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .group-header-label {
        background: #e2e8f0;
        padding: 4px 12px;
        border-radius: 6px;
        display: inline-block;
    }

    .alert-info-light { background-color: rgba(66, 153, 225, 0.1); color: #2b6cb0; }
    .card-modern { border-radius: 16px; background: #f8fafc; }
    
    /* Buttons */
    .btn-reload {
        background: white;
        border: 1px solid #e2e8f0;
        color: #475569;
        font-weight: 600;
        transition: all 0.2s;
    }
    .btn-reload:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        transform: rotate(15deg);
    }
</style>

<?= form_open('create', array('id' => 'create-kelompok')) ?>
<div class="modal fade" id="editKelompokModal" tabindex="-1" role="dialog" aria-labelledby="editKelompokModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title font-weight-bold" id="editKelompokModalLabel" style="font-size: 1.1rem">
                    <i class="fas fa-layer-group mr-2"></i>Kelompok Mata Pelajaran
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" id="id_kel_mapel" name="id_kel_mapel" class="form-control" required>
                <input type="hidden" name="id_parent" value="0" class="form-control" required>
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kode Kelompok <span class="text-danger">*</span></label>
                    <input type="text" id="createkodekel" name="kode_kel_mapel" class="form-control border-light-dark" placeholder="Contoh: A, B, C" required style="background: #f8fafc">
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Nama Kelompok <span class="text-danger">*</span></label>
                    <input type="text" id="createnamakel" name="nama_kel_mapel" class="form-control border-light-dark" placeholder="Nama Kelompok Utama" required style="background: #f8fafc">
                </div>
                <div class="form-group mb-0">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kategori <span class="text-danger">*</span></label>
                    <select id="kategori" name="kategori" class="form-control border-light-dark" required="" style="background: #f8fafc">
                        <?php
                        foreach ($kategori as $kat) : ?>
                            <option value="<?= $kat ?>"><?= $kat ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
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

<?= form_open('create', array('id' => 'create-sub-kelompok')) ?>
<div class="modal fade" id="editSubKelompokModal" tabindex="-1" role="dialog"
     aria-labelledby="editSubKelompokModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-info text-white border-0 py-3">
                <h5 class="modal-title font-weight-bold" id="editSubKelompokModalLabel" style="font-size: 1.1rem">
                    <i class="fas fa-folder-plus mr-2"></i>Sub Kelompok Mata Pelajaran
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" id="id_kel_sub" name="id_kel_mapel" class="form-control" required>
                <input type="hidden" id="kategori_sub" name="kategori" class="form-control" required>
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kode Sub Kelompok <span class="text-danger">*</span></label>
                    <input type="text" id="createkodesub" name="kode_kel_mapel" class="form-control border-light-dark" placeholder="Contoh: A.1, A.2" required style="background: #f8fafc">
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Nama Sub <span class="text-danger">*</span></label>
                    <input type="text" id="createnamasub" name="nama_kel_mapel" class="form-control border-light-dark" placeholder="Nama Sub Kelompok" required style="background: #f8fafc">
                </div>
                <div class="form-group mb-0">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kelompok Utama <span class="text-danger">*</span></label>
                    <select id="id_parent_sub" name="id_parent" class="form-control border-light-dark" required style="background: #f8fafc">
                        <?php
                        foreach ($kelompok_mapel as $ky => $km) :
                            if ($km->id_parent == 0) :
                                ?>
                                <option value="<?= $ky ?>"><?= $km->nama_kel_mapel ?></option>
                            <?php endif; endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer bg-light border-0 py-3 px-4">
                <button type="button" class="btn btn-link text-muted font-weight-bold" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info text-white px-4 shadow-sm font-weight-bold">
                    <i class="fas fa-save mr-2"></i> Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createMapelModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title font-weight-bold" id="createModalLabel" style="font-size: 1.1rem">
                    <i class="fas fa-book-medical mr-2"></i>Tambah Mata Pelajaran
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" id="createnama" name="nama_mapel" class="form-control border-light-dark" placeholder="Nama Lengkap Mapel" required style="background: #f8fafc">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kode Mapel <span class="text-danger">*</span></label>
                            <input type="text" id="createkode" name="kode_mapel" class="form-control border-light-dark" placeholder="Singkatan" required style="background: #f8fafc">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kelompok <span class="text-danger">*</span></label>
                            <?php echo form_dropdown('kelompok', $kelompok, '', 'class="form-control border-light-dark" required style="background: #f8fafc"'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Status <span class="text-danger">*</span></label>
                            <?php echo form_dropdown('status', $status, '1', 'class="form-control border-light-dark" required style="background: #f8fafc"'); ?>
                        </div>
                    </div>
                </div>
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
<div class="modal fade" id="editMapelModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-warning text-white border-0 py-3">
                <h5 class="modal-title font-weight-bold" id="editModalLabel" style="font-size: 1.1rem">
                    <i class="fas fa-edit mr-2"></i>Edit Mata Pelajaran
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3" id="formnama">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" id="namaEdit" name="nama_mapel" class="form-control border-light-dark" placeholder="Nama Lengkap Mapel" required style="background: #f8fafc">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3" id="formkode">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kode Mapel <span class="text-danger">*</span></label>
                            <input type="text" id="kodeEdit" name="kode_mapel" class="form-control border-light-dark" placeholder="Singkatan" required style="background: #f8fafc">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0" id="formkelompok">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kelompok <span class="text-danger">*</span></label>
                            <?php echo form_dropdown('kelompok', $kelompok, '', 'id="kelompok" class="form-control border-light-dark" required style="background: #f8fafc"'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-0" id="formstatus">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Status <span class="text-danger">*</span></label>
                            <?php echo form_dropdown('status', $status, '1', 'id="status" class="form-control border-light-dark" required style="background: #f8fafc"'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0 py-3 px-4">
                <input type="hidden" id="editIdMapel" name="id_mapel" class="form-control">
                <button type="button" class="btn btn-link text-muted font-weight-bold" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning text-white px-4 shadow-sm font-weight-bold">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<div class="modal fade" id="editDataMapelModal" tabindex="-1" role="dialog" aria-labelledby="editDataMapelModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-dark text-white border-0 py-3">
                <h5 class="modal-title font-weight-bold" id="editDataMapelModalLabel" style="font-size: 1.1rem">
                    <i class="fas fa-cog mr-2"></i>Setting Mata Pelajaran
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <!-- Content will be loaded dynamically -->
            </div>
            <div class="modal-footer bg-light border-0 py-3 px-4">
                <button type="button" class="btn btn-link text-muted font-weight-bold" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-dark px-4 shadow-sm font-weight-bold">
                    <i class="fas fa-save mr-2"></i> Simpan Konfigurasi
                </button>
            </div>
        </div>
    </div>
</div>

<?= form_open('create', array('id' => 'hapus-kelompok')) ?>
<?= form_close() ?>
<script>
    var jsonkelompokMapel = JSON.parse(JSON.stringify(<?=json_encode($kelompok_mapel)?>));
    var kelompokMapel = Object.keys(jsonkelompokMapel).map(function (key) {
        return jsonkelompokMapel[key];
    });

    var save_label;
    var table;
    var tableKelompok;
    var tableSubKelompok;
    $(document).ready(function () {
        ajaxcsrf();
        tableKelompok = $("#tableKelompok").DataTable({
            initComplete: function () {
                var api = this.api();
                $("#tableMapel_filter input")
                    .off(".DT")
                    .on("keyup.DT", function (e) {
                        api.search(this.value).draw();
                    });
            },
            searching: false,
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            paging: false,
            ajax: {
                url: base_url + "datamapel/getdatakelompok",
                type: "POST"
            },
            columns: [
                {
                    data: "kategori",
                    className: "text-center",
                },
                {
                    data: "kode_kel_mapel",
                    className: "text-center",
                },
                {
                    data: "nama_kel_mapel",
                }
            ],
            columnDefs: [
                {
                    searchable: false,
                    targets: 3,
                    className: "text-center",
                    data: {
                        id_kel_mapel: "id_kel_mapel",
                        nama_kel_mapel: "nama_kel_mapel",
                        kode_kel_mapel: "kode_kel_mapel",
                        id_parent: "id_parent",
                        kategori: "kategori"
                    },
                    render: function (data, type, row, meta) {
                        return `<div class="btn-group btn-group-xs">
									<a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editKelompokModal"
									 data-id="${data.id_kel_mapel}"
									 data-nama="${data.nama_kel_mapel}"
									  data-kode="${data.kode_kel_mapel}"
									  data-kategori="${data.kategori}">
										<i class="fa fa-pencil-alt text-white"></i>
									</a>

                                    <button onclick="hapusKelompok(this)" class="btn btn-danger btn-xs deleteRecord"
									 data-id="${data.id_kel_mapel}"
									 data-utama="${data.id_parent}"
								  data-kode="${data.kode_kel_mapel}">
                                                    <i class="fa fa-trash text-white"></i>
                                                </button>
								</div>`;
                    }
                }
            ],
            order: [[0, "asc"]],
            rowId: function (a) {
                return a;
            },
        });

        tableSubKelompok = $("#tableSubKelompok").DataTable({
            initComplete: function () {
                var api = this.api();
                $("#tableMapel_filter input")
                    .off(".DT")
                    .on("keyup.DT", function (e) {
                        api.search(this.value).draw();
                    });
            },
            searching: false,
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            paging: false,
            ajax: {
                url: base_url + "datamapel/getdatasubkelompok",
                type: "POST"
            },
            columns: [
                {
                    data: "kode_kel_mapel",
                    className: "text-center",
                },
                {
                    data: "nama_kel_mapel",
                },
                {
                    data: "kategori",
                    className: "text-center",
                }
            ],
            columnDefs: [
                {
                    searchable: false,
                    targets: 3,
                    className: "text-center",
                    data: {
                        id_kel_mapel: "id_kel_mapel",
                        nama_kel_mapel: "nama_kel_mapel",
                        kode_kel_mapel: "kode_kel_mapel",
                        id_parent: "id_parent",
                        kategori: "kategori"
                    },
                    render: function (data, type, row, meta) {
                        return `<div class="btn-group btn-group-xs">
									<a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editSubKelompokModal"
									 data-id="${data.id_kel_mapel}"
									 data-nama="${data.nama_kel_mapel}"
									  data-kode="${data.kode_kel_mapel}"
									  data-utama="${data.id_parent}"
									  data-kategori="${data.kategori}">
									    <i class="fa fa-pencil-alt text-white"></i>
									</a>
                                                <button onclick="hapusKelompok(this)" class="btn btn-danger btn-xs deleteRecord"
									 data-id="${data.id_kel_mapel}"
									 data-utama="${data.id_parent}"
								  data-kode="${data.kode_kel_mapel}">
                                                    <i class="fa fa-trash text-white"></i>
                                                </button>
								</div>`;
                    }
                }
            ],
            order: [[0, "asc"]],
            rowId: function (a) {
                return a;
            },
        });

        var groupColumn = 4;
        table = $("#tableMapel").DataTable({
            initComplete: function () {
                var api = this.api();
                $("#tableMapel_filter input")
                    .off(".DT")
                    .on("keyup.DT", function (e) {
                        api.search(this.value).draw();
                    });
            },
            dom:
                "<'row'<'toolbar col-sm-6'lfrtip><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            paging: false,
            ajax: {
                url: base_url + "datamapel/read",
                type: "POST"
            },
            columns: [
                {
                    data: "id_mapel",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "urutan_tampil",
                    className: "text-center",
                    searchable: false
                },
                {
                    data: "nama_mapel",
                },
                {
                    data: "kode",
                    className: "text-center",
                },
                {
                    data: "kelompok",
                    className: "text-center",
                },
                {
                    data: "status",
                    className: "text-center",
                }
            ],
            columnDefs: [
                //{ "visible": false, "targets": groupColumn },
                {
                    targets: 0,
                    data: null,
                    render: function (data, type, row, meta) {
                        //var disabled = row.deletable === '0' ? 'disabled' : 'enabled';
                        var disabled = row.deletable === '0' ? '' : '';
                        return `<div class="text-center">
									<input id="check${row.id_mapel}" name="checked[]" class="check ${disabled}" value="${row.id_mapel}" type="checkbox" ${disabled}>
								</div>`;
                    }
                },
                {
                    searchable: false,
                    targets: 6,
                    data: {
                        id_mapel: "id_mapel",
                        nama_mapel: "nama_mapel",
                        kode: "kode",
                        kelompok: "kelompok",
                        deletable: "deletable",
                        status: "status",
                        urutan_tampil: "urutan_tampil"
                    },
                    render: function (data, type, row, meta) {
                        //var disabled = data.deletable === '0' ? 'disabled' : '';
                        var disabled = data.deletable === '0' ? '' : '';
                        return `<div class="text-center">
									<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editMapelModal"
									 data-deletable="${data.deletable}" data-status="${data.status}" data-id="${data.id_mapel}"
									  data-nama="${data.nama_mapel}" data-kode="${data.kode}" data-kelompok="${data.kelompok}"
									   data-urutan="${data.urutan_tampil}">
										<i class="fa fa-pencil-alt text-white"></i>
									</a>
									<!--
									<button onclick="deleteItem(${data.id_mapel})" class="btn btn-xs btn-danger deleteRecord" data-id='${data.id_mapel}' ${disabled}>
								<i class="fa fa-trash text-white"></i>
							</button>
							-->
								</div>`;
                    }
                }
            ],
            //order: [[4, "asc"]],
            order: [[ groupColumn, 'asc' ]],
            rowId: function (a) {
                return a;
            },
            drawCallback: function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;

                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group-header-row"><td colspan="7"><span class="group-header-label"><i class="fas fa-folder-open mr-2 text-primary"></i> Kelompok: '+group+'</span></td></tr>'
                        );
                        last = group;
                    }
                } );
            },
            rowCallback: function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$("td:eq(1)", row).html(index);

                var st = data.status === '0' ?
                    '<div class="badge badge-btn badge-secondary">Nonaktif</div>' :
                    '<div class="badge badge-btn badge-success">Aktif</div>';
                $("td:eq(5)", row).html(st);
            }
        });

        table
            .buttons()
            .container()
            .appendTo("#tableMapel_wrapper .col-md-6:eq(1)");

        $("div.toolbar").html(
            '<button id="hapusterpilih" onclick="bulk_delete()" type="button" class="btn btn-sm btn-danger mr-3 mb-2 d-none" data-toggle="tooltip" title="Hapus Terpilh"><i class="far fa-trash-alt"></i></button>' +
            '<button type="button" data-toggle="modal" data-target="#createMapelModal" class="btn btn-sm btn-primary mr-1 mb-2"><i class="fa fa-plus"></i> Tambah Data</button>' +
            '<a href="'+base_url+'datamapel/import" class="btn btn-sm btn-success mr-1 mb-2"><i class="fa fa-upload"></i> Import</a>'
            /*'<button data-toggle="modal" data-target="#editDataMapelModal" class="btn btn-sm btn-warning" type="button"><i class="fas fa-cog"></i> Mapel Nonaktif</button>'
            /*'<div class="btn-group">' +
            '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></button>' +
            '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As PDF"><i class="fas fa-file-pdf"></i></button>' +
            '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Word"><i class="fa fa-file-word"></i></button>' +
            '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Excel"><i class="fa fa-file-excel"></i></button>' +
            //'<button type="button" class="btn btn-default" data-toggle="modal" data-target="#mapelNonAktif">Lihat Mapel Nonaktif</button>' +
            '</div>'
            */
        );

        $('#id_parent_sub').on('change', function () {
            var indexKelompok = kelompokMapel.map(function (kel) { return kel.id_kel_mapel; }).indexOf($(this).val());
            var kategori = kelompokMapel[indexKelompok].kategori;
            $('#kategori_sub').val(kategori);
        });

        $("#myModal").on("shown.modal.bs", function () {
            $(':input[name="banyak"]').select();
        });

        $('#editKelompokModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var nama = $(e.relatedTarget).data('nama');
            var kode = $(e.relatedTarget).data('kode');
            var kat = $(e.relatedTarget).data('kategori');

            $('#createnamakel').val(nama);
            $('#createkodekel').val(kode);
            $('#id_kel_mapel').val(id);
            $('#kategori').val(kat);
        });

        $('#editSubKelompokModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var nama = $(e.relatedTarget).data('nama');
            var kode = $(e.relatedTarget).data('kode');
            var utama = $(e.relatedTarget).data('utama');
            var kat = $(e.relatedTarget).data('kategori');

            $('#createnamasub').val(nama);
            $('#createkodesub').val(kode);
            $('#id_kel_sub').val(id);
            $('#id_parent_sub').val(utama);
            $('#kategori_sub').val(kat);
            console.log(utama);
        });

        $('#create-kelompok').on('submit', function () {
            $.ajax({
                url: base_url + "datamapel/addkelompokmapel",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    $('#editKelompokModal').modal('hide').data('bs.modal', null);
                    $('#editKelompokModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showSuccessToast('Data berhasil disimpan.');
                    //tableKelompok.ajax.reload();
                    setTimeout(function () {
                        window.location.reload(true);
                    }, 1000);
                }, error: function (xhr, status, error) {
                    $('#editKelompokModal').modal('hide').data('bs.modal', null);
                    $('#editKelompokModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast("Gagal menyimpan data");
                }
            });
            return false;
        });

        $('#create-sub-kelompok').on('submit', function () {
            $.ajax({
                url: base_url + "datamapel/addkelompokmapel",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    $('#editSubKelompokModal').modal('hide').data('bs.modal', null);
                    $('#editSubKelompokModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showSuccessToast('Data berhasil disimpan.');
                    //tableSubKelompok.ajax.reload();
                    setTimeout(function () {
                        window.location.reload(true);
                    }, 1000);
                }, error: function (xhr, status, error) {
                    $('#editSubKelompokModal').modal('hide').data('bs.modal', null);
                    $('#editSubKelompokModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast("Gagal menyimpan data");
                }
            });
            return false;
        });

        $(".select_all").on("click", function () {
            if (this.checked) {
                $(".check").each(function () {
                    this.checked = true;
                    $(".select_all").prop("checked", true);
                    $('#hapusterpilih').removeClass('d-none');
                });
            } else {
                $(".check").each(function () {
                    this.checked = false;
                    $(".select_all").prop("checked", false);
                    $('#hapusterpilih').addClass('d-none');
                });
            }
        });

        $("#tableMapel tbody").on("click", "tr .check", function () {
            var check = $("#tableMapel tbody tr .check").length;
            var checked = $("#tableMapel tbody tr .check:checked").length;
            if (check === checked) {
                $(".select_all").prop("checked", true);
            } else {
                $(".select_all").prop("checked", false);
            }

            if (checked === 0) {
                $('#hapusterpilih').addClass('d-none');
            } else {
                $('#hapusterpilih').removeClass('d-none');
            }
        });

        $('#create').on('submit', function () {
            var nama = $('#createnama').val();
            var kode = $('#createkode').val();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "datamapel/create",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    $('#createMapelModal').modal('hide').data('bs.modal', null);
                    $('#createMapelModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showSuccessToast('Data berhasil disimpan.');
                    table.ajax.reload();
                }, error: function (xhr, status, error) {
                    $('#createMapelModal').modal('hide').data('bs.modal', null);
                    $('#createMapelModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast("Gagal menyimpan data");
                }
            });
            return false;
        });

        $('#editMapelModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var nama = $(e.relatedTarget).data('nama');
            var kode = $(e.relatedTarget).data('kode');
            var kelompok = $(e.relatedTarget).data('kelompok');
            var status = $(e.relatedTarget).data('status');
            var deletable = $(e.relatedTarget).data('deletable');
            var urut = $(e.relatedTarget).data('urutan');

            $('#namaEdit').val(nama);
            $('#kodeEdit').val(kode);
            $('#editIdMapel').val(id);
            $('#kelompok').val(kelompok);
            $('#status').val(status);
            $('#kodeUrut').val(urut);

            //console.log(status);
            /*
            if (deletable == 0) {
                $('#formnama').addClass('d-none');
                $('#formkode').addClass('d-none');
                $('#formkelompok').addClass('d-none');
            } else {
                $('#formnama').removeClass('d-none');
                $('#formkode').removeClass('d-none');
                $('#formkelompok').removeClass('d-none');
            }
            */
        });

        $('#update').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            //var btn = $('#submit');
            //btn.attr('disabled', 'disabled').text('Wait...');
            console.log("data", $(this).serialize());

            $.ajax({
                url: base_url + "datamapel/update",
                data: $(this).serialize(),
                method: 'POST',
                dataType: "JSON",
                success: function (data) {
                    console.log("result", jQuery.parseJSON(data));
                    //btn.removeAttr('disabled').text('Simpan');
                    $('#editMapelModal').modal('hide').data('bs.modal', null);
                    $('#editMapelModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });

                    showSuccessToast('Data berhasil diupdate.');
                    table.ajax.reload();
                },
                error: function (xhr, status, error) {
                    $('#editMapelModal').modal('hide').data('bs.modal', null);
                    $('#editMapelModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast('Error');
                    console.log(xhr);
                }
            });
        });

        $("#bulk").on("submit", function (e) {
            if ($(this).attr("action") == base_url + "datamapel/delete") {
                e.preventDefault();
                e.stopImmediatePropagation();

                $.ajax({
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    type: "POST",
                    success: function (respon) {
                        console.log('tables', respon);
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: respon.total + " data berhasil dihapus",
                                icon: "success"
                            });
                        } else {
                            swal.fire({
                                title: "Gagal",
                                html: respon.total,
                                icon: "error"
                            });
                        }
                        reload_ajax();
                    },
                    error: function () {
                        swal.fire({
                            title: "Gagal",
                            text: "Ada data yang sedang digunakan",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });

    function aktifkan(e) {
        var id = $(e).data('id');
        console.log(id);

        $.ajax({
            url: base_url + "datamapel/aktifkan/"+id,
            type: "GET",
            success: function (data) {
                console.log("result", data);
                window.location.href = base_url + 'datamapel'
            }, error: function (xhr, status, error) {
                $('#mapelNonAktif').modal('hide').data('bs.modal', null);
                $('#mapelNonAktif').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });
                showDangerToast();
            }
        });
    }

    function dismissEdit() {
        var count = $('#tableMapel tr').length;
        console.log("size", "-->"+count);
        for (var i = 0; i<count; i++) {
            var inputs = document.getElementById('check'+i);
            if (inputs!=null) {
                inputs.checked = false;
                console.log("id", "-->"+'check'+i);
            }
        }
    }

    function deleteItem(id) {
        dismissEdit();
        var checkBox = document.getElementById("check" + id);
        checkBox.checked = true;
        bulk_delete("check" + id);
    }

    function bulk_delete(id) {
        if ($("#tableMapel tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            $("#bulk").attr("action", base_url + "datamapel/delete");
            swal.fire({
                title: "Anda yakin?",
                text: "Data akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!"
            }).then(result => {
                if (result.value) {
                    $("#bulk").submit();
                } else {
                    var inputs = document.getElementById(id);
                    inputs.checked = false;
                }
            });
        }
    }

    function bulk_edit() {
        if ($("#tableMapel tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            $("#bulk").attr("action", base_url + "datamapel/edit");
            $("#bulk").submit();
        }
    }

    function hapusKelompok(e) {
        var id = $(e).data('id');
        var kode = $(e).data('kode');
        var parent = $(e).data('utama');

        var dataPost = $('#hapus-kelompok').serialize() + '&id_kel='+id+'&id_parent='+parent+'&kode='+kode;
        console.log(dataPost);

        swal.fire({
            title: "Anda yakin?",
            text: "Data Kelompok Mapel akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + "datamapel/hapuskelompok",
                    type: "POST",
                    data: dataPost,
                    success: function (data) {
                        console.log("result", data);
                        if (data.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Data berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    tableKelompok.ajax.reload();
                                    tableSubKelompok.ajax.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                title: "Gagal",
                                html: data.message,
                                icon: "error"
                            });
                        }
                    }, error: function (xhr, status, error) {
                        showDangerToast();
                    }
                });
            }
        });
    }
</script>
