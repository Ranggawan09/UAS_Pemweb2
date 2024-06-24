<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        helper('sn');
    }
    public function profile()
    {
        $data = [
            'judul' => 'Profil Saya'
        ];
        tampilan('admin/profile', $data);
        // Load view untuk menampilkan profil admin

    }
}
