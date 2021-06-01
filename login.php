<?php
include("template/header.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style type="text/css">
    .login-form {
      width: 400px;
      margin: 50px auto;
    }

    .login-form form {
      margin-bottom: 15px;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 45px;
      border-radius: 20px;
    }


    .login-form h2 {
      margin: 0 0 15px;
    }

    .form-control,
    .btn {
      min-height: 38px;
      border-radius: 2px;
    }

    .btn {
      font-size: 15px;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="login-form">
        <form action="php/login_proses.php" method="post" class="bg-white">
          <h2 class=" text-center">Login</h2>
          <div class="form-group">
            <input autocomplete="off" autofocus required="required" class="form-control text-center" type="text" name="username" id="username" placeholder="Masukan username">
          </div>
          <div class="form-group">
            <input autocomplete="off" autofocus required="required" type="password" name="password" id="password" class="form-control text-center" placeholder="Masukan Password">
          </div>
          <div class="form-group text-center">
            <button class="btn btn-primary btn-block" type="submit" value="login">
              Masuk
            </button>
            <div class="clearfix">
              <label for="" class="pull-left checkbox-inline">
                Remember Me
              </label>
              <input type="checkbox" name="remember" id="">
              <a href="#">Lupa Password?</a>
            </div>
          </div>
        </form>
        <p class="text-center"><a href="daftar.php">Daftar / Buat Akun ?</a></p>
      </div>

    </div>
  </div>


</body>

</html>


<?php
include "template/footer.php";
?>