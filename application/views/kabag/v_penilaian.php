<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index.html">
			<img src="<?=base_url()?>assets/vendors/images/intimap-logo.png" alt="" class="light-logo">
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
						<span class="micon dw dw-edit2"></span><span class="mtext">Kriteria Penilaian</span>
					</a>
				</li>
				<!-- <li>
					<a href="<?php //echo base_url() ?>kabag/penilaian" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-house-1"></span><span class="mtext">Penilaian Kinerja</span>
					</a>
				</li> -->
				<li>
					<a href="<?= base_url() ?>kabag/riwayat" class="dropdown-toggle no-arrow">
						<i class="micon icon-copy fa fa-history" aria-hidden="true"></i><span class="mtext">Riwayat Penilaian</span>
						<!-- <span class="micon dw dw-house-1"></span><span class="mtext">Riwayat Penilaian</span> -->
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="main-container">
	<div class="pd-ltr-20">
		<!-- <div class="pd-20 card-box mb-30 collapse collapse-box" id="parent-add">
			<div class="clearfix mb-20">
				<div class="row">
					<div class="col-md-9">
						<h4>Penilaian Kinerja</h4>
					</div>
					<div class="col-md-3">
						<a href="#parent-add" rel="content-y" data-toggle="collapse">
							<button type="button" class="close pull-right" id="close-add">×</button>
						</a>
					</div>
				</div>
			</div>
			<div>
				<form action="<?= base_url() ?>hrd/insertKaryawan" method="post">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="">Nama Karyawan</label>
								<select name="month_rating" id="month-rating" class="form-control custom-select">
									<?php for ($i = 1; $i <= 12; $i++) : ?>
										<option value="<?= $i ?>">Karyawan <?= $i ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Bulan Penilaian</label>
								<select name="month_rating" id="month-rating" class="form-control custom-select">
									<?php for ($i = 1; $i <= 12; $i++) : ?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Aksi</label>
								<a href="<?= base_url() ?>kabag/penilaian_kinerja">
									<button class="btn btn-block btn-success">Beri Penilaian</button>
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div> -->
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<!-- <div class="pull-left"> -->
				<div class="row">
					<div class="col-md-9">
						<h4>Penilaian Kinerja</h4>
						<p>Bulan: <?=date("F Y", mktime(0, 0, 0, date('m') - 1, 10));?></p>
					</div>
					<!-- <div class="col-md-3">
						<a href="#parent-add" rel="content-y" data-toggle="collapse">
							<button type="button" class="btn btn-primary pull-right">Tambah Penilaian Baru</button>
						</a>
					</div> -->
				</div>
				<!-- <h4>Daftar User</h4> -->
				<!-- </div> -->
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama Karyawan</th>
							<th scope="col">Hasil Penilaian</th>
							<th scope="col" width="25%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($employee_data as $employee) : ?>
							<tr>
								<td><?= $no ?></td>
								<td><?php echo $employee['first_name'] . ' ' . $employee['last_name'] ?></td>
								<td>
									<?php if($employee['result'] != null) : ?>
										<?= $employee['result'] ?>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($employee['count_rating'] == $criteria_length) : ?>
										<a href="<?= base_url() ?>kabag/penilaian_kinerja/<?=$employee['id']?>">
											<button class="btn btn-primary">
												<i class="icon-copy fa fa-edit" aria-hidden="true"></i> Edit Penilaian
											</button>
										</a>
									<?php else : ?>
										<a href="<?= base_url() ?>kabag/penilaian_kinerja/<?=$employee['id']?>">
											<button class="btn btn-success">
												<i class="icon-copy fa fa-edit" aria-hidden="true"></i> Beri Penilaian
											</button>
										</a>
									<?php endif; ?>
								</td>
							</tr>
						<?php $no++;endforeach; ?>
						<!-- <tr>
							<td scope="row">1</td>
							<td scope="row">Yohanes</td>
							<td scope="row">DONE</td>
							<td scope="row">
								<a href="#">
									<button class="btn btn-primary">
										<i class="icon-copy fa fa-edit" aria-hidden="true"></i> Edit Penilaian
									</button>
								</a>
							</td>
						</tr>
						<tr>
							<td scope="row">2</td>
							<td scope="row">Adi</td>
							<td scope="row">NOT RATING</td>
							<td scope="row">
								<a href="<?= base_url() ?>kabag/penilaian_kinerja">
									<button class="btn btn-success">
										<i class="icon-copy fa fa-edit" aria-hidden="true"></i> Beri Penilaian
									</button>
								</a>
							</td>
						</tr> -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
