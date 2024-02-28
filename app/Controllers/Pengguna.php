<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengguna extends BaseController
{
    public function index()
    {
        //
    }
    public function login(){
        {
            $validasiForm=[
                'nama'=>'required',
                'password'=>'required'
            ];
    
            if($this->validate($validasiForm)){
                $nama=$this->request->getPost('nama');
                $password=md5($this->request->getPost('password'));
    
                $whereLogin=[
                    'nama'=>$nama,
          
                ];
    
                $cekLogin = $this->pengguna->where($whereLogin)->findAll(); 
               if (count($cekLogin)==1) {
                    $dataSession = [
                        'id_pengguna'=>$cekLogin[0]['id_pengguna'],
                        'password'=>$cekLogin[0]['password'],
                        'nama'=>$cekLogin[0]['nama'],
                        'level'=>$cekLogin[0]['level'],
                        'sudahkahLogin'=>true
                    ];
    
                    session()->set($dataSession);
                    return redirect()->to('/halaman-admin');
                    
                } else {
                    return redirect()->to('/')->with('pesan', '<p class="text-danger text-center">
                    Gagal Login! <br> Periksa Nama atau Password!</p>');
                }
            }
    
            return view('/login');
             }
            }
    public function TampilPengguna(){
        $data =[
            'introText'=>'<p>Berikut adalah data pengguna, silahkan tambahkan data baru pad haaman ini</p>',
            'judulHalaman'=> 'Data Pengguna',
            'ListPengguna' => $this->pengguna->findAll()
        ];

        return view('MasterData/Pengguna/List-Pengguna',$data);
    }

    public function TambahPengguna(){
        return view('MasterData/Pengguna/Tambah-Pengguna');
    }

    public function SimpanPengguna(){

        $id = $this->request->getvar('id_pengguna');

        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama' => 'required|is_unique[pengguna.nama,id_pengguna,'.$id .']',
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama pengguna tidak boleh Kosong!!',
                'is_unique' => 'Nama pengguna sudah Ada!!',
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
            'id_pengguna'=>$this->request->getVar('id_pengguna'),
            'nama'=>$this->request->getVar('nama'),
            'password'=>$this->request->getVar('password'),
            'level'=>$this->request->getVar('level'),
        ];
        $this->pengguna->save($data);
        session()->setFlashdata('tambah','pengguna Berhasil Di Tambah');
        return redirect()->to('ListPengguna');
    }

    public function editPengguna($idPengguna){

        $syarat=[
            'id_pengguna'=>$idPengguna
        ];

        $data=[
           
            'introText'=>'<p>Silahkan masukan data pengguna pada form dibawa ini.</p>',
            'judulHalaman'=>'Form  Edit Data Pengguna',
            'user'=>$this->pengguna->where($syarat)->findAll()
            ];
                
        
        return view('MasterData/Pengguna/Edit-pengguna',$data);
    }


    public function UpdatePengguna(){
        $id = $this->request->getvar('id_pengguna');

        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama' => 'required|is_unique[pengguna.nama,id_pengguna,'.$id .']',
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama pengguna tidak boleh Kosong!!',
                'is_unique' => 'Nama pengguna sudah Ada!!',
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
            'id_pengguna'=>$this->request->getVar('id_pengguna'),
            'nama'=>$this->request->getVar('nama'),
            'level'=>$this->request->getVar('level') 
        ];
        //var_dump($data);
        $this->pengguna->update($this->request->getVar('id_pengguna'),$data);
        session()->setFlashdata('edit','Pengguna berhasil diupdate');
        return redirect()->to('ListPengguna');


    }

    public function editpassPengguna($id_pengguna){

        $syarat=[
            'id_pengguna'=>$id_pengguna
        ];

        $data=[
           
            'user'=>$this->pengguna->where($syarat)->findAll()
            ];
                
        return view('MasterData/Pengguna/Edit-Password-Pengguna',$data);
    }

    public function HapusPengguna($idPengguna){
        $syarat=[
            'id_pengguna'=>$idPengguna
        ];
        $this->pengguna->where($syarat)->delete();
        session()->setFlashdata('hapus','pengguna berhasil dihapus');
        return redirect()->to('ListPengguna');
    }

    public function updatepassPengguna(){
       var_dump($_POST);
       $validation = [
        'password_baru'=>'required',
        'repassword'=>'required|matches[password_baru]'
       ];
       if(!$this->validate($validation)){
        return redirect()->back()->with('passerror','Password tidak sinkron!');
       }
       $data=[
        'id_pengguna'=>$this->request->getVar('id_pengguna'),
        'password'=>$this->request->getVar('password_baru'),
       ];
       $this->pengguna->updatePassword($data);
       session()->setFlashdata('updatePass','Password berhasil di ubah');
       return redirect()->to('ListPengguna');
   
}

}
