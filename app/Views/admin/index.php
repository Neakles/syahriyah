<?= $this->extend('layout/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <!-- Total Santri Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Tagihan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 1.234.567</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kas Keluar Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Tagihan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3 Bulan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Santri</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    Tunggakan Santri
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Nominal</td>
                                <td>Kamar</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Cahyo</td>
                                <td>2.250.000</td>
                                <td>Kalijaga</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Cahyo</td>
                                <td>2.250.000</td>
                                <td>Kalijaga</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Cahyo</td>
                                <td>2.250.000</td>
                                <td>Kalijaga</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    Tunggakan Santri
                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur natus quia illo nobis maiores inventore iusto corporis, magnam quasi temporibus iure laboriosam reiciendis quibusdam nemo? Voluptatem eos facere possimus dolorem?
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>