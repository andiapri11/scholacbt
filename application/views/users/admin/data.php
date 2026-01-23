<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row px-3 pt-4 pb-5">
                <div class="col-sm-6">
                    <h1 class="text-white font-weight-bold text-shadow">
                        <i class="fas fa-user-shield mr-2"></i> <?= $judul ?>
                    </h1>
                    <p class="text-white-50 small mb-0">Manajemen akun administrator dan hak akses sistem.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg">
                <div class="card-header bg-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-list text-primary mr-2"></i>
                        <h6 class="mb-0 font-weight-bold text-dark">Daftar Akun Admin</h6>
                    </div>
                    <div class="card-tools">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-outline-primary rounded-pill px-3 mr-2">
                            <i class="fa fa-sync-alt mr-1"></i> Reload
                        </button>
                        <button type="button" data-toggle="modal" data-target="#createAdminModal"
                                class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm">
                            <i class="fas fa-plus mr-1"></i> Tambah Admin
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="users" class="table table-modern-list w-100 mb-0">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px">No.</th>
                                <th>NAMA DEPAN</th>
                                <th>NAMA BELAKANG</th>
                                <th>USERNAME</th>
                                <th>EMAIL</th>
                                <th class="text-center">LEVEL</th>
                                <th class="text-center">DIBUAT</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center" style="width: 100px">AKSI</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title font-weight-bold text-dark" id="createModalLabel">
                    <i class="fas fa-user-plus text-primary mr-2"></i> Tambah Admin Baru
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-group mb-3">
                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nama Depan *</label>
                    <input type="text" name="first_name" class="form-control required shadow-sm" placeholder="Masukkan nama depan" required>
                </div>
                <div class="form-group mb-3">
                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Nama Belakang *</label>
                    <input type="text" name="last_name" class="form-control required shadow-sm" placeholder="Masukkan nama belakang" required>
                </div>
                <div class="form-group mb-3">
                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Email *</label>
                    <input type="email" name="email" class="form-control required shadow-sm" placeholder="Contoh: admin@sekolah.sch.id" required>
                </div>
                <div class="form-group mb-3">
                    <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Username *</label>
                    <input type="text" name="username" class="form-control required shadow-sm" placeholder="Masukkan username" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Password *</label>
                            <input type="password" name="password" class="form-control required shadow-sm" placeholder="Min. 8 karakter" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Konfirmasi *</label>
                            <input type="password" name="confirm_password" class="form-control required shadow-sm" placeholder="Ulangi password" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-4" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                    <i class="fas fa-check mr-1"></i> Simpan Admin
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<script type="text/javascript">
    var user_id = '<?=$user->id?>';
</script>

<script src="<?= base_url() ?>/assets/app/js/users/admin/data.js"></script>
