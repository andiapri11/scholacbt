<?php
$allBanksIds = [];
?>
<div class="content-wrapper bg-light">
    <style>
        .dashboard-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 1.5rem 0 3rem 0 !important;
            color: white;
        }
        @media (max-width: 576px) {
            .dashboard-header {
                padding: 3rem 0 2rem 0 !important;
                text-align: center;
            }
            .dashboard-header .text-right {
                text-align: center !important;
                margin-top: 15px !important;
            }
            .dashboard-header .btn {
                display: block;
                width: 100%;
                margin-bottom: 12px !important;
                margin-right: 0 !important;
            }
            .dashboard-header .btn-group {
                display: flex;
                width: 100%;
                margin-left: 0 !important;
                margin-top: 0 !important;
            }
            .dashboard-header .btn-group .btn {
                flex: 1;
                margin-bottom: 0;
            }
            .card-header .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
            }
            .card-header .card-title {
                margin-bottom: 15px;
            }
            .card-header .small.text-muted {
                width: 100%;
                flex-wrap: wrap;
            }
            #row-filter .text-right {
                text-align: left !important;
                margin-top: 15px;
                padding-left: 0;
            }
        }
        .badge-dot {
            width: 10px;
            height: 10px;
            display: inline-block;
            border-radius: 50%;
            vertical-align: middle;
        }
        .card-modern {
            border-radius: 1rem;
        }
    </style>

    <div class="dashboard-header">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-book mr-2"></i>Manajemen Bank Soal & Materi Ujian
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('cbtbanksoal/addBank') ?>" class="btn btn-sm btn-success px-4 rounded-pill shadow-sm border-0 font-weight-bold mr-md-2">
                        <i class="fas fa-plus-circle mr-2"></i> Buat Bank Soal
                    </a>
                    <button type="button" data-toggle="modal" data-target="#openAllBankSoal" class="btn btn-sm btn-info px-4 rounded-pill shadow-sm border-0 font-weight-bold">
                        <i class="far fa-copy mr-2"></i> Salin Bank Soal
                    </button>
                    <div class="btn-group ml-md-3 d-inline-flex">
                        <?php $activeGrid = $mode == '1' ? 'active' : ''; ?>
                        <?php $activeList = $mode == '2' ? 'active' : ''; ?>
                        <a href="<?= base_url('cbtbanksoal?mode=1&id=' . $id_guru) ?>" class="btn btn-sm btn-outline-light <?= $activeGrid ?>"><i class="fas fa-list-ul"></i></a>
                        <a href="<?= base_url('cbtbanksoal?mode=2&id=' . $id_guru) ?>" class="btn btn-sm btn-outline-light <?= $activeList ?>"><i class="fas fa-th-large"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -30px">
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-4 border-bottom">
                <div class="d-flex justify-content-between align-items-md-center">
                    <h6 class="card-title font-weight-bold text-dark mb-2 mb-md-0">
                        <i class="fas fa-layer-group mr-2 text-primary"></i><?= $subjudul ?>
                    </h6>
                    <div class="small text-muted d-flex align-items-center flex-wrap">
                        <span class="mr-2 font-weight-bold uppercase mb-1 mb-md-0">Keterangan:</span>
                        <div class="d-flex align-items-center mb-1 mb-md-0 mr-3">
                            <span class="badge-dot mr-1" style="background-color: #e2e8f0;"></span><span class="small text-nowrap">Bebas</span>
                        </div>
                        <div class="d-flex align-items-center mb-1 mb-md-0 mr-3">
                            <span class="badge-dot mr-1" style="background-color: #fbbf24;"></span><span class="small text-nowrap">Terjadwal</span>
                        </div>
                        <div class="d-flex align-items-center mb-1 mb-md-0">
                            <span class="badge-dot mr-1" style="background-color: #ef4444;"></span><span class="small text-nowrap">Digunakan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row align-items-center bg-light rounded-lg p-3 mb-4 mx-0" id="row-filter">
                    <div class="col-md-9 mb-3 mb-md-0">
                        <div class="d-flex align-items-center flex-wrap">
                            <label class="mr-3 mb-2 mb-md-0 font-weight-bold text-muted uppercase small text-nowrap">Filter Data:</label>
                            <div class="mr-2 mb-2" style="min-width: 180px; flex: 1;">
                                <?php echo form_dropdown(
                                    'f',
                                    $filters,
                                    $id_filter,
                                    'id="filter" class="form-control select2 border-0 shadow-sm"'
                                ); ?>
                            </div>
                            <div id="select-guru" class="d-none mr-2 mb-2" style="min-width: 180px; flex: 1;">
                                <?php echo form_dropdown(
                                    'guru',
                                    $gurus,
                                    $id_guru,
                                    'id="guru" class="sel form-control select2 border-0 shadow-sm"'
                                ); ?>
                            </div>
                            <div id="select-mapel" class="d-none mr-2 mb-2" style="min-width: 180px; flex: 1;">
                                <?php echo form_dropdown(
                                    'mapel',
                                    $mapels,
                                    $id_mapel,
                                    'id="mapel" class="sel form-control select2 border-0 shadow-sm"'
                                ); ?>
                            </div>
                            <div id="select-level" class="d-none mr-2 mb-2" style="min-width: 180px; flex: 1;">
                                <?php echo form_dropdown(
                                    'level',
                                    $levels,
                                    $id_level,
                                    'id="level" class="sel form-control select2 border-0 shadow-sm"'
                                ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-md-right d-flex align-items-center justify-content-between justify-content-md-end">
                        <?= form_open('', array('id' => 'hapus_semua')) ?>
                        <div class="d-flex align-items-center h-100">
                            <button id="submit-hapus" type="submit" class="btn btn-outline-danger btn-sm rounded-pill font-weight-bold shadow-none" disabled>
                                <i class="far fa-trash-alt mr-1"></i> Hapus Terpilih
                            </button>
                            <div class="custom-control custom-checkbox d-inline-block ml-3 align-middle">
                                <input type="checkbox" class="custom-control-input check-all" id="check-all">
                                <label class="custom-control-label" for="check-all"></label>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                <div class="row" id="konten">
                        <?php
                        if ($mode == '1') :
                            if (isset($banks[$tp_active->id_tp]) && isset($banks[$tp_active->id_tp][$smt_active->id_smt]) && count($banks[$tp_active->id_tp][$smt_active->id_smt]) > 0) :?>
                                <table class="table-modern-list w-100">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="50">NO.</th>
                                        <th width="150">KODE BANK</th>
                                        <th>MATA PELAJARAN</th>
                                        <th width="150">KELAS</th>
                                        <th class="text-center">AKSI</th>
                                        <th class="text-center" width="50">
                                            <i class="fas fa-check-double text-muted"></i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($banks[$tp_active->id_tp][$smt_active->id_smt] as $bank): ?>
                                        <?php
                                        $jk = json_decode(json_encode($bank->bank_kelas));
                                        $data = @unserialize($jk ?? '');
                                        $jumlahKelas = json_decode(json_encode($data));
                                        $jks = [];
                                        $kelasbank = '';
                                        foreach ((array)$jumlahKelas as $j) {
                                            foreach ($kelas as $k) {
                                                if ((isset($j->kelas_id) && isset($k->id_kelas)) && $j->kelas_id === $k->id_kelas) {
                                                    $kelasbank .= '<span class="badge badge-soft-primary mr-1 mb-1">' . $k->nama_kelas . '</span> ';
                                                }
                                            }
                                        }
                                        $terpakai = true;
                                        $bgStatus = 'text-danger';
                                        $statusLabel = 'Digunakan';
                                        $disable_edit = 'btn-disabled opacity-50';
                                        if ($bank->digunakan == '0') {
                                            $bgStatus = 'text-muted';
                                            $statusLabel = 'Bebas';
                                            $disable_edit = '';
                                        } else {
                                            $terpakai = isset($total_siswa[$bank->id_bank]);
                                            $bgStatus = $terpakai ? 'text-danger' : 'text-warning';
                                            $statusLabel = $terpakai ? 'Ujian' : 'Jadwal';
                                            $disable_edit = $terpakai ? 'btn-disabled opacity-50' : $disable_edit;
                                        }
                                        ?>
                                        <tr>
                                            <td class="text-center font-weight-bold text-muted"><?= $no ?></td>
                                            <td>
                                                <div class="font-weight-bold text-dark"><?= $bank->bank_kode ?></div>
                                                <small class="text-xs uppercase font-weight-bold <?= $bgStatus ?>"><i class="fas fa-circle fa-xs mr-1"></i><?= $statusLabel ?></small>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-dark"><?= $bank->nama_mapel ?></span>
                                                <div class="small text-muted mt-1"><i class="far fa-file-alt mr-1"></i> Soal: <?= $bank->total_soal ?></div>
                                            </td>
                                            <td><?= $kelasbank ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= $disable_edit == '' ? base_url('cbtbanksoal/editBank?id_bank=' . $bank->id_bank . '&id_guru=' . $bank->id_guru) : 'javascript:void(0)' ?>"
                                                       class="btn btn-sm btn-white text-warning shadow-none <?= $disable_edit ?>"
                                                       style="<?= $disable_edit == '' ? '' : 'cursor: not-allowed' ?>"
                                                       data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <button data-total="<?= $bank->total_soal ?>"
                                                            data-id="<?= $bank->id_bank ?>" onclick="importSoal(this)"
                                                            type="button" <?= $disable_edit == '' ? '' : 'disabled' ?>
                                                            class="btn btn-sm btn-white text-info shadow-none <?= $disable_edit ?>"
                                                            data-toggle="tooltip" title="Import">
                                                        <i class="fas fa-file-import"></i>
                                                    </button>
                                                    <a href="<?= base_url('cbtbanksoal/detail/' . $bank->id_bank) ?>"
                                                       type="button" class="btn btn-sm btn-white text-success shadow-none"
                                                       data-toggle="tooltip" title="<?= $bank->total_soal == 0 ? 'Buat Soal' : 'Lihat Detail' ?>">
                                                        <i class="fas <?= $bank->total_soal == 0 ? 'fa-plus' : 'fa-eye' ?>"></i>
                                                    </a>
                                                    <button data-id="<?= $bank->id_bank ?>"
                                                            data-mapel="<?= $bank->nama_mapel ?>"
                                                            data-level="<?= $bank->bank_level ?>"
                                                            data-essai="<?= $bank->tampil_esai ?>"
                                                            onclick="getSoal(this)" type="button"
                                                            class="btn btn-sm btn-white text-primary shadow-none"
                                                            data-toggle="tooltip" title="Download">
                                                        <i class="fas fa-download"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox text-center ml-2">
                                                    <input name="checked[]" value="<?= $bank->id_bank ?>" class="custom-control-input check-bank" type="checkbox" id="cb_<?= $bank->id_bank ?>">
                                                    <label class="custom-control-label" for="cb_<?= $bank->id_bank ?>"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                    endforeach; ?>
                                    </tbody>
                                </table>
                            <?php elseif (isset($banks[0]) && isset($banks[0][0]) && count($banks[0][0]) > 0) : ?>
                                <table class="w-100 table table-striped table-bordered"
                                       style="height: 300px">
                                    <thead>
                                    <tr>
                                        <th class="text-center align-middle p-0" style="width: 50px"></th>
                                        <th class="text-center align-middle p-0">No.</th>
                                        <th>Kode</th>
                                        <th>Mapel</th>
                                        <th>Kelas</th>
                                        <th class="text-center align-middle p-0"><span>Aksi</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($banks[0][0] as $bank) : ?>
                                        <?php
                                        $jk = json_decode(json_encode($bank->bank_kelas));
                                        $jumlahKelas = json_decode(json_encode(unserialize($jk ?? '')));
                                        $jks = [];

                                        $kelasbank = '';
                                        foreach ($jumlahKelas as $j) {
                                            foreach ($kelas as $k) {
                                                if ((isset($j->kelas_id) && isset($k->id_kelas)) && $j->kelas_id === $k->id_kelas) {
                                                    $kelasbank .= '<span class="badge badge-btn badge-primary">' . $k->nama_kelas . '</span> ';
                                                }
                                            }
                                        }
                                        $terpakai = true;
                                        $bgRandom = 'bg-gradient-maroon';
                                        $disable_edit = 'btn-disabled';
                                        if ($bank->digunakan == '0') {
                                            $bgRandom = 'bg-gradient-gray';
                                            $disable_edit = '';
                                        } else {
                                            $terpakai = isset($total_siswa[$bank->id_bank]);
                                            $bgRandom = $terpakai ? 'bg-gradient-maroon' : 'bg-gradient-yellow';
                                            $disable_edit = $terpakai ? 'btn-disabled' : $disable_edit;
                                        }
                                        ?>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <input name="checked[]" value="<?= $bank->id_bank ?>"
                                                       class="check-bank" type="checkbox"
                                                       style="width: 20px;height: 20px">

                                            </td>
                                            <td class="text-center align-middle"><?= $no ?></td>
                                            <td class="align-middle"><?= $bank->bank_kode ?></td>
                                            <td class="align-middle"><?= $bank->nama_mapel ?></td>
                                            <td class="align-middle"><?= $kelasbank ?></td>
                                            <td class="align-middle">
                                                <span data-toggle="tooltip" title="Edit Bank Soal">
                                                    <a type="button"
                                                       href="<?= $disable_edit == ''
                                                           ? base_url('cbtbanksoal/editBank?id_bank='
                                                               . $bank->id_bank . '&id_guru='
                                                               . $bank->id_guru) : 'javascript:void(0)' ?>"
                                                       class="btn btn-warning btn-sm mb-1 <?= $disable_edit ?>"
                                                       style="<?= $disable_edit == '' ? '' : 'cursor: not-allowed' ?>">
                                                       <i class="fa fa-pencil-alt"></i></a>
                                                </span>
                                                <span data-toggle="tooltip" title="Import Soal">
                                                    <button data-total="<?= $bank->total_soal ?>"
                                                            data-id="<?= $bank->id_bank ?>" onclick="importSoal(this)"
                                                            type="button" <?= $disable_edit == '' ? '' : 'disabled' ?>
                                                            class="btn btn-warning btn-sm mb-1 <?= $disable_edit ?>">
                                                        <i class="fas fa-upload"></i> Import Soal</button>
                                                </span>

                                                <span data-toggle="tooltip" title="Buat Soal">
                                        <a href="<?= base_url('cbtbanksoal/detail/' . $bank->id_bank) ?>"
                                           type="button" class="btn btn-success">
                                            <?php if ($bank->total_soal == 0) : ?>
                                                <i class="fas fa-plus"></i> Buat Soal
                                            <?php else: ?>
                                                <i class="fas fa-eye"></i> Detail Soal
                                            <?php endif; ?>
                                        </a>
                                    </span>

                                                <button data-id="<?= $bank->id_bank ?>"
                                                        data-mapel="<?= $bank->nama_mapel ?>"
                                                        data-level="<?= $bank->bank_level ?>"
                                                        data-essai="<?= $bank->tampil_esai ?>"
                                                        onclick="getSoal(this)" type="button"
                                                        class="btn btn-primary">
                                                    <i class="fas fa-download mr-1"></i> Download Soal<br>
                                                </button>

                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                    endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="col-12 p-0">
                                    <?php
                                    if ($id_filter == '') :?>
                                        <div class="alert alert-default-warning align-content-center pb-0" role="alert">
                                            <ul>
                                                <li>
                                                    Silakan pilih <b>Filter</b> untuk menampilkan BANK SOAL
                                                </li>
                                                <li>
                                                    Memilih filter <b>SEMUA</b> mungkin akan memakan waktu <span class="text-danger text-bold">lebih lama</span>.
                                                </li>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                    <div class="alert alert-default-warning align-content-center" role="alert">
                                        Belum ada BANK SOAL
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif;
                        else:
                            if (isset($banks[$tp_active->id_tp]) && isset($banks[$tp_active->id_tp][$smt_active->id_smt]) && count($banks[$tp_active->id_tp][$smt_active->id_smt]) > 0) :
                                foreach ($banks[$tp_active->id_tp][$smt_active->id_smt] as $bank) :
                                    $terpakai = true;
                                    $bgRandom = 'bg-gradient-maroon';
                                    $disable_edit = 'btn-disabled';
                                    if ($bank->digunakan == '0') {
                                        $bgRandom = 'bg-gradient-gray';
                                        $disable_edit = '';
                                    } else {
                                        $terpakai = isset($total_siswa[$bank->id_bank]);
                                        $bgRandom = $terpakai ? 'bg-gradient-maroon' : 'bg-gradient-yellow';
                                        $disable_edit = $terpakai ? 'btn-disabled' : $disable_edit;
                                    }
                                    ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card border mb-4">
                                            <div class="card-header border-bottom-0 <?= $bgRandom ?>">
                                                <h3 class="card-title mt-1"><b><?= $bank->bank_kode ?></b></h3>
                                                <div class="card-tools">

                                        <span data-toggle="tooltip" title="Edit Bank Soal">
                                                    <a href="<?= $disable_edit == ''
                                                        ? base_url('cbtbanksoal/editBank?id_bank='
                                                            . $bank->id_bank . '&id_guru='
                                                            . $bank->id_guru) : 'javascript:void(0)' ?>"
                                                       class="btn btn-default mr-1 <?= $disable_edit ?>"
                                                       style="<?= $disable_edit == '' ? '' : 'cursor: not-allowed' ?>">
                                                       <i class="fa fa-pencil-alt"></i></a>
                                                </span>
                                                    <button class="btn btn-default">
                                                        <input name="checked[]" value="<?= $bank->id_bank ?>"
                                                               class="check-bank float-left" type="checkbox"
                                                               style="width: 20px;height: 20px">
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <?php
                                                $jk = json_decode(json_encode($bank->bank_kelas));
                                                $jumlahKelas = json_decode(json_encode(unserialize($jk ?? '')));
                                                $jks = [];

                                                $kelasbank = '';
                                                $no = 1;
                                                foreach ($jumlahKelas as $j) {
                                                    foreach ($kelas as $k) {
                                                        if ((isset($j->kelas_id) && isset($k->id_kelas)) && $j->kelas_id === $k->id_kelas) {
                                                            if ($no > 1) {
                                                                $kelasbank .= ', ';
                                                            }
                                                            $kelasbank .= $k->nama_kelas;
                                                            $no++;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item p-1"> Guru
                                                        <span class="float-right"><b><?= $bank->nama_guru ?></b></span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Mapel
                                                        <span class="float-right"><b><?= $bank->bank_kode ?></b></span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Kelas
                                                        <span class="float-right"><b><?= $kelasbank ?></b></span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Jumlah Soal
                                                        <span class="float-right">
											<b><?= $bank->total_soal == 0 ? 'Belum dibuat' : ($bank->total_soal < ($bank->tampil_pg + $bank->tampil_esai) ? 'Belum selesai' : $bank->tampil_pg + $bank->tampil_kompleks + $bank->tampil_jodohkan + $bank->tampil_isian + $bank->tampil_esai) ?></b>
										</span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Dibuat
                                                        <span class="float-right"><b><?= singkat_tanggal(date('d M Y - H:i', strtotime($bank->date))) ?></b></span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Status
                                                        <span class="float-right">
											<b><?= ($bank->status === '0') ? 'Non Aktif' : 'Aktif' ?></b>
										</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row mb-2">
                                        <span class="col-6 text-left" data-toggle="tooltip" title="Buat Soal">
                                                    <button data-total="<?= $bank->total_soal ?>"
                                                            data-id="<?= $bank->id_bank ?>" onclick="importSoal(this)"
                                                            type="button" <?= $disable_edit == '' ? '' : 'disabled' ?>
                                                            class="btn btn-warning <?= $disable_edit ?>">
                                                        <i class="fas fa-upload"></i> Import Soal</button>
										</span>

                                                    <span class="col-6 text-right" data-toggle="tooltip"
                                                          title="Buat Soal">
                                        <a href="<?= base_url('cbtbanksoal/detail/' . $bank->id_bank) ?>"
                                           type="button" class="btn btn-success">
                                            <?php if ($bank->total_soal == 0) : ?>
                                                <i class="fas fa-plus"></i> Buat Soal
                                            <?php else: ?>
                                                <i class="fas fa-eye"></i> Detail Soal
                                            <?php endif; ?>
                                        </a>
                                    </span>
                                                </div>
                                                <div class="row">
                                                    <button data-id="<?= $bank->id_bank ?>"
                                                            data-mapel="<?= $bank->nama_mapel ?>"
                                                            data-level="<?= $bank->bank_level ?>"
                                                            data-essai="<?= $bank->tampil_esai ?>"
                                                            onclick="getSoal(this)" type="button"
                                                            class="btn btn-default w-100">
                                                        <i class="fas fa-download mr-1"></i> Download Soal Untuk
                                                        Siswa<br>
                                                        <small><i>untuk keperluan ujian kertas</i></small>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                            elseif (isset($banks[0]) && isset($banks[0][0]) && count($banks[0][0]) > 0) :
                                foreach ($banks[0][0] as $bank) :?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card border mb-4">
                                            <div class="card-header border-bottom-0 bg-gradient-blue">
                                                <h3 class="card-title mt-1"><b><?= $bank->bank_kode ?></b></h3>
                                                <div class="card-tools">
                                                <span data-toggle="tooltip" title="Edit Bank Soal">
                                                    <a type="button"
                                                       href="<?= base_url('cbtbanksoal/editBank?id_bank=' . $bank->id_bank . '&id_guru=' . $bank->id_guru) ?>"
                                                       class="btn btn-warning btn-sm mr-1"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                </span>
                                                    <button class="btn btn-danger">
                                                        <input name="checked[]" value="<?= $bank->id_bank ?>"
                                                               class="check-bank float-left" type="checkbox"
                                                               style="width: 20px;height: 20px">
                                                    </button>
                                                    <!--
                                                <button onclick="hapus(<?= $bank->id_bank ?>)" type="button"
                                                        class="btn-sm btn btn-danger" data-toggle="tooltip"
                                                        title="Hapus Bank Soal">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                                -->
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <?php
                                                $jk = json_decode(json_encode($bank->bank_kelas));
                                                $jumlahKelas = json_decode(json_encode(unserialize($jk ?? '')));
                                                $jks = [];

                                                $kelasbank = '';
                                                $no = 1;
                                                foreach ($jumlahKelas as $j) {
                                                    foreach ($kelas as $k) {
                                                        if ((isset($j->kelas_id) && isset($k->id_kelas)) && $j->kelas_id === $k->id_kelas) {
                                                            if ($no > 1) {
                                                                $kelasbank .= ', ';
                                                            }
                                                            $kelasbank .= $k->nama_kelas;
                                                            $no++;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item p-1"> Guru
                                                        <span class="float-right"><b><?= $bank->nama_guru ?></b></span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Mapel
                                                        <span class="float-right"><b><?= $bank->kode ?></b></span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Kelas
                                                        <span class="float-right"><b><?= $kelasbank ?></b></span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Jumlah Soal
                                                        <span class="float-right">
											<b><?= $bank->total_soal == 0 ? 'Belum dibuat' : ($bank->total_soal < ($bank->tampil_pg + $bank->tampil_esai) ? 'Belum selesai' : $bank->tampil_pg + $bank->tampil_kompleks + $bank->tampil_jodohkan + $bank->tampil_isian + $bank->tampil_esai) ?></b>
										</span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Dibuat
                                                        <span class="float-right"><b><?= singkat_tanggal(date('d M Y - H:i', strtotime($bank->date))) ?></b></span>
                                                    </li>
                                                    <li class="list-group-item p-1"> Status
                                                        <span class="float-right">
											<b><?= ($bank->status === '0') ? 'Non Aktif' : 'Aktif' ?></b>
										</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row mb-2">
                                        <span class="col-6 text-left" data-toggle="tooltip" title="Buat Soal">
											<a href="javascript:void(0)" data-total="<?= $bank->total_soal ?>"
                                               data-id="<?= $bank->id_bank ?>" onclick="importSoal(this)"
                                               type="button" class="btn btn-warning">
												<i class="fas fa-upload"></i> Import Soal
											</a>
										</span>

                                                    <span class="col-6 text-right" data-toggle="tooltip"
                                                          title="Buat Soal">
                                        <a href="<?= base_url('cbtbanksoal/detail/' . $bank->id_bank) ?>"
                                           type="button" class="btn btn-success">
                                            <?php if ($bank->total_soal == 0) : ?>
                                                <i class="fas fa-plus"></i> Buat Soal
                                            <?php else: ?>
                                                <i class="fas fa-eye"></i> Detail Soal
                                            <?php endif; ?>
                                        </a>
                                    </span>
                                                </div>
                                                <div class="row">
                                                    <button data-id="<?= $bank->id_bank ?>"
                                                            data-mapel="<?= $bank->nama_mapel ?>"
                                                            data-level="<?= $bank->bank_level ?>"
                                                            data-essai="<?= $bank->tampil_esai ?>"
                                                            onclick="getSoal(this)" type="button"
                                                            class="btn btn-primary w-100">
                                                        <i class="fas fa-download mr-1"></i> Download Soal Untuk
                                                        Siswa<br>
                                                        <small><i>untuk keperluan ujian kertas</i></small>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                            else: ?>
                                <div class="col-12 p-0">
                                <?php
                                if ($id_filter == '') :?>
                                    <div class="alert alert-default-warning align-content-center pb-0" role="alert">
                                        <ul>
                                            <li>
                                                Silakan pilih <b>Filter</b> untuk menampilkan BANK SOAL
                                            </li>
                                            <li>
                                                Memilih filter <b>SEMUA</b> mungkin akan memakan waktu <span class="text-danger text-bold">lebih lama</span>.
                                            </li>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-default-warning align-content-center" role="alert">
                                        Belum ada BANK SOAL
                                    </div>
                                <?php endif; ?>
                                </div>
                            <?php endif; endif; ?>
                    </div>
                </div>
            </div>

            <div id="for-siswa" class="d-none" style="width: 100%">
                <table id="table-header-print" style="width: 100%">
                    <tr>
                        <td>
                            <img id="prev-logo-kiri-print" src="<?= base_url() . $setting->logo_kiri ?>" width="80px"
                                 height="80px">
                        </td>
                        <td class="text-center" style="text-align: center;">
                            <div class="text-center" id="jenis-ujian"
                                 style="line-height: 1.1; font-family: 'Times New Roman'; font-size: 16pt"></div>
                            <div class="text-center"
                                 style="line-height: 1.1; font-family: 'Times New Roman'; font-size: 14pt">
                                <b><?= $setting->sekolah ?></b></div>
                            <div class="text-center"
                                 style="line-height: 1.2; font-family: 'Times New Roman'; font-size: 13pt">
                                <b>KECAMATAN <?= strtoupper($setting->kecamatan ?? '') . ' KABUPATEN ' . strtoupper($setting->kota ?? '') ?></b>
                            </div>
                            <div class="text-center"
                                 style="line-height: 1.2; font-family: 'Times New Roman'; font-size: 12pt"><b>TAHUN
                                    PELAJARAN: <?= strtoupper($tp_active->tahun ?? '') . ' SEMESTER ' . strtoupper($smt_active->smt ?? '') ?></b>
                            </div>
                        </td>
                        <td>
                            <img id="prev-logo-kanan-print" src="<?= base_url() . $setting->logo_kanan ?>" width="80px"
                                 height="80px">
                        </td>
                    </tr>
                </table>
                <hr style="border: 1px solid; margin-bottom: 6px; margin-top: 0px">
                <br>
                <p><b>I. Soal Pilihan Ganda</b></p>
                <ol id="list-pg">
                </ol>

                <p>&nbsp;</p>
                <p><b>II. Soal Pilihan Ganda Kompleks</b></p>
                <ol id="list-pg2">
                </ol>

                <p>&nbsp;</p>
                <p><b>II. Soal Menjodohkan</b></p>
                <ol id="list-jodohkan">
                </ol>

                <p>&nbsp;</p>
                <p><b>II. Soal Isian Singkat</b></p>
                <ol id="list-isian">
                </ol>

                <p>&nbsp;</p>
                <p><b>II. Soal Uraian / Essai</b></p>
                <ol id="list-essai">
                </ol>

                <table id="jawaban-soal-siswa">
                </table>
            </div>

        </div>
    </section>
</div>

<div class="modal fade" id="openAllBankSoal" tabindex="-1" role="dialog" aria-labelledby="openBankSoalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                if ($id_filter == '1') {
                    $title = 'Bank Soal (' . $gurus[$id_guru] . ')';
                } elseif ($id_filter == '2') {
                    $title = 'Bank Soal (' . $mapels[$id_mapel] . ')';
                } elseif ($id_filter == '3') {
                    $title = 'Bank Soal Kelas ' . $levels[$id_level];
                } else {
                    $title = 'Semua Bank Soal';
                }
                ?>
                <h5 class="modal-title" id="openBankSoalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                //var_dump($banks);
                $allBanks = [];
                foreach ($tp as $thn) {
                    foreach ($smt as $sem) {
                        if (isset($banks[$thn->id_tp]) && isset($banks[$thn->id_tp][$sem->id_smt])) {
                            $allBanks[] = [
                                'tahun' => $thn->tahun . ' SMT ' . $sem->smt,
                                'banks' => $banks[$thn->id_tp][$sem->id_smt]
                            ];
                        }
                        /*
                        if ($thn->id_tp != $tp_active->id_tp && $sem->id_smt != $smt_active->id_smt) {
                            if (isset($banks[$thn->id_tp]) && isset($banks[$thn->id_tp][$sem->id_smt])) {
                                //$arrBank[] = $banks[$thn->id_tp][$sem->id_smt];
                                $allBanks[] = [
                                    'tahun' => $thn->tahun . ' SMT ' . $sem->smt,
                                    'banks' => $banks[$thn->id_tp][$sem->id_smt]
                                ];
                            }
                        }
                        */
                    }
                }
                usort($allBanks, function ($a, $b) {
                    return $b['tahun'] <=> $a['tahun'];
                });
                //echo '<pre>';
                //var_dump($allBanks);
                //echo '</pre>';

                if (count($allBanks) > 0) :
                    foreach ($allBanks as $allBank) :?>
                        <p><?= $allBank['tahun'] ?></p>
                        <table id="tableEkstra"
                               class="w-100 table table-striped table-bordered table-hover table-head-fixed overflow-auto display nowrap"
                               style="height: 300px">
                            <thead>
                            <tr>
                                <th class="text-center align-middle p-0">No.</th>
                                <th>Kode</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>TP/SMT</th>
                                <th class="text-center align-middle p-0" style="width: 100px"><span>Aksi</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($allBank['banks'] as $ab) :
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $ab->bank_kode ?></td>
                                    <td><?= $ab->nama_mapel ?></td>
                                    <td><?= $ab->bank_level ?></td>
                                    <td><?= $allBank['tahun'] ?></td>
                                    <td>
                                        <button onclick="copy(<?= $ab->id_bank ?>)" type="button"
                                                class="btn btn-sm btn-success"><i class="fa fa-copy"></i> Copy
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                            endforeach; ?>
                            </tbody>
                        </table>
                    <?php endforeach; else: ?>
                    <div class="alert alert-default-info align-content-center" role="alert">
                        tidak ada materi sebelumnya
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/jquery.wordexport.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>

<script>
    var idFilter = '<?=$id_filter?>';
    var idMapel = '<?=$id_mapel?>';
    var idLevel = '<?=$id_level?>';
    var idGuru = '<?=$id_guru?>';
    var mode = '<?=$mode?>';

    $(document).ready(function () {
        ajaxcsrf();

        var count = $('#konten .check-bank').length;
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
                window.location.href = base_url + 'cbtbanksoal?type=0&mode=' + mode;
            } else {
                onChangeFilter(type);
            }
        });

        $('.sel').on('change', function () {
            var id = $(this).val();
            window.location.href = base_url + 'cbtbanksoal?id=' + id + '&type=' + opsiFilter.val() + '&mode=' + mode;
        });
        /*
		$('#guru').on('change', function () {
			idGuru = $(this).val();
			window.location.href = base_url + 'cbtbanksoal?id=' + idGuru;
		});
		*/

        onChangeFilter(opsiFilter.val());

        var unchecked = [];
        var checked = [];

        function findUnchecked() {
            unchecked = [];
            checked = [];

            $("#konten .check-bank:not(:checked)").each(function () {
                unchecked.push($(this).val());
            });
            $("#konten .check-bank:checked").each(function () {
                checked.push($(this).val());
            });
            var countChecked = $("#konten .check-bank:checked").length;
            $("#check-all").prop("checked", countChecked == count);

            $("#submit-hapus").attr('disabled', countChecked == 0);
        }

        $("#konten").on("change", ".check-bank", function () {
            findUnchecked();
        });

        $("#check-all").on("click", function () {
            if (count > 0) {
                if (this.checked) {
                    $(".check-bank").each(function () {
                        this.checked = true;
                        $("#check-all").prop("checked", true);
                    });
                } else {
                    $(".check-bank").each(function () {
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

            var dataPost = $(this).serialize() + "&ids=" + JSON.stringify(checked);
            console.log(dataPost);
            if (checked.length == 0) {
                swal.fire({
                    title: "",
                    text: "Pilih Bank Soal yang akan dihapus",
                    icon: "warning"
                });
                return;
            }

            swal.fire({
                title: "Anda yakin?",
                text: "Semua Bank Soal yang saat ini ditampilkan akan dihapus!",
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
                        url: base_url + 'cbtbanksoal/deleteallbank',
                        type: "POST",
                        data: dataPost,
                        success: function (respon) {
                            if (respon.status) {
                                swal.fire({
                                    title: "Berhasil",
                                    text: "Semua Bank soal berhasil dihapus",
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
                        error: function () {
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
        })
    });

    function filterBy() {
        console.log('find', $('#filter-by').val());
        $('.card').show();
        var filter = $('#filter-by').val(); // get the value of the input, which we filter on
        $('#konten').find(".card-body:not(:contains(" + filter + "))").parent().parent().css('display', 'none');
    }

    function getSoal(e) {
        var id = $(e).data('id');
        var level = $(e).data('level');
        var mapel = $(e).data('mapel');
        var jmlEssai = $(e).data('essai');
        $.ajax({
            url: base_url + 'cbtbanksoal/getsoalsiswa/' + id,
            type: "GET",
            success: function (respon) {
                console.log(respon);
                if (respon.soal.length > 0) {
                    var pg1 = '';
                    var pg2 = '';
                    var jodoh = '';
                    var isian = '';
                    var essais = '';

                    var jwbnPgSiswa = '<tr>' +
                        '    <td colspan="3" class="pt-2">Jawaban Pilihan Ganda</td>' +
                        '</tr>';
                    var jwbnPg2Siswa = '<tr>' +
                        '    <td colspan="3" class="pt-2">Jawaban Pilihan Ganda Kompleks</td>' +
                        '</tr>';
                    var jwbnJodohkanSiswa = '<tr>' +
                        '    <td colspan="3">Jawaban Menjodohkan</td>' +
                        '</tr>';
                    var jwbnIsianSiswa = '<tr>' +
                        '    <td colspan="3">Jawaban Isian Singkat</td>' +
                        '</tr>';
                    var jwbnEssaiSiswa = '<tr>' +
                        '    <td colspan="3">Jawaban Uraian</td>' +
                        '</tr>';

                    $.each(respon.soal, function (i, v) {
                        if (v.jenis == '1') {
                            jwbnPgSiswa += '<tr>' +
                                '<td class="align-top" style="width: 30px"><b>' + v.nomor_soal + '.</b><td>' +
                                '<td>' + v.jawaban + '<td>' +
                                '</tr>';

                            pg1 += '<li style="margin-bottom: 12px">' +
                                v.soal +
                                '<ol type="a">' +
                                '<li>' + v.opsi_a + '</li>' +
                                '<li>' + v.opsi_b + '</li>' +
                                '<li>' + v.opsi_c + '</li>' +
                                '<li>' + v.opsi_d + '</li>';
                            if ('<?=$setting->jenjang?>' === '3') {
                                pg1 += '<li>' + v.opsi_e + '</li>';
                            }
                            pg1 += '</ol>' + '</li>';

                        } else if (v.jenis == '2') {
                            jwbnPg2Siswa += '<tr>' +
                                '<td class="align-top" style="width: 30px"><b>' + v.nomor_soal + '.</b><td>' +
                                '<td>' + v.jawaban + '<td>' +
                                '</tr>';

                            pg2 += '<li style="padding-bottom: 12px">' + v.soal +
                                '<ol type="a">';
                            $.each(v.opsi_a, function (abjad, opsi) {
                                pg2 += '<li>' + opsi + '</li>';
                            });
                            pg2 += '</ol>' + '</li>';
                        } else if (v.jenis == '3') {
                            var jawaban = '<table class="mb-3" style="width:100%; border: 1px solid black; border-collapse: collapse; border-spacing: 0;">';
                            $.each(v.jawaban.jawaban, function (i, kolom) {
                                var bgkol = i === 0 ? 'lightgrey' : 'white';
                                jawaban += '<tr style="background: ' + bgkol + '">';
                                $.each(kolom, function (row, td) {
                                    var val = td === "1" ? "✔" : (td === "0" || td === "#" ? "" : td);
                                    var bg = row === 0 ? ' background: lightgrey;' : '';
                                    jawaban += '<td style="border: 1px solid black;border-collapse: collapse; text-align: center;' + bg + '">' + val + '</td>';
                                });
                                jawaban += '</tr>';
                            });
                            jawaban += '</table>';
                            jwbnJodohkanSiswa += '<tr>' +
                                '<td class="align-top" style="width: 30px"><b>' + v.nomor_soal + '.</b><td>' +
                                '<td>'
                                + jawaban +
                                '<td>' +
                                '</tr>';

                            jodoh += '<li style="padding-bottom: 12px">' + v.soal +
                                '<table style="width:100%; border: 1px solid black; border-collapse: collapse; border-spacing: 0;">';
                            $.each(v.jawaban.jawaban, function (i, kolom) {
                                var bgkol = i === 0 ? 'lightgrey' : 'white';
                                jodoh += '<tr style="background: ' + bgkol + '">';
                                $.each(kolom, function (row, td) {
                                    var val = td === "0" || td === "1" || td === "#" ? "" : td;
                                    var bg = row === 0 ? ' background: lightgrey;' : '';
                                    jodoh += '<td style="border: 1px solid black;border-collapse: collapse; text-align: center;' + bg + '">' + val + '</td>';
                                });
                                jodoh += '</tr>';
                            });
                            jodoh += '</table></li>';
                        } else if (v.jenis == '4') {
                            jwbnIsianSiswa += '<tr>' +
                                '<td class="align-top" style="width: 30px"><b>' + v.nomor_soal + '.</b><td>' +
                                '<td>' + v.jawaban + '<td>' +
                                '</tr>';
                            isian += '<li style="padding-bottom: 12px; display: flex; align-items: baseline;">' +
                                '<span style="margin-right: 12px; padding: 0;">' + v.soal + '</span>' +
                                '<span style="flex: 1; overflow: hidden; margin: 0; padding: 0;">.............' +
                                '......................................</span></li>';
                        } else if (v.jenis == '5') {
                            jwbnEssaiSiswa += '<tr>' +
                                '<td class="align-top" style="width: 30px"><b>' + v.nomor_soal + '.</b><td>' +
                                '<td>' + v.jawaban + '<td>' +
                                '</tr>';
                            essais += '<li style="padding-bottom: 24px;"><section style="display: flex; align-items: baseline; margin-bottom: 8px">' +
                                '<span style="margin-right: 12px; padding: 0;">' + v.soal + '</span>' +
                                '<span style="flex: 1; overflow: hidden;">.............' +
                                '.............................................................................' +
                                '.............................................................................' +
                                '.............................................................................</span></section>';
                            for (let j = 0; j < 5; j++) {
                                essais += '<section style="display: flex; align-items: baseline; margin-bottom: 8px">' +
                                    '<span style="flex: 1; overflow: hidden;">.............' +
                                    '.............................................................................' +
                                    '.............................................................................' +
                                    '.............................................................................' +
                                    '.......................' +
                                    '</span></section>';
                            }
                            essais += '</li>';
                        } else {
                            //
                        }
                    });

                    $('#list-pg').html(pg1);
                    $('#list-pg2').html(pg2);
                    $('#list-jodohkan').html(jodoh);
                    $('#list-isian').html(isian);
                    $('#list-essai').html(essais);

                    $('#jawaban-soal-siswa').html(jwbnPgSiswa + jwbnPg2Siswa + jwbnJodohkanSiswa + jwbnIsianSiswa + jwbnEssaiSiswa);

                    $('#list-essai p').css({padding: 0, margin: 0});

                    $('#for-siswa img').each(function () {
                        var curSrc = $(this).attr('src');
                        if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                            $(this).attr('src', base_url + curSrc);
                        } else if (curSrc.indexOf(base_url) === -1) {
                            var pathUpload = 'uploads';
                            var forReplace = curSrc.split(pathUpload);
                            $(this).attr('src', base_url + pathUpload + forReplace[1]);
                        }
                        /*
                        var curSrc = $(this).attr('src');
                        if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                            $(this).attr('src', base_url + curSrc);
                        }
                        */
                    });

                    setTimeout(function () {
                        $("#for-siswa").wordExport(`Soal ${mapel} Kls ${level}`);
                    }, 500);

                } else {
                    swal.fire({
                        title: "Gagal",
                        text: "Tidak bisa mendownload soal",
                        icon: "error"
                    });
                }
            },
            error: function () {
                const err = JSON.parse(xhr.responseText)
                swal.fire({
                    title: "Error",
                    text: err.Message,
                    icon: "error"
                });
            }
        });
    }

    function exportWord(mapel, level) {
        var contentDocument = $('#for-siswa').convertToHtmlFile('ekspor', '');
        var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
        var converted = htmlDocx.asBlob(
            content, {
                orientation: 'portrait',
                size: 'A4',
                margins: {
                    top: 700,
                    bottom: 700,
                    left: 700,
                    right: 700
                }
            });

        saveAs(converted, 'Soal ' + mapel + ' Kls ' + level + '.docx');
    }

    function importSoal(btn) {
        var idBank = $(btn).data('id');
        var total = $(btn).data('total');
        if (total > 0) {
            swal.fire({
                title: "Import Soal?",
                html: "Soal sudah ada, mengimport soal baru akan menghapus soal terdahulu.<br>Lanjutkan import soal?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Lanjut"
            }).then(result => {
                if (result.value) {
                    window.location.href = base_url + 'cbtbanksoal/importsoal/' + idBank;
                }
            });
        } else {
            window.location.href = base_url + 'cbtbanksoal/importsoal/' + idBank;
        }
    }

    function hapus(id) {
        swal.fire({
            title: "Anda yakin?",
            text: "Bank Soal akan dihapus!",
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
                    url: base_url + 'cbtbanksoal/deleteBank?id_bank=' + id,
                    //data: {id_bank: id},
                    type: "GET",
                    success: function (respon) {
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Bank soal berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.reload();
                                    //window.location.href = base_url + 'cbtbanksoal?id=' + idGuru;
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
                    error: function () {
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

    function copy(id) {
        swal.fire({
            title: "Copi Bank Soal?",
            text: " Bank Soal ini akan dicopy",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Copy"
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
                    url: base_url + 'cbtbanksoal/copybanksoal/' + id,
                    type: "GET",
                    success: function (respon) {
                        if (respon) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Bank Soal berhasil dicopy",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.reload();
                                }
                            })
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa mengcopy materi",
                                icon: "error"
                            });
                        }
                    },
                    error: function () {
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

</script>
</div>
