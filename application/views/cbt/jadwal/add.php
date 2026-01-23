<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 14/07/20
 * Time: 17:46
 */
?>

<style>
    .content-wrapper {
        background: #f4f6f9 !important;
    }
    .my-shadow {
        box-shadow: 0 10px 25px rgba(0,0,0,0.05) !important;
        border: none !important;
        border-radius: 12px !important;
        overflow: hidden;
    }
    .card-header {
        background-color: #111c43 !important;
        border-bottom: 3px solid #4361ee !important;
        padding: 1rem 1.25rem !important;
    }
    .card-title h6 {
        color: #ffffff !important;
        font-weight: 600 !important;
        margin: 0;
        letter-spacing: 0.5px;
    }
    .card-body {
        padding: 1.5rem !important;
    }
    label {
        color: #4a5568 !important;
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem !important;
    }
    .form-control-sm {
        height: calc(1.8125rem + 12px) !important;
        padding: 0.5rem 0.75rem !important;
        font-size: 0.9rem !important;
        border-radius: 8px !important;
        border: 1px solid #e2e8f0 !important;
        background-color: #f8fafc !important;
        transition: all 0.2s ease;
    }
    .form-control-sm:focus {
        background-color: #fff !important;
        border-color: #4361ee !important;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1) !important;
    }
    .select2-container--bootstrap4 .select2-selection--single {
        height: calc(1.8125rem + 12px) !important;
        border-radius: 8px !important;
        border: 1px solid #e2e8f0 !important;
        background-color: #f8fafc !important;
    }
    .icheck-cyan > label {
        text-transform: none !important;
        font-weight: 500 !important;
        color: #2d3748 !important;
        font-size: 0.9rem !important;
    }
    .card-footer {
        background-color: #f8fafc !important;
        border-top: 1px solid #e2e8f0 !important;
    }
    .card-footer ul li {
        color: #718096 !important;
        font-size: 0.85rem;
        margin-bottom: 0.25rem;
    }
    .btn-success {
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%) !important;
        border: none !important;
        padding: 0.5rem 1rem !important;
        border-radius: 8px !important;
        box-shadow: 0 4px 10px rgba(46, 204, 113, 0.2) !important;
    }
    .btn-danger {
        border-radius: 8px !important;
        padding: 0.5rem 1rem !important;
    }
</style>

<div class="content-wrapper pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-6">
                    <h1 class="font-weight-bold text-dark" style="font-size: 1.5rem;"><?= $judul ?></h1>
                </div>
                <div class="col-6 text-right">
                    <button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger shadow-sm">
                        <i class="fas fa-arrow-circle-left mr-2"></i><span>Kembali</span>
                    </button>
                    <button onclick="$('#create').submit();" class='btn btn-success btn-sm ml-2 shadow-sm'>
                        <i class='fa fa-check mr-2'></i> Simpan Jadwal
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?= form_open('create', array('id' => 'create')) ?>
            <div class="card my-shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title">
                        <h6><i class="fas fa-calendar-alt mr-2 text-info"></i> <?= $judul == 'Tambah Jadwal Ujian' ? 'Pengaturan Jadwal Baru' : 'Edit Jadwal Ujian' ?></h6>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $disabled_option = $disable_opsi ? 'disabled="disabled"' : '';
                    ?>
                    <div class="row">
                        <input type="hidden" id="id-jadwal" name='id_jadwal' value="<?= $jadwal->id_jadwal ?>" class='d-none'/>
                        
                        <div class="col-md-5 mb-4">
                            <label><i class="fas fa-book mr-1"></i> Mata Pelajaran</label>
                            <?php
                            echo form_dropdown(
                                'mapel',
                                $mapel,
                                isset($jadwal->id_mapel) ? $jadwal->id_mapel : '',
                                $disabled_option . ' id="id-mapel" class="form-control form-control-sm" required'
                            ); ?>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label><i class="fas fa-database mr-1"></i> Bank Soal</label>
                            <select <?= $disabled_option ?> name="bank_id" id="bank-id"
                                                            class="form-control form-control-sm" required=""></select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label><i class="fas fa-tags mr-1"></i> Jenis Ujian</label>
                            <?php
                            echo form_dropdown(
                                'jenis_id',
                                $jenis,
                                $jadwal->id_jenis,
                                $disabled_option . ' id="jenis-id" class="form-control form-control-sm" required'
                            ); ?>
                        </div>
                        
                        <div class="col-12"><hr class="mt-0 mb-4" style="border-top: 1px dashed #e2e8f0;"></div>

                        <div class='col-6 col-md-3 mb-4'>
                            <label><i class="far fa-calendar-check mr-1"></i> Tanggal Mulai</label>
                            <input type='text' id="tgl-mulai" name='tgl_mulai' value="<?= $jadwal->tgl_mulai ?>"
                                   class='tgl form-control form-control-sm' autocomplete='off' required='true'/>
                        </div>
                        <div class='col-6 col-md-3 mb-4'>
                            <label><i class="far fa-calendar-times mr-1"></i> Tanggal Selesai</label>
                            <input type='text' id="tgl-selesai" name='tgl_selesai' value="<?= $jadwal->tgl_selesai ?>"
                                   class='tgl form-control form-control-sm'
                                   autocomplete='off' required='true'/>
                        </div>
                        <div class='col-6 col-md-3 mb-4'>
                            <div class='form-group'>
                                <label><i class="far fa-clock mr-1"></i> Durasi (menit)</label>
                                <input type='number' id="durasi-ujian" name='durasi_ujian'
                                       class='form-control form-control-sm' value="<?= $jadwal->durasi_ujian ?>"
                                       required='true'/>
                            </div>
                        </div>
                        <div class='col-6 col-md-3 mb-4'>
                            <div class='form-group'>
                                <label><i class="fas fa-hourglass-start mr-1"></i> Durasi Min. (mnt)</label>
                                <input type='number' id="durasi-ujian" name='jarak'
                                       class='form-control form-control-sm' value="<?= $jadwal->jarak ?>"
                                       required='true'/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-light p-3 rounded-lg border">
                        <div class='row'>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class='col-sm-4 col-md-2 mb-2'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-soal" name='acak_soal'
                                                   value='1' <?= $jadwal->acak_soal == 1 ? 'checked="checked"' : '' ?> <?= $disabled_option ?>/>
                                            <label for="check-soal">Acak Soal</label>
                                        </div>
                                    </div>
                                    <div class='col-sm-4 col-md-2 mb-2'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-opsi" name='acak_opsi'
                                                   value='1' <?= $jadwal->acak_opsi == 1 ? 'checked="checked"' : '' ?> <?= $disabled_option ?>/>
                                            <label for="check-opsi">Acak Jawaban</label>
                                        </div>
                                    </div>
                                    <div class='col-sm-4 col-md-2 mb-2'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-token" name='token'
                                                   value='1' <?= $jadwal->token === '1' ? 'checked="checked"' : '' ?> />
                                            <label for="check-token">Gunakan Token</label>
                                        </div>
                                    </div>
                                    <div class='col-sm-4 col-md-2 mb-2'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-hasil" name='hasil_tampil'
                                                   value='1' <?= $jadwal->hasil_tampil === '1' ? 'checked="checked"' : '' ?> />
                                            <label for="check-hasil">Tampilkan Hasil</label>
                                        </div>
                                    </div>
                                    <div class='col-sm-4 col-md-2 mb-2'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-login" name='reset_login'
                                                   value='1' <?= $jadwal->reset_login === '1' ? 'checked="checked"' : '' ?> />
                                            <label for="check-login">Reset Izin</label>
                                        </div>
                                    </div>
                                    <div class='col-sm-4 col-md-2 mb-2'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-status" name='status'
                                                   value='1' <?= $jadwal->status === '1' ? 'checked="checked"' : '' ?> <?= $disabled_option ?>/>
                                            <label for="check-status">Aktif</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer px-4 py-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-info-circle text-info mr-2"></i>
                        <span class="font-weight-600 text-dark small">Informasi Tambahan</span>
                    </div>
                    <ul class="pl-4 mb-0">
                        <?php
                        if ($jadwal->id_jadwal != "") :
                            ?>
                            <li>
                                Beberapa opsi <b>tidak bisa diedit</b> karena jadwal ujian <b>sedang berlangsung</b>.
                            </li>
                        <?php endif; ?>
                        <li>
                            Jadwal ujian akan ditampilkan di siswa pada rentang waktu antara <b>tanggal mulai</b> dan <b>tanggal expired</b>.
                        </li>
                        <li>
                            <b>Durasi minimal</b> untuk mengizinkan siswa menyelesaikan ujian pada menit yg ditentukan.
                        </li>
                        <li><b>Reset Izin</b> jika aktif maka siswa tidak bisa mengerjakan ujian di beberapa komputer kecuali setelah diizinkan</li>
                    </ul>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </section>
