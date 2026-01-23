<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

function sortir($a, $b)
{
    return strcmp($a->tgl_mulai, $b->tgl_mulai) * -1;
}

function my_array_unique($array, $keep_key_assoc = false)
{
    $duplicate_keys = array();
    $tmp = array();

    foreach ($array as $key => $val) {
        // convert objects to arrays, in_array() does not support objects
        if (is_object($val))
            $val = (array)$val;

        if (!in_array($val['id_jadwal'], $tmp))
            $tmp[] = $val['id_jadwal'];
        else
            $duplicate_keys[] = $key;
    }

    foreach ($duplicate_keys as $key)
        unset($array[$key]);

    return $keep_key_assoc ? $array : array_values($array);
}

?>

<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row px-3 pt-4 pb-5">
                <div class="col-sm-6">
                    <h1 class="text-white font-weight-bold text-shadow">
                        <i class="fas fa-database mr-2"></i> <?= $judul ?>
                    </h1>
                    <p class="text-white-50 small mb-0">Manajemen rekapitulasi nilai dan backup hasil ujian siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg mb-4">
                <div class="card-body p-4">
                    <div class="row" id="konten">
                        <?php
                        $rekaps = my_array_unique($rekaps);

                        if (count($rekaps) === 0) : ?>
                            <?php if (!isset($tp_active) || !isset($smt_active)) : ?>
                                <div class="col-12 px-0">
                                    <div class="alert alert-soft-warning border-0 shadow-sm d-flex align-items-center" role="alert">
                                        <i class="fas fa-exclamation-triangle mr-3 fa-2x"></i>
                                        <div>
                                            <div class="font-weight-bold">Konfigurasi Belum Lengkap</div>
                                            Tahun Pelajaran atau Semester belum di set. Silahkan periksa pengaturan aplikasi.
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-12 px-0">
                                    <div class="alert alert-soft-info border-0 shadow-sm d-flex align-items-center" role="alert">
                                        <i class="fas fa-info-circle mr-3 fa-2x"></i>
                                        <div>
                                            <div class="font-weight-bold">Data Tidak Ditemukan</div>
                                            Belum ada jadwal penilaian untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b> Semester: <b><?= $smt_active->smt ?></b>.
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                        <div class="alert alert-soft-info border-0 shadow-sm d-flex align-items-start w-100 mb-4" role="alert">
                            <i class="fas fa-info-circle mr-3 mt-1 fa-lg"></i>
                            <div>
                                <h6 class="font-weight-bold mb-1">Panduan Rekap Nilai</h6>
                                <ul class="mb-0 small pl-3">
                                    <li>Lakukan <b>REKAP NILAI</b> agar nilai hasil siswa bisa diekspor dan diolah secara offline.</li>
                                    <li>Rekap nilai berguna untuk membackup data jika jadwal atau bank soal dihapus di kemudian hari.</li>
                                    <li>Hanya jadwalkan penilaian yang <b>sudah selesai dilaksanakan</b> yang direkomendasikan untuk direkap.</li>
                                </ul>
                            </div>
                        </div>

                        <?= $this->session->flashdata('rekapnilai') ?>

                        <div class="col-12 mb-4 px-0 d-flex flex-wrap align-items-center">
                            <button id="hapusterpilih" onclick="bulk_delete()" type="button"
                                    class="btn btn-outline-danger rounded-pill px-4 font-weight-bold shadow-sm mr-2 mb-2" data-toggle="tooltip" title="Hapus Terpilh"
                                    disabled="disabled"><i class="far fa-trash-alt mr-1"></i> Hapus
                            </button>
                            <button id="rekapterpilih" onclick="bulk_rekap()" type="button"
                                    class="btn btn-outline-success rounded-pill px-4 font-weight-bold shadow-sm mr-2 mb-2" data-toggle="tooltip" title="Rekap Terpilh"
                                    disabled="disabled"><i class="fa fa-database mr-1"></i> Rekap
                            </button>
                            <a href="<?= base_url('cbtrekap/export') ?>" type="button"
                               class="btn btn-primary rounded-pill px-4 font-weight-bold shadow-sm ml-sm-auto mb-2">
                                <i class="fa fa-download mr-1"></i> Ekspor Semua
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="jadwal-bank" class="table table-modern-list w-100">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 40px">
                                    <div class="custom-control custom-checkbox">
                                        <input id="check-all" class="custom-control-input check-all" type="checkbox">
                                        <label for="check-all" class="custom-control-label"></label>
                                    </div>
                                </th>
                                <th class="text-center align-middle" style="width: 50px">No.</th>
                                <th>DETAIL BANK SOAL</th>
                                <th class="text-center">JENIS</th>
                                <th>MAPEL</th>
                                <th>KELAS</th>
                                <th>PELAKSANAAN</th>
                                <th class="text-center">AKSI NILAI</th>
                            </tr>
                            </thead>
                        <tbody>

                        <?php
                        $urut = 1;
                        foreach ($rekaps as $jadwal) : ?>
                            <?php

                            $jk = json_decode(json_encode($jadwal->bank_kelas));
                            $jumlahKelas = $jadwal->bank_kelas == "" ? [] : json_decode(json_encode(unserialize($jk ?? '')));
                            //$jks = [];

                            $kelasbank = '';
                            $no = 1;
                            $id_kelases = [];
                            if (!empty($jumlahKelas)) {
                                foreach ($jumlahKelas as $j) {
                                    foreach ($kelases as $k) {
                                        if ($j->kelas_id === $k->id_kelas) {
                                            if ($no > 1) {
                                                $kelasbank .= ', ';
                                            }
                                            $kelasbank .= $k->nama_kelas;
                                            array_push($id_kelases, ['id' => $k->id_kelas, 'nama' => $k->nama_kelas]);
                                            $no++;
                                        }
                                    }
                                }
                            } else {
                                array_push($id_kelases, ['id' => 0, 'nama' => '']);
                            }
                            ?>
                             <tr>
                                <td class="text-center align-middle">
                                    <div class="custom-control custom-checkbox ml-2">
                                        <input class="custom-control-input check" value="<?= $jadwal->id_jadwal ?>" type="checkbox" id="check<?= $jadwal->id_jadwal ?>">
                                        <label for="check<?= $jadwal->id_jadwal ?>" class="custom-control-label"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle font-weight-bold"><?= $urut ?></td>
                                <td class="align-middle">
                                    <div class="font-weight-bold text-primary"><?= $jadwal->bank_kode ?></div>
                                    <small class="text-muted"><i class="fas fa-barcode mr-1"></i> ID: <?= $jadwal->id_jadwal ?></small>
                                </td>
                                <td class="text-center align-middle">
                                    <span class="badge badge-soft-info px-3 rounded-pill"><?= $jadwal->kode_jenis ?></span>
                                </td>
                                <td class="align-middle font-weight-bold text-dark"><?= $jadwal->kode ?></td>
                                <td class="align-middle">
                                    <div style="max-width: 200px;" class="text-truncate" title="<?= $kelasbank ?>">
                                        <?= $kelasbank ?>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="small">
                                        <div class="text-dark font-weight-500"><?= singkat_tanggal(date('d M Y', strtotime($jadwal->tgl_mulai))) ?></div>
                                        <div class="text-muted">sd <?= singkat_tanggal(date('d M Y', strtotime($jadwal->tgl_selesai))) ?></div>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="btn-group">
                                        <?php if (isset($jadwal->rekap)) :
                                            $sudah_rekap = isset($ada_rekap[$jadwal->id_jadwal]);
                                            if ($sudah_rekap) :?>
                                                <button class="btn btn-outline-primary btn-sm rounded-pill px-3 shadow-sm mr-1"
                                                        onclick="backup(<?= $jadwal->id_jadwal ?>)">
                                                    <i class="fas fa-sync-alt mr-1"></i> REKAP ULANG
                                                </button>
                                                <a type="button" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm"
                                                   href="<?= base_url() . 'cbtrekap/olahnilai?jadwal=' . $jadwal->id_jadwal ?>">
                                                    <i class="fas fa-search mr-1"></i> DETAIL
                                                </a>
                                            <?php else : ?>
                                                <button class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm"
                                                        onclick="backup(<?= $jadwal->id_jadwal ?>)">
                                                    <i class="fas fa-database mr-1"></i> REKAP NILAI
                                                </button>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <a type="button" class="btn btn-success btn-sm rounded-pill px-4 shadow-sm"
                                               href="<?= base_url() . 'cbtrekap/olahnilai?jadwal=' . $jadwal->id_jadwal ?>">
                                                <i class="fas fa-search mr-1"></i> DETAIL
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!$jadwal->hanya_pg) : ?>
                                        <div class="mt-2">
                                            <?php
                                            $full_koreksi = isset($koreksi[$jadwal->id_jadwal][1]) && $jadwal->mengerjakan == count($koreksi[$jadwal->id_jadwal][1]);
                                            $badge_jenis = $full_koreksi ? 'badge-soft-success' : 'badge-soft-danger';
                                            ?>
                                            <span class="badge <?= $badge_jenis ?> rounded-pill px-2" style="font-size: 0.75rem;">
                                                <i class="fas <?= $full_koreksi ? 'fa-check-circle' : 'fa-clock' ?> mr-1"></i>
                                                <?= $jadwal->mengerjakan ?> Selesai,
                                                <?= isset($koreksi[$jadwal->id_jadwal][1]) ? count($koreksi[$jadwal->id_jadwal][1]) : '0' ?> Koreksi
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $urut++; endforeach;
                        endif; ?>
                        </tbody>
                    </table>

                </div>
                <div class="overlay-modern d-none" id="loading-atas">
                    <div class="loader-modern"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'bulk')) ?>
