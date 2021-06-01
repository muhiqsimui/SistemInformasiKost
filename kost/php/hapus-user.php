<?php
include "../../php/koneksi.php";
$id = $_GET['id'];
echo $id;

$query = "DELETE FROM user WHERE id='$id'";
$data = mysqli_query($koneksi, $query);

var_dump($data);
if ($data) {
    header("location:../user.php");
} else {
    header("location:../index.php");
}
