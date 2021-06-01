<?php
include "template/header.php";
$id_kost = $_GET['id_kost'];
echo $id_kost;
?>

<div class="container text-center">
    <div class="row">

        <div class="col-md-10">
            <form action="php/kamar_proses.php?id_kost=<?php echo $id_kost ?>" method="post">




                <h4 class="text-center">Tambah Kamar</h4>

                <!-- info kamar kost  -->
                <hr>
                <h6>Info kamar</h6>
                <br>
                <div class="row">
                    <div class="col"><label for="jumlah_kamar">Jumlah Kamar</label></div>
                    <div class="col"> <input min="0" type="number" name="jumlah_kamar" id="jumlah_kamar" class="form-control"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><label for="panjang_kamar">Panjang Kamar</label></div>
                    <div class="col"> <input type="number" name="panjang_kamar" id="panjang_kamar" class="form-control"></div>
                </div>

                <br>
                <div class="row">
                    <div class="col"><label for="lebar_kamar">Lebar Kamar</label></div>
                    <div class="col"> <input type="number" name="lebar_kamar" id="lebar_kamar" class="form-control"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col">Tipe Kamar</div>
                    <div class="col">
                        <select name="tipe_kamar" id="" class="form-control" required>
                            <option value="" hidden></option>
                            <option value="kamar mandi dalam">Kamar Mandi Dalam</option>
                            <option value="kamar mandi luar">Kamar Mandi Luar</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="col">Biaya Fasilitas Kamar</div>

                    <div class="col text-md-left">

                        <input type="number" name="biaya_fasilitas" id="" class="form-control" placeholder="Rp.">
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <p style="font-size: 12px">Note: biaya fasilitas perbulan akan ditambahkan ke harga sewa sebagai biaya tambahan</p>
                    </div>
                </div>


                <!-- tutup info kamar  -->
                <!-- fasilitas kamar  -->
                <br>
                <hr>
                <h6>Fasilitas Kamar</h6>
                <div class="row">
                    <!-- <div class="col"><input type="checkbox" name="fasilitas_kamar" id="fasilitas_kamar" class="form-check-input">Kamar Mandi Dalam</div> -->
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-inputl" value="AC">AC</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="Tempat Tidur">Tempat Tidur</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="Lemari">Lemari</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="TV">TV</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="Kulkas">Kulkas</div>
                    <div class="col"><input type="checkbox" name="fasilitas_kamar[]" class="form-check-input" value="Kipas Angin">Kipas Angin</div>
                </div>
                <hr>
                <br>

                <!-- tutup fasilitas kamar  -->
                <div class="row">
                    <div class="col">
                        <button name="submit" type="submit" class="btn-primary">Tambah Kamar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?php
include "template/footer.php";
?>