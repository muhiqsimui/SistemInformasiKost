<?php
include("template/header.php");

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

      border-radius: 20px;
      margin-bottom: 15px;
      background: #f7f7f7;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
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
        <form action="php/daftar_proses.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center">Daftar</h2>

          <div class="form-group">
            <input required="required" class="form-control text-center" type="text" name="username" id="username" placeholder="Masukan username">
          </div>
          <div class="form-group">
            <input required="required" type="password" name="password" id="password" class="form-control text-center" placeholder="Masukan Password">
          </div>
          <div class="form-group">
            <input required="required" type="email" name="email" id="email" class="form-control text-center" placeholder="Masukan Email">
          </div>
          <div class="form-group">
            <input required="required" type="text" name="nama_lengkap" id="nama_lengkap" class="form-control text-center" placeholder="Masukan Nama Lengkap">
          </div>
          <div class="form-group">
            <input required="required" type="number" name="no_hp" id="no_hp" class="form-control text-center" placeholder="Masukan Nomer Telepon/HP">
          </div>
          <div class="form-group">
            <input required="required" type="text" name="pekerjaan" id="pekerjaan" class="form-control text-center" placeholder="Masukan Pekerjaan">
          </div>
          <div class="form-group">

            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
              <option value="laki-laki">Laki-laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
            <br>
          </div>
          <div class="form-group">
            <label for="foto_ktp" class="form-group">Foto KTP</label>
            <input type="file" name="foto_ktp" id="foto_ktp" class="form-group">
          </div>
          <div class="form-group">
            <label for="foto_profil" class="form-group">Foto Profil</label>
            <input type="file" name="foto_profil" id="foto_profil" class="form-group">
          </div>


          <div class="form-group">
            <label for="">Mendaftar sebagai ?</label>
            <br>
            <select name="roles" id="roles" class="custom-select">
              <option value="1">Penghuni kost</option>
              <option value="2">Pemilik kost</option>
            </select>
          </div>


          <div class="form-group text-center">
            <td><input type="submit" value="Daftar" class="btn btn-primary btn-block"></td>
          </div>
        </form>
        <p class="text-center"><a href="login.php">Sudah punya akun ? Login</a></p>
      </div>

    </div>
  </div>


</body>

</html>

<?php
include "template/footer.php";
?>