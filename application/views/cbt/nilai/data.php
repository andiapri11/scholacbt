<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

/*
NY = Nilai Hasil Konversi

XA = Nilai Terbesar Asli (Dari Daftar Nilai)
XB = Nilai Terkecil Asli (Dari Daftar Nilai
YA = Nilai Terbesar Konversi (Yang Kita Inginkan)
YB = Nilai Terkecil Konversi (Yang Kita Inginkan)

NX = Nilai yang Ingin Dikonversi (Nilai Rujukan)

((YA-YB)/(XA-XB))*(NX-XB)+YB
 */

$XA = isset($convert) ? $convert['xa'] : 0; // nilai terbesar
$XB = isset($convert) ? $convert['xb'] : 20;  // nilai terkecil
$YA = isset($convert) ? $convert['ya'] : 100; // hasil terbesar
$YB = isset($convert) ? $convert['yb'] : 60;  // hasil terkecil

$colWidth = '';

$cols_name = ["PG", "PK", "JOD", "IS", "ES"];
?>

<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row pt-4 px-4 pb-5">
                <div class="col-sm-8">
                    <div class="d-flex align-items-center mb-1">
                        <div class="btn btn-sm btn-white-translucent disabled rounded-pill mr-2">
                            <i class="fas fa-chart-line text-white"></i>
                        </div>
                        <h1 class="text-white font-weight-bold mb-0" style="letter-spacing: -0.5px;"><?= $judul ?></h1>
                    </div>
                    <p class="text-white-50 small mb-0 uppercase tracking-wider font-weight-bold">
                        <?= $subjudul ?>
                    </p>
                </div>
                <div class="col-sm-4 text-right">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" id="import-essai" class="btn btn-white-translucent btn-sm rounded-pill px-3 shadow-sm border-0 mr-2 <?= $kelas_selected == null ? 'disabled' : '' ?>" <?= $kelas_selected == null ? 'disabled' : '' ?>>
                            <i class="fas fa-edit mr-1"></i> Input Nilai
                        </button>
                        <button type="button" id="mark-all" class="btn btn-success btn-sm rounded-pill px-3 shadow-lg font-weight-bold border-0 <?= $kelas_selected == null ? 'disabled' : '' ?>" <?= $kelas_selected == null ? 'disabled' : '' ?>>
                            <i class="fas fa-check-double mr-1"></i> Tandai Semua
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-end">
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Pilih Kelas</label>
                            <?php echo form_dropdown('kelas', $kelas, $kelas_selected, 'id="kelas" class="form-control select2"'); ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Pilih Jadwal</label>
                            <?php echo form_dropdown('jadwal', $jadwal, $jadwal_selected, 'id="jadwal" class="form-control select2"'); ?>
                        </div>
                        <div class="col-md-4 mb-3 text-right">
                             <div class="d-flex align-items-center justify-content-end <?= $kelas_selected == null ? 'd-none' : '' ?>" id="group-export">
                                <?php if (isset($convert)) : ?>
                                    <button type="button" id="rollback" class="btn btn-warning rounded-pill px-3 btn-sm font-weight-bold mr-2 shadow-sm">
                                        <i class="fa fa-undo mr-1"></i> Nilai Asli
                                    </button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-danger rounded-pill px-3 btn-sm font-weight-bold mr-2 shadow-sm" data-toggle="modal" data-target="#perbaikanModal">
                                        <i class="fa fa-balance-scale-right mr-1"></i> Katrol
                                    </button>
                                <?php endif; ?>
                                
                                <button type="button" id="download-excel" class="btn btn-success rounded-pill px-3 btn-sm font-weight-bold shadow-sm">
                                    <i class="fa fa-file-excel mr-1"></i> Ekspor Excel
                                </button>
                                
                                <div class="custom-control custom-checkbox ml-3">
                                    <input class="custom-control-input" id="nilai-detail" type="checkbox" checked>
                                    <label for="nilai-detail" class="custom-control-label small font-weight-bold text-muted uppercase tracking-wider">Detail</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    <?php
                    $nilaiTertinggi = 0;
                    $nilaiTerrendah = -1;
                    if (count($siswas) > 0) :
                        $cols = [$info->tampil_pg, $info->tampil_kompleks, $info->tampil_jodohkan, $info->tampil_isian, $info->tampil_esai];
                        $cols = array_filter($cols);
                        $rows = count($cols) > 1 ? 1 : 2;

                        $colWidth = '5,15,35,15,10,10,10';
                        for ($s = 0; $s < $info->tampil_pg; $s++) {
                            $colWidth .= ',4';
                        }
                        $colWidth .= ',10,10,10';

                        $totalSoal = $info->tampil_pg + $info->tampil_kompleks + $info->tampil_jodohkan + $info->tampil_isian + $info->tampil_esai;
                        ?>
                        <div class="d-none" id="info">
                            <div id="info-ujian"></div>
                        </div>
                        <div <?= $dnone ?>>
                            <?= form_open('', array('id' => 'koreksi-semua')) ?>
                            <table class="table table-sm table-modern-list" id="table-status" data-cols-width="<?= $colWidth ?>">
                                <thead class="header-blue text-white">
                                <tr>
                                    <th rowspan="2" class="text-center align-middle" width="40"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">
                                        No.
                                    </th>
                                    <th rowspan="2" class="text-center align-middle" width="100"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">
                                        No. Peserta
                                    </th>
                                    <th rowspan="2" class="text-center align-middle" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                        Nama
                                    </th>
                                    <th rowspan="2" class="text-center align-middle"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Sesi
                                    </th>
                                    <th rowspan="2" class="text-center align-middle"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Ruang
                                    </th>
                                    <th rowspan="2" class="text-center align-middle"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Mulai
                                    </th>
                                    <th rowspan="2" class="text-center align-middle"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Durasi
                                    </th>
                                    <?php if ($info->tampil_pg > 0) : ?>
                                        <th id="no-soal-tile" colspan="<?= $info->tampil_pg ?>"
                                            class="text-center align-middle d-none" data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                            Nomor Soal PG
                                        </th>
                                        <th colspan="2" class="text-center align-middle"
                                            data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                            PG
                                        </th>
                                    <?php endif; ?>

                                    <th colspan="<?= count($cols) ?>" rowspan="<?= $rows ?>"
                                        class="text-center align-middle"
                                        data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                        Skor <?= count($cols) > 1 ? "" : $cols_name[array_key_first($cols)] ?>
                                    </th>
                                    <th colspan="2" class="text-center align-middle" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                        Nilai
                                    </th>
                                    <th rowspan="2" class="text-center align-middle" data-exclude="true"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">
                                        Aksi
                                    </th>
                                </tr>
                                <tr>
                                    <?php for ($js = 0; $js < $info->tampil_pg; $js++) : ?>
                                        <th class="no-soal text-center align-middle p-1 d-none"
                                            data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                            <?= $js + 1 ?>
                                        </th>
                                    <?php endfor; ?>
                                    <?php if ($info->tampil_pg > 0) : ?>
                                        <th class="text-center align-middle" data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                            B
                                        </th>
                                        <th class="text-center align-middle"
                                            data-fill-color="b8daff" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            data-f-bold="true">S
                                        </th>
                                    <?php endif; ?>
                                    <?php
                                    if ($rows == 1) :
                                        if ($info->tampil_pg > 0) : ?>
                                            <th class="text-center align-middle p-1" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                                PG
                                            </th>
                                        <?php endif;
                                        if ($info->tampil_kompleks > 0) :?>
                                            <th class="text-center align-middle" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                                PK
                                            </th>
                                        <?php endif;
                                        if ($info->tampil_jodohkan > 0) :?>
                                            <th class="text-center align-middle" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                                JO
                                            </th>
                                        <?php endif;
                                        if ($info->tampil_isian > 0) :?>
                                            <th class="text-center align-middle" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                                IS
                                            </th>
                                        <?php endif;
                                        if ($info->tampil_esai > 0) :?>
                                            <th class="text-center align-middle" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                                ES
                                            </th>
                                        <?php endif;
                                    endif;
                                    ?>
                                    <th class="text-center align-middle" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                        Asli
                                    </th>
                                    <th class="text-center align-middle" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true">
                                        Katrol
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $no = 1;
                                foreach ($siswas as $siswa) :
                                    $idSiswa = $siswa->id_siswa;
                                    $disable = strpos($siswa->mulai_ujian, '-') !== false;
                                    $disabled = $disable ? 'disabled' : '';
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"> <?= $no ?> </td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"> <?= $siswa->nomor_peserta ?> </td>
                                        <td class="align-middle" data-a-v="middle" data-b-a-s="thin"
                                            style="padding: 2px 6px"> <?= $siswa->nama ?> </td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $siswa->kode_sesi ?></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $siswa->kode_ruang ?></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $siswa->mulai_ujian ?></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $siswa->lama_ujian ?></td>
                                        <?php
                                        $benar_pg = 0;
                                        $salah_pg = 0;
                                        foreach ($siswa->jawaban_pg as $num => $jwb) :
                                            if ($jwb['benar']) {
                                                $bg = 'data-fill-color="00E676"';
                                                $benar_pg++;
                                            } else {
                                                $bg = 'data-fill-color="FF7043"';
                                                $salah_pg++;
                                            }
                                            //if ($jwb['jawaban'] != '') {
                                            //}
                                            if (round($siswa->skor_total, 2) > $nilaiTertinggi) {
                                                $nilaiTertinggi = round($siswa->skor_total, 2);
                                            }
                                            if (round($siswa->skor_total, 2) > 0 && $siswa->skor_total < $nilaiTerrendah) {
                                                $nilaiTerrendah = round($siswa->skor_total, 2);
                                            }
                                            ?>
                                            <td class="no-soal-siswa d-none" <?= $bg ?> data-a-v="middle"
                                                data-a-h="center"
                                                data-b-a-s="thin"
                                                style="text-align: center;"><?= $jwb['jawaban'] ?></td>
                                        <?php endforeach; ?>

                                        <?php if ($info->tampil_pg > 0) : ?>
                                            <td class="text-success" data-a-v="middle" data-a-h="center"
                                                data-b-a-s="thin"
                                                style="text-align: center;">
                                                <b><?= $disable ? '' : $benar_pg ?></b></td>
                                            <td class="text-danger" data-a-v="middle" data-a-h="center"
                                                data-b-a-s="thin"
                                                style="text-align: center;">
                                                <b><?= $disable ? '' : $salah_pg ?></b></td>

                                            <td class="text-center text-info align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_pg ?> </b></td>
                                        <?php endif;
                                        if ($info->tampil_kompleks > 0) : ?>
                                            <td class="text-center text-success align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_kompleks ?> </b></td>
                                        <?php endif;
                                        if ($info->tampil_jodohkan > 0) : ?>
                                            <td class="text-center text-success align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_jodohkan ?> </b></td>
                                        <?php endif;
                                        if ($info->tampil_isian > 0) : ?>
                                            <td class="text-center text-success align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_isian ?> </b></td>
                                        <?php endif;
                                        if ($info->tampil_esai > 0) : ?>
                                            <td class="text-center text-success align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_essai ?> </b></td>
                                        <?php endif; ?>

                                        <td class="text-center align-middle font-weight-bold" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin">
                                            <?= $disable ? '' : round($siswa->skor_total, 2) ?> </td>
                                        <td class="text-center align-middle font-weight-bold text-primary" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin">
                                            <?= $disable ? '' : ($siswa->skor_katrol == '' ? '' : round($siswa->skor_katrol, 2)) ?>
                                        </td>
                                        <td class="text-center align-middle" data-exclude="true" data-a-v="middle"
                                            data-a-h="center" data-b-a-s="thin">
                                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 shadow-sm <?= $disabled ?>"
                                                    onclick="lihatJawaban(<?= $siswa->id_siswa ?>)"
                                                    data-toggle="tooltip" title="Detail Jawaban Siswa" <?= $disabled ?>>
                                                <i class="fas fa-edit mr-1"></i> Koreksi
                                            </button>
                                            <div class="mt-2">
                                                <?php if (isset($siswa->dikoreksi) && $siswa->dikoreksi === '1') : ?>
                                                    <span class="badge badge-soft-success rounded-pill px-2">
                                                        <i class="fa fa-check-circle mr-1"></i> Selesai
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-soft-warning rounded-pill px-2">
                                                        <i class="fa fa-clock mr-1"></i> Belum
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <input type="hidden" name="ids[<?= $idSiswa ?>]"
                                                   value="<?= $disabled ? '2' : (isset($siswa->dikoreksi) && $siswa->dikoreksi ? '1' : '0') ?>">
                                        </td>
                                    </tr>

                                    <?php $no++; endforeach; ?>
                            </table>
                            <?= form_close() ?>
                        </div>
                    <?php endif; ?>
                    <!--
                    <div>
                        <table class="table-sm">
                            <tr>
                                <td>Katrol tertinggi</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>Katrol terrendah</td>
                                <td>60</td>
                            </tr>
                            <tr>
                                <td>Nilai tertinggi</td>
                                <td id="ntinggi"><?= $nilaiTertinggi ?></td>
                            </tr>
                            <tr>
                                <td>Nilai terendah</td>
                                <td id="nrendah">2</td>
                            </tr>
                        </table>
                    </div>
                    -->
                </div>
                <div class="overlay-modern d-none" id="loading">
                    <div class="loader-modern"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('update', array('id' => 'perbaikan-nilai')) ?>
