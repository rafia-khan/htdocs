-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- হোষ্ট: 127.0.0.1
-- তৈরী করতে ব্যবহৃত সময়: আগ 06, 2021 at 09:06 PM
-- সার্ভার সংস্করন: 10.4.17-MariaDB
-- পিএইছপির সংস্করন: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `shopping_db`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `com_logo` varchar(100) DEFAULT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_email` varchar(60) NOT NULL,
  `com_phone` varchar(15) DEFAULT NULL,
  `com_address` varchar(255) DEFAULT NULL,
  `cur_format` varchar(10) NOT NULL,
  `admin_role` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`, `com_logo`, `com_name`, `com_email`, `com_phone`, `com_address`, `cur_format`, `admin_role`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Inventory', 'inventory@gmail.com', NULL, NULL, '$', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL,
  `brand_cat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_cat`) VALUES
(13, 'Realme', 9),
(12, 'Lenovo', 9),
(11, 'LG', 9),
(10, 'Samsung', 9),
(17, 'Xiaomi', 9),
(18, 'CANON', 9),
(19, 'Nikon', 9);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `products` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `products`) VALUES
(9, 'Electronics', 0),
(10, 'Men', 0),
(11, 'Women', 0),
(12, 'Furniture', 0);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `options`
--

CREATE TABLE `options` (
  `s_no` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_title` varchar(100) DEFAULT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_desc` varchar(255) DEFAULT NULL,
  `footer_text` varchar(100) NOT NULL,
  `currency_format` varchar(20) NOT NULL,
  `contact_phone` varchar(15) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `options`
--

INSERT INTO `options` (`s_no`, `site_name`, `site_title`, `site_logo`, `site_desc`, `footer_text`, `currency_format`, `contact_phone`, `contact_email`, `contact_address`) VALUES
(1, 'Super Market', 'Online Shopping Project for Mobiles, Clothes, Electronics and many more....', '16213113221607348871shopping-logo.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, perspiciatis quia repudiandae sapiente sed sunt.', 'Copyright by Tahsan', 'BDT.', '+8801701029783', 'kaziomar144@gmail.com', '#123, Lorem Ipsum');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_qty` varchar(100) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `product_user` int(11) NOT NULL,
  `order_date` varchar(11) NOT NULL,
  `pay_req_id` varchar(100) DEFAULT NULL,
  `confirm` tinyint(4) NOT NULL DEFAULT 0,
  `delivery` tinyint(4) NOT NULL DEFAULT 0,
  `ntfcount` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `order_products`
--

INSERT INTO `order_products` (`order_id`, `product_id`, `product_qty`, `total_amount`, `product_user`, `order_date`, `pay_req_id`, `confirm`, `delivery`, `ntfcount`) VALUES
(1, '17,', '2,', '698', 1, '2021-07-01', 'ca5150ff1c65880ded50f92ed067c95e60dd73e17a2ea', 0, 2, 1),
(2, '17,', '1,', '349', 1, '2021-07-01', '0a30a980e3540e51eb25423caa79f0cb60dd73e4a67b7', 0, 1, 1),
(3, '16,', '1,', '70000', 1, '2021-07-01', 'e0854e3c03ec877be65d351b90680d4660ddd28905b0e', 0, 2, 1),
(4, '16,', '1,', '70000', 1, '2021-07-01', 'de5eeca522e12fd5c9ff9077408dcf1760ddd5b38051f', 0, 1, 1),
(5, '4,', '2,', '93980', 1, '2021-07-07', 'bcfa8a783aaf938cdef361634d5f928960e533043d2db', 0, 1, 1),
(6, '11,', '3,', '2577', 1, '2021-07-07', '3dfe2f633108d604df160cd1b01710db60e53794cdc69', 0, 2, 1),
(7, '16,', '3,', '210000', 1, '2021-07-11', '2669e6395964ace98119e8e86b789dd760ea6cc7452b3', 0, 1, 1),
(8, '15,', '3,', '227997', 1, '2021-07-11', '60a0dd962e40d6cb0456e5e1910230e860eab5d503017', 0, 2, 1),
(9, '16,17,', '2,3,', '141047', 1, '2021-07-11', 'e7a561a2f218bf9cc0e697598320ec5960eac19af050d', 0, 2, 1),
(10, '16,17,', '1,3,', '71047', 1, '2021-07-11', '7392ea4ca76ad2fb4c9c3b6a5c6e31e360eacfcc342ef', 0, 1, 0);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `payments`
--

INSERT INTO `payments` (`payment_id`, `item_number`, `txn_id`, `payment_gross`, `currency_code`, `payment_status`) VALUES
(1, '11,12,15,17,', '7c4121d27bf970f00f1dfdcee8f43a5d60ca311918840', 155462.00, '', 'credit'),
(2, '9,', '1ec3e7af38e33222bde173fecaef6bfa60ca361bc18c9', 359.00, '', 'credit'),
(3, '12,17,', '217f5e7754c92d28fc6835d42f43548d60ca3a98ac371', 1048.00, '', 'credit'),
(4, '18,', '416e5cf0acb7e553a880b7647903da6e60ca3acc80e4a', 3.00, '', 'credit'),
(5, '6,7,', 'c42f891cebbc81aa59f8f183243ac2b960ca3d55279f2', 21630.00, '', 'credit'),
(6, '12,', 'b2004314aa49d95302179246148e032660ca4bb9d2952', 699.00, '', 'credit'),
(7, '16,', 'ed4227734ed75d343320b6a5fd16ce5760ca539dd0b51', 70000.00, '', 'credit'),
(8, '12,', '6967a5fb05106806a40c6917a18023df60ca5a06d0f05', 699.00, '', 'credit'),
(9, '12,', '7e05d6f828574fbc975a896b25bb011e60ca5db836eb2', 699.00, '', 'credit'),
(10, '3,', '5d75b942ab4bd730bc2e819df9c9a4b560ca6031820b6', 11999.00, '', 'credit'),
(11, '11,', 'a6155b0da06d1ad154ad2d039d1fadf460ca60a1a86ae', 859.00, '', 'credit'),
(12, '3,', '800103a4d112ae28491b249670a071ec60cac301ed2c7', 11999.00, '', 'credit'),
(13, '12,', '569ff987c643b4bedf504efda8f786c260cac51aa51dc', 699.00, '', 'credit'),
(14, '3,', '2996962656838a97af4c5f926fe6f1b060cacab5000ba', 11999.00, '', 'credit'),
(15, '12,', '9bb6dee73b8b0ca97466ccb24fff313960cacb0719f98', 699.00, '', 'credit'),
(16, '11,', '1387a00f03b4b423e63127b08c261bdc60cae13ac919e', 859.00, '', 'credit'),
(17, '12,', '6a7dc0811b68d34739654a26ebdb707f60cae27a221ce', 1398.00, '', 'credit'),
(18, '11,', '83691715fdc5baf20ed0742b0b85785b60caf191bd166', 859.00, '', 'credit'),
(19, '11,', '1625abb8e458a79765c62009235e9d5b60caf62773f08', 859.00, '', 'credit'),
(20, '11,12,', '6562c5c1f33db6e05a082a88cddab5ea60caf68f8bf69', 1558.00, '', 'credit'),
(21, '12,', '208e43f0e45c4c78cafadb83d2888cb660cb0f68ced54', 699.00, '', 'credit'),
(22, '12,', 'a76c0abe2b7b1b79e70f0073f43c3b4460cb0f8ad1499', 699.00, '', 'credit'),
(23, '17,18,', '331609c975310d6486391e92a67c549260ce3c69043cf', 352.00, '', 'credit'),
(24, '12,', '7576182d0a84b1ba2207f8f061d48bc960d4c6ce1b9d1', 699.00, '', 'credit'),
(25, '4,', '2a8a812400df8963b2e2ac0ed01b07b860d4c7a9b288d', 234950.00, '', 'credit'),
(26, '15,16,', 'e96f4710c33a97fd1154edddc27b9c5d60d4cd20a7fda', 291998.00, '', 'credit'),
(27, '17,', '528aecdf9cf67e516dfd5eaa675ccfd960d5540c3d617', 349.00, '', 'credit'),
(28, '17,', 'edb446b67d69adbfe9a21068982000c260d556242c6fc', 349.00, '', 'credit'),
(29, '4,5,', '955d864a62659945cc9434898e275deb60d557abd9070', 126075.00, '', 'credit'),
(30, '11,', '341cd40532980c4909c8c647f2138c0360d56763f0e82', 859.00, '', 'credit'),
(31, '2,11,', '5a2b8fee6a50b5594ecc5041eed5365060d5677b8f165', 874.00, '', 'credit'),
(32, '4,11,16,', 'e8f2779682fd11fa2067beffc27a919260d56d7d426d4', 117849.00, '', 'credit'),
(33, '12,15,16,17,', 'de8aa43e5d5fa8536cf23e54244476fa60d56fae14eb9', 147047.00, '', 'credit'),
(34, '4,12,16,', 'f30a31bcad7560324b3249ba66ccf7aa60d576a18503d', 117689.00, '', 'credit'),
(35, '4,12,16,', '32b127307a606effdcc8e51f60a4592260d5f70b71810', 304679.00, '', 'credit'),
(36, '4,12,16,', '32b127307a606effdcc8e51f60a4592260d5f70b71810', 304679.00, '', 'credit'),
(37, '4,12,16,', '32b127307a606effdcc8e51f60a4592260d5f70b71810', 304679.00, '', 'credit'),
(38, '12,', '0d7363894acdee742caf7fe4e97c4d4960d5fd4f50142', 699.00, '', 'credit'),
(39, '11,16,', '5a570102ff1655264e06f782078b5af060d5ff2db83e2', 70859.00, '', 'credit'),
(40, '11,16,', '5a570102ff1655264e06f782078b5af060d5ff2db83e2', 70859.00, '', 'credit'),
(41, '15,16,', '8558cb408c1d76621371888657d2eb1d60d600173bffe', 285999.00, '', 'credit'),
(42, '15,', 'c9504ea381ad9f92f634810069532ee560d60026ea7f3', 75999.00, '', 'credit'),
(43, '12,16,', '246a3c5544feb054f3ea718f61adfa1660d601aba1f3a', 72097.00, '', 'credit'),
(44, '12,16,', '246a3c5544feb054f3ea718f61adfa1660d601aba1f3a', 72097.00, '', 'credit'),
(45, '12,16,', '2974788b53f73e7950e8aa49f3a306db60d6021032ba5', 70699.00, '', 'credit'),
(46, '12,16,', '2974788b53f73e7950e8aa49f3a306db60d6021032ba5', 70699.00, '', 'credit'),
(47, '16,18,', '0eac690d7059a8de4b48e90f1451039160d6051f29f59', 0.00, '', 'credit'),
(48, '16,18,', '0eac690d7059a8de4b48e90f1451039160d6051f29f59', 0.00, '', 'credit'),
(49, '12,16,17,', '06964dce9addb1c5cb5d6e3d9838f73360d606221c66c', 211397.00, '', 'credit'),
(50, '15,16,18,', 'c9f029a6a1b20a8408f372351b321dd860d81f714ed46', 0.00, '', 'credit'),
(51, '15,', '4fc848051e4459b8a6afeb210c3664ec60d8206bed372', 75999.00, '', 'credit'),
(52, '12,', 'b29eed44276144e4e8103a661f9a78b760d8390b14219', 699.00, '', 'credit'),
(53, '12,', '4042483f5c2c4015e2a6abd47aa76b6f60d8392bb84c5', 699.00, '', 'credit'),
(54, '3,', '71f6278d140af599e06ad9bf1ba03cb060d8395571ea9', 11999.00, '', 'credit'),
(55, '3,', '5e751896e527c862bf67251a474b381960d839787e2c1', 11999.00, '', 'credit'),
(56, '11,', '85b6c99bb36d6e7be78bf8fd28d6e43d60d8398faebdd', 859.00, '', 'credit'),
(57, '4,16,', '71d2d6ccac82f8a334937ff0fcdc0d8a60d86e5419681', 280970.00, '', 'credit'),
(58, '16,', '315f006f691ef2e689125614ea22cc6160d86f98154b5', 210000.00, '', 'credit'),
(59, '11,', 'daaaf13651380465fc284db6940d847860da13bbbad5f', 2577.00, '', 'credit'),
(60, '5,', '6e82873a32b95af115de1c414a1849cb60da13f6b0063', 64190.00, '', 'credit'),
(61, '11,', '10cc088a48f313ab3b1f4e6e76353dd460da145550097', 859.00, '', 'credit'),
(62, '16,', '33b3214d792caf311e1f00fd22b392c560da1591069a3', 70000.00, '', 'credit'),
(63, '5,', '4513c30b7d281d3bd5b6f91ddb1f61b960da160285c15', 32095.00, '', 'credit'),
(64, '16,17,', 'b5200c6107fc3d41d19a2b66835c397460db3a4fa105f', 71047.00, '', 'credit'),
(65, '16,17,', '6f780a0221033e49ffec2199ba1d74b260db3c65a7c0d', 70349.00, '', 'credit'),
(66, '12,', '288cd2567953f06e460a33951f55daaf60db3ceb26baf', 699.00, '', 'credit'),
(67, '12,', 'abd1c782880cc59759f4112fda0b8f9860db3d05d3370', 699.00, '', 'credit'),
(68, '17,', 'b7d35509ab19d0cd2256a219de0fe0ff60db3fd946acd', 349.00, '', 'credit'),
(69, '4,12,', 'c89ca36e4d0430e75ca2390470a59a5960db41ddaabae', 94679.00, '', 'credit'),
(70, '4,12,', 'c25e9a36b62f62f58f847fa83c70dc9160db41f6b24c9', 94679.00, '', 'credit'),
(71, '15,17,', '1543ceff58b1606182e9b7cf357712b360dc44227bcbe', 229044.00, '', 'credit'),
(72, '15,', '411ae1bf081d1674ca6091f8c59a266f60dc44e0bfc0f', 151998.00, '', 'credit'),
(73, '15,', '2548a4ac7ad6eddd035bced24ec6d96460dc4505dc749', 151998.00, '', 'credit'),
(74, '14,', '1d49780520898fe37f0cd6b41c5311bf60dc5bc8be784', 167997.00, '', 'credit'),
(75, '17,18,', 'f4492508850c58446d4784339470a8f660dd7106abf30', 3449.00, '', 'credit'),
(76, '12,17,', '4d702022947b6fed64518d0d7cfc692d60dd736b879ab', 1397.00, '', 'credit'),
(77, '17,', '49afa3a1bba5280af6c4bf2fb5ea766960dd73742703d', 1047.00, '', 'credit'),
(78, '17,', 'ca5150ff1c65880ded50f92ed067c95e60dd73e17a2ea', 698.00, '', 'credit'),
(79, '17,', '0a30a980e3540e51eb25423caa79f0cb60dd73e4a67b7', 349.00, '', 'credit'),
(80, '16,', 'e0854e3c03ec877be65d351b90680d4660ddd28905b0e', 70000.00, '', 'credit'),
(81, '16,', 'de5eeca522e12fd5c9ff9077408dcf1760ddd5b38051f', 70000.00, '', 'credit'),
(82, '4,', 'bcfa8a783aaf938cdef361634d5f928960e533043d2db', 93980.00, '', 'credit'),
(83, '11,', '3dfe2f633108d604df160cd1b01710db60e53794cdc69', 2577.00, '', 'credit'),
(84, '16,', '2669e6395964ace98119e8e86b789dd760ea6cc7452b3', 210000.00, '', 'credit'),
(85, '15,', '60a0dd962e40d6cb0456e5e1910230e860eab5d503017', 227997.00, '', 'credit'),
(86, '16,17,', 'e7a561a2f218bf9cc0e697598320ec5960eac19af050d', 141047.00, '', 'credit'),
(87, '16,17,', '7392ea4ca76ad2fb4c9c3b6a5c6e31e360eacfcc342ef', 71047.00, '', 'credit');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_sub_cat` int(11) NOT NULL,
  `product_brand` int(100) DEFAULT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_desc` text NOT NULL,
  `featured_image` text NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `product_keywords` text DEFAULT NULL,
  `product_views` int(11) DEFAULT 0,
  `product_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_cat`, `product_sub_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `featured_image`, `qty`, `product_keywords`, `product_views`, `product_status`) VALUES
