<?php
include("koneksi.php");

$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:../kost/index.php");
} else {
    header("location:../login.php");
}