<div class="modal fade" id="perbaikanModal" tabindex="-1" role="dialog" aria-labelledby="perbaikanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header header-blue text-white" style="border-radius: 16px 16px 0 0;">
                <h5 class="modal-title font-weight-bold" id="perbaikanModalLabel">
                    <i class="fas fa-balance-scale-right mr-2"></i>Perbaikan Nilai (Katrol)
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-light-soft border mb-4">
                    <p class="small mb-0">Fitur ini digunakan untuk menyesuaikan rentang nilai siswa secara linear (metode katrol).</p>
                </div>
                <div class="form-group mb-4">
                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nilai Tertinggi Diinginkan</label>
                    <input type="number" class="form-control form-control-lg rounded-lg" name="ya" value="<?= $YA ?>" placeholder="Misal: 100" required>
                    <small class="text-muted">Nilai tertinggi yang akan didapatkan siswa.</small>
                </div>
                <div class="form-group mb-4">
                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nilai Terrendah Diinginkan</label>
                    <input type="number" class="form-control form-control-lg rounded-lg" name="yb" value="<?= $YB ?>" placeholder="Misal: 60" required>
                    <small class="text-muted">Nilai terrendah yang akan didapatkan siswa.</small>
                </div>
            </div>
            <div class="modal-footer bg-light" style="border-radius: 0 0 16px 16px;">
                <button type="button" class="btn btn-light rounded-pill px-4 font-weight-bold" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-primary rounded-pill px-4 font-weight-bold shadow" id="convert">
                    SINKRONKAN NILAI <i class="fas fa-sync-alt ml-1 text-xs"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>

