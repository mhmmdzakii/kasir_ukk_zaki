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

<form method="POST" action="<?=site_url('simpan-produk');?>">
                <div class="row mb-3">
                  <label for="id_pengguna" class="col-sm-3 col-form-label">Kode Produk</label>
                  <div class="col-sm-7">
                  <input type="hidden" class="form-control" id="id_produk" name="id_produk" placeholder="">
                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukkan Kode Produk">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-3 col-form-label">Nama Produk</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan nama produk">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-3 col-form-label">Nama Satuan</label>
                  <div class="col-sm-7">
                  <select class="form-control" id="inputJenis" name="id_satuan">
                  <option value="">pilih Satuan</option>
            <?php

            if (isset($satuan)) {
              $no = null;
              foreach ($satuan as $baris) {
                $no++;

                echo '<option value="' . $baris['id_satuan'] . '">' . $baris['nama_satuan'] . '</option>';
              }
            }

            ?>
          </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-sm-3 col-form-label">Nama Kategori</label>
                  <div class="col-sm-7">
                  <select class="form-control" id="inputJenis" name="id_kategori">
                  <option value="">pilih Kategori</option>
            <?php

            if (isset($kategori)) {
              $no = null;
              foreach ($kategori as $baris) {
                $no++;

                echo '<option value="' . $baris['id_kategori'] . '">' . $baris['nama_kategori'] . '</option>';
              }
            }

            ?>
          </select>
                  </div>
                </div>

              

                <div class="row mb-3">
                  <label for="" class="col-sm-3 col-form-label">Harga Beli</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control uang" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-3 col-form-label">harga Jual</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control uang" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual">
                  </div>
                </div>

                
                
                

                <div class="row mb-3">
        <label for="" class="col-sm col-form-label">Stok</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" id="stok" name="stok" required name="stok" placeholder="Masukan Jumlah Stok">
        </div>
      </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Simpan Data</label>
                  <div class="col-sm-7">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

<?= $this->endSection();?>
