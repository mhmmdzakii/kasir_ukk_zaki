<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpengguna extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id_pengguna';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pengguna','nama','password','level'];

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

    public function getPengguna($pengguna, $pass)
    {
        $where = [
            'nama' => $pengguna,
            'password' => md5($pass)
        ];
        $pengguna = new Mpengguna;
        $pengguna->select("pengguna.nama, pengguna.password, pengguna.level");
        $pengguna->where($where);
        return $pengguna->findAll();
    }

    public function getMenuByRole($userRole)
    {
        $query = $this->db->table('pengguna')
        ->where('level', $userRole)
        ->get();

        return $query->getResultArray();
    }

    public function updatePassword($data)
    {
        $pengguna = new Mpengguna;
        $id_pengguna = $data['id_pengguna'];
        $password = $data['password'];
        $pengguna->query("CALL update_password ('$id_pengguna','$password')");
    }
}
