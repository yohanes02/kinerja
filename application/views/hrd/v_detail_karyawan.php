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
			<div class="pd-20 card-box mb-30" id="parent-add">
				<div class="clearfix mb-20">
					<div class="row">
						<div class="col-md-9">
							<h4>Data Karyawan</h4>
						</div>
						<div class="col-md-3">
							<a href="<?= base_url() ?>hrd/karyawan">
								<button type="button" class="close pull-right" id="close-add">×</button>
							</a>
						</div>
					</div>
				</div>
				<div>
					<form action="<?= base_url() ?>hrd/updateKaryawan" method="post">
						<input type="hidden" name="karyawan_id" value="<?= $detail['id'] ?>">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama Awal</label>
									<input type="text" class="form-control" name="first_name" value="<?= $detail['first_name'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama Akhir</label>
									<input type="text" class="form-control" name="last_name" value="<?= $detail['last_name'] ?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Tempat Lahir</label>
									<input type="text" class="form-control" name="birth_place" value="<?= $detail['birth_place'] ?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Tanggal Lahir</label>
									<input type="text" class="form-control date-picker" name="birth_date" value="<?= $detail['birth_date'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Jenis Kelamin</label>
									<select name="jenis_kelamin" id="" class="form-control custom-select">
										<option value="1" <?php if($detail['jk']==1) echo 'selected' ?>>Pria</option>
										<option value="2" <?php if($detail['jk']==2) echo 'selected' ?>>Wanita</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Departemen</label>
									<select name="department" id="" class="form-control custom-select">
										<?php foreach ($departments as $department) : ?>
											<option value="<?= $department['id'] ?>" <?php if($department['id'] == $detail['departemen_id']) {echo "selected";}  ?> ><?= $department['name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Gaji</label>
									<input type="text" class="form-control" name="fee" value="<?= $detail['fee'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Tanggal Bergabung</label>
									<input type="text" class="form-control date-picker" name="join_date" value="<?= $detail['join_date'] ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Alamat</label>
									<textarea class="form-control" name="address" id="address" cols="30" rows="10"><?= $detail['address'] ?></textarea>
								</div>
							</div>
							<div class="col-md-6 offset-6">
								<div class="row">
									<div class="col-md-6 offset-6">
										<button class="btn btn-block btn-success pull-right" type="submit">Perbarui Data</button>
									</div>
								</div>
							</div>
						</div>
					</form>
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