</div>

<script>
    var digunakan = <?= $disable_opsi ? '1' : '0' ?>;
    var idBank = '<?=$jadwal->id_bank?>';
    $(document).ready(function () {
        ajaxcsrf();
        //console.log('used',digunakan);

        $('#jenis-id').select2();
        var selMapel = $('#id-mapel');
        selMapel.select2();
        var selec = idBank == '' ? 'selected' : '';
        selMapel.prepend('<option value="" ' + selec + '>Pilih Mata Pelajaran</option>');
        var selBank = $('#bank-id');
        selBank.select2();

        $('.tgl').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            timepicker: false,
            scrollInput: false,
            scrollMonth: false,
            format: 'Y-m-d',
            //disabledWeekDays: [0],
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });

        function reEnable(disable) {
            if (digunakan == '1') {
                $('#id-guru').attr('disabled', disable);
                $('#bank-id').prop('disabled', disable);
                $('#jenis-id').prop('disabled', disable);
                $('#check-soal').prop('disabled', disable);
                $('#check-opsi').prop('disabled', disable);
                $('#check-token').prop('disabled', disable);
                $('#check-hasil').prop('disabled', disable);
                $('#check-login').prop('disabled', disable);
                $('#check-status').prop('disabled', disable);
            }
        }

        $('#create').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            reEnable(false);
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
                url: base_url + "cbtjadwal/saveJadwal",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data);
                    reEnable(true);
                    $('#tambahjadwal').modal('hide').data('bs.modal', null);
                    $('#tambahjadwal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });

                    if (data.success) {
                        swal.fire({
                            title: "Sukses",
                            text: "Jadwal berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.history.back()
                                //window.location.href = base_url + 'cbtjadwal';
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: data.message,
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
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

        function getBankMapel(mapel) {
            if (!mapel) return
            $.ajax({
                url: base_url + "cbtjadwal/getbankmapel/" + mapel,
                type: "GET",
                success: function (data) {
                    console.log('bank', data);
                    selBank.html('<option value="" ' + selec + '>Pilih Bank Soal:</option>');
                    $.each(data, function (i, v) {
                        var selected = i === idBank ? 'selected' : '';
                        if (i !== '') selBank.append('<option value="' + i + '" ' + selected + '>' + v + '</option>');
                    });
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }

        selMapel.on('change', function () {
            getBankMapel($(this).val());
        });

        getBankMapel(selMapel.val());
    });
</script>
