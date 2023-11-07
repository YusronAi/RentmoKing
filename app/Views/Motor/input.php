<?= $this->extend('layouts/frame'); ?>

<?= $this->section('content'); ?>

<section class="h-100 h-custom" style="opacity : 0.8;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2"><?= $title; ?></h3>

            <form method="" action="" class="px-md-2">

              <div class="form-outline mb-4">
                <input type="text" name="merek" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Nama Motor</label>
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