<div class="content-wrapper bg-light">
    <style>
        .dashboard-header {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .card-modern {
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .btn-soft-light {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            border: none;
        }
        .btn-soft-light:hover {
            background-color: rgba(255, 255, 255, 0.25);
            color: white;
        }
        .btn-soft-danger {
            background-color: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }
        .gap-2 { gap: 0.5rem; }
        .rounded-xl { border-radius: 1rem !important; }
        .bg-soft-primary { background-color: rgba(67, 97, 238, 0.1) !important; color: #4361ee !important; }
        .nav-pills .nav-link.active {
            background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%) !important;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2) !important;
        }
    </style>
    <div class="dashboard-header text-center" style="padding: 0.4rem 0 1.2rem 0;">
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <a href="<?= base_url('dataguru') ?>" class="btn btn-soft-light rounded-pill px-3">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
                <h2 class="text-white mb-0"><?= $judul ?></h2>
                <div style="width: 100px"></div> <!-- Spacer for centering -->
            </div>
            <p class="mb-0 opacity-75 small font-weight-bold text-white uppercase tracking-wider">
                Sunting Informasi Detail Guru
            </p>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -0.8rem">
        <div class="row">
            <!-- Left Side: Avatar & Basic Info -->
            <div class="col-xl-4 col-lg-5">
                <div class="card card-modern mb-4 text-center profile-card-hover">
                    <div class="card-body py-4">
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
                            <?= $guru->nip ?>
                        </p>

                        <div class="d-flex flex-column gap-2 px-3">
                            <button type="button" class="btn btn-warning btn-block font-weight-bold py-2 mb-2 rounded-pill shadow-sm" data-toggle="modal" data-target="#editLoginModal">
                                <i class="fas fa-key mr-2"></i> Edit Akun Login
                            </button>
                            <button type="button" class="btn btn-soft-danger btn-block font-weight-bold py-2 rounded-pill" onclick="deleteImage(true)">
                                <i class="fas fa-trash-alt mr-2"></i> Hapus Foto
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Profile Details -->
            <div class="col-xl-8 col-lg-7">
                <div class="card card-modern h-100 p-2">
                    <div class="card-header bg-white border-0 pt-3">
                        <ul class="nav nav-pills d-flex justify-content-center justify-content-sm-start" id="profileTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active rounded-pill px-4" id="base-tab" data-toggle="pill"
                                   href="#base-content" role="tab" aria-selected="true">
                                   <i class="fas fa-user-circle mr-2"></i>Data Utama
                                </a>
                            </li>
                            <li class="nav-item ml-sm-2 mt-2 mt-sm-0">
                                <a class="nav-link rounded-pill px-4" id="detail-tab" data-toggle="pill"
                                   href="#detail-content" role="tab" aria-selected="false">
                                   <i class="fas fa-file-alt mr-2"></i>Data Lengkap
                                </a>
                            </li>
                        </ul>
                    </div>

                    <?= form_open('', array('id' => 'formguru'), array('method' => 'edit', 'id_guru' => $id_active)); ?>
                    <div class="card-body px-4">
                        <div class="tab-content" id="profileTabsContent">
                            <!-- Basic Data Tab -->
                            <div class="tab-pane fade show active" id="base-content" role="tabpanel">
                                <div class="row mt-2">
                                    <?php foreach ($input_profile as $input) : ?>
                                        <div class="col-md-6 mb-4">
                                            <label class="text-muted small font-weight-bold uppercase tracking-wider mb-2 d-block">
                                                <i class="<?= $input->icon ?> mr-1"></i> <?= $input->label ?>
                                            </label>
                                            
                                            <?php if ($input->name == 'jenis_kelamin'): ?>
                                                <select class="form-control card-modern px-3" name="jenis_kelamin" 
                                                        style="border: 2px solid #edf2f7; border-radius: 12px; height: 50px;">
                                                    <option value="" disabled>Pilih Jenis Kelamin</option>
                                                    <?php
                                                    $arrJk = ["L" => "Laki-laki", "P" => "Perempuan"];
                                                    foreach ($arrJk as $key => $jk) : ?>
                                                        <option value="<?= $key ?>" <?= $key == $input->value ? 'selected' : '' ?>><?= $jk ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php elseif ($input->name == 'agama'): ?>
                                                <select class="form-control card-modern px-3" name="agama"
                                                        style="border: 2px solid #edf2f7; border-radius: 12px; height: 50px;">
                                                    <option value="" disabled>Pilih Agama</option>
                                                    <?php
                                                    $arrAgama = ["Islam", "Kristen", "Katolik", "Hindu", "Budha", "Konghucu", "Lainnya"];
                                                    foreach ($arrAgama as $agama) : ?>
                                                        <option value="<?= $agama ?>" <?= $agama == $input->value ? 'selected' : '' ?>><?= $agama ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php else: ?>
                                                <input value="<?= trim($input->value ?? '') ?>" id="<?= $input->name ?>" 
                                                       type="<?= $input->type ?>" class="form-control card-modern px-3" 
                                                       name="<?= $input->name ?>" placeholder="<?= $input->label ?>"
                                                       style="border: 2px solid #edf2f7; border-radius: 12px; height: 50px;"
                                                       <?= ($input->name == 'nip' || $input->name == 'nuptk') ? 'readonly style="background: #f8fafc; cursor: not-allowed; border: 2px solid #e2e8f0; border-radius: 12px; height: 50px;"' : '' ?>>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Detailed Data Tab -->
                            <div class="tab-pane fade" id="detail-content" role="tabpanel">
                                <div class="row mt-2">
                                    <?php foreach ($input_alamat as $alamat) : ?>
                                        <div class="col-md-6 mb-4">
                                            <label class="text-muted small font-weight-bold uppercase tracking-wider mb-2 d-block">
                                                <i class="<?= $alamat->icon ?> mr-1"></i> <?= $alamat->label ?>
                                            </label>
                                            <input value="<?= trim($alamat->value ?? '') ?>" id="<?= $alamat->name ?>" 
                                                   type="<?= $alamat->type ?>" class="form-control card-modern px-3" 
                                                   name="<?= $alamat->name ?>" placeholder="<?= $alamat->label ?>"
                                                   style="border: 2px solid #edf2f7; border-radius: 12px; height: 50px;">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-0 px-4 pb-4">
                        <button id="submit-profil" type="button" class="btn btn-primary btn-block font-weight-bold py-3 rounded-pill shadow-lg">
                            <i class="fas fa-save mr-2"></i> SIMPAN PERUBAHAN
                        </button>
                        <div class="text-center mt-3">
                            <small class="text-muted"><i class="fas fa-info-circle mr-1"></i> Pastikan data yang anda masukkan sudah benar.</small>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modals -->
<div class="modal fade" id="editFotoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-xl border-0 shadow-lg">
            <div class="modal-header bg-soft-primary border-0 py-3">
                <h5 class="modal-title font-weight-bold"><i class="fas fa-camera mr-2"></i>Edit Foto Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4 text-center">
                <?= form_open_multipart('', array('id' => 'set-foto-profile')) ?>
                <div class="p-4 border-dashed rounded-xl bg-light mb-3">
                    <input type="file" id="foto-profile" name="foto" class="dropify"
                           data-max-file-size-preview="2M"
                           data-allowed-file-extensions="jpg jpeg png"
                           data-default-file="<?= base_url() . $guru->foto ?>"/>
                </div>
                <?= form_close() ?>
                <button type="button" class="btn btn-primary rounded-pill px-5 py-2 font-weight-bold mt-2" data-dismiss="modal">
                    DONE
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editLoginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-xl border-0 shadow-lg">
            <div class="modal-header bg-soft-primary border-0 py-3">
                <h5 class="modal-title font-weight-bold"><i class="fas fa-key mr-2"></i>Edit Akun Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', array('id' => 'updatelogin'), array('id_guru' => $guru->id_guru)) ?>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="small font-weight-bold text-muted uppercase">Username</label>
                    <input type="text" class="form-control rounded-pill px-3 bg-light border-0" name="username" 
                           value="<?= $guru->username ?>" placeholder="Username" style="height: 45px;">
                </div>
                <div class="mb-3">
                    <label class="small font-weight-bold text-muted uppercase">Password Sekarang</label>
                    <input class="form-control rounded-pill px-3 bg-white border-0 shadow-sm" name="old" 
                           value="<?= $guru->password ?>" readonly style="height: 45px; cursor: not-allowed;">
                </div>
                <div class="mb-3">
                    <label class="small font-weight-bold text-muted uppercase font-italic text-primary">Password Baru (Opsional)</label>
                    <input type="password" name="new" class="form-control rounded-pill px-3 bg-light border-0" 
                           placeholder="Masukkan password baru" style="height: 45px;">
                </div>
                <div class="mb-4">
                    <label class="small font-weight-bold text-muted uppercase">Konfirmasi Password Baru</label>
                    <input type="password" name="new_confirm" class="form-control rounded-pill px-3 bg-light border-0" 
                           placeholder="Ulangi password baru" style="height: 45px;">
                </div>
            </div>
            <div class="modal-footer border-0 p-4 pt-0 row">
                <div class="col-6 pr-1">
                    <button type="button" class="btn btn-soft-secondary btn-block rounded-pill font-weight-bold" data-dismiss="modal">BATAL</button>
                </div>
                <div class="col-6 pl-1">
                    <button type="submit" class="btn btn-warning btn-block rounded-pill font-weight-bold shadow-sm">SIMPAN</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    var fotoProfile = '';
    var idGuru = '<?=$id_active?>';
    var src = '<?=$guru->foto?>';
    $(document).ready(function () {
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
                                //window.location.reload();
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
                                window.location.reload();
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
            console.log(data);
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
                    fotoProfile = data.src;
                },
                error: function (e) {
                    console.log("error", e.responseText);
                    $.toast({
                        heading: "ERROR!!",
                        text: "file tidak terbaca",
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
                //    $('#foto-profile').attr('src', e.target.result);
                //};
                reader.readAsDataURL(input.files[0]);
                var form = new FormData($('#set-foto-profile')[0]);
                uploadAttach(base_url + 'guruview/uploadfile/' + idGuru, form);
            }
        });

        $(`.profile-avatar`).each(function () {
            $(this).on("error", function () {
                $(this).attr("src", base_url + 'assets/img/siswa.png'); // default foto
            });
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
                    window.location.reload();
                }
            }
        });
    }
</script>
