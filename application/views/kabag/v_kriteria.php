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

<div class="main-container">
	<div class="pd-ltr-20">
		<div class="pd-20 card-box mb-30 collapse collapse-box" id="parent-add">
			<div class="clearfix mb-20">
				<div class="row">
					<div class="col-md-9">
						<h4>Pengaturan Kriteria Penilaian</h4>
					</div>
					<div class="col-md-3">
						<a href="#parent-add" rel="content-y" data-toggle="collapse">
							<button type="button" class="close pull-right" id="close-add">×</button>
						</a>
					</div>
				</div>
			</div>
			<div id="used-criteria">
				<form action="<?= base_url() ?>kabag/update_criteria" method="post">
					<div class="row">
						<div id="div-header" class="col-md-12 row">
							<div class="col-md-12 row">
								<div class="col-md-1">
									<div class="form-group text-center">
										<label for="">No</label>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="">Nama Kriteria</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Bobot Kriteria</label>
									</div>
								</div>
							</div>
						</div>
						<span id="kriteria-length-edit" style="display: none;"><?= count($criteria_data) ?></span>
						<div id="div-kriteria" class="col-md-12 row">
							<?php $no = 0;
							foreach ($criteria_data as $criteria) : ?>
								<div id="kriteria<?= $no ?>" class="col-md-12 row">
									<input type="hidden" name="criteria_id<?= $no ?>" value="<?= $criteria['id'] ?>">
									<div class="col-md-1">
										<div class="form-group text-center">
											<input type="text" class="form-control text-center" name="no" value="<?= $no + 1 ?>" disabled>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<input type="text" class="form-control" name="criteria_name<?= $no ?>" value="<?= $criteria['name'] ?>" id="criteria_name<?= $no ?>" required>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="number" class="form-control" name="criteria_rating<?= $no ?>" id="criteria_rating<?= $no ?>" value="<?= $criteria['weight'] ?>" required>
										</div>
									</div>
								</div>
							<?php $no++;
							endforeach; ?>
						</div>
						<!-- <div class="col-md-3 pb-20">
							<button class="btn btn-block btn-success pull-right" type="button" id="add-new-criteria">Tambah Kriteria</button>
						</div> -->
						<div class="col-md-6 offset-6">
							<div class="row">
								<div class="col-md-6">
									<a href="#parent-add" rel="content-y" data-toggle="collapse">
										<button class="btn btn-block btn-secondary pull-right" type="button">Cancel</button>
									</a>
								</div>
								<div class="col-md-6">
									<button class="btn btn-block btn-success pull-right" type="button" id="button-edit-kriteria">Simpan</button>
									<button type="submit" id="submit-edit-kriteria" style="display: none;"></button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="pd-20 card-box mb-30 collapse collapse-box" id="parent-new">
			<div class="clearfix mb-20">
				<div class="row">
					<div class="col-md-9">
						<h4>Masukkan Kriteria Penilaian</h4>
					</div>
					<div class="col-md-3">
						<a href="#parent-new" rel="content-y" data-toggle="collapse">
							<button type="button" class="close pull-right" id="close-add">×</button>
						</a>
					</div>
				</div>
			</div>
			<div id="new-criteria">
				<form action="<?= base_url() ?>kabag/insert_criteria" method="post">
					<div class="row">
						<div id="div-header" class="col-md-12 row">
							<div class="col-md-12 row">
								<!-- <div class="col-md-1">
									<div class="form-group text-center">
										<label for="">No</label>
									</div>
								</div> -->
								<div class="col-md-9">
									<div class="form-group">
										<label for="">Nama Kriteria</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Bobot Kriteria</label>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="kriteria_length" id="kriteria-length" style="display: none;" value="0">
						<div id="div-kriteria-new" class="col-md-12 row">
							
						</div>
						<div class="col-md-3 pb-20">
							<button class="btn btn-block btn-success pull-right" type="button" id="add-new-criteria">Tambah Kriteria</button>
						</div>
						<div class="col-md-6 offset-6">
							<div class="row">
								<div class="col-md-6">
									<a href="#parent-new" rel="content-y" data-toggle="collapse">
										<button class="btn btn-block btn-secondary pull-right" type="button">Cancel</button>
									</a>
								</div>
								<div class="col-md-6">
									<button class="btn btn-block btn-success pull-right" type="button" id="button-new-kriteria">Simpan</button>
									<button type="submit" id="submit-new-kriteria" style="display: none;"></button>
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
						<h4>Kriteria Penilaian</h4>
					</div>
					<div class="col-md-3">
						<a href="#parent-add" rel="content-y" data-toggle="collapse">
							<button type="button" class="btn btn-primary pull-right">Atur Ulang Bobot</button>
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
							<th scope="col">Nama</th>
							<th scope="col">Bobot</th>
							<th scope="col" width="35%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if($criteria_data == []) : ?>
							<tr>
								<td colspan="4">
									<div class="text-center">
									<a href="#parent-new" rel="content-y" data-toggle="collapse">
										<button class="btn btn-success text-center">Masukkan Kriteria</button>
									</a>
									</div>
								</td>
							</tr>
						<?php else : ?>
						<?php $no = 1;
						foreach ($criteria_data as $criteria) : ?>
							<tr>
								<td scope="row"><?= $no ?></td>
								<td scope="row"><?= $criteria['name'] ?></td>
								<td scope="row"><?= $criteria['weight'] ?></td>
								<td scope="row">
									<a href="#" data-backdrop="static" data-toggle="modal" data-target="#edit-modal">
										<button class="btn btn-primary" onclick="editKriteria(<?=$criteria['id']?>, '<?=$criteria['name']?>')">
											<i class="icon-copy fa fa-edit" aria-hidden="true"></i> Ubah Nama
										</button>
									</a>
									<a href="<?= base_url() ?>kabag/detail_kriteria/<?= $criteria['id'] ?>">
										<button class="btn btn-success">
											<i class="icon-copy fa fa-eye" aria-hidden="true"></i> Lihat Sub Kriteria
										</button>
									</a>
								</td>
							</tr>
						<?php $no++;
						endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Kriteria</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="<?= base_url() ?>kabag/update_criteria_name" method="post">
				<div class="modal-body">
					<input type="hidden" name="kriteria_id" id="id-kriteria-edit">
					<div class="form-group">
						<label for="">Nama Kriteria</label>
						<input id="kriteria-name" type="text" class="form-control" name="kriteria_name">
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
