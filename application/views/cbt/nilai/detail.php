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
                            <i class="fas fa-user-check text-white"></i>
                        </div>
                        <h1 class="text-white font-weight-bold mb-0" style="letter-spacing: -0.5px;"><?= $judul ?></h1>
                    </div>
                    <p class="text-white-50 small mb-0 uppercase tracking-wider font-weight-bold">
                        Detail Hasil Jawaban Siswa
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
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-modern border-0 shadow-lg mb-4">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 border-right">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Informasi Siswa</label>
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td class="text-muted" style="width: 100px">Nama</td>
                                            <td class="font-weight-bold text-dark">: <?= $siswa->nama ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">N I S / NISN</td>
                                            <td>: <?= $siswa->nis ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Kelas</td>
                                            <td>: <?= $siswa->nama_kelas ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">No. Peserta</td>
                                            <td>: <?= $siswa->nomor_peserta ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Sesi / Ruang</td>
                                            <td>: <?= $siswa->kode_sesi ?> / <?= $siswa->kode_ruang ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6 pl-md-4">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Informasi Ujian</label>
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td class="text-muted" style="width: 120px">Mata Pelajaran</td>
                                            <td class="font-weight-bold text-primary">: <?= $info->kode ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Guru Pengampu</td>
                                            <td>: <?= $info->nama_guru ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Jenis Ujian</td>
                                            <td>: <?= $info->kode_jenis ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Tahun Ajaran</td>
                                            <td>: <?= isset($tp_active) ? $tp_active->tahun : "--/--" ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-modern border-0 shadow-lg bg-primary text-white mb-4 overflow-hidden">
                        <div class="card-body p-4 text-center position-relative">
                            <div style="position: absolute; top: -10px; right: -10px; opacity: 0.1;">
                                <i class="fas fa-award fa-6x"></i>
                            </div>
                            <p class="small uppercase tracking-wider font-weight-bold mb-1">Skor Akhir</p>
                            <h1 class="display-3 font-weight-bold mb-0 text-white"><?= round($skor->skor_total, 2) ?></h1>
                            <div class="mt-3">
                                <?php if (isset($skor->dikoreksi) && $skor->dikoreksi) : ?>
                                    <span class="badge badge-light px-3 py-2 rounded-pill shadow-sm">
                                        <i class="fas fa-check-circle text-success mr-1"></i> TERVERIFIKASI
                                    </span>
                                <?php else: ?>
                                    <button class="btn btn-white-translucent btn-sm rounded-pill px-3 shadow-none font-weight-bold" id="btn-marked">
                                        VERIFIKASI SKOR
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card card-modern border-0 shadow-none bg-soft-primary">
                        <div class="card-body py-2 px-4 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="badge badge-primary badge-pill mr-2">PG: <?= round($skor->skor_pg, 2) ?></span>
                                <span class="badge badge-info badge-pill mr-2">PK: <?= round($skor->skor_kompleks, 2) ?></span>
                                <span class="badge badge-warning badge-pill mr-2 text-white">JO: <?= round($skor->skor_jodohkan, 2) ?></span>
                                <span class="badge badge-secondary badge-pill mr-2">IS: <?= round($skor->skor_isian, 2) ?></span>
                                <span class="badge badge-danger badge-pill">ES: <?= round($skor->skor_essai, 2) ?></span>
                            </div>
                            <div class="small text-muted font-italic">
                                <i class="fas fa-info-circle mr-1 text-xs"></i> Klik section di bawah untuk melihat rincian jawaban
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="konten-soal">
                <?php if (isset($soal[1]) && count($soal[1]) > 0) : ?>
                    <div class="card card-modern border-0 shadow-lg mb-4 collapsed-card">
                        <div class="card-header header-blue text-white" style="border-radius: 16px 16px 0 0;">
                            <h6 class="card-title font-weight-bold mb-0">I. PILIHAN GANDA</h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-light border-0 shadow-none mb-4" style="background: rgba(0,0,0,0.02);">
                                <ul class="small mb-0 text-muted">
                                    <li>Bobot soal: <b><?= $info->bobot_pg ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_pg ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_pg / $info->tampil_pg, 2) ?></b>.
                                    </li>
                                    <li>Point soal PG tidak bisa diedit</li>
                                </ul>
                            </div>
                            <div class="table-responsive">
                            <table id="table-pg" class="table table-sm table-modern-list">
                                <thead class="bg-light">
                                <tr>
                                    <th class="text-center align-middle" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle">Soal</th>
                                    <th class="text-center align-middle">Pilihan</th>
                                    <th class="text-center align-middle" style="width: 50px">Jawaban Benar</th>
                                    <th class="text-center align-middle d-none text-muted" style="width: 50px">No. Acak</th>
                                    <th class="text-center align-middle d-none text-muted">Pilihan Acak</th>
                                    <th class="text-center align-middle d-none text-muted" style="width: 50px">Jawaban Siswa Acak</th>
                                    <th class="text-center align-middle" style="width: 50px">Jawaban Siswa</th>
                                    <th class="text-center align-middle" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle" style="width: 50px">
                                        Point<br><span class="badge badge-soft-primary">Max. <?= round($info->bobot_pg / $info->tampil_pg, 2) ?></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[1] as $s) :
                                    $arrAlias = [
                                        ['valAlias' => $s->opsi_alias_a, 'opsi' => $s->opsi_a, 'value' => 'A'],
                                        ['valAlias' => $s->opsi_alias_b, 'opsi' => $s->opsi_b, 'value' => 'B'],
                                    ];

                                    if ($info->opsi == 3) {
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C'];
                                    } elseif ($info->opsi == 4) {
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C'];
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_d, 'opsi' => $s->opsi_d, 'value' => 'D'];
                                    } else {
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C'];
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_d, 'opsi' => $s->opsi_d, 'value' => 'D'];
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_e, 'opsi' => $s->opsi_e, 'value' => 'E'];
                                    }
                                    array_multisort(array_column($arrAlias, 'valAlias'), SORT_ASC, $arrAlias);
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $ns ?></td>
                                        <td><?= $s->soal ?></td>
                                        <td>
                                            <ol type="A">
                                                <li>
                                                    <?= $s->opsi_a ?>
                                                </li>
                                                <li>
                                                    <?= $s->opsi_b ?>
                                                </li>
                                                <?php if ($info->opsi == 3) : ?>
                                                    <li>
                                                        <?= $s->opsi_c ?>
                                                    </li>
                                                <?php elseif ($info->opsi == 4) : ?>
                                                    <li>
                                                        <?= $s->opsi_c ?>
                                                    </li>
                                                    <li>
                                                        <?= $s->opsi_d ?>
                                                    </li>
                                                <?php else : ?>
                                                    <li>
                                                        <?= $s->opsi_c ?>
                                                    </li>
                                                    <li>
                                                        <?= $s->opsi_d ?>
                                                    </li>
                                                    <li>
                                                        <?= $s->opsi_e ?>
                                                    </li>
                                                <?php endif; ?>
                                            </ol>
                                        </td>
                                        <td class="text-center"><?= strtoupper($s->jawaban ?? '') ?></td>
                                        <td class="text-center d-none"><?= $s->no_soal_alias ?></td>
                                        <td class="d-none">
                                            <ol type="A">
                                                <?php foreach ($arrAlias as $alias) : ?>
                                                    <li>
                                                        <?= $alias['opsi'] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ol>
                                        </td>
                                        <td class="text-center d-none"><?= strtoupper($s->jawaban_alias ?? '') ?></td>
                                        <td class="text-center"><?= strtoupper($s->jawaban_siswa ?? '') ?></td>
                                        <td class="text-center"><?= $s->analisa ?></td>
                                        <td class="text-center"><?= $s->point ?></td>
                                    </tr>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="6" class="text-right text-bold">TOTAL SCORE PILIHAN GANDA</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_pg, 2) ?></td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="overlay-modern d-none" id="loading-pg">
                            <div class="loader-modern"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($soal[2]) && count($soal[2]) > 0) : ?>
                    <div class="card card-modern border-0 shadow-lg mb-4">
                        <div class="card-header header-blue text-white" style="border-radius: 16px 16px 0 0;">
                            <h6 class="card-title font-weight-bold mb-0">II. PILIHAN GANDA KOMPLEKS</h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-light border-0 shadow-none mb-4" style="background: rgba(0,0,0,0.02);">
                                <ul class="small mb-0 text-muted">
                                    <li>Bobot soal: <b><?= $info->bobot_kompleks ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_kompleks ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_kompleks / $info->tampil_kompleks, 2) ?></b>.
                                    </li>
                                    <li>Point soal PG Kompleks bisa diedit. Klik <i class="fa fa-pencil text-primary"></i> untuk mengedit point. Klik <i class="fa fa-undo text-warning"></i> untuk reset.</li>
                                    <li>Klik tombol <b>SIMPAN</b> di bawah table untuk menyimpan perubahan.</li>
                                </ul>
                            </div>
                            <div class="table-responsive">
                            <table id="table-pg2" class="table table-sm table-modern-list">
                                <thead class="bg-light">
                                <tr>
                                    <th class="text-center align-middle" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle">Soal</th>
                                    <th class="text-center align-middle">Pilihan</th>
                                    <th class="text-center align-middle" style="width: 50px">Jawaban Benar</th>
                                    <th class="text-center align-middle" style="width: 50px">Jawaban Siswa</th>
                                    <th class="text-center align-middle" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle" style="width: 80px">
                                        Point<br><span class="badge badge-soft-primary">Max. <?= round($info->bobot_kompleks / $info->tampil_kompleks, 2) ?></span>
                                    </th>
                                    <th class="text-center align-middle" style="width: 80px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[2] as $s) :?>
                                    <tr>
                                        <td class="text-center"><?= $ns ?></td>
                                        <td><?= $s->soal ?></td>
                                        <td>
                                            <ol type="A">
                                                <?php foreach ($s->opsi_a as $abc => $opsi) : ?>
                                                    <li>
                                                        <?= $opsi ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ol>
                                        </td>
                                        <td class="text-center"><?= strtoupper(implode(", ", $s->jawaban_benar ?? [''])) ?></td>
                                        <td class="text-center"><?= $s->jawaban_siswa ? strtoupper(implode(", ", $s->jawaban_siswa)) : '' ?></td>
                                        <td class="text-center"><?= $s->analisa ?></td>
                                        <td class="text-center">
                                            <input id="input<?= $s->id_soal_siswa ?>"
                                                   name="input<?= $s->id_soal_siswa ?>"
                                                   value="<?= $s->point ?>"
                                                   type="number" min="0"
                                                   max="<?= round($info->bobot_kompleks / $info->tampil_kompleks, 2) ?>"
                                                   step="0.1"
                                                   style="width: 100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box; display: none"/>
                                            <span class="pg2" data-idsoal="<?= $s->id_soal_siswa ?>"
                                                  id="span<?= $s->id_soal_siswa ?>"><?= $s->point ?></span>
                                        </td>
                                        <td>
                                            <button id="edit<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="edit(<?= $s->id_soal_siswa ?>)"><i
                                                        class="fa fa-pencil"></i>
                                            </button>
                                            <button id="undo<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="undo(<?= $s->id_soal_siswa ?>, <?= $s->point_otomatis ?>)">
                                                <i
                                                        class="fa fa-undo"></i></button>
                                        </td>
                                    </tr>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="6" class="text-right text-bold">TOTAL SCORE PILIHAN GANDA KOMPLEKS</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_kompleks, 2) ?></td>
                                    <td class="text-center">
                                        <button id="pg2"
                                                data-max="<?= round($info->bobot_kompleks / $info->tampil_kompleks, 2) ?>"
                                                class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm font-weight-bold" onclick="simpan(this)">SIMPAN
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="overlay-modern d-none" id="loading-pg2">
                            <div class="loader-modern"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($soal[3]) && count($soal[3]) > 0) : ?>
                    <div class="card card-modern border-0 shadow-lg mb-4">
                        <div class="card-header header-blue text-white" style="border-radius: 16px 16px 0 0;">
                            <h6 class="card-title font-weight-bold mb-0">III. MENJODOHKAN</h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-light border-0 shadow-none mb-4" style="background: rgba(0,0,0,0.02);">
                                <ul class="small mb-0 text-muted">
                                    <li>Bobot soal: <b><?= $info->bobot_jodohkan ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_jodohkan ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_jodohkan / $info->tampil_jodohkan, 2) ?></b>.
                                    </li>
                                    <li>Point soal menjodohkan bisa diedit.</li>
                                </ul>
                            </div>
                            <div class="table-responsive">
                            <table id="table-jodohkan" class="table table-sm table-modern-list">
                                <thead class="bg-light">
                                <tr>
                                    <th class="text-center align-middle" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle">Soal</th>
                                    <th class="text-center align-middle">Jawaban Benar</th>
                                    <th class="text-center align-middle">Jawaban Siswa</th>
                                    <th class="text-center align-middle" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle" style="width: 80px">
                                        Point<br><span class="badge badge-soft-primary">Max. <?= round($info->bobot_jodohkan / $info->tampil_jodohkan, 2) ?></span>
                                    </th>
                                    <th class="text-center align-middle" style="width: 80px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[3] as $s) :
                                    $rows = count($s->tabel_soal)
                                    ?>
                                    <tr>
                                        <td class="text-center" rowspan="<?=$rows?>"><?= $ns ?></td>
                                        <td rowspan="<?=$rows?>"><?= $s->soal ?></td>
                                        <td>
                                            <?php
                                            $jwb = $s->tabel_soal[0];
                                            if ($s->type_soal == '1') :?>
                                                    <span><?= $jwb->title ?></span>
                                                    <?php if (isset($jwb->subtitle)) : ?>
                                                        <ul>
                                                            <?php foreach ($jwb->subtitle as $sub) : ?>
                                                                <li><?= $sub ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php else: ?>
                                                        <br>--
                                                    <?php endif; ?>
                                            <?php else:?>
                                                    <p><?= $jwb->title ?>
                                                        <br><?= isset($jwb->subtitle) ? $jwb->subtitle[0] : '' ?></p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $jwb = isset($s->tabel_jawab[0]) ? $s->tabel_jawab[0] : [];
                                            if ($s->type_soal == '1') :?>
                                                    <span><?= $jwb->title ?? '' ?></span>
                                                    <?php if (isset($jwb->subtitle)) : ?>
                                                        <ul>
                                                            <?php foreach ($jwb->subtitle as $sub) : ?>
                                                                <li><?= $sub ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php else: ?>
                                                        <br>--
                                                    <?php endif; ?>
                                            <?php else:?>
                                                    <p><?= $jwb->title ?? '' ?>
                                                        <br><?= isset($jwb->subtitle) ? $jwb->subtitle[0] : '--' ?></p>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center" rowspan="<?=$rows?>"><?= $s->analisa ?></td>
                                        <td class="text-center" rowspan="<?=$rows?>">
                                            <input id="input<?= $s->id_soal_siswa ?>"
                                                   name="input<?= $s->id_soal_siswa ?>"
                                                   value="<?= $s->point ?>"
                                                   type="number" min="0"
                                                   max="<?= round($info->bobot_jodohkan / $info->tampil_jodohkan, 2) ?>"
                                                   step="0.10"
                                                   style="width: 100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box; display: none"/>
                                            <span class="jodohkan" data-idsoal="<?= $s->id_soal_siswa ?>"
                                                  id="span<?= $s->id_soal_siswa ?>"><?= $s->point ?></span>
                                        </td>
                                        <td rowspan="<?=$rows?>">
                                            <button id="edit<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="edit(<?= $s->id_soal_siswa ?>)"><i
                                                        class="fa fa-pencil"></i>
                                            </button>
                                            <button id="undo<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="undo(<?= $s->id_soal_siswa ?>, <?= $s->point_otomatis ?>)">
                                                <i
                                                        class="fa fa-undo"></i></button>
                                        </td>
                                    </tr>
                                <?php for ($t = 1, $tMax = count($s->tabel_soal); $t < $tMax; $t++):?>
                                <tr>
                                    <td>
                                        <?php
                                        $jwb = $s->tabel_soal[$t];
                                        if ($s->type_soal == '1') : ?>
                                                <span><?= $jwb->title ?></span>
                                                <?php if (isset($jwb->subtitle)) : ?>
                                                    <ul>
                                                        <?php foreach ($jwb->subtitle as $sub) : ?>
                                                            <li><?= $sub ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <br>--
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <p><?= $jwb->title ?>
                                                    <br><?= isset($jwb->subtitle) ? $jwb->subtitle[0] : '' ?></p>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $jwb = $s->tabel_jawab[$t] ?? [];
                                        if ($s->type_soal == '1') : ?>
                                                <span><?= $jwb->title ?? '' ?></span>
                                                <?php if (isset($jwb->subtitle)) : ?>
                                                    <ul>
                                                        <?php foreach ($jwb->subtitle as $sub) : ?>
                                                            <li><?= $sub ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <br>--
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <p><?= $jwb->title ?? '' ?>
                                                    <br><?= isset($jwb->subtitle) ? $jwb->subtitle[0] : '--' ?></p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                    <?php endfor; ?>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="5" class="text-right text-bold">TOTAL SCORE MENJODOHKAN</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_jodohkan, 2) ?></td>
                                    <td class="text-center">
                                        <button id="jodohkan"
                                                data-max="<?= round($info->bobot_jodohkan / $info->tampil_jodohkan, 2) ?>"
                                                class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm font-weight-bold" onclick="simpan(this)">SIMPAN
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="overlay-modern d-none" id="loading-jodohkan">
                            <div class="loader-modern"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($soal[4]) && count($soal[4]) > 0) : ?>
                    <div class="card card-modern border-0 shadow-lg mb-4">
                        <div class="card-header header-blue text-white" style="border-radius: 16px 16px 0 0;">
                            <h6 class="card-title font-weight-bold mb-0">IV. ISIAN SINGKAT</h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-light border-0 shadow-none mb-4" style="background: rgba(0,0,0,0.02);">
                                <ul class="small mb-0 text-muted">
                                    <li>Bobot soal: <b><?= $info->bobot_isian ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_isian ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_isian / $info->tampil_isian, 2) ?></b>.
                                    </li>
                                    <li>Point soal isian singkat bisa diedit.</li>
                                </ul>
                            </div>
                            <div class="table-responsive">
                            <table id="table-isian" class="table table-sm table-modern-list">
                                <thead class="bg-light">
                                <tr>
                                    <th class="text-center align-middle" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle">Soal</th>
                                    <th class="text-center align-middle" style="width: 50px">Jawaban Benar</th>
                                    <th class="text-center align-middle" style="width: 50px">Jawaban Siswa</th>
                                    <th class="text-center align-middle" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle" style="width: 80px">
                                        Point<br><span class="badge badge-soft-primary">Max. <?= round($info->bobot_isian / $info->tampil_isian, 2) ?></span></th>
                                    <th class="text-center align-middle" style="width: 80px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[4] as $s) :?>
                                    <tr>
                                        <td class="text-center"><?= $ns ?></td>
                                        <td><?= $s->soal ?></td>
                                        <td class="text-center"><?= $s->jawaban_benar ?></td>
                                        <td class="text-center"><?= $s->jawaban_siswa ?></td>
                                        <td class="text-center"><?= $s->analisa ?></td>
                                        <td class="text-center">
                                            <input id="input<?= $s->id_soal_siswa ?>"
                                                   name="input<?= $s->id_soal_siswa ?>"
                                                   value="<?= $s->point ?>"
                                                   type="number" min="0"
                                                   max="<?= round($info->bobot_isian / $info->tampil_isian, 2) ?>"
                                                   step="0.1"
                                                   style="width: 100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box; display: none"/>
                                            <span class="isian" data-idsoal="<?= $s->id_soal_siswa ?>"
                                                  id="span<?= $s->id_soal_siswa ?>"><?= $s->point ?></span>
                                        </td>
                                        <td>
                                            <button id="edit<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="edit(<?= $s->id_soal_siswa ?>)"><i
                                                        class="fa fa-pencil"></i>
                                            </button>
                                            <button id="undo<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="undo(<?= $s->id_soal_siswa ?>, <?= $s->point_otomatis ?>)">
                                                <i
                                                        class="fa fa-undo"></i></button>
                                        </td>
                                    </tr>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="5" class="text-right text-bold">TOTAL SCORE ISIAN SINGKAT</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_isian, 2) ?></td>
                                    <td class="text-center">
                                        <button id="isian"
                                                data-max="<?= round($info->bobot_isian / $info->tampil_isian, 2) ?>"
                                                class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm font-weight-bold" onclick="simpan(this)">SIMPAN
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="overlay-modern d-none" id="loading-isian">
                            <div class="loader-modern"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($soal[5]) && count($soal[5]) > 0) : ?>
                    <div class="card card-modern border-0 shadow-lg mb-4">
                        <div class="card-header header-blue text-white" style="border-radius: 16px 16px 0 0;">
                            <h6 class="card-title font-weight-bold mb-0">V. URAIAN</h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-light border-0 shadow-none mb-4" style="background: rgba(0,0,0,0.02);">
                                <ul class="small mb-0 text-muted">
                                    <li>Bobot soal: <b><?= $info->bobot_esai ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_esai ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_esai / $info->tampil_esai) ?></b>.
                                    </li>
                                    <li>Point soal uraian bisa diedit.</li>
                                </ul>
                            </div>
                            <div class="table-responsive">
                            <table id="table-essai" class="table table-sm table-modern-list">
                                <thead class="bg-light">
                                <tr>
                                    <th class="text-center align-middle" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle">Soal</th>
                                    <th class="text-center align-middle" style="width: 50px">Jawaban Benar</th>
                                    <th class="text-center align-middle" style="width: 50px">Jawaban Siswa</th>
                                    <th class="text-center align-middle" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle" style="width: 80px">
                                        Point<br><span class="badge badge-soft-primary">Max. <?= round($info->bobot_esai / $info->tampil_esai) ?></span></th>
                                    <th class="text-center align-middle" style="width: 80px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[5] as $s) :?>
                                    <tr>
                                        <td class="text-center"><?= $ns ?></td>
                                        <td><?= $s->soal ?></td>
                                        <td class="text-center"><?= $s->jawaban_benar ?></td>
                                        <td class="text-center"><?= $s->jawaban_siswa ?></td>
                                        <td class="text-center"><?= $s->analisa ?></td>
                                        <td class="text-center">
                                            <input id="input<?= $s->id_soal_siswa ?>"
                                                   name="input<?= $s->id_soal_siswa ?>"
                                                   value="<?= $s->point ?>"
                                                   type="number" min="0"
                                                   max="<?= round($info->bobot_esai / $info->tampil_esai, 2) ?>"
                                                   step="0.10"
                                                   style="width: 100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box; display: none"/>
                                            <span class="essai" data-idsoal="<?= $s->id_soal_siswa ?>"
                                                  id="span<?= $s->id_soal_siswa ?>"><?= $s->point ?></span>
                                        </td>
                                        <td>
                                            <button id="edit<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="edit(<?= $s->id_soal_siswa ?>)"><i
                                                        class="fa fa-pencil"></i>
                                            </button>
                                            <button id="undo<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="undo(<?= $s->id_soal_siswa ?>, <?= $s->point_otomatis ?>)">
                                                <i class="fa fa-undo"></i></button>
                                        </td>
                                    </tr>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="5" class="text-right text-bold">TOTAL SCORE URAIAN</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_essai, 2) ?></td>
                                    <td class="text-center">
                                        <button id="essai"
                                                data-max="<?= round($info->bobot_esai / $info->tampil_esai, 2) ?>"
                                                class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm font-weight-bold" onclick="simpan(this)">SIMPAN
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="overlay-modern d-none" id="loading-essai">
                            <div class="loader-modern"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?= form_open('update', array('id' => 'koreksi')) ?>
