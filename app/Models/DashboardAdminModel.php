<?php 

namespace App\Models;

use CodeIgniter\Model;

class DashboardAdminModel extends Model
{
    private $ruanganterisi = 0;
    private $ruanganberkurang = 0;
    private $usermasuk = 0;
    public function AllData($tipe_user) {
        return $this->db->table('aktivitas_user')->select('aktivitas_user.*,user.nik,user.nim,user.nip,user.nidn,user.nama,user.username,user.foto_profil,user.room_access')->join('smartcard','smartcard.idCard=aktivitas_user.idCard')->join('user','user.idCardUser=smartcard.idCardUser')->where('user.tipe_user',$tipe_user)->limit(200)->get()->getResultArray();
    }

    public function AllDataByBulan($tipe_user,$bulan) {
        $getinputtahun = (int) explode('-',$bulan)[0];
        $getinputbulan = (int) explode('-',$bulan)[1];
        return $this->db->query("select aktivitas_user.*,user.nik,user.nim,user.nip,user.nidn,user.nama,user.username,user.foto_profil,user.room_access from aktivitas_user left join smartcard on smartcard.idCard=aktivitas_user.idCard left join user on user.idCardUser=smartcard.idCardUser where user.tipe_user='$tipe_user' and YEAR(aktivitas_user.created_at)='$getinputtahun' AND MONTH(aktivitas_user.created_at)=$getinputbulan")->getResultArray();
    }

    public function SearchData($tipe_user, $getinput) {
        $arry = array();
        foreach($getinput as $dt=>$val) {
            if($val !== '' and $dt !== 'csrf_test_name') {
                if($dt === 'nim' or $dt === 'nama' or $dt === 'nik' or $dt === 'nip' or $dt === 'nidn') {
                    $dt = 'user.'.$dt;
                    $arry[$dt] = $val;
                } else if ($dt === 'tanggal' or $dt === 'bulan') {
                    $dt = 'aktivitas_user.created_at';
                    if ($dt === 'tanggal') {
                        $arry[$dt] = explode(' ',$val)[0];
                    }
                    $arry[$dt] = $val;
                } else {
                    $dt = 'aktivitas_user.'.$dt;
                    $arry[$dt] = $val;
                }
            }
        }
        return $this->db->table('aktivitas_user')->select('aktivitas_user.*,user.nik,user.nim,user.nip,user.nidn,user.nama,user.username,user.foto_profil,user.room_access')->join('smartcard','smartcard.idCard=aktivitas_user.idCard')->join('user','user.idCardUser=smartcard.idCardUser')->where('user.tipe_user',$tipe_user)->like($arry)->limit(200)->get()->getResultArray();
    }
    
    public function GetActivityRoom($status_aktivitas,$tipe_user) {
        return (int) $this->db->query("select count(user.username) as user_$status_aktivitas from user left join smartcard on user.idCardUser=smartcard.idCardUser left join aktivitas_user on aktivitas_user.idCard=smartcard.idCard where DATE(aktivitas_user.created_at)=CURRENT_DATE and status_aktivitas='$status_aktivitas' and user.tipe_user='$tipe_user'")->getResultArray()[0]['user_'.$status_aktivitas];
    }
    public function GetAllActivityRoom($status_aktivitas) {
        return (int) $this->db->query("select count(user.username) as user_$status_aktivitas from user left join smartcard on user.idCardUser=smartcard.idCardUser left join aktivitas_user on aktivitas_user.idCard=smartcard.idCard where DATE(aktivitas_user.created_at)=CURRENT_DATE and status_aktivitas='$status_aktivitas'")->getResultArray()[0]['user_'.$status_aktivitas];
    }

    public function GetEntryActivityUserNow() {
        return $this->db->query("select * from aktivitas_user where DATE(created_at)=CURRENT_DATE")->getResultArray();
    }

    public function GetUserEnterRoom() {
        return (int) $this->db->query("select count(user.username) as user_masuk from user left join smartcard on user.idCardUser=smartcard.idCardUser left join aktivitas_user on aktivitas_user.idCard=smartcard.idCard where DATE(aktivitas_user.created_at)=CURRENT_DATE and status_aktivitas='masuk'")->getResultArray()[0]['user_masuk'];
    }

    public function GetCountListUsers($tipe_user) {
        return (int) $this->db->table('smartcard')->selectCount('smartcard.idCard','countIdCard')->join('user','user.idCardUser=smartcard.idCardUser')->where('user.tipe_user',$tipe_user)->get()->getResultArray()[0]['countIdCard'];
    }

    public function GetEnterUser() {
        return $this->db->table('aktivitas_user')->selectCount('idCard','idCard')->where('status_aktivitas','masuk')->get()->getResultArray()[0]['idCard'];
    }

    public function GetUserBelumTerdaftar($tipe_user) {
        return (int) $this->db->table('user')->selectCount('idCardUser','countidCardUser')->where('tipe_user',$tipe_user)->get()->getResultArray()[0]['countidCardUser'] - (int) $this->db->table('smartcard')->selectCount('smartcard.idCard','countIdCard')->join('user','user.idCardUser=smartcard.idCardUser')->where('user.tipe_user',$tipe_user)->get()->getResultArray()[0]['countIdCard'];
    }
}