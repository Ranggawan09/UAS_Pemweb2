<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['gambar', 'nama', 'nip'];

    public function getAllData($id = false)
    {
        if ($id == false) {
            return $this->db->table('guru')->get()->getResultArray();
        } else {
            $this->table('guru')->where('id', $id);
            return $this->db->table('guru')->get()->getRowArray();
        }
    }

    public function search($katakunci)
    {
        return $this->table('guru')->like('nama', $katakunci)
            ->orLike('nip', $katakunci);
    }

    public function tambah($data)
    {
        return $this->db->table('guru')->insert($data);
    }

    public function ubah($data, $id)
    {
        return $this->db->table('guru')->update($data, ['id' => $id]);
    }

    public function getGambarById($id)
    {
        return $this->db->table('guru')->select('gambar')->where('id', $id)->get()->getRowArray()['gambar'];
    }
    public function getNipById($id)
    {
        return $this->db->table('guru')->select('nip')->where('id', $id)->get()->getRowArray()['nip'];
    }
}
