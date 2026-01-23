<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-light">
    <div class="dashboard-header text-center">
        <div class="container-fluid px-4">
            <h2 class="mb-1 text-white">Selamat Datang, <?= $guru->nama_guru ?></h2>
            <p class="mb-0 opacity-75 small font-weight-bold text-white" style="letter-spacing: 0.5px">
                <i class="far fa-calendar-alt mr-1"></i> <?= buat_tanggal(date('D, d M Y')) ?> 
                <span class="mx-2">|</span>
                <i class="far fa-clock mr-1"></i> <span id="clock-header"></span>
            </p>
            <div class="academic-pill">
                TP: <?= isset($tp_active) ? $tp_active->tahun : "Belum di set" ?> 
                <span class="mx-2 opacity-50">•</span>
                SMT: <?= isset($smt_active) ? $smt_active->nama_smt : "Belum di set" ?>
            </div>
        </div>
    </div>

    <section class="content container-fluid px-4">
        <div class="row justify-content-center stat-cards-row">
            <!-- Token Card -->
            <div class="col-lg col-md-4 col-6 mb-4">
                <div class="stat-card bg-red">
                    <div class="inner">
                        <div class="icon-box">
                            <i class="fas fa-key"></i>
                        </div>
                        <h5 id="token-main-view"><?= $token->token != null ? $token->token : '- - -' ?></h5>
                        <span>TOKEN AKTIF</span>
                    </div>
                </div>
            </div>
            <?php 
            $colors = ['blue', 'teal', 'orange', 'indigo'];
            $icons = [
                'Siswa' => 'fa-user-graduate',
                'Rombel' => 'fa-chalkboard',
                'Guru' => 'fa-user-tie',
                'Mapel' => 'fa-book-open'
            ];
            $i = 0;
            foreach ($info_box as $info) : 
                if ($info->title == 'Wali Kelas' || $info->title == 'Ekstrakurikuler') continue;

                $color = $colors[$i % count($colors)];
                $icon = isset($icons[$info->title]) ? $icons[$info->title] : 'fa-'.$info->icon;
            ?>
                <div class="col-lg col-md-4 col-6 mb-4">
                    <div class="stat-card bg-<?= $color ?>">
                        <div class="inner">
                            <div class="icon-box">
                                <i class="fas <?= $icon ?>"></i>
                            </div>
                            <h5><?= $info->total; ?></h5>
                            <span><?= $info->title; ?></span>
                        </div>
                    </div>
                </div>
            <?php $i++; endforeach; ?>
        </div>
    </section>

    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <!-- Weekly Schedule Removed as per request -->

                <div class="col-lg-12">

                    <div class="card card-modern mb-4">
                        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0 font-weight-bold text-dark"><i class="fas fa-file-signature text-primary mr-2"></i>Ringkasan Penilaian</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <?php foreach ($ujian_box as $info) : ?>
                                    <div class="col-md-3 col-6 mb-3">
                                        <div class="info-box-sm text-center h-100 d-flex flex-column justify-content-center py-4">
                                            <div class="text-muted small font-weight-bold mb-2 text-uppercase"><?= $info->title; ?></div>
                                            <div class="h3 font-weight-bold mb-0 text-dark"><?= $info->total; ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="section-divider mb-4 mt-2">
                                <h6 class="font-weight-bold text-uppercase small text-muted" style="letter-spacing: 1px">
                                    <i class="far fa-clock mr-2"></i>Jadwal Penilaian Hari Ini
                                </h6>
                                <hr class="mt-2">
                            </div>

                            <div class="table-responsive">
                                <?php
                                $no = 1;
                                $jadwal_ujian = $jadwals_ujian[date('Y-m-d')] ?? [];
                                if (count($jadwal_ujian) > 0) : ?>
                                    <table id="tbl-penilaian" class="table table-modern-list mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-center align-middle" width="50">NO</th>
                                                <th class="align-middle">RUANG & SESI</th>
                                                <th class="align-middle">MATA PELAJARAN</th>
                                                <th class="align-middle">PENGAWAS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($ruangs as $ruang => $sesis) :
                                            foreach ($sesis as $sesi) :
                                                foreach ($jadwal_ujian as $jadwal) :
                                                    $id_guru = isset($pengawas[$jadwal[0]->id_jadwal])
                                                    && isset($pengawas[$jadwal[0]->id_jadwal][$ruang]) &&
                                                    isset($pengawas[$jadwal[0]->id_jadwal][$ruang][$sesi->sesi_id])
                                                        ? explode(',', $pengawas[$jadwal[0]->id_jadwal][$ruang][$sesi->sesi_id]->id_guru ?? '')
                                                        : [];

                                                    $badge_kelas = '';
                                                    $total_peserta = 0;
                                                    foreach ($jadwal as $jdw) {
                                                        $bank_kelass = $jdw->bank_kelas;
                                                        foreach ($bank_kelass as $bank_kelas) {
                                                            foreach ($jdw->peserta as $peserta) {
                                                                $cnt = isset($peserta[$ruang]) && isset($peserta[$ruang][$sesi->sesi_id]) ?
                                                                    count($peserta[$ruang][$sesi->sesi_id]) : 0;
                                                                if ($bank_kelas['kelas_id'] != null && $cnt > 0) {
                                                                    $total_peserta += $cnt;
                                                                    $badge_kelas .= ' <span class="badge badge-soft-info badge-pill ml-1">' . $kelases[$bank_kelas['kelas_id']] . ' (' . $cnt . ')</span>';
                                                                }
                                                            }
                                                        }
                                                    }

                                                    if ($total_peserta > 0) :
                                                        ?>
                                                        <tr>
                                                            <td class="text-center align-middle font-weight-bold text-muted"><?= $no ?></td>
                                                            <td class="align-middle">
                                                                <div class="font-weight-bold text-dark"><?= $sesi->nama_ruang ?></div>
                                                                <div class="small text-muted text-uppercase font-weight-bold"><?= $sesi->nama_sesi ?></div>
                                                            </td>
                                                            <td class="align-middle">
                                                                <div class="text-primary font-weight-bold"><?= $jadwal[0]->kode ?></div>
                                                                <div class="mt-1"><?= $badge_kelas ?></div>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?php foreach ($id_guru as $ig) {
                                                                    echo isset($gurus[$ig]) ? '<div class="small text-dark mb-1"><i class="fas fa-user-circle mr-1 text-muted opacity-50"></i>' . $gurus[$ig] . '</div>' : '';
                                                                } ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; endforeach; endforeach;
                                            $no++; endforeach;?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="py-5 text-center text-muted">
                                        <i class="far fa-calendar-check mb-3 d-block fa-3x opacity-25"></i>
                                        <p>Tidak ada jadwal penilaian ujian hari ini.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card card-modern my-shadow mb-3">
                        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0 font-weight-bold text-dark"><i class="far fa-bell text-warning mr-2"></i>Pengumuman Sekolah</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="konten-pengumuman">
                                <div id="pengumuman">
                                </div>
                                <p id="loading-post" class="text-center d-none p-5">
                                    <i class="fas fa-spinner fa-spin fa-2x text-muted opacity-25"></i>
                                </p>
                                <div id="loadmore-post" class="text-center mt-4 loadmore d-none">
                                    <button class="btn btn-outline-secondary rounded-pill btn-sm px-4" onclick="getPosts()">
                                        Muat Pengumuman Sebelumnya
                                    </button>
                                </div>
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

