<div class="content-wrapper bg-white">
    <div class="header-blue elevation-2 mb-4" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; padding: 1.5rem 1.5rem 3rem 1.5rem;">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-white font-weight-bold" style="text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <i class="fas fa-user-graduate mr-2"></i><?= $judul ?>
                    </h1>
                    <p class="text-white-50 m-0 pl-5 text-sm">Kelola akun dan status pengguna siswa</p>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="margin-top: -30px;">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg">
                <div class="card-header bg-white py-3 border-0 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="card-title mb-0 font-weight-bold text-dark">
                            <i class="fas fa-list text-primary mr-2"></i>Data Pengguna Siswa
                        </h6>
                    </div>
                    <div class="card-tools d-flex align-items-center">
                        <button type="button" class="btn btn-soft-success rounded-pill btn-sm mr-2 shadow-sm" data-action="aktifkan"
                                data-toggle="tooltip" title="Aktifkan Semua">
                            <i class="fas fa-user-check mr-1"></i><span class="d-none d-sm-inline-block">Aktifkan Semua</span>
                        </button>
                        <button type="button" class="btn btn-soft-danger rounded-pill btn-sm shadow-sm" data-action="nonaktifkan"
                                data-toggle="tooltip" title="Nonaktifkan Semua">
                            <i class="fas fa-user-slash mr-1"></i><span class="d-none d-sm-inline-block">Nonaktifkan Semua</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row align-items-center mb-3">
                            <div class="col-sm-12 col-md-6 mb-2 mb-md-0">
                                <div class="dataTables_length d-flex align-items-center">
                                    <label class="mb-0 text-muted small mr-2">Tampilkan</label>
                                    <select id="users_length" aria-controls="users" class="custom-select custom-select-sm form-control form-control-sm border-0 shadow-sm bg-light text-center" style="width: 60px; border-radius: 10px;">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <label class="mb-0 text-muted small ml-2">entri</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-md-right">
                                <div class="dataTables_filter d-inline-flex align-items-center">
                                    <div class="input-group input-group-sm shadow-sm" style="width: 250px; border-radius: 20px; overflow: hidden;">
                                        <input id="input-search" type="search" class="form-control border-0 bg-light" placeholder="Cari Siswa..." aria-controls="users" style="padding-left: 15px;">
                                        <div class="input-group-append">
                                            <button id="btn-search" type="button" class="btn btn-light" data-toggle="tooltip" title="Cari" onclick="applySearch()" disabled="disabled">
                                                <i class="fas fa-search text-muted"></i>
                                            </button>
                                            <button id="btn-clear" type="button" class="btn btn-light" data-toggle="tooltip" title="Hapus Pencarian" disabled="disabled">
                                                <i class="fas fa-times text-muted"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mb-3">
                        <?= form_open('', array('id' => 'bulk')); ?>
                        <table id="users" class="table table-modern-list">
                            <thead>
                            <tr>
                                <th class="text-center text-secondary text-xs uppercase tracking-wider" style="width: 40px">No.</th>
                                <th class="text-secondary text-xs uppercase tracking-wider">NIS</th>
                                <th class="text-secondary text-xs uppercase tracking-wider">Nama Siswa</th>
                                <th class="text-secondary text-xs uppercase tracking-wider">Kelas</th>
                                <th class="text-secondary text-xs uppercase tracking-wider">Username</th>
                                <th class="text-secondary text-xs uppercase tracking-wider">Password</th>
                                <th class="text-center text-secondary text-xs uppercase tracking-wider">Reset Login</th>
                                <th class="text-center text-secondary text-xs uppercase tracking-wider">Status/Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="table-body">
                            </tbody>
                        </table>
                        <?= form_close() ?>
                    </div>
                    <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm m-0" id="pagination"></ul>
                        </nav>
                    </div>
                </div>
                <div class="overlay-modern d-none" id="loading">
                    <div class="loader-modern"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'pager')); ?>
<input type="hidden" id="pager-page" name="page" value="1">
<input type="hidden" id="pager-limit" name="limit" value="10">
<?= form_close() ?>

