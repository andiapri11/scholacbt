<div class="content-wrapper bg-light">
    <div class="dashboard-header text-center" style="padding: 3rem 0 6rem 0;">
        <div class="container-fluid px-4">
            <h2 class="mb-1 text-white"><?= $judul ?></h2>
            <p class="mb-0 opacity-75 small font-weight-bold text-white uppercase tracking-wider">
                Kelola Informasi Profil Anda
            </p>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -4rem">
        <div class="row">
            <!-- Left Side: Avatar & Basic Info -->
            <div class="col-xl-4 col-lg-5">
                <div class="card card-modern mb-4 text-center">
                    <div class="card-body py-5">
                        <div class="position-relative d-inline-block mb-4">
                            <?php 
                            $foto = $guru->foto;
                            if ($foto != null && is_file('./' . $foto)) : ?>
                                <img id="foto-guru" src="<?= base_url() . $foto ?>"
                                     class="img-circle elevation-2" alt="User avatar" 
                                     style="width: 150px; height: 150px; object-fit: cover; border: 4px solid white; box-shadow: 0 8px 24px rgba(0,0,0,0.12);">
                            <?php else : ?>
                                <div id="foto-guru-div" class="img-circle elevation-2 avatar-initials d-flex align-items-center justify-content-center text-white mx-auto shadow-sm" 
                                     style="width: 150px; height: 150px; background: <?= get_avatar_color($guru->nama_guru) ?>; border: 4px solid white; font-size: 3rem; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                                    <?= get_initials($guru->nama_guru) ?>
                                </div>
                            <?php endif; ?>
                            
                            <button type="button" data-toggle="modal" data-target="#editFotoModal" 
                                    class="btn btn-primary btn-round shadow-sm position-absolute" 
                                    style="bottom: 5px; right: 5px; width: 42px; height: 42px;">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                        
                        <h4 class="font-weight-bold text-dark mb-1"><?= $guru->nama_guru ?></h4>
                        <p class="text-muted small uppercase tracking-wider font-weight-bold mb-4">
                            <?= $guru->level . ($guru->nama_kelas ? ' - ' . $guru->nama_kelas : '') ?>
                        </p>

                        <div class="d-flex flex-column gap-2 px-3">
                            <button type="button" class="btn btn-warning btn-block font-weight-bold py-2 mb-2 rounded-pill shadow-sm" data-toggle="modal" data-target="#editLoginModal">
                                <i class="fas fa-lock-open mr-2"></i> Akun Login
                            </button>
                            <button type="button" class="btn btn-soft-danger btn-block font-weight-bold py-2 rounded-pill" onclick="deleteImage(true)">
                                <i class="fas fa-trash-alt mr-2"></i> Hapus Foto Profil
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Full Data Tabs -->
            <div class="col-xl-8 col-lg-7">
                <div class="card card-modern h-100">
                    <div class="card-header bg-white p-0 border-0">
                        <div class="px-4 py-3 border-bottom">
                            <ul class="nav nav-pills d-flex justify-content-center justify-content-sm-start" id="profileTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active rounded-pill px-4 font-weight-bold" id="basic-tab" data-toggle="pill" href="#basic-content" role="tab">Informasi Dasar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-pill px-4 font-weight-bold ml-0 ml-sm-2 mt-2 mt-sm-0" id="detail-tab" data-toggle="pill" href="#detail-content" role="tab">Data Lengkap</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <?= form_open('', array('id' => 'formguru'), array('method' => 'edit', 'id_guru' => $guru->id_guru)); ?>
                    <div class="card-body p-4">
                        <div class="tab-content" id="profileTabsContent">
                            <!-- Basic Data Tab -->
                            <div class="tab-pane fade show active" id="basic-content" role="tabpanel">
                                <div class="row">
                                    <?php foreach ($input_profile as $input) : ?>
                                        <div class="col-md-6 mb-4">
                                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2" for="<?= $input->name ?>">
                                                <i class="<?= $input->icon ?> mr-1 opacity-50"></i> <?= $input->label ?>
                                            </label>
                                            
                                            <?php if ($input->name == 'jenis_kelamin'): ?>
                                                <select class="form-control card-modern" name="jenis_kelamin" required style="border: 2px solid #edf2f7; border-radius: 12px; height: 50px;">
                                                    <option value="" <?= $input->value == null ? 'selected' : '' ?> disabled>Pilih Jenis Kelamin</option>
                                                    <?php $arrJk = ["L" => "Laki-laki", "P" => "Perempuan"];
                                                    foreach ($arrJk as $key => $jk) : ?>
                                                        <option value="<?= $key ?>" <?= $key == $input->value ? 'selected' : '' ?>><?= $jk ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php elseif ($input->name == 'agama'): ?>
                                                <select class="form-control card-modern" id="agama" name="agama" style="border: 2px solid #edf2f7; border-radius: 12px; height: 50px;">
                                                    <option value="">Pilih Agama</option>
                                                    <?php $arrAgama = ["Islam", "Kristen", "Katolik", "Hindu", "Budha", "Konghucu", "Lainnya"];
                                                    foreach ($arrAgama as $agama) : ?>
                                                        <option value="<?= $agama ?>" <?= $agama == $input->value ? 'selected' : '' ?>><?= $agama ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php else: 
                                                $readonly = $input->name == 'nip' ? 'readonly' : '';
                                                $bg_style = $input->name == 'nip' ? 'background-color: #f4f6f9 !important; border-color: #d1d5db !important; cursor: not-allowed;' : 'border: 2px solid #edf2f7;';
                                            ?>
                                                <input value="<?= trim($input->value ?? '') ?>" id="<?= $input->name ?>" type="<?= $input->type ?>" 
                                                       class="form-control card-modern px-3" name="<?= $input->name ?>" 
                                                       <?= $readonly ?>
                                                       placeholder="<?= $input->label ?>" 
                                                       style="<?= $bg_style ?> border-radius: 12px; height: 50px;">
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Detailed Data Tab -->
                            <div class="tab-pane fade" id="detail-content" role="tabpanel">
                                <div class="row">
                                    <?php foreach ($input_alamat as $alamat) : ?>
                                        <div class="col-md-6 mb-4">
                                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2" for="<?= $alamat->name ?>">
                                                <i class="<?= $alamat->icon ?> mr-1 opacity-50"></i> <?= $alamat->label ?>
                                            </label>
                                            <input value="<?= trim($alamat->value ?? '') ?>" id="<?= $alamat->name ?>" type="<?= $alamat->type ?>" 
                                                   class="form-control card-modern px-3" name="<?= $alamat->name ?>" 
                                                   placeholder="<?= $alamat->label ?>" style="border: 2px solid #edf2f7; border-radius: 12px; height: 50px;">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close(); ?>
                    
                    <div class="card-footer bg-white border-0 py-4 px-4">
                        <button type="button" id="submit-profil" class="btn btn-primary btn-block rounded-pill py-3 shadow-sm font-weight-bold mb-4">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan Profil
                        </button>
                        <div class="p-3 rounded-lg bg-soft-primary d-flex align-items-center">
                            <i class="fas fa-info-circle mr-3 text-primary"></i>
                            <span class="small text-dark text-left">Sistem secara otomatis mengunci beberapa informasi penting. Hubungi admin jika ada perubahan pada NUPTK/NIP.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="editFotoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content card-modern animate__animated animate__zoomIn">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title font-weight-bold"><i class="fas fa-camera text-primary mr-2"></i>Edit Foto Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <?= form_open_multipart('', array('id' => 'set-foto-profile'), array('id_guru' => $guru->id_guru)) ?>
                <div class="form-group mb-0">
                    <div class="p-4 border-dashed rounded-xl text-center bg-light mb-3">
                        <input type="file" id="foto-profile" name="foto" class="dropify"
                               data-max-file-size-preview="2M"
                               data-allowed-file-extensions="jpg jpeg png"
                               data-default-file="<?= base_url() . $guru->foto ?>"/>
                    </div>
                    <p class="text-center text-muted small mb-0">Hanya format JPG, JPEG, atau PNG yang diperbolehkan. Maksimal 2MB.</p>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-soft-secondary btn-block rounded-pill font-weight-bold" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-block rounded-pill font-weight-bold" data-dismiss="modal">OK, Selesai</button>
            </div>
        </div>
    </div>
