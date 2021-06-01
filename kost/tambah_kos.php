<?php
include('template/header.php');
?>


<!--Main Content -->
<div class="container">

  <div class="row">
    <div class="col-md-10">
      <form class="text-center border border-light p-5" action="php/tambah-kos_proses.php" method="post" enctype="multipart/form-data">
        <h3>Tambah Kost</h3>
        <div class="form-group">
          <hr>
          <h6>Info Kost</h6>
          <div class="row">
            <div class="col"><label for="namakost">Nama Kost </label></div>
            <div class="col"> <input type="text" name="nama_kost" id="nama_kost" class="form-control"></div>
          </div>
          <br>

          <div class="row">
            <div class="col"><label for="alamat">Alamat Kost</label></div>
            <div class="col"><textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukan alamat kost anda"></textarea></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="provinsi">Provinsi</label></div>
            <div class="col"> <input type="text" name="provinsi" id="provinsi" class="form-control"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="kota">Kabupaten/Kota</label></div>
            <div class="col"> <input type="text" name="kota" id="kota" class="form-control"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="kecamatan">Kecamatan</label></div>
            <div class="col"> <input type="text" name="kecamatan" id="kecamatan" class="form-control"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="kelurahan">Kelurahan</label></div>
            <div class="col"> <input type="text" name="kelurahan" id="kelurahan" class="form-control"></div>
          </div>
          <br>

          <div class="row">
            <div class="col"><label for="deskripsi">Deskripsi Kost(opsional)</label></div>
            <div class="col"><textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Masukan alamat kost anda"></textarea></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="kontak">Nomer Telepon/HP</label></div>
            <div class="col"><input type="text" name="kontak" id="kontak" class="form-control"></div>
          </div>

          <!-- info kamar kost  -->
          <!-- <hr>
          <h6>Info kamar</h6>
          <br>
          <div class="row">
            <div class="col"><label for="jumlah_kamar">Jumlah Kamar</label></div>
            <div class="col"> <input type="number" name="jumlah_kamar" id="jumlah_kamar" class="form-control"></div>
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
              <select name="" id="" class="form-control" required>

                <option value="">Kamar Mandi Dalam</option>
                <option value="">Kamar Mandi Luar</option>
              </select>
            </div>
          </div> -->
          <!-- fasilitas kost  -->
          <hr>
          <h6>Fasilitas Kost</h6>



          <br>
          <div class="row">
            <!-- <div class="col"><input type="checkbox" name="fasilitas" id="fasilitas">Kamar Mandi Dalam</div> -->
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Parkir Mobil">Parkir Mobil</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="WIFI/Internet">WIFI/Internet</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Security">Security</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Ruang Tamu">Ruang Tamu</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Ruang Fitness">Ruang Fitness</div>

          </div>
          <div class="row">
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Ruang Makan">Ruang Makan</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Dapur">Dapur</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Laundry">Laundry</div>
            <div class="col"><input type="checkbox" name="fasilitas[]" value="Musholla">Musholla</div>
            <div class="col"></div>
          </div>

          <!-- tutup fasilitas  -->

          <!-- fasilitas kamar  -->
          <!-- <br>
          <hr>
          <h6>Fasilitas Kamar</h6>
          <div class="row">
            <div class="col"><input type="checkbox" name="fasilitas_kamar" id="fasilitas_kamar" class="form-check-input">Kamar Mandi Dalam</div>
            <div class="col"><input type="checkbox" name="fasilitas_kamar" id="fasilitas_kamar" class="form-check-inputl">AC</div>
            <div class="col"><input type="checkbox" name="fasilitas_kamar" id="fasilitas_kamar" class="form-check-input">Tempat Tidur</div>
            <div class="col"><input type="checkbox" name="fasilitas_kamar" id="fasilitas_kamar" class="form-check-input">Lemari</div>
            <div class="col"><input type="checkbox" name="fasilitas_kamar" id="fasilitas_kamar" class="form-check-input">TV</div>
          </div> -->


          <!-- tutup fasilitas kamar  -->

          <hr>
          <h6>Info Pembayaran</h6>
          <br>
          <div class="row">
            <div class="col"><label for="tanggal">Ditagih setiap tanggal</label></div>
            <div class="col">
              <input type="date" class="form-control" name="tanggal_tagih" id="tanggal_tagih">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="pemilik">Nama Pemilik Kost</label></div>
            <div class="col"><input class="form-control" type="text" name="nama_pemilik" id="nama_pemilik"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="nama_bank">Nama Bank</label></div>
            <div class="col"><input class="form-control" type="text" name="nama_bank" id="nama_bank"></div>
          </div>
          <br>
          <div class="row">
            <div class="col"><label for="rekening">Nomor Rekening</label></div>
            <div class="col"><input type="number" name="no_rekening" id="no_rekening" class="form-control"></div>
          </div>
          <br>

          <hr>
          <h6>Foto Bangunan</h6>
          <br>
          <div class="row">
            <div class="col">Foto bangunan Utama</div>
            <div class="col"><input type="file" name="foto_bangunan_utama" id="bangunan_utama"></div>
          </div>
          <br>
          <div class="row">
            <div class="col">Foto Kamar</div>
            <div class="col"><input type="file" name="foto_kamar" id="foto_kamar"></div>
          </div>
          <br>
          <div class="row">
            <div class="col">Foto Kamar Mandi</div>
            <div class="col"><input type="file" name="foto_kamar_mandi" id="foto_kamar_mandi"></div>
          </div>
          <br>
          <div class="row">
            <div class="col">Foto Interior Kamar</div>
            <div class="col"><input type="file" name="foto_interior" id="foto_interior"></div>
          </div>
          <br>
          <hr>
          <h6>Detail Kost</h6>
          <br>
          <div class="row">
            <div class="col"><label for="jenis">Jenis Kost</label></div>
            <div class="col">
              <select name="jenis_kost" id="jenis_kost" class="custom-select">
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
                <input type="text" name="harga_sewa" id="harga_sewa">
              </div>

            </div>
          </div>
          <br>
          <div class="col">
            <button type="submit" class="btn-primary" name="tambah">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<!-- Akhir Content -->

<?php
include('template/footer.php');
?>