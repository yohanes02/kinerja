<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<h2>Kriteria Penilaian</h2>
					<div class="form-group row" style="margin: 5px -15px 0px -15px !important;">
						<div class="col-sm-12 col-md-2 col-form-label">
							<label for="" style="align-self: self-end;">Pilih Bagian</label>
						</div>
						<div class="col-sm-12 col-md-4">
							<select name="dept_work" id="dept-work" class="custom-select"required>
							<?php $idDepts = array(); ?>
							<?php foreach ($departments as $dept) : ?>
								<?php array_push($idDepts, $dept['id']) ?>
								<option value="<?=$dept['id']?>"><?=$dept['dept_name']?></option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="col-sm-12 col-md-2">
							<button id="show-criteria" class="btn btn-primary" type="button">Tampilkan</button>
							<p id="idDepts" style="display: none;"><?php echo implode(',', $idDepts) ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<?php if($aspect_data == []) : ?>
			<div id="div-aspect">
				<div class="white_shd full margin_bottom_30">
					<div class="full graph_head">
						<div class="row">
							<div class="col-md-10">
								<div class="heading1 margin_0">
									<h2>Aspek Penilaian</h2>
								</div>
							</div>
							<div class="col-md-2">
								<div class="button_block">
									<a href="<?=base_url()?>hrd/addAspect">
										<button type="button" class="btn btn-block cur-p btn-primary">Masukkan Aspek</button>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php for ($i=0; $i < count($criteria_datas); $i++) : ?>
				<div id="div-<?php if(!empty($criteria_datas[$i])) {echo $criteria_datas[$i][0]['dept_id'];} else {echo $departments[$i]['id'];} ?>" style="display: none;">
					<div class="white_shd full margin_bottom_30">
						<div class="full graph_head">
							<div class="row">
								<div class="col-md-10">
									<div class="heading1 margin_0">
										<h2>Kriteria Penilaian <?=$departments[$i]['dept_name']?></h2>
									</div>
								</div>
								<?php if($criteria_datas[$i] == []) : ?>
								<div class="col-md-2">
									<div class="button_block">
										<a href="<?=base_url()?>hrd/addCriteria/<?=$departments[$i]['id']?>">
											<button type="button" class="btn btn-block cur-p btn-primary">Masukkan Kriteria</button>
										</a>
									</div>
								</div>
								<?php endif; ?>
								<!-- <div id="filter_div" style="padding-top: 20px; padding-bottom: 10px;">
									<div class="col-md-12">
										<p>Filter Data</p>
										<div class="row">
											<div class="col-md-3"></div>
										</div>
									</div>
								</div> -->
							</div>
						</div>
						<div class="table_section padding_infor_info">
							<div class="table-responsive-sm">
								<table class="table">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Aspek</th>
											<th>Tipe Kriteria</th>
											<th>Target</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($criteria_datas[$i] as $criteria) : ?>
										<tr id="<?=$criteria['id']?>" tbl-name="criteria">
												<td><?=$no?></td>
												<td><?=$criteria['name']?></td>
												<td><?=$criteria['aspect_name']?></td>
												<td>
													<?php if($criteria['type'] == 1) : ?>
														Core
														<?php else : ?>
															Secondary
													<?php endif; ?>
												</td>
												<td><?=$criteria['target']?></td>
												<td>
													<a href="#" data-backdrop="static" data-toggle="modal" data-target="#edit-modal">
														<button class="btn btn-primary" onclick="editKriteria(<?=$criteria['id']?>, '<?=$criteria['name']?>')">
															<i class="icon-copy fa fa-edit" aria-hidden="true"></i> Ubah Nama
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
				<?php endfor; ?>
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
			<form action="<?= base_url() ?>hrd/update_criteria_name" method="post">
				<div class="modal-body">
					<input type="hidden" name="kriteria_id" id="id-kriteria-edit">
					<div class="form-group">
						<label for="">Nama Kriteria</label>
						<input id="kriteria-name" type="text" class="form-control" name="kriteria_name">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
					<button class="btn btn-primary" type="submit">Perbarui</button>
				</div>
			</form>
		</div>
	</div>
</div>
