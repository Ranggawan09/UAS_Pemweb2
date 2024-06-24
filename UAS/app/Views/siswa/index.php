<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <!-- Sweet Alert 2 -->
    <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>

    <!-- Print -->
    <style>
        @media print {
            @page {
                margin-top: 30px;
                margin-bottom: 10px;
            }

            .navbar-nav,
            .card-header,
            .btn,
            .pagination,
            th:nth-child(5),
            td:nth-child(5),
            footer,
            a#debug-icon-link {
                display: none;
            }
        }
    </style>

    <div class="row">
        <div class="col-md-6">
            <?php
            if (session()->get('err')) {
                echo "<div class='alert alert-primary' role='alert'>" . session()->get('err') . "</div>";
            }
            ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Button trigger tambah -->
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalTambah" id="btn-tambah">
                    <i class="fa fa-plus"></i>
                    Tambah Data
                </button>

                <!-- Button trigger print -->
                <button onclick="window.print()" class="btn btn-outline-secondary shadow mx-2">
                    <i class="fa fa-print"></i>
                    Print
                </button>

                <!-- Search bar -->
                <form action="" method="post" class="ml-auto">
                    <div class="input-group">
                        <input type="text" class="form-control rounded mr-2" placeholder="Masukkan Nama / NISN / Kelas" aria-label="Cari" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary rounded" type="submit" name="submit">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if (!empty($siswa)) : ?>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (10 * ($pageSekarang - 1)); ?>
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $row['nisn']; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['kelas']; ?></td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#modalDetail" id="btn-detail" class="btn btn-sm btn-success" data-id="<?= $row['id']; ?>" data-nisn="<?= $row['nisn']; ?>" data-nama="<?= $row['nama']; ?>" data-kelas="<?= $row['kelas']; ?>" data-alamat="<?= $row['alamat']; ?>" data-telepon="<?= $row['telepon']; ?>"> <i class="fa fa-info"></i> </button>

                                    <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" class="btn btn-sm btn-warning" data-id="<?= $row['id']; ?>" data-nisn="<?= $row['nisn']; ?>" data-nama="<?= $row['nama']; ?>" data-kelas="<?= $row['kelas']; ?>" data-alamat="<?= $row['alamat']; ?>" data-telepon="<?= $row['telepon']; ?>"> <i class="fa fa-edit"></i> </button>
                                    <a href="/siswa/hapus/<?= $row['id']; ?>" class="btn btn-sm btn-danger btn-hapus"> <i class="fa fa-trash-alt"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert alert-warning">Data tidak ditemukan.</div>
            <?php endif; ?>
            </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <?= $pager->links('siswa', 'template_pager'); ?>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah
                    <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <form action="<?= base_url("siswa/tambah"); ?>" method="post">
                        <?php if (session()->getFlashdata('err')) : ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('err') ?>
                            </div>
                        <?php endif; ?>
                        <input type="hidden" name="page_siswa" value="<?= $pageSekarang ?>">
                        <div class="form-group mb-0">
                            <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN">
                        </div>
                        <br>
                        <div class="form-group mb-0">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group mb-0">
                            <label for="kelas"></label>
                            <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukkan Kelas">
                        </div>
                        <div class="form-group mb-0">
                            <label for="alamat"></label>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group mb-0">
                            <label for="telepon"></label>
                            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan Nomor Telepon">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ubah Data -->
<div class="modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit
                    <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="<?= base_url("siswa/ubah"); ?>" method="post">
                        <input type="hidden" name="id" id="id-siswa">
                        <div class="form-group mb-0">
                            <label for="nisn"></label>
                            <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN" value="<?= old('nisn') ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama"></label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" value="<?= old('nama') ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="kelas"></label>
                            <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukkan kelas" value="<?= old('kelas') ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="alamat"></label>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?= old('alamat') ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="telepon"></label>
                            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan Nomor Telepon" value="<?= old('telepon') ?>">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detail Data -->
<div class="modal fade" id="modalDetail">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <input type="hidden" name="id" id="id-siswa">
                    <div class="form-group mb-0">
                        <label for="nisn">NISN:</label>
                        <p id="nisn"></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="nama">Nama:</label>
                        <p id="nama"></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="kelas">Kelas:</label>
                        <p id="kelas"></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="telepon">Telepon:</label>
                        <p id="telepon"></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="alamat">Alamat:</label>
                        <p id="alamat"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>