</div>

<?= form_open('', array('id' => 'updatelogin'), array('id_guru' => $guru->id_guru)) ?>
<div class="modal fade" id="editLoginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content card-modern animate__animated animate__zoomIn">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title font-weight-bold"><i class="fas fa-key text-warning mr-2"></i>Edit Akses Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-group mb-4">
                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Username Saat Ini</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-user text-muted"></i></span>
                        </div>
                        <input type="text" class="form-control bg-light border-0 rounded-right" name="username" value="<?= $guru->username ?>" style="height: 48px;">
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Password Lama (Read-only)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-lock text-muted opacity-50"></i></span>
                        </div>
                        <input class="form-control bg-light border-0 rounded-right" name="old" value="<?= $guru->password ?>" readonly style="height: 48px;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Password Baru</label>
                            <input type="password" name="new" class="form-control rounded-lg" placeholder="••••••••" style="height: 48px; border: 2px solid #edf2f7;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Konfirmasi</label>
                            <input type="password" name="new_confirm" class="form-control rounded-lg" placeholder="••••••••" required style="height: 48px; border: 2px solid #edf2f7;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-soft-secondary rounded-pill font-weight-bold px-4" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning rounded-pill font-weight-bold px-4 shadow-sm text-dark">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<style>
    .gap-2 { gap: 0.5rem; }
    .rounded-xl { border-radius: 1rem !important; }
    .bg-soft-primary { background-color: rgba(67, 97, 238, 0.1) !important; color: #4361ee !important; }
    .nav-pills .nav-link.active {
        background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%) !important;
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2) !important;
    }
    .profile-card-hover {
        transition: all 0.3s ease;
    }
    .profile-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.08) !important;
    }
    .animate-in {
        animation: fadeInUp 0.6s ease-out;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @media (max-width: 576px) {
        .card-modern { border-radius: 0 !important; margin-left: -1rem; margin-right: -1rem; }
        .row-mobile-stack { flex-direction: column; }
    }
</style>

<script>
    var fotoProfile = '';
    var idGuru = '<?=$guru->id_guru?>';
    var src = '<?=$guru->foto?>';
    $(document).ready(function () {
        $('.card-modern').addClass('animate-in');
        $('#tgl_lahir').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'Y-m-d',
            timepicker: false,
            scrollInput: false,
            scrollMonth: false,
            disabledWeekDays: [0],
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });

        $('#foto-profile').attr("data-default-file", base_url + src);
        var drEvent = $('.dropify').dropify({
            messages: {
                'default': 'Seret foto kesini atau klik',
                'replace': 'Seret atau klik<br>untuk mengganti foto',
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
            src = $(event.currentTarget).data('default-file');
            deleteImage(false);
            fotoProfile = '';
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

        $('#editFotoModal').on('hidden.bs.modal', function (e) {
            window.location.reload();
        });

        $('#submit-profil').click(function () {
            console.log("data:", $('#formguru').serialize());

            $.ajax({
                url: base_url + "guruview/save",
                type: "POST",
                dataType: "JSON",
                data: $('#formguru').serialize(),
                success: function (data) {
                    console.log(data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            text: "Profile berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                //window.location.href = base_url + 'guruview';
                            }
                        })
                    } else {
                        swal.fire({
                            title: "ERROR",
                            html: data.errors.nip + "<br>" + data.errors.nama_guru,
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Data Tidak Tersimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        });

        $('#updatelogin').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var dataPost = $(this).serialize();
            console.log("data:", dataPost);

            $('#editLoginModal').modal('hide').data('bs.modal', null);
            $('#editLoginModal').on('hidden', function () {
                $(this).data('modal', null);
            });

            $.ajax({
                url: base_url + "userguru/editlogin",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log(data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            html: data.text,
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + "logout";
                                //window.location.href = base_url + 'guruview';
                            }
                        })
                    } else {
                        var html = '<ul>';
                        if (data.errors.username != null && data.errors.username !== "") {
                            html += '<li>' + data.errors.username + '</li>';
                        }
                        if (data.errors.old != null && data.errors.old !== "") {
                            html += '<li>' + data.errors.old + '</li>';
                        }
                        if (data.errors.new != null && data.errors.new !== "") {
                            html += '<li>' + data.errors.new + '</li>';
                        }
                        if (data.errors.new_confirm != null && data.errors.new_confirm !== "") {
                            html += '<li>' + data.errors.new_confirm + '</li>';
                        }
                        html += '</ul>';
                        swal.fire({
                            title: "ERROR",
                            html: html,
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Data Tidak Tersimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        });

        function uploadAttach(action, data) {
            if (action.includes('undefined')) {
                console.error("Critical error: upload URL contains undefined!", action);
                $.toast({
                    heading: "Gagal",
                    text: "Sesi anda tidak valid atau ID Guru tidak ditemukan. Silakan refresh halaman.",
                    icon: 'error',
                    position: 'top-right'
                });
                return;
            }
            console.log("uploading to:", action);
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
                    console.log("upload success:", data);
                    if (data.status) {
                        fotoProfile = data.src;
                        // Feedback visual sukses
                        showSuccessToast('Foto profil berhasil diperbarui');
                    } else {
                        console.error("upload error:", data.src);
                        showDangerToast(data.src);
                    }
                },
                error: function (xhr, status, error) {
                    console.log("ajax error detail:", xhr.status, xhr.statusText, xhr.responseText);
                    $.toast({
                        heading: "ERROR!!",
                        text: "Terjadi kesalahan (" + xhr.status + "): " + xhr.statusText,
                        icon: 'error',
                        showHideTransition: 'fade',
                        allowToastClose: true,
                        hideAfter: 5000,
                        position: 'top-right'
                    });
                }
            });
        }

        $("#foto-profile").change(function () {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //reader.onload = function (e) {
                //	$('#prev-logo-kanan').attr('src', e.target.result);
                //};
                reader.readAsDataURL(input.files[0]);

                var form = new FormData($('#set-foto-profile')[0]);
                var uploadUrl = base_url.endsWith('/') ? base_url : base_url + '/';
                uploadAttach(uploadUrl + 'guruview/uploadfile/' + idGuru, form);
            }
        });

        $('#foto-guru').on("error", function () {
            $(this).attr("src", base_url + 'assets/img/siswa.png');
        });
    });

    function deleteImage(fromBtn) {
        console.log(src);
        $.ajax({
            data: {src: src},
            type: "GET",
            url: base_url + "guruview/deletefile/" + idGuru,
            cache: false,
            success: function (response) {
                console.log(response);
                if (fromBtn) {
                    window.location.href = base_url + 'guruview';
                }
            }
        });
    }
</script>
