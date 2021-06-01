<style>
    .num {
        width: 400px;
        height: 400px;
    }
</style>
<?php
header("location:daftar-kost.php");
include('template/header.php');
$username = $_SESSION['username'];
$user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$d = mysqli_fetch_array($user);
?>

<div class="container">
    <!--Main Content -->
    <p>Hai Selamat Datang <b><?php echo $_SESSION['username']; ?></b></p>
    <!-- Akhir Content -->
    <?php
    include('template/footer.php');

    ?>