<?php

namespace App\Controllers;
use \Myth\Auth\Entities\User;
use \Myth\Auth\Authorization\GroupModel;
use \Myth\Auth\Config\Auth as AuthConfig;

class EditDosen extends BaseController
{
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
        if ($this->request->getPost('password') === '' and $this->request->getPost('pass_confirm') === '') {
            if($this->request->getFile('gambar') !== null) {
                $dataaddprofil = [
                    'nama'  => $this->request->getPost('nama'),
                    'username'  => $this->request->getPost('username'),
                    'nip' => $this->request->getPost('nip'),
                    'nidn' => $this->request->getPost('nidn'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'room_access' => $this->request->getPost('room_access'),
                    'updated_at' => date("Y-m-d H:i:s")
                ];
                // Success!
                $this->tbUser->where('idUser',$this->request->getVar('idUser'));
                $this->tbUser->update($datauser);
                
                $this->tbUsers->where('id',$this->request->getVar('id'));
                $this->tbUsers->update($datausers);
    
                $this->tbUsers->set('updated_at', date("Y-m-d H:i:s"));
                $this->tbUsers->where('username', $this->request->getVar('username'));
                $this->tbUsers->update();
    
                $this->tbUser->set('updated_at', date("Y-m-d H:i:s"));
                $this->tbUser->where('username', $this->request->getVar('username'));
                $this->tbUser->update();
                
                session()->setFlashdata('edited','Data '. $this->request->getVar('username'). ' Berhasil Diedit');
                return redirect()->to(base_url('/admin/users/dosen'));
            } else {
                $datauser = [
                    'nip' => $this->request->getVar('nip'),
                    'nidn' => $this->request->getVar('nidn'),
                    'alamat'  => $this->request->getVar('alamat'),
                    'nama'  => $this->request->getVar('nama'),
                    'no_hp'  => $this->request->getVar('no_hp'),
                    'username'  => $this->request->getVar('username'),
                ];
                $datausers = [
                    'email'  => $this->request->getVar('email'),
                    'username'  => $this->request->getVar('username'),
                ];
                $this->tbUser->where('idUser',$this->request->getVar('idUser'));
                $this->tbUser->update($datauser);
                
                $this->tbUsers->where('id',$this->request->getVar('id'));
                $this->tbUsers->update($datausers);
    
                $this->tbUsers->set('updated_at', date("Y-m-d H:i:s"));
                $this->tbUsers->where('username', $this->request->getVar('username'));
                $this->tbUsers->update();
    
                $this->tbUser->set('updated_at', date("Y-m-d H:i:s"));
                $this->tbUser->where('username', $this->request->getVar('username'));
                $this->tbUser->update();
                
                session()->setFlashdata('edited','Data '. $this->request->getVar('username'). ' Berhasil Diedit');
                return redirect()->to(base_url('/admin/users/dosen'));
            } 
        } 
        if ($this->request->getPost('password') !== '' or $this->request->getPost('password') !== '' or ($this->request->getPost('password') === '' and $this->request->getPost('pass_confirm') !== '')) {
            $rules = [
                'password'     => 'min_length[8]',
                'pass_confirm' => 'matches[password]',
            ];
            $users = model(UserModel::class);

            if (! $this->validate($rules))
            {
                session()->setFlashdata('invalid_passwd','Password Minimal Harus 8 Karakter');
                return redirect()->to(base_url('/admin/users/dosen'));
            }

            $backupuser = [
                'idUser'  => $this->request->getPost('id'),
                'nama'  => $this->request->getPost('nama'),
                'username'  => $this->request->getPost('username'),
                'nik' => 0,
                'nim' => 0,
                'nip' => $this->request->getPost('nip'),
                'nidn' => $this->request->getPost('nidn'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'tipe_user' => 'Dosen',
                'room_access' => $this->request->getPost('room_access'),
                'created_at' => $this->request->getPost('created_at'),
                'last_login' => $this->request->getPost('last_login'),
            ];
            
            $this->tbHapusUser->insert($backupuser);
            $this->tbUsers->delete(['id' => $this->request->getPost('id')]);
            $this->tbauth_groups_users->delete(['user_id' => $this->request->getPost('id')]);
            $this->tbUser->delete(['username' => $this->request->getPost('username')]);
            
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

            $insertdatauser = $this->tbHapusUser->select('nama, username, nik, nim,nip, nidn, alamat, no_hp,tipe_user,room_access,created_at')->where('username',$this->request->getVar('username'))->get()->getResultArray();

            $this->tbUser->insert($insertdatauser[0]);

            $this->tbUser->set('updated_at', date("Y-m-d H:i:s"));
            $this->tbUser->where('username', $this->request->getVar('username'));
            $this->tbUser->update();

            $this->tbUsers->set('created_at', $this->request->getPost('created_at'));
            $this->tbUsers->where('username', $this->request->getVar('username'));
            $this->tbUsers->update();

            $this->tbUsers->set('updated_at', date("Y-m-d H:i:s"));
            $this->tbUsers->where('username', $this->request->getVar('username'));
            $this->tbUsers->update();

            if ($this->request->getPost('last_login') !== null or $this->request->getPost('last_login') !== '0000-00-00 00:00:00') {
                $this->tbUsers->set('last_login', $this->request->getPost('last_login'));
                $this->tbUsers->where('username', $this->request->getVar('username'));
                $this->tbUsers->update();
            }
            session()->setFlashdata('edited','Data '. $this->request->getVar('username'). ' Berhasil Diedit');
            return redirect()->to(base_url('/admin/users/dosen'));
        } 
    }
}
