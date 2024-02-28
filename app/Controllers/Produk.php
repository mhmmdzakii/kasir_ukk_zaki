<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function index()
    {
        //
    }
    public function TampilProduk(){
        
        $data =[
            'introText'=>'<p>Berikut adalah data Produk, silahkan tambahkan data baru pad haaman ini</p>',
            'judulHalaman'=> 'Data Produk',
            'ListProduk' => $this->produk->getAllProduk()
        ];

        return view('MasterData/Produk/List-Produk',$data);
    }

    public function tambahProduk()
	{
		$data = [
			'validation'=>\Config\Services::validation(),
            'kategori'=>$this->kategori->findAll(),
            'satuan'=>$this->satuan->findAll()
		];


		return view('MasterData/Produk/Tambah-Produk', $data);
	}

    public function simpanProduk(){ 
        $id = $this->request->getvar('id_produk');

        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama_produk' => 'required|is_unique[produk.nama_produk,id_produk,'.$id .']',
            'kode_produk' => 'required|is_unique[produk.kode_produk,id_produk,'.$id .']',
        ];
        $messages = [
            'nama_produk' => [
                'required' => 'Nama produk tidak boleh Kosong!!',
                'is_unique' => 'Nama produk sudah Ada!!',
            ],
            'kode_produk' => [
                'required' => 'Kode produk tidak boleh Kosong!!',
                'is_unique' => 'Kode produk sudah Ada!!',
            ],
        ];

        //set validasi
        $validation->setRules($rules, $messages);

        //cek Validasi gagal
        if (!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        //end Validasi
        
		$data=[
			'kode_produk' =>$this->request->getVar('kode_produk'),
			'nama_produk' =>$this->request->getVar('nama_produk'),
			'harga_beli' =>str_replace('.','',$this->request->getVar('harga_beli')),
			'harga_jual' =>str_replace('.','',$this->request->getVar('harga_jual')),
            'id_satuan' =>$this->request->getVar('id_satuan'),
            'id_kategori' =>$this->request->getVar('id_kategori'),
			'stok' =>$this->request->getVar('stok')
		 ];
// var_dump($data);

		 $this->produk->save($data);
         session()->setFlashdata('tambah','Produk berhasil ditambah');
		 return redirect()->to('ListProduk');
	}

    public function editProduk($idProduk){
        $syarat=[
            'id_produk'=>$idProduk
        ];
        $data=[
            'introText'=>'<p>Berikut adalah data produk, silahkan edit data produk pada halaman ini</p>',
            'judulHalaman'=> 'Data Produk',
            'detailProduk'=> $this-> produk->where($syarat)->findAll(),
            'kategori'=>$this->kategori->findAll(),
            'satuan'=>$this->satuan->findAll(),
        ];
        return view('MasterData/Produk/Edit-Produk',$data);
    }

    public function updateProduk()
	{
        $id = $this->request->getvar('id_produk');

        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama_produk' => 'required|is_unique[produk.nama_produk,id_produk,'.$id .']',
            'kode_produk' => 'required|is_unique[produk.kode_produk,id_produk,'.$id .']',
        ];

        $messages = [
            'nama_produk' => [
                'required' => 'Nama produk tidak boleh Kosong!!',
                'is_unique' => 'Nama produk sudah Ada!!',
            ],
            'kode_produk' => [
                'required' => 'Kode produk tidak boleh Kosong!!',
                'is_unique' => 'Kode produk sudah Ada!!',
            ],
        ];

        //set validasi
        $validation->setRules($rules, $messages);

        //cek Validasi gagal
        if (!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        //end Validasi
		
		$data = [
			'kode_produk' =>$this->request->getVar('kode_produk'),
			'nama_produk' =>$this->request->getVar('nama_produk'),
			'harga_beli' =>$this->request->getVar('harga_beli'),
            'harga_jual' =>$this->request->getVar('harga_jual'),
            'id_satuan' =>$this->request->getVar('id_satuan'),
            'id_kategori' =>$this->request->getVar('id_kategori'),
			'stok' =>$this->request->getVar('stok')
		];
		//var_dump($data);

		$this->produk->update($this->request->getVar('id_produk'),$data);
        session()->setFlashdata('edit','Produk berhasil diedit');
		return redirect()->to('ListProduk');
	}

    public function HapusProduk($idProduk){
        $syarat=[
            'id_produk'=>$idProduk
        ];
        $this->produk->where($syarat)->delete();
        session()->setFlashdata('hapus','Produk berhasil dihapus');
        return redirect()->to('ListProduk');
    }

    
}
