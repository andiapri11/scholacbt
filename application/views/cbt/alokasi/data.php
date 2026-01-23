<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row pt-4 px-4 pb-5">
                <div class="col-sm-8">
                    <div class="d-flex align-items-center mb-1">
                        <div class="btn btn-sm btn-white-translucent disabled rounded-pill mr-2">
                            <i class="fas fa-history text-white"></i>
                        </div>
                        <h1 class="text-white font-weight-bold mb-0" style="letter-spacing: -0.5px;"><?= $judul ?></h1>
                    </div>
                    <p class="text-white-50 small mb-0 uppercase tracking-wider font-weight-bold">
                        <?= $subjudul ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg mb-4">
                <div class="card-header bg-white py-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-square bg-soft-primary mr-3">
                            <i class="fas fa-info-circle text-primary"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="font-weight-bold text-dark mb-1">Petunjuk Pengaturan</h5>
                            <p class="text-muted small mb-0">Atur urutan mata pelajaran yang tampil di layar siswa</p>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-light-soft">
                    <div class="alert alert-light border-0 shadow-none mb-0 p-0" role="alert">
                        <ul class="text-muted small mb-0 pl-3" style="list-style-type: none;">
                            <li class="mb-2"><i class="fas fa-check-circle text-success mr-2"></i>Tentukan urutan tampil jadwal berdasarkan jam (Contoh: Jam 1, Jam 2, dst).</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success mr-2"></i>Jika diatur ke <b>Jam 2</b>, maka mapel tersebut baru akan muncul setelah siswa menyelesaikan ujian di <b>Jam 1</b>.</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success mr-2"></i>Agar semua mapel muncul sekaligus tanpa antrean, atur semua nilai <b>Urutan Jam</b> menjadi 0 atau 1.</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success mr-2"></i>Fitur ini hanya berlaku jika jadwal ujian sudah dalam status <b>Aktif</b>.</li>
                            <li><i class="fas fa-check-circle text-success mr-2"></i>Jika tidak diatur, urutan akan mengikuti pengaturan default pada menu <b>JADWAL</b>.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card card-modern border-0 shadow-lg mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-end">
                        <div class="col-md-3 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Jenis Ujian</label>
                            <?php echo form_dropdown('jenis', $jenis, $jenis_selected, 'id="jenis" class="form-control select2"'); ?>
                        </div>
                        <div class="col-md-2 mb-3" id="by-level">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Level Kelas</label>
                            <?php echo form_dropdown('level', $levels, $level_selected, 'id="level" class="form-control select2"'); ?>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Filter Berdasarkan</label>
                            <?php echo form_dropdown('filter', $filter, $filter_selected, 'id="filter" class="form-control select2"'); ?>
                        </div>
                        <?php $dnone = $filter_selected == '0' ? 'd-none' : '' ?>
                        <div class='col-md-2 mb-3 <?= $dnone ?>' id="tgl-dari">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Dari Tanggal</label>
                            <input type='text' id="dari" name='dari' value="<?= $dari_selected ?>" class='tgl form-control' autocomplete='off'/>
                        </div>
                        <div class='col-md-2 mb-3 <?= $dnone ?>' id="tgl-sampai">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Hingga Tanggal</label>
                            <input type='text' id="sampai" name='sampai' class='tgl form-control' value="<?= $sampai_selected ?>" autocomplete='off'/>
                        </div>
                    </div>

                    <?php if (count($jadwals) > 0 && $jenis_selected != null) : ?>
                        <div class="table-responsive mt-4">
                            <table class="table table-modern-list border" id="tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center py-3">Hari & Tanggal</th>
                                        <th class="text-center py-3">Level Kelas</th>
                                        <th class="text-center py-3">Mata Pelajaran / Jadwal</th>
                                        <th class="text-center py-3" style="width: 150px">Urutan Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jadwals as $jadwal):
                                        $jumlahKelas = json_decode(json_encode(unserialize($jadwal->bank_kelas ?? '')));
                                        $kelasbank = '';
                                        $no = 1;
                                        foreach ($jumlahKelas as $j) {
                                            if (isset($kelas[$j->kelas_id])) {
                                                if ($no > 1) $kelasbank .= ', ';
                                                $kelasbank .= $kelas[$j->kelas_id];
                                                $no++;
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td class="text-center align-middle font-weight-bold text-dark">
                                                <?= buat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_mulai))) ?>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="badge badge-soft-primary px-3 py-2 rounded-pill">
                                                    Level <?= $jadwal->bank_level ?> <span class="text-muted ml-1">(<?= $kelasbank ?>)</span>
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex flex-column">
                                                    <span class="font-weight-bold text-dark"><?= $jadwal->nama_mapel ?></span>
                                                    <span class="text-muted small font-weight-bold uppercase tracking-wider"><?= $jadwal->bank_kode ?></span>
                                                </div>
                                            </td>
                                            <td class="align-middle jam-ke text-center" data-id="<?= $jadwal->id_jadwal ?>">
                                                <input class="form-control text-center font-weight-bold text-primary border-primary rounded-pill mx-auto" style="max-width: 80px;" type="number" min="1" name="jamke" value="<?= $jadwal->jam_ke ?>">
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <?= form_open('', array('id' => 'simpanalokasi')) ?>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-lg font-weight-bold">
                                    <i class="fas fa-save mr-2"></i>Simpan Alokasi Waktu
                                </button>
                            </div>
                        <?= form_close() ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url() ?>/assets/app/js/jquery.rowspanizer.js"></script>
