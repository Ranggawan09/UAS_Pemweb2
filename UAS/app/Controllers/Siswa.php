<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Siswa;
use Predis\Command\Redis\FUNCTIONS;


class Siswa extends BaseController
{

    protected $siswa_m;
    protected $id;
    public function __construct()
    {
        $this->siswa_m = new M_Siswa();
        helper('sn');
    }

    public function index()
    {
        $katakunci = $this->request->getVar('keyword');
        if ($katakunci) {
            $guru = $this->siswa_m->search($katakunci);
        } else {
            $guru = $this->siswa_m;
        }

        $data = [
            'judul' => 'Data Siswa',
            'siswa' => $this->siswa_m->getAllData()
        ];
        // Load view
        tampilan('siswa/index', $data);
    }

    public function hapus($id)
    {
        $this->siswa_m->delete($id);
        session()->setFlashdata('message', 'Dihapus');
        return redirect()->to('/siswa')->with('message', 'dihapus');
    }


    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nisn' => [
                    'label' => 'Nomor Induk Siswa Nasional',
                    'rules' => 'required|numeric|is_unique[siswa.nisn]'
                ],
                'nama' => [
                    'label' => 'Nama siswa',
                    'rules' => 'required'
                ]
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Siswa',
                    'siswa' => $this->siswa_m->getAllData()
                ];
                //load view
                tampilan('siswa/index', $data);
            } else {
                $data = [
                    'nisn' => $this->request->getPost('nisn'),
                    'nama' => $this->request->getPost('nama'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                    'nama_ibu' => $this->request->getPost('nama_ibu'),
                    'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
                    'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
                    'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
                    'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu'),
                    'telepon' => $this->request->getPost('telepon')
                ];

                //insert data
                $success = $this->siswa_m->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('siswa'));
                }
            }
        } else {
            return redirect()->to(base_url('siswa'));
        }
    }

    public function ubah()
    {
        if (isset($_POST['ubah'])) {

            $id = $this->request->getPost('id');
            $nisn = $this->request->getPost('nisn');
            $db_nisn = $this->siswa_m->getAllData($id)['nisn'];

            if ($nisn === $db_nisn) {
                $val = $this->validate([
                    'nisn' => [
                        'label' => 'Nomor Induk Siswa Nasional',
                        'rules' => 'required|numeric'
                    ],
                    'nama' => [
                        'label' => 'Nama siswa',
                        'rules' => 'required'
                    ]
                ]);
            } else {
                $val = $this->validate([
                    'nisn' => [
                        'label' => 'Nomor Induk Siswa Nasional',
                        'rules' => 'required|is_unique[siswa.nisn]|numeric'
                    ],
                    'nama' => [
                        'label' => 'Nama siswa',
                        'rules' => 'required'
                    ]
                ]);
            }
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Siswa',
                    'siswa' => $this->siswa_m->getAllData()
                ];
                //load view
                tampilan('siswa/index', $data);
            } else {
                $id = $this->request->getPost('id');

                $data = [
                    'nisn' => $this->request->getPost('nisn'),
                    'nama' => $this->request->getPost('nama'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                ];

                //update data
                $success = $this->siswa_m->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'Diubah');
                    return redirect()->to(base_url('siswa'));
                }
            }
        } else {
            return redirect()->to(base_url('siswa'));
        }
    }
}
