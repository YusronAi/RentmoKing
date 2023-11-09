<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row align-items-center justify-content-center">
            <div class="col-auto mt-4">
                <div class="card" style="width: 25rem;">
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