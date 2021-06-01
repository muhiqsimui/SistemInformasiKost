<?php
include('template/header.php');

?>

<style>
    /* .container {} */
</style>
<!--Main Content -->

<?php
$username = $_SESSION['username'];
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$d = mysqli_fetch_array($data);
?>
<div class="container">
    <h5 class="text-center">Profil</h5>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <img style="width: 100%;
    height: 17vw;
    object-fit: cover;" width="200px" class=" img-profile img-thumbnail " src="../img/profil/<?php echo $d['foto_profil'] ?>" alt="" srcset="" width="200px">
            </div>
        </div>
        <div class="col">
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">Username :</div>
                    <div class="col-sm-10"><?php echo $_SESSION['username']; ?></div>
                </div>


                <div class="row">
                    <div class="col">Nama Lengkap:</div>
                    <div class="col-sm-10"><?php echo $d['nama_lengkap']; ?></div>

                </div>
                <div class="row">
                    <div class="col">Email :</div>
                    <div class="col-sm-10"><?php echo $d['email']; ?></div>
                </div>
                <div class="row">
                    <div class="col">Perkerjaan :</div>
                    <div class="col-sm-10"><?php echo $d['pekerjaan']; ?></div>
                </div>
                <div class="row">
                    <div class="col">Jenis Kelamin :</div>
                    <div class="col-sm-10"><?php echo $d['jenis_kelamin']; ?></div>
                </div>
                <div class="row">
                    <div class="col">Nomer HP :</div>
                    <div class="col-sm-10"><?php echo $d['no_hp']; ?></div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-3 text-center mx-auto">
            <a href="edit-profil.php">
                <div class="form-control btn-primary">Ubah Data</div>
            </a>
        </div>
    </div>



</div>
<!-- Akhir Content -->

<?php
include('template/footer.php');
?>