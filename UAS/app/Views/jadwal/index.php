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
            th:nth-child(4),
            td:nth-child(4),
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
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalTambah" id="btn-tambah">
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
            <input type="text" class="form-control rounded mr-2" placeholder="Masukkan mapel / hari / Kelas" aria-label="Cari" name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary rounded" type="submit" name="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </div>
    </form>
    </div>
</div>

<?php if (!empty($jadwal)): ?>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>HARI</th>
                    <th>MAPEL</th>
                    <th>Guru Pengajar</th>
                    <th>KELAS</th>
                    <th>JAM</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1 + (10 * ($pageSekarang - 1)); ?>
                <?php foreach ($jadwal as $row) : ?>
                    <tr>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= $row['hari']; ?></td>
                        <td><?= $row['mapel']; ?></td>
                        <td><?= isset($row['nama_guru']) ? $row['nama_guru'] : 'Tidak ada'; ?></td>
                        <td><?= $row['kelas']; ?></td>
                        <td><?= $row['jam']; ?></td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" class="btn btn-sm btn-warning" data-id="<?= $row['id']; ?>" 
                            data-hari="<?= $row['hari']; ?>" data-mapel="<?= $row['mapel']; ?>" data-guru="<?= $row['nama_guru']; ?>" data-kelas="<?= $row['kelas']; ?>"
                            data-jam="<?= $row['jam']; ?>"> <i class="fa fa-edit"></i> </button>
                            <a href="/jadwal/hapus/<?= $row['id']; ?>" class="btn btn-sm btn-danger btn-hapus"> <i class="fa fa-trash-alt"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
<div class="alert alert-warning">Data tidak ditemukan.</div>

<?php endif; ?>
        </div>
        <br>
        <div class="d-flex justify-content-center">
    <?= $pager->links('jadwal', 'template_pager'); ?>
    </div>

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
                
                    <form action="<?= base_url("jadwal/tambah"); ?>" method="post">
                    <?php if (session()->getFlashdata('err')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('err') ?>
                    </div>
                <?php endif; ?>
                <input type="hidden" name="page_jadwal" value="<?= $pageSekarang ?>">
                        <div class="form-group mb-0">
                            <input type="text" name="hari" id="hari" class="form-control" placeholder="Masukkan Hari">
                        </div>
                        <br>
                        <div class="form-group mb-0">
                            <input type="text" name="mapel" id="mapel" class="form-control" placeholder="Masukkan Mata Pelajaran">
                        </div>
                        <div class="form-group mb-0">
                            <input type="text" name="nama_guru" id="nama_guru" class="form-control" placeholder="Masukkan Guru Pengajar">
                        </div>
                        <div class="form-group mb-0">
                            <label for="kelas"></label>
                            <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukkan Kelas">
                        </div>
                        <div class="form-group mb-0">
                            <label for="jam"></label>
                            <input type="text" name="jam" id="jam" class="form-control" placeholder="Masukkan jam Pelajaran">
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
                    <form action="<?= base_url("jadwal/ubah"); ?>" method="post">
                        <input type="hidden" name="id" id="id-jadwal">
                        <div class="form-group mb-0">
                            <label for="hari"></label>
                            <input type="text" name="hari" id="hari" class="form-control" placeholder="Masukkan hari" value="<?= old('hari') ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="mapel"></label>
                            <input type="text" name="mapel" id="mapel" class="form-control" placeholder="Masukkan mapel" value="<?= old('mapel') ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama_guru"></label>
                            <input type="text" name="nama_guru" id="nama_guru" class="form-control" placeholder="Masukkan Guru Pengajar" value="<?= old('nama_guru') ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="kelas"></label>
                            <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukkan kelas" value="<?= old('kelas') ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="jam"></label>
                            <input type="text" name="jam" id="jam" class="form-control" placeholder="Masukkan jam" value="<?= old('jam') ?>">
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