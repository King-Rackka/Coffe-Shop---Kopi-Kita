-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 14 Jun 2025 pada 12.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `jenis` enum('Kopi','Non-Kopi','Makanan','Dessert') NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `link_gambar` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `kategori` enum('spesial','biasa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis`, `deskripsi`, `link_gambar`, `harga`, `kategori`) VALUES
(1, 'Espresso', 'Kopi', 'Espresso adalah kopi hitam yang diseduh dengan tekanan tinggi. Rasanya kuat dan pahit, cocok untuk pecinta kopi sejati. Diminum dalam takaran kecil untuk kenikmatan maksimal.', 'espresso.jpg', 18000, 'biasa'),
(2, 'Cappuccino', 'Kopi', 'Cappuccino adalah campuran espresso, susu panas, dan busa susu. Cocok untuk pagi hari dengan rasa lembut dan creamy. Biasanya disajikan dalam cangkir keramik.', 'cappuccino.jpg', 22000, 'biasa'),
(3, 'Latte', 'Kopi', 'Latte terdiri dari espresso dan banyak susu panas dengan sedikit busa. Rasanya ringan dan cocok untuk pemula dalam dunia kopi. Dapat dinikmati panas atau dingin.', 'latte.jpg', 23000, 'spesial'),
(4, 'Americano', 'Kopi', 'Americano dibuat dengan menambahkan air panas ke espresso. Rasanya lebih ringan dibanding espresso tapi tetap kuat. Cocok untuk penikmat kopi yang suka rasa sederhana.', 'americano.jpg', 20000, 'biasa'),
(5, 'Mocha', 'Kopi', 'Mocha adalah perpaduan sempurna antara kopi, cokelat, dan susu. Rasanya manis dan creamy dengan sentuhan pahit kopi. Biasanya disajikan dengan topping whipped cream.', 'mocha.jpg', 25000, 'biasa'),
(6, 'Caramel Macchiato', 'Kopi', 'Caramel Macchiato memiliki kombinasi kopi espresso dan susu dengan sirup karamel. Memberikan rasa manis yang khas dan aroma yang menggoda. ', 'caramel_macchiato.jpg', 27000, 'spesial'),
(7, 'Vanilla Latte', 'Kopi', 'Vanilla Latte merupakan campuran espresso, susu, dan sirup vanila. Rasa manisnya pas dan tidak berlebihan. Sering dijadikan pilihan favorit di berbagai kafe.', 'vanilla_latte.jpg', 24000, 'biasa'),
(8, 'Hazelnut Coffee', 'Kopi', 'Hazelnut Coffee menyuguhkan aroma kacang hazelnut yang khas. Cocok bagi yang ingin sensasi kopi dengan rasa kacang. Disajikan hangat atau dingin sesuai selera.', 'hazelnut.jpg', 25000, 'biasa'),
(9, 'Kopi Susu Gula Aren', 'Kopi', 'Kopi Susu Gula Aren adalah minuman kekinian dengan rasa khas gula aren. Perpaduan antara pahitnya kopi dan manis alami. Disukai semua kalangan karena rasanya unik dan tradisional.', 'gula_aren.jpg', 21000, 'spesial'),
(10, 'Cold Brew', 'Kopi', 'Cold Brew dibuat dengan menyeduh kopi dalam air dingin selama berjam-jam. Hasilnya adalah kopi yang ringan dan tidak asam. Cocok dinikmati saat cuaca panas.', 'cold_brew.jpg', 23000, 'biasa'),
(11, 'Kopi Tubruk', 'Kopi', 'Kopi Tubruk adalah kopi tradisional khas Indonesia. Diseduh tanpa disaring, menghasilkan ampas di bawah cangkir. Rasanya kuat dan khas, cocok untuk penikmat kopi lokal.', 'tubruk.jpg', 15000, 'biasa'),
(12, 'Affogato', 'Kopi', 'Affogato adalah perpaduan unik antara kopi dan es krim. Espresso panas dituangkan di atas es krim vanila dingin. Memberikan sensasi panas dan dingin dalam satu sajian.', 'affogato.jpg', 26000, 'spesial'),
(13, 'Kopi Jahe', 'Kopi', 'Kopi Jahe menggabungkan pahitnya kopi dengan hangatnya jahe. Cocok untuk diminum saat cuaca dingin. Juga dipercaya bermanfaat untuk kesehatan tubuh.', 'kopi_jahe.jpg', 20000, 'biasa'),
(14, 'Kopi Avocado', 'Kopi', 'Kopi Avocado merupakan campuran unik antara alpukat dan espresso. Teksturnya kental dan rasanya manis legit. Menjadi favorit bagi pencinta kopi dengan cita rasa baru.', 'kopi_avocado.jpg', 27000, 'spesial'),
(15, 'Teh Tarik', 'Non-Kopi', 'Teh Tarik adalah minuman teh dengan susu yang diaduk dan ditarik. Rasanya lembut dan creamy, cocok dinikmati hangat. Populer di wilayah Asia Tenggara seperti Malaysia.', 'teh_tarik.jpg', 18000, 'biasa'),
(16, 'Thai Tea', 'Non-Kopi', 'Thai Tea adalah teh khas Thailand yang dicampur dengan susu dan rempah. Rasanya manis dengan aroma yang khas. Biasanya disajikan dingin dengan es batu.', 'thai_tea.jpg', 19000, 'spesial'),
(17, 'Nasi Goreng', 'Makanan', 'Nasi Goreng adalah sajian nasi yang digoreng dengan bumbu dan tambahan lauk. Cocok untuk menu sarapan atau makan malam. Bisa disajikan dengan telur, ayam, atau sosis.', 'nasi_goreng.jpg', 25000, 'biasa'),
(18, 'Roti Bakar Coklat', 'Makanan', 'Roti Bakar Coklat adalah camilan roti panggang dengan isian cokelat meleleh. Cocok untuk sarapan atau cemilan sore. Teksturnya renyah di luar dan lembut di dalam.', 'roti_bakar.jpg', 15000, 'biasa'),
(19, 'Brownies', 'Dessert', 'Brownies adalah kue panggang berbahan dasar cokelat yang padat dan lembut. Cocok untuk pecinta cokelat sejati. Bisa dinikmati dengan teh atau kopi.', 'brownies.jpg', 20000, 'biasa'),
(20, 'Cheesecake', 'Dessert', 'Cheesecake adalah kue lembut dengan lapisan keju di atasnya. Rasanya manis, creamy, dan sedikit asam. Sangat cocok sebagai hidangan penutup.', 'cheesecake.jpg', 22000, 'biasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `pesanan` varchar(100) NOT NULL,
  `status` enum('Belum','Terima') NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `total_bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `nama_pemesan`, `pesanan`, `status`, `tanggal`, `total_bayar`) VALUES
(11, 'raditya', 'Cappuccino 1, Cheesecake 2, Nasi Goreng 2', 'Terima', ' 8 June 2025', 116000),
(16, 'Kepin', 'Roti Bakar Coklat 3', 'Terima', '13 June 2025', 45000),
(17, 'Raziq Zidan', 'Americano 1, Caramel Macchiato 1, Kopi Susu Gula Aren 1, Kopi Tubruk 1, Roti Bakar Coklat 5', 'Belum', '14 June 2025', 158000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` varchar(150) NOT NULL,
  `rating` int(1) NOT NULL,
  `tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id_review`, `nama`, `email`, `komentar`, `rating`, `tanggal`) VALUES
(3, 'Raditya Meyka ', 'radityameyka5@gmail.com', 'Keren Banget Mas', 5, '3 June 2025'),
(8, 'Natasya Difta', 'difta@gmail.com', 'Keren banget asli', 5, ' 4 June 2025'),
(9, 'Alif Reza', 'alif@gmail.com', 'Makanan dan Minumannnya enak banget \r\n', 5, ' 7 June 2025'),
(22, 'Prabowo Subianto', 'bowo@gmail.com', 'Wah Mantab Kali ini', 5, '13 June 2025'),
(27, 'Mr. Zidan', 'zidan@gmail.com', 'Pelayanan dan kopinya mantab kali ', 5, '14 June 2025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `jabatan` enum('admin') NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `jabatan`, `nama`) VALUES
(1, 'admin@gmail.com', '123', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
