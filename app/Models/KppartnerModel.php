<?php

namespace App\Models;

use CodeIgniter\Model;

class KppartnerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'partnerkp';
    protected $primaryKey       = 'id_partnerkp';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_partnerkp', 'id_kp','id_siswa','sks','nomor_telepon','id_dosen','alamat'];

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

    function getPengajuanKP($id){
        $query = "SELECT id_kp from partnerkp WHERE id_siswa='".$id."'";
        $res = $this->db->query($query);
        return $res->getNumRows();
    }

    function getKPData($id = -1){
        $query = "SELECT partnerkp.*, b.nama_perusahaan, b.wakil_perusahaan, b.deskripsi_pekerjaan, b.tanggal_selesai, b.alamat_perusahaan, b.telepon_perusahaan, b.tanggal_pelaksanaan, b.profil_perusahaan, b.id_partner FROM `partnerkp` INNER JOIN pengajuankp1 AS b ON partnerkp.id_siswa=b.id_partner WHERE partnerkp.id_siswa='".$id."' LIMIT 1";
        $res = $this->db->query($query);
        return $res->getFirstRow();
    }
}
