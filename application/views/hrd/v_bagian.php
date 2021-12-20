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
							<h4>Daftar Bagian</h4>
						</div>
						<div class="col-md-3">
							<a href="#" data-backdrop="static" data-toggle="modal" data-target="#bagian-modal">
								<button type="button" class="btn btn-primary pull-right">Tambah Bagian</button>
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
								<th scope="col">Name</th>
								<!-- <th scope="col">Bagian</th> -->
								<th scope="col" width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($departments as $department) :?>
								<tr>
									<td scope="row"><?= $no ?></td>
									<td scope="row"><?= $department['name'] ?></td>
									<!-- <td scope="row">IT</td> -->
									<td scope="row">
										<a href="#" data-backdrop="static" data-toggle="modal" data-target="#delete-modal">
											<button class="btn btn-danger" onclick="deleteBagian(<?= $department['id'] ?>)">
												<i class="icon-copy fa fa-trash" aria-hidden="true"></i> Hapus
											</button>
										</a>
										<a href="#" data-backdrop="static" data-toggle="modal" data-target="#edit-modal">
											<button class="btn btn-primary" onclick="editBagian(<?= $department['id'] ?>, '<?= $department['name'] ?>')">
												<i class="icon-copy fa fa-edit" aria-hidden="true"></i> Edit
											</button>
										</a>
									</td>
								</tr>
							<?php $no++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="bagian-modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Bagian</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form action="<?= base_url() ?>hrd/insertBagian" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Nama Bagian</label>
							<input type="text" class="form-control" name="bagian_name">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-light" type="button">Cancel</button>
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
					<h4 class="modal-title">Edit Bagian</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form action="<?= base_url() ?>hrd/updateBagian" method="post">
					<div class="modal-body">
						<input type="hidden" name="bagian_id" id="id-bagian-edit">
						<div class="form-group">
							<label for="">Nama Bagian</label>
							<input id="bagian-name" type="text" class="form-control" name="bagian_name">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-light" type="button">Cancel</button>
						<button class="btn btn-primary" type="submit">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content bg-danger">
				<!-- <div class="modal-header">
					<h4 class="modal-title">Delete User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form action="<?php //base_url() ?>hrd/deleteUser" method="post">
					<div class="modal-body">
						<input type="hidden" name="user_id" id="id-user-delete">
						<p>Are you sure want to delete user ?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal" aria-hidden="true">No</button>
						<button class="btn btn-primary" type="submit">Yes</button>
					</div>
				</form> -->
				<div class="modal-body text-center">
					<form action="<?= base_url() ?>hrd/deleteBagian" method="post">
						<input type="hidden" name="bagian_id" id="id-bagian-delete">
						<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Delete Bagian</h3>
						<p>Are you sure want to delete bagian ?</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-primary">Yes</button>
				</div>
				</form>
			</div>
		</div>
	</div>
