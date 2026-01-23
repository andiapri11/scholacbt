<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

$jenjang = $setting->jenjang;
?>

<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-user-clock mr-2"></i>Atur Ruang & Sesi Siswa
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <a type="button" href="<?= base_url('cbtsesisiswa?kls=' . $kelas_selected) ?>" class="btn btn-sm btn-white px-3 rounded-pill shadow-sm border-0 font-weight-bold">
                        <i class="fas fa-sync-alt mr-2"></i> Reload
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="row align-items-center">
                    <div class="col-md-3">
                         <label class="small font-weight-bold text-muted uppercase mb-1">Pilih Kelas</label>
                         <?php
                            $kelass = ['0' => 'Pilih kelas'] + $kelas;
                            echo form_dropdown(
                                'kelas',
                                $kelass,
                                $kelas_selected,
                                'id="dropdown-kelas" class="select2 form-control shadow-none border-gray-light"'
                            ); ?>
                    </div>
                    <?php if (count($siswas) > 0) : ?>
                    <div class="col-md-9 mt-3 mt-md-0 pl-md-4" style="border-left: 1px solid #e2e8f0;">
                        <?php
                            $ruangs = ['0' => 'Pilih ruang'] + $ruang;
                            $sesis = ['0' => 'Pilih sesi'] + $sesi;
                        ?>
                        <label class="small font-weight-bold text-muted uppercase mb-2 d-block">
                            <i class="fas fa-cogs mr-1 text-primary"></i> Pengaturan Massal
                            <button id="undo" class="btn btn-xs btn-outline-secondary rounded-pill float-right font-weight-bold" title="Undo perubahan massal">
                                <i class="fas fa-undo mr-1"></i> Undo
                            </button>
                        </label>
                        <div class="row">
                            <div class="col-md-6 mb-2 mb-md-0">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0"><i class="fas fa-door-open text-muted"></i></span>
                                    </div>
                                    <?php
                                    echo form_dropdown(
                                        'g-ruang',
                                        $ruangs,
                                        null,
                                        'id="g-ruang" class="form-control border-left-0 shadow-none" style="background: #f8fafc"'
                                    ); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0"><i class="fas fa-clock text-muted"></i></span>
                                    </div>
                                    <?php
                                    echo form_dropdown(
                                        'g-sesi',
                                        $sesis,
                                        null,
                                        'id="g-sesi" class="form-control border-left-0 shadow-none" style="background: #f8fafc"'
                                    ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-body p-4">
                <?php if (count($siswas) > 0) : ?>
                    <div id="atur-by-siswa">
                        <?= form_open('cbtsesisiswa/editsesisiswa', array('id' => 'editsesisiswa')) ?>
                        <div class="table-responsive">
                            <table id="sesi-siswa" class="table-modern-list w-100">
                                <thead>
                                <tr>
                                    <th width="50" class="text-center">NO.</th>
                                    <th>NAMA SISWA</th>
                                    <th class="text-center">KELAS</th>
                                    <th class="text-center" width="250">RUANG UJIAN</th>
                                    <th class="text-center" width="250">SESI UJIAN</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                foreach ($siswas as $siswa) :
                                    $ruangId = isset($siswa->id_ruang) && $siswa->id_ruang != null ? $siswa->id_ruang : '0';
                                    $sesiId = isset($siswa->id_sesi) && $siswa->id_sesi != null ? $siswa->id_sesi : '0';
                                    ?>
                                    <tr>
                                        <td class="text-center font-weight-bold text-muted"><?= $num ?></td>
                                        <td>
                                            <div class="font-weight-bold text-dark"><?= $siswa->nama ?></div>
                                            <small class="text-muted"><i class="fas fa-id-card mr-1"></i><?= $siswa->nis ?></small>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-soft-primary px-3 py-2 rounded-pill"><?= $siswa->nama_kelas ?></span>
                                        </td>
                                        <td class="p-2">
                                            <?php
                                            echo form_dropdown(
                                                'ruang-sesi[' . $siswa->id_siswa . '][' . $kelas_selected . '][ruang]',
                                                $ruangs,
                                                $ruangId,
                                                'data-ruangid="' . $siswa->id_siswa . '" class="ruangsiswa form-control form-control-sm border-0 bg-light shadow-sm" style="border-radius: 8px;"'
                                            ); ?>
                                        </td>
                                        <td class="p-2">
                                            <?php
                                            echo form_dropdown(
                                                'ruang-sesi[' . $siswa->id_siswa . '][' . $kelas_selected . '][sesi]',
                                                $sesis,
                                                $sesiId,
                                                'data-sesiid="' . $siswa->id_siswa . '" class="sesisiswa form-control form-control-sm border-0 bg-light shadow-sm" style="border-radius: 8px;"'
                                            ); ?>
                                        </td>
                                    </tr>
                                    <?php $num++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right mt-4 pt-3 border-top">
                            <button type="submit" class="btn btn-primary rounded-pill px-5 shadow font-weight-bold">
                                <i class="fas fa-save mr-2"></i> Simpan Perubahan
                            </button>
                        </div>
                        <?= form_close() ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <?php if($kelas_selected == '0'): ?>
                            <i class="fas fa-chalkboard-teacher fa-3x text-muted opacity-50 mb-3"></i>
                            <h6 class="text-muted font-weight-bold">Pilih Kelas Terlebih Dahulu</h6>
                            <p class="text-muted small">Silakan pilih kelas pada menu dropdown di atas untuk menampilkan data siswa.</p>
                        <?php else: ?>
                            <i class="fas fa-user-slash fa-3x text-muted opacity-50 mb-3"></i>
                            <h6 class="text-muted font-weight-bold">Tidak Ada Data Siswa</h6>
                            <p class="text-muted small">Belum ada siswa yang terdaftar di kelas ini.</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="overlay d-none" id="loading">
                <div class="spinner-border text-primary" role="status"></div>
            </div>
        </div>
    </section>
</div>

<style>
    .card-modern { border-radius: 16px; }
    .btn-white { background: white; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }
    .btn-white:hover { background: #f8fafc; border-color: #cbd5e1; transform: scale(1.05); }
    
    .table-modern-list { border-collapse: separate !important; border-spacing: 0 8px !important; }
    .table-modern-list thead th {
        border: none;
        color: #94a3b8;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        padding: 0 16px 10px 16px;
    }
    .table-modern-list tbody tr {
        background: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        transition: all 0.2s;
        border-radius: 10px;
    }
    .table-modern-list tbody tr:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .table-modern-list tbody td { border: none; padding: 12px 16px; vertical-align: middle; }
    .table-modern-list tbody td:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px; }
    .table-modern-list tbody td:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px; }
    
    .badge-soft-primary { background-color: rgba(59, 130, 246, 0.1); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.2); }
    .border-gray-light { border-color: #e2e8f0 !important; }
</style>

<script>
    let tp_id = '<?= $tp_active->id_tp ?>';
    let smt_id = '<?= $smt_active->id_smt ?>';
    var kelas_id = '<?=$kelas_selected?>';
    var jsonRuang = [];
    var jsonSesi = [];

    $(document).ready(function () {
        ajaxcsrf();
        var opsiKelas = $('#dropdown-kelas');
        var opsiGruang = $('#g-ruang');
        var opsiGsesi = $('#g-sesi');

        opsiKelas.select2();
        opsiGruang.select2();
        opsiGsesi.select2();
        opsiKelas.on('change', function (e) {
            var id = $(this).val();
            console.log(id);
            if (id != kelas_id) {
                $('#loading').removeClass('d-none');
                window.location.href = base_url + 'cbtsesisiswa?kls=' + id;
            }
        });

        opsiGruang.on('change', function () {
            const $ruangSelect = $('.ruangsiswa');
            if (jsonRuang.length === 0) {
                $ruangSelect.each((i, row) => {
                    let item = {};
                    item ["id"] = $(row).data('ruangid');
                    item ["val"] = $(row).val();
                    jsonRuang.push(item);
                });
            }
            $ruangSelect.val($(this).val());
        });

        opsiGsesi.on('change', function () {
            const $sesiSelect = $('.sesisiswa');
            if (jsonSesi.length === 0) {
                $sesiSelect.each((i, row) => {
                    let item = {};
                    item ["id"] = $(row).data('sesiid');
                    item ["val"] = $(row).val();
                    jsonSesi.push(item);
                });
            }
            $sesiSelect.val($(this).val());
        });

        $('#undo').on('click', function () {
            if (jsonRuang.length > 0) {
                $.each(jsonRuang, function (i, v) {
                    $('select[data-ruangid="' + v.id + '"]').val(v.val);
                });
            }

            if (jsonSesi.length > 0) {
                $.each(jsonSesi, function (i, v) {
                    $('select[data-sesiid="' + v.id + '"]').val(v.val);
                });
            }
        });

        $("#editsesisiswa").on("submit", function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('#loading').removeClass('d-none');
            console.log($(this).serialize());

            $.ajax({
                url: base_url + "cbtsesisiswa/editsesisiswa",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    $('#loading').addClass('d-none');
                    console.log("response:", data);
                    if (data.status) {
                        window.location.href = base_url + 'cbtsesisiswa?kls=' + kelas_id;
                        //showSuccessToast('Data berhasil disimpan')
                    } else {
                        showDangerToast('gagal disimpan')
                    }
                }, error: function (xhr, status, error) {
                    $('#loading').addClass('d-none');
                    console.log("response:", xhr.responseText);
                    showDangerToast('gagal disimpan')
                }
            });
        });
    });
</script>

