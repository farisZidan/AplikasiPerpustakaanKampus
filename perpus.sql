-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 09:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_anggota`
--

CREATE TABLE `mst_anggota` (
  `ID_Anggota` int(5) NOT NULL,
  `nim` char(13) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `progdi` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mst_anggota`
--

INSERT INTO `mst_anggota` (`ID_Anggota`, `nim`, `nama`, `progdi`) VALUES
(3, 'G.211.24.0074', 'Faris Zidan Andika', 'SI'),
(4, 'G.937.25.1038', 'Selmer Bode DDS', 'TI'),
(5, 'G.702.54.9167', 'Mrs. Esta Schiller', 'IK'),
(6, 'G.649.66.3976', 'Aileen Gulgowski', 'IK'),
(8, 'G.362.11.3112', 'Ayla Medhurst', 'TI'),
(9, 'G.811.33.0591', 'Oliver Schmidt', 'IK'),
(10, 'G.907.26.9970', 'Brionna Hansen', 'TI'),
(11, 'G.186.66.1733', 'Mr. Francesco Keebler', 'TI'),
(12, 'G.133.19.1583', 'Queenie Lubowitz', 'IK'),
(13, 'G.675.23.6337', 'Dr. Augustine Jenkins', 'IK'),
(14, 'G.765.77.9506', 'Miss Kira Spencer', 'SI'),
(15, 'G.914.35.1890', 'Dr. Elnora Goldner', 'SI'),
(16, 'G.427.38.7345', 'Evert Kertzmann IV', 'SI'),
(17, 'G.039.61.2048', 'Cara Stamm', 'SI'),
(18, 'G.867.08.9677', 'Karina Welch DDS', 'SI'),
(19, 'G.403.85.3584', 'Lemuel Rempel', 'TI'),
(20, 'G.599.40.7585', 'Ms. Una Wisozk', 'SI'),
(21, 'G.294.72.5851', 'Dr. Mackenzie Hermiston', 'TI'),
(22, 'G.753.76.1767', 'Chelsea Howe', 'TI'),
(23, 'G.147.44.1356', 'Dr. Tara Blick', 'SI'),
(24, 'G.949.24.2209', 'Florida Oberbrunner I', 'SI'),
(25, 'G.325.58.3400', 'Shana Wuckert', 'SI'),
(26, 'G.848.18.8133', 'Margaretta Kemmer', 'IK'),
(27, 'G.701.53.8638', 'Rita Dibbert', 'IK'),
(28, 'G.342.68.2195', 'Ronaldo Collins', 'IK'),
(29, 'G.248.08.1863', 'Ms. Gabriella Bednar', 'TI'),
(30, 'G.832.51.8014', 'Dianna Hudson', 'TI'),
(31, 'G.827.73.7656', 'Oma Bradtke', 'IK'),
(32, 'G.466.30.9608', 'Zena Heaney', 'TI'),
(33, 'G.385.97.1141', 'Ramona Bogisich PhD', 'TI'),
(34, 'G.311.83.0588', 'Maximus Feeney', 'SI'),
(35, 'G.247.92.5879', 'Ms. Maiya Schowalter', 'IK'),
(36, 'G.817.44.5769', 'Ms. Cathrine Pouros', 'TI'),
(37, 'G.035.42.7797', 'Oleta Lowe', 'IK'),
(38, 'G.177.46.4536', 'Valentine Runolfsdottir', 'TI'),
(39, 'G.494.39.5174', 'Fanny Auer', 'TI'),
(40, 'G.784.48.1681', 'Johnathon Shanahan', 'SI'),
(41, 'G.015.10.0294', 'Francis Roberts II', 'TI'),
(42, 'G.918.47.2990', 'Breanne Dickinson', 'SI'),
(43, 'G.682.75.4917', 'Hannah Roob', 'IK'),
(44, 'G.004.53.9013', 'Dr. Viva Lang IV', 'TI'),
(45, 'G.890.42.8952', 'Keara D\'Amore', 'TI'),
(46, 'G.207.35.4281', 'Lourdes Reilly', 'SI'),
(47, 'G.897.15.4380', 'Dr. Alva Paucek III', 'SI'),
(48, 'G.222.44.1144', 'Deion Collins', 'TI'),
(49, 'G.372.32.6341', 'Wilfred Towne', 'SI'),
(50, 'G.604.37.6047', 'Ms. Esta Boyer Jr.', 'TI'),
(51, 'G.851.24.7610', 'Ms. Mary Stokes', 'SI'),
(52, 'G.492.10.3401', 'Dr. Darryl Deckow II', 'SI'),
(53, 'G.230.17.1188', 'Elmo Dicki Sr.', 'IK'),
(54, 'G.506.15.4505', 'Carey Howe', 'SI'),
(55, 'G.261.08.2230', 'Camryn Collier', 'TI'),
(56, 'G.961.44.2436', 'Theo Hodkiewicz', 'TI'),
(57, 'G.470.75.0949', 'Domenic Waters DDS', 'SI'),
(58, 'G.607.85.7850', 'Otho McDermott IV', 'IK'),
(59, 'G.680.73.5670', 'Mrs. Darlene Crooks MD', 'SI'),
(60, 'G.816.23.4057', 'Carolyn Skiles', 'IK'),
(61, 'G.523.59.2324', 'Marco Towne', 'TI'),
(62, 'G.366.38.2330', 'Dr. Savion Purdy III', 'IK'),
(63, 'G.137.44.4718', 'Hershel Zemlak', 'SI'),
(64, 'G.144.13.9159', 'Dr. Oswald Jacobson', 'TI'),
(65, 'G.165.26.3818', 'Leopold Turner', 'SI'),
(66, 'G.218.10.2656', 'Adelle Nikolaus', 'IK'),
(67, 'G.766.32.8218', 'Dr. Michaela Hauck DDS', 'IK'),
(68, 'G.435.39.7667', 'Ms. Maya Olson II', 'IK'),
(69, 'G.940.03.8775', 'Adriel Hettinger', 'SI'),
(70, 'G.982.33.4112', 'Mr. Rodrigo Nader MD', 'TI'),
(71, 'G.717.06.8035', 'Bernice Haley', 'SI'),
(72, 'G.169.89.4489', 'Ms. Estell Muller', 'TI'),
(73, 'G.002.87.0333', 'Chaya Farrell', 'TI'),
(74, 'G.403.80.8340', 'Bulah Hamill PhD', 'SI'),
(75, 'G.832.22.0107', 'Glennie Mohr MD', 'TI'),
(76, 'G.945.07.2919', 'Jeff Senger', 'IK'),
(77, 'G.787.62.4816', 'Mrs. Izabella Jast II', 'IK'),
(78, 'G.693.78.7809', 'Mr. Wyatt Johns', 'IK'),
(79, 'G.870.01.4689', 'Waino Kuphal', 'SI'),
(80, 'G.657.80.6671', 'Prof. Sylvan Kessler', 'IK'),
(81, 'G.504.78.2583', 'Samanta Dibbert V', 'SI'),
(82, 'G.608.61.6416', 'Dr. Alessandra Bednar', 'SI'),
(83, 'G.216.03.5416', 'Marta Hane', 'IK'),
(84, 'G.567.05.9399', 'Bud Altenwerth', 'TI'),
(85, 'G.519.04.1623', 'Catalina Senger', 'SI'),
(86, 'G.322.21.6419', 'Raegan Ankunding', 'TI'),
(87, 'G.726.87.5368', 'Colby Reinger', 'SI'),
(88, 'G.084.70.3813', 'Ramon Cartwright', 'SI'),
(89, 'G.147.34.7695', 'Reggie Von PhD', 'IK'),
(90, 'G.246.61.6084', 'Wyman Hessel IV', 'IK'),
(91, 'G.900.92.5540', 'Ron Feest', 'IK'),
(92, 'G.344.22.4387', 'Mrs. Araceli Braun PhD', 'SI'),
(93, 'G.653.79.2522', 'Lilliana Schmeler', 'SI'),
(94, 'G.125.30.1863', 'Demetrius Gleichner', 'TI'),
(95, 'G.425.84.7553', 'Ignatius Leannon', 'IK'),
(96, 'G.176.89.6817', 'Pascale Lakin', 'SI'),
(97, 'G.890.32.8063', 'Annamarie Ebert Sr.', 'IK'),
(98, 'G.156.94.0395', 'Liana Runte', 'IK'),
(99, 'G.976.64.8138', 'Anderson Steuber', 'IK'),
(100, 'G.009.77.1087', 'Dr. Meredith Stehr', 'TI'),
(101, 'G.983.91.2792', 'Mr. Clyde Nader', 'IK'),
(102, 'G.679.44.8323', 'Ms. Crystel Labadie', 'TI'),
(103, 'G.926.44.0322', 'Aida Parker', 'SI'),
(104, 'G.965.57.6589', 'Hyman Heaney', 'IK'),
(105, 'G.596.16.5961', 'Alphonso Ankunding I', 'IK'),
(106, 'G.864.76.4767', 'Jolie Kihn', 'TI'),
(107, 'G.374.95.3694', 'Davonte Bednar V', 'TI'),
(108, 'G.037.63.1038', 'Mrs. Ettie Green DVM', 'SI'),
(109, 'G.769.60.7979', 'Kole Schmitt', 'IK'),
(110, 'G.925.14.4771', 'Cali Kassulke', 'TI'),
(111, 'G.607.13.2650', 'Mr. Trevion Leffler DDS', 'IK'),
(112, 'G.938.01.5801', 'Georgette Ledner', 'TI'),
(113, 'G.345.37.4927', 'Prof. Lyda Casper', 'IK'),
(114, 'G.565.37.6627', 'Greyson McLaughlin MD', 'TI'),
(115, 'G.429.49.5119', 'Mrs. Asia Roberts', 'SI'),
(116, 'G.865.98.2765', 'Odie Dickinson', 'TI'),
(117, 'G.693.87.7267', 'Krista Rosenbaum Sr.', 'SI'),
(118, 'G.482.21.9004', 'Michele Barrows', 'SI'),
(119, 'G.188.60.5298', 'Dayne Brakus', 'TI'),
(120, 'G.774.21.4562', 'Dr. Jeffry Schneider', 'SI'),
(121, 'G.366.89.0912', 'Alexane Dooley', 'TI'),
(122, 'G.033.54.3221', 'Mrs. Dana Maggio PhD', 'SI'),
(123, 'G.206.08.8770', 'Fannie Ratke', 'IK'),
(124, 'G.261.04.4718', 'Dr. Lauriane Quigley', 'TI'),
(125, 'G.484.78.8700', 'Ola Lakin', 'SI'),
(126, 'G.696.69.9757', 'Selena Spencer', 'TI'),
(127, 'G.684.36.3035', 'Dr. Annabell Brakus', 'SI'),
(128, 'G.389.65.5617', 'Miss Eryn Miller DVM', 'TI'),
(129, 'G.694.27.7610', 'Gay Stanton', 'IK'),
(130, 'G.222.28.3076', 'Tatyana Fisher', 'IK'),
(131, 'G.692.03.2425', 'Dr. Osvaldo Heaney V', 'SI'),
(132, 'G.722.74.5114', 'Isobel Hartmann', 'IK'),
(133, 'G.171.84.5968', 'Ansley Swaniawski', 'SI'),
(134, 'G.489.32.1612', 'Prof. Noe Upton IV', 'TI'),
(135, 'G.793.60.0610', 'Tremaine Boyle II', 'IK'),
(136, 'G.241.29.4073', 'Mrs. Zola Funk Jr.', 'TI'),
(137, 'G.972.78.4889', 'Dr. Austen Hodkiewicz II', 'IK'),
(138, 'G.179.33.3851', 'Dr. Alexandra Thompson', 'IK'),
(139, 'G.513.71.2261', 'Dr. Joanie Waelchi', 'TI'),
(140, 'G.618.03.6680', 'Angeline Graham', 'TI'),
(141, 'G.115.47.2169', 'Jessica Satterfield', 'TI'),
(142, 'G.030.00.8317', 'Dr. Blaze Spinka DVM', 'IK'),
(143, 'G.394.17.7627', 'Prof. Jevon Spinka MD', 'TI'),
(144, 'G.179.06.4882', 'Neil Hirthe', 'SI'),
(145, 'G.443.18.3837', 'Elena Schumm', 'SI'),
(146, 'G.495.93.1686', 'Dr. Ernestine Funk Sr.', 'IK'),
(147, 'G.751.78.3717', 'Prof. Uriel Gulgowski', 'IK'),
(148, 'G.451.08.8480', 'Ora Rosenbaum', 'IK'),
(149, 'G.661.25.8176', 'Elian Schinner', 'IK'),
(150, 'G.462.71.1094', 'Evans McDermott', 'TI'),
(151, 'G.866.62.8428', 'Prof. Norbert Jenkins MD', 'TI'),
(152, 'G.185.83.9262', 'Layne Koepp', 'IK'),
(154, 'G.211.25.0074', 'Linus Torvalds', 'TI'),
(155, 'G.211.26.0065', 'Linus K', 'IK');

