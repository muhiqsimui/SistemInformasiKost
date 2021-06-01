<?php
include "template/header.php";
$data = mysqli_query($koneksi, "SELECT * FROM kost INNER JOIN user WHERE kost.id_pemilik=user.id");

?>
<div class="container">

    <table class="table" border="1px solid black">
        <label for="table">Daftar Seluruh Kost</label>
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kos</th>
                <th scope="col">Pemilik</th>
                <th scope="col">Jumlah Kamar</th>
                <th scope="col">Kota</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = 0;
            while ($d = mysqli_fetch_array($data)) {
                $n++;
            ?>
                <tr class="">
                    <td><?php echo $n ?></td>
                    <td><?php echo $d['nama_kost'] ?></td>
                    <td><?php echo $d['nama_lengkap'] ?></td>
                    <td><?php echo $d['jumlah_kamar'] ?></td>
                    <td><?php echo $d['provinsi'] . "," . $d['kota'] ?></td>
                    <td>
                        <a href="php/hapus.php?id_kost=<?php echo $d['id_kost'] ?>"><button class="btn-danger">Hapus</button></a>
                        <a href="properti-edit.php?id_kost=<?php echo $d['id_kost'] ?>"><button class="btn-dark"> Ubah</button></a></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

</div>




<?php

include "template/footer.php";
?>