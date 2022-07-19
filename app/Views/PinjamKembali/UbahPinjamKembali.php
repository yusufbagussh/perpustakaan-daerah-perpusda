<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>/favicon.svg" type="image/gif">
    <title>E-Perpustakaan | Form Peminjaman</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1><?= $judul; ?> - Lengkapi Data Anda</h1>
                <form class="mt-3" method="POST" action="/pinjamkembali/update/<?= $peminjaman['pinjam_kembali_id']; ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="pinjam_kembali_anggota_id" class="col-sm-2 col-form-label">Nama Peminjam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pinjam_kembali_anggota_id" name="pinjam_kembali_anggota_id" autofocus value="<?= $peminjaman['anggota_nama']; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= $validation->getError('pinjam_kembali_anggota_id'); ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="pinjam_kembali_anggota_id" value="<?= $peminjaman['anggota_id']; ?>">
                    <div class="form-group row">
                        <label for="pinjam_kembali_buku_id" class="col-sm-2 col-form-label">Judul Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pinjam_kembali_buku_id" name="pinjam_kembali_buku_id" autofocus value="<?= $peminjaman['buku_judul']; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= $validation->getError('pinjam_kembali_buku_id'); ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="pinjam_kembali_buku_id" value="<?= $peminjaman['buku_id']; ?>">
                    <div class="form-group row">
                        <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Mulai Peminjaman</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= (old('tanggal_pinjam')) ? old('tanggal_pinjam') : $peminjaman['tanggal_pinjam']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= (old('tanggal_kembali')) ? old('tanggal_kembali') : $peminjaman['tanggal_kembali']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pinjam_kembali_status" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="pinjam_kembali_status">
                                <option value="Proses Validasi" <?= $peminjaman['pinjam_kembali_status'] == "Proses Validasi" ? "selected" : ""; ?>>Proses Validasi</option>
                                <option value="Ditolak" <?= $peminjaman['pinjam_kembali_status'] == "Ditolak" ? "selected" : ""; ?>>Ditolak</option>
                                <option value="Dipinjam" <?= $peminjaman['pinjam_kembali_status'] == "Dipinjam" ? "selected" : ""; ?>>Dipinjam</option>
                                <option value="Dikembalikan" <?= $peminjaman['pinjam_kembali_status'] == "Dikembalikan" ? "selected" : ""; ?>>Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/home/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>