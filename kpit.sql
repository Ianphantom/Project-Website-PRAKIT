-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 07:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 databse cek*/;

--
-- Database: `kpit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$o2qL1wnYkfqhKl0A5o5eguEloNyWf8MJsCjPsIW0U8pgGsc4RF4QC');

-- --------------------------------------------------------

--
-- Table structure for table `alihkredit`
--

CREATE TABLE `alihkredit` (
  `id_alihkredit` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` text NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nama_perusahaan` text NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `telepon_perusahaan` text NOT NULL,
  `wakil_perusahaan` text NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL,
  `tanggal_pelaksanaan` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `profil_perusahaan` text NOT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp(),
  `surat_pengantar` text DEFAULT NULL,
  `file_alihKredit` text DEFAULT NULL,
  `surat_penilaianPerusahaan` text DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'Alih Kredit Submission'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alihkredit`
--

INSERT INTO `alihkredit` (`id_alihkredit`, `id_siswa`, `sks`, `alamat`, `nomor_telepon`, `id_dosen`, `nama_perusahaan`, `alamat_perusahaan`, `telepon_perusahaan`, `wakil_perusahaan`, `deskripsi_pekerjaan`, `tanggal_pelaksanaan`, `tanggal_selesai`, `profil_perusahaan`, `tanggal_pengajuan`, `surat_pengantar`, `file_alihKredit`, `surat_penilaianPerusahaan`, `status`) VALUES
(2, 7, 101, 'Ian Fekix Jonathan Simanjuntak', '0473246831', 3, 'Departemen Teknologi Informasi', 'Jalan Kejawan Putih Tambak Gang 2 A no c', '08235732874891234', 'Hari Ginardi', 'Build Monitoring KP website IT ITS', '2022-02-18 00:00:00', '2022-03-12 00:00:00', 'Jurusan dengan fokusan IoT', '2022-02-04 08:07:36', '1_1644184763_suratpengantardanielnihbos_1644143363_d8c5a8bbfbdb7205581c.docx', '7_1644007471_berkasalihkreditdaniel_1643966071_66d3afb9594d8825cddb.docx', '7_1644003456_mahasiswa_1643962056_2d68164bb6c27040c5df.pdf', 'FINISHED');

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `berkas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_lowongan`, `berkas`) VALUES
(1, 1, 'Form registrasi'),
(2, 1, 'Rekap nilai semester'),
(3, 1, 'Surat Tugas'),
(4, 2, 'Surat tugas'),
(5, 2, 'Transkip Nilai'),
(6, 2, 'CV'),
(7, 3, 'Ini Berkas 2'),
(8, 3, 'Surat tugas');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama`, `email`, `password`) VALUES
(1, 'Dr.tech.Ir. Raden Venantius Hari Ginardi, M.Sc', 'hari.ginardi@gmail.com', '$2y$10$L48wp2qzSFYSXZhdmxeouuBpxNI/AeH0EqaMvpJ0eJeVJlwypvETu'),
(2, 'Ir. Muchammad Husni, M.Kom', 'mhusni43@gmail.com', '$2y$10$o2qL1wnYkfqhKl0A5o5eguEloNyWf8MJsCjPsIW0U8pgGsc4RF4QC'),
(3, 'Ir. Khakim Ghozali, M.MT', 'khakim@is.its.ac.id', '$2y$10$YxJzwl5RZPLGwnpzQ.1sIOHkuWMnfV7nsk/yBW2GFIZKfHMJhTXui'),
(4, 'Henning Titi Ciptaningtyas, S.Kom, M.Kom.', 'henning.its@gmail.com', '$2y$10$kug8vxwSsZgq9.rwtwn7gu0Uv/Ta1WaLZ0LmwoiDh6BHul680RrdG'),
(5, 'Ridho Rahman Hariadi, S.Kom., M.Sc.', 'ridho13@gmail.com', '$2y$10$2YOj5xo94K3LUUOG3QWqy.ozwDUUJKc5ghImxq8Yhyi1p2CQWM2UG'),
(6, 'Annisaa Sri Indrawanti, S. Kom., M. Kom', 'annisaa@its.ac.id', '$2y$10$8vW9zxruPlymVGqnyb1mHeFChfE9WwZZ.DUMtE1otxJk.xBMXMXAy'),
(7, 'Dr. Rizka Wakhidatus Sholikah, S. Kom', 'wakhidatus@its.ac.id', '$2y$10$txbHtSjqFx6S3242PEEBN.1SYA28MwzjaukRxWTUY1ddIOG9LMS0W'),
(8, 'Irzal Ahmad Sabilla, S. Kom.,M.Kom', 'irzal.ahmad.s@gmail.com', '$2y$10$fUM5iULZ/Z2BUyf4ARMLmOqaJE/gSY.SYDdfGSGAEJiPBsM4PfTvG'),
(9, 'nesya kurniadw', 'nesyak@gmail.com', '$2y$10$fL58rfTk7g16I9k8SfVI3OhzkSE7kA0IfEIto0mBhJdckqs055OMC');

-- --------------------------------------------------------

--
-- Table structure for table `laporanalihkredit`
--

CREATE TABLE `laporanalihkredit` (
  `id_laporan` int(11) NOT NULL,
  `id_alihkredit` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `file` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporanalihkredit`
