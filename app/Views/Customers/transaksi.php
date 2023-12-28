<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row align-items-center justify-content-center">
        <?php foreach ($transaksi as $item) : ?>
            <?php $i = 1; ?>
            <div class="col-auto mt-4">
                <div class="card" style="width: 25rem;">
                    <img src="/img/<?= $item['foto']; ?>" class="card-img-top" alt="...">
                    <div class="card-body text-white" style="position: absolute;">
                        <p class="card-text">Nama : <?= $item['nama']; ?></p>
                        <p class="card-text">Jenis Kelamin : <?= $item['jenis_kelamin']; ?></p>
                        
                        <p class="card-text">Alamat Sekarang : <?= $item['alamat_sekarang']; ?></p>
                        <?php foreach ($motor as $item): ?>
                            <?php $i = 1; ?>
                        <p class="card-text">Merek Motor : <?= $item['merek']; ?></p>
                        <?php $i++ ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php $i++ ?>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>