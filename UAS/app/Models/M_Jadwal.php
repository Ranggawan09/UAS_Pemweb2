<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Jadwal extends Model {
    public $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['hari', 'mapel', 'kelas', 'jam', 'guru_id'];

    public function getAllData($id = false)
    {
        $this->select('jadwal.*, guru.nama as nama_guru')
             ->join('guru', 'guru.id = jadwal.guru_id');
        if ($id == false) {
            return $this->table($this->table)->get()->getResultArray();
        } else {
            return $this->table($this->table)->where('jadwal.id', $id)->get()->getRowArray();
        }
    }

    public function search($katakunci)
    {
        return $this->table($this->table)->
        like('hari', $katakunci)
        ->orLike('mapel', $katakunci)
        ->orLike('kelas', $katakunci)
        ->orLike('guru.nama', $katakunci);
    }

    public function tambah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function ubah($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}
