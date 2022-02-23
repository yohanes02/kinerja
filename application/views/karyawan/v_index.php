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
        <div class="pd-20 card-box mb-30" id="parent-add">
            <div class="clearfix mb-20">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Data Profil</h4>
                    </div>
                </div>
            </div>
            <div>
                <input type="hidden" name="karyawan_id" value="<?= $employee['id'] ?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nama Awal</label>
                            <input type="text" disabled class="form-control" name="first_name" value="<?= $employee['first_name'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nama Akhir</label>
                            <input type="text" disabled class="form-control" name="last_name" value="<?= $employee['last_name'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" disabled class="form-control" name="email" value="<?= $employee['email'] ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" disabled class="form-control" name="birth_place" value="<?= $employee['birth_place'] ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="text" disabled class="form-control date-picker" name="birth_date" value="<?= $employee['birth_date'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" disabled class="form-control" name="jenis_kelamin" value="<?= $employee['jk'] ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Departemen</label>
                            <input type="text" disabled class="form-control" name="department" value="<?= $employee['departemen_name'] ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Gaji</label>
                            <input type="text" disabled class="form-control" name="fee" value="<?= $employee['fee'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Bergabung</label>
                            <input type="text" disabled class="form-control date-picker" name="join_date" value="<?= $employee['join_date'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea disabled class="form-control" name="address" id="address" cols="30" rows="10"><?= $employee['address'] ?></textarea>
                        </div>
                    </div>
                    <!-- <div class="col-md-12" style="padding-bottom: 10px;">
                        <h4>Aksi</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-block btn-success pull-right" type="submit">Ubah Password</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <span style="font-weight: bold;">Info: </span>
                        <span>Password default yaitu tanggal lahir dengan format yyyymmdd</span>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>