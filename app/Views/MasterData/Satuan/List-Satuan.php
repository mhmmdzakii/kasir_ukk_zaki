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


<a href="<?=site_url('tambah-satuan-barang');?>" class="btn btn-primary">Tambah</a>
<div class="p-3">
<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Satuan</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($ListSatuan)){
            $no = null;
            foreach($ListSatuan as $baris){
                $no++;
                ?>
                <tr>
                    <td scope="row"><?=$no;?></td>
                    <td><?=$baris['nama_satuan'];?></td>
                    <td>
                        <a href="<?= site_url('/edit-satuan/'.$baris['id_satuan']);?>" title="edit"><i class="bi bi-pencil-square"></i></a>
                        <a href="<?= site_url('/hapus-satuan-barang/'.$baris['id_satuan']);?>" title="hapus"><i class="bi bi-trash-fill"></i></a>
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