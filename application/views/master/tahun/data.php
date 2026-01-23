<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-calendar-check mr-2"></i>Pengaturan Periode Akademik
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="card card-modern border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <div class="card-title font-weight-bold text-dark">
                    <i class="fas fa-list mr-2 text-primary"></i><?= $subjudul ?>
                </div>
                <div class="card-tools">
                    <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-light border-0 px-3">
                        <i class="fa fa-sync mr-1"></i> Reload
                    </button>
                    <button type="button" data-from="add" data-toggle="modal" data-target="#createTahunModal"
                            class="btn btn-sm btn-primary px-3 shadow-sm border-0 ml-2">
                        <i class="fas fa-plus mr-1"></i> Tambah Tahun Pelajaran
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <!-- Column 1: Tahun Pelajaran -->
                    <div class="col-md-7 border-right">
                        <div class="p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary-soft p-2 rounded-lg mr-3">
                                    <i class="fas fa-calendar-alt text-primary"></i>
                                </div>
                                <h6 class="mb-0 font-weight-bold">Tahun Pelajaran</h6>
                            </div>
                            
                            <?= form_open('', array('id' => 'edittp')) ?>
                            <div class="table-responsive">
                                <table id="tahun" class="table table-hover table-sm mb-0">
                                    <thead class="bg-light">
                                    <tr>
                                        <th class="d-none">id</th>
                                        <th width="60" class="text-center py-3">NO.</th>
                                        <th class="py-3">TAHUN PELAJARAN</th>
                                        <th class="text-center py-3">STATUS</th>
                                        <th class="text-right py-3 pr-4">AKSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($tp as $key => $value) : ?>
                                        <tr class="<?= $value->active ? 'bg-light-primary' : '' ?>">
                                            <td class="d-none"><?= $value->id_tp ?></td>
                                            <td class="text-center vertical-middle"><?= ($key + 1) ?></td>
                                            <td class="vertical-middle font-weight-bold"><?= $value->tahun ?></td>
                                            <td class="text-center vertical-middle">
                                                <?php if ($value->active) : ?>
                                                    <span class="badge badge-success px-3 py-2 rounded-pill shadow-sm">
                                                        <i class="fa fa-check-circle mr-1"></i> AKTIF
                                                    </span>
                                                <?php else : ?>
                                                    <button type="button" data-id="<?= $value->id_tp ?>"
                                                            class="btn btn-xs btn-outline-primary px-3 rounded-pill btn-aktif">
                                                        Aktifkan
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-right vertical-middle pr-4">
                                                <div class="btn-group">
                                                    <button type="button" data-id="<?= $value->id_tp ?>"
                                                            data-tahun="<?= $value->tahun ?>" data-from="edit"
                                                            data-toggle="modal" data-target="#createTahunModal"
                                                            class="btn btn-sm btn-white text-warning border-0 btn-edit" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" data-id="<?= $value->id_tp ?>"
                                                            class="btn btn-sm btn-white text-danger border-0 btn-hapus" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>

                    <!-- Column 2: Semester -->
                    <div class="col-md-5 bg-light-soft">
                        <div class="p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-info-soft p-2 rounded-lg mr-3">
                                    <i class="fas fa-list-ol text-info"></i>
                                </div>
                                <h6 class="mb-0 font-weight-bold">Semester</h6>
                            </div>

                            <?= form_open('', array('id' => 'editsmt')) ?>
                            <div class="table-responsive">
                                <table id="semester" class="table table-hover table-sm mb-0 bg-white shadow-sm rounded-lg overflow-hidden" style="border: 1px solid #edf2f7">
                                    <thead class="bg-light">
                                    <tr>
                                        <th class="d-none">id</th>
                                        <th width="60" class="text-center py-3">NO.</th>
                                        <th class="py-3">SEMESTER</th>
                                        <th class="text-center py-3">STATUS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($smt as $key => $value) : ?>
                                        <tr class="<?= $value->active ? 'bg-light-info' : '' ?>">
                                            <td class="d-none"><?= $value->id_smt ?></td>
                                            <td class="text-center vertical-middle"><?= ($key + 1) ?></td>
                                            <td class="vertical-middle font-weight-bold"><?= $value->smt ?></td>
                                            <td class="text-center vertical-middle">
                                                <?php if ($value->active) : ?>
                                                    <span class="badge badge-info px-3 py-2 rounded-pill">
                                                        <i class="fa fa-check-circle mr-1"></i> AKTIF
                                                    </span>
                                                <?php else : ?>
                                                    <button type="button" data-id="<?= $value->id_smt ?>"
                                                            class="btn btn-xs btn-outline-info px-3 rounded-pill btn-aktif">
                                                        Aktifkan
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .bg-light-primary { background-color: rgba(67, 97, 238, 0.05) !important; }
    .bg-light-info { background-color: rgba(76, 201, 240, 0.05) !important; }
    .bg-primary-soft { background-color: rgba(67, 97, 238, 0.1); }
    .bg-info-soft { background-color: rgba(76, 201, 240, 0.1); }
    .bg-light-soft { background-color: #f8fafc; }
    .vertical-middle { vertical-align: middle !important; }
    .table thead th {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        border: 0;
    }
</style>

<?= form_open('', array('id' => 'create')) ?>
<div class="modal fade" id="createTahunModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; overflow: hidden">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title font-weight-bold" id="createModalLabel" style="font-size: 1.1rem">
                    <i class="fas fa-calendar-plus mr-2"></i>Tambah Tahun
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-group mb-0">
                    <label class="font-weight-bold text-dark mb-2" style="font-size: 0.9rem">Tahun Pelajaran <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-right-0"><i class="fas fa-calendar-alt text-muted"></i></span>
                        </div>
                        <input type="text" id="createtahun" name="tahun" class="form-control border-left-0" placeholder="Contoh: 2023/2024" required>
                    </div>
                    <small class="form-text text-muted mt-2">Format: YYYY/YYYY (misal: 2022/2023)</small>
                </div>
            </div>
            <div class="modal-footer bg-light border-0 py-3">
                <input type="hidden" id="editIdTahun" class="form-control">
                <input type="hidden" id="method" name="method" class="form-control">
                <button type="button" class="btn btn-link text-muted font-weight-bold" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary px-4 shadow-sm font-weight-bold" id="submit-tp">
                    <i class="fas fa-save mr-2"></i> Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<script type="text/javascript"
        src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson-cell.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson-row.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson.js"></script>
<script>
    $(document).ready(function () {
        $("#tahun").on("click", ".btn-aktif", function () {
            let id = $(this).data("id");
            var dataTahun = JSON.stringify($('#tahun').tableToJSON());
            var replaced = dataTahun.replace(/Tahun Pelajaran/g, "tp");

            //console.log($('#edittp').serialize() + "&active=" + id + "&tahun=" + replaced);
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
                url: base_url + "datatahun/gantitahun",
                data: $('#edittp').serialize() + "&active=" + id + "&tahun=" + replaced,
                type: "POST",
                success: function (response) {
                    var title = response.status ? "Berhasil" : "Gagal";
                    var type = response.status ? "success" : "error";

                    swal.fire({
                        title: title,
                        text: response.msg,
                        icon: type
                    }).then((result) => {
                        if (result.value) {
                            if (response.status) {
                                window.location.href = base_url + 'datatahun';
                            }
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
        });

        $('#createTahunModal').on('show.bs.modal', function (e) {
            var method = $(e.relatedTarget).data('from');
            $(e.currentTarget).find('input[id="method"]').val(method);

            if (method === 'edit') {
                $('#createModalLabel').text('Edit Tahun');
                var id = $(e.relatedTarget).data('id');
                var tahun = $(e.relatedTarget).data('tahun');

                $(e.currentTarget).find('input[id="editIdTahun"]').val(id);
                $(e.currentTarget).find('input[id="createtahun"]').val(tahun);

                var attrId = document.getElementById("editIdTahun");
                attrId.setAttribute("name", "id_tahun");
            } else {
                $('#createModalLabel').text('Tambah Tahun');
                $(e.currentTarget).find('input[id="editIdTahun"]').val('');
                $(e.currentTarget).find('input[id="createtahun"]').val('');
            }
        });

        $("#tahun").on("click", ".btn-hapus", function () {
            let id = $(this).data("id");
            swal.fire({
                title: 'Hapus Tahun',
                text: 'Anda yakin akan menghapus Tahun Pelajaran? tindakan ini akan membuat data yang berhubungan tidak aktif',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: base_url + "datatahun/hapustahun",
                        data: $('#edittp').serialize() + "&hapus=" + id,
                        type: "POST",
                        success: function (response) {
                            var title = response.status ? "Berhasil" : "Gagal";
                            var type = response.status ? "success" : "error";

                            swal.fire({
                                title: title,
                                text: response.msg,
                                icon: type
                            }).then((result) => {
                                if (result.value) {
                                    if (response.status) {
                                        window.location.href = base_url + 'datatahun';
                                    }
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
            });
        });

        $("#semester").on("click", ".btn-aktif", function () {
            let id = $(this).data("id");
            var dataSmt = JSON.stringify($('#semester').tableToJSON());
            //console.log($('#edittp').serialize() + "&active=" + id + "&tahun=" + replaced);
            $.ajax({
                url: base_url + "datatahun/gantisemester",
                data: $('#edittp').serialize() + "&active=" + id + "&semester=" + dataSmt,
                type: "POST",
                success: function (response) {
                    var title = response.status ? "Berhasil" : "Gagal";
                    var type = response.status ? "success" : "error";

                    swal.fire({
                        title: title,
                        text: response.msg,
                        icon: type
                    }).then((result) => {
                        if (result.value) {
                            if (response.status) {
                                window.location.href = base_url + 'datatahun';
                            }
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
        });

        $('#create').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var form = new FormData($('#create')[0])
            console.log("data:", Object.fromEntries(form));

            $.ajax({
                url: base_url + "datatahun/add",
                type: "POST",
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    location.href = base_url + 'datatahun';
                }, error: function (xhr, status, error) {
                    $('#createTahunModal').modal('hide').data('bs.modal', null);
                    $('#createTahunModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast('Gagal menambah tahun pelajaran');
                }
            });
            return false;
        });

        /*
        $('#hariefektif').submit('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "datatahun/savehariefektif",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            text: "Jumlah Hari Efektif berhasi disimpan",
                            icon: "success"
                        }).then((result) => {
                            if (result.value) {
                                if (data.status) {
                                    window.location.href = base_url + 'datatahun';
                                }
                            }
                        });
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: 'Gagal menyimpan jumlah hari efektif',
                            icon: "error",
                        });
                    }
                }, error: function (xhr, status, error) {
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        });
         */
    })
</script>
