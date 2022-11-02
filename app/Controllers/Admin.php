<?php

namespace App\Controllers;
use App\Models\DashboardAdminModel;
use App\Models\UsersAdminModel;

class Admin extends BaseController
{
    public function __construct() 
    {
        $this->db = \Config\Database::connect();
        $this->tbRooms = $this->db->table('rooms');
        $this->DashboardAdminModel = new DashboardAdminModel();
        $this->UsersAdminModel = new UsersAdminModel();
        date_default_timezone_set("Asia/Jakarta");
        $this->masuk = $this->DashboardAdminModel->GetUserEnterRoom();
    }

    public function dashboardmhs()
    {
        if($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->DashboardAdminModel->AllData('Mahasiswa');
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->DashboardAdminModel->AllDataByBulan('Mahasiswa',$this->request->getVar('bulan'));
        } else {
            $mydata = $this->DashboardAdminModel->SearchData('Mahasiswa',$this->request->getVar());
        }
        
        $ruanganterisi = $this->DashboardAdminModel->GetActivityRoom('masuk','Mahasiswa');
        $ruanganberkurang = $this->DashboardAdminModel->GetActivityRoom('keluar','Mahasiswa');
        $usermasuk =  $this->DashboardAdminModel->GetEntryActivityUserNow();
        if ($ruanganterisi > 0) {
            foreach ($usermasuk as $usr) {
                $this->tbRooms->set('terisi', 0+$ruanganterisi-$ruanganberkurang);
                $this->tbRooms->where('kode_ruangan', $mydata['entry']);
                $this->tbRooms->update();
                $i++;    
            }
        }

        return view('dashboard_admin/dashboardmhs',["title" => "Dashboard", "active" => "admin","datacardmasuk"=> $mydata,"inputidCard" => $this->request->getVar('idCard'), "inputnim" => $this->request->getVar('nim'), "inputnama" => $this->request->getVar('nama'), "inputusername" => $this->request->getVar('username'), "inputtanggal" => $this->request->getVar('tanggal'), "inputbulan" => $this->request->getVar('bulan'), "inputruangan" => $this->request->getVar('ruangan'), "inputstatus_aktivitas" => $this->request->getVar('status_aktivitas'), "semuausermhsterdaftar" => $this->DashboardAdminModel->GetCountListUsers('Mahasiswa'), "semuausermhskeluar" => $ruanganberkurang, "semuausermhsmasuk" => $ruanganterisi, "semuausermasuk" => $this->DashboardAdminModel->GetEnterUser(),"usermhsbelumterdaftar"=> $this->DashboardAdminModel->GetUserBelumTerdaftar('Mahasiswa')]);
    }
    public function dashboarddosen()
    {
        if($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->DashboardAdminModel->AllData('Dosen');
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->DashboardAdminModel->AllDataByBulan('Dosen',$this->request->getVar('bulan'));
        } else {
            $mydata = $this->DashboardAdminModel->SearchData('Dosen',$this->request->getVar());
        }
        
        $ruanganterisi = $this->DashboardAdminModel->GetActivityRoom('masuk','Dosen');
        $ruanganberkurang = $this->DashboardAdminModel->GetActivityRoom('keluar','Dosen');
        $usermasuk =  $this->DashboardAdminModel->GetEntryActivityUserNow();

        if ($ruanganterisi > 0) {
            $i=0;
            foreach ($usermasuk as $usr) {
                $this->tbRooms->set('terisi', 0+$ruanganterisi-$ruanganberkurang);
                $this->tbRooms->where('kode_ruangan', $mydata[$i]['entry']);
                $this->tbRooms->update();
                $i++;    
            }
        }

        return view('dashboard_admin/dashboarddosen',["title" => "Dashboard", "active" => "admin","datacardmasuk"=> $mydata,"inputidCard" => $this->request->getVar('idCard'), "inputnip" => $this->request->getVar('nip'), "inputnidn"=> $this->request->getVar('nidn'), "inputnama" => $this->request->getVar('nama'), "inputusername" => $this->request->getVar('username'), "inputtanggal" => $this->request->getVar('tanggal'), "inputbulan" => $this->request->getVar('bulan'), "inputruangan" => $this->request->getVar('ruangan'), "inputstatus_aktivitas" => $this->request->getVar('status_aktivitas'), "semuadosenterdaftar" => $this->DashboardAdminModel->GetCountListUsers('Dosen'), "semuadosenkeluar" => $ruanganberkurang, "semuadosenmasuk" => $ruanganterisi, "semuausermasuk" => $this->DashboardAdminModel->GetEnterUser(),"userdosenbelumterdaftar"=> $this->DashboardAdminModel->GetUserBelumTerdaftar('Dosen')]);

    }
    public function dashboardstaff() 
    {
        if($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->DashboardAdminModel->AllData('Staff');
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->DashboardAdminModel->AllDataByBulan('Staff',$this->request->getVar('bulan'));
        } else {
            $mydata = $this->DashboardAdminModel->SearchData('Staff',$this->request->getVar());
        }
        
        $ruanganterisi = $this->DashboardAdminModel->GetActivityRoom('masuk','Staff');
        $ruanganberkurang = $this->DashboardAdminModel->GetActivityRoom('keluar','Staff');
        $usermasuk =  $this->DashboardAdminModel->GetEntryActivityUserNow();
        if ($ruanganterisi > 0) {
            $i=0;
            foreach ($usermasuk as $usr) {
                $this->tbRooms->set('terisi', 0+$ruanganterisi-$ruanganberkurang);
                $this->tbRooms->where('kode_ruangan', $mydata[$i]['entry']);
                $this->tbRooms->update();
                $i++;    
            }
        }

        return view('dashboard_admin/dashboardstaff',["title" => "Dashboard", "active" => "admin","datacardmasuk"=> $mydata ,"inputidCard" => $this->request->getVar('idCard'), "inputnip" => $this->request->getVar('nip'), "inputnik" => $this->request->getVar('nik'),"inputnama" => $this->request->getVar('nama'), "inputusername" => $this->request->getVar('username'), "inputtanggal" => $this->request->getVar('tanggal'), "inputbulan" => $this->request->getVar('bulan'), "inputruangan" => $this->request->getVar('ruangan'), "inputstatus_aktivitas" => $this->request->getVar('status_aktivitas'), "semuastaffterdaftar" => $this->DashboardAdminModel->GetCountListUsers('Staff'), "semuastaffkeluar" => $ruanganberkurang, "semuastaffmasuk" => $ruanganterisi, "semuausermasuk" => $this->DashboardAdminModel->GetEnterUser(),"userstaffbelumterdaftar"=> $this->DashboardAdminModel->GetUserBelumTerdaftar('Staff')]);

    }
    public function dashboardtamu() 
    {
        if($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->DashboardAdminModel->AllData('Tamu');
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->DashboardAdminModel->AllDataByBulan('Tamu',$this->request->getVar('bulan'));
        } else {
            $mydata = $this->DashboardAdminModel->SearchData('Tamu',$this->request->getVar());
        }
        
        $ruanganterisi = $this->DashboardAdminModel->GetActivityRoom('masuk','Tamu');
        $ruanganberkurang = $this->DashboardAdminModel->GetActivityRoom('keluar','Tamu');
        $usermasuk =  $this->DashboardAdminModel->GetEntryActivityUserNow();
        if ($ruanganterisi > 0) {
            $i=0;
            foreach ($usermasuk as $usr) {
                $this->tbRooms->set('terisi', 0+$ruanganterisi-$ruanganberkurang);
                $this->tbRooms->where('kode_ruangan', $mydata[$i]['entry']);
                $this->tbRooms->update();
                $i++;    
            }
        }

        return view('dashboard_admin/dashboardtamu',["title" => "Dashboard", "active" => "admin","datacardmasuk"=> $mydata ,"inputidCard" => $this->request->getVar('idCard'), "inputnik" => $this->request->getVar('nik'), "inputnama" => $this->request->getVar('nama'), "inputusername" => $this->request->getVar('username'), "inputtanggal" => $this->request->getVar('tanggal'), "inputbulan" => $this->request->getVar('bulan'), "inputruangan" => $this->request->getVar('ruangan'), "inputstatus_aktivitas" => $this->request->getVar('status_aktivitas'), "semuatamuterdaftar" => $this->DashboardAdminModel->GetCountListUsers('Tamu'), "semuatamukeluar" => $ruanganberkurang, "semuatamumasuk" => $ruanganterisi, "semuausermasuk" => $this->DashboardAdminModel->GetEnterUser(),"usertamubelumterdaftar"=> $this->DashboardAdminModel->GetUserBelumTerdaftar('Tamu')]);

    }

