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
						<h4>Sub Kriteria Penilaian</h4>
					</div>
					<div class="col-md-3">
						<a href="<?= base_url() ?>hrd/kriteria">
							<button type="button" class="close pull-right" id="close-add">×</button>
						</a>
					</div>
				</div>
			</div>
			<div>
				<?php if($sub_criteria_data == []) : ?>
				<form action="<?= base_url() ?>kabag/insert_sub_criteria" method="post">
					<div class="row">
						<div class="col-md-12 row">
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
						</div>
						<input type="hidden" name="kriteria_length" id="kriteria-length" style="display: none;" value="0">
						<input type="hidden" name="criteria_parent" id="criteria-parent" style="display: none;" value="<?= $criteria_id ?>">
						<div class="col-md-12 row" id="div-sub-kriteria-new"></div>
						<div class="col-md-3 pb-20">
							<button class="btn btn-block btn-success pull-right" type="button" id="add-new-sub-criteria">Tambah Sub Kriteria</button>
						</div>
						<div class="col-md-6 offset-6">
							<div class="row">
								<div class="col-md-6">
									<a href="<?= base_url() ?>hrd/kriteria">
										<button class="btn btn-block btn-secondary pull-right" type="button">Cancel</button>
									</a>
								</div>
								<div class="col-md-6">
									<button class="btn btn-block btn-success pull-right" type="button" id="button-new-sub">Simpan</button>
									<button type="submit" id="submit-new-sub" style="display: none;"></button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<?php else: ?>
				<form action="<?= base_url() ?>kabag/update_sub_criteria" method="post">
					<input type="hidden" name="sub_kriteria_length_edit" id="sub-kriteria-length-edit" style="display: none;" value="<?= count($sub_criteria_data) ?>">
					<input type="hidden" name="criteria_parent" id="criteria-parent" style="display: none;" value="<?= $criteria_id ?>">
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
						<?php $no=0; foreach($sub_criteria_data as $sub_criteria) : ?>
							<div class="col-md-1">
								<div class="form-group text-center">
									<input type="hidden" name="sub_criteria_id<?=$no?>" value="<?=$sub_criteria['id']?>">
									<input type="text" class="form-control text-center" name="no" value="<?=$no + 1?>" disabled>
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<input type="text" class="form-control" name="sub_criteria_name<?=$no?>" value="<?= $sub_criteria['name'] ?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="number" class="form-control" id="sub-criteria-rating<?=$no?>" name="sub_criteria_rating<?=$no?>" value="<?= $sub_criteria['weight'] ?>">
								</div>
							</div>
						<?php $no++; endforeach; ?>
						<!-- <div class="col-md-3 pb-20">
							<button class="btn btn-block btn-success pull-right" type="button" id="add-new-criteria">Tambah Sub Kriteria</button>
						</div> -->
						<div class="col-md-6 offset-6">
							<div class="row">
								<div class="col-md-6">
									<a href="<?= base_url() ?>hrd/kriteria">
										<button class="btn btn-block btn-secondary pull-right" type="button">Batal</button>
									</a>
								</div>
								<div class="col-md-6">
									<button class="btn btn-block btn-success pull-right" type="button" id="button-update-sub">Simpan</button>
									<button type="submit" id="submit-update-sub" style="display: none;"><button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
