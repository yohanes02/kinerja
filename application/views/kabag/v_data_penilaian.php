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
		<div class="pd-20 card-box mb-30" id="parent-add">
			<div class="clearfix mb-20">
				<div class="row">
					<div class="col-md-9">
						<h4>Penilaian Kinerja</h4>
					</div>
					<div class="col-md-3">
						<a href="<?= base_url() ?>kabag/penilaian">
							<button type="button" class="close pull-right" id="close-add">×</button>
						</a>
					</div>
				</div>
			</div>
			<div>
				<form action="<?= base_url() ?><?php if($rating_data == []) echo 'kabag/insert_penilaian'; else echo 'kabag/update_penilaian' ?>" method="post">
					<div class="row">
						<input type="hidden" name="karyawan_id" value="<?=$employee_id?>" >
						<?php $no=0; foreach ($criteria_data as $criteria) : ?>
							<div class="col-md-12">
								<div class="form-group">
									<?php if($rating_data != []) : ?>
										<?php foreach ($rating_data as $rating) : ?>
											<?php if($rating['criteria_id'] == $criteria['id']) :?>
												<input type="hidden" name="rating_id<?=$no?>" value="<?=$rating['id']?>">
											<?php endif; ?>
										<?php endforeach; ?>
									<?php endif; ?>
									<label for=""><?= $criteria['name'] ?></label>
									<input type="hidden" name="kriteria<?=$no?>" value="<?=$criteria['id']?>" >
									<select name="rating<?=$no?>" id="rating<?=$no?>" class="form-control custom-select">
										<?php foreach ($criteria['sub_criterias'] as $sub_criteria) : ?>
											<?php if ($rating_data != []) : ?>
												<?php foreach ($rating_data as $rating) : ?>
													<?php if ($rating['criteria_id'] == $criteria['id']) : ?>
														<option value="<?= $sub_criteria['id'] ?>" <?php if ($rating['sub_criteria_id'] == $sub_criteria['id']) echo 'selected'; ?>><?= $sub_criteria['name'] ?></option>
													<?php endif; ?>
												<?php endforeach; ?>
											<?php else : ?>
												<option value="<?= $sub_criteria['id'] ?>"><?=$sub_criteria['name']?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						<?php $no++; endforeach; ?>
						<div class="col-md-6 offset-6">
							<div class="row">
								<div class="col-md-6">
									<a href="<?= base_url() ?>kabag/penilaian">
										<button class="btn btn-block btn-secondary pull-right" type="button">Cancel</button>
									</a>
								</div>
								<div class="col-md-6">
									<button class="btn btn-block btn-success pull-right" type="submit">Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
