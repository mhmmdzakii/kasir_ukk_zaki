<?php

namespace App\Models;

use CodeIgniter\Model;

class Mproduk extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_produk','kode_produk','nama_produk','harga_beli','harga_jual','id_satuan','id_kategori','stok'];

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

    public function getAllProduk(){
        $produk= new Mproduk;
        $produk->select('produk.id_produk, produk.kode_produk, produk.nama_produk, produk.harga_beli, produk.harga_jual,
        satuan.nama_satuan, kategori.nama_kategori, produk.stok');
        $produk->join('satuan' , 'satuan.id_satuan=produk.id_satuan');
        $produk->join('kategori' , 'kategori.id_kategori=produk.id_kategori');
        $produk->orderBy('produk.id_produk','DEST');
        return $produk->findAll();
    }

    public function getProduk(){
        $produk= NEW MProduk;
        $queryproduk=$produk->query("CALL lihat_produk()")->getResult();
        return $queryproduk;
        }


        
}
