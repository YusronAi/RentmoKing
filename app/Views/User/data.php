<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row align-items-center justify-content-center">

        <?php foreach ($users as $user) : ?>
            <?php $i = 1; ?>
            <div class="col-auto mt-4">
                <div class="card" style="width: 25rem;">
                    <img src="/img/<?= $user['foto']; ?>" class="card-img-top" alt="..." style="filter: brightness(0.5);" >
                    <div class="card-body text-light" style="position: absolute;  font-size: 25px">
                        <p class="card-text">Username : <?= $user['username']; ?></p>
                        <p class="card-text">No Telephone : <?= $user['no_telephone']; ?></p>
                        <p class="card-text">Alamat : <?= $user['alamat']; ?></p>
                        <p class="card-text">No Telephone : <?= $user['no_telephone']; ?></p>
                        <p class="card-text">Role : <?= $user['role']; ?></p>
                    </div>
                </div>
            </div>
            <?php $i++ ?>
        <?php endforeach; ?>

    </div>
</div>
<?= $this->endSection(); ?>