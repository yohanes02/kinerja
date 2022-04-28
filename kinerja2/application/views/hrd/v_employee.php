<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<h2>Pegawai</h2>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="white_shd full margin_bottom_30">
				<div class="full graph_head">
					<div class="row">
						<div class="col-md-10">
							<div class="heading1 margin_0">
								<h2>Daftar Pegawai</h2>
							</div>
						</div>
						<div class="col-md-2">
							<div class="button_block">
								<a href="<?=base_url()?>hrd/addEmployee">
									<button type="button" class="btn btn-block cur-p btn-primary">Tambah Data</button>
								</a>
							</div>
						</div>
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
									<th>Nama Awal</th>
									<th>Nama Akhir</th>
									<th>Departemen</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($employees as $employee) : ?>
								<tr id="<?=$employee['id']?>" tbl-name="employee">
										<td><?=$no?></td>
										<td><?=$employee['fname']?></td>
										<td><?=$employee['lname']?></td>
										<td><?=$employee['dept_name']?></td>
										<td>
											<a href="<?=base_url()?>hrd/editEmployee/<?=$employee['id']?>">
												<button class="btn btn-primary">Edit</button>
											</a>
											<button class="btn btn-danger remove">Hapus</button>
										</td>
								</tr>
								<?php $no++; endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
