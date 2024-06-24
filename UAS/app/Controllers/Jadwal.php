<?php

namespace App\Controllers;

use App\Models\M_Jadwal;

class jadwal extends BaseController
{
    protected $jadwal_m;
    protected $id;
    public function __construct()
    {
        $this->jadwal_m = new M_Jadwal();
        helper('sn');
    }

    public function index()
    {
        // Mendapatkan halaman saat ini
        $page = $this->request->getVar('page_jadwal') ?
            $this->request->getVar('page_jadwal') : 1;

        // Mendapatkan kata kunci pencarian
        $katakunci = $this->request->getVar('keyword');
        if ($katakunci) {
            $jadwal = $this->jadwal_m->search($katakunci);
        } else {
            $jadwal = $this->jadwal_m;
        }

        // Mengatur data untuk view
        $data = [
            'judul' => 'Data jadwal',
            'jadwal' => $this->jadwal_m->select('jadwal.*, guru.nama as nama_guru')
                ->join('guru', 'guru.id = jadwal.guru_id')
                ->paginate(10, 'jadwal'),
            'pager' => $jadwal->pager,
            'pageSekarang' => $page
        ];

        // Memuat view
        tampilan('jadwal/index', $data);
    }

    public function hapus($id)
    {
        $this->jadwal_m->delete($id);
        session()->setFlashdata('message', 'Dihapus');
        return redirect()->to('/jadwal')->with('message', 'dihapus');
    }


    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'hari' => [
                    'rules' => 'required'
                ],
                'mapel' => [
                    'rules' => 'required'
                ],
                'kelas' => [
                    'rules' => 'required'
                ],
                'jam' => [
                    'rules' => 'required'
                ]
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $page = $this->request->getVar('page_jadwal') ? $this->request->getVar('page_jadwal') : 1;

                $data = [
                    'judul' => 'Data jadwal',
                    'jadwal' => $this->jadwal_m->select('jadwal.*, guru.nama as nama_guru')
                        ->join('guru', 'guru.id = jadwal.guru_id')
                        ->paginate(10, 'jadwal'),
                    'pager' => $this->jadwal_m->pager,
                    'pageSekarang' => $page
                ];
                //load view
                tampilan('jadwal/index', $data);
            } else {
                $data = [
                    'hari' => $this->request->getPost('hari'),
                    'mapel' => $this->request->getPost('mapel'),
                    'guru_id' => $this->request->getPost('guru_id'),
                    'kelas' => $this->request->getPost('kelas'),
                    'jam' => $this->request->getPost('jam')
                ];

                //insert data
                $success = $this->jadwal_m->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    // Dapatkan halaman saat ini dari URL atau setel ke 1 jika tidak ada
                    $page = $this->request->getVar('page_jadwal') ? $this->request->getVar('page_jadwal') : 1;
                    return redirect()->to(base_url('jadwal?page_jadwal=' . $page));
                }
            }
        } else {
            $page = $this->request->getVar('page_jadwal') ? $this->request->getVar('page_jadwal') : 1;
            return redirect()->to(base_url('jadwal?page_jadwal=' . $page));
        }
    }

    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $val = $this->validate([
                'hari' => [
                    'rules' => 'required'
                ],
                'mapel' => [
                    'rules' => 'required'
                ],
                'kelas' => [
                    'rules' => 'required'
                ],
                'jam' => [
                    'rules' => 'required'
                ]
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $page = $this->request->getVar('page_jadwal') ? $this->request->getVar('page_jadwal') : 1;

                $data = [
                    'judul' => 'Data jadwal',
                    'jadwal' => $this->jadwal_m->select('jadwal.*, guru.nama as nama_guru')
                        ->join('guru', 'guru.id = jadwal.guru_id')
                        ->paginate(10, 'jadwal'),
                    'pager' => $this->jadwal_m->pager,
                    'pageSekarang' => $page
                ];
                //load view
                tampilan('jadwal/index', $data);
            } else {
                $id = $this->request->getPost('id');

                $data = [
                    'hari' => $this->request->getPost('hari'),
                    'mapel' => $this->request->getPost('mapel'),
                    'guru_id' => $this->request->getPost('guru_id'),
                    'kelas' => $this->request->getPost('kelas'),
                    'jam' => $this->request->getPost('jam')
                ];

                //update data
                $success = $this->jadwal_m->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'Diubah');
                    // Dapatkan halaman saat ini dari URL atau setel ke 1 jika tidak ada
                    $page = $this->request->getVar('page_jadwal') ? $this->request->getVar('page_jadwal') : 1;
                    return redirect()->to(base_url('jadwal?page_jadwal=' . $page));
                }
            }
        } else {
            $page = $this->request->getVar('page_jadwal') ? $this->request->getVar('page_jadwal') : 1;
            return redirect()->to(base_url('jadwal?page_jadwal=' . $page));
        }
    }
}