<script>
    $(document).ready(function () {
        ajaxcsrf();
        $("#tbl").rowspanizer({columns: [0]});

        var opsiLevel = $("#level");
        var opsiJenis = $("#jenis");

        var opsiFilter = $("#filter");
        var opsiDari = $("#dari");
        var opsiSampai = $("#sampai");

        opsiDari.datetimepicker({
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

        opsiSampai.datetimepicker({
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

        opsiFilter.change(function () {
            if ($(this).val() == '0') {
                $('#tgl-dari').addClass('d-none');
                $('#tgl-sampai').addClass('d-none');
                var jenis = opsiJenis.val();
                var level = opsiLevel.val();
                var url = base_url + 'cbtalokasi?jenis=' + jenis + '&level=' + level + '&filter=0';
                if (jenis != "" && level != "0") {
                    window.location.href = url;
                }
            } else {
                $('#tgl-dari').removeClass('d-none');
                $('#tgl-sampai').removeClass('d-none');
            }
        });

        opsiLevel.change(function () {
            //var lvl = $(this).val();
            //if (lvl != "" && lvl !== old) {
            getAllJadwal();
            //window.location.href = base_url + 'cbtalokasi?jenis=' + opsiJenis.val() + '&level=' + lvl;
            //}
        });

        opsiJenis.change(function () {
            getAllJadwal();
        });

        var dariold = "<?=$dari_selected?>";
        opsiDari.change(function () {
            var dari = $(this).val();
            if (dari != "" && dari !== dariold) {
                getAllJadwal();
            }
        });

        var sampaiold = "<?=$sampai_selected?>";
        opsiSampai.change(function () {
            var sampai = $(this).val();
            if (sampai != "" && sampai !== sampaiold) {
                getAllJadwal();
            }
        });

        function getAllJadwal() {
            var jenis = opsiJenis.val();
            var level = opsiLevel.val();
            var dari = opsiDari.val();
            var sampai = opsiSampai.val();
            var fil = opsiFilter.val();

            var tglKosong = fil == '1' && (dari == "" || sampai == "");
            var url = base_url + 'cbtalokasi?jenis=' + jenis + '&level=' + level + '&filter=' + opsiFilter.val() + '&dari=' + dari + '&sampai=' + sampai;
            console.log(url);
            if (jenis != "" && level != "0" && !tglKosong) {
                window.location.href = url;
            }
        }

        $('#simpanalokasi').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            const $rows1 = $('#tbl').find('tr'), headers1 = $rows1.splice(0, 1);
            var jsonObj = [];
            $rows1.each((i, row) => {
                const td = $(row).find('.jam-ke');
                const jam_ke = td.find('input[name="jamke"]').val();
                const id_jadwal = td.data('id');

                let item = {};
                item ["id_jadwal"] = id_jadwal;
                item ["jam_ke"] = jam_ke;

                jsonObj.push(item);
            });

            var dataPost = $(this).serialize() + "&alokasi=" + JSON.stringify(jsonObj);
            console.log(dataPost);

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
                url: base_url + "cbtalokasi/savealokasi",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            html: "Alokasi waktu ujian berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: "Alokasi gagal disimpan",
                            icon: "error"
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("response:", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        });

        $('#selector button').click(function () {
            $(this).addClass('active').siblings().addClass('btn-outline-primary').removeClass('active btn-primary');

            if (!$('#by-kelas').is(':hidden')) {
                $('#by-kelas').addClass('d-none');
                $('#by-ruang').removeClass('d-none');
            } else {
                $('#by-kelas').removeClass('d-none');
                $('#by-ruang').addClass('d-none');
            }
        });

    })
</script>

<style>
    .header-blue {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    }
    .card-modern {
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05) !important;
    }
    .icon-square {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
    }
    .bg-soft-primary { background-color: #e0e7ff; }
    .table-modern-list thead th {
        background-color: #f8fafc;
        border-top: none;
        border-bottom: 2px solid #e2e8f0;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        font-weight: 700;
        color: #64748b;
    }
    .badge-soft-primary {
        background-color: #e0e7ff;
        color: #4338ca;
    }
    .btn-white-translucent {
        background-color: rgba(255, 255, 255, 0.2);
        border: none;
        backdrop-filter: blur(4px);
    }
    .bg-light-soft { background-color: #f9fbfe; }
    .uppercase { text-transform: uppercase; }
    .tracking-wider { letter-spacing: 0.05em; }
</style>
