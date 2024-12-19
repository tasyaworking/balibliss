-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 02:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdestinasi_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship`
--

CREATE TABLE `sponsorship` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_pesanan` int(11) NOT NULL,
  `bank_km` varchar(255) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `bukti_transaksi` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_pesanan`, `bank_km`, `total_harga`, `tgl_kunjungan`, `bukti_transaksi`, `created_at`, `verified`, `id_wisata`) VALUES
(1, 'BCA', 200000.00, '2024-07-31', '66a9b44d9b7a6_1722397773.png', '2024-07-31 05:49:33', 0, 25),
(2, 'BNI', 200000.00, '2024-07-31', '66a9b46b03918_1722397803.png', '2024-07-31 05:50:03', 0, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hargatiket`
--

CREATE TABLE `tb_hargatiket` (
  `tiket_balita` varchar(45) NOT NULL,
  `tiket_anak` float NOT NULL,
  `tiket_domestik` float NOT NULL,
  `tiket_internasional` float NOT NULL,
  `tiket_lokal` float NOT NULL,
  `tiket_dewasa` float NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hargatiket_has_tb_pembayaran`
--

CREATE TABLE `tb_hargatiket_has_tb_pembayaran` (
  `tb_hargatiket_id_wisata` int(11) NOT NULL,
  `tb_pembayaran_id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `banyak_tiket` varchar(100) NOT NULL,
  `pembayaran` float NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengelola`
--

CREATE TABLE `tb_pengelola` (
  `id_user` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `tb_pengelola`
--

INSERT INTO `tb_pengelola` (`id_user`, `id_wisata`) VALUES
(6, 25),
(6, 26),
(6, 29),
(6, 30),
(6, 31),
(6, 32),
(6, 33),
(6, 34),
(6, 35),
(6, 36),
(6, 37),
(6, 38),
(6, 39),
(8, 40),
(8, 41);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('user','pengelola','admin') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_user`, `email`, `nama`, `password`, `level`, `alamat`, `no_hp`) VALUES
(1, 'sasmita@gmail.com', 'sasmita', '$2y$10$Tc4miy9lH12aHNULMftV6ONGATJrHkG.zqy4PWbgNf1', 'user', 'tabanan', '08123'),
(2, 'sasmitaputri706@gmail.com', 'sasmita putri laksmi', '$2y$10$ISG7.IxZon8UBr0voGYRtuOKtzVfaLms8H.0dq/I4oN', 'user', 'sudimara', '081236594749'),
(3, 'melon@gmail.com', 'Melon', 'Melon123', 'user', 'Jl. Melon no 2', '08129293212'),
(4, 'lemoon@gmail.com', 'Lemon', 'Lemon123', 'pengelola', 'Jl. Lemon', '08124124592'),
(5, 'safiranayla930@gmail.com', 'safira Ramadhani', '$2y$10$N2KDlu3uDI87aZnIgZEnoOVpQ2XWUsPcx0kOBsNYCwn', 'user', '15 jl nuansa angkasa III no 15 br kelod ungasan', '089508740063'),
(6, 'pengelola@gmail.com', 'Pengelola', 'pengelola123', 'pengelola', 'Jl. Sunset Road', '08128354527'),
(7, 'admin@gmail.com', 'admin', 'admin123', 'admin', '', ''),
(8, 'pengelola2@gmail.com', 'Pengelola 2', 'pengelola123', 'user', 'Jl. Bukit Hijau', '08129293212'),
(9, 'dayumirah@gmail.com', 'Dayu Mirah', '$2y$10$M/bM8iWmDSfvIMD3qkhYwugmy0udVhiAIGfKOyJyiXZ', 'user', 'pnb', '1673877d');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `tgl_kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_wisata`, `nama_pemesan`, `jenis_kelamin`, `jumlah_tiket`, `tgl_kunjungan`) VALUES
(1, 25, 'I Komang Aryanatha Vijaya', 'laki-laki', 2, '2024-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reviews`
--

CREATE TABLE `tb_reviews` (
  `id` int(11) NOT NULL,
  `id_wisata` int(11) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_reviews`
--

INSERT INTO `tb_reviews` (`id`, `id_wisata`, `nama_pengirim`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(4, 25, NULL, 5, 'Salah satu danau yang paling sering dikunjungi wisatawan. Tempatnya enak buat nongkrong karena banyak penjual makanan disekitar danau & udaranya juga sejuk.', '2024-07-30 00:08:32', '2024-07-30 06:08:32'),
(5, 25, NULL, 5, 'Tempat wisata paling favorit ramai di kunjungi wisatawan dari kalangan mana sajaa...\r\nIndah dan sejuk ????❤️\r\nSpot foto bagus²????❤️\r\nCocok untuk bawa keluarga bawa anak²\r\nLengkap ada arena bermain anak²\r\nGk bakal nyesel kesini', '2024-07-30 00:13:17', '2024-07-30 06:13:17'),
(6, 25, NULL, 4, 'Danau Beratan di kawasan Bedugul, pemandangannya bagus banget, tamannya terus dipercantik dari tahun ke tahun, dengan aneka bunga dan tanaman yang terawat rapi. Udaranya sejuk dingin. Rekomen banget untuk naik speed boat menikmati pemandangan alam dari arah danau... tapi kalau tidak hujan lebat. Buat saudara muslim bisa sholat di mesjid besar yang ada tidak jauh dari danau. Belum lengkap ke Bali kalau mengunjungi danau ini.', '2024-07-30 00:16:02', '2024-07-30 06:16:02'),
(7, 25, NULL, 4, 'Saya suka dengan hawa di tempat ini, meskipun terkadang terik matahari namun masih sejuk. Sangat cocok untuk healing. rekomendasi bgt naik kapal keliling danaunya, benar-benar menyegarkan', '2024-07-30 00:16:30', '2024-07-30 06:16:30'),
(8, 25, NULL, 3, 'Danaunya bagus bgt viewnya, ada puranya juga dan bs dikunjungin areanya juga luas. Tiket masuknya 100ribu/org. Pokoknya rekomended.', '2024-07-30 00:17:18', '2024-07-30 06:17:18'),
(9, 26, NULL, 4, 'Monkey forest bali adalah wisata edukasi, di lokasi wisata terdapat hutan, pura dan kawanan monyet. Fasilitas yang tersedia parkir, toilet dll, untuk areal wisata sangat luas.', '2024-07-30 00:19:00', '2024-07-30 06:19:00'),
(10, 26, NULL, 5, 'Monkey Forest Ubud tempat yang menakjubkan di Bali yang menawarkan pengalaman unik berinteraksi dengan monyet-monyet yang bebas berkeliaran di dalam hutan. Dikelilingi oleh pepohonan hijau yang lebat, suasana di Monkey Forest Ubud sangat menenangkan dan mempesona. Pengunjung dapat melihat monyet-monyet yang lucu dan lincah bermain, makan, dan berjemur di sekitar area hutan.', '2024-07-30 00:19:30', '2024-07-30 06:19:30'),
(11, 26, NULL, 2, 'monyetnya nakall', '2024-07-30 00:24:13', '2024-07-30 06:24:13'),
(12, 26, NULL, 3, 'Lokasi kurang bersih, kasihan ada monyet yang luka (pahanya sobek) dibiarkan saja, kasihan', '2024-07-30 00:25:13', '2024-07-30 06:25:13'),
(13, 29, NULL, 5, 'Bagus spot untuk foto banyak tapi untuk tiket sight seeing aja menurut saya overprice terutama untuk wisatawan domestik, untuk naik buggy harus bayar lagi dan untuk naik keatas juga bayar lagi jd kami hanya sampai tebing aja karana anak2 jalan terlalu jauh klo sampe patung utama, dan naik buggy terlalu mahal jika rombongan..', '2024-07-30 00:26:35', '2024-07-30 06:26:35'),
(14, 29, NULL, 4, 'Dulu ke sini pas masih kelas 5 SD (16 tahun yang lalu LOL).\r\nGWK semakin terlihat elit dan udah ada tambahan patung Wisnu di atas Garuda.\r\nSelain itu sekarang sudah ada shuttle, area seni tari, lalu tambahan tarian kecak dan vendor-vendor makanan lainnya.\r\nSo far oke sih, tiketnya cukup mahal tapi worthlah kalau kalian stand by seharian nontonin suguhan tarinya sampai puncaknya tari kecak di jam 6 sore selain itu fasilitas yang ada juga oke banget! Sangat bersih, free shuttle dr parkiran sampe tmpt tiket.', '2024-07-30 00:27:09', '2024-07-30 06:27:09'),
(15, 29, NULL, 5, 'Luas sekali, banyak art center yg bisa dikunjungi, banyak aktivitas yg bisa dilakukan juga, ada pagelaran tari tiap jam, luangkan waktu seharian agar bisa puas menikmati semua fasilitas. Untuk shuttle bisa daftar dulu ditiket soalnya tidak ada stand pendaftaran di area patung GWK nya, hanya tersedia di pintu masuknya. Taman budaya dirawat dan dikelola dengan baik', '2024-07-30 00:27:38', '2024-07-30 06:27:38'),
(16, 29, NULL, 5, 'Pengalaman yang menyenangkan, area luas. Pada jam tertentu terdapat pertunjukan tari khas Bali. Saya melihat pertunjukan tari barong. Memikat...\r\nSelain itu pemandangan alam yang indah menambah kesan yang mendalam\r\nSaya datang sehari setelah perayaan world water forum ke 10, sehingga tidak melewati jalan tebing yang sedang hits karena sedang pembongkaran panggung WWF. Sayang sekali padahal pengin bgt lewat situ', '2024-07-30 00:28:31', '2024-07-30 06:28:31'),
(17, 29, NULL, 2, 'Saya kecewaa di GWK utamanya penampilan kecaknya. Tempatnya ga cukup tapi tetep nampung orang terus. Akhirnya semua pada berdiri. Lebih baik kunjungi tempat lain aja yang lebih layak untuk nonton', '2024-07-30 00:29:33', '2024-07-30 06:29:33'),
(18, 30, NULL, 5, 'Monumen Bajra Sandhi terletak di lingkungan Lapangan Puputan Renon. Di dalamnya terdapat museum yang belum buka saat saya datang. Lapangan di sekitarnya tidak sebersih tempat2 lain di Bali. Saat disana ada pedagang asongan yg menjual makanan walaupun biasanya (menurut pendapat warga lokal) mereka jarang bermunculan, apalagi ketika ada satpol pp. Ada tempat duduk di bawah pohon dimana kita bisa menikmati udara Bali yang tetap segar dan asri meski di tengah perkotaan.', '2024-07-30 00:30:25', '2024-07-30 06:30:25'),
(19, 30, NULL, 4, 'Monumen dengan gaya arsitektur yang mengagumkan. Eksterior bangunan dipenuhi detail ornamen tradisional Bali yang apik difoto dari berbagai sudut. Didalam terdapat diorama-diorama yang menggambarkan perjalanan sejarah serta perjuangan rakyat Bali. Anda dapat melihat lansekap provinsi Bali membentang hingga cakrawala dari puncak monumen. Diluar, banyak masyarakat memanfaatkan taman publik dan lapangan-lapangan yang mengelilingi monumen untuk berolahraga dari jogging hingga sepakbola.', '2024-07-30 00:30:57', '2024-07-30 06:30:57'),
(20, 30, NULL, 3, 'di dalam monumen kurang cocok untuk berfoto krna sangat penuh pngunjung.. lebih nyaman dari luar dn di area taman.\r\narea taman cocok untuk piknik sore dan jogging.', '2024-07-30 00:31:53', '2024-07-30 06:31:53'),
(21, 31, NULL, 5, 'Desa yg sangat bersih, elok dan apik sekali, rumah tradisional yang sangat khas. Dapat menyewa juga baju adat untuk kita pakai berfoto, kisaran sekitar 50k (apr 2024)', '2024-07-30 00:33:35', '2024-07-30 06:33:35'),
(22, 31, NULL, 4, 'Desa yg indah, asri tertata dan mempesona. Penduduknya ramah dan menjual makanan dan pernak pernik khas Bali. Dibelakang desa ada hutan bambu yg bersih dan bagus utk berfoto.', '2024-07-30 00:34:02', '2024-07-30 06:34:02'),
(23, 31, NULL, 4, 'Desa Panglipuran mendapat predikat sebagai salah satu desa terbersih sedunia.\r\nDesa adat ini memiliki pura suci dan rumah-rumah adat bali yang mempertahankan bentuk ruangan asli.', '2024-07-30 00:34:52', '2024-07-30 06:34:52'),
(24, 29, NULL, 5, 'Rekomended untuk dikunjungi saat dibali. Semoga banyak desa2 berikutnya seperti desa wisata penglipuran desa yg indah dengan khas bali dan menghasilkan bagi penduduk setempat.', '2024-07-30 00:36:03', '2024-07-30 06:36:03'),
(25, 31, NULL, 4, 'Disini selalu ramai baik weekend maupun weekday. Suasana pedesaan rapi dan bersih. Ada warung ddlmny bs order pas beli tiket masuk. Pelayanan ramah', '2024-07-30 00:36:45', '2024-07-30 06:36:45'),
(26, 32, NULL, 5, 'Tempat ini seru banget! Cocok buat kalian yang bawa keluarga atau teman! Ada banyak berbagai jenis burung, ada bioskop 3D juga di sini dan ada pertunjukan burung. Kalau kesini kalian bisa bawa makanan ringan dan botol minum. Kalau mau bawa makanan ringan, jangan lupa ya buang ke tempat sampah.\r\n\r\nHope you Enjoy ????????', '2024-07-30 00:37:39', '2024-07-30 06:37:39'),
(27, 32, NULL, 4, 'Salah satu destinasi di Bali yang kids friendly, bisa pakai stroller, banyak macam\" burung trs ada ngasih makan pelikan, ngasih makan komodo, pertunjukan\" juga banyakk, banyak pepohonan jg jadi adem, ada resto jg di dalam untuk makanannya enakk cuma harganya overpriced wkwkwk', '2024-07-30 00:38:19', '2024-07-30 06:38:19'),
(28, 32, NULL, 3, 'Bali Bird Park merupakan tempat wisata sekaligus tempat penangkaran berbagai jenis spesies burung.\r\nDi dalam kawasan Bali Bird Park juga bisa kita jumpai beberapa rumah adat yang ada di Indonesia. Tidak hanya itu, ada 2.000 jenis tanaman tropis termasuk 50 jenis tanaman palem, dan ada juga kupu-kupu.\r\nTidak hanya menikmati keindahan dan bercengkrama dengan burung-burung  para pengunjung juga dapat melihat pengembangbiakan burung-burung.\r\nDi dalam kawasan ini juga terdapat Restoran, kafe, dan toko cenderamata.', '2024-07-30 00:39:04', '2024-07-30 06:39:04'),
(29, 33, NULL, 4, 'Liburan ke Bali bawa anak wajib banget ke Bali zoo.\r\nBisa menambah wawasan tentang satwa dan berinteraksi langsung sama satwa di sini, experience kasih makan harimau, rusa dan gajah.\r\nBanyak show satwa menarik di sini.\r\n', '2024-07-30 00:44:00', '2024-07-30 06:44:00'),
(30, 33, NULL, 5, 'Berkunjung bersama keluarga,\r\nBerkeliling sambil melihat berbagai satwa² yg ada\r\nMenyapa dengan berbagai tingkah lucu mereka\r\nDidukung cuaca yg cerah\r\nDan sinar matahari berlimpah\r\nAlkisah liburan akhir pekan tema jelajah', '2024-07-30 00:44:37', '2024-07-30 06:44:37'),
(31, 34, NULL, 5, 'Wajib seengaknya sekali kesini ????\r\nCakep banget asli ????????\r\nBalepan nyari spot lumba2.\r\nAwalnya kukira bakal dingin air + snorklingnya ternyata airnya anget meski berangkat jam 6 pagi .\r\nHarganya termasuk worth it menurutku dengan pengalaman menyenangkan', '2024-07-30 00:50:40', '2024-07-30 06:50:40'),
(32, 34, NULL, 4, 'Tempatnya cocok untuk bersantai, bagi yg mau cek lumba - lumba harus pagi kalau sore cocok untuk nongkrong atau sekedar jogging. Sayang untuk sampah kurang ada yg sadar, karna sampah masih ada berserakan padahal sudah ada tmpat sampah', '2024-07-30 00:51:26', '2024-07-30 06:51:26'),
(33, 34, NULL, 3, 'Gak dapat sunrise, mendung????️\r\nTapi pantainya bersih dan banyak cafe2. …', '2024-07-30 00:51:51', '2024-07-30 06:51:51'),
(34, 34, NULL, 5, 'Pantai Lovina bersih, air Laut nya bening.\r\n\r\nJika ingin melihat lumba lumba bisa menyewa perahu, pagi hari mulai jam 6 pagi, jika terlalu siang lumba lumba nya tidak akan terlihat.\r\n\r\nBanyak spot foto bagus disini\r\nMasuk nya gratis hanya bayar parkir saja', '2024-07-30 00:52:18', '2024-07-30 06:52:18'),
(35, 35, NULL, 4, 'Tempat yg sangat bagus untuk di kunjungi.Apalagi bagi yg senang bermain Swing,servis sangat memuaskan ???????? …', '2024-07-30 00:52:58', '2024-07-30 06:52:58'),
(36, 35, NULL, 5, 'Tempatnya luas..swing nya mantep..pokonya menghibur dan refresh deh', '2024-07-30 00:53:19', '2024-07-30 06:53:19'),
(37, 35, NULL, 5, 'Tempat ini bagus, di tebing sungai Ayung, tapi aman. Tempat ini sangat indah, sejuk, sabgat mempesona, cocok untuk tamu asing. Top !!', '2024-07-30 00:53:53', '2024-07-30 06:53:53'),
(38, 35, NULL, 4, 'Jika Anda ingin merasakan ayunan dan menikmati suara sungai, inilah salah satu tempat terbaik di Bali yang bisa Anda nikmati sensasinya. Beberapa spot bagus untuk pecinta selfie dan trekker. Cobalah untuk menjelajahi semua level ayunan dan nikmati makanan ringan dan minuman enak di bawah', '2024-07-30 00:54:00', '2024-07-30 06:54:00'),
(39, 36, NULL, 5, 'Taman Ujung, juga dikenal sebagai Taman Sukasada Ujung, adalah salah satu tempat wisata yang paling memukau di Karangasem, Bali. Taman ini dibangun pada awal abad ke-20 oleh Raja Karangasem, dan menawarkan perpaduan arsitektur Bali dan Eropa yang menakjubkan.', '2024-07-30 00:54:40', '2024-07-30 06:54:40'),
(40, 36, NULL, 5, 'Obyek wisata yang ada di ujung timur yang sangat indah buat di kunjungi oleh local maupun wisatawan asing parkiran luas dan tiket tanpa mengatre ,', '2024-07-30 00:55:01', '2024-07-30 06:55:01'),
(41, 36, NULL, 4, 'Taman khas Bali Timur yang merupakan warisan jaman kolonialisme. Karya perpaduan arsitektur Eropa dengan Kerajaan Karangasem di masa lampau. Sangat lestari dan terpelihara dengan baik. Sering menjadi tempat berfoto pra pernikahan dan berpiknik keluarga. Di luar kawasan, terdapat pedagang jajanan asli Seraya dan Amlapura.', '2024-07-30 00:55:28', '2024-07-30 06:55:28'),
(42, 37, NULL, 3, 'Pemandangan bagus, tp Mobil shuttlenya mahal. Dan gak bisa kemana2 lg. Kalau melancong sendirian sih enak, tp kalau ngajak anak kecil agak susah menjelajahi semua bagian kebun raya Bali.', '2024-07-30 00:56:11', '2024-07-30 06:56:11'),
(43, 37, NULL, 4, 'Terakhir ke kebun raya Bedugul kls 4 SD dan sekarang sudah tamat kuliah iseng Jelan jalan kesana ternyata tempatnya masih sama. Sama sama nyaman dan tentram banyak fasilitas baru juga jadi lebih baik dari dulu. Minusnya makanan yang lumayan mahal seperti popmie yang harganya 20k.', '2024-07-30 00:56:37', '2024-07-30 06:56:37'),
(44, 37, NULL, 5, 'Salah satu tempat eco wisata di bali, cocok unt rekreasi dengan keluarga dan anak².\r\nBanyak dagang² juga disana, penyewaan sepeda listrik dan lain²', '2024-07-30 00:57:02', '2024-07-30 06:57:02'),
(45, 38, NULL, 4, 'Lokasinya cukup jauh, saran saya kalau ksni dr pagi, tempatnya sejuk sekali, hati adem pas disini, uang masuk 50 rbu , klo ktp bali 20 rbuan.  Cuma saran saya ada beberapa tempat  yg perlu perawatan. Kalau cari ketenangan untuk menikmati pemandangan, saran sy kesini bagus ???? ingat jangan lupa memakan baju hangat krn dsni cukup sejuk.', '2024-07-30 00:57:56', '2024-07-30 06:57:56'),
(46, 38, NULL, 3, 'Menurut saya tempat ini kurang untuk dijadikan destinasi utama saat berlibur, karena tempat nya masih terasa sepi. Selain dari bunga/tanaman edelweisnya hal hal yang lain tidak terlalu terlihat mencolok.Jalan menuju taman edelweis juga cukup menanjak, tidak cocok untuk mobil yang tidak kuat menanjak.Tempat ini masih layak dikunjungi untuk yang masih penasaran seperti apa bentuk dari Edelweis. Tapi lebih baik untuk dijadikan destinasi sekunder daripada destinasi utama', '2024-07-30 00:59:56', '2024-07-30 06:59:56'),
(47, 38, NULL, 4, 'Tempatnya asri, sejuk cuma kurang di tata lagi. Di pinggir jalan setapak kurang di isi pembatas Krn sebelah jalan itu jurang yg ckup dalam.', '2024-07-30 01:00:41', '2024-07-30 07:00:41'),
(48, 39, NULL, 4, 'Karna viral di tiktok saya dan rekan mencoba waterslide di lemukih, perjalanan ditempuh 2 jam dari denpasar, begitu masuk di lemukih ternyata akses menuju waterslide harus dengan kendaraan bermotor karna mobil tidak bisa sampe lokasi, pemandangan sawah yang indah dan air segar jernih dari waterslide membuat lelah perjalanan menjadi hilang, tiket masuk 10k cukup terjangkau ada juga fasilitas helm dan pelindung tangan, lalu ada ban bekas yang digunakan sebagai alas kita duduk agar tidak berbenturan dengan batu batu, cukup ok berlibur disini tp minusnya warung makannya makanan kurang beragam , masaknya lama dan rasanya biasa saja, semoga ada perbaikan agar lebih menarik ????', '2024-07-30 01:01:26', '2024-07-30 07:01:26'),
(50, 39, NULL, 5, 'Tempat berendam yg asik, lokasi dari jalan utama lumayan sangat menguras energi meski menggunakan motor, tapi harus melintasi parit2 sawah warga yang lebarnya sangat amat sempit. Kanan kiri persawahan warga dan jalannya lumayan licin, kalau tidak ahli bisa terpleset jatuh ke sawah..', '2024-07-30 01:02:04', '2024-07-30 07:02:04'),
(51, 40, NULL, 5, 'Tempat main air yg paling seru buat anak-anak sampai dewasa. Di semua tempat bersih. Petugasnya sigap memastikan semua aman selamat sampai finish point, stp ada yg keluar toilet dan changing room langsung dibersihkan, dan raman-ramah. Ada loker yg aman.', '2024-07-30 01:04:34', '2024-07-30 07:04:34'),
(52, 40, NULL, 4, 'Tempat bermain air yang sangat seru , dari anak² sampai dewasa semua pasti suka! Ini ke4 kali nya kami sekeluarga ke sini. Saran saya lebih baik datang dari jam 9 agar bisa mencoba semua wahana airnya , banyak yang baru juga lho sekarang .. kalau masuk ke sana nanti di berikan gelang yang bisa di isi uang ( kalo abis bisa top up koq ) untuk beli makanan & minuman di dalam sana.. gak bisa bawa makanan dr luar yah..', '2024-07-30 01:05:10', '2024-07-30 07:05:10'),
(54, 25, NULL, 5, 'bbb', '2024-07-30 20:16:10', '2024-07-31 02:16:10'),
(55, 25, NULL, 5, 'sangat indah', '2024-07-30 21:51:01', '2024-07-31 03:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sponsor`
--

CREATE TABLE `tb_sponsor` (
  `id_sponsor` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `pembayaran` float NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `diterima` enum('ya','tidak','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `tb_sponsor`
--

INSERT INTO `tb_sponsor` (`id_sponsor`, `nama`, `tanggal_mulai`, `tanggal_selesai`, `pembayaran`, `bukti_pembayaran`, `diterima`) VALUES
(1, 'GWK', '2024-07-02', '2024-07-10', 50000, 'buktibyr.png', 'ya'),
(2, 'Monkey Forest Ubud', '2024-07-02', '2024-07-05', 200000, 'buktibyr.png', 'ya'),
(3, 'Coco Mart', '2024-07-02', '2024-07-10', 50000, 'buktibyr.png', 'ya'),
(4, 'Waterbom Bali', '2024-07-02', '2024-07-15', 200000, 'buktibyr.png', 'ya'),
(5, 'UBUD VILLAS RENTAL', '2024-07-31', '2024-08-30', 500000, 'buktibyr.png', 'ya'),
(6, 'Bali Zoo', '2024-07-31', '2024-08-14', 500000, 'buktibyr.jpg', 'ya'),
(7, 'Danau Beratan', '2024-07-11', '2024-08-22', 500000, 'buktibyr.png', 'ya'),
(8, 'Indomaret', '2024-08-15', '2024-08-20', 200000, 'buktibyr.png', 'ya'),
(9, 'Alfamart', '0000-00-00', '0000-00-00', 200000, 'bukti_byr11.png', 'tolak'),
(10, 'Alfamidi', '2024-07-31', '2024-08-10', 200000, 'bukti_byr12.png', 'tidak'),
(11, 'Alfamart', '2024-07-31', '2024-08-10', 200000, 'buktibyr1.png', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempatwisata`
--

CREATE TABLE `tb_tempatwisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `deskripsi_singkat` text DEFAULT NULL,
  `jam_operasional` varchar(20) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `sosmed` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat_wisata` varchar(200) NOT NULL,
  `no_hp_wisata` varchar(15) NOT NULL,
  `no_rek` varchar(100) NOT NULL,
  `harga_tiket` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `diterima` enum('ya','tidak','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `tb_tempatwisata`
--

INSERT INTO `tb_tempatwisata` (`id_wisata`, `nama_wisata`, `deskripsi`, `deskripsi_singkat`, `jam_operasional`, `fasilitas`, `sosmed`, `foto`, `alamat_wisata`, `no_hp_wisata`, `no_rek`, `harga_tiket`, `lokasi`, `diterima`) VALUES
(25, 'Danau Beratan', 'Danau Beratan adalah salah satu danau wisata di Bali yang sangat populer di kalangan wisatawan lokal hingga mancanegara.Tempat wisata ini lebih dikenal dengan nama Danau Bratan atau Danau Begudul karena letaknya di kawasan Begudul. Danau Beratan adalah jenis danau alami yang terletak di paling timur antara dua danau lainnya yakni Danau Tamblingan dan Danau Buyan. Luasnya sekitar 375 hektare dan berada di atas ketinggian 1.239 meter dari atas permukaan air laut sehingga membuat suhu udara di sini terbilang cukup sejuk. \r\n\r\nSebelum pergi mengunjungi Danau Beratan, Moms pastinya bertanya-tanya ada apa saja di tempat wisata ini sehingga layak untuk dikunjungi.\r\nBerikut hal-hal dan juga kegiatan yang bisa Moms temukan dan lakukan saat pergi berwisata ke Danau Beratan, yaitu:\r\n\r\n1. Adanya Pura di Tengah Danau\r\nSalah satu keunikan dari Danau Beratan yang tidak dimiliki oleh danau-danau kebanyakan adalah adanya pura yang terletak tepat di tengah-tengah danau. Pura ini terlihat seperti sedang mengapung di atas air. Pura yang ada di tengah Danau Beratan disebut dengan nama Pura Ulun Danu. Pura ini menjadi tempat pemujaan bagi Sang Hyang Dewi yang memberikan kesuburan bagi para wanita dan juga pria. Tak heran kalau destinasi wisata Danau Beratan selalu masuk dalam daftar list para pasangan yang akan honeymoon di Bali. Pura Ulun Danu merupakan sebuah pura dengan arsitektur yang khas sehingga tampilannya terlihat sangat mencolok.\r\n2. Permainan Air\r\nAda banyak hal yang bisa Moms jumpai saat pergi berwisata ke Danau Beratan, salah satunya adalah menikmati wahana permainan air. Wahana permainan air yang ada di sini adalah parasailing, kano, jetski, dan masih banyak lagi.\r\n3. Pemandangan yang Indah\r\nDaya tarik utama dari danau ini adalah pemandangannya yang tampil bak surga dunia. Hampir sebagian besar wisatawan yang datang ke Danau Beratan karena ingin melihat langsung bagaimana indahnya pemandangan yang ada di sini. Pemandangan di Danau Beratan terbilang eksotis karena selain adanya pura yang berada di tengah-tengah danau, di seberang danau ini terdapat pemandangan gunung serta bukit yang menjulang tinggi.\r\n', 'Danau Beratan adalah salah satu danau wisata di Bali yang sangat populer di kalangan wisatawan lokal hingga mancanegara.Tempat wisata ini lebih dikenal dengan nama Danau Bratan atau Danau Begudul karena letaknya di kawasan Begudul. Danau Beratan adalah jenis danau alami yang terletak di paling timur antara dua danau lainnya yakni Danau Tamblingan dan Danau Buyan. Luasnya sekitar 375 hektare dan berada di atas ketinggian 1.239 meter dari atas permukaan air laut sehingga membuat suhu udara di sini terbilang cukup sejuk. ', ' 08.00 -20.00', '', 'Facebook: @Danauberatanbali 		', 'danauberatan1.jpg', 'Jalan Raya Candi Kuning – Bedugul, Desa Candikuning, Kecamatan Baturiti, Kabupaten Tabanan.', '082146129292', 'BCA 774893785 a.n PENGELOLA DANAU', '100000', 'Tabanan, Bali', 'ya'),
(26, 'Monkey Forest Ubud', 'Monkey Forest Ubud atau disebut juga Mandala Suci Wenara Wana merupakan sebuah kawasan cagar alam sekaligus komplek candi yang terletak di Ubud, Bali. Tempat ini merupakan salah satu destinasi wisata populer di Ubud dan sering dikunjungi oleh lebih dari 10.000 wisatawan setiap bulannya. Kawasan ini menjadi tempat tinggal bagi sekitar 340 ekor Macaca fascicularis yang lebih dikenal dengan kera ekor panjang. Kawanan monyet ini terbagi menjadi empat kelompok yang masing-masing menempati kawasan berbeda di dalam hutan.', 'Monkey Forest Ubud atau disebut juga Mandala Suci Wenara Wana merupakan sebuah kawasan cagar alam sekaligus komplek candi yang terletak di Ubud, Bali. Tempat ini merupakan salah satu destinasi wisata populer di Ubud dan sering dikunjungi oleh lebih dari 10.000 wisatawan setiap bulannya. Kawasan ini menjadi tempat tinggal bagi sekitar 340 ekor Macaca fascicularis yang lebih dikenal dengan kera ekor panjang. Kawanan monyet ini terbagi menjadi empat kelompok yang masing-masing menempati kawasan berbeda di dalam hutan.', '09:00 - 17:00', '', 'Facebook: @monkeyforestubud 		', 'monkey_forest.jpeg', 'Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali', '08234576589', '0362', '50000', 'Gianyar, Bali', 'ya'),
(29, 'Garuda Wisnu Kencana', 'Garuda Wisnu Kencana Cultural Park) atau kerap disebut dengan GWK, adalah sebuah taman wisata budaya di bagian selatan pulau Bali. Taman wisata ini terletak di Desa Ungasan, Kecamatan Kuta Selatan, Kabupaten Badung, kira-kira 40 kilometer di sebelah selatan Denpasar, ibu kota provinsi Bali.Di sini berdiri megah sebuah landmark atau maskot Bali, yakni patung Garuda Wisnu Kencana yang menggambarkan sosok Dewa Wisnu menunggangi tunggangannya, Garuda, setinggi 121 meter.[1] \r\nArea Taman Budaya Garuda Wisnu Kencana berada di ketinggian 146 meter di atas permukaan tanah atau 263 meter di atas permukaan laut.[1] \r\nDi kawasan itu terdapat juga Patung Garuda yang tepat di belakang Plaza Wisnu adalah Plaza Garuda di mana patung kepala Garuda setinggi 18 meter ditempatkan. Pada saat ini, Plaza Garuda menjadi titik fokus dari sebuah lorong besar pilar berukir batu kapur yang mencakup lebih dari 4000 meter persegi luas ruang terbuka yang dinamai Lotus Pond. Pilar-pilar batu kapur kolosal dan monumental di Lotus Pond mencipatakan seni lansekap ruang yang sangat eksotis. Dengan kapasitas ruangan yang mampu menampung hingga 7000 orang, Lotus Pond telah mendapatkan reputasi yang baik sebagai tempat sempurna untuk mengadakan acara besar, baik yang berskala nasional maupun internasional. \r\nPatung Garuda Wisnu Kencana diresmikan pada tanggal 22 September 2018 oleh Presiden Joko Widodo. \r\n', 'Garuda Wisnu Kencana (GWK) merupakan sebuah patung raksasa karya salah satu pematung kenamaan asal Bali, Nyoman Nuarta. Patung ini berbentuk Batara Wisnu yang menunggangi hewan legendaris garuda sebagai simbol Amerta, kebajikan yang abadi. Patung yang masih dalam tahap pengerjaan ini terbuat dari 4.000 ton tembaga dan kuningan. Menurut rencana, saat selesai dibuat, patung ini akan berdiri setinggi 150 meter dengan bentangan sayap garuda mencapai 64 meter. GWK akan menjadi patung terbesar di dunia.', '09:00 - 22:00', '', 'Facebook: @gwkbali 		', 'gwk1.jpg', 'Jl. Raya Uluwatu, Ungasan, Kec. Kuta Sel., Kabupaten Badung, Bali 80364', ' 0361700808', '0365', '150000', 'Uluwatu, Bali', 'ya'),
(30, 'Bajra Sandhi Monument', 'Monumen Bajra Sandhi merupakan Monumen Perjuangan Rakyat Bali untuk memberi hormat pada para pahlawan serta merupakan lambang pesemaian pelestarian jiwa perjuangan rakyat Bali dari generasi ke generasi dan dari zaman ke zaman serta lambang semangat untuk mempertahankan keutuhan Negara Kesatuan Republik Indonesia. Hal ini dapat dilihat dari 17 anak tangga yang ada di pintu utama, 8 buah tiang agung di dalam gedung monumen, dan monumen yang menjulang setinggi 45 meter. Lokasi monumen ini terletak di depan Kantor Gubernur Kepala Daerah Provinsi Bali yang juga di depan Gedung DPRD Provinsi Bali Niti Mandala Renon persisnya di Lapangan Puputan Renon.\r\n\r\nMonumen ini dikenal dengan nama \"Bajra Sandhi\" karena bentuknya menyerupai bajra atau genta yang digunakan oleh para Pendeta Hindu dalam mengucapkan Weda (mantra) pada saat upacara keagamaan. Monumen ini dibangun pada tahun 1987, diresmikan oleh Presiden Megawati Sukarno Putri pada tanggal 14 Juni 2003. Tujuan pembangunan monumen ini adalah untuk mengabadikan jiwa dan semangat perjuangan rakyat Bali, sekaligus menggali, memelihara, mengembangkan serta melestarikan budaya Bali untuk diwariskan kepada generasi penerus sebagai modal melangkah maju menapak dunia yang semakin sarat dengan tantangan dan hambatan.\r\nEksterior monumen ini kaya akan detail ornamen khas Bali yang sarat dengan makna filosofi ajaran Hindu. Nama “Bajra Sandhi” berasal dari bentuk bangunan yang jika dilihat dari kejauhan menyerupai lonceng para pendeta Hindu, yang dalam bahasa Bali disebut bajra. Pada bagian atas, terdapat periuk (kumba) yang melambangkan Guci Amertha. Selain itu, pada bagian gerbang museum, terdapat bentuk kepala Naga Basuki dan kura-kura yang disebut Bedawang Akupa. Kedua makhluk ini erat kaitannya dengan kisah mitologi perebutan Tirtha Amerta antara kaum Dewa dengan kaum Asura (raksasa).\r\n\r\nSelain nilai-nilai ajaran Hindu, arsitektur bangunan ini juga menyimpan perlambangan nasionalisme. Monumen ini memiliki 17 gerbang utama dan 8 pilar yang merepresentasikan tanggal 17 Agustus. Tinggi keseluruhan monumen adalah 45 meter, sesuai tahun kemerdekaan Republik Indonesia. Tiga puluh tiga diorama yang terdapat di dalam museum pun semakin melengkapi pesan moral mengenai pentingnya nasionalisme dalam menjaga kemerdekaan yang telah diperjuangkan para leluhur.\r\n\r\nSeluruh diorama disimpan di lantai kedua museum ini. Diorama-diorama ini menggambarkan peristiwa-peristiwa penting dalam perjalanan sejarah rakyat Bali sejak era prasejarah hingga memasuki era Indonesia merdeka. Keseluruhan diorama ditata berurutan, searah jarum jam sesuai urutan waktu terjadinya peristiwa tersebut. Beberapa diorama penting yang ada di sini menggambarkan peristiwa heroik Pertempuran Puputan Klungkung, peristiwa Puputan Badung, peristiwa perobekan surat Belanda oleh Patih I Gusti Ketut Jelantik, dan penyebarluasan proklamasi kemerdekaan 1945.', 'Monumen Bajra Sandhi merupakan Monumen Perjuangan Rakyat Bali untuk memberi hormat pada para pahlawan serta merupakan lambang pesemaian pelestarian jiwa perjuangan rakyat Bali dari generasi ke generasi dan dari zaman ke zaman serta lambang semangat untuk mempertahankan keutuhan Negara Kesatuan Republik Indonesia. Hal ini dapat dilihat dari 17 anak tangga yang ada di pintu utama, 8 buah tiang agung di dalam gedung monumen, dan monumen yang menjulang setinggi 45 meter. Lokasi monumen ini terletak di depan Kantor Gubernur Kepala Daerah Provinsi Bali yang juga di depan Gedung DPRD Provinsi Bali Niti Mandala Renon persisnya di Lapangan Puputan Renon.', '09:00 - 20:00', '', 'Bajrasandhi@instagram.com', 'bajrasandi.jpg', 'Jl. Raya Puputan No.142, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80234', ' 0361700870', 'BCA 361700870 an BAJRA SANDI DENPASAR', '50000', 'Denpasar, Bali', 'ya'),
(31, 'Pengelipuran', 'Penglipuran adalah salah satu desa adat dari Kabupaten Bangli, Provinsi Bali, Indonesia. Desa ini terkenal sebagai salah satu destinasi wisata di Bali karena masyarakatnya yang masih menjalankan dan melestarikan budaya tradisional Bali dalam kehidupan mereka sehari-hari. Arsitektur bangunan dan pengolahan lahan masih mengikuti konsep Tri Hita Karana, filosofi masyarakat Bali mengenai keseimbangan hubungan antara Tuhan, manusia, dan lingkungannya. Mereka berhasil membangun pariwisata yang menguntungkan seluruh masyarakatnya tanpa menghilangkan budaya dan tradisi mereka. Pada tahun 1995, desa Penglipuran juga mendapatkan penghargaan Kalpataru dari pemerintah Indonesia atas usahanya melindungi hutan bambu di ekosistem lokal mereka.\r\n\r\nSecara administratif, desa adat ini termasuk dalam wilayah Kelurahan Kubu, Kecamatan Bangli, Bangli.\r\n\r\nGeografis\r\nTotal area dari desa ini mencapai 112 hektar dengan ketinggian 500-600 meter di atas permukaan laut dan berlokasi sekitar 5 kilometer dari kota Bangli atau 45 kilometer dari Kota Denpasar. Desa ini dikelilingi oleh desa adat lainnya, seperti Desa Kayang di utara, Desa Kubu di timur, Desa Gunaksa di selatan, dan Desa Cekeng. Temperatur bervariasi dari sejuk sampai dingin (16-29 °C) dan curah hujan rata-rata 2000 mm pertahun. Permukaan tanah termasuk rendah dengan ketinggian 1-15 meter.\r\n\r\nSejarah\r\nDesa Penglipuran dipercaya mulai berpenghuni pada zaman pemerintahan I Dewa Gede Putu Tangkeban III.[1] Hampir seluruh warga desa ini percaya bahwa mereka berasal dari Desa Bayung Gede. Dahulu orang Bayung Gede adalah orang-orang yang ahli dalam kegiatan agama, adat dan pertahanan. Karena kemampuannya, orang-orang Bayung Gede sering dipanggil ke Kerajaan Bangli. Namun, karena jaraknya yang cukup jauh, Kerajaan Bangli akhirnya memberikan daerah sementara kepada orang Bayung Gede untuk beristirahat. Tempat beristirahat ini sering disebut sebagai Kubu Bayung. Tempat inilah kemudian yang dipercaya sebagai desa yang mereka tempati sekarang. Mereka juga percaya bahwa inilah alasan yang menjelaskan kesamaan peraturan tradisional serta struktur bangunan antara desa Penglipuran dan desa Bayung Gede.\r\n\r\nMengenai asal mulai kata Desa Penglipuran, ada 2 persepsi berbeda yang diyakini oleh masyarakatnya. Yang pertama adalah Penglipuran berarti “pengeling pura” dengan “pengeling” berarti ingat dan “pura” berarti tempat leluhur.Presepsi yang kedua mengatakan bahwa penglipuran berasal dari kata “pelipur” yang berarti hibur dan “lipur” yang berarti ketidakbahagiaan. Jika digabungkan maka penglipuran berarti tempat untuk penghiburan. Persepsi ini muncul karena Raja Bangli pada saat itu dikatakan sering mengunjungi desa ini untuk bermeditasi dan bersantai.', 'Penglipuran adalah salah satu desa adat atau kampung yang terletak di Kabupaten Bangli, Provinsi Bali, Indonesia. Desa ini terkenal sebagai tujuan wisata di Bali karena penduduk desa masih melestarikan budaya tradisional mereka dalam kehidupan sehari-hari. Arsitektur bangunan dan pengolahan lahan masih mengikuti konsep Tri Hita Karana, filosofi masyarakat Bali mengenai keseimbangan hubungan antara Tuhan, manusia dan lingkungannya. Desa Penglipuran dipercaya mulai berpenghuni pada zaman pemerintahan I Dewa Gede Putu Tangkeban III.[1] Hampir seluruh warga desa ini percaya bahwa mereka berasal dari Desa Bayung Gede. Dahulu orang Bayung Gede adalah orang-orang yang ahli dalam kegiatan agama, adat dan pertahanan.', '09:00 - 18:00', '', 'balizoo@instagram.com', 'Pengelipuran2.jpeg', 'Jl. Penglipuran, Kubu, Kec. Bangli, Kabupaten Bangli, Bali 80611', '+62 821-4454-34', 'BCA 00332269000 a.n PENGELIPURAN BALI', '75000', 'Bangli, Bali', 'ya'),
(32, 'Bali Bird Park', '\'Bagi para pecinta burung, mungkin belum lengkap rasanya jika kalian belum berkunjung ke taman burung Bali Bird Park yang berada di Gianyar, Bali. Di sini, detikers bisa menikmati suasana alam yang asri dengan habitat ribuan burung dari berbagai daerah. Di Bali Bird Park, Anda bisa merasakan sensasi berjalan-jalan di antara burung-burung yang berasal dari Sumatra, Kalimantan, Jawa, Bali, Papua, Amerika Selatan hingga Afrika Selatan. Anda akan menyaksikan 250 spesies burung yang hidup sesuai habitatnya, di mana mereka makan dan berkembang biak. Kamu yang datang ke Bali Bird Park dijamin nggak akan bingung mau melakukan apa saja, karena di tempat ini ada banyak banget spot wisata yang menarik buat kamu kunjungi. Apalagi, sepanjang hari juga ada pertunjukan seru untuk diikuti. Bali Bird Park sendiri terbagi menjadi tujuh area, yang mewakili habitat burung-burung koleksi mereka. Setiap kandang-kandang burung yang ada di taman ini juga didesain mirip dengan habitat asli mereka di alam liar, lho. Berikut ini adalah pertunjukan-pertunjukan yang bisa kamu nikmati sekaligus berpartisipasi di dalamnya!Penerbangan Burung Bali Rainforest (Bali Rainforest Free Flight) Pertunjukan yang pertama ada Penerbangan Burung Bali Rainforest, yang bisa kamu lihat setiap hari pada pukul 10.30 dan 16.00 WITA. Di pertunjukan Penerbangan Burung Bali Rainforest kamu bisa menyaksikan burung-burung lokal berterbangan di langit menjelajahi habitat aslinya. Pesky Parakeet Feeding Selanjutnya ada Pesky Parakeet Feeding, di mana pertunjukan ini biasanya dilaksanakan pada pukul 9.30 dan 13.00 WITA. Pada pertunjukan ini, kamu bisa berinteraksi langsung dengan sekumpulan burung parkit. Biasanya pihak taman akan menyediakan makanan khusus yang bisa digunakan untuk memberi makan burung parkit, sehingga mereka akan menghampiri kamu! Potty Pelicans Nggak cuma memberi makan burung parkit, kamu juga bisa memberi makan burung pelikan, lho! Kamu bisa memberi makan para burung pelikan pada pertunjukan Potty Pelicans yang biasa diadakan setiap hari pukul 10.00 dan 13.15 WITA. Nah, selain menjadi hiburan, pertunjukan ini juga bisa menjadi sarana edukasi bagi para pengunjung mengenai perilaku, kebiasaan makan, sampai dengan kehidupan pelikan sehari-hari. Basic Instinct Free Flight Kemudian ada juga pertunjukan Basic Instinct Free Flight yang dilaksanakan pada pukul 11.30 dan 15:00 WITA. Pertunjukan ini akan menampilkan keterampilan dari burung-burung pemangsa, seperti berinteraksi dengan sesama dan juga menunjukkan ketajaman naluri mereka dalam menangkap masa. Burung yang ditunjukkan biasanya adalah elang dan burung hantu. Papua Rainforest Free Flight nPapua Rainforest Free Flight merupakan pertunjukan tempat kamu bisa melihat koleksi burung cendrawasih khas Papua terlengkap. Nggak cuma itu aja, di pertunjukan ini juga kamu juga akan menyaksikan para petugas memberi makan burung-burung tersebut. Pertunjukan ini diadakan setiap hari pukul 12.45 WITA., \'Bali Bird Park merupakan tujuan wisata favorit para wisatawan, terutama yang sedang liburan bersama anak-anak. Menjadi taman burung satu-satunya di Bali, Bali Bird Park sudah dibuka untuk umum sejak tahun 1995, lho! Taman ini termasuk besar dengan total luas lahan kurang lebih mencapai lima hektar. Melansir dari laman website-nya, taman ini memiliki 1300 burung dan 250 spesies. Selain melihat koleksi burung, kamu juga bisa mengikuti beragam aktivitas seru dan menyenangkan yang dijalankan sepanjang hari', '\'Bagi para pecinta burung, mungkin belum lengkap rasanya jika kalian belum berkunjung ke taman burung Bali Bird Park yang berada di Gianyar, Bali. Di sini, detikers bisa menikmati suasana alam yang asri dengan habitat ribuan burung dari berbagai daerah. Di Bali Bird Park, Anda bisa merasakan sensasi berjalan-jalan di antara burung-burung yang berasal dari Sumatra, Kalimantan, Jawa, Bali, Papua, Amerika Selatan hingga Afrika Selatan. Anda akan menyaksikan 250 spesies burung yang hidup sesuai habitatnya, di mana mereka makan dan berkembang biak. Bali Bird Park sendiri terbagi menjadi tujuh area, yang mewakili habitat burung-burung koleksi mereka. Setiap kandang-kandang burung yang ada di taman ini juga didesain mirip dengan habitat asli mereka di alam liar, lho.', '09:00 - 20:00', '', 'Facebook: @balibirdpark.id ', 'birdpark1.jpg', 'Jl. Serma Cok Ngurah Gambir Singapadu, Batubulan, Kec. Sukawati, Kabupaten Gianyar, Bali.', '0361299352', ' BCA 0361299352 a.n BALI BIRD PARK GIANYAR', '100000', 'Gianyar, Bali', 'ya'),
(33, 'Bali  Zoo', 'Bali Zoo adalah taman satwa pertama di Bali yang menawarkan berbagai macam aktivitas dengan satwa. Kamu juga bisa berinteraksi lebih dekat dan belajar soal satwa-satwa yang ada. Selain itu, kamu juga bisa melihat secara langsung lebih dari 500 satwa di dalam taman dengan luas lebih dari 12 hektar.\r\n\r\nPas lagi di Bali, datang ke kebun binatang pertama di Bali, Bali Zoo cocok banget jadi pilihan. Kamu bisa lihat satwa dari dekat, dan tentunya anak-anak akan antusias buat memberi makan satwa di program Fed the Animals. Mereka juga bisa mendapatkan pengalaman tak terlupakan lewat program Animal Encounters, di mana mereka bisa belajar lebih jauh soal satwa-satwa yang ada. Jangan lupa buat nonton Animal Presentation, di mana kamu dapat melihat burung-burung terbang dan melakukan aksi!\r\n\r\nTunggu apalagi? Segera pesan tiketnya lewat tiket.com sekarang!\r\n\r\n\r\nJalan-jalan ke tempat wisata di Bali tidak harus selalu ke pantai. Kamu juga bisa berkunjung ke Bali Zoo yang spektakuler untuk melihat kumpulan satwa Indonesia yang menakjubkan! Berlokasi di desa Singapadu, Bali Zoo yang rindang dipenuhi dengan pepohonan tropis, memiliki lebih dari 500 satwa termasuk satwa langka seperti Gajah Sumatera, Orangutan, Harimau Benggala, Binturong, dan Singa Afrika. Para pengunjung dapat berinteraksi secara langsung dengan satwa-satwa jinak yang terlatih dan jangan lewatkan kesempatan untuk berfoto bersama satwa langka ini! Ada juga wahana di Bali Zoo yang tak kalah menyenangkan, yaitu Night Safari. Jangan lewatkan aktivitas unik yang satu ini, ya!', 'Ada berbagai macam taman rekreasi yang tersedia di Bali. Lantas, apa yang menjadi daya tarik Bali Zoo sehingga membedakannya dengan taman rekreasi yang lain? Berikut ini daya tariknya menurut Edy dan Widyastuti dalam jurnalnya yang berjudul Strategi Pengembangan Bali Zoo Park sebagai Daya Tarik Wisata di Kabupaten Gianyar Bali Bali Zoo adalah taman satwa pertama di Bali yang menawarkan berbagai macam aktivitas dengan satwa. Kamu juga bisa berinteraksi lebih dekat dan belajar soal satwa-satwa yang ada. Selain itu, kamu juga bisa melihat secara langsung lebih dari 500 satwa di dalam taman dengan luas lebih dari 12 hektar.', '09:00 - 18:00', '', 'balizoo@instagram.com', 'Bali_Zoo_Park1.jpg', 'Jl. Raya Singapadu, Br. Apuan 80582 Kabupaten Gianyar Bali', '+62 361 294357', 'BCA 0990988876 a.n BALI ZOO PENGELOLA', '200000', 'Gianyar, Bali', 'ya'),
(34, 'Pantai Lovina', 'Pantai Lovina atau Lovina adalah pesisir pantai yang terletak sekitar 9 km sebelah barat kota Singaraja. Daerah ini merupakan salah satu objek wisata yang ada di Bali Utara. Wisatawan banyak yang berkunjung ke sana, selain untuk melihat pantainya yang masih alami, juga untuk melihat aktivitas ikan lumba-lumba pada pagi hari yang banyak terdapat di pantai ini. Dengan menyewa perahu nelayan setempat, wisatawan dapat mendekati lumba-lumba.\r\nLovina berasal dari kata \"Love\" dan \"Ina\" yang oleh masyarakat diartikan sebagai \"Love Indonesia\". Pengertian seperti itu tidak sesuai dalam konteks Panji Tisna. Istilah “INA” secara umum sudah dikenal sebagai singkatan untuk kontingen atau rombongan atlet Indonesia untuk \"Asian Games 1963\" sedangkan nama \"Lovina\" sudah didirikan pada tahun 1953. Menurut Panji Tisna, \"Lovina\" memiliki makna filosofis, campuran dua suku kata \"Love\" dan \"Ina\". Kata \"Love\" dari bahasa Inggris berarti \"kasih\" yang tulus dan \"Ina\" dari bahasa Bali atau bahasa daerah yang berarti \"Ibu\". Menurut penggagasnya, Anak Agung Panji Tisna, arti \"Lovina\" adalah \"Cinta Ibu\" atau arti luhurnya adalah \"Cinta Ibu Pertiwi\".', 'Pantai Lovina atau Lovina adalah pesisir pantai yang terletak sekitar 9 km sebelah barat kota Singaraja. Daerah ini merupakan salah satu objek wisata yang ada di Bali Utara. Wisatawan banyak yang berkunjung ke sana, selain untuk melihat pantainya yang masih alami, juga untuk melihat aktivitas ikan lumba-lumba pada pagi hari yang banyak terdapat di pantai ini.Pantai Lovina terletak di pantai utara pulau Bali, tepatnya berada di kawasan Lovina yang terdiri dari beberapa desa pesisir seperti Kalibukbuk, Anturan, dan Tukad Mungga, di Kabupaten Buleleng. Lovina berjarak sekitar 2,5 jam berkendara dari tujuan wisata populer Kuta dan Seminyak di Bali selatan', '06:00 - 10:00', '', 'lovina@instagram.com', 'lovina.jpeg', 'Jl. Raya Singaraja, Temukus, Kecamatan Buleleng, Kaliasem, Kec. Banjar, Kabupaten Buleleng, Bali 80117', '+62 361 2943667', '09909888', '200000', 'Buleleng', 'ya'),
(35, 'Swing The Jungle', 'Selama penelitian Anda di Bali, Anda pasti akan menemukan gambar cantik seorang gadis yang berayun di ayunan dramatis di atas hutan tropis di pulau itu. Tidak hanya benar-benar layak untuk digambar, ini adalah pengalaman yang keren untuk memberi Anda sudut pandang Bali yang berbeda.Terletak di jantung pulau, ada banyak ayunan hutan di Bali untuk merasakan angin sepoi-sepoi di udara Anda, memompa darah Anda dan bersenang-senang. Lihat mereka!', 'Selama penelitian Anda di Bali, Anda pasti akan menemukan gambar cantik seorang gadis yang berayun di ayunan dramatis di atas hutan tropis di pulau itu.Tidak hanya benar-benar layak untuk digambar, ini adalah pengalaman yang keren untuk memberi Anda sudut pandang Bali yang berbeda.Terletak di jantung pulau, ada banyak ayunan hutan di Bali untuk merasakan angin sepoi-sepoi di udara Anda, memompa darah Anda dan bersenang-senang. Lihat mereka!', '09:00 - 17:00', '', 'thejungle@instagram.com', 'swing.jpg', 'Jl. Raya Tegallalang, Tegallalang, Kecamatan Ubud, Kabupaten Gianyar, Bali 80561', '+62 812-3884-13', '0033226767778', '175000', 'Ubud, Bali', 'ya'),
(36, 'Taman Ujung', 'Taman Ujung Karangasem dibangun oleh raja Karangasem I Gusti Bagus Jelantik, yang bergelar Anak Agung Agung Anglurah Ketut Karangasem. Pada awalnya luasnya hampir 400 hektare, tetapi sekarang hanya tinggal sekitar 10 hektare. Kebanyakan tanah tersebut sudah dibagikan kepada masyarakat pada masa land reform. Taman ini adalah milik pribadi keluarga Puri Karangasem. Namun pengunjung umum diperbolehkan mengunjunginya.\r\n\r\nTaman Ujung dibangun tahun 1909 atas prakarsa Anak Agung Anglurah. Arsiteknya adalah seorang Belanda bernama van Den Hentz dan seorang Cina bernama Loto Ang. Pembangunan ini juga melibatkan seorang undagi (arsitek adat Bali). Taman Ujung sebenarnya adalah pengembangan dari kolam Dirah yang telah dibangun tahun 1901. Pembangunan Taman Ujung selesai tahun 1921. Tahun 1937, Taman Ujung Karangasem diresmikan dengan sebuah prasasti marmer yang ditulisi naskah dalam aksara Latin dan Bali dan dua bahasa, Melayu dan Bali.', 'Taman Ujung atau Taman Sukasada, adalah sebuat taman di banjar Ujung, desa Tumbu, kecamatan Karangasem, Karangasem, Bali. Taman ini terletak sekitar 5 km di sebelah tenggara kota Amlapura. Pada masa Hindia Belanda tempat ini dikenal dengan nama Waterpaleis atau \"istana air\". Taman Ujung Karangasem dibangun oleh raja Karangasem I Gusti Bagus Jelantik, yang bergelar Anak Agung Agung Anglurah Ketut Karangasem. Pada awalnya luasnya hampir 400 hektare, tetapi sekarang hanya tinggal sekitar 10 hektare. Kebanyakan tanah tersebut sudah dibagikan kepada masyarakat pada masa land reform. Taman ini adalah milik pribadi keluarga Puri Karangasem. Namun pengunjung umum diperbolehkan mengunjunginya.', '09:00 - 16:00', '', 'tamanujung@instagram.com', 'tamanujung.jpeg', 'Taman Ujung 80811 Karangasem Bali', '+62 812-3884-13', '+62 363 4301563', '85000', 'Karangasem, Bali', 'ya'),
(37, 'Kebun Raya Bedugul ', 'Berawal dari gagasan Prof. Ir. Kusnoto Setyodiwiryo, Direktur Lembaga Pusat Penyelidikan Alam yang merangkap sebagai Kepala Kebun Raya Indonesia, dan I Made Taman, Kepala Lembaga Pelestarian dan Pengawetan Alam saat itu yang berkeinginan untuk mendirikan cabang Kebun Raya di luar Jawa, dalam hal ini Bali. Pendekatan kepada Pemda Bali dimulai tahun 1955, hingga akhirnya pada tahun 1958 pejabat yang berwenang di Bali secara resmi menawarkan kepada Lembaga Pusat Penyelidikan Alam untuk mendirikan Kebun Raya di Bali.\r\n\r\nBerdasarkan kesepakatan lokasi Kebun Raya ditetapkan seluas 50 ha yang meliputi areal hutan reboisasi Candikuning serta berbatasan langsung dengan Cagar Alam Batukau. Tepat pada tanggal 15 Juli 1959 Kebun Raya “Eka Karya” Bali diresmikan oleh Prof. Ir. Kusnoto Setyodiwiryo, Direktur Lembaga Pusat Penyelidikan Alam sebagai realisasi SK Kepala Daerah Tingkat I Bali tanggal 19 Januari 1959 No. 19/E.3/2/4.\r\n\r\nNama “ Eka Karya ” untuk Kebun Raya Bali diusulkan oleh I Made Taman. “ Eka ” berarti Satu dan “ Karya ” berarti Hasil Kerja . Jadi “ Eka Karya ” dapat diartikan sebagai Kebun Raya pertama yang merupakan hasil kerja bangsa Indonesia sendiri setelah Indonesia merdeka. Kebun raya ini dikhususkan untuk mengoleksi Gymnospermae (tumbuhan berdaun jarum) dari seluruh dunia karena jenis-jenis ini dapat tumbuh dengan baik di dalam kebun raya. Koleksi pertama banyak didatangkan dari Kebun Raya Bogor dan Kebun Raya Cibodas, antara lain Araucaria bidwillii, Cupresus sempervirens dan Pinus masoniana . Jenis lainnya yang merupakan tumbuhan asli daerah ini antara lain Podocarpus imbricatus dan Casuarina junghuhniana.\r\n\r\nSejak resmi berdiri, perkembangan Kebun Raya “Eka Karya” Bali selalu mengalami pasang surut dengan silih bergantinya pengelolaan, yaitu antara Dinas Kehutanan Propinsi Bali dan Kebun Raya sendiri. Pengelolaan Kebun Raya sempat dua kali dititipkan pada Dinas Kehutanan Propinsi Bali, yaitu pada 15 Juli 1959 – 16 Mei 1964 dan setelah peristiwa G 30 S/PKI (1966 – 1975). Pengelolaan kebun secara langsung oleh staf kebun raya dilakukan juga selama 2 periode, yakni sejak 16 Mei 1964 – Desember 1965 dan 1 April 1975 hingga sekarang.\r\n\r\nSejak tahun 1964 hingga saat ini, Kebun Raya “Eka Karya” Bali telah mengalami 11 kali pergantian kepemimpinan dengan berbagai pembaharuan. Di bawah kepemimpinan I Gede Ranten, B.Sc. (1975 – 1977), luas kebun raya bertambah hingga 129,2 ha. Perluasannya diresmikan oleh Ketua Lembaga Ilmu Pengetahuan Indonesia saat itu yaitu Prof. Dr. Ir. Tubagus Bachtiar Rifai pada tanggal 30 April 1976 yang ditandai dengan penanaman Chamae cyparis obtusa.\r\n\r\nDi bawah kepemimpinan Ir. Mustaid Siregar, M.Si (2001 – 2008) luas kebun raya bertambah lagi menjadi 157,5 ha. Meski pada awal berdirinya ditujukan untuk konservasi tumbuhan berdaun jarum (Gymnospermae), kini Kebun Raya yang berada di ketinggian 1.250 – 1.450 m dpl dengan suhu berkisar antara 18 - 20 °C dan kelembaban 70 – 90% ini berkembang menjadi kawasan konservasi ex-situ tumbuhan pegunungan tropika kawasan timur Indonesia. Statusnya saat ini adalah Unit Pelaksana Teknis Balai Konservasi Tumbuhan Kebun Raya “Eka Karya” Bali', 'Kebun Raya \"Eka Karya\" Bali atau kadang disebut Kebun Raya Bedugul adalah sebuah kebun botani terbesar di Indonesia[1] yang terletak di Desa Candikuning, Kecamatan Baturiti, Kabupaten Tabanan, Bali berjarak sekitar 60 km dari Denpasar. Kebun ini merupakan kebun raya pertama yang didirikan oleh putra bangsa Indonesia.[2] Pengelolaannya dilakukan oleh Lembaga Ilmu Pengetahuan Indonesia (LIPI) dan secara struktur organisasi berada di bawah pembinaan Pusat Konservasi Tumbuhan Kebun Raya Bogor. Kebun ini didirikan pada 15 Juli 1959. Pada awalnya Kebun Raya Eka Karya Bali hanya diperuntukkan bagi tetumbuhan runjung. Seiring dengan perkembangan dan perubahan status serta luas kawasannya, kebun yang berada pada ketinggian 1.250–1.450 m dpl ini kini menjadi kawasan konservasi ex-situ bagi tumbuhan pegunungan tropika Kawasan Timur Indonesia. Luas kawasan Kebun Raya semula hanya 50 ha, tetapi saat ini luas kebun raya menjadi 157,5 ha.', '09:00 - 19:00', '', 'bedugul@instagram.com', 'bedugul.jpeg', 'Jl. Kebun Raya Eka Karya, Candikuning 82191 Tabanan', '+62 368 2033211', '3634301563', '50000', 'Tabanan,Bali', 'ya'),
(38, ' Taman Edelweiss ', 'Taman Edelweis Bali merupakan objek wisata alam berupa taman dengan hamparan bunga-bunga yang indah di lereng Gunung Agung. Walaupun nama tempatnya mengandung nama Edelweis, namun bukan berarti terdapat tumbuhan tersebut. Melainkan hanyalah bunga yang sangat mirip dengan Edelweis. Masyarakat Bali menyebutnya Bunga Kasna.\r\n\r\nKarena kemiripan tersebutlah Bunga Kasna sering disebut sebagai Edelweis nya Bali. Bunga Edelweis sendiri merupakan bunga yang dilindungi dan siapapun dilarang mengambil dari habitatnya. Kabarnya, bunga kasna ini hanya ada di Bali saja.\r\n\r\nDulu pernah ada orang yang mencoba menanamnya di tempat lain. Namun, percobaannya mengalami kegagalan. Dengan adanya, bunga kasna di daerah terpencil menjadi daya tarik tersendiri dan mulai ramai wisatawan.\r\n\r\nSosok yang pertama kali menemukan hamparan bunga putih ini yaitu seorang pendaki yang sedang mampir ke Desa Temukus. Saat singgah, ia tidak sengaja menemukan kebun bunga yang indah ini. Ia kemudian memotretnya dan mengunggah ke akun sosial medianya. Semenjak itulah Taman Edelweis Bali mulai ramai wisatawan.', 'Taman Edelweis Bali merupakan objek wisata alam berupa taman dengan hamparan bunga-bunga yang indah di lereng Gunung Agung. Walaupun nama tempatnya mengandung nama Edelweis, namun bukan berarti terdapat tumbuhan tersebut. Melainkan hanyalah bunga yang sangat mirip dengan Edelweis. Masyarakat Bali menyebutnya Bunga Kasna.\r\nBali sebagai tempat wisata yang mendunia banyak menawarkan tempat untuk bersantai, bermain, refreshing, bahkan sekedar tempat berswa foto. Untuk itulah banyak tangan-tangan kreatif yang memanfaatkan potensi alam yang ada untuk digunakan sebagai objek wisata. Dan salah satunya yaitu Taman Edelweis di Desa Temukus, Bali. Tempat wisata alam Karangasem ini berada di kawasan kaki Gunung Agung. Sehingga akan menawarkan suasana alam yang spektakuler berpadu dengan udara sejuk khas pegunungan.', '09:00 - 17:00', '', ' TamanEdelweiss@instagram.com ', 'Edelweis-Garden.jpg', 'Jl. Raya Besakih 80863 Karangasem', '+62 823-4133-33', '3634301563009', '50000', 'Karangasem', 'ya'),
(39, 'Water Slide Lemukih', 'Untuk Anda yang senang berwisata dan menantang adrenalin, destinasi yang terletak di Bali utara ini wajib Anda kunjungi. Namanya Water Slide Lemukih. Pengunjung bisa merasakan sensasi meluncur di atas perosotan alami dengan air yang mengalir cukup deras dari perbukitan.\r\nWater Slide Lemukih terletak di Desa Lemukih, Kecamatan Sawan, Kabupaten Buleleng, Bali. Untuk sampai ke lokasi ini, traveler bisa berkendara menggunakan sepeda motor atau mobil sampai ke Desa Lemukih. Jaraknya sekitar 20 kilometer dari pusat Kota Singaraja atau menempuh waktu perjalanan sekitar 40 menit.\r\n\r\n\"Serunya Menjajal Perosotan Alami di Water Slide Lemukih\" selengkapnya \r\nTiba di Desa Lemukih, Anda harus melewati jalan setapak dan persawahan warga untuk bisa sampai di Water Slide Lemukih. Namun, jika Anda lihai mengendarai sepeda motor, Anda bisa mengendarainya hingga di parki \"Serunya Menjajal Perosotan Alami di Water Slide Lemukih\" selengkapnya ', 'Untuk Anda yang senang berwisata dan menantang adrenalin, destinasi yang terletak di Bali utara ini wajib Anda kunjungi. Namanya Water Slide Lemukih. Pengunjung bisa merasakan sensasi meluncur di atas perosotan alami dengan air yang mengalir cukup deras dari perbukitan.Water Slide Lemukih memiliki panjang jalur sekitar 20 meter dengan air yang mengalir di atas bebatuan. Sensasi meluncur di atas perosotan alami ini tidak kalah seru dengan perosotan modern yang bisa ditemukan di wahana wisata air buatan. ', '09:00 - 17:00', '', 'WaterSlide@instagram.com', 'lemukih.jpg', 'Lemukih, Kec. Sawan, Kabupaten Buleleng, Bali 81171', '082144326721', '36343015630112', '50000', 'Buleleng, Bali', 'ya'),
(40, 'Waterbom', 'Waterbom Bali, tempatnya seru-seruan! Ada 26 seluncuran kelas dunia berstandar internasional, lho, semua dikelilingi taman yang cantik banget dengan air mancur yang unik, semuanya bikin kita merasakan Bali dalam satu tempat.\r\n\r\nTaman bermain ini luas banget, kamu bisa coba berbagai macam perosotan yang memacu adrenalin, seperti Climax, Tailspin, Twin Racers, Fast N Fierce, Boomerang, dan masih banyak lagi! Selain itu, juga ada yang cocok buat keluarga, kalau pengen santai-santai, bisa naik ban pelampung di Lazy River sambil menikmati suasana hijau. Ada juga 5 tempat makan dengan hidangan berkualitas tinggi yang dibuat dari bahan lokal, lho. Bisa cicip koktail tropis di dua bar kolam renang atau nikmatin momen tenang di gazebo pribadi.\r\n\r\n\r\nWaterbom pun serius soal kepedulian lingkungan, mereka dapet penghargaan Grand Title Award for Sustainability and Social Responsibility di Pacific Asia Travel Association (PATA) Gold Awards 2023. Udah gitu, mereka juga dapet penghargaan Taman Air #1 di Asia di TripAdvisor Traveller’s Choice Awards 2023. Pasti seru banget deh berlibur di Bali bareng Waterbom!', 'Waterbom Bali, tempatnya seru-seruan! Ada 26 seluncuran kelas dunia berstandar internasional, lho, semua dikelilingi taman yang cantik banget dengan air mancur yang unik, semuanya bikin kita merasakan Bali dalam satu tempat.Bermain di Waterbom Bali tentu sangat menyenangkan. Ada banyak sekali wahana permainan yang bisa kamu pilih. Yuk cari tahu wahana di Waterbom Bali yang tidak boleh kamu lewatkan. Waterbom Bali, tempatnya seru-seruan! Ada 26 seluncuran kelas dunia berstandar internasional, lho, semua dikelilingi taman yang cantik banget dengan air mancur yang unik, semuanya bikin kita merasakan Bali dalam satu tempat. \r\n', '09:00 - 15:00', '', 'waterbom@instagram.com', 'waterbom-bali.jpg', 'Jl. Kartika Plaza, Tuban, Kec. Kuta, Kabupaten Badung, Bali 80361', '+62 361 755676', 'BCA 00332267645 a.n WATERBOOM BALI', '200000', 'Kuta, Bali', 'ya'),
(41, 'Ice Cream World Bali', 'merupakan objek wisata dengan spot foto yang sangat unik. Ice Cream World di Indonesia ada di beberapa kota seperti Yogyakarta dan Semarang. Tempat rekreasi yang sangat tepat bagi pengunjung yang menyukai es krim dan foto-foto. Karena, selain dapat menikmati es krim, di sini juga tersedia studio foto yang unik. Dimana ruangannya memiliki tema es krim dan warna – warna terang yang menarik. Dijamin, berada di sini tidak akan merasa bosan.Konsep tempat ini ini mengingatkan pada Museum of Ice Cream Amerika. Namun tentu saja, ada ciri khas dan keunikan tersendiri di sini.\r\n\r\nKonsepnya adalah keceriaan di saat memakan es krim. Ditambah lagi suasana musim panas yang ceria, menambah kesan semangat di studio foto. Terdapat setidaknya 8 spot foto keren dan unik sebagai spot foto di tempat ini. Pastikan, pengunjung mencoba semua spot foto ini karena dijamin akan seru.\r\nSalah satu spot foto favorit adalah spot cone es krim yang menggantung. Di sini, terdapat ruangan dengan banyak cone es krim yang digantung. Tentu saja, bukan cone es krim asli, melainkan buatan.\r\n\r\nCone es krim ini menjadi tempat lampu. Jadi, cone ini tidak hanya menggantung, tapi juga sebagai tempat lampu. Seolah – olah lampu ini adalah es krim gelato yang lezat. Ada lagi spot foto tema menggantung yang lain, yaitu pisang yang menggantung. Studio ini dipenuhi dengan buah pisang yang digantung, sehingga terlihat seperti hujan pisang. Pengunjung dapat berpose sambil memegang pisang – pisang yang menggantung ini. \r\nAtau bergaya seolah – olah sedang hujan pisang. Pisang ini menggambarkan buah musim panas, sehingga tepat dipasangkan dengan tema es krim. Selain itu, warna kuning dari pisang menambah ceria suasana.\r\n\r\nBerbicara mengenai musim panas, tidak lengkap rasanya jika tidak membicarakan pantai. Di sini terdapat studio dengan tema pantai.\r\n\r\nSpot Foto Pantai Penuh Keceriaan. Foto: Gmap/Andrea Pinkan\r\nSeluruh studio berlatar belakang biru laut yang menggambarkan pantai. Ditambah lagi pohon kelapa yang menambah kesan pantai di studio. Bahkan, pengunjung pun dapat berfoto dengan kacamata hitam seperti sedang berada di pantai.\r\n\r\nPengunjung yang ingin berfoto di studio dengan tema es krim, tenang saja. Karena, di sini pun terdapat studio dengan tema es krim stik.', 'merupakan objek wisata dengan spot foto yang sangat unik. Ice Cream World di Indonesia ada di beberapa kota seperti Yogyakarta dan Semarang. Tempat rekreasi yang sangat tepat bagi pengunjung yang menyukai es krim dan foto-foto. Karena, selain dapat menikmati es krim, di sini juga tersedia studio foto yang unik. Dimana ruangannya memiliki tema es krim dan warna – warna terang yang menarik. Dijamin, berada di sini tidak akan merasa bosan.Konsep tempat ini ini mengingatkan pada Museum of Ice Cream Amerika. Namun tentu saja, ada ciri khas dan keunikan tersendiri di sini. Cone es krim ini menjadi tempat lampu. ', '09:00 - 20:00', '', 'icecreamworldbali@instagram.co', 'icecream.jpeg', 'Jl. Bypass Ngurah Rai No.4, Pedungan, Denpasar Selatan, Kota Denpasar, Bali 80222', '08234788368', 'BCA 644885789 a.n ICE CREAM WORLD', '100000', 'Denpasar, Bali', 'tolak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_2` (`nama`);
ALTER TABLE `sponsorship` ADD FULLTEXT KEY `nama` (`nama`);
ALTER TABLE `sponsorship` ADD FULLTEXT KEY `telepon` (`telepon`);

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_hargatiket`
--
ALTER TABLE `tb_hargatiket`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indexes for table `tb_hargatiket_has_tb_pembayaran`
--
ALTER TABLE `tb_hargatiket_has_tb_pembayaran`
  ADD PRIMARY KEY (`tb_hargatiket_id_wisata`,`tb_pembayaran_id_pembayaran`),
  ADD KEY `fk_tb_hargatiket_has_tb_pembayaran_tb_pembayaran1_idx` (`tb_pembayaran_id_pembayaran`),
  ADD KEY `fk_tb_hargatiket_has_tb_pembayaran_tb_hargatiket1_idx` (`tb_hargatiket_id_wisata`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`,`id_user`),
  ADD KEY `fk_tb_pembayaran_tb_pengguna1_idx` (`id_user`);

--
-- Indexes for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD PRIMARY KEY (`id_user`,`id_wisata`),
  ADD KEY `fk_tb_pengguna_has_tb_tempatwisata_tb_tempatwisata1_idx` (`id_wisata`),
  ADD KEY `fk_tb_pengguna_has_tb_tempatwisata_tb_pengguna1_idx` (`id_user`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `tb_pesanan_ibfk_1` (`id_wisata`);

--
-- Indexes for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indexes for table `tb_sponsor`
--
ALTER TABLE `tb_sponsor`
  ADD PRIMARY KEY (`id_sponsor`) USING BTREE;

--
-- Indexes for table `tb_tempatwisata`
--
ALTER TABLE `tb_tempatwisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sponsorship`
--
ALTER TABLE `sponsorship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_sponsor`
--
ALTER TABLE `tb_sponsor`
  MODIFY `id_sponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_tempatwisata`
--
ALTER TABLE `tb_tempatwisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_hargatiket`
--
ALTER TABLE `tb_hargatiket`
  ADD CONSTRAINT `fk_tb_hargatiket_tb_tempatwisata` FOREIGN KEY (`id_wisata`) REFERENCES `tb_tempatwisata` (`id_wisata`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_hargatiket_has_tb_pembayaran`
--
ALTER TABLE `tb_hargatiket_has_tb_pembayaran`
  ADD CONSTRAINT `fk_tb_hargatiket_has_tb_pembayaran_tb_hargatiket1` FOREIGN KEY (`tb_hargatiket_id_wisata`) REFERENCES `tb_hargatiket` (`id_wisata`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_hargatiket_has_tb_pembayaran_tb_pembayaran1` FOREIGN KEY (`tb_pembayaran_id_pembayaran`) REFERENCES `tb_pembayaran` (`id_pembayaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `fk_tb_pembayaran_tb_pengguna1` FOREIGN KEY (`id_user`) REFERENCES `tb_pengguna` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD CONSTRAINT `fk_tb_pengguna_has_tb_tempatwisata_tb_pengguna1` FOREIGN KEY (`id_user`) REFERENCES `tb_pengguna` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_pengguna_has_tb_tempatwisata_tb_tempatwisata1` FOREIGN KEY (`id_wisata`) REFERENCES `tb_tempatwisata` (`id_wisata`) ON DELETE CASCADE;

--
-- Constraints for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `tb_tempatwisata` (`id_wisata`);

--
-- Constraints for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  ADD CONSTRAINT `tb_reviews_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `tb_tempatwisata` (`id_wisata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
