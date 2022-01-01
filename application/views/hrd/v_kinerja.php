	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="<?=base_url()?>assets/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="<?=base_url()?>assets/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="<?= base_url() ?>hrd" class="dropdown-toggle no-arrow">
							<i class="micon icon-copy fa fa-dashboard" aria-hidden="true"></i><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url() ?>hrd/karyawan" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1"></span><span class="mtext">Data Karyawan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url() ?>hrd/bagian" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-diagram"></span><span class="mtext">Data Bagian</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url() ?>hrd/user" class="dropdown-toggle no-arrow">
							<i class="micon icon-copy dw dw-user1"></i><span class="mtext">User</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url() ?>hrd/kinerja" class="dropdown-toggle no-arrow">
							<i class="micon icon-copy dw dw-file"></i><span class="mtext">Kinerja Karyawan</span>
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
							<h4>Penilaian Kinerja Karyawan</h4>
						</div>
					</div>
				</div>
				<div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Nama Bagian</label>
								<select name="department_id" id="department-id" class="form-control custom-select">
									<option value="all">Semua Bagian</option>
									<?php $idx=0; foreach ($departments as $department) : ?>
										<option value="<?=$department['id']?>" id="d<?=$department['id']?>"><?=$department['name']?></option>
									<?php $idx++; endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Nama Karyawan</label>
								<select name="employee_id" id="employee-id" class="form-control custom-select">
									<option value="all" id="k">Semua Karyawan</option>
									<?php $idx=0; foreach ($employees as $employee) : ?>
										<option value="<?=$employee['id']?>" id="k<?=$employee['id']?>"><?=$employee['first_name']?> <?=$employee['last_name']?></option>
									<?php $idx++; endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Dari Bulan</label>
								<input class="form-control month-picker" placeholder="Select Month" type="text" id="month-rating-start">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Ke Bulan</label>
								<input class="form-control month-picker" placeholder="Select Month" type="text" id="month-rating-end">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<a href="#">
									<button class="btn btn-block btn-success" id="get-riwayat" type="button">Tampilkan</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="" id="parent-single" style="display: none;"></div>
			<div class="" id="parent-many" style="display: none;">
				<div class="tab">
					<ul class="nav nav-tabs justify-content-center">
						<?php $idx=0; foreach ($departments as $department) : ?>
							<li class="nav-item">
								<a class="nav-link text-blue" data-toggle="tab" href="#dept<?=$idx?>" role="tab" aria-selected="true" ><?=$department['name']?></a>
							</li>
						<?php $idx++; endforeach; ?>
						<!-- <li class="nav-item">
							<a href="" class="nav-link text-blue" data-toggle="tab" href="#dept0" role="tab" aria-selected="true">Finance</a>
						</li> -->
					</ul>
					<div class="tab-content">
					<?php $idx=0; foreach ($departments as $department) : ?>
						<div class="tab-pane fade" id="dept<?=$idx?>" role="tabpanel">
							<div class="pd-20">
								<?=$department['name']?>
							</div>
						</div>
					<?php $idx++; endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
