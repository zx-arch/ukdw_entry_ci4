<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {    
        if (in_groups('admin')) {
            return redirect()->to('/admin/dashboard/mahasiswa');
        } else if (in_groups('user')) {
            return redirect()->to('/user/dashboard');
        }
    }
}
