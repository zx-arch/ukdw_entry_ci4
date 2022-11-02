<?php

namespace App\Controllers;
use App\Models\UsersAdminModel;

class UserBelumAdaKartu extends BaseController
{
    public function __construct() {
        $this->UsersAdminModel = new UsersAdminModel();
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index($id=null)
    {
        d($id);
        if ($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->UsersAdminModel->AllData('Mahasiswa');
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->UsersAdminModel->AllDataByBulan('Mahasiswa',$this->request->getVar('bulan'));
        } else {
            $mydata = $this->UsersAdminModel->SearchData('Mahasiswa',$this->request->getVar());
        }
        return view('dashboard_admin/userbelumadakartu',["inputnim" => $this->request->getVar('nim'), "inputusername" => $this->request->getVar('username'), "inputemail" => $this->request->getVar('email'), "inputtanggaldibuat" => $this->request->getVar('tanggaldibuat'), "inputnama" => $this->request->getVar('nama'), "inputupdated_at" => $this->request->getVar('updated_at'), "inputjamdibuat" => $this->request->getVar('jamdibuat'), "inputbulan" => $this->request->getVar('bulan'), "inputstatus" => $this->request->getVar('status'), "inputtipe_user" => $this->request->getVar('tipe_user'), "inputlast_login" => $this->request->getVar('last_login'), "title" => "Users","data_users" => $mydata, "semuauser" => $this->UsersAdminModel->GetSemuaUser(), 'semuausermahasiswa' => $this->UsersAdminModel->GetSemuaUserMahasiswa(), 'semuausermahasiswadeleted' => $this->UsersAdminModel->GetSemuaUserMahasiswaDeleted(), 'semuausermahasiswaaktif' => $this->UsersAdminModel->GetSemuaUserMahasiswaAktif()]);
    }
    public function detailuser($id) {
        d($id);
    }
}