    public function usersmhs($id=null) 
    {
        if ($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->UsersAdminModel->AllData('Mahasiswa',$id);
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->UsersAdminModel->AllDataByBulan('Mahasiswa',$this->request->getVar('bulan'));
        } else {
            $mydata = $this->UsersAdminModel->SearchData('Mahasiswa',$this->request->getVar());
        }
        return view('dashboard_admin/usersmhs',["inputnim" => $this->request->getVar('nim'), "inputusername" => $this->request->getVar('username'), "inputemail" => $this->request->getVar('email'), "inputtanggaldibuat" => $this->request->getVar('tanggaldibuat'), "inputnama" => $this->request->getVar('nama'), "inputupdated_at" => $this->request->getVar('updated_at'), "inputjamdibuat" => $this->request->getVar('jamdibuat'), "inputbulan" => $this->request->getVar('bulan'), "inputstatus" => $this->request->getVar('status'), "inputtipe_user" => $this->request->getVar('tipe_user'), "inputlast_login" => $this->request->getVar('last_login'), "title" => "Users","data_users" => $mydata, "semuauser" => $this->UsersAdminModel->GetSemuaUser(), 'semuausermahasiswa' => $this->UsersAdminModel->GetSemuaUserMahasiswa(), 'semuausermahasiswadeleted' => $this->UsersAdminModel->GetSemuaUserMahasiswaDeleted(), 'semuausermahasiswaaktif' => $this->UsersAdminModel->GetSemuaUserMahasiswaAktif()]);
    }

