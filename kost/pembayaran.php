<?php include "template/header.php";
$tanggal_masuk = $_POST['now'];
$biaya = $_POST['biaya'];
$id_kost = $_GET['id_kost'];
$query = "SELECT * FROM user JOIN kost on kost.id_pemilik=user.id";
$data = mysqli_query($koneksi, $query);
$d = mysqli_fetch_array($data);
?>
<style>
    .container {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">Mohon Transfer ke Bank <input disabled class="form-control" type="text" name="" id="" value="<?php echo $bank = $_POST['bank']; ?>"></div>
        <div class="col"></div>
    </div>
    <hr>
    <div class="row">
        <?php
        $hari = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu'];
        ?>
        <div class="col">
            <h5>Mohon Selesaikan Pembayaran sebelum <?php echo $hari[date('N', strtotime('+' . 2 . 'day'))] . date(', d-m-y h:i.a ', strtotime('+' . 2 . 'day')) ?></h5>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h6>Kode Bank</h6>
                    <h4><?php
                        if ($bank == "Bank BNI") {
                            echo "009";
                        } else if ($bank == "Bank Rakyat Indonesia tbk") {
                            echo "002";
                        } else if ($bank == "Bank Mandiri") {
                            echo "008";
                        } elseif ($bank == "Bank BCA") {
                            echo "014";
                        } else if ($bank == "Bank Muamalat") {
                            echo "147";
                        } else {
                            echo "error bank tidak ditemukan";
                        }
                        ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6> No Rekening :</h6>
                    <h2><?php echo $d['no_rekening']; ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>Nama Pemilik Rekening :</h6>
                    <h2> <?php echo $d['nama_pemilik'] ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>Jumlah Total :</h6>
                    <h2>Rp.<?php echo number_format($biaya, 0, ',', '.') ?></h2>
                </div>
            </div>

        </div>
    </div>
</div>


<?php include "template/footer.php"; ?>