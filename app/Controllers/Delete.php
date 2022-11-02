<?php

namespace App\Controllers;

class Delete extends BaseController
{
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->tbUsers = $this->db->table('users');
        $this->tbUser = $this->db->table('user');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function mahasiswa($username)
    {
        $datausers = [
            'active'  => 0,
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => date("Y-m-d H:i:s")
        ];
        $datauser = [
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => date("Y-m-d H:i:s")
        ];
        $this->tbUsers->where('username',$username);
        $this->tbUsers->update($datausers);
        $this->tbUser->where('username',$username);
        $this->tbUser->update($datauser);
        session()->setFlashdata('deleted','Data '. $username. ' Berhasil Dihapus');
        return redirect()->to('/admin/users/mahasiswa');
    }

    public function dosen($username)
    {
        $datausers = [
            'active'  => 0,
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => date("Y-m-d H:i:s")
        ];
        $datauser = [
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => date("Y-m-d H:i:s")
        ];
        $this->tbUsers->where('username',$username);
        $this->tbUsers->update($datausers);
        $this->tbUser->where('username',$username);
        $this->tbUser->update($datauser);
        session()->setFlashdata('deleted','Data '. $username. ' Berhasil Dihapus');
        return redirect()->to('/admin/users/dosen');
    }
    
    public function staff($username)
    {
        $datausers = [
            'active'  => 0,
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => date("Y-m-d H:i:s")
        ];
        $datauser = [
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => date("Y-m-d H:i:s")
        ];
        $this->tbUsers->where('username',$username);
        $this->tbUsers->update($datausers);
        $this->tbUser->where('username',$username);
        $this->tbUser->update($datauser);
        session()->setFlashdata('deleted','Data '. $username. ' Berhasil Dihapus');
        return redirect()->to('/admin/users/staff');
    }

    public function tamu($username)
    {
        $datausers = [
            'active'  => 0,
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => date("Y-m-d H:i:s")
        ];
        $datauser = [
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => date("Y-m-d H:i:s")
        ];
        $this->tbUsers->where('username',$username);
        $this->tbUsers->update($datausers);
        $this->tbUser->where('username',$username);
        $this->tbUser->update($datauser);
        session()->setFlashdata('deleted','Data '. $username. ' Berhasil Dihapus');
        return redirect()->to('/admin/users/tamu');
    }
}
