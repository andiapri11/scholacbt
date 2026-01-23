<div class="content-wrapper bg-light">
    <style>
        .dashboard-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 1.5rem 0 3.5rem 0 !important;
            color: white;
        }
        .card-modern {
            border-radius: 1rem;
            border: none;
            transition: all 0.3s ease;
        }
        .card-modern:hover {
            transform: translateY(-2px);
        }
        .token-card {
            background: #fff;
            border-left: 5px solid #1e3c72;
        }
        .badge-soft-primary {
            background-color: rgba(30, 60, 114, 0.1);
            color: #1e3c72;
        }
        .btn-white-translucent {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
        }
        .btn-white-translucent:hover {
            background: rgba(255, 255, 255, 0.3);
            color: white;
        }
        @media (max-width: 576px) {
            .dashboard-header {
                padding: 1rem 0 3rem 0 !important;
                text-align: center;
            }
            .dashboard-header .text-right {
                text-align: center !important;
                margin-top: 15px;
            }
        }
    </style>

    <div class="dashboard-header">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px">
                        <i class="fas fa-signal mr-2 opacity-75"></i><?= $judul ?>
                    </h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <?= $subjudul ?>
                    </p>
                </div>
                <div class="col-sm-4 text-right">
                    <button class="btn btn-sm btn-white-translucent px-4 rounded-pill shadow-none font-weight-bold" data-toggle="modal" data-target="#infoModal">
                        <i class="fas fa-info-circle mr-2"></i> Info Error
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -2.5rem">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card card-modern token-card shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2 d-block">TOKEN AKTIF SAAT INI</label>
                                <div class="d-flex align-items-center">
                                    <input id="token-input" class="form-control form-control-lg border-0 bg-transparent text-primary font-weight-bold p-0" style="font-size: 2rem; letter-spacing: 5px; height: auto;" readonly="readonly" value="------"/>
                                    <div id="kolom-kanan" class="ml-auto">
                                        <span id="interval" class="badge badge-soft-primary rounded-pill px-4 py-2 d-none">-- : -- : --</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-right mt-3 mt-md-0">
                                <button class="btn btn-outline-primary rounded-pill px-4 font-weight-bold" id="refresh-token">
                                    <i class="fas fa-sync-alt mr-2"></i> Refresh Token
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card card-modern shadow-sm mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h6 class="card-title font-weight-bold mb-0">
                            <i class="fas fa-chalkboard-teacher mr-2 text-primary"></i>Status Mapel diampu
                        </h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row align-items-end">
                            <div class="col-md-4 mb-3">
                                <label class="small font-weight-bold text-muted uppercase">Pilih Jadwal</label>
                                <?php
                                echo form_dropdown(
                                    'jadwal',
                                    $jadwal,
                                    null,
                                    'id="jadwal" class="form-control select2"'
                                ); ?>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="small font-weight-bold text-muted uppercase">Pilih Ruang</label>
                                <select name="ruang" id="ruang" class="form-control select2"></select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="small font-weight-bold text-muted uppercase">Pilih Sesi</label>
                                <select name="sesi" id="sesi" class="form-control select2"></select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <button id="detail-pengampu" class="btn btn-primary btn-block rounded-pill font-weight-bold shadow-sm">
                                    <i class="fas fa-eye mr-2"></i> LIHAT STATUS
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card card-modern shadow-sm mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h6 class="card-title font-weight-bold mb-0">
                            <i class="fas fa-user-shield mr-2 text-success"></i>Tugas Sebagai Pengawas
                        </h6>
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-4 py-3 border-0 small font-weight-bold text-muted uppercase">Jadwal Ujian</th>
                                    <th class="py-3 border-0 small font-weight-bold text-muted uppercase text-center">Ruang</th>
                                    <th class="py-3 border-0 small font-weight-bold text-muted uppercase text-center">Sesi</th>
                                    <th class="px-4 py-3 border-0 small font-weight-bold text-muted uppercase text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (count($pengawas) > 0) : ?>
                                <?php foreach ($pengawas as $peng) : ?>
                                <tr>
                                    <td class="px-4 align-middle">
                                        <div class="font-weight-bold text-dark"><?= singkat_tanggal(date('D, d M Y', strtotime($peng->tgl_mulai))) ?></div>
                                        <div class="small text-muted"><?= $peng->bank_kode ?> <span class="badge badge-soft-primary ml-1"><?= $peng->kode_jenis ?></span></div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="badge badge-light px-3 py-2 border w-75"><?= $ruang[$peng->id_ruang] ?></span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="badge badge-light px-3 py-2 border w-75"><?= $sesi[$peng->id_sesi] ?></span>
                                    </td>
                                    <td class="px-4 text-right align-middle">
                                        <button class="btn btn-sm btn-outline-success rounded-pill px-4 font-weight-bold"
                                                data-id="<?= $peng->id_jadwal ?>"
                                                data-ruang="<?= $peng->id_ruang ?>"
                                                data-sesi="<?= $peng->id_sesi ?>"
                                                onclick="detail(this)">
                                            <i class="fas fa-external-link-alt mr-2"></i> Pantau
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" class="py-5 text-center text-muted">
                                        <i class="fas fa-info-circle fa-2x mb-3 opacity-25"></i>
                                        <p class="mb-0">Tidak ada jadwal pengawas hari ini</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Info -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 1.5rem;">
                <div class="modal-header bg-soft-primary border-0 py-4 px-4" style="background-color: #f0f4f8; border-radius: 1.5rem 1.5rem 0 0;">
                    <h5 class="modal-title font-weight-bold text-primary" id="infoLabel">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Panduan Kode Error
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 border-0 mb-2">
                            <div class="d-flex w-100 align-items-center">
                                <span class="badge badge-danger rounded-lg mr-3 px-3 py-2" style="font-size: 1rem;">001</span>
                                <p class="mb-0 text-dark font-weight-medium">Token salah atau belum digenerate</p>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0 mb-2">
                            <div class="d-flex w-100 align-items-center">
                                <span class="badge badge-warning rounded-lg mr-3 px-3 py-2" style="font-size: 1rem;">002</span>
                                <p class="mb-0 text-dark font-weight-medium">Harus reset izin login perangkat</p>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0 mb-2">
                            <div class="d-flex w-100 align-items-center">
                                <span class="badge badge-info rounded-lg mr-3 px-3 py-2" style="font-size: 1rem;">003</span>
                                <p class="mb-0 text-dark font-weight-medium">Harus reset waktu pengerjaan</p>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0 mb-2">
                            <div class="d-flex w-100 align-items-center">
                                <span class="badge badge-secondary rounded-lg mr-3 px-3 py-2" style="font-size: 1rem;">004</span>
                                <p class="mb-0 text-dark font-weight-medium">Soal belum dibuat atau belum dipilih</p>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0 mb-2">
                            <div class="d-flex w-100 align-items-center">
                                <span class="badge badge-dark rounded-lg mr-3 px-3 py-2" style="font-size: 1rem;">005</span>
                                <p class="mb-0 text-dark font-weight-medium">Browser tidak mendukung/terlalu lama</p>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex w-100 align-items-center">
                                <span class="badge badge-danger rounded-lg mr-3 px-3 py-2" style="font-size: 1rem;">006</span>
                                <p class="mb-0 text-dark font-weight-medium">Internet down atau error pada server</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light btn-block rounded-pill font-weight-bold py-2" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ruangs = JSON.parse('<?=json_encode($ruang)?>');
    const arrRuang = JSON.parse('<?=json_encode($ruangs)?>');

    $(document).ready(function () {
        ajaxcsrf();

        $('.select2').select2({
            theme: 'bootstrap4',
            width: '100%'
        });

        getToken(function (result) {
            getGlobalToken();
        });

        $('#refresh-token').click(function () {
            const btn = $(this);
            btn.find('i').addClass('fa-spin');
            getToken(function (result) {
                getGlobalToken();
                setTimeout(() => btn.find('i').removeClass('fa-spin'), 500);
            });
        });

        function getGlobalToken() {
            if (globalToken != null) {
                const viewToken = $('#token-input');
                if (viewToken.length) viewToken.val(globalToken.token);
                if (globalToken.auto == '1' && adaJadwalUjian != '0') {
                    $('#refresh-token').removeClass('d-none')
                }
            }
        }

        var opsiJadwal = $("#jadwal");
        var opsiRuang = $("#ruang");
        var opsiSesi = $("#sesi");

        opsiJadwal.prepend("<option value='' selected='selected'>Pilih Jadwal</option>");
        opsiRuang.html("<option value='' selected='selected'>Pilih Ruang</option>");
        opsiSesi.html("<option value='' selected='selected'>Pilih Sesi</option>");

        opsiJadwal.change(function () {
            opsiRuang.html("<option value='' selected='selected'>Pilih Ruang</option>");
            if ($(this).val()) {
                $.each(arrRuang, function (k, v) {
                    opsiRuang.append("<option value='"+k+"'>"+ruangs[k]+"</option>");
                })
            }
        });

        opsiRuang.change(function () {
            opsiSesi.html("<option value='' selected='selected'>Pilih Sesi</option>");
            if ($(this).val()) {
                $.each(arrRuang[$(this).val()], function (k, v) {
                    opsiSesi.append("<option value='"+k+"'>"+v.nama_sesi+"</option>");
                })
            }
        });

        $('#detail-pengampu').on('click', function (e) {
            if (opsiRuang.val() && opsiSesi.val() && opsiJadwal.val())
                window.location.href = base_url + 'cbtstatus/status_ruang?ruang=' + opsiRuang.val()
                    + '&sesi=' + opsiSesi.val()
                    + '&jadwal=' + opsiJadwal.val();
            else showDangerToast('Pilih dahulu JADWAL, RUANG dan SESI')
        })
    });

    function detail(e) {
        window.location.href = base_url + 'cbtstatus/status_ruang?ruang=' + $(e).data('ruang')
            + '&sesi=' + $(e).data('sesi')
            + '&jadwal=' + $(e).data('id');
    }
</script>
