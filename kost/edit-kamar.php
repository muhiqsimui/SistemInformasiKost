<?php
include "template/header.php";
$kamar = $_GET['id_kamar'];
echo $kamar;
$query = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar=$kamar");
$d = mysqli_fetch_array($query);
$o = explode(', ', $d['fasilitas_kamar']);
?>

<div class="container text-center">
    <div class="row">

        <div class="col-md-10">
            <form action="php/kamar_proses.php?id_kamar=<?php echo $kamar ?>" method="post">




                <h4 class="text-center">Ubah Data Kamar</h4>

                <!-- info kamar kost  -->
                <hr>
                <h6>Info kamar</h6>
                <br>
                <div class="row">
                    <div class="col"><label for="jumlah_kamar">Jumlah Kamar</label></div>
                    <div class="col"> <input type="number" name="jumlah_kamar" id="jumlah_kamar" class="form-control" value="<?php echo $d['jumlah_kamar'] ?>"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><label for="panjang_kamar">Panjang Kamar</label></div>
                    <div class="col"> <input type="number" name="panjang_kamar" id="panjang_kamar" class="form-control" value="<?php echo $d['panjang_kamar'] ?>"></div>
                </div>

                <br>
                <div class="row">
                    <div class="col"><label for="lebar_kamar">Lebar Kamar</label></div>
                    <div class="col"> <input type="number" name="lebar_kamar" id="lebar_kamar" class="form-control" value="<?php echo $d['lebar_kamar'] ?>"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col">Tipe Kamar</div>
                    <div class="col">
                        <select name="tipe_kamar" id="" class="form-control" required>
                            <option value="<?php echo $d['tipe_kamar'] ?>" selected><?php echo $d['tipe_kamar'] ?></option>
                            <option value="kamar mandi dalam">Kamar Mandi Dalam</option>
                            <option value="kamar mandi luar">Kamar Mandi Luar</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">Biaya Fasilitas Kamar</div>

                    <div class="col text-md-left">

                        <input type="number" name="biaya_fasilitas" id="" class="form-control" value="<?php echo $d['biaya_fasilitas'] ?>" placeholder="Rp.">
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <p style="font-size: 12px">Note: Akan ditambahkan ke harga sewa sebagai biaya tambahan</p>
                    </div>
                </div>


                <!-- tutup info kamar  -->
                <!-- fasilitas kamar  -->
                <br>
                <hr>
                <h6>Fasilitas Kamar</h6>
                <div class="row">
                    <!-- <div class="col"><input type="checkbox" name="fasilitas_kamar" id="fasilitas_kamar" class="form-check-input">Kamar Mandi Dalam</div> -->
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="AC" <?php in_array('AC', $o) ? print 'checked' : '' ?>>AC</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="Tempat Tidur" <?php in_array('Tempat Tidur', $o) ? print 'checked' : '' ?>>Tempat Tidur</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="Lemari" <?php in_array('Lemari', $o) ? print 'checked' : '' ?>>Lemari</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="TV" <?php in_array('TV', $o) ? print 'checked' : '' ?>>TV</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="Kulkas" <?php in_array('Kulkas', $o) ? print 'checked' : '' ?>>Kulkas</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="Kipas Angin" <?php in_array('Kipas Angin', $o) ? print 'checked' : '' ?>>Kipas Angin</div>
                </div>
                <hr>
                <br>

                <!-- tutup fasilitas kamar  -->
                <div class="row">
                    <div class="col">
                        <button name="ubah_kamar" type="submit" class="btn-primary">Simpan Kamar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?php
include "template/footer.php";
?>