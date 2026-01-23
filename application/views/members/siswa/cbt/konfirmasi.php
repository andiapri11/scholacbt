<style>
    .hub-header {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        padding: 2rem 0 6rem 0;
        margin-bottom: -5rem;
        position: relative;
    }
    .card-modern {
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .card-modern .card-body {
        padding: 3rem;
    }
    .konfirmasi-title {
        font-weight: 800;
        letter-spacing: -0.5px;
        color: #1e293b;
        margin-bottom: 0.5rem;
        font-size: 2rem;
    }
    .konfirmasi-subtitle {
        color: #4361ee;
        font-weight: 700;
        margin-bottom: 2.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .list-info {
        background: #f8fafc;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        border: 1px solid #f1f5f9;
    }
    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid #e2e8f0;
    }
    .info-item:last-child {
        border-bottom: none;
    }
    .info-label {
        color: #64748b;
        font-weight: 700;
        font-size: 0.95rem;
    }
    .info-value {
        color: #1e293b;
        font-weight: 800;
        text-align: right;
    }
    .btn-mulai {
        background: #4361ee;
        border: none;
        padding: 16px 50px;
        border-radius: 14px;
        font-weight: 800;
        letter-spacing: 0.05em;
        box-shadow: 0 8px 25px rgba(67, 97, 238, 0.25);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .btn-mulai:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(67, 97, 238, 0.35);
        background: #3751d7;
    }
    .pengawas-section {
        background: rgba(67, 97, 238, 0.05);
        border-radius: 14px;
        padding: 1.25rem;
        border-left: 5px solid #4361ee;
    }
    .token-input {
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        transition: all 0.2s;
        font-weight: 800;
        color: #4361ee;
        height: 45px;
    }
    .token-input:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    }

    @media (max-width: 768px) {
        .card-modern .card-body {
            padding: 2rem 1.5rem;
        }
        .konfirmasi-title {
            font-size: 1.5rem;
        }
        .list-info {
            padding: 1.25rem;
        }
        .info-label, .info-value {
            font-size: 0.85rem;
        }
        .btn-mulai {
            width: 100%;
            padding: 14px;
        }
        .hub-header {
            padding: 1.5rem 0 5rem 0;
        }
    }

    /* Modern Premium Loader */
    .swal2-popup.modern-swal-popup {
        border-radius: 20px !important;
        padding: 2rem !important;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }
    .swal2-title.modern-swal-title {
        font-size: 1.25rem !important;
        font-weight: 700 !important;
        color: #1e293b !important;
        margin-top: 1rem !important;
    }
    .modern-loader {
        width: 48px;
        height: 48px;
        border: 5px solid #f1f5f9;
        border-bottom-color: #4361ee;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
        margin: 15px auto;
    }
    @keyframes rotation {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<div class="content-wrapper bg-light" style="margin-top: -1px;">
    <div class="hub-header">
    </div>
    <section class="content p-4">
        <div class="container">

            <div class="container-fluid h-100">
                <div class="row h-100 justify-content-center mt-4">
                    <div class="col-md-10 col-lg-7">
                        <div class="card card-modern">
                            <div class="card-body">
                                <?php
                                if ($support && $valid) : ?>
                                    <div class="text-center">
                                        <h2 class="konfirmasi-title">KONFIRMASI DATA</h2>
                                        <p class="konfirmasi-subtitle"><?= $bank->kode_jenis . ' | ' . $bank->tahun . ' | SEMESTER ' . $bank->smt ?></p>
                                    </div>

                                    <?php
                                    $jk = json_decode(json_encode($bank->bank_kelas));
                                    $jumlahKelas = json_decode(json_encode(unserialize($jk ?? '')));

                                    $kelasbank = '';
                                    $no = 1;
                                    foreach ($jumlahKelas as $j) {
                                        foreach ($kelas as $k) {
                                            if ($j->kelas_id === $k->id_kelas) {
                                                if ($no > 1) {
                                                    $kelasbank .= ', ';
                                                }
                                                $kelasbank .= $k->nama_kelas;
                                                $no++;
                                            }
                                        }
                                    }
                                    ?>
                                    
                                    <?= form_open('', array('id' => 'konfir')) ?>
                                    <input type="hidden" name="siswa" value="<?= $siswa->id_siswa ?>">
                                    <input type="hidden" name="jadwal" value="<?= $bank->id_jadwal ?>">
                                    <input type="hidden" name="bank" value="<?= $bank->id_bank ?>">
                                    
                                    <div class="list-info">
                                        <div class="info-item">
                                            <span class="info-label">Mata Pelajaran</span>
                                            <span class="info-value text-primary"><?= $bank->nama_mapel ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Kelas</span>
                                            <span class="info-value"><?= $kelasbank ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Durasi Ujian</span>
                                            <span class="info-value text-danger"><?= $bank->durasi_ujian ?> Menit</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Jumlah Soal</span>
                                            <span class="info-value">
                                                <?= $bank->tampil_pg + $bank->tampil_kompleks + $bank->tampil_jodohkan + $bank->tampil_isian + $bank->tampil_esai ?> Butir
                                            </span>
                                        </div>
                                        <?php if ($bank->token === '1') : ?>
                                            <div class="info-item border-0 mt-2">
                                                <span class="info-label text-danger">TOKEN UJIAN</span>
                                                <div style="width: 150px">
                                                    <input type='text' id="input-token" class="form-control token-input text-center" 
                                                           name='token' placeholder="ENTER TOKEN" maxlength="6" />
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pengawas-section mb-4">
                                        <h6 class="font-weight-bold text-primary mb-2"><i class="fas fa-user-shield mr-2"></i>Pengawas Ujian:</h6>
                                        <div class="d-flex flex-wrap" style="gap: 10px">
                                            <?php foreach ($pengawas as $pws) :?>
                                                <span class="badge badge-white border text-dark px-3 py-2 shadow-sm rounded-pill">
                                                    <i class="fas fa-user-tie mr-2 text-muted"></i><?= $pws->nama_guru ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <div class="text-center mt-5">
                                        <button id="load-soal" type="submit" class="btn btn-primary btn-mulai text-uppercase">
                                            <i class="fas fa-play mr-2"></i> Mulai Ujian Sekarang
                                        </button>
                                    </div>
                                    <?= form_close(); ?>

                                <?php elseif (!$valid) : ?>
                                    <div class="text-center p-4">
                                        <div class="bg-soft-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px">
                                            <i class="fas fa-ban fa-3x text-danger"></i>
                                        </div>
                                        <h3 class="font-weight-bold text-dark">AKSES DITOLAK</h3>
                                        <p class="text-muted text-lg mb-4">Ujian tidak bisa dilanjutkan.<br>Silahkan hubungi Proktor atau Pengawas.</p>
                                        <button onclick="window.location.reload()" class="btn btn-outline-danger btn-pill px-4">
                                            <i class="fas fa-sync mr-2"></i>Refresh Halaman
                                        </button>
                                    </div>
                                <?php elseif (!$support): ?>
                                    <div class="text-center p-4">
                                        <div class="bg-soft-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px">
                                            <i class="fas fa-window-close fa-3x text-warning"></i>
                                        </div>
                                        <h3 class="font-weight-bold text-dark">BROWSER TIDAK SUPPORT</h3>
                                        <p class="text-muted text-lg">Browser yang Anda gunakan sudah usang.<br>Gunakan Google Chrome atau Mozilla Firefox versi terbaru.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/redirect.js"></script>
<script>
    $('#konfir').submit(function (e) {
        e.stopPropagation();
        e.preventDefault();

        swal.fire({
            title: "Membuka Soal",
            html: '<div class="modern-loader"></div><p class="text-muted mt-2" style="font-size: 0.9rem">Mempersiapkan lembar ujian Anda</p>',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                popup: 'modern-swal-popup',
                title: 'modern-swal-title'
            }
        });
        console.log($(this).serialize());
        var jadwal = $(this).find('input[name="jadwal"]').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'siswa/validasisiswa',
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                // jika menggunakan token, cek token
                if (data.token === true) {
                    // token ok
                    // cek browser dulu
                    if (data.support === false) {
                        // browser tidak support
                        // siswa stop disini
                        swal.fire({
                            "title": "Error",
                            "html": "Browser tidak mendukung!<br>Gunakan browser Chrome, atau Mozilla<br>005",
                            "icon": "error"
                        });
                    } else {
                        // browser OK
                        // cek izin ujian
                        if (data.izinkan === true) {
                            // diizinkan
                            // cek sisa waktu
                            if (data.ada_waktu === true) {
                                // masih ada waktu
                                // cek apakah ada soal?
                                if (data.jml_soal > 0) {
                                    // ada soal
                                    // siswa masuk halaman ujian
                                    window.location.href = base_url + 'siswa/penilaian/' + jadwal;
                                } else {
                                    // soal belum dibuat
                                    swal.fire({
                                        "title": "Error",
                                        "html": "Tidak ada soal ujian<br>Hubungi proktor<br>004",
                                        "icon": "error"
                                    });
                                }
                            } else {
                                // siswa logout ditengah ujian dan tidak melanjutkan sampai waktu ujian habis
                                // admin harus reset waktu
                                swal.fire({
                                    "title": "Error",
                                    "html": data.warn.msg + "<br>Hubungi proktor<br>003",
                                    "icon": "error"
                                });
                            }
                        } else {
                            // ditengah ujian, siswa ganti hape/komputer
                            // siswa tidak diizinkan ujian
                            // admin perlu reset izin
                            swal.fire({
                                "title": "Error",
                                "html": "Anda sedang mengerjakan ujian di perangkat lain<br>Hubungi proktor<br>002",
                                "icon": "error"
                            });
                        }
                    }
                } else {
                    // token salah, atau token tidak dibuat oleh admin
                    swal.fire({
                        "title": "Error",
                        "html": "TOKEN salah!<br>Hubungi proktor<br>001",
                        "icon": "error"
                    });
                }
            }, error: function (xhr, error, status) {
                swal.fire({
                    "title": "Error",
                    "html": "Coba kembali ke beranda, lalu ulangi lagi<br>006",
                    "icon": "error"
                });
                console.log(xhr.responseText);
            }
        });
    });

    console.log('mnt', getMinutes('2023-01-30 11:30:30'));

    function getMinutes(d) {
        var startTime = new Date(d);
        var endTime = new Date();
        endTime.setHours(endTime.getHours() - startTime.getHours());
        endTime.setMinutes(endTime.getMinutes() - startTime.getMinutes());
        endTime.setSeconds(endTime.getSeconds() - startTime.getSeconds());

        return {h: endTime.getHours(), m: endTime.getMinutes(), s: endTime.getSeconds()}
    }

</script>
