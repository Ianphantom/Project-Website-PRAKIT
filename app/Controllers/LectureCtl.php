<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LectureModel;

class LectureCtl extends BaseController
{
    public function index()
    {
        return view('lecture/progres-mahasiswa');
    }

    public function register(){
        $data = [
            'error' => '',
        ];
        return view('lecture/auth-register-lecture', $data);
    }

    public function registeringAccount()
    {
        helper(['form']);
        $rules = [
            'email' => 'required|valid_email|is_unique[dosen.email]', // tambah maksimal
            'nama' => 'required|min_length[3]',
            'password' =>  'required|min_length[5]',
            'confPassword' => 'required|matches[password]',
        ];

        if(!$this-> validate($rules)){
            $error = $this->validator->getErrors();
            $data = [
                'error' => $error,
            ];
            return view('lecture/auth-register-lecture', $data);
        }
        $inputData = [
            'email'      => $this->request->getVar('email'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama'  => $this->request->getVar('nama'),
        ];
        $accountModel = new LectureModel();
        $registering = $accountModel->save($inputData);
        return redirect()->to(base_url('lecture/login'))->with('success', 'Account Registration Success');
    }

    public function login(){
        return view('lecture/auth-login-lecture');
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
            return redirect()->to(base_url('lecture/login'))->withInput();
        }
        $userModel = new LectureModel();
        $user = $userModel->where("email", $this->request->getVar('email'))->first();
        if(!$user){ 
            session()->setFlashdata('fail', 'Your data email cannot be found!');
            return redirect()->to(base_url('lecture/login'))->withInput();
        }
        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if(!$verify){
            session()->setFlashdata('fail', 'Your data password cannot be found!');
            return redirect()->to(base_url('lecture/login'))->withInput();
        }

        $user_id = $user['id_dosen'];
        $user_role = "dosen";
        session()->set('loggedUser', $user_id);
        session()->set('roles', $user_role);
        return redirect()->to(base_url('lecture/home'));
    }
}
