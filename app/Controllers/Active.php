<?php

namespace App\Controllers;

class Active extends BaseController
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
            'active'  => 1,
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => null
        ];
        $datauser = [
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => null
        ];
        $this->tbUsers->where('username',$username);
        $this->tbUsers->update($datausers);
        $this->tbUser->where('username',$username);
        $this->tbUser->update($datauser);
        session()->setFlashdata('actived','Data '. $username. ' Berhasil Diaktifkan');
        return redirect()->to('/admin/users/mahasiswa');
    }

    public function dosen($username)
    {
        $datausers = [
            'active'  => 1,
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => null
        ];
        $datauser = [
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => null
        ];
        $this->tbUsers->where('username',$username);
        $this->tbUsers->update($datausers);
        $this->tbUser->where('username',$username);
        $this->tbUser->update($datauser);
        session()->setFlashdata('actived','Data '. $username. ' Berhasil Diaktifkan');
        return redirect()->to('/admin/users/dosen');
    }

    public function staff($username)
    {
        $datausers = [
            'active'  => 1,
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => null
        ];
        $datauser = [
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => null
        ];
        $this->tbUsers->where('username',$username);
        $this->tbUsers->update($datausers);
        $this->tbUser->where('username',$username);
        $this->tbUser->update($datauser);
        session()->setFlashdata('actived','Data '. $username. ' Berhasil Diaktifkan');
        return redirect()->to('/admin/users/staff');
    }

    public function tamu($username)
    {
        $datausers = [
            'active'  => 1,
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => null
        ];
        $datauser = [
            'updated_at' => date("Y-m-d H:i:s"),
            'deleted_at' => null
        ];
        $this->tbUsers->where('username',$username);
        $this->tbUsers->update($datausers);
        $this->tbUser->where('username',$username);
        $this->tbUser->update($datauser);
        session()->setFlashdata('actived','Data '. $username. ' Berhasil Diaktifkan');
        return redirect()->to('/admin/users/tamu');
    }
}
