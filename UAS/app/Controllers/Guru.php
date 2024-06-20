<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Guru;

class Guru extends BaseController
{
    protected $guru_m, $pager;

    public function __construct()
    {
        $this->guru_m = new M_Guru();
        helper('sn');
        //$this->pager = \Config\Services::pager();
    }

    public function index()
    {
        $pageSekarang = $this->request->getVar('page_guru')
            ? $this->request->getVar('page_guru') : 1;

        $katakunci = $this->request->getVar('keyword');
        if ($katakunci) {
            $guru = $this->guru_m->search($katakunci);
        } else {
            $guru = $this->guru_m;
        }

        $data = [
            'judul' => 'Data Guru',
            //'guru' => $this->guru_m->getAllData()
            'guru' => $guru->paginate('10', 'guru'),
            'pager' => $this->guru_m->pager,
            'pageSekarang' => $pageSekarang
        ];
        // load view
        tampilan('guru/index', $data);
    }

    public function hapus($id)
    {
        $data = [
            'guru' => $this->guru_m->getAllData($id)
        ];

        $this->guru_m->delete($id);

        //hapus gambar
        $img = $data['guru']['gambar'];

        if ($img != 'default.png') {
            unlink(FCPATH . 'assets/img/guru/' . $img);
        }

        session()->setFlashdata('message', 'Dihapus');
        return redirect()->to('/guru')->with('message', 'dihapus');
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'Gambar' => [
                    'rules' => 'is_image[gambar]|mime_in[gambar,image/png,image/jpg,image/jpeg]|max_size[gambar,4024]',],

                'nip' => [
                    'label' => 'Nomor Induk Pegawai',
                    'rules' => 'required|numeric|is_unique[guru.nip]'
                ],
                'nama' => [
                    'label' => 'Nama guru',
                    'rules' => 'required'
                ]
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Guru',
                    'guru' => $this->guru_m->getAllData()
                ];
                //load view
                tampilan('guru/index', $data);
            } else {
                // Ambil file gambar
                $gambar = $this->request->getFile('gambar');

                // Cek apakah ada gambar yang diunggah
                if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                    // Jika ada gambar, beri nama acak dan pindahkan ke folder tujuan
                    $newGambar = $gambar->getRandomName();
                    $gambar->move('./assets/img/guru', $newGambar);
                } else {
                    // Jika tidak ada gambar, gunakan gambar default
                    $newGambar = 'default.png';
                }

                $data = [
                    'nip' => $this->request->getPost('nip'),
                    'nama' => $this->request->getPost('nama'),
                    'gambar' => $newGambar
                ];


                //insert data
                $success = $this->guru_m->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('guru'));
                }
            }
        } else {
            return redirect()->to(base_url('guru'));
        }
    }

    public function ubah()
    {
        if (isset($_POST['ubah'])) {

            $id = $this->request->getPost('id');
            $nip = $this->request->getPost('nip');
            $db_nip = $this->guru_m->getNipById($id);

            if ($nip === $db_nip) {
                $val = $this->validate([
                    'gambar' => [
                    'rules' => 'max_size[gambar,4024]|mime_in[gambar,image/png,image/jpeg]|is_image[gambar]',
                ],
                    'nip' => [
                        'label' => 'Nomor Induk Pegawai',
                        'rules' => 'required|numeric'
                    ],
                    'nama' => [
                        'label' => 'Nama guru',
                        'rules' => 'required'
                    ]
                ]);
            } else {
                $val = $this->validate([
                    'gambar' => [
                    'rules' => 'max_size[gambar,4024]|mime_in[gambar,image/png,image/jpeg]|is_image[gambar]',
                ],
                    'nip' => [
                        'label' => 'Nomor Induk guru Nasional',
                        'rules' => 'required|is_unique[guru.nip]|numeric'
                    ],
                    'nama' => [
                        'label' => 'Nama guru',
                        'rules' => 'required'
                    ]
                ]);
            }
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data guru',
                    'guru' => $this->guru_m->getAllData()
                ];
                //load view
                tampilan('guru/index', $data);
            } else {
                // Ambil file gambar
                $gambar = $this->request->getFile('gambar');
                $currentGambar = $this->guru_m->getGambarById($id); // Ambil nama gambar yang sudah ada di database

                // Cek apakah ada gambar yang diunggah
                if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                    // Jika ada gambar, beri nama acak dan pindahkan ke folder tujuan
                    $newGambar = $gambar->getRandomName();
                    $gambar->move('./assets/img/guru', $newGambar);
                } else {
                    // Jika tidak ada gambar baru, gunakan gambar lama yang ada di database
                    $newGambar = $currentGambar;
                }

                $data = [
                    'nip' => $this->request->getPost('nip'),
                    'nama' => $this->request->getPost('nama'),
                    'gambar' => $newGambar
                ];

                //update data
                $success = $this->guru_m->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'Diubah');
                    return redirect()->to(base_url('guru'));
                }
            }
        } else {
            return redirect()->to(base_url('guru'));
        }
    }

}