<?= form_close(); ?>

<script>
    function sortById(a, b) {
        var aID = a.id_mapel.toLowerCase();
        var bID = b.id_mapel.toLowerCase();
        return ((aID < bID) ? -1 : ((aID > bID) ? 1 : 0));
    }

    function bulk_delete() {
        const $rows = $('#jadwal-bank').find('tr'), headers = $rows.splice(0, 1); // header rows
        var jsonId = [];
        $rows.each((i, row) => {
            const $selected = $(row).find('.check:checked');
            if ($selected.val() != null) jsonId.push($selected.val());
        });

        const dataPost = $('#bulk').serialize() + '&ids=' + JSON.stringify(jsonId);
        console.log('post', dataPost);

        if ($("#jadwal-bank tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            swal.fire({
                title: "Semua jadwal CBT terpilih akan dihapus!",
                html: "Semua nilai siswa dari jadwal yang terpilih juga akan dihapus!<br><span class='text-danger'><b>Pastikan anda telah mendownload semua nilai siswa</b></span>",
                //text: "Semua nilai siswa akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "YA, Hapus!"
            }).then(result => {
                if (result.value) {
                    swal.fire({
                        title: "Merekap Nilai Siswa",
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
                        url: base_url + 'cbtrekap/hapusrekap',
                        data: $('#bulk').serialize() + '&ids=' + JSON.stringify(jsonId),
                        type: "POST",
                        success: function (respon) {
                            console.log(respon);
                            if (respon.success) {
                                swal.fire({
                                    title: "Berhasil",
                                    text: respon.total + " jadwal CBT dan nilai siswa berhasil dihapus",
                                    icon: "success"
                                }).then(result => {
                                    if (result.value) {
                                        window.location.href = base_url + 'cbtrekap';
                                    }
                                })
                            } else {
                                swal.fire({
                                    title: "Gagal",
                                    text: "Tidak ada data yang dihapus",
                                    icon: "error"
                                });
                            }
                        },
                        error: function () {
                            swal.fire({
                                title: "Gagal",
                                text: "Ada data yang sedang digunakan",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    }

    function bulk_rekap() {
        const $rows = $('#jadwal-bank').find('tr'), headers = $rows.splice(0, 1); // header rows
        var jsonId = [];
        $rows.each((i, row) => {
            const $selected = $(row).find('.check:checked');
            if ($selected.val() != null) jsonId.push($selected.val());
        });

        const dataPost = $('#bulk').serialize() + '&ids=' + JSON.stringify(jsonId);
        console.log('post', dataPost);

        if ($("#jadwal-bank tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            swal.fire({
                title: "Merekap Nilai Siswa",
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
                url: base_url + 'cbtrekap/bulkbackup',
                data: $('#bulk').serialize() + '&ids=' + JSON.stringify(jsonId),
                type: "POST",
                success: function (respon) {
                    console.log(respon);
                    window.location.href = base_url + 'cbtrekap';
                    /*
                    if (respon.rekap && respon.nilai > 0) {
                        swal.fire({
                            title: "Berhasil",
                            text: respon.total + " jadwal CBT dan nilai siswa berhasil direkap",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'cbtrekap';
                            }
                        })
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: respon.message,
                            icon: "error"
                        });
                    }
                    */
                },
                error: function () {
                    swal.fire({
                        title: "Gagal",
                        text: "Ada data yang sedang digunakan",
                        icon: "error"
                    });
                }
            });
        }
    }

    function backup(id) {
        $('#loading-atas').removeClass('d-none');
        setTimeout(function () {
            $.ajax({
                url: base_url + "cbtrekap/backupnilai/" + id,
                //url: base_url + "cbtrekap/generatenilaiujian/" + id,
                success: function (data) {
                    //$('#loading-atas').addClass('d-none');
                    console.log(data);
                    window.location.href = base_url + 'cbtrekap'
                    /*
                    if (data.rekap && data.nilai > 0) {
                    } else {
                        $('#loading-atas').addClass('d-none');
                        showDangerToast(data.message);
                    }
                    */
                }, error: function (xhr, status, error) {
                    $('#loading-atas').addClass('d-none');
                    console.log(xhr.responseText);
                    showDangerToast('Data error');
                }
            });
        }, 500);
    }

    $(document).ready(function () {
        ajaxcsrf();
        $("#jadwal-bank").DataTable({
            //paging: false,
            //ordering: false,
            info: false,
        });

        $("#flashdata").fadeTo(8000, 500).slideUp(500, function () {
            $("#flashdata").slideUp(500);
        });

        $("#check-all").on("click", function () {
            if (this.checked) {
                $(".check").each(function () {
                    this.checked = true;
                    $("#check-all").prop("checked", true);
                    $("#hapusterpilih").removeAttr("disabled");
                    $("#rekapterpilih").removeAttr("disabled");

                    //$("#hapusterpilih").css({ visibility: "visible" });
                    //$("#rekapterpilih").css({ visibility: "visible" });
                });
            } else {
                $(".check").each(function () {
                    this.checked = false;
                    $("#check-all").prop("checked", false);
                    $("#hapusterpilih").attr("disabled", "disabled");
                    $("#rekapterpilih").attr("disabled", "disabled");

                    //$("#hapusterpilih").css({ visibility: "hidden" });
                    //$("#rekapterpilih").css({ visibility: "hidden" });
                });
            }
        });

        $("#jadwal-bank tbody").on("click", "tr .check", function () {
            var check = $("#jadwal-bank tbody tr .check").length;
            var checked = $("#jadwal-bank tbody tr .check:checked").length;
            if (check === checked) {
                $("#check-all").prop("checked", true);
            } else {
                $("#check-all").prop("checked", false);
            }

            if (checked === 0) {
                $("#hapusterpilih").attr("disabled", "disabled");
                $("#rekapterpilih").attr("disabled", "disabled");
            } else {
                $("#hapusterpilih").removeAttr("disabled");
                $("#rekapterpilih").removeAttr("disabled");
            }
        });
    })
</script>
