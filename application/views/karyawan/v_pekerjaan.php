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
            <ul id="accordion-menu">
                <li>
                    <a href="<?= base_url() ?>karyawan" class="dropdown-toggle no-arrow">
                        <i class="micon icon-copy dw dw-user1" aria-hidden="true"></i><span class="mtext">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>karyawan/pekerjaan" class="dropdown-toggle no-arrow">
                        <i class="micon icon-copy dw dw-file" aria-hidden="true"></i><span class="mtext">Daftar Pekerjaan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="row">
                <div class="col-md-3">
                    <p style="margin: 10px 0;">Pilih Bulan Tahun</p>
                </div>
                <div class="col-md-6">
                    <input class="form-control month-picker" placeholder="Pilih Bulan Tahun" type="text" id="month-year-pekerjaan" value="<?=date('F')?> <?=date('Y')?>">
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary btn-block" id="button-pekerjaan" onclick="lihatPekerjaan(<?=$this->session->userdata('karyawan_id')?>)">Tampilkan</button>
                </div>
            </div>
        </div>

        <div class="pd-20 card-box mb-30 collapse collapse-box" id="parent-pekerjaan">
            <div class="clearfix mb-20">
                <div class="row">
                    <div class="col-md-9">
						<h4>Tambah Pekerjaan</h4>
					</div>
					<div class="col-md-3">
						<a href="#parent-pekerjaan" rel="content-y" data-toggle="collapse">
							<button type="button" class="close pull-right" id="close-add">×</button>
						</a>
					</div>
                </div>
            </div>
            <div id="tambah-pekerjaan">
                <form action="<?= base_url() ?>karyawan/insert_pekerjaan" method="post">
                    <div id="div-header" class="col-md-12 row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Pekerjaan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Status</label>
                            </div>
                        </div> 
                    </div>
                    <div id="input-pekerjaan" class="col-md-12 row">
                        <div class="col-md-8">
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <select name="status_pekerjaan" id="status_pekerjaan" class="form-control custom-select">
                                <option value="1">Menunggu Dikerjakan</option>
                                <option value="2">Sedang Dikerjakan</option>
                                <option value="3">Selesai</option>
                            </select>
                        </div>
                        <div class="col-md-6 offset-6 pt-20">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#parent-pekerjaan" rel="content-y" data-toggle="collapse">
                                        <button class="btn btn-block btn-secondary pull-right" type="button">Batal</button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-block btn-success pull-right" type="submit" id="button-edit-kriteria">Simpan</button>
                                    <button type="submit" id="submit-edit-kriteria" style="display: none;"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="pd-20 card-box mb-30" id="current-month">
            <div class="clearfix mb-20">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Daftar Pekerjaan</h4>
						<p>Bulan: <?=date("F Y", mktime(0, 0, 0, date('m'), 10));?></p>
                    </div>
                    <div class="col-md-3">
                        <a href="#parent-pekerjaan" rel="content-y" data-toggle="collapse">
                            <button class="btn btn-primary pull-right">Tambah Pekerjaan</button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($works as $work) :?>
                                <tr>
                                    <td width="5%"><?= $i ?></td>
                                    <td><?= $work['description'] ?></td>
                                    <td width="25%">
                                        <select name="" id="status<?=$i?>" class="form-control custom-select" onchange="updateStatus(<?=$work['id']?>, <?=$i?>)">
                                            <option value="1" <?php if($work['status']==1) echo 'selected' ?>>Menunggu Dikerjakan</option>
                                            <option value="2" <?php if($work['status']==2) echo 'selected' ?>>Sedang Dikerjakan</option>
                                            <option value="3" <?php if($work['status']==3) echo 'selected' ?>>Selesai</option>
                                        </select>
                                    </td>
                                    <td width="10%">
                                        <form action="<?= base_url() ?>karyawan/delete_pekerjaan" method="post">
                                            <input type="hidden" name="id_pekerjaan" value="<?= $work['id'] ?>">
                                            <button type="submit" class="btn btn-danger btn-block">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30" id="past-month" style="display: none;">
            <div class="clearfix mb-20">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Daftar Pekerjaan</h4>
						<p id="p-past-month">Bulan: </p>
                    </div>
                    <!-- <div class="col-md-3">
                        <a href="#parent-pekerjaan" rel="content-y" data-toggle="collapse">
                            <button class="btn btn-primary pull-right">Tambah Pekerjaan</button>
                        </a>
                    </div> -->
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
                        <tbody id="body-past-month"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>