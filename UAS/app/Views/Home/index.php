<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Kelas 7 Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Siswa Kelas 7</div>
                        <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $jumlahSiswaKelas7; ?></div>
                        <div class="mt-3">
                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                7A: <?= $detailKelas7['A']; ?></div>
                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                7B: <?= $detailKelas7['B']; ?></div>
                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                7C: <?= $detailKelas7['C']; ?></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kelas 8 Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Siswa Kelas 8</div>
                        <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $jumlahSiswaKelas8; ?></div>
                        <div class="mt-3">
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                8A: <?= $detailKelas8['A']; ?></div>
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                8B: <?= $detailKelas8['B']; ?></div>
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                8C: <?= $detailKelas8['C']; ?></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kelas 9 Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Siswa Kelas 9</div>
                        <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $jumlahSiswaKelas9; ?></div>
                        <div class="mt-3">
                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                9A: <?= $detailKelas9['A']; ?></div>
                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                9B: <?= $detailKelas9['B']; ?></div>
                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                9C: <?= $detailKelas9['C']; ?></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->