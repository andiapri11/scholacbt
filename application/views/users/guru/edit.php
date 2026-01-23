<div class="content-wrapper bg-white pt-4">
    <div class="header-blue elevation-2 mb-4" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; padding: 1.5rem 1.5rem 3rem 1.5rem;">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="m-0 text-white font-weight-bold" style="text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <i class="fas fa-chalkboard-teacher mr-2"></i><?= $judul ?>
                    </h1>
                    <p class="text-white-50 m-0 pl-5 text-sm">Kelola akun dan login guru</p>
                </div>
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <div class="col-6">
                        <a href="<?= base_url('userguru') ?>" class="btn btn-light rounded-pill float-right shadow-sm px-4">
                            <i class="fas fa-arrow-left mr-1"></i><span class="d-none d-sm-inline-block font-weight-bold">Kembali</span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <section class="content" style="margin-top: -30px;">
        <div class="container-fluid">
            <?php if ($user->username === $guru->username or $this->ion_auth->is_admin()) : ?>
                <?= form_open('userguru/editlogin', array('id' => 'change_password'), array('id' => $guru->id)) ?>
                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-modern border-0 shadow-lg h-100">
                            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0 font-weight-bold text-dark"><i class="fas fa-user-circle text-primary mr-2"></i>Profil Guru</h6>
                                <?php if (is_null($users)) : ?>
                                    <span class="badge badge-soft-danger rounded-pill px-3">Belum Aktif</span>
                                <?php else: ?>
                                    <span class="badge badge-soft-success rounded-pill px-3">Aktif</span>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nama Depan</label>
                                    <input type="text" name="first_name" class="form-control bg-light border-0"
                                           value="<?= is_null($users) ? '' : $users->first_name ?>"
                                           placeholder="Nama Depan"
                                        <?= is_null($users) ? 'disabled' : '' ?> required style="border-radius: 8px;">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nama Belakang</label>
                                    <input type="text" name="last_name" class="form-control bg-light border-0"
                                           value="<?= is_null($users) ? '' : $users->last_name ?>"
                                           placeholder="Nama Belakang"
                                        <?= is_null($users) ? 'disabled' : '' ?> required style="border-radius: 8px;">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Email</label>
                                    <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 bg-light"><i class="fas fa-envelope text-muted"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control border-0 bg-light"
                                               value="<?= is_null($users) ? '' : $guru->email ?>"
                                               placeholder="Email" required <?= is_null($users) ? 'disabled' : '' ?>>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <?php if (is_null($users)) : ?>
                                        <button type="submit" id="btn-aktif" class="btn btn-soft-success rounded-pill px-4 font-weight-bold shadow-sm">
                                            <i class="fas fa-check mr-2"></i>Aktifkan Akun
                                        </button>
                                    <?php else: ?>
                                        <?php if ($this->ion_auth->is_admin()) : ?>
                                            <button type="submit" id="btn-nonaktif" name="nonaktifkan" value="1"
                                                    class="btn btn-soft-danger rounded-pill px-3 btn-sm shadow-sm" data-toggle="tooltip" title="Nonaktifkan Akun">
                                                <i class="fas fa-power-off mr-1"></i> Nonaktifkan
                                            </button>
                                        <?php endif; ?>
                                        <button type="submit" id="btn-level"
                                                class="btn btn-soft-primary rounded-pill px-4 font-weight-bold shadow-sm">
                                            <i class="fas fa-save mr-2"></i>Simpan Profil
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card card-modern border-0 shadow-lg h-100">
                            <div class="card-header bg-white py-3 border-0">
                                <h6 class="card-title mb-0 font-weight-bold text-dark"><i class="fas fa-key text-warning mr-2"></i>Ubah Password & Username</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Username</label>
                                    <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 bg-light"><i class="fas fa-user text-muted"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 bg-light" name="username"
                                               value="<?= is_null($users) ? '' : $users->username ?>" placeholder="Username"
                                            <?= is_null($users) ? 'disabled' : '' ?> required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Password Lama</label>
                                    <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 bg-light"><i class="fas fa-lock text-muted"></i></span>
                                        </div>
                                        <input type="password" name="old" class="form-control border-0 bg-light" placeholder="Password Lama"
                                               required="<?= is_null($users) ? 'disabled' : '' ?>" <?= is_null($users) ? 'disabled' : '' ?>>
                                    </div>
                                    <small class="text-muted font-italic ml-1">Wajib diisi untuk verifikasi keamanan.</small>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Password Baru</label>
                                            <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text border-0 bg-light"><i class="fas fa-key text-muted"></i></span>
                                                </div>
                                                <input type="password" name="new" class="form-control border-0 bg-light" placeholder="Password Baru"
                                                       required="<?= is_null($users) ? 'disabled' : '' ?>" <?= is_null($users) ? 'disabled' : '' ?>>
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
                                                <input type="password" name="new_confirm" class="form-control border-0 bg-light"
                                                       placeholder="Ulangi Password"
                                                       required="<?= is_null($users) ? 'disabled' : '' ?>" <?= is_null($users) ? 'disabled' : '' ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-0 mb-4">
                                <div class="float-right">
                                    <button type="reset" class="btn btn-soft-secondary rounded-pill px-4 mr-2 shadow-sm font-weight-bold" <?= is_null($users) ? 'disabled' : '' ?>>
                                        <i class="fas fa-undo mr-1"></i> Reset
                                    </button>
                                    <button type="submit" id="btn-pass" class="btn btn-soft-warning rounded-pill px-5 shadow-sm font-weight-bold"
                                        <?= is_null($users) ? 'disabled' : '' ?>>
                                        <i class="fas fa-save mr-2"></i>Ganti Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            <?php endif; ?>
        </div>
    </section>
</div>

<script type="text/javascript">
    var guru_id = '<?=$guru->id_guru?>';
</script>

<script src="<?= base_url() ?>/assets/app/js/users/guru/edit.js"></script>

<?php if ($user->id === $guru->id_guru) : ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form#change_password').on('submit', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let btn = $('#btn-pass');
                btn.attr('disabled', 'disabled').text('Process...');

                url = $(this).attr('action');
                data = $(this).serialize();
                msg = "Password anda berhasil diganti";
                submitajax(url, data, msg, btn);
            });
        });
    </script>
<?php endif; ?>
