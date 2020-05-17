-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 06:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `catagory_id` int(11) NOT NULL,
  `catagory_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`catagory_id`, `catagory_title`) VALUES
(1, 'Electronics'),
(2, 'Clothing'),
(11, 'Furniture'),
(12, 'Video Games'),
(13, 'Couch');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_catagory_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_catagory_id`, `product_price`, `product_quantity`, `product_description`, `short_description`, `product_image`) VALUES
(10, 'Jeans', 2, 30, 5, 'Jeans are a type of pants or trousers, typically made from denim or dungaree cloth. Often the term \\\"jeans\\\" refers to a particular style of trousers, called \\\"blue jeans\\\", which were invented by Jacob W. Davis in partnership with Levi Strauss & Co. in 1871[1] and patented by Jacob W. Davis and Levi Strauss on May 20, 1873. Prior to the Levi Strauss patented trousers, the term \\\"blue jeans\\\" had been long in use for various garments (including trousers, overalls, and coats), constructed from blue-colored denim.[2]', 'Cool Pair of Jeans', 'jeans.jpg'),
(12, 'T-Shirt', 2, 12, 3, 'A T-shirt is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally it has short sleeves and a round neckline, known as a crew neck, which lacks a collar. T-shirts are generally made of a stretchy, light and inexpensive fabric and are easy to clean.', 'FREAK T-Shirt', 'tshirt.jpg'),
(13, 'Television', 1, 500, 5, 'Television (TV), sometimes shortened to tele or telly, is a telecommunication medium used for transmitting moving images in monochrome (black and white), or in color, and in two or three dimensions and sound. The term can refer to a television set, a television program (\"TV show\"), or the medium of television transmission. Television is a mass medium for advertising, entertainment, news, and sports.', 'Budget TV', 'tv.jpeg'),
(17, 'Sofa', 11, 1500, 3, 'A couch, also known as a sofa, settee, futon, or chesterfield (see history of the term below) is a piece of furniture for seating two or three people in the form of a bench, with armrests, which is partially or entirely upholstered, and often fitted with springs and tailored cushions.[1][2] Although a couch is used primarily for seating, it may be used for sleeping.[3] In homes, couches are normally found in the family room, living room, den, or the lounge. They are sometimes also found in non-residential settings such as hotels, lobbies of commercial offices, waiting rooms, and bars.', 'A brown sofa', 'sofa.jpg'),
(18, 'Joggers', 2, 20, 10, 'Sweatpants are a casual variety of soft trousers intended for comfort or athletic purposes, although they are now worn in many different situations. In the United Kingdom, Ireland, Australia, New Zealand, and South Africa they are known as tracksuit bottoms or joggers. In Australia, they are also commonly known as trackpants, trackies or tracky daks.[1]', 'A Perfectly black jogger', 'Joggers.jpg'),
(23, 'Dining Room Table', 11, 0, 3, 'A dining room is a room for consuming food. In modern times it is usually adjacent to the kitchen for convenience in serving, although in medieval times it was often on an entirely different floor level. Historically the dining room is furnished with a rather large dining table and a number of dining chairs; the most common shape is generally rectangular with two armed end chairs and an even number of un-armed side chairs along the long sides.', 'White table with blue chairs', 'diningtable.jpg'),
(24, 'Play Station 4', 12, 400, 5, 'The PlayStation 4 (officially abbreviated as PS4) is an eighth-generation home video game console developed by Sony Computer Entertainment. Announced as the successor to the PlayStation 3 in February 2013, it was launched on November 15 in North America, November 29 in Europe, South America and Australia, and on February 22, 2014 in Japan. It\'s the 4th best-selling console of all time. It competes with Microsoft\'s Xbox One and Nintendo\'s Wii U and Switch.\r\n\r\nMoving away from the more complex Cell microarchitecture of its predecessor, the console features an AMD Accelerated Processing Unit (APU) built upon the x86-64 architecture, which can theoretically peak at 1.84 teraflops; AMD stated that it was the \"most powerful\" APU it had developed to date. The PlayStation 4 places an increased emphasis on social interaction and integration with other devices and services, including the ability to play games off-console on PlayStation Vita and other supported devices (\"Remote Play\"), the ability to stream gameplay online or to friends, with them controlling gameplay remotely (\"Share Play\"). The console\'s controller was also redesigned and improved over the PlayStation 3, with improved buttons and analog sticks, and an integrated touchpad among other changes. The console also supports HDR10 High-dynamic-range video and playback of 4K resolution multimedia.\r\n\r\nThe PlayStation 4 was released to critical acclaim, with critics praising Sony for acknowledging its consumers\' needs, embracing independent game development, and for not imposing the restrictive digital rights management schemes like those originally announced by Microsoft for the Xbox One. Critics and third-party studios also praised the capabilities of the PlayStation 4 in comparison to its competitors; developers described the performance difference between the console and Xbox One as \"significant\" and \"obvious\".[9] Heightened demand also helped Sony top global console sales. By the end of September 2019, over 102 million PlayStation 4 consoles had been shipped worldwide, surpassing lifetime sales of the PlayStation 3.[10]', 'The All New PS4 Slim', 'ps4.jpg'),
(25, 'Xbox One', 12, 400, 5, 'The Xbox One is an eighth-generation home video game console developed by Microsoft. Announced in May 2013, it is the successor to Xbox 360 and the third console in the Xbox series of video game consoles. It was first released in North America, parts of Europe, Australia, and South America in November 2013, and in Japan, China, and other European countries in September 2014. It is the first Xbox game console to be released in China, specifically in the Shanghai Free-Trade Zone. Microsoft marketed the device as an \"all-in-one entertainment system\", hence the name \'Xbox One\'.[13][14] The Xbox One mainly competes against Sony\'s PlayStation 4 and Nintendo\'s Wii U and Switch.\r\n\r\nMoving away from its predecessor\'s PowerPC-based architecture, the Xbox One marks a shift back to the x86 architecture used in the original Xbox; it features an AMD Accelerated Processing Unit (APU) built around the x86-64 instruction set. Xbox One\'s controller was redesigned over the Xbox 360\'s, with a redesigned body, D-pad, and triggers capable of delivering directional haptic feedback. The console places an increased emphasis on cloud computing, as well as social networking features, and the ability to record and share video clips or screenshots from gameplay, or live-stream directly to streaming services such as Mixer and Twitch. Games can also be played off-console via a local area network on supported Windows 10 devices. The console can play Blu-ray Disc, and overlay live television programming from an existing set-top box or a digital tuner for digital terrestrial television with an enhanced program guide. The console optionally included a redesigned Kinect sensor, marketed as the \"Kinect 2.0\", providing improved motion tracking and voice recognition.\r\n\r\nThe Xbox One received generally positive reviews for its refined controller design, multimedia features, and voice navigation. Its quieter and cooler design was praised for making the console more reliable than its predecessor on-launch, but the console was generally criticized for running games at a technically lower graphical level than the PlayStation 4. Its original user interface was panned for being nonintuitive, although changes made to it and other aspects of the console\'s software post-launch received a positive reception. Its Kinect received praise for its improved motion-tracking accuracy, its face recognition logins, and its voice commands.\r\n\r\nThe original Xbox One model was succeeded by the Xbox One S in 2016, which has a smaller form factor and support for HDR10 high-dynamic-range video, as well as support for 4K video playback and upscaling of games from 1080p to 4K. It was praised for its smaller size, its on-screen visual improvements, and its lack of an external power supply, but its regressions such as the lack of a native Kinect port were noted. A high-end model, named Xbox One X, was unveiled in June 2017 and released in November; it features upgraded hardware specifications and support for rendering games at 4K resolution. It will be succeeded by the upcoming Xbox Series X consoles in Holiday 2020.', 'The All New X Box One!', 'xbox.jpg'),
(26, 'PS4', 12, 200, 3, 'dasdadasdas', 'adasdsadasd', 'ps4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`) VALUES
(4, 'Admin', 'nafisrizwank@gmail.com', 'admin'),
(9, 'Fahim', 'fahim@gmail.com', 'Fahim'),
(10, 'emmanuel', 'nafisrizwank@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
