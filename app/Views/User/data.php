<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="container">
        <?php if (session()->getFlashdata()) : ?>
            <div class="alert alert-success text-center mb-3" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row align-items-center justify-content-center">

            <?php foreach ($users as $user) : ?>
                <?php $i = 1; ?>
                <div class="col-auto mt-4">
                    <div class="card" style="width: 25rem;">
                        <img src="/img/<?= $user['foto']; ?>" class="card-img-top" alt="..." style="filter: brightness(0.5);">
                        <div class="card-body text-light" style="position: absolute;  font-size: 25px">
                            <p class="card-text">Username : <?= $user['username']; ?></p>
                            <p class="card-text">No Telephone : <?= $user['no_telephone']; ?></p>
                            <p class="card-text">Alamat : <?= $user['alamat']; ?></p>
                            <p class="card-text">Password : <?= $user['password']; ?></p>
                            <p class="card-text">Role : <?= $user['role']; ?></p>
                            <?php if($user['role'] == 'Admin'): ?>
                            <a href="/data-user/delete/<?= $user['id_user']; ?>"><button class="btn btn-danger text-center">Hapus</button></a>
                            <a href="/data-user/ubah/<?= $user['id_user']; ?>"><button class="btn btn-success text-center">Edit</button></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endforeach; ?>
        </div>
        <?= $pager->simpleLinks(); ?>
    </div>
    <?= $this->endSection(); ?>