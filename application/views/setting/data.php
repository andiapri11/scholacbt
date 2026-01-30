<?php
/**
 * ScholaCBT - Premium School Settings View
 * Created by Antigravity
 */
?>
<div class="content-wrapper">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            --glass-bg: rgba(255, 255, 255, 0.98);
            --accent-color: #4361ee;
        }

        .settings-container {
            padding: 1rem 1.5rem;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page-header-modern {
            background: var(--primary-gradient);
            padding: 2.2rem 2.5rem;
            border-radius: 16px;
            color: white;
            margin-bottom: -3.5rem;
            box-shadow: 0 10px 30px rgba(67, 97, 238, 0.25);
            position: relative;
            z-index: 5;
        }

        .page-header-modern h1 {
            font-weight: 800;
            letter-spacing: -0.5px;
            margin: 0;
            font-size: 1.7rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .page-header-modern p {
            opacity: 0.9;
            margin-top: 5px;
            font-weight: 400;
            font-size: 0.9rem;
        }

        .main-card-modern {
            background: var(--glass-bg);
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 4.5rem 2rem 2rem 2rem;
            margin-top: 0;
            position: relative;
            z-index: 4;
        }

        .section-title-modern {
            display: flex;
            align-items: center;
            margin-bottom: 1.8rem;
            padding-bottom: 0.8rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-title-modern i {
            background: rgba(67, 97, 238, 0.1);
            color: var(--accent-color);
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .section-title-modern h3 {
            font-size: 1rem;
            font-weight: 800;
            margin: 0;
            color: #1e293b;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .form-group-modern {
            margin-bottom: 1.2rem;
        }

        .form-group-modern label {
            font-weight: 700;
            color: #475569;
            font-size: 0.8rem;
            margin-bottom: 6px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .input-modern {
            background: #ffffff !important;
            border: 1.5px solid #cbd5e1 !important;
            border-radius: 10px !important;
            padding: 0.65rem 0.9rem !important;
            transition: all 0.2s ease !important;
            color: #1e293b !important;
            font-weight: 500 !important;
            font-size: 0.9rem !important;
        }

        .input-modern:focus {
            border-color: #4361ee !important;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.12) !important;
        }

        .btn-save-modern {
            background: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 700;
            color: #4361ee;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
        }

        .btn-save-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            background: #f8fafc;
        }

        .logo-box {
            background: #f8fafc;
            border: 1.5px dashed #cbd5e1;
            border-radius: 12px;
            padding: 10px;
            transition: all 0.2s ease;
        }

        .logo-box:hover {
            border-color: #4361ee;
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
            <?= form_open_multipart('settings/saveSetting', array('id' => 'form-setting')); ?>
            
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
                                <select name="jenjang" class="form-control input-modern">
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
                        <textarea name="alamat" class="form-control input-modern" rows="2" style="min-height: 80px; resize: none;"><?= $setting->alamat ?></textarea>
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
                        <div class="logo-box">
                            <input type="file" name="logo_kiri" class="dropify" data-default-file="<?= base_url($setting->logo_kiri) ?>" data-height="120" />
                        </div>
                        <input type="hidden" name="old_logo_kiri" value="<?= $setting->logo_kiri ?>">
                    </div>

                    <div class="form-group-modern mt-4">
                        <label>Logo Cetak (Kanan)</label>
                        <div class="logo-box">
                            <input type="file" name="logo_kanan" class="dropify" data-default-file="<?= base_url($setting->logo_kanan) ?>" data-height="120" />
                        </div>
                        <input type="hidden" name="old_logo_kanan" value="<?= $setting->logo_kanan ?>">
                    </div>

                    <div class="alert alert-info border-0 shadow-sm mt-4 p-3" style="border-radius: 12px; background: rgba(59, 130, 246, 0.05); color: #1e40af;">
                        <h6 class="font-weight-bold mb-1"><i class="fas fa-info-circle mr-2"></i>Informasi Aset</h6>
                        <p class="small mb-0 opacity-80">Gunakan file PNG transparan untuk hasil terbaik di aplikasi maupun cetak raport.</p>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        if ($.fn.dropify) {
            $('.dropify').dropify({
                messages: {
                    'default': 'Klik/Seret logo',
                    'replace': 'Klik/Seret ganti',
                    'remove':  'Hapus',
                    'error':   'Error'
                }
            });
        }

        $('#form-setting').on('submit', function(e) {
            e.preventDefault();
            const btn = $('.btn-save-modern');
            const originalText = btn.html();
            
            btn.attr('disabled', 'disabled').html('<i class="fas fa-circle-notch fa-spin"></i>...');
            
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Pengaturan disimpan.',
                        icon: 'success',
                        confirmButtonColor: '#4361ee'
                    }).then(() => {
                        window.location.reload();
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
