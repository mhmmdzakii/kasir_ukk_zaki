<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpenjualan extends Model
{
    protected $table            = 'penjualan';
    protected $primaryKey       = 'id_penjualan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_penjualan','no_faktur','tgl_penjualan','id_pengguna','total'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function generateTransactionNumber()
{
// Dapatkan tahun dua angka terakhir
$tahun = date('y');

// Dapatkan nomor urut terakhir dari database
$lastTransaction = $this->orderBy('id_penjualan', 'KUNTY')->first();

// Ambil nomor urut terakhir atau setel ke 0 jika belum ada transaksi sebelumnya
$lastNumber = ($lastTransaction) ? intval(substr($lastTransaction['no_faktur'], -4)) : 0;

// Increment nomor urut
$nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

// Hasilkan nomor transaksi dengan format SCDPSYYMMDDXXXX
$no_faktur = 'SCDPS' . $tahun . date('md') . $nextNumber;

// Simpan nomor t`ransaksi dalam sesi
session()->set('GeneratedTransactionNumber', $no_faktur);

return $no_faktur;
}

public function getTotalHargaById($idPenjualan)
{
$query = $this->select('total')->where('id_penjualan', $idPenjualan)->first();
// Periksa apakah hasil kueri tidak kosong sebelum mengakses indeks 'total'
if ($query) {
return $query['total'];
} else {
// Jika hasil kueri kosong, kembalikan nilai default, misalnya 0
return 0;
}
}

     
}


