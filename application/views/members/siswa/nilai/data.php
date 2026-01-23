<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */
?>
<div class="content-wrapper bg-light">
    <style>

        .premium-section-card {
            background: #ffffff;
            border-radius: 1.5rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            overflow: hidden;
            height: 100%;
            transition: all 0.3s ease;
        }
        .premium-section-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .activity-header {
            padding: 1.5rem 2rem;
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .activity-header h5 {
            font-weight: 800;
            color: #1e293b;
            margin: 0;
            display: flex;
            align-items: center;
            font-size: 1.1rem;
            letter-spacing: -0.025em;
        }
        .table thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #e2e8f0;
            border-top: none;
        }
        .table td {
            vertical-align: middle;
            color: #334155;
            font-weight: 500;
            border-top: 1px solid #f1f5f9;
        }
        .exam-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.25rem;
        }
        .exam-item {
            background: #fff;
            border: 1px solid #f1f5f9;
            border-radius: 1rem;
            padding: 1.25rem;
            transition: all 0.2s;
            position: relative;
            display: flex;
            flex-direction: column;
        }
        .exam-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05);
            border-color: #e2e8f0;
        }
        .exam-score-box {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            border-radius: 12px;
            font-weight: 800;
            font-size: 1.1rem;
            color: #4f46e5;
            border: 1px solid #e2e8f0;
        }
        .modal-modern .modal-content {
            border-radius: 24px;
            border: none;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .modal-modern .modal-header {
            border-bottom: 1px solid #f1f5f9;
            padding: 1.5rem 2rem;
        }
        .modal-modern .modal-title {
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.025em;
        }
        .modal-body {
            padding: 1.5rem !important;
        }
        .info-table td {
            padding: 10px 0;
            color: #64748b;
            font-weight: 600;
            font-size: 0.9rem;
            vertical-align: top;
        }
        .info-table td:first-child {
            width: 40%;
            white-space: nowrap;
        }
        .info-table td:last-child {
            color: #1e293b;
            font-weight: 800;
            text-align: right;
            width: 60%;
        }
        .score-summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        .score-summary-table th {
            text-transform: uppercase;
            font-size: 0.7rem;
            font-weight: 800;
            color: #94a3b8;
            padding: 0 10px 5px 10px;
            border: none;
            letter-spacing: 0.05em;
        }
        .score-summary-table td {
            padding: 15px 12px;
            background: #f8fafc;
            border: none;
            font-weight: 700;
            font-size: 0.95rem;
            vertical-align: middle;
        }
        .score-summary-table td:first-child {
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            color: #475569;
            width: 40%;
        }
        .score-summary-table td:last-child {
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
            text-align: center;
            color: #4f46e5;
            font-weight: 900;
            font-size: 1.1rem;
        }
        .total-skor-card {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            border-radius: 20px;
            padding: 1.25rem;
            color: #fff;
            text-align: center;
            margin-top: 1rem;
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2);
        }
        .total-skor-card .label {
            font-size: 0.75rem;
            font-weight: 700;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        .total-skor-card .value {
            font-size: 2.25rem;
            font-weight: 900;
            display: block;
            margin-top: 2px;
            line-height: 1;
        }
        .text-dikoreksi {
            font-size: 0.75rem;
            line-height: 1.2;
            display: block;
            color: #6366f1;
            font-weight: 600;
        }
        .alert-soft-warning {
            background-color: #fffbeb;
            color: #f59e0b;
            border: none;
            border-radius: 12px;
        }
        .badge-soft-warning {
            background-color: #fffbeb;
            color: #f59e0b;
        }
    </style>

    <div class="container pt-5">


    <section class="content px-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="premium-section-card">
                        <div class="activity-header">
                             <h5><i class="fas fa-laptop-code mr-3 text-indigo"></i> HASIL UJIAN</h5>
                        </div>
                        <div class="card-body">
                            <div id='list-cbt'>
                                <?php if (count($jadwal) > 0) : ?>
                                    <div class="exam-grid">
                                        <?php foreach ($jadwal as $j) :
                                            $hanya_pg = $j->tampil_pg > 0 && $j->tampil_kompleks == 0 && $j->tampil_jodohkan == 0 && $j->tampil_isian == 0 && $j->tampil_esai == 0;
                                            $skor_obj = isset($skor[$j->id_jadwal]) ? $skor[$j->id_jadwal] : null;
                                            
                                            // Check durasi to see if finished
                                            $dur_obj = isset($durasi[$j->id_jadwal]) && count($durasi[$j->id_jadwal]) > 0 ? $durasi[$j->id_jadwal][0] : null;
                                            $sudah_selesai = $dur_obj && $dur_obj->selesai != null;
                                            
                                            $total = '-';
                                            if ($skor_obj && $sudah_selesai) {
                                                $dikoreksi = isset($skor_obj->dikoreksi) ? $skor_obj->dikoreksi : '1';
                                                if (!$hanya_pg && $dikoreksi == 0) {
                                                    $total = '*';
                                                } else {
                                                    $total = ($j->hasil_tampil == '0' ? '**' : $skor_obj->skor_total);
                                                }
                                            }
                                            ?>
                                            <div class="exam-item">
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <div class="text-xs font-weight-bold text-uppercase text-muted mb-1"><?= $j->nama_jenis ?></div>
                                                        <div class="text-dark font-weight-bold" style="font-size: 1.1rem; line-height: 1.2;"><?= $j->kode ?></div>
                                                        <div class="text-xs text-muted mt-2">
                                                            <i class="far fa-calendar-alt mr-1"></i> <?= buat_tanggal(date('D, d M Y', strtotime($j->tgl_mulai))) ?>
                                                        </div>
                                                    </div>
                                                    <div class="ml-2">
                                                        <div class="exam-score-box"><?= $total ?></div>
                                                    </div>
                                                </div>
                                                <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top border-light">
                                                    <span class="badge badge-light text-muted border"><?= $j->bank_kode ?></span>
                                                    <?php if ($sudah_selesai) : ?>
                                                    <button type="button"
                                                            data-koreksi="<?= isset($skor[$j->id_jadwal]->dikoreksi) ? $skor[$j->id_jadwal]->dikoreksi : '0' ?>"
                                                            data-tampil="<?= $j->hasil_tampil ?>"
                                                            data-id="<?= $j->id_jadwal ?>"
                                                            data-toggle="modal"
                                                            data-target="#detail-nilai"
                                                            class="btn btn-sm btn-outline-primary rounded-pill px-3 font-weight-bold" 
                                                            style="font-size: 0.8rem;">
                                                        Detail Result <i class="fas fa-arrow-right ml-1"></i>
                                                    </button>
                                                    <?php else : ?>
                                                    <span class="badge badge-soft-warning text-warning border-0 px-3 py-1 rounded-pill" style="font-size: 0.75rem;">
                                                        <i class="fas fa-spinner fa-spin mr-1"></i> Belum Selesai
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="alert align-content-center alert-default-warning" role="alert">
                                        Belum ada jadwal ulangan/ujian
                                    </div>
                                <?php endif; ?>

                                <div class="mt-4 p-3 bg-light rounded" style="border: 1px dashed #cbd5e1;">
                                    <span class="text-xs font-weight-bold text-uppercase text-muted">Keterangan:</span>
                                    <div class="d-flex flex-wrap mt-2 text-xs text-muted">
                                        <div class="mr-4 mb-1"><span class="font-weight-bold">(-)</span> Belum dikerjakan</div>
                                        <div class="mr-4 mb-1"><span class="font-weight-bold">(*)</span> Menunggu koreksi</div>
                                        <div class="mb-1"><span class="font-weight-bold">(**)</span> Hubungi Guru</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade modal-modern" id="detail-nilai" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Detail Hasil Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="w-100 info-table">
                    <tr>
                        <td>Tgl. Pelaksanaan</td>
                        <td id="jwaktu">:</td>
                    </tr>
                    <tr>
                        <td>Mulai</td>
                        <td id="jmulai">:</td>
                    </tr>
                    <tr>
                        <td>Selesai</td>
                        <td id="jselesai">:</td>
                    </tr>
                    <tr>
                        <td>Waktu pengerjaan</td>
                        <td id="jdurasi">:</td>
                    </tr>
                </table>
                <hr class="my-4">
                <div id="alert" class="alert alert-soft-warning border-0 text-center mb-4 d-none" role="alert">
                    <i class="fas fa-info-circle mr-2"></i> Hubungi guru pengampu jika ingin mengetahui nilai.
                </div>
                <div id="table-detail-soal">
                    <table class="score-summary-table">
                        <thead>
                        <tr>
                            <th>Jenis Soal</th>
                            <th class="text-center">Jml</th>
                            <th class="text-center">Benar</th>
                            <th class="text-center">Skor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="tpg">
                            <td>Pilihan Ganda</td>
                            <td class="text-center" id="jpg"></td>
                            <td class="text-center" id="bpg"></td>
                            <td class="text-center" id="spg"></td>
                        </tr>
                        <tr id="tpg2">
                            <td>PG Kompleks</td>
                            <td class="text-center" id="jpg2"></td>
                            <td class="text-center" id="bpg2"></td>
                            <td class="text-center" id="spg2"></td>
                        </tr>
                        <tr id="tjod">
                            <td>Menjodohkan</td>
                            <td class="text-center" id="jjod"></td>
                            <td class="text-center" id="bjod"></td>
                            <td class="text-center" id="sjod"></td>
                        </tr>
                        <tr id="tis">
                            <td>Isian Singkat</td>
                            <td class="text-center" id="jis"></td>
                            <td class="text-center" id="bis"></td>
                            <td class="text-center" id="sis"></td>
                        </tr>
                        <tr id="tes">
                            <td>Uraian / Esai</td>
                            <td class="text-center" id="jes"></td>
                            <td class="text-center" id="bes"></td>
                            <td class="text-center" id="ses"></td>
                        </tr>
                        </tbody>
                    </table>
                    
                    <div class="total-skor-card">
                        <span class="label">Total Skor Akhir</span>
                        <span class="value" id="jskor">0</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                <button class="btn btn-light rounded-pill px-5 font-weight-bold text-muted" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    var arrbulan = ['', 'Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var arrhari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
    var skores = JSON.parse('<?= json_encode($skor)?>');
    var durasies = JSON.parse('<?= json_encode($durasi)?>');
    var jadwals = JSON.parse('<?= json_encode($jadwal)?>');

    $(document).ready(function () {
        // DataTables removed for card view

        $('#detail-nilai').on('show.bs.modal', function (e) {
            var tampilNilai = $(e.relatedTarget).data('tampil');
            var id = $(e.relatedTarget).data('id');
            var dikoreksi = $(e.relatedTarget).data('koreksi') == '1';

            var jadwal = jadwals[id];
            var dur = durasies[id].length > 0 ? durasies[id][0] : null;
            var skor = skores[id];

            $('#alert').toggleClass('d-none', tampilNilai == '1');

            var sp = jadwal.tgl_mulai.split('-');
            var d = new Date(sp[0], sp[1] - 1, sp[2]);
            $('#jwaktu').html(': ' + arrhari[d.getDay()] + ', ' + sp[2] + ' ' + arrbulan[parseInt(sp[1])] + ' ' + sp[0]);

            if (dur != null && dur.mulai != null) {
                var m = dur.mulai.split(' ')[1].split(':');
                $('#jmulai').html(': ' + m[0] + ':' + m[1]);
                if (dur.selesai != null) {
                    var s = dur.selesai.split(' ')[1].split(':');
                    $('#jselesai').html(': ' + s[0] + ':' + s[1]);
                    if (dur.lama_ujian != null) {
                        var l = dur.lama_ujian.split(':');
                        var dr = '';
                        if (l[0] !== '00') {
                            dr += parseInt(l[0]) + ' jam ';
                        }
                        dr += parseInt(l[1]) + ' menit';
                        $('#jdurasi').html(': ' + dr);
                    } else {
                        var old_date_obj = new Date(dur.mulai).getTime();
                        var new_date_obj = new Date(dur.selesai).getTime();
                        let dr = (new_date_obj - old_date_obj)/1000;
                        dr /= 60;
                        $('#jdurasi').html(': ' + Math.round(dr) + ' menit');
                    }
                } else {
                    $('#jselesai').html(': <span class="text-primary font-italic">Sedang dikerjakan</span>');
                    $('#jdurasi').html(': -');
                }
            }

            if (tampilNilai == '1') {
                $('#table-detail-soal').removeClass('d-none');
                $('#tpg').toggleClass('d-none', parseInt(jadwal.tampil_pg) == 0);
                $('#jpg').text(jadwal.tampil_pg);
                $('#bpg').text(skor.benar_pg);
                $('#spg').text(skor.skor_pg);

                $('#tpg2').toggleClass('d-none', parseInt(jadwal.tampil_kompleks) == 0);
                $('#jpg2').text(jadwal.tampil_kompleks);
                $('#bpg2').text(skor.benar_kompleks);
                $('#spg2').text(skor.skor_kompleks);

                $('#tjod').toggleClass('d-none', parseInt(jadwal.tampil_jodohkan) == 0);
                $('#jjod').text(jadwal.tampil_jodohkan);
                $('#bjod').text(skor.benar_jodohkan);
                $('#sjod').text(skor.skor_jodohkan);

                $('#tis').toggleClass('d-none', parseInt(jadwal.tampil_isian) == 0);
                $('#jis').text(jadwal.tampil_isian);
                $('#bis').text(skor.benar_isian);
                $('#sis').html(dikoreksi ? skor.skor_isian : '<span class="text-dikoreksi">sedang<br>dikoreksi</span>');

                $('#tes').toggleClass('d-none', parseInt(jadwal.tampil_esai) == 0);
                $('#jes').text(jadwal.tampil_esai);
                $('#bes').text('-');
                $('#ses').html(dikoreksi ? skor.skor_essai : '<span class="text-dikoreksi">sedang<br>dikoreksi</span>');
                $('#jskor').html(skor.skor_total);
            } else {
                $('#table-detail-soal').addClass('d-none');
            }
        });
    });

    function showDialog(tr) {
        swal.fire({
            title: "Catatan Guru",
            html: '<div class="w-100 border p-4">' + $(tr).data('text') + '</div>',
            confirmButtonText: "TUTUP"
        })
    }
</script>
