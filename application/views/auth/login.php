<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif !important;
        background: #0f172a;
        background: radial-gradient(circle at top right, #1e293b, #0f172a);
        margin: 0;
        padding: 0;
        min-height: 100vh;
        overflow-x: hidden;
    }

    .login-container {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        position: relative;
    }

    /* Abstract background elements */
    .orb {
        position: absolute;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        filter: blur(100px);
        z-index: -1;
        opacity: 0.15;
    }
    .orb-1 { top: 10%; left: 10%; background: #3b82f6; }
    .orb-2 { bottom: 10%; right: 10%; background: #8b5cf6; }

    .login-box-modern {
        width: 100%;
        max-width: 420px;
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        transition: all 0.3s ease;
    }

    .login-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .login-header img {
        width: 70px;
        height: auto;
        margin-bottom: 20px;
        filter: drop-shadow(0 0 15px rgba(59, 130, 246, 0.3));
    }

    .login-header h4 {
        color: white;
        font-weight: 700;
        font-size: 1.4rem;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .login-header p {
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.85rem;
        margin-bottom: 0;
    }

    .form-group-custom {
        margin-bottom: 20px;
        position: relative;
    }

    .form-group-custom label {
        display: block;
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-wrapper i.prefix-icon {
        position: absolute;
        left: 16px;
        color: rgba(255, 255, 255, 0.3);
        font-size: 1.1rem;
        transition: color 0.3s ease;
    }

    .form-control-custom {
        width: 100%;
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 12px !important;
        padding: 14px 16px 14px 48px !important;
        color: white !important;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-control-custom:focus {
        background: rgba(255, 255, 255, 0.08) !important;
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1) !important;
    }

    .form-control-custom:focus + i.prefix-icon {
        color: #3b82f6;
    }

    .toggle-pass {
        position: absolute;
        right: 16px;
        color: rgba(255, 255, 255, 0.3);
        cursor: pointer;
        padding: 5px;
        transition: color 0.3s ease;
    }

    .toggle-pass:hover {
        color: white;
    }

    .btn-submit-custom {
        width: 100%;
        padding: 14px;
        background: #3b82f6;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border: none;
        border-radius: 12px;
        color: white;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-submit-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.4);
        filter: brightness(1.1);
    }

    .btn-submit-custom:active {
        transform: translateY(0);
    }

    .login-footer {
        margin-top: 30px;
        text-align: center;
    }

    .powered-by {
        color: rgba(255, 255, 255, 0.4);
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        line-height: 1.6;
    }

    .powered-by strong {
        color: rgba(255, 255, 255, 0.7);
        font-weight: 600;
    }

    #infoMessage .info-box {
        padding: 12px 16px;
        border-radius: 12px;
        font-size: 0.85rem;
        margin-bottom: 25px;
        text-align: center;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Mobile Friendly Adjustments */
    @media (max-width: 480px) {
        .login-box-modern {
            padding: 30px 24px;
            max-width: 100%;
            border: none;
            background: transparent;
            box-shadow: none;
            backdrop-filter: none;
        }
        .orb {
            display: none;
        }
        body {
            background: #0f172a;
        }
    }
</style>

<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<div class="login-container">
    <div class="login-box-modern">
        <div class="login-header">
            <?php
            $logo_app = $setting->logo_kanan == null ? base_url('assets/img/favicon.png') : base_url($setting->logo_kanan);
            ?>
            <img src="<?= $logo_app ?>" alt="Logo">
            <h4><?= $setting->nama_aplikasi ?></h4>
            <p>Silakan masuk menggunakan akun Anda</p>
        </div>

        <div id="infoMessage">
            <?php if (!empty($message)): ?>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'info',
                            title: 'Informasi Sesi',
                            text: '<?= strip_tags($message) ?>',
                            confirmButtonColor: '#3b82f6',
                            background: '#1e293b',
                            color: '#fff',
                            confirmButtonText: 'Saya Mengerti'
                        });
                    });
                </script>
            <?php endif; ?>
        </div>

        <?= form_open("auth/cek_login", array('id' => 'login')); ?>
            <div class="form-group-custom">
                <label>Username / Email</label>
                <div class="input-wrapper">
                    <i class="fas fa-user prefix-icon"></i>
                    <input type="text" name="identity" id="identity" class="form-control-custom" placeholder="Ketik username Anda" required autocomplete="username">
                </div>
            </div>

            <div class="form-group-custom">
                <label>Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock prefix-icon"></i>
                    <input type="password" name="password" id="password" class="form-control-custom" placeholder="Ketik password Anda" required autocomplete="current-password">
                    <i id="toggle-password" class="fas fa-eye-slash toggle-pass"></i>
                </div>
            </div>

            <input type="hidden" id="cbt-only" name="cbt-only" value="1">

            <button type="submit" id="submit" class="btn-submit-custom">
                <span>Masuk Sekarang</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        <?= form_close(); ?>
    </div>

    <div class="login-footer">
        <div class="powered-by">
            Powered by <strong>Schola CBT</strong> untuk Pendidikan Indonesia
        </div>
    </div>
</div>

<script type="text/javascript">
    let base_url = '<?=base_url();?>';

    $(document).ready(function(){
        $('form#login').on('submit', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();

            var infobox = $('#infoMessage');
            infobox.html('<div class="info-box" style="background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.2); color: #93c5fd;">Memverifikasi Akun...</div>');

            var btnsubmit = $('#submit');
            var originalBtnText = btnsubmit.html();
            btnsubmit.attr('disabled', 'disabled').html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Mohon Tunggu...');

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(data){
                    if(data.status){
                        infobox.html('<div class="info-box" style="background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.2); color: #86efac;">Login Berhasil! Mengalihkan...</div>');
                        
                        localStorage.setItem('scholaCBT.login', '1')
                        let go = base_url + data.url;
                        if (data.role === 'siswa') {
                            go = base_url + 'siswa/cbt';
                        }
                        
                        setTimeout(function() {
                            window.location.href = go;
                        }, 600);
                    } else {
                        btnsubmit.removeAttr('disabled').html(originalBtnText);
                        if(data.failed){
                            infobox.html('<div class="info-box" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #fca5a5;">' + data.failed + '</div>');
                        }
                        if(data.invalid){
                            $.each(data.invalid, function(key, val){
                                if(val != ''){
                                    $('[name="'+key+'"]').css('border-color', '#ef4444');
                                }
                            });
                        }
                    }
                },
                error: function() {
                    btnsubmit.removeAttr('disabled').html(originalBtnText);
                    infobox.html('<div class="info-box" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #fca5a5;">Kesalahan Server. Coba lagi.</div>');
                }
            });
        });

        $('#toggle-password').on('click', function () {
            const passInput = $('#password');
            const type = passInput.attr('type') === 'password' ? 'text' : 'password';
            passInput.attr('type', type);
            $(this).toggleClass('fa-eye-slash fa-eye');
        });

        $('input').on('keydown', function() {
            $(this).css('border-color', 'rgba(255, 255, 255, 0.1)');
        });
    });
</script>

