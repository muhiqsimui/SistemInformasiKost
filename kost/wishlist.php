<?php
include "template/header.php";

$f = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'"));
$id = $f['id'];
// menampilkan seluruh data kost 
$query = "SELECT * FROM kost JOIN user ON kost.id_pemilik = user.id JOIN wishlist ON kost.id_kost=wishlist.id_kost WHERE id_user='$id'";
$data = mysqli_query($koneksi, $query);
//tutup


?>

<style>
  a {
    text-decoration: none;
    color: black;
  }
</style>

<div class="container">
  <h3>My Wishlist</h3>
  <hr>
  <div class="row">


    <?php
    while ($d = mysqli_fetch_array($data)) {
    ?>
      <a href="tampilan-kost.php?id_kost=<?php echo $d['id_kost'] ?>">
        <div class="col-md-3">
          <!-- kost card  -->
          <div class="card kost-card">

            <!-- Card content -->
            <div class="card-body d-flex flex-row">

              <!-- Avatar -->

              <img src="../img/profil/<?php echo $d['foto_profil'] ?>" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">

              <!-- Content -->
              <div>

                <!-- Title -->
                <div class="row">
                  <h6 class="card-title font-weight-bold mb-2"><?php echo $d['nama_kost'] ?></h6>
                </div>
                <!-- Subtitle -->
                <div class="row">
                  <p class="card-text"><?php echo $d['kota'] . ',' . $d['provinsi'] ?></p>
                </div>

              </div>

            </div>

            <!-- Card image -->
            <div class="view overlay">
              <img class="card-img-top rounded-0" src="../img/foto_kost/kamar/<?php echo $d['foto_kamar'] ?>" alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!-- Card content -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-7" style="font-size:12px;font-weight:bold"><?php echo number_format($d['harga_sewa'], 0, ',', '.') . '/' . $d['tipe_kost'] ?></div>
                <div class="col" style="font-size:12px;font-weight:bold"><?php echo $d['jenis_kost'] ?></div>
              </div>
              <div class="row">
                <div class="col"><a href="php/hapus-wishlist.php?id_kost=<?php echo $d['id_kost'] ?>">hapus</a></div>
              </div>

            </div>

          </div>
        </div>
      </a>
    <?php } ?>
    <!--end kost Card -->



  </div>
</div>
<?php
include "template/footer.php";
?>