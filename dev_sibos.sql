-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2022 pada 11.08
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_sibos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` char(6) NOT NULL,
  `id_kab` char(4) NOT NULL,
  `nama_kec` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `id_kab`, `nama_kec`) VALUES
('330901', '3309', 'Selo'),
('330902', '3309', 'Ampel'),
('330903', '3309', 'Cepogo'),
('330904', '3309', 'Musuk'),
('330905', '3309', 'Boyolali'),
('330906', '3309', 'Mojosongo'),
('330907', '3309', 'Teras'),
('330908', '3309', 'Sawit'),
('330909', '3309', 'Banyudono'),
('330910', '3309', 'Sambi'),
('330911', '3309', 'Ngemplak'),
('330912', '3309', 'Nogosari'),
('330913', '3309', 'Simo'),
('330914', '3309', 'Karanggede'),
('330915', '3309', 'Klego'),
('330916', '3309', 'Andong'),
('330917', '3309', 'Kemusu'),
('330918', '3309', 'Wonosegoro'),
('330919', '3309', 'Juwangi'),
('330920', '3309', 'Gladaksari'),
('330921', '3309', 'Tamansari'),
('330922', '3309', 'Wonosamodro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kel` char(10) NOT NULL,
  `id_kec` char(6) DEFAULT NULL,
  `nama_kel` tinytext DEFAULT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kel`, `id_kec`, `nama_kel`, `id_jenis`) VALUES
('3309012001', '330901', 'Tlogolele', 4),
('3309012002', '330901', 'Klakah', 4),
('3309012003', '330901', 'Jrakah', 4),
('3309012004', '330901', 'Lencoh', 4),
('3309012005', '330901', 'Suroteleng', 4),
('3309012006', '330901', 'Samiran', 4),
('3309012007', '330901', 'Selo', 4),
('3309012008', '330901', 'Tarubatang', 4),
('3309012009', '330901', 'Senden', 4),
('3309012010', '330901', 'Jeruk', 4),
('3309022001', '330920', 'Seboto', 4),
('3309022002', '330902', 'Tanduk', 4),
('3309022003', '330902', 'Banyuanyar', 4),
('3309022004', '330902', 'Sidomulyo', 4),
('3309022005', '330902', 'Ngargosari', 4),
('3309022006', '330902', 'Selodoko', 4),
('3309022007', '330902', 'Ngenden', 4),
('3309022008', '330902', 'Ngampon', 4),
('3309022009', '330902', 'Gondang Slamet', 4),
('3309022010', '330902', 'Candi', 4),
('3309022011', '330902', 'Urutsewu', 4),
('3309022012', '330920', 'Kaligentong', 4),
('3309022013', '330920', 'Gladagsari', 4),
('3309022014', '330920', 'Kembang', 4),
('3309022015', '330920', 'Ngagrong', 4),
('3309022016', '330920', 'Candisari', 4),
('3309022017', '330920', 'Ngargoloka', 4),
('3309022018', '330920', 'Sampetan', 4),
('3309022019', '330920', 'Ngadirojo', 4),
('3309022020', '330920', 'Jlarem', 4),
('3309032001', '330903', 'Wonodoyo', 4),
('3309032002', '330903', 'Jombang', 4),
('3309032003', '330903', 'Gedangan', 4),
('3309032004', '330903', 'Sumbung', 4),
('3309032005', '330903', 'Paras', 4),
('3309032006', '330903', 'Jelok', 4),
('3309032007', '330903', 'Bakulan', 4),
('3309032008', '330903', 'Candigatak', 4),
('3309032009', '330903', 'Cabeankunti', 4),
('3309032010', '330903', 'Mliwis', 4),
('3309032011', '330903', 'Sukabumi', 4),
('3309032012', '330903', 'Genting', 4),
('3309032013', '330903', 'Cepogo', 4),
('3309032014', '330903', 'Kembangkuning', 4),
('3309032015', '330903', 'Gubug', 4),
('3309042001', '330921', 'Lampar', 4),
('3309042002', '330921', 'Dragan', 4),
('3309042003', '330921', 'Karanganyar', 4),
('3309042004', '330921', 'Jemowo', 4),
('3309042005', '330921', 'Sumur', 4),
('3309042006', '330921', 'Sangup', 4),
('3309042007', '330921', 'Mriyan', 4),
('3309042008', '330921', 'Lanjaran', 4),
('3309042009', '330921', 'Karangkendal', 4),
('3309042010', '330921', 'Keposong', 4),
('3309042011', '330904', 'Pagerjurang', 4),
('3309042012', '330904', 'Sukorejo', 4),
('3309042013', '330904', 'Sruni', 4),
('3309042014', '330904', 'Cluntang', 4),
('3309042015', '330904', 'Kembangsari', 4),
('3309042016', '330904', 'Ringinlarik', 4),
('3309042017', '330904', 'Kebongulo', 4),
('3309042018', '330904', 'Musuk', 4),
('3309042019', '330904', 'Sukorame', 4),
('3309042020', '330904', 'Pusporenggo', 4),
('3309051001', '330905', 'Pulisen', 3),
('3309051002', '330905', 'Siwodipuran', 3),
('3309051004', '330905', 'Banaran', 3),
('3309052003', '330905', 'Karanggeneng', 4),
('3309052005', '330905', 'Winong', 4),
('3309052006', '330905', 'Penggung', 4),
('3309052007', '330905', 'Kiringan', 4),
('3309052008', '330905', 'Mudal', 4),
('3309052009', '330905', 'Kebonbimo', 4),
('3309061007', '330906', 'Kemiri', 3),
('3309061009', '330906', 'Mojosongo', 3),
('3309062001', '330906', 'Madu', 4),
('3309062002', '330906', 'Singosari', 4),
('3309062003', '330906', 'Tambak', 4),
('3309062004', '330906', 'Manggis', 4),
('3309062005', '330906', 'Jurug', 4),
('3309062006', '330906', 'Karangnongko', 4),
('3309062008', '330906', 'Butuh', 4),
('3309062010', '330906', 'Kragilan', 4),
('3309062011', '330906', 'Brajan', 4),
('3309062012', '330906', 'Metuk', 4),
('3309062013', '330906', 'Dlingo', 4),
('3309072001', '330907', 'Kopen', 4),
('3309072002', '330907', 'Doplang', 4),
('3309072003', '330907', 'Kadireso', 4),
('3309072004', '330907', 'Nepen', 4),
('3309072005', '330907', 'Sudimoro', 4),
('3309072006', '330907', 'Bangsalan', 4),
('3309072007', '330907', 'Salakan', 4),
('3309072008', '330907', 'Teras', 4),
('3309072009', '330907', 'Randusari', 4),
('3309072010', '330907', 'Majolegi', 4),
('3309072011', '330907', 'Gumukrejo', 4),
('3309072012', '330907', 'Tawangsari', 4),
('3309072013', '330907', 'Krasak', 4),
('3309082001', '330908', 'Kateguhan', 4),
('3309082002', '330908', 'Manjung', 4),
('3309082003', '330908', 'Gombang', 4),
('3309082004', '330908', 'Tegalrejo', 4),
('3309082005', '330908', 'Tlawong', 4),
('3309082006', '330908', 'Jenengan', 4),
('3309082007', '330908', 'Cepoko Sawit', 4),
('3309082008', '330908', 'Kemasan', 4),
('3309082009', '330908', 'Jatirejo', 4),
('3309082010', '330908', 'Bendosari', 4),
('3309082011', '330908', 'Karangduren', 4),
('3309082012', '330908', 'Guwokajen', 4),
('3309092001', '330909', 'Dukuh', 4),
('3309092002', '330909', 'Jipangan', 4),
('3309092003', '330909', 'Jembungan', 4),
('3309092004', '330909', 'Sambon', 4),
('3309092005', '330909', 'Kuwiran', 4),
('3309092006', '330909', 'Cangkringan', 4),
('3309092007', '330909', 'Ngaru-aru', 4),
('3309092008', '330909', 'Bendan', 4),
('3309092009', '330909', 'Ketaon', 4),
('3309092010', '330909', 'Banyudono', 4),
('3309092011', '330909', 'Batan', 4),
('3309092012', '330909', 'Denggungan', 4),
('3309092013', '330909', 'Bangak', 4),
('3309092014', '330909', 'Trayu', 4),
('3309092015', '330909', 'Tanjungsari', 4),
('3309102001', '330910', 'Canden', 4),
('3309102002', '330910', 'Senting', 4),
('3309102003', '330910', 'Tempursari', 4),
('3309102004', '330910', 'Jatisari', 4),
('3309102005', '330910', 'Glintang', 4),
('3309102006', '330910', 'Catur', 4),
('3309102007', '330910', 'Tawengan', 4),
('3309102008', '330910', 'Sambi', 4),
('3309102009', '330910', 'Demangan', 4),
('3309102010', '330910', 'Kepoh', 4),
('3309102011', '330910', 'Jagoan', 4),
('3309102012', '330910', 'Babadan', 4),
('3309102013', '330910', 'Ngaglik', 4),
('3309102014', '330910', 'Trosobo', 4),
('3309102015', '330910', 'Cermo', 4),
('3309102016', '330910', 'Nglembu', 4),
('3309112001', '330911', 'Ngargorejo', 4),
('3309112002', '330911', 'Sobokerto', 4),
('3309112003', '330911', 'Ngesrep', 4),
('3309112004', '330911', 'Gagaksipat', 4),
('3309112005', '330911', 'Donohudan', 4),
('3309112006', '330911', 'Sawahan', 4),
('3309112007', '330911', 'Pandeyan', 4),
('3309112008', '330911', 'Kismoyoso', 4),
('3309112009', '330911', 'Dibal', 4),
('3309112010', '330911', 'Sindon', 4),
('3309112011', '330911', 'Manggung', 4),
('3309112012', '330911', 'Giriroto', 4),
('3309122001', '330912', 'Kenteng', 4),
('3309122002', '330912', 'Potronayan', 4),
('3309122003', '330912', 'Sembungan', 4),
('3309122004', '330912', 'Jeron', 4),
('3309122005', '330912', 'Ketitang', 4),
('3309122006', '330912', 'Rembun', 4),
('3309122007', '330912', 'Guli', 4),
('3309122008', '330912', 'Tegalgiri', 4),
('3309122009', '330912', 'Bendo', 4),
('3309122010', '330912', 'Keyongan', 4),
('3309122011', '330912', 'Pojok', 4),
('3309122012', '330912', 'Glonggong', 4),
('3309122013', '330912', 'Pulutan', 4),
('3309132001', '330913', 'Pelem', 4),
('3309132002', '330913', 'Bendungan', 4),
('3309132003', '330913', 'Temon', 4),
('3309132004', '330913', 'Teter', 4),
('3309132005', '330913', 'Simo', 4),
('3309132006', '330913', 'Walen', 4),
('3309132007', '330913', 'Pentur', 4),
('3309132008', '330913', 'Gunung', 4),
('3309132009', '330913', 'Talakbroto', 4),
('3309132010', '330913', 'Kedunglengkong', 4),
('3309132011', '330913', 'Blagung', 4),
('3309132012', '330913', 'Sumber', 4),
('3309132013', '330913', 'Wates', 4),
('3309142001', '330914', 'Manyaran', 4),
('3309142002', '330914', 'Sempulur', 4),
('3309142003', '330914', 'Klumpit', 4),
('3309142004', '330914', 'Pinggir', 4),
('3309142005', '330914', 'Bantengan', 4),
('3309142006', '330914', 'Tegalsari', 4),
('3309142007', '330914', 'Sranten', 4),
('3309142008', '330914', 'Grogolan', 4),
('3309142009', '330914', 'Mojosari', 4),
('3309142010', '330914', 'Pengkol', 4),
('3309142011', '330914', 'Karangkepoh', 4),
('3309142012', '330914', 'Sendang', 4),
('3309142013', '330914', 'Kebonan', 4),
('3309142014', '330914', 'Klari', 4),
('3309142015', '330914', 'Bangkok', 4),
('3309142016', '330914', 'Dologan', 4),
('3309152001', '330915', 'Kalangan', 4),
('3309152002', '330915', 'Sendangrejo', 4),
('3309152003', '330915', 'Tanjung', 4),
('3309152004', '330915', 'Jaten', 4),
('3309152005', '330915', 'Blumbang', 4),
('3309152006', '330915', 'Sangge', 4),
('3309152007', '330915', 'Banyuurip', 4),
('3309152008', '330915', 'Bade', 4),
('3309152009', '330915', 'Klego', 4),
('3309152010', '330915', 'Gondanglegi', 4),
('3309152011', '330915', 'Karanggatak', 4),
('3309152012', '330915', 'Sumber Agung', 4),
('3309152013', '330915', 'Karangmojo', 4),
('3309162001', '330916', 'Pakel', 4),
('3309162002', '330916', 'Gondangrawe', 4),
('3309162003', '330916', 'Sempu', 4),
('3309162004', '330916', 'Beji', 4),
('3309162005', '330916', 'Mojo', 4),
('3309162006', '330916', 'Senggrong', 4),
('3309162007', '330916', 'Kedungdowo', 4),
('3309162008', '330916', 'Kacangan', 4),
('3309162009', '330916', 'Andong', 4),
('3309162010', '330916', 'Munggur', 4),
('3309162011', '330916', 'Pakang', 4),
('3309162012', '330916', 'Pranggong', 4),
('3309162013', '330916', 'Kunti', 4),
('3309162014', '330916', 'Pelemrejo', 4),
('3309162015', '330916', 'Semawung', 4),
('3309162016', '330916', 'Kadipaten', 4),
('3309172001', '330917', 'Watugede', 4),
('3309172002', '330917', 'Kedungrejo', 4),
('3309172003', '330917', 'Sarimulyo', 4),
('3309172004', '330917', 'Klewor', 4),
('3309172005', '330917', 'Bawu', 4),
('3309172006', '330917', 'Kendel', 4),
('3309172007', '330918', 'Kauman', 4),
('3309172008', '330918', 'Lemahireng', 4),
('3309172009', '330918', 'Guwo', 4),
('3309172010', '330917', 'Kemusu', 4),
('3309172011', '330917', 'Genengsari', 4),
('3309172012', '330917', 'Kedungmulyo', 4),
('3309172013', '330917', 'Wanoharjo', 4),
('3309182001', '330922', 'Ngablak', 4),
('3309182002', '330918', 'Karangjati', 4),
('3309182003', '330918', 'Ketoyan', 4),
('3309182004', '330918', 'Bolo', 4),
('3309182005', '330918', 'Banyusri', 4),
('3309182006', '330918', 'Gosono', 4),
('3309182007', '330918', 'Wonosegoro', 4),
('3309182008', '330918', 'Bandung', 4),
('3309182009', '330922', 'Kedungpilang', 4),
('3309182010', '330922', 'Kalinanas', 4),
('3309182011', '330922', 'Gilirejo', 4),
('3309182012', '330922', 'Jatilawang', 4),
('3309182013', '330922', 'Garangan', 4),
('3309182014', '330918', 'Bojong', 4),
('3309182015', '330922', 'Bercak', 4),
('3309182016', '330922', 'Bengle', 4),
('3309182017', '330922', 'Gunungsari', 4),
('3309182018', '330922', 'Repaking', 4),
('3309191006', '330919', 'Sambeng', 3),
('3309192001', '330919', 'Krobokan', 4),
('3309192002', '330919', 'Ngaren', 4),
('3309192003', '330919', 'Kalimati', 4),
('3309192004', '330919', 'Kayen', 4),
('3309192005', '330919', 'Jerukan', 4),
('3309192007', '330919', 'Pilangrejo', 4),
('3309192008', '330919', 'Cerme', 4),
('3309192009', '330919', 'Juwangi', 4),
('3309192010', '330919', 'Ngleses', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_module`
--

