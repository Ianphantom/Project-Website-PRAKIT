<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\PengajuanModel;
use App\Models\StudentModel;
use App\Models\LectureModel;

class AdminCtl extends BaseController
{
    public function index()
    {
        $pengajuanModel = new PengajuanModel();
        $data_pengajuan = $pengajuanModel->getDataPengajuan();
        $data = [
            'data_pengajuan' => $data_pengajuan,
        ];
        return view('admin/dashboard', $data);
    }

    public function login(){
        return view('admin/auth-login-admin');
    }

    public function loggingAccount()
    {
        helper(['form']);
        $rules = [
            'email' => 'required|valid_email',
            'password' =>  'required',
        ];

        if(!$this-> validate($rules)){
            session()->setFlashdata('fail', 'Your data cannot be found!');
            return redirect()->to(base_url('admin/login'))->withInput();
        }
        $adminModel = new AdminModel();
        $user = $adminModel->where("email", $this->request->getVar('email'))->first();
        if(!$user){ 
            session()->setFlashdata('fail', 'Your data cannot be found!');
            return redirect()->to(base_url('admin/login'))->withInput();
        }

        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if(!$verify){
            session()->setFlashdata('fail', 'Your data password cannot be found!');
            return redirect()->to(base_url('admin/login'))->withInput();
        }

        $user_id = $user['id_admin'];
        $user_role = "admin";
        session()->set('loggedUser', $user_id);
        session()->set('roles', $user_role);
        return redirect()->to(base_url('admin/home'));
    }
}
