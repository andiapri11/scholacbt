<?php

if (isset($jadwal_ujian)) {
    $ist = json_decode(json_encode($jadwal_ujian->istirahat));
    $jmlIst = json_decode(json_encode(unserialize($ist ?? '')));
    $jmlMapelPerHari = $jadwal_ujian->jml_mapel_hari;
} else {
    $jmlMapelPerHari = 0;
}
?>

<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-calendar-alt mr-2"></i>Jadwal Pelaksanaan Ujian
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('cbtjadwal/add/0') ?>" class="btn btn-sm btn-success px-4 rounded-pill shadow-sm border-0 font-weight-bold mr-2">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah Jadwal
                    </a>
                    <div class="btn-group ml-3">
                        <?php $activeList = $mode == '1' ? 'active' : ''; ?>
                        <?php $activeGrid = $mode == '2' ? 'active' : ''; ?>
                        <a href="<?= base_url('cbtjadwal?mode=1') ?>" class="btn btn-sm btn-outline-light <?= $activeList ?>"><i class="fas fa-list-ul"></i></a>
                        <a href="<?= base_url('cbtjadwal?mode=2') ?>" class="btn btn-sm btn-outline-light <?= $activeGrid ?>"><i class="fas fa-th-large"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="card card-modern border-0 shadow-lg mb-4">
            <div class="card-header bg-white py-4 border-bottom0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                     <h6 class="font-weight-bold text-dark mb-0"><i class="fas fa-filter mr-2 text-primary"></i> Filter & Keterangan</h6>
                     <div class="small text-muted d-flex align-items-center">
                        <span class="mr-2 font-weight-bold uppercase">Keterangan:</span>
                        <span class="badge badge-dot mr-1" style="background-color: #6c757d; width: 10px; height: 10px; display: inline-block; border-radius: 50%;"></span><span class="mr-3 small">Non-Aktif</span>
                        <span class="badge badge-dot mr-1" style="background-color: #e83e8c; width: 10px; height: 10px; display: inline-block; border-radius: 50%;"></span><span class="mr-3 small">Belum Mulai</span>
                        <span class="badge badge-dot mr-1" style="background-color: #6610f2; width: 10px; height: 10px; display: inline-block; border-radius: 50%;"></span><span class="mr-3 small">Aktif</span>
                        <span class="badge badge-dot mr-1" style="background-color: #ffc107; width: 10px; height: 10px; display: inline-block; border-radius: 50%;"></span><span class="mr-3 small">Selesai/Tdk Digunakan</span>
                         <span class="badge badge-dot mr-1" style="background-color: #28a745; width: 10px; height: 10px; display: inline-block; border-radius: 50%;"></span><span class="small">Rekap Nilai</span>
                    </div>
                </div>

                <div class="row align-items-center bg-light rounded-lg p-3 mx-0">
                    <div class="col-md-9 mb-3 mb-md-0">
                         <div class="d-flex align-items-center flex-wrap">
                            <label class="mr-3 mb-0 font-weight-bold text-muted uppercase small">Filter Data:</label>
                             <div class="mr-2 mb-2 mb-md-0" style="min-width: 200px;">
                                <?php echo form_dropdown('f', $filters, $id_filter, 'id="filter" class="form-control select2 border-0 shadow-sm"'); ?>
                             </div>
                             <div id="select-guru" class="mr-2 mb-2 mb-md-0 d-none" style="min-width: 200px;">
                                <?php echo form_dropdown('guru', $gurus, $id_guru, 'id="guru" class="sel form-control select2 border-0 shadow-sm"'); ?>
                            </div>
                            <div id="select-mapel" class="mr-2 mb-2 mb-md-0 d-none" style="min-width: 200px;">
                                <?php echo form_dropdown('mapel', $mapels, $id_mapel, 'id="mapel" class="sel form-control select2 border-0 shadow-sm"'); ?>
                            </div>
                             <div id="select-level" class="mr-2 mb-2 mb-md-0 d-none" style="min-width: 200px;">
                                <?php echo form_dropdown('level', $levels, $id_level, 'id="level" class="sel form-control select2 border-0 shadow-sm"'); ?>
                            </div>
                         </div>
                    </div>
                    <div class="col-md-3 text-right">
                         <?= form_open('', array('id' => 'hapus_semua')) ?>
                            <button id="submit-hapus" type="submit" class="btn btn-outline-danger btn-sm rounded-pill font-weight-bold shadow-none mr-2" disabled>
                                <i class="far fa-trash-alt mr-1"></i> Hapus Terpilih
                            </button>
                            <div class="custom-control custom-checkbox d-inline-block align-middle">
                                <input type="checkbox" class="custom-control-input check-all" id="check-all">
                                <label class="custom-control-label" for="check-all"></label>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
       </div>

            <?php
            if (!isset($jadwals)) : ?>
                <div class="alert alert-default-warning align-content-center pb-0 m-2" role="alert">
                    <ul>
                        <li>
                            Silakan pilih <b>Filter</b> untuk menampilkan JADWAL
                        </li>
                        <li>
                            Memilih filter <b>SEMUA</b> mungkin akan memakan waktu <span class="text-danger text-bold">lebih lama</span>.
                        </li>
                    </ul>
                </div>
            <?php else:
            if (count($jadwals) === 0) : ?>
                <?php if (!isset($tp_active) || !isset($smt_active)) : ?>
                    <div class="alert alert-default-warning align-content-center m-2" role="alert">
                        Tahun Pelajaran atau Semester belum di set
                    </div>
                <?php else: ?>
                    <div class="alert alert-default-warning align-content-center m-2" role="alert">
                        Belum ada jadwal penilaian untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b>
                        Semester: <b><?= $smt_active->smt ?></b>
                    </div>
                <?php endif; ?>
            <?php else:
            ?>
            <div id="konten-jadwal">
                <?php
                if ($mode == '1') :
                    foreach ($jadwals as $title => $arrjadwal) :
                        ?>
                        <div class="card card-modern shadow-sm mb-4">
                            <div class="card-header bg-white py-3 border-bottom">
                                <h3 class="card-title font-weight-bold text-dark"><?= $title ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <?php foreach ($arrjadwal as $lvl => $sjadwal) : ?>
                                <div class="card-body p-0" style="display: block;">
                                    <div class="bg-light p-2 font-weight-bold bordet-bottom pl-3">Kelas: <?= $lvl ?></div>
                                    <div class="table-responsive">
                                        <table class="table table-modern-list w-100 mb-0">
                                            <thead class="bg-white">
                                            <tr>
                                                <th class="text-center align-middle" style="width: 40px">No.</th>
                                                <th class="d-none">Hari/Tanggal</th>
                                                <th class="align-middle">Bank Soal</th>
                                                <th class="align-middle">Mapel</th>
                                                <th class="align-middle">Kelas</th>
                                                <th class="text-center align-middle">Status</th>
                                                <th class="text-center align-middle" style="width: 150px">Aksi</th>
                                                <th class="text-center align-middle" style="width: 40px">
                                                    Check
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $nomer = 1;
                                            $currTgl = '';
                                            foreach ($sjadwal as $jadwal) :?>
                                                <?php
                                                $jk = json_decode(json_encode($jadwal->bank_kelas));
                                                $jumlahKelas = json_decode(json_encode(unserialize($jk ?? '')));

                                                $kelasbank = '';
                                                $no = 1;
                                                foreach ($jumlahKelas as $j) {
                                                    foreach ($kelas as $k) {
                                                        if ($j->kelas_id === $k->id_kelas) {
                                                            $kelasbank .= ' <span class="badge badge-soft-primary mb-1">' . $k->nama_kelas . '</span> ';
                                                            $no++;
                                                        }
                                                    }
                                                }
                                                $startDay = strtotime($jadwal->tgl_mulai);
                                                $endDay = strtotime($jadwal->tgl_selesai);
                                                $today = strtotime(date('Y-m-d'));

                                                $hariMulai = new DateTime($jadwal->tgl_mulai);
                                                $hariSampai = new DateTime($jadwal->tgl_selesai);

                                                $enableEdit = true;
                                                $sedangdikerjakan = 0;
                                                $terpakai = true;
                                                $textStatus = 'text-muted'; // Default for 0
                                                $dotColor = 'bg-secondary';
                                                
                                                if ($jadwal->status == '0') {
                                                    $textStatus = 'text-muted';
                                                    $dotColor = 'bg-secondary';
                                                } else {
                                                    if ($today < $startDay) {
                                                        //belum dimulai
                                                        $textStatus = 'text-pink';
                                                        $dotColor = 'bg-pink';
                                                    } elseif ($today > $endDay) {
                                                        //selesai
                                                        $terpakai = isset($total_siswa[$jadwal->id_jadwal]);
                                                        $dotColor = $terpakai ? 'bg-fuchsia' : 'bg-warning';
                                                        $textStatus = $terpakai ? 'text-fuchsia' : 'text-warning';
                                                        if ($jadwal->rekap == '1') {
                                                            $dotColor = $terpakai ? 'bg-success' : 'bg-warning';
                                                            $textStatus = $terpakai ? 'text-success' : 'text-warning';
                                                        }
                                                    } else {
                                                        //sedang dilaksanakan
                                                        $terpakai = isset($total_siswa[$jadwal->id_jadwal]);
                                                        $dotColor = $terpakai ? 'bg-indigo' : 'bg-warning';
                                                        $textStatus = $terpakai ? 'text-indigo' : 'text-warning';
                                                        $sedangdikerjakan = $terpakai ? 1 : 0;
                                                    }
                                                }

                                                $total_seharusnya = ($jadwal->tampil_pg + $jadwal->tampil_kompleks + $jadwal->tampil_jodohkan + $jadwal->tampil_isian + $jadwal->tampil_esai);
                                                $total_soal = $jadwal->total_soal == 0 ? 'Soal belum dibuat' :
                                                    ($jadwal->total_soal < $total_seharusnya ? 'Soal belum selesai' :
                                                        'Jml. Soal: <b>' . $total_seharusnya . '</b>')

                                                ?>
                                                <?php
                                                if ($currTgl != $jadwal->tgl_mulai) :
                                                    $currTgl = $jadwal->tgl_mulai; ?>
                                                    <tr>
                                                    <td colspan="8"
                                                        class="align-middle bg-light pl-3 text-bold text-dark h6 py-2"><?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_mulai))) ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <tr>
                                                <td class="text-center align-middle"><?= $nomer ?></td>
                                                <td class="align-middle d-none"><?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_mulai))) ?></td>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                     <span class="badge badge-dot <?= $dotColor ?> mr-2" style="width:10px; height:10px; border-radius:50%"></span>
                                                     <span class="font-weight-bold text-dark"><?= $jadwal->bank_kode ?></span>
                                                    </div>
                                                </td>
                                                <td class="align-middle font-weight-bold text-muted"><?= $jadwal->nama_mapel ?></td>
                                                <td class="align-middle"><?= $kelasbank ?></td>
                                                <td class="text-center align-middle p-0"><?= ($jadwal->status === '0') ? '<span class="badge badge-pill badge-secondary">Non Aktif</span>' : '<span class="badge badge-pill badge-success">Aktif</span>' ?></td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-white text-info shadow-none border-0"
                                                       data-toggle="modal" data-target="#detailModal"
                                                       data-jenis="<?= $jadwal->kode_jenis ?>"
                                                       data-kode="<?= $jadwal->bank_kode ?>"
                                                       data-mulai="<?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_mulai))) ?>"
                                                       data-sampai="<?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_selesai))) ?>"
                                                       data-durasi="<?= $jadwal->durasi_ujian ?>"
                                                       data-acaksoal="<?= $jadwal->acak_soal == '1' ? 'Ya' : 'Tidak' ?>"
                                                       data-acakjawaban="<?= $jadwal->acak_opsi == '1' ? 'Ya' : 'Tidak' ?>"
                                                       data-hasiltampil="<?= $jadwal->hasil_tampil == '1' ? 'Ya' : 'Tidak' ?>"
                                                       data-token="<?= $jadwal->token == '1' ? 'Ya' : 'Tidak' ?>"
                                                       data-reset="<?= $jadwal->reset_login == '1' ? 'Ya' : 'Tidak' ?>"
                                                       data-status="<?= ($jadwal->status === '0') ? 'Non Aktif' : 'Aktif' ?>"
                                                       data-rekap="<?= $jadwal->rekap == '1' ? 'Sudah' : 'Belum' ?>"
                                                       data-total="<?= isset($total_siswa[$jadwal->id_jadwal]) ? $total_siswa[$jadwal->id_jadwal] : '0'; ?>"
                                                       data-toggle="tooltip" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <a href="<?= $enableEdit ? base_url('cbtjadwal/add/' . $jadwal->id_jadwal . '?enable=' . $sedangdikerjakan) : '#' ?>"
                                                       class="btn btn-sm btn-white text-warning shadow-none border-0 <?= $enableEdit ? '' : 'disabled' ?>" data-toggle="tooltip" title="Edit Jadwal">
                                                       <i class="fas fa-pencil-alt"></i></a>
                                                    <button class="btn btn-sm btn-white text-danger shadow-none border-0"
                                                            onclick="hapus(<?= $jadwal->id_jadwal ?>)" data-toggle="tooltip" title="Hapus Jadwal"><i
                                                                class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle" style="width: 50px">
                                                    <div class="custom-control custom-checkbox text-center ml-2">
                                                        <input name="checked[]" value="<?= $jadwal->id_jadwal ?>"
                                                               class="custom-control-input check-jadwal" type="checkbox" id="cb-<?= $jadwal->id_jadwal ?>">
                                                        <label class="custom-control-label" for="cb-<?= $jadwal->id_jadwal ?>"></label>
                                                    </div>
                                                </td>
                                                </tr>
                                                <?php $nomer++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else:
                    foreach ($jadwals as $title => $arrjadwal) : ?>
                        <div class="card card-modern shadow-sm mb-4">
                            <div class="card-header bg-white py-3 border-bottom">
                                <h3 class="card-title font-weight-bold text-dark"><?= $title ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <?php foreach ($arrjadwal as $lvl => $sjadwal) : ?>
                                <div class="card-body p-3" style="display: block;">
                                    <div class="alert alert-light font-weight-bold border-0 shadow-sm text-dark mb-3">
                                        <i class="fas fa-users mr-2 text-primary"></i>Kelas: <?= $lvl ?>
                                    </div>
                                    <div class="row">
                                        <?php foreach ($sjadwal as $jadwal) : ?>
                                            <?php
                                            $jk = json_decode(json_encode($jadwal->bank_kelas));
                                            $jumlahKelas = json_decode(json_encode(unserialize($jk ?? '')));
                                            $kelasbank = '';
                                            $no = 1;
                                            foreach ($jumlahKelas as $j) {
                                                foreach ($kelas as $k) {
                                                    if ($j->kelas_id === $k->id_kelas) {
                                                        if ($no > 1) { $kelasbank .= ', '; }
                                                        $kelasbank .= $k->nama_kelas;
                                                        $no++;
                                                    }
                                                }
                                            }
                                            $startDay = strtotime($jadwal->tgl_mulai);
                                            $endDay = strtotime($jadwal->tgl_selesai);
                                            $today = strtotime(date('Y-m-d'));

                                            $enableEdit = true;
                                            $sedangdikerjakan = 0;
                                            $terpakai = true;
                                            
                                            // Determine colors based on status
                                            $headerClass = 'bg-secondary';
                                            $iconClass = 'fa-clock';
                                            $statusText = 'Non Aktif';
                                            
                                            if ($jadwal->status == '0') {
                                                $headerClass = 'bg-secondary';
                                                $iconClass = 'fa-ban';
                                                $statusText = 'Non Aktif';
                                            } else {
                                                if ($today < $startDay) {
                                                    $headerClass = 'bg-pink';
                                                    $iconClass = 'fa-hourglass-start';
                                                    $statusText = 'Belum Dimulai';
                                                } elseif ($today > $endDay) {
                                                    $terpakai = isset($total_siswa[$jadwal->id_jadwal]);
                                                    $headerClass = $terpakai ? 'bg-fuchsia' : 'bg-warning';
                                                    $iconClass = 'fa-check';
                                                    $statusText = 'Selesai';
                                                    if ($jadwal->rekap == '1') {
                                                        $headerClass = $terpakai ? 'bg-success' : 'bg-warning';
                                                        $iconClass = 'fa-file-alt';
                                                        $statusText = 'Sudah Rekap';
                                                    }
                                                } else {
                                                    $terpakai = isset($total_siswa[$jadwal->id_jadwal]);
                                                    $headerClass = $terpakai ? 'bg-indigo' : 'bg-warning';
                                                    $iconClass = 'fa-edit';
                                                    $textStatus = $terpakai ? 'text-indigo' : 'text-warning';
                                                    $sedangdikerjakan = $terpakai ? 1 : 0;
                                                    $statusText = 'Sedang Berlangsung';
                                                }
                                            }

                                            $total_seharusnya = ($jadwal->tampil_pg + $jadwal->tampil_kompleks + $jadwal->tampil_jodohkan + $jadwal->tampil_isian + $jadwal->tampil_esai);
                                            $total_soal = $jadwal->total_soal == 0 ? '<span class="text-danger">Belum dibuat</span>' :
                                                ($jadwal->total_soal < $total_seharusnya ? '<span class="text-warning">Belum selesai</span>' :
                                                    '<b>' . $total_seharusnya . '</b> Soal')
                                            ?>
                                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                                <div class="card h-100 border-0 shadow-sm" style="border-radius: 15px; overflow: hidden; transition: transform 0.2s;">
                                                    <div class="card-header border-0 py-3 <?= $headerClass ?> text-white d-flex justify-content-between align-items-center">
                                                        <h6 class="mb-0 font-weight-bold truncate text-truncate" style="max-width: 80%;" title="<?= $jadwal->nama_mapel ?>"><?= $jadwal->nama_mapel ?></h6>
                                                        <i class="fas <?= $iconClass ?> opacity-50"></i>
                                                    </div>
                                                    <div class="card-body p-3">
                                                        <div class="text-center mb-3">
                                                            <div class="badge badge-light shadow-sm text-wrap p-2 text-muted" style="width: 100%"><?= $jadwal->kode_jenis ?> | <?= $jadwal->bank_kode ?></div>
                                                        </div>
                                                        
                                                        <div class="row small text-muted mb-2">
                                                            <div class="col-6 pr-1 border-right">
                                                                <small class="d-block text-uppercase font-weight-bold" style="font-size: 10px;">Mulai</small>
                                                                <span class="text-dark font-weight-bold" style="font-size: 11px;"><?= singkat_tanggal(date('d M Y', strtotime($jadwal->tgl_mulai))) ?></span>
                                                            </div>
                                                            <div class="col-6 pl-2">
                                                                <small class="d-block text-uppercase font-weight-bold" style="font-size: 10px;">Sampai</small>
                                                                <span class="text-dark font-weight-bold" style="font-size: 11px;"><?= singkat_tanggal(date('d M Y', strtotime($jadwal->tgl_selesai))) ?></span>
                                                            </div>
                                                        </div>

                                                        <ul class="list-group list-group-flush mb-0 small">
                                                            <li class="list-group-item px-0 py-2 d-flex justify-content-between border-bottom-0">
                                                                <span>Durasi</span>
                                                                <span class="font-weight-bold text-dark"><?= $jadwal->durasi_ujian ?> Menit</span>
                                                            </li>
                                                            <li class="list-group-item px-0 py-2 d-flex justify-content-between pt-0 border-bottom-0">
                                                                <span>Jumlah Soal</span>
                                                                <span class="text-right"><?= $total_soal ?></span>
                                                            </li>
                                                            <li class="list-group-item px-0 py-2 d-flex justify-content-between pt-0 border-bottom-0">
                                                                <span>Mengerjakan</span>
                                                                <span class="font-weight-bold text-primary"><?= isset($total_siswa[$jadwal->id_jadwal]) ? $total_siswa[$jadwal->id_jadwal] : '0'; ?> Siswa</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                                                    <div class="card-footer bg-white border-0 p-3 pt-0">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                             <div class="custom-control custom-checkbox">
                                                                <input name="checked[]" value="<?= $jadwal->id_jadwal ?>"
                                                                       class="custom-control-input check-jadwal" type="checkbox" id="grid-cb-<?= $jadwal->id_jadwal ?>">
                                                                <label class="custom-control-label" for="grid-cb-<?= $jadwal->id_jadwal ?>"></label>
                                                            </div>
                                                            <div>
                                                                 <a href="<?= $enableEdit ? base_url('cbtjadwal/add/' . $jadwal->id_jadwal . '?enable=' . $sedangdikerjakan) : '#' ?>"
                                                                   class="btn btn-sm btn-outline-warning rounded-pill font-weight-bold px-3 mr-1 <?= $enableEdit ? '' : 'disabled' ?>" data-toggle="tooltip" title="Edit">
                                                                    <i class="fas fa-pencil-alt small"></i>
                                                                </a>
                                                                <button class="btn btn-sm btn-outline-danger rounded-pill font-weight-bold px-3"
                                                                        onclick="hapus(<?= $jadwal->id_jadwal ?>)" data-toggle="tooltip" title="Hapus">
                                                                    <i class="fas fa-trash small"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                         <div class="text-center">
                                                            <span class="badge badge-light w-100 border text-muted">Kelas: <?= $kelasbank ?></span>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach;
                endif;
                endif;  endif;?>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header bg-light border-bottom-0 py-3">
                <h5 class="modal-title font-weight-bold" id="detailModalLabel">
                    <i class="fas fa-calendar-check mr-2 text-primary"></i> Detail Jadwal Ujian
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="card shadow-none border bg-light mb-3">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                             <div class="text-muted small uppercase font-weight-bold">Jenis Ujian</div>
                             <div class="font-weight-bold text-dark" id="modal_kode_jenis"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-0">
                             <div class="text-muted small uppercase font-weight-bold">Kode Soal</div>
                             <div class="font-weight-bold text-primary" id="modal_bank_kode"></div>
                        </div>
                    </div>
                </div>

                <table class="table table-sm table-borderless table-striped text-sm mb-0">
                    <tr>
                        <td class="text-muted">Mulai</td>
                        <td class="text-right font-weight-bold text-dark" id="modal_mulai"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Sampai</td>
                        <td class="text-right font-weight-bold text-dark" id="modal_sampai"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Durasi</td>
                        <td class="text-right font-weight-bold" id="modal_durasi"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-top"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Acak Soal</td>
                        <td class="text-right font-weight-bold" id="modal_acak_soal"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Acak Jawaban</td>
                        <td class="text-right font-weight-bold" id="modal_acak_opsi"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Hasil Tampil</td>
                        <td class="text-right font-weight-bold" id="modal_hasil_tampil"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Gunakan Token</td>
                        <td class="text-right font-weight-bold" id="modal_token"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Reset Login</td>
                        <td class="text-right font-weight-bold" id="modal_reset"></td>
                    </tr>
                     <tr>
                        <td colspan="2" class="border-top"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Status</td>
                        <td class="text-right font-weight-bold" id="modal_status"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Sudah Rekap</td>
                        <td class="text-right font-weight-bold" id="modal_rekap"></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Mengerjakan</td>
                        <td class="text-right font-weight-bold text-primary" id="modal_total"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer border-top-0 bg-light py-3">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    var idFilter = '<?=$id_filter?>';
    var idMapel = '<?=$id_mapel?>';
    var idLevel = '<?=$id_level?>';
    var idGuru = '<?=$id_guru?>';
    var mode = '<?=$mode?>';

    adaJadwalUjian = '<?=count($ada_ujian)?>';
    localStorage.setItem('ada_jadwal_ujian', adaJadwalUjian);

    $('.btn-disabled').click(function (e) {
        e.preventDefault();
    });

    function hapus(id) {
        swal.fire({
            title: "Anda yakin?",
            text: "Jadwal Ujian akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
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
                    url: base_url + 'cbtjadwal/deletejadwal?id_jadwal=' + id,
                    type: "GET",
                    success: function (respon) {
                        console.log(respon);
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Jadwal Ujian berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menghapus, " + respon.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr, status, error)
                        const err = JSON.parse(xhr.responseText)
                        swal.fire({
                            title: "Error",
                            text: err.Message,
                            icon: "error"
                        });
                    }
                });
            }
        });
    }

    $(document).ready(function () {
        $('.jam').datetimepicker({
            datepicker: false,
            format: 'H:i',
            step: 15,
            minTime: '06:00',
            maxTime: '17:00'
        });

        $('.tgl').datetimepicker({
            i18n: {
                id: {
                    months: [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei',
                        'Juni', 'Juli', 'Agustus', 'September',
                        'Oktober', 'November', 'Desember'
                    ],
                    dayOfWeek: [
                        'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'
                    ]
                }
            },
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            timepicker: false,
            scrollInput: false,
            scrollMonth: false,
            format: 'Y-m-d',
            disabledWeekDays: [0],
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });

        var count = $('#konten-jadwal .check-jadwal').length;

        var selectedF = idFilter == '' ? 'selected' : '';
        var selectedM = idMapel == '' ? 'selected' : '';
        var selectedL = idLevel == '' ? 'selected' : '';

        var opsiFilter = $('#filter')
        var opsiGuru = $('#guru')
        var opsiMapel = $('#mapel')
        var opsiLevel = $('#level')

        opsiFilter.select2();
        opsiGuru.select2();
        opsiMapel.select2();
        opsiLevel.select2();

        opsiFilter.prepend("<option value='' " + selectedF + " disabled='disabled'>Filter berdasarkan:</option>");
        opsiMapel.prepend("<option value='' " + selectedM + " disabled='disabled'>Pilih mapel:</option>");
        opsiLevel.prepend("<option value='' " + selectedL + " disabled='disabled'>Pilih level:</option>");

        function onChangeFilter(type) {
            if (type == '1') {
                $('#select-guru').removeClass('d-none');
                $('#select-mapel').addClass('d-none');
                $('#select-level').addClass('d-none');
            } else if (type == '2') {
                $('#select-guru').addClass('d-none');
                $('#select-mapel').removeClass('d-none');
                $('#select-level').addClass('d-none');
            } else if (type == '3') {
                $('#select-guru').addClass('d-none');
                $('#select-mapel').addClass('d-none');
                $('#select-level').removeClass('d-none');
            } else {
                $('#select-guru').addClass('d-none');
                $('#select-mapel').addClass('d-none');
                $('#select-level').addClass('d-none');
            }
        }

        opsiFilter.on('change', function () {
            var type = $(this).val();
            console.log(type);
            if (type == '0' && idFilter != '0') {
                window.location.href = base_url + 'cbtjadwal?type=0&mode=' + mode;
            } else {
                onChangeFilter(type);
            }
        });

        $('.sel').on('change', function () {
            var id = $(this).val();
            window.location.href = base_url + 'cbtjadwal?id=' + id + '&type=' + opsiFilter.val() + '&mode=' + mode;
        });

        onChangeFilter(opsiFilter.val());

        var unchecked = [];
        var checked = [];

        function findUnchecked() {
            unchecked = [];
            checked = [];
            var count = $('#konten-jadwal .check-jadwal').length;

            $("#konten-jadwal .check-jadwal:not(:checked)").each(function () {
                unchecked.push($(this).val());
            });
            $("#konten-jadwal .check-jadwal:checked").each(function () {
                checked.push($(this).val());
            });
            var countChecked = $("#konten-jadwal .check-jadwal:checked").length;
            $("#check-all").prop("checked", countChecked == count);

            $("#submit-hapus").attr('disabled', countChecked == 0);
        }

        $("#konten-jadwal").on("change", ".check-jadwal", function () {
            findUnchecked();
        });

        $("#check-all").on("click", function () {
            if (count > 0) {
                if (this.checked) {
                    $(".check-jadwal").each(function () {
                        this.checked = true;
                        $("#check-all").prop("checked", true);
                    });
                } else {
                    $(".check-jadwal").each(function () {
                        this.checked = false;
                        $("#check-all").prop("checked", false);
                    });
                }
                findUnchecked()
            }
        });

        $('#hapus_semua').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var dataPost = $(this).serialize() + '&checked=' + JSON.stringify(checked);
            console.log(dataPost);

            swal.fire({
                title: "Anda yakin?",
                text: "Semua Bank Soal yang dipilih akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!"
            }).then(result => {
                if (result.value) {
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
                        url: base_url + 'cbtjadwal/deletealljadwal',
                        type: "POST",
                        data: dataPost,
                        success: function (respon) {
                            console.log(respon);
                            if (respon.status) {
                                swal.fire({
                                    title: "Berhasil",
                                    text: "Jadwal berhasil dihapus",
                                    icon: "success"
                                }).then(result => {
                                    if (result.value) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                swal.fire({
                                    title: "Gagal",
                                    text: "Tidak bisa menghapus, " + respon.message,
                                    icon: "error"
                                });
                            }
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText)
                            const err = JSON.parse(xhr.responseText)
                            swal.fire({
                                title: "Error",
                                text: err.Message,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });

        $('#detailModal').on('show.bs.modal', function (e) {
            var jenis = $(e.relatedTarget).data('jenis');
            var kode = $(e.relatedTarget).data('kode');
            var mulai = $(e.relatedTarget).data('mulai');
            var sampai = $(e.relatedTarget).data('sampai');
            var durasi = $(e.relatedTarget).data('durasi');
            var acak_soal = $(e.relatedTarget).data('acaksoal');
            var acak_jawaban = $(e.relatedTarget).data('acakjawaban');
            var hasil_tampil = $(e.relatedTarget).data('hasiltampil');
            var token = $(e.relatedTarget).data('token');
            var reset = $(e.relatedTarget).data('reset');
            var status = $(e.relatedTarget).data('status');
            var rekap = $(e.relatedTarget).data('rekap');
            var total = $(e.relatedTarget).data('total');

            $('#modal_kode_jenis').html('<b>' + jenis + '</b>');
            $('#modal_bank_kode').html('<b>' + kode + '</b>');
            $('#modal_mulai').html('<b>' + mulai + '</b>');
            $('#modal_sampai').html('<b>' + sampai + '</b>');
            $('#modal_durasi').html('<b>' + durasi + ' menit</b>');
            $('#modal_acak_soal').html('<b>' + acak_soal + '</b>');
            $('#modal_acak_opsi').html('<b>' + acak_jawaban + '</b>');
            $('#modal_hasil_tampil').html('<b>' + hasil_tampil + '</b>');
            $('#modal_token').html('<b>' + token + '</b>');
            $('#modal_reset').html('<b>' + reset + '</b>');
            $('#modal_status').html('<b>' + status + '</b>');
            $('#modal_rekap').html('<b>' + rekap + '</b>');
            $('#modal_total').html('<b>' + total + '</b>');
        });
    })

</script>

<style>
    .card-modern {
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
        overflow: hidden;
    }

    .table-modern-list thead th {
        border-top: none;
        border-bottom: 2px solid #f1f5f9;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        font-weight: 700;
        padding: 1rem 0.75rem;
    }

    .table-modern-list tbody td {
        border-top: 1px solid #f1f5f9;
        vertical-align: middle;
        padding: 1rem 0.75rem;
        color: #334155;
        font-size: 0.95rem;
    }

    .table-modern-list tbody tr:last-child td {
        border-bottom: none;
    }

    .table-modern-list tbody tr:hover {
        background-color: #f8fafc;
    }

    .btn-white {
        background-color: white;
        border: 1px solid #e2e8f0;
        color: #475569;
    }

    .btn-white:hover {
        background-color: #f8fafc;
        border-color: #cbd5e1;
    }
    
    .badge-soft-primary {
        background-color: #e0e7ff;
        color: #4338ca;
        padding: 0.4em 0.8em;
    }
    
    .select2-container--default .select2-selection--single {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        height: 38px;
        padding: 5px;
    }
    
    /* Grid View Specifics */
    .card {
         transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }
    
    .badge-dot {
        height: 10px;
        width: 10px;
        border-radius: 50%;
        display: inline-block;
    }
</style>
