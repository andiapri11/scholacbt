<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row pt-4 px-4 pb-5">
                <div class="col-sm-8">
                    <div class="d-flex align-items-center mb-1">
                        <div class="btn btn-sm btn-white-translucent disabled rounded-pill mr-2">
                            <i class="fas fa-edit text-white"></i>
                        </div>
                        <h1 class="text-white font-weight-bold mb-0" style="letter-spacing: -0.5px;"><?= $judul ?></h1>
                    </div>
                    <p class="text-white-50 small mb-0 uppercase tracking-wider font-weight-bold">
                        Input Nilai Manual & Koreksi Essai
                    </p>
                </div>
                <div class="col-sm-4 text-right">
                    <button onclick="window.history.back();" type="button" class="btn btn-white-translucent btn-sm rounded-pill px-3 shadow-sm border-0">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg mb-4">
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="alert alert-soft-info border-0 shadow-sm d-flex align-items-start">
                                <div class="bg-info text-white rounded-circle p-2 mr-3 mt-1" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-info-circle small"></i>
                                </div>
                                <div class="small">
                                    <p class="mb-1 font-weight-bold">Petunjuk Penggunaan:</p>
                                    <ul class="mb-0 pl-3">
                                        <li>Halaman ini digunakan jika ingin menginput nilai tanpa koreksi manual per soal.</li>
                                        <li>Jika hasil siswa sudah dikoreksi dan diberi nilai, maka nilai di halaman ini akan mengganti nilai hasil koreksi tersebut.</li>
                                        <li>Nilai 0 di halaman ini tidak akan mengganti nilai hasil koreksi yang sudah ada.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Informasi Ujian & Soal</label>
                            <div class="bg-light rounded p-4 border">
                                <div class="row">
                                    <div class="col-md-6 border-right">
                                        <table class="table table-sm table-borderless mb-0">
                                            <tr>
                                                <td class="text-muted" style="width: 140px">Jenis Penilaian</td>
                                                <td class="font-weight-bold text-dark">: <?= $jadwal->nama_jenis ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">Mata Pelajaran</td>
                                                <td class="font-weight-bold text-primary">: <?= $jadwal->nama_mapel ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">Kelas</td>
                                                <td class="font-weight-bold text-dark">: <?= $nama_kelas ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">Pengampu</td>
                                                <td class="font-weight-bold text-dark">: <?= $jadwal->nama_guru ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6 pl-md-4">
                                        <div class="row text-center">
                                            <?php if ($jadwal->tampil_pg != '0') : ?>
                                                <div class="col">
                                                    <p class="small text-muted mb-1">PG</p>
                                                    <h3 class="font-weight-bold mb-0"><?= $jadwal->tampil_pg ?></h3>
                                                </div>
                                            <?php endif;
                                            if ($jadwal->tampil_kompleks != '0') :?>
                                                <div class="col">
                                                    <p class="small text-muted mb-1">PGK</p>
                                                    <h3 class="font-weight-bold mb-0 text-primary"><?= $jadwal->tampil_kompleks ?></h3>
                                                </div>
                                            <?php endif;
                                            if ($jadwal->tampil_jodohkan != '0') :?>
                                                <div class="col">
                                                    <p class="small text-muted mb-1">JOD</p>
                                                    <h3 class="font-weight-bold mb-0 text-info"><?= $jadwal->tampil_jodohkan ?></h3>
                                                </div>
                                            <?php endif;
                                            if ($jadwal->tampil_isian != '0') :?>
                                                <div class="col">
                                                    <p class="small text-muted mb-1">IS</p>
                                                    <h3 class="font-weight-bold mb-0 text-warning"><?= $jadwal->tampil_isian ?></h3>
                                                </div>
                                            <?php endif;
                                            if ($jadwal->tampil_esai != '0') :?>
                                                <div class="col">
                                                    <p class="small text-muted mb-1">ES</p>
                                                    <h3 class="font-weight-bold mb-0 text-danger"><?= $jadwal->tampil_esai ?></h3>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-modern border-0 shadow-lg mb-4">
                <div class="card-body p-0">
                    <div class="px-4 py-3 border-bottom d-flex align-items-center justify-content-between">
                        <h6 class="mb-0 font-weight-bold text-dark">Daftar Nilai Siswa</h6>
                        <button id="essai_top" class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm" onclick="simpan(this)">
                            <i class="fas fa-save mr-1"></i> Simpan Nilai
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-modern-list mb-0" id="table-essai">
                        <thead>
                        <tr class="bg-light">
                            <th class="text-center align-middle" style="width: 50px">No.</th>
                            <th class="text-center align-middle" style="width: 150px">No. Peserta</th>
                            <th class="align-middle">Nama Siswa</th>
                            <?php if ($jadwal->tampil_pg != '0') : ?>
                                <th class="text-center align-middle">
                                    PG<br>
                                    <small class="text-muted">Max: <?= $jadwal->bobot_pg ?></small>
                                </th>
                            <?php endif;
                            if ($jadwal->tampil_kompleks != '0') :?>
                                <th class="text-center align-middle" style="width: 120px">
                                    PGK<br>
                                    <small class="text-muted">Max: <?= $jadwal->bobot_kompleks ?></small>
                                </th>
                            <?php endif;
                            if ($jadwal->tampil_jodohkan != '0') :?>
                                <th class="text-center align-middle" style="width: 120px">
                                    JOD<br>
                                    <small class="text-muted">Max: <?= $jadwal->bobot_jodohkan ?></small>
                                </th>
                            <?php endif;
                            if ($jadwal->tampil_isian != '0') :?>
                                <th class="text-center align-middle" style="width: 120px">
                                    IS<br>
                                    <small class="text-muted">Max: <?= $jadwal->bobot_isian ?></small>
                                </th>
                            <?php endif;
                            if ($jadwal->tampil_esai != '0') :?>
                                <th class="text-center align-middle" style="width: 120px">
                                    ES<br>
                                    <small class="text-muted">Max: <?= $jadwal->bobot_esai ?></small>
                                </th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswas as $siswa) :
                            $idSiswa = $siswa->id_siswa;
                            ?>
                            <tr class="nilai" data-idsiswa="<?= $idSiswa ?>">
                                <td class="text-center align-middle"><?= $no ?></td>
                                <td class="text-center align-middle">
                                    <span class="badge badge-light border px-2 py-1"><?= $siswa->nomor_peserta ?></span>
                                </td>
                                <td class="align-middle font-weight-bold text-dark"><?= $siswa->nama ?></td>
                                <?php if ($jadwal->tampil_pg != '0') : ?>
                                    <td class="text-center align-middle font-weight-bold text-success">
                                        <?= $siswa->skor_pg ?>
                                    </td>
                                <?php endif;
                                if ($jadwal->tampil_kompleks != '0') :?>
                                    <td class="text-center align-middle">
                                        <input class="form-control form-control-sm text-center npg2 rounded-pill" name="input-pg2"
                                               value="<?= $siswa->skor_pg2 ?>"
                                               type="number" min="0"
                                               max="<?= $jadwal->bobot_kompleks ?>"
                                               step="0.1"/>
                                    </td>
                                <?php endif;
                                if ($jadwal->tampil_jodohkan != '0') :?>
                                    <td class="text-center align-middle">
                                        <input class="form-control form-control-sm text-center njodohkan rounded-pill" name="input-jodohkan"
                                               value="<?= $siswa->skor_jod ?>"
                                               type="number" min="0"
                                               max="<?= $jadwal->bobot_jodohkan ?>"
                                               step="0.1"/>
                                    </td>
                                <?php endif;
                                if ($jadwal->tampil_isian != '0') :?>
                                    <td class="text-center align-middle">
                                        <input class="form-control form-control-sm text-center nisian rounded-pill" name="input-isian"
                                               value="<?= $siswa->skor_isian ?>"
                                               type="number" min="0"
                                               max="<?= $jadwal->bobot_isian ?>"
                                               step="0.1"/>
                                    </td>
                                <?php endif;
                                if ($jadwal->tampil_esai != '0') :?>
                                    <td class="text-center align-middle">
                                        <input class="form-control form-control-sm text-center nessai rounded-pill" name="input-essai"
                                               value="<?= $siswa->skor_essai ?>"
                                               type="number" min="0"
                                               max="<?= $jadwal->bobot_esai ?>"
                                               step="0.1"/>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white p-4 text-right">
                    <button id="essai" class="btn btn-primary rounded-pill px-5 shadow-sm" onclick="simpan(this)">
                        <i class="fas fa-save mr-2"></i> Simpan Semua Nilai
                    </button>
                </div>
                <div class="overlay-modern d-none rounded" id="loading">
                    <div class="loader-modern"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('update', array('id' => 'koreksi')) ?>
