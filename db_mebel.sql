-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 05:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mebel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_cart` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `is_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `id_produk`, `id_pengguna`, `jumlah_beli`, `is_order`) VALUES
(256, 146, 5, 1, 1),
(257, 146, 5, 3, 1),
(258, 146, 5, 1, 1),
(259, 146, 5, 1, 1),
(260, 146, 5, 1, 1),
(261, 146, 5, 1, 1),
(262, 146, 5, 1, 1),
(264, 146, 5, 9, 1),
(265, 146, 5, 1, 1),
(266, 146, 5, 2, 1),
(270, 146, 5, 2, 1),
(271, 146, 5, 11, 1),
(272, 147, 29, 2, 1),
(273, 147, 29, 9, 1),
(277, 147, 29, 2, 1),
(280, 146, 29, 1, 1),
(288, 147, 29, 1, 1),
(290, 147, 29, 2, 1),
(293, 146, 5, 3, 1),
(294, 146, 5, 11, 1),
(295, 146, 5, 2, 1),
(298, 146, 5, 1, 1),
(299, 147, 5, 4, 1),
(300, 146, 5, 9, 1),
(303, 147, 5, 1, 1),
(307, 148, 5, 1, 1),
(309, 148, 5, 5, 1),
(311, 174, 5, 5, 1),
(312, 174, 5, 1, 1),
(313, 174, 5, 3, 1),
(314, 174, 5, 2, 1),
(315, 146, 29, 2, 1),
(316, 146, 29, 1, 1),
(317, 147, 5, 11, 1),
(319, 146, 5, 4, 1),
(320, 146, 5, 28, 1),
(323, 146, 5, 1, 1),
(324, 146, 5, 12, 1),
(325, 147, 5, 2, 1),
(326, 147, 5, 0, 1),
(328, 146, 5, 2, 1),
(329, 147, 5, 5, 1),
(330, 146, 5, 2, 1),
(331, 146, 5, 2, 1),
(332, 147, 5, 1, 1),
(333, 148, 5, 1, 1),
(334, 147, 5, 2, 1),
(335, 155, 5, 1, 1),
(336, 146, 5, 1, 1),
(337, 147, 5, 16, 1),
(340, 146, 5, 2, 1),
(341, 146, 5, 25, 1),
(342, 146, 5, 29, 1),
(343, 146, 5, 2, 1),
(344, 148, 5, 1, 1),
(345, 156, 5, 2, 1),
(346, 155, 5, 3, 1),
(347, 172, 5, 1, 1),
(348, 146, 5, 1, 1),
(349, 147, 5, 1, 1),
(350, 146, 5, 2, 1),
(351, 147, 5, 2, 1),
(352, 148, 5, 1, 1),
(353, 146, 5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_produk`
--

CREATE TABLE `tb_jenis_produk` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_produk`
--

INSERT INTO `tb_jenis_produk` (`id_jenis`, `nama_jenis`) VALUES
(1, 'meja'),
(2, 'kursi'),
(3, 'Lemari'),
(4, 'Rak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `type_user` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `username`, `email`, `password`, `no_telp`, `alamat`, `type_user`) VALUES
(1, 'gema', 'gemaramadhan', 'gema321@gmail.com', '2b036ce7c4ae8e5304bb3ac6600edd03', '089182192', 'jl.pembina1', 'admin'),
(5, 'gema ramadhan', 'gemaramadhan1697', 'gemaramadhan1697@gmail.com', '2efe6f39beafd58597af8de6ca584c37', '089512745123', 'jalan kesadaran rt 02 rw 07 kecamatan jatinegara keluraha cipinang muara', 'customer'),
(6, 'ramadhan', 'ramadhan', 'ramadhan123@gamail.com', 'e00b29d5b34c3f78df09d45921c9ec47', '089741852036', 'jl.pembina3', 'customer'),
(9, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '989889', 'jl.pembina', 'admin'),
(18, 'reski  hasisah', 'reski1697', 'reskihasisah@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0896721345', '', 'customer'),
(19, 'lala', 'lala', 'lala123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0897654321', '', 'customer'),
(21, 'Prasetya Hadi Saputra', 'prasetya2423', 'prasetya2423@gmail.com', 'b8f8312b939f00abb38eeafd4fd107f3', '089506277284', '', 'customer'),
(22, 'kiki', 'kiki123', 'Gemaramadhan1697@gmail.com', '656ead03af397857bdcd84292e6a3bbd', '0895123456789', '', 'customer'),
(23, 'rama', 'rama123', 'Gemaramadhan1697@gmail.com', '36226b453eb255f672f118a1ecc1e4ec', '089741852036', '', 'customer'),
(25, 'fahri aa', 'vita', 'fahriaa', '2d24949e114cc2b6ff7b26ebd6800023', '04392849023890', 'jalan hehe rt 02 rw 11 penggilangan', 'customer'),
(26, 'dameta', 'dameta', 'dameta123@gmail.com', 'ee8d5fd40e9f38bfdfd9aba37bc2862c', '0895123456789', 'jln serang no 45 tanggerang selatan', 'customer'),
(27, 'fahri', 'fahri123', 'fahriramadhanny@gmail.com', 'b45ad581017a8cdf8182353a9ba503ed', '089512745123', 'jl tambun raya no 40', 'customer'),
(28, 'reski123', 'reski123', 'reski123@gmail.com', 'e5484a7dc388aba51db139ca28fa9dc8', '08923892839', 'jln raya bogor', 'customer'),
(29, 'sidang akhir', 'sidangakhir', 'gemaramadhan1697@gmail.com', '3410026af35e164eab82ac8d2a17d446', '0895123456789', 'jalan raya penggilingan ', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `jenis_produk` int(11) NOT NULL,
  `ukuran` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `margin` int(11) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `gambar`, `jenis_produk`, `ukuran`, `harga`, `stok`, `harga_modal`, `margin`, `des`) VALUES
(146, 'Meja Lipat', '9884.jpg', 1, 'Panjang : 50cm,  Lebar : 45cm,  Tinggi :35cm', 140000, 7, 100000, 40, 'Meja lipat ini terbuat dari kayu jati belanda yang di cat berwarna coklat yang di desain secara minimalis dan bisa di lipat agar bisa di bawa kemana mana,cocok untuk meja belajar anak.'),
(147, 'Meja Lesehan Minimalis', '3582.jpg', 1, 'Panjang : 45cm, Lebar : 80cm, Tinggi : 35cm', 210000, 20, 150000, 40, 'Meja ini terbuat dari bahan kayu jati belanda,yang di cat berwarna coklat tua yang di desain dengan minimalis dan modern,meja ini di lengkapi dengan cat pelapis plitur agar tetap cantik dan modern tentunya dengan cat pilihan.'),
(148, 'Meja Bundar outdor', '7480.jpg', 1, 'Panjang :120cm, Lebar :120cm,  Tinggi :75cm', 325000, 10, 250000, 30, 'Meja bundar outdor ini terbuat dari bahan kayu jati  belanda yang di cat berwarna coklat tua yang cocok untuk cafe,restaurant,yang Menghasilkan desain Produk yang Berkualitas, sehingga dapat memberikan suasana Ruangan Cafe anda lebih tampil cantik dan elegant tentunya dengan desain Modern Terkini Model Klasik desain Terbaru.'),
(155, 'Kursi Santai ', '8428.jpg', 2, 'Panjang : 80cm,  Lebar : 70cm,  Tinggi : 70cm', 325000, 10, 250000, 30, 'Kursi santai ini di buat dari bahan dasar kayu jati belanda yang di cat berwarna coklat muda dengan sandaran yang di berdisain minimalis cocok untuk ruang tamu.'),
(156, 'kursi Teras kayu jati modern', '3550.jpg', 2, 'Panjang :80cm,  Lebar :70cm,  Tinggi :45cm', 1120000, 10, 800000, 40, 'kursi teras antik dengan design unik dan nyaman juga untuk di pakai di ruang tamu rumah anda, Kursi teras dari perusahaan ini terbuat dariKayu Jati asli  yang di cat berwarna coklat tua berdasarkan warna dasar kayu jati dengan design  klasik yang unik, Kursi yang termasuk dalam kategori produk Kursi Tamu Jati ini di lapisi dengan plitur yang terbaik.'),
(157, 'Kursi Meja Taman ', '5560.jpg', 2, 'Panjang :90cm,  Lebar :130cm,  Tinggi :120cm', 700000, 5, 500000, 40, 'Kursi meja taman ini di buat dari kayu jati belanda yang di cat berwarna cream  yang di desain untuk taman,teras,halaman rumah agar menjadi lebih unik.'),
(158, 'kursi taman', '3210.jpg', 2, 'Panjang :80cm,  Lebar :130cm,  Tinggi :140cm', 650000, 5, 500000, 30, 'Kursi taman ini terbuat dari kayu jati belanda yang di cat berwarna cream yang di desain dengan sedikit ukiran agar lebih unik dan antik yang di desain secara minimalis '),
(160, 'Lemari Pajangan Kaca', '1018.jpg', 3, 'Panjang :130cm,  Lebar :90cm,  Tinggi :150cm', 3500000, 5, 2500000, 40, 'Lemari kaca persegi panjang vertikal  ini terbuat dari bahan dasar kayu jati yang di cat samping berwarna cream dan memakai kaca setebal 5cm  sangat cocok menjadi tempat  lemari pajangan, buku, DVD, piringan hitam. Tidak hanya itu, lemari ini juga dapat berfungsi sebagai penyimpan pakaian di kamar tidur. '),
(168, 'Lemari Pakaian 2 Pintu 5 Rak', '4261.jpg', 3, 'Panjang :130cm,  Lebar :90cm,  Tinggi :150cm', 2800000, 5, 2000000, 40, 'Lemari pakaian kayu pakaian 2 pintu 6 rak ini terbuat dari kayu jati asli yang di cat warna dasar coklat dengan kualitas terbaik,yang di desain minimalis dan ekslusif tanpa menghilangkan ekstetika kayu jati aslinya,dan terdapat rak untuk pakaian lipat maupun tempat penyimpanan barang anda ,dan akan mempercantik interior ruangan anda.'),
(169, 'Lemari pakaian gantung 2 pintu', '9809.jpg', 3, 'Panjang :100cm,  Lebar :130cm,  Tinggi :160cm', 2800000, 5, 2000000, 40, 'Lemari pakaian persegi panjang horizontal ini terbuat dari bahan dasar kayu jati yang di cat dengan 2 warna coklat dan putih yang di desain secara minimalis dan eksklusif yang akan mempercantik interior ruangan anda,dan lemari ini sangat cocok menjadi tempat penyimpanan pakaian gantung seperti jas,kemeja agar pakaian tetap terlihat rapih.'),
(170, 'Lemari Pakaian Lipat', '2215.jpg', 3, 'Panjang :120cm,  Lebar :120cm,  Tinggi :90cm', 2100000, 5, 1500000, 40, 'Lemari berbentuk persegi terbuat dari kayu jati asli yang di cat dengan 2 warna coklat dan kombinasi putih agar terlihat cantik,dan di desain secara minimalis,lemari ini sangat cocok menjadi tempat penyimpanan pakaian agar tertata dengan rapih dan cocok untuk pakaian anak ataupun dewasa,desain yang minimalis dan ruang lemari yang luas akan memudahkan anda menyimpan baju,celana,ataupun berbagai perlengkapan rumah tangga lainnya.'),
(171, 'Rak Tv Modern', '9793.jpg', 4, 'Panjang :130cm,  Lebar :120cm,  Tinggi :80cm', 1950000, 5, 1500000, 30, 'Rak Tv modern ini berbetntuk persegi panjang yang terbuat dari bahan dasar kayu jati yang di cat berwarna coklat  yang di lapisi oleh plitur yang sesuai dengan warna asli kayu,yang di desain secara minimalis dan modern ,rak tv modern ini terdapat 6 rak penyimpanan yang sangat cocok untuk di jadikan tempat televisi anda,dan anda dapat meletakan prabotan elektronik seperti dvd,console games,atau buku.'),
(172, 'Rak Tv Berbentuk L', '2661.jpg', 4, 'Panjang :120cm,  Lebar :120cm,  Tinggi :90cm', 1400000, 5, 1000000, 40, 'Rak TV berbentuk huruf ‘L’ ini terbuat dari bahan dasar kayu jati yang di cat warna dasar coklat dan putih yang terdapat 5 rak  dan di didesain khusus untuk memaksimalkan ruangan sebagai penyimpan buku, DVD, pemutar film/musik, atau aksesoris kesayangan. Desain yang minimalis dan eksklusif akan mempercantik interior ruangan anda.'),
(173, 'Rak Tv Berbentuk U ', '2194.jpg', 4, 'Panjang :120cm,  Lebar :60cm,  Tinggi :130cm', 2100000, 5, 1500000, 40, 'Rak TV berbentuk huruf ‘U’ in terbuat dari bahan dasar kayu jati  yang di cat warna coklat dan kombinasi  putih,dan terdapat rak rak penyimpanan di sisi kanan dan kiri yang  didesain khusus untuk memaksimalkan ruangan sebagai penyimpan DVD, pemutar film/musik, atau aksesoris kesayangan. . Desain yang minimalis dan eksklusif akan mempercantik interior ruangan anda.'),
(174, 'Rak Dinding Balzac', '6308.jpg', 4, 'Panjang :40cm,  Lebar :80cm,  Tinggi :50cm', 195000, 5, 150000, 30, 'Sepasang rak dinding cantik ini terbuat dari kayu jati  yang di cat warna dasar kayu yaitu coklat  didesain khusus untuk dijadikan rak vas bunga, pajangan di ruang keluarga Anda. Desain yang secara modern minimalis dan eksklusif yang akan mempercantik interior ruangan anda.'),
(175, 'Rak Buku', '2773.jpg', 4, 'Panjang :120cm,  Lebar :70cm, Tinggi :140cm', 1950000, 5, 1500000, 30, 'Rak persegi panjang ini terbuat dari bahan dasar kayu jati  yang di cat berdasarkan warna dasar kayu yaitu coklat dan terdapat 8 rak yang cukup luas yang  berdesain minimalis ini sangat cocok di jadikan rak buku,sepatu,atau perabotan rumah tangga yang cantik,dan cocok untuk di letakan di ruang keluarga dan ruang tidur anda.'),
(176, 'Kursi Bulat', '2662.jpg', 2, 'Panjang :40cm,  Lebar :50cm,  Tinggi :60cm', 260000, 10, 200000, 30, 'Kursi bulat ini terbuat dari bahan dasar kayu merbau solid yang di lapisi plitur yang di sesuaikan dengan warna dasar kayu merbau dan di cat berwarna coklat tua  dan  di desain secara modern dan minimalis yang cocok untuk ruang makan,caffe,restaurant.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(20) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `status_transaksi` enum('Di Terima','silahkan lakukan pembayaran','di proses','Pesanan Anda Dalam Pengiriman','Pesanan Telah Diterima') NOT NULL,
  `bukti_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_cart`, `no_transaksi`, `total_harga`, `tanggal_transaksi`, `status_transaksi`, `bukti_pembayaran`) VALUES
(240, 256, '5f1d89392dca2200726', 130000, '2020-07-26', 'Pesanan Telah Diterima', '4597.jpg'),
(293, 343, '5f2a24a6ec4b2200805', 605000, '2020-08-05', 'Pesanan Anda Dalam Pengiriman', '1788.jpg'),
(294, 344, '5f2a24a6ec4b2200805', 605000, '2020-08-05', 'Pesanan Anda Dalam Pengiriman', '1788.jpg'),
(295, 345, '5f2a253eb8208200805', 4615000, '2020-08-05', 'silahkan lakukan pembayaran', ''),
(296, 346, '5f2a253eb8208200805', 4615000, '2020-08-05', 'silahkan lakukan pembayaran', ''),
(297, 347, '5f2a253eb8208200805', 4615000, '2020-08-05', 'silahkan lakukan pembayaran', ''),
(300, 350, '5f2cc640d8cd6200807', 1025000, '2020-08-07', 'Pesanan Telah Diterima', '4039.jpg'),
(301, 351, '5f2cc640d8cd6200807', 1025000, '2020-08-07', 'Pesanan Telah Diterima', '4039.jpg'),
(302, 352, '5f2cc640d8cd6200807', 1025000, '2020-08-07', 'Pesanan Telah Diterima', '4039.jpg'),
(303, 353, '5f2cc7997e3b2200807', 420000, '2020-08-07', 'Di Terima', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_jenis_produk`
--
ALTER TABLE `tb_jenis_produk`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `jenis_produk` (`jenis_produk`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_chart` (`id_cart`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `tb_jenis_produk`
--
ALTER TABLE `tb_jenis_produk`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `tb_cart_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `tb_cart_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`jenis_produk`) REFERENCES `tb_jenis_produk` (`id_jenis`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `tb_cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
