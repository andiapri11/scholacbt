<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */
?>

<!-- Content Wrapper -->
<div class="content-wrapper bg-light">
    <!-- Hub Header CSS -->
    <style>
        .premium-section-card {
            background: #ffffff;
            border-radius: 1.5rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
            overflow: hidden;
            height: calc(100vh - 200px);
            min-height: 550px;
            display: flex;
            flex-direction: column;
        }
        .activity-header {
            padding: 1.25rem 2rem;
            background: #ffffff;
            border-bottom: 2px solid #f8fafc;
            flex-shrink: 0;
        }
        /* Scrollable Areas */
        .notes-list-scroll {
            height: 100%;
            overflow-y: auto;
            background: #ffffff;
        }
        /* Style for the scrollbar */
        .notes-list-scroll::-webkit-scrollbar, .notes-detail-scroll::-webkit-scrollbar {
            width: 5px;
        }
        .notes-list-scroll::-webkit-scrollbar-thumb, .notes-detail-scroll::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
        
        .notes-detail-scroll {
            height: 100%;
            overflow-y: auto;
            background-color: #ffffff;
            position: relative;
        }
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
            text-align: center;
            padding: 2rem;
            background: #ffffff;
        }
        #detail {
            display: none;
            width: 100%;
            background: #ffffff;
            padding: 3rem;
            animation: fadeIn 0.4s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Mobile Scroll Override */
        @media (max-width: 768px) {
            .premium-section-card {
                height: auto;
                min-height: auto;
            }
            .notes-list-scroll {
                height: 400px;
            }
            .notes-detail-scroll {
                display: none; /* Modal handled in mobile */
            }
        }
    </style>

    <div class="pt-4"></div>

    <section class="content px-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="premium-section-card">
                        <div class="activity-header">
                            <h5 class="mb-0 font-weight-bold text-dark"><i class="fas fa-comment-dots mr-2 text-indigo"></i> Catatan Dari Guru</h5>
                        </div>
                        
                        <div class="row no-gutters h-100 flex-grow-1">
                            <!-- Left Column: List -->
                            <div class="col-lg-4 col-md-5 h-100">
                                <div class="notes-list-scroll p-0">
                                    <?php if (count($catatan) > 0) : ?>
                                        <ul class="list-group list-group-flush">
                                            <?php foreach ($catatan as $cat) :
                                                $for = $cat->type === '1' ? 'Semua Siswa Kelas ' . $siswa->nama_kelas : $siswa->nama;
                                                $readed1 = $cat->type === '1' && ($cat->reading && in_array($cat->id_siswa, $cat->reading));
                                                $readed2 = $cat->type === '2' && $cat->readed !== '0';
                                                
                                                // Status Logic
                                                $isRead = $readed1 || $readed2;
                                                $bgClass = $isRead ? '' : 'bg-soft-primary'; // Highlight unread
                                                
                                                // Level Logic
                                                $levelColors = [
                                                    '1' => 'success', // Saran
                                                    '2' => 'warning', // Teguran
                                                    '3' => 'pink',    // Peringatan
                                                    '4' => 'danger'   // Sanksi
                                                ];
                                                $levelLabels = [
                                                    '1' => 'Saran',
                                                    '2' => 'Teguran',
                                                    '3' => 'Peringatan',
                                                    '4' => 'Sanksi'
                                                ];
                                                $color = $levelColors[$cat->level] ?? 'secondary';
                                                $label = $levelLabels[$cat->level] ?? 'Info';
                                                ?>
                                                <li class="note-item list-group-item p-3 <?= $bgClass ?>"
                                                    data-table="<?= $cat->table ?>"
                                                    data-id="<?= $cat->id_catatan ?>">
                                                    <div class="media">
                                                        <img id="foto" class="img-circle mr-3 shadow-sm"
                                                             src="<?= base_url($cat->foto_guru) ?>"
                                                             onerror="this.src='<?= base_url('assets/img/user.jpg') ?>'"
                                                             width="45" height="45" style="object-fit: cover;">
                                                        <div class="media-body">
                                                            <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                                                                <h6 class="mb-0 font-weight-bold text-dark text-truncate" style="max-width: 140px;"><?= $cat->nama_guru ?></h6>
                                                                <span class="badge badge-soft-<?= $color ?> rounded-pill text-xs px-2"><?= $label ?></span>
                                                            </div>
                                                            <p class="mb-1 text-xs text-muted">Kepada: <?= $for ?></p>
                                                            <div class="d-flex w-100 justify-content-between align-items-end">
                                                                <small class="text-muted"><?= buat_tanggal(date('D, d M H:i', strtotime($cat->tgl))) ?></small>
                                                                <span class="text-xs isreaded">
                                                                    <?php if($isRead): ?>
                                                                        <i class="fas fa-check-double text-indigo"></i>
                                                                    <?php else: ?>
                                                                        <i class="fas fa-circle text-indigo" style="font-size: 8px;"></i> Baru
                                                                    <?php endif; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <div class="text-center py-5 text-muted">
                                            <i class="far fa-comment-alt fa-3x mb-3 text-gray-300"></i>
                                            <p>Belum ada catatan guru.</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Right Column: Detail -->
                            <div class="col-lg-8 col-md-7 d-none d-md-block h-100 p-0 border-left bg-white">
                                <div class="notes-detail-scroll p-0">
                                    <div class="empty-state">
                                        <div class="p-5 rounded-circle bg-light mb-4" style="width: 150px; height: 150px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-envelope-open-text fa-5x text-gray-300"></i>
                                        </div>
                                        <h6 class="text-muted font-weight-bold">Pilih catatan untuk membaca detail</h6>
                                        <p class="text-xs text-muted">Ketuk pada salah satu pesan di samping kiri</p>
                                    </div>
                                    
                                    <div id="detail">
                                        <!-- Header Detail -->
                                        <div class="d-flex align-items-center mb-5 pb-4 border-bottom">
                                            <div class="position-relative">
                                                <img id="foto-guru" class="rounded-circle shadow mr-3" src="" width="70" height="70" style="object-fit: cover; border: 3px solid #f8fafc;">
                                                <div class="position-absolute bg-success rounded-circle border border-white" style="width: 15px; height: 15px; bottom: 5px; right: 15px;"></div>
                                            </div>
                                            <div>
                                                <h4 id="nama-guru" class="font-weight-bold text-dark mb-0">Nama Guru</h4>
                                                <div class="badge badge-soft-indigo mt-1 px-3 rounded-pill text-xs">
                                                    <i class="fas fa-id-badge mr-1"></i> <span id="jabatan-guru">Jabatan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Content -->
                                        <div class="detail-content p-2">
                                            <div id="isi" class="text-dark" style="line-height: 2; font-size: 1.1rem; letter-spacing: 0.01em;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Footer Legend (Bottom of Card) -->
                        <div class="card-footer bg-light border-top py-2 px-3">
                            <div class="d-flex flex-wrap align-items-center justify-content-center text-xs text-muted">
                                <span class="mr-3"><i class="fas fa-circle text-success mr-1"></i> Saran</span>
                                <span class="mr-3"><i class="fas fa-circle text-warning mr-1"></i> Teguran</span>
                                <span class="mr-3"><i class="fas fa-circle text-pink mr-1"></i> Peringatan</span>
                                <span><i class="fas fa-circle text-danger mr-1"></i> Sanksi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daftarLabel">Detail Catatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header border-0 bg-white">
                    <div class="media align-items-center">
                        <img id="foto-guru-modal" class="rounded-circle mr-3" src="<?= base_url('/assets/img/user.jpg') ?>" width="50" height="50"/>
                        <div class="media-body">
                            <h5 id="nama-guru-modal" class="font-weight-bold mb-0">Nama Guru</h5>
                            <small id="jabatan-guru-modal" class="text-muted"> Jabatan </small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="isi-modal" class="text-justify text-dark"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    let itemsClicked = [];
    let fotoGuru;
    $(document).ready(function () {
        function screenSize() {
            var w = $(document).innerWidth();
            return (w < 768) ? 'xs' : ((w < 992) ? 'sm' : ((w < 1200) ? 'md' : 'lg'));
        }

        function viewDetail(data, table, id) {
            var detail = data.detail;
            var reading = data.reading;
            var mapel = detail.nama_mapel == null ? detail.jabatan + ' ' + detail.nama_kelas : 'Guru ' + detail.nama_mapel;
            
            if (screenSize() === 'xs') {
                // Mobile: Show Modal
                $('#nama-guru-modal').html(detail.nama_guru);
                $('#jabatan-guru-modal').html(mapel);
                $('#isi-modal').html(detail.text);
                $('#detailModal').modal('show');
                $('#foto-guru-modal').attr('src', fotoGuru);
            } else {
                // Desktop: Show Right Pane
                $('#nama-guru').html(detail.nama_guru);
                $('#jabatan-guru').html(mapel);
                $('#isi').html(detail.text);
                
                $('.empty-state').hide();
                $('#detail').css('display', 'block');
                $('#foto-guru').attr('src', fotoGuru);
            }

            var ada = reading.length > 0 && $.inArray(detail.id_siswa, reading) > -1;
            var readed;
            if (detail.type === '1') readed = ada;
            else readed = detail.readed !== '0';

            const clicked = $.inArray(table + '-' + detail.id_catatan, itemsClicked) > -1;

            if (!readed && !clicked) {
                itemsClicked.push(table + '-' + id);
                $.ajax({
                    url: base_url + 'siswa/readed/' + table + '/' + detail.id_catatan,
                    type: 'GET',
                    success: function (response) {
                        console.log('marked as read');
                    }
                });
            }
        }

        // Use standard event delegation
        $(document).on('click', '.note-item', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var table = $(this).data('table');
            var $item = $(this);
            
            // Get photo from the clicked item
            fotoGuru = $item.find('img').attr('src');
            
            // Styling Updates
            $('.note-item').removeClass('active');
            $item.addClass('active');
            $item.removeClass('bg-soft-primary'); // Mark visually as read
            
            // Update Read Icon
            $item.find('.isreaded').html('<i class="fas fa-check-double text-indigo"></i>');

            $.ajax({
                url: base_url + 'siswa/detailcatatan/' + table + '/' + id,
                type: 'GET',
                success: function (response) {
                    viewDetail(response, table, id);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // Image breakdown handling
        $('img').on("error", function () {
            $(this).attr("src", base_url + 'assets/img/user.jpg');
        });
    });
</script>
