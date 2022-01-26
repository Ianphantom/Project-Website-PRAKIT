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
use App\Models\LowonganModel;
use App\Models\BerkasModel;
use App\Models\PersyaratanModel;

class StudentCtl extends BaseController
{
    public function index()
    {
        $pengajuanModel = new PengajuanModel();
        $studentModel = new StudentModel();
        $lectureModel = new LectureModel();
        $partnerModel = new KppartnerModel();
        
        // data lowongan perusahaan
        $lowonganModel = new LowonganModel();
        $berkasModel = new BerkasModel();
        $persyaratanModel = new PersyaratanModel();
        
        $dataLowongan = $lowonganModel->findAll();

        $data_kp = $pengajuanModel->getPengajuanKP(session()->get('loggedUser'));
        if($data_kp == 0){
            $data_partner = $partnerModel->getPengajuanKP(session()->get('loggedUser'));
            if($data_partner == 0){
                $data = [
                    'dataLowongan' => $dataLowongan,
                ];
                return view('student/index_null', $data);
            }
            $dataSiswaKP = $partnerModel->where('id_siswa', session()->get('loggedUser'))->first();
        }else{
            $dataSiswaKP = $pengajuanModel->where('id_siswa', session()->get('loggedUser'))->first();
        }

        $siswaKp = $studentModel->getNamaSiswa(session()->get('loggedUser'));
        $whoAmI = $studentModel->where('id_siswa', session()->get('loggedUser'))->first();
        $dataKP = $pengajuanModel->where('id_kp', $dataSiswaKP['id_kp'])->first();
        $dosenPembimbing = $lectureModel->where('id_dosen', $dataSiswaKP['id_dosen'])->first();
        

        $data = [
            'user' => $dataSiswaKP,
            'dataKP' => $dataKP,
            'dosen' => $dosenPembimbing,
            'siswaKp' => $siswaKp,
            'whoAmI' => $whoAmI,
            'dataLowongan' => $dataLowongan,
        ]; 
        return view('student/index', $data);
    }

    public function formPengajuan(){
        $studentModel = new StudentModel();
        $lectureModel = new LectureModel();
        $id = session()->get('loggedUser');
        $currentUser = $studentModel->where("id_siswa", $id)->first();
        $allUser = $studentModel->where("id_siswa !=", $id)->findAll();
        $allLecture = $lectureModel->selectDosenName();
        $data = [
            'lectures' => $allLecture,
            'user' => $currentUser,
            'allUser' => $allUser,
            'error' => '',
        ];
        return view('student/form-kp', $data);
    }

    public function uploadDokumenPengajuan(){
        $data = [
            'error' => '',
        ];
        return view('student/uploaddokumen', $data);
    }

    public function pengumpulanLogbook(){
        $pengajuanModel = new PengajuanModel();
        $partnerModel = new KppartnerModel();
        $logbookModel = new LogbookModel();
        $data_kp = $pengajuanModel->getPengajuanKP(session()->get('loggedUser'));
        if($data_kp == 0){
            $data_partner = $partnerModel->getPengajuanKP(session()->get('loggedUser'));
            if($data_partner == 0){
                return view('student/logbook_null');
            }
        }
        $whereQuery="id_siswa='".session()->get('loggedUser')."' OR id_partner='".session()->get('loggedUser')."'";
        $onprogress = $pengajuanModel->where($whereQuery)->first();
        if( $onprogress['status'] != "ON PROGRESS"){
            return view('student/logbook_null');
        }

        $data_logbook = $logbookModel->where('id_siswa', session()->get('loggedUser'))->findAll();
        $data = [
            'logbook' => $data_logbook,
            'error' => '',
        ];
        return view('student/logbook', $data);
    }

