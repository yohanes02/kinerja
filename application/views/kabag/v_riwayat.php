<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index.html">
			<img src="assets/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
			<img src="assets/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li>
					<a href="<?= base_url() ?>kabag" class="dropdown-toggle no-arrow">
						<i class="micon icon-copy fa fa-dashboard" aria-hidden="true"></i><span class="mtext">Dashboard</span>
						<!-- <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span> -->
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>kabag/kriteria" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-edit2"></span><span class="mtext">Kriteria Penelitian</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>kabag/penilaian" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-house-1"></span><span class="mtext">Penilaian Kinerja</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>kabag/riwayat" class="dropdown-toggle no-arrow">
						<i class="micon icon-copy fa fa-history" aria-hidden="true"></i><span class="mtext">Riwayat Penilaian</span>
						<!-- <span class="micon dw dw-house-1"></span><span class="mtext">Riwayat Penilaian</span> -->
					</a>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
					</a>
					<ul class="submenu">
						<li><a href="index.html">Dashboard style 1</a></li>
						<li><a href="index2.html">Dashboard style 2</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="main-container">
	<div class="pd-ltr-20">
		<div class="pd-20 card-box mb-30" id="parent-add">
			<div class="clearfix mb-20">
				<div class="row">
					<div class="col-md-9">
						<h4>Riwayat Penilaian Kinerja</h4>
					</div>
				</div>
			</div>
			<div>
				<form action="<?= base_url() ?>hrd/insertKaryawan" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Nama Karyawan</label>
								<select name="month_rating" id="month-rating" class="form-control custom-select">
									<option value="0">Semua Karyawan</option>
									<?php for ($i=1; $i <= 12; $i++) : ?>
										<option value="<?= $i ?>">Karyawan <?= $i ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Dari Bulan</label>
								<select name="month_rating" id="month-rating" class="form-control custom-select">
									<?php for ($i=1; $i <= 12; $i++) : ?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Ke Bulan</label>
								<select name="month_rating" id="month-rating" class="form-control custom-select">
									<?php for ($i=1; $i <= 12; $i++) : ?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Aksi</label>
								<a href="<?= base_url() ?>kabag/penilaian_kinerja">
									<button class="btn btn-block btn-success">Tampilkan</button>
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
