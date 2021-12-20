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
						<h4>Penilaian Kinerja</h4>
					</div>
					<div class="col-md-3">
						<a href="<?= base_url() ?>kabag/penilaian">
							<button type="button" class="close pull-right" id="close-add">×</button>
						</a>
					</div>
				</div>
			</div>
			<div>
				<form action="<?= base_url() ?>hrd/insertKaryawan" method="post">
					<div class="row">
						<?php for ($j=0; $j < 5; $j++) : ?>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Deskripsi Penilaian</label>
									<select name="month_rating" id="month-rating" class="form-control custom-select">
										<?php for ($i=1; $i <= 5; $i++) : ?>
											<option value="<?= $i ?>">Nilai <?= $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
						<?php endfor; ?>
						<div class="col-md-6 offset-6">
							<div class="row">
								<div class="col-md-6">
									<a href="<?= base_url() ?>kabag/penilaian">
										<button class="btn btn-block btn-secondary pull-right" type="button">Cancel</button>
									</a>
								</div>
								<div class="col-md-6">
									<button class="btn btn-block btn-success pull-right" type="submit">Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
