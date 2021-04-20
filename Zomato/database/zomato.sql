-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 11:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zomato`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `address`, `city`, `pin`) VALUES
(4, 33, 'Kestopur', 'Kolkata', 700001),
(5, 34, 'Ghoshhat, Katwa', 'Burdwan', 713212);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_type` varchar(20) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `coupon_code`, `coupon_type`, `coupon_value`, `cart_min_value`, `status`) VALUES
(1, 'NONE', 'NULL', 0, 0, 1),
(2, 'PER15', 'DISCOUNT', 15, 399, 1),
(3, 'ZOMATO150', 'FLAT OFF', 150, 999, 1),
(4, 'GET25', 'DISCOUNT', 25, 799, 1),
(5, 'EAT50', 'FLAT OFF', 50, 599, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cusines`
--

CREATE TABLE `cusines` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cusines`
--

INSERT INTO `cusines` (`id`, `name`, `img`) VALUES
(1, 'North Indian', 'https://nrai.org/wp-content/uploads/2016/07/thali-1030x778-660x330.jpg'),
(2, 'South Indian', 'http://curlytales.com/wp-content/uploads/2018/11/shutterstock_1153818823.jpg'),
(3, 'Chinese', 'https://i.ndtvimg.com/i/2017-08/noodles-620x350_620x350_41502436420.jpg'),
(4, 'Biriyani', 'https://www.thespruceeats.com/thmb/SalyKjzBU-K1Bv-FTFWnbd6ckjY=/2121x1414/filters:fill(auto,1)/GettyImages-639704020-5c4a63ecc9e77c00017bfebf.jpg'),
(5, 'Desserts', 'https://i.ndtvimg.com/i/2018-03/french-desserts_620x350_51520851425.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `img` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `img`, `description`, `price`, `res_id`, `cus_id`) VALUES
(1, 'Idli', 'https://i2.wp.com/tomatoblues.com/wp-content/uploads/2018/07/SAMAI-IDLI-1-490x740.jpg?resize=490%2C740', '2 pieces', 70, 1, 2),
(2, 'Upma Meal', 'https://b.zmtcdn.com/data/dish_photos/afc/c94ac1788f1e7aaa5a07e84e9bec7afc.jpg?fit=around|130:130&crop=130:130;*,*', 'Upma+Sambar+White Chutney+Red Chutney', 90, 1, 2),
(3, 'Rava Kesari', 'https://www.indianhealthyrecipes.com/wp-content/uploads/2018/08/rava-kesari-recipe.jpg', 'Rava kesari is a popular sweet dish from South Indian cuisine made of rava or suji, ghee, sugar, kesari and nuts.', 100, 1, 5),
(4, 'Chicken Dum Biriyani', 'https://static.toiimg.com/thumb/54308405.cms?imgsize=510571&width=800&height=800', 'Hyderabadi biryani, also known as Hyderabadi dum biryani.', 300, 2, 4),
(5, 'Dhaba Mutton Curry', 'http://yummykit.com/wp-content/uploads/2016/03/dhaba-mutton-curry-recipe.jpg', 'Dhabe Da Meat - \'Dhaba\' is a road-side food stall in India and Pakistan.  It is the special Punjabi delicacy of lamb meat cooked in rich oil or ghee and combined flavors of whole dried spices. It is meat-based gravy, especially mutton.', 400, 2, 1),
(6, 'Garlic Naan', 'https://www.cookwithmanali.com/wp-content/uploads/2018/09/Garlic-Naan-500x375.jpg', 'a traditional Indian flatbread', 40, 2, 1),
(7, 'Fish and Chips', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Fish_and_chips_blackpool.jpg/1200px-Fish_and_chips_blackpool.jpg', 'Fish and chips is a hot dish consisting of fried fish in batter, served with chips.', 200, 2, 3),
(8, 'Drums of Heaven', 'https://img-global.cpcdn.com/recipes/30b1554b391e404b/751x532cq70/chicken-drums-of-heaven-recipe-main-photo.jpg', 'A slight twist to your ordinary chicken lollipop', 400, 3, 3),
(9, 'Chicken Schezwan Noodles', 'https://photo.foodgawker.com/wp-content/uploads/2018/01/3159702.jpg', 'Chicken schezwan noodles is a spicy and tasty Indo-Chinese dish', 300, 3, 3),
(10, 'Caramel Cake', 'https://www.rockrecipes.com/wp-content/uploads/2013/03/The-Best-Caramel-Cake-slice-of-cake-on-a-white-plate-with-coffee-in-background-480x360.jpg', 'a sweet and simple old-fashioned cake', 200, 3, 5),
(11, 'Bhuna Murgh Biriyani', 'https://www.thedailypao.com/wp-content/uploads/2016/09/BehrouzMain.jpg', 'Classic Chicken Biryani, Boneless - Serves 1', 400, 4, 4),
(12, 'Kolkata Mutton Biriyani', 'https://cdn1.kitchenofdebjani.com/wp-content/uploads/2019/06/Kolkata-Mutton-Biryani.jpg', 'a phenomenal combination of succulent mutton/ lamb pieces with fragrant long grain basmati rice and aromatic spices', 350, 4, 4),
(13, 'Chicken Tangri Kabab', 'https://gbc-cdn-public-media.azureedge.net/img16453.768x512.jpg', 'Tangdi kabab is a crisped chicken leg or drumstick kabab made by marinating the leg pieces in spiced yoghurt based marination.', 400, 4, 1),
(14, 'Belgian Chocolate Mousse Cake(1 Pound)', 'https://imgstaticcontent.lbb.in/lbbnew/wp-content/uploads/2017/08/14150839/MAMA-MIA-UGC-Featured.jpg', 'Luscious Belgian chocolate will keep you coming back for another slice of this cake', 600, 5, 5),
(15, 'Filter Coffee Ice Cream', 'https://static.wixstatic.com/media/bd5b87_02b4845ef4cd4904813b2251c1a174c9~mv2.jpg/v1/fill/w_640,h_799,al_c,q_90/bd5b87_02b4845ef4cd4904813b2251c1a174c9~mv2.jpg', 'Ice cream made of filter coffee', 250, 5, 5),
(16, 'Kitkat Mousse Jar', 'https://img.floweraura.com/sites/default/files/choco-mousse-jar-cakes-9911530jca-B.jpg', 'Chocolate cake with Kitkat chocolate pieces with a layers of decadent chocolate truffle', 200, 5, 5),
(17, 'Masala Dosa', 'https://b.zmtcdn.com/data/dish_photos/45e/3cfac8f6a7701a2a7d96e3e24234845e.jpg?fit=around|130:130&crop=130:130;*,*', 'No onion no garlic. Mashed potatoes fried with flavorful south indian spices and entangled into dosa with love and care. All the items including sambar are prepared without onion and garlic. Served with sambar and coconut chutney.', 100, 1, 2),
(18, 'Lassi', 'https://b.zmtcdn.com/data/dish_photos/995/5b993a73c8552a74edc4ea7bb571a995.jpg?fit=around|130:130&crop=130:130;*,*', '250ml', 100, 1, 5),
(19, 'Tandoori Chicken 2.0', 'https://b.zmtcdn.com/data/dish_photos/483/0be43dc81d4a2681f03dc7f0dcfda483.jpg?fit=around|130:130&crop=130:130;*,*', 'The classic Tandoori Chicken gets a BasantI makeover. Same Taste, Different look!', 295, 2, 1),
(20, 'Gulab Jamun', 'https://b.zmtcdn.com/data/dish_photos/007/2c4d052ee51a3118bd6ef6ddccd4e007.jpg?fit=around|130:130&crop=130:130;*,*', '3 pieces', 90, 2, 5),
(21, 'Phir Se Phirni', 'https://b.zmtcdn.com/data/dish_photos/848/48eafa8ab5e8d57b097ab5b3fc7e8848.jpg?fit=around|130:130&crop=130:130;*,*', 'Sweet Dish', 150, 2, 5),
(22, 'Chilli Chicken With Hakka Noodles', 'https://b.zmtcdn.com/data/dish_photos/e08/f0e6260c97e7b05639b058f66a70be08.jpg?fit=around|130:130&crop=130:130;*,*', 'Classic Indo-Chinese Combo', 295, 3, 3),
(23, 'Golden Fried Prawns', 'https://static.toiimg.com/thumb/75454037.cms?imgsize=1271304&width=800&height=800', 'Tiger prawns dipped in a batter and deep fried till it turns golden. Served with our house special sauce.', 250, 3, 3),
(24, 'Chicken Achari Kabab', 'https://c.ndtvimg.com/2019-11/qaipa83_chicken_625x300_13_November_19.jpg', '6 Pieces', 300, 4, 1),
(25, 'Shahi Tukda', 'https://www.cubesnjuliennes.com/wp-content/uploads/2019/03/Best-Shahi-Tukda-Recipe.jpg', 'The ultimate satisfaction to your tastebuds, fried small pieces of bread, dipped in condensed milk, and dry fruits and infused with a hint of cardamom.', 150, 4, 5),
(26, 'Oreo Cookie Crumble Ice Cream', 'https://saltandbaker.com/wp-content/uploads/2018/06/Oreo-No-Churn-Ice-Cream-9-620x890.jpg', 'Dark chocolate cookie chunks combined with a smooth vanilla cream base. A classic combination since 1912.', 90, 5, 5),
(27, 'The Rocher Rocker Sundae', 'https://i.pinimg.com/originals/5a/8e/22/5a8e22c0092e198a2c98d56a982b5772.jpg', 'Hazelnut truffle combined with layers of hazelnut mousse,nutella and Belgian chocolate gelato, praline and chocolate cake!', 300, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `food_id`, `quantity`) VALUES
(26, '607e984bed3ac', 8, 1),
(27, '607e984bed3ac', 9, 1),
(28, '607e984bed3ac', 22, 1),
(29, '607e984bed3ac', 23, 2),
(30, '607e98f43d5ed', 3, 1),
(31, '607e98f43d5ed', 2, 1),
(32, '607e98f43d5ed', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_track`
--

CREATE TABLE `order_track` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_total` int(11) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `address` int(11) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_track`
--

INSERT INTO `order_track` (`id`, `user_id`, `order_date`, `order_total`, `coupon`, `address`, `payment_mode`, `payment_status`, `order_status`) VALUES
('6079adb22fbb7', 32, '2021-04-16 09:00:58', 1900, 'GET25', 3, 'UPI', 'Paid', 'Purchased'),
('607e984bed3ac', 33, '2021-04-20 02:30:59', 1495, 'GET25', 4, 'UPI', 'Paid', 'Purchased'),
('607e98f43d5ed', 34, '2021-04-20 02:33:48', 260, 'NONE', 5, 'COD', 'Paid', 'Purchased');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `address`, `image`, `rating`, `rate`) VALUES
(1, 'So Southy', '78 /, Biren Roy Road, Barisha\r\nKolkata,700008', 'https://www.shoutlo.com/uploads/articles/header-img-top-5-south-indian-restaurants-in-chandigarh1.jpg', '4.2', 200),
(2, 'Rang De Basanti', '79 , Kanungo Park, Garia\r\nKolkata, 700084', 'https://images.unsplash.com/photo-1555992336-03a23c7b20ee?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80', '4.5', 400),
(3, 'C for Chinese', '62 /, Selimpur Road, Dhakuria\r\nKolkata, 700001', 'https://images.unsplash.com/photo-1569924220711-b1648079a75b?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80', '4.8', 600),
(4, 'Great Biriyani Co.', '68 /a, Gariahat Road, Ballygunge\r\nKolkata, 700012', 'https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80', '4.0', 300),
(5, 'Mama Mia!', '96 , Dharmatala Street\r\nKolkata, 700102', 'https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80', '4.8', 200);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `profile_pic`) VALUES
(33, 'Sachin Agarwal', 'agarwalsachin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Profile-PNG-Icon.png'),
(34, 'Sourav', 'sourav@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Profile-PNG-Icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'https://www.searchpng.com/wp-content/uploads/2019/02/Profile-PNG-Icon.png',
  `food_pref` varchar(255) NOT NULL,
  `ph_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `profile_pic`, `food_pref`, `ph_no`) VALUES
(27, 33, 'https://www.searchpng.com/wp-content/uploads/2019/02/Profile-PNG-Icon.png', '', ''),
(28, 34, 'https://www.searchpng.com/wp-content/uploads/2019/02/Profile-PNG-Icon.png', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cusines`
--
ALTER TABLE `cusines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_track`
--
ALTER TABLE `order_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cusines`
--
ALTER TABLE `cusines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
