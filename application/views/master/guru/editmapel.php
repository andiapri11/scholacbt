<div class="content-wrapper bg-light">
    <style>
        .dashboard-header {
            background: #4e73df;
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            padding: 1.5rem 0 4rem 0 !important;
        }
        .header-title {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #fff;
        }
        .card-custom {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
        .card-custom .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem 1.25rem;
        }
        .card-custom .card-title {
            color: #4e73df;
            font-weight: 700;
            margin: 0;
            font-size: 1rem;
        }
        .alert-info-custom {
            background-color: #f8f9fc;
            border: 1px solid #e3e6f0;
            border-radius: 0.5rem;
        }
        .label-custom {
            font-size: 0.8rem;
            font-weight: 700;
            color: #5a5c69;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }
        .select2-container--bootstrap4 .select2-selection {
            border: 1px solid #d1d3e2 !important;
            border-radius: 0.35rem !important;
        }
        .btn-icon-split {
            padding: 0;
            overflow: hidden;
            display: inline-flex;
            align-items: stretch;
            justify-content: center;
        }
        .btn-icon-split .icon {
            background: rgba(0, 0, 0, 0.15);
            padding: 0.375rem 0.75rem;
        }
        .btn-icon-split .text {
            padding: 0.375rem 0.75rem;
        }
        .badge-subtle {
            background-color: #f8f9fc;
            border: 1px solid #e3e6f0;
            color: #4e73df;
            font-weight: 600;
            padding: 0.25rem 0.5rem;
        }
    </style>

    <div class="dashboard-header text-center">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-auto">
                    <a href="<?= base_url('dataguru') ?>" class="btn btn-sm btn-light shadow-sm rounded-pill px-3">
                        <i class="fas fa-chevron-left mr-1"></i> Kembali
                    </a>
                </div>
                <div class="col text-center">
                    <h3 class="header-title mb-0"><?= $judul ?></h3>
                    <p class="text-white-50 small mb-0 font-weight-bold uppercase">Atur Hak Akses & Penugasan</p>
                </div>
                <div class="col-auto" style="width: 100px"></div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -2.5rem">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom mb-4">
                    <div class="card-body p-4">
                        <div class="alert alert-info-custom d-flex align-items-center mb-0 px-4 py-3">
                            <div class="mr-3 text-primary">
                                <i class="fas fa-info-circle fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="font-weight-bold mb-1">Informasi Import Semester</h6>
                                <p class="mb-0 text-gray-800 small">Anda dapat menyalin pengaturan jabatan dan mata pelajaran dari semester sebelumnya untuk guru ini.</p>
                            </div>
                            <div class="ml-auto">
                                <button type="button" data-toggle="modal" data-target="#beforeModal" class="btn btn-primary btn-sm font-weight-bold rounded-pill shadow-sm px-3">
                                    <i class="fas fa-copy mr-1"></i> Lihat History
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <?= form_open('dataguru/saveJabatan', array('id' => 'editjabatan'), array('id_guru' => $guru->id_guru)) ?>
                <div class="card card-custom">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title"><i class="fas fa-edit mr-2"></i>Konfigurasi Jabatan: <?= $guru->nama_guru ?></h6>
                        <button type="submit" id="btn-jabatan" class="btn btn-primary btn-sm btn-icon-split shadow-sm">
                            <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                            <span class="text font-weight-bold">Simpan Jabatan</span>
                        </button>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <?php
                            $jmapel = json_decode(json_encode($guru->mapel_kelas));
                            $jmapelval = json_decode(json_encode(unserialize($jmapel ?? '')));
                            $jks = [];
                            if ($jmapelval != null) {
                                foreach ($jmapelval as $key => $val) {
                                    array_push($jks, $val->id_mapel);
                                }
                            }

                            $jekstra = json_decode(json_encode($guru->ekstra_kelas));
                            $jekstraval = json_decode(json_encode(unserialize($jekstra ?? '')));
                            $jke = [];
                            if ($jekstraval != null) {
                                foreach ($jekstraval as $key => $val) {
                                    array_push($jke, $val->id_ekstra);
                                }
                            }
                            ?>
                            
                            <!-- Section: Teaching -->
                            <div class="col-lg-7 border-right pr-lg-5">
                                <div class="mb-4">
                                    <h6 class="text-primary font-weight-bold mb-3"><i class="fas fa-book mr-2"></i>Tugas Utama</h6>
                                    <div class="form-group">
                                        <label class="label-custom">Mata Pelajaran yang Diampu</label>
                                        <?php echo form_dropdown('mapel[]', $mapels, $jks, 'id="mapel" class="select2 form-control" multiple="multiple" data-placeholder="Pilih Mapel"'); ?>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="label-custom">Ekstrakurikuler</label>
                                        <?php echo form_dropdown('ekstra[]', $ekskul, $jke, 'id="ekstra" class="select2 form-control" multiple="multiple" data-placeholder="Pilih Ekstra"'); ?>
                                    </div>
                                </div>

                                <div class="pt-3">
                                    <h6 class="text-primary font-weight-bold mb-3"><i class="fas fa-th-list mr-2"></i>Pengaturan Kelas</h6>
                                    <div id="input-mapel" class="bg-gray-100 p-3 rounded" style="min-height: 150px; border: 1px dashed #d1d3e2;">
                                        <!-- Dynamically generated by JS -->
                                        <p class="text-center text-muted small mt-4">Pilih Mata Pelajaran untuk mengatur kelas pengampu.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Section: Role -->
                            <div class="col-lg-5 pl-lg-5 mt-4 mt-lg-0">
                                <h6 class="text-primary font-weight-bold mb-3"><i class="fas fa-user-tag mr-2"></i>Status Jabatan</h6>
                                <div class="form-group">
                                    <label class="label-custom">Pilih Jabatan Sekolah</label>
                                    <div class="input-group">
                                        <?php echo form_dropdown('level', $levels, $guru->id_level, 'id="level" class="form-control select2" required'); ?>
                                        <div class="input-group-append">
                                            <button type="button" data-toggle="modal" data-target="#createJabatanModal" class="btn btn-outline-primary" title="Tambah Master Jabatan">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-gray-100 border-0 mt-4">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center text-muted small font-weight-bold uppercase mb-2">
                                            <i class="fas fa-info-circle mr-2"></i> Catatan
                                        </div>
                                        <p class="small text-gray-700 mb-0">Jabatan struktural menentukan hak akses guru di aplikasi (Wali Kelas, Guru Mapel, dsb).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </section>
</div>

<!-- Modal: History -->
<?= form_open('dataguru/saveJabatan', array('id' => 'copyjabatan'), array('id_guru' => $guru->id_guru, 'copy' => 'copy')) ?>
<div class="modal fade" id="beforeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content card-custom">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-primary">History Semester Sebelumnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $kls_lalu = $before['kelass'];
                $guru2 = $before['guru'];
                if ($guru2->mapel_kelas != null || $guru2->ekstra_kelas != null):
                    $jks2 = []; $jke2 = [];
                ?>
                    <div class="d-none">
                        <?php
                        foreach ($guru2->mapel_kelas as $val) {
                            array_push($jks2, $val->id_mapel);
                            $idklsm = []; foreach ($val->kelas_mapel as $ids) array_push($idklsm, $ids->kelas);
                            echo form_dropdown('kelasmapel' . $val->id_mapel . '[]', $kls_lalu, $idklsm, 'class="guru2 select2" multiple="multiple"');
                            echo '<input type="hidden" name="nama_mapel' . $val->id_mapel . '" value="' . $val->nama_mapel . '">';
                        }
                        foreach ($guru2->ekstra_kelas as $val) {
                            array_push($jke2, $val->id_ekstra);
                            $idklse = []; foreach ($val->kelas_ekstra as $ids) array_push($idklse, $ids->kelas);
                            echo form_dropdown('kelasekstra' . $val->id_ekstra . '[]', $kls_lalu, $idklse, 'class="guru2 select2" multiple="multiple"');
                            echo '<input type="hidden" name="nama_ekstra' . $val->id_ekstra . '" value="' . $val->nama_ekstra . '">';
                        }
                        echo form_dropdown('mapel[]', $mapels, $jks2, 'class="guru2 select2" multiple="multiple"');
                        echo form_dropdown('ekstra[]', $ekskul, $jke2, 'class="guru2 select2" multiple="multiple"');
                        echo form_dropdown('level', $levels, $guru2->id_level, 'class="guru2 select2"');
                        echo form_dropdown('kelas_wali', $kls_lalu, $guru2->id_kelas, 'class="guru2 select2"');
                        ?>
                    </div>
                    
                    <div class="p-3 bg-light rounded mb-4 border d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small uppercase font-weight-bold mr-2">Jabatan:</span>
                            <span class="font-weight-bold text-gray-800"><?= $levels[$guru2->id_level] ?></span>
                        </div>
                        <i class="fas fa-history text-muted"></i>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm small">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th style="width: 50px" class="text-center py-2">No</th>
                                    <th class="py-2">Mata Pelajaran / Ekstra</th>
                                    <th class="py-2">Kelas Pengampu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nn = 1;
                                foreach ($guru2->mapel_kelas as $mapel) :
                                    $kls_mpl_str = '';
                                    foreach ($mapel->kelas_mapel as $kls_mpl) {
                                        if (isset($kls_lalu[$kls_mpl->kelas])) $kls_mpl_str .= '<span class="badge badge-subtle mr-1">' . $kls_lalu[$kls_mpl->kelas] . '</span> ';
                                    }
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $nn ?></td>
                                        <td class="font-weight-bold">MAPEL: <?= $mapel->nama_mapel ?></td>
                                        <td><?= $kls_mpl_str ?></td>
                                    </tr>
                                <?php $nn++; endforeach; ?>
                                <?php
                                foreach ($guru2->ekstra_kelas as $ekstra) :
                                    $kls_eks_str = '';
                                    foreach ($ekstra->kelas_ekstra as $kls_eks) {
                                        if (isset($kls_lalu[$kls_eks->kelas])) $kls_eks_str .= '<span class="badge badge-subtle mr-1">' . $kls_lalu[$kls_eks->kelas] . '</span> ';
                                    }
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $nn ?></td>
                                        <td class="font-weight-bold">EKSTRA: <?= $ekstra->nama_ekstra ?></td>
                                        <td><?= $kls_eks_str ?></td>
                                    </tr>
                                <?php $nn++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-center text-muted py-4">Data tidak ditemukan.</p>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm rounded-pill" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-sm rounded-pill px-4 font-weight-bold shadow-sm">
                    <i class="fas fa-check mr-1"></i> Copy Pengaturan Ini
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>

<!-- Modal: Master Jabatan -->
<?= form_open('dataguru/addJabatan', array('id' => 'create')) ?>
<div class="modal fade" id="createJabatanModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content card-custom">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-primary">Master Data Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="text-muted small mb-0">Kelola daftar jabatan yang tersedia di sekolah.</p>
                    <button type="button" class="btn btn-primary btn-sm add-new rounded shadow-sm px-3"><i class="fa fa-plus mr-1"></i> Tambah</button>
                </div>
                <div class="table-responsive border rounded" id="table-editable">
                    <table class="table table-hover table-sm mb-0">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-center" style="width: 70px">ID</th>
                                <th>Jabatan</th>
                                <th class="text-center" style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($levels as $id=>$level) :
                                $is_sys = $id <= 5;
                                if ($id != ''):?>
                                    <tr>
                                        <td class="text-center align-middle font-weight-bold text-muted id-level py-2"><?=$id?></td>
                                        <td class="align-middle py-2 font-weight-bold text-dark"><?=$level?></td>
                                        <td class="text-center align-middle py-2">
                                            <button type="button" class="add btn btn-sm btn-success" title="Save" style="display: none;"><i class="fa fa-check"></i></button>
                                            <?php if (!$is_sys): ?>
                                                <button type="button" class="edit btn btn-sm btn-text-warning" title="Edit"><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="delete btn btn-sm btn-text-danger" title="Delete"><i class="fa fa-trash"></i></button>
                                            <?php else: ?>
                                                <i class="fas fa-lock text-muted" title="System Locked"></i>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                            <?php endif; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<script type="text/javascript">
    var guru_id = '<?=$guru->id_guru?>';
    var kelas_id = '<?=$guru->id_kelas?>';
    var level_id = '<?=$guru->id_level?>';
    var mapel_guru = '<?= json_encode(unserialize($guru->mapel_kelas ?? '')) ?>';
    var ekstra_guru = '<?= json_encode(unserialize($guru->ekstra_kelas ?? '')) ?>';
    var guru_before = JSON.parse('<?= str_replace("'", "\'", json_encode($guru2)) ?>');
</script>
<script src="<?= base_url() ?>/assets/app/js/master/guru/editmapel.js"></script>
<script>
    let changed = false;
    $(document).ready(function(){
        if($('.select2').length > 0) {
            $('.select2').select2({ theme: 'bootstrap4' });
        }

        var actions = '<button type="button" class="add btn btn-sm btn-success"><i class="fa fa-check"></i></button>' +
            '<button type="button" class="edit btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>' +
            '<button type="button" class="delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';

        $(".add-new").click(function(){
            $(this).attr("disabled", "disabled");
            var index = $("#table-editable table tbody tr:last-child").index();
            var valId = $("#table-editable table tbody tr").eq(index).find('.id-level').text();
            var newId = Number(valId) + 1;
            var row = '<tr>' +
                '<td class="text-center align-middle id-level">' +
                '<input type="number" class="form-control form-control-sm text-center" name="id_level" value="'+ newId +'" readonly>' +
                '</td>' +
                '<td class="align-middle">' +
                '<input type="text" class="form-control form-control-sm" name="level">' +
                '</td>' +
                '<td class="text-center align-middle">' + actions + '</td>' +
                '</tr>';
            $("#table-editable table").append(row);
            $("#table-editable table tbody tr").eq(index + 1).find(".edit").toggle();
        });

        $(document).on("click", ".add", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input');
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("is-invalid");
                    empty = true;
                } else{
                    $(this).removeClass("is-invalid");
                }
            });
            if(!empty){
                let spost = '&mode=1';
                input.each(function(ind, v){
                    if (ind === 0) spost += '&id_level='+$(this).val();
                    else spost += '&level='+$(this).val();
                    $(this).parent("td").html($(this).val());
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                sendJabatan(spost);
            }
        });

        $(document).on("click", ".edit", function(){
            $(this).parents("tr").find("td:not(:last-child)").each(function(ind, v){
                if (ind === 0) $(this).html('<input type="number" class="form-control form-control-sm text-center" value="' + $(this).text() + '" readonly>');
                else $(this).html('<input type="text" class="form-control form-control-sm" value="' + $(this).text() + '">');
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
        });

        $(document).on("click", ".delete", function(){
            let tr = $(this).parents("tr");
            let sid = tr.find('.id-level').text();
            if(confirm('Hapus jabatan ini?')) {
                sendJabatan('&mode=2&id_level='+sid);
                tr.remove();
            }
        });

        $("#createJabatanModal").on("hidden.bs.modal", function () {
            if (changed) window.location.reload();
        });
    });

    function sendJabatan(data) {
        $(".add-new").html('<i class="spinner-border spinner-border-sm"></i> Wait');
        $.ajax({
            url: $('#create').attr('action'),
            data: $('#create').serialize() + data,
            type: 'POST',
            success: function (response) {
                $(".add-new").removeAttr("disabled").html('<i class="fa fa-plus"></i> Tambah');
                if (response.success) {
                    changed = true;
                    showSuccessToast(response.msg);
                } else {
                    showDangerToast(response.msg);
                }
            },
            error: function (xhr) {
                showDangerToast("Error loading system.");
            }
        });
    }
</script>
