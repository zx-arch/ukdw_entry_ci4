<?php

namespace App\Controllers;
use App\Models\UsersAdminModel;

class UploadFoto extends BaseController
{
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->tbUser = $this->db->table('user');
        date_default_timezone_set("Asia/Jakarta");
        $this->UsersAdminModel = new UsersAdminModel();
    }
    public function index($tipe_user)
    {
        $rules = [
            'gambar' => 'uploaded[gambar]|max_size[gambar,512]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ];

        if (! $this->validate($rules))
        {
            session()->setFlashdata('uploadfotogagal','Terjadi Kesalahan Input Foto, Silakan Coba Lagi');
            return redirect()->to(base_url('/admin/users/'.$tipe_user));
        }
        // ValidationUsernameUploadImage
        $getusername = explode(' / ',$this->request->getVar('user'));
        $filegbr = $this->request->getFile('gambar');
        $filegbr->move('img');
        $nmgbr = $filegbr->getName();
        $dataaddprofil = [
            'updated_at' => date("Y-m-d H:i:s"),
            'foto_profil' => $nmgbr
        ];
        if (! $this->UsersAdminModel->ValidationUsernameUploadImage($getusername[0])) {
            session()->setFlashdata('uploadfotogagal','Terjadi Kesalahan Username Upload Foto, Silakan Coba Lagi');
            return redirect()->to(base_url('/admin/users/'.$tipe_user));
        }
        // // Success!
        $this->tbUser->where('username',$getusername[0]);
        $this->tbUser->update($dataaddprofil);

        session()->setFlashdata('uploadfotosukses','Upload Foto Data '. $getusername[0]. ' Berhasil');
        return redirect()->to(base_url('/admin/users/'.$tipe_user));

    }
}
