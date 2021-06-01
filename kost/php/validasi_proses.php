<?php

include "../../php/koneksi.php";

$id_tagihan = $_POST['id_tagihan'];

if (isset($_POST['submit'])) {
    $query = "UPDATE tagihan SET stats=1 WHERE no_tagihan='$id_tagihan'";
    $data = mysqli_query($koneksi, $query);

    header("location:../properti.php");
}
