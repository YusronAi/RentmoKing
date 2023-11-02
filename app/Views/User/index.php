<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login & Registration Form | Codehal</title>
    <link rel="stylesheet" type="text/css" href="\css\style.css">
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="/auth" method="post">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="username" required>
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <button type="submit" name="submit">Login</button>
                <div class="signUp-link">
                    <p>Don't have an account? <a href="/registrasi">Registrasi</a></p>
                </div>
            </form>
        </div>
        
    </div>
    <script src="\js\script.js"></script>
</body>

</html>