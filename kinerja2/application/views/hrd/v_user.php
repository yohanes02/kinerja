<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<!-- <div class="row">
						<div class="col-md-10"> -->
							<!-- <div class="page_title"> -->
								<h2>Akses User</h2>
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
						<div class="col-md-10">
							<div class="heading1 margin_0">
								<h2>Daftar Akses User</h2>
							</div>
						</div>
						<div class="col-md-2">
							<div class="button_block">
								<a href="<?=base_url()?>hrd/addUser">
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
									<th>Username</th>
									<th>Tipe</th>
									<th>Departemen</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($users as $user) : ?>
								<tr id="<?=$user['id']?>" tbl-name="user">
										<td><?=$no?></td>
										<td><?=$user['fname']?></td>
										<td><?=$user['lname']?></td>
										<td><?=$user['username']?></td>
										<td>
											<?php if($user['type'] == 1) : ?>
											HRD
											<?php elseif($user['type'] == 2) : ?>
											Kepala Bagian
											<?php else : ?>
											Manager
											<?php endif; ?>
										</td>
										<td><?=$user['dept_name']?></td>
										<td>
											<a href="<?=base_url()?>hrd/editUser/<?=$user['id']?>">
												<button class="btn btn-primary">Edit</button>
											</a>
											<button class="btn btn-danger remove">Hapus</button>
											<a href="<?=base_url()?>hrd/resetPassword/<?=$user['id']?>">
												<button class="btn btn-success">Reset Password</button>
											</a>
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
