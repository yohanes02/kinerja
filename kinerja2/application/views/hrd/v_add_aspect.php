<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<div class="row">
						<h2>Tambah Data Aspek Penilaian</h2>
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
								<h2>Data Baru Aspek Penilaian</h2>
							</div>
						</div>
					</div>
				</div>
				<form action="<?=base_url()?>hrd/submitAspect" method="post">
					<div class="full">
						<div class="padding_infor_info">
							<input id="aspect-length" type="hidden" name="aspect-length" style="display: none;" value="1"/>
							<div class="row">
								<div id="div-aspect" class="col-md-12">
									<div class="row" id="aspect1">
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Aspek 1</label>
												<input type="text" class="form-control" name="aspect1">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="">Bobot Core</label>
												<input type="number" class="form-control" name="coreWeight1">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="">Bobot Secondary</label>
												<input type="number" class="form-control" name="secondaryWeight1">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="">Bobot Aspek</label>
												<input type="number" class="form-control" name="aspectWeight1">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-10"></div>
								<div class="col-md-2" style="padding-bottom: 25px;">
									<div class="button_block">
										<button id="new-aspect" type="button" class="btn btn-block cur-p btn-primary">Tambah Aspek</button>
									</div>
								</div>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8"></div>
										<div class="col-md-2">
											<div class="button_block">
												<a href="<?=base_url()?>hrd/criteria">
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
