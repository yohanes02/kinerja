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
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<!-- <div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="assets/vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">Johnny Brown!</div>
						</h4>
						<p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="col-xl-6 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<!-- <div id="chart"></div> -->
								<div style="height: 120px; display: grid; text-align: center; align-items: center;">
									<i class="micon icon-copy dw dw-user1 fa-3x"></i>
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?=$sumEmployee?></div>
								<div class="weight-600 font-14">Jumlah Karyawan Tetap</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<!-- <div id="chart"></div> -->
								<div style="height: 120px; display: grid; text-align: center; align-items: center;">
									<i class="micon icon-copy dw dw-user1 fa-3x"></i>
								</div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?=$avgAll?></div>
								<div class="weight-600 font-14">Rata-rata penilaian kinerja</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box mb-30 table-responsive">
						<!-- <h2 class="h4 pd-20">Best Selling Products</h2> -->
						<h2 class="h4 pd-20">Top 5 Karyawan</h2>
						<table class="table">
							<thead>
								<tr>
									<!-- <th class="table-plus datatable-nosort">Product</th> -->
									<th>Name</th>
									<th>Jumlah Data</th>
									<th>Rata-rata</th>
								</tr>
							</thead>
							<tbody>
								<?php $index = 1; foreach ($penilaian as $data) : if($index<6) :?>
									<tr>
										<td><?= $data['name'] ?></td>
										<td><?= $data['data'] ?></td>
										<td><?= $data['avg'] ?></td>
									</tr>
								<?php endif; $index++; endforeach; ?>
								<!-- <tr>
									<td>a</td>
									<td>a</td>
									<td>a</td>
								</tr>
								<tr>
									<td>a</td>
									<td>a</td>
									<td>a</td>
								</tr>
								<tr>
									<td>a</td>
									<td>a</td>
									<td>a</td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4">Persentase Gender</h2>
						<!-- <div id="chart-gender" style="height: 95% !important;"></div> -->
						<div id="chart-gender"></div>
					</div>
				</div>
			</div>

			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
