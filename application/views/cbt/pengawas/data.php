<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row pt-4 px-4 pb-5">
                <div class="col-sm-8">
                    <div class="d-flex align-items-center mb-1">
                        <div class="btn btn-sm btn-white-translucent disabled rounded-pill mr-2">
                            <i class="fas fa-user-shield text-white"></i>
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
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Jenis Ujian</label>
                            <?php echo form_dropdown('jenis', $jenis, $jenis_selected, 'id="jenis" class="form-control select2"'); ?>
                        </div>
                    </div>

                    <?php if (count($tgl_jadwals) > 0) : ?>
                        <div class="mt-4">
                            <?php foreach ($tgl_jadwals as $tgl => $jadwals) : ?>
                                <div class="table-responsive mb-4 shadow-sm rounded">
                                    <table class="table table-modern-list mb-0 tbl-pengawas">
                                        <thead>
                                            <tr>
                                                <th class="text-center py-3" style="width: 180px">Hari / Tanggal</th>
                                                <th class="text-center py-3">Ruang</th>
                                                <th class="text-center py-3">Sesi</th>
                                                <th class="text-center py-3">Mata Pelajaran</th>
                                                <th class="text-center py-3" style="min-width: 300px">Pengawas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($ruangs as $ruang => $sesis) :
                                                foreach ($sesis as $sesi) :
                                                    foreach ($jadwals as $idmpl => $jadwal):
                                                        $listIdJad = [];
                                                        $total_peserta = 0;
                                                        foreach ($jadwal as $jdw) {
                                                            $listIdJad[] = $jdw->id_jadwal;
                                                            $bank_kelass = $jdw->bank_kelas;
                                                            foreach ($bank_kelass as $bank_kelas) {
                                                                foreach ($jdw->peserta as $peserta) {
                                                                    $cnt = isset($peserta[$ruang]) && isset($peserta[$ruang][$sesi->sesi_id]) ?
                                                                        count($peserta[$ruang][$sesi->sesi_id]) : 0;
                                                                    if ($bank_kelas['kelas_id'] != null && $cnt > 0) {
                                                                        $total_peserta += $cnt;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        if ($total_peserta > 0) :
                                                        ?>
                                                        <tr>
                                                            <td class="text-center align-middle font-weight-bold text-dark">
                                                                <?= buat_tanggal(date('D, d M Y', strtotime($jadwal[0]->tgl_mulai))) ?>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <span class="badge badge-light px-3 py-2 rounded-pill font-weight-bold">
                                                                    <?= $sesi->nama_ruang ?>
                                                                </span>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <span class="badge badge-soft-primary px-3 py-2 rounded-pill font-weight-bold">
                                                                    <?= $sesi->nama_sesi ?>
                                                                </span>
                                                            </td>
                                                            <td class="align-middle jadwal"
                                                                data-ruang="<?=$ruang?>" data-sesi="<?=$sesi->sesi_id?>"
                                                                data-id="[<?= implode(',', $listIdJad) ?>]">
                                                                <div class="d-flex flex-column text-center">
                                                                    <span class="font-weight-bold text-dark"><?= $jadwal[0]->nama_mapel ?></span>
                                                                    <span class="text-muted small font-weight-bold uppercase tracking-wider"><?= $jadwal[0]->bank_kode ?></span>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?php
                                                                $sel = '';
                                                                $idJad = $jadwal[0]->id_jadwal;
                                                                $sel = isset($pengawas[$idJad]) &&
                                                                isset($pengawas[$idJad][$ruang]) &&
                                                                isset($pengawas[$idJad][$ruang][$sesi->sesi_id])
                                                                    ? explode(',', $pengawas[$idJad][$ruang][$sesi->sesi_id]->id_guru) : [];
                                                                echo form_dropdown(
                                                                    'pengawas[]',
                                                                    $gurus,
                                                                    $sel,
                                                                    'style="width: 100%" class="select2 form-control pengawas" multiple="multiple" data-placeholder="Pilih Pengawas" required'
                                                                ); ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; endforeach; endforeach; endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endforeach; ?>

                            <?= form_open('', array('id' => 'savepengawas')) ?>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-lg font-weight-bold">
                                        <i class="fas fa-save mr-2"></i>Simpan Pengawas
                                    </button>
                                </div>
                            <?= form_close() ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url() ?>/assets/app/js/jquery.rowspanizer.js"></script>
<script>
    var rSelected = <?= isset($ruang_selected) && $ruang_selected == null ? 0 : 1?>;
    var sSelected = <?= isset($sesi_selected) && $sesi_selected == null ? 0 : 1?>;
    $(document).ready(function () {
        ajaxcsrf();
        $(".tbl-pengawas").rowspanizer({columns: [0,1,2]});
        $('.select2').select2();
        var opsiJenis = $("#jenis");
        //var opsiRuang = $("#ruang");
        //var opsiSesi = $("#sesi");

        /*
        var selectedr = rSelected === 0 ? "selected='selected'" : "";
        opsiRuang.prepend("<option value='' " + selectedr + ">Pilih Ruang</option>");

        var selecteds = sSelected === 0 ? "selected='selected'" : "";
        opsiSesi.prepend("<option value='' " + selecteds + ">Pilih Sesi</option>");
         */


        opsiJenis.change(function () {
            getAllJadwal();
        });
        /*
        opsiRuang.change(function () {
            getAllJadwal();
        });
        opsiSesi.change(function () {
            getAllJadwal();
        });
         */

        function getAllJadwal() {
            var jenis = opsiJenis.val();
            //var ruang = opsiRuang.val();
            //var sesi = opsiSesi.val();
            var kosong = jenis == "";// || ruang == '' || sesi == "";
            var url = base_url + 'cbtpengawas?jenis=' + jenis;// + '&ruang=' + ruang + '&sesi=' + sesi;
            console.log(url);
            if (!kosong) {
                window.location.href = url;
            }
        }

        $('#savepengawas').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var jenis = opsiJenis.val();
            var kosong = jenis == ""; //ruang == '' || sesi == "" ||
            if (kosong) return;

            const $tables = $('.tbl-pengawas');
            var jsonObj = [];
            $tables.each((ind, tbl) => {
                const $rows1 = $(tbl).find('tr'), headers1 = $rows1.splice(0, 1);
                $rows1.each((i, row) => {
                    const ruang = $(row).find('.jadwal').data('ruang');//opsiRuang.val();
                    const sesi = $(row).find('.jadwal').data('sesi');//opsiSesi.val();
                    const jadwal = $(row).find('.jadwal').data('id');
                    const guru = $(row).find('.pengawas').val();

                    for (i = 0; i < jadwal.length; i++) {
                        let item = {};
                        item ["jadwal"] = jadwal[i];
                        item ["ruang"] = ruang;
                        item ["sesi"] = sesi;
                        item ["guru"] = guru;

                        jsonObj.push(item);
                    }
                });
            });

            var dataPost = $(this).serialize() + "&data=" + JSON.stringify(jsonObj);
            //console.log('table', dataPost);
            $.ajax({
                url: base_url + "cbtpengawas/savepengawas",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            html: "Pengawas ujian berhasil disimpan",
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
                        showDangerToast('gagal disimpan')
                    }
                }, error: function (xhr, status, error) {
                    console.log("response:", xhr.responseText);
                    showDangerToast('gagal disimpan')
                }
            });
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
    .bg-soft-primary { background-color: #e0e7ff; color: #4338ca; }
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
    .btn-white-translucent {
        background-color: rgba(255, 255, 255, 0.2);
        border: none;
        backdrop-filter: blur(4px);
    }
    .uppercase { text-transform: uppercase; }
    .tracking-wider { letter-spacing: 0.05em; }
    
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        min-height: 38px;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #3b82f6;
    }
</style>
