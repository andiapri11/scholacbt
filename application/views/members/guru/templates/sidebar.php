<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-white border-right shadow-sm">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link border-0 py-3 px-3 bg-white mb-2">
        <?php $logo_app = $setting->logo_kiri == null ? base_url() . 'assets/img/favicon.png' : base_url() . $setting->logo_kiri; ?>
        <div class="d-flex align-items-center">
            <img src="<?= $logo_app ?>" alt="App Logo"
                 style="height: 35px; width: auto; opacity: 1; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.05))">
            <div class="brand-text font-weight-bold ml-3 text-dark" style="font-size: 0.95rem; letter-spacing: 0.5px; text-transform: uppercase; line-height: 1.1">
                <?= $setting->nama_aplikasi ?>
            </div>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar px-2">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel border-0 d-flex mt-2 mb-2 p-3 mx-2" style="background: #f8fafc; border-radius: 12px; border: 1px solid #edf2f7 !important;">
            <div class="image d-flex align-items-center">
                <?php if ($guru->foto != null && is_file('./' . $guru->foto)) : ?>
                    <img src="<?= base_url() . $guru->foto ?>" 
                         class="img-circle elevation-1" alt="User Image" style="width: 40px; height: 40px; object-fit: cover; border: 2px solid white">
                <?php else : ?>
                    <div class="img-circle elevation-1 avatar-initials d-flex align-items-center justify-content-center text-white font-weight-bold" 
                         style="width: 40px; height: 40px; background: <?= get_avatar_color($guru->nama_guru) ?>; border: 2px solid white; font-size: 0.85rem; text-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        <?= get_initials($guru->nama_guru) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="info ml-2 d-flex flex-column justify-content-center">
                <a href="#" class="d-block font-weight-bold text-dark" style="line-height: 1.2; font-size: 0.75rem;">
                    <?= $guru->nama_guru ?>
                </a>
                <span class="text-primary font-weight-bold mt-1" style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.5px">
                    <?php 
                        $jab = [
                            '1' => 'Kepala Sekolah',
                            '2' => 'Wakil Kurikulum',
                            '3' => 'Guru Mapel',
                            '4' => 'Wali Kelas'
                        ];
                        echo isset($jab[$guru->id_jabatan]) ? $jab[$guru->id_jabatan] : 'Guru';
                    ?>
                </span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-5">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                id="tree-menus" data-accordion="false">
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    const page = '<?= $this->uri->segment(1)?>';
    const jabatan = '<?=$guru->id_jabatan?>';
    const pageact = '<?= $this->uri->segment(2); ?>';
    const menus = [
        {
            'header': 'HOME', 'cbt': '1',
            'menu': [
                {'name': 'Beranda', 'link': 'dashboard', 'icon': 'fas fa-desktop', 'cbt': '1'},
                {'name': 'Profile', 'link': 'guruview', 'icon': 'fas fa-user', 'cbt': '1'},
                {'name': 'Pengumuman', 'link': 'pengumuman', 'icon': 'fas fa-bullhorn', 'cbt': '1'},
                {
                    'name': 'Wali Kelas', 'icon': 'fas fa-chart-pie', 'cbt': '1', 'wali': true,
                    'submenu': [
                        {'name': 'Siswa', 'link':"walisiswa", 'icon': 'fas fa-users'},
                        {'name': 'Struktur', 'link':"walistruktur", 'icon': 'far fa-circle'},
                        {'name': 'Catatan', 'link':"walicatatan", 'icon': 'fa fa-pencil-alt'}
                    ]
                },
                {
                    'name': 'E-Learning', 'icon': 'fas fa-chalkboard', 'cbt': '0',
                    'submenu': [
                        {'name': "Jadwal Pelajaran", 'link': "kelasjadwal", 'icon': 'fa fa-calendar-alt'},
                        {'name': "Materi", 'link': "kelasmateri/materi", 'icon': 'fa fa-pencil-ruler'},
                        {'name': "Tugas", 'link': "kelasmateri/tugas", 'icon': 'fa fa-drafting-compass'},
                        {'name': "Jadwal Materi/Tugas", 'link': "kelasmaterijadwal", 'icon': 'fa fa-calendar-alt'},
                        {'name': 'Nilai Harian', 'link':"kelasstatus", 'icon': 'far fa-clipboard'},
                        {'name': 'Kehadiran Harian', 'link':"kelasabsensiharian", 'icon': 'fa fa-user-check'},
                        {'name': 'Kehadiran Bulanan', 'link':"kelasabsensibulanan", 'icon': 'fa fa-tasks'},
                        {'name': 'Rekap Nilai', 'link':"kelasnilai", 'icon': 'fa fa-trophy'},
                        {'name': 'Catatan Guru', 'link':"kelascatatan", 'icon': 'fa fa-pencil-alt'},
                    ]
                },
                {
                    'name': 'Ulangan / Ujian', 'icon': 'fa fa-user-graduate', 'cbt': '1',
                    'submenu': [
                        {'name':"Bank Soal", 'link':"cbtbanksoal", 'icon': 'far fa-folder-open'},
                        {'name':"Jadwal", 'link':"cbtjadwal", 'icon': 'far fa-calendar-alt'},
                        {'name': 'Cetak', 'link':"cbtcetak", 'icon': 'fa fa-print'},
                        {'name': 'Status Siswa', 'link':"cbtstatus", 'icon': 'fa fa-user-clock'},
                        {'name': 'Hasil Ujian', 'link':"cbtnilai", 'icon': 'fa fa-file-alt'},
                        {'name': 'Analisis Soal', 'link':"cbtanalisis", 'icon': 'fa fa-chart-line'},
                        {'name': 'Rekap Nilai', 'link':"cbtrekap", 'icon': 'fas fa-trophy'},
                    ]
                },
            ]
        },

        {'name': 'LOGOUT', 'link': '', 'icon': 'fas fa-sign-out-alt', 'cbt': '1'},
    ];

    const isLogin = localStorage.getItem('scholaCBT.login')
    const isCbtMode = isLogin ? isLogin === '1' : false
    let htmlMenu = '';
    menus.forEach(function (header) {
        console.log(header)
        if (isCbtMode && header.cbt === '0') {
            return
        }
        if (jabatan !== '4' && header.wali) {
            return
        }
        if (header.header) {
            htmlMenu += `<li class="nav-header">${header.header}</li>`;
            header.menu.forEach(function (menu) {
                if (isCbtMode && menu.cbt === '0') {
                    return
                }
                if (jabatan !== '4' && menu.wali) {
                    return
                }
                if (menu.submenu) {
                    var subs = menu.submenu.map(function(item) {
                        if (item['link'].includes('/')) {
                            return item['link'].split('/')[1]
                        } else return item['link'];
                    });
                    htmlMenu += `<li class="nav-item has-treeview ${subs.includes(pageact) || subs.includes(page) ? "menu-open" : ""}">
                    <a href="#" class="nav-link ${subs.includes(pageact) || subs.includes(page) ? "active" : ""}">
                        <i class="nav-icon ${menu.icon}"></i>
                        <p>${menu.name}<i class="fas fa-angle-left right"></i></p>
                    </a><ul class="nav nav-treeview">`;
                    menu.submenu.forEach(function (sub) {
                        htmlMenu += `<li class="nav-item">
                            <a href="${base_url + sub.link}"
                               class="nav-link ${page+'/'+pageact === sub.link || page === sub.link ? "active" : ""}">
                                <i class="${sub.icon} nav-icon"></i>
                                <p>${sub.name}</p>
                            </a>
                        </li>`;
                    })
                    htmlMenu += `</ul></li>`;
                } else {
                    htmlMenu += `<li class="nav-item"><a href="${base_url + menu.link}"
                       class="nav-link ${page === menu.link ? "active" : ""}">
                        <i class="nav-icon ${menu.icon}"></i>
                        <p>${menu.name}</p>
                    </a></li>`
                }
            })
        } else {
            htmlMenu += `<hr /><li class="nav-item">
                    <a href="#" onclick="logout()" class="nav-link">
                        <i class="${header.icon} nav-icon"></i>
                        <p>${header.name}</p>
                    </a>
                </li>`;
        }
    })
    $('#tree-menus').html(htmlMenu)
</script>
