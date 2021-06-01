<?php
include "template/header.php"
?>



<?php
include "../php/koneksi.php";
$username = $_SESSION['username'];
$id_kost = $_GET['id_kost'];
//ambil user
$query_user = "SELECT * FROM user WHERE username='$username'";
$data_user = mysqli_query($koneksi, $query_user);
$f = mysqli_fetch_array($data_user);
// echo "id user=" . $f['id'] . "<br>";
//ambil tabel kost
$query_kost = "SELECT * FROM kost WHERE id_kost='$id_kost'";
$data_kost = mysqli_query($koneksi, $query_kost);
$d = mysqli_fetch_array($data_kost);

$id_kamar = $_POST['idkamar'];

$query_kamar = "SELECT * FROM kamar WHERE id_kamar='$id_kamar'";
$data_kamar = mysqli_query($koneksi, $query_kamar);
$k = mysqli_fetch_array($data_kamar);
$k['biaya_fasilitas'];

$tipe_kost = $d['tipe_kost'];
if ($tipe_kost == "Bulan") {
  $harga_fasilitas = $k['biaya_fasilitas'];
  $harga_sewa = $d['harga_sewa'];
} else if ($tipe_kost == "Tahun") {
  $harga_fasilitas = $k['biaya_fasilitas'] * 12;
  $harga_sewa = $d['harga_sewa'] / 12;
}



