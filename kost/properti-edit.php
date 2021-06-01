<?php
include 'template/header.php';


$id_kost = $_GET['id_kost'];

$query = "SELECT * FROM kost WHERE id_kost='$id_kost'";
$data_2 = mysqli_query($koneksi, $query);
$d = mysqli_fetch_array($data_2);
$o = explode(', ', $d['fasilitas_kost']);
?>

<!--Main Content -->
<div class="container">

  <div class="row">
    <div class="col-md-10">
      <form class="text-center border border-light p-5" action="php/properti-edit_proses.php?id_kost=<?php echo $d['id_kost']; ?>" method="post" enctype="multipart/form-data">
        <h3>Ubah Kost</h3>
        <hr>
        <div class="form-group">
          <div class="row">
            <div class="col"><label for="namakost">Nama Kost </label></div>
            <div class="col"> <input type="text" name="nama_kost" id="nama_kost" class="form-control" value="<?php echo $d['nama_kost'] ?>"></div>
          </div>
          <br>

          <div class="row">
            <div class="col"><label for="alamat">Alamat Kost</label></div>
            <div class="col"><textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukan alamat kost anda"><?php echo $d['alamat'] ?></textarea></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="provinsi">Provinsi</label></div>
            <div class="col"> <input value="<?php echo $d['provinsi'] ?>" type="text" name="provinsi" id="provinsi" class="form-control"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="kota">Kabupaten/Kota</label></div>
            <div class="col"> <input value="<?php echo $d['kota'] ?>" type="text" name="kota" id="kota" class="form-control"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="kecamatan">Kecamatan</label></div>
            <div class="col"> <input value="<?php echo $d['kecamatan'] ?>" type="text" name="kecamatan" id="kecamatan" class="form-control"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="kelurahan">Kelurahan</label></div>
            <div class="col"> <input value="<?php echo $d['kelurahan'] ?>" type="text" name="kelurahan" id="kelurahan" class="form-control"></div>
          </div>
          <br>

          <div class="row">
            <div class="col"><label for="deskripsi">Deskripsi Kost(opsional)</label></div>
            <div class="col"><textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Masukan deskripsi kost anda"><?php echo $d['deskripsi'] ?></textarea></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="kontak">Nomer Telepon/HP</label></div>
            <div class="col"><input type="text" name="kontak" id="kontak" class="form-control" value="<?php echo $d['kontak'] ?>"></div>
          </div>
          <!-- info kamar kost  -->
          <!-- <hr>
        <h6>Info kamar</h6>
        <br>
        <div class="row">
          <div class="col"><label for="jumlah_kamar">Jumlah Kamar</label></div>
          <div class="col"> <input value="<?php echo $d['jumlah_kamar'] ?>" type="number" name="jumlah_kamar" id="jumlah_kamar" class="form-control"></div>
        </div> -->
          <!-- <br>
        <div class="row">
          <div class="col"><label for="panjang_kamar">Panjang Kamar</label></div>
          <div class="col"> <input value="<?php echo $d['panjang_kamar'] ?>" type="number" name="panjang_kamar" id="panjang_kamar" class="form-control"></div>
        </div>

        <br>
        <div class="row">
          <div class="col"><label for="lebar_kamar">Lebar Kamar</label></div>
          <div class="col"> <input value="<?php echo $d['lebar_kamar'] ?>" type="number" name="lebar_kamar" id="lebar_kamar" class="form-control"></div>
        </div> -->


          <hr>
          <h6>Fasilitas Kost</h6>



          <br>
          <div class="row">
            <!-- <div class="col"><input type="checkbox" name="fasilitas" id="fasilitas">Kamar Mandi Dalam</div> -->
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Parkir Mobil" <?php in_array('Parkir Mobil', $o) ? print 'checked' : '' ?>>Parkir Mobil</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="WIFI/Internet" <?php in_array('WIFI/Internet', $o) ? print 'checked' : '' ?>>WIFI/Internet</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Security" <?php in_array('Security', $o) ? print 'checked' : '' ?>>Security</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Ruang Tamu" <?php in_array('Ruang Tamu', $o) ? print 'checked' : '' ?>>Ruang Tamu</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Ruang Fitness" <?php in_array('Ruang Fitness', $o) ? print 'checked' : '' ?>>Ruang Fitness</div>

          </div>
          <div class="row">
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Ruang Makan" <?php in_array('Ruang Makan', $o) ? print 'checked' : '' ?>>Ruang Makan</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Dapur" <?php in_array('Dapur', $o) ? print 'checked' : '' ?>>Dapur</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Laundry" <?php in_array('Laundry', $o) ? print 'checked' : '' ?>>Laundry</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Musholla" <?php in_array('Musholla', $o) ? print 'checked' : '' ?>>Musholla</div>
            <div class="col"></div>
          </div>
          <br>

          <!-- info kamar kost  -->
          <hr>
          <h6>Info Pembayaran</h6>
          <br>
          <div class="row">
            <div class="col"><label for="tanggal">Ditagih setiap tanggal</label></div>
            <div class="col">
              <input value="<?php echo $d['tanggal_tagih'] ?>" type="date" class="form-control" name="tanggal_tagih" id="tanggal_tagih">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="pemilik">Nama Pemilik Kost</label></div>
            <div class="col"><input value="<?php echo $d['nama_pemilik'] ?>" class="form-control" type="text" name="nama_pemilik" id="nama_pemilik"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="nama_bank">Nama Bank</label></div>
            <div class="col"><input value="<?php echo $d['nama_bank'] ?>" class="form-control" type="text" name="nama_bank" id="nama_bank"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="rekening">Nomor Rekening</label></div>
            <div class="col"><input value="<?php echo $d['no_rekening'] ?>" type="number" name="no_rekening" id="no_rekening" class="form-control"></div>
          </div>
          <br>

          <hr>
          <h6>Foto Bangunan</h6>
          <br>
          <div class="row">
            <div class="col">Foto bangunan Utama</div>
            <div class="col"><input value="<?php echo $d['foto_bangunan_utama'] ?>" type="file" name="foto_bangunan_utama" id="bangunan_utama"></div>
          </div>
          <br>
          <div class="row">
            <div class="col">Foto Kamar</div>
            <div class="col"><input value="<?php echo $d['foto_kamar'] ?>" type="file" name="foto_kamar" id="foto_kamar"></div>
          </div>
          <br>
          <div class="row">
            <div class="col">Foto Kamar Mandi</div>
            <div class="col"><input value="<?php echo $d['foto_kamar_mandi'] ?>" type="file" name="foto_kamar_mandi" id="foto_kamar_mandi"></div>
          </div>
          <br>
          <div class="row">
            <div class="col">Foto Interior Kamar</div>
            <div class="col"><input value="<?php echo $d['foto_interior'] ?>" type="file" name="foto_interior" id="foto_interior"></div>
          </div>
          <br>
          <hr>
          <h6>Detail Kost</h6>
          <br>
          <div class="row">
            <div class="col"><label for="jenis">Jenis Kost</label></div>
            <div class="col">
              <select name="jenis_kost" id="jenis_kost" class="custom-select">
                <option selected hidden value="<?php echo $d['jenis_kost'] ?>"><?php echo $d['jenis_kost'] ?></option>
                <option value="Putra">Kost Putra</option>
                <option value="Putri">Kost Putri</option>
                <option value="Campuran">Kost Campuran</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="tipe">Tipe Kost</label></div>
            <div class="col">
              <select name="tipe_kost" id="tipe_kost" class="custom-select">
                <option selected hidden value="<?php echo $d['tipe_kost'] ?>">Perbulan</option>
                <option value="Bulan">Perbulan</option>
                <option value="Tahun">Pertahun</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="harga_sewa">Harga Sewa</label></div>
            <div class="col">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
                <input value="<?php echo $d['harga_sewa'] ?>" type="text" name="harga_sewa" id="harga_sewa">
              </div>

            </div>
          </div>
          <br>
          <div class="col">
            <button type="submit" class="btn-primary" name="ubah">Ubah</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<!-- Akhir Content -->
<?php

include 'template/footer.php';
?>