<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= $this->include("layouts/head.php"); ?>
  <link rel="stylesheet" href="/css/style.css">
  <title>Document</title>
</head>

<body>

  <div class="circle">
    <div class="box">
      <div class="card">
        <img src="/img/<?= session()->get('login')['foto']; ?>">
        <div class="card-body">
          <p class="card-text">Username : <?= session()->get('login')['username']; ?></p>
          <p>Alamat : <?= session()->get('login')['alamat']; ?></p>
          <p>No Telephone : <?= session()->get('login')['no_telephone']; ?></p>
          <a href="/"><button class="back">Back</button></a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>