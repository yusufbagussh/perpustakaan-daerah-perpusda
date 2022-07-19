<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Pages extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->anggotaModel = new AnggotaModel();
    }
    public function index()
    {
        if (in_groups('member')) {
            if (empty($this->anggotaModel->getAnggotaById(user_id()))) {
                session();
                $data = [
                    'judul' => 'E-Perpustakaan',
                    'validation' => \Config\Services::validation()
                ];
                return view('anggota/Registrasi', $data);
            }
            $data = [
                'judul' => 'E-Perpustakaan',
            ];
            return view('pages/home', $data);
        } else if (in_groups('admin')) { {
                return redirect()->to('/buku');
            }
        } else if (in_groups('superadmin')) {
            return redirect()->to('/buku');
        }
    }
}
