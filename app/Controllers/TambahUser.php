<?php

namespace App\Controllers;
use \Myth\Auth\Entities\User;
use \Myth\Auth\Authorization\GroupModel;
use \Myth\Auth\Config\Auth as AuthConfig;

class TambahUser extends BaseController
{
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('user');
        $this->tbUsers = $this->db->table('users');
        $this->config = config('Auth');
        $this->auth = service('authentication');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        if ($this->request->getPost() == null) {
            return view('dashboard_admin/tambah_user',["title" => "Tambah User",'config' => $this->config]);
        } else {
            $users = model(UserModel::class);

            $rules = [
                'nama'     => 'required|regex_match[^[a-zA-Z\s-]+$]',
                'username' => 'required|min_length[3]|max_length[30]',
                'email'    => 'required|valid_email',
                'no_hp'      => 'required|min_length[9]|max_length[12]'
            ];
        
            if (! $this->validate($rules))
            {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
            $rules = [
                'gambar' => 'uploaded[gambar]|max_size[gambar,512]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
            ];

            if (! $this->validate($rules))
            {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
            
            $rules = [
                'password'     => 'required|min_length[8]',
                'pass_confirm' => 'required|matches[password]',
            ];
        
            if (! $this->validate($rules))
            {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
            $filegbr = $this->request->getFile('gambar');
            $filegbr->move('img');
            $nmgbr = $filegbr->getName();
            $dataaddprofil = [
                'nama'  => $this->request->getPost('nama'),
                'username'  => $this->request->getPost('username'),
                'nik' => $this->request->getPost('nik'),
                'nim' => $this->request->getPost('nim'),
                'nip' => $this->request->getPost('nip'),
                'nidn' => $this->request->getPost('nidn'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'tipe_user' => $this->request->getPost('tipe_user'),
                'room_access' => $this->request->getPost('room_access'),
                'created_at' => date("Y-m-d H:i:s"),
                'foto_profil' => $nmgbr
            ];
            
            // Save the user
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
            // Success!
            $this->builder->insert($dataaddprofil);

            $this->tbUsers->set('updated_at', null);
            $this->tbUsers->where('username', $this->request->getVar('username'));
            $this->tbUsers->update();
            
            if ($this->request->getPost('tipe_user') === 'mahasiswa') {
                $this->tbUser->set('idCardUser', 'mhs-'.$this->request->getPost('nim'));
                $this->tbUser->where('username', $this->request->getVar('username'));
                $this->tbUser->update();

                session()->setFlashdata('adduser','Data '. $this->request->getVar('username'). ' Berhasil Ditambah');
                return redirect()->to(base_url('/admin/users/mahasiswa'));
            } elseif ($this->request->getPost('tipe_user') === 'dosen') {
                $this->tbUser->set('idCardUser', 'dsn-'.$this->request->getPost('nidn'));
                $this->tbUser->where('username', $this->request->getVar('username'));
                $this->tbUser->update();

                session()->setFlashdata('adduser','Data '. $this->request->getVar('username'). ' Berhasil Ditambah');
                return redirect()->to(base_url('/admin/users/dosen'));
            } elseif ($this->request->getPost('tipe_user') === 'staff') {
                $this->tbUser->set('idCardUser', 'mhs-'.$this->request->getPost('nip'));
                $this->tbUser->where('username', $this->request->getVar('username'));
                $this->tbUser->update();
                
                session()->setFlashdata('adduser','Data '. $this->request->getVar('username'). ' Berhasil Ditambah');
                return redirect()->to(base_url('/admin/users/staff'));
            } elseif ($this->request->getPost('tipe_user') === 'tamu') {
                $this->tbUser->set('idCardUser', 'mhs-'.$this->request->getPost('nik'));
                $this->tbUser->where('username', $this->request->getVar('username'));
                $this->tbUser->update();
                
                session()->setFlashdata('adduser','Data '. $this->request->getVar('username'). ' Berhasil Ditambah');
                return redirect()->to(base_url('/admin/users/tamu'));
            }
        }
    }
}
