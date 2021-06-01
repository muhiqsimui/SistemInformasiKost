<?php include "template/header.php";
$query = "SELECT * ,DATE_ADD(tagihan.tanggal_tagihan, INTERVAL 90 DAY) as jatuh_tempo FROM tagihan JOIN booking ON tagihan.no_booking=booking.id_booking JOIN user ON user.id=booking.id_user JOIN kamar ON booking.id_kamar=kamar.id_kamar JOIN kost ON kamar.id_kost=kost.id_kost WHERE user.username ='$username'";
$data = mysqli_query($koneksi, $query);


?>

<style>
    table {
        border: 2px solid black;
    }
</style>


<div class="container" style="background-color: azure">
    <h4 class="text-center">Tagihan</h4>
    <hr>
    <div class="container">
        <table class="table">
            <title>Daftar tagihan</title>
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>No Tagihan</th>
                    <th>Nama Kost</th>
                    <th>Tanggal Tagihan</th>
                    <th>Total Tagihan</th>
                    <th>Batas waktu</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while ($d = mysqli_fetch_array($data)) {
                    $i++;
                    # code...


                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $d['no_tagihan'] ?></td>
                        <td><?php echo $d['nama_kost'] ?></td>
                        <td><?php echo $d['tanggal_tagihan'] ?></td>
                        <td><?php echo "Rp. " . number_format($d['total_tagihan'], 0, ',', '.')  ?></td>
                        <td><?php echo $d['jatuh_tempo'] ?></td>
                        <td><?php $stats = $d['stats'];

                            if ($stats == 1) {
                                echo '<p style="background-color:green;color:white;padding:5px;">Lunas</p>';
                            } else if ($stats == 2) {
                                echo '<p style="background-color:yellow">Pending</p>';
                            } else {
                                echo '<p style="background-color:red;color:white">Belum Lunas</p>';
                            }
                            ?></td>
                        <td>
                            <?php if ($stats == 3) {
                                # code...
                            ?>
                                <form action="validasi.php?no_tagihan=<?php echo $d['no_tagihan'] ?>" method="post">
                                    <button class="btn-danger">Validasi Pembayaran</button>
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p><b>Status</b></p>
        <p>
            Belum Bayar = Segera Lunasi Pembayaran Anda <br>
            Pending = Pembayaran anda sedang diproses<br>
            Lunas = Transaksi Selesai dan telah terverifikasi
        </p>
    </div>
</div>





<?php include "template/footer.php" ?>