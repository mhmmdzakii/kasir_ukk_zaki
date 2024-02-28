<?= $this->extend('Dashboard');?>
<?= $this->section('Konten');?>

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

<?php
if(session()->getFlashdata('updatePass')){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<i class="bi bi-check-circle me-1"></i>
    <?= (session()->getFlashdata('updatePass'));?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php }?>



<a href="<?=site_url('tambah-pengguna');?>" class="btn btn-primary">Tambah</a>
<div class="p-3">
<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>Level</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($ListPengguna)){
            $no = null;
            foreach($ListPengguna as $baris){
                $no++;
                ?>
                <tr>
                    <td scope="row"><?=$no;?></td>
                    <td><?=$baris['nama'];?></td>
                    <td><?=$baris['level'];?></td>
                    <td>
                        <a href="<?= site_url('/edit-pengguna/'.$baris['id_pengguna']);?>" title="edit"><i class="bi bi-pencil-square"></i></a>
                        <a href="<?= site_url('/hapus-pengguna/'.$baris['id_pengguna']);?>" title="hapus"><i class="bi bi-trash-fill"></i></a>
                        <a href="<?= site_url('/edit-password-pengguna/'.$baris['id_pengguna']);?>" title="edit password"><i class="bi bi-person-fill-lock"></i></i></a>
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