    public function usersdosen($id=null) 
    {
        if ($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->UsersAdminModel->AllData('Dosen',$id);
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->UsersAdminModel->AllDataByBulan('Dosen',$this->request->getVar('bulan'));
        } else {
            $mydata = $this->UsersAdminModel->SearchData('Dosen',$this->request->getVar());
        }
        return view('dashboard_admin/usersdosen',["inputnip" => $this->request->getVar('nip'),"inputnidn" => $this->request->getVar('nidn'), "inputusername" => $this->request->getVar('username'), "inputemail" => $this->request->getVar('email'), "inputtanggaldibuat" => $this->request->getVar('tanggaldibuat'), "inputnama" => $this->request->getVar('nama'), "inputupdated_at" => $this->request->getVar('updated_at'), "inputjamdibuat" => $this->request->getVar('jamdibuat'), "inputbulan" => $this->request->getVar('bulan'), "inputstatus" => $this->request->getVar('status'), "inputtipe_user" => $this->request->getVar('tipe_user'), "inputlast_login" => $this->request->getVar('last_login'), "title" => "Users","data_users" => $mydata, "semuauser" => $this->UsersAdminModel->GetSemuaUser(), 'semuauserdosen' => $this->UsersAdminModel->GetSemuaUserDosen(), 'semuauserdosendeleted' => $this->UsersAdminModel->GetSemuaUserDosenDeleted(), 'semuauserdosenaktif' => $this->UsersAdminModel->GetSemuaUserDosenAktif()]);

    }

