<div class="content-wrapper bg-white">
    <div class="header-blue elevation-2 mb-4" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; padding: 1.5rem 1.5rem 3rem 1.5rem;">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="m-0 text-white font-weight-bold" style="text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <i class="fas fa-user-edit mr-2"></i><?= $judul ?>
                    </h1>
                    <p class="text-white-50 m-0 pl-5 text-sm">Perbarui informasi login siswa</p>
                </div>
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <div class="col-6">
                        <a href="<?= base_url('usersiswa') ?>" class="btn btn-light rounded-pill float-right shadow-sm px-4">
                            <i class="fas fa-arrow-left mr-1"></i><span class="d-none d-sm-inline-block font-weight-bold">Kembali</span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <section class="content" style="margin-top: -30px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-modern border-0 shadow-lg h-100">
                        <div class="card-header bg-white py-3 border-0">
                            <h6 class="card-title mb-0 font-weight-bold text-dark"><i class="fas fa-id-card text-primary mr-2"></i>Detail Siswa</h6>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="position-relative mb-3">
                                <div class="rounded-circle shadow-lg p-1 bg-white">
                                    <?php 
                                    $foto = 'assets/img/siswa.png';
                                    if ($siswa->foto && $siswa->foto != 'assets/img/siswa.png') {
                                        $foto = 'assets/img/' . $siswa->foto;
                                    } elseif ($siswa->jenis_kelamin == 'L') {
                                        $foto = 'assets/img/siswa-l.png';
                                    } elseif ($siswa->jenis_kelamin == 'P') {
                                        $foto = 'assets/img/siswa-p.png';
                                    }
                                    ?>
                                    <img src="<?= base_url() . $foto ?>" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;" alt="User avatar">
                                </div>
                            </div>
                            <h5 class="font-weight-bold text-dark mb-1"><?= $siswa->nama ?></h5>
                            <span class="badge badge-soft-primary px-3 rounded-pill mb-3">Kelas <?= $siswa->nama_kelas ?></span>
                            <div class="w-100 border-top pt-3 text-left">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="small text-muted uppercase tracking-wider font-weight-bold mb-1">NIS</div>
                                        <div class="font-weight-bold text-dark"><?= $siswa->nis ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="small text-muted uppercase tracking-wider font-weight-bold mb-1">Gender</div>
                                        <div class="font-weight-bold text-dark"><?= $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-modern border-0 shadow-lg h-100">
                        <div class="card-header bg-white py-3 border-0">
                            <h6 class="card-title mb-0 font-weight-bold text-dark"><i class="fas fa-key text-warning mr-2"></i>Ubah Password & Username</h6>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('editsiswa') ?>
                            <?= form_open('usersiswa/update', array('id' => 'editsiswa'), array('method' => 'edit', 'id_siswa' => $siswa->id_siswa)) ?>
                            
                            <div class="form-group mb-4">
                                <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Username</label>
                                <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-user text-muted"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-0 bg-light" name="username" value="<?= $siswa->username ?>"
                                           placeholder="Masukkan username baru" required>
                                </div>
                            </div>
                            
                            <div class="form-group mb-4">
                                <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Password Lama</label>
                                <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-lock text-muted"></i></span>
                                    </div>
                                    <input type="text" name="old" class="form-control border-0 bg-light" value="<?= $siswa->password ?>"
                                           placeholder="Password saat ini" required>
                                </div>
                                <small class="text-muted font-italic ml-1">Password lama ditampilkan untuk verifikasi admin.</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Password Baru</label>
                                        <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 bg-light"><i class="fas fa-key text-muted"></i></span>
                                            </div>
                                            <input type="text" name="new" class="form-control border-0 bg-light" placeholder="Buat password baru">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Konfirmasi Password</label>
                                        <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 bg-light"><i class="fas fa-check-circle text-muted"></i></span>
                                            </div>
                                            <input type="text" name="new_confirm" class="form-control border-0 bg-light"
                                                   placeholder="Ulangi password baru" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="mt-0 mb-4">
                            
                            <button type="submit" id="btn-pass" class="btn btn-soft-warning rounded-pill px-5 shadow-sm font-weight-bold float-right">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#flashdata").fadeTo(10000, 500).slideUp(500, function () {
            $("#flashdata").slideUp(500);
        });

    })
</script>
