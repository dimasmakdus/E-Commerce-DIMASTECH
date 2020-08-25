-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Agu 2020 pada 05.35
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'SSD'),
(2, 'HDD'),
(3, 'Prosessor'),
(4, 'Motherboard'),
(5, 'RAM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `harga` varchar(99) NOT NULL,
  `gambar` varchar(55) NOT NULL,
  `jumlah` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `nama`, `harga`, `gambar`, `jumlah`) VALUES
(6, 'SAMSUNG Solid State Drive 970 EVO 1TB M.2 NVMe', '7250000', 'ssd-samsung.jpg', 1),
(13, 'MSI Motherboard Socket LGA1151 MPG Z390 GAMING PRO CARBON', '4859800', 'mobo-msi.jpg', 1),
(17, 'Crucial 16GB Ballistix DDR4 3600 MHz UDIMM Gaming Desktop Memory Kit (2 x 8GB, Black)', '1115999', 'ram-crucial.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `alamat` varchar(55) NOT NULL,
  `kurir` varchar(55) NOT NULL,
  `totalharga` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `nama`, `alamat`, `kurir`, `totalharga`) VALUES
(2, 'Hilman Fahmy', 'Jl. Siliwangi No,123', 'Go-Send', '1.850.000'),
(3, 'Bayu Pratama', 'Jl. Tubagus Ismail Angkasa Raya, Planet Mars, Kota Red ', 'JNE Expres', '24.474.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(55) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(55) NOT NULL,
  `kategori` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `keterangan`, `gambar`, `kategori`) VALUES