<script src="<?= base_url() ?>/assets/app/js/jquery.rowspanizer.js"></script>
<script>
    let timerTokenView;
    let timerTokenRemaining, timerTokenOnGoing;
    var halaman = 0;
    var idGuru = "<?=$guru->id_guru?>";

    function updateClock() {
        var now = new Date();
        var h = now.getHours();
        var m = now.getMinutes();
        var s = now.getSeconds();
        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        h = h < 10 ? '0' + h : h;
        $('#clock-header').text(h + ":" + m + ":" + s);
        setTimeout(updateClock, 1000);
    }

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
            var dari, foto, avatar;
            if (v.dari == '0') {
                dari = 'Admin';
                avatar = v.foto != null ? '<img class="img-circle border" src="' + v.foto + '" alt="Img" width="40px" height="40px">' :
                    '<div class="btn-circle-sm btn-success media-left pt-1" style="width: 43px; height: 40px">A</div>'
            } else {
                if (v.dari_group == '2') {
                    dari = v.nama_guru;
                    foto = v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="40px" height="40px">';
                } else {
                    dari = v.nama_siswa;
                    foto = v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="40px" height="40px">';
                }
            }

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
                '                <i class="fas fa-reply"></i> <b>Balas</b></span>';
            if (v.dari_group === '2' && v.dari === idGuru) {
                comm += '            <span class="btn btn-sm text-muted" data-id="' + v.id_comment + '">' +
                    '                <i class="fa fa-trash mr-1"></i> Hapus' +
                    '            </span>';
            }
            comm += '        </div>' +
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
                var dari, foto, avatar;
                if (v.dari == '0') {
                    dari = 'Admin';
                    avatar = v.foto != null ? '<img class="img-circle border" src="' + v.foto + '" alt="Img" width="35px" height="35px">' :
                        '<div class="btn-circle-sm btn-success media-left pt-1 mr-2" style="width: 37px">A</div>';
                } else {
                    if (v.dari_group == '2') {
                        dari = v.nama_guru;
                        foto = v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png';
                        avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="35px" height="35px">';
                    } else {
                        dari = v.nama_siswa;
                        foto = v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png';
                        avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="35px" height="35px">';
                    }
                }

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
                    '            <small class="btn-sm mr-2 text-muted">' + createTime(v.tanggal) + '</small>';
                if (v.dari_group === '2' && v.dari === idGuru) {
                    repl += '            <span class="btn btn-sm text-muted" data-id="' + v.id_reply + '">' +
                        '                <i class="fa fa-trash mr-1"></i> Hapus' +
                        '            </span>';
                }
                repl += '        </div>' +
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

    function addPosts(response) {
        var card = '';

        if (response.length > 0) {
            $.each(response, function (i, v) {
                var dari, foto, avatar;
                if (v.dari == '0') {
                    dari = 'Admin';
                    avatar = v.foto != null ? '<img class="img-circle border" src="' + v.foto + '" alt="Img" width="50px" height="50px">' :
                        '<div class="btn-circle btn-success media-left pt-1">A</div>';
                } else {
                    if (v.dari_group == '2') {
                        dari = v.nama_guru;
                        foto = v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png';
                        avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="50px" height="50px">';
                    } else {
                        dari = v.nama_siswa;
                        foto = v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png';
                        avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="50px" height="50px">';
                    }
                }

                card += '<div class="card card-modern border mb-3 shadow-none">' +
                    '    <div class="card-body p-3" id="parent' + v.id_post + '">' +
                    '        <div class="d-flex align-items-center mb-3">' +
                    avatar +
                    '                <div class="ml-3">' +
                    '                    <span class="font-weight-bold text-dark d-block" style="font-size: 0.95rem">' + dari + '</span>' +
                    '                    <span class="text-muted small"><i class="far fa-clock mr-1"></i>' + createTime(v.tanggal) + '</span>' +
                    '                </div>' +
                    '        </div>' +
                    '        <div class="mb-3 text-dark" style="font-size: 0.95rem; line-height: 1.5;">' + v.text + '</div>' +
                    '        <div class="d-flex justify-content-between align-items-center pt-2 border-top">' +
                    '            <div>' +
                    '                <button type="button" class="btn btn-soft-primary btn-xs rounded-pill mr-2 btn-toggle px-3"' +
                    '                        data-id="' + v.id_post + '" data-toggle="modal"' +
                    '                        data-target="#komentarModal"><i class="fas fa-reply mr-1"></i> Tulis komentar' +
                    '                </button>' +
                    '                <button type="button" id="trigger' + v.id_post + '" class="btn btn-soft-secondary btn-xs rounded-pill action-collapse px-3"' +
                    '                        data-toggle="collapse" aria-expanded="true"' +
                    '                        aria-controls="collapse-' + v.id_post + '"' +
                    '                        href="#collapse-' + v.id_post + '">' +
                    '                    <i class="far fa-comments mr-1"></i>' + v.jml + ' komentar' +
                    '                </button>' +
                    '            </div>';
                if (v.dari_group === '2' && v.dari === idGuru) {
                    card += '            <button type="button" class="btn btn-soft-danger btn-xs btn-round" data-id="' + v.id_post + '" data-toggle="tooltip" title="Hapus">' +
                        '                <i class="fas fa-trash-alt"></i>' +
                        '            </button>';
                }
                card += '        </div>' +
                    '    </div>' +
                    '    <div id="collapse-' + v.id_post + '" class="collapse toggle-comment bg-light"' +
                    '         data-id="' + v.id_post + '" data-parent="#parent' + v.id_post + '">' +
                    '        <div id="konten' + v.id_post + '" class="p-3">' +
                    '        </div>' +
                    '        <div id="loading' + v.id_post + '" class="text-center pb-3 d-none">' +
                    '            <div class="spinner-grow spinner-grow-sm text-primary"></div>' +
                    '        </div>';
                if (v.jml == '0') {
                    card += '<div class="text-center py-3 text-muted small font-italic">Belum ada komentar</div>';
                } else {
                    card += '<div id="loadmore' + v.id_post + '"' +
                        '     onclick="getComments(' + v.id_post + ')"' +
                        '     class="text-center pb-3 loadmore">' +
                        '    <button class="btn btn-xs btn-link text-muted">Muat komentar lainnya...</button>' +
                        '</div>';
                }
                card += '</div>' +
                    '</div>';
            })
        } else {
            card = '<div class="card card-default">' +
                '<div class="card-body">' +
                ' <p>Tidak ada pengumuman</p>' +
                '</div></div>';
        }

        $('#pengumuman').html(card);

        $('.toggle-comment').on('shown.bs.collapse', function (e) {
            var konten = $(this);
            var id = konten.data('id');
            var list = $(this).find('.media').length;
            if (list === 0) $(`#loadmore${id}`).click();
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

    }

    function getPosts() {
        $(`#loading-post`).removeClass('d-none');
        $(`#loadmore-post`).addClass('d-none');

        setTimeout(function () {
            $.ajax({
                url: base_url + "pengumuman/getpost/" + halaman,
                type: "GET",
                success: function (response) {
                    console.log("result", response);
                    halaman += 1;

                    if (response.length === 5) {
                        $(`#loadmore-post`).removeClass('d-none');
                    }
                    $(`#loading-post`).addClass('d-none');
                    addPosts(response)
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }, 500);
    }

    $(document).ready(function () {
        $("#tbl-penilaian").rowspanizer({
            columns: [0, 1, 2],
            vertical_align: "middle"
        });



        updateClock();

        getPosts();

        getToken(function (result) {
            getGlobalToken();
        });

        $('#refresh-token').click(function () {
            getToken(function (result) {
                getGlobalToken();
            });
        });
    });

    function getGlobalToken() {
        if (globalToken != null) {
            const mainViewToken = $('#token-main-view');
            if (mainViewToken.length) mainViewToken.text(globalToken.token);
            if (globalToken.auto == '1' && adaJadwalUjian != '0') {
                $('#refresh-token').removeClass('d-none')
            }
        }
    }
</script>
