-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2019 pada 08.24
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cjfi`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `md_location` (`id_location` INTEGER(11))  BEGIN
     DELETE FROM location WHERE id_location=id_location;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `me_location` (`id_location` INTEGER(11), `location_namelama` VARCHAR(50))  BEGIN
     UPDATE location SET location_name=location_name
     WHERE id_location=id_location;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mi_location` (IN `location_name` VARCHAR(50))  BEGIN
	INSERT INTO location(location_name) VALUES(location_name);
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assets`
--

CREATE TABLE `assets` (
  `id_asset` int(11) NOT NULL,
  `asset_name` varchar(100) NOT NULL,
  `note_asset` text NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah_asset` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `assets`
--

INSERT INTO `assets` (`id_asset`, `asset_name`, `note_asset`, `id_jenis`, `jumlah_asset`, `status`) VALUES
(1, 'PC', 'Hitam', 1, 0, 0),
(2, 'Accura', 'Accounting System', 2, 0, 0),
(3, 'Absensi', 'Absensi Karyawan', 2, 0, 0),
(4, 'Mouse', 'Logitech / Merah', 1, 0, 0),
(5, 'Speaker Komputer', 'Simbadda', 1, 0, 0),
(6, 'Laptop', 'Acer Predator Nitro 5', 1, 0, 0),
(8, 'Monitor', '', 1, 0, 0),
(9, 'LAN', '', 1, 0, 0),
(10, 'Printer', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_bm` int(11) NOT NULL,
  `id_asset` int(11) DEFAULT NULL,
  `qty_in` int(11) DEFAULT NULL,
  `tgl_in` date DEFAULT NULL,
  `note_bm` text,
  `id_user` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status_rp` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_bm`, `id_asset`, `qty_in`, `tgl_in`, `note_bm`, `id_user`, `create_date`, `status_rp`) VALUES
(1, 9, 100, '2019-02-12', 'ok', 1, '2019-04-04', 0),
(2, 25, 100, '2019-03-19', 'ok', 1, '2019-04-04', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Action'),
(2, 'Animation'),
(3, 'Children'),
(4, 'Classics'),
(5, 'Comedy'),
(6, 'Documentary'),
(7, 'Drama'),
(8, 'Family'),
(9, 'Foreign'),
(10, 'Games'),
(11, 'Horror'),
(12, 'Music'),
(13, 'New'),
(14, 'Sci-Fi'),
(15, 'Sports'),
(16, 'Travel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dept`
--

CREATE TABLE `dept` (
  `id_dept` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `id_location` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dept`
--

INSERT INTO `dept` (`id_dept`, `dept_name`, `id_location`, `status`) VALUES
(1, 'HRD', 1, 0),
(2, 'Sales', 2, 0),
(3, 'IT', 1, 0),
(5, 'Purchasing', 1, 0),
(6, 'Depo Dept', 3, 0),
(7, 'Accounting', 4, 0),
(9, 'ok', 1, 0),
(10, 'asdasd', 1, 5),
(11, 'asd', 1, 5),
(12, 'asd', 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_asset`
--

CREATE TABLE `detail_asset` (
  `id_detail` int(11) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `basis` varchar(30) NOT NULL,
  `version_name` varchar(30) NOT NULL,
  `stock_asset` int(11) NOT NULL,
  `stock_user` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_asset`
--

INSERT INTO `detail_asset` (`id_detail`, `model_name`, `basis`, `version_name`, `stock_asset`, `stock_user`, `id_asset`, `status`) VALUES
(1, 'Intel Core i5 Ram 4gb', '', '', 0, 0, 1, 0),
(2, 'Logitech / Merah', '', '', 0, 0, 4, 0),
(3, 'Absensi Karyawan', 'WEB', '1.0.0', 0, 0, 3, 0),
(4, 'Accounting System', 'DESKTOP', '1.0.2', 0, 0, 2, 0),
(5, 'Simbadda', '', '', 0, 0, 5, 0),
(6, 'IBM : motherboard intel', '', '', 0, 0, 1, 0),
(7, 'Acer Predator', '', '', 0, 0, 4, 0),
(8, 'LG : Hitam', '', '', 0, 0, 4, 0),
(9, 'Acer Predator Nitro 5', '', '', 99, 0, 6, 0),
(10, 'Asus A450L core i5 ram 4gb', '', '', 0, 0, 6, 0),
(11, 'JBL Speaker', '', '', 0, 0, 5, 0),
(12, 'Logitech', '', '', 0, 0, 5, 0),
(24, 'Nexus', '', '', 0, 0, 4, 0),
(25, 'Acer 14 inch', '', '', 99, 0, 8, 0),
(26, 'LG 21 inch', '', '', 0, 0, 8, 0),
(27, 'RG 15', '', '', 0, 0, 9, 0),
(28, 'RG 45', '', '', 0, 0, 9, 0),
(31, 'Sony 25 Inch', '', '', 0, 0, 8, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemakaian`
--

CREATE TABLE `detail_pemakaian` (
  `id_dp` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `qty_dp` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pakai` date NOT NULL,
  `status_rp` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan_name` varchar(50) NOT NULL,
  `id_dept` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan_name`, `id_dept`, `status`) VALUES
(2, 'Admin Sales', 2, 0),
(3, 'IT Support', 3, 5),
(4, 'IT Programmer', 3, 0),
(5, 'IT Supervisor', 3, 0),
(6, 'IT Manager', 3, 0),
(7, 'Recruitment', 1, 0),
(8, 'Admin Gudang', 6, 0),
(9, 'Admin Kas', 7, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_asset`
--

CREATE TABLE `jenis_asset` (
  `id_jenis` int(11) NOT NULL,
  `jenis_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_asset`
--

INSERT INTO `jenis_asset` (`id_jenis`, `jenis_name`) VALUES
(1, 'HARDWARE'),
(2, 'SOFTWARE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id_location`, `location_name`, `status`) VALUES
(1, 'Pusat', 0),
(2, 'Cabang', 0),
(3, 'Depo Makassar', 0),
(4, 'Pabrik', 0),
(20, 'Pabrik Makassar', 0),
(23, 'Depo Solo', 0),
(24, 'Depo Makassar', 0),
(25, 'asdadasd', 5),
(26, 'Depo Jakarta Pusat', 0);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `mdet_location`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `mdet_location` (
`id_location` int(11)
,`location_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu_name` varchar(30) DEFAULT NULL,
  `menu_type` int(2) NOT NULL,
  `menu_link` text,
  `menu_level` varchar(50) DEFAULT NULL,
  `menu_icon` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `mv_dept`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `mv_dept` (
`id_dept` int(11)
,`dept_name` varchar(50)
,`id_location` int(11)
,`status` int(2)
,`id_location1` int(11)
,`location_name` varchar(50)
,`status1` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `m_location`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `m_location` (
`id_location` int(11)
,`location_name` varchar(50)
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `jenis_tr` int(2) NOT NULL,
  `no_pengajuan` varchar(50) NOT NULL,
  `work_priority` varchar(20) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `tgl_butuh` datetime NOT NULL,
  `periode` varchar(20) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_proses` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `note` text NOT NULL,
  `id_technisi` int(11) NOT NULL,
  `status_pengajuan` int(11) NOT NULL,
  `proses_pengajuan` int(2) NOT NULL,
  `pemakaian` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `jenis_tr`, `no_pengajuan`, `work_priority`, `id_asset`, `tgl_pengajuan`, `tgl_butuh`, `periode`, `tahun`, `id_user`, `tgl_proses`, `tgl_selesai`, `note`, `id_technisi`, `status_pengajuan`, `proses_pengajuan`, `pemakaian`) VALUES
(1, 0, '1/04/2019', 'Normal', 6, '2019-04-04 10:32:22', '0000-00-00 00:00:00', '04', '2019', 2, '2019-04-04 10:32:39', '2019-04-04 11:00:25', 'cek', 1, 5, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_detail`
--

CREATE TABLE `pengajuan_detail` (
  `id_det` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `note` text NOT NULL,
  `tgl_detail` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_detail`
--

INSERT INTO `pengajuan_detail` (`id_det`, `id_pengajuan`, `id_status`, `note`, `tgl_detail`, `id_user`) VALUES
(1, 1, 0, 'cek', '2019-04-04 10:32:22', 2),
(2, 1, 1, 'Akan Kami Proses Pengajuan Anda', '2019-04-04 10:32:39', 1),
(3, 1, 3, 'vendor', '2019-04-04 10:32:53', 1),
(4, 1, 2, 'ok', '2019-04-04 11:00:25', 1),
(5, 1, 5, 'Terima Kasih', '2019-04-04 11:26:17', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `productCode` varchar(15) NOT NULL,
  `productName` varchar(70) NOT NULL,
  `productLine` varchar(50) NOT NULL,
  `productScale` varchar(10) NOT NULL,
  `productVendor` varchar(50) NOT NULL,
  `productDescription` text NOT NULL,
  `quantityInStock` smallint(6) NOT NULL,
  `buyPrice` double NOT NULL,
  `MSRP` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`productCode`, `productName`, `productLine`, `productScale`, `productVendor`, `productDescription`, `quantityInStock`, `buyPrice`, `MSRP`) VALUES
('S10_1678', '1969 Harley Davidson Ultimate Chopper', 'Motorcycles', '1:10', 'Min Lin Diecast', 'This replica features working kickstand, front suspension, gear-shift lever, footbrake lever, drive chain, wheels and steering. All parts are particularly delicate due to their precise scale and require special care and attention.', 7933, 48.81, 95.7),
('S10_1949', '1952 Alpine Renault 1300', 'Classic Cars', '1:10', 'Classic Metal Creations', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 7305, 98.58, 214.3),
('S10_2016', '1996 Moto Guzzi 1100i', 'Motorcycles', '1:10', 'Highway 66 Mini Classics', 'Official Moto Guzzi logos and insignias, saddle bags located on side of motorcycle, detailed engine, working steering, working suspension, two leather seats, luggage rack, dual exhaust pipes, small saddle bag located on handle bars, two-tone paint with chrome accents, superior die-cast detail , rotating wheels , working kick stand, diecast metal with plastic parts and baked enamel finish.', 6625, 68.99, 118.94),
('S10_4698', '2003 Harley-Davidson Eagle Drag Bike', 'Motorcycles', '1:10', 'Red Start Diecast', 'Model features, official Harley Davidson logos and insignias, detachable rear wheelie bar, heavy diecast metal with resin parts, authentic multi-color tampo-printed graphics, separate engine drive belts, free-turning front fork, rotating tires and rear racing slick, certificate of authenticity, detailed engine, display stand\r\n, precision diecast replica, baked enamel finish, 1:10 scale model, removable fender, seat and tank cover piece for displaying the superior detail of the v-twin engine', 5582, 91.02, 193.66),
('S10_4757', '1972 Alfa Romeo GTA', 'Classic Cars', '1:10', 'Motor City Art Classics', 'Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 3252, 85.68, 136),
('S10_4962', '1962 LanciaA Delta 16V', 'Classic Cars', '1:10', 'Second Gear Diecast', 'Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6791, 103.42, 147.74),
('S12_1099', '1968 Ford Mustang', 'Classic Cars', '1:12', 'Autoart Studio Design', 'Hood, doors and trunk all open to reveal highly detailed interior features. Steering wheel actually turns the front wheels. Color dark green.', 68, 95.34, 194.57),
('S12_1108', '2001 Ferrari Enzo', 'Classic Cars', '1:12', 'Second Gear Diecast', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 3619, 95.59, 207.8),
('S12_1666', '1958 Setra Bus', 'Trucks and Buses', '1:12', 'Welly Diecast Productions', 'Model features 30 windows, skylights & glare resistant glass, working steering system, original logos', 1579, 77.9, 136.67),
('S12_2823', '2002 Suzuki XREO', 'Motorcycles', '1:12', 'Unimax Art Galleries', 'Official logos and insignias, saddle bags located on side of motorcycle, detailed engine, working steering, working suspension, two leather seats, luggage rack, dual exhaust pipes, small saddle bag located on handle bars, two-tone paint with chrome accents, superior die-cast detail , rotating wheels , working kick stand, diecast metal with plastic parts and baked enamel finish.', 9997, 66.27, 150.62),
('S12_3148', '1969 Corvair Monza', 'Classic Cars', '1:18', 'Welly Diecast Productions', '1:18 scale die-cast about 10\" long doors open, hood opens, trunk opens and wheels roll', 6906, 89.14, 151.08),
('S12_3380', '1968 Dodge Charger', 'Classic Cars', '1:12', 'Welly Diecast Productions', '1:12 scale model of a 1968 Dodge Charger. Hood, doors and trunk all open to reveal highly detailed interior features. Steering wheel actually turns the front wheels. Color black', 9123, 75.16, 117.44),
('S12_3891', '1969 Ford Falcon', 'Classic Cars', '1:12', 'Second Gear Diecast', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 1049, 83.05, 173.02),
('S12_3990', '1970 Plymouth Hemi Cuda', 'Classic Cars', '1:12', 'Studio M Art Models', 'Very detailed 1970 Plymouth Cuda model in 1:12 scale. The Cuda is generally accepted as one of the fastest original muscle cars from the 1970s. This model is a reproduction of one of the orginal 652 cars built in 1970. Red color.', 5663, 31.92, 79.8),
('S12_4473', '1957 Chevy Pickup', 'Trucks and Buses', '1:12', 'Exoto Designs', '1:12 scale die-cast about 20\" long Hood opens, Rubber wheels', 6125, 55.7, 118.5),
('S12_4675', '1969 Dodge Charger', 'Classic Cars', '1:12', 'Welly Diecast Productions', 'Detailed model of the 1969 Dodge Charger. This model includes finely detailed interior and exterior features. Painted in red and white.', 7323, 58.73, 115.16),
('S18_1097', '1940 Ford Pickup Truck', 'Trucks and Buses', '1:18', 'Studio M Art Models', 'This model features soft rubber tires, working steering, rubber mud guards, authentic Ford logos, detailed undercarriage, opening doors and hood,  removable split rear gate, full size spare mounted in bed, detailed interior with opening glove box', 2613, 58.33, 116.67),
('S18_1129', '1993 Mazda RX-7', 'Classic Cars', '1:18', 'Highway 66 Mini Classics', 'This model features, opening hood, opening doors, detailed engine, rear spoiler, opening trunk, working steering, tinted windows, baked enamel finish. Color red.', 3975, 83.51, 141.54),
('S18_1342', '1937 Lincoln Berline', 'Vintage Cars', '1:18', 'Motor City Art Classics', 'Features opening engine cover, doors, trunk, and fuel filler cap. Color black', 8693, 60.62, 102.74),
('S18_1367', '1936 Mercedes-Benz 500K Special Roadster', 'Vintage Cars', '1:18', 'Studio M Art Models', 'This 1:18 scale replica is constructed of heavy die-cast metal and has all the features of the original: working doors and rumble seat, independent spring suspension, detailed interior, working steering system, and a bifold hood that reveals an engine so accurate that it even includes the wiring. All this is topped off with a baked enamel finish. Color white.', 8635, 24.26, 53.91),
('S18_1589', '1965 Aston Martin DB5', 'Classic Cars', '1:18', 'Classic Metal Creations', 'Die-cast model of the silver 1965 Aston Martin DB5 in silver. This model includes full wire wheels and doors that open with fully detailed passenger compartment. In 1:18 scale, this model measures approximately 10 inches/20 cm long.', 9042, 65.96, 124.44),
('S18_1662', '1980s Black Hawk Helicopter', 'Planes', '1:18', 'Red Start Diecast', '1:18 scale replica of actual Army\'s UH-60L BLACK HAWK Helicopter. 100% hand-assembled. Features rotating rotor blades, propeller blades and rubber wheels.', 5330, 77.27, 157.69),
('S18_1749', '1917 Grand Touring Sedan', 'Vintage Cars', '1:18', 'Welly Diecast Productions', 'This 1:18 scale replica of the 1917 Grand Touring car has all the features you would expect from museum quality reproductions: all four doors and bi-fold hood opening, detailed engine and instrument panel, chrome-look trim, and tufted upholstery, all topped off with a factory baked-enamel finish.', 2724, 86.7, 170),
('S18_1889', '1948 Porsche 356-A Roadster', 'Classic Cars', '1:18', 'Gearbox Collectibles', 'This precision die-cast replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 8826, 53.9, 77),
('S18_1984', '1995 Honda Civic', 'Classic Cars', '1:18', 'Min Lin Diecast', 'This model features, opening hood, opening doors, detailed engine, rear spoiler, opening trunk, working steering, tinted windows, baked enamel finish. Color yellow.', 9772, 93.89, 142.25),
('S18_2238', '1998 Chrysler Plymouth Prowler', 'Classic Cars', '1:18', 'Gearbox Collectibles', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 4724, 101.51, 163.73),
('S18_2248', '1911 Ford Town Car', 'Vintage Cars', '1:18', 'Motor City Art Classics', 'Features opening hood, opening doors, opening trunk, wide white wall tires, front door arm rests, working steering system.', 540, 33.3, 60.54),
('S18_2319', '1964 Mercedes Tour Bus', 'Trucks and Buses', '1:18', 'Unimax Art Galleries', 'Exact replica. 100+ parts. working steering system, original logos', 8258, 74.86, 122.73),
('S18_2325', '1932 Model A Ford J-Coupe', 'Vintage Cars', '1:18', 'Autoart Studio Design', 'This model features grille-mounted chrome horn, lift-up louvered hood, fold-down rumble seat, working steering system, chrome-covered spare, opening doors, detailed and wired engine', 9354, 58.48, 127.13),
('S18_2432', '1926 Ford Fire Engine', 'Trucks and Buses', '1:18', 'Carousel DieCast Legends', 'Gleaming red handsome appearance. Everything is here the fire hoses, ladder, axes, bells, lanterns, ready to fight any inferno.', 2018, 24.92, 60.77),
('S18_2581', 'P-51-D Mustang', 'Planes', '1:72', 'Gearbox Collectibles', 'Has retractable wheels and comes with a stand', 992, 49, 84.48),
('S18_2625', '1936 Harley Davidson El Knucklehead', 'Motorcycles', '1:18', 'Welly Diecast Productions', 'Intricately detailed with chrome accents and trim, official die-struck logos and baked enamel finish.', 4357, 24.23, 60.57),
('S18_2795', '1928 Mercedes-Benz SSK', 'Vintage Cars', '1:18', 'Gearbox Collectibles', 'This 1:18 replica features grille-mounted chrome horn, lift-up louvered hood, fold-down rumble seat, working steering system, chrome-covered spare, opening doors, detailed and wired engine. Color black.', 548, 72.56, 168.75),
('S18_2870', '1999 Indy 500 Monte Carlo SS', 'Classic Cars', '1:18', 'Red Start Diecast', 'Features include opening and closing doors. Color: Red', 8164, 56.76, 132),
('S18_2949', '1913 Ford Model T Speedster', 'Vintage Cars', '1:18', 'Carousel DieCast Legends', 'This 250 part reproduction includes moving handbrakes, clutch, throttle and foot pedals, squeezable horn, detailed wired engine, removable water, gas, and oil cans, pivoting monocle windshield, all topped with a baked enamel red finish. Each replica comes with an Owners Title and Certificate of Authenticity. Color red.', 4189, 60.78, 101.31),
('S18_2957', '1934 Ford V8 Coupe', 'Vintage Cars', '1:18', 'Min Lin Diecast', 'Chrome Trim, Chrome Grille, Opening Hood, Opening Doors, Opening Trunk, Detailed Engine, Working Steering System', 5649, 34.35, 62.46),
('S18_3029', '1999 Yamaha Speed Boat', 'Ships', '1:18', 'Min Lin Diecast', 'Exact replica. Wood and Metal. Many extras including rigging, long boats, pilot house, anchors, etc. Comes with three masts, all square-rigged.', 4259, 51.61, 86.02),
('S18_3136', '18th Century Vintage Horse Carriage', 'Vintage Cars', '1:18', 'Red Start Diecast', 'Hand crafted diecast-like metal horse carriage is re-created in about 1:18 scale of antique horse carriage. This antique style metal Stagecoach is all hand-assembled with many different parts.\r\n\r\nThis collectible metal horse carriage is painted in classic Red, and features turning steering wheel and is entirely hand-finished.', 5992, 60.74, 104.72),
('S18_3140', '1903 Ford Model A', 'Vintage Cars', '1:18', 'Unimax Art Galleries', 'Features opening trunk,  working steering system', 3913, 68.3, 136.59),
('S18_3232', '1992 Ferrari 360 Spider red', 'Classic Cars', '1:18', 'Unimax Art Galleries', 'his replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 8347, 77.9, 169.34),
('S18_3233', '1985 Toyota Supra', 'Classic Cars', '1:18', 'Highway 66 Mini Classics', 'This model features soft rubber tires, working steering, rubber mud guards, authentic Ford logos, detailed undercarriage, opening doors and hood, removable split rear gate, full size spare mounted in bed, detailed interior with opening glove box', 7733, 57.01, 107.57),
('S18_3259', 'Collectable Wooden Train', 'Trains', '1:18', 'Carousel DieCast Legends', 'Hand crafted wooden toy train set is in about 1:18 scale, 25 inches in total length including 2 additional carts, of actual vintage train. This antique style wooden toy train model set is all hand-assembled with 100% wood.', 6450, 67.56, 100.84),
('S18_3278', '1969 Dodge Super Bee', 'Classic Cars', '1:18', 'Min Lin Diecast', 'This replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 1917, 49.05, 80.41),
('S18_3320', '1917 Maxwell Touring Car', 'Vintage Cars', '1:18', 'Exoto Designs', 'Features Gold Trim, Full Size Spare Tire, Chrome Trim, Chrome Grille, Opening Hood, Opening Doors, Opening Trunk, Detailed Engine, Working Steering System', 7913, 57.54, 99.21),
('S18_3482', '1976 Ford Gran Torino', 'Classic Cars', '1:18', 'Gearbox Collectibles', 'Highly detailed 1976 Ford Gran Torino \"Starsky and Hutch\" diecast model. Very well constructed and painted in red and white patterns.', 9127, 73.49, 146.99),
('S18_3685', '1948 Porsche Type 356 Roadster', 'Classic Cars', '1:18', 'Gearbox Collectibles', 'This model features working front and rear suspension on accurately replicated and actuating shock absorbers as well as opening engine cover, rear stabilizer flap,  and 4 opening doors.', 8990, 62.16, 141.28),
('S18_3782', '1957 Vespa GS150', 'Motorcycles', '1:18', 'Studio M Art Models', 'Features rotating wheels , working kick stand. Comes with stand.', 7689, 32.95, 62.17),
('S18_3856', '1941 Chevrolet Special Deluxe Cabriolet', 'Vintage Cars', '1:18', 'Exoto Designs', 'Features opening hood, opening doors, opening trunk, wide white wall tires, front door arm rests, working steering system, leather upholstery. Color black.', 2378, 64.58, 105.87),
('S18_4027', '1970 Triumph Spitfire', 'Classic Cars', '1:18', 'Min Lin Diecast', 'Features include opening and closing doors. Color: White.', 5545, 91.92, 143.62),
('S18_4409', '1932 Alfa Romeo 8C2300 Spider Sport', 'Vintage Cars', '1:18', 'Exoto Designs', 'This 1:18 scale precision die cast replica features the 6 front headlights of the original, plus a detailed version of the 142 horsepower straight 8 engine, dual spares and their famous comprehensive dashboard. Color black.', 6553, 43.26, 92.03),
('S18_4522', '1904 Buick Runabout', 'Vintage Cars', '1:18', 'Exoto Designs', 'Features opening trunk,  working steering system', 8290, 52.66, 87.77),
('S18_4600', '1940s Ford truck', 'Trucks and Buses', '1:18', 'Motor City Art Classics', 'This 1940s Ford Pick-Up truck is re-created in 1:18 scale of original 1940s Ford truck. This antique style metal 1940s Ford Flatbed truck is all hand-assembled. This collectible 1940\'s Pick-Up truck is painted in classic dark green color, and features rotating wheels.', 3128, 84.76, 121.08),
('S18_4668', '1939 Cadillac Limousine', 'Vintage Cars', '1:18', 'Studio M Art Models', 'Features completely detailed interior including Velvet flocked drapes,deluxe wood grain floor, and a wood grain casket with seperate chrome handles', 6645, 23.14, 50.31),
('S18_4721', '1957 Corvette Convertible', 'Classic Cars', '1:18', 'Classic Metal Creations', '1957 die cast Corvette Convertible in Roman Red with white sides and whitewall tires. 1:18 scale quality die-cast with detailed engine and underbvody. Now you can own The Classic Corvette.', 1249, 69.93, 148.8),
('S18_4933', '1957 Ford Thunderbird', 'Classic Cars', '1:18', 'Studio M Art Models', 'This 1:18 scale precision die-cast replica, with its optional porthole hardtop and factory baked-enamel Thunderbird Bronze finish, is a 100% accurate rendition of this American classic.', 3209, 34.21, 71.27),
('S24_1046', '1970 Chevy Chevelle SS 454', 'Classic Cars', '1:24', 'Unimax Art Galleries', 'This model features rotating wheels, working streering system and opening doors. All parts are particularly delicate due to their precise scale and require special care and attention. It should not be picked up by the doors, roof, hood or trunk.', 1005, 49.24, 73.49),
('S24_1444', '1970 Dodge Coronet', 'Classic Cars', '1:24', 'Highway 66 Mini Classics', '1:24 scale die-cast about 18\" long doors open, hood opens and rubber wheels', 4074, 32.37, 57.8),
('S24_1578', '1997 BMW R 1100 S', 'Motorcycles', '1:24', 'Autoart Studio Design', 'Detailed scale replica with working suspension and constructed from over 70 parts', 7003, 60.86, 112.7),
('S24_1628', '1966 Shelby Cobra 427 S/C', 'Classic Cars', '1:24', 'Carousel DieCast Legends', 'This diecast model of the 1966 Shelby Cobra 427 S/C includes many authentic details and operating parts. The 1:24 scale model of this iconic lighweight sports car from the 1960s comes in silver and it\'s own display case.', 8197, 29.18, 50.31),
('S24_1785', '1928 British Royal Navy Airplane', 'Planes', '1:24', 'Classic Metal Creations', 'Official logos and insignias', 3627, 66.74, 109.42),
('S24_1937', '1939 Chevrolet Deluxe Coupe', 'Vintage Cars', '1:24', 'Motor City Art Classics', 'This 1:24 scale die-cast replica of the 1939 Chevrolet Deluxe Coupe has the same classy look as the original. Features opening trunk, hood and doors and a showroom quality baked enamel finish.', 7332, 22.57, 33.19),
('S24_2000', '1960 BSA Gold Star DBD34', 'Motorcycles', '1:24', 'Highway 66 Mini Classics', 'Detailed scale replica with working suspension and constructed from over 70 parts', 15, 37.32, 76.17),
('S24_2011', '18th century schooner', 'Ships', '1:24', 'Carousel DieCast Legends', 'All wood with canvas sails. Many extras including rigging, long boats, pilot house, anchors, etc. Comes with 4 masts, all square-rigged.', 1898, 82.34, 122.89),
('S24_2022', '1938 Cadillac V-16 Presidential Limousine', 'Vintage Cars', '1:24', 'Classic Metal Creations', 'This 1:24 scale precision die cast replica of the 1938 Cadillac V-16 Presidential Limousine has all the details of the original, from the flags on the front to an opening back seat compartment complete with telephone and rifle. Features factory baked-enamel black finish, hood goddess ornament, working jump seats.', 2847, 20.61, 44.8),
('S24_2300', '1962 Volkswagen Microbus', 'Trucks and Buses', '1:24', 'Autoart Studio Design', 'This 1:18 scale die cast replica of the 1962 Microbus is loaded with features: A working steering system, opening front doors and tailgate, and famous two-tone factory baked enamel finish, are all topped of by the sliding, real fabric, sunroof.', 2327, 61.34, 127.79),
('S24_2360', '1982 Ducati 900 Monster', 'Motorcycles', '1:24', 'Highway 66 Mini Classics', 'Features two-tone paint with chrome accents, superior die-cast detail , rotating wheels , working kick stand', 6840, 47.1, 69.26),
('S24_2766', '1949 Jaguar XK 120', 'Classic Cars', '1:24', 'Classic Metal Creations', 'Precision-engineered from original Jaguar specification in perfect scale ratio. Features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 2350, 47.25, 90.87),
('S24_2840', '1958 Chevy Corvette Limited Edition', 'Classic Cars', '1:24', 'Carousel DieCast Legends', 'The operating parts of this 1958 Chevy Corvette Limited Edition are particularly delicate due to their precise scale and require special care and attention. Features rotating wheels, working streering, opening doors and trunk. Color dark green.', 2542, 15.91, 35.36),
('S24_2841', '1900s Vintage Bi-Plane', 'Planes', '1:24', 'Autoart Studio Design', 'Hand crafted diecast-like metal bi-plane is re-created in about 1:24 scale of antique pioneer airplane. All hand-assembled with many different parts. Hand-painted in classic yellow and features correct markings of original airplane.', 5942, 34.25, 68.51),
('S24_2887', '1952 Citroen-15CV', 'Classic Cars', '1:24', 'Exoto Designs', 'Precision crafted hand-assembled 1:18 scale reproduction of the 1952 15CV, with its independent spring suspension, working steering system, opening doors and hood, detailed engine and instrument panel, all topped of with a factory fresh baked enamel finish.', 1452, 72.82, 117.44),
('S24_2972', '1982 Lamborghini Diablo', 'Classic Cars', '1:24', 'Second Gear Diecast', 'This replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 7723, 16.24, 37.76),
('S24_3151', '1912 Ford Model T Delivery Wagon', 'Vintage Cars', '1:24', 'Min Lin Diecast', 'This model features chrome trim and grille, opening hood, opening doors, opening trunk, detailed engine, working steering system. Color white.', 9173, 46.91, 88.51),
('S24_3191', '1969 Chevrolet Camaro Z28', 'Classic Cars', '1:24', 'Exoto Designs', '1969 Z/28 Chevy Camaro 1:24 scale replica. The operating parts of this limited edition 1:24 scale diecast model car 1969 Chevy Camaro Z28- hood, trunk, wheels, streering, suspension and doors- are particularly delicate due to their precise scale and require special care and attention.', 4695, 50.51, 85.61),
('S24_3371', '1971 Alpine Renault 1600s', 'Classic Cars', '1:24', 'Welly Diecast Productions', 'This 1971 Alpine Renault 1600s replica Features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 7995, 38.58, 61.23),
('S24_3420', '1937 Horch 930V Limousine', 'Vintage Cars', '1:24', 'Autoart Studio Design', 'Features opening hood, opening doors, opening trunk, wide white wall tires, front door arm rests, working steering system', 2902, 26.3, 65.75),
('S24_3432', '2002 Chevy Corvette', 'Classic Cars', '1:24', 'Gearbox Collectibles', 'The operating parts of this limited edition Diecast 2002 Chevy Corvette 50th Anniversary Pace car Limited Edition are particularly delicate due to their precise scale and require special care and attention. Features rotating wheels, poseable streering, opening doors and trunk.', 9446, 62.11, 107.08),
('S24_3816', '1940 Ford Delivery Sedan', 'Vintage Cars', '1:24', 'Carousel DieCast Legends', 'Chrome Trim, Chrome Grille, Opening Hood, Opening Doors, Opening Trunk, Detailed Engine, Working Steering System. Color black.', 6621, 48.64, 83.86),
('S24_3856', '1956 Porsche 356A Coupe', 'Classic Cars', '1:18', 'Classic Metal Creations', 'Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6600, 98.3, 140.43),
('S24_3949', 'Corsair F4U ( Bird Cage)', 'Planes', '1:24', 'Second Gear Diecast', 'Has retractable wheels and comes with a stand. Official logos and insignias.', 6812, 29.34, 68.24),
('S24_3969', '1936 Mercedes Benz 500k Roadster', 'Vintage Cars', '1:24', 'Red Start Diecast', 'This model features grille-mounted chrome horn, lift-up louvered hood, fold-down rumble seat, working steering system and rubber wheels. Color black.', 2081, 21.75, 41.03),
('S24_4048', '1992 Porsche Cayenne Turbo Silver', 'Classic Cars', '1:24', 'Exoto Designs', 'This replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 6582, 69.78, 118.28),
('S24_4258', '1936 Chrysler Airflow', 'Vintage Cars', '1:24', 'Second Gear Diecast', 'Features opening trunk,  working steering system. Color dark green.', 4710, 57.46, 97.39),
('S24_4278', '1900s Vintage Tri-Plane', 'Planes', '1:24', 'Unimax Art Galleries', 'Hand crafted diecast-like metal Triplane is Re-created in about 1:24 scale of antique pioneer airplane. This antique style metal triplane is all hand-assembled with many different parts.', 2756, 36.23, 72.45),
('S24_4620', '1961 Chevrolet Impala', 'Classic Cars', '1:18', 'Classic Metal Creations', 'This 1:18 scale precision die-cast reproduction of the 1961 Chevrolet Impala has all the features-doors, hood and trunk that open; detailed 409 cubic-inch engine; chrome dashboard and stick shift, two-tone interior; working steering system; all topped of with a factory baked-enamel finish.', 7869, 32.33, 80.84),
('S32_1268', '1980’s GM Manhattan Express', 'Trucks and Buses', '1:32', 'Motor City Art Classics', 'This 1980’s era new look Manhattan express is still active, running from the Bronx to mid-town Manhattan. Has 35 opeining windows and working lights. Needs a battery.', 5099, 53.93, 96.31),
('S32_1374', '1997 BMW F650 ST', 'Motorcycles', '1:32', 'Exoto Designs', 'Features official die-struck logos and baked enamel finish. Comes with stand.', 178, 66.92, 99.89),
('S32_2206', '1982 Ducati 996 R', 'Motorcycles', '1:32', 'Gearbox Collectibles', 'Features rotating wheels , working kick stand. Comes with stand.', 9241, 24.14, 40.23),
('S32_2509', '1954 Greyhound Scenicruiser', 'Trucks and Buses', '1:32', 'Classic Metal Creations', 'Model features bi-level seating, 50 windows, skylights & glare resistant glass, working steering system, original logos', 2874, 25.98, 54.11),
('S32_3207', '1950\'s Chicago Surface Lines Streetcar', 'Trains', '1:32', 'Gearbox Collectibles', 'This streetcar is a joy to see. It has 80 separate windows, electric wire guides, detailed interiors with seats, poles and drivers controls, rolling and turning wheel assemblies, plus authentic factory baked-enamel finishes (Green Hornet for Chicago and Cream and Crimson for Boston).', 8601, 26.72, 62.14),
('S32_3522', '1996 Peterbilt 379 Stake Bed with Outrigger', 'Trucks and Buses', '1:32', 'Red Start Diecast', 'This model features, opening doors, detailed engine, working steering, tinted windows, detailed interior, die-struck logos, removable stakes operating outriggers, detachable second trailer, functioning 360-degree self loader, precision molded resin trailer and trim, baked enamel finish on cab', 814, 33.61, 64.64),
('S32_4289', '1928 Ford Phaeton Deluxe', 'Vintage Cars', '1:32', 'Highway 66 Mini Classics', 'This model features grille-mounted chrome horn, lift-up louvered hood, fold-down rumble seat, working steering system', 136, 33.02, 68.79),
('S32_4485', '1974 Ducati 350 Mk3 Desmo', 'Motorcycles', '1:32', 'Second Gear Diecast', 'This model features two-tone paint with chrome accents, superior die-cast detail , rotating wheels , working kick stand', 3341, 56.13, 102.05),
('S50_1341', '1930 Buick Marquette Phaeton', 'Vintage Cars', '1:50', 'Studio M Art Models', 'Features opening trunk,  working steering system', 7062, 27.06, 43.64),
('S50_1392', 'Diamond T620 Semi-Skirted Tanker', 'Trucks and Buses', '1:50', 'Highway 66 Mini Classics', 'This limited edition model is licensed and perfectly scaled for Lionel Trains. The Diamond T620 has been produced in solid precision diecast and painted with a fire baked enamel finish. It comes with a removable tanker and is a perfect model to add authenticity to your static train or car layout or to just have on display.', 1016, 68.29, 115.75),
('S50_1514', '1962 City of Detroit Streetcar', 'Trains', '1:50', 'Classic Metal Creations', 'This streetcar is a joy to see. It has 99 separate windows, electric wire guides, detailed interiors with seats, poles and drivers controls, rolling and turning wheel assemblies, plus authentic factory baked-enamel finishes (Green Hornet for Chicago and Cream and Crimson for Boston).', 1645, 37.49, 58.58),
('S50_4713', '2002 Yamaha YZR M1', 'Motorcycles', '1:50', 'Autoart Studio Design', 'Features rotating wheels , working kick stand. Comes with stand.', 600, 34.17, 81.36),
('S700_1138', 'The Schooner Bluenose', 'Ships', '1:700', 'Autoart Studio Design', 'All wood with canvas sails. Measures 31 1/2 inches in Length, 22 inches High and 4 3/4 inches Wide. Many extras.\r\nThe schooner Bluenose was built in Nova Scotia in 1921 to fish the rough waters off the coast of Newfoundland. Because of the Bluenose racing prowess she became the pride of all Canadians. Still featured on stamps and the Canadian dime, the Bluenose was lost off Haiti in 1946.', 1897, 34, 66.67),
('S700_1691', 'American Airlines: B767-300', 'Planes', '1:700', 'Min Lin Diecast', 'Exact replia with official logos and insignias and retractable wheels', 5841, 51.15, 91.34),
('S700_1938', 'The Mayflower', 'Ships', '1:700', 'Studio M Art Models', 'Measures 31 1/2 inches Long x 25 1/2 inches High x 10 5/8 inches Wide\r\nAll wood with canvas sail. Extras include long boats, rigging, ladders, railing, anchors, side cannons, hand painted, etc.', 737, 43.3, 86.61),
('S700_2047', 'HMS Bounty', 'Ships', '1:700', 'Unimax Art Galleries', 'Measures 30 inches Long x 27 1/2 inches High x 4 3/4 inches Wide. \r\nMany extras including rigging, long boats, pilot house, anchors, etc. Comes with three masts, all square-rigged.', 3501, 39.83, 90.52),
('S700_2466', 'America West Airlines B757-200', 'Planes', '1:700', 'Motor City Art Classics', 'Official logos and insignias. Working steering system. Rotating jet engines', 9653, 68.8, 99.72),
('S700_2610', 'The USS Constitution Ship', 'Ships', '1:700', 'Red Start Diecast', 'All wood with canvas sails. Measures 31 1/2\" Length x 22 3/8\" High x 8 1/4\" Width. Extras include 4 boats on deck, sea sprite on bow, anchors, copper railing, pilot houses, etc.', 7083, 33.97, 72.28),
('S700_2824', '1982 Camaro Z28', 'Classic Cars', '1:18', 'Carousel DieCast Legends', 'Features include opening and closing doors. Color: White. \r\nMeasures approximately 9 1/2\" Long.', 6934, 46.53, 101.15),
('S700_2834', 'ATA: B757-300', 'Planes', '1:700', 'Highway 66 Mini Classics', 'Exact replia with official logos and insignias and retractable wheels', 7106, 59.33, 118.65),
('S700_3167', 'F/A 18 Hornet 1/72', 'Planes', '1:72', 'Motor City Art Classics', '10\" Wingspan with retractable landing gears.Comes with pilot', 551, 54.4, 80),
('S700_3505', 'The Titanic', 'Ships', '1:700', 'Carousel DieCast Legends', 'Completed model measures 19 1/2 inches long, 9 inches high, 3inches wide and is in barn red/black. All wood and metal.', 1956, 51.09, 100.17),
('S700_3962', 'The Queen Mary', 'Ships', '1:700', 'Welly Diecast Productions', 'Exact replica. Wood and Metal. Many extras including rigging, long boats, pilot house, anchors, etc. Comes with three masts, all square-rigged.', 5088, 53.63, 99.31),
('S700_4002', 'American Airlines: MD-11S', 'Planes', '1:700', 'Second Gear Diecast', 'Polished finish. Exact replia with official logos and insignias and retractable wheels', 8820, 36.27, 74.03),
('S72_1253', 'Boeing X-32A JSF', 'Planes', '1:72', 'Motor City Art Classics', '10\" Wingspan with retractable landing gears.Comes with pilot', 4857, 32.77, 49.66),
('S72_3212', 'Pont Yacht', 'Ships', '1:72', 'Unimax Art Galleries', 'Measures 38 inches Long x 33 3/4 inches High. Includes a stand.\r\nMany extras including rigging, long boats, pilot house, anchors, etc. Comes with 2 masts, all square-rigged', 414, 33.3, 54.6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `status_note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_tr` int(11) NOT NULL,
  `jenis_tr` int(2) NOT NULL,
  `no_tr` varchar(30) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `qty_tr` int(11) NOT NULL,
  `tgl_tr` date NOT NULL,
  `status_tr` int(5) NOT NULL,
  `bm` int(11) NOT NULL,
  `kl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_tr`, `jenis_tr`, `no_tr`, `id_asset`, `qty_tr`, `tgl_tr`, `status_tr`, `bm`, `kl`) VALUES
(1, 1, '', 9, 100, '2019-02-12', 0, 1, 0),
(2, 1, '', 25, 100, '2019-03-19', 0, 2, 0),
(3, 2, '', 9, 1, '2019-04-04', 0, 0, 1),
(4, 2, '', 25, 1, '2019-04-04', 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `level`, `id_jabatan`) VALUES
(1, 'rian', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Dwian Rianto', 'admin', 3),
(2, 'joko', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Joko', 'user', 7),
(3, 'wahyu', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'wahyu', 'user', 2),
(4, 'jes', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Jessica Iskandar', 'user', 7),
(5, 'agus', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Agus bagus belagus', 'user', 7),
(6, 'heru', '827ccb0eea8a706c4c34a16891f84e7b', 'heru', 'admin', 5),
(7, 'hendrik', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Hendrik Suhendrik', 'user', 7);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_users`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_users` (
`id_users` int(11)
,`username` varchar(20)
,`nama_lengkap` varchar(255)
,`level` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `mdet_location`
--
DROP TABLE IF EXISTS `mdet_location`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mdet_location`  AS  select `location`.`id_location` AS `id_location`,`location`.`location_name` AS `location_name` from `location` where (`location`.`id_location` = `location`.`id_location`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `mv_dept`
--
DROP TABLE IF EXISTS `mv_dept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mv_dept`  AS  (select `dept`.`id_dept` AS `id_dept`,`dept`.`dept_name` AS `dept_name`,`dept`.`id_location` AS `id_location`,`dept`.`status` AS `status`,`location`.`id_location` AS `id_location1`,`location`.`location_name` AS `location_name`,`location`.`status` AS `status1` from (`dept` left join `location` on((`location`.`id_location` = `dept`.`id_location`))) where (`dept`.`status` = 0)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `m_location`
--
DROP TABLE IF EXISTS `m_location`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `m_location`  AS  (select `location`.`id_location` AS `id_location`,`location`.`location_name` AS `location_name`,`location`.`status` AS `status` from `location` where (`location`.`status` = 0)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_users`
--
DROP TABLE IF EXISTS `view_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_users`  AS  select `users`.`id` AS `id_users`,`users`.`username` AS `username`,`users`.`nama_lengkap` AS `nama_lengkap`,`users`.`level` AS `level` from `users` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id_asset`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_bm`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indeks untuk tabel `detail_asset`
--
ALTER TABLE `detail_asset`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `detail_pemakaian`
--
ALTER TABLE `detail_pemakaian`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_asset`
--
ALTER TABLE `jenis_asset`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `pengajuan_detail`
--
ALTER TABLE `pengajuan_detail`
  ADD PRIMARY KEY (`id_det`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productCode`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_tr`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `assets`
--
ALTER TABLE `assets`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_bm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `dept`
--
ALTER TABLE `dept`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_asset`
--
ALTER TABLE `detail_asset`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `detail_pemakaian`
--
ALTER TABLE `detail_pemakaian`
  MODIFY `id_dp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_asset`
--
ALTER TABLE `jenis_asset`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_detail`
--
ALTER TABLE `pengajuan_detail`
  MODIFY `id_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_tr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