<?= form_close() ?>

<script>
    function simpan(btn) {
        //var id = $(btn).attr('id');
        var loading = $(`#loading`);

        var maxpg2 = <?= $jadwal->bobot_kompleks ?>;
        var maxjod = <?= $jadwal->bobot_jodohkan ?>;
        var maxis = <?= $jadwal->bobot_isian ?>;
        var maxes = <?= $jadwal->bobot_esai ?>;

        var $nilai = $(`#table-essai`).find('.nilai');
        var json = [];
        $.each($nilai, function () {
            var npg2 = $(this).find('.npg2').val();
            var njod = $(this).find('.njodohkan').val();
            var nis = $(this).find('.nisian').val();
            var nes = $(this).find('.nessai').val();
            if (npg2 > maxpg2 || njod > maxjod || nis > maxis || nes > maxes) {
                showDangerToast("Point persoal harus kurang dari nilai max.");
                json = [];
                return false;
            }

            var item = {};
            item['id_nilai'] = $(this).data('idsiswa') + '<?= $jadwal->id_jadwal ?>';
            item['id_siswa'] = $(this).data('idsiswa');
            item['id_jadwal'] = '<?= $jadwal->id_jadwal ?>';
            item['kompleks_nilai'] = npg2;
            item['jodohkan_nilai'] = njod;
            item['isian_nilai'] = nis;
            item['essai_nilai'] = nes;
            json.push(item);
        });

        var dataPost = $('#koreksi').serialize() + '&jadwal=<?=$jadwal->id_jadwal?>&nilai=' + JSON.stringify(json);
        console.log(dataPost);

        if (json.length > 0) {
            loading.removeClass('d-none');
            swal.fire({
                title: "Menyimpan Nilai",
                text: "Silahkan tunggu....",
                showConfirmButton: false,
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    swal.showLoading();
                }
            });
            $.ajax({
                url: base_url + "cbtnilai/simpankoreksiessai",
                type: "POST",
                data: dataPost,
                success: function (data) {
                    console.log(data);
                    if (data.success > 0) {
                        swal.fire({
                            title: "Berhasil",
                            text: "Nilai berhasil disimpan",
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
                    var msg = "Terjadi kesalahan saat menyimpan data";
                    try {
                        const err = JSON.parse(xhr.responseText);
                        msg = err.Message || msg;
                    } catch(e) {}
                    swal.fire({
                        title: "Error",
                        text: msg,
                        icon: "error"
                    });
                }
            });
        }
    }

    $(document).ready(function () {
    });
</script>

<style>
    .header-blue {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    }
    .card-modern {
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05) !important;
    }
    .btn-white-translucent {
        background-color: rgba(255, 255, 255, 0.2);
        border: none;
        backdrop-filter: blur(4px);
        color: white;
    }
    .btn-white-translucent:hover { color: #f8fafc; background-color: rgba(255, 255, 255, 0.3); }
    .uppercase { text-transform: uppercase; }
    .tracking-wider { letter-spacing: 0.05em; }
    
    .alert-soft-info {
        background-color: #e0f2fe;
        color: #0369a1;
        border-left: 4px solid #0ea5e9;
    }
    
    .table-modern-list {
        border-collapse: separate;
        border-spacing: 0;
    }
    .table-modern-list thead th {
        border: none;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        color: #64748b;
        padding: 1.25rem 1rem;
    }
    .table-modern-list tbody tr {
        transition: all 0.2s;
    }
    .table-modern-list tbody tr:hover {
        background-color: #f8fafc;
        transform: translateY(-1px);
    }
    .table-modern-list tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-top: 1px solid #f1f5f9;
    }
</style>

