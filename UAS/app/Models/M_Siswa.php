<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Siswa extends Model {
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nisn', 'nama', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 
    'penghasilan_ayah', 'pengasilan_ibu', 'telepon'];

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = null)
    {
        if ($id == null){
        return $this->builder->get()->getResultArray();
        } else {
            $this->builder->where('id', $id);
            return $this->builder->get()->getRowArray();
        }
        
    }

    public function tambah ($data)
    {
       return $this->builder->insert($data);
    }
    public function ubah ($data, $id)
    {
       return $this->builder->update($data, ['id' => $id]);
    }
}