    public function pengumpulanBerkas(){
        $pengajuanModel = new PengajuanModel();
        $studentModel = new StudentModel();
        $lectureModel = new LectureModel();
        $partnerModel = new KppartnerModel();
        $data_kp = $pengajuanModel->getPengajuanKP(session()->get('loggedUser'));
        if($data_kp == 0){
            $data_partner = $partnerModel->getPengajuanKP(session()->get('loggedUser'));
            if($data_partner == 0){
                return view('student/pengumpulan-berkas_null');
            }
            $dataSiswaKP = $partnerModel->where('id_siswa', session()->get('loggedUser'))->first();
        }else{
            $dataSiswaKP = $pengajuanModel->where('id_siswa', session()->get('loggedUser'))->first();
        }

        $whereQuery="id_siswa='".session()->get('loggedUser')."' OR id_partner='".session()->get('loggedUser')."'";
        $onprogress = $pengajuanModel->where($whereQuery)->first();
        if( $onprogress['status'] != "ON PROGRESS"){
            return view('student/logbook_null');
        }
        
        $whoAmI = $studentModel->where('id_siswa', session()->get('loggedUser'))->first();
        $dosenPembimbing = $lectureModel->where('id_dosen', $dataSiswaKP['id_dosen'])->first();
        $data = [
            'dosen' => $dosenPembimbing,
            'whoAmI' => $whoAmI,
            'error' => '',
        ]; 
        return view('student/pengumpulan-berkas', $data);
    }

    public function userProfile(){
        $pengajuanModel = new PengajuanModel();
        $studentModel = new StudentModel();
        $lectureModel = new LectureModel();
        $partnerModel = new KppartnerModel();

        $data_kp = $pengajuanModel->getPengajuanKP(session()->get('loggedUser'));
        if($data_kp == 0){
            $data_partner = $partnerModel->getPengajuanKP(session()->get('loggedUser'));
            if($data_partner == 0){
                return view('student/index_null');
            }
            $dataSiswaKP = $partnerModel->where('id_siswa', session()->get('loggedUser'))->first();
        }else{
            $dataSiswaKP = $pengajuanModel->where('id_siswa', session()->get('loggedUser'))->first();
        }

        $siswaKp = $studentModel->getNamaSiswa(session()->get('loggedUser'));
        $whoAmI = $studentModel->where('id_siswa', session()->get('loggedUser'))->first();
        $dataKP = $pengajuanModel->where('id_kp', $dataSiswaKP['id_kp'])->first();
        $dosenPembimbing = $lectureModel->where('id_dosen', $dataSiswaKP['id_dosen'])->first();
        

        $data = [
            'user' => $dataSiswaKP,
            'dataKP' => $dataKP,
            'dosen' => $dosenPembimbing,
            'siswaKp' => $siswaKp,
            'whoAmI' => $whoAmI,
        ]; 
        return view('student/profile', $data);
        // return view('student/profile');
    }

    public function userDaftarPengajuan(){
        $pengajuanModel = new PengajuanModel();
        $studentModel = new StudentModel();
        $lectureModel = new LectureModel();
        $partnerModel = new KppartnerModel();

        $data_kp = $pengajuanModel->getPengajuanKP(session()->get('loggedUser'));
        if($data_kp == 0){
            $data_partner = $partnerModel->getPengajuanKP(session()->get('loggedUser'));
            if($data_partner == 0){
                return view('student/index_null');
            }
            $dataSiswaKP = $partnerModel->where('id_siswa', session()->get('loggedUser'))->first();
        }else{
            $dataSiswaKP = $pengajuanModel->where('id_siswa', session()->get('loggedUser'))->first();
        }

        $data_pengajuan = $pengajuanModel->where('id_kp', $dataSiswaKP['id_kp'])->first();
        $data = [
            'kp' => $data_pengajuan,
        ];
        return view('student/pengajuan_kp', $data);
    }

