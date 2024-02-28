<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mproduk;

class Laporan extends BaseController
{
   
    public function index()
    {
        return view('MasterData/Laporan/List-Laporan');
    }


    public function tampilLaporan()
    {
        $produk = NEW Mproduk;
        $data =[
            'ListProduk'=>$this->produk->getProduk()
        ];

        // $listProduk = $this->produk->getProduk();

        return view('MasterData/Laporan/list-laporan', $data);
    }
}
