<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<div class="row mb-5">
    <div class="col mb-5">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">&nbsp;<?= $jumlahMotor; ?>
                    <i class="fas fa-fw fa-motorcycle"></i>
                </div>
                <div class="mr-5">Data Motor</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/motor/data-motor">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col mb-5">
        <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">&nbsp;<?= $jumlahCustomer; ?>
                    <i class="fas fa-fw fa-users"></i>
                </div>
                <div class="mr-5">Data Customers</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/petugas/data-customers">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col mb-5">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                &nbsp;<?= $jumlahTransaksi; ?>
                    <i class="fas fa-fw fa-exchange-alt"></i>
                </div>
                <div class="mr-5">Data Transaksi</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/petugas/transaksi">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>
<div class="container mb-5 mt-5"></div>
<div class="container mt-5 d-flex justify-content-center">
    <a href="/petugas/input-transaksi"><button class="btn btn-outline-danger btn-lg  rounded-pill">Input Transaksi</button></a>
</div>

<?= $this->endSection(); ?>