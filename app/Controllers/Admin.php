<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function dashboardAdmin()
    {
        $data = [
            'akses' => session()->get('level')
        ];
        return view('Dashboard', $data);
    }
}
