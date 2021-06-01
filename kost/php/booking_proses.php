<?php

include "../../php/koneksi.php";
session_start();
$username = $_SESSION['username'];
echo $username;
$id_kost = $_GET['id_kost'];
echo $id_kost;

//ambil user
$query_user = "SELECT * FROM user WHERE username='$username'";
$data_user = mysqli_query($koneksi, $query_user);
$f = mysqli_fetch_array($data_user);

//ambil tabel kost
$query_kost = "SELECT * FROM kost WHERE id_kost='$id_kost'";
$data_kost = mysqli_query($koneksi, $query_kost);
$d = mysqli_fetch_array($data_kost);

//data
$id_user = $f['id'];
$id_kost = $d['id_kost'];
$tanggal_masuk = $_POST['tanggal_masuk'];
echo $tanggal_masuk;

// $kirim = mysqli_query($koneksi, "INSERT INTO booking VALUES ('','$id_user','$id_kost','$tanggal_masuk','$hitungan_sewa','$durasi_sewa','$tanggal_keluar','$jumlah_kamar')");
