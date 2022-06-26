<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация и Авторизация</title>
</head>
<body>
    <div class="container-xxl">
        <div class="row align-items-center">
        <div class="col-4">
          
          </div>
            <div class="col-4">
                <h1>Welcome to register</h1>
            </div>
            <div class="col-4">
          
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-4">
          
          </div>
            <div class="col-4">
            <form action="vendor/reg.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = 'email'>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password confirm</label>
    <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="button31">Register!</button>
</form>

            </div>
        </div>
    </div>
</body>
</html>