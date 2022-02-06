<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\PengajuanModel;
use App\Models\StudentModel;
use App\Models\LectureModel;
use App\Models\LaporanModel;
use App\Models\AlihKreditModel;

class AdminCtl extends BaseController
{
    public function index()
    {
        $pengajuanModel = new PengajuanModel();
        $alihKredit = new AlihKreditModel();
        $data_pengajuan = $pengajuanModel->getDataPengajuan();
        $data_pengajuanAlihKredit = $alihKredit->getDataPengajuanAlihKredit();
        $data = [
            'data_pengajuan' => $data_pengajuan,
            'alih_kredit' => $data_pengajuanAlihKredit,
        ];
        return view('admin/dashboard', $data);
    }

    public function suratpengantar($seg1 = false){
        $data = [
            'id_kp' => $seg1,
            'error' => '',
        ];
        return view('admin/surat_pengantar', $data);
    }

    public function uploadingSuratPengantar($seg1 = false){
        $pengajuanModel = new PengajuanModel();

        $datakp = $pengajuanModel->where('id_kp', $seg1)->first();
        // echo $datakp['id_kp'];
        helper(['form']);
        $rules = [
            'namaBerkas' => 'required',
            'file' => 'uploaded[file]',
        ];

        if(!$this-> validate($rules)){
            $error = $this->validator->getErrors();
            $data = [
                'error' => $error,
                'id_kp' => $seg1,
            ];
            return view('admin/surat_pengantar', $data);
        }

        helper('date');
        helper('text');
        $dataBerkas = $this->request->getFile('file');
		$fileName = session()->get('loggedUser'). '_' . now('Asia/Kolkata') .  '_' .  strtolower($this->request->getVar('namaBerkas')) . '_' . $dataBerkas->getRandomName();
        
        $inputData1 = [
            'surat_pengantar'                          => $fileName,
            'status'                            => "ON PROGRESS"
        ];
        $pengajuanModel->update($datakp['id_kp'], $inputData1);
        $dataBerkas->move('assets/suratpengantar/', $fileName);

        return redirect()->to(base_url('admin/home'))->with('success', 'Document Surat Pengantar KP has been Uploaded');
    }

    public function statuspengajuanmhs(){
        $pengajuanModel = new PengajuanModel();
        $data_mahasiswa1 = $pengajuanModel->getStatusKp1();
        $data_mahasiswa2 = $pengajuanModel->getStatusPartner();
        $data = [
            'data1' => $data_mahasiswa1,
            'data2' => $data_mahasiswa2,
        ];
        return view('admin/surat-pengajuan-mhs', $data);
    }

    public function login(){
        return view('admin/auth-login-admin');
    }

    public function showberkas($seg1 = false, $seg2 = false){
        $berkas = new LaporanModel();
        $whereQuery = "id_kp='".$seg1."' AND id_siswa='".$seg2."'";
		$data = $berkas->where($whereQuery)->first();
		return $this->response->download('assets/laporankp/' . $data['file'], null);
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

    public function logout(){
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            session()->destroy();
            return redirect()->to(base_url());
        }
    }
}
