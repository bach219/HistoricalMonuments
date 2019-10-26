-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 12:49 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `historical_monuments`
--
DROP DATABASE `historical_monuments`;
CREATE DATABASE `historical_monuments`;
USE `historical_monuments`;

ALTER DATABASE `historical_monuments` CHARACTER SET utf8 COLLATE utf8_general_ci;
-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id_ad` int(11) NOT NULL,
  `mon_id` int(11) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `vehicle_number` varchar(15) NOT NULL,
  `vehicle_price` decimal(10,2) NOT NULL,
  `travel_from` varchar(50) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `vehicle_status` varchar(50) NOT NULL,
  `is_public` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id_ad`, `mon_id`, `vehicle_name`, `vehicle_number`, `vehicle_price`, `travel_from`, `departure_time`, `arrival_time`, `vehicle_status`, `is_public`) VALUES
(1, 13, 'Train', '1573705969', '27813.32', 'Khashuri', '2019-05-27 10:58:12', '2019-06-14 05:14:29', 'Vacant', 1),
(2, 2, 'Train', '1946825637', '9187.31', 'Teplice', '2019-05-26 23:13:02', '2019-05-29 19:52:17', 'Departed', 1),
(3, 9, 'Plane', '8388237883', '37782.45', 'San Salvador', '2019-05-24 08:56:58', '2019-06-15 14:06:14', 'Arrived', 1),
(4, 7, 'Plane', '4578876867', '39182.35', 'Beaumont', '2019-05-27 17:28:49', '2019-06-04 17:40:28', 'Departed', 1),
(5, 5, 'Bus', '8655849164', '32923.05', 'London', '2019-05-27 04:01:12', '2019-06-08 13:07:36', 'Departed', 1),
(6, 9, 'Bus', '8479080024', '3506.12', 'KwaMbonambi', '2019-05-25 18:19:17', '2019-05-29 16:31:55', 'Departed', 1),
(7, 16, 'Train', '2739772491', '41948.59', 'Pedraza', '2019-05-24 21:21:02', '2019-06-19 23:48:45', 'Full', 1),
(8, 9, 'Bus', '3356910345', '14945.54', 'Örebro', '2019-05-28 06:19:25', '2019-06-08 17:21:40', 'Arrived', 1),
(9, 12, 'Bus', '9747144531', '25586.43', 'Neuville', '2019-05-24 12:10:47', '2019-06-03 09:50:53', 'Departed', 1),
(10, 3, 'Plane', '4082759454', '40906.65', 'San Jose', '2019-05-27 15:12:17', '2019-06-15 22:26:09', 'Vacant', 1),
(11, 10, 'Plane', '4078640974', '11219.56', 'Orlando', '2019-05-27 15:11:35', '2019-06-08 01:09:05', 'Vacant', 1),
(12, 5, 'Plane', '1475410547', '31526.93', 'Now Zād', '2019-05-23 00:01:34', '2019-06-11 16:23:37', 'Arrived', 1),
(13, 12, 'Plane', '7249872941', '19730.08', 'Nusajaya', '2019-05-28 21:21:08', '2019-06-15 07:41:23', 'Vacant', 1),
(14, 13, 'Bus', '3398638839', '38465.67', 'Paihia', '2019-05-28 21:51:17', '2019-06-12 17:18:47', 'Full', 1),
(15, 11, 'Plane', '2309229378', '18488.28', 'Liupai', '2019-05-28 13:18:24', '2019-06-18 03:57:35', 'Vacant', 1),
(16, 5, 'Train', '9986261524', '47640.48', 'Balqash', '2019-05-28 12:48:17', '2019-06-17 02:02:41', 'Full', 1),
(17, 11, 'Plane', '5681367214', '2348.40', 'Souto', '2019-05-24 13:56:13', '2019-06-19 10:48:28', 'Departed', 1),
(18, 4, 'Train', '2183166616', '11736.60', 'Dajianchang', '2019-05-28 00:33:30', '2019-06-19 20:50:57', 'Arrived', 1),
(19, 5, 'Bus', '9719510027', '36787.09', 'Tangkilsari', '2019-05-26 12:23:20', '2019-05-30 00:59:16', 'Full', 1),
(20, 3, 'Bus', '2134744038', '2548.36', 'Asíni', '2019-05-24 03:44:12', '2019-06-01 13:27:10', 'Departed', 1),
(21, 15, 'Plane', '1847577699', '31068.33', 'Asenovgrad', '2019-05-22 09:24:47', '2019-06-18 12:01:26', 'Vacant', 1),
(22, 9, 'Bus', '3954736163', '27158.57', 'Daqiao', '2019-05-26 16:44:16', '2019-06-16 20:54:13', 'Arrived', 1),
(23, 2, 'Plane', '6145582416', '27717.88', 'Shanmu', '2019-05-28 11:09:09', '2019-06-17 23:28:06', 'Full', 1),
(24, 15, 'Bus', '7169691050', '35945.88', 'Santa Eulalia', '2019-05-23 02:51:53', '2019-06-18 22:17:21', 'Vacant', 1),
(25, 13, 'Plane', '4704439190', '12764.66', 'At Tibnī', '2019-05-24 07:22:38', '2019-06-16 07:52:41', 'Vacant', 1),
(26, 11, 'Train', '3314491112', '46902.77', 'Yulin', '2019-05-24 03:34:35', '2019-06-13 16:13:06', 'Full', 1),
(27, 3, 'Plane', '7364349657', '33833.44', 'Panenjoan', '2019-05-26 19:49:28', '2019-06-11 16:14:07', 'Arrived', 1),
(28, 8, 'Train', '4568533353', '23884.28', 'Lingbeizhou', '2019-05-24 08:17:38', '2019-06-15 18:22:25', 'Arrived', 1),
(29, 15, 'Plane', '3662621398', '19784.40', 'Bagé', '2019-05-28 17:12:51', '2019-06-12 10:54:33', 'Full', 1),
(30, 9, 'Train', '9328568562', '34313.29', 'Shicheng', '2019-05-24 16:54:10', '2019-06-14 02:37:44', 'Departed', 1),
(31, 10, 'Plane', '4279405616', '35996.46', 'Kwale', '2019-05-28 18:10:45', '2019-06-11 17:32:37', 'Departed', 1),
(32, 2, 'Bus', '5101988596', '39604.31', 'Mingora', '2019-05-26 05:30:36', '2019-06-03 10:33:30', 'Vacant', 1),
(33, 12, 'Train', '7533535796', '10075.32', 'Twardogóra', '2019-05-27 20:48:23', '2019-06-03 00:28:33', 'Departed', 1),
(34, 15, 'Train', '1628103790', '45039.34', 'Baranów', '2019-05-24 18:10:45', '2019-06-02 14:33:54', 'Arrived', 1),
(35, 4, 'Plane', '6949127491', '36973.81', 'Korsun’-Shevchenkivs’kyy', '2019-05-24 17:17:44', '2019-06-15 16:44:12', 'Arrived', 1),
(36, 4, 'Train', '5344695959', '13224.19', 'Toyokawa', '2019-05-27 10:04:28', '2019-06-13 05:14:00', 'Full', 1),
(37, 6, 'Bus', '8403294175', '28229.74', 'Ramos West', '2019-05-24 08:26:22', '2019-06-10 23:17:54', 'Arrived', 1),
(38, 15, 'Bus', '5343872087', '28500.74', 'Bijeli', '2019-05-27 10:45:53', '2019-05-29 05:35:35', 'Departed', 1),
(39, 15, 'Plane', '6557649946', '10306.44', 'Paraparaumu', '2019-05-24 23:54:59', '2019-06-02 02:09:51', 'Full', 1),
(40, 13, 'Train', '6248915005', '30144.89', 'Dazu', '2019-05-25 13:11:45', '2019-06-16 23:28:57', 'Full', 1),
(41, 10, 'Train', '6136370885', '17923.54', 'Azua', '2019-05-25 22:13:38', '2019-06-18 14:51:11', 'Full', 1),
(42, 3, 'Train', '3066595115', '10172.25', 'Wangchang', '2019-05-23 02:28:42', '2019-06-04 02:12:31', 'Full', 1),
(43, 15, 'Train', '2872131717', '27559.09', 'Jabłonica Polska', '2019-05-28 00:48:31', '2019-06-16 03:43:37', 'Arrived', 1),
(44, 3, 'Bus', '6863056490', '38679.66', 'Gobernador Gálvez', '2019-05-22 14:29:13', '2019-06-03 15:33:11', 'Vacant', 1),
(45, 12, 'Train', '1654268693', '16083.75', 'Ampanihy', '2019-05-23 01:29:46', '2019-06-06 04:06:48', 'Full', 1),
(46, 5, 'Plane', '7967934051', '11763.67', 'Kazuno', '2019-05-22 13:12:36', '2019-06-09 00:56:05', 'Departed', 1),
(47, 4, 'Bus', '8691814804', '31272.50', 'Colón', '2019-05-27 11:17:07', '2019-06-09 14:33:52', 'Arrived', 1),
(48, 3, 'Train', '9072309910', '30170.45', 'Sakaiminato', '2019-05-26 04:06:43', '2019-06-19 04:56:32', 'Departed', 1),
(49, 6, 'Bus', '6236819166', '32579.56', 'Scottsdale', '2019-05-22 09:36:51', '2019-06-13 00:34:39', 'Arrived', 1),
(50, 4, 'Train', '7509728117', '44336.26', 'Cravinhos', '2019-05-24 05:13:29', '2019-06-06 13:19:56', 'Arrived', 1),
(51, 2, 'Plane', '974714222', '34523.05', 'Hanoi', '2019-05-29 14:02:00', '2019-05-29 19:07:00', 'Vacant', 1),
(52, 1, 'Plane', '1111123313', '40000.22', 'HCM', '2019-05-30 02:02:00', '2019-05-31 17:05:00', 'Arrived', 1),
(53, 14, 'Bus', '9912', '420420.00', 'Hanoi', '2019-05-29 16:04:00', '2019-05-29 17:05:00', 'Full', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `mon_id` int(11) NOT NULL,
  `banner_title` varchar(200) NOT NULL,
  `banner_image` varchar(200) NOT NULL,
  `is_public` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `mon_id`, `banner_title`, `banner_image`, `is_public`) VALUES
