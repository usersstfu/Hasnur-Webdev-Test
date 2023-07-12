-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2023 pada 18.07
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertmobil` (IN `in_idmobil` INT, IN `in_merk` VARCHAR(50), IN `in_harga` INT, IN `in_warna` VARCHAR(50), IN `in_tahunpembuatan` DATE, IN `in_pajakberakhir` DATE, IN `in_gambar` VARCHAR(50), IN `in_terjual` VARCHAR(50))   BEGIN
		INSERT INTO mobil (idmobil,merk,harga, warna, tahunpembuatan, pajakberakhir, gambar, terjual)
		VALUES (in_idmobil, in_merk, in_harga, in_warna, in_tahunpembuatan, in_pajakberakhir, in_gambar, in_terjual);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertpembeli` (IN `in_noktp` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_ttl` VARCHAR(50), IN `in_gender` VARCHAR(10), IN `in_alamat` VARCHAR(100), IN `in_nohp` VARCHAR(13), IN `in_pembayaran` VARCHAR(20), `in_idmobil` INT)   BEGIN
		INSERT INTO pembeli(noktp, nama, ttl, gender, alamat, nohp, pembayaran, idmobil)
		VALUES (in_noktp, in_nama, in_ttl, in_gender, in_alamat, in_nohp, in_pembayaran, in_idmobil);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahmobil` (IN `in_idmobil` INT, IN `in_merk` VARCHAR(50), IN `in_harga` INT, IN `in_warna` VARCHAR(50), IN `in_tahunpembuatan` DATE, IN `in_pajakberakhir` DATE, IN `in_gambar` VARCHAR(50))   BEGIN
		INSERT INTO mobil (idmobil,merk,harga, warna, tahunpembuatan, pajakberakhir, gambar)
		VALUES (in_idmobil, in_merk, in_harga, in_warna, in_tahunpembuatan, in_pajakberakhir, in_gambar);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatemobil` (IN `up_idmobil` INT, IN `up_merk` VARCHAR(50), IN `up_harga` INT, IN `up_warna` VARCHAR(50), IN `up_tahunpembuatan` DATE, IN `up_pajakberakhir` DATE, IN `up_gambar` VARCHAR(50))   BEGIN
		UPDATE mobil SET idmobil = up_idmobil, merk = up_merk, harga = up_harga, warna = up_warna, 
        							tahunpembuatan = up_tahunpembuatan, pajakberakhir = up_pajakberakhir, 
								gambar = up_gambar
		WHERE idmobil = up_idmobil;
		 
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `jenis_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_kategori`) VALUES
(1, 'web development'),
(2, 'apps development'),
(3, 'web design');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul` varchar(11) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `durasi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `id_kategori`, `judul`, `deskripsi`, `durasi`) VALUES
(1, 1, 'front end', 'front end adalah', 2),
(2, 1, 'back end', 'back end adalah', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(5) NOT NULL,
  `id_kursus` int(5) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `link_embed` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kursus`, `judul`, `deskripsi`, `link_embed`) VALUES
(1, 1, 'css', 'css adalah', 'https://www.w3schools.com/php/'),
(2, 1, 'html', 'html adalah', 'https://www.w3schools.com/php/');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tampilkan_data_mobil`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tampilkan_data_mobil` (
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Struktur untuk view `tampilkan_data_mobil`
--
DROP TABLE IF EXISTS `tampilkan_data_mobil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilkan_data_mobil`  AS   (select `mobil`.`idmobil` AS `idmobil`,`mobil`.`merk` AS `merk`,`mobil`.`harga` AS `harga`,`mobil`.`warna` AS `warna`,`mobil`.`tahunpembuatan` AS `tahunpembuatan`,`mobil`.`pajakberakhir` AS `pajakberakhir`,`mobil`.`statuspajak` AS `statuspajak`,`mobil`.`gambar` AS `gambar`,`mobil`.`terjual` AS `terjual` from `mobil`)  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `idmobil` (`id_kursus`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `kursus_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