    public function downloadPengajuan(){
        $pengajuanModel = new PengajuanModel();
        $userModel = new StudentModel();
        $dosenModel = new LectureModel();
        $kpUser = $pengajuanModel->where('id_siswa', session()->get('loggedUser'))->first();
        $currentUser = $userModel->where('id_siswa', session()->get('loggedUser'))->first();
        $dosen1 = $dosenModel->where('id_dosen', $kpUser['id_dosen'])->first();

        if($kpUser['id_partner'] == null){
            $data = [
                'kp1' => $kpUser,
                'user1' => $currentUser,
                'dosen1' => $dosen1,
            ];
            return view('student/formpengajuan-kp-1', $data);
        }else{
            $partnerModel = new KppartnerModel();

            $partner2 = $partnerModel->where('id_kp', $kpUser['id_kp'])->first();
            $partnerUser = $userModel->where('id_siswa', $kpUser['id_partner'])->first();
            $dosen2 = $dosenModel->where('id_dosen', $partner2['id_dosen'])->first();

            $data = [
                'kp1' => $kpUser,
                'user1' => $currentUser,
                'kp2' => $partner2,
                'user2' => $partnerUser,
                'dosen1' => $dosen1,
                'dosen2' => $dosen2,
            ];
            return view('student/formpengajuan-kp', $data);
        }
        
    }

