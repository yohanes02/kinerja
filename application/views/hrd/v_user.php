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
			<div class="pd-20 card-box mb-30">
				<div class="clearfix mb-20">
					<!-- <div class="pull-left"> -->
					<div class="row">
						<div class="col-md-9">
							<h4>Daftar User</h4>
						</div>
						<div class="col-md-3">
							<a href="#" data-backdrop="static" data-toggle="modal" data-target="#user-modal">
								<button type="button" class="btn btn-primary pull-right">Tambah User</button>
							</a>
						</div>
					</div>
					<!-- <h4>Daftar User</h4> -->
					<!-- </div> -->
				</div>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Username</th>
								<th scope="col">Email</th>
								<th scope="col">Tipe User</th>
								<th scope="col" width="35%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($users as $user) : ?>
								<tr>
									<td scope="row"><?= $no ?></td>
									<td scope="row"><?= $user['email'] ?></td>
									<td scope="row"><?= $user['username'] ?></td>
									<td scope="row">
										<?php if ($user['type'] == '1') : ?>
											HRD
										<?php elseif ($user['type'] == '2') : ?>
											Kepala Bagian
										<?php elseif ($user['type'] == '3') : ?>
											Direktur
										<?php endif; ?>
									</td>
									<td scope="row">
										<a href="#" data-backdrop="static" data-toggle="modal" data-target="#delete-modal">
											<button class="btn btn-danger" onclick="deleteUser(<?= $user['id'] ?>)">
												<i class="icon-copy fa fa-trash" aria-hidden="true"></i> Hapus
											</button>
										</a>
										<a href="#" data-backdrop="static" data-toggle="modal" data-target="#edit-modal">
											<button class="btn btn-primary" onclick="editUser(<?= $user['id'] ?>, '<?= $user['username'] ?>', '<?= $user['email'] ?>', <?= $user['type'] ?>, '<?=$user['department_id']?>')">
												<i class="icon-copy fa fa-edit" aria-hidden="true"></i> Edit
											</button>
										</a>
										<a href="#" data-backdrop="static" data-toggle="modal" data-target="#change-pass-modal">
											<button class="btn btn-success" onclick="gantiPassword(<?= $user['id'] ?>)">
												<i class="icon-copy fa fa-edit" aria-hidden="true"></i> Ganti Password
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

	<div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form action="<?= base_url() ?>hrd/insertUser" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control" name="username">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label for="">Tipe User</label>
							<select class="form-control custom-select" name="tipe_user" id="tipe_user_new" onchange="checkUserTypeNew()">
								<option value="1">HRD</option>
								<option value="2">Kepala Bagian</option>
								<option value="3">Direktur</option>
							</select>
						</div>
						<div class="form-group" id="departemen-select-new" style="display: none;">
							<label for="">Departemen</label>
							<select class="form-control custom-select" name="departemen" id="departemen-new">
								<?php foreach($departments as $department) : ?>
								<option value="<?= $department['id'] ?>"><?=$department['name']?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" name="password">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form action="<?= base_url() ?>hrd/updateUser" method="post">
					<div class="modal-body">
						<input type="hidden" name="user_id" id="id-user-edit">
						<div class="form-group">
							<label for="">Username</label>
							<input id="username" type="text" class="form-control" name="username">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input id="user-email" type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label for="">Tipe User</label>
							<select class="form-control custom-select" name="tipe_user" id="tipe_user_edit" onchange="checkUserTypeEdit()">
								<option value="1">HRD</option>
								<option value="2">Kepala Bagian</option>
								<option value="3">Direktur</option>
							</select>
						</div>
						<div class="form-group" id="departemen-select-edit" style="display: none;">
							<label for="">Departemen</label>
							<select class="form-control custom-select" name="departemen" id="departemen-edit">
								<?php foreach($departments as $department) : ?>
								<option value="<?= $department['id'] ?>"><?=$department['name']?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="change-pass-modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Ganti Password</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form action="<?= base_url() ?>hrd/changePass" method="post">
					<div class="modal-body">
						<input type="hidden" name="user_id" id="id-user">
						<div class="form-group">
							<label for="">Password Lama</label>
							<input type="password" class="form-control" name="current_password">
						</div>
						<div class="form-group">
							<label for="">Password Baru</label>
							<input type="password" class="form-control" name="new_password">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button class="btn btn-primary" type="submit">Ganti Password</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content bg-danger">
				<div class="modal-body text-center">
					<form action="<?= base_url() ?>hrd/deleteUser" method="post">
						<input type="hidden" name="user_id" id="id-user-delete">
						<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Delete User</h3>
						<p>Are you sure want to delete user ?</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-primary">Yes</button>
				</div>
				</form>
			</div>
		</div>
	</div>
