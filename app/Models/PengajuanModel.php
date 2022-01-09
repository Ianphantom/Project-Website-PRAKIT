<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengajuankp1';
    protected $primaryKey       = 'id_kp';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kp', 'id_siswa', 'sks','alamat','nomor_telepon','id_dosen','nama_perusahaan','alamat_perusahaan','telepon_perusahaan','telepon_perusahaan','wakil_perusahaan','deskripsi_pekerjaan','tanggal_pelaksanaan','tanggal_selesai','profil_perusahaan','id_partner', 'status', 'tanggal_pengajuan','file_kp', 'surat_pengantar'];

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
        $query = "SELECT id_kp from pengajuankp1 WHERE id_siswa='".$id."'";
        $res = $this->db->query($query);
        return $res->getNumRows();
    }

    function getDataPengajuan(){
        $query = "SELECT *, siswa.nama as nama_siswa, dosen.nama as nama_dosen FROM pengajuankp1 
                    INNER JOIN siswa ON pengajuankp1.id_siswa=siswa.id_siswa 
                    INNER JOIN dosen ON dosen.id_dosen=pengajuankp1.id_dosen 
                    WHERE pengajuankp1.status = 'Pengajuan KP';";
        $res = $this->db->query($query);
        return $res->getResult();
    }
}
