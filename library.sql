-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2025 at 08:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id_bookmark` varchar(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `id_buku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id_bookmark`, `id_siswa`, `id_buku`) VALUES
('1RHc1FkTC0iGuJVX4UUN', '10', '680c6ab078294'),
('BvzfrB3mNjJBETeAtrI2', '1', '1'),
('O8GtZuvywqpDHYDWBSF5', '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` varchar(20) NOT NULL,
  `guru_id` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `tingkatan` varchar(20) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `pdf` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `guru_id`, `judul`, `deskripsi`, `kategori`, `tingkatan`, `thumb`, `pdf`, `date`) VALUES
('1', '8feb3737-3b18-4e3b-9', 'Si Cemong Coak', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745643977.png', '1745643977.pdf', '2025-04-18'),
('680c6ab078294', '8feb3737-3b18-4e3b-9', 'Tidak Bisa Tidak', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745644208.png', '1745644208.pdf', '2025-04-26'),
('680c6aeb8d1e7', '8feb3737-3b18-4e3b-9', 'Nanti Saja', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745644267.png', '1745644267.pdf', '2025-04-26'),
('680c6b1e6fe07', '8feb3737-3b18-4e3b-9', 'Ini Atau Itu', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745644318.png', '1745644318.pdf', '2025-04-26'),
('680c8bc6c31a1', '8feb3737-3b18-4e3b-9', 'Coba Dulu Tora', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745652678.png', '1745652678.pdf', '2025-04-26'),
('680c8bf25a0cc', '8feb3737-3b18-4e3b-9', 'Putri Di Dalam Hutan', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745652722.png', '1745652722.pdf', '2025-04-26'),
('680c8c43dd1d7', '8feb3737-3b18-4e3b-9', 'Selamatkan Dirimu', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745652803.png', '1745652803.pdf', '2025-04-26'),
('680c8c6825a80', '8feb3737-3b18-4e3b-9', 'Rumah Vortel', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745652840.png', '1745652840.pdf', '2025-04-26'),
('680c8c953609f', '8feb3737-3b18-4e3b-9', 'Naik Naik Ke Puncak Bukit', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745652885.png', '1745652885.pdf', '2025-04-26'),
('680c8cb0588a1', '8feb3737-3b18-4e3b-9', 'Tiup Tiup', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745652912.png', '1745652912.pdf', '2025-04-26'),
('680c8d9fb0660', '8feb3737-3b18-4e3b-9', 'Biji Merah Luna', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745653151.png', '1745653151.pdf', '2025-04-26'),
('680c8dc8665ba', '8feb3737-3b18-4e3b-9', 'Aku Sudah Besar', 'Hai, anak-anakku sayang. Salam merdeka!\r\n Ini buku-buku hebat untuk kalian agar kalian semakin cinta \r\nmembaca. Berbagai tema yang dekat dengan dunia anak-anak \r\nIndonesia disajikan secara menarik. Kalian akan menemukan \r\ntokoh-tokoh cerita yang aktif bergerak, menjaga lingkungan, \r\nmemanfaatkan uang dengan bijak, serta menggunakan teknologi \r\ninformasi secara bertanggung jawab.', 'Buku Cerita', 'Umum', '1745653192.png', '1745653192.pdf', '2025-04-26'),
('680cc6dea1b57', '8feb3737-3b18-4e3b-9', 'Kunci jawaban', 'Kunci Jawaban', 'Kunci Jawaban', 'Umum', '1745667806.png', '1745667806.pdf', '2025-04-26'),
('6814820554126', '8feb3737-3b18-4e3b-9', 'Gambar Lucu Mika', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746174469.png', '1746174469.pdf', '2025-05-02'),
('681482374ae16', '8feb3737-3b18-4e3b-9', 'Karena Anggrek Ibu', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Kelas 1', '1746174519.png', '1746174519.pdf', '2025-05-02'),
('6814825b519a8', '8feb3737-3b18-4e3b-9', 'Apa Itu', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746174555.png', '1746174555.pdf', '2025-05-02'),
('6814828d35308', '8feb3737-3b18-4e3b-9', 'Namaku Kali', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746174605.png', '1746174605.pdf', '2025-05-02'),
('681482c0f205b', '8feb3737-3b18-4e3b-9', 'Dimana Kacang Sipet', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746174656.png', '1746174656.pdf', '2025-05-02'),
('681482e097c2a', '8feb3737-3b18-4e3b-9', 'Kue Kimu', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746174688.png', '1746174688.pdf', '2025-05-02'),
('68148312d0969', '8feb3737-3b18-4e3b-9', 'Pilus Rumput Laut Untuk Rasi', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746174738.png', '1746174738.pdf', '2025-05-02'),
('681483570a8fd', '8feb3737-3b18-4e3b-9', 'Begitu Saja Kok Repot', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746174807.png', '1746174807.pdf', '2025-05-02'),
('6814837aa9254', '8feb3737-3b18-4e3b-9', 'Gadis Rempah', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746174842.png', '1746174842.pdf', '2025-05-02'),
('681483b0b0678', '8feb3737-3b18-4e3b-9', 'Jagapati Bumi', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746174896.png', '1746174896.pdf', '2025-05-02'),
('6814841dcab7c', '8feb3737-3b18-4e3b-9', 'Kesatria Bumantara', 'Buku ini disiapkan oleh pemerintah dalam rangka pemenuhan pemenuhan kebutuhan \r\nbuku pendidikan yang bermutu, murah, dan merata sesuai dengan amanat dalam UU No. 3 \r\nTahun 2017. Buku ini disusun dan ditelaah oleh berbagai pihak di bawah koordinasi Kementerian \r\nPendidikan, Kebudayaan, Riset, dan Teknologi. Buku ini merupakan dokumen hidup yang senantiasa \r\ndiperbaiki, diperbarui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan \r\nzaman. Masukan dari berbagai kalangan yang dialamatkan kepada penulis atau melalui alamat \r\nsurel buku@kemdikbud.go.id', 'Komik', 'Umum', '1746175005.png', '1746175005.pdf', '2025-05-02'),
('681485a1e8c7a', '8feb3737-3b18-4e3b-9', 'Kesatria Penjaga', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746175393.png', '1746175393.pdf', '2025-05-02'),
('6814862e0af73', '8feb3737-3b18-4e3b-9', 'Layur Tetaplah Berlayar', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746175534.png', '1746175534.pdf', '2025-05-02'),
('68148651828cb', '8feb3737-3b18-4e3b-9', 'Mengejar Haruto', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746175569.png', '1746175569.pdf', '2025-05-02'),
('6814867dafecc', '8feb3737-3b18-4e3b-9', 'Misteri Drumben Tengah Malam', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746175613.png', '1746175613.pdf', '2025-05-02'),
('681486c20d2f4', '8feb3737-3b18-4e3b-9', 'Sekolah Untuk Timur', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746175682.png', '1746175682.pdf', '2025-05-02'),
('681486eed4850', '8feb3737-3b18-4e3b-9', 'Piring Bahagia Sibi', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746175726.png', '1746175726.pdf', '2025-05-02'),
('6814872784cdb', '8feb3737-3b18-4e3b-9', 'Yami Sinta Rio Aji', 'Buku ini disiapkan oleh Pemerintah dalam rangka pemenuhan kebutuhan buku \r\npendidikan yang bermutu, murah, dan merata sesuai dengan amanat dalam UU No. 3 Tahun 2017. \r\nBuku ini disusun dan ditelaah oleh berbagai pihak di bawah koordinasi Kementerian Pendidikan, \r\nKebudayaan, Riset, dan Teknologi. Buku ini merupakan dokumen hidup yang senantiasa \r\ndiperbaiki, diperbarui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan \r\nzaman. Masukan dari berbagai kalangan yang dialamatkan kepada penulis atau melalui alamat \r\nsurel buku@kemdikbud.go.id diharapkan dapat meningkatkan kualitas buku ini.', 'Komik', 'Umum', '1746175783.png', '1746175783.pdf', '2025-05-02'),
('6814874dd98ef', '8feb3737-3b18-4e3b-9', 'Vanya Dan Vino', 'Buku ini disiapkan oleh Pemerintah dalam rangka pemenuhan kebutuhan buku \r\npendidikan yang bermutu, murah, dan merata sesuai dengan amanat dalam UU No. 3 Tahun 2017. \r\nBuku ini disusun dan ditelaah oleh berbagai pihak di bawah koordinasi Kementerian Pendidikan, \r\nKebudayaan, Riset, dan Teknologi. Buku ini merupakan dokumen hidup yang senantiasa \r\ndiperbaiki, diperbarui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan \r\nzaman. Masukan dari berbagai kalangan yang dialamatkan kepada penulis atau melalui alamat \r\nsurel buku@kemdikbud.go.id diharapkan dapat meningkatkan kualitas buku ini.', 'Komik', 'Umum', '1746175821.png', '1746175821.pdf', '2025-05-02'),
('681487778f4a2', '8feb3737-3b18-4e3b-9', 'Warna Warni Anak Ondel', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746175863.png', '1746175863.pdf', '2025-05-02'),
('681487a722a1a', '8feb3737-3b18-4e3b-9', 'Misi Penyelamata Artha', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746175911.png', '1746175911.pdf', '2025-05-02'),
('681487cede225', '8feb3737-3b18-4e3b-9', 'Kita Dan Dominika', 'Hai, anak-anakku sayang. Salam merdeka!\r\nBuku-buku hebat ini dipersembahkan untuk kalian. \r\nKalian dapat menyimak atau membaca cerita-cerita yang \r\nmenarik di dalamnya. Buku-buku ini mengajak kalian untuk aktif bergerak, \r\nsenang berteman dan berbagi, serta belajar dari lingkungan sekitar. \r\nIlustrasi yang memukau juga akan membantu kalian memahami jalan cerita. \r\nSemoga kalian menyukai buku-buku ini dan makin gemar membaca. \r\nSelamat membaca!', 'Buku Cerita', 'Umum', '1746175950.png', '1746175950.pdf', '2025-05-02'),
('681488732df5c', '8feb3737-3b18-4e3b-9', 'Engglish For Young', 'Puji syukur kami panjatkan kehadirat Allah SWT yang telah \r\nmemberikan nikmat sehat dan sedikit ilmu pengetahuan, sehingga kami \r\ndapat menyusun materi ajar dalam bentuk modul pembelajaran bahasa \r\nInggris untuk anak-anak (English for Young Learners-EYL) untuk digunakan \r\noleh guru dan siswa pada jenjang Sekolah Dasar (SD), dan Sekolah Menengah \r\nPertama (SMP) pada mata pelajaran bahasa Inggris Level 1 dan Level 2.\r\nBahasa Inggris memegang peranan pentiing dalam komunikasi sehari-hari, \r\ntidak hanya bagi orang dewasa, tetapi juga bagi kalangan anak-anak sebagai \r\nbekal untuk tumbuh dan berkembang dalam menghadapi tantangan jaman. \r\nDengan demikian, bahasa Inggris sangat penting untuk diperkenalkan sejak \r\ndini pada usia anak-anak.', 'Buku Pelajaran', 'Kelas 2', '1746176115.jpg', '1746176115.pdf', '2025-05-02'),
('681488a153aa8', '8feb3737-3b18-4e3b-9', 'Jagoan Bahasa Inggris', 'Puji syukur kami panjatkan kehadirat Allah SWT yang telah \r\nmemberikan nikmat sehat dan sedikit ilmu pengetahuan, sehingga kami \r\ndapat menyusun materi ajar dalam bentuk modul pembelajaran bahasa \r\nInggris untuk anak-anak (English for Young Learners-EYL) untuk digunakan \r\noleh guru dan siswa pada jenjang Sekolah Dasar (SD), dan Sekolah Menengah \r\nPertama (SMP) pada mata pelajaran bahasa Inggris Level 1 dan Level 2.\r\nBahasa Inggris memegang peranan pentiing dalam komunikasi sehari-hari, \r\ntidak hanya bagi orang dewasa, tetapi juga bagi kalangan anak-anak sebagai \r\nbekal untuk tumbuh dan berkembang dalam menghadapi tantangan jaman. \r\nDengan demikian, bahasa Inggris sangat penting untuk diperkenalkan sejak \r\ndini pada usia anak-anak.', 'Buku Pelajaran', 'Kelas 1', '1746176161.jpg', '1746176161.pdf', '2025-05-02'),
('681488e5c66fe', '8feb3737-3b18-4e3b-9', 'Keluarga Indah', 'Keluarga indah yang bahagia', 'Komik', 'Umum', '1746176229.jpg', '1746176229.pdf', '2025-05-02'),
('681489416b04b', '8feb3737-3b18-4e3b-9', 'Anak Jujur Yang Hebat', 'Bercerita Tentang anak yang jujur dan hebat', 'Komik', 'Umum', '1746176321.jpg', '1746176321.pdf', '2025-05-02'),
('6814896f9e46a', '8feb3737-3b18-4e3b-9', 'Si Tupai Dan 3 Cerita Lain', 'Si Tupai Dan 3 Cerita Lain', 'Komik', 'Umum', '1746176367.jpg', '1746176367.pdf', '2025-05-02'),
('681489cb80261', '8feb3737-3b18-4e3b-9', 'Komik Perdagangan Satwa Liar', 'Bercerita Tentang Tata Cara Perdagangan Satwa Liar dan dampaknya untuk lingkungan', 'Komik', 'Umum', '1746176459.jpg', '1746176459.pdf', '2025-05-02'),
('681489fe910ea', '8feb3737-3b18-4e3b-9', 'Kebiasaan Mengubah Takdir', 'Orang Jualan Bakso', 'Komik', 'Umum', '1746176510.jpg', '1746176510.pdf', '2025-05-02'),
('68148a3ad7597', '8feb3737-3b18-4e3b-9', 'Sehari Satu Dongeng', 'Kumpulan Dongeng', 'Novel', 'Umum', '1746176570.jpg', '1746176570.pdf', '2025-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` varchar(20) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_buku`, `id_siswa`, `comment`, `date`) VALUES
('0Si4xyXbgxRqgT7qVvV3', '6814820554126', '8feb3737-3b18-4e3b-9', 'menarik', '2025-05-12'),
('2WdiD4eXtBf7lrcA3zCE', '6814820554126', '8feb3737-3b18-4e3b-9', 'p test', '2025-05-17'),
('ahzUZIsQmBdx023ceDqK', '1', '1', 'caritanya bagus banget', '2025-04-25'),
('f4clI7IiTLcxWXzaYoxn', '6814820554126', '8feb3737-3b18-4e3b-1', 'fist read', '2025-05-13'),
('hv5gahbsLMEtQEvXyaK8', '6814820554126', '8feb3737-3b18-4e3b-9', 'test', '2025-05-12'),
('TEXFl79K9vfQjSHYPHMH', '6814820554126', '1', 'test siswa', '2025-05-12'),
('VnTY1Bwm2LJAvkuAzXnD', '680c6ab078294', '10', 'bukunya bagus aku suka sekali', '2025-05-13'),
('YcpiExf6YkueBs7KCaxi', '1', '8feb3737-3b18-4e3b-9', 'pppppppppppppp', '2025-04-22'),
('YnxME5IWZ1F3dWBFhSUe', '1', '10', 'keren', '2025-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `counter_baca`
--

CREATE TABLE `counter_baca` (
  `id` varchar(20) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counter_baca`
--

INSERT INTO `counter_baca` (`id`, `id_buku`, `id_siswa`, `date`) VALUES
('680c5f9a3a35e', '1', '10', '2025-04-26'),
('680c5fa15283b', '1', '10', '2025-04-26'),
('680c610906d1e', '1', '10', '2025-04-26'),
('680c61518147e', '1', '10', '2025-04-26'),
('680c61536deb5', '1', '10', '2025-04-26'),
('680c63665d367', '1', '10', '2025-04-26'),
('680c6410db7fd', '1', '10', '2025-04-26'),
('680c64533aa2a', '1', '10', '2025-04-26'),
('680c6495be362', '1', '10', '2025-04-26'),
('680c6512e2155', '1', '10', '2025-04-26'),
('680c6a89c5825', '1', '10', '2025-04-26'),
('680c6fe3c555a', '680c6aeb8d1e7', '10', '2025-04-26'),
('680c75073eb62', '680c6ab078294', '10', '2025-04-26'),
('680c754f92230', '680c6ab078294', '10', '2025-04-26'),
('680c755b9c042', '1', '10', '2025-04-26'),
('680c75e39e1f3', '1', '10', '2025-04-26'),
('680c76a30dcc8', '1', '10', '2025-04-26'),
('680c76c6683c3', '1', '10', '2025-04-26'),
('680c76d874b2f', '1', '10', '2025-04-26'),
('680ca9563892b', '1', '10', '2025-04-26'),
('680ca95835bd9', '1', '10', '2025-04-26'),
('680ca95badcac', '1', '10', '2025-04-26'),
('680cac82be25f', '1', '10', '2025-04-26'),
('680cb07f68bc5', '1', '10', '2025-04-26'),
('680cb081d5b5b', '1', '10', '2025-04-26'),
('680cb08402c62', '1', '10', '2025-04-26'),
('680cb09a0af57', '1', '10', '2025-04-26'),
('680cb1b483683', '680c6ab078294', '10', '2025-04-26'),
('680cb1b7e1bf4', '680c6ab078294', '10', '2025-04-26'),
('680cb2a262403', '1', '1', '2025-04-26'),
('680cb2a600bbe', '1', '1', '2025-04-26'),
('680cb2a701c7f', '1', '1', '2025-04-26'),
('680cb2af3647b', '1', '1', '2025-04-26'),
('680cb6a3326e6', '680c6ab078294', '1', '2025-04-26'),
('680cb6fa3b77f', '680c6aeb8d1e7', '1', '2025-04-26'),
('680cb70288cd1', '1', '1', '2025-04-26'),
('680cb8bbd3a71', '1', '1', '2025-04-26'),
('680cb8d525d4b', '1', '1', '2025-04-26'),
('680cb98311fe5', '1', '1', '2025-04-26'),
('680cb99054bf4', '1', '1', '2025-04-26'),
('680cb9c2e6608', '1', '1', '2025-04-26'),
('680cb9cf736c8', '1', '1', '2025-04-26'),
('680cb9ddb5b70', '1', '1', '2025-04-26'),
('680cb9ee03ad5', '1', '1', '2025-04-26'),
('680cc7bee6ead', '680c8c43dd1d7', '1', '2025-04-26'),
('680cc7c1ce346', '680c8c43dd1d7', '1', '2025-04-26'),
('680cc9324a377', '680c8c43dd1d7', '1', '2025-04-26'),
('680cc94a0ab97', '680c8c43dd1d7', '1', '2025-04-26'),
('680db0ba6bd82', '1', '1', '2025-04-27'),
('680db0c1cc38c', '1', '1', '2025-04-27'),
('680db0c3d3c86', '1', '1', '2025-04-27'),
('680db0c5e3b50', '1', '1', '2025-04-27'),
('680db0c75bcb6', '1', '1', '2025-04-27'),
('680db0cb96533', '1', '1', '2025-04-27'),
('680db0cc9901a', '1', '1', '2025-04-27'),
('680db0cdef088', '1', '1', '2025-04-27'),
('680db0cf6c9a9', '1', '1', '2025-04-27'),
('680db0d40d9a4', '1', '1', '2025-04-27'),
('680db0d5a391c', '1', '1', '2025-04-27'),
('680db2485c33d', '680c6aeb8d1e7', '1', '2025-04-27'),
('680db24c90227', '680c8c953609f', '1', '2025-04-27'),
('680db2508e3dd', '680c6aeb8d1e7', '1', '2025-04-27'),
('680db25412c9f', '680c8c6825a80', '1', '2025-04-27'),
('680db26084e62', '680c8c953609f', '1', '2025-04-27'),
('680db262130f1', '680c8c6825a80', '1', '2025-04-27'),
('680db263383e6', '680c8c43dd1d7', '1', '2025-04-27'),
('680db264707fd', '680c8bf25a0cc', '1', '2025-04-27'),
('680db2663fd1a', '680c8bc6c31a1', '1', '2025-04-27'),
('680db2678da6e', '680c6b1e6fe07', '1', '2025-04-27'),
('680db26a4ffc3', '1', '1', '2025-04-27'),
('680db26be2ca3', '680c8cb0588a1', '1', '2025-04-27'),
('680db26d08d7c', '680c8d9fb0660', '1', '2025-04-27'),
('680de2f48cfe0', '1', '1', '2025-04-27'),
('680dec6b78b55', '680c6aeb8d1e7', '1', '2025-04-27'),
('680dec72c8a06', '680c6aeb8d1e7', '1', '2025-04-27'),
('68102300d26df', '1', '4', '2025-04-29'),
('681023031a386', '680c6aeb8d1e7', '4', '2025-04-29'),
('681023045e234', '680c6ab078294', '4', '2025-04-29'),
('681023059daea', '680c8c43dd1d7', '4', '2025-04-29'),
('68102306c3c46', '680c8bc6c31a1', '4', '2025-04-29'),
('68102307e50f9', '680c6b1e6fe07', '4', '2025-04-29'),
('68102309115a1', '680c6aeb8d1e7', '4', '2025-04-29'),
('6810230a1f5fa', '680c6ab078294', '4', '2025-04-29'),
('6810230c61ce3', '680c6ab078294', '4', '2025-04-29'),
('6810230d91801', '680c6ab078294', '4', '2025-04-29'),
('6810230e7adee', '680c6ab078294', '4', '2025-04-29'),
('681023107a914', '680c6ab078294', '4', '2025-04-29'),
('6810231306438', '680c6ab078294', '4', '2025-04-29'),
('681023152c0a7', '680c6ab078294', '4', '2025-04-29'),
('68102319da832', '1', '4', '2025-04-29'),
('6810231c8f7ec', '1', '4', '2025-04-29'),
('68102b61023cc', '1', '4', '2025-04-29'),
('68130daf4ffe7', '1', '1', '2025-05-01'),
('681324604f727', '680c8dc8665ba', '1', '2025-05-01'),
('6813247880437', '680c8c43dd1d7', '1', '2025-05-01'),
('68132479d5286', '680c8c6825a80', '1', '2025-05-01'),
('6813247b1a71a', '680c8c953609f', '1', '2025-05-01'),
('6813247e7d899', '680c8cb0588a1', '1', '2025-05-01'),
('6813247f96376', '680c8d9fb0660', '1', '2025-05-01'),
('681324814c893', '680c8dc8665ba', '1', '2025-05-01'),
('681324827bba5', '1', '1', '2025-05-01'),
('68132485eb5e3', '680c6ab078294', '1', '2025-05-01'),
('68132487018f5', '680c6aeb8d1e7', '1', '2025-05-01'),
('6813248800937', '680c6b1e6fe07', '1', '2025-05-01'),
('68132489355c2', '680c8bc6c31a1', '1', '2025-05-01'),
('681325b4f19a4', '680c6ab078294', '18', '2025-05-01'),
('681325b7ca24d', '680c6ab078294', '18', '2025-05-01'),
('681863b034672', '68148312d0969', '1', '2025-05-05'),
('681c7797c5658', '68148651828cb', '1', '2025-05-08'),
('681e4305f29c7', '6814820554126', '1', '2025-05-09'),
('681e4309cb0ea', '6814820554126', '1', '2025-05-09'),
('681e4953e221c', '1', '1', '2025-05-09'),
('681e49bbcc23c', '681482c0f205b', '1', '2025-05-09'),
('681e49c14c67d', '681482c0f205b', '1', '2025-05-09'),
('681e49fe77a64', '681482c0f205b', '1', '2025-05-09'),
('681e4a53a9962', '681482c0f205b', '1', '2025-05-09'),
('681e4ac7a3710', '681482c0f205b', '1', '2025-05-09'),
('681e545400599', '1', '1', '2025-05-09'),
('681e545be74c2', '1', '1', '2025-05-09'),
('681e54c41434b', '1', '1', '2025-05-09'),
('681e554ca5ded', '1', '1', '2025-05-09'),
('681eac842458a', '1', '1', '2025-05-10'),
('681eb666b1a15', '6814820554126', '1', '2025-05-10'),
('68226e7e99460', '6814820554126', '1', '2025-05-12'),
('68226e88155fe', '6814820554126', '1', '2025-05-12'),
('68227055184a7', '6814820554126', '1', '2025-05-12'),
('6822708ce8da7', '6814820554126', '1', '2025-05-12'),
('682270c4ce472', '6814820554126', '1', '2025-05-12'),
('682270e6bc991', '6814820554126', '1', '2025-05-12'),
('6822daec78d5e', '680c6ab078294', '11', '2025-05-13'),
('6822daee8d0d1', '681482374ae16', '11', '2025-05-13'),
('6822daf049398', '6814828d35308', '11', '2025-05-13'),
('6822daf2017c6', '68148312d0969', '11', '2025-05-13'),
('6822daf3970fe', '681482c0f205b', '11', '2025-05-13'),
('6822daf597dbd', '681482e097c2a', '11', '2025-05-13'),
('6822db0b8a8be', '680c6ab078294', '12', '2025-05-13'),
('6822db0d33d0d', '1', '12', '2025-05-13'),
('6822db0ee4d68', '680c6aeb8d1e7', '12', '2025-05-13'),
('6822db10af7a3', '6814820554126', '12', '2025-05-13'),
('6822db13239b1', '6814828d35308', '12', '2025-05-13'),
('6822db14cb4b9', '6814825b519a8', '12', '2025-05-13'),
('6822db163994d', '681482374ae16', '12', '2025-05-13'),
('6822db17df990', '6814820554126', '12', '2025-05-13'),
('6822db2cdf386', '1', '13', '2025-05-13'),
('6822db2e8aa64', '680c6ab078294', '13', '2025-05-13'),
('6822db3009d6c', '6814820554126', '13', '2025-05-13'),
('6822db3166802', '680c6aeb8d1e7', '13', '2025-05-13'),
('6822db3393fb6', '6814828d35308', '13', '2025-05-13'),
('6822db352b53e', '6814825b519a8', '13', '2025-05-13'),
('6822db3706dfc', '681482374ae16', '13', '2025-05-13'),
('6822db38c0095', '6814820554126', '13', '2025-05-13'),
('6822db3aae273', '681482c0f205b', '13', '2025-05-13'),
('6822db3bef1b3', '681482e097c2a', '13', '2025-05-13'),
('6822db3db7fe5', '68148312d0969', '13', '2025-05-13'),
('6822db3f5b2ae', '68148312d0969', '13', '2025-05-13'),
('6822db4310e08', '68148312d0969', '13', '2025-05-13'),
('6822db43e2ab4', '68148312d0969', '13', '2025-05-13'),
('6822db463b77d', '68148312d0969', '13', '2025-05-13'),
('6822db478276f', '68148312d0969', '13', '2025-05-13'),
('6822db487288c', '68148312d0969', '13', '2025-05-13'),
('6822db4932c4b', '68148312d0969', '13', '2025-05-13'),
('6822db4a0dee1', '68148312d0969', '13', '2025-05-13'),
('6822db4ab381b', '68148312d0969', '13', '2025-05-13'),
('6822db604974d', '1', '14', '2025-05-13'),
('6822db6356847', '6814820554126', '14', '2025-05-13'),
('6822db65455c4', '6814820554126', '14', '2025-05-13'),
('6822db6798ca1', '6814820554126', '14', '2025-05-13'),
('6822db69d7718', '680c6ab078294', '14', '2025-05-13'),
('6822db6bc915b', '680c6ab078294', '14', '2025-05-13'),
('6822db6cad9a9', '680c6ab078294', '14', '2025-05-13'),
('6822db6d9efa3', '680c6ab078294', '14', '2025-05-13'),
('6822db6e50511', '680c6ab078294', '14', '2025-05-13'),
('6822db708eb1f', '680c6ab078294', '14', '2025-05-13'),
('6822db71ad119', '680c6ab078294', '14', '2025-05-13'),
('6822db728b6e9', '680c6ab078294', '14', '2025-05-13'),
('6822fce6456eb', '68148312d0969', '1', '2025-05-13'),
('68230a4c02c28', '1', '1', '2025-05-13'),
('68230a561d789', '1', '1', '2025-05-13'),
('68230b55e788c', '1', '10', '2025-05-13'),
('68230b5a2ba8b', '1', '10', '2025-05-13'),
('68230b76a11c9', '1', '10', '2025-05-13'),
('68230bb2ae875', '1', '10', '2025-05-13'),
('68230c4c6423a', '680c6ab078294', '10', '2025-05-13'),
('68230c67c0222', '680c6ab078294', '10', '2025-05-13'),
('68230c7199639', '680c6ab078294', '10', '2025-05-13'),
('68230c7c5a21d', '680c6ab078294', '10', '2025-05-13'),
('68230c813a8fc', '680c6ab078294', '10', '2025-05-13'),
('68230c8d58277', '680c6ab078294', '10', '2025-05-13'),
('68257b9118d00', '680c6ab078294', '1', '2025-05-15'),
('68259a6c7ca82', '6814820554126', '1', '2025-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `counter_baca_guru`
--

CREATE TABLE `counter_baca_guru` (
  `id` varchar(20) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `id_guru` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counter_baca_guru`
--

INSERT INTO `counter_baca_guru` (`id`, `id_buku`, `id_guru`, `date`) VALUES
('6822667737a1f', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-12'),
('682266795921a', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-12'),
('68226697a7600', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-12'),
('682266e029838', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-12'),
('6822672ca6f49', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-12'),
('68226f5526fdd', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-12'),
('6822709cbf873', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-12'),
('68230ab120feb', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-13'),
('68230abe4bea0', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-13'),
('68230ac86ea3f', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-13'),
('68230d0017cc7', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-13'),
('68230d188034d', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-13'),
('68259a8c1abe1', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-15'),
('6828221fa618c', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-17'),
('682826712e2c7', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-17'),
('682829756f4e4', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-17'),
('6828299f6f1bc', '6814820554126', '8feb3737-3b18-4e3b-1', '2025-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `mengampu` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `mengampu`, `email`, `password`, `image`, `role`) VALUES
('8feb3737-3b18-4e3b-1', 'yuli S.p.d', 'Kelas 4', 'miyakoaihara@gmail.com', '$2y$12$qcw3ZBYDG9AJ1GduYe9kLepJyLu1jRSyx/KB.MxlJMlNGkB53ZPA2', '1746814620.jpg', 'guru'),
('8feb3737-3b18-4e3b-9', 'Siti S.p.d', 'admin', 'pramudyakun@gmail.com', '$2y$12$qcw3ZBYDG9AJ1GduYe9kLepJyLu1jRSyx/KB.MxlJMlNGkB53ZPA2', '681e46a587bdf.jpeg', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id` varchar(20) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id`, `id_buku`, `id_siswa`, `date`) VALUES
('680c610908c09', '1', '10', '2025-04-26'),
('680c615182be5', '1', '10', '2025-04-26'),
('680c61536f27b', '1', '10', '2025-04-26'),
('680c63665e832', '1', '10', '2025-04-26'),
('680c6410dceee', '1', '10', '2025-04-26'),
('680c64533bec7', '1', '10', '2025-04-26'),
('680c6495c0926', '1', '10', '2025-04-26'),
('680c6512e377b', '1', '10', '2025-04-26'),
('680c6a89c740e', '1', '10', '2025-04-26'),
('680c6fe3c6ab2', '680c6aeb8d1e7', '10', '2025-04-26'),
('680c750740136', '680c6ab078294', '10', '2025-04-26'),
('680c754f93a44', '680c6ab078294', '10', '2025-04-26'),
('680c755b9dcd5', '1', '10', '2025-04-26'),
('680c75e3a0007', '1', '10', '2025-04-26'),
('680c76a30f44f', '1', '10', '2025-04-26'),
('680c76c66a605', '1', '10', '2025-04-26'),
('680c76d876079', '1', '10', '2025-04-26'),
('680ca95639ff2', '1', '10', '2025-04-26'),
('680ca958377d8', '1', '10', '2025-04-26'),
('680ca95baf2af', '1', '10', '2025-04-26'),
('680cac82c0105', '1', '10', '2025-04-26'),
('680cb07f6a466', '1', '10', '2025-04-26'),
('680cb081d70ca', '1', '10', '2025-04-26'),
('680cb084057e6', '1', '10', '2025-04-26'),
('680cb09a0ce28', '1', '10', '2025-04-26'),
('680cb1b485d04', '680c6ab078294', '10', '2025-04-26'),
('680cb1b7e4468', '680c6ab078294', '10', '2025-04-26'),
('680cb2a2639d7', '1', '1', '2025-04-26'),
('680cb2a601ebf', '1', '1', '2025-04-26'),
('680cb2a702ecd', '1', '1', '2025-04-26'),
('680cb2af37ae8', '1', '1', '2025-04-26'),
('680cb6a334062', '680c6ab078294', '1', '2025-04-26'),
('680cb6fa3d15f', '680c6aeb8d1e7', '1', '2025-04-26'),
('680cb7028aa08', '1', '1', '2025-04-26'),
('680cb8bbd51c2', '1', '1', '2025-04-26'),
('680cb8d527111', '1', '1', '2025-04-26'),
('680cb983139f3', '1', '1', '2025-04-26'),
('680cb99056042', '1', '1', '2025-04-26'),
('680cb9c2e79dd', '1', '1', '2025-04-26'),
('680cb9cf74c6b', '1', '1', '2025-04-26'),
('680cb9ddb75e6', '1', '1', '2025-04-26'),
('680cb9ee05268', '1', '1', '2025-04-26'),
('680cc7bee8511', '680c8c43dd1d7', '1', '2025-04-26'),
('680cc7c1cf939', '680c8c43dd1d7', '1', '2025-04-26'),
('680cc9324bc87', '680c8c43dd1d7', '1', '2025-04-26'),
('680cc94a0c1c8', '680c8c43dd1d7', '1', '2025-04-26'),
('680db0ba75ff1', '1', '1', '2025-04-27'),
('680db0c1ce508', '1', '1', '2025-04-27'),
('680db0c3d5b43', '1', '1', '2025-04-27'),
('680db0c5e511f', '1', '1', '2025-04-27'),
('680db0c75dbc1', '1', '1', '2025-04-27'),
('680db0cb97a35', '1', '1', '2025-04-27'),
('680db0cc9a54f', '1', '1', '2025-04-27'),
('680db0cdf0b07', '1', '1', '2025-04-27'),
('680db0cf6e8ce', '1', '1', '2025-04-27'),
('680db0d40ed78', '1', '1', '2025-04-27'),
('680db0d5a4f4e', '1', '1', '2025-04-27'),
('680db2485f681', '680c6aeb8d1e7', '1', '2025-04-27'),
('680db24c918c8', '680c8c953609f', '1', '2025-04-27'),
('680db25091555', '680c6aeb8d1e7', '1', '2025-04-27'),
('680db25415964', '680c8c6825a80', '1', '2025-04-27'),
('680db26086352', '680c8c953609f', '1', '2025-04-27'),
('680db2621450d', '680c8c6825a80', '1', '2025-04-27'),
('680db2633a405', '680c8c43dd1d7', '1', '2025-04-27'),
('680db26471b7a', '680c8bf25a0cc', '1', '2025-04-27'),
('680db26641e47', '680c8bc6c31a1', '1', '2025-04-27'),
('680db2678f2bd', '680c6b1e6fe07', '1', '2025-04-27'),
('680db26a51af9', '1', '1', '2025-04-27'),
('680db26be41ca', '680c8cb0588a1', '1', '2025-04-27'),
('680db26d0a8e7', '680c8d9fb0660', '1', '2025-04-27'),
('680de2f48ee52', '1', '1', '2025-04-27'),
('680dec6b7ac93', '680c6aeb8d1e7', '1', '2025-04-27'),
('680dec72c9fb1', '680c6aeb8d1e7', '1', '2025-04-27'),
('68102300d3ec1', '1', '4', '2025-04-29'),
('681023031d3fe', '680c6aeb8d1e7', '4', '2025-04-29'),
('681023045f5f1', '680c6ab078294', '4', '2025-04-29'),
('681023059f0c6', '680c8c43dd1d7', '4', '2025-04-29'),
('68102306c5194', '680c8bc6c31a1', '4', '2025-04-29'),
('68102307e6647', '680c6b1e6fe07', '4', '2025-04-29'),
('6810230913aba', '680c6aeb8d1e7', '4', '2025-04-29'),
('6810230a20b1f', '680c6ab078294', '4', '2025-04-29'),
('6810230c630dc', '680c6ab078294', '4', '2025-04-29'),
('6810230d92cca', '680c6ab078294', '4', '2025-04-29'),
('6810230e7c211', '680c6ab078294', '4', '2025-04-29'),
('681023107bd68', '680c6ab078294', '4', '2025-04-29'),
('68102313078bd', '680c6ab078294', '4', '2025-04-29'),
('681023152d479', '680c6ab078294', '4', '2025-04-29'),
('68102319dbf18', '1', '4', '2025-04-29'),
('6810231c90b53', '1', '4', '2025-04-29'),
('68102b6104444', '1', '4', '2025-04-29'),
('68130daf519fe', '1', '1', '2025-05-01'),
('6813246050ded', '680c8dc8665ba', '1', '2025-05-01'),
('6813247881b0e', '680c8c43dd1d7', '1', '2025-05-01'),
('68132479d6cbb', '680c8c6825a80', '1', '2025-05-01'),
('6813247b1bf48', '680c8c953609f', '1', '2025-05-01'),
('6813247e7feef', '680c8cb0588a1', '1', '2025-05-01'),
('6813247f97963', '680c8d9fb0660', '1', '2025-05-01'),
('681324814e108', '680c8dc8665ba', '1', '2025-05-01'),
('681324827d2a6', '1', '1', '2025-05-01'),
('68132485ece2b', '680c6ab078294', '1', '2025-05-01'),
('6813248702f00', '680c6aeb8d1e7', '1', '2025-05-01'),
('68132488021f0', '680c6b1e6fe07', '1', '2025-05-01'),
('6813248936a19', '680c8bc6c31a1', '1', '2025-05-01'),
('681325b4f2fe4', '680c6ab078294', '18', '2025-05-01'),
('681325b7cb61f', '680c6ab078294', '18', '2025-05-01'),
('681863b04c2b3', '68148312d0969', '1', '2025-05-05'),
('681c7797e5821', '68148651828cb', '1', '2025-05-08'),
('681e430609aff', '6814820554126', '1', '2025-05-09'),
('681e4309ce0ef', '6814820554126', '1', '2025-05-09'),
('681e4953e3625', '1', '1', '2025-05-09'),
('681e49bbcd81a', '681482c0f205b', '1', '2025-05-09'),
('681e49c14de58', '681482c0f205b', '1', '2025-05-09'),
('681e49fe79722', '681482c0f205b', '1', '2025-05-09'),
('681e4a53ab601', '681482c0f205b', '1', '2025-05-09'),
('681e4ac7a57e4', '681482c0f205b', '1', '2025-05-09'),
('681e545401d61', '1', '1', '2025-05-09'),
('681e545be87c6', '1', '1', '2025-05-09'),
('681e54c415b76', '1', '1', '2025-05-09'),
('681e554ca88f0', '1', '1', '2025-05-09'),
('681eac8429826', '1', '1', '2025-05-10'),
('681eb666dfda2', '6814820554126', '1', '2025-05-10'),
('68226e7e9ae21', '6814820554126', '1', '2025-05-12'),
('68226e88167fe', '6814820554126', '1', '2025-05-12'),
('682270551a2ac', '6814820554126', '1', '2025-05-12'),
('6822708cea318', '6814820554126', '1', '2025-05-12'),
('682270c4cfa43', '6814820554126', '1', '2025-05-12'),
('682270e6becfb', '6814820554126', '1', '2025-05-12'),
('6822daec7ada2', '680c6ab078294', '11', '2025-05-13'),
('6822daee8f154', '681482374ae16', '11', '2025-05-13'),
('6822daf04dc01', '6814828d35308', '11', '2025-05-13'),
('6822daf203975', '68148312d0969', '11', '2025-05-13'),
('6822daf39a0fe', '681482c0f205b', '11', '2025-05-13'),
('6822daf599836', '681482e097c2a', '11', '2025-05-13'),
('6822db0b8c337', '680c6ab078294', '12', '2025-05-13'),
('6822db0d3664a', '1', '12', '2025-05-13'),
('6822db0ee7809', '680c6aeb8d1e7', '12', '2025-05-13'),
('6822db10b1b41', '6814820554126', '12', '2025-05-13'),
('6822db1325529', '6814828d35308', '12', '2025-05-13'),
('6822db14cddc0', '6814825b519a8', '12', '2025-05-13'),
('6822db163b31b', '681482374ae16', '12', '2025-05-13'),
('6822db17e1be0', '6814820554126', '12', '2025-05-13'),
('6822db2ce298a', '1', '13', '2025-05-13'),
('6822db2e8df80', '680c6ab078294', '13', '2025-05-13'),
('6822db300c945', '6814820554126', '13', '2025-05-13'),
('6822db316830b', '680c6aeb8d1e7', '13', '2025-05-13'),
('6822db3395543', '6814828d35308', '13', '2025-05-13'),
('6822db352d655', '6814825b519a8', '13', '2025-05-13'),
('6822db3708d18', '681482374ae16', '13', '2025-05-13'),
('6822db38c25b1', '6814820554126', '13', '2025-05-13'),
('6822db3aafca6', '681482c0f205b', '13', '2025-05-13'),
('6822db3bf21d8', '681482e097c2a', '13', '2025-05-13'),
('6822db3db9e08', '68148312d0969', '13', '2025-05-13'),
('6822db3f5cbfc', '68148312d0969', '13', '2025-05-13'),
('6822db4312fd5', '68148312d0969', '13', '2025-05-13'),
('6822db43e45d5', '68148312d0969', '13', '2025-05-13'),
('6822db463d844', '68148312d0969', '13', '2025-05-13'),
('6822db4787000', '68148312d0969', '13', '2025-05-13'),
('6822db4874b20', '68148312d0969', '13', '2025-05-13'),
('6822db4935f29', '68148312d0969', '13', '2025-05-13'),
('6822db4a117e5', '68148312d0969', '13', '2025-05-13'),
('6822db4ab63ef', '68148312d0969', '13', '2025-05-13'),
('6822db604c188', '1', '14', '2025-05-13'),
('6822db6358110', '6814820554126', '14', '2025-05-13'),
('6822db6547270', '6814820554126', '14', '2025-05-13'),
('6822db679a74c', '6814820554126', '14', '2025-05-13'),
('6822db69d8e3e', '680c6ab078294', '14', '2025-05-13'),
('6822db6bcb0d8', '680c6ab078294', '14', '2025-05-13'),
('6822db6caf987', '680c6ab078294', '14', '2025-05-13'),
('6822db6da1204', '680c6ab078294', '14', '2025-05-13'),
('6822db6e52bfe', '680c6ab078294', '14', '2025-05-13'),
('6822db70906e6', '680c6ab078294', '14', '2025-05-13'),
('6822db71aeb4a', '680c6ab078294', '14', '2025-05-13'),
('6822db728d74e', '680c6ab078294', '14', '2025-05-13'),
('6822fce647177', '68148312d0969', '1', '2025-05-13'),
('68230a4c052c9', '1', '1', '2025-05-13'),
('68230a561fde3', '1', '1', '2025-05-13'),
('68230b55e8e2c', '1', '10', '2025-05-13'),
('68230b5a2d06d', '1', '10', '2025-05-13'),
('68230b76a2a2f', '1', '10', '2025-05-13'),
('68230bb2afe62', '1', '10', '2025-05-13'),
('68230c4c65c03', '680c6ab078294', '10', '2025-05-13'),
('68230c67c1b92', '680c6ab078294', '10', '2025-05-13'),
('68230c719b1af', '680c6ab078294', '10', '2025-05-13'),
('68230c7c5b65a', '680c6ab078294', '10', '2025-05-13'),
('68230c813c6fe', '680c6ab078294', '10', '2025-05-13'),
('68230c8d59a69', '680c6ab078294', '10', '2025-05-13'),
('68257b9123e21', '680c6ab078294', '1', '2025-05-15'),
('68259a6c7e276', '6814820554126', '1', '2025-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_siswa` varchar(20) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `rating` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_siswa`, `id_buku`, `rating`) VALUES
('10', '1', '5'),
('10', '680c6ab078294', '5'),
('1', '1', '5'),
('1', '680c8c43dd1d7', '5'),
('1', '680c6aeb8d1e7', '5'),
('4', '680c6ab078294', '5'),
('4', '1', '5'),
('18', '680c6ab078294', '5'),
('1', '6814820554126', '5');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('g1YeR5kmRLANh1FERZ3KQNp9YclBCy44qtjJrJKQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUNkN3lPTlBZbjhnMDQwV0VNdDRUdWtuRnN1Y0hySGE4NW1NY0Q3VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dyZWciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1747478369),
('NIQszSQNjkGilzQ7zo3LUhOyL4lwFuob8JD0EKet', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUhGTnptZ09yTFNDcXpHVkdseDNYV2RLRjIyZkU4V2tKc0tFQnlONCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmRzcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747476109),
('oRMsip8UUcCLW6ap6GQwSq2MvYmHKIABPaXRaqCC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmltckdSZHA2dlI5eERoMXdXSU1hQlFZbkx0RVNxZlhIcmtWa0JTUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dyZWciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1747465182);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `email`, `password`, `kelas`, `jenis_kelamin`, `image`) VALUES
('1', 'saipul rasid', 'hikarilight83@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 1', 'Laki - Laki', '68172a3c74993.jpeg'),
('10', 'Anika Müller Sari', 'anika.sari10@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 4', 'Perempuan', '68172a3c74993.jpeg'),
('11', 'Yusuf Pranoto', 'yusuf.pranoto11@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 5', 'Laki - Laki', '68172a3c74993.jpeg'),
('12', 'Cindy Hartanto', 'cindy.hartanto12@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 6', 'Perempuan', '68172a3c74993.jpeg'),
('13', 'Hans Wibowo', 'hans.wibowo13@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 6', 'Laki - Laki', '68172a3c74993.jpeg'),
('14', 'Nurul Jannah', 'nurul.jannah14@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 1', 'Perempuan', '68172a3c74993.jpeg'),
('15', 'Yohanes Surya', 'yohanes.surya15@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 2', 'Laki - Laki', '68172a3c74993.jpeg'),
('16', 'Maria Lin Chu', 'maria.chu16@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 3', 'Perempuan', '68172a3c74993.jpeg'),
('17', 'Fritz Gunawan', 'fritz.gunawan17@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 4', 'Laki - Laki', '68172a3c74993.jpeg'),
('18', 'Siti Magdalena', 'siti.magdalena18@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 5', 'Perempuan', '68172a3c74993.jpeg'),
('19', 'Samuel Karel Douw', 'samuel.douw19@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 6', 'Laki - Laki', '68172a3c74993.jpeg'),
('2', 'Tiara Lestari', 'tiara.lestari02@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 2', 'Perempuan', '68172a3c74993.jpeg'),
('20', 'Veronika Tjandra', 'veronika.tjandra20@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'umum', 'Perempuan', '68172a3c74993.jpeg'),
('21', 'Rizky Adi Nugroho', 'rizky.nugroho01@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 1', 'Laki - Laki', '68172a3c74993.jpeg'),
('3', 'Hendra Wijaya', 'hendra.wijaya03@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 3', 'Laki - Laki', '68172a3c74993.jpeg'),
('4', 'Liu Mei Lestari', 'liu.mei04@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 4', 'Perempuan', '68172a3c74993.jpeg'),
('5', 'Markus Yan Karoba', 'markus.karoba05@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 5', 'Laki - Laki', '68172a3c74993.jpeg'),
('6', 'Franziska Nur Wahyu', 'franziska.wahyu06@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 6', 'Perempuan', '68172a3c74993.jpeg'),
('7', 'Budi Santoso', 'budi.santoso07@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 1', 'Laki - Laki', '68172a3c74993.jpeg'),
('8', 'Angeline Widjaja', 'angeline.widjaja08@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 2', 'Perempuan', '68172a3c74993.jpeg'),
('9', 'Donny Jaya Pahabol', 'donny.pahabol09@gmail.com', '$2y$12$3GXHQ4TR2cpH5WSCg5wgV.yOTmaIpM6T681vI/UUozvb9HmLYkILO', 'Kelas 3', 'Laki - Laki', '68172a3c74993.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id_bookmark`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_siswa`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_baca`
--
ALTER TABLE `counter_baca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `counter_baca_guru`
--
ALTER TABLE `counter_baca_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD KEY `dtl_user_ibfk_1` (`id_buku`),
  ADD KEY `id_peminjaman` (`rating`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `counter_baca`
--
ALTER TABLE `counter_baca`
  ADD CONSTRAINT `counter_baca_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `counter_baca_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
