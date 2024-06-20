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
            th:nth-child(5),
            td:nth-child(5),
            footer, 
            a#debug-icon-link {
                display: none;
            }
        }
     </style>

    <div class="row">
        <div class="col-md-8">
            <?php
            if (session()->get('err')) {
                echo "<div class='alert alert-danger p-0 pt-2' role='alert'>" . session()->get('err') . "</div>";
                session()->remove('err');
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


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>NIP</th>
                    <th>NAMA</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (10 * ($pageSekarang - 1)) ?>
                <?php foreach ($guru as $row) : ?>
                    <tr>
                        <td scope="row"><?= $i++; ?></td>
                        <td><img width="50" src="<?= '/assets/img/guru/' . $row['gambar']; ?>" class="rounded"></td>
                        <td><?= $row['nip']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" class="btn btn-sm btn-warning" data-id="<?= $row['id']; ?>" data-gambar="<?= $row['gambar']; ?>" data-nip="<?= $row['nip']; ?>" data-nama="<?= $row['nama']; ?>"> <i class="fa fa-edit"></i> </button>
                            <a href="/guru/hapus/<?= $row['id']; ?>" class="btn btn-sm btn-danger btn-hapus"> <i class="fa fa-trash-alt"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
    <div class="d-flex justify-content-center">
    <?= $pager->links('guru', 'guru_pager'); ?>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Box Tambah Data Guru -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('guru/tambah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <input type="file" name="gambar" class="dropify" data-height="100">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan nip">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama guru">
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

<!-- Modal Box Ubah Data Guru -->
<div class="modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('guru/ubah'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id-guru">
                <div class="form-group mb-2">
                    <input type="file" name="gambar" id="gambar" class="dropify" data-height="100" data-default-file="<?= '/assets/img/guru/' . $row['gambar']; ?>">
                </div>
                    <div class="form-group mb-2">
                        <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan nip">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama guru">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-primary">Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>