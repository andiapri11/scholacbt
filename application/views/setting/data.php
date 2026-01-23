<?php
$satuan = ["1" => ["SD", "MI"], "2" => ["SMP", "MTS"], "3" => ["SMA", "MA", "SMK"]];
?>
<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row px-3 pt-4 pb-5">
                <div class="col-sm-6">
                    <h1 class="text-white font-weight-bold text-shadow">
                        <i class="fas fa-cog mr-2"></i> <?= $judul ?>
                    </h1>
                    <p class="text-white-50 small mb-0">Atur profil sekolah, jenjang, dan identitas aplikasi.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg mb-4">
                <div class="card-header bg-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-sliders-h text-primary mr-2"></i>
                        <h6 class="mb-0 font-weight-bold text-dark">Konfigurasi Identitas</h6>
                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary rounded-pill px-4 shadow-sm" onclick="submitSetting()">
                            <i class="fas fa-save mr-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
                <div class="card-body p-4">
                    <?= form_open('', array('id' => 'savesetting')) ?>
                    
                    <!-- Section 1: Identitas Utama -->
                    <div class="row mb-4">
                        <div class="col-12 mb-3">
                            <h6 class="font-weight-bold text-primary"><i class="fas fa-university mr-2"></i> Identitas Sekolah</h6>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-desktop mr-1 text-xs"></i> Nama Aplikasi *</label>
                            <input type="text" name="nama_aplikasi" class="form-control required shadow-sm"
                                   placeholder="Contoh: CBT Nurul Ilmi" value="<?= $setting->nama_aplikasi ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-school mr-1 text-xs"></i> Nama Sekolah *</label>
                            <input type="text" name="nama_sekolah" class="form-control required shadow-sm"
                                   placeholder="Contoh: SMA Nurul Ilmi" value="<?= $setting->sekolah ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-id-card mr-1 text-xs"></i> NSS / NSM</label>
                            <input type="number" name="nss" class="form-control shadow-sm" placeholder="Masukkan NSS/NSM" value="<?= $setting->nss ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-fingerprint mr-1 text-xs"></i> NPSN</label>
                            <input type="number" name="npsn" class="form-control shadow-sm" placeholder="Masukkan NPSN" value="<?= $setting->npsn ?>">
                        </div>
                    </div>

                    <!-- Section 2: Jenjang & Satuan -->
                    <div class="row mb-4 bg-light p-3 rounded" style="border: 1px dashed #dee2e6;">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-layer-group mr-1 text-xs"></i> Jenjang Pendidikan *</label>
                            <select id="jenjang" class="form-control required select2" data-placeholder="Pilih Jenjang"
                                    name="jenjang" required>
                                <option value="" disabled>Pilih Jenjang</option>
                                <?php
                                $jenjang = ["SD/MI", "SMP/MTS", "SMA/MA/SMK"];
                                for ($i = 0; $i < 3; $i++) {
                                    $arrJenjang[$i + 1] = $jenjang[$i];
                                }
                                foreach ($arrJenjang as $key => $val) :
                                    $selected = $setting->jenjang == $key ? 'selected' : '';
                                    ?>
                                    <option value="<?= $key ?>" <?= $selected ?>><?= $val ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-bookmark mr-1 text-xs"></i> Satuan Pendidikan *</label>
                            <select id="satuan-pend" class="form-control required select2" data-placeholder="Satuan Pendidikan"
                                    name="satuan_pendidikan" required>
                                <option value="0" disabled>Satuan Pendidikan</option>
                                <?php
                                $satuan_selected = $satuan[$setting->jenjang];
                                for ($i = 0; $i < count($satuan_selected); $i++) {
                                    $arrSatuan[$i + 1] = $satuan_selected[$i];
                                }
                                foreach ($arrSatuan as $keys => $vals) :
                                    $selecteds = $setting->satuan_pendidikan == $keys ? 'selected' : '';
                                    ?>
                                    <option value="<?= $keys ?>" <?= $selecteds ?>><?= $vals ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Section 3: Lokasi & Alamat -->
                    <div class="row mb-4">
                        <div class="col-12 mb-3">
                            <h6 class="font-weight-bold text-primary"><i class="fas fa-map-marked-alt mr-2"></i> Alamat Lengkap</h6>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-map-pin mr-1 text-xs"></i> Alamat Jalan *</label>
                            <textarea class="form-control required shadow-sm" name="alamat" rows="5"
                                      placeholder="Nama Jalan, Nomor, RT/RW" required style="border-radius: 8px;"><?= $setting->alamat ?></textarea>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Desa / Kelurahan *</label>
                                    <input type="text" name="desa" class="form-control required shadow-sm"
                                           placeholder="Contoh: Desa Makmur" value="<?= $setting->desa ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Kecamatan *</label>
                                    <input type="text" name="kec" class="form-control required shadow-sm"
                                           placeholder="Contoh: Kec. Sejahtera" value="<?= $setting->kecamatan ?>" required>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Kabupaten / Kota *</label>
                                    <input type="text" name="kota" class="form-control required shadow-sm" 
                                           placeholder="Contoh: Kota Bersemi" value="<?= $setting->kota ?>" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Kode Pos</label>
                                    <input type="number" name="kode_pos" class="form-control shadow-sm" 
                                           placeholder="12345" value="<?= $setting->kode_pos ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Provinsi *</label>
                                    <input type="text" name="provinsi" class="form-control required shadow-sm"
                                           placeholder="Masukkan Provinsi" value="<?= $setting->provinsi ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Kontak & Media -->
                    <div class="row mb-4">
                        <div class="col-12 mb-3">
                            <h6 class="font-weight-bold text-primary"><i class="fas fa-headset mr-2"></i> Kontak Sekolah</h6>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-phone mr-1 text-xs"></i> Telepon</label>
                            <div class="input-group shadow-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-phone-alt text-xs"></i></span>
                                </div>
                                <input type="number" name="tlp" class="form-control border-left-0" placeholder="81234..." value="<?= $setting->telp ?>">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-envelope mr-1 text-xs"></i> Email</label>
                            <div class="input-group shadow-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-at text-xs"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control border-left-0" placeholder="admin@sekolah.sch.id" value="<?= $setting->email ?>">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-globe mr-1 text-xs"></i> Website</label>
                            <div class="input-group shadow-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-link text-xs"></i></span>
                                </div>
                                <input type="text" name="web" class="form-control border-left-0" placeholder="www.sekolah.sch.id" value="<?= $setting->web ?>">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2"><i class="fas fa-fax mr-1 text-xs"></i> Fax</label>
                            <div class="input-group shadow-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-print text-xs"></i></span>
                                </div>
                                <input type="text" name="fax" class="form-control border-left-0" placeholder="Nomor Fax" value="<?= $setting->fax ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Section 5: Kepemimpinan -->
                    <div class="row mb-4">
                        <div class="col-12 mb-3">
                            <h6 class="font-weight-bold text-primary"><i class="fas fa-user-tie mr-2"></i> Pimpinan Sekolah</h6>
                            <hr class="mt-1">
                        </div>
                        <div class="col-md-7 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nama Kepala Sekolah *</label>
                            <input type="text" name="kepsek" class="form-control required shadow-sm"
                                   placeholder="Gellar lengkap dengan NIP jika ada" value="<?= $setting->kepsek ?>" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">NIP / NUPTK</label>
                            <input type="number" name="nip" class="form-control shadow-sm" 
                                   placeholder="Masukkan NIP" value="<?= $setting->nip ?>">
                        </div>
                    </div>
                    <?= form_close() ?>
                    <div class="row pt-4 border-top">
                        <div class="col-12 mb-3">
                            <h6 class="font-weight-bold text-dark"><i class="fas fa-image text-primary mr-2"></i> Logo & Stempel</h6>
                        </div>
                        <div class="col-md-4">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2 text-center d-block">Tandatangan Kepala Sekolah</label>
                            <?= form_open_multipart('', array('id' => 'set-tandatangan')) ?>
                            <div class="form-group mb-4">
                                <input type="file" id="tanda-tangan" name="logo" class="dropify"
                                       data-max-file-size-preview="2M" data-allowed-file-extensions="jpg jpeg png"
                                       data-default-file="<?= base_url() . $setting->tanda_tangan ?>"/>
                            </div>
                            <?= form_close() ?>
                        </div>
                        <div class="col-md-4">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2 text-center d-block">Logo Kiri / Aplikasi</label>
                            <?= form_open_multipart('', array('id' => 'set-logo-kiri')) ?>
                            <div class="form-group mb-4">
                                <input type="file" id="logo-kiri" name="logo" class="dropify"
                                       data-max-file-size-preview="2M"
                                       data-allowed-file-extensions="jpg jpeg png"
                                       data-default-file="<?= base_url() . $setting->logo_kiri ?>"/>
                            </div>
                            <?= form_close() ?>
                        </div>
                        <div class="col-md-4">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2 text-center d-block">Logo Kanan Sekolah</label>
                            <?= form_open_multipart('', array('id' => 'set-logo-kanan')) ?>
                            <div class="form-group mb-4">
                                <input type="file" id="logo-kanan" name="logo" class="dropify"
                                       data-max-file-size-preview="2M"
                                       data-allowed-file-extensions="jpg jpeg png"
                                       data-default-file="<?= base_url() . $setting->logo_kanan ?>"/>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var logoKanan = '<?=base_url() . $setting->logo_kanan?>';
    var logoKiri = '<?=base_url() . $setting->logo_kiri?>';
    var tandatangan = '<?=base_url() . $setting->tanda_tangan?>';
    var satuanPend = JSON.parse(JSON.stringify(<?= json_encode($satuan)?>));

    function submitSetting() {
        $('#savesetting').submit();
    }

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
            if (element.element.id === 'logo-kanan') {
                logoKanan = '';
                $('#prev-logo-kanan').attr('src', '');
            } else if (element.element.id === 'logo-kiri') {
                logoKiri = '';
                $('#prev-logo-kiri').attr('src', '');
            } else if (element.element.id === 'tanda-tangan') {
                tandatangan = '';
                $('#prev-tandatangan').css(
                    {'background': 'url() no-repeat center'},
                    {'font-family': 'Times New Roman'},
                    {'font-size': '10pt'},
                    {'background-size': '100px 60px'}
                );
            }
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

        $('#jenjang').change(function () {
            var htmlOptions = '<option value="0" disabled="">Satuan Pendidikan</option>\n';
            var satSelected = satuanPend[$(this).val()];
            for (let i = 0; i < satSelected.length; i++) {
                htmlOptions += '<option value="' + (i + 1) + '">' + satSelected[i] + '</option>';
            }
            $('#satuan-pend').html(htmlOptions);
        });

        $('#savesetting').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var hasInput = true;
            $('.required').each(function () {
                if ($(this).val() === "") {
                    hasInput = false;
                    return false;
                }
            });

            console.log(hasInput);

            if (!hasInput) {
                Swal.fire({
                    title: "ERROR",
                    text: "Isi semua pilihan yang bertanda bintang (*)",
                    icon: "error"
                });
            } else {
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
                    url: base_url + 'settings/savesetting',
                    type: 'POST',
                    data: $(this).serialize() + '&logo_kanan=' + logoKanan + '&logo_kiri=' + logoKiri + '&tanda_tangan=' + tandatangan,
                    success: function (response) {
                        console.log(response);
                        swal.fire({
                            title: "Sukses",
                            html: "Berhasil menyimpan pengaturan",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'settings';
                            }
                        });
                    },
                    error: function (xhr, error, status) {
                        console.log(xhr.responseText);
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

        $("#logo-kanan").change(function () {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#prev-logo-kanan').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);

                var form = new FormData($('#set-logo-kanan')[0]);
                uploadAttach(base_url + 'settings/uploadfile/logo_kanan', form);
            }
        });

        $("#logo-kiri").change(function () {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#prev-logo-kiri').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);

                var form = new FormData($('#set-logo-kiri')[0]);
                uploadAttach(base_url + 'settings/uploadfile/logo_kiri', form);
            }
        });

        $("#tanda-tangan").change(function () {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    //style="font-family: 'Times New Roman'; font-size: 10pt; background: url('<?=base_url('assets/img/user.jpg')?>') no-repeat center; background-size: 100px 60px
                    $('#prev-tandatangan').css({'background': 'url(' + e.target.result + ') no-repeat center'}, {'font-family': 'Times New Roman'}, {'font-size': '10pt'}, {'background-size': '100px 60px'});
                    //$('#prev-tandatangan').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);

                var form = new FormData($('#set-tandatangan')[0]);
                uploadAttach(base_url + 'settings/uploadfile/tandatangan', form);
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
                    if (data.src.includes('kanan')) {
                        logoKanan = data.src;
                        //console.log('kanan', data.src);
                    } else if (data.src.includes('kiri')) {
                        logoKiri = data.src;
                        //console.log('kiri', data.src);
                    } else if (data.src.includes('tanda')) {
                        tandatangan = data.src;
                        //console.log('tandatangan', data.src);
                    }
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

        function deleteImage(src) {
            console.log(src);
            $.ajax({
                data: {src: src},
                type: "POST",
                url: base_url + "settings/deletefile",
                cache: false,
                success: function (response) {
                    console.log(response);
                }
            });
        }
    });
</script>
