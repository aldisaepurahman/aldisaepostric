-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2020 pada 08.10
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjam_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `cover` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `genre`, `penulis`, `cover`, `deskripsi`) VALUES
(1, 'Ilmu pengetahuan alam', 'Sci-fi', 'Penerbit Erlangga', 'balegolf.png', 'Buku pengetahuan alam'),
(2, 'Algoritma', 'Tactic', 'Einstein', 'balegolf.png', 'Buku sakit kepala'),
(3, 'Naruto', 'Martial Arts', 'Masashi Kishimoto', 'balegolf.png', 'manga anime terbaik pada jamannya'),
(4, 'Ayat-ayat cinta', 'Romantic, Religy', 'Unknown', 'balegolf.png', 'Buku terlalu religius'),
(5, 'Franz Kapka', 'Puisi', 'Franz Kapka', 'balegolf.png', 'Puisi suram'),
(6, 'Bob Stadion', 'Wirausaha', 'Penerbit Airlangga', 'balegolf.png', 'Mau jadi pengusaha?ini contohnya'),
(7, 'How to be normal no root?', 'Sci-fi', 'Unknown', 'balegolf.png', 'Buku untuk manusia tidak normal'),
(8, 'Cristiano', 'Sports', 'Cristiano Ronaldo', 'balegolf.png', 'Sekali lah bikin buku'),
(9, 'Ninja Warrior', 'Fighting', 'Unknown', 'balegolf.png', 'Simulasi atraksi'),
(10, 'Kunci Jawaban alam kubur', 'Religy', 'Unknown', 'balegolf.png', 'Lumayan kunjaw');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `pinjam` date NOT NULL,
  `balik` date NOT NULL,
  `denda` int(11) NOT NULL,
  `status_pinjam` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_buku`, `pinjam`, `balik`, `denda`, `status_pinjam`) VALUES
(1, 1, '2020-11-22', '2020-11-22', 0, 1),
(2, 2, '2020-11-22', '2020-11-21', 1000, 1),
(3, 3, '2020-11-22', '2020-11-24', 0, 1),
(4, 4, '2020-11-22', '2020-11-21', 1000, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
