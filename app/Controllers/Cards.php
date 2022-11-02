<?php 

namespace App\Controllers;
use App\Models\CardsAdminModel;

class Cards extends BaseController
{
    public function __construct() 
    {
        $this->db = \Config\Database::connect();
        $this->CardsAdminModel = new CardsAdminModel();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index() 
    {
        if($this->request->getVar() == null and $this->request->getVar('bulan') == null) {
            $mydata = $this->CardsAdminModel->AllData();
        } else if ($this->request->getVar() !== null and $this->request->getVar('bulan') !== null) {
            $mydata = $this->CardsAdminModel->AllDataByBulan($this->request->getVar('bulan'));
        } else {
            $mydata = $this->CardsAdminModel->SearchData($this->request->getVar());
        }

        return view('dashboard_admin/cards',["title" => "Cards", "active" => "admin", "data_users" => $mydata,"inputidCard" => $this->request->getVar('idCard'),"inputidUser" => $this->request->getVar('idUser'),"inputtanggaldibuat" => $this->request->getVar('tanggaldibuat'),"inputupdated_at" => $this->request->getVar('updated_at'),"inputbulan" => $this->request->getVar('bulan'),"inputstatus" => $this->request->getVar('status')]);
    }
}