<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StudentCtl extends BaseController
{
    public function index()
    {
        //
    }

    public function login()
    {
        return view('student/auth-login.php');
    }

    public function register()
    {
        return view('student/auth-register.php');
    }

    public function registeringAccount()
    {
        helper(['form']);
        $rules = [
            'username' => 'is_unique[akun.username]|min_length[3]', // tambah maksimal
            'password' => 'min_length[3]',
        ];
        $bankModel = new BankModel();
        $bank = $bankModel->findAll();
        
        if(!$this-> validate($rules)){
            $error = $this->validator->getErrors();
            $data = [
                'banks' => $bank,
                'error' => $error,
            ];
            return view('login/regitration/regist', $data);
        }
        $inputData = [
            'username'      => $this->request->getVar('username'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama_lengkap'  => $this->request->getVar('name'),
            'tgl_lahir'     => $this->request->getVar('tanggal'),
            'institusi'     => $this->request->getVar('institusi'),
            'whatsapp'      => $this->request->getVar('phone'),
            'bank_id'       => $this->request->getVar('namaBank'),
            'bank_nomor'    => $this->request->getVar('norek'),
            'bank_nama'     => $this->request->getVar('namerek'),
        ];
        $accountModel = new AccountModel();
        $registering = $accountModel->save($inputData);
        return redirect()->to(base_url('/login'))->with('success', 'Pendaftaran akun berhasil');
    }
}
