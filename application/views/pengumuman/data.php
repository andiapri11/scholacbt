<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<style>
    .content-wrapper {
        background: #f4f6f9 !important;
    }
    .my-shadow {
        box-shadow: 0 10px 25px rgba(0,0,0,0.05) !important;
        border: none !important;
        border-radius: 12px !important;
        overflow: hidden;
    }
    .card-header {
        background-color: #111c43 !important;
        border-bottom: 3px solid #4361ee !important;
        padding: 1rem 1.25rem !important;
        color: #ffffff !important;
        font-weight: 600 !important;
        letter-spacing: 0.5px;
    }
    .card-title {
        color: #ffffff !important;
        font-weight: 600 !important;
        margin: 0;
    }
    label, p {
        color: #4a5568 !important;
        font-weight: 600 !important;
        font-size: 0.85rem !important;
    }
    .btn-primary {
        background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%) !important;
        border: none !important;
        padding: 0.6rem 1.2rem !important;
        border-radius: 8px !important;
        box-shadow: 0 4px 10px rgba(67, 97, 238, 0.2) !important;
    }
    .btn-success {
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%) !important;
        border: none !important;
    }
    .select2-container--default .select2-selection--multiple {
        border-radius: 8px !important;
        border: 1px solid #e2e8f0 !important;
        background-color: #f8fafc !important;
        padding: 4px !important;
    }
    .note-editor.note-frame {
        border: 1px solid #e2e8f0 !important;
        border-radius: 12px !important;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important;
    }
    .note-toolbar {
        background: #f8fafc !important;
        padding: 10px 12px !important;
        border-bottom: 1px solid #e2e8f0 !important;
    }
    .note-btn-group {
        margin-right: 8px !important;
    }
    .note-btn {
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 8px !important;
        color: #4a5568 !important;
        padding: 6px 10px !important;
        box-shadow: 0 1px 2px rgba(0,0,0,0.03) !important;
        transition: all 0.2s ease !important;
        font-size: 13px !important;
    }
    .note-btn:hover {
        background: #edf2f7 !important;
        color: #4361ee !important;
        border-color: #cbd5e0 !important;
        transform: translateY(-1px);
    }
    .note-btn.active {
        background: #4361ee !important;
        color: #ffffff !important;
        border-color: #3a0ca3 !important;
    }
    .note-dropdown-menu {
        border-radius: 10px !important;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1) !important;
        padding: 8px !important;
    }
    .note-dropdown-item:hover {
        background-color: #f1f5f9 !important;
        color: #4361ee !important;
    }
    .note-modal-content {
        border-radius: 15px !important;
        border: none !important;
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1) !important;
    }
    .note-modal-header {
        border-bottom: 1px solid #f1f5f9 !important;
        padding: 15px 20px !important;
    }
    .note-modal-footer {
        border-top: 1px solid #f1f5f9 !important;
        padding: 15px 20px !important;
    }
    .post-card {
        border: none !important;
        border-radius: 15px !important;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03) !important;
        margin-bottom: 2rem !important;
        transition: transform 0.2s ease;
    }
    .post-card:hover {
        transform: translateY(-2px);
    }
    .btn-circle {
        width: 50px;
        height: 50px;
        line-height: 42px;
        text-align: center;
        padding: 0;
        border-radius: 50%;
        font-size: 1.2rem;
        font-weight: bold;
    }
</style>

