<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $subjudul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-file-import mr-2"></i>Integrasi Database Siswa
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('datasiswa') ?>" class="btn btn-sm btn-white px-4 rounded-pill shadow-sm border-0 font-weight-bold" style="color: #1e3c72">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="alert alert-warning-light border-0 shadow-none d-flex align-items-center mb-4 p-3 rounded-lg">
            <div class="bg-warning p-2 rounded-circle mr-3" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center">
                <i class="fas fa-info text-white small"></i>
            </div>
            <div class="small">
                <b class="text-dark">Catatan Penting!</b> Harap gunakan format template Excel yang telah disediakan untuk memastikan integrasi data berjalan sempurna.
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card card-modern border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                        <div class="card-title font-weight-bold text-dark">
                            <i class="fas fa-file-excel mr-2 text-success"></i>File Excel
                        </div>
                        <?php $url = 'uploads/import/format/format_siswa.xlsx'; ?>
                        <a href="<?= base_url() . $url ?>" class="btn btn-xs btn-success rounded-pill px-3 shadow-none">
                            <i class="fas fa-download mr-1"></i> Template
                        </a>
                    </div>
                    <div class="card-body p-4 excel">
                        <?= form_open_multipart('', array('id' => 'formPreviewExcel')); ?>
                        <div class="form-group mb-0">
                            <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Unggah Berkas Excel</label>
                            <input type="file" id="input-file-events-excel" name="upload_file" class="dropify" data-height="180"/>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="card card-modern border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                        <div class="card-title font-weight-bold text-dark">
                            <i class="fas fa-eye mr-2 text-primary"></i>Pratinjau Data
                        </div>
                        <div class="card-tools">
                            <?= form_open('', array('id' => 'formUpload')); ?>
                            <button id="submit-excel" name="preview" type="submit"
                                    class="btn btn-sm btn-primary px-4 rounded-pill shadow-sm" disabled="disabled">
                                <i class="fas fa-cloud-upload-alt mr-2"></i>Mulai Import
                            </button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <div class="card-body p-4" id="file-preview">
                        <div class="table-responsive p-1" style="max-height: 400px">
                            <table id="tableprev" class="table-modern-preview table table-sm nowrap w-100"></table>
                        </div>
                        <div id="preview-empty-state" class="text-center py-5">
                            <i class="fas fa-table fa-3x text-muted opacity-20 mb-3"></i>
                            <p class="text-muted small italic mb-0">Belum ada file yang dipilih untuk dipratinjau.</p>
                        </div>
                        <div class="mt-4 pt-3 border-top d-flex align-items-center">
                            <i class="fas fa-check-circle text-success mr-2"></i>
                            <span class="small text-muted font-weight-bold italic">Pastikan seluruh kolom pada file template telah terisi dengan benar.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .card-modern { border-radius: 16px; }
    .btn-white { background: white; color: #1e3c72; border: none; }
    .btn-white:hover { background: #f8fafc; color: #2a5298; }
    .alert-warning-light { background-color: rgba(251, 191, 36, 0.1); color: #92400e; }
    
    /* Modern Preview Table */
    .table-modern-preview { border-collapse: separate; border-spacing: 0; }
    .table-modern-preview thead th {
        background: #f8fafc;
        border-bottom: 2px solid #e2e8f0 !important;
        color: #64748b;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.65rem;
        padding: 12px 15px !important;
        letter-spacing: 0.5px;
    }
    .table-modern-preview tbody td {
        padding: 10px 15px !important;
        font-size: 0.85rem;
        border-bottom: 1px solid #f1f5f9 !important;
        color: #334155;
    }
    .table-modern-preview tbody tr:last-child td { border-bottom: none !important; }

    /* Dropify Modernization */
    .dropify-wrapper {
        border: 2px dashed #e2e8f0 !important;
        border-radius: 12px !important;
        transition: all 0.2s;
    }
    .dropify-wrapper:hover { border-color: #cbd5e1 !important; background: #fdfdfd !important; }
    .dropify-message p { font-weight: 600; color: #64748b; font-size: 0.85rem !important; }
</style>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/exceljs.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/js-excel-template.min.js"></script>

<script>
    var typeImport = '<?=$tipe?>';
    var dataSiswa;
    $(document).ready(function () {
        ajaxcsrf();

        $('.dropify').dropify({
                tpl: {
                    wrap: '<div class="dropify-wrapper"></div>',
                    loader: '<div class="dropify-loader"></div>',
                    message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                    preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                    filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                    clearButton: '<button type="button" class="dropify-clear" onclick="onRemoved()">{{ remove }}</button>',
                    errorLine: '<p class="dropify-error">{{ error }}</p>',
                    errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
                }
            },
            {
                error: {
                    'fileSize': 'The file size is too big ({{ value }} max).',
                    'minWidth': 'The image width is too small ({{ value }}}px min).',
                    'maxWidth': 'The image width is too big ({{ value }}}px max).',
                    'minHeight': 'The image height is too small ({{ value }}}px min).',
                    'maxHeight': 'The image height is too big ({{ value }}px max).',
                    'imageFormat': 'The image format is not allowed ({{ value }} only).'
                }
            });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify');

        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        });

        // Used events
        var drEvente = $('#input-file-events-excel').dropify();
        var drEventw = $('#input-file-events-word').dropify();

        drEvente.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvente.on('dropify.afterClear', function (event, element) {
            $('#submit-excel').attr('disabled', 'disabled');
            $('#tableprev').html('')
            $('#preview-empty-state').removeClass('d-none');
        });

        drEvente.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
            $.toast({
                heading: "Error",
                text: "file rusak",
                icon: 'warning',
                showHideTransition: 'fade',
                allowToastClose: true,
                hideAfter: 5000,
                position: 'top-right'
            });
        });

        $('#input-file-events-excel').on('change', async function(e) {
            var files = e.target.files || [];
            if (!files.length) return;

            const jsonData = await getDataFromExcel(files[0])
            createTable(jsonData[jsonData.sheets[0]], '#tableprev')
        });

        $('#formUpload').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", Object.fromEntries(dataSiswa));

            var url = typeImport === "add" ? "datasiswa/do_import" : "datasiswa/updateall";
            swal.fire({
                text: "Silahkan tunggu....",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: () => {
                    swal.showLoading();
                }
            });

            $.ajax({
                url: base_url + url,
                type: "POST",
                data: dataSiswa,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        swal.fire({
                            title: "Berhasil",
                            text: "Data siswa berhasil diimpor",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.history.back();
                            }
                        });
                    } else {
                        let arrNisnDup = [];
                        let arrNisDup = [];
                        let arrUserDup = [];
                        $.each(data.errors, function (idx, o) {
                            console.log(idx, o);
                            if (o.nisn !== "") arrNisnDup.push("<br />" + idx + ": " +o.nisn);
                            if (o.nis !== "") arrNisDup.push("<br />" + idx + ": " +o.nis);
                            if (o.username !== "") arrUserDup.push("<br />" + idx + ": " +o.username);
                        });
                        let err = arrNisnDup.length ? `<b>${arrNisnDup.join("' ")}</b>` : '';
                        err += arrNisDup.length ? `<br /><b>${arrNisDup.join("' ")}</b>` : '';
                        err += arrUserDup.length ? `<br /><b>${arrUserDup.join("' ")}</b>` : '';
                        swal.fire({
                            title: "Gagal",
                            html: 'cek kembali siswa berikut: <br />'+err+'',
                            icon: "error"
                        }).then(result => {});
                    }
                }, error: function (xhr, status, error) {
                    $('#file-preview').html(xhr.responseText);
                    console.log("error:", xhr);
                    swal.fire({
                        title: "Gagal",
                        html: 'Gagal menyimpan data',
                        icon: "error"
                    });
                }
            });
            //return false;
        });

    });

    function onRemoved() {
        $(".dropify-filename-inner").text("");
    }

    function createTable(list, selector) {
        $('#preview-empty-state').addClass('d-none');
        let cols = Headers(list.header, selector);
        let len = list.rows.length;
        if (list.rows.length > 50) len = 50;
        for (let i = 0; i < len; i++) {
            let row = $('<tr/>');
            for (let colIndex = 0; colIndex < cols.length; colIndex++) {
                let val = list.rows[i][cols[colIndex]] || '';
                if (colIndex === 3 || colIndex > 8) {
                    row.append($('<td/>').html(val));
                } else {
                    row.append($('<td class="text-center" />').html(val));
                }
            }
            $(selector).append(row);
        }

        if (list.rows.length > 0) {
            $('#submit-excel').removeAttr('disabled');

            dataSiswa = new FormData($('#formUpload')[0])
            list.rows.forEach(function (siswa, ind) {
                for (const key in siswa) {
                    if (key) {dataSiswa.append('siswa['+ind+']['+key+']', siswa[key])}
                }
            })
        } else {
            $('#submit-excel').attr('disabled', 'disabled');
        }
    }

    function Headers(list, selector) {
        let columns = [];
        let header = $('<tr/>');

        for (let i = 0; i < list.length; i++) {
            let row = list[i];
            for (let k in row) {
                if (k === 'label') {
                    header.append($('<th class="text-center align-middle" />').html(row[k]));
                } else {
                    if ($.inArray(row[k], columns) == -1) {
                        columns.push(row[k]);
                    }
                }
            }
        }
        $(selector).append(header);
        return columns;
    }

    function getDataFromExcel(file) {
        return new Promise((resolve, reject) => {
            const wb = new ExcelJS.Workbook();
            const reader = new FileReader()
            reader.onload = async () => {
                try {
                    const buffer = reader.result;
                    wb.xlsx.load(buffer).then(workbook => {
                        let dataFiles = {}
                        workbook.eachSheet((sheet, id) => {
                            if (!dataFiles['sheets']) dataFiles['sheets'] = []
                            dataFiles['sheets'].push(sheet.name)
                            let cols = {
                                'name': sheet.name,
                                'header': [],
                                'rows': []
                            }
                            //let head = []
                            sheet.eachRow({includeEmpty: true}, (row, rowIndex) => {
                                let obj = {}
                                for (let i = 0; i < row.values.length; i++) {
                                    if (rowIndex === 1) {
                                        if (row.values[i]) {
                                            let val = row.values[i] || 'val-'+i;
                                            if (isRichValue(row.values[i])) {
                                                val = richToString(row.values[i])
                                            }
                                            if (val && val.includes('|')) val = val.split('|')[0]
                                            let h = {
                                                label: val,
                                                value: i//key,
                                            }
                                            cols.header.push(h)
                                        }
                                    } else {
                                        let val = row.values[i] || '';
                                        if (isRichValue(row.values[i])) {
                                            val = richToString(row.values[i])
                                        }
                                        if (i===2||i===3||i===14||i===19||i===20||i===30||i===36||i===42) {
                                            val = val.replace("'", "")
                                            console.log('index', i, val)
                                        }
                                        obj[i] = val
                                    }
                                }
                                cols.rows.push(obj)
                            })
                            cols.rows = removeEmptyObjects(cols.rows)
                            dataFiles[sheet.name] = cols
                        })
                        resolve(dataFiles)
                    })
                } catch (err) {
                    reject(err)
                }
            }
            reader.onerror = (error) => {
                reject(error)
            };
            reader.readAsArrayBuffer(file)
        });
    }

    function removeEmptyObjects(array) {
        return array.filter(element => {
            delete element.undefined
            return Object.keys(element).length !== 0;
        });
    }

    function isRichValue(value) {
        return Boolean(value && Array.isArray(value.richText));
    }

    function richToString(rich) {
        return rich.richText.map(({ text }) => text).join('|');
    }

</script>
