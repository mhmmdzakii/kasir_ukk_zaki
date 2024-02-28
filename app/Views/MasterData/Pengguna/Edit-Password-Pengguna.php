<?= $this->extend('Dashboard');?>
<?= $this->section('Konten');?>
<?=isset($introText) ? $introText : null;?>



<?php
if(session()->getFlashData('error')){
?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?= session()->getFlashData('error') ?>
		
	</div>
<?php
}
?>
<form method="post" action="<?=site_url('update-password-pengguna');?>">
                <div class="row mb-3">
                  <label for="nama" class="col-sm-3 col-form-label">Nama Pengguna</label>
                  <div class="col-sm-7">

                  <input type="text" class="form-control" id="nama" value="<?=$user[0]['nama'];?>" name="id_pengguna" readonly>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="id_pengguna" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-7">
                  <input type="password" name="password_baru" required="" class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="id_pengguna" class="col-sm-3 col-form-label">Ulangi Password</label>
                  <div class="col-sm-7">
                  <input type="password" name="repassword" required="" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary">Reset Password</button>
                  </div>
                </div>
    
</form>


 <?= $this->endSection();?>