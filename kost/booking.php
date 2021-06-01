<?php
include "template/header.php";
$id_kost = $_GET['id_kost'];
// echo $id_kost;

$query = "SELECT * FROM user WHERE username='$username'";
$data = mysqli_query($koneksi, $query);
$d = mysqli_fetch_array($data);

$query2 = "SELECT * FROM kost where id_kost='$id_kost'";
$data2 = mysqli_query($koneksi, $query2);
$f = mysqli_fetch_array($data2);

$idkost = $id_kost;
$dquery = "SELECT * FROM kamar WHERE id_kost=$idkost";
$kamar = mysqli_query($koneksi, $dquery);
$cek = mysqli_num_rows($kamar);


function minfas($idkost, $tipe_kost)
{
    global $koneksi;
    $cost = mysqli_query($koneksi, "SELECT min(biaya_fasilitas) FROM kamar WHERE id_kost=$idkost");
    $p = mysqli_fetch_array($cost);
    if ($tipe_kost == "Bulan") {
        return $p['min(biaya_fasilitas)'];
    } else if ($tipe_kost == "Tahun") {
        return $p['min(biaya_fasilitas)'] * 12;
    }
}

//fungsi untuk menentukan harga sewa di tabel
function fas($fas, $tipe_kost)
{
    if ($tipe_kost == "Bulan") {
        return $fas;
    } else if ($tipe_kost == "Tahun") {
        return $fas * 12;
    }
}
?>
<br>


<style>
    .container {
        width: 60%;
    }
</style>
<script>
    function tampilkan() {
        var waktu = document.getElementById("form1").hitungan_sewa.value;
        hari = document.getElementById("durasi_sewa");
        output = "<option>";

        if (waktu == "1") {
            for (var i = 1; i <= 30; i++) {
                output += "<option value='" + i + "'>" + i + " Hari </option>";
            }
            hari.innerHTML = output;

        } else if (waktu == "2") {
            for (var i = 1; i <= 4; i++) {
                output += "<option value='" + i + "'>" + i + " Minggu </option>";
            }
            hari.innerHTML = output;
        } else if (waktu == "3") {
            for (var i = 1; i <= 12; i++) {
                output += "<option value='" + i + "'>" + i + " Bulan </option>";
            }
            hari.innerHTML = output;
        } else if (waktu == "4") {
            for (var i = 1; i <= 5; i++) {
                output += "<option value='" + i + "'>" + i + " Tahun </option>";
            }
            hari.innerHTML = output;
        }
    }
</script>