<script src="<?=base_url()?>/assets/app/js/jquery.twbsPagination.js" type="text/javascript"></script>
<script type="text/javascript">
    let currentPage = 1;
    let perPage = 10;
    let $pagination, defaultOpts, query;

    $(document).ready(function() {
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

        $("#users").on("click", ".btn-aktif", function() {
            let id = $(this).data("id");
            $('#loading').removeClass('d-none');
            $.ajax({
                url: base_url + "usersiswa/activate/" + id,
                type: "GET",
                success: function (response) {
                    console.log("pass", response.pass);
                    $('#loading').addClass('d-none');
                    if (response.msg) {
                        if (response.status) {
                            swal.fire({
                                title: "Sukses",
                                text: response.msg,
                                icon: "success"
                            });
                            loadSiswa();
                        } else {
                            swal.fire({
                                title: "Error",
                                text: response.msg,
                                icon: "error"
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    Swal.fire({
                        title: "Gagal",
                        html: xhr.responseText,
                        icon: "error"
                    });
                }
            });
        });

        $("#users").on("click", ".btn-nonaktif", function() {
            let username = $(this).data("username");
            let nama = $(this).data("nama").replace("'", "");
            $('#loading').removeClass('d-none');
            $.ajax({
                url: base_url + "usersiswa/deactivate/" + username +"/"+nama,
                type: "GET",
                success: function (response) {
                    $('#loading').addClass('d-none');
                    if (response.msg) {
                        if (response.status) {
                            swal.fire({
                                title: "Sukses",
                                text: response.msg,
                                icon: "success"
                            });
                            loadSiswa();
                        } else {
                            swal.fire({
                                title: "Error",
                                text: response.msg,
                                icon: "error"
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    Swal.fire({
                        title: "Gagal",
                        html: xhr.responseText,
                        icon: "error"
                    });
                }
            });
        });

        $("#users").on("click", ".btn-reset", function() {
            let username = $(this).data("username");
            let nama = encodeURIComponent($(this).data("nama"));
            $('#loading').removeClass('d-none');
            $.ajax({
                url: base_url + "usersiswa/reset_login/" + username +"/"+nama,
                type: "GET",
                success: function (response) {
                    $('#loading').addClass('d-none');
                    if (response.msg) {
                        if (response.status) {
                            swal.fire({
                                title: "Sukses",
                                html: "<b>"+decodeURIComponent(response.msg)+"<b>",
                                icon: "success"
                            });
                            loadSiswa();
                        } else {
                            swal.fire({
                                title: "Error",
                                html: "<b>"+decodeURIComponent(response.msg)+"<b>",
                                icon: "error"
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    Swal.fire({
                        title: "Gagal",
                        html: xhr.responseText,
                        icon: "error"
                    });
                }
            });
        });

        $(".btn-action").on("click", function() {
            let action = $(this).data("action");
            let uri = action === 'aktifkan' ? base_url + "usersiswa/aktifkansemua" : base_url + "usersiswa/nonaktifkansemua";

            swal.fire({
                title: action === 'aktifkan' ? "Aktifan semua siswa" : "Nonaktifkan semua siswa",
                text: "",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Lanjutkan"
            }).then(result => {
                if (result.value) {
                    $('#loading').removeClass('d-none');
                    swal.fire({
                        title: action === 'aktifkan' ? "Mengaktifkan semua siswa" : "Menonaktifkan semua siswa",
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
                        url: uri,
                        type: "GET",
                        success: function (response) {
                            $('#loading').addClass('d-none');
                            console.log("result", response);
                            swal.fire({
                                title: response.status ? "Sukses" : "Gagal",
                                text: response.msg,
                                icon: response.status ? "success" : "error"
                            }).then(result => {
                                loadSiswa();
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            Swal.fire({
                                title: "Gagal",
                                html: xhr.responseText,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });

        loadSiswa();

    });

    function loadSiswa() {
        $('#pager-page').val(currentPage);
        $('#loading').removeClass('d-none');
        var cari = query != null ? '&search=' + query : ''
        var dataPost = $('#pager').serialize() + cari;
        console.log('post', dataPost);
        $.ajax({
            url: base_url + 'usersiswa/list',
            data: dataPost,
            type: 'POST',
            success: function (data) {
                $('#loading').addClass('d-none');
                $('#input-search').val(data.search);
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
                $('#loading').addClass('d-none')
                console.log("error", xhr.responseText);
                swal.fire({
                    title: "ERROR",
                    text: "Ada kesalahan",
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
                const kls = siswa.nama_kelas != null ? siswa.nama_kelas : '';
                html += `<tr>
                <td class="text-center align-middle font-weight-bold text-muted">
                    <input type="hidden" name="ids[]" value="${siswa.id_siswa}">
                    ${Number((perPage * (currentPage - 1)) + (idx + 1))}</td>
            <td class="align-middle font-weight-bold">${siswa.nis}</td>
            <td class="align-middle">
                <div class="media d-flex align-items-center">
                    <img class="avatar rounded-circle border shadow-sm mr-3" src="${base_url+siswa.foto}" width="36" height="36" alt="User Image" style="object-fit: cover;">
                    <div class="media-body">
                        <span class="font-weight-bold text-dark d-block text-truncate" style="max-width: 200px;">${siswa.nama}</span>
                    </div>
                </div>
            </td>
            <td class="align-middle"><div class="badge badge-soft-primary px-3 rounded-pill uppercase tracking-wider">${kls}</div></td>
            <td class="align-middle small font-weight-bold text-muted">${siswa.username}</td>
            <td class="align-middle small text-muted"><i class="fas fa-lock mr-1 opacity-50"></i>${siswa.password}</td>
            <td class="text-center align-middle">
                <button type="button" class="btn btn-soft-info btn-round shadow-sm btn-reset" ${siswa.reset == '0' ? 'disabled' : ''} data-username="${siswa.username}" data-nama="${siswa.nama}" data-toggle="tooltip" title="Reset Login"> 
                    <i class="fas fa-sync-alt"></i>
                </button>
            </td>
            <td class="text-center align-middle p-1">`;
                if (siswa.aktif == "0") {
                    html += `<span class="badge badge-soft-danger px-3 rounded-pill mb-2 d-inline-block">Nonaktif</span><br>
                             <button type="button" class="btn btn-aktif btn-soft-success btn-round shadow-sm" data-id="${siswa.id_siswa}" data-toggle="tooltip" title="Aktifkan"> 
                                <i class="fas fa-user-check"></i> 
                             </button>`;
                } else {
                    html += `<span class="badge badge-soft-success px-3 rounded-pill mb-2 d-inline-block">Aktif</span><br>
                             <button type="button" class="btn btn-nonaktif btn-soft-danger btn-round shadow-sm" data-username="${siswa.username}" data-nama="${siswa.nama}" data-toggle="tooltip" title="Nonaktifkan"> 
                                <i class="fas fa-user-slash"></i>
                             </button>`;
                }
            html +=`</td></tr>`;
            });
        } else {
            html += '<tr><td colspan="8" class="text-center align-middle py-5 text-muted"><i class="fas fa-users-slash fa-3x mb-3 d-block opacity-25"></i>Tidak ada data siswa ditemukan</td><tr>';
        }

        $('#table-body').html(html);
        $(`.avatar`).each(function () {
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


</script>
