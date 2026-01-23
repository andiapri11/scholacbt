<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row px-3 pt-4 pb-5">
                <div class="col-sm-6">
                    <h1 class="text-white font-weight-bold text-shadow">
                        <i class="fas fa-user-edit mr-2"></i> <?= $judul ?>
                    </h1>
                    <p class="text-white-50 small mb-0">Perbarui informasi profil dan pengaturan keamanan akun.</p>
                </div>
                <div class="col-sm-6 text-right pt-2">
                    <a href="<?= base_url('useradmin') ?>" class="btn btn-light rounded-pill px-4 shadow-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="row">
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <div class="col-md-6 mb-4">
                        <?= form_open('users/edit_info', array('id' => 'user_info'), array('id' => $users->id)) ?>
                        <div class="card card-modern border-0 shadow-lg h-100">
                            <div class="card-header bg-white py-3 border-0">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-info-circle text-primary mr-2"></i>
                                    <h6 class="mb-0 font-weight-bold text-dark">Informasi Akun</h6>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Username</label>
                                    <input type="text" name="username" class="form-control shadow-sm"
                                           value="<?= $users->username ?>">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nama Depan</label>
                                            <input type="text" name="first_name" class="form-control shadow-sm"
                                                   value="<?= $users->first_name ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nama Belakang</label>
                                            <input type="text" name="last_name" class="form-control shadow-sm"
                                                   value="<?= $users->last_name ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Email</label>
                                    <input type="email" name="email" class="form-control shadow-sm" value="<?= $users->email ?>">
                                </div>
                            </div>
                            <div class="card-footer bg-white border-0 p-4 pt-0">
                                <button type="submit" id="btn-info" class="btn btn-primary rounded-pill px-4 shadow-sm float-right">
                                    <i class="fas fa-save mr-1"></i> Simpan Info
                                </button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                <?php endif; ?>
                <?php if ($user->id === $users->id || $this->ion_auth->is_admin()) : ?>
                    <div class="col-md-6 mb-4">
                        <div class="card card-modern border-0 shadow-lg h-100">
                            <div class="card-header bg-white py-3 border-0">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-circle text-primary mr-2"></i>
                                    <h6 class="mb-0 font-weight-bold text-dark">Foto Profil & Identitas</h6>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <?= form_open_multipart('', array('id' => 'set-foto')) ?>
                                        <div class="form-group mb-0">
                                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Pas Foto</label>
                                            <input type="file" id="foto" name="foto" class="dropify"
                                                   data-max-file-size-preview="2M"
                                                   data-allowed-file-extensions="jpg jpeg png"
                                                   data-default-file="<?= base_url() . $profile->foto ?>"/>
                                        </div>
                                        <?= form_close() ?>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group mb-3">
                                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nama Lengkap</label>
                                            <input type="text" placeholder="Gelar & Nama Lengkap" id="nama-lengkap"
                                                   class="form-control shadow-sm" value="<?= $profile->nama_lengkap ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Jabatan</label>
                                            <input type="text" id="jabatan" placeholder="Contoh: Staff IT" class="form-control shadow-sm"
                                                   value="<?= $profile->jabatan ?>">
                                        </div>
                                        <button onclick="simpanProfile()" id="simpan"
                                                class="btn btn-success rounded-pill px-4 shadow-sm float-right mt-2">
                                            <i class="fas fa-check mr-1"></i> Simpan Profil
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <?= form_open('useradmin/change_password', array('id' => 'change_password'), array('id' => $users->id)) ?>
                        <div class="card card-modern border-0 shadow-lg">
                            <div class="card-header bg-white py-3 border-0">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-lock text-warning mr-2"></i>
                                    <h6 class="mb-0 font-weight-bold text-dark">Ganti Password</h6>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Password Lama</label>
                                    <input type="password" placeholder="Masukkan password saat ini" name="old" class="form-control shadow-sm">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Password Baru</label>
                                    <input type="password" placeholder="Masukkan password baru" name="new" class="form-control shadow-sm">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Konfirmasi Password</label>
                                    <input type="password" placeholder="Ulangi password baru" name="new_confirm"
                                           class="form-control shadow-sm">
                                </div>
                            </div>
                            <div class="card-footer bg-white border-0 p-4 pt-0">
                                <button type="reset" class="btn btn-light rounded-pill px-3 shadow-sm mr-2 float-right">
                                    <i class="fas fa-undo mr-1"></i> Reset
                                </button>
                                <button type="submit" id="btn-pass" class="btn btn-warning rounded-pill px-4 shadow-sm float-right">
                                    <i class="fas fa-key mr-1"></i> Ganti Password
                                </button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        function submitajax(url, data, msg, type) {
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
                url: url,
                data: data,
                type: 'POST',
                success: function (response) {
                    if (response.status) {
                        swal.fire({
                            title: "Sukses",
                            text: msg,
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                        }).then(result => {
                            if (result.value) {
                                location.href = base_url + "logout";
                            }
                        });
                    } else {
                        if (response.errors) {
                            swal.fire({
                                title: "Gagal",
                                text: 'Gagal edit admin',
                                icon: "error"
                            });
                        }
                        if (response.msg) {
                            swal.fire({
                                title: "Gagal",
                                text: 'Password lama tidak benar',
                                icon: "error"
                            });
                        }
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
        }

        $('form#change_password').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            let btn = $('#btn-pass');
            btn.attr('disabled', 'disabled').text('Process...');

            url = $(this).attr('action');
            data = $(this).serialize();
            msg = "Password anda berhasil diganti";
            submitajax(url, data, msg, 1);
        });

        $('form input, form select').on('change', function () {
            $(this).closest('.form-group').removeClass('has-error');
            $(this).nextAll('.help-block').eq(0).text('');
        });

        $('form#user_info').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            let btn = $('#btn-info');
            btn.attr('disabled', 'disabled').text('Process...');

            url = $(this).attr('action');
            data = $(this).serialize();
            msg = "Informasi user berhasil diupdate";
            submitajax(url, data, msg, 2);
        });

        $('form#user_level').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            let btn = $('#btn-level');
            btn.attr('disabled', 'disabled').text('Process...');

            url = $(this).attr('action');
            data = $(this).serialize();
            msg = "Level user berhasil diupdate";
            submitajax(url, data, msg, 3);
        });

        $('form#user_status').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            let btn = $('#btn-status');
            btn.attr('disabled', 'disabled').text('Process...');

            url = $(this).attr('action');
            data = $(this).serialize();
            msg = "Status user berhasil diupdate";
            submitajax(url, data, msg, 4);
        });

    });