(2, '5fc500f4330ad', 9, 18, 10, 'Samsung Galaxy A20s (Blue, 32 GB)  (3 GB RAM)', '15499', '3 GB RAM | 32 GB ROM | Expandable Upto 512 GB\r\n16.51 cm (6.5 inch) HD+ Display\r\n13MP + 8MP + 5MP | 8MP Front Camera\r\n4000 mAh Lithium Ion Battery\r\nQualcomm SDM450-B01 Processor', '1598962160galaxy-a20s.jpeg', 5, NULL, 8, 1),
(3, '5fc500ec98a64', 9, 18, 13, 'Realme C3 (Volcano Grey, 32 GB)  (3 GB RAM)', '11999', '3 GB RAM | 32 GB ROM | Expandable Upto 256 GB\r\n16.56 cm (6.52 inch) HD+ Display\r\n12MP + 2MP | 5MP Front Camera\r\n5000 mAh Battery\r\nHelio G70 Processor', '1598962665realme-c3.jpeg', 5, NULL, 53, 1),
(4, '5fc500e4de9c2', 9, 19, 12, 'Lenovo Ideapad Flex 5 Core i3 10th Gen - (4 GB/256 GB SSD/Windows 10 Home) 14IIL05 2 in 1 Laptop  (14 inch, Graphite Grey, 1.5 kg, With MS Office)', '46990', 'Carry It Along 2 in 1 Laptop\r\n14 inch Full HD LED Backlit Glossy IPS Touch Display (16:9 Aspect Ratio, 250 nits Brightness, Stylus Support)\r\nLight Laptop without Optical Disk Drive\r\n\r\nShipping charges are calculated based on the number of units, distance and delivery date.\r\nFor Plus customers, shipping charges are free.\r\nFor non-Plus customers, if the total value of FAssured items is more than Rs.500, shipping charges are free. If the total value of FAssured items is less than Rs.500, shipping charges = Rs.40 per unit\r\n* For faster delivery, shipping charges will be applicable.', '1598962854lenovo.jpeg', 5, NULL, 14, 1),
(5, '5fc500decacd2', 9, 19, 12, 'Lenovo Ideapad 3 Core i3 10th Gen - (4 GB/1 TB HDD/DOS) 14IIL05 Thin and Light Laptop  (14 inch, Platinum Grey, 1.6 kg)', '32095', 'Stylish &amp; Portable Thin and Light Laptop\r\n14 inch HD LED Backlit Anti-glare TN Display (220 nits Brightness)\r\nLight Laptop without Optical Disk Drive', '1598963006lenovo-2.jpeg', 5, NULL, 7, 1),
(6, '5fc500d9502a7', 12, 25, 0, 'Flipkart Perfect Homes Iris Therapedic 6 inch King Bonnell Spring Mattress', '11090', 'Length: 78 inch, Width: 72 inch, Thickness: 6 inch (6 ft 6 in x 6 ft x 6 in)\r\nSupport Type: Bonnell Spring\r\nComfort Layer: PU Foam\r\nMattress Features: Orthopedic Mattress, Zero Partner Disturbance, Sag Resistant Mattress', '1598963093queen-10.jpeg', 5, NULL, 1, 1),
(7, '5fc500d3ae088', 12, 25, 0, 'Peps Springkoil Normal Top Blue 6 inch Double Bonnell Spring Mattress', '10540', 'Length: 72 inch, Width: 48 inch, Thickness: 6 inch (6 ft x 4 ft x 6 in)\r\nSupport Type: Bonnell Spring\r\nComfort Layer: PU Foam\r\nMattress Features: Reversible Mattress', '1598963343double-10.jpeg', 5, NULL, 4, 1),
(8, '5fc500cd9a2c4', 12, 24, 0, 'Delite Kom Riley Engineered Wood Bedside Table  (Finish Color - Acacia Dark)', '2750', 'Rectangular\r\nWidth x Height: 44.958 x 39.878 cm (1 ft 5 in x 1 ft 3 in)\r\nSuitable For: Bedroom Furniture, Living Room\r\nStorage Included\r\nDIY - Basic assembly to be done with simple tools by the customer, comes with instructions', '1598963469particle-board.jpeg', 5, NULL, 1, 1),
(9, '5fc500c7c7bef', 10, 26, 0, 'Abstract Men Hooded Neck Dark Blue T-Shirt', '359', '10% Instant Discount on Bank Of Baroda Credit Cards\r\n10% Instant Discount on Federal Bank Debit Cards', '1598963616s-tnvhdf.jpeg', 5, NULL, 3, 1),
(10, '5fc500c285db4', 10, 26, 0, 'Printed Men Round Neck Yellow T-Shirt', '284', 'Get extra 5.0% off (price inclusive of discount)\r\n10% Instant Discount on Federal Bank Debit Cards\r\n10% Instant Discount on Bank Of Baroda Credit Cards', '1598963703xl-newyork.jpeg', 5, NULL, 0, 1),
(11, '5fc500bc5d3e3', 11, 27, 0, 'Women Printed Pure Cotton A-line Kurta  (White, Blue, Pink)', '859', '10% Instant Discount on Federal Bank Debit Cards\r\n10% Instant Discount on Bank Of Baroda Credit Cards\r\n5% Unlimited Cashback on Flipkart Axis Bank Credit Card', '1598963806xxl-md377.jpeg', 5, NULL, 25, 1),
(12, '5fc500b5570aa', 11, 28, 0, 'Polka Print Bhagalpuri Cotton Blend Saree  (Blue)', '699', '&lt;pre style=&quot;height: 137px;&quot;&gt;Special Price  Get extra 10.0% off (price inclusive of discount)Bank Offer10% Instant Discount on Federal Bank Debit Cards&lt;/pre&gt;', '16236915661598963976free-kora.jpeg', 0, NULL, 54, 1),
(14, '60c982e886e30', 9, 21, 18, 'CANON EOS M50 24.1MP WITH 15-45MM IS STM LENS 4K WI-FI MIRRORLESS CAMERA', '55999', '&lt;p&gt;&lt;/p&gt;&lt;h2&gt;&lt;i&gt;&lt;u&gt;&lt;span style=&quot;color:rgb(0,0,255);font-weight: normal;&quot;&gt;Key Features&lt;/span&gt;&lt;/u&gt;&lt;/i&gt;&lt;/h2&gt;&lt;p&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Model:  Canon EOS M50 &lt;/li&gt;&lt;li&gt;24.1MP APS-C CMOS Sensor&lt;/li&gt;&lt;li&gt;DIGIC 8 Image Processor&lt;/li&gt;&lt;li&gt;2.36m-Dot OLED Electronic Viewfinder&lt;/li&gt;&lt;li&gt;2.36m-Dot OLED Electronic Viewfinder&lt;/li&gt;&lt;li&gt;3.0&quot;  Vari-Angle Touchscreen&lt;/li&gt;&lt;/ol&gt;', '1623818984canon-eos-m50-1-500x500.jpg', 5, NULL, 9, 1),
(15, '60c985cd0b986', 9, 21, 19, 'Nikon D5600 DSLR Camera with 18-140mm Lens', '75999', '&lt;ul&gt;&lt;li&gt;Model: Nikon D5600&lt;/li&gt;&lt;li&gt;24.2MP DX-Format CMOS Sensor&lt;/li&gt;&lt;li&gt;EXPEED 4 Image Processor&lt;/li&gt;&lt;li&gt;Display 3.2&quot; Touchscreen&lt;/li&gt;&lt;li&gt;FHD 1080p Video Recording at 60 fps&lt;/li&gt;&lt;/ul&gt;', '1623819725d5600-500x500.jpg', 5, NULL, 5, 1),
(16, '60c98972bbde2', 9, 18, 17, 'Xiaomi Mi 11 Pro', '70000.00', '&lt;table class=&quot;aps-specs-table&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td class=&quot;aps-attr-title&quot;&gt;&lt;table class=&quot;aps-specs-table&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td class=&quot;aps-attr-title&quot;&gt;&lt;br&gt;&lt;/td&gt;&lt;td class=&quot;aps-attr-value&quot;&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td class=&quot;aps-attr-title&quot;&gt;&lt;br&gt;&lt;/td&gt;&lt;td class=&quot;aps-attr-value&quot;&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/td&gt;&lt;td class=&quot;aps-attr-value&quot; align=&quot;center&quot;&gt;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            &lt;table class=&quot;specstable&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;Genarel&lt;/b&gt;&lt;br&gt;Brand&lt;/td&gt;&lt;td&gt;Xiaomi Mobile          &lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Device Name&lt;/td&gt;          &lt;td&gt;Xiaomi Mi 11 Pro 5G&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Launch Date&lt;/td&gt;          &lt;td&gt;March 29, 2021&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Body&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Color&lt;/td&gt;          &lt;td&gt; Black&lt;br&gt;  Green&lt;br&gt;  Purple&lt;br&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Height&lt;/td&gt;          &lt;td&gt;164.3 mm&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Width&lt;/td&gt;          &lt;td&gt;74.6 mm&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Thickness&lt;/td&gt;          &lt;td&gt;8.5 mm&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Weight&lt;/td&gt;          &lt;td&gt;208 gram&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Durability&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Build Material&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;Front Glass&lt;/li&gt;&lt;li&gt;Back Glass&lt;/li&gt;&lt;li&gt;Aluminium Frame&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Protection&lt;/td&gt;          &lt;td&gt;&lt;p class=&quot;acf-label&quot;&gt;&lt;ul&gt;&lt;li class=&quot;description&quot;&gt;Corning Gorilla Glass Victus on Front&lt;/li&gt;&lt;li class=&quot;description&quot;&gt;Corning Gorilla Glass Victus on Back&lt;/li&gt;&lt;/ul&gt;&lt;/p&gt;&lt;p class=&quot;acf-input&quot;&gt;&lt;p id=&quot;wp-acf-editor-97-wrap&quot; class=&quot;acf-editor-wrap wp-core-ui wp-editor-wrap tmce-active&quot; data-toolbar=&quot;basic&quot;&gt;&lt;/p&gt;&lt;/p&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Resistance&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;IP68&lt;/li&gt;&lt;li&gt;Dust / Water resistant (up to 1.5m for 30 mins)&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Display&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Feature&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;AMOLED&lt;/li&gt;&lt;li&gt;HDR10+&lt;/li&gt;&lt;li&gt;Punch Hole Display&lt;/li&gt;&lt;li&gt;120Hz Refresh Rate&lt;/li&gt;&lt;li&gt;480Hz Touch Sampling Rate&lt;/li&gt;&lt;li&gt;1500 nits typ. brightness&lt;/li&gt;&lt;li&gt;91.4% screen-to-body ratio&lt;/li&gt;&lt;li&gt;10bit Color&lt;/li&gt;&lt;li&gt;1 Billion Colors&lt;/li&gt;&lt;li&gt;Dolby Vision&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Size&lt;/td&gt;          &lt;td&gt;6.81 inches&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Resolution&lt;/td&gt;          &lt;td&gt;QHD+ (3200 x 1440 Pixels)&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Pixel Density&lt;/td&gt;          &lt;td&gt;515 PPI&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Aspect Ratio&lt;/td&gt;          &lt;td&gt;19.5:9&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Notification LED&lt;/td&gt;          &lt;td&gt;No&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Performance&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Operating System&lt;/td&gt;          &lt;td&gt;Android 11&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Custom UI&lt;/td&gt;          &lt;td&gt;MIUI 12.5&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Chipset&lt;/td&gt;          &lt;td&gt;Qualcomm Snapdragon 888&lt;br&gt;          &lt;a href=&quot;https://www.devicefit.com/specs/snapdragon-888-mobile-phones/&quot; data-amp-original-style=&quot;color: #FFFFFF; background-color: #0367A6; padding: 0px 10px;&quot; class=&quot;amp-wp-32c96f0&quot;&gt;View all phones with Qualcomm Snapdragon 888 ?&lt;/a&gt;          &lt;/td&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Technology&lt;/td&gt;          &lt;td&gt;5 nm&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;CPU&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;64bit&lt;/li&gt;&lt;li&gt;3.1GHz&lt;/li&gt;&lt;li&gt;Octa-Core (1×3.1 GHz Kryo 485 &amp;amp; 3×2.42 GHz Kryo 485 &amp;amp; 4×1.78 GHz Kryo 485)&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;GPU&lt;/td&gt;          &lt;td&gt;Adreno 660&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;RAM&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;8GB / 12GB&lt;/li&gt;&lt;li&gt;LPDDR5 6400Mbps&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Storage Memory&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Memory&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;128GB / 256GB&lt;/li&gt;&lt;li&gt;UFS 3.1&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;OTG Support&lt;/td&gt;          &lt;td&gt;Yes&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Back Camera&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Feature&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;50MP (Main)&lt;/li&gt;&lt;li&gt;8MP (Periscope Telephoto)&lt;/li&gt;&lt;li&gt;13MP (123° Ultra Wide)&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Flash&lt;/td&gt;          &lt;td&gt;Dual LED Flash&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Sensor&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;50MP ( Samsung GN2)&lt;/li&gt;&lt;li&gt;8MP (Omnivision OV08A10)&lt;/li&gt;&lt;li&gt;13MP (Omnivision OV13B10)&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Other Features&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;5X Optical zoom&lt;/li&gt;&lt;li&gt;50X Periscope zoom&lt;/li&gt;&lt;li&gt;10X Hybrid optical zoom&lt;/li&gt;&lt;li&gt;Panorama mode&lt;/li&gt;&lt;li&gt;Professional Mode&lt;/li&gt;&lt;li&gt;Dynamic Photo&lt;/li&gt;&lt;li&gt;HDR&lt;/li&gt;&lt;li&gt;Portrait Blur Adjustment&lt;/li&gt;&lt;li&gt;Night Mode&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Video Recording&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;8K @ 24fps with HDR 10&lt;/li&gt;&lt;li&gt;4K @ 30 / 60fps with HDR 10+&lt;/li&gt;&lt;li&gt;1080p @ 30 / 60fps&lt;/li&gt;&lt;li&gt;Slow Motion 1080p @ 120 / 240 / 480 / 960 / 1920fps&lt;/li&gt;&lt;li&gt;Slow Motion 720p @ 120 / 240 / 480 / 960 / 1920fps&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Stabilization&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;OIS (50MP + 8MP)&lt;/li&gt;&lt;li&gt;Gyro-EIS&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Front Camera&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Feature&lt;/td&gt;          &lt;td&gt;&lt;p&gt;20MP&lt;/p&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Sensors&lt;/td&gt;          &lt;td&gt;&lt;p&gt;20MP ( Samsung S5K3T2)&lt;/p&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Other Features&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;Shot suggestions&lt;/li&gt;&lt;li&gt;Flaw Detection&lt;/li&gt;&lt;li&gt;Night Mode&lt;/li&gt;&lt;li&gt;Panorama&lt;/li&gt;&lt;li&gt;3D ??beauty&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Video Recording&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;1080p @ 30 / 60fps&lt;/li&gt;&lt;li&gt;720p @ 30fps&lt;/li&gt;&lt;li&gt;Slow Motion 720p @ 120fps&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Stabilization&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;EIS&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Audio&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Audio Feature&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;24-bit/192kHz audio&lt;/li&gt;&lt;li&gt;Dolby Atmos Technology (Dolby Digital, Dolby Digital Plus Included)&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Speaker&lt;/td&gt;          &lt;td&gt;Stereo Speakers&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Network &amp;amp; Connectivity&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Card Slot&lt;/td&gt;          &lt;td&gt;Dual SIM Slot&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Network Type&lt;/td&gt;          &lt;td&gt;5G, 4G, 3G, 2G&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;WiFi&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;Wi-Fi 802.11 a/b/g/n/ac&lt;/li&gt;&lt;li&gt;WiFi 6&lt;/li&gt;&lt;li&gt;Supports 2.4G WiFi + 5G WiFi&lt;/li&gt;&lt;li&gt;WiFi Direct&lt;/li&gt;&lt;li&gt;DLNA&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Mobile Hotspot&lt;/td&gt;          &lt;td&gt;Yes&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Bluetooth&lt;/td&gt;          &lt;td&gt;Bluetooth 5.2, Supports A2DP, LE, APTX HD&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Navigation&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;GPS&lt;/li&gt;&lt;li&gt;A-GPS&lt;/li&gt;&lt;li&gt;Galileo&lt;/li&gt;&lt;li&gt;Glonass&lt;/li&gt;&lt;li&gt;BDS&lt;/li&gt;&lt;li&gt;QZSS&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;NFC&lt;/td&gt;          &lt;td&gt;Yes&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;USB Type&lt;/td&gt;          &lt;td&gt;USB Type C&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Battery &amp;amp; Charging&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Battery&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;5000mAh&lt;/li&gt;&lt;li&gt;Non-Removable Li-Polymer Battery&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Wireless Charging&lt;/td&gt;          &lt;td&gt;&amp;nbsp;Fast wireless charging 67W &amp;amp; Reverse wireless charging 10W&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Charging&lt;/td&gt;          &lt;td&gt;Fast charging 67W &amp;amp; Quick Charge 5, Quick Charge 4+ &amp;amp; Power Delivery 3.0&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;          &lt;th colspan=&quot;2&quot;&gt;Security &amp;amp; Sensors&lt;/th&gt;        &lt;/tr&gt;&lt;tr&gt;          &lt;td&gt;Security&lt;/td&gt;          &lt;td&gt;&lt;ul&gt;&lt;li&gt;Face Unlock&lt;/li&gt;&lt;li&gt;In-Display Optical Fingerprint Sensor&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;          &lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Other Sensors&lt;/td&gt;&lt;td&gt;&lt;ul&gt;&lt;li&gt;Ultrasonic distance sensor&lt;/li&gt;&lt;li&gt;Ambient light sensor&lt;/li&gt;&lt;li&gt;Acceleration sensor&lt;/li&gt;&lt;li&gt;Gyroscope&lt;/li&gt;&lt;li&gt;Electronic compass&lt;/li&gt;&lt;li&gt;X axis linear motor&lt;/li&gt;&lt;li&gt;Infrared remote control&lt;/li&gt;&lt;li&gt;Grip sensor&lt;/li&gt;&lt;/ul&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td class=&quot;aps-attr-title&quot;&gt;&lt;br&gt;&lt;/td&gt;&lt;td class=&quot;aps-attr-value&quot;&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', '1623820658Xiaomi-Mi-11-Pro-Purple.jpg', 4, NULL, 8, 1),
(17, '60c98b2577972', 11, 27, 0, 'New Exclusive Hot Kurti For Stylish Women (1 pic)', '349', '&lt;p class=&quot;html-content pdp-product-highlights&quot;&gt;&lt;/p&gt;&lt;ul class=&quot;&quot;&gt;&lt;li class=&quot;&quot;&gt;·&lt;span style=&quot;color:rgb(255,0,0);&quot;&gt; Color: Same as Picture&lt;/span&gt;&lt;/li&gt;&lt;li class=&quot;&quot; data-spm-anchor-id=&quot;a2a0e.pdp.product_detail.i1.3b27654fS29IOJ&quot;&gt;· Gender: Women&lt;/li&gt;&lt;li class=&quot;&quot;&gt;· Rich fabric· Designed according to latest patterns&lt;/li&gt;&lt;li class=&quot;&quot;&gt;· Offered in various sizes and colors&lt;/li&gt;&lt;li class=&quot;&quot;&gt;· Easy to wash· Perfect fitting&lt;/li&gt;&lt;li class=&quot;&quot;&gt;· Comfortable &amp;amp; soft&lt;/li&gt;&lt;li class=&quot;&quot;&gt;·&lt;b&gt; High quality fabric, stylish design, and comfortable.&lt;/b&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;/p&gt;', '16238210938e38dcb0e2e138207be3f9cfdfd66a83.jpg', 2, NULL, 11, 1),
(18, '60c98c1baf8f6', 11, 28, 0, 'Eid Exclusive Cotton Saree TS4977', '3100', '&lt;br&gt;&lt;p class=&quot;short-description&quot;&gt;&lt;/p&gt;&lt;h2&gt;&lt;span style=&quot;color:rgb(255,0,0);&quot;&gt;&lt;u style=&quot;color: rgb(255, 0, 0);&quot;&gt;&lt;span style=&quot;color:rgb(19,79,92);&quot;&gt;Quick Overview&lt;/span&gt;&lt;/u&gt;&lt;/span&gt;&lt;/h2&gt;&lt;p class=&quot;std&quot;&gt;Eid Exclusive Cotton Saree TS4977&lt;br&gt;&lt;br&gt;&amp;nbsp;&lt;span style=&quot;color: rgb(11, 83, 148);&quot;&gt;&lt;span style=&quot;color:rgb(0,255,255);&quot;&gt;&lt;b style=&quot;color: rgb(0, 255, 255);&quot;&gt;Fabrics : Cotton&lt;/b&gt;&lt;/span&gt;&lt;br style=&quot;color: rgb(11, 83, 148);&quot;&gt;Design : Latest Design&lt;br style=&quot;color: rgb(11, 83, 148);&quot;&gt;Un-Stitched Blouse Piece Included&lt;br style=&quot;color: rgb(11, 83, 148);&quot;&gt;&amp;nbsp;Wash : Dry Clean Only&lt;br style=&quot;color: rgb(11, 83, 148);&quot;&gt;&amp;nbsp;Condition : New &amp;amp; Original&lt;br style=&quot;color: rgb(11, 83, 148);&quot;&gt;Color : As Same As Image&lt;br style=&quot;color: rgb(11, 83, 148);&quot;&gt;&amp;nbsp;Made with ? in Bangladesh&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '1623821625PngItem-1403143.png', 5, NULL, 6, 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `product_cart`
--

CREATE TABLE `product_cart` (
  `s_no` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_title` varchar(100) NOT NULL,
  `cat_parent` int(11) NOT NULL,
  `cat_products` int(11) NOT NULL DEFAULT 0,
  `show_in_header` tinyint(4) NOT NULL DEFAULT 1,
  `show_in_footer` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_id`, `sub_cat_title`, `cat_parent`, `cat_products`, `show_in_header`, `show_in_footer`) VALUES
(19, 'Laptops', 9, 2, 1, 0),
(21, 'Camera', 9, 2, 0, 1),
(20, 'Speakers', 9, 0, 0, 0),
(18, 'Mobiles', 9, 3, 1, 1),
(22, 'Kitchen', 12, 0, 0, 1),
(23, 'Tableware', 12, 0, 0, 1),
(24, 'Living Room', 12, 1, 0, 1),
(25, 'Beds', 12, 2, 1, 1),
(26, 'Men\'s T-Shirts', 10, 2, 1, 1),
(27, 'Kurti\'s', 11, 2, 1, 1),
(28, 'Sarees', 11, 2, 1, 1),
(29, 'Redmi', 9, 0, 0, 1),
(30, 'Contact us', 13, 0, 0, 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `user_role` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `email`, `password`, `mobile`, `address`, `city`, `user_role`) VALUES
(1, 'Tahsan', 'Tanjim', 'tahsan123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '+8801701029783', 'Barishal', 'Barishal', 0),
(4, 'Kazi Omar', 'Faruk', 'kaziomar144@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '+8801580721919', 'Mirpur-12', 'Dhaka', 1);

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- টেবিলের ইনডেক্সসমুহ `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- টেবিলের ইনডেক্সসমুহ `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- টেবিলের ইনডেক্সসমুহ `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`s_no`);

--
-- টেবিলের ইনডেক্সসমুহ `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_id`);

--
-- টেবিলের ইনডেক্সসমুহ `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- টেবিলের ইনডেক্সসমুহ `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- টেবিলের ইনডেক্সসমুহ `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`s_no`);

--
-- টেবিলের ইনডেক্সসমুহ `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- টেবিলের ইনডেক্সসমুহ `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
