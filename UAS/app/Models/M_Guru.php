<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['gambar', 'nama', 'nip'];

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = false)
    {
        if ($id == false) {
            return $this->builder->get()->getResultArray();
        } else {
            $this->builder->where('id', $id);
            return $this->builder->get()->getRowArray();
        }
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    public function hapus($id)
    {
        return $this->builder->delete(['id' => $id]);
    }

    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id' => $id]);
    }
}
