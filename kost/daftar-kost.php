<style>
  .kost-card {
    background-color: red;
  }

  .checked {
    color: orange;
  }


  .card {
    margin: 6px;
  }

  .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
  }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
include "template/header.php";

// menampilkan seluruh data kost 
// $query = "SELECT * FROM kost INNER JOIN user ON kost.id_pemilik = user.id";
// $data = mysqli_query($koneksi, $query);
//tutup

//ambil harga fasilitas kamar terendah
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



?>


<div class="container">

  <!-- pencarian  -->
  <div class="row">
    <div class="col bg-danger rounded-lg" style="color:white">
      <form action="daftar-kost.php" method="get">
        <br>
        <div class="row">

          <div class="col my-auto">
            <div class="input-group">
              <input placeholder="Cari kost sekarang" autofocus autocomplete="off" type="text" name="cari" class="form-control border-0 small">
              <div class="input-group-append">
                <button type="submit" value="cari" class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>
              </div>
            </div>
            <br>
          </div>
          <div class="col-md-2"></div>
        </div>
        <div class="row">
          <!-- filter provinsi  -->
          <div class="col-md-2">
            Provinsi :
            <select class="form-control " name="provinsi" id="provinsi">
              <option value=""></option>
              <?php
              $query2 = "SELECT provinsi from kost GROUP BY provinsi ";
              $data2 = mysqli_query($koneksi, $query2);

              while ($n = mysqli_fetch_array($data2)) {
              ?>
                <option value=<?php echo $n['provinsi'] ?>><?php echo $n['provinsi'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-2">
            <!-- filter kota  -->
            Kota :
            <select class="form-control " name="kota" id="kota">
              <option value=""></option>
              <?php
              $query2 = "SELECT kota from kost GROUP BY kota";
              $data2 = mysqli_query($koneksi, $query2);


              while ($n = mysqli_fetch_array($data2)) {

              ?>
                <option value=<?php echo $n['kota'] ?>><?php echo $n['kota'] ?></option>
              <?php
              }
              ?>
            </select>

          </div>
          <div class="col-md-2">
            <!-- filter jenis kost  -->
            Jenis Kost:
            <select class="form-control " name="jenis_kost" id="jenis_kost">
              <option value=""></option>
              <?php
              $query3 = "SELECT jenis_kost from kost GROUP BY jenis_kost";
              $data3 = mysqli_query($koneksi, $query3);

              while ($l = mysqli_fetch_array($data3)) {
              ?>
                <option value=<?php echo $l['jenis_kost'] ?>><?php echo $l['jenis_kost'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-2">
            Sort :
            <!-- filter harga  -->
            <select class="form-control" name="filter_harga" id="filter_harga">
              <option value=""></option>
              <option value="1">Harga termurah</option>
              <option value="2">Harga termahal</option>
            </select>
          </div>
      </form>
    </div>
  </div>
  <br>

  <?php
  // cari 
  if (isset($_POST['cari'])) {
    $provinsi = $_GET['provinsi'];
    $kota = $_GET['kota'];
    $cari = $_GET['cari'];
    $filter_harga = $_GET['filter_harga'];
    $jenis_kost = $_GET['jenis_kost'];
    echo "<b>Hasil pencarian : " . $cari . $provinsi . $kota . $jenis_kost . $filter_harga . "</b>";
  }
  ?>


  <?php

  //Algoritma Pagination untuk membagi page
  $jumlah_data_perhalaman = 6;
  $jumlah_halaman = ceil($jumlah_data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kost JOIN user ON kost.id_pemilik = user.id")) / $jumlah_data_perhalaman);
  if (isset($_GET['halaman'])) {
    $halaman_aktif = $_GET['halaman'];
  } else {
    $halaman_aktif = 1;
  }
  $awalData = ($jumlah_data_perhalaman * $halaman_aktif) - $jumlah_data_perhalaman;



  if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $provinsi = $_GET['provinsi'];
    $kota = $_GET['kota'];
    $jenis_kost = $_GET['jenis_kost'];
    $filter_harga = $_GET['filter_harga'];



    if ($filter_harga == 1) {
      $sub_query = "GROUP BY kost.harga_sewa";
    } else {
      $sub_query = "GROUP BY kost.harga_sewa desc";
    }
    // echo  $provinsi;
    $data = mysqli_query($koneksi, "SELECT * FROM kost JOIN user ON kost.id_pemilik = user.id WHERE nama_kost LIKE '%" . $cari . "%' AND provinsi LIKE '%" . $provinsi . "%' AND kota LIKE '%" . $kota . "%' AND jenis_kost LIKE '%" . $jenis_kost . "%' $sub_query LIMIT $awalData,$jumlah_data_perhalaman");
  } else {
    $data = mysqli_query($koneksi, "SELECT * FROM kost JOIN user ON kost.id_pemilik = user.id LIMIT $awalData,$jumlah_data_perhalaman");
  }
  //jumlah halaman yg akan di pagination



  $no = 1; ?>
  <div class="container">
    <div class="col">

      <hr>
      <div class="row">
        <?php
        while ($d = mysqli_fetch_array($data)) {
        ?>
          <div class="card" style="width: 18rem;">
            <a style="text-decoration: none;color:black" href="tampilan-kost.php?id_kost=<?php echo $d['id_kost'] ?>">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-3">
                    <div class="row">
                      <img style="object-fit: cover;" src="../img/profil/<?php echo $d['foto_profil'] ?>" class="thumbnail img-responsive rounded-circle mr-3" height="50px" width="50px" alt="avatar">
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-text">
                      <h6 class="card-title font-weight-bold mb-1"><?php echo $d['nama_kost'] ?></h6>
                      <span class="stars-active" style="width:50%">
                        <i class="fa fa-star checked" aria-hidden="true"></i>
                        <i class="fa fa-star checked" aria-hidden="true"></i>
                        <i class="fa fa-star checked" aria-hidden="true"></i>
                        <i class="fa fa-star checked" aria-hidden="true"></i>
                        <i class="fa fa-star-half-alt checked" aria-hidden="true"></i>
                      </span>
                      <p class="card-text"><i class="fas fa-map-marker-alt"></i> <?php echo $d['kota'] . ',' . $d['provinsi'] ?></p>

                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <img class="card-img-top mx-auto" src="../img/foto_kost/kamar/<?php echo $d['foto_kamar'] ?>" alt="Card image cap">
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-7" style="font-size:12px;font-weight:bold"><?php echo number_format($d['harga_sewa'] + minfas($d['id_kost'], $d['tipe_kost']), 0, ',', '.') . '/' . $d['tipe_kost'] ?></div>
                  <?php
                  if ($d['jenis_kost'] == "Putri") {
                    # code...

                  ?>
                    <div class="col" style="background-color:pink;font-size:12px;font-weight:bold;color:white"><?php echo $d['jenis_kost'] ?></div>
                  <?php
                  } else if ($d['jenis_kost'] == "Putra") {
                  ?>
                    <div class="col" style="background-color:black;font-size:12px;font-weight:bold;color:white"><?php echo $d['jenis_kost'] ?></div>
                  <?php
                  } else if ($d['jenis_kost'] == "Campuran") {
                  ?>
                    <div class="col" style="background-color:purple;font-size:12px;font-weight:bold;color:white"><?php echo $d['jenis_kost'] ?></div>
                  <?php } ?>
                </div>
              </div>
            </a>
          </div>



        <?php } ?>
      </div>
      <hr>
      <div class="row">

        <?php for ($i = 1; $i <= $jumlah_halaman; $i++) : ?>
          <?php if ($i == $halaman_aktif) : ?>
            <a style="font-weight: bold;background-color:black;padding:10px;color:white;" href="?halaman=<?php echo $i ?>"><?php echo $i ?></a>
          <?php else : ?>
            <a style="font-weight: bold;background-color:red;padding:10px;color:white" href="?halaman=<?php echo $i ?>"><?php echo $i ?></a>
          <?php endif; ?>
        <?php endfor; ?>

      </div>
    </div>
  </div>

  <!-- tutup pencarian  -->
  <br>


</div>
<?php
include "template/footer.php";
?>