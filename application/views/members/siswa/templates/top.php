<style>
    .id-badge-nextgen {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0.5rem 0 1rem;
        text-align: center;
        color: #1e293b;
        position: relative;
    }
    .avatar-wrapper {
        position: relative;
        margin-bottom: 1rem;
        display: inline-block;
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .avatar-wrapper:hover {
        transform: scale(1.02) translateY(-2px);
    }
    .avatar-wrapper img {
        width: 128px;
        height: 128px;
        border-radius: 28px; /* Squircle */
        border: 4px solid #ffffff;
        position: relative;
        z-index: 1;
        object-fit: cover;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
    }
    .student-welcome {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        margin-bottom: 0.5rem;
        color: #94a3b8; /* Slate-400 for elegance */
    }
    .student-name-premium {
        font-size: 2.25rem;
        font-weight: 800;
        letter-spacing: -0.025em;
        line-height: 1.1;
        margin-bottom: 1.25rem;
        color: #0f172a;
    }
    .status-chips {
        display: flex;
        gap: 1rem;
        justify-content: center;
        align-items: center;
    }
    .chip-modern {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 0.5rem 1.25rem;
        border-radius: 100px; /* Full Pill */
        font-size: 0.825rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        color: #475569;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        transition: all 0.2s;
    }
    .chip-modern:hover {
        border-color: #cbd5e1;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transform: translateY(-1px);
    }
    .chip-modern i {
        color: #6366f1; /* Brand Indigo accent */
        margin-right: 0.5rem;
    }
    .chip-accent {
        background: #eff6ff;
        color: #2563eb;
        border-color: #dbeafe;
    }
    .live-clock-container {
        margin-top: 1.25rem;
        font-size: 0.9rem;
        color: #64748b;
        font-weight: 500;
        display: flex;
        flex-direction: column; /* Stack date and time */
        align-items: center;
        line-height: 1.4;
    }
    .live-time {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        font-variant-numeric: tabular-nums;
        letter-spacing: -0.5px;
    }
    .live-date {
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.75rem;
        font-weight: 600;
    }
</style>
<div class="id-badge-nextgen">
    <div class="avatar-wrapper">
        <img class="avatar" src="<?= base_url($siswa->foto) ?>" alt="Student Avatar">
    </div>
    <div class="student-welcome">Selamat Datang</div>
    <h1 class="student-name-premium text-uppercase"><?= $siswa->nama ?></h1>
    <div class="status-chips">
        <div class="chip-modern" title="NIS"><i class="fas fa-id-card-alt"></i> <?= $siswa->nis ?></div>
        <div class="chip-modern" title="NISN"><i class="fas fa-fingerprint"></i> <?= $siswa->nisn ?></div>
        <div class="chip-modern chip-accent" title="Kelas"><i class="fas fa-layer-group"></i> <?= $siswa->nama_kelas ?></div>
    </div>
    <div class="live-clock-container">
        <div class="live-date" id="current-date">Fetching Date...</div>
        <div class="live-time" id="current-time">--:--:--</div>
    </div>
</div>

<script>
    $(`.avatar`).each(function () {
        $(this).on("error", function () {
            var src = $(this).attr('src').replace('profiles', 'foto_siswa');
            $(this).attr("src", src);
            $(this).on("error", function () {
                $(this).attr("src", base_url + 'assets/img/siswa.png');
            });

        });
    });

    function updateLiveClock() {
        const now = new Date();
        const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const timeString = now.toLocaleTimeString('id-ID', { hour12: false });
        const dateString = now.toLocaleDateString('id-ID', optionsDate);
        
        document.getElementById('current-time').textContent = timeString;
        document.getElementById('current-date').textContent = dateString;
    }
    setInterval(updateLiveClock, 1000);
    updateLiveClock();
</script>
