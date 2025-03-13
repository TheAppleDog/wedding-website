-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 14:54 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_planner`
--
-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--
DROP TABLE IF EXISTS `tblaccounts`;

CREATE TABLE `tblaccounts` (
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccounts`
--
DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
    `login_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(30) NOT NULL,
    `login_time` DATETIME NOT NULL,
    PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `task_calendar`
--

CREATE TABLE `task_calendar` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_calendar`
--
--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `alternate_text` varchar(100) NOT NULL,
  `type` char(5) NOT NULL,
  `size` varchar(10) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgallery`
--
INSERT INTO `tblgallery` (`id`, `filename`, `alternate_text`, `type`, `size`)
VALUES
    (1, 'car1.jpg', 'car1', 'image', 140143),
    (2, 'car2.jpg', 'car2', 'image', 168616),
    (3, 'car3.jpg', 'car3', 'image', 203583),
    (4, 'car4.jpg', 'car4', 'image', 108760),
    (5, 'car5.jpg', 'car5', 'image', 276179),
    (6, 'car6.jpg', 'car6', 'image', 154002),
    (7, 'car7.jpg', 'car7', 'image', 171115),
    (8, 'car8.jpg', 'car8', 'image', 197397),
    (9, 'car9.jpg', 'car9', 'image', 324598);

--
-- Table structure for table `tbl_liquidation`
--

CREATE TABLE `tbl_liquidation` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_name` VARCHAR(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `cash` decimal(10,2) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `date_issue` varchar(100) NOT NULL,
  `date_modified` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_liquidation`
--
--
-- Table structure for table `tblpostwedding`
--

CREATE TABLE `tblpostwedding` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `preview_image` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `wedding_date` varchar(100) NOT NULL,
  `wedding_type` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `date_published` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `tblpostwedding`
--

INSERT INTO `tblpostwedding` (`id`, `title`, `description`, `preview_image`, `location`, `status`, `wedding_date`, `wedding_type`, `date_created`, `date_published`) VALUES
(1, 'Aarav  &  Ishita', 'Embrace the enchanting charm of Mumbai\'s wedding scene as soft candlelight dances amidst cascading flowers, creating a magical ambiance.', 'pose3.jpg', 'Mumbai', '1', '2024-09-10', 'Classic Wedding Package', '2024-09-09', '2024-09-10'),
(2, 'Aryan  &  Pooja', 'Delve into the splendor of Delhi\'s lavish reception, where opulent decor and sparkling chandeliers adorn the celebration in grandeur.', 'kerala1.jpg', 'Delhi', '1', '2024-08-15', 'Elegant Wedding Package', '2024-08-14', '2024-08-15'),
(3, 'Rohan  &  Anaya', 'Journey through the vibrant hues and traditional splendor of Jaipur\'s majestic forts as they set the stage for a celebration to remember.', 'pose6.jpg', 'Jaipur', '1', '2024-07-20', 'Premier Wedding Package', '2024-07-19', '2024-07-20'),
(4, 'Vivaan  &  Aaradhya', 'Immerse in the warmth of Bangalore\'s haldi ceremony, where traditional rituals blend seamlessly with modern sophistication.', 'pose10.jpg', 'Bangalore', '1', '2024-06-25', 'Elite Wedding Package', '2024-06-24', '2024-06-25'),
(5, 'Reyansh  &  Saanvi', 'Step into the grandeur of Hyderabad\'s elegant reception, where cultural heritage meets contemporary luxury in a mesmerizing fusion.', 'pose2.jpg', 'Hyderabad', '1', '2024-05-30', 'Gold Wedding Package', '2024-05-29', '2024-05-30'),
(6, 'Vihaan  &  Zara', 'Embark on a journey through Lucknow\'s regal charm, where opulent decor and royal motifs weave tales of grandeur and elegance.', 'pose7.jpg', 'Lucknow', '1', '2024-04-15', 'Royal Wedding Package', '2024-04-14', '2024-04-15'),
(7, 'Advik  &  Aanya', 'Bask in the tranquility of Chennai\'s serene beaches as minimalist decor highlights the natural beauty of the surroundings in a picturesque celebration.', 'pose9.jpeg', 'Chennai', '1', '2024-03-20', 'Classic Wedding Package', '2024-03-19', '2024-03-20'),
(8, 'Ayaan  &  Diya', 'Experience the timeless romance of Pune\'s wedding celebration, where love fills the air amidst elegant decor and heartfelt vows.', 'pose4.jpg', 'Pune', '1', '2024-02-14', 'Elegant Wedding Package', '2024-02-13', '2024-02-14'),
(9, 'Kabir  &  Sara', 'Indulge in Kolkata\'s festive charm as traditional decor and vibrant colors come together to create an atmosphere of joyous celebration.', 'pose8.jpg', 'Kolkata', '1', '2024-01-10', 'Premier Wedding Package', '2024-01-09', '2024-01-10'),
(10, 'Zain  &  Aisha', 'Celebrate the union of hearts in Ahmedabad\'s grand wedding, where every moment is filled with joy, laughter, and promises of forever.', 'pose5.png', 'Ahmedabad', '1', '2023-12-25', 'Elite Wedding Package', '2023-12-24', '2023-12-25'),
(11, 'Shaurya  &  Anika', 'Be captivated by the vibrant energy of Indore\'s haldi ceremony, where contemporary decor and lively celebrations reflect the city\'s dynamic spirit.', 'pose11.jpg', 'Indore', '1', '2023-11-30', 'Gold Wedding Package', '2023-11-29', '2023-11-30'),
(12, 'Rudra  &  Riya', 'Unwind amidst the serene beauty of Nagpur\'s landscapes, where nature-inspired decor and soft lighting create an atmosphere of romantic tranquility.', 'pose1.jpg', 'Nagpur', '1', '2023-10-15', 'Royal Wedding Package', '2023-10-14', '2023-10-15');

-- -----------------------------
--
-- Table structure for table `tblweddingcustomers`
--
CREATE TABLE `tblweddingcustomers` (
   `booking_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `bride` varchar(32) NOT NULL,
  `groom` varchar(32) NOT NULL,
  `wedding_type` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `wedding_date` varchar(100) NOT NULL,
  `wedding_venue` varchar(100) NOT NULL,  
  `Events` varchar(255) NOT NULL,
  `organizer_id` varchar(255) NOT NULL,
  `est_guest` varchar(100) NOT NULL,
  `cash_advance` varchar(100) NOT NULL,
   `status` varchar(100) NOT NULL DEFAULT 'Pending'
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
--
--
-- Table structure for table `tblguest`
--

CREATE TABLE `tblguest` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `guestname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `state` char(4) NOT NULL,
  `zipcode` char(10) NOT NULL,  
  `out_of_town` enum('y','n') NOT NULL,
  `relationship` varchar(32) NOT NULL,
  `return_gifts` text NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblguest`
--

DROP TABLE IF EXISTS `tblweddingcategories`;

CREATE TABLE `tblweddingcategories` (
  `id` int(11) NOT NULL,
  `wedding_type` varchar(100) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `preview_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblweddingcategories`
--

INSERT INTO `tblweddingcategories` (`id`, `wedding_type`, `caption`, `price`, `preview_image`) VALUES
(1, 'Classic Wedding Package', 'Embark on your enchanting journey with some elegance – a perfect blend of simplicity and joy.', '2,500,000', 'Classic.jpg'),
(2, 'Elegant Wedding Package', 'Cherish the tradition with a touch of sophistication – where every moment is a work of art.', '4,000,000', 'ELEGANT.jpg'),
(3, 'Premier Wedding Package', 'Elevate your celebration to a extravagant spectacle – a premier experience of opulence and joy.', '6,000,000', 'Premeir.jpg'),
(4, 'Gold Wedding Package', 'A golden affair awaits – where classic charm meets modern luxury in a celebration of a lifetime.', '7,500,000', 'gold.jpg'),
(5, 'Elite Wedding Package', 'Embark on the epitome of luxury – where dreams unfold in a world of grandeur and glamour.', '9,000,000', 'Elite.jpg'),
(6, 'Royal Wedding Package', 'Elevate your special day with our exquisite Diamond Wedding Package, where every detail sparkles as brightly as your love.', '10,000,000', 'diamond.jpg');
-- --------------------------------------------------------
--
-- Table structure for table `Addons`
--

CREATE TABLE `Addons` (
  `id` int(11) NOT NULL, 
  `title` varchar(255) NOT NULL    
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Addons`
--

INSERT INTO `Addons` (`id`, `title`) VALUES
(1, 'Customized Welcome Bags'),
(2, 'Personalized Ceremony Programs'),
(3, 'Signature Cocktails'),
(4, 'Customized Seating Chart Displays'),
(5, 'Interactive Guest Books'),
(6, 'Themed Photo Booths with Props'),
(7, 'Bride and Groom Trivia Cards'),
(8, 'Customized Party Favors'),
(9, 'Bridal Party Robes or Shirts'),
(10, 'Ladki Waale and Ladke Waale Accessories'),
(11, 'Monogrammed Decor'),
(12, 'Memory Lane'),
(13, 'Ceremony Exit or Entrance Props'),
(14, 'Themed Table Names'),
(15, 'Custom Illustrations');

-- --------------------------------------------------------

--
--
-- Table structure for table `tbl_features`
--
DROP TABLE IF EXISTS `tbl_features`;

CREATE TABLE `tbl_features` (
  `feature_id` int(11) NOT NULL,  
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_features`
--

INSERT INTO `tbl_features` (`feature_id`, `category_id`, `title`) VALUES
(1, 1, 'Traditional venue decor for wedding ceremony'),
(2, 1, 'Basic floral arrangements'),
(3, 1, 'Basic lighting for ambiance'),
(4, 1, 'Assistance with wedding planning'),
(5, 1, 'Basic catering for main events'),
(6, 1, 'Photographer for key moments'),
(7, 1, 'Simple wedding invitations'),
(8, 1, 'Haldi ceremony with basic arrangements'),
(9, 1, 'Customized bridal entry with traditional music'),
(10, 1, 'Professional makeup for the bride on the wedding day'),
(11, 1, 'Makeup for immediate family members'),
(12, 1, 'Elegant wedding cake with a traditional design'),
(13, 2, 'Enhanced venue decor'),
(14, 2, 'Upgraded floral arrangements'),
(15, 2, 'Improved lighting setup'),
(16, 2, 'Extended wedding planning support'),
(17, 2, 'Upgraded catering menu'),
(18, 2, 'Professional photographer for more coverage'),
(19, 2, 'Custom-designed wedding invitations'),
(20, 2, 'Sangeet night with DJ, dance, and live entertainment'),
(21, 2, 'Personalized couple-themed cocktails at the bar'),
(22, 2, 'Professional makeup for the groom'),
(23, 2, 'Makeup for extended family members'),
(24, 2, 'Wedding cake with personalized flavors and a touch of sophistication'),
(25, 3, 'Premium venue decor with personalized themes'),
(26, 3, 'Elaborate floral arrangements'),
(27, 3, 'Advanced lighting and sound setup'),
(28, 3, 'Comprehensive wedding planning'),
(29, 3, 'Top-tier catering with diverse menu'),
(30, 3, 'Professional photographer and videographer'),
(31, 3, 'Personalized wedding invitations'),
(32, 3, 'Reception with entertainment, games, and a photo booth'),
(33, 3, 'Luxury dessert bar with exotic treats'),
(34, 3, 'Makeup services for both bride and groom\'s extended families'),
(35, 3, 'Grand multi-tiered wedding cake with intricate designs'),
(36, 4, 'Exclusive venue decor with premium materials'),
(37, 4, 'Luxury floral arrangements'),
(38, 4, 'State-of-the-art lighting and sound effects'),
(39, 4, 'VIP wedding planning'),
(40, 4, 'Gourmet catering with international cuisines'),
(41, 4, 'Renowned photographer and videographer team'),
(42, 4, 'Customized invitations, personalized wedding website'),
(43, 4, 'Mehendi ceremony with professional artists'),
(44, 4, 'Private couple\'s spa day before the big day'),
(45, 4, 'Makeup services for pre-wedding events'),
(46, 4, 'Exquisite wedding cake with custom flavors and edible decorations'),
(47, 5, 'Grand venue decor with high-end materials'),
(48, 5, 'Lavish floral arrangements with exotic flowers'),
(49, 5, 'Cutting-edge lighting, audio, and visual effects'),
(50, 5, 'Celebrity wedding planner'),
(51, 5, 'Celebrity chef-curated menu'),
(52, 5, 'Renowned fashion photographer and videographer'),
(53, 5, 'Luxury invitations with personalized gifts'),
(54, 5, 'Bachelor party with entertainment, VIP club access, and a surprise celebrity guest'),
(55, 5, 'Personalized fireworks display during the reception'),
(56, 5, 'Exclusive makeup artist for the bride and groom\'s families'),
(57, 5, 'Wedding cake with a unique, artistic design'),
(58, 6, 'Opulent venue decor with luxurious materials'),
(59, 6, 'Extravagant floral arrangements with rare blooms'),
(60, 6, 'Personalized wedding concierge services'),
(61, 6, 'Celebrity chef menu for a royal wedding feast at a fort or mansion.'),
(62, 6, 'Renowned celebrity photographer and cinematographer team'),
(63, 6, 'Custom-designed invitations with premium gift sets'),
(64, 6, 'Exclusive pre-wedding cruise or destination party'),
(65, 6, 'A live music performance by a renowned artist during the reception'),
(66, 6, 'Exclusive makeup team for the entire wedding party'),
(67, 6, 'Grand wedding cake with a show-stopping design and intricate details'),
(68, 6, 'Wedding at a royal fort or mansion for an unforgettable experience.');

-- --------------------------------------------------------
--
-- Table structure for table `tblusers`
--
DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `firstname`, `lastname`, `gender`, `username`, `password`, `email`, `designation`, `address`, `profile_picture`, `date_created`) VALUES
(1, 'Khushi', 'Kulkarni', 'f', 'khushi_24', 'D00F5D5217896FB7FD601412CB890830', 'khushi24@mail.com', '0', 'Bharuch', 'admin_khushi.jpg', 'January 1, 2024, 5:15 PM'),
(2, 'Gourav', 'Panchal', 'm', 'Gourav_02', '5f4dcc3b5aa765d61d8327deb882cf99', 'gourav02@mail.com', '1', 'Ahemdabad', 'Manager1.jpeg', 'January 5, 2022, 12:45 PM'),
(3, 'Arpita', 'Kulkarni', 'f', 'Arpita_19', '1a1dc91c907325c69271ddf0c944bc72', 'arpita19@mail.com', '1', 'Rajkot', 'Manager2.jpeg', 'January 10, 2024, 20:05 PM');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--
--
-- Indexes for table `tblweddingcustomers`
--
ALTER TABLE `tblweddingcustomers`
  ADD PRIMARY KEY (`booking_id`);
--
--
-- Indexes for table `task_calendar`
--
ALTER TABLE `task_calendar`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tbl_liquidation`
--
ALTER TABLE `tbl_liquidation`
  ADD PRIMARY KEY (`id`);
--
--
--
-- Indexes for table `tblpostwedding`
--
ALTER TABLE `tblpostwedding`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);
--
ALTER TABLE `tblguest`
  ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `booking_id` (`booking_id`);
--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`user_name`);
--
--
-- Indexes for table `login`
--
ALTER TABLE `login`
ADD CONSTRAINT `fk_user_name`
FOREIGN KEY (`user_name`) REFERENCES `tblaccounts`(`user_name`)
ON DELETE CASCADE;
--
--
-- Indexes for table `Addons`
--
ALTER TABLE `Addons`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `tblweddingcategories`
--
ALTER TABLE `tblweddingcategories`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tbl_features`
--
ALTER TABLE `tbl_features`
  ADD PRIMARY KEY (`feature_id`);
--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `tblweddingcategories`
--
ALTER TABLE `tblweddingcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `task_calendar`
--
ALTER TABLE `task_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_features`
--
--
-- AUTO_INCREMENT for table `tblweddingbook`
--
ALTER TABLE `tblweddingcustomers`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
ALTER TABLE `tbl_features`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblpostwedding`
--
ALTER TABLE `tblpostwedding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_liquidation`
--
ALTER TABLE `tbl_liquidation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;