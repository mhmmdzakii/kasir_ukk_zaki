<?= $this->extend('Dashboard');?>
<?= $this->section('Konten');?>
<?=isset($introText) ? $introText : null;?>

<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
<i class="bi bi-exclamation-triangle me-1"></i>
  <?php foreach (session('errors') as $error) : ?>
   
      <?= $error; ?>
    
    <?php endforeach; ?>
 </div>
 <?php endif; ?>

<form method="POST" action="<?=site_url('simpan-pengguna');?>">
                <div class="row mb-3">
                  <label for="id_pengguna" class="col-sm-3 col-form-label">nama</label>
                  <div class="col-sm-7">
                  <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna" placeholder="Masukkan nama pengguna">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pengguna">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password pengguna">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Level</label>
                  <div class="col-sm-7">
                    <select class="form-select" id="level" name="level" required>
                      <option value="">pilih jenis level</option>
                      <option value="admin">admin</option>
                      <option value="kasir">kasir</option>
                    </select>
                  </div>
                </div>
                

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Simpan Data</label>
                  <div class="col-sm-7">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
           



              <?= $this->endSection();?>