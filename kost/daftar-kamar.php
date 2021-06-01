<?php
include "template/header.php";
$id_kost = $_GET['id_kost'];


$query = mysqli_query($koneksi, "SELECT * from kamar WHERE id_kost=$id_kost");

?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-md-2">
            <a href="kamar.php?id_kost=<?php echo $id_kost ?>"><button class="btn-primary">Tambah Kamar</button></a>
        </div>

    </div>
    <br>
    <div class="row">

        <div class="col">

            <table class=" text-center table">

                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tipe Kamar</th>
                        <th>Jumlah Kamar</th>
                        <th>Fasilitas</th>
                        <th>Biaya Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 0;
                    while ($d = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $d['tipe_kamar'] ?></td>
                            <td><?php echo $d['jumlah_kamar'] ?></td>
                            <td><?php echo $d['fasilitas_kamar'] ?></td>
                            <td><?php echo "Rp. " . number_format($d['biaya_fasilitas'], 0, ',', '.')  ?></td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <a href="edit-kamar.php?id_kamar=<?php echo $d['id_kamar'] ?>">
                                            <button class="btn-primary">Ubah</button>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <form action="php/kamar_proses.php?id_kamar=<?php echo $d['id_kamar'] ?>" method="post">
                                            <button class="btn-danger" name="hapus_kamar">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php
include "template/footer.php";
?>