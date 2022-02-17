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
				<!-- <li>
					<a href="<?php //echo base_url() ?>kabag/kriteria" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-edit2"></span><span class="mtext">Kriteria Penilaian</span>
					</a>
				</li> -->
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
								<select name="employee_id" id="employee-id" class="form-control custom-select">
									<option value="all">Semua Karyawan</option>
									<?php for ($i=0; $i < count($employee_data); $i++) : ?>
										<option value="<?= $employee_data[$i]['id'] ?>"><?= $employee_data[$i]['first_name'] ?> <?= $employee_data[$i]['last_name'] ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Dari Bulan Tahun</label>
								<input class="form-control month-picker" placeholder="Pilih Bulan Tahun" type="text" id="month-rating-start">
								<!-- <select name="month_rating_start" id="month-rating-start" class="form-control custom-select">
									<?php //for ($i=1; $i <= 12; $i++) : ?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php //endfor; ?>
								</select> -->
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Ke Bulan Tahun</label>
								<input class="form-control month-picker" placeholder="Pilih Bulan Tahun" type="text" id="month-rating-end">
								<!-- <select name="month_rating_end" id="month-rating-end" class="form-control custom-select">
									<?php //for ($i=1; $i <= 12; $i++) : ?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php //endfor; ?>
								</select> -->
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Aksi</label>
								<a href="#">
									<button class="btn btn-block btn-success" id="get-riwayat" type="button">Tampilkan</button>
								</a>
							</div>
						</div>
					</div>
				</form>
				<div class="card">
					<div class="card-header" style="padding: 0.3rem;">
						<button class="btn btn-block" data-toggle="collapse" data-target="#info" style="text-align: left; font-weight: bolder;">
							Info Kriteria Penilaian
						</button>
					</div>
					<div id="info" class="collapse">
						<div class="card-body">
							<h4>Kriteria Penilaian</h4>
							<?php $i=1; foreach ($criteria_data as $criteria) : ?>
								<div>
									<span style="font-weight: bolder;">K<?=$i;?> : </span> <?=$criteria['name']?>
								</div>
							<?php $i++; endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="parent-riwayat">
		<!-- <div class="pd-20 card-box mb-30" id="parent-riwayat"> -->
			<!-- <div>
				<div class="clearfix mb-20">
					<div class="row">
						<div class="col-md-9">
							<h4>Penilaian nama_bulan</h4>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-stripped">
						<thead>
							<tr>
								<th>Nama Karyawan</th>
								<th>K1</th>
								<th>K2</th>
								<th>Hasil</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Yohanes .</td>
								<td>75</td>
								<td>100</td>
								<td>0,23333</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> -->
		</div>
	</div>
</div>