    public function usersstaff($id=null) 
    {
        if ($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->UsersAdminModel->AllData('Staff',$id);
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->UsersAdminModel->AllDataByBulan('Staff',$this->request->getVar('bulan'));
        } else {
            $mydata = $this->UsersAdminModel->SearchData('Staff',$this->request->getVar());
        }
        return view('dashboard_admin/usersstaff',["inputnip" => $this->request->getVar('nip'),"inputnik" => $this->request->getVar('nik'), "inputusername" => $this->request->getVar('username'), "inputemail" => $this->request->getVar('email'), "inputtanggaldibuat" => $this->request->getVar('tanggaldibuat'), "inputjamdibuat" => $this->request->getVar('jamdibuat'), "inputnama" => $this->request->getVar('nama'), "inputupdated_at" => $this->request->getVar('updated_at'), "inputbulan" => $this->request->getVar('bulan'), "inputstatus" => $this->request->getVar('status'), "inputtipe_user" => $this->request->getVar('tipe_user'), "inputlast_login" => $this->request->getVar('last_login'), "title" => "Users","data_users" => $mydata, "semuauser" => $this->UsersAdminModel->GetSemuaUser(), 'semuauserstaff' => $this->UsersAdminModel->GetSemuaUserStaff(), 'semuauserstaffdeleted' => $this->UsersAdminModel->GetSemuaUserStaffDeleted(), 'semuauserstaffaktif' => $this->UsersAdminModel->GetSemuaUserStaffAktif()]);

    }

    public function userstamu($id=null) 
    {
        if ($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->UsersAdminModel->AllData('Tamu',$id);
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->UsersAdminModel->AllDataByBulan('Tamu',$this->request->getVar('bulan'));
        } else {
            $mydata = $this->UsersAdminModel->SearchData('Tamu',$this->request->getVar());
        }
        return view('dashboard_admin/userstamu',["inputnik" => $this->request->getVar('nik'), "inputusername" => $this->request->getVar('username'), "inputemail" => $this->request->getVar('email'), "inputtanggaldibuat" => $this->request->getVar('tanggaldibuat'), "inputnama" => $this->request->getVar('nama'), "inputupdated_at" => $this->request->getVar('updated_at'), "inputjamdibuat" => $this->request->getVar('jamdibuat'), "inputbulan" => $this->request->getVar('bulan'), "inputstatus" => $this->request->getVar('status'), "inputtipe_user" => $this->request->getVar('tipe_user'), "inputlast_login" => $this->request->getVar('last_login'), "title" => "Users","data_users" => $mydata, "semuauser" => $this->UsersAdminModel->GetSemuaUser(), 'semuausertamu' => $this->UsersAdminModel->GetSemuaUserTamu(), 'semuausertamudeleted' => $this->UsersAdminModel->GetSemuaUserTamuDeleted(), 'semuausertamuaktif' => $this->UsersAdminModel->GetSemuaUserTamuAktif()]);

    }

    public function rooms() 
    {
        $ruanganterisi = $this->DashboardAdminModel->GetAllActivityRoom('masuk');
        $ruanganberkurang = $this->DashboardAdminModel->GetAllActivityRoom('keluar');
        $usermasuk =  $this->DashboardAdminModel->GetEntryActivityUserNow();
        $data['datarooms'] = $this->tbRooms->get()->getResultArray();
        $data['title'] = 'Rooms';
        if ($ruanganterisi==0) {
            $this->tbRooms->set('terisi', 0);
            $this->tbRooms->update();
        } else {
            foreach ($usermasuk as $usr) {
                $this->tbRooms->set('terisi', 0+$ruanganterisi-$ruanganberkurang);
                $this->tbRooms->where('kode_ruangan', $mydata['entry']);
                $this->tbRooms->update();
                $i++;    
            }
        }
        return view('dashboard_admin/rooms', ["title" => $data['title'],"datarooms" => $data['datarooms'], "totallab" => $this->tbRooms->selectCount('nama_ruangan','nama_ruangan')->like('nama_ruangan','lab')->get()->getResultArray()[0]['nama_ruangan'], "totalruangkelas" => $this->tbRooms->selectCount('nama_ruangan','nama_ruangan')->like('nama_ruangan','ruang')->get()->getResultArray()[0]['nama_ruangan'],'kapasitasruanganterbesar' => $this->tbRooms->selectMax('kapasitas_ruangan','kapasitas_ruangan')->get()->getResultArray()[0]['kapasitas_ruangan'], 'kapasitasruanganterkecil' => $this->tbRooms->selectMin('kapasitas_ruangan','kapasitas_ruangan')->get()->getResultArray()[0]['kapasitas_ruangan']]);
    }

    public function komplain() 
    {
        return view('dashboard_admin/komplain',["title" => "Komplain"]);
    }

}
