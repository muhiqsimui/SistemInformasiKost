<?php
include "../../php/koneksi.php";
$id_kost = $_GET['id_kost'];

$query = "DELETE FROM wishlist WHERE id_kost='$id_kost'";
$data = mysqli_query($koneksi, $query);
if ($data) {
    header("location:../wishlist.php");
} else {
    header("location:../index.php");
}
