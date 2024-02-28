<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function index()
    {
        //
    }
    public function TampilKategori(){

        
        $data =[
            'introText'=>'<p>Berikut adalah data pengguna, silahkan tambahkan data baru pada haaman ini</p>',
            'judulHalaman'=> 'Data Kategori',
            'ListKategori'=> $this-> kategori->findAll()
        
        ];

        

        return view('MasterData/Kategori/List-Kategori',$data);
        
    }
    
    public function TambahKategori(){
        return view('MasterData/Kategori/Tambah-Kategori');
    }

    public function SimpanKategori(){
        $id = $this->request->getvar('id_kategori');

        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama_kategori' => 'required|is_unique[kategori.nama_kategori,id_kategori,'.$id .']',
        ];

        $messages = [
            'nama_kategori' => [
                'required' => 'Nama kategori tidak boleh Kosong!!',
                'is_unique' => 'Nama kategori sudah Ada!!',
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
            'nama_kategori'=>$this->request->getVar('nama_kategori'),
        ];
        $this->kategori->save($data);
        session()->setFlashdata('pesan','Kategori Berhasil Di Tambah');
        session()->setFlashdata('simpan','Data berhasil disimpan');
        return redirect()->to('ListKategori');
    }

    public function editKategori($idKategori){
        $syarat=[
            'id_kategori'=>$idKategori
        ];
        $data=[
            'introText'=>'<p>Berikut adalah data pengguna, silahkan tambahkan data baru pada haaman ini</p>',
            'judulHalaman'=> 'Data Kategori',
            'ListKategori'=> $this-> kategori->where($syarat)->findAll()
        ];
        return view('MasterData/Kategori/Edit-kategori',$data);
    }

    public function UpdateKategori(){
        $id = $this->request->getvar('id_kategori');

        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama_kategori' => 'required|is_unique[kategori.nama_kategori,id_kategori,'.$id .']',
        ];

        $messages = [
            'nama_kategori' => [
                'required' => 'Nama kategori tidak boleh Kosong!!',
                'is_unique' => 'Nama kategori sudah Ada!!',
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
            'id_kategori'=>$this->request->getVar('id_kategori'),
            'nama_kategori'=>$this->request->getVar('nama_kategori'),
        ];

        $this->kategori->update($this->request->getVar('id_kategori'),$data);
        session()->setFlashdata('update','Data berhasil diupdate');
        return redirect()->to('ListKategori');
    }

    public function HapusKategori($idKategori){
        $syarat=[
            'id_kategori'=>$idKategori
        ];
        $this->kategori->where($syarat)->delete();
        session()->setFlashdata('hapus','Data berhasil dihapus');
        return redirect()->to('ListKategori');
    }
}
