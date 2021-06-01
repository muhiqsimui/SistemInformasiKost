<?php
include "../../php/koneksi.php";
session_start();
$username4 = $_SESSION['username'];
$data2 = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username4'");
$d = mysqli_fetch_array($data2);
$foto_lama = $d['foto_profil'];

var_dump($koneksi);
if (isset($_POST['submit'])) {
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

    $sumber1 = $_FILES["foto_ktp"]["tmp_name"];
    $sumber2 = $_FILES["foto_profil"]["tmp_name"];

    if ($foto_profil != "") {
        move_uploaded_file($sumber2, '../../img/profil/' . $foto_profil);
    } else {
        $foto_profil = $foto_lama;
    }
    // move_uploaded_file($sumber1, '../../img/ktp/' . $foto_ktp);
    // move_uploaded_file($sumber2, '../../img/profil/' . $foto_profil);

    $query = "UPDATE user SET foto_profil='$foto_profil',nama_lengkap='$nama_lengkap',email='$email',pekerjaan='$pekerjaan',no_hp='$no_hp',jenis_kelamin='$jenis_kelamin' WHERE username='$username' ";
    $masuk = mysqli_query($koneksi, $query);

    if ($masuk) {
        header("location:../index.php");
    } else {
        header("location:../profil.php");
    }
}