    public function uploadingDokumenPengajuan(){
        $pengajuanModel = new PengajuanModel();

        $datakp = $pengajuanModel->where('id_siswa', session()->get('loggedUser'))->first();
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
            ];
            return view('student/uploaddokumen', $data);
        }

        helper('date');
        helper('text');
        $dataBerkas = $this->request->getFile('file');
		$fileName = session()->get('loggedUser'). '_' . now('Asia/Kolkata') .  '_' .  strtolower($this->request->getVar('namaBerkas')) . '_' . $dataBerkas->getRandomName();
        
        $inputData1 = [
            'file_kp'                          => $fileName,
            'status'                            => "Pengajuan KP"
        ];
        $pengajuanModel->update($datakp['id_kp'], $inputData1);
        $dataBerkas->move('assets/pengajuankp/', $fileName);

        return redirect()->to(base_url('student/home'))->with('success', 'Document Pengajuan KP has been Uploaded');
    }

    public function insertingLogbook(){
        $pengajuanModel = new PengajuanModel();
        $partnerModel = new KppartnerModel();
        $logbookModel = new LogbookModel();
        $data_kp = $pengajuanModel->getPengajuanKP(session()->get('loggedUser'));
        if($data_kp == 0){
            $data_partner = $partnerModel->getPengajuanKP(session()->get('loggedUser'));
            if($data_partner == 0){
                return view('student/logbook_null');
            }$dataSiswaKP = $partnerModel->where('id_siswa', session()->get('loggedUser'))->first();
        }else{
            $dataSiswaKP = $pengajuanModel->where('id_siswa', session()->get('loggedUser'))->first();
        }

        helper(['form']);
        $rules = [
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'file' => 'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
        ];

        if(!$this-> validate($rules)){
            $error = $this->validator->getErrors();
            $data_logbook = $logbookModel->where('id_siswa', session()->get('loggedUser'))->findAll();
            $data = [
                'logbook' => $data_logbook,
                'error' => $error,
            ];
            return view('student/logbook', $data);
        }

        helper('date');
        helper('text');
        $dataBerkas = $this->request->getFile('file');
		$fileName = session()->get('loggedUser'). '_' . now('Asia/Kolkata') .  '_' .  strtolower(random_string('alnum', 48)) . '_' . $dataBerkas->getRandomName();
        // echo $fileName;
        
		$dataBerkas->move('assets/logbook/', $fileName);
        $inputData1 = [
            'id_kp'                         => $dataSiswaKP['id_kp'],
            'id_siswa'                      => session()->get('loggedUser'),
            'tanggal'                       => $this->request->getVar('tanggal'),
            'deskripsi_kegiatan'            => $this->request->getVar('deskripsi'),
            'file'                          => $fileName,
        ];
        $inserting = $logbookModel->save($inputData1);
        return redirect()->to(base_url('student/logbook'));
    }

    public function generatingLogbook(){
        $studentModel = new StudentModel();
        $logbookModel = new LogbookModel();
        $siswaKp = $studentModel->getNamaSiswa(session()->get('loggedUser'));
        $data_logbook = $logbookModel->where('id_siswa', session()->get('loggedUser'))->findAll();
        $data = [
            'siswaKp' => $siswaKp,
            'data_logbook' => $data_logbook,
        ];
        return view('student/logbookreport', $data);
    }

    public function insertingLaporan(){
        $pengajuanModel = new PengajuanModel();
        $partnerModel = new KppartnerModel();
        $laporanModel = new LaporanModel();
        $data_kp = $pengajuanModel->getPengajuanKP(session()->get('loggedUser'));
        if($data_kp == 0){
            $data_partner = $partnerModel->getPengajuanKP(session()->get('loggedUser'));
            if($data_partner == 0){
                return view('student/logbook_null');
            }$dataSiswaKP = $partnerModel->where('id_siswa', session()->get('loggedUser'))->first();
        }else{
            $dataSiswaKP = $pengajuanModel->where('id_siswa', session()->get('loggedUser'))->first();
        }

        helper(['form']);
        $rules = [
            'namaBerkas' => 'required',
            'keterangan' => 'required',
            'file' => 'uploaded[file]',
        ];

        if(!$this-> validate($rules)){
            $error = $this->validator->getErrors();
            $data = [
                'error' => $error,
            ];
            return view('student/pengumpulan-berkas', $data);
        }

        helper('date');
        helper('text');
        $dataBerkas = $this->request->getFile('file');
		$fileName = session()->get('loggedUser'). '_' . now('Asia/Kolkata') .  '_' .  strtolower($this->request->getVar('namaBerkas')) . '_' . $dataBerkas->getRandomName();
        // echo $fileName;
        
		$dataBerkas->move('assets/laporankp/', $fileName);
        $inputData1 = [
            'id_kp'                         => $dataSiswaKP['id_kp'],
            'id_siswa'                      => session()->get('loggedUser'),
            'keterangan'                    => $this->request->getVar('keterangan'),
            'file'                          => $fileName,
        ];
        $inserting = $laporanModel->save($inputData1);
        $inputData2 = [
            'status'              => 'FINISHED',
        ];
        $pengajuanModel->update($dataSiswaKP['id_kp'], $inputData2);
        return redirect()->to(base_url('student/home'))->with('success', 'Laporan KP has been Uploaded');
    }

    public function login()
    {
        return view('student/auth-login.php');
    }

    public function logout(){
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            session()->destroy();
            return redirect()->to(base_url());
        }
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
            session()->setFlashdata('fail', 'Your data cannot be found!');
            return redirect()->to(base_url('student/login'))->withInput();
        }
        if($user['nrp'] != $this->request->getVar('nrp')){ 
            session()->setFlashdata('fail', 'Your data cannot be found!');
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
            'email'         => $this->request->getVar('email'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama'          => $this->request->getVar('nama'),
            'nrp'           => $this->request->getVar('nrp'),
        ];
        $accountModel = new StudentModel();
        $registering = $accountModel->save($inputData);
        return redirect()->to(base_url('student/login'))->with('success', 'Account Registration Success');
    }

    public function insertingkp(){
        $studentModel = new StudentModel();
        $lectureModel = new LectureModel();
        $id = session()->get('loggedUser');
        $currentUser = $studentModel->where("id_siswa", $id)->first();
        $allUser = $studentModel->where("id_siswa !=", $id)->findAll();
        $allLecture = $lectureModel->selectDosenName();
        helper(['form']);
        $rules = [
            'sks1' => 'required|numeric', // tambah maksimal
            'alamat1' => 'required|min_length[3]',
            'nomor1' => 'required|numeric',
            'doswal' =>  'required',
            'namaPerusahaan' => 'required|min_length[3]',
            'alamatPerusahaan' => 'required|min_length[3]',
            'nomorPerusahaan' => 'required|numeric',
            'namaWakilPerusahaan' => 'required',
            'deskripsi' => 'required',
            'tanggalMulai' => 'required',
            'tanggalSelesai' => 'required',
            'profilPerusahaan' => 'required'
        ];

        if(!$this-> validate($rules)){
            $error = $this->validator->getErrors();
            $data = [
                'lectures' => $allLecture,
                'user' => $currentUser,
                'allUser' => $allUser,
                'error' => $error,
            ];
            return view('student/form-kp', $data);
        }

        $name2 = $this->request->getVar('nama2');
        $sks2 = $this->request->getVar('sks2');

        if($name2 != null || $sks2 != null || $name2 != ''){
            $rules1 = [
                'sks2' => 'required|numeric', // tambah maksimal
                'alamat2' => 'required|min_length[3]',
                'nomor2' => 'required|numeric',
                'doswal2' =>  'required',
            ];

            if(!$this-> validate($rules1)){
                $error = $this->validator->getErrors();
                $data = [
                    'lectures' => $allLecture,
                    'user' => $currentUser,
                    'allUser' => $allUser,
                    'error' => $error,
                ];
                return view('student/form-kp', $data);
            }
        }

        $inputData = [
            'id_siswa'              => session()->get('loggedUser'),
            'sks'                   => $this->request->getVar('sks1'),
            'alamat'                => $this->request->getVar('alamat1'),
            'nomor_telepon'         => $this->request->getVar('nomor1'),
            'id_dosen'              => $this->request->getVar('doswal'),
            'nama_perusahaan'       => $this->request->getVar('namaPerusahaan'),
            'alamat_perusahaan'     => $this->request->getVar('alamatPerusahaan'),
            'telepon_perusahaan'    => $this->request->getVar('nomorPerusahaan'),
            'wakil_perusahaan'      => $this->request->getVar('namaWakilPerusahaan'),
            'deskripsi_pekerjaan'   => $this->request->getVar('deskripsi'),
            'tanggal_pelaksanaan'   => $this->request->getVar('tanggalMulai'),
            'tanggal_selesai'       => $this->request->getVar('tanggalSelesai'),
            'profil_perusahaan'     => $this->request->getVar('profilPerusahaan'),
        ];
        $pengajuanModel = new PengajuanModel();
        $pengajuanModel->insert($inputData);
        $kp_id = $pengajuanModel->getInsertID();

        $nilaiModel = new NilaiModel();
        $inputNilai = [
            'id_kp'     => $kp_id,
            'id_siswa'  => session()->get('loggedUser'),
        ];
        $nilaiModel->insert($inputNilai);
        
        if($name2 != null || $sks2 != null || $name2 != ''){
            $partnerModel = new KppartnerModel();
            $inputData1 = [
                'id_kp'              => $kp_id,
                'id_siswa'           => $this->request->getVar('nama2'),
                'sks'                => $this->request->getVar('sks2'),
                'alamat'             => $this->request->getVar('alamat2'),
                'nomor_telepon'      => $this->request->getVar('nomor2'),
                'id_dosen'           => $this->request->getVar('doswal2'),
            ];

            if($partnerModel->insert($inputData1)){
                $inputData2 = [
                    'id_partner'              => $this->request->getVar('nama2'),
                ];
                $pengajuanModel->update($kp_id, $inputData2);

                $inputNilai1 = [
                    'id_kp'     => $kp_id,
                    'id_siswa'  => $this->request->getVar('nama2'),
                ];
                $nilaiModel->insert($inputNilai1);
            }

        }
        return redirect()->to(base_url('student/home'))->with('success', 'Penambahan data KP berhasil, selanjutnya lakukan upload Dokumen Pengajuan KP');
    }

    
}