--

INSERT INTO `laporanalihkredit` (`id_laporan`, `id_alihkredit`, `id_siswa`, `tanggal`, `file`, `keterangan`) VALUES
(0, 2, 7, '2022-02-07 05:38:20', '7_1644253700_berkas laporan akhir daniel_1644212300_826cdca62187c35afeda.sql', 'Ian Felix');

-- --------------------------------------------------------

--
-- Table structure for table `laporankp`
--

CREATE TABLE `laporankp` (
  `id_laporan` int(11) NOT NULL,
  `id_kp` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `file` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporankp`
--

INSERT INTO `laporankp` (`id_laporan`, `id_kp`, `id_siswa`, `tanggal`, `file`, `keterangan`) VALUES
(1, 3, 4, '2022-01-10 13:36:20', '4_1641863180_laporan kp syahisk_1641821780_a2fbc434afac25bd6971.doc', 'Laporan KP Syahisk selama 2 bulan'),
(2, 4, 5, '2022-01-13 14:24:55', '5_1642125295_reportakhir_1642083895_2b4121cc14a579c701bc.pdf', 'dfklghaskjdfhksdjfhaklsjdf');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id_logbook` int(11) NOT NULL,
  `id_kp` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id_logbook`, `id_kp`, `id_siswa`, `tanggal`, `deskripsi_kegiatan`, `file`) VALUES
(1, 1, 1, '2022-01-06', 'Melakukan banyak hal nih bos selama kp. kamu pasti bingung kan', '1_1641505819_lac0bf2xujc5yvbwtgsyprvmx6wsq3ki1zzplaju7q4tgnnh_1641464419_5dc7b8efc2e08264564f.jpg'),
(2, 1, 1, '2022-01-07', 'Ini KP hari kedua kok bos. Kali saya mencoba mengupload data data penting', '2_1641420059_ful15t4dbmy7hn6vps92se8croeqzrmjldivxgg0zaoxqk3k_1641378659_81c7f83f8d8b5c95ce1f.jpg'),
(3, 1, 2, '2022-01-06', 'ini kegiatan di hari pertama bos. saya sering melakukan semua hal hal sendirian', '2_1641420539_21kdz6f0mqgel3otmvh4uhy5yrflpzbcwasaqpixgsenrj89_1641379139_5a58c3596cfc990332e3.jpg'),
(4, 1, 1, '2022-01-08', 'Pembuatan SOP umum dari KP, Penyelesaian Form KP, Rancangan pilihan Logbook untuk KP, Rancangan pembuatan alur pengajuan serta proses KP', '1_1641650694_wrtcyyqakd429znhxirj1wlngx0uob73tfssojke8dm5gzpl_1641609294_693fd89218672ddb8949.png'),
(5, 3, 4, '2022-01-11', 'Menjadi seorang  IT support pada sebuah cafe', '4_1641862941_qmlgobaj1evde3vtf2uzjwh4xo7csgtyuwk8l6crpbkis9ym_1641821541_8ca93599da7b4fe28950.png'),
(6, 3, 4, '2022-01-13', 'Menjadi seorang  IT support pada sebuah cafe hari kedua', '4_1641862974_h9afycuovblmkuxidenj4zgfe0qkytw6moqr57ds3jx8iszg_1641821574_95951fd8c21859d90803.jpeg'),
(7, 3, 4, '2022-01-14', 'Menjadi seorang  IT support pada sebuah cafe hari ketiga', '4_1641862996_oh6n30wqsf2jnixcexdugp9jv7wau1bagyzvl45s8mbhtkfc_1641821596_8fd56f31743018e5395a.png'),
(8, 4, 5, '2022-01-06', 'Menjadi seorang  IT support pada sebuah cafe', '5_1642125120_mdzerzjspagwni3ourfgq61pv90x2dktnuy5vbxtmqloejil_1642083720_012f7d3f973e280e576d.jpeg'),
(9, 4, 5, '2022-01-14', 'Menjadi seorang  IT support pada sebuah cafe hari kedua', '5_1642125134_q4wmbwukhczxvr6ultbn0ocfa1hlepfs9iidav2jgy7gj8oy_1642083734_ace2f5af96c76d98cd39.jpg'),
(10, 4, 5, '2022-01-29', 'Menjadi seorang  IT support pada sebuah cafe hari ketiga', '5_1642125146_ivtesoj7wq2vpmlne6rf5ixhxkcsqzbgm1co3jug8t4a9ad0_1642083746_c3c4373707e0e0186364.png');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan_kp`
--

CREATE TABLE `lowongan_kp` (
  `id_lowongan` int(11) NOT NULL,
  `nama_perusahaan` text NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `contact_person` text NOT NULL,
  `posisi_kp` text NOT NULL,
  `file` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan_kp`
--

INSERT INTO `lowongan_kp` (`id_lowongan`, `nama_perusahaan`, `alamat_perusahaan`, `contact_person`, `posisi_kp`, `file`, `status`) VALUES
(1, 'PT RAPP', '', 'Ian : 053119400008 | Felix : iafelix22 (id_line)', 'Web Developer', '_1641954908__1641913508_2a99f6e7a49882c717a0.docx', 1),
(2, 'PT Telkom Indonesia', '', 'Joshua : joshuan22(line)', 'Database Administrator', '_1642036166__1641994766_ce6cbfc3f73dfac02392.png', 1),
(3, 'PT ITS IT', '', 'Ianfelix22(line)', 'Web Developer Junior', '1_1642125528__1642084128_6613e11aa396dcce040c.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_kp` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `berkas_nilai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_kp`, `id_siswa`, `nilai`, `berkas_nilai`) VALUES
(1, 1, 2, 0, NULL),
(2, 1, 1, 90, '3_1641861307__1641819907_40e13d7b89c8ace667fd.docx'),
(3, 2, 3, 95, '3_1641861362__1641819962_9910d256e4061d84b8cb.docx'),
(4, 3, 4, 0, NULL),
(5, 4, 5, 98, '1_1642125386__1642083986_67a04d940920dda1dca9.docx'),
(6, 4, 6, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alihkredit`
--

CREATE TABLE `nilai_alihkredit` (
  `id_nilai` int(11) NOT NULL,
  `id_alihKredit` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `berkas_nilai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_alihkredit`
--

INSERT INTO `nilai_alihkredit` (`id_nilai`, `id_alihKredit`, `id_siswa`, `nilai`, `berkas_nilai`) VALUES
(1, 2, 7, 90, '3_1644257757__1644216357_97f2f2791e1165cfd195.sql');

-- --------------------------------------------------------

--
-- Table structure for table `partnerkp`
--

CREATE TABLE `partnerkp` (
  `id_partnerkp` int(11) NOT NULL,
  `id_kp` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` text NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partnerkp`
--

INSERT INTO `partnerkp` (`id_partnerkp`, `id_kp`, `id_siswa`, `sks`, `alamat`, `nomor_telepon`, `id_dosen`) VALUES
(1, 1, 1, 124, 'Jalan Pematang Siantara no 18, Tarutung, Tapanuli Utara', '08342341532', 3),
(2, 4, 6, 135, 'Jalan Flamboyan 5 f 241 Kompleks PT RAPP, Pangkalan Kerinci, Riau', '053452784324', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuankp1`
--

CREATE TABLE `pengajuankp1` (
  `id_kp` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` text NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nama_perusahaan` text NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `telepon_perusahaan` text NOT NULL,
  `wakil_perusahaan` text NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL,
  `tanggal_pelaksanaan` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `profil_perusahaan` text NOT NULL,
  `id_partner` int(11) DEFAULT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_kp` text DEFAULT NULL,
  `surat_pengantar` text DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'KP Submission'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuankp1`
--

INSERT INTO `pengajuankp1` (`id_kp`, `id_siswa`, `sks`, `alamat`, `nomor_telepon`, `id_dosen`, `nama_perusahaan`, `alamat_perusahaan`, `telepon_perusahaan`, `wakil_perusahaan`, `deskripsi_pekerjaan`, `tanggal_pelaksanaan`, `tanggal_selesai`, `profil_perusahaan`, `id_partner`, `tanggal_pengajuan`, `file_kp`, `surat_pengantar`, `status`) VALUES
(1, 2, 93, 'Jalan Komplek PT RAPP FM 158, Pangkalan Kerinci, Riau', '082389424609', 4, 'PT RAPP', 'Komplek PT RAPP Pangkalan Kerinci, Pelalawan, Riau', '43124123', 'Sopar ButarButar', 'KP di pabrik kertas rapp nih bnos', '2022-01-14 00:00:00', '2022-02-04 00:00:00', 'PT RAPP adalah pabrik pulp terbesar di dunia yang beroperasi di Pangkalan kerinci, Riau', 1, '2022-01-06 10:41:58', '2_1641779895_dokumen pengajuan magang ian dan calvin_1641738495_108e4e373c55180f3ad4.pdf', '1_1641781063_surat pengantar ian dan calvin_1641739663_c8a9ff311af4b06088cc.doc', 'ON PROGRESS'),
(2, 3, 123, 'Banyuwangi Jawa Timur', '08234143123', 3, 'PT Telkom', 'Gedung Telkom Bandung', '0741234425', 'Calvin Imanuel', 'KP di pabrik kertas rapp nih bnos', '2022-01-13 00:00:00', '2022-01-29 00:00:00', 'PT RAPP adalah pabrik pulp terbesar di dunia yang beroperasi di Pangkalan kerinci, Riau', NULL, '2022-01-06 10:44:23', NULL, NULL, 'KP Submission'),
(3, 4, 95, 'Jalan Flamboyan 5 f 241 Kompleks PT RAPP, Pangkalan Kerinci, Riau', '082389424609', 3, 'Wak Lasak Cooperation', 'Komplek Bumi Lago Permai no 25', '0352352138154', 'Wak bagas', 'Menjadi seorang  IT support pada sebuah cafe', '2022-01-11 00:00:00', '2022-02-02 00:00:00', 'Wak lasak adalah sebuah perusahaan warallaba yang bergerak di bidang apapun itu ini hanya sebuah coontoh', NULL, '2022-01-10 13:29:17', '4_1641862845_pengajuankp_syahisk_1641821445_f9e4d4b0af16865dee11.docx', '1_1641862899_surat pengantar kp syahisk_1641821499_a027f006892ee092f704.docx', 'FINISHED'),
(4, 5, 123, 'Jalan Flamboyan 5 f 241 Kompleks PT RAPP, Pangkalan Kerinci, Riau', '054278123428945', 1, 'Wak Lasak Cooperation', 'Komplek Bumi Lago Permai no 25', '09453489752394', 'Wak bagas', 'Menjadi seorang  IT support pada sebuah cafe', '2022-01-13 00:00:00', '2022-01-29 00:00:00', 'Wak lasak adalah sebuah perusahaan warallaba yang bergerak di bidang apapun itu ini hanya sebuah coontoh', 6, '2022-01-13 14:18:43', '5_1642125019_pengajuankp_adrian_1642083619_ade85fa4e9e9d2aceb85.pdf', '1_1642125081_pengantaradrian_1642083681_9823e835cd93165355d5.pdf', 'FINISHED');

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id_persyaratan` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `persyaratan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persyaratan`
--

INSERT INTO `persyaratan` (`id_persyaratan`, `id_lowongan`, `persyaratan`) VALUES
(1, 1, 'IPK minimal 3.3'),
(2, 1, 'Mengerti bahasa pemrograman'),
(3, 1, 'Mahir menggunakan SQL, PHP, dan Python'),
(4, 2, 'Paham mengenai database design'),
(5, 2, 'Mampu melakukan normalisasi database'),
(6, 2, 'Mempu menggunakan SQL Server dan Monggo DB'),
(7, 3, 'Ini Persyaratan 1'),
(8, 3, 'IPK minimal 3.3'),
(9, 3, 'Paham mengenai database design');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `nrp` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `email`, `nrp`, `password`) VALUES
(1, 'Ian Felix Jonathan', 'klasterdti@gmail.com', '05311940000008', '$2y$10$88Yu.7PsUrYsXEUw0lW9r.w7fao4QRDG0ooGCuKTZGEGvwA9vD/SC'),
(2, 'Calvin Imanuel', 'calvin@gmail.com', '05311940000049', '$2y$10$jC4lpjqPb4qu7o/jhuOkUO1alVuK8gveO07vBD5GRyVJDGhuWixt2'),
(3, 'Prima Secondary Ramadhan', 'prima@gmail.com', '05311940000001', '$2y$10$eIuj8xt5oGtvI395xCOW0.VE0HDhkBXVN3giZS91bx1PVqOLvqrHa'),
(4, 'Syakhisk Al Azmi', 'syais@gmail.com', '05311940000003', '$2y$10$kdtxmDOOCQzG0TEOQSbfQuexy1k0b7blkgjvJfBRhHCXf/hh6x7eK'),
(5, 'Christopher Adrian Kusuma', 'adrian@gmail.com', '05311940000016', '$2y$10$U5SCg0cyYQM/lbSNSIOQhuZRD9Uhd6kZZrfqbVQ5A9PnuIRSm68yW'),
(6, 'Tri Rizki Yuliawan', 'tri@gmail.com', '05311940000017', '$2y$10$IThsX8vdU62.F1XsLFClM.vPZctrGQ17OIYCtDdLVgUXm76dNy1Vm'),
(7, 'Daniel Evan', 'daniel@gmail.com', '05311940000018', '$2y$10$lGCDxH7NNkwKqjMFLmqU4u/JaBw3aqNqWRJxrpjaGtJdnX6ZCRBSu'),
(8, 'nesya kurnia', 'nesya@gmail.com', '05311840000009', '$2y$10$409l5sunp1uVv0C/k8W.MuLif.Pfzn.Jo19uQ4nf./YmGPIL2NcPC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alihkredit`
--
ALTER TABLE `alihkredit`
  ADD PRIMARY KEY (`id_alihkredit`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `laporanalihkredit`
--
ALTER TABLE `laporanalihkredit`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `laporankp`
--
ALTER TABLE `laporankp`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id_logbook`);

--
-- Indexes for table `lowongan_kp`
--
ALTER TABLE `lowongan_kp`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `nilai_alihkredit`
--
ALTER TABLE `nilai_alihkredit`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `partnerkp`
--
ALTER TABLE `partnerkp`
  ADD PRIMARY KEY (`id_partnerkp`);

--
-- Indexes for table `pengajuankp1`
--
ALTER TABLE `pengajuankp1`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id_persyaratan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alihkredit`
--
ALTER TABLE `alihkredit`
  MODIFY `id_alihkredit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laporankp`
--
ALTER TABLE `laporankp`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lowongan_kp`
--
ALTER TABLE `lowongan_kp`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai_alihkredit`
--
ALTER TABLE `nilai_alihkredit`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partnerkp`
--
ALTER TABLE `partnerkp`
  MODIFY `id_partnerkp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuankp1`
--
ALTER TABLE `pengajuankp1`
  MODIFY `id_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id_persyaratan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
