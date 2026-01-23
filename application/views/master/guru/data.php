<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 14/06/2020
 * Time: 01.31
 */

function sortByPosition($a, $b)
{
    if ($a->id_jabatan == $b->id_jabatan) return 0;
    if ($a->id_jabatan == 0) return 1;
    if ($b->id_jabatan == 0) return -1;
    return $a->id_jabatan > $b->id_jabatan ? 1 : -1;
}

?>

<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-chalkboard-teacher mr-2"></i>Database Tenaga Pendidik & Karyawan
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-white px-3 rounded-pill shadow-sm border-0 font-weight-bold mr-2">
                            <i class="fas fa-sync-alt mr-2"></i> Reload
                        </button>
                        <a href="<?= base_url('dataguru/import') ?>" class="btn btn-sm btn-white px-4 rounded-pill shadow-sm border-0 font-weight-bold" style="color: #1e3c72">
                            <i class="fas fa-plus mr-2"></i> Tambah / Import Guru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="card-title font-weight-bold text-dark">
                        <i class="fas fa-users mr-2 text-primary"></i>Direktori Guru & Staf
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <?php if (count($gurus) > 0) : ?>
                    <div class="row" id="list-guru-grid">
                        <?php foreach ($gurus as $guru):
                            $mapels_guru = json_decode(json_encode(unserialize($guru->mapel_kelas ?? '')));
                            $ekstras_guru = json_decode(json_encode(unserialize($guru->ekstra_kelas ?? '')));
                            $status_label = $guru->status ? 'Aktif' : 'Nonaktif';
                            $status_class = $guru->status ? 'badge-soft-success' : 'badge-soft-danger';
                        ?>
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="teacher-card border-0 shadow-sm h-100 overflow-hidden" style="border-radius: 16px; background: #fff; transition: all 0.3s ease;">
                                <div class="teacher-card-top p-4">
                                    <div class="d-flex align-items-start mb-4">
                                        <div class="teacher-avatar-wrapper mr-3">
                                            <img src="<?= base_url().$guru->foto ?>" class="teacher-avatar shadow-sm" alt="Foto">
                                            <span class="status-indicator <?= $guru->status ? 'bg-success' : 'bg-danger' ?>"></span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <span class="text-muted small font-weight-bold uppercase letter-spacing-1"><?= $guru->nip ?></span>
                                                <span class="badge <?= $status_class ?> px-2 py-1 rounded-pill" style="font-size: 0.65rem"><?= $status_label ?></span>
                                            </div>
                                            <h6 class="font-weight-bold text-dark mb-1 text-truncate" title="<?= $guru->nama_guru ?>"><?= $guru->nama_guru ?></h6>
                                            <p class="text-muted small mb-0"><i class="fas fa-briefcase mr-1 opacity-50"></i> <?= $guru->level . ' ' . $guru->nama_kelas ?></p>
                                        </div>
                                    </div>

                                    <?php if ($mapels_guru != null || $ekstras_guru != null): ?>
                                    <div class="teaching-assignments mb-4 p-3 rounded-lg" style="background: #f8fafc; border: 1px solid #edf2f7;">
                                        <h6 class="small font-weight-bold text-muted uppercase mb-3" style="font-size: 0.65rem; letter-spacing: 0.5px">Pengampu:</h6>
                                        <div class="assignments-list" style="max-height: 120px; overflow-y: auto;">
                                            <?php foreach ($mapels_guru as $mapel) : 
                                                $kls_guru = '';
                                                foreach ($mapel->kelas_mapel as $kls_mpl) {
                                                    if (isset($kelass[$kls_mpl->kelas])) $kls_guru .= $kelass[$kls_mpl->kelas]->nama_kelas . ', ';
                                                }
                                                $kls_guru = rtrim($kls_guru, ', ');
                                            ?>
                                            <div class="assignment-item d-flex align-items-center mb-2">
                                                <div class="assignment-icon mr-2 bg-primary-soft text-primary">
                                                    <i class="fas fa-book-open"></i>
                                                </div>
                                                <div class="assignment-text flex-grow-1 overflow-hidden">
                                                    <div class="font-weight-bold text-dark small text-truncate"><?= $mapel->nama_mapel ?></div>
                                                    <div class="text-muted" style="font-size: 0.7rem"><?= $kls_guru ?></div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            
                                            <?php foreach ($ekstras_guru as $ekstra) : 
                                                $kls_eks_str = '';
                                                foreach ($ekstra->kelas_ekstra as $kls_eks) {
                                                    if (isset($kelass[$kls_eks->kelas])) $kls_eks_str .= $kelass[$kls_eks->kelas]->nama_kelas . ', ';
                                                }
                                                $kls_eks_str = rtrim($kls_eks_str, ', ');
                                            ?>
                                            <div class="assignment-item d-flex align-items-center mb-2">
                                                <div class="assignment-icon mr-2 bg-success-soft text-success">
                                                    <i class="fas fa-running"></i>
                                                </div>
                                                <div class="assignment-text flex-grow-1 overflow-hidden">
                                                    <div class="font-weight-bold text-dark small text-truncate"><?= $ekstra->nama_ekstra ?></div>
                                                    <div class="text-muted" style="font-size: 0.7rem"><?= $kls_eks_str ?></div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <div class="teacher-card-bottom p-3 bg-light border-top mt-auto d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('dataguru/edit/' . $guru->id_guru) ?>" class="btn btn-sm btn-white text-primary border shadow-hover mr-1 px-3" data-toggle="tooltip" title="Biodata">
                                            <i class="fas fa-user-edit mr-1"></i> Profil
                                        </a>
                                        <a href="<?= base_url('dataguru/editJabatan/' . $guru->id_guru) ?>" class="btn btn-sm btn-white text-info border shadow-hover px-3" data-toggle="tooltip" title="Atur Jabatan">
                                            <i class="fas fa-user-tag mr-1"></i> Jabatan
                                        </a>
                                    </div>
                                    <button onclick="hapus('<?= $guru->id_guru ?>')" class="btn btn-sm btn-white text-danger border shadow-hover px-2" data-toggle="tooltip" title="Hapus Guru">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="fas fa-user-slash fa-3x text-muted opacity-20 mb-3"></i>
                        <h5 class="text-muted font-weight-bold">Database Kosong</h5>
                        <p class="text-muted small">Belum ada data guru yang terdaftar di sistem.</p>
                        <a href="<?= base_url('dataguru/import') ?>" class="btn btn-primary rounded-pill px-4 mt-2 shadow-sm">
                            <i class="fas fa-plus mr-2"></i> Tambah Guru Sekarang
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<style>
    .card-modern { border-radius: 16px; }
    .btn-white { background: white; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }
    .btn-white:hover { background: #f8fafc; border-color: #cbd5e1; transform: scale(1.05); }
    
    .teacher-card:hover { transform: translateY(-5px); box-shadow: 0 12px 25px rgba(30, 60, 114, 0.08) !important; }
    
    .teacher-avatar-wrapper { position: relative; width: 68px; height: 68px; }
    .teacher-avatar { width: 100%; height: 100%; border-radius: 18px; object-fit: cover; border: 3px solid #fff; }
    .status-indicator { position: absolute; bottom: -2px; right: -2px; width: 16px; height: 16px; border: 3px solid #fff; border-radius: 50%; }
    
    .badge-soft-success { background: rgba(16, 185, 129, 0.08); color: #10b981; }
    .badge-soft-danger { background: rgba(239, 68, 68, 0.08); color: #ef4444; }
    .bg-primary-soft { background: rgba(30, 60, 114, 0.08); }
    .bg-success-soft { background: rgba(16, 185, 129, 0.08); }
    
    .assignment-icon { width: 28px; height: 28px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.7rem; }
    .letter-spacing-1 { letter-spacing: 1px; }

    /* Custom Scrollbar */
    .assignments-list::-webkit-scrollbar { width: 4px; }
    .assignments-list::-webkit-scrollbar-track { background: transparent; }
    .assignments-list::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .assignments-list::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
</style>
<?= form_open('', array('id' => 'hapus-guru')) ?>
<?= form_close() ?>

<script>
    $('.thumb-lg').css({'width': '6rem', 'height': '6rem'});

    function hapus(idGuru) {
        swal.fire({
            title: "Anda yakin?",
            text: "Data guru akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'dataguru/deleteguru',
                    data: $('#hapus-guru').serialize() + '&id_guru=' + idGuru,
                    type: "POST",
                    success: function (respon) {
                        console.log(respon);
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Data guru berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.reload(true);
                                }
                            });
                        } else {
                            if (respon.count > 0) {
                                window.location.href = base_url + 'dataguru/detail/' + idGuru
                            } else {
                                swal.fire({
                                    title: "Gagal",
                                    html: respon.message,
                                    icon: "error"
                                });
                            }
                        }
                    },
                    error: function () {
                        swal.fire({
                            title: "Gagal",
                            text: "Ada data yang sedang digunakan",
                            icon: "error"
                        });
                    }
                });
            }
        });
    }

    $(document).ready(function () {
        // No longer using standard DataTable since we are using a custom grid
        /*
        $("#list-guru").DataTable({
            paging: false,
            ordering: false,
            info: false,
        });
        */
        
        $('.teacher-avatar').each(function () {
            $(this).on("error", function () {
                $(this).attr("src", base_url + 'assets/img/guru.png');
            });
        });
    });
</script>
