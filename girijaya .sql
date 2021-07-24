-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 15.04
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `girijaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori`
--

CREATE TABLE `histori` (
  `waktu` datetime NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'suwandihs0@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_tanah` int(50) NOT NULL,
  `pembayaran` int(50) NOT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `sisa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_penduduk`, `id_tanah`, `pembayaran`, `tgl_awal`, `tgl_akhir`, `sisa`) VALUES
(1, 1, 3, 12780000, '2021-07-20', '2021-10-20', '11220000'),
(2, 2, 4, 32000000, '2021-07-24', '2021-10-24', '0'),
(3, 4, 5, 20410000, '2021-07-24', '2021-12-24', '19590000');

--
-- Trigger `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `pembayaran` FOR EACH ROW UPDATE tanah SET tanah.status=0 WHERE tanah.id= OLD.id_tanah
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubah` AFTER INSERT ON `pembayaran` FOR EACH ROW UPDATE tanah SET tanah.status=1 WHERE tanah.id=NEW.id_tanah
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nik` double NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kedusunan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `nama`, `ttl`, `alamat`, `kedusunan`) VALUES
(1, 320111189765, 'Suwandid', '2021-07-12', 'Kp Babakan RT 006/RW 002', 'Cimahpar'),
(2, 3209878782222, 'Dapa', '2021-08-13', 'Kp Babakan RT 006/ RW 0028', 'Cimahpar'),
(4, 320080765423, 'Dody ', '1996-06-18', 'Kp Pangkalan RT 006/ RW 003', 'Gelarjaya'),
(5, 3454200000008, 'Suwandihs', '2021-04-07', 'Kp Babakan RT 006/ RW 0028', 'Cimahpar'),
(9, 34542000000009, 'Ahmadd', '1999-02-02', 'Kp Geger RT/RW 003/004 ', 'Geger'),
(12, 34542001765987, 'Irpan Hakim', '1990-06-05', 'Kp Pangkalan RT 006/ RW 003', 'Gelarjaya'),
(13, 34542009879088, 'Feri', '1996-06-20', 'Kp Pangkalan RT 006/ RW 003', 'Gelarjaya'),
(14, 3454200787777, 'Suwandi', '2021-04-28', 'Kp Babakan RT 006/ RW 0028', 'Cimahpar'),
(15, 32022437689000, 'Adang', '2021-05-17', 'Kp lengkob RT 006/ RW 0028', 'Cimahpar'),
(16, 3203345601789, 'Abdul Majidd', '2019-05-17', 'Kp Cimahpar RT 003/ RW 002', 'Cimahpar'),
(18, 3454200008000, 'Agung F', '2021-07-06', 'Cianjur', 'Sinarahayu'),
(21, 3201111897653, 'Diny ', '2021-07-01', 'Kp Babakan RT 006/ RW 0028', 'Girijaya'),
(23, 3454200000000, 'Suwandi', '2021-07-03', 'Kp Babakan RT 006/ RW 0028', 'Geger');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanah`
--

CREATE TABLE `tanah` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `ukuran` int(100) NOT NULL,
  `biaya` int(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanah`
--

INSERT INTO `tanah` (`id`, `lokasi`, `ukuran`, `biaya`, `status`) VALUES
(3, 'Jl. Girijaya Rt/Rw. 006/009 Sebelah kanan lapang desa sawah', 100, 4000000, 1),
(4, 'Jl. Girijaya Rt/Rw. 006/009 Sebelah kanan kantor Desa Girijaya', 100, 7000000, 1),
(5, 'Jl. Girijaya Rt/Rw. 006/002 depan Pondok Pesantren Nurul Huda', 70, 4000000, 1),
(6, 'Jl. Girijaya Rt/Rw. 006/009 Sebelah kanan kantor Desa Girijaya', 90, 4000000, 0),
(7, 'Jl. Girijaya Rt/Rw. 006/009 Sebelah kiri lapang sd  geger bintang', 20, 4000000, 0),
(8, 'Jl. Girijaya Rt/Rw. 006/009 Sebelah kiri pangkah rambut Ar-Rohim', 20, 500000, 0),
(9, 'Jl. Girijaya Rt/Rw. 010/001 Sebelah kiri Warung Mang Oleh ', 72, 5000000, 0),
(10, 'Jl. Mekarjaya Rt/Rw. 006/009 depan  MTs Nurulhuda ', 20, 490000, 0),
(11, 'Jl. Pangkalan Rt/Rw. 002/004 dekat sawah pak asep', 40, 2000000, 0),
(12, 'Jl. sinarahayu Rt/Rw. 004/004 berhadapan dengan SDN Sinarahayu', 50, 6000000, 0),
(13, 'Jl. Cimahpar Rt/Rw. 002/002 Sebelah kiri rumah Pak Yadi  ', 82, 8000000, 0),
(14, 'Jl. Girijaya Rt/Rw. 006/009 Depan Kantor desa', 55, 5000000, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `tanah` (`id_tanah`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`) USING BTREE;

--
-- Indeks untuk tabel `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanah` FOREIGN KEY (`id_tanah`) REFERENCES `tanah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
