<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row align-items-center justify-content-center">
            <div class="col-auto">
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <p class="card-text">
                            <ol>
                                <li>Data diri customer harus asli, tidak boleh palsu</li>
                                <li>Motor harus kembali utuh</li>
                                <li>Waktu peminjaman melebihi batas, setiap 1 jamnya denda Rp. 10.000</li>
                                <li>Peraturan lain segera menyusul</li>
                            </ol>
                        </p>
                    </div>
                </div>
            </div>
    </div>
</div>

<?= $this->endSection(); ?>