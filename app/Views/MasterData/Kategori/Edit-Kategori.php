<?= $this->extend('Dashboard');?>
<?= $this->section('Konten');?>
<?=isset($introText) ? $introText : null;?>

<?php if (session()->has('errors')) : ?>
 <div class="alert alert-danger" role="alert">
 <i class="bi bi-exclamation-triangle me-1"></i>
  <?php foreach (session('errors') as $error) : ?>
    
      <?= $error; ?>
    
    <?php endforeach; ?>
 </div>
 <?php endif; ?>

 <!-- Vertical Form -->
 <form class="row g-3" method="POST"  action="<?=site_url('update-kategori');?>" >
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Nama Kategori</label>
                  <input type="hidden" class="form-control" id="hidden" name="id_kategori" value="<?=$ListKategori[0]['id_kategori'];?>">
                  <input type="text" class="form-control" id="inputText" name="nama_kategori" value="<?=$ListKategori[0]['nama_kategori'];?>">
                </div> 
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->


<?= $this->endSection();?>