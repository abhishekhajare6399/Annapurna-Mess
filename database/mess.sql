-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 07:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mess`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `messid` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(50) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `userid`, `name`, `messid`, `date`, `day`, `time`) VALUES
(1, '7092420', 'Abhishek Hajare', 868460, '2023-11-01', 'Wednesday', '03:17:52'),
(3, '1146676', 'bhavesh Rao', 868460, '2023-11-01', 'Wednesday', '03:28:09'),
(4, '7092420', 'Abhishek Hajare', 868460, '2023-10-31', 'Wednesday', '22:50:09'),
(5, '7092420', 'Abhishek Hajare', 868460, '2023-11-05', 'Sunday', '14:17:34'),
(6, '7092420', 'Abhishek Hajare', 868460, '2023-11-05', 'Sunday', '18:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `messid` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(20) NOT NULL,
  `foodtype` varchar(100) NOT NULL,
  `time` varchar(20) NOT NULL,
  `menu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `messid`, `date`, `day`, `foodtype`, `time`, `menu`) VALUES
(4, 868460, '2023-10-31', 'Tuesday', 'Veg Food', 'Evening', 'Dal, Rice , Chapati, Kadhi'),
(5, 868460, '2023-11-01', 'Tuesday', 'Non-Veg Food', 'Evening', ''),
(6, 868460, '2023-11-01', 'Wednesday', 'Non-Veg Food', 'Afternoon', 'Dal, Rice, Chiken, Soup, Chapati');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `messid` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` varchar(50) NOT NULL,
  `foodtype` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `plate` int(11) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `messid`, `date`, `day`, `time`, `foodtype`, `name`, `plate`, `mobile`, `price`, `total`) VALUES
(1, 868460, '2023-10-31', 'Tuesday', '06:04:09', 'Veg Food', 'Abhishek Hajare', 5, '', 90, 450);

-- --------------------------------------------------------

--
-- Table structure for table `signupmess`
--

CREATE TABLE `signupmess` (
  `id` int(11) NOT NULL,
  `messid` int(10) NOT NULL,
  `mess` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `bg` varchar(250) NOT NULL,
  `monthly` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  `monthly_onetime` int(11) NOT NULL,
  `coupon_onetime` int(11) NOT NULL,
  `about` varchar(2000) NOT NULL,
  `token` varchar(50) NOT NULL,
  `otp` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `hstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signupmess`
--

INSERT INTO `signupmess` (`id`, `messid`, `mess`, `mobile`, `email`, `password`, `address`, `city`, `state`, `pincode`, `date`, `time`, `description`, `image`, `logo`, `bg`, `monthly`, `coupon`, `monthly_onetime`, `coupon_onetime`, `about`, `token`, `otp`, `status`, `hstatus`) VALUES
(1, 868460, 'Annapurna Mess', '9422339397', 'abhishekshajare786@gmail.com', '$2y$10$oPaVR.0ueLWiKYry6w/KVetdDg2iqroe2KkV6hwTj6.sM/Xs2Qvku', 'Ahmednagar, Maliwada, Wadiya Park, Ahmednagar - 41', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-12', '11:44:46', 'Foodies of all ages enjoy and appreciate Fast Food. When you have an urge to binge on mouthwatering and alluring meals to satisfy a food yearning, the restaurants can provide you with a variety of options. In fact, there are places that also offer healthy', 'Mess_image/brg1.jfif', 'Mess_image/bhel.jpg', 'Mess_image/chines.jpg', 2700, 2900, 1500, 1500, 'Gulmohar Chinese And Fast Food in Gulmohar has a wide range of products and / or services to cater to the varied requirements of their customers. The staff at this establishment are courteous and prompt at providing any assistance. They readily answer any', 'e6907c1fd7636cbcbd45c86bf1d1d2', 4002, 'Active', 'Open'),
(2, 997508, 'Nale Mess', '9542136254', 'abhishek762016@gmail.com', '$2y$10$oPaVR.0ueLWiKYry6w/KVetdDg2iqroe2KkV6hwTj6.sM/Xs2Qvku', 'Plot No. 11, Gulmohar Road, Gulmohar, Ahmednagar ', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-12', '11:42:44', 'Gulmohar Chinese And Fast Food in Gulmohar has a wide range of products and / or services to cater to the varied requirements of their customers. The staff at this establishment are courteous and prompt at providing any assistance. They readily answer any', 'Mess_image /bhel.jpg', ' Mess_image/south1.jpg', 'Mess_image /pizza2.jfif', 0, 0, 0, 0, 'Gulmohar Chinese And Fast Food in Gulmohar has a wide range of products and / or services to cater to the varied requirements of their customers. The staff at this establishment are courteous and prompt at providing any assistance. They readily answer any', '235ccc3cd99172be0afb9e76ddc09d', 8041, 'Active', 'Open'),
(5, 903146, 'Cafe Katta   ', '354686385', 'siddharth.adawale@mitaoe.ac.in', '$2y$10$HxhoGgX6oDC8w/RB2dN9aeTFKthGy4mSkKNgex1jfUG', 'Vasant Vihar Apartment, Balikashram Road, Ahmednag', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-13', '12:25:35', 'Cafe Katta in Ahmednagar. Fast Food with Address, Contact Number, Photos, Maps. View Cafe Katta, Ahmednagar on Justdial.\r\n\r\nFoodies of all ages enjoy and appreciate Fast Food. When you have an urge to binge on mouthwatering and alluring meals to satisfy a', 'hotel image/pizza2.jfif', '', '', 0, 0, 0, 0, '', 'd30c37976c3d49006e82fe435ba2a2', 2963, 'Active', 'Open'),
(6, 375331, 'A 1 Chinese Center   ', '021365215', 'abhishekhajare88@gmail.com', '$2y$10$2nimUdEqbeJfxM1ogtbXu.3IRqm37EANxJYN1/60xSZ', 'H. 118, Ahmednagar, Ahmednagar Locality, Seven Roo', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-13', '12:28:06', 'Foodies of all ages enjoy and appreciate Fast Food. When you have an urge to binge on mouthwatering and alluring meals to satisfy a food yearning, the restaurants can provide you with a variety of options. In fact, there are places that also offer healthy', 'hotel image/chines.jpg', '', '', 0, 0, 0, 0, '', '485f62001d7640cdfe6dbcb1dd0b2e', 4317, 'Active', 'Open'),
(7, 881638, 'Asha Bhel Pandhrichya Pulachi', '2452463351', 'abhishekhajare@gmail.com', '$2y$10$F7gxoTstPk662xjFG9bEweplNqhu91HgF.6.waqcjeG', 'Swastik Chowk, Nagar Pune Road, Swastik Chowk, Ahm', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-13', '12:31:08', 'Restaurants in Ahmednagar provide various cuisines with an aesthetic seating arrangement and the best services. Restaurants act as great places for many situations. From team meetings to family dinners, it can help serve a wide range of audiences. Many re', 'hotel image/bhel1.jpg', '', '', 0, 0, 0, 0, '', '22882172f6949f369a8ec86b2ac4fc', 9495, 'Active', 'Open'),
(8, 271253, 'Hotel Sarang ', '25421017990', 'abhishek088@gmail.com', '$2y$10$5o5zp3x1M0ppATgpCBDu0Oz7/RvAWH/Zj32ZYJ1hR2n', 'Haaji Ibrahim Building, Station Road, Market Yard ', 'Ahmednagar', 'MAHARASHTRA', 414001, '2022-11-13', '12:33:38', 'Also listed in Hotels, Hotels (Rs 1001 To Rs 2000) etc. Hotel Sarang in Market Yard Ahmednagar is one of the most trustworthy names in the field. They have received a 3.9 rating from their customers. To make the transactional experience hassle-free for cu', 'hotel image/thali.jpg', '', '', 0, 0, 0, 0, '', '32529f954650d5bc987ee5d4b9c3d6', 9649, 'Active', 'Open'),
(9, 638489, 'Govinda Deccan Veg', '09421017990', 'abhishekhajare088@gmail.com', '$2y$10$Fmac6ywxwgRM6kTb4/NEhOKfisOhjuyQSDT56oE1TRn', 'Below Z Bridge, Deccan Gymkhana, Pune - 411004, Ne', 'Pune', 'MAHARASHTRA', 411004, '2022-11-13', '01:27:17', 'As the name suggests, Pure Veg Restaurants serve only vegetarian food. They offer a variety of delicious food and many options to choose from. From soups to main course to desserts, they offer anything and everything. Such restaurants can be categorised b', 'hotel image/thali.jpg', '', '', 0, 0, 0, 0, '', 'e64a1debe9b71cfd04a1c4a9e6fcae', 9162, 'Active', 'Open'),
(10, 817486, 'Pizza Hut', 'Pizza Hut', 'abhishekshajare786@gmail.com', '$2y$10$PkZ/qUbbkZviYWbp82x/P.Th6elArivfcMo5IDZVjdV', 'G5, LG Flr, Phoenix Marketcity Mall Survey Number ', 'Pune', 'MAHARASHTRA', 414004, '2022-11-13', '01:29:39', 'As the name suggests, Pure Veg Restaurants serve only vegetarian food. They offer a variety of delicious food and many options to choose from. From soups to main course to desserts, they offer anything and everything. Such restaurants can be categorised b', 'hotel image/pizza2.jfif', '', '', 0, 0, 0, 0, '', '6cc09047583155118f5471d5599d59', 9667, 'Active', 'Open'),
(11, 981838, 'Burger King', '2544210179', 'abhishekhaj@gmail.com', '$2y$10$5k8PwUYXjCndHRMCNqDZg.Y8meyVQXxUM7tLW/HNTW0', 'Survey No 2394, East Street, M G Road, Camp, pune ', 'Pune', 'MAHARASHTRA', 414004, '2022-11-13', '01:31:53', 'Foodies of all ages enjoy and appreciate Fast Food. When you have an urge to binge on mouthwatering and alluring meals to satisfy a food yearning, the restaurants can provide you with a variety of options. In fact, there are places that also offer healthy', 'hotel image/brg1.jfif', '', '', 0, 0, 0, 0, '', 'a6940533e037b7cbbdd087b4d86b22', 4764, 'Active', 'Open'),
(12, 438287, 'Jaishree Pure Veg ', '023458452', 'abhishajare088@gmail.com', '$2y$10$XskJOQb40joD8xTD5AxXQ.RtP/tp9obQSJWLnRXoF9/', 'Shop No 1, 2, 3, 4 Comman Sens Bulding, Market Yar', 'Pune', 'MAHARASHTRA', 414004, '2022-11-13', '01:35:08', 'Restaurants in Pune provide various cuisines with an aesthetic seating arrangement and the best services. Restaurants act as great places for many situations. From team meetings to family dinners, it can help serve a wide range of audiences. Many restaura', 'hotel image/hotel1.jpg', '', '', 0, 0, 0, 0, '', 'dc0b843c483b3eb44372e95cb03cec', 7889, 'Active', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `messid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `messtype` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `joining_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `point` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `token` varchar(250) NOT NULL,
  `mstatus` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `messid`, `userid`, `name`, `mobile`, `email`, `password`, `image`, `messtype`, `time`, `address`, `joining_date`, `start_date`, `end_date`, `point`, `payment`, `payment_status`, `token`, `mstatus`, `status`) VALUES
(1, 868460, '1786356', 'Chetan R Patil', '7776870737', 'chetanr.patil@mitaoe.ac.in', '$2y$10$9hXfQO1AWejGNttg8PcFhOq4KyiBHIk1T.P5HLEGa9Cajv1hCm8WG', 'img/user.jpg', 'Regular', 'Both', 'alandi', '2023-10-31', '2023-10-30', '2023-11-02', 30, 1400, 'Paid', '1cdddfda894ebb8643bb576a6fb35a', 'Active', 'Active'),
(2, 868460, '7092420', 'Abhishek Hajare', '9422339397', 'abhishekhajare088@gmail.com', '$2y$10$tuD4aEJN4oG6GElRM9HBwuDUt4hOWfQwgiz8RWx.qHZhOheeUoTl2', 'M_user/download.png', 'Non-Regular', 'Both', 'Ho. No. 4748 Nirfarake Gali Maliwada Ahmednagar', '2023-10-31', '2023-10-31', '2023-11-07', 1, 2400, 'Paid', '9056806c8024f92e3f5c7a692e1b43', 'Active', 'Active'),
(3, 868460, '1146676', 'bhavesh Rao', '7219844782', 'supprot.farmagri@gmail.com', '$2y$10$z7v7YXy4q.sY/u27y.8oteYrRNhvIJNHyOwIcNXX8cG/UbJ96hPzu', 'img/user.jpg', 'Regular', 'Both', 'Near, MIT AOE, Alandi, Pune', '2023-10-31', '2023-10-29', '2023-10-03', 60, 2400, 'Paid', '4d4247633b2645e007f4589bd0364b', 'Active', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signupmess`
--
ALTER TABLE `signupmess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signupmess`
--
ALTER TABLE `signupmess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
