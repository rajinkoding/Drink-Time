-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 01:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyekbwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtrans`
--

CREATE TABLE `dtrans` (
  `id` int(11) NOT NULL,
  `id_htrans` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `htrans`
--

CREATE TABLE `htrans` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nama_penerima` varchar(30) DEFAULT NULL,
  `kota_pengirim` varchar(30) DEFAULT NULL,
  `alamat_pengirim` varchar(30) DEFAULT NULL,
  `no_telepon_pengirim` int(12) DEFAULT NULL,
  `jenis_pembayaran` varchar(10) DEFAULT NULL,
  `grandtotal` int(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `htrans`
--

INSERT INTO `htrans` (`id`, `tanggal`, `username`, `nama_penerima`, `kota_pengirim`, `alamat_pengirim`, `no_telepon_pengirim`, `jenis_pembayaran`, `grandtotal`, `status`) VALUES
(1, '2023-12-26', 'ariel', 'adi', 'surabaya', 'ngagel jaya tengah', 98021938, 'ovo', 12000, 'diterima'),
(3, '2024-01-10', 'ariel3', 'adi', 'surabaya', 'ngagel jaya tengah', 239480293, 'gopay', 20000, 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `Id_jenis` int(11) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`Id_jenis`, `Nama`, `updated_at`, `created_at`) VALUES
(1, 'Minuman', '2023-12-26', '2023-12-26'),
(2, 'Bahan', '2023-12-26', '2023-12-26'),
(3, 'Makanan', '2023-12-26', '2023-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `id_jenis` varchar(5) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `flagjual` int(2) DEFAULT NULL,
  `keterangan` tinytext DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `id_jenis`, `foto`, `harga`, `flagjual`, `keterangan`, `status`) VALUES
(1, 'Black Coffee', '1', 'Kopi item.jpg', 12000, 1, 'Kopi yang lugas dan kuat tanpa tambahan seperti gula atau susu. Ini menawarkan rasa yang berani, aroma yang kaya, dan pengalaman kopi murni, memungkinkan Anda untuk menikmati rasa alami dari biji kopi. Ini adalah pilihan populer bagi mereka yang menikmati', NULL),
(2, 'Milk Coffee', '1', 'Kopi susu.jpg', 10000, 1, 'Minuman menyenangkan yang dibuat dengan menggabungkan kopi yang diseduh dengan susu. Penambahan susu memberikan tekstur lembut dan halus pada kopi, melunakkan keberaniannya. Hasilnya adalah minuman yang seimbang dan nyaman, sering disesuaikan dengan berba', NULL),
(3, 'Boba', '2', 'Boba.jpg', 1000, 1, 'minuman yang menyenangkan dan beraroma yang berasal dari Taiwan. Biasanya terdiri dari teh hitam atau hijau, susu, pemanis, dan mutiara tapioka kenyal (boba). Kombinasi teh dan susu menciptakan dasar yang lembut dan sedikit manis, sedangkan mutiara tapiok', NULL),
(4, 'Jely', '2', 'Jelly.png', 1000, 1, 'kubus jeli tembus pandang tersuspensi dalam cairan manis dan menyegarkan. Jeli ini, sering dibuat dari jus buah atau gelatin rasa, menambahkan tekstur yang menyenangkan dan kenyal pada minuman. Minuman jeli hadir dalam berbagai rasa, memberikan pengalaman', NULL),
(5, 'French fries', '3', 'French fries.jpg', 6000, 1, 'camilan favorit dan populer yang terbuat dari potongan kentang goreng. Kelezatan emas dan renyah ini dibumbui dengan garam dan dinikmati karena kerenyahan yang memuaskan dan interiornya yang lembut. Sering disajikan bersama burger, sandwich, atau sebagai ', NULL),
(6, 'Chesse crust', '3', 'Chesse crust.jpg', 8000, 1, 'Teknik kuliner di mana keju digunakan untuk membuat lapisan luar yang beraroma dan renyah pada berbagai hidangan, seperti pizza atau makanan panggang yang gurih. Dalam konteks pizza, kerak keju melibatkan peleburan dan pemanggangan keju di sepanjang tepi ', NULL),
(7, 'Rainbow jelly', '2', 'Rainbow jelly.jpg', 1000, 1, 'Makanan penutup berwarna-warni dan menyenangkan yang menampilkan lapisan gelatin tembus cahaya dan berwarna cerah. Setiap lapisan diatur secara individual, menciptakan spektrum warna yang menarik secara visual, menyerupai pelangi. Makanan manis dan jiggly', 'aktif'),
(11, 'Pink Pearl', '2', 'Pink Pearl.jpg', 2000, 1, 'Mutiara berwarna merah muda atau bola tapioka ditambahkan ke minuman. Mutiara ini, sering diresapi dengan rasa buah, memberikan kontribusi daya tarik visual dan ledakan rasa untuk minuman', 'aktif'),
(13, 'Roasted', '1', 'Roasted.webp', 30000, 1, 'Terbuat dari campuran teh hijau dan oolong berkualitas yang baru dipanen. Dipanggang pada suhu tinggi untuk menciptakan asap yang berbeda dan rasa karamel', 'Aktif'),
(14, 'Signature Boba Smoothie', '1', 'Signature Boba Smoothie.webp', 40000, 1, 'Teh susu terlaris khas kami dicampur menjadi smoothie krim', 'Aktif'),
(15, 'Strawberries & Cream Smoothie', '1', 'Strawberries & Cream Smoothie.webp', 25000, 1, 'Manjakan diri dengan kelezatan cheesecake klasik dan pusaran kebaikan stroberi', 'Aktif'),
(16, 'Strawberry Frui‑Tea', '1', 'Strawberry Fruit Tea.webp', 30000, 1, 'Rasa stroberi buah, manis & juicy - kombinasi sempurna untuk teh apa pun', 'Aktif'),
(17, 'Strawberry Milk Tea', '1', 'Strawberry Milk Tea.webp', 20000, 1, 'Keseimbangan sempurna antara stroberi manis dan krim teh susu yang kaya', 'Aktif'),
(18, 'Taro Milk Tea', '1', 'Taro Milk Tea.webp', 30000, 1, 'Teh susu krim dengan rasa talas yang kuat dicampur melalui', 'Aktif'),
(19, 'Taro Smoothie', '1', 'Taro Smoothie.webp', 25000, 1, 'Smoothie beku dan lembut dengan rasa talas tanah asli yang kuat', 'Aktif'),
(20, 'Thai Milk Slush', '1', 'Thai Milk Slush.webp', 35000, 1, 'Es campuran yang memanjakan & halus dan teh hitam yang diseduh dengan rempah-rempah, diakhiri dengan susu kental dan susu evaporasi', 'Aktif'),
(21, 'Thai Milk Tea', '1', 'Thai Milk Tea.webp', 20000, 1, 'Teh hitam yang diseduh kuat dengan rempah-rempah, selesai dengan susu kental dan susu evaporasi', 'Aktif'),
(22, 'Tropical Cha‑rge', '1', 'Tropical Cha rge.webp', 30000, 1, 'Sentuhan yang semarak dan menyegarkan pada bubble tea tradisional. Kombinasi rasa buah tropis dengan Red Bull yang meningkatkan energi menciptakan minuman yang unik dan menyegarkan', 'Aktif'),
(23, 'Tropical Frui‑Tea', '1', 'Tropical Fruit Tea.webp', 25000, 1, 'Surga rasa buah - tropis segar & menyenangkan', 'Aktif'),
(24, 'Watermelon Frui‑Tea', '1', 'Watermelon Fruit Tea.webp', 30000, 1, 'Segarkan diri Anda dengan rasa manis & juicy dari semangka dan teh', 'Aktif'),
(25, 'Watermelon Slush', '1', 'Watermelon Slush.webp', 35000, 1, 'Perpaduan es dari rasa buah semangka yang berani', 'Aktif'),
(26, 'Peach Frui‑Tea', '1', 'Peach Fruit Tea.webp', 35000, 1, 'Rasa manis yang lembut dan halus dari buah persik yang menyegarkan dan buah', 'Aktif'),
(27, 'Premium Boba Milk Tea', '1', 'Premium Boba Milk Tea.webp', 40000, 1, 'Mutiara tapioka menambahkan tekstur yang menyenangkan pada teh susu khas kami, favorit penggemar terlaris.', 'Aktif'),
(28, 'Apple Frui‑Tea', '1', 'Apple Fruit Tea.webp', 30000, 1, 'Kombinasi lezat dari rasa apel yang renyah, juicy & asam', 'Aktif'),
(29, 'Taichi Supreme Milk Tea', '1', 'Taichi Supreme Milk Tea.webp', 40000, 1, 'Teh susu krim dan memanjakan yang disertai dengan mutiara tapioka hitam dan mutiara konjak (putih)', 'Aktif'),
(30, 'Assam', '1', 'Assam.png', 20000, 1, 'Teh hitam yang populer di seluruh dunia. Teh Assam kami adalah rasa yang kaya dan bertubuh penuh dengan nada malty, bersahaja, dan pedas', 'Aktif'),
(31, 'Watermelon Cha‑rge', '1', 'Watermelon Cha rge.png', 35000, 1, 'A unique and invigorating variation of bubble tea that combines the refreshing taste of watermelon with energy-boosting Red Bull', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Nama` tinytext DEFAULT NULL,
  `Alamat` varchar(30) DEFAULT NULL,
  `Kota` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tgljoin` date DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `password`, `email`, `Nama`, `Alamat`, `Kota`, `telp`, `tgllahir`, `tgljoin`, `role`, `status`, `updated_at`, `created_at`) VALUES
('ariel', '$2y$10$KN.FzOeeAU526bHcrakpAuye7dLNTc3uHRdvAfDsxxFx9uDln6yyu', 'ariel.e21@mhs.istts.ac.id', 'Ariel Ezra', 'asdada', 'Surabaya', '12323132131', '3322-12-12', '2024-01-04', 'User', 'Aktif', '2024-01-04', '2024-01-04'),
('master', '$2y$10$KN.FzOeeAU526bHcrakpAuye7dLNTc3uHRdvAfDsxxFx9uDln6yyu', 'Master@gmail.com', 'Master', 'asdadsads', 'Surabaya', '21938012380132', '2332-12-21', '2024-01-03', 'Admin', 'Aktif', '2024-01-03', '2024-01-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dtrans`
--
ALTER TABLE `dtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `htrans`
--
ALTER TABLE `htrans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD KEY `Id_jenis` (`Id_jenis`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dtrans`
--
ALTER TABLE `dtrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `htrans`
--
ALTER TABLE `htrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `Id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
