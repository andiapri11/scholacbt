<div class="content-wrapper bg-light">
    <style>

        @media (max-width: 576px) {
            .grid-hub { 
                grid-template-columns: repeat(2, 1fr) !important; 
                gap: 1rem !important; 
            }
            .hub-card {
                padding: 1.25rem 0.75rem;
            }
            .hub-icon-wrapper {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
                margin-bottom: 0.75rem;
            }
            .hub-label {
                font-size: 0.85rem;
            }
            .activity-header {
                padding: 1.25rem !important;
            }
            .activity-header h5 {
                font-size: 1rem !important;
            }
            .schedule-hub-item {
                flex-direction: column;
                align-items: flex-start !important;
                padding: 1rem !important;
            }
            .time-pill {
                margin-right: 0 !important;
                margin-bottom: 0.5rem;
                width: 100% !important;
            }
        }

        .grid-hub {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 160px));
            justify-content: center;
            gap: 2rem;
            margin-bottom: 3.5rem;
            perspective: 1000px;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .hub-card {
            background: #ffffff;
            border-radius: 2rem;
            padding: 2.25rem 1rem;
            text-align: center;
            text-decoration: none !important;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 
                0 10px 25px -5px rgba(0, 0, 0, 0.05),
                0 8px 10px -6px rgba(0, 0, 0, 0.02),
                inset 0 0 0 1px rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            height: 100%;
            overflow: hidden;
            animation: float 6s ease-in-out infinite;
        }
        /* Offset animation for each card for organic look */
        .hub-card:nth-child(2n) { animation-delay: 1s; }
        .hub-card:nth-child(3n) { animation-delay: 2s; }

        .hub-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -150%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 0%,
                rgba(255, 255, 255, 0.1) 45%,
                rgba(255, 255, 255, 0.6) 50%,
                rgba(255, 255, 255, 0.1) 55%,
                transparent 100%
            );
            transform: rotate(45deg);
            transition: all 0.6s;
            opacity: 0;
            pointer-events: none;
            z-index: 3;
        }

        .hub-card:hover {
            transform: translateY(-15px) scale(1.05) !important;
            box-shadow: 
                0 30px 50px -15px rgba(0, 0, 0, 0.12),
                0 0 20px 0 rgba(0, 0, 0, 0.05);
            border-color: rgba(255, 255, 255, 1);
            animation: none;
            z-index: 10;
        }
        
        .hub-card:hover::after {
            left: 100%;
            opacity: 1;
        }

        .hub-icon-wrapper {
            width: 72px;
            height: 72px;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.25rem;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 1;
        }

        .hub-card:hover .hub-icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }

        /* Modern Gradient Icon Backgrounds */
        .color-schedule { background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); color: #2563eb; box-shadow: 0 8px 16px -4px rgba(37, 99, 235, 0.15); }
        .color-exam { background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%); color: #4f46e5; box-shadow: 0 8px 16px -4px rgba(79, 70, 229, 0.15); }
        .color-result { background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 100%); color: #db2777; box-shadow: 0 8px 16px -4px rgba(219, 39, 119, 0.15); }
        .color-note { background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%); color: #7c3aed; box-shadow: 0 8px 16px -4px rgba(124, 58, 237, 0.15); }

        .hub-label {
            font-weight: 800;
            color: #1e293b;
            font-size: 1rem;
            letter-spacing: -0.03em;
            transition: all 0.3s ease;
        }
        .hub-card:hover .hub-label {
            color: #0f172a;
            transform: scale(1.05);
        }
        .premium-section-card {
            background: #ffffff;
            border-radius: 1.5rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .activity-header {
            padding: 1.75rem 2rem;
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .activity-header h5 {
            font-weight: 800;
            color: #0f172a;
            margin: 0;
            display: flex;
            align-items: center;
            font-size: 1.2rem;
            letter-spacing: -0.5px;
        }
        .schedule-hub-item {
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s;
        }
        .schedule-hub-item:last-child {
            border-bottom: none;
        }
        .schedule-hub-item:hover {
            background-color: #f8fafc;
        }
        .time-pill {
            background: #f1f5f9;
            color: #64748b;
            padding: 4px 12px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.75rem;
            min-width: 90px;
            text-align: center;
            margin-right: 1.25rem;
            border: 1px solid #e2e8f0;
        }
        .subject-hub-title {
            font-weight: 700;
            color: #334155;
            font-size: 0.95rem;
            line-height: 1.4;
        }
        .subject-hub-sub {
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 2px;
        }
        
        /* Sync Dashboard Loader - Pacman Style */
        .sync-loader-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            padding: 2.5rem 0;
        }
        .pacman-loader {
            width: 50px;
            aspect-ratio: 1;
            border-radius: 50%;
            background:
                radial-gradient(farthest-side,#000 98%,#0000) 55% 20%/8px 8px no-repeat,  
                #ffcc00;
            box-shadow: 2px -6px 12px 0px inset rgba(0, 0, 0, 0.7);
            animation: l4 .5s infinite steps(5) alternate;
        }
        @keyframes l4{ 
            0% {clip-path: polygon(50% 50%,100%   0,100% 0,0 0,0 100%,100% 100%,100% 100%)}
            100% {clip-path: polygon(50% 50%,100% 65%,100% 0,0 0,0 100%,100% 100%,100%  35%)}
        }
        .sync-text {
            font-size: 0.75rem;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin: 0;
        }
    </style>

    <div class="container pt-4 pb-3">
        <?php $this->load->view('members/siswa/templates/top'); ?>
    </div>

    <section class="content px-4">
        <div class="container">
            <div class="grid-hub">
                <?php 
                    $priority_order = [
                        'Ujian / Ulangan',
                        'Jadwal Pelajaran',
                        'Nilai Hasil',
                        'Catatan Guru'
                    ];

                    // Sort menu items
                    usort($menu, function($a, $b) use ($priority_order) {
                        $keyA = array_search($a->title, $priority_order);
                        $keyB = array_search($b->title, $priority_order);

                        // If item is not in priority list, move to end
                        if ($keyA === false) $keyA = 999;
                        if ($keyB === false) $keyB = 999;

                        return $keyA - $keyB;
                    });

                    $icons = [
                        'Ujian / Ulangan' => ['icon' => 'fas fa-laptop-code', 'color' => 'color-exam'],
                        'Jadwal Pelajaran' => ['icon' => 'far fa-calendar-alt', 'color' => 'color-schedule'],
                        'Nilai Hasil' => ['icon' => 'fas fa-chart-line', 'color' => 'color-result'],
                        'Catatan Guru' => ['icon' => 'fas fa-comment-dots', 'color' => 'color-note'],
                    ];
                ?>
                <?php foreach ($menu as $m): 
                    // Filter out unwanted items
                    if (in_array($m->title, ['Materi', 'Tugas', 'Absensi'])) continue;

                    $cfg = $icons[$m->title] ?? ['icon' => 'fas fa-th', 'color' => 'color-schedule'];
                    
                    // Title Mapping for cleaner display
                    $title_map = [
                        'Ujian / Ulangan' => 'Ujian',
                        'Jadwal Pelajaran' => 'Kalender Ujian',
                        'Nilai Hasil' => 'Hasil Ujian'
                    ];

                    $class_map = [
                        'Ujian / Ulangan' => 'card-exam',
                        'Jadwal Pelajaran' => 'card-calendar',
                        'Nilai Hasil' => 'card-result',
                        'Catatan Guru' => 'card-note'
                    ];

                    $display_title = $title_map[$m->title] ?? $m->title;
                    $card_class = $class_map[$m->title] ?? 'card-schedule';
                ?>
                    <a href="<?= base_url(ltrim($m->link, '/')) ?>" class="hub-card <?= $card_class ?>">
                        <div class="hub-icon-wrapper <?= $cfg['color'] ?>">
                            <i class="<?= $cfg['icon'] ?>"></i>
                        </div>
                        <span class="hub-label"><?= $display_title ?></span>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="row">
                <div class="col-lg-7 mb-4">
                    <div class="premium-section-card h-100">
                        <div class="activity-header">
                            <h5><i class="fas fa-bullhorn mr-3 text-warning"></i> FEED INFORMASI</h5>
                        </div>
                        <div class="card-body p-4">
                            <div id="pengumuman"></div>
                            <div id="loading-post" class="text-center d-none">
                                <div class="sync-loader-wrapper">
                                    <div class="pacman-loader"></div>
                                    <p class="sync-text">Syncing Dashboard...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 mb-4">
                    <div class="premium-section-card h-100">
                        <div class="activity-header">
                            <h5><i class="fas fa-laptop-code mr-3 text-primary"></i> JADWAL UJIAN</h5>
                            <button onclick="location.reload()" class="btn btn-xs btn-primary rounded-pill px-3 font-weight-bold shadow-sm">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                        <div class="card-body p-0">
                            <?php if (isset($ada_ujian) && count($ada_ujian) > 0) : 
                                foreach ($ada_ujian as $uj) : ?>
                                    <div class="schedule-hub-item">
                                        <div class="time-pill text-primary" style="background: #eff6ff; border-color: #dbeafe; color: #3b82f6;">
                                            <?= date('H:i', strtotime($uj->jam_mulai)) ?> - <?= date('H:i', strtotime($uj->jam_akhir)) ?>
                                        </div>
                                        <div>
                                            <div class="subject-hub-title"><?= $uj->nama_mapel ?></div>
                                            <div class="subject-hub-sub"><?= $uj->nama_ujian ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="p-5 text-center text-muted">
                                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow-inner" style="width: 100px; height: 100px;">
                                        <i class="fas fa-laptop-code fa-3x opacity-25"></i>
                                    </div>
                                    <p class="mb-0 font-weight-bold uppercase tracking-widest small">Tidak Ada Ujian Hari Ini</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="pengumumanModal" tabindex="-1" role="dialog" aria-labelledby="previewLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="user-block">
                    <img id="foto" class="img-circle" src="<?= base_url() ?>/assets/img/user.jpg" alt="User Image">
                    <span id="username" class="username">test</span>
                    <span id="tgl" class="description">aja</span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <div id="isi-pengumuman"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
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
    let jadwalKbm;
    var arrIst = [];
    var kelas = '<?=$siswa->id_kelas?>';
    var kodeKelas = '<?=$siswa->kode_kelas?>';
    var pengumuman;

    var halaman = 0;
    var idSiswa = "<?=$siswa->id_siswa?>";

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
            if (v.dari_group === '3' && v.dari === idSiswa) {
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

        $('#balasan').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log("data", $(this).serialize());
            var id = $(this).find('input[name=id_comment]').val();

            $.ajax({
                url: base_url + "siswa/savebalasan",
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
        wrappTables()
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
                if (v.dari_group === '3' && v.dari === idSiswa) {
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
                url: base_url + "siswa/getcomment/" + id + "/" + page,
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
                url: base_url + "siswa/getreplies/" + id + "/" + page,
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

            card += '<div class="card">' +
                '    <div class="card-body" id="parent' + v.id_post + '">' +
                '        <div class="media">' +
                avatar +
                '                <div class="media-body ml-3">' +
                '                    <span class="font-weight-bold"><b>' + dari + '</b></span>' +
                '                    <br/>' +
                '                    <span class="text-gray">' + createTime(v.tanggal) + '</span>' +
                '                </div>' +
                '        </div>' +
                '        <div class="mt-2">' + v.text + '</div>' +
                '        <div class="text-muted">' +
                '            <button type="button" class="btn btn-default btn-sm mr-2 btn-toggle"' +
                '                    data-id="' + v.id_post + '" data-toggle="modal"' +
                '                    data-target="#komentarModal"><i class="fas fa-reply mr-1"></i> Tulis komentar' +
                '            </button>' +
                '            <button type="button" id="trigger' + v.id_post + '" class="btn btn-default btn-sm mr-2 action-collapse"' +
                '                    data-toggle="collapse" aria-expanded="true"' +
                '                    aria-controls="collapse-' + v.id_post + '"' +
                '                    href="#collapse-' + v.id_post + '">' +
                '                <i class="fa fa-commenting-o mr-1"></i>' + v.jml + ' komentar' +
                '            </button>' +
                '        </div>' +
                '    </div>' +
                '    <div id="collapse-' + v.id_post + '" class="p-2 collapse toggle-comment"' +
                '         data-id="' + v.id_post + '" data-parent="#parent' + v.id_post + '">' +
                '        <hr class="m-0">' +
                '        <div id="konten' + v.id_post + '" class="p-4">' +
                '        </div>' +
                '        <div id="loading' + v.id_post + '" class="text-center d-none">' +
                '            <div class="spinner-grow"></div>' +
                '        </div>';
            if (v.jml == '0') {
                card += '<div class="text-center">Tidak ada komentar</div>';
            } else {
                card += '<div id="loadmore' + v.id_post + '"' +
                    '     onclick="getComments(' + v.id_post + ')"' +
                    '     class="text-center mt-4 loadmore">' +
                    '    <div class="btn btn-default">Muat komentar lainnya ...</div>' +
                    '</div>';
            }
            card += '</div>' +
                '</div>';
        });

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
                url: base_url + "siswa/savekomentar",
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
        wrappTables()
    }

    function getPosts() {
        $(`#loading-post`).removeClass('d-none');
        $(`#loadmore-post`).addClass('d-none');

        setTimeout(function () {
            $.ajax({
                url: base_url + "siswa/getpost?halaman=" + halaman + "&kelas=" + kodeKelas,
                type: "GET",
                //data: {halaman: halaman, kelas: kodeKelas},
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

    function loadPengumuman() {
        $.ajax({
            type: 'GET',
            url: base_url + 'dashboard/getpengumuman/3',
            success: function (data) {
                pengumuman = data;
                //console.log('result', data);
                var ul = '<ul class="products-list product-list-in-card pl-2 pr-2">';
                var pos = 0;
                $.each(data, function (key, value) {
                    //var nama = value.id_group === '1' ? value.name : (value.id_group === '2' ? value.nama_guru : value.nama);
                    var tgl = formatTanggal(value.date);//new Date('02/12/2018');
                    ul += '  <li class="item">' +
                        '<a href="javascript:void(0)" data-toggle="modal" data-target="#pengumumanModal" data-pos="' + pos + '">' +
                        '    <div class="media" style="line-height: 1">' +
                        '      <img class="img-circle media-left" src="' + base_url + '/assets/img/user.jpg" width="40" height="40" />' +
                        '      <div class="media-body ml-2">' +
                        '        <span class="float-right text-xs text-muted">' + tgl + '</span>' +
                        '        <span><b>' + value.judul + '</b></span>' +
                        '        <br />' +
                        '        <span class="text-sm">' + value.nama_guru + '</span>' +
                        '      </div>' +
                        '    </div>' +
                        '</a>' +
                        '  </li>';

                    pos++;
                });
                ul += '<li>' +
                    '<a href="">' +
                    '<div class="text-center">' +
                    '<br>Lihat semua pengumuman' +
                    '</div>' +
                    '</a>' +
                    '</li>' +
                    '</ul>';
                $('#list-pengumuman').html(ul);
            }
        })
    }

    function loadJadwal() {
        var date = new Date();
        var hari = date.getDay();

        $.ajax({
            type: 'GET',
            url: base_url + 'dashboard/getjadwalhariini/' + kelas + '/' + hari,
            success: function (data) {
                console.log('jadwal', data);
                if (data.length !== 0) {
                    var tableJadwal = '<table class="table w-100">' +
                        '<thead>' +
                        '<tr>' +
                        '<th class="text-center">Jam Ke</th>' +
                        '<th class="text-center">Waktu</th>' +
                        '<th>Mata Pelajaran</th>' +
                        '</tr></thead>' +
                        '<tbody>';
                    var jamMapel = jadwalKbm.jadwal.kbm_jam_pel;
                    var waktu = jadwalKbm.jadwal.kbm_jam_mulai;
                    var jmlMapel = jadwalKbm.jadwal.kbm_jml_mapel_hari;

                    var istirahat = jadwalKbm.istirahat;
                    var wktPel = 0;
                    var wktIst = 0;
                    for (let i = 0; i < jmlMapel; i++) {
                        var jamKe = i + 1;
                        var isIst = jQuery.inArray('' + jamKe, arrIst) > -1;

                        if (isIst) {
                            tableJadwal += '<tr>' +
                                '<td class="text-center">' + jamKe + '</td>' +
                                '<td class="text-center">' + waktu + '</td>' +
                                '<td>ISTIRAHAT</td>' +
                                '</tr>';
                            waktu = addTimes(waktu, '00:' + istirahat[wktIst].dur);
                            wktIst++;
                        } else {
                            //console.log(data[wktPel]);
                            var mpl = data[wktPel].nama_mapel == null ? '- -' : data[wktPel].nama_mapel;
                            tableJadwal += '<tr>' +
                                '<td class="text-center">' + data[wktPel].jam_ke + '</td>' +
                                '<td class="text-center">' + waktu + '</td>' +
                                '<td>' + mpl + '</td>' +
                                '</tr>';
                            wktPel++;
                            waktu = addTimes(waktu, '00:' + jamMapel);
                        }
                        console.log(waktu);
                    }
                    tableJadwal += '</tbody></table>';
                    $('#list-jadwal').html(tableJadwal);
                } else {
                    $('#list-jadwal').html('Tidak ada jadwal hari ini');
                }
            }
        })
    }

    $(document).ready(function () {
        //form = $('#formselect');
        $.ajax({
            type: 'GET',
            url: base_url + 'dashboard/getjadwalkbm/' + kelas,
            success: function (data) {
                console.log('kbm', data);
                jadwalKbm = data;
                $.each(data.istirahat, function (key, value) {
                    arrIst.push(value.ist);
                });
            }
        });

        $('#pengumumanModal').on('show.bs.modal', function (e) {
            var pos = $(e.relatedTarget).data('pos');
            var item = pengumuman[pos];
            var tgl = formatTanggal(item.date);

            var nama = item.nama_guru;
            var foto = item.foto;
            var tanggal = tgl;
            var judul = item.judul;
            var isi = item.text;

            $('#username').text(nama);
            $('#tgl').text(tanggal);
            $('#foto').attr('src', base_url + '/assets/img/' + foto);

            var html = '<h3>' + judul + '</h3>' + isi;
            $('#isi-pengumuman').html(html);

        });

        getPosts();
    });

    function addTimes(startTime, endTime) {
        var times = [0, 0, 0];
        var max = times.length;

        var a = (startTime || '').split(':');
        var b = (endTime || '').split(':');

        // normalize time values
        for (var i = 0; i < max; i++) {
            a[i] = isNaN(parseInt(a[i])) ? 0 : parseInt(a[i]);
            b[i] = isNaN(parseInt(b[i])) ? 0 : parseInt(b[i])
        }

        // store time values
        for (var j = 0; j < max; j++) {
            times[j] = a[j] + b[j]
        }

        var hours = times[0];
        var minutes = times[1];
        var seconds = times[2];

        if (seconds >= 60) {
            var m = (seconds / 60) << 0;
            minutes += m;
            seconds -= 60 * m
        }

        if (minutes >= 60) {
            var h = (minutes / 60) << 0;
            hours += h;
            minutes -= 60 * h
        }

        return ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2);// + ':' + ('0' + seconds).slice(-2)
    }

    function wrappTables() {
        $('table').each(function () {
            if (! $(this).parents('.table-responsive').length) {
                $(this).wrap('<div class="table-responsive"></div>');
            }
        })
    }
</script>
