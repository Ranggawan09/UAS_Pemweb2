<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nisn', 'nama', 'kelas', 'alamat', 'telepon'];


    public function getAllData($id = false)
    {
        if ($id == false) {
            return $this->db->table('siswa')->get()->getResultArray();
        } else {
            $this->db->table('siswa')->where('id', $id);
            return $this->db->table('siswa')->get()->getRowArray();
        }
    }
    public function search($katakunci)
    {
        return $this->table('siswa')->like('nama', $katakunci)
            ->orLike('nisn', $katakunci)->orLike('kelas', $katakunci);
    }

    public function tambah($data)
    {
        return $this->db->table('siswa')->insert($data);
    }
    public function ubah($data, $id)
    {
        return $this->db->table('siswa')->update($data, ['id' => $id]);
    }

    public function getJumlahSiswaByKelas($kelas)
    {
        return $this->like('kelas', $kelas, 'after')->countAllResults();
    }

    public function getJumlahSiswaBySubKelas($kelas, $subkelas)
    {
        return $this->where('kelas', "{$kelas}{$subkelas}")->countAllResults();
    }
}
