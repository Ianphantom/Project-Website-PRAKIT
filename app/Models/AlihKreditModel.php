<?php

namespace App\Models;

use CodeIgniter\Model;

class AlihKreditModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'alihkredit';
    protected $primaryKey       = 'id_alihkredit';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_alihkredit', 'id_siswa', 'sks','alamat','nomor_telepon', 'id_dosen', 'nama_perusahaan','alamat_perusahaan','telepon_perusahaan', 'wakil_perusahaan', 'deskripsi_pekerjaan', 'tanggal_pelaksanaan', 'tanggal_selesai','tanggal_pengajuan','profil_perusahaan', 'surat_pengantar', 'surat_penilaianPerusahaan','status', 'file_alihKredit'];

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

    function getAlihKredit($id){
        $query = "SELECT id_alihkredit from alihkredit WHERE id_siswa='".$id."'";
        $res = $this->db->query($query);
        return $res->getNumRows();
    }
}
