<!DOCTYPE html>
<html>

<head>

    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $logo_app = $setting->logo_kiri == null ? base_url() . 'assets/img/favicon.png' : base_url() . $setting->logo_kiri; ?>
    <link rel="shortcut icon" href="<?= $logo_app ?>" type="image/x-icon">

    <!-- Required CSS -->
    <!-- v3 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/v4-shims.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>/assets/plugins/pace-progress/themes/silver/pace-theme-minimal.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- multi select -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/multiselect/css/multi-select.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/jquery.toast.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/toastr/toastr.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/dropify/css/dropify.min.css">

    <!-- Datatables Buttons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- textarea editor -->
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/katex/katex.css">
    <!-- /texarea editor; -->

    <!-- fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/poppins.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/calibri.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/show.toast.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/plugins/fields-linker/fieldsLinker.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script defer src="<?= base_url() ?>/assets/plugins/katex/contrib/auto-render.min.js" onload="renderMathInElement(document.body);"></script>

    <style>
        .linker-list p {
            margin-bottom: .5rem;
            margin-top: .5rem;
        }
    </style>
</head>

<script type="text/javascript">
    let base_url = '<?=base_url()?>';
</script>

<?php

function buat_tanggal($str)
{
    $str = str_replace("Jan", "Januari", $str);
    $str = str_replace("Feb", "Februari", $str);
    $str = str_replace("Mar", "Maret", $str);
    $str = str_replace("Apr", "April", $str);
    $str = str_replace("May", "Mei", $str);
    $str = str_replace("Jun", "Juni", $str);
    $str = str_replace("Jul", "Juli", $str);
    $str = str_replace("Aug", "Agustus", $str);
    $str = str_replace("Sep", "September", $str);
    $str = str_replace("Oct", "Oktober", $str);
    $str = str_replace("Nov", "Nopember", $str);
    $str = str_replace("Dec", "Desember", $str);
    $str = str_replace("Mon", "Senin", $str);
    $str = str_replace("Tue", "Selasa", $str);
    $str = str_replace("Wed", "Rabu", $str);
    $str = str_replace("Thu", "Kamis", $str);
    $str = str_replace("Fri", "Jumat", $str);
    $str = str_replace("Sat", "Sabtu", $str);
    $str = str_replace("Sun", "Minggu", $str);
    return $str;
}

function singkat_tanggal($str)
{
    $str = str_replace("Jan", "Jan", $str);
    $str = str_replace("Feb", "Feb", $str);
    $str = str_replace("Mar", "Mar", $str);
    $str = str_replace("Apr", "Apr", $str);
    $str = str_replace("May", "Mei", $str);
    $str = str_replace("Jun", "Jun", $str);
    $str = str_replace("Jul", "Jul", $str);
    $str = str_replace("Aug", "Aug", $str);
    $str = str_replace("Sep", "Sep", $str);
    $str = str_replace("Oct", "Okt", $str);
    $str = str_replace("Nov", "Nov", $str);
    $str = str_replace("Dec", "Des", $str);
    $str = str_replace("Mon", "Sen", $str);
    $str = str_replace("Tue", "Sel", $str);
    $str = str_replace("Wed", "Rab", $str);
    $str = str_replace("Thu", "Kam", $str);
    $str = str_replace("Fri", "Jum", $str);
    $str = str_replace("Sat", "Sab", $str);
    $str = str_replace("Sun", "Min", $str);
    return $str;
}

$dash = $this->uri->segment(1);
$cbt = $this->uri->segment(2);
$exludes = ["dashboard", "penilaian"];
$dnone = in_array($dash, $exludes) || in_array($cbt, $exludes) ? 'invisible' : '';

$display_clock = $this->uri->segment(2) == "penilaian" ? '' : 'd-none';
$display_logout = $this->uri->segment(2) == "penilaian" ? 'd-none' : '';
?>

