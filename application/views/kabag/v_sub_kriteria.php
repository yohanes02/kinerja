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
						<h4>Sub Kriteria Penilaian</h4>
					</div>
					<div class="col-md-3">
						<a href="<?= base_url() ?>kabag/kriteria">
							<button type="button" class="close pull-right" id="close-add">×</button>
						</a>
					</div>
				</div>
			</div>
			<div>
				<form action="<?= base_url() ?>hrd/insertKaryawan" method="post">
					<div class="row">
						<div class="col-md-1">
							<div class="form-group text-center">
								<label for="">No</label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label for="">Nama Sub Kriteria</label>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Bobot Sub Kriteria</label>
							</div>
						</div>
						<?php $no=1; for ($i=0; $i < 4; $i++) : ?>
							<div class="col-md-1">
								<div class="form-group text-center">
									<input type="text" class="form-control text-center" name="no" value="<?=$no?>" disabled>
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<input type="text" class="form-control" name="sub_criteria_name" value="Kriteria 1">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="number" class="form-control" name="sub_criteria_rating" value="30">
								</div>
							</div>
						<?php $no++; endfor; ?>
						<div class="col-md-3 pb-20">
							<button class="btn btn-block btn-success pull-right" type="button" id="add-new-criteria">Tambah Sub Kriteria</button>
						</div>
						<div class="col-md-6 offset-6">
							<div class="row">
								<div class="col-md-6">
									<a href="<?= base_url() ?>kabag/kriteria">
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
