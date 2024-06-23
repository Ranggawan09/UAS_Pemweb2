<?php

namespace App\Controllers;
use App\Models\M_Siswa;

class Home extends BaseController
{
    protected $siswa_m;
    public function __construct()
    {
        helper('sn');
        $this->siswa_m = new M_Siswa();
    }
    
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'jumlahSiswaKelas7' => $this->siswa_m->getJumlahSiswaByKelas(7),
            'jumlahSiswaKelas8' => $this->siswa_m->getJumlahSiswaByKelas(8),
            'jumlahSiswaKelas9' => $this->siswa_m->getJumlahSiswaByKelas(9),
            'detailKelas7' => [
                'A' => $this->siswa_m->getJumlahSiswaBySubKelas(7, 'A'),
                'B' => $this->siswa_m->getJumlahSiswaBySubKelas(7, 'B'),
                'C' => $this->siswa_m->getJumlahSiswaBySubKelas(7, 'C')
            ],
            'detailKelas8' => [
                'A' => $this->siswa_m->getJumlahSiswaBySubKelas(8, 'A'),
                'B' => $this->siswa_m->getJumlahSiswaBySubKelas(8, 'B'),
                'C' => $this->siswa_m->getJumlahSiswaBySubKelas(8, 'C')
            ],
            'detailKelas9' => [
                'A' => $this->siswa_m->getJumlahSiswaBySubKelas(9, 'A'),
                'B' => $this->siswa_m->getJumlahSiswaBySubKelas(9, 'B'),
                'C' => $this->siswa_m->getJumlahSiswaBySubKelas(9, 'C')
            ]
        ];
        tampilan('home/index', $data);
    }
}