<body class="layout-top-nav layout-navbar-fixed bg-light">
<style>
    :root {
        --brand-primary: #3b82f6;
        --brand-dark: #0f172a;
        --brand-indigo: #6366f1;
    }
    .navbar-nextgen {
        background: #ffffff !important;
        border-bottom: 1px solid #e2e8f0 !important;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .brand-glow {
        letter-spacing: -0.5px;
        font-weight: 700;
        color: #1e293b;
    }
    .btn-glass-pill {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #475569;
        border-radius: 50px;
        transition: all 0.2s ease;
        font-weight: 600;
        font-size: 0.85rem;
        letter-spacing: 0.3px;
    }
    .btn-glass-pill:hover {
        background: #e2e8f0;
        border-color: #cbd5e1;
        color: #1e293b;
        transform: translateY(-1px);
    }

    /* Global Modern Loading Sync with Admin */
    .overlay-modern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.45) !important;
        backdrop-filter: blur(5px) !important;
        -webkit-backdrop-filter: blur(5px) !important;
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: inherit;
    }
    .loader-modern {
        width: 60px;
        height: 60px;
        position: relative;
        background: rgba(59, 130, 246, 0.05);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .loader-modern::before,
    .loader-modern::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #3b82f6;
        filter: drop-shadow(0 0 5px rgba(59, 130, 246, 0.5));
    }
    .loader-modern::before {
        width: 100%;
        height: 100%;
        animation: rotation 1.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite;
    }
    .loader-modern::after {
        width: 70%;
        height: 70%;
        border-top-color: #fbbf24;
        animation: rotation-reverse 1s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite;
        filter: drop-shadow(0 0 5px rgba(251, 191, 36, 0.5));
    }
    @keyframes rotation {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    @keyframes rotation-reverse {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(-360deg); }
    }

    /* Modern SweetAlert2 Loader Sync */
    .swal2-loader {
        border-color: #3b82f6 transparent #3b82f6 transparent !important;
        border-width: 4px !important;
        width: 60px !important;
        height: 60px !important;
        animation: rotation 1.2s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite !important;
    }
    .swal2-popup.swal2-toast .swal2-loader {
        width: 1.5em !important;
        height: 1.5em !important;
        border-width: 0.2em !important;
    }
    .swal2-popup {
        border-radius: 20px !important;
        padding: 2rem !important;
        font-family: 'Poppins', sans-serif !important;
    }
    .swal2-styled.swal2-confirm {
        border-radius: 50px !important;
        padding: 10px 35px !important;
        font-weight: 600 !important;
        background-color: #3b82f6 !important;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3) !important;
    }
    .swal2-styled.swal2-cancel {
        border-radius: 50px !important;
        padding: 10px 35px !important;
        font-weight: 600 !important;
    }

    /* Soft Design System */
    .badge-soft-primary { background-color: rgba(59, 130, 246, 0.15) !important; color: #3b82f6 !important; }
    .badge-soft-success { background-color: rgba(16, 185, 129, 0.15) !important; color: #10b981 !important; }
    .badge-soft-warning { background-color: rgba(245, 158, 11, 0.15) !important; color: #f59e0b !important; }
    .badge-soft-danger { background-color: rgba(239, 68, 68, 0.15) !important; color: #ef4444 !important; }
    .badge-soft-info { background-color: rgba(6, 182, 212, 0.15) !important; color: #06b6d4 !important; }
    .badge-soft-secondary { background-color: rgba(107, 114, 128, 0.15) !important; color: #6b7280 !important; }
    /* Premium PACE Progress Bar */
    .pace {
        pointer-events: none;
        user-select: none;
    }
    .pace-inactive {
        display: none;
    }
    .pace .pace-progress {
        background: linear-gradient(to right, #3b82f6, #6366f1) !important;
        position: fixed;
        z-index: 2000;
        top: 0;
        right: 100%;
        width: 100%;
        height: 4px !important;
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        transition: all 0.2s ease;
    }
</style>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-nextgen border-bottom-0" style="height: 70px;">
        <div class="container-fluid h-100 px-3 position-relative">
            <ul class="navbar-nav <?= $dnone ?>" id="back">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-sm btn-glass-pill px-3" id="url-back" style="height: 40px; border-radius: 12px; display: flex; align-items: center; background: rgba(59, 130, 246, 0.05); border-color: rgba(59, 130, 246, 0.1);">
                        <i class="fas fa-home mr-2 text-primary"></i> <span class="d-none d-sm-inline-block">Beranda</span>
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center justify-content-center"
                 style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); z-index: 10;">
                <div class="p-1 bg-white rounded-circle shadow-sm mr-3" style="border: 1px solid #edf2f7;">
                    <img src="<?= $logo_app ?>" alt="Logo" style="height: 42px; width: 42px; object-fit: contain;">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <div class="font-weight-bold brand-glow" style="line-height: 1; font-size: 1.15rem; color: #1e293b; letter-spacing: -0.5px;"><?= $setting->nama_aplikasi ?></div>
                    <div class="d-flex align-items-center mt-2" style="gap: 8px;">
                        <span class="badge badge-soft-primary px-2 py-1" style="font-size: 10px; font-weight: 800; border-radius: 6px; border: 1px solid rgba(59, 130, 246, 0.1);"><?= $tp_active->tahun ?></span>
                        <span class="badge badge-soft-info px-2 py-1" style="font-size: 10px; font-weight: 800; border-radius: 6px; border: 1px solid rgba(6, 182, 212, 0.1);">SMT <?= $smt_active->smt ?></span>
                    </div>
                </div>
            </div>
            <div class="ml-auto d-flex align-items-center">
                <ul class="navbar-nav <?= $display_clock ?>">
                    <li class="nav-item mr-3">
                        <div id="live-clock" class="text-right text-dark font-weight-bold" style="font-family: 'Courier New', monospace;"></div>
                    </li>
                </ul>
                <ul class="navbar-nav <?= $display_logout ?>">
                    <li class="nav-item">
                        <button onclick="logout()" class="btn btn-sm btn-glass-pill px-3" style="height: 40px; width: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; background: rgba(239, 68, 68, 0.05); border-color: rgba(239, 68, 68, 0.1); color: #ef4444;">
                            <i class="fas fa-power-off"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