(4, 'SSD WD GREEN 240 GB 3D NAND SATA', '522500', 'Features\r\n- Reliability up to 1M hours\r\n- Power efficieint, only 52miliWatt\r\n- Superior performance, up to 545MB/s read\r\n- Compatibility with almost all of PC SATA system\r\n- 3 years warranty', 'SSD-WD-GREEN-240-GB.jpg', '1'),
(5, 'Western Digital - WD RED SSD SA500 1TB NAS SATA III 2.5\"', '2950000', 'Red SA500 NAS Series, 2.5”, 1TB, SATA III\r\nController: Marvell 88SS1074, Memory: 3D TLC NAND\r\nMax Sequential Read : 560 MB/s\r\nMax Sequential Write : 530 MB/s\r\n4KB Random Read : 95K\r\n4KB Random Write : 85K', 'SSD-WD-RED-1TB.jpg', '1'),
(6, 'SAMSUNG Solid State Drive 970 EVO 1TB M.2 NVMe', '7250000', 'Solid State Drive\r\nCapacity 1TB\r\nM.2 NVMe Interface\r\nSequential Read: Up to 3400 MB/sec\r\nSequential Write: Up to 2500 MB/sec', 'ssd-samsung.jpg', '1'),
(7, 'Colorful SSD CN600 256GB M.2 NVMe', '690000', 'SSD Series : CN Series\r\nCapacity : 256GB\r\nInterface : M.2 NVME\r\nNAND Type : 3D NAND\r\nMaster Control : YES\r\nRead Speed?Write Speed) : 2000MB/S-1100MB/S', 'ColorfulSSD.jpg', '1'),
(8, 'Hardisk Komputer Merk WD Blue 1TB. HDD PC Internal SATA', '576600', 'Deskripsi Hardisk Komputer Merk WD Blue 1TB. HDD PC Internal SATA\r\nReady Stock!!!\r\nHardisk Internal untuk Komputer PC merk Western Digital (WD) dengan kapasitas 1000GB / 1TB\r\n5900Rpm', 'hdd-wd-1tb.jpg', '2'),
(9, 'WD Caviar Blue 500GB - Hardisk Internal 3.5\" for PC', '779000', 'WD Biru penyimpanan dirancang dan diproduksi dengan teknologi yang ditemukan di asli pemenang penghargaan dekstop WD dan hard drive mobile.', 'hd-wd-500gb.jpg', '2'),
(10, 'Intel Core i9 9900K 3.6 GHz 8 Core LGA 1151', '9125000', 'Harga jual dan spesifikasi bisa berubah\r\nsewaktu-waktu tanpa pemberitahuan sebelumnya.\r\nuntuk mengetahui informasi lainnya silahkan', 'core-i9.jpg', '3'),
(11, 'Intel Processor Core I7-9700K', '7260000', 'Processor Intel Core generasi ke-9 terbaru menghadirkan performa desktop ekstrem. Saat disandingkan dengan memori Intel Optane, Intel Core generasi ke-9 dapat mempercepat pemuatan data dan performa game yang Anda mainkan.', 'core-i7.jpg', '3'),
(12, 'Intel Core i5 9400F 2.9Ghz Up To 4.1Ghz Box', '2109999', 'Deskripsi Intel Core i5 9400F 2.9Ghz Up To 4.1Ghz Box\r\nIntel Core i5 9400F 2.9Ghz Up To 4.1Ghz Box Coffee Lake', 'core-i5.jpg', '3'),
(13, 'MSI Motherboard Socket LGA1151 MPG Z390 GAMING PRO CARBON', '4859800', 'Motherboard besutan MSI dengan soket 1511 ini sudah mendukung prosesor Intel Core generasi kesembilan yang hadir dengan 8 core.', 'mobo-msi.jpg', '4'),
(14, 'ASUS ROG STRIX Z390-F GAMING motherboard LGA 1151 (Socket H4) ATX Intel Z390', '4960000', 'Motherboard - Intel Z390, DDR4 4133 (OC), 3x PCIe x16, SATA III RAID, 2x M.2, USB 3.1, USB-C 3.1 Gen 2, GLAN, 8ch audio, Wi-FI, TPM, HDMI, DisplayPort, Aura RGB, ATX, sc1151 (Coffee Lake only)', 'mobo-rogstrix.jpg', '4'),
(15, 'GIGABYTE Motherboard Socket LGA1151 Z370 Aorus Gaming 7', '4700000', 'Socket LGA1151\r\nChipset: Intel Z370 Express\r\n4 x DDR4 DIMM sockets\r\n6 x SATA 6Gb/s connectors\r\n1 x PCI Express x16 slot; 3 x PCI Express x1 slots\r\n1 x Intel GbE LAN chip (10/100/1000 Mbit)\r\nUSB 3.1', 'mobo-gigabyte.jpg', '4'),
(16, 'V-GeN TSUNAMI RAM GAMING DDR4 16GB KIT PC-3000 CL 15 (8GB x 2) RGB-V', '1148000', 'RAM TSUNAMI DDR4 16GB PC-3000 1.35V (2X4GB)\r\nCL 15-17-17-35\r\nUltra Low Voltage 1.35V\r\nXMP 2.0 supports', 'ram-vgen.jpg', '5'),
(17, 'Crucial 16GB Ballistix DDR4 3600 MHz UDIMM Gaming Desktop Memory Kit (2 x 8GB, Black)', '1115999', 'Extreme Memory Profiles (XMP) is a technology developed by Intel that allows users to take advantage of higher than standard memory speeds by selecting different profile', 'ram-crucial.jpg', '5'),
(18, 'G.Skill Trident Z 16GB RGB RAM DDR4 3200 PC 25600 Gaming', '3139000', 'Series: Trident Z RGB\r\nMemory Type: DDR4\r\nCapacity: 16GB (8GBx2)\r\nMulti-Channel Kit: Dual Channel Kit\r\nTested Speed: 3200MHz', 'ram-gskill.jpg', '5'),
(27, 'Seagate Barracuda 2Tb - Hdd Pc 3.5 Inch - Internal Hard', '1269000', 'INTERNAL HDD 3.5&quot;\r\nSEAGATE BARRACUDA 2TB\r\n\r\nUntuk PC / Desktop Komputer', '5f44647a084bd.jpg', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', '$2y$10$9M8rP3ZlXgFJtRYMxRPkNO9p9MlDb3Ub2cKSMzLpZuqNoIgkJ/eU6'),
(2, 'Dimas Mohammad Makdus', 'makdus@gmail.com', 'dimasmakdus', '$2y$10$GSWYNBdeIyFlke0U40obN.nGf93b4Dxa1QDzqOvkZzijYhVEOPH8K'),
(3, 'Hilman Fahmy', 'hilmanfahmy@gmail', 'hilmanfahmy', '$2y$10$08sJ4IYjsu2o8Igsl8qAeu1M/61UwAqulQvexgvSRhjFwYpvrD//e'),
(4, 'Bayu Pratama', 'bayupratama@gmail.com', 'bayupratama', '$2y$10$p1uy7JXIvTV8y5xExCY73e2OppFqOdTc5wg4rhJFoeNITkPcyfIvy'),
(6, 'Agung Setiawan', 'agung@yahoo.co.id', 'agung', '$2y$10$zgAv6avCO5Hzewlpmb0YK.63r5E.Y7SE3EsYSFec25iFikKyjoRY.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
