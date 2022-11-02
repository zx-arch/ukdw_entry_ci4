<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
	{
		$this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        date_default_timezone_set("Asia/Jakarta");

	}
    public function dashboard()
    {
        // $mydata = $this->tbl_user->select('auth_groups_users.user_id, auth_groups_users.group_id, users.username, users.email, users.password_hash')->join('auth_groups_users','users.id=auth_groups_users.user_id')->get()->getResultArray();

        $this->builder->set('last_login', date("Y-m-d H:i:s"));
        $this->builder->where('id', user()->id);
        $this->builder->update();
        return view('dashboard_user/komplain',["title" => "Dashboard", "active" => "user"]);

    }
    public function komplain()
    {
        return view('dashboard_user/komplain',["title" => "Komplain", "active" => "user"]);
    }
}
