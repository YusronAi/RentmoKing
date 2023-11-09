<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row align-items-center justify-content-center">
        <?php foreach ($customers as $customer) : ?>
            <?php $i = 1; ?>
            <div class="col-auto mt-4">
                <div class="card" style="width: 25rem;">
                    <img src="/img/<?= $customer['foto']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Nama : <?= $customer['nama']; ?></p>
                        <p class="card-text">Jenis Kelamin : <?= $customer['jenis_kelamin']; ?></p>
                        <p class="card-text">No Identitas : <?= $customer['no_identitas']; ?></p>
                        <p class="card-text">Universitas : <?= $customer['universitas']; ?></p>
                        <p class="card-text">Alamat Asal : <?= $customer['alamat_asal']; ?></p>
                        <p class="card-text">Alamat Sekarang : <?= $customer['alamat_sekarang']; ?></p>
                        <p class="card-text">Telephone : <?= $customer['telphone']; ?></p>
                    </div>
                </div>
            </div>
            <?php $i++ ?>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>