<div class="content-wrapper pt-4">
    <section class="content">
        <div class="container">
            <div class="row">
                <?php
                if ($this->ion_auth->is_admin()) :
                    ?>
                    <div class="col-12 col-md-5 mb-4">
                        <div class="card my-shadow">
                            <div class="card-header">
                                <i class="fas fa-bullhorn mr-2 text-info"></i> Running Text
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info border-0 shadow-sm mb-4" role="alert" style="background-color: rgba(67, 97, 238, 0.1); color: #111c43; font-size: 0.85rem;">
                                    <i class="fas fa-info-circle mr-2"></i> <strong>INFO:</strong> Teks ini akan muncul berjalan di layar siswa.
                                </div>

                                <table id="tb-text" class="table table-hover border">
                                    <?php
                                    for ($i = 0; $i < 5; $i++) :
                                        $text = isset($running_text[$i]) ? $running_text[$i]->text : '';
                                        ?>
                                        <tr>
                                            <td width="40" class="text-center bg-light font-weight-bold text-muted"><?= $i + 1 ?></td>
                                            <td class="editable py-2 px-3" style="min-height: 40px; border-left: 2px solid #4361ee !important;"><?= $text ?></td>
                                        </tr>
                                    <?php endfor; ?>
                                </table>
                                <?= form_open('', array('id' => 'formrunningtext')) ?>
                                <button type="submit" class="btn btn-primary float-right mt-3">
                                    <i class="fa fa-save mr-2"></i> Update Teks
                                </button>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-12 <?= $this->ion_auth->is_admin() ? 'col-md-7' : '' ?> mb-4">
                    <div class="card my-shadow">
                        <?= form_open('', array('id' => 'formpengumuman')) ?>
                        <div class="card-header">
                            <i class="fas fa-edit mr-2 text-warning"></i> Buat Pengumuman Baru
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-2 d-flex align-items-center">
                                    <p class="mb-0"><i class="fas fa-users mr-1"></i> Kepada:</p>
                                </div>
                                <div class="col-md-10">
                                    <select id="opsi-kepada" name="kepada[]" class="select2 form-control"
                                            multiple="multiple" data-placeholder="Pilih tujuan..." required>
                                        <option value='guru'>Semua Guru</option>
                                        <option value='siswa'>Semua Siswa</option>
                                        <?php foreach ($kelas as $key => $value) : ?>
                                            <option class="opsi-kelas" value="<?= $key ?>"><?= $value ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="w-100" id="text-pengumuman" name="text" required></textarea>
                            </div>

                            <?php if ($this->ion_auth->is_admin()): ?>
                                <input type="hidden" name="dari" value="0">
                            <?php else: ?>
                                <input type="hidden" name="dari" value="<?= $guru->id_guru ?>">
                            <?php endif; ?>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-paper-plane mr-2"></i> Terbitkan Info
                                </button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card my-shadow">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-title">
                                <i class="fas fa-list-ul mr-2 text-success"></i> <?= $subjudul ?>
                            </div>
                        </div>
                        <div class="card-body bg-light">
                            <?php
                            foreach ($pengumumans as $pengumuman) : ?>
                                <div class="card post-card">
                                    <div class="card-body px-4 py-3" id="parent<?= $pengumuman->id_post ?>">
                                        <div class="media">
                                            <?php if ($pengumuman->dari == '0') : ?>
                                                <span class="btn-circle btn-success media-left pt-1">A</span>
                                                <div class="media-body ml-3">
                                                    <span class="font-weight-bold">Admin</b></span>
                                                    <br/>
                                                    <span class="text-gray"><?= buat_tanggal(date('D, d M Y H:i', strtotime($pengumuman->tanggal))) ?>
                                            </span>
                                                </div>
                                            <?php else: ?>
                                                <img class="img-circle media-left"
                                                     src="<?= $pengumuman->foto != null ? base_url() . $pengumuman->foto : base_url('assets/img/siswa.png') ?>"
                                                     width="50" height="50"/>
                                                <div class="media-body ml-3">
                                                    <span class="font-weight-bold"><?= $pengumuman->nama_guru ?></span>
                                                    <br/>
                                                    <span class="text-gray"> <?= $pengumuman->tanggal ?> </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mt-2">
                                            <?= $pengumuman->text ?>
                                        </div>
                                        <div class="text-muted">
                                            <button type="button" class="btn btn-default btn-sm mr-2 btn-toggle"
                                                    data-id="<?= $pengumuman->id_post ?>" data-toggle="modal"
                                                    data-target="#komentarModal"><i class="fas fa-reply mr-1"></i> Tulis
                                                komentar
                                            </button>
                                            <button type="button" id="trigger<?= $pengumuman->id_post ?>"
                                                    class="btn btn-default btn-sm mr-2 action-collapse"
                                                    data-toggle="collapse" aria-expanded="true"
                                                    aria-controls="collapse-<?= $pengumuman->id_post ?>"
                                                    href="#collapse-<?= $pengumuman->id_post ?>">
                                                <i class="fa fa-commenting-o mr-1"></i><?= $pengumuman->jml ?> komentar
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm"
                                                    onclick="hapusPost(<?= $pengumuman->id_post ?>)"
                                                    data-id="<?= $pengumuman->id_post ?>">
                                                <i class="fa fa-trash mr-1"></i> Hapus
                                            </button>

                                        </div>
                                    </div>
                                    <div id="collapse-<?= $pengumuman->id_post ?>" class="p-2 collapse toggle-comment"
                                         data-id="<?= $pengumuman->id_post ?>"
                                         data-parent="#parent<?= $pengumuman->id_post ?>">
                                        <hr class="m-0">
                                        <div id="konten<?= $pengumuman->id_post ?>" class="p-4">
                                        </div>
                                        <div id="loading<?= $pengumuman->id_post ?>" class="text-center d-none">
                                            <div class="spinner-grow"></div>
                                        </div>
                                        <?php if ($pengumuman->jml == '0') : ?>
                                            <div class="text-center">Tidak ada komentar</div>
                                        <?php else: ?>
                                            <div id="loadmore<?= $pengumuman->id_post ?>"
                                                 onclick="getComments(<?= $pengumuman->id_post ?>)"
                                                 class="text-center mt-4 loadmore">
                                                <div class="btn btn-default">Muat komentar lainnya ...</div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="komentarModal" tabindex="-1" role="dialog" aria-labelledby="komentarLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="komentarLabel">Tulis Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid img-circle img-sm" src="<?= base_url('assets/img/siswa.png') ?>" alt="Alt Text">
                <div class="img-push">
                    <?= form_open('create', array('id' => 'komentar')) ?>
                    <input type="hidden" id="id-post" name="id_post" value="">
                    <div class="input-group">
                        <input type="text" name="text" placeholder="Tulis komentar ..."
                               class="form-control form-control-sm" required>
                        <span class="input-group-append">
                                <button type="submit" class="btn btn-success btn-sm">Komentari</button>
                            </span>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="balasanModal" tabindex="-1" role="dialog" aria-labelledby="balasanLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balasanLabel">Tulis Balasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid img-circle img-sm" src="<?= base_url('assets/img/siswa.png') ?>" alt="Alt Text">
                <div class="img-push">
                    <?= form_open('create', array('id' => 'balasan')) ?>
                    <input type="hidden" id="id-comment" name="id_comment" value="">
                    <div class="input-group">
                        <input type="text" name="text" placeholder="Tulis balasan ...."
                               class="form-control form-control-sm" required>
                        <span class="input-group-append">
                                <button type="submit" class="btn btn-success btn-sm">Balas</button>
                            </span>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    var guru = '<?=isset($guru) ? $guru->id_guru : ""?>';

    function createTime(d) {
        var date = new Date(d);

        var jam = date.getHours();
        var menit = date.getMinutes();
        var sJam;
        var sMenit;

        if (jam < 10) sJam = '0' + jam;
        else sJam = '' + jam;

        if (menit < 10) sMenit = '0' + menit;
        else sMenit = '' + menit;

        var hari = daysdifference(d);
        var time;

        if (hari === 0) {
            time = sJam + ':' + sMenit;
        } else if (hari === 1) {
            time = 'kemarin ' + sJam + ':' + sMenit;
        } else {
            time = jQuery.timeago(d) + ', ' + sJam + ':' + sMenit;
        }
        return time;
    }

    function daysdifference(last) {
        var startDay = new Date(last);
        var endDay = new Date();

        var millisBetween = startDay.getTime() - endDay.getTime();
        var days = millisBetween / (1000 * 3600 * 24);

        return Math.round(Math.abs(days));
    }

    function addComments(id, comments, append) {
        var comm = '';
        $.each(comments, function (i, v) {
            var dari = v.dari_group === '1' ? 'Admin' : (v.dari_group === '2' ? v.nama_guru : v.nama_siswa);
            var foto = v.dari_group === '2' ? (v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png') :
                (v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png');
            var avatar = v.dari == '0' ? '<div class="btn-circle-sm btn-success media-left pt-1" style="width: 43px; height: 40px">A</div>' : '<img class="img-circle border" src="' + foto + '" alt="Img" width="40px" height="40px">';
            comm += '<div class="media mt-1" id="parent-reply' + v.id_comment + '">'
                + avatar +
                '    <div class="w-100 ml-2">' +
                '        <div class="media-body border pl-3 bg-light" style="border-radius: 20px">' +
                '            <span class="text-xs text-muted"><b>' + dari + '</b></span>' +
                '            <div class="comment-text pb-1">' + v.text + '</div>' +
                '        </div>' +
                '        <div class="ml-2">' +
                '            <span class="btn-sm mr-2 text-muted">' + createTime(v.tanggal) + '</span>' +
                '            <span id="trigger-reply' + v.id_comment + '" class="btn btn-sm mr-2 text-muted action-collapse" data-toggle="collapse" aria-expanded="true"' +
                '                              aria-controls="collapse-reply' + v.id_comment + '"' +
                '                              href="#collapse-reply' + v.id_comment + '"><b>' + v.jml + ' balasan</b></span>' +
                '            <span class="btn btn-sm mr-2 text-muted btn-toggle-reply"' +
                '                  data-id="' + v.id_comment + '" data-toggle="modal" data-target="#balasanModal">' +
                '                <i class="fas fa-reply"></i> <b>Balas</b></span>' +
                '<span class="btn btn-sm text-muted" onclick="hapusKomentar(' + v.id_comment + ')" data-id="' + v.id_comment + '"><i class="fa fa-trash mr-1"></i> Hapus</span>' +
                '</div>' +
                '<div id="collapse-reply' + v.id_comment + '" class="p-2 collapse toggle-reply" data-id="' + v.id_comment + '" data-parent="#parent-reply' + v.id_comment + '">';
            if (v.jml != '0') {
                comm += '<div id="konten-reply' + v.id_comment + '"></div>' +
                    '<div id="loadmore-reply' + v.id_comment + '" onclick="getReplies(' + v.id_comment + ')" class="text-center mb-3 loadmore-reply">' +
                    '       <div class="btn btn-default">Muat balasan lainnya ...</div>' +
                    '</div>';
            }
            comm += '    <div id="loading-reply' + v.id_comment + '" class="text-center d-none">' +
                '        <div class="spinner-grow"></div>' +
                '    </div>' +
                '</div>' +
                '    </div>' +
                '</div>';
        });

        if (append) {
            $(`#konten${id}`).append(comm);
        } else {
            $(`#konten${id}`).prepend(comm);
        }

        $('.toggle-reply').on('shown.bs.collapse', function (e) {
            var konten = $(this);
            var id = konten.data('id');
            var list = $(this).find('.media').length;
            if (list === 0) $(`#loadmore-reply${id}`).click();
        });
    }

    function addReplies(id, replies, append) {
        console.log('replies', replies);
        var repl = '';
        $.each(replies, function (i, v) {
            var sudahAda = $(`.media${v.id_reply}`).length;
            if (!sudahAda) {
                var dari = v.dari_group == '1' ? 'Admin' : (v.dari_group == '2' ? v.nama_guru : v.nama_siswa);
                var foto = v.dari_group == '2' ? (v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png') :
                    (v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png');
                var avatar = v.dari == '0' ? '<div class="btn-circle-sm btn-success media-left pt-1 mr-2" style="width: 37px">A</div>' : '<img class="img-circle mr-2 border" src="' + foto + '" alt="Img" width="35px" height="35px">';
                repl +=
                    '<div class="media mt-1 media' + v.id_reply + '">'
                    + avatar +
                    '    <div class="w-100">' +
                    '        <div class="media-body border pl-3" style="border-radius: 17px; background-color: #dee2e6">' +
                    '            <span class="text-xs text-muted"><b>' + dari + '</b></span>' +
                    '            <div class="comment-text">' + v.text +
                    '            </div>' +
                    '        </div>' +
                    '        <div class="ml-2">' +
                    '            <small class="btn-sm mr-2 text-muted">' + createTime(v.tanggal) + '</small>' +
                    '            <span class="btn btn-sm text-muted" onclick="hapusReply(' + v.id_reply + ')" data-id="' + v.id_reply + '">' +
                    '                <i class="fa fa-trash mr-1"></i> Hapus' +
                    '            </span>' +
                    '        </div>' +
                    '    </div>' +
                    '</div>';
            }
        });

        if (append) {
            $(`#konten-reply${id}`).append(repl);
        } else {
            $(`#konten-reply${id}`).prepend(repl);
        }
        console.log('added', 'reply' + id);
    }

    function getComments(id) {
        //console.log("url", base_url + "pengumuman/getcomment/" + id + "/" + page);
        $(`#loading${id}`).removeClass('d-none');
        $(`#loadmore${id}`).addClass('d-none');
        var $count = $(`#loadmore${id}`), page = $count.data('count');
        if (!page) page = 0;

        setTimeout(function () {
            $.ajax({
                url: base_url + "pengumuman/getcomment/" + id + "/" + page,
                type: "GET",
                success: function (response) {
                    //console.log('page', page);
                    console.log("result", response);
                    page += 1;
                    currentPage = page;
                    $count.data('count', page);

                    if (response.length === 5) {
                        $(`#loadmore${id}`).removeClass('d-none');
                    }
                    $(`#loading${id}`).addClass('d-none');
                    addComments(id, response, true)
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }, 500);
    }

    function getReplies(id) {
        $(`#loading-reply${id}`).removeClass('d-none');
        $(`#loadmore-reply${id}`).addClass('d-none');
        var $count = $(`#loadmore-reply${id}`), page = $count.data('count');
        if (!page) page = 0;

        setTimeout(function () {
            $.ajax({
                url: base_url + "pengumuman/getreplies/" + id + "/" + page,
                type: "GET",
                success: function (response) {
                    //console.log('page', page);
                    console.log("result", response);
                    page += 1;
                    currentPage = page;
                    $count.data('count', page);

                    //n >= start && n <= end
                    if (response.length === 5) {
                        $(`#loadmore-reply${id}`).removeClass('d-none');
                    }
                    $(`#loading-reply${id}`).addClass('d-none');
                    addReplies(id, response, true)
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }, 500);
    }

    function hapusPost(idPost) {
        swal.fire({
            title: "Hapus Pengumuman",
            text: "Pengumuman ini akan dihapus",
            icon: "info",
            showCancelButton: true,
            confirmButtonText: "HAPUS"
        }).then(result => {
            if (result.value) {
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
                    url: base_url + "pengumuman/hapuspost/" + idPost,
                    type: "GET",
                    success: function (data) {
                        console.log("result", data);
                        if (data) {
                            swal.fire({
                                title: "Sukses",
                                text: "Pengumuman dihapus",
                                icon: "success",
                                showCancelButton: false,
                            }).then(result => {
                                if (result.value) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                title: "ERROR",
                                text: "Pengumuman tidak dihapus",
                                icon: "error",
                                showCancelButton: false,
                            });
                        }
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
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
    }

    function hapusKomentar(idKomentar) {
        swal.fire({
            title: "Hapus Komentar",
            text: "Komentar ini akan dihapus",
            icon: "info",
            showCancelButton: true,
            confirmButtonText: "HAPUS"
        }).then(result => {
            if (result.value) {
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
                    url: base_url + "pengumuman/hapuskomentar/" + idKomentar,
                    type: "GET",
                    success: function (data) {
                        console.log("result", data);
                        if (data) {
                            swal.fire({
                                title: "Sukses",
                                text: "Komentar dihapus",
                                icon: "success",
                                showCancelButton: false,
                            }).then(result => {
                                if (result.value) {
                                }
                            });
                        } else {
                            swal.fire({
                                title: "ERROR",
                                text: "Komentar tidak dihapus",
                                icon: "error",
                                showCancelButton: false,
                            });
                        }
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
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
    }

    function hapusReply(idReply) {
        swal.fire({
            title: "Hapus Balasan",
            text: "Balasan ini akan dihapus",
            icon: "info",
            showCancelButton: true,
            confirmButtonText: "HAPUS"
        }).then(result => {
            if (result.value) {
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
                    url: base_url + "pengumuman/hapusbalasan/" + idReply,
                    type: "GET",
                    success: function (data) {
                        console.log("result", data);
                        if (data) {
                            swal.fire({
                                title: "Sukses",
                                text: "Balasan dihapus",
                                icon: "success",
                                showCancelButton: false,
                            }).then(result => {
                                if (result.value) {
                                }
                            });
                        } else {
                            swal.fire({
                                title: "ERROR",
                                text: "Balasan tidak dihapus",
                                icon: "error",
                                showCancelButton: false,
                            });
                        }
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
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
    }

    /*
    function loadListText() {
        $.ajax({
            url: base_url + "pengumuman/getrunningtext",
            type: "GET",
            success: function (response) {
                console.log('page', response);
                createListText(response);
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
            }
        });
    }
    */

    function createListText(data) {
        var html = '<table class="table w-100">';
        if (data.running_text.length > 0) {
            $.each(data.running_text, function (i, v) {
                html += '<tr> ' +
                    '<td>' + v.text + '</td>' +
                    '<td>' +
                    '<button class="btn btn-default btn-circle-micro" data-id="' + v.id_text + '" onclick="edit(this)"><i class="fa fa-pencil"></i></button>' +
                    '<button class="btn btn-default btn-circle-micro" data-id="' + v.id_text + '" onclick="hapusText(this)"><i class="fa fa-trash"></i></button>' +
                    '</td> ' +
                    '</tr>';
            });
        }
        html += '</table>';
        $('#list-text').html(html);
    }

    function hapusText(e) {
        var id = $(e).data('id');
        console.log(id);

        $.ajax({
            url: base_url + "pengumuman/hapusrunningtext/" + id,
            type: "GET",
            success: function (response) {
                console.log('page', response);
                if (!response) {
                    showDangerToast('Tidak bisa menghapus')
                } else {
                    loadListText()
                }
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                showDangerToast('Tidak bisa menghapus')
            }
        });
    }

    $(document).ready(function () {
        $('.editable').attr('contentEditable', true);
        console.log('guru', guru);
        $('.select2').select2();

        $('#text-pengumuman').summernote({
            placeholder: 'Tulis Pengumuman',
            tabsize: 2,
            minHeight: 100,
        });

        $('.toggle-comment').on('shown.bs.collapse', function (e) {
            var konten = $(this);
            var id = konten.data('id');
            var list = $(this).find('.media').length;
            if (list === 0) $(`#loadmore${id}`).click();
        });

        $('#formpengumuman').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

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
                url: base_url + "pengumuman/save",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Pengumuman berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'pengumuman';
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Pengumuman Tidak Tersimpan",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        });

        $('#komentarModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            $("#id-post").val(id);

            var isVisible = $(`#collapse-${id}`).hasClass('show');
            if (!isVisible) {
                $(`#trigger${id}`).click();
            }
        });

        $('#balasanModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            $("#id-comment").val(id);

            var isVisible = $(`#collapse-reply${id}`).hasClass('show');
            if (!isVisible) {
                $(`#trigger-reply${id}`).click();
            }
        });

        $('#komentar').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log("data", $(this).serialize());
            var id = $(this).find('input[name=id_post]').val();

            $.ajax({
                url: base_url + "pengumuman/savekomentar",
                data: $(this).serialize(),
                method: 'POST',
                dataType: "JSON",
                success: function (response) {
                    console.log("result", response);
                    $('#komentarModal').modal('hide').data('bs.modal', null);
                    $('#komentarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    addComments(id, response, false)
                    //window.location.href = base_url + 'pengumuman';
                },
                error: function (xhr, status, error) {
                    $('#komentarModal').modal('hide').data('bs.modal', null);
                    $('#komentarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    showDangerToast('Error, komentar tidak terkirim');
                }
            });
        });

        $('#balasan').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log("data", $(this).serialize());
            var id = $(this).find('input[name=id_comment]').val();

            $.ajax({
                url: base_url + "pengumuman/savebalasan",
                data: $(this).serialize(),
                method: 'POST',
                dataType: "JSON",
                success: function (response) {
                    console.log("result", response);
                    $('#balasanModal').modal('hide').data('bs.modal', null);
                    $('#balasanModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    //window.location.href = base_url + 'pengumuman';
                    addReplies(id, response, false)
                },
                error: function (xhr, status, error) {
                    $('#balasanModal').modal('hide').data('bs.modal', null);
                    $('#balasanModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    showDangerToast('Error, balasan tidak terkirim');
                }
            });
        });

        $('#formrunningtext').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var no = 1;
            var jsonObj = [];
            const $rows = $('#tb-text').find('tr');
            $rows.each((i, row) => {
                var id_text = no;
                const text = $(row).find('.editable').text();

                let item = {};
                item ["id_text"] = no;
                item ["text"] = text;
                jsonObj.push(item);
                no++;
            });

            var dataPost = $(this).serialize() + "&text=" + JSON.stringify(jsonObj);
            console.log(dataPost);

            $.ajax({
                url: base_url + "pengumuman/saverunningtext",
                type: "POST",
                data: dataPost,
                success: function (response) {
                    console.log('updates', response);
                    if (response.status[0]) {
                        window.location.reload();
                        //loadListText();
                        //$('#textarea-running').val('');
                    } else {
                        showDangerToast('Tidak bisa menyimpan')
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    showDangerToast('Error, Tidak bisa menyimpan')
                }
            });
        });

    })
</script>
