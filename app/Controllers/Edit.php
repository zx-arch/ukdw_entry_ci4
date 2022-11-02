<?php

namespace App\Controllers;
use \Myth\Auth\Entities\User;
use \Myth\Auth\Authorization\GroupModel;
use \Myth\Auth\Config\Auth as AuthConfig;

class Edit extends BaseController
{
    private $_users_model;
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->tbUser = $this->db->table('user');
        $this->tbUsers = $this->db->table('users');
        $this->tbHapusUser = $this->db->table('hapus_user');
        $this->tbRooms = $this->db->table('rooms');
        $this->config = config('Auth');
        $this->auth = service('authentication');
        $this->tbauth_groups_users = $this->db->table('auth_groups_users');
        $this->tbAktivitas = $this->db->table('aktivitas_user');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index() {
        $rules = [
            'password'     => 'required|min_length[8]',
            'pass_confirm' => 'required|matches[password]',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = $this->tbUsers->select('users.username,users.last_login,users.created_at,users.updated_at,users.deleted_at,user.*')->join('user','users.username=user.username')->where('users.id', $this->request->getVar('id'))->get()->getResultArray();
        $cek = array();
        foreach ($data as $dt=>$val) {
            $cek[$dt] = $val;
        }
        dd($cek);
        $backupuser = [
            'nama'  => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('username'),
            'nik' => 0,
            'nim' => $this->request->getPost('nim'),
            'nip' => 0,
            'nidn' => 0,
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'tipe_user' => 'Mahasiswa',
            'room_access' => $this->request->getPost('room_access'),
            'created_at' => $this->request->getPost('room_access'),
            'foto_profil' => $nmgbr
        ];
        
        $this->tbHapusUser->insert($backupuser);

        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));
    
        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (! empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }
    
        if (! $users->save($user))
        {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }
    
        if ($this->config->requireActivation !== null)
        {
            $activator = service('activator');
            $sent = $activator->send($user);
    
            if (! $sent)
            {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }
        }
        $dataaddprofil = [
            'nama'  => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('username'),
            'nik' => 0,
            'nim' => $this->request->getPost('nim'),
            'nip' => 0,
            'nidn' => 0,
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'tipe_user' => 'Mahasiswa',
            'room_access' => $this->request->getPost('room_access'),
            'created_at' => date("Y-m-d H:i:s"),
            'foto_profil' => $nmgbr
        ];
        // Success!
        $this->builder->insert($dataaddprofil);

    }
}
