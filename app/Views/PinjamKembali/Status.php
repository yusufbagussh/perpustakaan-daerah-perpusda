<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1><?= $judul; ?></h1>
            <br>
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
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php $i = 1; ?>
                    <?php foreach ($listStatus as $status) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $status['anggota_nama']; ?></td>
                            <td><?= $status['buku_judul']; ?></td>
                            <td><?= $status['tanggal_pinjam']; ?></td>
                            <td><?= $status['tanggal_kembali']; ?></td>
                            <td><?= $status['pinjam_kembali_status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>