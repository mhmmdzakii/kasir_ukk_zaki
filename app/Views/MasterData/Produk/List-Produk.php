<?= $this->extend('Dashboard');?>
<?= $this->section('Konten');?>
<?=isset($introText) ? $introText : null;?>

<?php
if(session()->getFlashdata('hapus')){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<i class="bi bi-info-circle me-1"></i>
    <?= (session()->getFlashdata('hapus'));?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php }?>

<?php
if(session()->getFlashdata('edit')){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<i class="bi bi-check-circle me-1"></i>
    <?= (session()->getFlashdata('edit'));?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php }?>

<?php
if(session()->getFlashdata('tambah')){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<i class="bi bi-check-circle me-1"></i>
    <?= (session()->getFlashdata('tambah'));?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php }?>


<a href="<?=site_url('tambah-produk');?>" class="btn btn-primary">Tambah</a>
<div class="p-3">
<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode produk</th>
            <th>nama Produk</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Nama  Satuan</th>
            <th>Nama kategori</th>
            <th>Stok</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($ListProduk)){
            $no = null;
            foreach($ListProduk as $baris){
                $no++;
                ?>
                <tr>
                    <td scope="row"><?=$no;?></td>
                    <td><?=$baris['kode_produk'];?></td>
                    <td><?=$baris['nama_produk'];?></td>
                    <td><?=$baris['harga_beli'];?></td>
                    <td><?=$baris['harga_jual'];?></td>
                    <td><?=$baris['nama_satuan'];?></td>
                    <td><?=$baris['nama_kategori'];?></td>
                    <td><?=$baris['stok'];?></td>
                    <td>
                        <a href="<?= site_url('/edit-produk/'.$baris['id_produk']);?>" title="edit"><i class="bi bi-pencil-square"></i></a>
                        <a href="<?= site_url('/hapus-produk/'.$baris['id_produk']);?>" title="hapus"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
</div>

<?= $this->endSection();?>