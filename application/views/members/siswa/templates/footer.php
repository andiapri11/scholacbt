</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<script src="<?= base_url() ?>/assets/app/js/running-text/jquery.marquee.min.js"></script>
<div id="running-text-container" style="position: -webkit-sticky;
	position: sticky;
	bottom: 0;
	padding: 5px 0;
	background: rgba(30, 60, 114, 0.95);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
	font-size: 12pt;
	color: white;
    height: auto;
    border-top: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 -4px 12px rgba(0,0,0,0.1);
    z-index: 1040;">
    <div id="running-text-siswa" class="marquee" style="overflow: hidden;"></div>
</div>

<footer class="main-footer bg-white border-top shadow-sm py-3" style="backdrop-filter: blur(10px); background: rgba(255, 255, 255, 0.8) !important; margin-left: 0 !important;">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 text-md-left text-center">
                <div class="text-muted small">
                    Copyright &copy; 2026 <strong><span class="text-primary">ScholaCBT</span></strong> by <a href="https://codifi.id" target="_blank" class="text-dark font-weight-bold">Codifi.id</a>.
                </div>
            </div>
            <div class="col-md-6 text-md-right text-center mt-md-0 mt-2">
                <div class="text-muted small">
                    All rights reserved. <span class="d-none d-sm-inline-block">| <i class="fas fa-heart text-danger"></i> untuk Pendidikan Indonesia</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .main-footer {
        padding: 1rem !important;
    }
</style>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Required JS -->
<!-- v3 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);

    var runningText = JSON.parse('<?= json_encode($running_text) ?>');
    //console.log('runn', runningText);
    var teks = '';
    $.each(runningText, function (i, v) {
        teks += '<span class="ml-3 mr-3">' + v.text + '</span> &bull; '
    });

    $('#running-text-siswa').html(teks);

    $('.marquee').marquee({
        duration: 15000,
        //gap in pixels between the tickers
        gap: 20,
        delayBeforeStart: 1,
        direction: 'left',
        //true or false - should the marquee be duplicated to show an effect of continues flow
        duplicated: true
    });

</script>
<!-- DataTables -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?= base_url() ?>/assets/plugins/pace-progress/pace.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/audio/summernote-audio.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/file/summernote-file.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/gallery/dist/summernote-gallery.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/math/summernote-math.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- multi select -->
<script src="<?= base_url() ?>/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/jquery.toast.min.js"></script>

<!-- TimeAgo -->
<script src="<?= base_url() ?>/assets/plugins/jquery-timeago/jquery.timeago.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/adminlte.js"></script>

<!-- App JS -->
<script src="<?= base_url() ?>/assets/app/js/show.toast.js"></script>
<script src="<?= base_url() ?>/assets/app/js/dashboard_guru.js"></script>

<!-- Custom JS -->
<script type="text/javascript">
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    function ajaxcsrf() {
        var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
        var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
        var csrf = {};
        csrf[csrfname] = csrfhash;
        $.ajaxSetup({
            "data": csrf
        });
    }

    function reload_ajax() {
        table.ajax.reload();
    }

    var initDestroyTimeOutPace = function () {
        var counter = 0;

        var refreshIntervalId = setInterval(function () {
            var progress;

            if (typeof $('.pace-progress').attr('data-progress-text') !== 'undefined') {
                progress = Number($('.pace-progress').attr('data-progress-text').replace("%", ''));
            }

            if (progress === 99) {
                counter++;
            }

            if (counter > 50) {
                clearInterval(refreshIntervalId);
                Pace.stop();
            }
        }, 100);
    };
    initDestroyTimeOutPace();

</script>

</body>

</html>
