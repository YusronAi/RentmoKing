<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<section class="h-100 h-custom" style="opacity : 0.9;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <!-- <img src=""
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo"> -->
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2"><?= $title; ?></h3>

                        <form method="post" action="/petugas/transaksi-save" class="px-md-2" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="form-outline mb-4">
                                <input type="hidden" name="id_transaksi" id="id_transaksi" class="form-control" />
                                <label class="form-label" for="id_transaksi"></label>
                            </div>


                            <div class="form-outline mb-4">
                                <select class="select" name="id_pelanggan" id="id_pelanggan" style="width: 200px;">
                                    <?php foreach ($pelanggan as $item) : ?>
                                        <?php $i = 1; ?>
                                        <option class="option" value="<?= $item['id_pelanggan']; ?>"><?= $item['nama']; ?></option>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label class="form-label" for="id_pelanggan">Nama Pelanggan</label>
                            </div>

                            <div class="form-outline mb-4">
                                <select class="select" name="id_motor" id="id_motor" style="width: 200px;">
                                    <?php foreach ($motor as $item) : ?>
                                        <?php $i = 1; ?>
                                        <option class="option" value="<?= $item['id_motor']; ?>"><?= $item['merek']; ?></option>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label class="form-label" for="id_motor">Merek Motor</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="checkbox" name="id_user" id="id_user" value="<?= session()->get('login')['id_user']; ?>"> <?= strtoupper(session()->get('login')['username']); ?>
                                <br>
                                <label class="form-label" for="id_user">Petugas</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="date" name="tgl_pinjam" id="tgl_pinjam">
                                <br>
                                <label class="form-label" for="tgl_pinjam">Tanggal Pinjam</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="date" name="tgl_kembali" id="tgl_kembali">
                                <br>
                                <label class="form-label" for="tgl_kembali">Tanggal Kembali</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="datetime-local" name="waktu_pinjam" id="waktu_pinjam">
                                <br>
                                <label class="form-label" for="waktu_pinjam">Waktu Pinjam</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="datetime-local" name="waktu_kembali" id="waktu_kembali">
                                <br>
                                <label class="form-label" for="waktu_kembali">Waktu Kembali</label>
                            </div>

                            <div class="form-outline mb-4">
                                <select name="lama" id="lama">
                                    <option value="24">24 Jam</option>
                                    <option value="48">48 Jam</option>
                                    <option value="72">72 Jam</option>
                                </select>
                                <br>
                                <label class="form-label" for="lama">Lama Pinjam</label>
                            </div>

                            <div class="form-outline mb-4">
                                <select name="status" id="status">
                                    <option value="Pinjam">Pinjam</option>
                                    <option value="Kembali">Kembali</option>
                                </select>
                                <br>
                                <label class="form-label" for="status">Status</label>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>

<?= $this->endSection(); ?>