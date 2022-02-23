<div class="left-side-bar">
    <div class="brand-logo">
        <a href="">
            <img src="<?=base_url()?>assets/vendors/images/intimap-logo.png" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
					<a href="<?= base_url() ?>kabag" class="dropdown-toggle no-arrow">
						<i class="micon icon-copy fa fa-dashboard" aria-hidden="true"></i><span class="mtext">Dashboard</span>
					</a>
				</li>
				<!-- <li>
					<a href="<?php //echo base_url() ?>kabag/kriteria" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-edit2"></span><span class="mtext">Kriteria Penilaian</span>
					</a>
				</li> -->
				<li>
					<a href="<?php //echo base_url() ?>kabag/penilaian" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-house-1"></span><span class="mtext">Penilaian Kinerja</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url() ?>kabag/riwayat" class="dropdown-toggle no-arrow">
						<i class="micon icon-copy fa fa-history" aria-hidden="true"></i><span class="mtext">Riwayat Penilaian</span>
						<!-- <span class="micon dw dw-house-1"></span><span class="mtext">Riwayat Penilaian</span> -->
					</a>
				</li>
            </ul>
        </div>
    </div>
</div>

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Daftar Pekerjaan (<?=$employee['first_name']?> <?=$employee['last_name']?>)</h4>
						<p>Bulan: <?=date("F Y", mktime(0, 0, 0, date('m') - 1, 10));?></p>
                    </div>
                </div>
                <div>
                    <h5>Persentase Penyelesaian : <?=$percentage?>%</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($works as $work) :?>
                                <tr>
                                    <td width="5%"><?= $i ?></td>
                                    <td><?= $work['description'] ?></td>
                                    <td width="25%">
                                        <select disabled <?php if($work['status']==3): ?> style="background-color: lightgreen; color: black;" <?php endif; ?> name="" id="status<?=$i?>" class="form-control custom-select" onchange="updateStatus(<?=$work['id']?>, <?=$i?>)">
                                            <option value="1" <?php if($work['status']==1) echo 'selected' ?>>Menunggu Dikerjakan</option>
                                            <option value="2" <?php if($work['status']==2) echo 'selected' ?>>Sedang Dikerjakan</option>
                                            <option value="3" <?php if($work['status']==3) echo 'selected' ?>>Selesai</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>