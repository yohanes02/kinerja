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
						<a href="<?= base_url() ?>hrd/kriteria" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit2"></span><span class="mtext">Kriteria Penilaian</span>
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
			<div class="pd-20 card-box mb-30 collapse collapse-box" id="parent-add">
				<div class="clearfix mb-20">
					<div class="row">
						<div class="col-md-9">
							<h4>Tambah Data Karyawan</h4>
						</div>
						<div class="col-md-3">
							<a href="#parent-add" rel="content-y"  data-toggle="collapse">
								<button type="button" class="close pull-right" id="close-add">×</button>
							</a>
						</div>
					</div>
				</div>
				<div>
					<form action="<?= base_url() ?>hrd/insertKaryawan" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama Awal</label>
									<input type="text" class="form-control" name="first_name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama Akhir</label>
									<input type="text" class="form-control" name="last_name">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Tempat Lahir</label>
									<input type="text" class="form-control" name="birth_place">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Tanggal Lahir</label>
									<input type="text" class="form-control date-picker" name="birth_date">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Jenis Kelamin</label>
									<select name="jenis_kelamin" id="" class="form-control custom-select">
										<option value="1">Pria</option>
										<option value="2">Wanita</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Departemen</label>
									<select name="department" id="" class="form-control custom-select">
										<?php foreach ($departments as $department) : ?>
											<option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Gaji</label>
									<input type="text" class="form-control" name="fee">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Tanggal Bergabung</label>
									<input type="text" class="form-control date-picker" name="join_date">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Alamat</label>
									<textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>
								</div>
							</div>
							<div class="col-md-6 offset-6">
								<div class="row">
									<div class="col-md-6">
										<a href="#parent-add" rel="content-y"  data-toggle="collapse">
											<button class="btn btn-block btn-secondary pull-right" type="button">Cancel</button>
										</a>
									</div>
									<div class="col-md-6">
										<button class="btn btn-block btn-success pull-right" type="submit">Tambah</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="pd-20 card-box mb-30">
				<div class="clearfix mb-20">
					<!-- <div class="pull-left"> -->
					<div class="row">
						<div class="col-md-9">
							<h4>Daftar Karyawan</h4>
						</div>
						<div class="col-md-3">
							<a href="#parent-add" rel="content-y"  data-toggle="collapse">
									<button type="button" class="btn btn-primary pull-right">Tambah Data Karyawan</button>
							</a>
						</div>
					</div>
					<!-- <h4>Daftar User</h4> -->
					<!-- </div> -->
				</div>
				<?php if($this->session->flashdata('errInsEmployee')) : ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $this->session->flashdata('errInsEmployee') ?>
					</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('errUpdEmployee')) : ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $this->session->flashdata('errUpdEmployee') ?>
					</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('successInsEmployee')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('successInsEmployee') ?>
					</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('successUpdEmployee')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('successUpdEmployee') ?>
					</div>
				<?php endif; ?>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Bagian</th>
								<th scope="col" width="30%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($employees as $employee) : ?>
								<tr>
									<td scope="row"><?= $no ?></td>
									<td scope="row"><?= $employee['first_name'] ?> <?= $employee['last_name'] ?></td>
									<td scope="row"><?= $employee['departemen_name'] ?></td>
									<td scope="row">
										<a href="#" data-backdrop="static" data-toggle="modal" data-target="#delete-modal">
											<button class="btn btn-danger" onclick="deleteKaryawan(<?= $employee['id'] ?>)">
												<i class="icon-copy fa fa-trash" aria-hidden="true"></i> Hapus
											</button>
										</a>
										<a href="<?= base_url() ?>hrd/detail_karyawan/<?= $employee['id'] ?>">
											<button class="btn btn-primary">
												<i class="icon-copy fa fa-eye" aria-hidden="true"></i> Lihat Detail
											</button>
										</a>
									</td>
								</tr>
							<?php $no++;
							endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content bg-danger">
				<div class="modal-body text-center">
					<form action="<?= base_url() ?>hrd/deleteKaryawan" method="post">
						<input type="hidden" name="karyawan_id" id="id-karyawan-delete">
						<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Hapus Data Karyawan</h3>
						<p>Anda yakin untuk menghapus data karyawan ?</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-primary">Yes</button>
				</div>
				</form>
			</div>
		</div>
	</div>
