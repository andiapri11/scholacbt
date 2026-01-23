<!DOCTYPE html>
<html>

<head>

    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul ?></title>
    <meta name="renderer" content="webkit"/>
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
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- pace-progress -->
    <link rel="stylesheet"
          href="<?= base_url() ?>/assets/plugins/pace-progress/themes/blue/pace-theme-minimal.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- multi select -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/multiselect/css/multi-select.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Datetime picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/jquery-datetimepicker/jquery.datetimepicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/show.toast.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">

    <!-- textarea editor -->
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/summernote/plugin/audio/summernote-audio.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/katex/katex.css">
    <!-- /texarea editor; -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/font-material.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap-icon/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/plugins/pignose/css/pignose.calendar.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/jexcel/css/jexcel.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/jexcel/css/jsuites.css">
    <script src="<?= base_url() ?>/assets/plugins/jexcel/js/jexcel.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/jexcel/js/jsuites.js"></script>

    <script defer src="<?= base_url() ?>/assets/plugins/katex/contrib/auto-render.min.js" onload="renderMathInElement(document.body);"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
        }
        .main-sidebar {
            z-index: 1040 !important;
            background: #ffffff !important;
        }
        .nav-sidebar .nav-item > .nav-link {
            border-radius: 10px !important;
            margin: 2px 12px 6px 12px !important;
            padding: 10px 16px !important;
            transition: all 0.2s ease;
            font-weight: 500;
            color: #4a5568 !important;
        }
        .nav-sidebar .nav-link.active {
            background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%) !important;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.25) !important;
            color: white !important;
        }
        .nav-sidebar .nav-link.active i {
            color: white !important;
        }
        .nav-sidebar .nav-link:hover:not(.active) {
            background: #f8f9fa !important;
            color: #4361ee !important;
            transform: translateX(4px);
        }
        .nav-header {
            font-weight: 700 !important;
            letter-spacing: 1.2px;
            color: #adb5bd !important;
            padding: 10px 0 10px 24px !important;
            font-size: 0.65rem !important;
            text-transform: uppercase;
        }
        .sidebar .nav-icon {
            font-size: 1rem !important;
            margin-right: 12px !important;
            width: 1.5rem !important;
            text-align: center;
            opacity: 0.8;
        }
        .nav-sidebar .nav-link p {
            font-size: 0.88rem;
        }

        /* Modern Dashboard Styles */
        :root {
            --primary-brand: #4361ee;
            --secondary-brand: #3f37c9;
            --dark-brand: #1b263b;
            --bg-main: #f0f2f5;
            --card-border: #e9ecef;
            --card-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        }

        .content-wrapper {
            background: var(--bg-main) !important;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 40px 0 80px 0;
            color: white;
            border-bottom-left-radius: 24px;
            border-bottom-right-radius: 24px;
            position: relative;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            z-index: 0;
        }

        .stat-cards-row {
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }

        .stat-card {
            border: 1px solid var(--card-border);
            border-radius: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            background: white;
            z-index: 10;
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        }

        .stat-card .inner {
            padding: 20px;
            text-align: center;
        }

        .stat-card h5 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 2px;
            color: #212529;
        }

        .stat-card span {
            font-size: 0.75rem;
            color: #adb5bd;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .stat-card .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px auto;
            font-size: 1.25rem;
        }

        .stat-card.bg-blue .icon-box { background: #e7f0ff; color: #4361ee; }
        .stat-card.bg-teal .icon-box { background: #e6fffa; color: #38b2ac; }
        .stat-card.bg-orange .icon-box { background: #fffaf0; color: #ed8936; }
        .stat-card.bg-pink .icon-box { background: #fff5f7; color: #d53f8c; }
        .stat-card.bg-indigo .icon-box { background: #ebf4ff; color: #5a67d8; }
        .stat-card.bg-green .icon-box { background: #e3f9ef; color: #2ec4b6; }
        .stat-card.bg-yellow .icon-box { background: #fff8e6; color: #ff9f1c; }
        .stat-card.bg-red .icon-box { background: #fbe9e7; color: #e71d36; }

        .stat-card[class*="bg-"] {
            background: white !important;
        }

        .academic-pill {
            display: inline-block;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            letter-spacing: 0.5px;
            text-transform: uppercase;
            backdrop-filter: blur(4px);
        }

        @media (max-width: 576px) {
            .dashboard-header h2 {
                font-size: 0.95rem;
                white-space: nowrap;
                letter-spacing: -0.2px;
                padding: 0 5px;
            }
            .dashboard-header p {
                font-size: 0.7rem !important;
            }
            .academic-pill {
                font-size: 0.65rem !important;
                padding: 4px 12px !important;
            }
        }

        .card-modern {
            border: 1px solid var(--card-border) !important;
            border-radius: 16px !important;
            box-shadow: var(--card-shadow) !important;
            background: white !important;
            overflow: hidden !important;
        }

        .info-box-sm {
            border-radius: 10px;
            padding: 16px;
            border: 1px solid #f1f3f5;
            transition: all 0.2s;
            height: 100%;
            background: white;
        }

        .info-box-sm:hover {
            background: #fafbfc;
            transform: translateY(-2px);
        }

        .token-box {
            background: #f8f9fa;
            padding: 16px;
            border-radius: 12px;
            text-align: center;
            border: 1.5px dashed #dee2e6;
            height: 100%;
        }

        /* Modern Loading Overlay */
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
            width: 64px;
            height: 64px;
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
            border: 4px solid transparent;
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

        /* Modern SweetAlert2 Loader */
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

        /* Universal Modern Design System */
        .badge-soft-primary { background-color: rgba(59, 130, 246, 0.15) !important; color: #2563eb !important; }
        .badge-soft-success { background-color: rgba(16, 185, 129, 0.15) !important; color: #059669 !important; }
        .badge-soft-warning { background-color: rgba(245, 158, 11, 0.15) !important; color: #d97706 !important; }
        .badge-soft-danger { background-color: rgba(239, 68, 68, 0.15) !important; color: #dc2626 !important; }
        .badge-soft-info { background-color: rgba(6, 182, 212, 0.15) !important; color: #0891b2 !important; }
        .badge-soft-secondary { background-color: rgba(107, 114, 128, 0.15) !important; color: #4b5563 !important; }

        .table-modern-list { border-collapse: separate !important; border-spacing: 0 !important; width: 100% !important; }
        .table-modern-list thead th { 
            background-color: #f8fafc !important; 
            color: #64748b !important; 
            text-transform: uppercase !important; 
            font-size: 0.75rem !important; 
            letter-spacing: 0.05em !important; 
            padding: 1.25rem 1rem !important; 
            border: none !important;
            font-weight: 700 !important;
        }
        .table-modern-list tbody td { 
            padding: 1.25rem 1rem !important; 
            vertical-align: middle !important; 
            border-top: 1px solid #f1f5f9 !important; 
            background-color: #ffffff;
        }
        .table-modern-list tbody tr:hover td { background-color: #f8fafc !important; }
        
        .header-blue {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }
        .uppercase { text-transform: uppercase; }
        .tracking-wider { letter-spacing: 0.05em; }

        /* Button Modernization */
        .btn-soft-primary { background-color: rgba(59, 130, 246, 0.1) !important; color: #3b82f6 !important; border: none !important; }
        .btn-soft-primary:hover { background-color: #3b82f6 !important; color: #ffffff !important; }
        .btn-soft-success { background-color: rgba(16, 185, 129, 0.1) !important; color: #10b981 !important; border: none !important; }
        .btn-soft-success:hover { background-color: #10b981 !important; color: #ffffff !important; }
        .btn-soft-warning { background-color: rgba(245, 158, 11, 0.1) !important; color: #f59e0b !important; border: none !important; }
        .btn-soft-warning:hover { background-color: #f59e0b !important; color: #ffffff !important; }
        .btn-soft-danger { background-color: rgba(239, 68, 68, 0.1) !important; color: #ef4444 !important; border: none !important; }
        .btn-soft-danger:hover { background-color: #ef4444 !important; color: #ffffff !important; }
        .btn-soft-secondary { background-color: rgba(107, 114, 128, 0.1) !important; color: #6b7280 !important; border: none !important; }
        .btn-soft-secondary:hover { background-color: #6b7280 !important; color: #ffffff !important; }
        .btn-round { border-radius: 50px !important; width: 32px !important; height: 32px !important; padding: 0 !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; }
        .avatar-initials {
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid white;
            transition: all 0.2s ease;
        }
        .avatar-initials:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Hide custom elements when sidebar is collapsed */
        .sidebar-collapse .main-sidebar .brand-link .d-flex,
        .sidebar-collapse .main-sidebar .user-panel {
            display: none !important;
        }
        .sidebar-collapse .main-sidebar .brand-link {
            border-bottom: 0 !important;
        }
    </style>
</head>

<script>
    let reloadCOunt = 0;
    let base_url = '<?=base_url()?>';

    let globalToken;
    var adaJadwalUjian;

    function getToken(func) {
        $.ajax({
            url: base_url + "dashboard/checktokenjadwal",
            type: "GET",
            success: function (response) {
                console.log('getToken', response.token);
                globalToken = response.token;
                adaJadwalUjian = response.ada_jadwal;
                if (reloadCOunt > 0) {
                    showSuccessToast('Token: <b>' + globalToken.token + '</b>');
                }
                reloadCOunt ++;

                if (func && (typeof func == "function")) {
                    func(response);
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        });
    }
</script>

<script type="text/javascript">
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);

        //document.getElementById('live-clock').innerHTML = h + ":" + m + ":" + s;
        $('#live-clock').html('<span class="text-lg">' + h + ':' + m + '</span>:' + s);
        setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;  // add zero in front of numbers < 10
        return i;
    }

    function buat_tanggal_indonesia(str) {
        str = str.replace("Jan", "Januari");
        str = str.replace("Feb", "Februari");
        str = str.replace("Mar", "Maret");
        str = str.replace("Apr", "April");
        str = str.replace("May", "Mei");
        str = str.replace("Jun", "Juni");
        str = str.replace("Jul", "Juli");
        str = str.replace("Aug", "Agustus");
        str = str.replace("Sep", "September");
        str = str.replace("Oct", "Oktober");
        str = str.replace("Nov", "Nopember");
        str = str.replace("Dec", "Desember");
        str = str.replace("Mon", "Senin");
        str = str.replace("Tue", "Selasa");
        str = str.replace("Wed", "Rabu");
        str = str.replace("Thu", "Kamis");
        str = str.replace("Fri", "Jumat");
        str = str.replace("Sat", "Sabtu");
        str = str.replace("Sun", "Minggu");
        return str;
    }

    function sanitizeJSON(unsanitized) {
        return unsanitized.replace(/\\/g, "\\\\").replace(/\n/g, "\\n").replace(/\r/g, "\\r").replace(/\t/g, "\\t").replace(/\f/g, "\\f").replace(/"/g, "\\\"").replace(/'/g, "\\\'").replace(/\&/g, "\\&");
    }

    var bulans = ['Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var arrhari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];

    function stringToDate(dateStr) {
        var parts = dateStr.split("-");
        return new Date(parts[0], parts[1] - 1, parts[2])
    }

    function dateToString(date) {
        let year = date.getFullYear();
        //let month = (1 + date.getMonth()).toString().padStart(2, '0');
        const month = date.getMonth();
        let day = date.getDate().toString().padStart(2, '0');
        return day + ' ' + bulans[month] + ' ' + year;
    }

    function dateToStringDay(date) {
        let year = date.getFullYear();
        //let month = (1 + date.getMonth()).toString().padStart(2, '0');
        const month = date.getMonth();
        let day = date.getDate().toString().padStart(2, '0');
        return arrhari[date.getDay()] + ', ' + day + ' ' + bulans[month] + ' ' + year;
    }
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

?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm" spellcheck="false" onload="startTime()">
<div class="wrapper">

    <div class="overlay-modern d-none" id="loading">
        <div class="loader-modern"></div>
    </div>

    <!-- Navbar -->
    <?php require_once("navbar.php"); ?>

    <!-- Sidebar -->
    <?php require_once("sidebar.php"); ?>
    <!-- /.sidebar -->
