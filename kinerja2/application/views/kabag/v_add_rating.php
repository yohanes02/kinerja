<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<div class="row">
						<h2>Penilaian Pegawai</h2>
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
								<h2>Input Penilaian Pegawai</h2>
							</div>
						</div>
					</div>
				</div>
				<form action="<?=base_url()?>kabag/submitValuation/<?=$employee_id?>" method="post">
					<div class="full">
						<div class="padding_infor_info">
							<div class="row">
								<?php $no=0; foreach($criteria_data as $criteria) : ?>
								<div class="col-md-12" style="padding-bottom: 25px !important;">
									<div class="row">
										<div class="col-md-6">
											<h4 for=""><?=$criteria['name']?></h4>
											<input type="hidden" name="criteria<?=$no?>" value="<?=$criteria['id']?>" >
											<input type="text" class="form-control" name="aspect<?=$no?>" disabled value="<?=$criteria['aspect_name']?>">
										</div>
										<div class="col-md-3">
											<h4 for="">Nilai</h4>
											<select name="grade<?=$no?>" id="" class="custom-select" placeholder="Masukkan Penilaian">
												<option value="5">Sangat Baik</option>
												<option value="4">Baik</option>
												<option value="3">Cukup</option>
												<option value="2">Kurang</option>
												<option value="1">Sangat Kurang</option>
											</select>
										</div>
										<div class="col-md-3">
											<h4>Target</h4>
											<input type="text" class="form-control" disabled value="<?=$criteria['target_name']?>">
										</div>
									</div>
								</div>
								<?php $no++; endforeach; ?>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8"></div>
										<div class="col-md-2">
											<div class="button_block">
												<a href="<?=base_url()?>kabag/rating">
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