<script>
    var colWidthMin = '5,15,35,15,10,10,10,10,10,10';
    var colWidth = '<?= $colWidth ?>';

    var idJadwal = '<?=$jadwal_selected?>';
    var idKelas = '<?=$kelas_selected?>';
    const arrSiswa = <?= json_encode($siswas) ?>;
    var isSelected = <?= count($siswas) > 0 ? 1 : 0?>;
    var namaMapel = '<?=isset($info) ? $info->kode : ''?>';
    var jenisUjian = '<?=isset($info) ? $info->kode_jenis : ''?>';

    var nilai_max = <?=$XA?>;//nilai siswa terbesar
    var nilai_min = <?=$XB?>;//nilai siswa terkecil
    var hasil_max = <?=$YA?>;//batas nilai terbesar
    var hasil_min = <?=$YB?>;//batas nilai terkecil

    function lihatJawaban(idSiswa) {
        //console.log("cbtnilai/getnilaisiswa?siswa=" + idSiswa + '&jadwal=' + idJadwal);
        window.location.href = base_url + 'cbtnilai/detail?siswa=' + idSiswa + '&jadwal=' + idJadwal;
    }

    function getDetailJadwal(idJadwal) {
        $.ajax({
            type: "GET",
            url: base_url + "cbtstatus/getjadwalujianbyjadwal?id_jadwal=" + idJadwal,
            cache: false,
            success: function (response) {
                console.log(response);
                var selKelas = $('#kelas');
                selKelas.html('');
                selKelas.append('<option value="">Pilih Kelas</option>');
                $.each(response, function (k, v) {
                    if (v != null) {
                        selKelas.append('<option value="' + k + '">' + v + '</option>');
                    }
                });
            }
        });
    }

    function getKelasJadwal(idKelas) {
        $.ajax({
            type: "GET",
            url: base_url + "cbtstatus/getjadwalujianbykelas?id_kelas=" + idKelas,
            cache: false,
            success: function (response) {
                console.log(response);

                var selJadwal = $('#jadwal');
                selJadwal.html('');
                selJadwal.append('<option value="">Pilih Jadwal</option>');
                $.each(response, function (k, v) {
                    if (v != null) {
                        selJadwal.append('<option value="' + k + '">' + v + '</option>');
                    }
                });
                const enb = isSelected && $("#jadwal").val() === "<?= $jadwal_selected ?>"
                $('#import-essai').attr('disabled', !enb);
                $('#import-essai').toggleClass('btn-disabled', !enb);
            }
        });
    }

    $(document).ready(function () {
        ajaxcsrf();

        const loading = $('#loading');
        var opsiJadwal = $("#jadwal");
        var opsiKelas = $("#kelas");

        var selected = isSelected === 0 ? "selected='selected'" : "";
        opsiJadwal.prepend("<option value='' " + selected + " disabled>Pilih Jadwal</option>");
        opsiKelas.prepend("<option value='' " + selected + " disabled>Pilih Kelas</option>");
        $('#import-essai').attr('disabled', !isSelected);
        $('#import-essai').toggleClass('btn-disabled', !isSelected);
        $('#mark-all').attr('disabled', !isSelected);
        $('#mark-all').toggleClass('btn-disabled', !isSelected);

        function loadSiswaKelas(kelas, jadwal) {
            var empty = jadwal === null;
            //console.log(jadwal, kelas)
            if (!empty) {
                $('#loading').removeClass('d-none');
                window.location.href = base_url + 'cbtnilai?kelas=' + kelas + '&jadwal=' + jadwal;
            } else {
                console.log('empty')
            }
        }

        $('#rollback').on('click', function (e) {
            loadSiswaKelas(opsiKelas.val(), opsiJadwal.val())
        });

        opsiKelas.change(function () {
            //loadSiswaKelas($(this).val(), opsiJadwal.val())
            //console.log(opsiKelas.val(), opsiJadwal.val())
            //const dis = $(this).val() === "<?= $kelas_selected ?>" && opsiJadwal.val() === "<?= $jadwal_selected ?>"
            //$('#import-essai').attr('disabled', dis);
            //$('#import-essai').toggleClass('btn-disabled', dis);
            getKelasJadwal($(this).val());
        });

        opsiJadwal.change(function () {
            idJadwal = $(this).val();
            //getDetailJadwal(idJadwal);
            //const dis = $(this).val() === "<?= $jadwal_selected ?>" && opsiKelas === "<?= $kelas_selected ?>"
            //$('#import-essai').attr('disabled', dis);
            //$('#import-essai').toggleClass('btn-disabled', dis);
            loadSiswaKelas(opsiKelas.val(), $(this).val())
        });

        $("#download-excel").click(function (event) {
            var table = document.querySelector("#table-status");
            if (table != null) {
                //TableToExcel.convert(table);
                TableToExcel.convert(table, {
                    name: `Nilai ${jenisUjian} ${$("#kelas option:selected").text()} ${namaMapel}.xlsx`,
                    sheet: {
                        name: "Sheet 1"
                    }
                });
                /*
                table1 = document.getElementById("simpleTable1");
                table2 = document.getElementById("simpleTable2");
                book = TableToExcel.tableToBook(table1, {sheet: {name: "sheet1"}});
                TableToExcel.tableToSheet(book, table2, {sheet: {name: "sheet2"}});
                TableToExcel.save(book, "test.xlsx")
                */
            } else {
                Swal.fire({
                    title: "ERROR",
                    text: "Isi JADWAL dan KELAS terlebih dulu",
                    icon: "error"
                })
            }
        });

        loading.addClass('d-none');

        $("#nilai-detail").on("click", function () {
            if (this.checked) {
            } else {
            }
            var exluded = this.checked;
            $('#no-soal-tile').attr('data-exclude', '' + !exluded);
            $('.no-soal').attr('data-exclude', '' + !exluded);
            $('.no-soal-siswa').attr('data-exclude', '' + !exluded);

            var width = $('#table-status').attr('data-cols-width');
            $('#table-status').attr('data-cols-width', width == colWidth ? colWidthMin : colWidth)
        });

        $('#perbaikan-nilai').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var table = document.querySelector("#table-status");
            if (table != null) {
                var $inputs = $('#perbaikan-nilai :input');
                var values = {};
                $inputs.each(function () {
                    values[this.name] = $(this).val();
                });
                hasil_max = values['ya'];
                hasil_min = values['yb'];
                //console.log(hasil_max, hasil_min);
                //console.log(nilai_max, nilai_min);

                $('#perbaikanModal').modal('hide').data('bs.modal', null);
                $('#perbaikanModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });
                $('#loading').removeClass('d-none');
                window.location.href = base_url + 'cbtnilai?kelas=' + opsiKelas.val() + '&jadwal=' + opsiJadwal.val() +
                    '&xa=' + nilai_max + '&xb=' + nilai_min + '&ya=' + hasil_max + '&yb=' + hasil_min;
            } else {
                $('#perbaikanModal').modal('hide').data('bs.modal', null);
                $('#perbaikanModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });


                Swal.fire({
                    title: "ERROR",
                    text: "Isi JADWAL dan KELAS terlebih dulu",
                    icon: "error"
                })
            }
        });

        $("#import-essai").on("click", function () {
            var kls = opsiKelas.val();
            var jad = opsiJadwal.val();
            if (kls = null || jad == null) {
                return;
            }
            window.location.href = base_url + 'cbtnilai/inputessai?kelas=' + opsiKelas.val() + '&jadwal=' + opsiJadwal.val();
        });

        $('#mark-all').on('click', function () {
            let dataPost = new FormData($('#koreksi-semua')[0])
            dataPost.append('id_jadwal', idJadwal)
            //console.log('arrSiswa', dataForm)
            //var dataPost = $('#koreksi-semua').serialize() + '&id_jadwal=' + idJadwal;
            loading.removeClass('d-none');
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
                url: base_url + "cbtnilai/tandaisemua",
                type: "POST",
                data: dataPost,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    if (data.success > 0) {
                        swal.fire({
                            title: "Berhasil",
                            text: "Koreksi nilai berhasil disimpan",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        loading.addClass('d-none');
                        swal.fire({
                            title: "Gagal",
                            text: 'Tidak ada nilai yang disimpan',
                            icon: "error"
                        });
                    }
                }, error: function (xhr, status, error) {
                    loading.addClass('d-none');
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        })

        opsiKelas.select2({theme: 'bootstrap4'});
        opsiJadwal.select2({theme: 'bootstrap4'});

    })
</script>

<style>
    .btn-white-translucent {
        background-color: rgba(255, 255, 255, 0.2);
        border: none;
        backdrop-filter: blur(4px);
        color: white;
    }
    .btn-white-translucent:hover { color: #f8fafc; background-color: rgba(255, 255, 255, 0.3); }
    
    .custom-control-label::before, .custom-control-label::after {
        top: 0.15rem;
    }
    #table-status {
        font-size: 0.9rem;
    }
    .alert-light-soft {
        background-color: #f8fafc;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }
</style>


