-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2020 pada 10.53
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `hitungan_sewa` int(11) NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `booking`
--
DELIMITER $$
CREATE TRIGGER `update_kamar` AFTER INSERT ON `booking` FOR EACH ROW BEGIN
	UPDATE kamar SET jumlah_kamar=jumlah_kamar-NEW.jumlah_kamar
    WHERE id_kamar=NEW.id_kamar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `panjang_kamar` int(11) NOT NULL,
  `lebar_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `biaya_fasilitas` int(11) NOT NULL,
  `fasilitas_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kost`, `jumlah_kamar`, `panjang_kamar`, `lebar_kamar`, `tipe_kamar`, `biaya_fasilitas`, `fasilitas_kamar`) VALUES
(1, 4, 12, 4, 4, 'kamar mandi dalam', 100000, 'Tempat Tidur, TV, Kulkas'),
(2, 4, 0, 3, 3, 'kamar mandi luar', 50000, 'Tempat Tidur, Lemari, Kipas Angin'),
(3, 4, 4, 5, 3, 'kamar mandi luar', 231, 'Lemari, TV');

--
-- Trigger `kamar`
--
DELIMITER $$
CREATE TRIGGER `after_update` AFTER UPDATE ON `kamar` FOR EACH ROW BEGIN
	UPDATE kost SET jumlah_kamar=jumlah_kamar-1
	WHERE id_kost=NEW.id_kost;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_kamar` AFTER DELETE ON `kamar` FOR EACH ROW UPDATE kost SET kost.jumlah_kamar = kost.jumlah_kamar-old.jumlah_kamar
WHERE kost.id_kost=old.id_kost
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_kamar` AFTER INSERT ON `kamar` FOR EACH ROW BEGIN
	UPDATE kost SET jumlah_kamar=jumlah_kamar+NEW.jumlah_kamar
	WHERE id_kost=NEW.id_kost;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE `kost` (
  `id_kost` int(11) NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `tipe_kost` varchar(255) NOT NULL,
  `jenis_kost` varchar(255) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `tanggal_tagih` date NOT NULL,
  `nama_pemilik` text NOT NULL,
  `nama_bank` text NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `foto_bangunan_utama` varchar(255) NOT NULL,
  `foto_kamar` varchar(255) NOT NULL,
  `foto_kamar_mandi` varchar(255) NOT NULL,
  `foto_interior` varchar(255) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `fasilitas_kost` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`id_kost`, `nama_kost`, `tipe_kost`, `jenis_kost`, `jumlah_kamar`, `tanggal_tagih`, `nama_pemilik`, `nama_bank`, `no_rekening`, `foto_bangunan_utama`, `foto_kamar`, `foto_kamar_mandi`, `foto_interior`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `alamat`, `harga_sewa`, `kontak`, `deskripsi`, `id_pemilik`, `fasilitas_kost`) VALUES
(4, 'Kost Detha', 'Tahun', 'Putri', 16, '2020-03-13', 'ibu kost', 'Mandiri', 812345678, 'pexels-photo-1454806.jpeg', 'pexels-photo-2631746.jpeg', 'pexels-photo-545012.jpeg', 'pexels-photo-1329711.jpeg', 'Yogyakarta', 'Sleman', 'Ngemplak', 'Umbulmartani', 'Jl. kaliurang km 14 ,Gg. Godel/Kanguru , kos pondok detha ,kamar no.14', 4500000, '0825353525', 'Kost Muslim anak uii, memiliki fasilitas terbaik , Dekat kampus ', 22, 'Parkir Mobil, WIFI/Internet, Security, Ruang Tamu'),
(7, 'Kost Lodadi', 'Bulan', 'Campuran', 0, '2020-03-21', 'Rachel', 'Mandiri', 3262622, 'room2.jpg', 'room1.jpg', 'room2.jpg', 'room1.jpg', 'Yogyakarta', 'Sleman', 'Ngaklik', '', 'jalan raya bekasi', 700000, '0833322211', 'tempat kos anak UGM', 22, 'Security, Dapur, Laundry'),
(8, 'Kost Poncowati', 'Tahun', 'Putri', 0, '2020-03-27', 'Bapak sudirman said', 'BCA', 2147483647, 'room3.jpg', 'room3.jpg', 'room3.jpg', 'room3.jpg', 'Yogyakarta', 'Bantul', 'Pengasihan', 'Rawa belong', 'Jl. Poncowati no 19, Dekat toko A', 10000000, '2333444', 'Kost nyaman mantap minimalis', 26, '0'),
(9, 'Kost Classic', 'Bulan', 'Putra', 0, '2020-03-19', 'Rianto', 'Mandiri', 923334124, 'pexels-photo-271743.jpeg', 'pexels-photo-271624.jpeg', 'pexels-photo-271619.jpeg', 'pexels-photo-271618.jpeg', 'Yogyakarta', 'Depok', 'Tegalsari', 'Ijen', 'Jl. Timoho no 24', 350000, '823423242', 'Kost gaya classic terbaik', 31, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `Id_kost` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles_user`
--

CREATE TABLE `roles_user` (
  `id_roles` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles_user`
--

INSERT INTO `roles_user` (`id_roles`, `nama`) VALUES
(1, 'penghuni kost'),
(2, 'pemilik kost'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `no_tagihan` int(11) NOT NULL,
  `no_booking` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `stats` int(11) NOT NULL,
  `tanggal_tagihan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bukti_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_profil` text NOT NULL,
  `roles` int(11) NOT NULL,
  `id_kost_saya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `username`, `password`, `no_hp`, `pekerjaan`, `jenis_kelamin`, `foto_ktp`, `foto_profil`, `roles`, `id_kost_saya`) VALUES
(22, 'Pak Deta', 'deta@mail.com', 'deta', 'deta', '082147483647', 'deta owner', ' laki-laki', '', 'pexels-photo-2340978.jpeg', 2, 0),
(25, 'Muhammad Iqbal', 'muhiqsimui@gmail.com', 'user', 'user', '082133771248', 'Mahasiswa', '         laki-laki', 'Capture.PNG', 'ada.PNG', 1, 0),
(26, 'deta2', 'deta2@mail.com', 'deta2', 'deta2', '2222222', 'Programmer', '  laki-laki', 'ele.jpg', 'pexels-photo-3779677.jpeg', 2, 0),
(30, 'admin', '', 'admin', 'admin', '0', '', '', '', '', 3, 0),
(31, 'Jhon Dee', 'deta3@mail.com', 'deta3', 'deta3', '0433211452', 'Programmer', '  laki-laki', 'www.drawesome.uy-vac46s66tb.png', 'pexels-photo-220453.jpeg', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`,`id_kamar`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_kost` (`id_kost`);

--
-- Indeks untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `Id_kost` (`Id_kost`),
  ADD KEY `Id_user` (`Id_user`);

--
-- Indeks untuk tabel `roles_user`
--
ALTER TABLE `roles_user`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`no_tagihan`),
  ADD KEY `no_booking` (`no_booking`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kost_saya` (`id_kost_saya`),
  ADD KEY `roles` (`roles`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_kost` (`id_kost`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles_user`
--
ALTER TABLE `roles_user`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `no_tagihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`);

--
-- Ketidakleluasaan untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD CONSTRAINT `kost_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`Id_kost`) REFERENCES `kost` (`id_kost`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`Id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`no_booking`) REFERENCES `booking` (`id_booking`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roles`) REFERENCES `roles_user` (`id_roles`);

--
-- Ketidakleluasaan untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