-- --------------------------------------------------------

--
-- Table structure for table `mst_buku`
--

CREATE TABLE `mst_buku` (
  `ID_Buku` int(5) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Pengarang` varchar(150) NOT NULL,
  `Kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mst_buku`
--

INSERT INTO `mst_buku` (`ID_Buku`, `Judul`, `Pengarang`, `Kategori`) VALUES
(1, 'Donal Bebek', 'Disney', 'komik'),
(2, 'UML', 'Rosa', 'teori'),
(3, 'Pemograman Web', 'April', 'program'),
(5, 'Petualangan Doraemon', 'Fujiko Fujio', 'komik'),
(7, 'Naruto', 'Masashi Kishimoto', 'komik'),
(8, 'Harry Potter and The Sorcerer\'s Stone', 'JK Rowling', 'novel'),
(9, 'Semangkok Mie Ayam Sebelum Mati.', 'Kurang tau', 'novel'),
(11, 'Est quo voluptatem aut veritatis.', 'Dr. Izaiah Mohr', 'teori'),
(12, 'Labore ut est iure.', 'Mr. Conner Reichert', 'kamus'),
(13, 'Tempora veritatis velit.', 'Lesly Rosenbaum', 'teori'),
(14, 'Corporis et nihil vitae.', 'Eloisa Olson V', 'komik'),
(15, 'Porro tempora recusandae.', 'Matilde Hartmann', 'novel'),
(16, 'Sit et sit.', 'Miss Willie Boyle I', 'komik'),
(17, 'Vel qui pariatur.', 'Berniece Moen DVM', 'teori'),
(18, 'Dicta soluta voluptate.', 'Cynthia Schmidt', 'program'),
(19, 'Et molestiae mollitia.', 'Mr. Reymundo Spencer', 'kamus'),
(20, 'Et consequatur est cupiditate.', 'Rigoberto Hane', 'program'),
(22, 'Cum et sed non magni.', 'Thalia Gorczany DDS', 'komik'),
(23, 'Natus fugiat labore facere.', 'Arnaldo Carroll', 'kamus'),
(24, 'Ut dolorem earum.', 'Carlotta Stokes IV', 'teori'),
(25, 'Id omnis.', 'Cleveland Bartoletti Jr.', 'kamus'),
(26, 'Quia totam et impedit nisi.', 'Theo Abshire DVM', 'program'),
(27, 'Porro dolorem soluta dolore.', 'Reyes Kihn DDS', 'novel'),
(28, 'Est ab consectetur.', 'Alia Schultz', 'kamus'),
(29, 'Dolores porro quia illo.', 'Prof. Osvaldo Will Sr.', 'komik'),
(30, 'Distinctio et veniam.', 'Prof. Wellington Upton', 'program'),
(31, 'Hic voluptas rem non.', 'Gregoria Hodkiewicz', 'novel'),
(32, 'Sunt veritatis totam odio.', 'Mabel Moen', 'novel'),
(33, 'Molestiae est dolores.', 'Prof. Abraham VonRueden', 'komik'),
(34, 'Dolores quia veritatis.', 'Dr. Amani Schowalter', 'teori'),
(35, 'Sequi molestiae libero quod.', 'Adrain Leannon PhD', 'program'),
(36, 'Enim eaque sit et.', 'Mrs. Mathilde Kautzer I', 'teori'),
(37, 'Soluta officia molestiae.', 'Mr. Mark Bauch', 'teori'),
(38, 'Repellat et officiis.', 'Miller Turner', 'novel'),
(39, 'Dolorem dolores aut dolorum.', 'Mckenna Crist', 'komik'),
(40, 'Saepe odio consequatur.', 'Jairo Sporer', 'program'),
(41, 'Ut est nostrum corporis.', 'Kaela Buckridge', 'kamus'),
(42, 'Odit aut expedita magni.', 'Prof. Sandy O\'Reilly PhD', 'komik'),
(43, 'Dolorem nobis exercitationem a.', 'Lavinia Bergnaum', 'kamus'),
(44, 'Vero ut asperiores ratione.', 'Nikolas Little', 'komik'),
(45, 'Necessitatibus explicabo qui nobis fuga.', 'Dr. Maryam Haley II', 'teori'),
(46, 'Quia minus sapiente unde.', 'Summer Deckow', 'kamus'),
(47, 'Quibusdam ipsam itaque aut.', 'Kendra Lockman II', 'kamus'),
(48, 'Aspernatur in ipsum omnis.', 'Tianna Skiles', 'komik'),
(49, 'Inventore ex aliquam.', 'Florida Mohr', 'novel'),
(50, 'Doloribus laudantium omnis aut.', 'Colten Little', 'novel'),
(51, 'Tenetur eaque voluptatem.', 'Claude Bosco', 'kamus'),
(52, 'Explicabo natus repellendus.', 'Prof. Lonnie Runolfsdottir PhD', 'novel'),
(53, 'Impedit odio eveniet voluptatem.', 'Adolphus Rogahn', 'komik'),
(54, 'Est similique ducimus.', 'Katelynn Ruecker', 'program'),
(55, 'Soluta est in.', 'Dr. Pedro Quitzon II', 'komik'),
(56, 'Quia fuga ut tenetur nulla.', 'Mr. Jaydon Friesen', 'program'),
(57, 'Reiciendis nihil temporibus.', 'Casper Legros', 'kamus'),
(58, 'Doloremque dicta accusamus iure.', 'Roslyn Wisoky', 'komik'),
(59, 'Qui repudiandae laudantium.', 'Ms. Claudie Dare', 'novel'),
(60, 'Eveniet at hic aspernatur.', 'Prof. Halie Pagac', 'komik'),
(61, 'Dolore voluptatibus.', 'Sarina Torp', 'kamus'),
(62, 'Tenetur quibusdam et.', 'Chad Stanton', 'kamus'),
(63, 'Quas corrupti velit ea.', 'Edward Pollich', 'kamus'),
(64, 'Est quia totam.', 'Claud Schaden V', 'teori'),
(65, 'Ex rem aut.', 'Korbin Mraz', 'teori'),
(66, 'Ex illo qui.', 'Prof. Brian Tromp', 'program'),
(67, 'Sit quaerat et sit.', 'Mateo Denesik', 'novel'),
(68, 'Maxime est ullam.', 'Omer Wisozk MD', 'kamus'),
(69, 'Metamorphosis', 'Mr. John', 'komik'),
(70, 'Harry Potter and Prisoner of Azkaban', 'JK Rowling', 'novel');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `ID_Pinjam` int(5) NOT NULL,
  `ID_Anggota` int(5) NOT NULL,
  `ID_Buku` int(11) DEFAULT NULL,
  `tgl_pinjam` date NOT NULL DEFAULT current_timestamp(),
  `tgl_kembali` date DEFAULT NULL,
  `tgl_dikembalikan` date DEFAULT NULL,
  `status` enum('pinjam','kembali','terlambat','') NOT NULL DEFAULT 'pinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`ID_Pinjam`, `ID_Anggota`, `ID_Buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_dikembalikan`, `status`) VALUES
(2, 3, 8, '2025-11-11', '2025-11-12', '2025-12-01', 'terlambat'),
(4, 4, 69, '2025-12-01', '2025-12-10', NULL, 'pinjam'),
(7, 15, NULL, '2025-12-02', '2025-12-01', '2025-12-01', 'terlambat'),
(9, 9, 12, '2025-12-02', '2025-12-11', NULL, 'pinjam'),
(10, 11, 8, '2025-12-01', '2025-12-01', NULL, 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Admin1', '$2y$12$O8FEfZ02NKe3/Wk3ZSDnw.5d6TuvTPiVeZV5EtuO5cQ/LFHtJID1.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_anggota`
--
ALTER TABLE `mst_anggota`
  ADD PRIMARY KEY (`ID_Anggota`);

--
-- Indexes for table `mst_buku`
--
ALTER TABLE `mst_buku`
  ADD PRIMARY KEY (`ID_Buku`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`ID_Pinjam`),
  ADD KEY `ID_Anggota` (`ID_Anggota`),
  ADD KEY `ID_Buku` (`ID_Buku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_anggota`
--
ALTER TABLE `mst_anggota`
  MODIFY `ID_Anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `mst_buku`
--
ALTER TABLE `mst_buku`
  MODIFY `ID_Buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `ID_Pinjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_fk_IDAnggota` FOREIGN KEY (`ID_Anggota`) REFERENCES `mst_anggota` (`ID_Anggota`),
  ADD CONSTRAINT `pinjam_fk_IDBuku` FOREIGN KEY (`ID_Buku`) REFERENCES `mst_buku` (`ID_Buku`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
