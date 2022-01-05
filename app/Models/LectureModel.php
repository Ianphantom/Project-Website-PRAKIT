<?php

namespace App\Models;

use CodeIgniter\Model;

class LectureModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dosen';
    protected $primaryKey       = 'id_dosen';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_dosen', 'nama', 'email', 'password'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function selectDosenName(){
        $query = "SELECT nama, id_dosen FROM dosen";
        $res = $this->db->query($query);
        return $res->getResult();
    }

    function getJumlahBimbingan($tabel, $id){
        $query = sprintf("SELECT id_kp from %s WHERE id_dosen=%s",$tabel,$id);
        $res = $this->db->query($query);
        return $res->getNumRows();
    }

    function getDataPengajuankp($id= -1){
        $query = "SELECT * FROM `pengajuankp1` AS a 
                    INNER JOIN siswa on a.id_siswa=siswa.id_siswa 
                    WHERE a.id_dosen='".$id."'";
        $res = $this->db->query($query);
        return $res->getResult();
    }

    function getDataPartnerkp($id= -1){
        $query = "SELECT a.*, siswa.*, b.status, b.nama_perusahaan FROM `partnerkp` AS a 
                    INNER JOIN siswa on a.id_siswa=siswa.id_siswa 
                    INNER JOIN pengajuankp1 as b on a.id_kp=b.id_kp WHERE a.id_dosen='".$id."'";
        $res = $this->db->query($query);
        return $res->getResult();            
    }
}
