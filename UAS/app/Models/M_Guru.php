<?php

namespace App\Models;

use App\Controllers\Guru;
use CodeIgniter\Model;

class M_Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['gambar', 'nama', 'nip'];

    //public function __construct()
    //{
    //    $this->db = db_connect();
    //    $this->builder = $this->db->table($this->table);
    //}

    public function getAllData($id = false)
    {
        if ($id == false) {
            return $this->db->table('guru')->get()->getResultArray();
        } else {
            $this->builder->where('id', $id);
            return $this->db->table('guru')->get()->getRowArray();
        }
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
    return $this->buildb->table('guru')->select('nip')->where('id', $id)->get()->getRowArray()['nip'];
}

}
