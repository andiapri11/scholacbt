<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-user-graduate mr-2"></i>Manajemen Database Siswa
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="button" data-toggle="modal" data-target="#createSiswaModal"
                            class="btn btn-sm btn-white px-4 rounded-pill shadow-sm border-0 font-weight-bold" style="color: #1e3c72">
                        <i class="fas fa-plus mr-2"></i> Tambah Siswa
                    </button>
                    <a href="<?= base_url('datasiswa/add') ?>" class="btn btn-sm btn-outline-light px-3 rounded-pill ml-2 font-weight-bold">
                        <i class="fas fa-upload mr-2"></i> Import
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="input-group input-group-sm bg-light rounded-pill px-3 py-1 border-0">
                            <input id="input-search" type="text" class="form-control bg-transparent border-0" placeholder="Cari nama, nis, atau nisn..." style="outline: none; box-shadow: none">
                            <div class="input-group-append">
                                <button id="btn-search" class="btn btn-link text-muted pr-0" type="button" onclick="applySearch()">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button id="btn-clear" class="btn btn-link text-danger d-none" type="button">
                                    <i class="fas fa-times-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="dropdown mr-3">
                                <button id="dropdown-btn" class="btn btn-sm btn-light dropdown-toggle rounded-pill px-3 font-weight-bold text-muted border" type="button" data-toggle="dropdown" disabled>
                                    Aksi Kolektif
                                </button>
                                <div id="dropdown-action" class="dropdown-menu dropdown-menu-right shadow border-0 rounded-lg">
                                    <a class="dropdown-item py-2" id="pindah" href="#"><i class="fas fa-exchange-alt mr-2 text-info"></i> Set sebagai PINDAH</a>
                                    <a class="dropdown-item py-2" id="keluar" href="#"><i class="fas fa-door-open mr-2 text-warning"></i> Set sebagai KELUAR</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item py-2 text-danger" id="hapus" href="#"><i class="fas fa-trash-alt mr-2"></i> HAPUS TERPILIH</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center bg-light rounded-pill px-3 py-1 border">
                                <span class="small font-weight-bold text-muted mr-2 uppercase" style="font-size: 0.65rem">Status:</span>
                                <select id="users-filter" class="form-control form-control-sm bg-transparent border-0 font-weight-bold p-0" style="height: auto; width: 100px">
                                    <option value="1">Aktif</option>
                                    <option value="5">Tanpa Kelas</option>
                                    <option value="3">Pindah</option>
                                    <option value="4">Keluar</option>
                                </select>
                            </div>
                            <div class="ml-3 d-flex align-items-center">
                                <span class="small font-weight-bold text-muted mr-2 uppercase" style="font-size: 0.65rem">Tampil:</span>
                                <select id="users_length" class="form-control form-control-sm bg-light rounded-pill border px-2 py-0" style="height: 28px; width: 60px">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4 position-relative">
                <div id="loading-overlay" class="d-none" style="position: absolute; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.7); z-index:10; border-radius:16px; display:flex; align-items:center; justify-content:center">
                    <div class="spinner-border text-primary" role="status"></div>
                </div>

                <?= form_open('datasiswa/delete', array('id' => 'bulk')); ?>
                <div class="table-responsive p-1">
                    <table id="table-siswa" class="table-modern-list">
                        <thead>
                        <tr>
                            <th width="40" class="text-center">
                                <div class="custom-control custom-checkbox ml-1">
                                    <input type="checkbox" class="custom-control-input select_all" id="select_all_header">
                                    <label class="custom-control-label" for="select_all_header"></label>
                                </div>
                            </th>
                            <th width="60" class="text-center">NO.</th>
                            <th>BIODATA SISWA</th>
                            <th width="180">IDENTITAS</th>
                            <th width="100" class="text-center">AKSI</th>
                        </tr>
                        </thead>
                        <tbody id="table-body">
                            <!-- Loaded via AJAX -->
                        </tbody>
                    </table>
                </div>
                <?= form_close() ?>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="small text-muted font-weight-bold" id="pagination-info">
                        <!-- info will be updated via JS -->
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-modern mb-0" id="pagination"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .card-modern { border-radius: 16px; overflow: hidden; }
    .btn-white { background: white; color: #1e3c72; border: none; }
    .btn-white:hover { background: #f8fafc; color: #2a5298; }
    
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

    /* Avatar Styling */
    .avatar-modern {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        border: 2px solid #fff;
    }

    /* Badge Styling */
    .badge-soft-primary { background: rgba(30, 60, 114, 0.08); color: #1e3c72; }
    .badge-soft-success { background: rgba(16, 185, 129, 0.08); color: #10b981; }
    .badge-soft-danger { background: rgba(239, 68, 68, 0.08); color: #ef4444; }
    .badge-soft-info { background: rgba(14, 165, 233, 0.08); color: #0ea5e9; }

    /* Pagination Styling */
    .pagination-modern .page-link {
        border: none;
        margin: 0 3px;
        border-radius: 8px !important;
        color: #64748b;
        font-weight: 600;
        padding: 8px 14px;
        background: #f1f5f9;
    }
    .pagination-modern .page-item.active .page-link {
        background: #1e3c72;
        color: white;
        box-shadow: 0 4px 12px rgba(30, 60, 114, 0.2);
    }
</style>

<?= form_open('', array('id' => 'formsiswa')); ?>
<div class="modal fade" id="createSiswaModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title font-weight-bold" id="createModalLabel" style="font-size: 1.1rem">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Siswa Baru
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-group mb-3">
                    <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Nama Lengkap <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-right-0"><i class="fas fa-user text-muted mr-1"></i></span>
                        </div>
                        <input id="nama_siswa" type="text" class="form-control border-left-0" name="nama_siswa" placeholder="Nama Lengkap Siswa" required style="background: #f8fafc">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">NIS <span class="text-danger">*</span></label>
                            <input type="number" id="nis" class="form-control" name="nis" placeholder="NIS" required style="background: #f8fafc">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">NISN <span class="text-danger">*</span></label>
                            <input type="number" id="nisn" class="form-control" name="nisn" placeholder="NISN" required style="background: #f8fafc">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required style="background: #f8fafc">
                                <option value="">Pilih</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Kelas Awal <span class="text-danger">*</span></label>
                            <?php
                            $opsis = [];
                            if ($setting->jenjang == 1) {
                                $opsis = ['1','2','3','4','5','6'];
                            } elseif ($setting->jenjang == 2) {
                                $opsis = ['7','8','9'];
                            } else {
                                $opsis = ['10','11','12'];
                            };
                            ?>
                            <select class="form-control" id="kelas_awal" name="kelas_awal" required style="background: #f8fafc">
                                <option value="">Pilih</option>
                                <?php foreach ($opsis as $kelas) : ?>
                                    <option value="<?= $kelas ?>"><?= $kelas ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Tanggal Diterima <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-calendar text-muted mr-1"></i></span>
                                </div>
                                <input type="text" name="tahun_masuk" id="tahunmasuk" class="form-control border-left-0" autocomplete="off" placeholder="YYYY-MM-DD" required style="background: #f8fafc">
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-3">
                <h6 class="font-weight-bold text-muted mb-3 uppercase" style="font-size: 0.7rem; letter-spacing: 1px">Akses Login Siswa</h6>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Username <span class="text-danger">*</span></label>
                            <input id="username" type="text" class="form-control" name="username" placeholder="Username" required style="background: #fdfdfd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label class="font-weight-bold text-dark mb-1" style="font-size: 0.85rem">Password <span class="text-danger">*</span></label>
                            <input id="password" class="form-control" name="password" placeholder="Password" required style="background: #fdfdfd">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0 py-3 px-4">
                <button type="button" class="btn btn-link text-muted font-weight-bold" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary px-4 shadow-sm font-weight-bold">
                    <i class="fas fa-save mr-2"></i> Simpan Siswa
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>
<?= form_close() ?>

<?= form_open('', array('id' => 'pager')); ?>
<input type="hidden" id="pager-page" name="page" value="1">
<input type="hidden" id="pager-limit" name="limit" value="10">
<?= form_close() ?>

<script src="<?=base_url()?>/assets/app/js/jquery.twbsPagination.js" type="text/javascript"></script>
<script>
    let currentPage = 1;
    let perPage = 10;
    let $pagination, defaultOpts, query, actionBulk;

    $(document).ready(function () {
        ajaxcsrf();
        $pagination = $('#pagination');
        defaultOpts = {
            visiblePages: 5,
            initiateStartPageClick: false,
            onPageClick: function (event, page) {
                console.info(page + ' (from options)');
                currentPage = page;
                loadSiswa();
            }
        };
        $pagination.twbsPagination(defaultOpts);

        $('#users_length').change(function () {
            $('#pager-limit').val($(this).val());
            perPage = $(this).val();
            currentPage = 1;
            loadSiswa();
        });

        $('#users-filter').change(function () {
            currentPage = 1;
            loadSiswa();
        });

        $('#input-search').on('change keyup', function () {
            var val = $(this).val();
            query = val === "" ? null : val;
            $('#btn-clear').attr('disabled', query == null)
            $('#btn-search').attr('disabled', query == null)
        });

        $('#btn-clear').on('click', function () {
            query = null;
            currentPage = 1;
            $(this).attr('disabled', query == null);
            $('#btn-search').attr('disabled', query == null);
            loadSiswa();
        });

        $(".select_all").on("click", function () {
            if (this.checked) {
                $(".check").each(function () {
                    this.checked = true;
                    $(".select_all").prop("checked", true);
                    $('#hapusterpilih').removeAttr('disabled');
                    $('#dropdown-btn').removeAttr('disabled');
                });
            } else {
                $(".check").each(function () {
                    this.checked = false;
                    $(".select_all").prop("checked", false);
                    $('#hapusterpilih').attr('disabled', 'disabled');
                    $('#dropdown-btn').attr('disabled', 'disabled');
                });
            }
        });

        $("#table-siswa tbody").on("click", "tr .check", function () {
            var check = $("#table-siswa tbody tr .check").length;
            var checked = $("#table-siswa tbody tr .check:checked").length;
            if (check === checked) {
                $(".select_all").prop("checked", true);
            } else {
                $(".select_all").prop("checked", false);
            }

            if (checked === 0) {
                $('#hapusterpilih').attr('disabled', 'disabled');
                $('#dropdown-btn').attr('disabled', 'disabled');
            } else {
                $('#hapusterpilih').removeAttr('disabled');
                $('#dropdown-btn').removeAttr('disabled');
            }
        });

        $("#bulk").on("submit", function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            //console.log($(this).serialize() + '&aksi=' +actionBulk)
            $.ajax({
                url: $(this).attr("action"),
                data: $(this).serialize() + '&aksi=' +actionBulk,
                type: "POST",
                success: function (respon) {
                    if (respon.status) {
                        $(".select_all").prop("checked", false);
                        $('#hapusterpilih').attr('disabled', 'disabled');
                        $('#dropdown-btn').attr('disabled', 'disabled');
                        console.log('res', respon)
                        swal.fire({
                            title: "Berhasil",
                            text: respon.total + " data berhasil dihapus",
                            icon: "success"
                        });
                        loadSiswa();
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: "Tidak ada data yang dipilih",
                            icon: "error"
                        });
                    }
                },
                error: function () {
                    swal.fire({
                        title: "Gagal",
                        text: "Ada data yang sedang digunakan",
                        icon: "error"
                    });
                }
            });
        });

        $('#tahunmasuk').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            timepicker: false,
            format: 'Y-m-d',
            disabledWeekDays: [0],
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });

        $('#formsiswa').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log($(this).serialize());
            $.ajax({
                url: base_url + "datasiswa/create",
                data: $(this).serialize(),
                dataType: "JSON",
                type: 'POST',
                success: function (response) {
                    console.log("result", response);
                    $('#createSiswaModal').modal('hide').data('bs.modal', null);
                    $('#createSiswaModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });

                    if (response.insert) {
                        showSuccessToast(response.text);
                        loadSiswa();
                    } else {
                        showDangerToast(response.text);
                    }
                },
                error: function (xhr, status, error) {
                    $('#createSiswaModal').modal('hide').data('bs.modal', null);
                    $('#createSiswaModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast("Gagal disimpan");
                    console.log(xhr.responseText);
                }
            })
        });

        $("#dropdown-action a ").click(function () {
            let x = $(this).attr('id');
            //alert(x);
            actionBulk = x;
            if (x === "pindah") {
                bulk_pindah()
            } else if (x === "keluar") {
                bulk_keluar()
            } else if (x === "hapus") {
                bulk_delete()
            }
        });

        loadSiswa();
    });

    function loadSiswa() {
        $(".select_all").prop("checked", false);
        $('#pager-page').val(currentPage);
        $('#loading-overlay').removeClass('d-none');
        var cari = query != null ? '&search=' + query : ''
        var filter = '&filter=' + $('#users-filter').val();
        var dataPost = $('#pager').serialize() + cari + filter;
        
        $.ajax({
            url: base_url + 'datasiswa/list',
            data: dataPost,
            type: 'POST',
            success: function (data) {
                $('#loading-overlay').addClass('d-none');
                $('#input-search').val(data.search);
                if (data.search != "") {
                    $('#btn-clear').removeClass('d-none');
                } else {
                    $('#btn-clear').addClass('d-none');
                }
                
                if (data.pages > 0) {
                    $pagination.removeClass('d-none');
                    $pagination.twbsPagination('destroy');
                    $pagination.twbsPagination($.extend({}, defaultOpts, {
                        startPage: currentPage,
                        totalPages: data.pages,
                    }));
                } else {
                    $pagination.addClass('d-none');
                }
                previewData(data);
            }, error: function (xhr, status, error) {
                $('#loading-overlay').addClass('d-none')
                console.log("error", xhr.responseText);
                swal.fire({
                    title: "ERROR",
                    text: "Gagal memuat data siswa",
                    icon: "error"
                });
            }
        });
    }

    function previewData(data) {
        console.log(data);
        $('#input-search').val(data.search);
        var html = '';

        if (data.lists.length > 0) {
            $.each(data.lists, function (idx, siswa) {
                const kls = siswa.nama_kelas != null ? '<span class="badge badge-soft-info border px-2 py-1 ml-2">' + siswa.nama_kelas + '</span>' : '<span class="badge badge-light border px-2 py-1 ml-2 text-muted italic">Belum ada kelas</span>';
                const status = siswa.aktif == "0" ? '<span class="badge badge-soft-danger border px-2 py-1 ml-2">Nonaktif</span>' : '<span class="badge badge-soft-success border px-2 py-1 ml-2">Aktif</span>';
                const jk = siswa.jenis_kelamin == "L" ? '<span class="badge badge-soft-primary border px-2 py-1">Laki-laki</span>' : '<span class="badge badge-soft-danger border px-2 py-1">Perempuan</span>';
                
                html += '<tr>' +
                    '   <td class="text-center">' +
                    '       <div class="custom-control custom-checkbox ml-1">' +
                    '           <input type="checkbox" class="custom-control-input check" id="check'+siswa.id_siswa+'" name="checked[]" value="'+siswa.id_siswa+'">' +
                    '           <label class="custom-control-label" for="check'+siswa.id_siswa+'"></label>' +
                    '       </div>' +
                    '   </td>' +
                    '   <td class="text-center font-weight-bold text-muted small">'+ Number((perPage * (currentPage - 1)) + (idx + 1)) +'</td>' +
                    '   <td>' +
                    '       <div class="d-flex align-items-center">' +
                    '           <img class="avatar-modern mr-3"' +
                    '                src="'+base_url+siswa.foto+'" alt="Siswa">' +
                    '           <div>' +
                    '               <div class="font-weight-bold text-dark" style="font-size: 0.95rem">'+siswa.nama+'</div>' +
                    '               <div class="mt-1">' + jk + kls + status + '</div>' +
                    '           </div>' +
                    '       </div>' +
                    '   </td>' +
                    '   <td>' +
                    '       <div class="small mb-1 text-muted font-weight-bold uppercase" style="font-size: 0.65rem">Identitas</div>' +
                    '       <div class="mb-1"><span class="badge bg-light border text-muted px-2 py-1" style="font-size: 0.75rem">NIS: <b>'+siswa.nis+'</b></span></div>' +
                    '       <div><span class="badge bg-light border text-muted px-2 py-1" style="font-size: 0.75rem">NISN: <b>'+siswa.nisn+'</b></span></div>' +
                    '   </td>' +
                    '   <td class="text-center">' +
                    '       <a class="btn btn-sm btn-white text-warning bordershadow-hover" href="'+base_url+'datasiswa/edit/'+siswa.id_siswa+'" data-toggle="tooltip" title="Edit Data">' +
                    '           <i class="fas fa-edit"></i>' +
                    '       </a>' +
                    '   </td>' +
                    '</tr>';
            });
        } else {
            html += '<tr><td colspan="5" class="text-center py-5"><div class="text-muted"><i class="fas fa-user-slash fa-3x mb-3 opacity-20"></i><br>Tidak ada data siswa ditemukan</div></td></tr>';
        }
        $('#table-body').html(html);
        
        // Update pagination info
        const start = data.lists.length > 0 ? (perPage * (currentPage - 1)) + 1 : 0;
        const end = (perPage * (currentPage - 1)) + data.lists.length;
        $('#pagination-info').text(`Menampilkan ${start} - ${end} dari ${data.total} Siswa`);

        $(`.avatar-modern`).each(function () {
            $(this).on("error", function () {
                var src = $(this).attr('src').replace('profiles', 'foto_siswa');
                $(this).attr("src", src);
                $(this).on("error", function () {
                    $(this).attr("src", base_url + 'assets/img/siswa.png');
                });
            });
        });
        $('[data-toggle="tooltip"]').tooltip();
    }

    function applySearch() {
        query = $('#input-search').val();
        currentPage = 1;
        loadSiswa();
    }

    function bulk_delete() {
        if ($("#table-siswa tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            swal.fire({
                title: "Anda yakin?",
                text: "Data terpilih akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!"
            }).then(result => {
                if (result.value) {
                    $("#bulk").submit();
                }
            });
        }
    }

    function bulk_pindah() {
        if ($("#table-siswa tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            swal.fire({
                title: "Anda yakin?",
                text: "Data terpilih akan diset sebagai siswa PINDAH",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "YA!"
            }).then(result => {
                if (result.value) {
                    $("#bulk").submit();
                }
            });
        }
    }

    function bulk_keluar() {
        if ($("#table-siswa tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            swal.fire({
                title: "Anda yakin?",
                text: "Data terpilih akan diset sebagai siswa KELUAR",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "YA!"
            }).then(result => {
                if (result.value) {
                    $("#bulk").submit();
                }
            });
        }
    }

</script>
