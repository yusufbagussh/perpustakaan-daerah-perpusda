<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?= $judul; ?></h1>
            <div class="col-6">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="myInput" placeholder="Masukkan Keyword" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php $i = 1; ?>
                    <?php foreach ($listPeminjaman as $peminjaman) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $peminjaman['anggota_nama']; ?></td>
                            <td><?= $peminjaman['buku_judul']; ?></td>
                            <td><?= $peminjaman['tanggal_pinjam']; ?></td>
                            <td><?= $peminjaman['tanggal_kembali']; ?></td>
                            <td><?= $peminjaman['pinjam_kembali_status']; ?></td>
                            <td>
                                <a href="/pinjamkembali/ubah/<?= $peminjaman['pinjam_kembali_id']; ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>