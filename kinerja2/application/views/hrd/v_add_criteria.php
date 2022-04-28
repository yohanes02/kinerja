<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<div class="row">
						<h2>Tambah Data Kriteria Penilaian <?=$dept_data['dept_name']?></h2>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="white_shd full margin_bottom_30">
				<div class="full graph_head">
					<div class="row">
						<div class="col-md-8">
							<div class="heading1 margin_0">
								<h2>Data Baru Kriteria Penilaian <?=$dept_data['dept_name']?></h2>
							</div>
						</div>
					</div>
				</div>
				<form action="<?=base_url()?>hrd/submitCriteria/<?=$dept_data['id']?>" method="post">
					<div class="full">
						<div class="padding_infor_info">
							<input id="criteria-length" type="hidden" name="criteria-length" style="display: none;" value="1"/>
							<div class="row">
								<div id="div-criteria" class="col-md-12">
									<div class="row" id="criteria1">
										<div class="col-md-5">
											<div class="form-group">
												<label for="">Kriteria 1</label>
												<input type="text" class="form-control" name="criteria1">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="">Aspek</label>
												<select name="aspect1" id="" class="custom-select">
													<?php foreach ($aspects as $aspect) : ?>
													<option value="<?=$aspect['id']?>"><?=$aspect['name']?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="">Tipe</label>
												<select name="type1" id="" class="custom-select">
													<option value="1">Core</option>
													<option value="2">Secondary</option>
												</select>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="">Target</label>
												<select name="target1" id="" class="custom-select">
													<option value="5">Sangat Baik</option>
													<option value="4">Baik</option>
													<option value="3">Cukup</option>
													<option value="2">Kurang</option>
													<option value="1">Sangat Kurang</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-10"></div>
								<div class="col-md-2" style="padding-bottom: 25px;">
									<div class="button_block">
										<button id="new-criteria" type="button" class="btn btn-block cur-p btn-primary">Tambah Kriteria</button>
									</div>
								</div>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8"></div>
										<div class="col-md-2">
											<div class="button_block">
												<a href="<?=base_url()?>hrd/user">
													<button type="button" class="btn btn-block cur-p btn-dark">Kembali</button>
												</a>
											</div>
										</div>
										<div class="col-md-2">
											<div class="button_block">
												<button type="submit" class="btn btn-block cur-p btn-primary">Simpan Data</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- <script type="text/javascript">
	$(function () {
		$('#datetimepicker1').datetimepicker();
	});
</script> -->
