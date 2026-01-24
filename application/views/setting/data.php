<?php
/**
 * ScholaCBT - Premium School Settings View
 * Created by Antigravity
 */
?>
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        --glass-bg: rgba(255, 255, 255, 0.95);
        --accent-color: #4361ee;
    }

    .settings-container {
        padding: 1.5rem;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .page-header-modern {
        background: var(--primary-gradient);
        padding: 2.5rem 2rem;
        border-radius: 20px;
        color: white;
        margin-bottom: -3rem;
        box-shadow: 0 10px 30px rgba(67, 97, 238, 0.3);
    }

    .page-header-modern h1 {
        font-weight: 800;
        letter-spacing: -0.5px;
        margin: 0;
        font-size: 1.8rem;
    }

    .page-header-modern p {
        opacity: 0.8;
        margin-top: 5px;
        font-weight: 300;
    }

    .main-card-modern {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        padding: 2rem;
        margin-top: 1rem;
    }

    .section-title-modern {
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }

    .section-title-modern i {
        background: rgba(67, 97, 238, 0.1);
        color: var(--accent-color);
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        margin-right: 15px;
        font-size: 1.2rem;
    }

    .section-title-modern h3 {
        font-size: 1.1rem;
        font-weight: 700;
        margin: 0;
        color: #1e293b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-group-modern {
        margin-bottom: 1.5rem;
    }

    .form-group-modern label {
        font-weight: 600;
        color: #64748b;
        font-size: 0.85rem;
        margin-bottom: 8px;
        display: block;
    }

    .input-modern {
        background: #f8fafc !important;
        border: 1.5px solid #e2e8f0 !important;
        border-radius: 12px !important;
        padding: 0.75rem 1rem !important;
        height: auto !important;
        transition: all 0.2s ease !important;
        color: #1e293b !important;
        font-weight: 500 !important;
    }

    .input-modern:focus {
        background: #ffffff !important;
        border-color: #4361ee !important;
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1) !important;
    }

    .logo-upload-container {
        display: flex;
        gap: 20px;
        margin-top: 2rem;
    }

    .logo-card {
        flex: 1;
        background: #f8fafc;
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        border: 1.5px dashed #cbd5e1;
        transition: all 0.3s ease;
    }

    .logo-card:hover {
        border-color: #4361ee;
        background: #f1f5f9;
    }

    .btn-save-modern {
        background: var(--primary-gradient);
        border: none;
        border-radius: 50px;
        padding: 12px 40px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 10px 20px rgba(67, 97, 238, 0.2);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-save-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 25px rgba(67, 97, 238, 0.3);
        color: white;
    }

    .dropify-wrapper {
        border-radius: 12px !important;
        border: 1.5px dashed #cbd5e1 !important;
    }
</style>

<div class="settings-container">
    <div class="page-header-modern">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>Profile Sekolah</h1>
                <p>Konfigurasi identitas institusi dan pengaturan sistem aplikasi.</p>
            </div>
            <button type="submit" form="form-setting" class="btn btn-save-modern">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </div>

    <div class="main-card-modern">
        <?= form_open('settings/saveSetting', array('id' => 'form-setting')); ?>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title-modern">
                    <i class="fas fa-school"></i>
                    <h3>Identitas Sekolah</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label>Nama Aplikasi <span class="text-danger">*</span></label>
                            <input type="text" name="nama_aplikasi" class="form-control input-modern" value="<?= $setting->nama_aplikasi ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label>Nama Sekolah / Madrasah <span class="text-danger">*</span></label>
                            <input type="text" name="nama_sekolah" class="form-control input-modern" value="<?= $setting->sekolah ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group-modern">
                            <label>NSS / NSM</label>
                            <input type="text" name="nss" class="form-control input-modern" value="<?= $setting->nss ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-modern">
                            <label>NPSN</label>
                            <input type="text" name="npsn" class="form-control input-modern" value="<?= $setting->npsn ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-modern">
                            <label>Jenjang Pendidikan</label>
                            <select name="jenjang" class="form-control input-modern select2">
                                <option value="1" <?= $setting->jenjang == 1 ? 'selected' : '' ?>>SD / MI</option>
                                <option value="2" <?= $setting->jenjang == 2 ? 'selected' : '' ?>>SMP / MTs</option>
                                <option value="3" <?= $setting->jenjang == 3 ? 'selected' : '' ?>>SMA / MA / SMK</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="section-title-modern mt-4">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Lokasi & Kontak</h3>
                </div>

                <div class="form-group-modern">
                    <label>Alamat Sekolah</label>
                    <textarea name="alamat" class="form-control input-modern" rows="2"><?= $setting->alamat ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label>Email Sekolah</label>
                            <input type="email" name="email" class="form-control input-modern" value="<?= $setting->email ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label>Telepon / Fax</label>
                            <input type="text" name="tlp" class="form-control input-modern" value="<?= $setting->telp ?>">
                        </div>
                    </div>
                </div>

                <div class="section-title-modern mt-4">
                    <i class="fas fa-user-tie"></i>
                    <h3>Kepala Sekolah</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label>Nama Kepala Sekolah</label>
                            <input type="text" name="kepsek" class="form-control input-modern" value="<?= $setting->kepsek ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label>NIP Kepala Sekolah</label>
                            <input type="text" name="nip" class="form-control input-modern" value="<?= $setting->nip ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="section-title-modern">
                    <i class="fas fa-image"></i>
                    <h3>Logo & Branding</h3>
                </div>

                <div class="form-group-modern">
                    <label>Logo Aplikasi (Kiri)</label>
                    <input type="file" name="logo_kiri" class="dropify" data-default-file="<?= base_url($setting->logo_kiri) ?>" />
                    <input type="hidden" name="old_logo_kiri" value="<?= $setting->logo_kiri ?>">
                </div>

                <div class="form-group-modern mt-4">
                    <label>Logo Cetak (Kanan)</label>
                    <input type="file" name="logo_kanan" class="dropify" data-default-file="<?= base_url($setting->logo_kanan) ?>" />
                    <input type="hidden" name="old_logo_kanan" value="<?= $setting->logo_kanan ?>">
                </div>

                <div class="info-box bg-light border shadow-none mt-4" style="border-radius: 12px;">
                    <span class="info-box-icon"><i class="fas fa-info-circle text-primary"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Informasi Aset</span>
                        <span class="info-box-number small text-muted">Format: PNG/JPG/GIF. Ukuran ideal 200x200px.</span>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                'default': 'Seret logo ke sini atau klik',
                'replace': 'Seret untuk ganti',
                'remove':  'Hapus',
                'error':   'Ops, terjadi kesalahan.'
            }
        });

        $('#form-setting').on('submit', function(e) {
            e.preventDefault();
            const btn = $('.btn-save-modern');
            const originalText = btn.html();
            
            btn.attr('disabled', 'disabled').html('<i class="fas fa-circle-notch fa-spin"></i> Menyimpan...');
            
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Pengaturan sekolah telah diperbarui.',
                        icon: 'success',
                        confirmButtonColor: '#4361ee',
                        borderRadius: '20px'
                    });
                    btn.removeAttr('disabled').html(originalText);
                },
                error: function() {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan sistem.',
                        icon: 'error'
                    });
                    btn.removeAttr('disabled').html(originalText);
                }
            });
        });
    });
</script>
