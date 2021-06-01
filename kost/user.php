<?php
include "template/header.php";

$data = mysqli_query($koneksi, "SELECT * FROM user JOIN roles_user on user.roles=roles_user.id_roles");



?>
<div class="container">
    <label for="">Daftar seluruh pengguna</label>
    <table class="table ">
        <thead class="thead-dark">
            <tr class="">
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Password</th>
                <th>Roles</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>

            <?php



            $n = 0;
            while ($d = mysqli_fetch_array($data)) {
                $n++;
                echo $d['id'];
            ?>
                <tr>
                    <td><?php echo $n ?></td>
                    <td><?php echo $d['nama_lengkap'] ?></td>
                    <td><?php echo $d['username'] ?></td>
                    <td><?php echo $d['password'] ?></td>
                    <td><?php echo $d['nama'] ?></td>
                    <td>
                        <a href="php/hapus-user.php?id=<?php echo $d['id']; ?>"><button class="btn-danger">Banned</button></a>
                        <!-- <a href="<?php
                                        // echo "edit-profil.php?id=" . $d['id']
                                        ?>"><button class="btn-dark">Ubah</button></a> -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
include "template/footer.php"
?>