</script>

<?php if ($user->id === $users->id) : ?>
    <script type="text/javascript">
        var idUser = '<?=$user->id?>';
        var fprofil = '<?= base_url() . $profile->foto ?>';
        $(document).ready(function () {
            ajaxcsrf();
            var drEvent = $('.dropify').dropify({
                messages: {
                    'default': 'Seret logo kesini atau klik',
                    'replace': 'Seret atau klik<br>untuk mengganti logo',
                    'remove': 'Hapus',
                    'error': 'Ooops, ada kesalahan!!.'
                },
                error: {
                    'fileSize': 'The file size is too big ({{ value }} max).',
                    'minWidth': 'The image width is too small ({{ value }}}px min).',
                    'maxWidth': 'The image width is too big ({{ value }}}px max).',
                    'minHeight': 'The image height is too small ({{ value }}}px min).',
                    'maxHeight': 'The image height is too big ({{ value }}px max).',
                    'imageFormat': 'The image format is not allowed ({{ value }} only).'
                }
            });


            drEvent.on('dropify.beforeClear', function (event, element) {
                //return confirm("Hapus logo \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function (event, element) {
                deleteImage($(event.currentTarget).data('default-file'));
            });

            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
                $.toast({
                    heading: "Error",
                    text: "file rusak",
                    icon: 'warning',
                    showHideTransition: 'fade',
                    allowToastClose: true,
                    hideAfter: 5000,
                    position: 'top-right'
                });
            });

            $("#foto").change(function () {
                var input = $(this)[0];
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#prev-logo-kanan').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);

                    var form = new FormData($('#set-foto')[0]);
                    uploadAttach(base_url + 'useradmin/uploadfile/' + idUser, form);
                }
            });

            function uploadAttach(action, data) {
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: action,
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function (data) {
                        console.log(data.src);
                        fprofil = data.src;
                    },
                    error: function (xhr, status, error) {
                        const err = JSON.parse(xhr.responseText)
                        swal.fire({
                            title: "Error",
                            text: err.Message,
                            icon: "error"
                        });
                    }
                });
            }

            function deleteImage(src) {
                console.log(src);
                $.ajax({
                    data: {src: src},
                    type: "POST",
                    url: base_url + "useradmin/deletefile",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                        fprofil = '';
                    }
                });
            }
        });

        function simpanProfile() {
            var namaLengkap = $('#nama-lengkap').val();
            var jabatan = $('#jabatan').val();
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
                data: {foto: fprofil, nama_lengkap: namaLengkap, jabatan: jabatan},
                type: "POST",
                url: base_url + "useradmin/saveprofile",
                success: function (response) {
                    //console.log(response);
                    swal.fire({
                        title: "Sukses",
                        text: "Profile berhasil disimpan",
                        icon: "success",
                    });
                }, error: function (xhr, status, error) {
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        }
    </script>
<?php endif; ?>
