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
    $pager = \Config\Services::pager();
    // Mendapatkan halaman saat ini
    $page = $this->request->getVar('page_siswa') ? 
    $this->request->getVar('page_siswa') : 1;

    // Mendapatkan kata kunci pencarian
    $katakunci = $this->request->getVar('keyword');
    if ($katakunci) {
        $siswa = $this->siswa_m->search($katakunci);
    } else {
        $siswa = $this->siswa_m;
    }

    // Mengatur data untuk view
    $data = [
        'judul' => 'Data Siswa',
        'siswa' => $siswa->paginate(10, 'siswa'),
        'pager' => $siswa->pager,
        'pageSekarang' => $page
    ];

    // Memuat view
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
                $page = $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') : 1;
                
                $data = [
                    'judul' => 'Data Siswa',
                    'siswa' => $this->siswa_m->paginate(10, 'siswa'),
                    'pager' => $this->siswa_m->pager,
                    'pageSekarang' => $page
                ];
                //load view
                tampilan('siswa/index', $data);
            } else {
                $data = [
                    'nisn' => $this->request->getPost('nisn'),
                    'nama' => $this->request->getPost('nama'),
                    'kelas' => $this->request->getPost('kelas'),
                    'alamat' => $this->request->getPost('alamat'),
                    'telepon' => $this->request->getPost('telepon')
                ];

                //insert data
                $success = $this->siswa_m->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    // Dapatkan halaman saat ini dari URL atau setel ke 1 jika tidak ada
                $page = $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') : 1;
                return redirect()->to(base_url('siswa?page_siswa=' . $page));
                }
            }
        } else {
            $page = $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') : 1;
            return redirect()->to(base_url('siswa?page_siswa=' . $page));
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

                $page = $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') : 1;
            
            $data = [
                'judul' => 'Data Siswa',
                'siswa' => $this->siswa_m->paginate(10, 'siswa'),
                'pager' => $this->siswa_m->pager,
                'pageSekarang' => $page
            ];
                //load view
                tampilan('siswa/index', $data);
            } else {
                $id = $this->request->getPost('id');

                $data = [
                    'nisn' => $this->request->getPost('nisn'),
                    'nama' => $this->request->getPost('nama'),
                    'kelas' => $this->request->getPost('kelas'),
                    'alamat' => $this->request->getPost('alamat'),
                    'telepon' => $this->request->getPost('telepon')
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