(1, 1, 'Taj Mahal, India', 'banner-1.jpg', 1),
(2, 2, 'Hue Imperial Citadel, Vietnam', 'banner-2.jpg', 1),
(3, 3, 'The Colosseum, Italy', 'banner-3.jpg', 1),
(4, 4, 'Tikal, Guatemala', 'banner-4.jpg', 1),
(5, 5, 'Easter Island, Chile', 'banner-5.jpg', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `combine_ad_mon`
-- (See below for the actual view)
--
CREATE TABLE `combine_ad_mon` (
`name_mon` varchar(50)
,`id_ad` int(11)
,`vehicle_name` varchar(50)
,`vehicle_number` varchar(15)
,`vehicle_price` decimal(10,2)
,`travel_from` varchar(50)
,`departure_time` datetime
,`arrival_time` datetime
,`vehicle_status` varchar(50)
,`is_public` tinyint(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_phone` int(15) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_message` text NOT NULL,
  `is_public` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `contact_name`, `contact_phone`, `contact_email`, `contact_message`, `is_public`) VALUES
(1, 'Markus Stanley', 0, '', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 0),
(2, 'Mickie Frean', 2147483647, 'mfrean1@eventbrite.com', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy.', 0),
(3, 'Reynolds Greathead', 2147483647, 'rgreathead2@theguardian.com', 'Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat.', 0),
(4, 'Samuel Backshill', 2147483647, 'sbackshill3@bloomberg.com', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo.', 0),
(5, 'Mercedes Connar', 1146102176, 'mconnar4@un.org', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.', 0),
(6, 'Leodora Junes', 2147483647, 'ljunes5@soup.io', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', 0),
(7, 'Pierre Roubottom', 2147483647, 'proubottom6@hud.gov', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue.', 0),
(8, 'Carmelina Mogie', 2147483647, 'cmogie7@timesonline.co.uk', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', 0),
(9, 'Erhart Tyce', 2047544857, 'etyce8@t-online.de', 'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam.', 0),
(10, 'Gaspar Beldham', 2147483647, 'gbeldham9@salon.com', 'Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 0),
(11, 'Dominic Paulazzi', 2147483647, 'dpaulazzia@dropbox.com', 'Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 0),
(12, 'Tyne Reany', 2147483647, 'treanyb@addthis.com', 'Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', 0),
(13, 'Trina Gianni', 2147483647, 'tgiannic@unc.edu', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 0),
(14, 'Kaile Pencot', 2147483647, 'kpencotd@sohu.com', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat.', 0),
(15, 'Lyn Vipan', 2147483647, 'lvipane@printfriendly.com', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam.', 0),
(16, 'Peter Tattershaw', 2147483647, 'ptattershawf@studiopress.com', 'Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl.', 0),
(17, 'Stephi Titcumb', 2147483647, 'stitcumbg@wikia.com', 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 0),
(18, 'Skell Purshouse', 2147483647, 'spurshouseh@examiner.com', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.', 0),
(19, 'Evelyn Staden', 2147483647, 'estadeni@dailymail.co.uk', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 0),
(20, 'Ann-marie Arrell', 1978866754, 'aarrellj@pagesperso-orange.fr', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl.', 0),
(21, 'Roddie Yurocjhin', 2147483647, 'ryurocjhink@ed.gov', 'Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo.', 0),
(22, 'Kelsey Lesper', 2147483647, 'klesperl@wikia.com', 'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus.', 0),
(23, 'Madeleine Samett', 2147483647, 'msamettm@miitbeian.gov.cn', 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue.', 0),
(24, 'Farra Fawdrie', 2147483647, 'ffawdrien@bloglines.com', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst.', 0),
(25, 'Lamond Halifax', 2147483647, 'lhalifaxo@wikispaces.com', 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl.', 0),
(26, 'Pascale Bruins', 2147483647, 'pbruinsp@google.es', 'Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla.', 0),
(27, 'Tadeas Hilldrop', 2147483647, 'thilldropq@eventbrite.com', 'Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 0),
(28, 'Bartolemo McPhillips', 1157199886, 'bmcphillipsr@who.int', 'Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo.', 0),
(29, 'Bonnie Loughnan', 2147483647, 'bloughnans@boston.com', 'Nulla tellus. In sagittis dui vel nisl. Duis ac nibh.', 1),
(30, 'Sidonnie Dawkes', 2147483647, 'sdawkest@marketwatch.com', 'Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `mon_id` int(11) NOT NULL,
  `viewer_name` varchar(50) NOT NULL,
  `viewer_phone` int(15) NOT NULL,
  `viewer_email` varchar(50) NOT NULL,
  `viewer_comment` text NOT NULL,
  `is_public` tinyint(4) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `mon_id`, `viewer_name`, `viewer_phone`, `viewer_email`, `viewer_comment`, `is_public`, `createdate`) VALUES
(1, 16, 'Jillie Dufaire', 0, '', '<p>Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.</p>\r\n', 1, '2019-05-05 13:12:16'),
(2, 13, 'Clemens Renols', 2147483647, 'crenols1@gnu.org', 'Sed vel enim sit amet nunc viverra dapibus.', 1, '2019-05-20 07:48:05'),
(3, 1, 'Edlin Darkott', 2147483647, 'edarkott2@ask.com', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 1, '2018-11-13 00:30:14'),
(4, 1, 'Denny Collman', 2147483647, 'dcollman3@friendfeed.com', 'Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', 1, '2018-08-17 19:04:17'),
(5, 10, 'Clarie Battson', 2147483647, 'cbattson4@diigo.com', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio.', 1, '2019-01-30 17:22:14'),
(6, 12, 'Perle Geertje', 2147483647, 'pgeertje5@dedecms.com', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis.', 1, '2019-02-12 23:12:55'),
(7, 7, 'Glynda Scoles', 2147483647, 'gscoles6@patch.com', 'Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 1, '2019-01-25 01:20:29'),
(8, 6, 'Jessamyn Matusevich', 2147483647, 'jmatusevich7@amazon.co.jp', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 1, '2019-01-02 02:38:33'),
(9, 4, 'Bert Griggs', 1331079847, 'bgriggs8@elpais.com', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum.', 1, '2018-06-22 08:02:43'),
(10, 8, 'Dalila Hurford', 2147483647, 'dhurford9@webnode.com', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 1, '2019-04-05 01:34:40'),
(11, 14, 'Raleigh Feechan', 2147483647, 'rfeechana@cafepress.com', 'In hac habitasse platea dictumst.', 1, '2018-10-26 21:53:58'),
(12, 2, 'Caroline Spilling', 2147483647, 'cspillingb@artisteer.com', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 1, '2018-11-08 19:52:49'),
(13, 3, 'Dorena Prime', 2147483647, 'dprimec@privacy.gov.au', 'Sed ante. Vivamus tortor.', 1, '2019-05-25 14:47:33'),
(14, 2, 'Batholomew Ram', 2147483647, 'bramd@blogger.com', 'Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst.', 1, '2018-12-12 01:43:13'),
(15, 14, 'Monika Cogdell', 2147483647, 'mcogdelle@nbcnews.com', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 1, '2019-03-22 12:46:03'),
(16, 1, 'Alethea Reilly', 2147483647, 'areillyf@studiopress.com', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 1, '2018-07-04 21:09:05'),
(17, 7, 'Brig Gammill', 2147483647, 'bgammillg@psu.edu', 'Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero.', 1, '2018-10-17 12:27:13'),
(18, 7, 'Chaunce Rumble', 2147483647, 'crumbleh@theatlantic.com', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 1, '2018-07-14 07:03:59'),
(19, 14, 'Cleve Dyte', 2147483647, 'cdytei@whitehouse.gov', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.', 1, '2019-02-20 01:10:26'),
(20, 4, 'Drona McCoole', 2147483647, 'dmccoolej@newyorker.com', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien.', 1, '2018-12-01 06:16:55'),
(21, 13, 'Mellisent Andreassen', 2147483647, 'mandreassenk@live.com', 'In hac habitasse platea dictumst.', 1, '2018-11-30 01:05:02'),
(22, 3, 'Goraud Alu', 2147483647, 'galul@surveymonkey.com', 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', 1, '2019-05-13 13:54:18'),
(23, 15, 'Maddi Dumphries', 1813461740, 'mdumphriesm@addtoany.com', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 1, '2019-02-04 18:55:09'),
(24, 5, 'Redd Lates', 2128494680, 'rlatesn@youku.com', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 1, '2019-02-09 11:40:09'),
(25, 7, 'Briant Braniff', 2147483647, 'bbraniffo@fotki.com', 'Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 1, '2018-06-24 09:28:10'),
(26, 12, 'Dolly Neasham', 2147483647, 'dneashamp@devhub.com', 'Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 1, '2018-10-03 06:02:57'),
(27, 11, 'Ryann Bollam', 2147483647, 'rbollamq@cafepress.com', 'Sed sagittis.', 1, '2019-02-01 02:45:14'),
(28, 1, 'Eryn Gadman', 2147483647, 'egadmanr@cbc.ca', 'In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', 1, '2019-04-03 02:23:45'),
(29, 4, 'Diana Guidera', 1624366073, 'dguideras@addtoany.com', 'Maecenas pulvinar lobortis est.', 1, '2018-09-12 21:44:00'),
(30, 15, 'Marion Nussey', 2147483647, 'mnusseyt@joomla.org', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien.', 1, '2019-05-07 14:52:37'),
(31, 10, 'Guenna Vasyukhichev', 2147483647, 'gvasyukhichevu@comcast.net', 'In blandit ultrices enim.', 1, '2018-12-31 14:09:45'),
(32, 6, 'Marie Pringley', 2147483647, 'mpringleyv@pinterest.com', 'Cras non velit nec nisi vulputate nonummy.', 1, '2018-07-02 05:10:54'),
(33, 8, 'Jessica Chittie', 2147483647, 'jchittiew@spotify.com', 'Aliquam erat volutpat.', 1, '2019-02-16 08:14:33'),
(34, 7, 'Umberto Goligher', 2147483647, 'ugoligherx@statcounter.com', 'Donec posuere metus vitae ipsum.', 1, '2018-11-28 18:41:10'),
(35, 10, 'Ranique Broader', 2147483647, 'rbroadery@cbsnews.com', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.', 1, '2019-05-05 07:22:53'),
(36, 9, 'Dean Farney', 1267653148, 'dfarneyz@mapy.cz', 'Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 1, '2019-01-05 13:09:30'),
(37, 6, 'Selestina Dennison', 2147483647, 'sdennison10@msu.edu', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', 1, '2018-08-18 05:30:00'),
(38, 6, 'Brinna Tibald', 2147483647, 'btibald11@mozilla.com', 'Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla.', 1, '2019-02-21 11:20:51'),
(39, 11, 'Sal Fairbank', 2147483647, 'sfairbank12@people.com.cn', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla.', 1, '2018-12-28 19:02:06'),
(40, 12, 'Pearline Jenner', 2147483647, 'pjenner13@tinyurl.com', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 1, '2019-02-23 14:58:17'),
(41, 4, 'Gerty MacUchadair', 2147483647, 'gmacuchadair14@deliciousdays.com', 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus.', 1, '2018-08-12 06:06:03'),
(42, 16, 'Effie Malek', 2147483647, 'emalek15@smugmug.com', 'Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus.', 1, '2018-08-19 17:22:25'),
(43, 6, 'Willi Houldin', 2147483647, 'whouldin16@pcworld.com', 'Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat.', 1, '2019-02-14 05:40:39'),
(44, 15, 'Luce Smails', 2147483647, 'lsmails17@wiley.com', 'Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.', 1, '2018-06-21 01:30:24'),
(45, 13, 'Corri Ronan', 2147483647, 'cronan18@edublogs.org', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio.', 1, '2019-05-20 21:48:40'),
(46, 10, 'Rainer Quilter', 2147483647, 'rquilter19@acquirethisname.com', 'Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 1, '2018-12-01 09:12:10'),
(47, 5, 'Ericha Soames', 2147483647, 'esoames1a@phpbb.com', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 1, '2018-06-16 10:03:53'),
(48, 14, 'Alister Rutledge', 2147483647, 'arutledge1b@opensource.org', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum.', 1, '2019-04-20 23:17:06'),
(49, 14, 'Germaine Vassar', 2147483647, 'gvassar1c@smugmug.com', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla.', 1, '2019-04-02 14:16:17'),
(50, 6, 'Alfred Bodycomb', 2147483647, 'abodycomb1d@dailymotion.com', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices.', 1, '2018-07-14 00:01:40'),
(51, 1, 'Cori Shewen', 2147483647, 'cshewen1e@prnewswire.com', 'Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.', 1, '2018-11-02 23:21:12'),
(52, 9, 'Ryley Siviour', 2147483647, 'rsiviour1f@wikispaces.com', 'Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam.', 1, '2018-11-17 21:19:56'),
(53, 5, 'Shelba Iohananof', 2147483647, 'siohananof1g@thetimes.co.uk', 'Etiam pretium iaculis justo. In hac habitasse platea dictumst.', 1, '2019-05-26 21:43:58'),
(54, 12, 'Angelia Genese', 2147483647, 'agenese1h@cbslocal.com', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo.', 1, '2018-12-25 12:14:43'),
(55, 9, 'West Cohr', 2147483647, 'wcohr1i@mail.ru', 'Nunc rhoncus dui vel sem. Sed sagittis.', 1, '2018-08-07 08:33:13'),
(56, 16, 'Kalindi Champniss', 2147483647, 'kchampniss1j@blogspot.com', 'Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum.', 1, '2018-08-20 05:34:59'),
(57, 12, 'Marcelline Fairleigh', 2147483647, 'mfairleigh1k@nytimes.com', 'Nunc rhoncus dui vel sem. Sed sagittis.', 1, '2018-09-22 02:45:46'),
(58, 12, 'Roderic Fellini', 2147483647, 'rfellini1l@unblog.fr', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', 1, '2019-01-24 11:58:08'),
(59, 8, 'Jackelyn Smeed', 2147483647, 'jsmeed1m@blog.com', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt.', 1, '2018-10-27 00:18:32'),
(60, 16, 'Caterina Yankishin', 2147483647, 'cyankishin1n@t-online.de', 'Nunc rhoncus dui vel sem.', 1, '2018-09-21 18:48:06'),
(61, 3, 'Gottfried Casterton', 1768316380, 'gcasterton1o@fema.gov', 'Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 1, '2018-09-05 01:37:35'),
(62, 6, 'Rainer Broadis', 2147483647, 'rbroadis1p@is.gd', 'Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam. Nam tristique tortor eu pede.', 1, '2018-08-23 06:17:20'),
(63, 10, 'Terrye Yepiskopov', 1529273343, 'tyepiskopov1q@php.net', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.', 1, '2018-10-27 18:46:49'),
(64, 11, 'Luise Goodinge', 2147483647, 'lgoodinge1r@bing.com', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet.', 1, '2018-11-28 18:05:03'),
(65, 14, 'Patin Van Baaren', 2147483647, 'pvan1s@comsenz.com', 'Praesent blandit.', 1, '2018-12-01 18:48:31'),
(66, 7, 'Valeda Seth', 2147483647, 'vseth1t@go.com', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 1, '2019-03-12 08:19:19'),
(67, 14, 'Kylen Bonson', 2147483647, 'kbonson1u@jigsy.com', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 1, '2018-06-21 09:21:59'),
(68, 13, 'Rod Sibery', 2147483647, 'rsibery1v@smh.com.au', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 1, '2018-11-17 12:51:06'),
(69, 15, 'Charlotte Pendall', 2147483647, 'cpendall1w@odnoklassniki.ru', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy.', 1, '2019-05-09 11:54:13'),
(70, 3, 'Reinwald Carr', 2147483647, 'rcarr1x@google.co.uk', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.', 1, '2018-08-03 15:56:54'),
(71, 14, 'Zea McVity', 2147483647, 'zmcvity1y@yelp.com', 'Aenean auctor gravida sem.', 1, '2018-06-03 22:40:18'),
(72, 3, 'Camile Vesque', 2147483647, 'cvesque1z@webeden.co.uk', 'Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy.', 1, '2018-05-30 22:35:48'),
(73, 14, 'Suzette Grzelewski', 2147483647, 'sgrzelewski20@bing.com', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor.', 1, '2019-01-05 23:42:43'),
(74, 11, 'Ibbie Zieme', 2147483647, 'izieme21@nifty.com', 'Duis mattis egestas metus.', 1, '2018-09-01 01:25:05'),
(75, 4, 'Nikki Cossom', 2147483647, 'ncossom22@utexas.edu', 'Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum.', 1, '2019-01-05 06:54:13'),
(76, 5, 'Trevor Colbridge', 2147483647, 'tcolbridge23@soundcloud.com', 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt.', 1, '2018-11-19 09:52:29'),
(77, 6, 'King Trumpeter', 2147483647, 'ktrumpeter24@goodreads.com', 'Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 1, '2018-09-14 01:10:38'),
(78, 13, 'Nilson Northrop', 2147483647, 'nnorthrop25@comsenz.com', 'Nam dui.', 1, '2018-09-23 06:16:15'),
(79, 8, 'Cary Pettingall', 1204453514, 'cpettingall26@pbs.org', 'Donec posuere metus vitae ipsum. Aliquam non mauris.', 1, '2018-07-17 08:50:18'),
(80, 12, 'Corilla Laying', 2147483647, 'claying27@hugedomains.com', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 1, '2018-07-07 03:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gal_id` int(11) NOT NULL,
  `mon_id` int(11) NOT NULL,
  `gal_name` varchar(200) NOT NULL,
  `gal_img` text,
  `gal_description` varchar(300) DEFAULT NULL,
  `is_public` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gal_id`, `mon_id`, `gal_name`, `gal_img`, `gal_description`, `is_public`) VALUES
(1, 1, 'Taj Mahal, India', 'mon1.jpg', '<p>On the Front of Taj Mahal</p>\r\n', 1),
(2, 16, 'Side cut ', '166.jpg', '<p>Bottom up</p>\r\n', 1),
(3, 16, 'From afar', '162.jpg', '<p>From afar</p>\r\n', 1),
(4, 16, 'Close up', '163.jpg', '<p>Close up</p>\r\n', 1),
(5, 16, 'Chilling camel', '164.jpg', '<p>Chilling camel</p>\r\n', 1),
(6, 16, 'Inside', '165.jpg', '<p>Inside</p>\r\n', 1),
(7, 16, 'Inside 2', '167.jpg', '<p>Inside 2</p>\r\n', 1),
(8, 16, 'Pharaoh', '168.jpg', '<p>Pharaoh</p>\r\n', 1),
(9, 1, 'Something', '011.jpg', '<p>Something</p>\r\n', 1),
(10, 1, 'Something1', '012.jpg', '<p>Something</p>\r\n', 1),
(11, 1, 'Something2', '013.jpg', '<p>Something2</p>\r\n', 1),
(12, 1, 'Something3', '014.jpg', '<p>Something3</p>\r\n', 1),
(13, 1, 'Something4', '015.jpg', '<p>Something4</p>\r\n', 1),
(14, 2, 'Something5', '021.jpg', '<p>Something5</p>\r\n', 1),
(15, 2, 'Something6', '022.jpg', '<p>Something6</p>\r\n', 1),
(16, 2, 'Something7', '023.jpg', '<p>Something7</p>\r\n', 1),
(17, 2, 'Something8', '024.jpg', '<p>Something8</p>\r\n', 1),
(18, 2, 'Something9', '025.jpg', '<p>Something9</p>\r\n', 1),
(19, 3, 'Something10', '031.jpg', '<p>Something10</p>\r\n', 1),
(20, 3, 'Something11', '032.jpg', '<p>Something11</p>\r\n', 1),
(21, 3, 'Something12', '033.jpg', '<p>Something12</p>\r\n', 1),
(22, 3, 'Something13', '034.jpg', '<p>Something13</p>\r\n', 0),
(23, 3, 'Something14', '035.jpg', '<p>Something14</p>\r\n', 1),
(24, 4, 'Something15', '041.jpg', '<p>Something15</p>\r\n', 1),
(25, 4, 'Something16', '042.jpg', '<p>Something16</p>\r\n', 1),
(26, 4, 'Something17', '043.jpg', '<p>Something17</p>\r\n', 1),
(27, 4, 'Something18', '044.jpg', '<p>Something18</p>\r\n', 1),
(28, 4, 'Something19', '045.jpg', '<p>Something19</p>\r\n', 1),
(29, 5, 'Something20', '051.jpg', '<p>Something20</p>\r\n', 1),
(30, 5, 'Something21', '052.jpg', '<p>Something21</p>\r\n', 1),
(31, 5, 'Something22', '053.jpg', '<p>Something22</p>\r\n', 1),
(32, 6, 'Something23', '061.jpg', '<p>Something23</p>\r\n', 1),
(33, 6, 'Something24', '062.jpg', '<p>Something24</p>\r\n', 1),
(34, 6, 'Something25', '063.jpg', '<p>Something25</p>\r\n', 1),
(35, 7, 'Something26', '071.jpg', '<p>Something26</p>\r\n', 1),
(36, 7, 'Something27', '072.jpg', '<p>Something2</p>\r\n', 1),
(37, 7, 'Something28', '073.jpg', '<p>Something28</p>\r\n', 1),
(38, 8, 'Something29', '081.jpg', '<p>Something29</p>\r\n', 1),
(39, 8, 'Something30', '082.jpg', '<p>Something30</p>\r\n', 1),
(40, 8, 'Something31', '083.jpg', '<p>Something31</p>\r\n', 1),
(41, 9, 'Something32', '091.jpg', '<p>Something32</p>\r\n', 1),
(42, 9, 'Something33', '092.jpg', '<p>Something33</p>\r\n', 1),
(43, 9, 'Something34', '093.jpg', '<p>Something34</p>\r\n', 1),
(44, 10, 'Something35', '101.jpg', '<p>Something35</p>\r\n', 1),
(45, 10, 'Something36', '102.jpg', '<p>Something36</p>\r\n', 1),
(46, 10, 'Something37', '103.jpg', '<p>Something37</p>\r\n', 1),
(47, 11, 'Something38', '111.jpg', '<p>Something38</p>\r\n', 1),
(48, 11, 'Something39', '112.jpg', '<p>Something39</p>\r\n', 1),
(49, 11, 'Something40', '113.jpg', '<p>Something40</p>\r\n', 1),
(50, 12, 'Something41', '121.jpg', '<p>Something41</p>\r\n', 1),
(51, 12, 'Something42', '122.jpg', '<p>Something42</p>\r\n', 1),
(52, 12, 'Something43', '123.jpg', '<p>Something42</p>\r\n', 1),
(53, 13, 'Something43', '131.jpg', '<p>Something43</p>\r\n', 1),
(54, 13, 'Something44', '132.jpg', '<p>Something44</p>\r\n', 1),
(55, 13, 'Something45', '133.jpg', '<p>Something45</p>\r\n', 1),
(56, 14, 'Something46', '141.jpg', '<p>Something46</p>\r\n', 1),
(57, 14, 'Something47', '142.jpg', '<p>Something47</p>\r\n', 1),
(58, 14, 'Something48', '143.jpg', '<p>Something48</p>\r\n', 1),
(59, 15, 'Something49', '151.jpg', '<p>Something49</p>\r\n', 1),
(60, 15, 'Something50', '152.jpg', '<p>Something50</p>\r\n', 1),
(61, 15, 'Something51', '153.jpg', '<p>Something51</p>\r\n', 1),
(65, 1, '1111111111', '1111111111', '<p>111111111</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `monuments`
--

CREATE TABLE `monuments` (
  `id_mon` int(11) NOT NULL,
  `name_mon` varchar(50) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `history_mon` text,
  `is_public` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monuments`
--

INSERT INTO `monuments` (`id_mon`, `name_mon`, `zone_id`, `image`, `history_mon`, `is_public`) VALUES
(1, 'Taj Mahal, India', 3, 'mon1.jpg', '<p><img alt=\"\" src=\"https://www.dulichvietnam.com.vn/data/Gi%C3%A1-v%C3%A9-Taj-Mahal-1.jpg\" style=\"height:406px; width:650px\" /></p>\r\n\r\n<p>Construction of the mausoleum was essentially completed in 1643 but work continued on other phases of the project for another 10 years. The Taj Mahal complex is believed to have been completed in its entirety in 1653 at a cost estimated at the time to be around 32 million rupees, which in 2015 would be approximately 52.8 billion rupees (U.S. $827 million). The construction project employed some 20,000 artisans under the guidance of a board of architects led by the court architect to the emperor, Ustad Ahmad Lahauri.<br />\r\n&nbsp;</p>\r\n\r\n<p>The Taj Mahal was designated as a UNESCO World Heritage Site in 1983 for being &quot;the jewel of Muslim art in India and one of the universally admired masterpieces of the world&#39;s heritage&quot;. It is regarded by many as the best example of Mughal architecture and a symbol of India&#39;s rich history. The Taj Mahal attracts 7&ndash;8 million visitors a year and in 2007, it was declared a winner of the New7Wonders of the World (2000&ndash;2007) initiative.<br />\r\n&nbsp;</p>\r\n\r\n<p>The Taj Mahal incorporates and expands on design traditions of Persian and earlier Mughal architecture.The complex is set around a large 300-metre (980 ft) square charbagh or Mughal garden. The garden uses raised pathways that divide each of the four quarters of the garden into 16 sunken parterres or flowerbeds. Halfway between the tomb and gateway in the centre of the garden is a raised marble water tank with a reflecting pool positioned on a north-south axis to reflect the image of the mausoleum.</p>\r\n', 1),
(2, 'Hue Imperial Citadel, Vietnam', 2, 'mon2.jpg', '<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Hue Imperial Citadel, Vietnam\" src=\"http://buffalotrip.com/image/cache/data/2015/Hue/Sights/Hue-Imperial-Citadel/1-imperial-city-citadel-hue-vietnam-maps-address-opening-hours-guide-hue-tourist-attractions-3-760x432.jpg\" style=\"height:369px; width:650px\" /></p>\r\n\r\n<p>The Imperial City (Vietnamese: Hoàng thành) is a walled enclosure within the citadel (Kinh thành) of the city of Huế, the former imperial capital of Vietnam.</p>\r\n\r\n<p>In June 1789 Nguyễn Ánh ascended the throne of a unified Vietnam and proclaimed himself Emperor Gia Long with Hue, the ancestral seat of the Nguyen Lords as the capital. Geomancers were consulted as to the propitious location site for the new city and construction began in 1804. Thousands of workers were ordered to build the walled citadel and ringing moat, measuring some 10 kilometers long. The original earthwork was later reinforced and faced with brick and stone resulting in 2 meters thick ramparts.</p>\r\n\r\n<p>The citadel was oriented to face the Huong River (Perfume River) to the southeast. This differs from Beijing&#39;s Forbidden City in which faces true south. Rather than concentric rings, centered on the Emperor&#39;s palace, the imperial residence itself is offset toward the southeast side of the citadel, nearer the river. A second set of tall walls and a second moat was constructed around this Imperial City, within which many edifices were added in a series of gated courtyards, gardens, pavilions and palaces. The entire complex was the seat of power until the imposition of the French protectorate in the 1880s. Thereafter it existed mostly to carry on symbolic traditions until the monarchy was ousted in 1945. At the time, the Purple Forbidden City had many buildings and hundreds of rooms. Once vacated it suffered from neglect, termite ravages, and inclement weather including a number of cyclones. Nonetheless the Imperial City was an impressive sight. Most destructive were man-made crises as evidenced in the bullet holes still visible from the military conflicts of the 20th century.</p>\r\n\r\n<p>The grounds of the Imperial City are protected by fortified ramparts 2 kilometers by 2 kilometers, and ringed by a moat. The water in the moat is routed from the Perfume River through a series of sluice gates. This enclosure is the citadel (Kinh thành).</p>\r\n\r\n<p>Inside the citadel is the Imperial City (Hoàng thành), with a perimeter wall some 2.5 kilometers in length.</p>\r\n\r\n<p>Within the Imperial City is the Purple Forbidden City (Tử cấm thành), a term identical to the Forbidden City in Beijing. Access to the innermost enclosure was restricted to the imperial family.</p>\r\n', 1),
(3, 'The Colosseum, Italy', 4, 'mon3.jpg', '<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho The Colosseum, Italy\" src=\"https://media.nationalgeographic.org/assets/photos/198/897/95a24eaa-5e33-4778-b06c-96654f3dbf87_r646x517.jpg?7ec12d2205c22b66c1d50402861db8634b0cff10\" /></p>\r\n\r\n<p>The Colosseum or Coliseum (/kɒləˈsiːəm/ kol-ə-SEE-əm), also known as the Flavian Amphitheatre (Latin: Amphitheatrum Flavium; Italian: Anfiteatro Flavio [aɱfiteˈaːtro ˈflaːvjo] or Colosseo [kolosˈsɛːo]), is an oval amphitheatre in the centre of the city of Rome, Italy. Built of travertine, tuff, and brick-faced concrete.</p>\r\n\r\n<p>The Colosseum could hold, it is estimated, between 50,000 and 80,000 spectators, having an average audience of some 65,000, it was used for gladiatorial contests and public spectacles such as mock sea battles (for only a short time as the hypogeum was soon filled in with mechanisms to support the other activities), animal hunts, executions, re-enactments of famous battles, and dramas based on Classical mythology. The building ceased to be used for entertainment in the early medieval era. It was later reused for such purposes as housing, workshops, quarters for a religious order, a fortress, a quarry, and a Christian shrine.<br />\r\n<br />\r\nThe site chosen was a flat area on the floor of a low valley between the Caelian, Esquiline and Palatine Hills, through which a canalised stream ran. By the 2nd century BC the area was densely inhabited. It was devastated by the Great Fire of Rome in AD 64, following which Nero seized much of the area to add to his personal domain. He built the grandiose Domus Aurea on the site, in front of which he created an artificial lake surrounded by pavilions, gardens and porticoes. The existing Aqua Claudia aqueduct was extended to supply water to the area and the gigantic bronze Colossus of Nero was set up nearby at the entrance to the Domus Aurea.<br />\r\n&nbsp;</p>\r\n', 1),
(4, 'Tikal, Guatemala', 4, 'mon4.jpg', '<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Tikal, Guatemala\" src=\"https://www.anywhere.com/img-a/destination/tikal-guatemala/Tikal-10.jpg/-/w=800&amp;h=480&amp;fit=min&amp;dp=1&amp;q=10\" style=\"height:390px; width:650px\" /></p>\r\n\r\n<p>Tikal (/tiˈkɑːl/) (Tik&rsquo;al in modern Mayan orthography) is the ruin of an ancient city, which was likely to have been called Yax Mutal, found in a rainforest in Guatemala. It is one of the largest archaeological sites and urban centers of the pre-Columbian Maya civilization. It is located in the archaeological region of the Petén Basin in what is now northern Guatemala. Situated in the department of El Petén, the site is part of Guatemala&#39;s Tikal National Park and in 1979 it was declared a UNESCO World Heritage Site.<br />\r\n<br />\r\nTikal was the capital of a conquest state that became one of the most powerful kingdoms of the ancient Maya. Though monumental architecture at the site dates back as far as the 4th century BC, Tikal reached its apogee during the Classic Period, c. 200 to 900 AD. During this time, the city dominated much of the Maya region politically, economically, and militarily, while interacting with areas throughout Mesoamerica such as the great metropolis of Teotihuacan in the distant Valley of Mexico. There is evidence that Tikal was conquered by Teotihuacan in the 4th century CE. Following the end of the Late Classic Period, no new major monuments were built at Tikal and there is evidence that elite palaces were burned. These events were coupled with a gradual population decline, culminating with the site&rsquo;s abandonment by the end of the 10th century.<br />\r\n&nbsp;</p>\r\n\r\n<p>The closest large modern settlements are Flores and Santa Elena, approximately 64 kilometres (40 mi) by road to the southwest. Tikal is approximately 303 kilometres (188 mi) north of Guatemala City. It is 19 kilometres (12 mi) south of the contemporary Maya city of Uaxactun and 30 kilometres (19 mi) northwest of Yaxha. The city was located 100 kilometres (62 mi) southeast of its great Classic Period rival, Calakmul, and 85 kilometres (53 mi) northwest of Calakmul&#39;s ally Caracol, now in Belize.</p>\r\n', 1),
(5, 'Easter Island, Chile', 1, 'mon5.jpg', '<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Easter Island, Chile\" src=\"https://s28987.pcdn.co/wp-content/uploads/2018/07/visit-easter-island-chile-25.jpg\" style=\"height:432px; width:650px\" /></p>\r\n\r\n<p>Easter Island (Rapa Nui: Rapa Nui, Spanish: Isla de Pascua) is a Chilean island in the southeastern Pacific Ocean, at the southeasternmost point of the Polynesian Triangle in Oceania. Easter Island is most famous for its nearly 1,000 extant monumental statues, called moai, created by the early Rapa Nui people. In 1995, UNESCO named Easter Island a World Heritage Site, with much of the island protected within Rapa Nui National Park.</p>\r\n\r\n<p><br />\r\nThe name &quot;Easter Island&quot; was given by the island&#39;s first recorded European visitor, the Dutch explorer Jacob Roggeveen, who encountered it on Easter Sunday (5 April) in 1722, while searching for &quot;Davis Land&quot;. Roggeveen named it Paasch-Eyland (18th-century Dutch for &quot;Easter Island&quot;). The island&#39;s official Spanish name, Isla de Pascua, also means &quot;Easter Island&quot;.<br />\r\n&nbsp;</p>\r\n\r\n<p>Oral tradition states the island was first settled by a two-canoe expedition, originating from Marae Renga (or Marae Toe Hau), and led by the chief Hotu Matu&#39;a and his captain Tu&#39;u ko Iho. The island was first scouted after Haumaka dreamed of such a far-off country; Hotu deemed it a worthwhile place to flee from a neighboring chief, one to whom he had already lost three battles. At their time of arrival, the island had one lone settler, Nga Tavake &#39;a Te Rona. After a brief stay at Anakena, the colonists settled in different parts of the island. Hotu&#39;s heir, Tu&#39;u ma Heke, was born on the island. Tu&#39;u ko Iho is viewed as the leader who brought the statues and caused them to walk.<br />\r\n&nbsp;</p>\r\n\r\n<p>Easter Island is one of the world&#39;s most isolated inhabited islands. Its closest inhabited neighbour are the Chilean Juan Fernandez Islands, 1,850 km (1,150 mi) to the east, with approximately 850 inhabitants.[citation needed] The nearest continental point lies in central Chile near Concepción, at 3,512 kilometres (2,182 mi). Easter Island&#39;s latitude is similar to that of Caldera, Chile, and it lies 3,510 km (2,180 mi) west of continental Chile at its nearest point (between Lota and Lebu in the Biobío Region). Isla Salas y Gómez, 415 km (258 mi) to the east, is closer but is uninhabited. Archipelago Tristan da Cunha in the southern Atlantic competes for the title of the most remote island, lying 2,430 kilometres (1,510 mi) from Saint Helena island and 2,816 kilometres (1,750 mi) from the South African coast.</p>\r\n', 1),
(6, 'Naumburg Cathedral', 4, 'mon6.jpg', '<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Naumburg Cathedral\" src=\"https://universes.art/uploads/tx_armtemplate/mobile/06-IMG_8531-B.jpg\" style=\"height:467px; width:700px\" /></p>\r\n\r\n<p>Naumburg Cathedral (German: Naumburger Dom St. Peter und St. Paul), located in Naumburg, Germany, is the former cathedral of the Bishopric of Naumburg-Zeitz. The church building, most of which dates back to the 13th century, is a renowned landmark of the German late Romanesque and has been recognised as.</p>\r\n\r\n<p>UNESCO World Heritage Site in 2018. The west choir with the famous donor portrait statues of the twelve cathedral founders (Stifterfiguren) and the Lettner, works of the Naumburg Master, is one of the most significant early Gothic monuments.</p>\r\n\r\n<p>The church was erected with the relocation of the Episcopal See from Zeitz in 1028, next to an old parish church. Thus it is the proto-cathedral of the former Catholic Diocese of Naumburg-Zeitz.</p>\r\n\r\n<p>With the Reformation, Naumburg and its cathedral became Protestant. Naumburg Cathedral remains a Protestant parish church to this day.</p>\r\n\r\n<p>Naumburg Cathedral is a part of the tourist route Romanesque Road in Saxony-Anhalt. Since 1999, &#39;Naumburg Cathedral and the landscape of the rivers Saale and Unstrut &ndash; an important dominion in the High Middle Ages&#39; are included in the candidate list for UNESCO World Heritage Sites in Germany. On July 1, 2018, only Naumburg Cathedral was listed as a UNESCO World Heritage site.</p>\r\n\r\n<p>The history of the town of Naumburg begins at the turn of the 9th and 10th centuries. Due to a lack of written documentation, details and exact dates are unknown. However, it is likely that Markgraf (Margrave) Ekkehard I of Meissen and the most powerful man on the eastern border of the Holy Roman Empire was the founder.</p>\r\n', 1),
(7, 'Qalhat, Oman', 3, 'mon7.jpg', '<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Qalhat\" src=\"https://media-cdn.tripadvisor.com/media/photo-s/03/bc/c7/f9/from-distance.jpg\" style=\"height:465px; width:700px\" /></p>\r\n\r\n<p>The ancient city of Qalhat, or Galhat (Arabic: قلهات&lrm;) (in the map of Abraham Ortelius, it named as Calha), is located just over 20 km north of Sur, in the Ash Sharqiyah Region of northeastern Oman.</p>\r\n\r\n<p><br />\r\nMarco Polo visited Qalhat in the 13th century, referring to it as Calatu. Ibn Battuta visited the city in the 14th century, noting that it had &quot;fine bazaars and one of the most beautiful mosques.&quot; He further noted the mosque was built by Bibi Maryam and included walls of qashani. Bibi Maryam continued to rule Qalhat and Hurmuz after the death of her husband Ayaz in 1311 or 1312. Zheng He visited the city in the 15th century, referring to it as 加剌哈 (Mandarin: jia-la-ha; Cantonese: gaa-laat-haa).</p>\r\n\r\n<p>Qalhat served as an important stop in the wider Indian Ocean trade network, and was also the second city of the Kingdom of Ormus. By 1507 when it was captured by Afonso de Albuquerque on behalf of the Portuguese Empire, the city were already in decline as trade shifted to Muscat.[1] Covering more than 60 acres (240,000 m2), Qalhat was surrounded by fortified walls that contained houses and shops. Very little remains of the ancient city, save for the now dome-less mausoleum of Bibi Maryam. Artifacts from as far away as Persia and China were found on-site.</p>\r\n\r\n<p><br />\r\nThis site was added to the UNESCO World Heritage Tentative List on July 4, 1988 in the Cultural category. The ancient city became a World Heritage site in 2018.</p>\r\n', 1),
(8, 'Medina Azahara', 3, 'mon8.jpg', '<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Medina Azahara\" src=\"https://www.abc.es/media/cultura/2018/07/02/site_1560_0003-kcjB--620x349@abc.jpg\" /></p>\r\n\r\n<p>Medina Azahara (Arabic: مدينة الزهراء&lrm; Madīnat az-Zahrā: literal meaning &quot;the shining city&quot;) is the ruins of a vast, fortified Moorish medieval palace-city built by Abd-ar-Rahman III (912&ndash;961), the first Umayyad Caliph of Córdoba, and located on the western outskirts of Córdoba, Spain. It was a medieval Moorish town and the de facto capital of al-Andalus, or Muslim Spain, as the heart of the administration and government was within its walls.</p>\r\n\r\n<p>Built beginning in 936-940, the city included ceremonial reception halls, mosques, administrative and government offices, gardens, a mint, workshops, barracks, residences and baths. Water was supplied through aqueducts.</p>\r\n\r\n<p>Located 4 miles (6.4 km) west of Córdoba in the foothills of the Sierra Morena, oriented north-to-south on the slopes of Jabal al-Arus (meaning Bride Hill), and facing the valley of the Guadalquivir river, is Madinat az-Zahra, billed as the Versailles of the Middle Ages. It was chosen for its outstanding landscape values, allowing a hierarchical construction program so the city and the plains beyond its feet were physically and visually dominated by the buildings of the fortress.</p>\r\n\r\n<p>There were at least three gardens in the city. A small garden, referred to as The Prince&#39;s Garden, was located on the upper terrace. This garden was for the use of the nobility, the wealthy, and the powerful; those who frequented the palace itself.</p>\r\n\r\n<p>The two lower terraces supported huge, formal Islamic gardens. The westernmost of these was the lowest terrace of the city. The easternmost of these two lower gardens, the middle terrace, led to the reception hall known as the Salon Rico. This eastern garden had a pavilion, surrounded by four rectangular pools, at its center. The four quadrants of this garden were sunken, and supplied with water from channels along the connecting walkways.</p>\r\n\r\n<p><br />\r\nThe city, which flourished for approximately 80 years, was built by caliph Abd-ar-Rahman III of Córdoba starting between 936 and 940. After he had proclaimed himself caliph in 928, he decided to show his subjects and the world his power by building a palace-city 5 km from Córdoba.</p>\r\n', 1),
(9, 'Transbaikal', 3, 'mon9.jpg', '<p>The steppe and wetland landscapes of Dauria are protected by the Daurian Nature Reserve, which forms part of a World Heritage Site named &quot;The Landscapes of Dauria&quot;.</p>\r\n\r\n<p>The alternative name, Dauria, is derived from the ethnonym of the Daur people. It stretches for almost 1,000 km from north to south from the Patomskoye Plateau and North Baikal Plateau to the Russian state border. The Transbaikal region covers more than 1,000 km from west to east from Baikal to the meridian of the confluence of the Shilka and Argun Rivers.</p>\r\n\r\n<p>The ancient proto-Mongol Slab Grave Culture occurred around Lake Baikal in the Transbaikal territory.</p>\r\n\r\n<p>In Imperial Russia, Dauria was itself an oblast with its capital at Nerchinsk, then at Chita and became part of the short lived Far Eastern Republic between 1920 and 1922. It is currently divided into Buryatia and Zabaykalsky Krai and makes up nearly all of the territory of these two federal subjects.</p>\r\n\r\n<p>The region has given its name to various animal species including Daurian hedgehog, and the following birds: Asian brown flycatcher (Muscicapa daurica), Daurian jackdaw, Daurian partridge, Daurian redstart, Daurian starling, Daurian shrike and the red-rumped swallow (Hirundo daurica). The Mongolian wild ass (Equus hemionus hemionus) is extinct in the region.</p>\r\n\r\n<p>The common name of the famous Dahurian larch (Larix gmelinii) as well as that of the Dahurian buckthorn (Rhamnus davurica) are also derived from the same source.</p>\r\n\r\n<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Transbaikal The Landscapes of Dauria\" src=\"https://cdn.rbth.com/images/travel/Dauria/IMG_7012.jpg\" style=\"height:354px; width:650px\" /><br />\r\nOktyabrsky (Октябрьский) village, Amur Oblast, near the Russia-China border is a large site of uranium mining and processing facilities.</p>\r\n\r\n<p>Part of the area is protected by the Dauria Nature Reserve.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(10, 'Aphrodisias', 1, 'mon10.jpg', '<p>Aphrodisias (/æfrəˈdɪsiəs/; Ancient Greek: Ἀ&phi;&rho;&omicron;&delta;&iota;&sigma;&iota;ά&sigmaf;, romanized: Aphrodisiás) was a small ancient Greek Hellenistic city in the historic Caria cultural region of western Anatolia, Turkey. It is located near the modern village of Geyre, about 100 km (62 mi) east/inland from the coast of the Aegean Sea, and 230 km (140 mi) southeast of İzmir.</p>\r\n\r\n<p>Aphrodisias was named after Aphrodite, the Greek goddess of love, who had here her unique cult image, the Aphrodite of Aphrodisias. According to the Suda, a Byzantine encyclopedic compilation, before the city became known as Aphrodisias (c.3rd century BCE) it had three previous names: Lelégōn Pólis (&Lambda;&epsilon;&lambda;έ&gamma;&omega;&nu; &pi;ό&lambda;&iota;&sigmaf;, &quot;City of the Leleges&quot;),Megálē Pólis (&Mu;&epsilon;&gamma;ά&lambda;&eta; &Pi;ό&lambda;&iota;&sigmaf;, &quot;Great City&quot;), and Ninóē (&Nu;&iota;&nu;ό&eta;).</p>\r\n\r\n<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Aphrodisias\" src=\"https://daydreamtourist.files.wordpress.com/2012/07/theater.jpg\" style=\"height:488px; width:650px\" /></p>\r\n\r\n<p>Sometime before 640, in the Late Antiquity period when it was within the Byzantine Empire, the city was renamed Stauroúpolis (&Sigma;&tau;&alpha;&upsilon;&rho;&omicron;ύ&pi;&omicron;&lambda;&iota;&sigmaf;, &quot;City of the Cross&quot;).</p>\r\n\r\n<p>In 2017 it was inscribed on the UNESCO World Heritage Site list.<br />\r\nAphrodisias was the metropolis (provincial capital) of the region and Roman province of Caria.</p>\r\n\r\n<p>White and blue grey Carian marble was extensively quarried from adjacent slopes in the Hellenistic and Roman periods, for building facades and sculptures. Marble sculptures and sculptors from Aphrodisias became famous in the Roman world. Many examples of statuary have been unearthed in Aphrodisias, and some representations of the Aphrodite of Aphrodisias also survive from other parts of the Roman world, as far afield as Pax Julia in Lusitania.</p>\r\n\r\n<p><br />\r\nThe stadium was used for athletic events until the theatre was badly damaged by a 7th-century earthquake, requiring part of the stadium to be converted for events previously staged in the theatre.</p>\r\n\r\n<p>The stadium measures[16] approximately 270 m (890 ft) by 60 m (200 ft). With 30 rows of seats on each side, and around each end, it would have had a maximum capacity for around 30,000 spectators. The track measures approximately 225 m (738 ft) by 30 m (98 ft).</p>\r\n\r\n<p>As the stadium is considerably larger and structurally more extensive than even the stadium at the Sanctuary of Apollo at Delphi, it is probably one of the best preserved structures of its kind in the Mediterranean.</p>\r\n', 1),
(11, 'Zubarah', 2, 'mon11.jpg', '<p>Zubarah (Arabic: الزبارة&lrm;), also referred to as Al Zubarah or Az Zubarah, is a ruined and ancient fort located on the north western coast of the Qatar peninsula in the Al Shamal municipality, about 105 km from the Qatari capital of Doha. It was founded by Shaikh Muhammed bin Khalifa, the founder father of Al Khalifa royal family of Bahrain, the main and principal Utub tribe in the first half of the eighteenth century. It was designated a UNESCO World Heritage Site in 2013.</p>\r\n\r\n<p><br />\r\nIt was once a successful center of global trade and pearl fishing positioned midway between the Strait of Hormuz and the west arm of the Persian Gulf. It is one of the most extensive and best preserved examples of an 18th&ndash;19th century settlement in the region. The layout and urban fabric of the settlement has been preserved in a manner unlike any other settlements in the Persian Gulf, providing an insight into the urban life, spatial organization, and the social and economic history of the Persian Gulf before the discovery of oil and gas in the 20th century.</p>\r\n\r\n<p>Covering an area of circa 400 hectares (60 hectares inside the outer town wall), Zubarah is Qatar&rsquo;s most substantial archaeological site. The site comprises the fortified town with a later inner and an earlier outer wall, a harbour, a sea canal, two screening walls, Qal&#39;at Murair (Murair fort), and the more recent Zubarah Fort.</p>\r\n\r\n<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Zubarah\" src=\"https://www.iloveqatar.net/public/images/news/_760x500_clip_center-center_none/x6ho.jpg\" /><br />\r\nZubarah, derived from the Arabic word for &#39;sand mounds&#39;, was presumably given its name due its abundance of sand and stony hillocks.[9] During the early Islamic period, trade and commerce boomed in northern Qatar. Settlements began to appear on the coast, primarily between the towns of Zubarah and Umm al-Ma&#39;a. A village dating back to the Islamic period was discovered near the town.</p>\r\n\r\n<p>Between September 1627 and April 1628, a Portuguese naval squadron led by D. Goncalo da Silveira set a number of neighboring coastal villages ablaze. Zubarah&#39;s settlement and growth during this period is attributed to the dislodging of people from these adjacent settlements.</p>\r\n', 1),
(12, 'Agadez', 2, 'mon12.jpg', '<p>Agadez, formerly spelled Agadès, is the largest city in central Niger, with a population of 118,244 (2012 census). It lies in the Sahara and is the capital of Aïr, one of the traditional Tuareg&ndash;Berber federations. The city is also the capital of the Agadez Region. As of 2011, the urban commune had a total population of 124,324 people.<br />\r\nThe city was founded before the fourteenth century and gradually became the most important Tuareg city, supplanting Assodé, by growing around trans-Saharan trade. The city still sees the arrival of caravans, bringing salt from Bilma.</p>\r\n\r\n<p>In 1449, Agadez became a sultanate, while around 1500 it was conquered by the Songhai Empire. At this point, the city had a population of around 30,000 people and was a key passage for the medieval caravans trading between the West African cities of Kano (and as a result Hausa language is the traditional lingua franca between different ethnic groups in the city, especially in the area of trade, religion and administration) and Timbuktu and the North African oases of Ghat, Ghadames, and Tripoli, on the Mediterranean shore. Decline set in after the Moroccan invasion, and the population sank to less than 10,000.</p>\r\n\r\n<p>Some contend that Agadez was the farthermost point of the Ottoman Empire in the African continent until the 19th century before being occupied by the French colonial empire, though this claim has not been verified by historians.The city was ruled by the French from 1900. A rebellion by Kaocen Ag Mohammed occurred in 1916, but was defeated by French forces. Later, Agadez became an important location in the Tuareg Rebellion of the 1990s in central and northern Niger.</p>\r\n\r\n<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Agadez\" src=\"https://www.wondermondo.com/wp-content/uploads/2017/09/AgadezMosque.jpg\" style=\"height:386px; width:650px\" /></p>\r\n\r\n<p>Today, Agadez flourishes as a market town and as a centre for the transportation of the uranium mined in the surrounding area. Notable buildings in the city include the Agadez Grand Mosque, originally dating from 1515 but rebuilt in the same style in 1844, the Kaocen Palace (now a hotel) and the Agadez Sultan&#39;s Palace. The city is also known for its camel market and its silver and leatherwork.</p>\r\n', 1),
(13, 'Citadel of the Ho Dynasty', 1, 'mon13.jpg', '<p>Citadel of the Hồ Dynasty (Vietnamese: Thành nhà Hồ, Hán Nôm: 城家胡; also called Tây Đô castle or Tây Giai castle) is a citadel in Vietnam, constructed by the Hồ Dynasty (1400-1407).</p>\r\n\r\n<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Citadel of the Ho Dynasty\" src=\"https://www.vietnamtourism.org.vn/files/thumb/600/400//images/content/8c3c3db4ceeacfd30c7b145ad9746b8d.jpg\" /></p>\r\n\r\n<p>It is located in Tây Giai commune, Vĩnh Lộc District, in Thanh Hóa Province, in Vietnam&#39;s North Central Coast region.</p>\r\n\r\n<p>Tây Đô castle is rectangular in shape. Its north-south side is 870.5 m (2,856 ft) in length and its east-west side is 883.5 m (2,899 ft) in length. There are four gates: one at the south (fore gate), one at the north (back gate), one at the east (left gate), and one at the west (right gate). The southern gate is 9.5 m (31 ft) high and 15.17 m (49.8 ft) wide.</p>\r\n\r\n<p>The castle was constructed from stone blocks, each of which is 2&times;1&times;0.7 m (6.6&times;3.3&times;2.3 ft) size on average.</p>\r\n\r\n<p>Except for its gates, the castle is mostly ruined.</p>\r\n\r\n<p>The Citadel was inscribed on UNESCO World Heritage Sites on June 27, 2011.</p>\r\n', 1),
(14, 'Imperial Citadel of Thang Long', 1, 'mon14.jpg', '<p>The Imperial Citadel of Thăng Long (Vietnamese: Hoàng thành Thăng Long/皇城昇龍 HuangChengShengLong)or Dongjing (Đông Kinh 东京) is located in the centre of Hanoi, Vietnam. It is also known as Hanoi Citadel.<br />\r\nThe royal enclosure was first built during the Lý dynasty (1010) and subsequently expanded by the Trần, Lê and finally the Nguyễn dynasty. It remained the seat of the Vietnamese court until 1810, when the Nguyễn dynasty chose to move the capital to Huế. The ruins roughly coincide with the Hanoi Citadel today.</p>\r\n\r\n<p>The royal palaces and most of the structures in Thăng Long were in varying states of disrepair by the late 19th century with the upheaval of the French conquest of Hanoi. By the 20th century many of the remaining structures were torn down. Only in the 21st century are the ruin foundations of Thăng Long Imperial City systematically excavated.</p>\r\n\r\n<p>In mid-1945 the Citadel was used by the Imperial Japanese Army to imprison over 4000 French colonial soldiers captured during the Japanese coup d&#39;état in French Indochina in March 1945.</p>\r\n\r\n<p>The central sector of the imperial citadel was listed in UNESCO&#39;s World Heritage Site on July 31, 2010 at its session in Brazil, as &quot;The Central Sector of the Imperial Citadel of Thăng Long &ndash; Hanoi&quot;.</p>\r\n\r\n<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Imperial Citadel of Thang Long\" src=\"https://previews.123rf.com/images/thoungkung/thoungkung1801/thoungkung180100376/93349040-unesco-world-heritage-site-imperial-citadel-of-thang-long-in-hanoi-vietnam.jpg\" style=\"height:433px; width:650px\" /><br />\r\nThe royal palaces and edifices were largely destroyed in the late 19th century. The few remaining structures within the royal compound are the Doan Mon gate, marking the southern entrance to the royal palace, the Flag Tower, the steps of Kinh Thiên Palace and the Hậu Lâu (Princess&#39; Palace).</p>\r\n\r\n<p>Remains of the Imperial City were discovered on the site of the former Ba Đình Hall when the structure was torn down in 2008 to make way for a new parliament building. Various archaeological remains unearthed were brought to the National Museum to be exhibited. Thus far only a small fraction of Thăng Long has been excavated.</p>\r\n', 1),
(15, 'Great Wall of China', 2, 'mon15.jpg', '<p>The Great Wall of China (Chinese: 萬里長城; pinyin: Wanli Changcheng) is the collective name of a series of fortification systems generally built across the historical northern borders of China to protect and consolidate territories of Chinese states and empires against various nomadic groups of the steppe and their polities. Several walls were being built from as early as the 7th century BC by ancient Chinese states; they were later joined together by Qin Shi Huang (220&ndash;206 BC), the first Emperor of China. Little of that wall remains. Later on, many successive dynasties have built and maintained multiple stretches of border walls. The most currently well-known of the walls were built by the Ming dynasty (1368&ndash;1644).</p>\r\n\r\n<p>Apart from defense, other purposes of the Great Wall have included border controls, allowing the imposition of duties on goods transported along the Silk Road, regulation or encouragement of trade and the control of immigration and emigration. Furthermore, the defensive characteristics of the Great Wall were enhanced by the construction of watch towers, troop barracks, garrison stations, signaling capabilities through the means of smoke or fire, and the fact that the path of the Great Wall also served as a transportation corridor.</p>\r\n\r\n<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho Great Wall of China\" src=\"https://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1492626808/great-wall-china-tourists-GWOC0417.jpg?itok=SZWsDPFN\" style=\"height:406px; width:650px\" /></p>\r\n\r\n<p>The frontier walls built by different dynasties have multiple courses. Collectively, they stretch from Liaodong in the east to Lop Lake in the west, from present-day Sino-Russian border in the north to Taohe River in the south; along an arc that roughly delineates the edge of Mongolian steppe. A comprehensive archaeological survey, using advanced technologies, has concluded that the walls built by the Ming dynasty measure 8,850 km (5,500 mi). This is made up of 6,259 km (3,889 mi) sections of actual wall, 359 km (223 mi) of trenches and 2,232 km (1,387 mi) of natural defensive barriers such as hills and rivers.[4] Another archaeological survey found that the entire wall with all of its branches measures out to be 21,196 km (13,171 mi). Today, the defensive system of Great Wall is generally recognized as one of the most impressive architectural feats in history.</p>\r\n\r\n<p>The longer Chinese name &quot;Ten-Thousand Mile Long Wall&quot; (萬里長城, Wanli Changcheng) came from Sima Qian&#39;s description of it in the Records, though he did not name the walls as such. The ad 493 Book of Song quotes the frontier general Tan Daoji referring to &quot;the long wall of 10,000 miles&quot;, closer to the modern name, but the name rarely features in pre-modern times otherwise.The traditional Chinese mile (里, lǐ) was an often irregular distance that was intended to show the length of a standard village and varied with terrain but was usually standardized at distances around a third of an English mile (540 m). Since China&#39;s metrication in 1930, it has been exactly equivalent to 500 metres or 1,600 feet, which would make the wall&#39;s name describe a distance of 5,000 km (3,100 mi). However, this use of &quot;ten-thousand&quot; (wàn) is figurative in a similar manner to the Greek and English myriad and simply means &quot;innumerable&quot; or &quot;immeasurable&quot;.</p>\r\n\r\n<p><br />\r\nThe Chinese were already familiar with the techniques of wall-building by the time of the Spring and Autumn period between the 8th and 5th centuries BC. During this time and the subsequent Warring States period, the states of Qin, Wei, Zhao, Qi, Han, Yan, and Zhongshan all constructed extensive fortifications to defend their own borders. Built to withstand the attack of small arms such as swords and spears, these walls were made mostly by stone or stamping earth and gravel between board frames.</p>\r\n', 1),
(16, 'The Pyramid, Egypt', 4, 'mon16.jpg', '<p>The Egyptian pyramids are ancient pyramid-shaped masonry structures located in Egypt. As of November 2008, sources cite either 118 or 138 as the number of identified Egyptian pyramids.&nbsp;Most were built as tombs for the country&#39;s pharaohs and their consorts during the Old and Middle Kingdom periods.</p>\r\n\r\n<p><img alt=\"Káº¿t quáº£ hÃ¬nh áº£nh cho pyramid\" src=\"https://www.history.com/.image/t_share/MTU3ODc5MDg2NDMxODcyNzM1/egyptian-pyramids-hero.jpg\" style=\"height:371px; width:650px\" /></p>\r\n\r\n<p>The earliest known Egyptian pyramids are found at Saqqara, northwest of Memphis. The earliest among these is the Pyramid of Djoser, which was built c. 2630&ndash;2610 BC during the Third Dynasty.&nbsp;This pyramid and its surrounding complex were designed by the architect Imhotep, and are generally considered to be the world&#39;s oldest monumental structures constructed of dressed masonry.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The most famous Egyptian pyramids are those found at Giza, on the outskirts of Cairo. Several of the Giza pyramids are counted among the largest structures ever built.&nbsp;The Pyramid of Khufu at Giza is the largest Egyptian pyramid. It is the only one of the Seven Wonders of the Ancient World still in existence.</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `date_added` date DEFAULT NULL,
  `level` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `email`, `date_added`, `level`) VALUES
(2, 'Admin', '$2y$10$iPf7p9l/g1Cim7Umwy0JBeJyOEQvwPrmbD2rymtKMOM9i/teaTY7a', 'Bach Nguyen', 'bach@gmail.com', '2019-05-29', 1),
(3, 'Mod', '$2y$10$p8Iej8i1gYq/gNrDX7lxAOsNvlqbnnhoNptk1X87.l.VwtgKrw8nK', 'Vu Tran', 'vu@gmail.com', '2019-05-31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id_zone` int(11) NOT NULL,
  `name_zone` varchar(50) NOT NULL,
  `img_zone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id_zone`, `name_zone`, `img_zone`) VALUES
(1, 'North', 'destination-12.jpg'),
(2, 'South', 'destination-2.jpg'),
(3, 'East', 'destination-6.jpg'),
(4, 'West', 'destination-9.jpg');

-- --------------------------------------------------------

--
-- Structure for view `combine_ad_mon`
--
DROP TABLE IF EXISTS `combine_ad_mon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `combine_ad_mon`  AS  select `monuments`.`name_mon` AS `name_mon`,`advertisement`.`id_ad` AS `id_ad`,`advertisement`.`vehicle_name` AS `vehicle_name`,`advertisement`.`vehicle_number` AS `vehicle_number`,`advertisement`.`vehicle_price` AS `vehicle_price`,`advertisement`.`travel_from` AS `travel_from`,`advertisement`.`departure_time` AS `departure_time`,`advertisement`.`arrival_time` AS `arrival_time`,`advertisement`.`vehicle_status` AS `vehicle_status`,`advertisement`.`is_public` AS `is_public` from (`monuments` left join `advertisement` on((`monuments`.`id_mon` = `advertisement`.`mon_id`))) union select `monuments`.`name_mon` AS `name_mon`,`advertisement`.`id_ad` AS `id_ad`,`advertisement`.`vehicle_name` AS `vehicle_name`,`advertisement`.`vehicle_number` AS `vehicle_number`,`advertisement`.`vehicle_price` AS `vehicle_price`,`advertisement`.`travel_from` AS `travel_from`,`advertisement`.`departure_time` AS `departure_time`,`advertisement`.`arrival_time` AS `arrival_time`,`advertisement`.`vehicle_status` AS `vehicle_status`,`advertisement`.`is_public` AS `is_public` from (`advertisement` left join `monuments` on((`monuments`.`id_mon` = `advertisement`.`mon_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id_ad`),
  ADD KEY `fk_ad_to_mon` (`mon_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`),
  ADD KEY `fk_banner_to_mon` (`mon_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `fk_feedback_to_mon` (`mon_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gal_id`),
  ADD KEY `fk_gal_to_mon` (`mon_id`);

--
-- Indexes for table `monuments`
--
ALTER TABLE `monuments`
  ADD PRIMARY KEY (`id_mon`),
  ADD KEY `fk_mon_to_zone` (`zone_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id_zone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `monuments`
--
ALTER TABLE `monuments`
  MODIFY `id_mon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id_zone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `fk_ad_to_mon` FOREIGN KEY (`mon_id`) REFERENCES `monuments` (`id_mon`) ON DELETE CASCADE;

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `fk_banner_to_mon` FOREIGN KEY (`mon_id`) REFERENCES `monuments` (`id_mon`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_to_mon` FOREIGN KEY (`mon_id`) REFERENCES `monuments` (`id_mon`) ON DELETE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_gal_to_mon` FOREIGN KEY (`mon_id`) REFERENCES `monuments` (`id_mon`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
