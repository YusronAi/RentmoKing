<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row align-items-center justify-content-center">

        <?php foreach ($motors as $motor) : ?>
            <?php $i = 1; ?>
            <div class="col-auto mt-4">
                <div class="card" style="width: 25rem;">
                    <img src="/img/<?= $motor['foto']; ?>" class="card-img-top" alt="..." style="filter: brightness(0.5);">
                    <div class="card-body text-light" style="position: absolute;">
                        <p class="card-text">Merek : <?= $motor['merek']; ?></p>
                        <p class="card-text">No Polisi : <?= $motor['no_polisi']; ?></p>
                        <p class="card-text">Warna : <?= $motor['warna']; ?></p>
                        <p class="card-text">Status : <?= $motor['status']; ?></p>
                    </div>
                </div>
            </div>
            <?php $i++ ?>
        <?php endforeach; ?>

    </div>
</div>
<?= $this->endSection(); ?>