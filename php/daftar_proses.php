<?php
include("koneksi.php");

if (isset($_POST)) {

    $nama_lengkap = $_POST["nama_lengkap"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $no_hp = $_POST["no_hp"];
    $pekerjaan = $_POST["pekerjaan"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $roles = $_POST["roles"];
    $foto_ktp = $_FILES["foto_ktp"]['name'];
    $foto_profil = $_FILES["foto_profil"]['name'];
    $sumber1 = $_FILES["foto_ktp"]['tmp_name'];
    $sumber2 = $_FILES["foto_profil"]['tmp_name'];

    move_uploaded_file($sumber1, '../img/ktp/' . $foto_ktp);
    move_uploaded_file($sumber2, '../img/profil/' . $foto_profil);

    $query = "INSERT INTO user VALUES ('','$nama_lengkap','$email','$username','$password','$no_hp','$pekerjaan','$jenis_kelamin','$foto_ktp','$foto_profil','$roles','')";
    // $query = "INSERT INTO user (nama_lengkap,email,username,password) VALUES ($nama_lengkap,$email,$username,$password) ";
    // var_dump($query);
    $masuk = mysqli_query($koneksi, $query);
    // var_dump($masuk);
    // echo "<br>";
    // var_dump($query);
    header("location:../index.php");
}
