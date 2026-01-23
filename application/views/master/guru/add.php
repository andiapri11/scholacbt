<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $subjudul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-user-plus mr-2"></i>Tambah Manual & Import Data Guru
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('dataguru') ?>" class="btn btn-sm btn-white px-4 rounded-pill shadow-sm border-0 font-weight-bold" style="color: #1e3c72">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <?= form_open('', array('id' => 'formguru')); ?>
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="card-title font-weight-bold text-dark">
                    <i class="fas fa-keyboard mr-2 text-primary"></i>Tambah Guru Manual
                </div>
                <div class="card-tools">
                    <button type="reset" class="btn btn-sm btn-outline-warning px-3 rounded-pill font-weight-bold mr-2 border-0 shadow-none">
                        <i class="fas fa-undo mr-1"></i> Reset
                    </button>
                    <button type="submit" id="submit" class="btn btn-sm btn-primary px-4 rounded-pill font-weight-bold shadow-sm">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="form-group mb-4">
                            <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Nama Lengkap Guru <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-user text-muted"></i></span>
                                </div>
                                <input id="nama_guru" type="text" class="form-control border-left-0" name="nama_guru" placeholder="Nama Guru Lengkap + Gelar" required style="background: #f8fafc">
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">NIP / NUPTK <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-id-card text-muted"></i></span>
                                </div>
                                <input type="number" id="nip" class="form-control border-left-0" name="nip" placeholder="Nomor Induk Pegawai" required style="background: #f8fafc">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Username Login <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-at text-muted"></i></span>
                                </div>
                                <input id="username" type="text" class="form-control border-left-0" name="username" placeholder="Username untuk login" required style="background: #f8fafc">
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="small font-weight-bold text-muted uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px">Password Login <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-key text-muted"></i></span>
                                </div>
                                <input id="password" class="form-control border-left-0" name="password" placeholder="Password minimal 6 karakter" required style="background: #f8fafc">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close(); ?>

        <div class="alert alert-info-light border-0 shadow-none d-flex align-items-start mb-4 p-4 rounded-lg">
            <div class="bg-info p-2 rounded-circle mr-3 mt-1" style="width: 32px; height: 32px; flex-shrink: 0; display: flex; align-items: center; justify-content: center">
                <i class="fas fa-info-circle text-white small"></i>
            </div>
            <div>
                <h6 class="font-weight-bold text-info mb-1" style="font-size: 0.9rem">Petunjuk Import Data:</h6>
                <ul class="mb-0 small text-muted list-unstyled">
                    <li><i class="fas fa-check-circle text-success mr-2 mb-1"></i>Gunakan template excel atau word yang telah disediakan untuk mempercepat proses input massal.</li>
                    <li><i class="fas fa-check-circle text-success mr-2 mb-1"></i>Hanya template <b>WORD</b> yang mendukung penyisipan foto profil secara otomatis.</li>
                    <li><i class="fas fa-check-circle text-success mr-2"></i>Pastikan format kolom tidak diubah agar data terbaca dengan sempurna oleh sistem.</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card card-modern border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                        <div class="card-title font-weight-bold text-dark">
                            <i class="fas fa-file-excel mr-2 text-success"></i>Import via Excel
                        </div>
                        <a href="<?= base_url('uploads/import/format/format_guru.xlsx') ?>" class="btn btn-xs btn-success rounded-pill px-3 shadow-none font-weight-bold">
                            <i class="fas fa-download mr-1"></i> Template
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <?= form_open_multipart('', array('id' => 'formPreviewExcel')); ?>
                        <div class="form-group mb-0">
                            <input type="file" id="input-file-events-excel" name="upload_file" class="dropify" data-height="150" />
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card card-modern border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                        <div class="card-title font-weight-bold text-dark">
                            <i class="fas fa-file-word mr-2 text-primary"></i>Import via Word
                        </div>
                        <a href="<?= base_url('uploads/import/format/format_guru.docx') ?>" class="btn btn-xs btn-primary rounded-pill px-3 shadow-none font-weight-bold">
                            <i class="fas fa-download mr-1"></i> Template
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <?= form_open_multipart('', array('id' => 'formPreviewWord')); ?>
                        <div class="form-group mb-0">
                            <input type="file" id="input-file-events-word" name="upload_file" class="dropify" data-height="150" />
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-modern border-0 shadow-sm mb-5">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div class="card-title font-weight-bold text-dark">
                    <i class="fas fa-eye mr-2 text-warning"></i>Preview Data Import
                </div>
                <?= form_open('', array('id' => 'formUpload')); ?>
                <button name="preview" type="submit" class="btn btn-sm btn-primary px-4 rounded-pill shadow-sm font-weight-bold">
                    <i class="fas fa-cloud-upload-alt mr-2"></i>Mulai Import
                </button>
                <?= form_close(); ?>
            </div>
            <div class="card-body p-4">
                <div id="file-preview" class="table-responsive">
                    <div id="preview-empty-state" class="text-center py-5">
                        <i class="fas fa-file-import fa-3x text-muted opacity-20 mb-3"></i>
                        <h6 class="text-muted font-weight-bold">Tidak Ada Data Preview</h6>
                        <p class="text-muted small">Pilih file excel atau word di atas untuk melihat preview data sebelum diimport.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .card-modern { border-radius: 16px; transition: all 0.3s ease; }
    .btn-white { background: white; color: #1e3c72; border: none; }
    .btn-white:hover { background: #f8fafc; color: #2a5298; }
    .alert-info-light { background-color: rgba(66, 153, 225, 0.1); color: #2b6cb0; }
    
    .dropify-wrapper { border-radius: 12px !important; border: 2px dashed #e2e8f0 !important; }
    .dropify-wrapper:hover { border-color: #cbd5e1 !important; }
    .dropify-wrapper .dropify-message p { font-weight: 600 !important; color: #64748b !important; }

    .input-group-text { border-color: #e2e8f0; }
    .form-control { border-color: #e2e8f0; height: calc(2.25rem + 2px); }
    .form-control:focus { border-color: #cbd5e1; box-shadow: none; background: #fff !important; }

    .table-soal { font-size: 0.85rem; }
    .table-soal th { background: #f8fafc; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0 !important; }
</style>

<script src="<?= base_url() ?>/assets/app/js/mammoth.browser.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/exceljs.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/js-excel-template.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/jquery.htmlparser.min.js"></script>
<script>
    let formDataGuru;

    $(document).ready(function () {
        ajaxcsrf();

        $('#formguru').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log('klik submit');
            var btn = $('#submit');

            btn.attr('disabled', 'disabled').text('Wait...');
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
                url: base_url + "dataguru/create",
                data: $(this).serialize(),
                dataType: "JSON",
                type: 'POST',
                success: function (response) {
                    console.log('sukses', response);
                    btn.removeAttr('disabled').text('Simpan');
                    if (response.status) {
                        swal.fire('Sukses', 'Data Berhasil disimpan', 'success')
                            .then((result) => {
                                if (result.value) {
                                    $("#nama_guru").val("");
                                    $("#nip").val("");
                                    $("#username").val("");
                                    $('#password').val("");
                                    //window.location.href = base_url+'dataguru';
                                }
                            });
                    } else {
                        let errs = '';
                        $.each(response.errors, function (key, val) {
                            errs += val
                            $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                            if (val === '') {
                                $('[name="' + key + '"]').closest('.form-group').removeClass('has-error').addClass('has-success');
                                $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                            }
                        });
                        swal.fire({
                            title: "Gagal",
                            html: errs,
                            icon: "error"
                        });
                    }
                },error: function (xhr, status, error) {
                    console.log("error", e.responseText);
                    swal.fire({
                        title: "Gagal",
                        html: 'Gagal menyimpan data',
                        icon: "error"
                    });
                }
            })
        });

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
            },
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
        var drEvente = $('.dropify').dropify();

        drEvente.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvente.on('dropify.afterClear', function (event, element) {
            formDataGuru = null;
            $('#file-preview').html('<div id="preview-empty-state" class="text-center py-5"><i class="fas fa-file-import fa-3x text-muted opacity-20 mb-3"></i><h6 class="text-muted font-weight-bold">Tidak Ada Data Preview</h6><p class="text-muted small">Pilih file excel atau word di atas untuk melihat preview data sebelum diimport.</p></div>')
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

            formDataGuru = null;
            $('#preview-empty-state').remove();
            $('#file-preview').html('<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div><p class="text-muted small mt-2">Memproses file excel...</p></div>');
            const jsonData = await getDataFromExcel(files[0])
            $('#file-preview').empty();
            createTable(jsonData[jsonData.sheets[0]], tbl)
        });

        $('#input-file-events-word').on('change', async function(e) {
            var files = e.target.files || [];
            if (!files.length) return;
            formDataGuru = null;
            $('#preview-empty-state').remove();
            parseWordDocxFile(files[0])
        });

        $('#formUpload').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            //console.log('form', Object.fromEntries(formDataGuru))

            $.ajax({
                url: base_url + "dataguru/do_import",
                type: "POST",
                processData: false,
                contentType: false,
                data: formDataGuru,
                success: function (data) {
                    if (data.status) window.history.back();
                    else {
                        console.log("error", data);
                        $.toast({
                            heading: "ERROR!!",
                            text: JSON.stringify(data.errors),
                            icon: 'error',
                            showHideTransition: 'fade',
                            allowToastClose: true,
                            hideAfter: 5000,
                            position: 'top-right'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.log("error", e.responseText);
                    $.toast({
                        heading: "ERROR!!",
                        text: "file tidak terbaca",
                        icon: 'error',
                        showHideTransition: 'fade',
                        allowToastClose: true,
                        hideAfter: 5000,
                        position: 'top-right'
                    });
                }
            });
            return false;
        });

        $.fn.toJson = function(){
            if(!this.is('table')){
                return;
            }

            var results = [];

            this.find('table tr').each(function(indx, obj){
                var tds = $(obj).children('td');
                results.push(tds);
            });

            return results;
        }
    });

    function parseWordDocxFile(file) {
        var showDiv = $('#file-preview')

        swal.fire({
            title: "Memuat file",
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
        console.time();
        var reader = new FileReader();

        reader.onloadend = function (event) {
            var arrayBuffer = reader.result;
            mammoth.convertToHtml({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                //console.log('file', resultObject)
                showDiv.html(resultObject.value);
                setTimeout(function () {
                    formDataGuru = new FormData($('#formUpload')[0])

                    showDiv.children().not("table").remove();
                    showDiv.children('table').each(function (i, v) {
                        $(this).addClass('table table-bordered w-100 table-soal');
                        const $trs = $(this).find('tr'), headers = $trs.splice(0, 1); // header rows
                        $trs.each(function (index, tr) {
                            var cekTbl = $(tr).parent().closest('td');
                            if (cekTbl.length === 0) {
                                var nama = $(this).find("td:eq(1)").text().trim();
                                var nip = $(this).find("td:eq(2)").text().trim();
                                var kode = $(this).find("td:eq(3)").text().trim();
                                var username = $(this).find("td:eq(4)").text().trim();
                                var password = $(this).find("td:eq(5)").text().trim();
                                var foto = $(this).find("td:eq(6)").find('img');
                                foto.each(function (ind, img) {
                                    $(img).attr('width', '100')
                                });
                                if (nama && nip && kode && username && password) {
                                    formDataGuru.append('guru['+index+'][2]', nama)
                                    formDataGuru.append('guru['+index+'][3]', nip)
                                    formDataGuru.append('guru['+index+'][4]', kode)
                                    formDataGuru.append('guru['+index+'][5]', username)
                                    formDataGuru.append('guru['+index+'][6]', password)
                                    if (foto.length > 0) {
                                        const ftGuru = $(foto[0]).attr('src')
                                        const ext = ftGuru.substring("data:image/".length, ftGuru.indexOf(";base64"))
                                        const base64 = ftGuru.split(';base64')[1]
                                        //console.log('file', ftGuru)
                                        formDataGuru.append('guru['+index+'][7]', base64)
                                        formDataGuru.append('guru['+index+'][8]', ext)
                                    }
                                } else {
                                    $(this).remove();
                                }
                            }
                        });
                    });
                    swal.close();
                }, 500);
            });
        };
        reader.readAsArrayBuffer(file);
    }

    function createTable(list, selector) {
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
        $('#file-preview').prepend(selector)

        if (list.rows.length > 0) {
            formDataGuru = new FormData($('#formUpload')[0])
            list.rows.forEach(function (siswa, ind) {
                for (const key in siswa) {
                    if (key) {formDataGuru.append('guru['+ind+']['+key+']', siswa[key])}
                }
            })
        } else {
            // empty
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
                                        if (i===3) {
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

    function onRemoved() {
        $(".dropify-filename-inner").text("");
    }
</script>
