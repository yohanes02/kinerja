<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="<?=base_url()?>assets/vendors/images/intimap-logo.png" alt="" class="light-logo">
				</a>
			</div>
			<!-- <div class="login-menu">
				<ul>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div> -->
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="<?= base_url() ?>assets/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div id="login-all" class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login</h2>
						</div>
						<form method="post" action="<?= base_url() ?>auth/login">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Masukkan Username" name="username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row" style="padding-bottom: 10px;">
								<div class="col-12">
									<span id="to-karyawan" onclick="toKaryawan()" style="cursor: pointer; font-weight: bold;">Login sebagai karyawan</span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div id="login-karyawan" class="login-box bg-white box-shadow border-radius-10" style="display: none;">
						<div class="login-title">
							<h2 class="text-center text-primary">Login Karyawan</h2>
						</div>
						<form method="post" action="<?= base_url() ?>auth/login/4">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Masukkan Email" name="email">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row" style="padding-bottom: 10px;">
								<div class="col-12">
									<span id="to-user" onclick="toUser()" style="cursor: pointer; font-weight: bold;">Login sebagai Hrd / Kabag / Direktur</span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