CREATE TABLE `role_module` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_module`
--

INSERT INTO `role_module` (`id`, `role_id`, `module_id`, `sort`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(28, 3, 2, 0),
(29, 2, 2, 0),
(30, 1, 3, 3),
(31, 1, 4, 5),
(32, 2, 3, 0),
(33, 2, 4, 0),
(34, 1, 5, 4),
(35, 1, 6, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_submodule`
--

CREATE TABLE `role_submodule` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `submodule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_submodule`
--

INSERT INTO `role_submodule` (`id`, `role_id`, `module_id`, `submodule_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 1, 1, 4),
(5, 1, 1, 5),
(6, 1, 1, 6),
(7, 1, 1, 7),
(8, 1, 1, 8),
(9, 1, 1, 9),
(10, 1, 1, 10),
(11, 1, 1, 11),
(12, 1, 2, 12),
(13, 1, 2, 13),
(14, 1, 2, 14),
(15, 1, 2, 15),
(16, 1, 2, 16),
(17, 1, 2, 17),
(18, 1, 2, 18),
(19, 1, 2, 19),
(20, 1, 2, 20),
(21, 1, 2, 21),
(22, 1, 2, 22),
(23, 1, 2, 23),
(24, 1, 2, 24),
(30, 1, 2, 25),
(31, 1, 2, 26),
(41, 1, 2, 27),
(46, 1, 2, 28),
(47, 1, 2, 29),
(57, 3, 2, 12),
(58, 1, 1, 11),
(59, 2, 2, 12),
(60, 2, 2, 18),
(61, 2, 2, 13),
(62, 2, 2, 16),
(63, 2, 2, 17),
(64, 2, 2, 19),
(65, 2, 2, 20),
(66, 2, 2, 21),
(67, 2, 2, 22),
(68, 2, 2, 23),
(69, 2, 2, 24),
(70, 2, 2, 25),
(71, 2, 2, 26),
(72, 2, 2, 27),
(73, 2, 2, 28),
(74, 2, 2, 29),
(75, 2, 2, 14),
(76, 1, 2, 30),
(77, 1, 2, 31),
(78, 2, 2, 30),
(79, 2, 2, 31),
(80, 1, 3, 33),
(81, 1, 3, 34),
(82, 1, 3, 35),
(83, 1, 3, 36),
(84, 1, 3, 37),
(85, 1, 3, 38),
(86, 1, 3, 39),
(87, 1, 4, 40),
(88, 1, 4, 41),
(89, 1, 4, 42),
(90, 1, 4, 43),
(91, 1, 4, 44),
(92, 1, 4, 45),
(93, 1, 4, 46),
(94, 1, 4, 47),
(95, 1, 4, 48),
(96, 1, 4, 49),
(97, 1, 4, 50),
(98, 1, 4, 51),
(99, 2, 3, 33),
(100, 2, 4, 40),
(101, 2, 4, 41),
(102, 2, 4, 42),
(103, 2, 4, 43),
(104, 2, 4, 44),
(105, 2, 4, 45),
(106, 2, 4, 46),
(107, 2, 4, 47),
(108, 2, 4, 48),
(109, 2, 4, 49),
(110, 2, 4, 50),
(111, 2, 4, 51),
(112, 2, 3, 34),
(113, 1, 3, 53),
(114, 1, 3, 55),
(115, 1, 3, 57),
(116, 1, 3, 58),
(117, 1, 3, 59),
(118, 1, 3, 60),
(119, 1, 3, 62),
(120, 1, 3, 63),
(121, 1, 3, 64),
(122, 1, 3, 65),
(123, 1, 3, 66),
(124, 1, 3, 67),
(125, 1, 3, 68),
(126, 1, 3, 69),
(127, 1, 3, 70),
(128, 1, 3, 71),
(135, 1, 4, 72),
(136, 1, 4, 72),
(138, 1, 4, 74),
(139, 1, 6, 75),
(140, 1, 6, 76),
(141, 1, 6, 77),
(142, 1, 6, 78),
(143, 1, 6, 79),
(144, 1, 6, 80),
(145, 1, 6, 81),
(146, 1, 6, 82),
(147, 1, 6, 83),
(148, 1, 5, 84),
(149, 1, 5, 85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_module`
--

CREATE TABLE `sys_module` (
  `id_module` int(11) NOT NULL,
  `title_module` varchar(32) NOT NULL,
  `url_module` varchar(32) NOT NULL,
  `icon_module` varchar(32) DEFAULT NULL,
  `status_module` int(1) NOT NULL,
  `sort` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sys_module`
--

INSERT INTO `sys_module` (`id_module`, `title_module`, `url_module`, `icon_module`, `status_module`, `sort`) VALUES
(1, 'Developer', 'developer', 'fas fa-fw fa-code', 1, 1),
(2, 'Administrasi', 'administrasi', 'fas fa-fw fa-users-cog', 1, 2),
(3, 'Master', 'master', 'fas fa-fw fa-database', 1, 3),
(4, 'Dashboard', 'dashboard', 'fas fa-fw fa-chart-line', 1, 6),
(5, 'Laporan', 'laporan', 'fas fa-fw fa-file-alt', 1, 5),
(6, 'Data', 'data', 'fas fa-fw fa-folder-open', 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_submodule`
--

CREATE TABLE `sys_submodule` (
  `id_submodule` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `title_submodule` varchar(128) NOT NULL,
  `url_submodule` varchar(32) NOT NULL,
  `icon_submodule` varchar(32) NOT NULL,
  `parent` int(8) NOT NULL,
  `status_submodule` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sys_submodule`
--

INSERT INTO `sys_submodule` (`id_submodule`, `module_id`, `title_submodule`, `url_submodule`, `icon_submodule`, `parent`, `status_submodule`) VALUES
(1, 1, 'Module', 'developer/index', 'fas fa-fw fa-folder-open', 1, 1),
(2, 1, 'Reset Pencarian', 'developer/reset', 'fas fa-fw fa-folder', 1, 0),
(3, 1, 'Tambah Module', 'developer/tambahmodule', 'fas fa-fw fa-folder', 1, 0),
(4, 1, 'Status Module', 'developer/statusmodule', 'fas fa-fw fa-folder', 1, 0),
(5, 1, 'Ubah Module', 'developer/ubahmodule', 'fas fa-fw fa-folder', 1, 0),
(6, 1, 'Hapus Module', 'developer/hapusmodule', 'fas fa-fw fa-folder', 1, 0),
(7, 1, 'Submodule', 'developer/submodule', 'fas fa-fw fa-folder', 7, 1),
(8, 1, 'Tambah Submodule', 'developer/tambahsubmodule', 'fas fa-fw fa-folder', 7, 0),
(9, 1, 'Function', 'developer/func', 'fas fa-fw fa-folder', 9, 1),
(10, 1, 'Ubah Submodule', 'developer/ubahsubmodule', 'fas fa-fw fa-folder', 7, 0),
(11, 1, 'Hapus Submodule', 'developer/hapussubmodule', 'fas fa-fw fa-folder', 7, 0),
(12, 2, 'Pengguna', 'administrasi/user', 'fas fa-fw fa-user', 12, 1),
(13, 2, 'Tambah User', 'administrasi/tambahuser', 'fas fa-fw fa-folder', 12, 0),
(14, 2, 'Reset Pencarian Admin', 'administrasi/reset', 'fas fa-fw fa-folder', 12, 0),
(15, 2, 'Tambah Function', 'developer/tambahfunc', 'fas fa-fw fa-folder', 9, 0),
(16, 2, 'Fungsi ubah status user', 'administrasi/statususer', 'fas fa-fw fa-folder', 12, 0),
(17, 2, 'Fungsi reset password', 'administrasi/resetpassword', 'fas fa-fw fa-lock', 12, 0),
(18, 2, 'Role/Peran', 'administrasi/role', 'fas fa-fw fa-user-cog', 18, 1),
(19, 2, 'Fungsi tambah role', 'administrasi/tambahrole', 'fas fa-fw fa-folder', 18, 0),
(20, 2, 'Fungsi ubah role', 'administrasi/ubahrole', 'fas fa-fw fa-folder', 18, 0),
(21, 2, 'Fungsi view all data', 'administrasi/alldata', 'fas fa-fw fa-folder', 18, 0),
(22, 2, 'Fungsi setting role', 'administrasi/roleset', 'fas fa-fw fa-folder', 18, 0),
(23, 2, 'Fungsi hapus role', 'administrasi/hapusrole', 'fas fa-fw fa-folder', 18, 0),
(24, 2, 'Tambah Akses', 'administrasi/tambahakses', 'fas fa-fw fa-folder', 18, 0),
(25, 2, 'Tambah Role Module', 'administrasi/tambahrolemodule', 'fas fa-fw fa-lock', 18, 0),
(26, 2, 'Hapus Role Module', 'administrasi/hapusrolemodule', 'fas fa-fw lock', 18, 0),
(27, 2, 'Hapus Akses', 'administrasi/hapusakses', 'fas fa-fw lock', 18, 0),
(28, 2, 'Tambah Sub Akses', 'administrasi/tambahsubakses', 'fas fa-fw fa-clock', 18, 0),
(29, 2, 'Hapus Sub Akses', 'administrasi/hapussubakses', 'fas fa-fw fa-clock', 18, 0),
(30, 2, 'Setting Home Page', 'administrasi/settinghomepage', 'fas fa-fw fa-lock', 18, 0),
(31, 2, 'Ubah User', 'administrasi/ubahuser', 'fas fa-fw fa-user', 18, 0),
(53, 3, 'Bengkel', 'master/bengkel', 'fas fa-fw fa-folder', 53, 0),
(54, 3, 'Reset', 'master/reset', 'fas fa-fw fa-folder', 55, 0),
(55, 3, 'Kategori', 'master/kategori', 'fas fa-fw fa-folder', 55, 1),
(57, 53, 'Kelola Bengkel', 'master/kelolabengkel', 'fas fa-fw fa-folder', 53, 0),
(58, 3, 'Data Kecamatan', 'master/getdatakec', 'fas fa-fw lock', 53, 0),
(59, 3, 'Data Kelurahan', 'master/getdatakel', 'fas fa-fw fa-folder', 53, 0),
(60, 3, 'Pelayanan', 'master/pelayanan', 'fas fa-fw fa-folder', 60, 1),
(62, 3, 'Tambah Bengkel', 'master/tambahbengkel', 'fas fa-fw fa-folder', 53, 0),
(63, 3, 'Ubah Bengkel', 'master/ubahbengkel', 'fas fa-fw fa-folder', 53, 0),
(64, 3, 'Layanan Bengkel', 'master/layanan', 'fas fa-fw fa-folder', 53, 0),
(65, 53, 'Tambah Layanan Bengke', 'master/tambahlayananbengkel', 'fas fa-fw fa-folder', 53, 0),
(66, 3, 'Hapus Layanan Bengkel', 'master/hapuslayananbengkel', 'fas fa-fw fa-folder', 53, 0),
(67, 3, 'Tambah Pelayanan', 'master/tambahpelayanan', 'fas fa-fw fa-folder', 60, 0),
(68, 3, 'Ubah Pelayanan', 'master/ubahpelayanan', 'fas fa-fw fa-folder', 60, 0),
(69, 3, 'Hapus Pelayanan', 'master/hapuspelayanan', 'fas fa-fw fa-folder', 60, 0),
(70, 3, 'Uploads File', 'master/upload', 'fas fa-fw fa-folder', 53, 0),
(71, 3, 'Tambah Data Bengkel', 'master/tambahdatabengkel', 'fas fa-fw fa-folder', 53, 0),
(74, 4, 'Beranda', 'dashboard/index', 'fas fa-fw fa-folder', 74, 1),
(75, 6, 'Bengkel', 'data/bengkel', 'fas fa-fw fa-folder-open', 75, 1),
(76, 6, 'Reset', 'data/reset', 'fas fa-fw fa-folder-open', 75, 0),
(77, 6, 'Kelola Bengkel', 'data/kelolabengkel', 'fas fa-fw fa-folder-open', 75, 0),
(78, 6, 'Ubah Data Bengkel', 'data/ubahbengkel', 'fas fa-fw fa-folder-open', 75, 0),
(79, 6, 'Tambah Layanan Bengkel', 'data/tambahlayananbengkel', 'fas fa-fw fa-folder-open', 75, 0),
(80, 6, 'Hapus Layanan Bengkel', 'data/hapuslayananbengkel', 'fas fa-fw fa-folder-open', 75, 0),
(81, 6, 'Hapus Foto', 'data/hapusfoto', 'fas fa-fw fa-folder-open', 75, 0),
(82, 6, 'Upload Foto', 'data/upload', 'fas fa-fw fa-folder-open', 75, 0),
(83, 6, 'Hapus Bengkel', 'data/hapusbengkel', 'fas fa-fw fa-folder-open', 75, 0),
(84, 5, 'Data Bengkel', 'laporan/bengkel', 'fas fa-fw fa-folder-open', 84, 1),
(85, 5, 'Reset', 'laporan/reset', 'fas fa-fw fa-folder-open', 84, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bengkel`
--

CREATE TABLE `tbl_bengkel` (
  `id_bengkel` int(11) NOT NULL,
  `noreg` varchar(16) NOT NULL,
  `nama_bengkel` varchar(64) NOT NULL,
  `kategori_kode` varchar(4) NOT NULL,
  `nama_pemilik` varchar(64) NOT NULL,
  `alamat_bengkel` text NOT NULL,
  `kec_id` varchar(16) NOT NULL,
  `kel_id` varchar(32) NOT NULL,
  `peta` varchar(128) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `hashtag` text NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `mdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bengkel`
--

INSERT INTO `tbl_bengkel` (`id_bengkel`, `noreg`, `nama_bengkel`, `kategori_kode`, `nama_pemilik`, `alamat_bengkel`, `kec_id`, `kel_id`, `peta`, `no_telp`, `hashtag`, `cdate`, `mdate`) VALUES
(1, 'R-220701.7681', 'SETYA', 'R2', 'SETYANTO', 'Jl. Merdeka', '', '', '', '081883222837', '#BENGKEL MOTOR#BENGKEL RODA DUA', '2022-07-01 17:38:30', '2022-07-18 07:25:18'),
(2, 'R-220707.3625', 'BENGKEL RONALD', 'R2', 'RONALD', '', '', '', '', '', '#bengkel', '2022-07-07 18:30:57', '2022-07-07 18:30:57'),
(3, 'R-220708.1209', 'RODA MAS', 'R2', 'MAS RUDI', 'Jl. Merdeka Timur', '', '', 'https://goo.gl/maps/F9fs47iYWgG53tis8', '081883222837', 'RODA MAS\r\n', '2022-07-08 01:31:22', '2022-07-26 07:50:30'),
(5, 'R-220718.0263', 'Agung Motor', 'R4P', 'Agung', 'Randusari, Teras, Boyolali', '330907', '3309072009', '', '082', '#bengkel mobil#bengkel roda 4', '2022-07-18 02:29:23', '2022-07-18 07:25:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id_foto` int(11) NOT NULL,
  `bengkel_kode` varchar(32) NOT NULL,
  `nama_file` varchar(32) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_foto`
--

INSERT INTO `tbl_foto` (`id_foto`, `bengkel_kode`, `nama_file`, `aktif`) VALUES
(1, 'R-220708.1209', '3_1.jpg', 1),
(4, 'R-220718.0263', '5_1.jpg', 1),
(8, 'R-220708.1209', '3_2.jpg', 0),
(9, 'R-220708.1209', '3_3.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(4) NOT NULL,
  `nama_kategori` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'R2', 'KENDARAAN RODA 2'),
(2, 'R4P', 'KENDARAAN RODA 4 ATAU LEBIH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_layananbengkel`
--

CREATE TABLE `tbl_layananbengkel` (
  `id_lb` int(11) NOT NULL,
  `noreg` varchar(16) NOT NULL,
  `ply_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_layananbengkel`
--

INSERT INTO `tbl_layananbengkel` (`id_lb`, `noreg`, `ply_id`) VALUES
(1, 'R-220708.1209', 1),
(2, 'R-220708.1209', 2),
(3, 'R-220708.1209', 3),
(4, 'R-220708.1209', 4),
(5, 'R-220718.0263', 2),
(6, 'R-220718.0263', 1),
(7, 'R-220718.0263', 3),
(8, 'R-220718.0263', 4),
(9, 'R-220718.0263', 5),
(10, 'R-220718.0263', 6),
(11, 'R-220718.0263', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelayanan`
--

CREATE TABLE `tbl_pelayanan` (
  `id_ply` int(11) NOT NULL,
  `kode_ply` varchar(8) NOT NULL,
  `nama_ply` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelayanan`
--

INSERT INTO `tbl_pelayanan` (`id_ply`, `kode_ply`, `nama_ply`) VALUES
(1, 'P1', 'Body Repair\r\n'),
(2, 'P2', 'Ganti Oli'),
(3, 'P3', 'Stel Velg'),
(4, 'P4', 'Tambal Ban'),
(5, 'P5', 'Shock Breaker'),
(6, 'P6', 'Rangka'),
(7, 'P7', 'Karoseri\r\n'),
(8, 'P8', 'Bengkel Mobil'),
(9, 'P9', 'Bengkel Sepeda Motor\r\n'),
(10, 'P10', 'Sparepart'),
(11, 'P11', 'Dinamo'),
(12, 'P12', 'Mesin'),
(13, 'P13', 'Kaki-kaki'),
(14, 'P14', 'AC (Air Conditioner)'),
(15, 'P15', 'Pintu'),
(16, 'P16', 'Radiator'),
(17, 'P17', 'Las'),
(18, 'P18', 'Spooring/Balancing'),
(19, 'P19', 'Variasi'),
(20, 'P20', 'Knalpot'),
(21, 'P21', 'Press Body (Motor)'),
(22, 'P22', 'Audio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(8) NOT NULL,
  `role` varchar(32) NOT NULL,
  `default_page` varchar(32) NOT NULL,
  `all_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `role`, `default_page`, `all_data`) VALUES
(1, 'Developer', 'developer/index', 1),
(2, 'Admin', 'administrasi/user', 1),
(3, 'User', 'administrasi/user', 0),
(4, 'Operator', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(2) NOT NULL,
  `reset` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL,
  `sort` int(4) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `role_id`, `reset`, `is_active`, `sort`) VALUES
(1, 'Developer', 'devel', '$2y$10$PhMGgy7JtJncO3sTmRXzjuhWjQDX1fLuNDuCt/lurQilPJtLV6Rs.', 1, '', 1, 0),
(2, 'Administrator', 'admin', '$2y$10$aZlH4PuBiJYzeeY1B76S2ODoL5qFXnP.P6liSFo/6OUti1/zFDi9S', 2, '', 1, 99),
(3, 'Pengguna Layanan', 'user', '$2y$10$jSMz65jKz/Q8Ts7slRvRPey3EluviU/kYgNTMlhaQQWtEv6eWN6o2', 3, 'admin20220616', 1, 99);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses`
--

CREATE TABLE `user_akses` (
  `id_ua` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_akses`
--

INSERT INTO `user_akses` (`id_ua`, `role_id`, `module_id`, `url`) VALUES
(1, 1, 1, 'developer/index'),
(2, 1, 1, 'developer/reset'),
(3, 1, 1, 'developer/tambahmodule'),
(4, 1, 1, 'developer/statusmodule'),
(5, 1, 1, 'developer/hapusmodule'),
(6, 1, 1, 'developer/ubahmodule'),
(7, 1, 1, 'developer/submodule'),
(8, 1, 1, 'developer/tambahsubmodule'),
(9, 1, 1, 'developer/func'),
(10, 1, 1, 'developer/ubahsubmodule'),
(11, 1, 2, 'administrasi/user'),
(12, 1, 2, 'administrasi/tambahuser'),
(13, 1, 2, 'administrasi/reset'),
(14, 1, 1, 'developer/tambahfunc'),
(15, 1, 2, 'administrasi/statususer'),
(16, 1, 2, 'administrasi/resetpassword'),
(17, 1, 2, 'administrasi/role'),
(18, 1, 2, 'administrasi/tambahrole'),
(19, 1, 2, 'administrasi/ubahrole'),
(20, 1, 2, 'administrasi/roleset'),
(21, 1, 2, 'administrasi/alldata'),
(22, 1, 2, 'administrasi/hapusrole'),
(23, 1, 2, 'administrasi/tambahakses'),
(29, 1, 2, 'administrasi/tambahrolemodule'),
(30, 1, 2, 'administrasi/hapusrolemodule'),
(40, 1, 2, 'administrasi/hapusakses'),
(45, 1, 2, 'administrasi/tambahsubakses'),
(46, 1, 2, 'administrasi/hapussubakses'),
(56, 3, 2, 'administrasi/user'),
(57, 1, 1, 'developer/hapussubmodule'),
(58, 2, 2, 'administrasi/user'),
(59, 2, 2, 'administrasi/role'),
(60, 2, 2, 'administrasi/tambahuser'),
(61, 2, 2, 'administrasi/statususer'),
(62, 2, 2, 'administrasi/resetpassword'),
(63, 2, 2, 'administrasi/tambahrole'),
(64, 2, 2, 'administrasi/ubahrole'),
(65, 2, 2, 'administrasi/alldata'),
(66, 2, 2, 'administrasi/roleset'),
(67, 2, 2, 'administrasi/hapusrole'),
(68, 2, 2, 'administrasi/tambahakses'),
(69, 2, 2, 'administrasi/tambahrolemodule'),
(70, 2, 2, 'administrasi/hapusrolemodule'),
(71, 2, 2, 'administrasi/hapusakses'),
(72, 2, 2, 'administrasi/tambahsubakses'),
(73, 2, 2, 'administrasi/hapussubakses'),
(74, 2, 2, 'administrasi/reset'),
(75, 1, 2, 'administrasi/settinghomepage'),
(76, 1, 2, 'administrasi/ubahuser'),
(77, 2, 2, 'administrasi/settinghomepage'),
(78, 2, 2, 'administrasi/ubahuser'),
(79, 1, 3, 'master/pegawai'),
(80, 1, 3, 'master/reset'),
(81, 1, 3, 'master/opd'),
(82, 1, 3, 'master/mesin'),
(83, 1, 3, 'master/pangkat'),
(84, 1, 3, 'master/jabatan'),
(85, 1, 3, 'master/golongan'),
(86, 1, 4, 'dokumen/sp'),
(87, 1, 4, 'dokumen/reset'),
(88, 1, 4, 'dokumen/tambahsp'),
(89, 1, 4, 'dokumen/ubahsp'),
(90, 1, 4, 'dokumen/hapussp'),
(91, 1, 4, 'dokumen/kelolasp'),
(92, 1, 4, 'dokumen/tambahanggotasp'),
(93, 1, 4, 'dokumen/pppsp'),
(94, 1, 4, 'dokumen/tambahtujuansp'),
(95, 1, 4, 'dokumen/ubahtujuansp'),
(96, 1, 4, 'dokumen/hapustujuansp'),
(97, 1, 4, 'dokumen/cetaksp'),
(98, 2, 3, 'master/mesin'),
(99, 2, 4, 'dokumen/sp'),
(100, 2, 4, 'dokumen/reset'),
(101, 2, 4, 'dokumen/tambahsp'),
(102, 2, 4, 'dokumen/ubahsp'),
(103, 2, 4, 'dokumen/hapussp'),
(104, 2, 4, 'dokumen/kelolasp'),
(105, 2, 4, 'dokumen/tambahanggotasp'),
(106, 2, 4, 'dokumen/pppsp'),
(107, 2, 4, 'dokumen/tambahtujuansp'),
(108, 2, 4, 'dokumen/ubahtujuansp'),
(109, 2, 4, 'dokumen/hapustujuansp'),
(110, 2, 4, 'dokumen/cetaksp'),
(111, 2, 3, 'master/reset'),
(112, 1, 3, 'master/kategori'),
(113, 1, 3, 'master/bengkel'),
(114, 1, 3, 'master/kelolabengkel'),
(115, 1, 3, 'master/getdatakec'),
(116, 1, 3, 'master/getdatakel'),
(117, 1, 3, 'master/pelayanan'),
(118, 1, 3, 'master/tambahbengkel'),
(119, 1, 3, 'master/ubahbengkel'),
(120, 1, 3, 'master/layanan'),
(121, 1, 3, 'master/tambahlayananbengkel'),
(122, 1, 3, 'master/hapuslayananbengkel'),
(123, 1, 3, 'master/tambahpelayanan'),
(124, 1, 3, 'master/ubahpelayanan'),
(125, 1, 3, 'master/hapuspelayanan'),
(126, 1, 3, 'master/upload'),
(127, 1, 3, 'master/tambahdatabengkel'),
(128, 1, 4, 'beranda/'),
(130, 1, 4, 'beranda/'),
(131, 1, 4, 'beranda/'),
(132, 1, 4, 'beranda/'),
(133, 1, 4, 'beranda/'),
(134, 1, 4, 'beranda/'),
(135, 1, 4, 'beranda/'),
(137, 1, 4, 'dashboard/index'),
(138, 1, 6, 'data/bengkel'),
(139, 1, 6, 'data/reset'),
(140, 1, 6, 'data/kelolabengkel'),
(141, 1, 6, 'data/ubahbengkel'),
(142, 1, 6, 'data/tambahlayananbengkel'),
(143, 1, 6, 'data/hapuslayananbengkel'),
(144, 1, 6, 'data/hapusfoto'),
(145, 1, 6, 'data/upload'),
(146, 1, 6, 'data/hapusbengkel'),
(147, 1, 5, 'laporan/bengkel'),
(148, 1, 5, 'laporan/reset');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indeks untuk tabel `role_module`
--
ALTER TABLE `role_module`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_submodule`
--
ALTER TABLE `role_submodule`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sys_module`
--
ALTER TABLE `sys_module`
  ADD PRIMARY KEY (`id_module`),
  ADD UNIQUE KEY `title_module` (`title_module`);

--
-- Indeks untuk tabel `sys_submodule`
--
ALTER TABLE `sys_submodule`
  ADD PRIMARY KEY (`id_submodule`),
  ADD UNIQUE KEY `url_submodule` (`url_submodule`),
  ADD KEY `module_id` (`module_id`);

--
-- Indeks untuk tabel `tbl_bengkel`
--
ALTER TABLE `tbl_bengkel`
  ADD PRIMARY KEY (`id_bengkel`),
  ADD UNIQUE KEY `noreg` (`noreg`);

--
-- Indeks untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_layananbengkel`
--
ALTER TABLE `tbl_layananbengkel`
  ADD PRIMARY KEY (`id_lb`);

--
-- Indeks untuk tabel `tbl_pelayanan`
--
ALTER TABLE `tbl_pelayanan`
  ADD PRIMARY KEY (`id_ply`),
  ADD UNIQUE KEY `kode_ply` (`kode_ply`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`,`role`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`,`username`);

--
-- Indeks untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`id_ua`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role_module`
--
ALTER TABLE `role_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `role_submodule`
--
ALTER TABLE `role_submodule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT untuk tabel `sys_module`
--
ALTER TABLE `sys_module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sys_submodule`
--
ALTER TABLE `sys_submodule`
  MODIFY `id_submodule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `tbl_bengkel`
--
ALTER TABLE `tbl_bengkel`
  MODIFY `id_bengkel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_layananbengkel`
--
ALTER TABLE `tbl_layananbengkel`
  MODIFY `id_lb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelayanan`
--
ALTER TABLE `tbl_pelayanan`
  MODIFY `id_ply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  MODIFY `id_ua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
