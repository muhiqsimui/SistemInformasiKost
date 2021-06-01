<?php
include "../../php/koneksi.php";

$id_kost = $_GET['id_kost'];
echo $id_kost;

$query = "DELETE FROM kost WHERE id_kost='$id_kost'";
$data = mysqli_query($koneksi, $query);

if ($data) {
    header("location:../properti.php");
} else {
    header("location:../index.php");
}
?>
<!-- hapus  -->