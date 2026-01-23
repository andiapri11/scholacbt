<div class="content-wrapper bg-light">
    <section class="content-header ml-n3 mr-n3 header-blue">
        <div class="container-fluid">
            <div class="row px-3 pt-4 pb-5">
                <div class="col-sm-6">
                    <h1 class="text-white font-weight-bold text-shadow">
                        <i class="fas fa-user-tie mr-2"></i> <?= $judul ?>
                    </h1>
                    <p class="text-white-50 small mb-0">Manajemen akun guru, pengaturan login, dan reset sesi.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-n5 px-3">
        <div class="container-fluid">
            <div class="card card-modern border-0 shadow-lg">
                <div class="card-header bg-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-list text-primary mr-2"></i>
                        <h6 class="mb-0 font-weight-bold text-dark">Manajemen Akun Guru</h6>
                    </div>
                    <div class="card-tools">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-outline-primary rounded-pill px-3 mr-2">
                            <i class="fa fa-sync-alt mr-1"></i> Reload
                        </button>
                        <button type="button" class="btn btn-action btn-success btn-sm rounded-pill px-3 mr-2 shadow-sm" data-action="aktifkan"
                                data-toggle="tooltip" title="Aktifkan Semua Akun Guru">
                            <i class="fas fa-user-check mr-1"></i> Aktifkan Semua
                        </button>
                        <button type="button" class="btn btn-action btn-danger btn-sm rounded-pill px-3 shadow-sm" data-action="nonaktifkan"
                                data-toggle="tooltip" title="Nonaktifkan Semua Akun Guru">
                            <i class="fas fa-user-slash mr-1"></i> Nonaktifkan Semua
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="users" class="table table-modern-list w-100 mb-0">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px">No.</th>
                                <th>NAMA GURU</th>
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th>LEVEL</th>
                                <th class="text-center">RESET LOGIN</th>
                                <th class="text-center" style="width: 100px">AKSI</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="overlay-modern d-none" id="loading">
                    <div class="loader-modern"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Manajemen Pengguna</h1>
	</div>
	<div class="row">

		<div class="col-xl-6 col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Administrator</h6>
				</div>
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myAreaChart"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Executive</h6>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
							<div class="dropdown-header">Dropdown Header:</div>
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="chart-pie pt-4 pb-2">
						<canvas id="myPieChart"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Guru</h6>
				</div>
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myAreaChart"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Pengawas</h6>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
							<div class="dropdown-header">Dropdown Header:</div>
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="chart-pie pt-4 pb-2">
						<canvas id="myPieChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
-->

<script type="text/javascript">
    var user_id = '<?=$user->id?>';
</script>

<script src="<?= base_url() ?>/assets/app/js/users/guru/data.js"></script>
