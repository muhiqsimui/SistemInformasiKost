<?php include 'template/header.php' ?>
<style>
  /* div {
    border: 1px solid red;
  }

  .card {
    background-color: aquamarine;
  } */
  .checked {
    color: gold;
  }

  h3 {
    color: black;
  }



  h6 {
    color: red;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 150%;
  }

  .tampilan-foto {
    max-height: 500px;

  }

  label {
    color: black;
    font-weight: bold;
  }

  /* .tampilan-foto img {} */
</style>

<?php
$id_kost = $_GET['id_kost'];

$query = "SELECT * FROM kost JOIN user ON kost.id_pemilik=user.id WHERE id_kost=$id_kost";
$data = mysqli_query($koneksi, $query);
$d = mysqli_fetch_array($data);


$idkost = $d['id_kost'];
$queryx = "SELECT * FROM kamar WHERE id_kost=$idkost";
$kamar = mysqli_query($koneksi, $queryx);

//total harga sewa + fasilitas terendah
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

<div class="container">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col">
            <img style="object-fit: cover;" src="../img/profil/<?php echo $d['foto_profil'] ?>" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
            <?php echo $d['nama_lengkap'] ?>
          </div>

        </div>
        <div class="row ">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner tampilan-foto">
              <div class="carousel-item active">
                <img class="d-block w-100 " src="../img/foto_kost/kamar/<?php echo $d['foto_kamar'] ?>" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../img/foto_kost/bangunan_utama/<?php echo $d['foto_bangunan_utama'] ?>" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../img/foto_kost/kamar_mandi/<?php echo $d['foto_kamar_mandi'] ?>" alt=" Third slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../img/foto_kost/interior/<?php echo $d['foto_interior'] ?>" alt=" Four slide">
              </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
        <br>
        <div class="row">
          <div class="card-text">
            <div class="col">
              <button class="btn-primary"><?php echo $d['jenis_kost'] ?></button>
            </div>

          </div>
        </div>
        <br>

        <div class="row">
          <div class="col-md-8">
            <div class="card-title">
              <h3><?php echo $d['nama_kost'] ?></h3>
            </div>
          </div>
          <div class="col">
            <span class="stars-active" style="width:50%">
              <i class="fa fa-star checked" aria-hidden="true"></i>
              <i class="fa fa-star checked" aria-hidden="true"></i>
              <i class="fa fa-star checked" aria-hidden="true"></i>
              <i class="fa fa-star checked" aria-hidden="true"></i>
              <i class="fa fa-star-half-alt checked" aria-hidden="true"></i>
            </span>
          </div>

          <div class="col">

            <div class="card-text">

              <div class="row">
                <!-- harga -->
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- sisi kiri  -->
          <div class="col-md-8">
            <div class="container-fluid">
              <div class="row">
                <div class="col"><i class="fas fa-map-marker-alt"></i> <?php echo $d['provinsi'] ?>,<?php echo $d['kota'] ?>,<?php echo $d['kecamatan'] ?>,<?php echo $d['kelurahan'] ?></div>
              </div>
              <br>
              <div class="row">
                <div class="container">
                  <!-- <div class="row">
                    <div class="card-text"> -->
                  <!-- <p><i class="fas fa-fw fa-long-arrow-alt-right"></i> Lebar Kamar = <?php echo $d['lebar_kamar'] ?> m</p>
                      <p><i class="fas fa-fw fa-long-arrow-alt-up"></i> Panjang Kamar = <?php echo $d['panjang_kamar'] ?> m</p> -->
                  <!-- <p><i class="fas fa-fw fa-th-large"></i> Luas Kamar = <?php echo $d['panjang_kamar'] . "x" . $d['lebar_kamar'] ?> m</p> -->
                  <!-- </div>
                  </div> -->


                  <div class="row">
                    <div class="card-title">
                      <label for="">Deskripsi Kost</label>
                      <p><?php echo $d['deskripsi'] ?></p>
                      <hr>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-title">
                      <label>Fasilitas Kost</label>
                      <p><?php echo $d['fasilitas_kost'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-title">
                      <label>Alamat
                        <i class="fas fa-map-marked-alt"></i></label>
                      <p>
                        <?php echo $d['alamat']; ?>
                      </p>
                    </div>

                  </div>
                  <!-- kamar  -->

                  <?php
                  $cek = mysqli_num_rows($kamar);
                  if ($cek > 0) {


                    # code...

                  ?>
                    <div class="row">
                      <label>Info Kamar</label>
                    </div>
                    <div class="row">
                      <table class="table">
                        <thead class=" thead-dark">
                          <tr>
                            <!-- <th>Tipe</th> -->
                            <th>Tersedia</th>
                            <th>Tipe Kamar</th>
                            <th>Fasilitas Kamar</th>
                            <th>Harga Sewa</th>
                          </tr>
                        </thead>
                        <?php
                        // $fasilitas=implode(', ',$l['fasilitas_kamar']);
                        $i = 0;
                        while ($l = mysqli_fetch_array($kamar)) {
                          $i++;
                        ?>
                          <tbody>
                            <tr>
                              <!-- <td><?php
                                        // echo "A" . $i; 
                                        ?></td> -->
                              <td><?php if ($l['jumlah_kamar'] > 0) {
                                    echo $l['jumlah_kamar'];
                                  } else {
                                    echo "Penuh";
                                  }

                                  ?></td>
                              <td><?php echo $l['tipe_kamar'] ?></td>
                              <td><?php echo $l['fasilitas_kamar'] ?></td>
                              <td><?php echo number_format(fas($l['biaya_fasilitas'], $d['tipe_kost']) + $d['harga_sewa'], 0, ',', '.') . "/" . $d['tipe_kost'] ?></td>
                            </tr>
                          </tbody>
                        <?php }
                        ?>
                      </table>

                    </div>
                  <?php } ?>
                  <br>
                  <!-- tutup kamar  -->

                </div>
              </div>


            </div>

          </div>
          <!-- tutup sisi kiri -->

          <!-- sisi kanan  -->
          <div class="col bg-light py-lg-4 text-center">
            <div class="container">
              <div class="row">
                <h6>Rp. <?php echo number_format($d['harga_sewa'] + minfas($d['id_kost'], $d['tipe_kost']), 0, ',', '.'); ?> / <?php echo $d['tipe_kost'] ?></h6>
              </div>
              <hr>
              <div class="row">
                Pemillik Kost : <?php echo $d['nama_pemilik'] ?>
              </div>
              <div class="row">
                <?php
                if ($d['jumlah_kamar'] != 0) {
                  echo "Sisa Kamar : <b style='color:green'>" . $d['jumlah_kamar'] . "</b>";
                } else {
                  echo " <b style='color:red'>Kamar Tidak Tersedia</b>";
                }
                ?>
              </div>
              <div class="row">
                Kontak : <?php echo $d['kontak'] ?>
              </div>
              <div class="row">
                <div style="position:fixed;right:20px;bottom:20px;">
                  <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $d['kontak'] ?>&text=Assalamualaikum, apakah ini bapak/ibu yang mengiklan kost <?php echo $d['nama_kost'] ?> di website simkos ">
                    <button style="background:#f50251;vertical-align:center;height:36px;border-radius:5px">
                      <img src="https://web.whatsapp.com/img/favicon/1x/favicon.png"> Whatsapp Pemilik Kost</button></a>
                </div>
              </div>
            </div>
          </div>
          <!-- tutup sisi kiri -->

        </div>
        <div class="row">
          <?php
          $query3 = "SELECT * from user where username='$username'";
          $data3 = mysqli_query($koneksi, $query3);
          $n = mysqli_fetch_array($data3);
          if ($n['roles'] == 1 && $d['jumlah_kamar'] != 0) {
            # code...

          ?>
            <div class="col-md-2"><a href="booking.php?id_kost=<?php echo $d['id_kost'] ?>"><button class="btn-primary">Booking Kost</button></a></div>
            <div class="col-md-3"><a href="php/wishlist-proses.php?id_kost=<?php echo $d['id_kost'] ?>"><button class="btn-group">Masukan ke Wishlist</button></a></div>
          <?php
          }
          ?>
          <div class="col"></div>
        </div>
      </div>
      <div class="card-footer"></div>
    </div>
  </div>
</div>






<?php


include 'template/footer.php' ?>