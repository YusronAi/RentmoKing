<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="\css\style.css">
    <link rel="icon" href="/favico.ico" type="image/gif">
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="/auth" method="post">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="username">
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-danger" style="color: blue;" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

    </div>
    <script src="\js\script.js"></script>
</body>

</html>