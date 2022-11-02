<?php 

namespace App\Models;

use CodeIgniter\Model;

class UsersAdminModel extends Model 
{
    
    public function AllData($tipe_user,$id) {
        if ($id===null) {
            return $this->db->table('user')->select('user.*, users.username, users.email, users.password_hash,users.last_login,users.active,users.id')->join('users','users.username=user.username')->where('user.tipe_user',$tipe_user)->limit(200)->get()->getResultArray();
        }
        return $this->db->table('user')->select('user.*, users.username, users.email, users.password_hash,users.last_login,users.active,users.id')->join('users','users.username=user.username')->where('user.idCardUser',$id)->limit(200)->get()->getResultArray();
    }

    public function AllDataByIdCardUser($id) {
        return $this->db->table('user')->select('user.*, users.username, users.email, users.password_hash,users.last_login,users.active,users.id')->join('users','users.username=user.username')->where('user.idCardUser',$id)->limit(200)->get()->getResultArray();
    }

    public function SearchData($tipe_user,$getinput) {
        $arry = array();
        foreach($getinput as $dt=>$val) {
            if($val !== '' and $dt !== 'csrf_test_name') {
                if($dt === 'nim' or $dt === 'username' or $dt === 'nik' or $dt === 'nip' or $dt === 'nidn' or $dt === 'tipe_user' or $dt === 'nama') {
                    $dt = 'user.'.$dt;
                    $arry[$dt] = $val;
                } else if ($dt === 'tanggaldibuat') {
                    $dt = 'user.created_at';
                    $arry[$dt] = $val;
                } else if ($dt === 'status' and $val==='Active') {
                    $dt = 'users.active';
                    $arry[$dt] = 1;
                } else if ($dt === 'status' and $val==='Deleted') {
                    $dt = 'users.active';
                    $arry[$dt] = 0;
                } else if ($dt === 'updated_at') {
                    $dt = 'user.updated_at';
                    $arry[$dt] = explode(' ',$val)[0];
                } else {
                    $dt = 'users.'.$dt;
                    $arry[$dt] = $val;
                }
            }
        }
        return $this->db->table('user')->select('user.*, users.password_hash,users.email,users.last_login,users.active,users.id')->join('users','users.username=user.username')->where('user.tipe_user',$tipe_user)->like($arry)->limit(200)->get()->getResultArray();
    }

    public function AllDataByBulan($tipe_user,$bulan) {
        $getinputtahun = (int) explode('-',$bulan)[0];
        $getinputbulan = (int) explode('-',$bulan)[1];
        return $this->db->query("select user.*, users.username, users.email,user.nama,users.password_hash,users.last_login,users.active,users.id from user left join users on users.username=user.username where user.tipe_user=$tipe_user and YEAR(user.created_at)=$getinputtahun AND MONTH(user.created_at)=$getinputbulan")->getResultArray();
    }

    public function GetSemuaUser() {
        return $this->db->table('user')->selectCount('username','username')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserMahasiswa() {
        return $this->db->table('user')->selectCount('username','username')->where('tipe_user','Mahasiswa')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserMahasiswaDeleted() {
        return $this->db->table('users')->selectCount('users.username','username')->join('user','users.username=user.username')->where('id >=',9)->where('active',0)->where('user.tipe_user','Mahasiswa')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserMahasiswaAktif() {
        return $this->db->table('users')->selectCount('users.username','username')->join('user','users.username=user.username')->where('id >=',9)->where('active',1)->where('user.tipe_user','Mahasiswa')->get()->getResultArray()[0]['username'];
    }
    
    public function GetSemuaUserDosen() {
        return $this->db->table('user')->selectCount('username','username')->where('tipe_user','Dosen')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserDosenDeleted() {
        return $this->db->table('users')->selectCount('users.username','username')->join('user','users.username=user.username')->where('id >=',9)->where('active',0)->where('user.tipe_user','Dosen')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserDosenAktif() {
        return $this->db->table('users')->selectCount('users.username','username')->join('user','users.username=user.username')->where('id >=',9)->where('active',1)->where('user.tipe_user','Dosen')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserStaff() {
        return $this->db->table('user')->selectCount('username','username')->where('tipe_user','Staff')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserStaffDeleted() {
        return $this->db->table('users')->selectCount('users.username','username')->join('user','users.username=user.username')->where('id >=',9)->where('active',0)->where('user.tipe_user','Staff')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserStaffAktif() {
        return $this->db->table('users')->selectCount('users.username','username')->join('user','users.username=user.username')->where('id >=',9)->where('active',1)->where('user.tipe_user','Staff')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserTamu() {
        return $this->db->table('user')->selectCount('username','username')->where('tipe_user','Tamu')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserTamuDeleted() {
        return $this->db->table('users')->selectCount('users.username','username')->join('user','users.username=user.username')->where('id >=',9)->where('active',0)->where('user.tipe_user','Tamu')->get()->getResultArray()[0]['username'];
    }

    public function GetSemuaUserTamuAktif() {
        return $this->db->table('users')->selectCount('users.username','username')->join('user','users.username=user.username')->where('id >=',9)->where('active',1)->where('user.tipe_user','Tamu')->get()->getResultArray()[0]['username'];
    }
    public function ValidationUsernameUploadImage($username) {
        return $this->db->table('user')->select('*')->where('username',$username)->get()->getResultArray();
    }
}