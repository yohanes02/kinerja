<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<div class="row">
						<h2>Tambah Data Akses User</h2>
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
								<h2>Data Baru Akses User</h2>
							</div>
						</div>
					</div>
				</div>
				<form action="<?=base_url()?>hrd/submitNewUser" method="post">
					<div class="full">
						<div class="padding_infor_info">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Nama Awal</label>
										<input type="text" class="form-control" name="fname">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Nama Akhir</label>
										<input type="text" class="form-control" name="lname">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Email</label>
										<input type="email" class="form-control" name="email">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Username</label>
										<input type="text" class="form-control" name="uname">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Jenis Kelamin</label>
										<select name="sex" id="" class="custom-select" name="sex" required>
											<option value="L">Laki-Laki</option>
											<option value="P">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Tempat Lahir</label>
										<input type="text" class="form-control" name="birth_place">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Tanggal Lahir</label>
										<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="birth_date"/>
											<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Tipe User</label>
										<select name="user_type" id="user-type-select" class="custom-select" required>
											<option value="1">HRD</option>
											<option value="2">Kepala Bagian</option>
											<option value="3">Manager</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" id="dept-div" style="display: none;">
										<label for="">Departemen</label>
										<select name="dept_work" id="" class="custom-select" required>
											<?php foreach ($departments as $dept) : ?>
												<option value="<?=$dept['id']?>"><?=$dept['dept_name']?></option>
												<!-- # code... -->
											<?php endforeach; ?>
											<!-- <option value="">Information Technology</option> -->
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Alamat</label>
										<textarea id="" cols="30" rows="5" class="form-control" name="address"></textarea>
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
