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

            <form method="post" action="/petugas/save" class="px-md-2" enctype="multipart/form-data" >
            <?= csrf_field(); ?>

            <div class="form-outline mb-4">
                <input type="hidden" name="id" id="id_pelanggan" class="form-control" />
                <label class="form-label" for="id_pelanggan"></label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="nama" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Nama Customer</label>
              </div>

              <div class="form-outline mb-4">
                <input type="file" name="foto" id="foto" class="form-control" />
                <label class="form-label" for="foto">Pilih Foto</label>
              </div>

              <div class="form-outline mb-4">
                <select name="jenis_kelamin" id="jenis_kelamin">
                  <option value="Laki Laki">Laki Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
              </div>

              <div class="form-outline mb-4">
                <input type="number" name="no_identitas" id="no_identitas" class="form-control" />
                <label class="form-label" for="no_identitas">No Identitas</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="universitas" id="universitas" class="form-control" />
                <label class="form-label" for="universitas">Universitas</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="alamat_asal" id="alamat_asal" class="form-control" />
                <label class="form-label" for="alamat_asal">Alamat Asal</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="alamat_sekarang" id="alamat_sekarang" class="form-control" />
                <label class="form-label" for="alamat_sekarang">Alamat Sekarang</label>
              </div>

              <div class="form-outline mb-4">
                <input type="number" name="telphone" id="telephone" class="form-control" />
                <label class="form-label" for="telephone">Telephone</label>
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