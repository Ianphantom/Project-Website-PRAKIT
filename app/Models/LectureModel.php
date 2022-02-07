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

    function cekPermissionPengajuankp($id_dosen, $id_siswa, $id_nilai){
        $query = "SELECT *, c.nama as nama_dosen, siswa.nama as nama_siswa FROM `pengajuankp1` AS a 
                    INNER JOIN siswa on a.id_siswa=siswa.id_siswa 
                    INNER JOIN nilai as b on a.id_siswa=b.id_siswa 
                    INNER JOIN dosen as c on a.id_dosen=c.id_dosen
                    where a.id_dosen='".$id_dosen."' AND siswa.id_siswa='".$id_siswa."' AND b.id_nilai='".$id_nilai."';";
        $res = $this->db->query($query);
        return $res;
    }

    function cekPermissionPartnerkp($id_dosen, $id_siswa, $id_nilai){
        $query = "SELECT a.*, siswa.*, b.status, b.nama_perusahaan, d.nama as nama_dosen, c.nilai, siswa.nama as nama_siswa FROM `partnerkp` AS a 
                    INNER JOIN siswa on a.id_siswa=siswa.id_siswa 
                    INNER JOIN pengajuankp1 as b on a.id_kp=b.id_kp 
                    INNER JOIN nilai as c on a.id_siswa=c.id_siswa 
                    INNER JOIN dosen as d on a.id_dosen=d.id_dosen 
                    where a.id_dosen='".$id_dosen."' AND siswa.id_siswa='".$id_siswa."' AND c.id_nilai='".$id_nilai."';";
        $res = $this->db->query($query);
        return $res;
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

    function getDataNilaiPengajuankp(){
        $query = "SELECT *, c.nama as nama_dosen, siswa.nama as nama_siswa FROM `pengajuankp1` AS a 
                    INNER JOIN siswa on a.id_siswa=siswa.id_siswa 
                    INNER JOIN nilai as b on a.id_siswa=b.id_siswa 
                    INNER JOIN dosen as c on a.id_dosen=c.id_dosen;";
        $res = $this->db->query($query);
        return $res->getResult();
    }

    function getDataNilaiPartnerkp(){
        $query = "SELECT a.*, siswa.*, b.status, b.nama_perusahaan, d.nama as nama_dosen, c.nilai, siswa.nama as nama_siswa FROM `partnerkp` AS a 
                    INNER JOIN siswa on a.id_siswa=siswa.id_siswa 
                    INNER JOIN pengajuankp1 as b on a.id_kp=b.id_kp 
                    INNER JOIN nilai as c on a.id_siswa=c.id_siswa
                    INNER JOIN dosen as d on a.id_dosen=d.id_dosen";
        $res = $this->db->query($query);
        return $res->getResult();            
    }

    function getDataNilaiPengajuankpBimbingan($id=-1){
        $query = "SELECT *, c.nama as nama_dosen, siswa.nama as nama_siswa FROM `pengajuankp1` AS a 
                    INNER JOIN siswa on a.id_siswa=siswa.id_siswa 
                    INNER JOIN nilai as b on a.id_siswa=b.id_siswa 
                    INNER JOIN dosen as c on a.id_dosen=c.id_dosen WHERE a.id_dosen='".$id."';";
        $res = $this->db->query($query);
        return $res->getResult();
    }

    function getDataNilaiPartnerkpBimbingan($id=-1){
        $query = "SELECT a.*, siswa.*, b.status, b.nama_perusahaan, d.nama as nama_dosen, c.nilai, c.id_nilai, siswa.nama as nama_siswa FROM `partnerkp` AS a 
                    INNER JOIN siswa on a.id_siswa=siswa.id_siswa 
                    INNER JOIN pengajuankp1 as b on a.id_kp=b.id_kp 
                    INNER JOIN nilai as c on a.id_siswa=c.id_siswa
                    INNER JOIN dosen as d on a.id_dosen=d.id_dosen WHERE a.id_dosen='".$id."'";
        $res = $this->db->query($query);
        return $res->getResult();            
    }

    function getDataNIlaiAlihKredit(){
        $query = "SELECT *, c.nama as nama_dosen, siswa.nama as nama_siswa FROM `alihkredit` AS a 
                    INNER JOIN siswa on a.id_siswa=siswa.id_siswa 
                    INNER JOIN nilai_alihkredit as b on a.id_siswa=b.id_siswa 
                    INNER JOIN dosen as c on a.id_dosen=c.id_dosen;";
        $res = $this->db->query($query);
        return $res->getResult();
    }
}
