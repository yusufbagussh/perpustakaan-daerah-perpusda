<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PinjamKembaliModel;

class PinjamKembali extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->anggotaModel = new AnggotaModel();
        $this->bukuModel = new BukuModel();
        $this->pinjamkembaliModel = new PinjamKembaliModel();
    }

    public function index($buku_slug = null)
    {
        $data = [
            'judul' => 'Form Peminjaman',
            'anggota' => $this->anggotaModel
                ->join('users', 'users.id=anggota.users_id')
                ->where('id', user()->id)
                ->first(),
            'buku' => $this->bukuModel->where('buku_slug', $buku_slug)->get()->getResultArray()[0],
            'validation' => \Config\Services::validation(),
        ];
        return view('PinjamKembali/index', $data);
    }

    public function simpan($buku_slug)
    {
        // $data = $this->request->getPost();
        if (!$this->validate([
            'tanggal_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal mulai peminjaman harus diisi',
                ]
            ],
            'tanggal_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal mulai peminjaman harus diisi',
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to("/pinjamkembali/index/$buku_slug")->withInput();
        }

        $this->pinjamkembaliModel->save(
            [
                'pinjam_kembali_anggota_id' => $this->request->getVar('pinjam_kembali_anggota_id'),
                'pinjam_kembali_buku_id' => $this->request->getVar('pinjam_kembali_buku_id'),
                'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
                'pinjam_kembali_status' => $this->request->getVar('pinjam_kembali_status')
            ]
        );

        session()->setFlashdata('tambah', 'Data berhasil dimasukkan.');

        return redirect()->to('/buku/listbukuanggota');
    }

    public function ubah($pinjam_kembali_id)
    {
        $data = [
            'judul' => 'Pengubahan Status Peminjaman',
            'validation' => \Config\Services::validation(),
            'peminjaman' => $this->pinjamkembaliModel->detailDataStatus($pinjam_kembali_id)
        ];
        return view('pinjamkembali/ubahpinjamkembali', $data);
    }

    public function update($pinjam_kembali_id)
    {
        if (!$this->validate([
            'pinjam_kembali_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status peminjaman harus diisi',
                ]
            ]
        ])) {
            return redirect()->to("/pinjamkembali/ubah/$pinjam_kembali_id")->withInput();
        }

        $this->pinjamkembaliModel->save(
            [
                'pinjam_kembali_id' => $pinjam_kembali_id,
                'pinjam_kembali_anggota_id' => $this->request->getVar('pinjam_kembali_anggota_id'),
                'pinjam_kembali_buku_id' => $this->request->getVar('pinjam_kembali_buku_id'),
                'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
                'pinjam_kembali_status' => $this->request->getVar('pinjam_kembali_status')
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil dimasukkan.');

        return redirect()->to('/pinjamkembali/listpinjamkembali');
    }

    public function status()
    {
        $data = [
            'judul' => 'Status Peminjaman',
            'listStatus' => $this->pinjamkembaliModel->dataStatus()
        ];
        // dd($data['listStatus']);
        return view('PinjamKembali/Status', $data);
    }

    public function listPinjamKembali()
    {
        $data = [
            'judul' => 'List Peminjaman dan Pengembalian Buku',
            'listPeminjaman' => $this->pinjamkembaliModel->dataStatus()
        ];
        return view('PinjamKembali/listPinjamKembali', $data);
    }
}
