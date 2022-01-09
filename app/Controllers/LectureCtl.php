<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\LectureModel;
use App\Models\KppartnerModel;
use App\Models\PengajuanModel;
use App\Models\LogbookModel;
use App\Models\LaporanModel;
use App\Models\NilaiModel;

class LectureCtl extends BaseController
{
    public function index()
    {
        $lectureModel = new LectureModel();
        $dataDosen = $lectureModel->where('id_dosen', session()->get('loggedUser'))->first();
        
        $data_kp1 = $lectureModel->getDataPengajuankp(session()->get('loggedUser'));
        $data_kp2 = $lectureModel->getDataPartnerkp(session()->get('loggedUser'));
        
        $data = [
            'dataDosen' => $dataDosen,
            'data1' => $data_kp1,
            'data2' => $data_kp2,
        ];
        return view('lecture/progres-mahasiswa', $data);
    }

    public function showLogbook($seg1 = false){
        $logbookModel = new LogbookModel();
        $userLogbook = $logbookModel->where('id_siswa', $seg1)->findAll();
        $data = [
            "logbook" => $userLogbook,
        ];
        return view('lecture/logbook', $data);
    }

    public function mahasiswakp(){
        $lectureModel = new LectureModel();
        $dataDosen = $lectureModel->where('id_dosen', session()->get('loggedUser'))->first();
        
        $data_kp1 = $lectureModel->getDataNilaiPengajuankp(session()->get('loggedUser'));
        $data_kp2 = $lectureModel->getDataNilaiPartnerkp(session()->get('loggedUser'));

        $data = [
            'dataDosen' => $dataDosen,
            'data1' => $data_kp1,
            'data2' => $data_kp2,
        ];

        return view('lecture/all-mahasiswa', $data);
    }

    public function penilaianMahasiswa(){
        $lectureModel = new LectureModel();
        $dataDosen = $lectureModel->where('id_dosen', session()->get('loggedUser'))->first();
        
        $data_kp1 = $lectureModel->getDataNilaiPengajuankpBimbingan(session()->get('loggedUser'));
        $data_kp2 = $lectureModel->getDataNilaiPartnerkpBimbingan(session()->get('loggedUser'));

        $data = [
            'dataDosen' => $dataDosen,
            'data1' => $data_kp1,
            'data2' => $data_kp2,
        ];
        return view('lecture/penilaian-mhs', $data);
    }

    public function updateNilai($seg1 = false, $seg2 = false){
        $studentModel = new StudentModel();
        $nilaiModel = new NilaiModel();
        $lectureModel = new lectureModel();
        $cekPermissionPengajuanKP = $lectureModel->cekPermissionPengajuankp(session()->get('loggedUser'),$seg1,$seg2);
        $cekPermissionPartnerKP = $lectureModel->cekPermissionPartnerkp(session()->get('loggedUser'),$seg1,$seg2);
        if($cekPermissionPengajuanKP->getNumRows() == 0 && $cekPermissionPartnerKP->getNumRows() == 0 ){
            return view('lecture/updatenilai-forbidden');
        }

        $dataSiswa = $studentModel->where('id_siswa', $seg1)->first();
        $dataNilai = $nilaiModel->where('id_nilai', $seg2)->first();
        session()->setTempdata('id_nilai', $seg2, 3600);
        $data = [
            'userid'    => $seg1,
            'id_nilai'     => $seg2,
            'dataSiswa' => $dataSiswa,
            'dataNilai' => $dataNilai,
        ];
        return view('lecture/updatenilai', $data);
    }

    public function updatingNilai(){
        $nilaiModel = new NilaiModel();

        $inputNilai1 = [
            'nilai'  => $this->request->getVar('nilai'),
        ];
        $nilaiModel->update(session()->getTempdata('id_nilai'), $inputNilai1);
        $lectureModel = new LectureModel();
        $dataDosen = $lectureModel->where('id_dosen', session()->get('loggedUser'))->first();
        
        $data_kp1 = $lectureModel->getDataNilaiPengajuankpBimbingan(session()->get('loggedUser'));
        $data_kp2 = $lectureModel->getDataNilaiPartnerkpBimbingan(session()->get('loggedUser'));

        $data = [
            'dataDosen' => $dataDosen,
            'data1' => $data_kp1,
            'data2' => $data_kp2,
        ];
        session()->removeTempdata('id_nilai');
        return view('lecture/penilaian-mhs', $data);
        return redirect()->to(base_url('lecture/penilaian-mhs'))->with('success', 'Mark Updated');
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
            session()->setFlashdata('fail', 'Your data cannot be found!');
            return redirect()->to(base_url('lecture/login'))->withInput();
        }
        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if(!$verify){
            session()->setFlashdata('fail', 'Your data cannot be found!');
            return redirect()->to(base_url('lecture/login'))->withInput();
        }

        $user_id = $user['id_dosen'];
        $user_role = "dosen";
        session()->set('loggedUser', $user_id);
        session()->set('roles', $user_role);
        return redirect()->to(base_url('lecture/home'));
    }
}