if (isset($_POST['order'])) {

  //user
  $id_user = $f['id'];
  //booking

  $tanggal_masuk = $_POST['tanggal_masuk'];
  $hitungan_sewa = $_POST['hitungan_sewa'];
  $durasi_sewa = $_POST['durasi_sewa'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $no_hp = $_POST['no_hp'];
  $pekerjaan = $_POST['pekerjaan'];
  $jumlah_kamar = 1;
  $foto_lama = $f['foto_ktp'];


  // hitungan sewa 
  // 1=harian, 2=mingguan 3=bulanan= 4=tahunan

  // echo "hitungan sewa = " . $hitungan_sewa;
  // echo "<br>";
  // echo "durasi sewa = " . $durasi_sewa;
  // echo "<br>";
  // echo "Start date : " . $tanggal_masuk;

  function hitungan_sewa()
  {
    global $hitungan_sewa, $durasi_sewa;
    if ($hitungan_sewa == 3) {
      echo $durasi_sewa . " Bulan";
    } else if ($hitungan_sewa == 4) {
      echo $durasi_sewa . " Tahun";
    }
  }

  // menghitung tanggal keluar 
  if ($hitungan_sewa == 3) {
    $tanggal_keluar = date('Y-m-d', strtotime('+' . $durasi_sewa . ' month', strtotime($tanggal_masuk)));

    $biaya = ($durasi_sewa * ($harga_sewa + $k['biaya_fasilitas']));
  } elseif ($hitungan_sewa == 4) {
    $tanggal_keluar = date('Y-m-d', strtotime('+' . $durasi_sewa . ' years', strtotime($tanggal_masuk)));

    $biaya = ($durasi_sewa * 12 * ($harga_sewa + $k['biaya_fasilitas']));
  }
}

?>
<form action="pembayaran.php?id_kost=<?php echo $id_kost ?>" method="post">
  <div class="container">
    <div class="container-fluid">


      <!-- Tanggal  -->
      <div class="row">
        <!-- tanggal masuk  -->
        <div class="col">
          <div class="row">
            <div class="col">Tanggal Masuk</div>
          </div>
          <div class="row">
            <div class="col"><input disabled type="date" name="tanggal_masuk" id="tanggal_masuk" value="<?php echo $tanggal_masuk ?>" class="form-control"></div>
          </div>
        </div>
        <!-- lama sewa  -->
        <div class="col">
          <div class="row">
            <div class="col">Lama Sewa</div>
          </div>
          <div class="row">
            <div class="col">
              <select name="durasi_sewa" id="durasi_sewa" class="form-control" disabled>
                <option value="<?php echo $durasi_sewa ?>">
                  <?php hitungan_sewa() ?></option>
              </select>
            </div>
          </div>
        </div>
        <!-- tanggal keluar  -->
        <div class="col">
          <div class="row">
            <div class="col">Tanggal Keluar</div>
          </div>
          <div class="row">
            <div class="col"><input disabled type="date" name="tanggal_keluar" id="tanggal_keluar" value="<?php echo $tanggal_keluar ?>" class="form-control"></div>
          </div>
        </div>
      </div>
      <!-- tutup tanggal  -->
      <hr>
      <!-- Detail kost  -->
      <div class="row">
        <div class="col-md-5">
          <img src="../img/foto_kost/kamar/<?php echo $d['foto_kamar'] ?>" alt="" width="400px">
        </div>
        <div class="col">
          <div class="row">
            <button class="btn-primary" disabled><?php echo $d['jenis_kost'] ?></button>
          </div>
          <br>
          <br>
          <div class="row">
            <h4><b><?php echo $d['nama_kost'] . ", " . $d['kecamatan'] . " " . $d['kota'] . " " . $d['provinsi'] ?></b></h4>
          </div>
          <br>
          <div class="row">
            <h4><?php echo "Rp." . number_format($d['harga_sewa'], 0, ',', '.') . " / " . $d['tipe_kost'] ?></h4>
          </div>
        </div>
      </div>
      <hr>
      <!-- data penghuni  -->

      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col">
              <h4>Data Penghuni</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"><label for="">Nama Lengkap :</label></div>
            <div class="col"><?php echo $nama_lengkap ?></div>
          </div>
          <div class="row">
            <div class="col-md-2"><label for="">Jenis kelamin :</label></div>
            <div class="col"><?php echo $jenis_kelamin ?></div>
          </div>
          <div class="row">
            <div class="col-md-2"><label for="">Nomer HP/Telpon :</label></div>
            <div class="col"><?php echo $no_hp ?></div>
          </div>
          <div class="row">
            <div class="col-md-2"><label for="">Pekerjaan :</label></div>
            <div class="col"><?php echo $pekerjaan ?></div>
          </div>
        </div>
      </div>
      <hr>

      <!-- keterangan biaya  -->
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col">
              <h4>Keterangan Biaya</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">Biaya Lain:</div>
            <div class="col">-</div>
          </div>
          <div class="row">
            <div class="col-md-2">Biaya kost :</div>
            <div class="col">
              <?php
              echo "Rp." . number_format($d['harga_sewa'], 0, ',', '.') . " / " . $d['tipe_kost'];

              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">Biaya Fasilitas :</div>
            <div class="col">
              <?php
              echo "Rp." . number_format($k['biaya_fasilitas'], 0, ',', '.') . " / " . "Bulan"
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">Lama Sewa :</div>
            <div class="col"><?php echo hitungan_sewa()  ?></div>
          </div>
          <div class="row">
            <div class="col-md-2">Total Tagihan :</div>
            <div class="col"><?php echo "Rp." . number_format($biaya, 0, ',', '.') ?></div>
            <input type="text" name="biaya" id="biaya" value="<?php echo $biaya ?>" hidden>
          </div>
        </div>
      </div>
      <hr>
      <h4>Pilih Metode Pembayaran</h4>
      <br>
      <div class="row">
        <div class="col-md-3">
          <p>Transfer via Atm/Debit Card</p>
        </div>
        <div class="col">
          <select class="form-control" name="bank" id="bank" required>
            <option selected hidden value="">Pilih nama bank</option>
            <option value="Bank BNI">Bank BNI</option>
            <option value="Bank Rakyat Indonesia tbk">Bank Rakyat Indonesia tbk</option>
            <option value="Bank Mandiri">Bank Mandiri</option>
            <option value="Bank BCA">Bank BCA</option>
            <option value="Bank Muamalat">Bank Muamalat</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <input required type="checkbox" name="" id=""> Apakah anda yakin menyetujui ketentuan yang berlaku
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button name="submit" type="submit" class="btn-primary">Lanjut Pembayaran</button>
        </div>
      </div>
    </div>
  </div>
  <input type="text" name="now" id="now" value="<?php echo $tanggal_masuk ?>" hidden>
</form>

<?php
$foto_ktp = $_FILES['foto_ktp']['name'];
$sumber1 = $_FILES["foto_ktp"]['tmp_name'];

if ($foto_ktp != "") {
  move_uploaded_file($sumber1, '../img/ktp/' . $foto_ktp);
} else {
  $foto_ktp = $foto_lama;
}


$start_date = date('Y-m-d', strtotime($tanggal_masuk));

$update_data = mysqli_query($koneksi, "UPDATE user SET foto_ktp='$foto_ktp',nama_lengkap='$nama_lengkap',jenis_kelamin='$jenis_kelamin',no_hp='$no_hp',pekerjaan='$pekerjaan' WHERE id='$id_user' ");

// echo "id" . $id_user . "<br>";
// echo "id kamar" . $id_kamar . "<br>";
// echo "start date" . $start_date . "<br>";
// echo "hitungan sewa =" . $hitungan_sewa, "<br>";
// echo "durasi sewa =" . $durasi_sewa, "<br>";
// echo "tanggal keluar=" . $tanggal_keluar, "<br>";
// echo "jumlah kamar =" . $jumlah_kamar, "<br>";

$kirim = mysqli_query($koneksi, "INSERT INTO booking VALUES ('','$id_user','$id_kamar','$start_date','$hitungan_sewa','$durasi_sewa','$tanggal_keluar','$jumlah_kamar')");

// var_dump($kirim);
$ambil_kirim = mysqli_query($koneksi, "SELECT * FROM booking WHERE id_user='$id_user' ORDER BY id_booking DESC");

$t = mysqli_fetch_array($ambil_kirim);
$new_id_booking = $t['id_booking'];
// echo $new_id_booking;

$tagihan = mysqli_query($koneksi, "INSERT INTO tagihan VALUES ('','$new_id_booking','$biaya','3',CURRENT_TIMESTAMP,'')");
// var_dump($tagihan);
include "template/footer.php";
?>