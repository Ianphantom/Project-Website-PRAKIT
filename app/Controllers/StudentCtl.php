<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class StudentCtl extends BaseController
{
    public function index()
    {
        return view('student/index');
    }

    public function login()
    {
        return view('student/auth-login.php');
    }

    public function loggingAccount()
    {
        helper(['form']);
        $rules = [
            'email' => 'required|valid_email', 
            'nrp' => 'required|numeric',
            'password' =>  'required',
        ];

        if(!$this-> validate($rules)){
            session()->setFlashdata('fail', 'Your data cannot be found!');
            return redirect()->to(base_url('student/login'))->withInput();
        }
        $userModel = new StudentModel();
        $user = $userModel->where("email", $this->request->getVar('email'))->first();
        if(!$user){ 
            session()->setFlashdata('fail', 'Your data email cannot be found!');
            return redirect()->to(base_url('student/login'))->withInput();
        }
        if($user['nrp'] != $this->request->getVar('nrp')){ 
            session()->setFlashdata('fail', 'Your data NRP cannot be found!');
            return redirect()->to(base_url('student/login'))->withInput();
        }
        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if(!$verify){
            session()->setFlashdata('fail', 'Your data password cannot be found!');
            return redirect()->to(base_url('student/login'))->withInput();
        }

        $user_id = $user['id_siswa'];
        $user_role = "mahasiswa";
        session()->set('loggedUser', $user_id);
        session()->set('roles', $user_role);
        return redirect()->to(base_url('student/home'));
    }

    public function register()
    {
        $data = [
            'error' => '',
        ];
        return view('student/auth-register.php', $data);
    }

    public function registeringAccount()
    {
        helper(['form']);
        $rules = [
            'email' => 'required|valid_email|is_unique[siswa.email]', // tambah maksimal
            'nama' => 'required|min_length[3]|alpha_space',
            'nrp' => 'required|numeric|is_unique[siswa.nrp]',
            'password' =>  'required|min_length[5]',
            'confPassword' => 'required|matches[password]',
        ];

        if(!$this-> validate($rules)){
            $error = $this->validator->getErrors();
            $data = [
                'error' => $error,
            ];
            return view('student/auth-register.php', $data);
        }
        $inputData = [
            'email'      => $this->request->getVar('email'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama'  => $this->request->getVar('nama'),
            'nrp'     => $this->request->getVar('nrp'),
        ];
        $accountModel = new StudentModel();
        $registering = $accountModel->save($inputData);
        return redirect()->to(base_url('student/login'))->with('success', 'Account Registration Success');
    }
}
