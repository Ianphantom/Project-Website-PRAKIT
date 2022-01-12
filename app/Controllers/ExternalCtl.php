<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LowonganModel;
use App\Models\BerkasModel;
use App\Models\PersyaratanModel;


class ExternalCtl extends BaseController
{
    public function index()
    {
        $lowonganModel = new LowonganModel();
        $berkasModel = new BerkasModel();
        $persyaratanModel = new PersyaratanModel();
        
        $dataLowongan = $lowonganModel->findAll();
        $data = [
            'dataLowongan' => $dataLowongan,
        ];
        return view('external/index', $data);
    }

    public function tambahLowongan(){
        $data = [
            'error' => '',
        ];
        return view('external/tambah', $data);
    }

    public function insertingLowongan(){
        helper(['form']);
        $rules = [
            'perusahaan' => 'required', // tambah maksimal
            'alamat' => 'required',
            'contact' =>  'required',
            'posisi' => 'required',
            'file' => 'uploaded[file]',
            'name' => 'required',
            'berkas' => 'required',
        ];
        
        if(!$this-> validate($rules)){
            $error = $this->validator->getErrors();
            $data = [
                'error' => $error,
            ];
            return view('external/tambah', $data);
        }

        helper('date');
        helper('text');
        $dataBerkas = $this->request->getFile('file');
		$fileName = session()->get('loggedUser'). '_' . now('Asia/Kolkata') .  '_' .  strtolower($this->request->getVar('namaBerkas')) . '_' . $dataBerkas->getRandomName();

        $inputData = [
            'nama_perusahaan'       => $this->request->getVar('perusahaan'),
            'alamat_perusahaan'     => $this->request->getVar('alamat'),
            'contact_person'        => $this->request->getVar('contact'),
            'posisi_kp'             => $this->request->getVar('posisi'),
            'file'                  => $fileName
        ];
        $lowonganModel = new LowonganModel();
        $lowonganModel->insert($inputData);
        $id_lowongan = $lowonganModel->getInsertID();

		$dataBerkas->move('assets/poster/', $fileName);
        
        
        $number = count($this->request->getVar('name')); 
        $nama = $this->request->getVar('name'); 
        
        if($number > 0)  {  
            foreach($nama as $nama1){
                $inputData1 = [
                    'id_lowongan'           => $id_lowongan,
                    'persyaratan'           => $nama1,
                ];
                $persyaratanModel = new PersyaratanModel();
                $persyaratanModel->insert($inputData1);
            }
        }  

        $number2 = count($this->request->getVar('berkas')); 
        $berkas = $this->request->getVar('berkas'); 

        if($number2 > 0)  {  
            foreach($berkas as $berkas1){
                $inputData2 = [
                    'id_lowongan'           => $id_lowongan,
                    'berkas'           => $berkas1,
                ];
                $berkasModel = new BerkasModel();
                $berkasModel->insert($inputData2);
            }
        }  
        return redirect()->to(base_url('external/home'));
    }
}
