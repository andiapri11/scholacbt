<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 14/07/20
 * Time: 17:46
 */

$kelasSelected = json_encode(unserialize($bank->bank_kelas ?? ''));
?>

<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-edit mr-2"></i>Konfigurasi Bank Soal & Materi
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <button onclick="window.history.back();" type="button" class="btn btn-outline-light rounded-pill px-4 shadow-sm font-weight-bold border-2">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <?= form_open('create', array('id' => 'create')) ?>
        <div class="card card-modern border-0 shadow-lg mb-5">
            <div class="card-header bg-white py-4 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title font-weight-bold text-dark mb-0">
                        <i class="fas fa-clipboard-list mr-2 text-primary"></i><?= $subjudul . ' - ' . ($bank->bank_kode ?: 'Baru') ?>
                    </h6>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 shadow font-weight-bold">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                    <div class="row mb-4">
                        <?php echo form_hidden('id_bank', $bank->id_bank) ?>
                        <div class="col-md-3 mb-3">
                            <label class="small font-weight-bold text-muted uppercase">Kode Bank Soal</label>
                            <input type="text" class="form-control" name="kode" maxlength="20" placeholder="Kode Unik" value="<?= $bank->bank_kode ?>" required>
                        </div>
                        <div class="col-md-3 mb-3">
                             <label class="small font-weight-bold text-muted uppercase">Mata Pelajaran</label>
                             <?php echo form_dropdown('mapel', $mapel, $bank->bank_mapel_id, 'id="select-mapel" class="select2 form-control" required'); ?>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="small font-weight-bold text-muted uppercase">Guru Pengampu</label>
                            <?php echo form_dropdown('guru', $gurus, $bank->bank_guru_id, 'id="select-guru" class="select2 form-control" required'); ?>
                        </div>
                        <div class="col-md-1 col-3 mb-3">
                            <label class="small font-weight-bold text-muted uppercase">Level</label>
                             <?php
                                if ($setting->jenjang == "1") {
                                    for ($i = 1; $i < 7; $i++) { $arrLevel[$i] = $i; }
                                } else if ($setting->jenjang == "2") {
                                    for ($j = 7; $j < 10; $j++) { $arrLevel[$j] = $j; }
                                } else {
                                    for ($k = 10; $k < 13; $k++) { $arrLevel[$k] = $k; }
                                }
                                echo form_dropdown('level', $arrLevel, $bank->bank_level, 'id="select-level" class="form-control" data-placeholder="Pilih Level" required'); ?>
                        </div>
                        <div class="col-md-2 col-9 mb-3">
                             <label class="small font-weight-bold text-muted uppercase">Target Kelas</label>
                             <select name="kelas[]" id="select-kelas" class="select2 form-control" multiple="multiple" required=""></select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Pilihan Ganda -->
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card alert-default-blue border-0 shadow-sm h-100" style="background: #eff6ff;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-primary rounded-circle text-white d-flex align-items-center justify-content-center mr-2" style="width: 32px; height: 32px;"><i class="fas fa-check"></i></div>
                                        <h6 class="font-weight-bold text-primary mb-0">Pilihan Ganda</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 mb-2">
                                            <label class="small font-weight-bold text-muted">Jml Soal</label>
                                            <input id="jml-pg" type='number' name='tampil_pg' class='form-control text-center' value="<?= $bank->tampil_pg ?>" required/>
                                        </div>
                                        <div class="col-3 mb-2 px-1">
                                            <label class="small font-weight-bold text-muted">Bobot %</label>
                                            <input id="bobot-pg" type='number' name='bobot_pg' class='form-control text-center' value="<?= $bank->bobot_pg ?>" required/>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="small font-weight-bold text-muted">Opsi</label>
                                            <?php
                                            $opsis [''] = 'Pilih :';
                                            $opsis ['3'] = '3 (A-C)';
                                            $opsis ['4'] = '4 (A-D)';
                                            $opsis ['5'] = '5 (A-E)';
                                            echo form_dropdown('opsi', $opsis, $bank->opsi, 'class="form-control px-1" required'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Ganda Kompleks -->
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card alert-default-warning border-0 shadow-sm h-100">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-warning rounded-circle text-white d-flex align-items-center justify-content-center mr-2" style="width: 32px; height: 32px;"><i class="fas fa-check-double"></i></div>
                                        <h6 class="font-weight-bold text-warning mb-0" style="color: #b45309 !important;">Ganda Kompleks</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label class="small font-weight-bold text-muted">Jml Soal</label>
                                            <input id="jml-pg2" type='number' name='tampil_kompleks' class='form-control text-center' value="<?= $bank->tampil_kompleks ?>" required/>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label class="small font-weight-bold text-muted">Bobot %</label>
                                            <input id="bobot-pg2" type='number' name='bobot_kompleks' class='form-control text-center' value="<?= $bank->bobot_kompleks ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Menjodohkan -->
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card alert-default-danger border-0 shadow-sm h-100">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-danger rounded-circle text-white d-flex align-items-center justify-content-center mr-2" style="width: 32px; height: 32px;"><i class="fas fa-random"></i></div>
                                        <h6 class="font-weight-bold text-danger mb-0">Menjodohkan</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label class="small font-weight-bold text-muted">Jml Soal</label>
                                            <input id="jml-jodohkan" type='number' name='tampil_jodohkan' class='form-control text-center' value="<?= $bank->tampil_jodohkan ?>" required/>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label class="small font-weight-bold text-muted">Bobot %</label>
                                            <input id="bobot-jodohkan" type='number' name='bobot_jodohkan' class='form-control text-center' value="<?= $bank->bobot_jodohkan ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Isian Singkat -->
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card alert-default-success border-0 shadow-sm h-100">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-success rounded-circle text-white d-flex align-items-center justify-content-center mr-2" style="width: 32px; height: 32px;"><i class="fas fa-pen-alt"></i></div>
                                        <h6 class="font-weight-bold text-success mb-0">Isian Singkat</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label class="small font-weight-bold text-muted">Jml Soal</label>
                                            <input id="jml-isian" type='number' name='tampil_isian' class='form-control text-center' value="<?= $bank->tampil_isian ?>" required/>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label class="small font-weight-bold text-muted">Bobot %</label>
                                            <input id="bobot-isian" type='number' name='bobot_isian' class='form-control text-center' value="<?= $bank->bobot_isian ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Esai -->
                         <div class="col-12 col-md-4 mb-3">
                            <div class="card alert-default-secondary border-0 shadow-sm h-100">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-secondary rounded-circle text-white d-flex align-items-center justify-content-center mr-2" style="width: 32px; height: 32px;"><i class="fas fa-pencil-alt"></i></div>
                                        <h6 class="font-weight-bold text-secondary mb-0">Uraian / Essai</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label class="small font-weight-bold text-muted">Jml Soal</label>
                                            <input id="jml-essai" type='number' name='tampil_esai' class='form-control text-center' value="<?= $bank->tampil_esai ?>" required/>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label class="small font-weight-bold text-muted">Bobot %</label>
                                            <input id="bobot-essai" type='number' name='bobot_esai' class='form-control text-center' value="<?= $bank->bobot_esai ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4 mt-4 border-top">
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light border-0 shadow-none">
                                <div class="card-body p-3 text-center">
                                    <h6 class="font-weight-bold text-muted mb-3 uppercase small">Total Konfigurasi</h6>
                                    <div class="d-flex justify-content-center">
                                        <div class="mx-2">
                                            <h3 class="font-weight-bold mb-0 text-primary" id="total-soal">0</h3>
                                            <small class="text-muted font-weight-bold uppercase">Soal</small>
                                        </div>
                                        <div class="mx-2 border-right"></div>
                                        <div class="mx-2">
                                            <h3 class="font-weight-bold mb-0 text-success" id="total-bobot">0</h3>
                                            <small class="text-muted font-weight-bold uppercase">Bobot</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                             <label class="small font-weight-bold text-muted uppercase">Mapel Agama</label>
                            <?php echo form_dropdown('soal_agama', $mapel_agama, $bank->soal_agama, 'class="form-control" required'); ?>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="small font-weight-bold text-muted uppercase">Status Bank Soal</label>
                            <?php
                            $aktifs [''] = 'Pilih Status :';
                            $aktifs ['1'] = 'Aktif';
                            $aktifs ['0'] = 'Non Aktif';
                            echo form_dropdown('status', $aktifs, $bank->status, 'class="form-control" required'); ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close() ?>
    </section>
</div>

<style>
    .card-modern { border-radius: 16px; }
    .form-control, .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple {
        border-radius: 8px !important;
        border: 1px solid #e2e8f0;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
    }
    .input-group-text { border-radius: 8px 0 0 8px !important; }
    .select2-container--default .select2-selection--single .select2-selection__arrow { top: 4px; }
    .card.alert-default-primary { background-color: #f0f9ff; border: 1px solid #bae6fd; color: #0369a1; }
    .card.alert-default-warning { background-color: #fffbeb; border: 1px solid #fde68a; color: #b45309; }
    .card.alert-default-danger { background-color: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; }
    .card.alert-default-success { background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; }
    .card.alert-default-secondary { background-color: #f8fafc; border: 1px solid #e2e8f0; color: #475569; }
    label.small { letter-spacing: 0.5px; }
</style>

<script>
    var isAdmin = '<?= $this->ion_auth->is_admin() ?>';
    let kelasSelect = JSON.parse('<?= $kelasSelected ?>');
    var idGuru = '<?=$id_guru?>';
    var idMapel = '<?=$bank->bank_mapel_id?>';

    $(document).ready(function () {
        ajaxcsrf();
        var selLevel = $('#select-level');
        var selKelas = $('#select-kelas');
        var selMapel = $('#select-mapel');
        var selGuru = $('#select-guru');

        selMapel.select2();
        selKelas.select2();
        selGuru.select2();

        var as = [];
        for (let i = 0; i < kelasSelect.length; i++) {
            as.push(kelasSelect[i].kelas_id);
        }

        getGuruMapel(selMapel.val());
        getKelasLevel(selLevel.val(), selMapel.val());

        $('#create').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());
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
                url: base_url + "cbtbanksoal/saveBank",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    swal.fire({
                        title: "Sukses",
                        html: 'Bank soal berhasil disimpan',
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            window.history.back();
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

        function getGuruMapel(mapel) {
            if (isAdmin) {
                $.ajax({
                    url: base_url + "cbtbanksoal/getgurumapel?id_mapel=" + mapel,
                    type: "GET",
                    success: function (data) {
                        console.log('guru', data);
                        var opts = '';
                        selGuru.html(opts);
                        $.each(data, function (k, v) {
                            var selected = idGuru == k ? 'selected=selected' : '';
                            opts += '<option value="' + k + '" ' + selected + '>' + v + '</option>';
                        });
                        selGuru.html(opts);
                        idGuru = selGuru.val();
                        getKelasLevel(selLevel.val(), selMapel.val());
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                    }
                });
            }
        }

        function getKelasLevel(level, mapel) {
            console.log('id_guru', idGuru);
            console.log('id_level', level);
            console.log('id_mapel', mapel);
            if (idGuru === '' || mapel == null) {
                console.log('id_guru', 'empty');
            } else {
                $.ajax({
                    url: base_url + "cbtbanksoal/getkelaslevel?level=" + level + "&id_guru=" + idGuru + '&mapel=' + mapel,
                    type: "GET",
                    success: function (data) {
                        console.log('kelas', data);
                        selKelas.html('').select2({data: null}).trigger('change');
                        var kelas = data.kelas;
                        for (let i = 0; i < kelas.length; i++) {
                            var selected = jQuery.inArray(kelas[i].id_kelas, as) > -1;
                            selKelas.append(new Option(kelas[i].kode_kelas, kelas[i].id_kelas, false, selected));
                        }
                        selKelas.trigger('change');
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                    }
                });
            }
        }

        selGuru.on('change', function () {
            idGuru = $(this).val();
            console.log('id_guru_change', idGuru);
            getKelasLevel(selLevel.val(), selMapel.val());
        });

        selLevel.on('change', function () {
            getKelasLevel($(this).val(), selMapel.val());
        });

        selMapel.on('change', function () {
            getGuruMapel($(this).val());
        });

        var valBobotPg = $('#bobot-pg');
        var valBobotPg2 = $('#bobot-pg2');
        var valBobotJodohkan = $('#bobot-jodohkan');
        var valBobotIsian = $('#bobot-isian');
        var valBobotEssai = $('#bobot-essai');
        var totalBobot = $('#total-bobot');
        onChangeValueBobot();

        var valSoalPg = $('#jml-pg');
        var valSoalPg2 = $('#jml-pg2');
        var valSoalJodohkan = $('#jml-jodohkan');
        var valSoalIsian = $('#jml-isian');
        var valSoalEssai = $('#jml-essai');
        var totalSoal = $('#total-soal');
        onChangeValueJumlah();

        function onChangeValueBobot() {
            const bobotpg = valBobotPg.val() === "" ? 0 : parseInt(valBobotPg.val());
            const bobotpp2 = valBobotPg2.val() === "" ? 0 : parseInt(valBobotPg2.val());
            const bobotjodohkan = valBobotJodohkan.val() === "" ? 0 : parseInt(valBobotJodohkan.val());
            const bobotisian = valBobotIsian.val() === "" ? 0 : parseInt(valBobotIsian.val());
            const bobotessai = valBobotEssai.val() === "" ? 0 : parseInt(valBobotEssai.val());

            totalBobot.text((bobotpg + bobotpp2 + bobotjodohkan + bobotisian + bobotessai) + '');
        }

        function onChangeValueJumlah() {
            const jmlpg = valSoalPg.val() === "" ? 0 : parseInt(valSoalPg.val());
            const jmlpp2 = valSoalPg2.val() === "" ? 0 : parseInt(valSoalPg2.val());
            const jmljodohkan = valSoalJodohkan.val() === "" ? 0 : parseInt(valSoalJodohkan.val());
            const jmlisian = valSoalIsian.val() === "" ? 0 : parseInt(valSoalIsian.val());
            const jmlessai = valSoalEssai.val() === "" ? 0 : parseInt(valSoalEssai.val());

            totalSoal.text((jmlpg + jmlpp2 + jmljodohkan + jmlisian + jmlessai) + '');
        }

        valBobotPg.on('change keyup', function () {
            onChangeValueBobot();
        });
        valBobotPg2.on('change keyup', function () {
            onChangeValueBobot();
        });
        valBobotJodohkan.on('change keyup', function () {
            onChangeValueBobot();
        });
        valBobotIsian.on('change keyup', function () {
            onChangeValueBobot();
        });
        valBobotEssai.on('change keyup', function () {
            onChangeValueBobot();
        });

        valSoalPg.on('change keyup', function () {
            onChangeValueJumlah();
        });
        valSoalPg2.on('change keyup', function () {
            onChangeValueJumlah();
        });
        valSoalJodohkan.on('change keyup', function () {
            onChangeValueJumlah();
        });
        valSoalIsian.on('change keyup', function () {
            onChangeValueJumlah();
        });
        valSoalEssai.on('change keyup', function () {
            onChangeValueJumlah();
        });
    });

</script>
