<?php 

namespace App\Models;

use CodeIgniter\Model;

class CardsAdminModel extends Model
{
    public function AllData() {
        return $this->db->table('smartcard')->select('smartcard.*,user.username,user.tipe_user,user.created_at,user.updated_at,users.active')->join('user','smartcard.idCardUser=user.idCardUser')->join('users','users.username=user.username')->get()->getResultArray();
    }
    public function AllDataByBulan($bulan) {
        $getinputtahun = (int) explode('-',$bulan)[0];
        $getinputbulan = (int) explode('-',$bulan)[1];
        return $this->db->query("select smartcard.*,user.username,user.created_at,user.tipe_user,user.updated_at,users.active from smartcard left join user on user.idCardUser=smartcard.idCardUser left join users on users.username=user.username where YEAR(users.created_at)='$getinputtahun' AND MONTH(users.created_at)=$getinputbulan")->getResultArray();
    }
    public function SearchData($getinput) {
        $arry = array();
        foreach($getinput as $dt=>$val) {
            if($val !== '' and $dt !== 'csrf_test_name') {
                if ($dt === 'tanggaldibuat') {
                    $dt = 'user.created_at';
                    $arry[$dt] = explode(' ',$val)[0];
                } else if ($dt === 'idUser') {
                    $dt = 'smartcard.idCardUser';
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
                    $dt = 'smartcard.'.$dt;
                    $arry[$dt] = $val;
                }
            }
        }
        return $this->db->table('smartcard')->select('smartcard.*,user.username,user.created_at,user.updated_at,users.active')->join('user','smartcard.idCardUser=user.idCardUser')->join('users','users.username=user.username')->like($arry)->limit(200)->get()->getResultArray();
    }

}