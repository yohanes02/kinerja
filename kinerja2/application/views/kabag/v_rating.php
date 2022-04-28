<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<!-- <div class="row">
						<div class="col-md-10"> -->
							<!-- <div class="page_title"> -->
								<h2>Penilaian Kinerja</h2>
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="col-md-2"
							<div class="button_block">
								<a href="<?=base_url()?>hrd/addEmployee">
									<button type="button" class="btn btn-block cur-p btn-primary">Tambah Pegawai</button>
								</a>
							</div> -->
						<!-- </div> -->
					<!-- </div> -->
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="white_shd full margin_bottom_30">
				<div class="full graph_head">
					<div class="row">
						<div class="col-md-12">
							<div class="heading1 margin_0">
								<h2>Penilaian Kinerja Karyawan</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="table_section padding_infor_info">
					<div class="table-responsive-sm">
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Awal</th>
									<th>Nama Akhir</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($employees as $employee) : ?>
								<tr id="<?=$employee['id']?>" tbl-name="employee">
										<td><?=$no?></td>
										<td><?=$employee['fname']?></td>
										<td><?=$employee['lname']?></td>
										<td>
											<?php if($employee['haveRating'] == 1) : ?>
											<a href="<?=base_url()?>kabag/editRating/<?=$employee['id']?>">
												<button class="btn btn-success">Edit Penilaian</button>
											</a>
											<?php else : ?>
											<a href="<?=base_url()?>kabag/addRating/<?=$employee['id']?>">
												<button class="btn btn-primary">Beri Penilaian</button>
											</a>
											<?php endif; ?>
										</td>
								</tr>
								<?php $no++; endforeach; ?>
								<!-- <tr>
									<td>1</td>
									<td>Anna</td>
									<td>Pitt</td>
									<td>35</td>
									<td>New York</td>
									<td>USA</td>
									<td>Female</td>
									<td>Yes</td>
									<td>Yes</td>
									<td>Yes</td>
									<td>Yes</td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