<?= form_close() ?>

<script>
    function edit(id) {
        var input = $(`#input${id}`);
        var span = $(`#span${id}`);
        var btnedit = $(`#edit${id}`);

        if (input.is(":visible")) {
            input.hide();
            span.text(input.val()).show();
            btnedit.html(`<i class="fa fa-pencil"></i>`);
        } else {
            span.hide();
            input.val(span.text()).show();
            btnedit.html(`<i class="fa fa-check"></i>`);
        }
    }

    function undo(id, nilai) {
        var input = $(`#input${id}`);
        var span = $(`#span${id}`);
        input.val(nilai);
        span.text(nilai);
    }

    function simpan(btn) {
        var id = $(btn).attr('id');
        var key;
        if (id === 'pg') {
            key = 'pg_nilai';
        } else if (id === 'pg2') {
            key = 'kompleks_nilai';
        } else if (id === 'jodohkan') {
            key = 'jodohkan_nilai';
        } else if (id === 'isian') {
            key = 'isian_nilai';
        } else if (id === 'essai') {
            key = 'essai_nilai';
        }

        var loading = $(`#loading-${id}`);
        var max = $(btn).data('max');
        var $nilai = $(`#table-${id}`).find(`.${id}`);
        var json = [];
        $.each($nilai, function () {
            var n = $(this).text();
            if (n > max) {
                showDangerToast("Point persoal harus kurang dari " + max);
                json = [];
                return false;
            }
            if ($(this).is(":hidden")) {
                showDangerToast("Klik tombol &#10004; dulu");
                json = [];
                return false;
            }

            var item = {};
            item['id_soal'] = $(this).data('idsoal');
            //item['jenis'] = jenis;
            item['koreksi'] = $(this).text();
            json.push(item);
        });

        var dataPost = $('#koreksi').serialize() + '&siswa=<?=$siswa->id_siswa?>&jadwal=<?=$info->id_jadwal?>&jenis=' + key +
            '&nilai=' + JSON.stringify(json);
        console.log(dataPost);

        if (json.length > 0) {
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
                url: base_url + "cbtnilai/simpankoreksi",
                type: "POST",
                data: dataPost,
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
        }
    }

    $(document).ready(function () {
        $('#konten-soal tbody tr img').each(function () {
            var curSrc = $(this).attr('src');
            var pathUpload = 'uploads';
            if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
            } else {
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
            $(this).css({'max-width': '100px'})
        });

        $('#btn-marked').on('click', function () {
            $(this).attr('disabled', 'disabled');
            var dataPost = $('#koreksi').serialize() + '&siswa=<?=$siswa->id_siswa?>&jadwal=<?=$info->id_jadwal?>';
            console.log(dataPost)
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
                url: base_url + "cbtnilai/tandaikoreksi",
                type: "POST",
                data: dataPost,
                success: function (data) {
                    $('#btn-marked').removeAttr('disabled');
                    console.log(data);
                    if (data.success) {
                        swal.fire({
                            title: "Berhasil",
                            text: "Jawaban berhasil ditandai",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: 'Tidak bisa menandai',
                            icon: "error"
                        });
                    }
                }, error: function (xhr, status, error) {
                    $('#btn-marked').removeAttr('disabled');
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
    
    .badge-soft-primary { background-color: #e0e7ff; color: #4338ca; }
    .badge-soft-success { background-color: #dcfce7; color: #15803d; }
    .badge-soft-warning { background-color: #fef9c3; color: #a16207; }
    .badge-soft-danger { background-color: #fee2e2; color: #b91c1c; }
</style>

