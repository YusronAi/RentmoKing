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

            <form method="post" action="/motor/update/<?= $motor['id_motor']; ?>" class="px-md-2" enctype="multipart/form-data" >
            <?= csrf_field(); ?>

            <div class="form-outline mb-4">
                <input type="hidden" name="id" id="id_motor" class="form-control" value="<?= $motor['id_motor']; ?>"/>
                <label class="form-label" for="id_motor"></label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="merek" id="form3Example1q" class="form-control" value="<?= $motor['merek']; ?>"/>
                <label class="form-label" for="form3Example1q">Nama Motor</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="no_polisi" id="no_polisi" class="form-control" value="<?= $motor['no_polisi']; ?>"/>
                <label class="form-label" for="no_polisi">No Polisi</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="warna" id="warna" class="form-control" value="<?= $motor['warna']; ?>"/>
                <label class="form-label" for="warna">Warna Motor</label>
              </div>

              <div class="form-outline mb-4">
                <input type="hidden" name="foto2" id="foto" class="form-control" value="<?= $motor['foto']; ?>"/>
                <input type="file" name="foto" id="foto" class="form-control"/>
                <label class="form-label" for="foto">Pilih Foto</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="no_mesin" id="no_mesin" class="form-control" value="<?= $motor['no_mesin']; ?>"/>
                <label class="form-label" for="no_mesin">No Mesin</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="no_rangka" id="no_rangka" class="form-control" value="<?= $motor['no_rangka']; ?>"/>
                <label class="form-label" for="no_rangka">No Rangka</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="thn_keluar" id="thn_keluar" class="form-control" value="<?= $motor['thn_keluar']; ?>"/>
                <label class="form-label" for="thn_keluar">Tahun Keluar</label>
              </div>

              <div class="form-outline mb-4">
                <input type="hidden" name="status1" value="<?= $motor['status']; ?>">
                <label class="form-label" for="status">Status : <?= $motor['status']; ?></label>
                <p>Ubah :</p>
                <select name="status" id="status">
                  <option value=""></option>
                  <option value="Terpinjam">Terpinjam</option>
                  <option value="Tersedia">Tersedia</option>
                </select>
              </div>

              <div class="form-outline mb-4">
                <input type="number" name="biaya" id="biaya" class="form-control" value="<?= $motor['biaya']; ?>"/>
                <label class="form-label" for="no_rangka">Biaya</label>
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