<div class="container">
    Today <?php echo date("l, j F Y"); ?>

    <form enctype="multipart/form-data" action="booking-2.php?id_kost=<?php echo $id_kost; ?>" method="post" id="form1" class="form-group">
        <h3>Mulai Kost Kapan ?</h3>
        <hr>
        <div class="row">
            <div class="col">
                Tanggal Mulai : <input required type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control">
            </div>
            <div class="col">
                Hitungan Sewa : <select required class="form-control" id="hitungan_sewa" name="hitungan_sewa" onchange="tampilkan()">
                    <!-- <option value="1">Harian</option>
                    <option value="2">Mingguan</option> -->
                    <option hidden value=""></option>
                    <option value="3">Bulanan</option>
                    <option value="4">Tahunan</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label>Durasi sewa: </label> <select required class="form-control" id="durasi_sewa" name="durasi_sewa">
                </select>
            </div>
        </div>
        <br>
        <h3>Masukan Data Dirimu</h3>
        <hr>
        <p style="font-size: 12px">Pastikan data dirimu sesuai untuk mempermudah proses pembookingan kost agar tidak ada masalah</p>
        <div class="row">
            <div class="col"><label for="nama_lengkap">Nama Lengkap</label>
                <input value="<?php echo $d['nama_lengkap'] ?>" type="text" name="nama_lengkap" class="form-control"></div>
        </div><br>
        <div class="row">
            <div class="col">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option selected hidden value="<?php echo $d['jenis_kelamin'] ?>"><?php echo $d['jenis_kelamin'] ?></option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="no_hp">Nomer Handphone</label>
                <input value="<?php echo $d['no_hp'] ?>" type="number" name="no_hp" id="" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="pekerjaan">Pekerjaan</label>
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="pekerjaan" id="pekerjaan">
                            <option selected hidden value="<?php echo $d['pekerjaan'] ?>"><?php echo $d['pekerjaan'] ?></option>
                            <option value="">Mahasiswa</option>
                            <option value="">Pegawai</option>
                            <option value="">Lain-lain</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <h3>Kamar</h3>
            <hr>
        </div>
        <div class="row">
            <div class="col">
                <!-- kamar  -->

                <?php

                if ($cek > 0) {


                    # code...

                ?>
                    <div class="row">
                        <div class="col">
                            <br>

                            <table class="table">
                                <thead class=" thead-dark">
                                    <tr>
                                        <th>Tipe</th>
                                        <th>Kuota</th>
                                        <th>Tipe Kamar</th>
                                        <th>Luas Kamar</th>
                                        <th>Fasilitas Kamar</th>
                                        <!-- <th>Biaya Fasilitas</th> -->
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <?php
                                // $fasilitas=implode(', ',$l['fasilitas_kamar']);
                                $i = 0;
                                while ($l = mysqli_fetch_array($kamar)) {
                                    $i++;
                                    if ($l['jumlah_kamar'] > 0) {

                                ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo "A" . $i; ?></td>
                                                <td><?php if ($l['jumlah_kamar'] > 0) {
                                                        echo $l['jumlah_kamar'];
                                                    } else {
                                                        echo "Penuh";
                                                    }

                                                    ?></td>
                                                <td><?php echo $l['tipe_kamar'] ?></td>
                                                <td><?php echo $l['panjang_kamar'] . "x" . $l['lebar_kamar'] . "m" ?></td>
                                                <td><?php echo $l['fasilitas_kamar'] ?></td>
                                                <!-- <td> -->
                                                <?php
                                                // echo number_format($l['biaya_fasilitas'], 0, ',', '.') . "/" . "Bulan" 
                                                ?>
                                                <!-- </td> -->
                                                <td>
                                                    <div class="row">
                                                        <?php
                                                        echo "Rp.";
                                                        if ($f['tipe_kost'] == "Tahun") {
                                                            echo number_format($f['harga_sewa'] + fas($l['biaya_fasilitas'], $f['tipe_kost']), 0, ',', '.') . "/" . "Tahun";
                                                        } else if ($f['tipe_kost'] == "Bulan") {
                                                            echo number_format(($f['harga_sewa'] + fas($l['biaya_fasilitas'], $f['tipe_kost'])) * 12, 0, ',', '.') . "/" . "Tahun";
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="row">
                                                        <?php
                                                        echo "Rp.";
                                                        if ($f['tipe_kost'] == "Bulan") {
                                                            echo number_format($f['harga_sewa'] + fas($l['biaya_fasilitas'], $f['tipe_kost']), 0, ',', '.') . "/" . "Bulan";
                                                        } else if ($f['tipe_kost'] == "Tahun") {
                                                            echo number_format(($f['harga_sewa'] + fas($l['biaya_fasilitas'], $f['tipe_kost'])) / 12, 0, ',', '.') . "/" . "Bulan";
                                                        }

                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                <?php }
                                }
                                $kamar2 = mysqli_query($koneksi, $dquery);

                                ?>
                            </table>
                            <label for="">Pilih Tipe Kamar</label>
                            <select name="idkamar" id="" class=" form-control">
                                <?php
                                $i = 0;
                                while ($z = mysqli_fetch_array($kamar2)) {
                                    $i++;
                                    if ($z['jumlah_kamar'] > 0) {

                                ?>
                                        <option value="<?php echo $z['id_kamar'] ?>">Tipe-A<?php echo $i . " " . $z['tipe_kamar'] . $z['id_kamar'] ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                <?php } ?>
                <br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <h4 for="foto_ktp">Upload Foto KTP</h4><input type="file" name="foto_ktp" id="foto_ktp" class="form-control ">
            </div>
        </div>
        <div class="row">
            <p style="color:red;font-size:12px">Note: Dokumen ktp dibutuhkan untuk validasi idenitas penghuni kost</p>
        </div>
        <div class="row">
            <div class="col">
                <img width="50px" src="../img/ktp/<?php echo $d['foto_ktp'] ?>" alt="">
            </div>
        </div>
        <hr>
        <!-- bagian validasi  -->
        <?php

        ?>

        <p>Periksa kembali kost yang anda booking apakah telah sesuai</p>
        <div class="row">
            <div class="col">
                <img src="../img/foto_kost/kamar/<?php echo $f['foto_kamar'] ?>" alt="" width="300px">
            </div>
            <div class="col">
                <p><?php echo $f['jenis_kost'] ?></p>
                <h5 class="font-weight-bold"><?php echo $f['nama_kost'] ?></h5>
                <p><?php echo $f['fasilitas_kost'] ?></p>
                <!-- <p>
                    <?php
                    // echo "Rp." . number_format($f['harga_sewa'] + minfas($f['id_kost'], $f['tipe_kost']), 0, ',', '.') . " / " . $f['tipe_kost']
                    ?>
                </p> -->
                <?php echo $f['provinsi'] ?>,<?php echo $f['kota'] ?>,<?php echo $f['kecamatan'] ?>,<?php echo $f['kelurahan'] ?>
            </div>
        </div>
        <br>
        <br>

        <!-- end bagian validasi  -->




        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn-danger" style="padding: 10px;width:300px;" name="order">Lanjutkan</button>
            </div>
        </div>

        <br>
    </form>

</div>



<?php
include "template/footer.php";
?>