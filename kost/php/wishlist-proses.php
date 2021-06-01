<?php
include "../../php/koneksi.php";

session_start();
$username = $_SESSION['username'];
$id_kost = $_GET['id_kost'];
echo $id_kost . " " . $username;

$query1 = "SELECT id FROM user WHERE username='$username'";
$data1 = mysqli_query($koneksi, $query1);
$d1 = mysqli_fetch_assoc($data1);
$id_user = $d1['id'];
$query = "INSERT INTO wishlist VALUES ('','$id_kost','$id_user')";
$tambah = mysqli_query($koneksi, $query);
if ($tambah) {
    header("location:../tampilan-kost.php?id_kost=" . $id_kost);
} else {
    header("location:../tambah_kos.php");
    echo "<script>alert('gagal')</script>";
}
