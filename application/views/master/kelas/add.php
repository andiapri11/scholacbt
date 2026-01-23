<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $subjudul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-plus-circle mr-2"></i>Konfigurasi Rombongan Belajar Baru
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('datakelas') ?>" class="btn btn-sm btn-white px-4 rounded-pill shadow-sm border-0 font-weight-bold" style="color: #1e3c72">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <?= form_open('', array('id' => 'create')) ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-modern border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                        <div class="card-title font-weight-bold text-dark">
                            <i class="fas fa-info-circle mr-2 text-primary"></i>Informasi Utama Kelas
                        </div>
                        <div class="card-tools">
                            <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm font-weight-bold">
                                <i class="fas fa-save mr-2"></i> Simpan Rombel
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if (isset($id_kelas)) echo form_hidden('id_kelas', $id_kelas); ?>
                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Nama Kelas <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light border-right-0"><i class="fas fa-chalkboard text-muted"></i></span>
                                        </div>
                                        <input type="text" name="nama_kelas" value="<?= $kelas->nama_kelas ?>" class="form-control border-left-0" placeholder="Contoh: X MIPA 1" required style="background: #f8fafc">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Kode Kelas <span class="text-danger">*</span></label>
                                    <input type="text" name="kode_kelas" value="<?= $kelas->kode_kelas ?>" class="form-control" placeholder="X-MIPA-1" required style="background: #f8fafc">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Level / Tingkat <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light border-right-0"><i class="fas fa-layer-group text-muted"></i></span>
                                        </div>
                                        <?php
                                        echo form_dropdown(
                                            'level_id',
                                            $level,
                                            $kelas->level_id,
                                            'class="select2 form-control border-left-0" id="level_id" required'
                                        );
                                        ?>
                                    </div>
                                </div>
                                <?php if ($setting->jenjang == '3') : ?>
                                    <div class="form-group mb-4">
                                        <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Jurusan / Program <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0"><i class="fas fa-graduation-cap text-muted"></i></span>
                                            </div>
                                            <?php
                                            echo form_dropdown(
                                                'jurusan_id',
                                                $jurusan,
                                                $kelas->jurusan_id,
                                                'class="select2 form-control border-left-0" id="jurusan_id" required'
                                            );
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Wali Kelas <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light border-right-0"><i class="fas fa-user-tie text-muted"></i></span>
                                        </div>
                                        <?php
                                        echo form_dropdown(
                                            'guru_id',
                                            $guru,
                                            $kelas->guru_id,
                                            'class="select2 form-control border-left-0" id="guru_id" required'
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 border-light">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold text-muted uppercase mb-3" style="font-size: 0.65rem; letter-spacing: 1px">
                                        <i class="fas fa-user-friends mr-2"></i>Pilih Anggota Kelas (Siswa)
                                    </label>
                                    <div class="p-4 bg-light rounded-lg border" style="min-height: 350px">
                                        <?php
                                        $siswas = [];
                                        if (isset($siswa)) {
                                            foreach ($siswa as $key => $row) {
                                                if ($row->id_kelas == null || $row->id_kelas == 0) {
                                                    $siswas [$row->id_siswa] = $row->nama .' - '.$row->nis;
                                                }
                                            }
                                        }
                                        if (isset($siswakelas)) {
                                            foreach ($siswakelas as $key => $row) {
                                                $siswas [$row->id_siswa] = $row->nama .' - '.$row->nis;
                                            }
                                        }
                                        $oj = json_decode(json_encode($kelas->jumlah_siswa));
                                        $jumlahSiswa = json_decode(json_encode(unserialize($oj ?? '')));
                                        $jjs = [];
                                        foreach ($jumlahSiswa as $js) {
                                            array_push($jjs, $js->id);
                                        }
                                        ?>
                                        <select name="siswa[]" class="form-control" id="jumlah_siswa" multiple="multiple" required="" style="position: absolute; left: -9999px;">
                                            <?php foreach ($siswas as $id=>$siswa) :?>
                                                <option value="<?= $id ?>" <?= in_array($id, $jjs) ? 'selected="selected"' : '';?>><?=$siswa?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div id="dualSelectPlaceholder" class="text-center py-5">
                                            <div class="spinner-border text-primary opacity-50" role="status"></div>
                                            <p class="text-muted small mt-2">Menyiapkan panel pemilihan siswa...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-light border shadow-none h-100">
                                    <div class="card-body p-4">
                                        <div class="form-group mb-4">
                                            <label class="small font-weight-bold text-dark uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Ketua Kelas</label>
                                            <div class="input-group shadow-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-white border-right-0"><i class="fas fa-star text-warning"></i></span>
                                                </div>
                                                <?php
                                                echo form_dropdown(
                                                    'siswa_id',
                                                    $siswas,
                                                    $kelas->siswa_id,
                                                    'class="select2 form-control border-left-0" id="siswa_id" required'
                                                );
                                                ?>
                                            </div>
                                            <p class="text-muted small italic mt-2"><i class="fas fa-info-circle mr-1"></i> Ketua kelas dipilih dari daftar siswa yang telah ditambahkan.</p>
                                        </div>
                                        
                                        <div class="alert alert-soft-primary border-0 rounded-lg p-3">
                                            <small class="font-weight-bold d-block mb-1 text-primary lowercase" style="letter-spacing: 0.5px">Tips Input:</small>
                                            <small class="text-muted">Gunakan fitur pencarian pada kotak dual-select untuk memfilter siswa berdasarkan NIS atau Nama dengan cepat.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light py-3 text-right">
                        <button type="submit" class="btn btn-primary px-5 rounded-pill shadow font-weight-bold">
                            <i class="fas fa-save mr-2"></i> Simpan Data Rombel
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close() ?>
    </section>
</div>

<style>
    .card-modern { border-radius: 16px; overflow: hidden; }
    .btn-white { background: white; color: #1e3c72; border: none; }
    .btn-white:hover { background: #f8fafc; color: #2a5298; }
    .alert-soft-primary { background: rgba(30, 60, 114, 0.05); }
    
    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        border-radius: 0.25rem;
    }
    
    /* Dual Select Adjustments */
    .ms-container { width: 100% !important; background: transparent !important; }
    .ms-list { border-radius: 12px !important; border: 1px solid #e2e8f0 !important; box-shadow: inset 0 2px 4px rgba(0,0,0,0.02) !important; }
    .ms-selectable, .ms-selection { background: transparent !important; }
    .ms-header { background: #f1f5f9 !important; padding: 8px 12px !important; font-weight: 700 !important; color: #475569 !important; font-size: 0.75rem !important; text-transform: uppercase !important; border-bottom: 1px solid #e2e8f0 !important; }
</style>
    </section>
</div>

<script>
    const arrAllSiswa = JSON.parse(JSON.stringify(<?= json_encode($siswas)?>));
    const arrSelSiswa = JSON.parse(JSON.stringify(<?= json_encode($jjs)?>));
    $(document).ready(function () {
        $("#guru_id option:first").attr('disabled', 'disabled');
        $("#jurusan_id option:first").attr('disabled', 'disabled');
        $("#level_id option:first").attr('disabled', 'disabled');
    });
</script>
<script src="<?= base_url() ?>/assets/app/js/master/kelas/add.js"></script>
