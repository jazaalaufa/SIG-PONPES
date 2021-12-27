-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2021 pada 08.27
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes_sig`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ponpes`
--

CREATE TABLE `ponpes` (
  `Id` int(11) NOT NULL,
  `nspp` varchar(200) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kab` varchar(255) DEFAULT NULL,
  `kec` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `lat` float(9,7) DEFAULT NULL,
  `lng` float(9,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ponpes`
--

INSERT INTO `ponpes` (`Id`, `nspp`, `jenis`, `nama`, `telp`, `alamat`, `kab`, `kec`, `gambar`, `lat`, `lng`) VALUES
(39, '512033740074', 'modern', 'PP Nurul Cholil', '031 3096564', 'Jl. Kyai H. Kholil III No.10, Demangan Barat, Demangan, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69115', 'Bangkalan', 'Bangkalan', 'nurulcholil.png_61bf1935a466a', -7.0282221, 112.736488),
(40, '510335260015', 'modern', 'PP Ibnu Cholil ', '031 3099659', 'Jl. Halim Perdana Kusuma No.9, Area Sawah, Mlajah, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116', 'Bangkalan', 'Bangkalan', 'ibnu cholil.png_61bef7a92bbd5', -7.0316238, 112.745399),
(42, '512033740003', 'salafyah', 'PP Al Kaukabudduri (Pondok SokSok)', '081 221171188', 'XP6P+23V, Kemayoran, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116', 'Bangkalan', 'Bangkalan', 'al kab.png_61bef614d46c1', -7.0282221, 112.736488),
(43, '512033740077', 'salafyah', 'PP Asshomadiyah', '-', 'Mortorang, Burneh, Kec. Burneh, Kabupaten Bangkalan, Jawa Timur 69121', 'Bangkalan', 'Burneh', 'as shomadiyah.png_61bf10bc63f8f', -7.0311923, 112.784843),
(44, '512033740033', 'kombinasi', 'PP Al Hidayah', '-', 'Jl. KH. Moh. Toha, Rw. 08, Pangeranan, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69115', 'Bangkalan', 'Bangkalan', 'al hidayah.png_61bf199b9cbec', -7.0299010, 112.738609),
(45, '512033740006', 'modern', 'PP Al Hikam', '081 293010707', 'Jl. Raya Perumnas No.01 Tunjung Burneh, Perumnas, Tunjung, Bangkalan, Bangkalan Regency, East Java 69121', 'Bangkalan', 'Burneh', 'al hikam.png_61bf11b678a96', -7.0221529, 112.782356),
(46, '510335260013', 'modern', 'PP Darul Kholil', '031 30976778', 'JL. Kali Modern, No. 11, Burneh, Area Sawah/Kebun, Kapor, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69121', 'Bangkalan', '', 'darul.png_61bf145c00967', -7.0277343, 112.797775),
(47, '512033740075', 'salafyah', 'PP Al Furqon', '-', 'Pettong Tengah, Pettong, Kec. Tanah Merah, Kabupaten Bangkalan, Jawa Timur 69172', 'Bangkalan', 'Tanah Merah', 'al furqon.png_61bf14d7428d6', -7.0136790, 112.880661),
(48, '512033740070', 'kombinasi', 'PP Darussalam', '031 3097467', 'jl pondok pesantren darussalam No.88-89, Langkap Timur, Langkap, Kec. Burneh, Kabupaten Bangkalan, Jawa Timur 69171', 'Bangkalan', 'Burneh', 'darussalam.png_61bf155f55f21', -7.0442481, 112.789940),
(50, '512033740079', 'modern', 'At Taawun Sabilush Sholihin', '081 234076939', 'Pedeng, Socah, Bangkalan Regency, East Java 69161', 'Bangkalan', 'Socah', 'sabilus solihin.png_61bf184c522df', -7.0604420, 112.708481),
(51, '512033740001', 'modern', 'PP Syamsul Hidayah', '085 104051904', 'Ombul, Arosbaya, Kabupaten Bangkalan, Madura 69151', 'Bangkalan', 'Arosbaya', 'syamsul.png_61bf1a869d56e', -6.9831190, 112.833183),
(52, '512033740077', 'salafyah', 'PP Saidiyah', '031 3051039', 'Jl. KHR. Damanhuri, Bak Selah, Buduran, Arosbaya, Kabupaten Bangkalan, Jawa Timur 69151', 'Bangkalan', 'Arosbaya', 'buduran arosbaya.png_61bf1b97afbba', -6.9378443, 112.854919),
(53, '512033740071', 'kombinasi', 'PP Sirrul Cholil', '-', 'Ngarayan, Lerpak, Geger, Kabupaten Bangkalan, Jawa Timur 69152', 'Bangkalan', 'Geger', 'sirrul cholil.png_61bf1c54041dc', -7.0250463, 112.952759),
(54, '510335260011', 'salafyah', 'PP Ad Damanhuri', '085 954916690', 'Doro Agung, Kompol, Geger, Bangkalan Regency, East Java 69152', 'Bangkalan', 'Geger', 'ad damanhuri.png_61bf1d5f2c190', -6.9625297, 112.881081),
(55, '510335260010', 'modern', 'PP Al Hamidiyah', '-', 'W4J2+J7C, Dukoh, Senasen, Konang, Kabupaten Bangkalan, Jawa Timur 69175', 'Bangkalan', 'Konang', 'al hamidiyah.png_61bf1e2806d1d', -7.0261950, 113.110786),
(56, '512033740009', 'modern', 'PP Al Kahfi', '083 115529604', 'Gangseyan, Sepulu, Kabupaten Bangkalan, Jawa Timur 69154', 'Bangkalan', 'Sepulu', 'al kahfi.png_61bf1f0d151ef', -6.8792043, 112.956146),
(58, '512033740008', 'modern', 'Miftahut Tholibin', '085 235141210', 'Gilin, Pesanggrahan, Kwanyar, Bangkalan Regency, East Java 69163', 'Bangkalan', 'Kwanyar', 'tholibin.png_61bf2199d5603', -7.1410742, 112.860611),
(59, '512033740080', 'modern', 'PP Ar Rowiyah', '031 3094131', 'RX54+482, Mancengan, Langpanggang, Modung, Kabupaten Bangkalan, Jawa Timur 69166', 'Bangkalan', 'Modung', 'ar rowiyah.png_61bf2276f031b', -7.1683006, 112.955132);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`Id`, `username`, `password`, `level`, `ket`) VALUES
(1, 'admin', 'admin', 1, 'admin'),
(2, 'user', 'user', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ponpes`
--
ALTER TABLE `ponpes`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ponpes`
--
ALTER TABLE `ponpes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
