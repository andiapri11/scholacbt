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
                            <i class="fas fa-signal text-white"></i>
                        </div>
                        <h1 class="text-white font-weight-bold mb-0" style="letter-spacing: -0.5px;"><?= $judul ?></h1>
                    </div>
                    <p class="text-white-50 small mb-0 uppercase tracking-wider font-weight-bold">
                        <?= $subjudul ?>
                    </p>
                </div>
                <div class="col-sm-4 text-right">
                    <button class="btn btn-white-translucent rounded-pill btn-sm px-3 shadow-sm border-0" data-toggle="modal" data-target="#infoModal">
                        <i class="fas fa-info-circle mr-1"></i> Info Error
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg mb-4">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="bg-light p-3 rounded-lg border">
                                <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2 d-block">TOKEN AKTIF</label>
                                <div class="d-flex align-items-center">
                                    <input id="token-input" class="form-control form-control-lg border-0 bg-transparent text-primary text-bold" style="font-size: 1.5rem; letter-spacing: 5px;" readonly="readonly" value="------"/>
                                    <div id="kolom-kanan" class="ml-auto">
                                        <span id="interval" class="badge badge-soft-primary rounded-pill px-3 py-2 d-none">-- : -- : --</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Pilih Jadwal</label>
                            <?php
                            echo form_dropdown(
                                'jadwal',
                                $jadwal,
                                null,
                                'id="jadwal" class="form-control select2"'
                            ); ?>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Tampilkan</label>
                            <select name="printby" id="printby" class="form-control select2">
                                <option value="1" selected="selected">By Ruang</option>
                                <option value="2">By Kelas</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 d-none" id="by-kelas">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Pilih Kelas</label>
                            <select name="kelas" id="kelas" class="form-control select2"></select>
                        </div>
                        <div class="col-md-3 mb-3 by-ruang">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Pilih Ruang</label>
                            <select name="ruang" id="ruang" class="form-control select2"></select>
                        </div>
                        <div class="col-md-3 mb-3 by-ruang">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Pilih Sesi</label>
                            <select name="sesi" id="sesi" class="form-control select2"></select>
                        </div>
                    </div>

                    <div id="info" class="d-none mt-4">
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-md-5 mb-4">
                                <div class="card card-modern border-0 bg-gradient-success text-white">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-square-sm bg-white-translucent rounded-lg mr-2">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <h6 class="mb-0 font-weight-bold">Informasi Ujian</h6>
                                        </div>
                                        <div id="info-ujian" class="small opacity-90"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 mb-4">
                                <div class="card card-modern border-0 bg-light-soft">
                                    <div class="card-body p-4">
                                        <h6 class="font-weight-bold text-muted uppercase tracking-wider mb-3 small">
                                            <i class="fas fa-lightbulb mr-2 text-warning"></i>Panduan Aksi
                                        </h6>
                                        <ul class="small text-muted mb-0 pl-3">
                                            <li class="mb-1"><strong>RESET WAKTU:</strong> Jika siswa logout tidak wajar atau waktu habis saat belum selesai.</li>
                                            <li class="mb-1"><strong>RESET IZIN:</strong> Izinkan login dari perangkat/browser berbeda.</li>
                                            <li class="mb-1"><strong>PAKSA SELESAI:</strong> Tutup paksa sesi ujian siswa secara manual.</li>
                                            <li><strong>ULANG:</strong> Menghapus seluruh jawaban dan mengulang dari nol.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap align-items-end justify-content-between mb-3">
                            <div class="mb-2">
                                <button type="button" class="btn btn-primary rounded-pill px-4 shadow-sm font-weight-bold" onclick="refreshStatus()">
                                    <i class="fa fa-sync-alt mr-2"></i> REFRESH DATA
                                </button>
                            </div>
                            
                            <?php $dnone = $this->ion_auth->is_admin() ? '' : 'd-none'; ?>
                            
                            <div class="d-flex align-items-center mb-2">
                                <div class="input-group input-group-sm mr-2 shadow-sm" style="width: 250px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-right-0"><i class="fas fa-search text-muted"></i></span>
                                    </div>
                                    <input type="search" id="cari-status-siswa" class="form-control border-left-0 pl-0" placeholder="Cari nama siswa...">
                                </div>
                                
                                <button type="button" class="btn btn-success rounded-pill px-4 shadow-sm font-weight-bold <?= $dnone ?>" onclick="terapkanAksi()">
                                    <i class="fa fa-save mr-2"></i> TERAPKAN AKSI
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-modern-list table-hover" id="table-status"></table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'reset')) ?>
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetLabel">Reset Waktu Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="icheck-success">
                        <input class="radio" type="radio" name="reset" id="reset1" value="1">
                        <label for="reset1">Reset Waktu dari awal</label>
                    </div>
                    <div class="icheck-success">
                        <input class="radio" type="radio" name="reset" id="reset2" value="2">
                        <label for="reset2">Lanjutkan sisa waktu</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">OK</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoLabel">Kode error siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table w-100">
                    <tr>
                        <td class="text-bold">001</td>
                        <td>:</td>
                        <td>Token salah atau token belum digenerate</td>
                    </tr>
                    <tr>
                        <td class="text-bold">002</td>
                        <td>:</td>
                        <td>Harus reset izin</td>
                    </tr>
                    <tr>
                        <td class="text-bold">003</td>
                        <td>:</td>
                        <td>Harus reset waktu</td>
                    </tr>
                    <tr>
                        <td class="text-bold">004</td>
                        <td>:</td>
                        <td>Soal belum dibuat atau belum dipilih</td>
                    </tr>
                    <tr>
                        <td class="text-bold">005</td>
                        <td>:</td>
                        <td>Siswa menggunakan browser yang tidak mendukung</td>
                    </tr>
                    <tr>
                        <td class="text-bold">006</td>
                        <td>:</td>
                        <td>internet down atau error dari database/server</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    const ruangs = JSON.parse('<?=json_encode($ruang)?>');
    const arrRuang = JSON.parse('<?=json_encode($ruangs)?>');
    var dnone = '<?= $this->ion_auth->is_admin() ? "" : "d-none" ?>';
    var printBy = '1';
    var url = '';

    var kelas;
    var jadwal, ruang, sesi;

    function terapkanAksi() {
        const $rows = $('#table-status').find('tr'), headers = $rows.splice(0, 2);
        let item = {};
        item ["reset"] = [];
        //item ["id_logs"] = [];
        item ["force"] = [];
        item ["log"] = [];
        item ["ulang"] = [];
        item ["hapus"] = [];
        $rows.each((i, row) => {
            var siswa_id = $(row).attr("data-id");

            const $colReset = $(row).find('.input-reset');
            const $colForce = $(row).find('.input-force');
            const $colUlang = $(row).find('.input-ulang');
            if ($colReset.prop("checked") === true) {
                item ["reset"].push(siswa_id + '0' + jadwal + '1');
                //item ["id_logs"].push(siswa_id+''+jadwal);
            }
            if ($colForce.prop("checked") === true) {
                item ["force"].push(siswa_id + '0' + jadwal);
                item ["log"].push(siswa_id);
            }
            if ($colUlang.prop("checked") === true) {
                item ["ulang"].push(siswa_id);
                item ["hapus"].push(siswa_id + '0' + jadwal);
            }
        });

        var dataSiswa = $('#reset').serialize() + '&jadwal=' + jadwal + "&aksi=" + JSON.stringify(item);
        console.log(dataSiswa);

        var jmlReset = item.reset.length === 0 ? '' : '<b>' + item.reset.length + '</b> siswa akan direset<br>';
        var jmlForce = item.force.length === 0 ? '' : '<b>' + item.force.length + '</b> siswa akan dipaksa selesai<br>';
        var jmlUlang = item.ulang.length === 0 ? '' : '<b>' + item.ulang.length + '</b> siswa akan mengulang ujian';

        if (item.reset.length === 0 && item.force.length === 0 && item.ulang.length === 0) {
            showWarningToast('Silahkan pilih siswa terlebih dulu');
            return;
        }

        swal.fire({
            title: "Terapkan Aksi",
            html: jmlReset + jmlForce + jmlUlang,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Apply"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + "siswa/applyaction",
                    type: 'POST',
                    data: dataSiswa,
                    success: function (data) {
                        console.log(data);
                        if (printBy === '1') {
                            url = base_url + "cbtstatus/getsiswaruang?ruang=" + ruang + '&sesi=' + sesi + '&jadwal=' + jadwal;
                        } else {
                            url = base_url + "cbtstatus/getsiswakelas?kelas=" + kelas + '&jadwal=' + jadwal;
                        }
                        refreshStatus();
                    }, error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    }

    function refreshStatus() {
        $('#cari-status-siswa').val('')
        $('#loading').removeClass('d-none');
        setTimeout(function () {
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    console.log(response);
                    createPreview(response)
                }
            });
        }, 500);
    }

    function createPreview(data) {
        var tbody = '<thead class="alert-light">' +
            '<tr>' +
            '<th rowspan="2" class="text-center align-middle" width="40">No.</th>' +
            '<th rowspan="2" class="text-center align-middle" width="100">No. Peserta</th>' +
            '<th rowspan="2" class="text-center align-middle">Nama</th>' +
            '<th rowspan="2" class="text-center align-middle">Kelas</th>' +
            '<th rowspan="2" class="text-center align-middle">Sesi</th>' +
            '<th rowspan="2" class="text-center align-middle">Ruang</th>' +
            '<th colspan="2" class="text-center align-middle">Status</th>' +
            '<th rowspan="2" class="text-center align-middle ' + dnone + '">Reset<br>Waktu</th>' +
            '<th colspan="3" class="text-center align-middle ' + dnone + '">Aksi</th>' +
            '</tr>' +
            '<tr>' +
            '<th class="text-center align-middle p-1">Mulai</th>' +
            '<th class="text-center align-middle">Durasi</th>' +
            '<th class="text-center align-middle ' + dnone + '">Reset<br>Izin<br><input id="input-reset-all" class="check" type="checkbox"></th>' +
            '<th class="text-center align-middle ' + dnone + '">Paksa<br>Selesai<br><input id="input-force-all" class="check" type="checkbox"></th>' +
            '<th class="text-center align-middle ' + dnone + '">Ulang<br><input id="input-ulang-all" class="check" type="checkbox"></th>' +
            '</tr></thead><tbody>';

        if (data.siswa.length > 0) {
            for (let i = 0; i < data.siswa.length; i++) {
                var idSiswa = data.siswa[i].id_siswa;
                var durasi = data.durasi[idSiswa].dur != null ? data.durasi[idSiswa].dur.lama_ujian : ' - -';
                var adaWaktu = data.durasi[idSiswa].dur != null ? data.durasi[idSiswa].dur.ada_waktu : true;

                var logging = data.durasi[idSiswa].log;
                var mulai = '- -  :  - -';
                var selesai = '- -  :  - -';
                var reset = null;
                for (let k = 0; k < logging.length; k++) {
                    if (logging[k].log_type === '1') {
                        if (logging[k] != null) {
                            reset = logging[k].reset;
                            var t = logging[k].log_time.split(/[- :]/);
                            //var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
                            mulai = t[3] + ':' + t[4];
                        }
                    } else {
                        if (logging[k] != null) {
                            var ti = logging[k].log_time.split(/[- :]/);
                            selesai = ti[3] + ':' + ti[4];
                        }
                    }
                }

                var belumUjian = data.durasi[idSiswa].dur == null;
                var sudahSelesai = !belumUjian && data.durasi[idSiswa].dur.selesai != null;
                var loading = belumUjian ? '' : (sudahSelesai ? "" : '<i class="fa fa-spinner fa-spin mr-2"></i>');

                var disabledResetWaktu = !sudahSelesai && !adaWaktu ? '' : 'disabled';
                var disabledReset = !sudahSelesai && reset != null && reset == '0' ? '' : 'disabled';
                var disabledSelesai = !sudahSelesai && !belumUjian ? '' : 'disabled';
                var disabledUlang = belumUjian ? 'disabled' : (sudahSelesai ? '' : 'disabled');

                // jika ingin selalu aktif
                // var disabledResetWaktu = '';     // reset waktu selalu aktif
                // var disabledReset = '';          // reset izin selalu aktif
                // var disabledSelesai = '';        // paksa selesai selalu aktif
                // var disabledUlang = '';         // ulangi selalu aktif

                var sesi = data.siswa[i].kode_sesi;
                var ruang = data.siswa[i].kode_ruang;
                var kelas = data.siswa[i].kode_kelas;

                tbody += '<tr data-id="' + idSiswa + '">' +
                    '<td class="text-center align-middle">' + (i + 1) + '</td>' +
                    '<td class="text-center align-middle">' + data.siswa[i].nomor_peserta + '</td>' +
                    '<td class="align-middle">' + data.siswa[i].nama + '</td>' +
                    '<td class="text-center align-middle">' + kelas + '</td>' +
                    '<td class="text-center align-middle">' + sesi + '</td>' +
                    '<td class="text-center align-middle">' + ruang + '</td>' +
                    '<td class="text-center align-middle">' + mulai + '</td>' +
                    '<td class="text-center align-middle">' + loading + durasi + '</td>' +
                    '<td class="text-center align-middle '+dnone+'">' +
                    '	<button type="button" class="btn btn-default" ' +
                    'data-siswa="' + idSiswa + '" data-jadwal="' + data.info.id_jadwal + '" ' +
                    'data-toggle="modal" data-target="#resetModal" ' + disabledReset + '><i class="fa fa-refresh"></i></button>' +
                    '</td>' +
                    '<td class="text-center text-success align-middle ' + dnone + '">' +
                    '<input class="check input-reset" type="checkbox" ' + disabledReset + '>' +
                    '</td>' +
                    '<td class="text-center text-danger align-middle ' + dnone + '">' +
                    '<input class="check input-force" type="checkbox" ' + disabledSelesai + '>' +
                    '</td>' +
                    '<td class="text-center text-danger align-middle ' + dnone + '">' +
                    '<input class="check input-ulang" type="checkbox" ' + disabledUlang + '>' +
                    '</td>' +
                    '</tr>';
            }
        } else {
            tbody += '<tr><td colspan="12" class="text-center">Tidak ada siswa tergabung disini!</td></tr>'
        }

        tbody += '</tbody>';
        $('#table-status').html(tbody);
        $('#info').removeClass('d-none');

        var infoJadwal = '<div class="row">' +
            '<div class="col-4">Mapel</div>' +
            '<div class="col-8">' +
            '<b>' + data.info.nama_mapel + '</b>' +
            '</div>' +
            '<div class="col-4">Guru</div>' +
            '<div class="col-8">' +
            '<b>' + data.info.nama_guru + '</b>' +
            '</div>' +
            '<div class="col-4">Jenis Ujian</div>' +
            '<div class="col-8">' +
            '<b>'+data.info.kode_jenis+'</b>' +
            '</div>' +
            '<div class="col-4">Jml. Soal</div>' +
            '<div class="col-8">' +
            '<b>' + (parseInt(data.info.tampil_pg) + parseInt(data.info.tampil_kompleks) +
                parseInt(data.info.tampil_jodohkan) + parseInt(data.info.tampil_isian) +
                parseInt(data.info.tampil_esai)) + '</b>' +
            '</div>';

        $('#info-ujian').html(infoJadwal);
        $('#loading').addClass('d-none');

        $("#input-reset-all").on("click", function () {
            if (this.checked) {
                $(".input-reset").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = true;
                    }
                    $("#input-reset-all").prop("checked", true);
                });
            } else {
                $(".input-reset").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = false;
                    }
                    $("#input-reset-all").prop("checked", false);
                });
            }
        });

        $("#input-force-all").on("click", function () {
            if (this.checked) {
                $(".input-force").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = true;
                    }
                    $("#input-force-all").prop("checked", true);
                });
            } else {
                $(".input-force").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = false;
                    }
                    $("#input-force-all").prop("checked", false);
                });
            }
        });

        $("#input-ulang-all").on("click", function () {
            if (this.checked) {
                $(".input-ulang").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = true;
                    }
                    $("#input-ulang-all").prop("checked", true);
                });
            } else {
                $(".input-ulang").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = false;
                    }
                    $("#input-ulang-all").prop("checked", false);
                });
            }
        });

        $('#cari-status-siswa').quicksearch('#table-status tbody tr');
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

    $(document).ready(function () {
        ajaxcsrf();

        var opsiPrintBy = $("#printby");
        var opsiJadwal = $("#jadwal");
        var opsiRuang = $("#ruang");
        var opsiSesi = $("#sesi");
        var opsiKelas = $("#kelas");

        opsiJadwal.prepend("<option value='' selected='selected'>Pilih Jadwal</option>");
        opsiRuang.prepend("<option value='' selected='selected'>Pilih Ruang</option>");
        opsiSesi.prepend("<option value='' selected='selected'>Pilih Sesi</option>");
        opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");

        function loadSiswaRuang(ruang, sesi, jadwal) {
            var empty = ruang === '' || sesi === '' || jadwal === '';
            if (!empty) {
                url = base_url + "cbtstatus/getsiswaruang?ruang=" + ruang + '&sesi=' + sesi + '&jadwal=' + jadwal;
                refreshStatus();
            } else {
                console.log('empty')
            }
        }

        function loadSiswaKelas(kelas, jadwal) {
            var empty = kelas === '' || jadwal === '';
            if (!empty) {
                url = base_url + "cbtstatus/getsiswakelas?kelas=" + kelas + '&jadwal=' + jadwal;
                refreshStatus();
            } else {
                console.log('empty')
            }
        }

        opsiPrintBy.change(function () {
            printBy = $(this).val();
            if (printBy === '1') {
                $('#by-kelas').addClass('d-none');
                $('.by-ruang').removeClass('d-none');
                if (ruang && sesi && jadwal) loadSiswaRuang(ruang, sesi, jadwal)
            } else {
                $('#by-kelas').removeClass('d-none');
                $('.by-ruang').addClass('d-none');
                if (kelas && jadwal) loadSiswaKelas(kelas, jadwal)
            }
        });

        opsiJadwal.change(function () {
            getDetailJadwal($(this).val());
            opsiRuang.html("<option value='' selected='selected'>Pilih Ruang</option>");
            if ($(this).val()) {
                $.each(arrRuang, function (k, v) {
                    opsiRuang.append("<option value='"+k+"'>"+ruangs[k]+"</option>");
                })
            }
        });

        opsiKelas.change(function () {
            kelas = $(this).val();
            jadwal = opsiJadwal.val();
            loadSiswaKelas(kelas, jadwal)
        });

        opsiRuang.change(function () {
            opsiSesi.html("<option value='' selected='selected'>Pilih Sesi</option>");
            if ($(this).val()) {
                $.each(arrRuang[$(this).val()], function (k, v) {
                    opsiSesi.append("<option value='"+k+"'>"+v.nama_sesi+"</option>");
                })
            }
        });

        opsiSesi.change(function () {
            sesi = $(this).val();
            ruang = opsiRuang.val();
            jadwal = opsiJadwal.val();
            loadSiswaRuang(ruang, $(this).val(), jadwal)
        })

        var idSiswa = '';
        var idJadwal = '';
        $('#resetModal').on('show.bs.modal', function (e) {
            idSiswa = $(e.relatedTarget).data('siswa');
            idJadwal = $(e.relatedTarget).data('jadwal');

            console.log('siswa:' + idSiswa, 'jadwal:' + idJadwal);
        });

        $('#reset').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            $('#resetModal').modal('hide').data('bs.modal', null);
            $('#resetModal').on('hidden', function () {
                $(this).data('modal', null);
            });

            $.ajax({
                url: base_url + "siswa/resettimer",
                type: 'POST',
                data: $(this).serialize() + '&id_durasi=' + idSiswa + '0' + idJadwal,
                success: function (data) {
                    console.log(data.status);
                    if (data.status) refreshStatus();
                    else showDangerToast('tidak bisa mereset waktu');
                }, error: function (xhr, status, error) {
                    console.log('error');
                }
            });
        });

        opsiKelas.select2({theme: 'bootstrap4'});
        opsiRuang.select2({theme: 'bootstrap4'});
        opsiSesi.select2({theme: 'bootstrap4'});
        opsiJadwal.select2({theme: 'bootstrap4'});

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
    .bg-light-soft { background-color: #f9fbfe; }
    .bg-gradient-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
    .icon-square-sm {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
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
    .badge-soft-primary { background-color: #e0e7ff; color: #4338ca; }
    
    .table-modern-list { border-collapse: separate; border-spacing: 0 8px; }
    .table-modern-list thead th {
        background-color: #f8fafc;
        border: none;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        font-weight: 700;
        color: #64748b;
        padding: 12px 15px;
    }
    .table-modern-list tbody tr {
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        transition: all 0.2s;
    }
    .table-modern-list tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .table-modern-list tbody td {
        padding: 15px;
        border: none;
        vertical-align: middle !important;
    }
    .table-modern-list tbody td:first-child { border-radius: 10px 0 0 10px; }
    .table-modern-list tbody td:last-child { border-radius: 0 10px 10px 0; }
    
    /* Select2 Modernization */
    .select2-container--bootstrap4 .select2-selection {
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        height: calc(1.5em + 0.75rem + 2px) !important;
    }
</style>
