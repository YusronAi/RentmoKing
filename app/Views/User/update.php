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

            <form method="post" action="/data-user/update/<?= $user['id_user']; ?>" class="px-md-2" enctype="multipart/form-data" >
            <?= csrf_field(); ?>

            <div class="form-outline mb-4">
                <input type="hidden" name="id" id="id_user" class="form-control" value="<?= $user['id_user']; ?>"/>
                <label class="form-label" for="id_user"></label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>"/>
                <label class="form-label" for="username">Username</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $user['alamat']; ?>"/>
                <label class="form-label" for="alamat">Alamat</label>
              </div>

              <div class="form-outline mb-4">
                <input type="hidden" name="foto2" id="foto" class="form-control" value="<?= $user['foto']; ?>"/>
                <input type="file" name="foto" id="foto" class="form-control" />
                <label class="form-label" for="foto">Pilih Foto</label>
              </div>

              <div class="form-outline mb-4">
                <input type="number" name="no_telephone" id="no_telephone" class="form-control" value="<?= $user['no_telephone']; ?>"/>
                <label class="form-label" for="no_telephone">No Telephone</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="password" id="password" class="form-control" value="<?= $user['password']; ?>"/>
                <label class="form-label" for="password">Password</label>
              </div>

              <div class="form-outline mb-4">
                <input type="hidden" name="role2" value="<?= $user['role']; ?>">
                <label class="form-label" for="role">Role : <?= $user['role']; ?></label>
                <p>Ubah :</p>
                <select name="role" id="role">
                  <option value=""></option>
                  <option value="Owner">Owner</option>
                  <option value="Admin">Admin</option>
                </select>
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