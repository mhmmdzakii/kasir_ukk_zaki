<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function index()
    {
        //
    }
    public function TampilSatuan(){
        $data =[
            'introText'=>'<p>Berikut adalah data pengguna, silahkan tambahkan data baru pada haaman ini</p>',
            'judulHalaman'=> 'Data Satuan',
            'ListSatuan'=> $this-> satuan->findAll()
        ];

        return view('MasterData/Satuan/List-Satuan',$data);
    }

    public function TambahSatuan(){
        return view('MasterData/Satuan/Tambah-Satuan');
    }

    public function SimpanSatuan(){
helper(['form']);
$validation = \config\Services::validation();

$rules = [
    'nama_satuan' => 'required|is_unique[satuan.nama_satuan]'
];

$messages = [
    'nama_satuan' => [
        'required' => 'Nama Satuan tidak boleh Kosong!!',
        'is_unique' => 'Nama satuan sudah Ada!!',
    ],
];

// set validasi
$validation->setRules($rules, $messages);

// cek validasi gagal
if(!$validation->withRequest($this->request)->run()) {
    return redirect()->back()->with('errors',$validation->getErrors());
}


        $data=[
            'nama_satuan'=>$this->request->getVar('nama_satuan'),
        ];
        $this->satuan->save($data);
        session()->setFlashdata('tambah','Data Berhasil Di Tambah');
        return redirect()->to('ListSatuan');
    }

    public function editSatuan($idSatuan){
        $syarat=[
            'id_satuan'=>$idSatuan
        ];
        $data=[
            'introText'=>'<p>Berikut adalah data pengguna, silahkan tambahkan data baru pada haaman ini</p>',
            'judulHalaman'=> 'Data Satuan',
            'ListSatuan'=> $this-> satuan->where($syarat)->findAll()
        ];
        return view('MasterData/Satuan/Edit-satuan',$data);
    }

    public function UpdateSatuan(){

        $id = $this->request->getvar('id_satuan');

        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama_satuan' => 'required|is_unique[satuan.nama_satuan,id_satuan,'.$id .']',
        ];

        $messages = [
            'nama_satuan' => [
                'required' => 'Nama satuan tidak boleh Kosong!!',
                'is_unique' => 'Nama satuan sudah Ada!!',
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
            'id_satuan'=>$this->request->getVar('id_satuan'),
            'nama_satuan'=>$this->request->getVar('nama_satuan'),
        ];

        $this->satuan->update($this->request->getVar('id_satuan'),$data);
        session()->setFlashdata('edit','Data berhasil di edit');
        return redirect()->to('ListSatuan');
    }

    public function HapusSatuan($idSatuan){
        $syarat=[
            'id_satuan'=>$idSatuan
        ];
        $this->satuan->where($syarat)->delete();
        session()->setFlashdata('hapus','Data berhasil di hapus');
        return redirect()->to('ListSatuan');
    }
    


}
