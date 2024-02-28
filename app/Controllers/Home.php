<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('halaman-login');
    }
   
    

    public function halamanlogin(){
       return view('Dashboard');    
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
