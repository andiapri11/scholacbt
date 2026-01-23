<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row pt-4 px-4 pb-5">
                <div class="col-sm-8">
                    <div class="d-flex align-items-center mb-1">
                        <div class="btn btn-sm btn-white-translucent disabled rounded-pill mr-2">
                            <i class="fas fa-key text-white"></i>
                        </div>
                        <h1 class="text-white font-weight-bold mb-0" style="letter-spacing: -0.5px;"><?= $judul ?></h1>
                    </div>
                    <p class="text-white-50 small mb-0 uppercase tracking-wider font-weight-bold">
                        <?= $subjudul ?>
                    </p>
                </div>
                <div class="col-sm-4 text-right">
                    <button id="generate" onclick="simpanToken()" class="btn btn-success px-4 rounded-pill shadow-lg font-weight-bold">
                        <i class="fas fa-sync-alt mr-2"></i> GENERATE NEW TOKEN
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-modern border-0 shadow-lg mb-4">
                        <div class="card-body p-4 bg-light-soft">
                             <div class="d-flex align-items-start text-muted mb-0 pl-3">
                                <ul class="small mb-0" style="list-style-type: none;">
                                    <li class="mb-2"><i class="fas fa-info-circle text-primary mr-2"></i>Jika mengklik <strong>GENERATE NEW TOKEN</strong>, segera infokan guru/admin lain untuk merefresh halaman token.</li>
                                    <li class="mb-2"><i class="fas fa-info-circle text-primary mr-2"></i>Token digenerate otomatis jika <strong>Otomatis: YA</strong> dan ada jadwal ujian hari ini.</li>
                                    <li><i class="fas fa-info-circle text-primary mr-2"></i>Interval waktu menentukan seberapa sering token akan berubah secara otomatis.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card card-modern h-100 border-0 shadow-lg" id="card-set">
                        <div class="card-header bg-white py-3">
                            <h5 class="card-title font-weight-bold text-dark mb-0">Pengaturan Token</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="form-group mb-4">
                                <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Generate Otomatis?</label>
                                <?php
                                $arrVal = ["0" => "TIDAK", "1" => "YA"];
                                echo form_dropdown(
                                    'auto',
                                    $arrVal,
                                    $token->auto,
                                    'id="auto" class="form-control select2"'
                                ); ?>
                            </div>
                            <div class="form-group mb-4">
                                <label class="small font-weight-bold text-muted uppercase tracking-wider mb-2">Interval Perubahan (Menit)</label>
                                <div class="input-group">
                                    <input id="jarak" type="number" class="form-control" name="jarak"
                                           value="<?= $token->jarak ?>" <?= $token->auto == '0' ? 'disabled="disabled"' : '' ?>>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-light border-left-0">Menit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary px-5 rounded-pill font-weight-bold shadow-sm" onclick="simpanToken()">
                                    <i class="fas fa-save mr-2"></i> Simpan Pengaturan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card card-modern h-100 border-0 shadow-lg text-center" id="card-view">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center p-5 bg-gradient-token">
                            <p class="text-white-50 uppercase tracking-wider font-weight-bold mb-3">Token Saat Ini</p>
                            <div class="token-main-view bg-white rounded shadow-lg px-5 py-3 mb-3">
                                <h1 class="display-3 font-weight-bold mb-0 text-primary" id="token-view" style="letter-spacing: 15px;"><?= $token->token ?></h1>
                            </div>
                            <div id="info-interval" class="d-none">
                                <div class="badge badge-white-translucent rounded-pill px-4 py-2 mt-2">
                                    <i class="fas fa-hourglass-half mr-2 text-white"></i>
                                    <span class="text-white font-weight-bold small">Token berubah otomatis dalam: <b id="interval">-- : -- : --</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function simpanToken() {
        var auto = $('#auto').val();
        var jarak = $('#jarak').val();
        if (auto == '1' && jarak == '0') {
            swal.fire({
                title: "Ups!",
                text: "Interval menit harus diisi",
                icon: "warning"
            });
        } else {
            globalToken.auto = $('#auto').val();
            globalToken.jarak = $('#jarak').val();
            forceGenerate = 1;
            generateToken();
        }
    }

    $(document).ready(function () {
        $('#auto').on('change', function () {
            var idAuto = $(this).val();
            var token = {};
            token ["token"] = globalToken.token;
            token ["auto"] = idAuto;
            $('#jarak').attr('disabled', idAuto == '0');
        });

        console.log('height', $("#card-set").height());
        $("#card-view").css({'height':($("#card-set").height()+'px')});
    });
</script>

<style>
    .header-blue {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    }
    .card-modern {
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05) !important;
    }
    .bg-light-soft { background-color: #f9fbfe; }
    .bg-gradient-token {
        background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        border-radius: 16px;
    }
    .btn-white-translucent {
        background-color: rgba(255, 255, 255, 0.2);
        border: none;
        backdrop-filter: blur(4px);
    }
    .badge-white-translucent {
        background-color: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .uppercase { text-transform: uppercase; }
    .tracking-wider { letter-spacing: 0.1em; }
    .token-main-view {
        min-width: 250px;
    }
    #token-view {
        text-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
</style>
