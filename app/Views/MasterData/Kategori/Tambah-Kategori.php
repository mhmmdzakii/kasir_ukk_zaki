<?= $this->extend('Dashboard');?>
<?= $this->section('Konten');?>

<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
<i class="bi bi-exclamation-triangle me-1"></i>
  <?php foreach (session('errors') as $error) : ?>
   
      <?= $error; ?>
    
    <?php endforeach; ?>
 </div>
 <?php endif; ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Kategori</h5>
        <!-- Vertical Form -->
        <form class="row g-3" method="post" action="simpan-kategori">
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="inputNanme4" name="nama_kategori"> 
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form><!-- Vertical Form -->
    </div>
</div>


<?= $this->endSection();?>