<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<div class="row">
						<h2>Data Pegawai</h2>
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
								<h2>Edit Data Pegawai</h2>
							</div>
						</div>
					</div>
				</div>
				<form action="<?=base_url()?>hrd/submitEditEmployee/<?=$employee['id']?>" method="post">
					<div class="full">
						<div class="padding_infor_info">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Nama Awal</label>
										<input type="text" class="form-control" name="fname" value="<?=$employee['fname']?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Nama Akhir</label>
										<input type="text" class="form-control" name="lname" value="<?=$employee['lname']?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Email</label>
										<input type="email" class="form-control" name="email" value="<?=$employee['email']?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Jenis Kelamin</label>
										<select name="sex" id="" class="custom-select" name="sex" value="<?=$employee['sex']?>" required>
											<option value="L">Laki-Laki</option>
											<option value="P">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Tempat Lahir</label>
										<input type="text" class="form-control" name="birth_place" value="<?=$employee['birth_place']?>">
									</div>
								</div>
								<!-- <div class="col-md-4">
									<div class="form-group">
										<label for="">Tanggal Lahir</label>
										<input type="text" class="form-control" name="birth_date">
									</div>
								</div> -->
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Tanggal Lahir</label>
										<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="birth_date" value="<?php echo date('m/d/Y', strtotime($employee['birth_date'])); ?>"/>
											<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Departemen</label>
										<select name="dept_work" id="" class="custom-select" value="<?=$employee['dept_id']?>" required>
											<?php foreach ($departments as $dept) : ?>
												<option value="<?=$dept['id']?>"><?=$dept['dept_name']?></option>
												<!-- # code... -->
											<?php endforeach; ?>
											<!-- <option value="">Information Technology</option> -->
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Tanggal Bergabung</label>
										<div class="input-group date" id="datetimepicker2" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="join_date" value="<?php echo date('m/d/Y', strtotime($employee['join_date'])); ?>"/>
											<div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Alamat</label>
										<textarea id="" cols="30" rows="5" class="form-control" name="address"><?=$employee['address']?></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8"></div>
										<div class="col-md-2">
											<div class="button_block">
												<a href="<?=base_url()?>hrd/employee">
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
