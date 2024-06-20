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
            <input type="text" class="form-control rounded mr-2" placeholder="Masukkan Nama / NISN" aria-label="Cari" name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary rounded" type="submit" name="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </div>
    </form>
    </div>
</div>


        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>NAMA</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['nisn']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalDetail" id="btn-detail" class="btn btn-sm btn-success" data-id="<?= $row['id']; ?>" data-nisn="<?= $row['nisn']; ?>" data-nama="<?= $row['nama']; ?>" data-nama_ayah="<?= $row['nama_ayah']; ?>"> <i class="fa fa-info"></i> </button>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" class="btn btn-sm btn-warning" data-id="<?= $row['id']; ?>" data-nisn="<?= $row['nisn']; ?>" data-nama="<?= $row['nama']; ?>" data-nama_ayah="<?= $row['nama_ayah']; ?>"> <i class="fa fa-edit"></i> </button>
                                <a href="/siswa/hapus/<?= $row['id']; ?>" class="btn btn-sm btn-danger btn-hapus"> <i class="fa fa-trash-alt"></i> </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>


            </table>
        </div>
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
                    <form action="<?= base_url("siswa/tambah"); ?>" method="post">
                        <div class="form-group mb-0">
                            <label for="nisn">masukkan nisn</label>
                            <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN">
                        </div>
                        <br>
                        <div class="form-group mb-0">
                            <label for="nama">masukkan nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="nama">
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama_ayah"></label>
                            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" placeholder="Masukkan NAMA AYAH">
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama_ibu"></label>
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="Masukkan NAMA IBU">
                        </div>
                        <div class="form-group mb-0">
                            <label for="pekerjaan_ayah"></label>
                            <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" placeholder="Masukkan PEKERJAAN AYAH">
                        </div>
                        <div class="form-group mb-0">
                            <label for="pekerjaan_ibu"></label>
                            <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" placeholder="Masukkan PEKERJAAN IBU">
                        </div>
                        <div class="form-group mb-0">
                            <label for="penghasilan_ayah"></label>
                            <input type="text" name="penghasilan_ayah" id="penghasilan_ayah" class="form-control" placeholder="Masukkan PENGHASILAN AYAH">
                        </div>
                        <div class="form-group mb-0">
                            <label for="penghasilan_ibu"></label>
                            <input type="text" name="penghasilan_ibu" id="penghasilan_ibu" class="form-control" placeholder="Masukkan PENGHASILAN IBU">
                        </div>
                        <div class="form-group mb-0">
                            <label for="telepon"></label>
                            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan NOMOR TELEPON AKTIF">
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
                            <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN" value="<?= $row['nisn']; ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama"></label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan NAMA" value="<?= $row['nama']; ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama_ayah"></label>
                            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" placeholder="Masukkan NAMA AYAH" value="<?= $row['nama_ayah']; ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama_ibu"></label>
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="Masukkan NAMA IBU" value="<?= $row['nama_ibu']; ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="pekerjaan_ayah"></label>
                            <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" placeholder="Masukkan PEKERJAAN AYAH" value="<?= $row['pekerjaan_ayah']; ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="pekerjaan_ibu"></label>
                            <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" placeholder="Masukkan PEKERJAAN IBU" value="<?= $row['pekerjaan_ibu']; ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="penghasilan_ayah"></label>
                            <input type="text" name="penghasilan_ayah" id="penghasilan_ayah" class="form-control" placeholder="Masukkan PENGHASILAN AYAH" value="<?= $row['penghasilan_ayah']; ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="penghasilan_ibu"></label>
                            <input type="text" name="penghasilan_ibu" id="penghasilan_ibu" class="form-control" placeholder="Masukkan PENGHASILAN IBU" value="<?= $row['penghasilan_ayah']; ?>">
                        </div>
                        <div class="form-group mb-0">
                            <label for="telepon"></label>
                            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan NOMOR TELEPON AKTIF" value="<?= $row['telepon']; ?>">
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
                        <label for="nama_ayah">Nama Ayah:</label>
                        <p id="nama_ayah"></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="nama_ibu">Nama Ibu:</label>
                        <p id="nama_ibu"><?= $row['nama_ibu']; ?></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
                        <p id="pekerjaan_ayah"><?= $row['pekerjaan_ayah']; ?></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
                        <p id="pekerjaan_ibu"><?= $row['pekerjaan_ibu']; ?></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="penghasilan_ayah">Penghasilan Ayah:</label>
                        <p id="penghasilan_ayah"><?= $row['penghasilan_ayah']; ?></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="penghasilan_ibu">Penghasilan Ibu:</label>
                        <p id="penghasilan_ibu"><?= $row['penghasilan_ibu']; ?></p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="telepon">Telepon:</label>
                        <p id="telepon"><?= $row['telepon']; ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
