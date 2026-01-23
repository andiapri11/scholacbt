<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row px-3 pt-4 pb-5">
                <div class="col-sm-6">
                    <h1 class="text-white font-weight-bold text-shadow">
                        <i class="fas fa-chart-line mr-2"></i> <?= $judul ?>
                    </h1>
                    <p class="text-white-50 small mb-0">Analisis tingkat kesukaran, validitas, dan daya pembeda butir soal.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg mb-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-filter text-primary mr-2"></i>
                        <h6 class="mb-0 font-weight-bold text-dark">Filter Analisis</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Tahun Pelajaran</label>
                            <select name="thn" id="tahun" class="form-control select2">
                                <?php foreach ($tp as $thn) :
                                    $selected = $tp_selected == $thn->id_tp ? 'selected="selected"' : '' ?>
                                    <option value="<?= $thn->id_tp ?>" <?= $selected ?>><?= $thn->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Semester</label>
                            <select name="smt" id="smt" class="form-control select2">
                                <?php foreach ($smt as $sm) :
                                    $selected = $smt_selected == $sm->id_smt ? 'selected="selected"' : '' ?>
                                    <option value="<?= $sm->id_smt ?>" <?= $selected ?>><?= $sm->nama_smt ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Jadwal Ujian</label>
                            <?php
                            echo form_dropdown(
                                'jadwal',
                                $kodejadwal,
                                $jadwal_selected,
                                'id="jadwal" class="form-control select2"'
                            ); ?>
                        </div>
                    </div>
                    <hr class="my-4">
                    <?php
                    if (isset($soals)) :
                        //echo '<pre>';
                        //$atas = array_slice($nilai, 0, 48, true);
                        //$bawah = array_slice($nilai, 49, 48, true);
                        //var_dump($nilai);

                        //echo '<br>';
                        //var_dump($soals);
                        //echo '</pre>';
                        if (isset($soals[1])) :?>
                            <div class="card card-modern border-0 shadow-lg mb-4">
                                <div class="card-header header-blue text-white" style="border-radius: 16px 16px 0 0;">
                                    <h6 class="card-title font-weight-bold mb-0">
                                        <i class="fas fa-list-ol mr-2"></i> Soal Pilihan Ganda
                                    </h6>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-modern-list mb-0">
                                            <thead class="bg-light">
                                            <tr>
                                                <th class="text-center align-middle" style="width: 60px">NO.</th>
                                                <th class="align-middle">DETAIL SOAL & OPSI</th>
                                                <th class="text-center align-middle" style="width: 250px">DISTRIBUSI JAWABAN</th>
                                                <th class="text-center align-middle" style="width: 200px">HASIL ANALISIS</th>
                                            </tr>
                                            </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($soals[1] as $soal) :?>
                                                    <tr>
                                                        <td class="text-center align-middle font-weight-bold text-dark"><?= $no ?></td>
                                                        <td class="align-middle">
                                                            <div class="p-2">
                                                                <div class="mb-3 font-weight-500 text-dark"><?= $soal->soal ?></div>
                                                                <div class="ml-2">
                                                                    <ol type="A" class="mb-0">
                                                                        <li class="mb-1 <?= strtoupper($soal->jawaban ?? '') == 'A' ? 'text-success font-weight-bold' : '' ?>">
                                                                            <?= $soal->opsi_a ?>
                                                                        </li>
                                                                        <li class="mb-1 <?= strtoupper($soal->jawaban ?? '') == 'B' ? 'text-success font-weight-bold' : '' ?>">
                                                                            <?= $soal->opsi_b ?>
                                                                        </li>
                                                                        <?php if ($info->opsi == 3) : ?>
                                                                            <li class="mb-1 <?= strtoupper($soal->jawaban ?? '') == 'C' ? 'text-success font-weight-bold' : '' ?>">
                                                                                <?= $soal->opsi_c ?>
                                                                            </li>
                                                                        <?php elseif ($info->opsi == 4) : ?>
                                                                            <li class="mb-1 <?= strtoupper($soal->jawaban ?? '') == 'C' ? 'text-success font-weight-bold' : '' ?>">
                                                                                <?= $soal->opsi_c ?>
                                                                            </li>
                                                                            <li class="mb-1 <?= strtoupper($soal->jawaban ?? '') == 'D' ? 'text-success font-weight-bold' : '' ?>">
                                                                                <?= $soal->opsi_d ?>
                                                                            </li>
                                                                        <?php else : ?>
                                                                            <li class="mb-1 <?= strtoupper($soal->jawaban ?? '') == 'C' ? 'text-success font-weight-bold' : '' ?>">
                                                                                <?= $soal->opsi_c ?>
                                                                            </li>
                                                                            <li class="mb-1 <?= strtoupper($soal->jawaban ?? '') == 'D' ? 'text-success font-weight-bold' : '' ?>">
                                                                                <?= $soal->opsi_d ?>
                                                                            </li>
                                                                            <li class="mb-1 <?= strtoupper($soal->jawaban ?? '') == 'E' ? 'text-success font-weight-bold' : '' ?>">
                                                                                <?= $soal->opsi_e ?>
                                                                            </li>
                                                                        <?php endif; ?>
                                                                    </ol>
                                                                </div>
                                                                <div class="mt-2 pl-3 border-left border-success">
                                                                    <span class="small text-muted">KUNCI JAWABAN:</span>
                                                                    <span class="badge badge-success px-3 ml-2">OPSI <?= strtoupper($soal->jawaban ?? '') ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="d-flex flex-wrap justify-content-center">
                                                                <?php
                                                                if ($info->opsi == '3') {
                                                                    $opsis = ['a', 'b', 'c'];
                                                                } elseif ($info->opsi == '4') {
                                                                    $opsis = ['a', 'b', 'c', 'd'];
                                                                } else {
                                                                    $opsis = ['a', 'b', 'c', 'd', 'e'];
                                                                }

                                                                foreach ($opsis as $opsi) :
                                                                    $is_correct = strtoupper($opsi ?? '') == strtoupper($soal->jawaban ?? '');
                                                                    $count = isset($soal->jawaban_siswa['jawab_' . $opsi]) ? count($soal->jawaban_siswa['jawab_' . $opsi]) : 0;
                                                                    ?>
                                                                    <div class="m-1 text-center" style="min-width: 60px;">
                                                                        <div class="badge <?= $is_correct ? 'badge-success' : 'badge-soft-danger' ?> rounded-pill px-3 py-1 mb-1" style="font-size: 0.9rem;">
                                                                            <?= strtoupper($opsi ?? '') ?>
                                                                        </div>
                                                                        <div class="small font-weight-bold text-dark"><?= $count ?> <span class="text-xs text-muted font-weight-normal">Siswa</span></div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <?php
                                                            if ($soal->status_kesukaran == 'mudah') {
                                                                $warna = 'badge-soft-success';
                                                            } else if ($soal->status_kesukaran == 'sedang') {
                                                                $warna = 'badge-soft-warning';
                                                            } else {
                                                                $warna = 'badge-soft-danger';
                                                            }

                                                            if ($soal->status_valid == 'Valid') {
                                                                $warna_valid = 'badge-soft-success';
                                                            } else {
                                                                $warna_valid = 'badge-soft-danger';
                                                            }

                                                            if ($soal->daya_pembeda >= 0.70) {
                                                                $warna_daya = 'badge-soft-primary';
                                                            } else if ($soal->daya_pembeda >= 0.40) {
                                                                $warna_daya = 'badge-soft-success';
                                                            } else if ($soal->daya_pembeda >= 0.20) {
                                                                $warna_daya = 'badge-soft-warning';
                                                            } else {
                                                                $warna_daya = 'badge-soft-danger';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="p-2">
                                                                <div class="mb-2">
                                                                    <small class="text-muted text-uppercase d-block mb-1">Kesukaran</small>
                                                                    <span class="badge <?= $warna ?> rounded-pill px-3 py-1">
                                                                        <b><?= $soal->tingkat_kesukaran ?></b> | <?= strtoupper($soal->status_kesukaran) ?>
                                                                    </span>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <small class="text-muted text-uppercase d-block mb-1">Validasi</small>
                                                                    <span class="badge <?= $warna_valid ?> rounded-pill px-3 py-1">
                                                                        <b><?= round($soal->nilai_valid, 2) ?></b> | <?= strtoupper($soal->status_valid) ?>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <small class="text-muted text-uppercase d-block mb-1">Pembeda</small>
                                                                    <span class="badge <?= $warna_daya ?> rounded-pill px-3 py-1">
                                                                        <b><?= round($soal->daya_pembeda, 2) ?></b> | <?= strtoupper($soal->status_daya) ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (isset($soals[2])) : ?>
                            <!-- Todo analisis pg kompleks
                            <div class="card card-success col-md-12 p-0">
                                <div class="card-header">
                                    <h3 class="card-title">Soal Pilihan Ganda Kompleks</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 40px">NO.</th>
                                            <th>SOAL</th>
                                            <th colspan="2" class="text-center" style="width: 300px">ANALISA</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                            $no = 1;
                            foreach ($soals[2] as $soal) :
                                $soal->opsi_a = @unserialize($soal->opsi_a ?? '');
                                $soal->jawaban = @unserialize($soal->jawaban ?? '');
                                ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <?= $soal->soal ?>
                                                    <br>
                                                    <ol type="A">
                                                        <?php foreach ($soal->opsi_a as $abc => $opsi) : ?>
                                                            <li>
                                                                <?= $opsi ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ol>
                                                    <p>JAWABAN: <b><?= strtoupper(implode(", ", $soal->jawaban ?? [''])) ?></b></p>
                                                </td>
                                                <td style="width: 150px">
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            <?php $no++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            -->
                        <?php endif;
                        if (isset($soals[3])) :
                            foreach ($soals[3] as $soal) :
                                $soal->jawaban_siswa = @unserialize($soal->jawaban_siswa ?? '');
                                $soal->jawaban_benar = @unserialize($soal->jawaban_benar ?? '');

                                $soal->jawaban_siswa = json_decode(json_encode($soal->jawaban_siswa));
                                $soal->jawaban_benar = json_decode(json_encode($soal->jawaban_benar));
                                ?>
                                <!-- Todo analisis menjodohkan -->
                            <?php endforeach; endif;
                        if (isset($soals[4])) : ?>
                            <!-- Todo analisis isian singkat -->
                        <?php endif;
                        if (isset($soals[5])) : ?>
                            <!-- Todo analisis uraian -->
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="overlay-modern d-none" id="loading">
                    <div class="loader-modern"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var idJadwal = '<?=$jadwal_selected?>';
    var isSelected = <?= $jadwal_selected == null ? 0 : 1?>;

    function getDetailJadwal(idJadwal) {
        $('#loading').removeClass('d-none');
        $.ajax({
            type: "GET",
            url: base_url + "cbtstatus/getjadwalujianbyjadwal?id_jadwal=" + idJadwal,
            cache: false,
            success: function (response) {
                $('#loading').addClass('d-none');
                console.log(response);
                var selKelas = $('#kelas');
                selKelas.html('');
                selKelas.append('<option value="">Pilih Kelas</option>');
                $.each(response, function (k, v) {
                    if (v != null) {
                        selKelas.append('<option value="' + k + '">' + v + '</option>');
                    }
                });
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
    }

    $(document).ready(function () {
        ajaxcsrf();

        var opsiJadwal = $("#jadwal");
        //var opsiKelas = $("#kelas");
        var opsiThn = $("#tahun");
        var opsiSmt = $("#smt");

        var selected = isSelected === 0 ? "selected='selected'" : "";
        opsiJadwal.prepend("<option value='' " + selected + ">Pilih Jadwal</option>");

        //opsiKelas.prepend("<option value='' "+selected+">Pilih Kelas</option>");

        function loadSoal(jadwal, thn, smt) {
            var empty = jadwal === '';
            if (!empty) {
                $('#loading').removeClass('d-none');
                window.location.href = base_url + 'cbtanalisis?jadwal=' + jadwal + '&thn=' + thn + '&smt=' + smt;
            } else {
                console.log('empty')
            }
        }

        function loadJadwalTahun(thn, smt) {
            $('#loading').removeClass('d-none');
            window.location.href = base_url + "cbtanalisis?&thn=" + thn + "&smt=" + smt;
        }

        opsiSmt.change(function () {
            loadJadwalTahun(opsiThn.val(), $(this).val());
        });

        opsiThn.change(function () {
            loadJadwalTahun($(this).val(), opsiSmt.val());
        });

        opsiJadwal.change(function () {
            console.log($(this).val());
            loadSoal($(this).val(), opsiThn.val(), opsiSmt.val())
            //getDetailJadwal($(this).val(), opsiThn.val(), opsiSmt.val());
        });

        $('#kalkulasi').click(function () {
            console.log('test', base_url + "cbtanalisis/kalkulasi?jadwal=" + opsiJadwal.val());
            $.ajax({
                url: base_url + "cbtanalisis/kalkulasi?jadwal=" + opsiJadwal.val(),
                type: "GET",
                success: function (data) {
                    window.location.reload();
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        });

        $('table tbody tr img').each(function () {
            var curSrc = $(this).attr('src');
            console.log('src', curSrc);
            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                $(this).attr('src', base_url + curSrc);
            } else if (curSrc.indexOf(base_url) === -1) {
                var pathUpload = 'uploads';
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
        });

        opsiThn.select2({theme: 'bootstrap4'});
        opsiSmt.select2({theme: 'bootstrap4'});
        opsiJadwal.select2({theme: 'bootstrap4'});

        /*
        var donutData = {
            labels: [
                'A',
                'B',
                'C',
                'D',
                'E'
            ],
            datasets: [
                {
                    data: [20, 10, 5, 8, 2],
                    backgroundColor: ['#dc3545', '#ffc107', '#28a745', '#17a2b8', '#007bff'],
                }
            ]
        };

        var pieChartCanvas = $('.pieChart').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {display: false},
            plugins: {
                labels: {
                    fontSize: 16,
                    fontColor: '#FFFFFF',
                    render: function (args) {
                        return args.label;// + ' ' + args.percentage + '%';
                    },
                    //position: 'outside'
                }
            },
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        });
        */
    });
</script>
