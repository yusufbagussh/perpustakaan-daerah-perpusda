<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamKembaliModel extends Model
{
    protected $table      = 'pinjam_kembali';
    protected $primaryKey = 'pinjam_kembali_id';
    protected $allowedFields = ['pinjam_kembali_id', 'pinjam_kembali_anggota_id', 'pinjam_kembali_buku_id', 'tanggal_pinjam', 'tanggal_kembali', 'pinjam_kembali_status'];

    public function dataStatus()
    {
        return
            $this
            ->join('anggota', 'anggota.anggota_id=pinjam_kembali.pinjam_kembali_anggota_id')
            ->join('buku', 'buku.buku_id=pinjam_kembali.pinjam_kembali_buku_id')
            ->get()->getResultArray();
    }

    public function detailDataStatus($pinjam_kembali_id)
    {
        return
            $this
            ->join('anggota', 'anggota.anggota_id=pinjam_kembali.pinjam_kembali_anggota_id')
            ->join('buku', 'buku.buku_id=pinjam_kembali.pinjam_kembali_buku_id')
            ->where('pinjam_kembali_id', $pinjam_kembali_id)
            ->first();
    }
}
