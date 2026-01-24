<style>
    body {
        font-family: 'Poppins', sans-serif !important;
        overflow: hidden;
        background: linear-gradient(135deg, #1a1c2c 0%, #4a192c 100%);
        margin: 0;
        padding: 0;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        position: relative;
        z-index: 1;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 24px;
        box-shadow: 0 15px 35px 0 rgba(0, 0, 0, 0.4);
        width: 100%;
        max-width: 400px;
        padding: 50px 40px;
        color: white;
    }

    .login-logo-modern {
        text-align: center;
        margin-bottom: 35px;
    }

    .login-logo-modern img {
        width: 85px;
        height: auto;
        margin-bottom: 20px;
        filter: drop-shadow(0 4px 10px rgba(0,0,0,0.3));
    }

    .login-logo-modern h4 {
        font-weight: 700;
        letter-spacing: 0.8px;
        margin-bottom: 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        font-size: 1.5rem;
    }

    .form-group-modern {
        margin-bottom: 25px;
        position: relative;
    }

    .form-group-modern .input-group-text {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-right: none;
        color: rgba(255, 255, 255, 0.8);
        border-top-left-radius: 12px;
        border-bottom-left-radius: 12px;
        width: 45px;
        justify-content: center;
    }

    .form-group-modern .form-control {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: white;
        height: 52px;
        border-top-right-radius: 12px;
        border-bottom-right-radius: 12px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .form-group-modern .form-control:focus {
        background: rgba(255, 255, 255, 0.12);
        box-shadow: none;
        border-color: rgba(255, 255, 255, 0.4);
    }

    .form-group-modern .form-control::placeholder {
        color: rgba(255, 255, 255, 0.4);
    }

    .btn-login-modern {
        background: linear-gradient(135deg, #6e8efb 0%, #a777e3 100%);
        border: none;
        border-radius: 12px;
        height: 52px;
        font-weight: 600;
        letter-spacing: 1px;
        color: white;
        transition: all 0.3s ease;
        margin-top: 10px;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .btn-login-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(110, 142, 251, 0.4);
        color: white;
        filter: brightness(1.1);
    }

    .toggle-password-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 10;
        opacity: 0.5;
        transition: opacity 0.3s;
    }

    .toggle-password-icon:hover {
        opacity: 0.9;
    }

    .checkbox-modern {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .checkbox-modern input {
        margin-right: 10px;
        width: 16px;
        height: 16px;
        accent-color: #a777e3;
        cursor: pointer;
    }
    
    .checkbox-modern label {
        cursor: pointer;
        margin-bottom: 0;
    }

    #infoMessage .info-box {
        border-radius: 12px;
        margin-bottom: 25px;
        min-height: 45px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        font-size: 0.85rem;
    }

    /* Fixed Background Accents */
    .bg-accent {
        position: fixed;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        filter: blur(80px);
        z-index: 0;
        opacity: 0.4;
    }
    .accent-1 { top: -100px; right: -100px; background: #6e8efb; }
    .accent-2 { bottom: -150px; left: -150px; background: #a777e3; }

    @media (max-width: 480px) {
        .glass-card {
            padding: 40px 30px;
        }
    }
</style>

<div class="bg-accent accent-1"></div>
<div class="bg-accent accent-2"></div>

<div class="login-wrapper">
    <div class="glass-card">
        <div class="login-logo-modern">
            <?php
            $logo_app = $setting->logo_kanan == null ? base_url('assets/img/favicon.png') : base_url($setting->logo_kanan);
            ?>
            <img src="<?= $logo_app ?>" alt="Logo">
            <h4><?= $setting->nama_aplikasi ?></h4>
        </div>

        <div id="infoMessage"><?php echo $message; ?></div>

        <?= form_open("auth/cek_login", array('id' => 'login')); ?>
            <div class="form-group-modern">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <input type="text" name="identity" id="identity" class="form-control" placeholder="Username / Email" required>
                </div>
            </div>

            <div class="form-group-modern">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required style="border-right: 1px solid rgba(255, 255, 255, 0.15); border-top-right-radius: 12px; border-bottom-right-radius: 12px;">
                    <i id="toggle-password" class="fas fa-eye-slash toggle-password-icon"></i>
                </div>
            </div>

            <div class="checkbox-modern">
                <input type="checkbox" id="cbt-only" name="cbt-only" value="1" checked>
                <label for="cbt-only">Masuk ke Mode CBT</label>
            </div>

            <button type="submit" id="submit" class="btn btn-login-modern btn-block">
                MASUK SEKARANG <i class="fas fa-arrow-right ml-2"></i>
            </button>
        <?= form_close(); ?>
    </div>
</div>

<script type="text/javascript">
    let base_url = '<?=base_url();?>';

    $(document).ready(function(){
        $('form#login').on('submit', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();

            var infobox = $('#infoMessage');
            infobox.html('<div class="info-box align-items-center justify-content-center" style="background: rgba(23, 162, 184, 0.2); border: 1px solid rgba(23, 162, 184, 0.3); color: white;">Memverifikasi...</div>');

            var btnsubmit = $('#submit');
            var originalBtnText = btnsubmit.html();
            btnsubmit.attr('disabled', 'disabled').html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Mohon Tunggu...');

            const arrForm = $(this).serializeArray()
            const cbtOnly = arrForm.find(function (obj) {
                return obj.name === 'cbt-only'
            })
            localStorage.setItem('scholaCBT.login', cbtOnly !== undefined ? '1' : '0')

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(data){
                    if(data.status){
                        infobox.html('<div class="info-box align-items-center justify-content-center" style="background: rgba(40, 167, 69, 0.2); border: 1px solid rgba(40, 167, 69, 0.3); color: white;">Akses Diterima!</div>');
                        
                        const isLogin = localStorage.getItem('scholaCBT.login')
                        const isCbtMode = isLogin ? isLogin === '1' : false
                        let go = base_url + data.url;
                        if (isCbtMode && data.role === 'siswa') {
                            go = base_url + 'siswa/cbt';
                        }
                        
                        setTimeout(function() {
                            window.location.href = go;
                        }, 400);
                    } else {
                        btnsubmit.removeAttr('disabled').html(originalBtnText);
                        if(data.failed){
                            infobox.html('<div class="info-box align-items-center justify-content-center" style="background: rgba(220, 53, 69, 0.2); border: 1px solid rgba(220, 53, 69, 0.3); color: white;">' + data.failed + '</div>');
                        }
                        if(data.invalid){
                            $.each(data.invalid, function(key, val){
                                if(val != ''){
                                    $('[name="'+key+'"]').addClass('is-invalid');
                                }
                            });
                        }
                    }
                },
                error: function() {
                    btnsubmit.removeAttr('disabled').html(originalBtnText);
                    infobox.html('<div class="info-box align-items-center justify-content-center" style="background: rgba(220, 53, 69, 0.2); border: 1px solid rgba(220, 53, 69, 0.3); color: white;">Terjadi kesalahan koneksi.</div>');
                }
            });
        });

        $('#toggle-password').on('click', function (e) {
            const passInput = $('#password');
            const type = passInput.attr('type') === 'password' ? 'text' : 'password';
            passInput.attr('type', type);
            $(this).toggleClass('fa-eye-slash fa-eye');
        });

        $('input').on('keydown', function() {
            $(this).removeClass('is-invalid');
        });
    });
</script>

