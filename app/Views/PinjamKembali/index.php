<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container ">
    <div class="row">
        <div class="col-10">
            <br>
            <br>
            <br>
            <h1><?= $judul; ?> - Lengkapi Data Anda</h1>
            <form class="mt-3" method="POST" action="/pinjamkembali/simpan/<?= $buku['buku_slug']; ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row mb-4">
                    <label for="pinjam_kembali_anggota_id" class="col-sm-2 col-form-label">Nama Peminjam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pinjam_kembali_anggota_id" name="pinjam_kembali_anggota_id" value="<?= $anggota['anggota_nama']; ?>" readonly>
                        <div class="invalid-feedback">
                            <?= $validation->getError('pinjam_kembali_anggota_id'); ?>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="pinjam_kembali_anggota_id" value="<?= $anggota['anggota_id']; ?>">
                <div class="form-group row mb-4">
                    <label for="pinjam_kembali_buku_id" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pinjam_kembali_buku_id" name="pinjam_kembali_buku_id" autofocus value="<?= $buku['buku_judul']; ?>" readonly>
                        <div class="invalid-feedback">
                            <?= $validation->getError('pinjam_kembali_buku_id'); ?>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="pinjam_kembali_buku_id" value="<?= $buku['buku_id']; ?>">
                <div class="form-group row">
                    <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Mulai Peminjaman</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= old('tanggal_pinjam'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= old('tanggal_kembali'); ?>">
                    </div>
                </div>
                <input type="hidden" name="pinjam_kembali_status" value="Proses Validasi" id="pinjam_kembali_status">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>