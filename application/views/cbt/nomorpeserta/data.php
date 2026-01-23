<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-light">
    <div class="dashboard-header mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 30px 0 60px 0; color: white;">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="font-weight-bold mb-1" style="letter-spacing: -0.5px"><?= $judul ?></h2>
                    <p class="mb-0 opacity-75 small uppercase font-weight-bold" style="letter-spacing: 1px">
                        <i class="fas fa-id-card-alt mr-2"></i>Generate & Atur Nomor Peserta Ujian
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <?= form_open('setNomor', array('id' => 'setNomor', 'class' => 'd-inline')); ?>
                    <button type="submit" class="btn btn-warning text-white rounded-pill px-4 shadow-sm font-weight-bold border-0">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4" style="margin-top: -40px">
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-4 border-bottom">
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                         <label class="small font-weight-bold text-muted uppercase mb-1">Pilih Kelas</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0 border-gray-light"><i class="fas fa-chalkboard-teacher text-muted"></i></span>
                             </div>
                             <?php
                             echo form_dropdown(
                                 'kelas[]',
                                 $kelas,
                                 null,
                                 'id="kelas" class="form-control select2 border-gray-light shadow-none" multiple="multiple" data-placeholder="Pilih kelas penilaian"'
                             ); ?>
                         </div>
                         <small class="text-muted mt-2 d-block"><i class="fas fa-info-circle mr-1"></i>Pilih satu atau lebih kelas untuk mengatur nomor peserta.</small>
                    </div>
                    <div class="col-md-6 pl-md-4 d-none" id="generate" style="border-left: 1px solid #e2e8f0;">
                         <label class="small font-weight-bold text-muted uppercase mb-3 d-block">Aksi Cepat</label>
                         <div class="d-flex">
                             <button type="button" class="btn btn-outline-primary rounded-pill px-3 font-weight-bold mr-2 shadow-sm" onclick="createNumber()">
                                 <i class="fas fa-magic mr-2"></i> Buat Otomatis
                             </button>
                             <button type="button" class="btn btn-outline-danger rounded-pill px-3 font-weight-bold shadow-sm" onclick="resetNumber()">
                                 <i class="fas fa-trash-alt mr-2"></i> Reset Nomor
                             </button>
                         </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
               
                    <div class="table-responsive">
                        <table class="table-modern-list w-100" id="table-nomor">
                        </table>
                    </div>
               
                <div class="overlay d-none" id="loading">
                    <div class="spinner-border text-primary" role="status"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .card-modern { border-radius: 16px; }
    
    .table-modern-list { border-collapse: separate !important; border-spacing: 0 8px !important; }
    .table-modern-list thead th {
        border: none;
        color: #94a3b8;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        padding: 0 16px 10px 16px;
    }
    .table-modern-list tbody tr {
        background: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        transition: all 0.2s;
        border-radius: 10px;
    }
    .table-modern-list tbody tr:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .table-modern-list tbody td { border: none; padding: 12px 16px; vertical-align: middle; }
    .table-modern-list tbody td:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px; }
    .table-modern-list tbody td:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px; }
    
    .badge-soft-primary { background-color: rgba(59, 130, 246, 0.1); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.2); }
    .badge-soft-light { background-color: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; }
    .border-gray-light { border-color: #e2e8f0 !important; }
    
    .editable:focus {
        outline: 2px solid #3b82f6;
        background: #fff;
        color: #1e293b !important;
    }
</style>

<script>
    var arrKelas = JSON.parse('<?=json_encode($kelas)?>');
    var tahun = '<?=$tp_active->tahun?>';

    function sortByName(a, b) {
        var aName = a.nama.toLowerCase();
        var bName = b.nama.toLowerCase();
        return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
    }

    function sortByNumber(a, b) {
        var aName = a.nomor;
        var bName = b.nomor;
        //return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
        return (aName === '') - (bName === '') || +(a > b) || -(a < b);
    }

    //array.sort(SortByName);

    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }

    var arrayNomor = [];

    function getNomorPeserta(arr) {
        if (arr.length > 0) {
            $('#loading').removeClass('d-none');
            setTimeout(function () {
                var arrStr = encodeURIComponent(JSON.stringify(arr));
                $.ajax({
                    type: "GET",
                    url: base_url + "cbtnomorpeserta/getsiswakelas/" + arrStr,
                    success: function (response) {
                        console.log(response);
                        var newArr = [];
                        $.map(response.siswa, function (value, index) {
                            var item = {};
                            item['id'] = value.id_siswa;
                            item['username'] = value.username;
                            item['nama'] = value.nama;
                            item['level'] = value.level;
                            item['kelas'] = value.nama_kelas;
                            item['nomor'] = response.nomor[value.id_siswa] != null ? response.nomor[value.id_siswa].nomor_peserta : '';

                            newArr.push(item);
                        });
                        newArr.sort(sortByNumber);
                        arrayNomor = newArr;
                        createPreview();
                    }
                })
            }, 500);
        } else {
            $('#generate').addClass('d-none');
        }
    }

    function resetNumber() {
        var val = $('#kelas').val();

        if (val.length > 0) {
            $('#loading').removeClass('d-none');
            setTimeout(function () {
                var arrStr = encodeURIComponent(JSON.stringify(val));
                console.log(arrStr);
                $.ajax({
                    url: base_url + "cbtnomorpeserta/resetnomor?kelas=" + arrStr,
                    type: "GET",
                    //data: $(this).serialize() + "&siswa=" + JSON.stringify(arrayNomor),
                    success: function (data) {
                        console.log("response:", data);
                        if (data.status) {
                            getNomorPeserta(val)
                        } else {
                            swal.fire({
                                title: "ERROR",
                                text: "Data Tidak Tersimpan",
                                icon: "error",
                                showCancelButton: false,
                            });
                        }
                    }, error: function (xhr, status, error) {
                        const err = JSON.parse(xhr.responseText)
                        swal.fire({
                            title: "Error",
                            text: err.Message,
                            icon: "error"
                        });
                    }
                });
            });
        }
    }

    function createNumber() {
        $('#loading').removeClass('d-none');
        setTimeout(function () {
            if (arrayNomor.length > 0) {
                //var t = new Date();
                //var current = t.getFullYear();
                //t.setFullYear(t.getFullYear() + 1);
                var thn = tahun.split('/');
                //console.log(current.toString().substr(-2), t.getFullYear().toString().substr(-2));

                var newArrNomor = [];
                var n = 1;
                $.map(arrayNomor, function (value, index) {
                    var item = {};
                    item['id'] = value.id;
                    item['username'] = value.username;
                    item['nama'] = value.nama;
                    item['level'] = value.level;
                    item['kelas'] = value.kelas;
                    item['nomor'] = thn[0].substr(-2) +
                        thn[1].substr(-2) + '.' +
                        pad(value.level, 2) + '.' +
                        pad(n, 3);

                    n++;
                    newArrNomor.push(item);
                });
                arrayNomor = newArrNomor;
                createPreview();
            }
        }, 500);
    }

    function createPreview() {
        $('#generate').removeClass('d-none');
        $('#table-nomor').html('');
        var tbody = '<thead class="text-secondary">' +
            '<tr>' +
            '<th class="text-center font-weight-bold" width="50">NO.</th>' +
            '<th class="text-center font-weight-bold" width="150">USER ID</th>' +
            '<th class="font-weight-bold">NAMA LENGKAP</th>' +
            '<th class="text-center font-weight-bold">KELAS</th>' +
            '<th class="text-center font-weight-bold">NO. PESERTA</th>' +
            '</tr></thead><tbody>';

        for (let i = 0; i < arrayNomor.length; i++) {
            tbody += '<tr>' +
                '<td class="text-center font-weight-bold text-muted">' + (i + 1) + '</td>' +
                '<td class="text-center"><span class="badge badge-soft-light text-muted">' + arrayNomor[i].username + '</span></td>' +
                '<td class="font-weight-bold text-dark">' + arrayNomor[i].nama + '</td>' +
                '<td class="text-center"><span class="badge badge-soft-primary px-3 py-1 rounded-pill">' + arrayNomor[i].kelas + '</span></td>' +
                '<td class="text-center p-2"><div class="editable rounded-pill bg-light border p-2 font-weight-bold text-primary" id="' + arrayNomor[i].id + '">' + arrayNomor[i].nomor + '</div></td>' +
                '</tr>';
        }

        tbody += '</tbody>';
        $('#table-nomor').html(tbody);
        $('#loading').addClass('d-none');

        $('.editable').attr('contentEditable', true);
    }

    $(document).ready(function () {
        ajaxcsrf();

        var opsiKelas = $("#kelas");
        opsiKelas.select2();

        //console.log(Object.keys(arrKelas).length);

        if (Object.keys(arrKelas).length > 0) {
            opsiKelas.prepend("<option value='Semua'>Semua Kelas</option>");
        }

        opsiKelas.change(function () {
            var val = $(this).val();
            getNomorPeserta(val);
        });

        $('#setNomor').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            if (arrayNomor.length > 0) {

                const $rows1 = $('#table-nomor').find('tr'), headers1 = $rows1.splice(0, 1);
                $rows1.each((i, row) => {
                    const id = $(row).find('td.editable').attr('id');
                    const nomor = $(row).find('td.editable').text().trim();
                    for (let j = 0; j < arrayNomor.length; j++) {
                        //if (arrayNomor[j])
                        if (arrayNomor[j].id == id) {
                            arrayNomor[j].nomor = nomor;
                        }
                    }
                });

                //console.log($(this).serialize() + "&siswa=" + JSON.stringify(arrayNomor));
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
                    url: base_url + "cbtnomorpeserta/savenomor",
                    type: "POST",
                    dataType: "JSON",
                    data: $(this).serialize() + "&siswa=" + JSON.stringify(arrayNomor),
                    success: function (data) {
                        console.log("response:", data);
                        console.log(data);
                        if (data) {
                            swal.fire({
                                title: "Sukses",
                                text: "Nomor Peserta berhasil disimpan",
                                icon: "success",
                                showCancelButton: false,
                            });
                        } else {
                            swal.fire({
                                title: "ERROR",
                                html: "Data Tidak Tersimpan<br>Nomor tidak boleh sama",
                                icon: "error",
                                showCancelButton: false,
                            });
                        }
                    }, error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        const err = JSON.parse(xhr.responseText)
                        swal.fire({
                            title: "Error",
                            text: err.Message,
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
</script>
