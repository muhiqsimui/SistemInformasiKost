<?php

include "template/header.php";
$id_kost = $_GET['id_kost'];
// $query = "SELECT * FROM booking JOIN user ON user.id=booking.id_user JOIN tagihan ON booking.id_booking=tagihan.no_booking JOIN kamar on WHERE booking.id_kost='$id_kost'";
$query = "SELECT * FROM booking JOIN user ON user.id=booking.id_user JOIN tagihan ON booking.id_booking=tagihan.no_booking JOIN kamar on kamar.id_kamar=booking.id_kamar JOIN kost on kost.id_kost=kamar.id_kost WHERE kost.id_kost='$id_kost'";
$data = mysqli_query($koneksi, $query);

?>

<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $i = 0;
            while ($d = mysqli_fetch_array($data)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $d['nama_lengkap'] ?></td>
                    <td><?php echo $d['tanggal_masuk'] ?></td>
                    <td><?php echo $d['tanggal_keluar'] ?></td>
                    <td><?php $stats = $d['stats'];
                        if ($stats == 1) {
                            echo "Lunas";
                        } else if ($stats == 2) {
                            echo "Pending<br>";
                            echo "<a href='cek-bayar.php?id_tagihan=" . $d['no_tagihan'] . "'><button class='btn-primary'>Cek</button></a>";
                        } else {
                            echo "Belum Lunas";
                        }
                        ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>


<?php
include "template/footer.php";
?>