<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">&nbsp;<?= $jumlahMotor; ?>
                    <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Peraturan</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/peraturan">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col mb-3">
        <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">&nbsp;<?= $jumlahCustomer; ?>
                    <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Data Peminjaman</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/petugas/data-peminjaman">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                &nbsp;<?= $jumlahTransaksi; ?>
                    <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">Transaksi</div>
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


<?= $this->endSection(); ?>