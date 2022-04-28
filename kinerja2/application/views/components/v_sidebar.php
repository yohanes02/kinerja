	<body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="<?=base_url()?>assets/images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_info" style="margin: 0px !important; padding: 0px !important;">
                           <h6><?=$this->session->userdata('fname')?> <?=$this->session->userdata('lname')?></h6>
                           <!-- <p><span class="online_animation"></span> Online</p> -->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <!-- <h4>General</h4> -->
						<?php if($this->session->userdata("utype") == 1) : ?>
                  <ul class="list-unstyled components">
                     <li><a href="<?=base_url()?>hrd/employee"><i class="fa fa-users orange_color"></i> <span>Pegawai</span></a></li>
                     <li><a href="<?=base_url()?>hrd/user"><i class="fa fa-key orange_color"></i> <span>Akses User</span></a></li>
                     <li><a href="<?=base_url()?>hrd/criteria"><i class="fa fa-pencil orange_color"></i> <span>Kriteria Penialain</span></a></li>
                     <li><a href="<?=base_url()?>hrd/attendance"><i class="fa fa-info-circle orange_color"></i> <span>Input Absensi</span></a></li>
                     <li><a href="<?=base_url()?>hrd/history"><i class="fa fa-history orange_color"></i> <span>Riwayat Penilaian</span></a></li>
                  </ul>
						<?php elseif($this->session->userdata("utype") == 2) : ?>
						<ul class="list-unstyled components">
                     <li><a href="<?=base_url()?>kabag/rating"><i class="fa fa-clock-o orange_color"></i> <span>Penilaian Pegawai</span></a></li>
                     <li><a href="<?=base_url()?>kabag/candidate"><i class="fa fa-clock-o orange_color"></i> <span>Kandidat Promosi</span></a></li>
                     <li><a href="<?=base_url()?>kabag/history"><i class="fa fa-clock-o orange_color"></i> <span>Riwayat Penialain</span></a></li>
                  </ul>
						<?php elseif($this->session->userdata("utype") == 3) : ?>
						<ul class="list-unstyled components">
                     <li><a href="<?=base_url()?>direk/candidate"><i class="fa fa-clock-o orange_color"></i> <span>Kandidat Promosi</span></a></li>
                     <li><a href="<?=base_url()?>direk/history"><i class="fa fa-clock-o orange_color"></i> <span>Riwayat Penialain</span></a></li>
                  </ul>
						<?php endif; ?>
               </div>
            </nav>
