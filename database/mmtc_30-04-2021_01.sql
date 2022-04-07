-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2021 at 08:02 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmtc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `user_image`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `is_active`, `first_name`, `last_name`, `company`, `phone`, `permissions`, `updated_at`, `created_at`) VALUES
(1, '', 'Admin', '$2y$08$tQzURDYlBhk34mJ/FeI8/ePBXG73bCDoanH9cIMFyGNpjMdnHiFAG', '', 'codzio@gmail.com', 'uploads/profile/mmtc.png', '', NULL, NULL, NULL, 0, 1619754100, 1, 'Codzio', 'istrator', 'ADMIN', '0', '{\"page\":{\"edit\":\"1\"},\"categories\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"blogTags\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"blogs\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"clients\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"reviews\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"faq\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"banners\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"careers\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"users\":{\"delete\":\"1\"},\"visas\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"visaOptions\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"tourCategories\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"tours\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"tourOptions\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"staycations\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"promoCode\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"country\":{\"edit\":\"1\",\"delete\":\"1\"},\"siteSettings\":{\"edit\":\"1\"},\"googleAnalytics\":{\"edit\":\"1\"},\"userRights\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"}}', '2021-04-16 07:51:33', '2021-02-01 08:20:50'),
(8, '', 'Muhamamd Alfaiz', '$2y$08$9r32Fp2CZFMIBGLPCPXMVe2bfgHnEBzBpx1416KGW8MhXAp/8pg0K', NULL, 'imcoolalfaiz@gmail.com', '', NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '{\"page\":{\"edit\":\"1\"},\"categories\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"blogTags\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"faq\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"careers\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"}}', '2021-01-15 14:44:01', '2021-01-15 02:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_name`
--

CREATE TABLE `attribute_name` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `filter` enum('1','0') NOT NULL DEFAULT '1',
  `search` enum('1','0') NOT NULL DEFAULT '1',
  `multi` tinyint(1) NOT NULL,
  `display_order` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_name`
--

INSERT INTO `attribute_name` (`id`, `name`, `slug`, `filter`, `search`, `multi`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(8, 'Color', 'color', '1', '1', 1, 1, 1, '2021-04-23 04:19:32', '2021-04-23 06:17:47'),
(9, 'Size', 'size', '0', '1', 0, 0, 1, '2021-04-23 04:19:36', '2021-04-23 06:17:49'),
(10, 'Occasion', 'occasion', '1', '1', 0, 0, 1, '2021-04-23 04:19:52', '2021-04-23 06:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL,
  `attrib_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `display_order` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `attrib_id`, `name`, `slug`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(8, 9, 'Large', 'large', 0, 1, '2021-04-23 05:43:58', NULL),
(9, 9, 'Medium', 'medium', 0, 1, '2021-04-23 05:43:58', NULL),
(10, 8, 'Red', 'red', 0, 1, '2021-04-23 05:44:11', NULL),
(11, 8, 'Blue', 'blue', 0, 1, '2021-04-23 05:44:11', NULL),
(12, 8, 'Yellow', 'yellow', 0, 1, '2021-04-23 05:44:11', NULL),
(13, 10, 'Holi', 'holi', 0, 1, '2021-04-23 07:00:15', NULL),
(14, 10, 'Diwali', 'diwali', 0, 1, '2021-04-23 07:00:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_type` enum('image','video') NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_alt` varchar(255) DEFAULT NULL,
  `mob_banner_image` text DEFAULT NULL,
  `mob_banner_alt` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `heading` varchar(500) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` text DEFAULT NULL,
  `display_date` date DEFAULT NULL,
  `display_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_type`, `banner_image`, `banner_alt`, `mob_banner_image`, `mob_banner_alt`, `video_url`, `heading`, `content`, `button_name`, `button_link`, `display_date`, `display_time`, `end_time`, `is_active`, `display_order`, `updated_at`, `created_at`) VALUES
(16, 'image', 'uploads/banner/index-02.jpg', '', 'uploads/banner/mob/index-02.jpg', '', NULL, '', '', '', '', NULL, NULL, NULL, 1, 0, '0000-00-00 00:00:00', '2021-04-24 15:21:07'),
(17, 'image', 'uploads/banner/7e031c732898fada0f7b257e556ff47e.jpg', '', 'uploads/banner/mob/7e031c732898fada0f7b257e556ff47e.jpg', '', NULL, '', '', '', '', NULL, NULL, NULL, 1, 0, '0000-00-00 00:00:00', '2021-04-24 23:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_slug` text NOT NULL,
  `blog_url` varchar(250) NOT NULL,
  `blog_author` varchar(100) NOT NULL,
  `blog_date` date NOT NULL,
  `image_caption` varchar(200) NOT NULL,
  `blog_image` varchar(500) NOT NULL,
  `blog_crop_image` text DEFAULT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `meta_description` varchar(2000) NOT NULL,
  `display_order` int(50) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `blog_title`, `blog_slug`, `blog_url`, `blog_author`, `blog_date`, `image_caption`, `blog_image`, `blog_crop_image`, `description`, `likes`, `meta_title`, `meta_keyword`, `meta_description`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(67, 105, 'GEMS OF WISDOM : FROM MOM TO DAUGHTER', 'gems-of-wisdom-from-mom-to-daughter', '', 'Admin', '2019-03-18', '', 'uploads/blog/blog1.png', NULL, '<p style=\"text-align: justify;\">It isn&rsquo;t often that we have the privilege to impact and touch someone deeply, with our work. Fortunately for me, I have had a few such opportunities, as jewelry can be something so much more than a style statement. A personalized piece can carry with it sentiments, memories and stories that our clients and eventually us, cherish for a lifetime...</p>\r\n\r\n<p style=\"text-align: justify;\">When my friend Kavita told me about a gemstone close to her heart I knew this was one of those moments when I had the chance to do the same, and an immensely special one at that.</p>\r\n\r\n<p style=\"text-align: justify;\">The beautiful oval cabochon cut jade , a classic heirloom piece, belonged to her mother.</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;I lost my mom to cancer two years back. She loved her jewelry and over the years had added some stunning pieces to her collection. As an Army wife, she would go out often and flaunt her style with confidence. Some reflected her delicate style, some stood out as classic traditional pieces. She especially loved her stones. After she passed away, she left behind this legacy that was as much a part of her personality as anything else. One particular neckpiece adorned with a beautiful jade pendant was close to her heart; the stone (which was her favorite as she always wanted a jade) was a gift from my father who had picked it up during one of his travels. Mom loved this stone so much that she had it on even the day she passed away&hellip; &nbsp;I instantly knew, I wanted to wear that special stone as a beautiful memory of my mother.&rdquo;</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;For someone like me, who wasn&rsquo;t much of a jewelry person before, I knew Vinita was the right person to turn to. Having seen her work (and loved it) I was sure she would be able to understand and help me translate my vision for this stone into a jewelry piece perfectly,&rdquo; she says.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/2f0a8da0-adb0-48c8-bcb4-64b8081b0e94_large.jfif\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\">Kavita&rsquo;s mom wearing the jade neck piece</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Kavita wasn&rsquo;t sure if she wanted to wear the stone as a pendant or a ring. What she was sure though was that she wanted it to be a statement piece and the design to incorporate two things her mom loved - gold and paisley motifs. Keeping in mind these details, we agreed that a bold, statement ring will best incorporate all the elements that symbolized her mom&rsquo;s personal taste, as well as reflect Kavita&rsquo;s aesthetic.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><em><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/1.jpg\" /></em></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>&nbsp; Initial design sketch</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;I have always loved Vinita&rsquo;s aesthetic and design skills, but what I love most is the passion and care she infuses in the process of creating something so personal. She gets it, she feels for the person who she creates it for. She kept me updated at every step of the process. When I saw the first sketch, I immediately fell in love and was assured that the final piece will exceed my expectations,&rdquo; Kavita, recounts.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/2.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>The final piece</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/3.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>Kavita looking radiant in her heirloom jewel</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">As the final piece was ready and I handed it over to her, she said something, that made me feel all the more humbled and grateful to play a part in keeping her mother&rsquo;s memories and more importantly, persona alive.</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;If my mum was here with us, she would be wearing this piece all the time.. this would be her favourite.&rdquo;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/4.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>From mom to daughter</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Dear Kavita, thank you for trusting me with something so precious and close to your heart, and giving me an opportunity to create a beautiful memory for you to wear forever...</em></p>\r\n\r\n<p>Every piece we custom design, is crafted with care to symbolize your own unique story. To create your own special, personalized piece of jewelry, you can contact us <a href=\"http://emiratesdirectory.com/vi/contact\"><span style=\"color:#000000;\">here</span></a><span style=\"color:#000000;\">&nbsp;</span></p>\r\n', 0, 'Blog | Vinita Michael', '', '', 0, 1, '2021-02-27 06:26:16', '2021-03-30 07:19:25'),
(73, 105, 'LIFETIME VALENTINE', 'lifetime-valentine', '', 'VINITA MICHAEL', '2019-02-04', '', 'uploads/blog/6.jpg', NULL, '<p style=\"text-align: justify;\">Through the years that I came to love and study jewelry design, I would often look at a statement or a unique piece and imagine the personality of the person who would wear it. It is funny and rather rewarding how I get to do the exact opposite now! To create custom pieces that perfectly resonate with the wearer&rsquo;s personality and reflect their stories is a passion. Precisely the reason why I instantly imagined the vibe that Mrinalini&rsquo;s jewelry piece would give out when I first spoke with her.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;Fun, zesty, quirky and extremely amiable &ndash; that&rsquo;s how I would describe Mrinalini, right from the first time we spoke over a call. I had earlier designed a wedding ring for a common friend, and that&rsquo;s how she got in touch to share and discuss what she wanted for her very own special day.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;&ldquo;When my partner David and I started talking about the rings we wanted, we were clueless where to begin. The only thing we were certain about was that we wanted our rings to be personalized. We had spotted a beautiful, delicate ring with an initial &lsquo;M&rsquo; and it immediately drew our eye; something both of us felt could be used as a reference to customize a ring for David. &nbsp;It was around this time, that I saw my friend Garima&rsquo;s ring which was designed by Vinita. I instantly fell in love with the classy ring design, the neatness and finesse of the text engraved &ndash; the utmost care put into it, was so obvious. I knew I had to approach Vinita, and already felt a sense of certainty about the justice she would bring to our vision,&rdquo; recounts Mrinalini.</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;Mrinalini also started to visualize and draw out how she wanted her ring to be. She wanted David&rsquo;s initials as well, but in a band more elaborate and set with diamonds. As she shared the reference images for both the rings, I realized she wanted the rings to be somehow different and personalized. That&rsquo;s when I suggested that they should write their names and I would use the handwritten initials as the main design element. The fun-loving, bright people that they were, I thought it would be cool for them to wear each other&rsquo;s initials, sort of like an autograph of your partner that you are flaunting.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/IMG_7346_large.jfif\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>Written in the stars</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;I had shared my vision with a few local jewelers in Bangalore, India, where I was based at the time, and the designs they had come up with were way off. It was such a relief when Vinita understood exactly what we wanted, despite having never met me in person and the only correspondence being over calls and messages. And I absolutely loved her creative idea of personalization. I feel she understands young, fun designs, unlike many others.&rdquo;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/a4297074-e25e-43c4-aa3b-f17852771935_large.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>The first sketch</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">For David, we created the ring in white gold with a wide band and of course, the &lsquo;M&rsquo; that Mrinalini had handwritten and for Mrinalini, we agreed to make the band with pave&rsquo; set white round brilliant diamonds with the &lsquo;D&rsquo; incorporated into the design.&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/1e023892-5b9a-4909-b454-0e165f368018_large.jfif\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>The finished rings for the beautiful couple</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;The best thing about Vinita is the personal touch that she, so lovingly adds. Not just to her conversations, which make you feel you have known her for years, but also in her designs, which reflect the emotions that you entrust her with. Despite being miles away, communication with her is a piece of cake &ndash; her response time is amazing and she is very proactive with ideation and implantation of the design process.&rdquo;</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;&ldquo;My heart melted when I saw the final ring. It was cool, it was fun, it was different - exactly how we wanted. It made me so excited that I almost dropped it out of the tuk-tuk I was traveling in,&rdquo; she laughs.&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/Mrinalini_large.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/bb67917a-8642-48f7-b15b-c790402f733b_large.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/66482e12-a209-49e1-9a7a-95dc2f12e57e_large.jfif\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>Mrinalini and David on their big day</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\"><em>Dear Mrinalini and David, thank you for letting me be a part of your special day. &nbsp;Here&rsquo;s wishing you a lifetime of fun, adventures and crazy moments while you forever cherish wearing each other&rsquo;s names in bands that will always remain close to your heart.</em></p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;Every piece we custom design, is crafted with care to symbolize your own unique story. To create your own special, personalized piece of jewelry, you can contact us here</p>\r\n', 0, 'Lifetime Valentine | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 00:11:55', '2021-03-26 11:05:13'),
(74, 105, 'OUR FAVORITE 10 YEAR CHALLENGE : ASHWINI AND AJ', 'our-favorite-10-year-challenge-ashwini-and-aj', '', 'VINITA MICHAEL', '2019-01-20', '', 'uploads/blog/7.jpg', NULL, '<p style=\"text-align: justify;\">Everyone loves a good story. Some intrigue us, some inspire us, some give us hope, but my favorite ones are those that make us believe in unconditional, ever-lasting love. And, it gives me immense happiness when I get an opportunity to showcase such stories through my jewelry. It&rsquo;s when the process of creating a jewel becomes something much more than just that &ndash; it becomes all about re-creating a love story that is particularly special. Ashwini and AJ&rsquo;s tale of love is one such story and what makes it phenomenal is that it isn&rsquo;t your typical romance but one laden with adventures through and through.</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;My first interaction with Ashwini was way back in 2015 when they were expecting a baby. She had come across one of my custom cufflink designs (these ones are a personal favorite) with first footprints of baby as an engraving.</p>\r\n\r\n<p><span style=\"display: none;\">&nbsp;</span>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/10830220_10153055401897400_6759601105058269954_o_1_large.jpg\" /><span style=\"display: none;\">&nbsp;</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><em>Baby footprint cufflinks</em><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">She wanted to gift one to her husband with their baby&rsquo;s footprints who was soon to be born. This special gesture surely made me aware of the wonderful love they share, but I was still oblivious to their roller-coaster journey together. Until a couple of months ago, when she approached me again for creating something that would become one of my favorite projects thus far.</p>\r\n\r\n<p style=\"text-align: justify;\">When Ashwini and AJ decided to spend their lives together a decade ago, they had to elope and get married as their parents were not ready to accept the match. Over the years, their parents warmed up to their relationship, but the couple knew they would like to renew their vows sometime. Fast forward to 10 years after being hitched and becoming parents, this gorgeous couple decided to renew their vows while planning a brilliant getaway in Sri Lanka, an annual holiday ritual they undertake with their friends. Only this time, it would be extra special.</p>\r\n\r\n<p style=\"text-align: justify;\">When Ashwini approached me for getting their rings made for this special occasion, I instantly knew that the rings had to reflect their love, their journey together and things that bind them in this beautiful bond. She mentioned how they were a couple who always seek adventure, love to explore and their favorite activity together is hiking. As I probed her about revealing the best moments she spent with her hubby, she talked about their first ever hike together back in 2007&ndash; the mid night trek at Skandagiri near Bangalore, India. She shared a stunning picture they clicked from the top of the hiking trail as the sun rose above a blanket of cottony clouds underneath. She showed me another picture close to her heart, from one of their other favorite treks, at Kemmangundi, Karnataka.<span style=\"display: none;\">&nbsp;</span></p>\r\n\r\n<p><span style=\"display: none;\">&nbsp;</span>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/AshwiniAK_large.jfif\" /><span style=\"display: none;\">&nbsp;</span></em></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>Ashwini and AJ,&nbsp;Kemmangundi trek</em><span style=\"display: none;\">&nbsp;</span><em><span style=\"display: none;\">&nbsp;</span></em><span style=\"display: none;\">&nbsp;</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"display: none;\">&nbsp;</span>&nbsp;<span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/Skandagiri_large.jfif\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>Skandagiri, 2007</em><span style=\"display: none;\">&nbsp;</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"display: none;\">&nbsp;</span>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"display: none;\">&nbsp;</span>Hearing the passion with which she talked about the hikes and how the experience brings them closer, it was clear in my mind that the design of the rings had to be inspired by their most memorable hikes together. The beautiful clouds and sky above the sunrise at Skandagiri served as an inspiration for the outer texture of both the rings. I also created an illustration of the couple deriving from their lovely picture at Kemmangundi, to be engraved on the inner rim of the rings.<span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/IMG_6911_large.jfif\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>Inner engraving details taking shape</em><span style=\"display: none;\">&nbsp;</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/IMG_3878_1_large.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>From sketch to reality</em><span style=\"display: none;\">&nbsp;</span><span style=\"display: none;\">&nbsp;</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"display: none;\">&nbsp;</span>&nbsp;</p>\r\n\r\n<p>For Ashwini&rsquo;s ring, I decided on a fine yellow gold engraving running along the center of the ring set with a classy yellow citrine, symbolizing the rising sun on the horizon.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/VMRingDesign_large.jfif\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>The very first design draft of Ashwini&#39;s ring</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;I have never been much of a jewelry person, I am always very minimalist. But as we planned the renewal of vows, I knew our rings had to be extra special and I needed to get them designed from someone who would replicate our love into the bands that we finally would get to exchange in front of our close friends and our family. Having already got a personalized piece made from her, and experiencing the love and care she puts in the design process, I knew she was my go-to person,&rdquo; Ashwini recounts.</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;What made it all the more special, and perhaps brought their journey full circle was when Ashwini wanted to engrave the name of their son &lsquo;Vicken&rsquo; on the rings, which I placed on the inner rim as well.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/IMG_3877_e054953f-4c0c-40f4-86a7-208fed3ddb11_large.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>Engraving of their son&#39;s name &#39;Vicken&#39;</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: center;\">&nbsp;&ldquo;Vinita puts her heart in whatever she designs and it shows. Despite not being able to meet and only sharing my brief over phone and messages, she understood exactly what I wanted. She worked around the budget I had in mind, coming up with rings that exceeded my expectations.&rdquo;</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;She loves to involve her clients in the making of these pieces as much she is involved in it herself. In fact, she was the one who would constantly reach out and engage me in the entire process,&rdquo; Ashwini quips.</p>\r\n\r\n<p style=\"text-align: justify;\">As I saw the pictures of their beautiful vow renewal and ring exchange, I could see how thrilled &nbsp; they were to finally re-live their love story in front of all their loved ones, something they had missed out on the last time around.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/websiteVM_large.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\">&nbsp;<em>The finished bands for the lovely couple</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/VM_Blog_pic_large.jfif\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align: center;\"><em>Ashwini and AJ at their vow renewal, Dec 2018</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n\r\n<p style=\"text-align: center;\"><em>Dear Ashwini and AJ, thank you for letting me be a part of the second innings of your happily ever after, with a symbol that will remind you of the adventure that your love has been and always will be.</em></p>\r\n\r\n<p>Make everyday a Valentine&rsquo;s day for your loved one and gift them a piece of jewelry which weaves in your warm, fuzzy love story. &nbsp;To create your own personalized piece you can contact us here.</p>\r\n', 0, 'Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 00:33:14', '2021-03-26 11:05:34'),
(75, 103, 'VINITA MICHAEL SHOWCASING AT FASHION FORWARD DUBAI SEASON 7', 'vinita-michael-showcasing-at-fashion-forward-dubai-season-7', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/download_3_1080x.png', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download.jpg\" /></p>\r\n\r\n<p>Fashion forward Dubai Season 7 is round the corner and we&rsquo;re thrilled and excited to be exhibiting alongside top jewelry and accessory designers in Dubai. The location has been changed to Hai D3 this year, which is believed to be the upcoming hip design home in the region. What are we exhibiting? On display will be our collections &ndash; Impressions of a geisha, Pristine and our latest offering &lsquo;Celestia&rsquo; - A/W16. &lsquo;Celestia&rsquo; is inspired by our want to get acquainted with the unknown, while being accompanied by our most loved. The forms and motifs are inspired by the outer space such as those of the sun and moon. It celebrates a fusion of traditional aesthetics of adornment while the final visual appeal of the pieces echoes a futuristic rendition. The collection is a perfect fit for the beautiful Iftars during the Ramadan season ! The collection also consists of a statement hair jewelry piece created in collaboration with Tresemme&rsquo; Arabia, and will be on public display for the very first time.</p>\r\n\r\n<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_1.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_2.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_3.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_5.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download.jpg\" /></p>\r\n', 0, 'Vinita Michael Showcasing At Fashion Forward Dubai Season 7 | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 00:56:07', '0000-00-00 00:00:00'),
(76, 103, 'EXHIBITING AT DIVALICIOUS DUBAI - APRIL 15TH & 16TH 2016', 'exhibiting-at-divalicious-dubai-april-15th-16th-2016', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/download_99_900x_e5a3d7b7-2baf-409d-8f6b-e1b3c1b437fb_1080x.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_7.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">After having three successful exhibitions with Divalicious Dubai, we are back again! I&rsquo;ve always loved showcasing at exhibitions &ndash; I believe it is truly one of the best ways to interact with your clients and gauge the market interest in your collections.</p>\r\n\r\n<p style=\"text-align: justify;\"><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_17.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">Exhibiting alongside some of the well known celebrity designers in Dubai and Lakme Fashion Week regulars, we are thrilled to put together an assortment of handpicked designs for the event. The selection includes some of our classic best sellers seen on Bollywood royalty, as well as our latest collection &lsquo;Celestia&rsquo; which was launched last week at Fashion Forward Dubai. The designs echo the top jewelry and international fashion trends, crafted in 925 Sterling Silver and embellished with crystals from Swarovski.</p>\r\n\r\n<p style=\"text-align: justify;\"><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_45.jpg\" /></p>\r\n', 0, 'Exhibiting at Divalicious Dubai | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 01:10:02', '0000-00-00 00:00:00'),
(77, 103, 'IMPRESSIONS OF A GEISHA - MY INTRODUCTION TO SWAROVSKI AND THE CREATIVE PROCESS', 'impressions-of-a-geisha-my-introduction-to-swarovski-and-the-creative-process', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/download_10__1_1080x.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/10.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">Recently I was at work on an exciting initiative with Swarovski, a premium brand recognized for its finest cut crystals and for being at forefront of design. We are days away from releasing the final outcome of their blogger initiative - &lsquo;Neo Arabia&rsquo; and I cant wait to share the final shoots with you. As my association with the luxury brand grows stronger, I took some time to reflect on my first interaction with the house, around 2 years ago.</p>\r\n\r\n<p style=\"text-align: justify;\">Swarovski is one of the most trusted names for fashion enthusiasts around the world, especially with the top celebrity designers in the Middle East. The best jewelry designers from Kuwait and Saudi Arabia are seen using the sparkling crystals embellish their creations season after season.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/11.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">I remember feeling like a child in a candy shop the first time I was exposed to the extensive selection of the crystals at the Swarovski Head Office in Dubai. While the myriad of plush colors and detailed fancy cuts left me completely besotted, what impressed me most was the amount of thought that went behind selecting each form, color and cut detail for these crystals. The carefully put together selection of crystals for a particular season lay the foundation for the design conceptualizations that will mark the season.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/12.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/13.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">My first collection where I used crystals from Swarovski was my Spring Summer 2015 collection &lsquo;Impressions of a geisha&rsquo;. The collection responded to the progressive trend theme &lsquo;Vivid moments&rsquo; and was greatly inspired by one of my favorite movies of all times &lsquo;The memoirs of a geisha&rsquo;. The collection comprised of Maiko inspired jewelry which brought forth a contemporary Japanese inspired aesthetic.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/14.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/15.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">The crystal skulls were one of the biggest fashion trends predicted for the season. They continue to be one of the most striking fashion motifs around and with its iconic silhouette, associated deep meanings and unparalleled versatility, I feel confident that they will continue to attract and engage the top jewelry designers and fashion trendsetters in the middle east and the rest of the world.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/16.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/17.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">With &lsquo;Impressions of a Geisha&rsquo; collection, I tried to add a feminine touch to the skulls by taking cues from the characteristic hairdos of the geishas. The skull faces are flanked by brush textured silver curls on both sides, which symbolize the stiff hair curls of a traditional geisha. The pearls and glistening pave&rsquo; balls make for the hair buns, which are further accessorized by miniature handcrafted hair ornaments. In addition to the Maiko faces, the Sakura flower or the cherry blossoms were of great inspiration to me while putting together this Oriental inspired jewelry collection, and made for statement earrings, rings and brooches.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/18.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">The line also includes necklaces, earrings, palm cuffs, hair accessory and a body chain. Some of the pieces from the line have adorned Bollywood A-list celebrities and graced popular fashion magazine covers.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/19.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/20.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 'Impressions Of A Geisha - My Introduction To Swarovski And The Creative Process | Blog', '', '', 0, 1, '2021-03-04 01:41:15', '0000-00-00 00:00:00'),
(78, 103, '‘A BURST OF COLORS’ FOR NEO-ARABIA BY SWAROVSKI', 'a-burst-of-colors-for-neo-arabia-by-swarovski', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/blog.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/blog2.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">Every piece has a story to tell - be it in its colors, the materials used or the way it was made... But when it is about a dazzling statement necklace that you have handcrafted with your 2-year-old baby and it gets handpicked for an exclusive photoshoot feature on top fashion and jewelry designers in the middle east by the international brand Swarovski, you know it&rsquo;s a story to remember!</p>\r\n\r\n<p style=\"text-align: justify;\">Swarovski celebrated one of the most treasured cultures in the world with an exclusive &ldquo;Neo-Arabia&rdquo; photoshoot which features in the current May 2016 edition of Swarovski Online Magazine. Photographed against a timeless Arabian backdrop, eight Dubai jewelry and fashion bloggers&mdash;Deema Alasadi, Zahra Lyla, Mariyah Gaspacho, Fatma Husam, Salima Feerasta, Nicoleta Buru, Zarah Amira and Soraya Pena&mdash;modeled pieces from regional and international designers that merged historical Middle Eastern references with 21st-century modernity. Captured by ace fashion photographer, Tanya Aranautov and styled by the amazing Vasil Bozhilov, the images are nothing short of a dream.</p>\r\n\r\n<p style=\"text-align: justify;\">&lsquo;A burst of colors&rsquo; is a handcrafted necklace where ropes of colored mesh pipes filled with an assortment of glistening crystals were strung together. It adorns the gorgeous Dubai fashion blogger, Soraya Pena, in the photoshoot.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/blog3.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">The location was the hauntingly beautiful dreamscape of the palatial Qasr Al Sarab Desert Resort by Anantara, set amid the rolling sand dunes of Abu Dhabi&rsquo;s Rub&rsquo; Al Khali (the Empty Quarter). Here, a selection of stunning ensembles showcased Swarovski&rsquo;s founding philosophy of collaborating with designers across the world: Sparkling day looks, elegant special-occasion outfits, traditional wear, kaftans, stunning shoes, accessories and jewelry all shimmered under the desert sky.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/blog4.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">It was an honor to be featured amidst handpicked top regional designers that included AAVVA, Khaadi, Maria. B., Balu Joias and Madiso; international fashion houses were represented by Jean Paul Gaultier, Etienne Aigner and Adelina Rusu; and Rupert Sanderson, whose spectacular shoes are frequently seen on the Royals. Vintage pieces also featured, including Louboutin boots encrusted with Swarovski crystals in which Beyonc&eacute; once dazzled her audiences.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/blog5.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Swarovski has firmly established itself in the world of fashion, art and design through its collaborations with regional and international designers, architects and artists who use Swarovski crystallized elements in their remarkable work. View the feature here: http://www.crystals-from-swarovski.com/magazine/2016/issue-05/Oasis_of_Style.en.html</p>\r\n', 0, 'A Burst Of Colors For Neo-Arabia By Swarovski | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 03:33:03', '0000-00-00 00:00:00'),
(79, 103, '21 REASONS TO BUY GOLD THIS AKSHAYA TRITIYA IN U.A.E', '21-reasons-to-buy-gold-this-akshaya-tritiya-in-uae', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/blog6.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_25.jpg\" /></p>\r\n', 0, '21 Reasons To Buy Gold This Akshaya Tritiya In U.A.E | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 03:41:02', '0000-00-00 00:00:00'),
(80, 103, 'BETWEEN DREAMS AND OUR BEST KEPT SECRETS: ‘ZIBA’ FOR BLUESTONE', 'between-dreams-and-our-best-kept-secrets-ziba-for-bluestone', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/blog7.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download (1).png\" /></p>\r\n\r\n<p style=\"text-align: justify;\">Recently I had the pleasure of collaborating with the well-renowned brand and one of the top online shops in India for jewelry, Bluestone, for the development of a bespoke jewelry collection that we have lovingly christened &lsquo;Ziba&rsquo;. The Persian art inspired jewelry line brings forth a fusion of traditional jewel craft detailing and contemporary design conceptualizations.</p>\r\n\r\n<p style=\"text-align: justify;\">The Ziba collection for bluestone was developed keeping today&rsquo;s woman in mind &ndash; Who juggles multiple roles at work and home and still finds the time to look well put together. The collection comprises of practical and easy to wear jewelry pieces, crafted in 18k gold and set with diamonds and other precious colored gemstones. Plush colors of enameling add to the detailing of the pieces.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">One of my main objectives while working on this collaboration with bluestone was to present women with options that they would love to wear often. Be it jewelry for casual get-togethers and brunches, formal dos, office wear, vacations, parties or to mark a special occasion such as weddings and anniversaries, there&rsquo;s something for everyone. The collection comprises of cocktail rings, two finger rings, palm cuffs, bangles, earrings, necklaces and pendants.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Here are some of my picks from the line :</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>AYNAZ PALM CUFF</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_26.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>An evening out or a cocktail to attend? TheAynaz palm cuff is the &lsquo;It&rsquo; hand accessory!</p>\r\n\r\n<p><strong>MARYAM TWO FINGER RING</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_27.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With a statement piece such as this, keep the rest of jewelry styling simple.</p>\r\n\r\n<p><strong>THE SHOKUFEH JEWELS</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_28.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Fresh as a daisy and light as a feather, the <em><strong>Shokufeh</strong></em> jewels will add an ethereal elegance to your look.</p>\r\n\r\n<p><strong>THE GULBAHARS</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_29__1.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Add a touch of feminine blush with the<em><strong> Gulbahar</strong></em> earrings and co ordinated ring.</p>\r\n\r\n<p><strong>THE ELAHEH</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_30.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The <em><strong>Elaheh</strong></em> earrings are elegant and versatile and can easily slip from a style statement for a day about town to a classy night out. &nbsp;</p>\r\n\r\n<p>Would love to hear how you would style Ziba. View the the collection here</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 'Between Dreams And Our Best Kept Secrets: ‘Ziba’ For Bluestone | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 04:03:46', '0000-00-00 00:00:00'),
(81, 103, 'CHIC AND CLASSY: DRESS CODE FOR WOMEN DURING RAMADAN', 'chic-and-classy-dress-code-for-women-during-ramadan', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/blog8.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_32.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">Ramadan has just commenced today and I wish all those observing the holy month a blessed time of peace, joy and togetherness!</p>\r\n\r\n<p style=\"text-align: justify;\">Ramadan is a significant month in the Islamic calendar and in UAE, the period is marked by a host of Ramadan-related activities. Emirati hospitality and traditions are very evident during this month as Iftars are hosted across Dubai and the rest of the country and residents from different nationalities come together to celebrate the spirit of Ramadan.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">I personally so look forward to the gorgeous Ramadan tents and scrumptious Iftars.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Which brings us to our next question &ndash; &lsquo;What jewelry to wear during Ramadan&rsquo; ?</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;It is important to be mindful of the local culture especially at this time, so it would be wise to dress a bit modest and conservatively. Go for outfits that cover your shoulders and your knees. An elegant kaftan paired with long earrings and a statement ring would be my pick. A straight fit calf length dress teamed with a statement brooch and minimalistic earrings would be another modern alternative.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">For those on the lookout for designer jewelry for Ramadan , we have put together a bespoke jewelry collection called &lsquo;Celestia&rsquo;. The collection comprises of elegant and easy to team pieces inspired by the motif of Crescent moon, a prominent form symbolic of the holy month.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_33.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Besides other elegant picks, the collection includes Crescent shaped brooches, headpieces, Crescent rings and earrings set with Crescent cut crystals from Swarovski. They make for great accessory choices to liven up your ensemble, and also make for thoughtful jewelry gifts for Ramadan and Eid-Ul-Fitr. The pieces are crafted in 925 Sterling Silver and set with crystals from Swarovski.&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_31.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_34.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Happy to share with you that throughout this month, we are offering a 10% Ramadan shopping discount for jewelry from all our collections along with Free Shipping!&nbsp;</p>\r\n\r\n<p>View the entire collection here</p>\r\n', 0, 'Chic And Classy: Dress Code For Women During Ramadan | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 05:33:46', '0000-00-00 00:00:00');
INSERT INTO `blog` (`id`, `category_id`, `blog_title`, `blog_slug`, `blog_url`, `blog_author`, `blog_date`, `image_caption`, `blog_image`, `blog_crop_image`, `description`, `likes`, `meta_title`, `meta_keyword`, `meta_description`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(82, 103, 'GET THE LOOK : MADHURI DIXIT ON SYTYCD INDIA', 'get-the-look-madhuri-dixit-on-sytycd-india', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/blog9.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_35.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">The current season of So You Think You Can Dance ( SYTYCD ) India version has just drawn to a close and one of our favorite things about the Dance Reality Show has been the ever graceful and elegant Madhuri Dixit and her wardrobe which brought together creations by top fashion designers and top jewelry designers&ndash; who was one of the befitting judges at the show. Week after week she pulled off looks to die for, styled by the amazing Ami Patel and her team.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Here are three of my personal favorite styles and also details on where you could get these fabulous pieces!&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">1. In Pankaj and Nidhi and jewels from Vinita Michael</p>\r\n\r\n<p style=\"text-align: justify;\">Starting off with our top pick! Ok, I may be biased here for It was pure joy seeing the gorgeous diva accessorizing her look with one of my personal favorites from our latest offering, Celestia. The unique designer earrings set with Swarovskis are the go to jewels to accessorize a day to night look! The jade green tea length dress complemented her easy and effortlessly elegant persona. Her signature loose curls and dewy makeup finished off her look.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Get the look :</strong></p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Pankaj and Nidhi tea length dress :</strong><a href=\"http://www.pankajnidhi.com/aw16-artful-army.html\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">http://www.pankajnidhi.com/aw16-artful-army.html</span></a></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_36.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_37.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Buy Earrings :</strong><a href=\"https://shop.vinitamichael.com/product/madhuri-dixit-sundrop-toggle-clasp-earrings/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">https://shop.vinitamichael.com/product/madhuri-dixit-sundrop-toggle-clasp-earrings/</span></a></p>\r\n\r\n<p>2. In Dolce and Gabbana and Jewels from Minerali and Atelier Mon&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_38.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">I totally loved this floral one piece on Madhuri &ndash; Feminine and classy, it complements her spirited personality perfectly. The floral fitted dress was tastefully teamed with glittering diamond jewels. The light and dewy makeup, with soft wavy curls rounded up her look.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Get the look:</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_39.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Buy Dolce and Gabba floral dress :</strong><a href=\"http://store.dolcegabbana.com/ae/dolce-gabbana/women/onlinestore/dresses\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">http://store.dolcegabbana.com/ae/dolce-gabbana/women/onlinestore/dresses</span></a></p>\r\n\r\n<p><strong>Buy Jewelry </strong>: <a href=\"http://www.ateliermon.com\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">http://www.ateliermon.com</span></a></p>\r\n\r\n<p>3. In Theia Couture and jewels from P.N Gadgil&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_40.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Doesn&rsquo;t Madhuri look like a Kashmir Sapphire carved to perfection in this elegant creation by Theia Couture. Tastefully accessorized with diamond earrings and ring from PNG, her natural look makeup and softly curled tresses finished off her look gorgeously.</p>\r\n\r\n<p><strong>Get the look :</strong></p>\r\n\r\n<p>Buy Theia Couture cowl neck gown :<a href=\"http://shop.nordstrom.com/s/slvlss-long-dress/4292099?cm_mmc=Linkshare-_-datafeed-_-women%3Adresses%3Adress-_-5120802&amp;siteId=gcdL_ATRVoE-1iuU_8trVlFO0yPameX4bw\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">http://shop.nordstrom.com/s/slvlss-long-dress/4292099?cm_mmc=Linkshare-_-datafeed-_-women%3Adresses%3Adress-_-5120802&amp;siteId=gcdL_ATRVoE-1iuU_8trVlFO0yPameX4bw</span></a></p>\r\n\r\n<p><strong>Buy diamond earrings:&nbsp;</strong><a href=\"http://www.pngadgiljewellers.com\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">www.pngadgiljewellers.com</span></a></p>\r\n\r\n<p>Which one was your personal favorite ? Let us know</p>\r\n', 0, 'Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 05:49:51', '2021-03-04 06:00:14'),
(83, 103, '6 REASONS TO BUY JEWELRY ONLINE', '6-reasons-to-buy-jewelry-online', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/blog10.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_41.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">When you&#39;re ready to purchase your next jewelry, consider purchasing the jewelry online. The Internet offers various interesting shopping points of interest, whether you&#39;re a first-time buyer or an e-shopping veteran:</p>\r\n\r\n<p style=\"text-align: justify;\">1. <strong>Comparison shopping:</strong> One reason shoppers prefer to regularly shop online is that they can survey and analyze different jewelry on the basis of price and quality. Sites have the ability to offer a much more extensive choice of stock available to be purchased in one spot than a conventional brick-and-mortar store. This means that you can have access to bespoke, one of a kind jewelry pieces that you won&#39;t find anywhere else.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\"><a href=\"https://shop.vinitamichael.com/product-category/pristine/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">https://shop.vinitamichael.com/product-category/pristine/</span></a></p>\r\n\r\n<p style=\"text-align: justify;\">2. <strong>Ease of Purchase:</strong> Instead of travelling all the way to the store, finding parking, making way through the crowd, eventually leaving you drained even before the actual shopping commences, give smart online shopping a go! Smart online customers basically explore through the website, compare different jewelry and select the best fit for themselves.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\"><a href=\"https://shop.vinitamichael.com/product/star-specked-statement-ring/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">https://shop.vinitamichael.com/product/star-specked-statement-ring/</span></a></p>\r\n\r\n<p style=\"text-align: justify;\">3. <strong>Value:</strong> Since an Internet retailer working on a made-to-order model has lesser physical stock and other overhead expenses than a brick-and-mortar retailer, these savings can be passed on to you, the purchaser, as amazing deals on the most recent merchandise.</p>\r\n\r\n<p style=\"text-align: justify;\">4. <strong>Authenticity:</strong> Vinita Michael is an Ingredient Branding Partner of Swarovski. The pieces available on the Vinita Michael e-shop are crafted in 925 sterling silver and set with authentic crystals from Swarovski.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_42.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://shop.vinitamichael.com/product/radiant-statement-earrings-2/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">https://shop.vinitamichael.com/product/radiant-statement-earrings-2/ </span></a><span style=\"color:#000000;\">&nbsp;</span></p>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"color:#000000;\">5. <strong>Security:</strong> Most sites, www.shop.vinitamichael.com included, ensure that all individual data you provide for payment or registration purposes are encrypted by the latest security protocols. This eliminates the danger of data interception, data manipulation, fraud and hacking.</span></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_43.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://shop.vinitamichael.com/product/solo-double-toned-ring/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">https://shop.vinitamichael.com/product/solo-double-toned-ring/</span></a></p>\r\n\r\n<p style=\"text-align: justify;\">6. Stay up to date: Stay on top of the style game by keeping up with our new blog series &lsquo;Get the look&rsquo;. The series will feature the best looks sported by celebrities and where you can shop for the exclusive pieces. &nbsp;Our second series &lsquo;Creative process&rsquo; provides an insight into what goes behind making each of the unique collections we offer. Additionally, we will be also educating our readers on different types of Jewelry and its significance in the upcoming blog series&nbsp;</p>\r\n\r\n<p><a href=\"http://vinitamichael.com/vinita-michael-blog/\" style=\"text-decoration:none;\"><span style=\"color:#000000;\">http://vinitamichael.com/vinita-michael-blog/</span></a></p>\r\n', 0, '6 Reasons To Buy Jewelry Online | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 06:13:48', '0000-00-00 00:00:00'),
(84, 103, 'GET THE LOOK : PRIYANKA CHOPRA', 'get-the-look-priyanka-chopra', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/blog11.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_45.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">Priyanka Chopra is unquestionably the &lsquo;It&rsquo; girl of the moment. &nbsp;She has been basking in the glory of her well deserved success in India and in Hollywood. And while at it, she has always managed to keep her style game strong. Priyanka Chopra&rsquo;s wardrobe and style choices come across as easy, elegant, feminine and above all, effortlessly stylish!</p>\r\n\r\n<p style=\"text-align: justify;\">Here are four of my personal favorite styles seen on her over the years and also details on where you could buy the designer fashion and celebrity designer jewelry online:&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">1. In Theia Couture and jewels from Vinita Michael&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_46.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Starting off with our top pick! The look was styled by Ami Patel for the 21ST Lion&rsquo;s Award ceremony, where Priyanka won the best actress award for her performance in and as Mary Kom. I loved the boat neck cap sleeve top teamed with the hot pink taffeta skirt, by Theia Couture. She accessorized her look with one off a kind, statement ear studs form our &lsquo;African Rhapsody&rsquo; collection. The earrings are crafted in gold plated 925 sterling silver. The highlight for me in terms of the hair and makeup was the feminine side bun. It added dollops to her whole easy feminine look.&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_47.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Get the look :</p>\r\n\r\n<p>Buy Theia Couture dress worn by Priyanka Chopra:<a href=\"http://theia.myshopify.com/collections/collections/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">http://theia.myshopify.com/collections/collections/</span></a></p>\r\n\r\n<p>Buy Priyanka Chopra earrings by Vinita Michael:<a href=\"https://shop.vinitamichael.com/product/reflections-of-the-setting-sun-ear-studs/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">https://shop.vinitamichael.com/product/reflections-of-the-setting-sun-ear-studs/</span></a></p>\r\n\r\n<p>2. In Victoria Beckham &nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_48.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">I absolutely loved this Red piece by Victoria Beckham on Priyanka. Right from the color to the cut, the dress complemented the gorgeous actress perfectly. The classic black pumps teamed with the light dewy makeup and soft curls finished off the look nicely.&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_111.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Get the look :&nbsp;</p>\r\n\r\n<p>Buy Victoria Beckham dress worn by Priyanka Chopra :<a href=\"https://www.victoriabeckham.com/ready-to-wear/asymmetric-cut-out-fitted-cr.html\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">https://www.victoriabeckham.com/ready-to-wear/asymmetric-cut-out-fitted-cr.html</span></a></p>\r\n\r\n<p>3. In Verb by Pallavi Singhee and Jewels by Vinita Michael &nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_49.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">This is easiy one of the most adorable outfits for a weekend brunch. Don&rsquo;t you think ? I love the tea length of the dress and the heart prints on the candy pink tone. It is easy, feminine and stylish ! The look was accessorized with our floral ring from our &lsquo;Impressions of a Geisha&rsquo; collection. The ring is crafted in Rose gold plated 925 sterling silver and set with crystal briolette from Swarovski.&nbsp;</p>\r\n\r\n<p>Get the look : Buy Verb by Pallavi Singhee Dress won by Priyanka Chopra: https://www.facebook.com/VERB-BY-Pallavi-Singhee-534018043315146/</p>\r\n\r\n<p style=\"text-align: justify;\">Buy Vinita Michael ring worn by Priyanka Chopra : <a href=\"https://shop.vinitamichael.com/product/felicity-ring/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">https://shop.vinitamichael.com/product/felicity-ring/</span></a></p>\r\n\r\n<p>4. In Versace&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_21.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Priyanka oozed oomph on the red carpet at the Bill Board Music Awards 2016, in this cobalt blue Versace head turner. I loved the buckle strap detail which gave it an edgy factor. The feminine silhouette of the dress complemented the star&rsquo;s super toned frame. The matte make up and messy fishtail braid finished her easy glam look !&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_311.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Buy Versace dress worn by Priyanka Chopra :<a href=\"http://www.versace.com/international/en/world-of-versace/brand/atelier-versace/spring-summer-collection/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">http://www.versace.com/international/en/world-of-versace/brand/atelier-versace/spring-summer-collection/</span></a></p>\r\n\r\n<p>Which one did you love the most ?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 'Get The Look : Priyanka Chopra | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 06:35:52', '0000-00-00 00:00:00'),
(85, 103, 'TOP 10 ENGAGEMENT RING STYLES', 'top-10-engagement-ring-styles', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/download_50_900x_1_1080x.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_50.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">For a couple, planning their wedding day is one of the most special experiences of their lives. Right from choosing the venue to the wedding dress, many things require making several decisions and spending enough time together on them. The engagement ring and the wedding ring to me are two of the most important things associated with the journey to this historical day, as they are going to last with you forever, unlike most other items which will be tucked away with the end of the ceremony.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">While my personal advise to the groom/ couple is to always view the diamonds upfront before making the purchase, especially when it is for an important milestone jewel such as the engagement or wedding ring, online engagement and wedding jewelry shopping has definitely experienced a huge wave of acceptance in recent times.</p>\r\n\r\n<p style=\"text-align: justify;\">One of the greatest advantage of buying your engagement ring from an online jeweler in Dubai or internationally, is the multiple style of engagement rings you get the access to, on a single platform. We provide different styles according to your taste and if we don&rsquo;t have a style you want, we can personalize a ring for you. Our fine jewelry is crafted in 18K gold and set with certified diamonds and other precious colored gemstones.</p>\r\n\r\n<p style=\"text-align: justify;\">Here is my pick of the 10 most popular styles of engagement and wedding rings :&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>10. Solitaire ring set with a Round brilliant diamond</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_51.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">This classic style continues to be one of the most popular style for engagement rings. Round brilliant diamonds make up of about 75% of all diamond purchases and offer the most sparkle out of all the diamonds.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">The crown has a table facet, bezel facets, star facets, and upper half facets. &nbsp;Below the girdle, the pavilion has lower half facets, pavilion main facets and a culet. The number, size, and the way in which the features are placed convey the amazing sparkle.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Points to note before you buy round brilliant diamond engagement rings in Dubai :</p>\r\n\r\n<p>* When you shop for diamond in Dubai be aware of the lighting under which you view it.</p>\r\n\r\n<p>* &nbsp;RBC (Round Brilliant Cut) diamond has the maximum fire (red, blue, yellow or orange flashes) and brilliance (brightness) when you view it under the light. It reflects almost all the light that enters the diamond creating the maximum sparkle and life.&nbsp;</p>\r\n\r\n<p>* The cut grade is an important aspect in deciding the general appearance of a diamond. A poorly cut diamond will appear to be dull even if it has great clarity and color. &nbsp;On the other hand, a well-cut diamond can have a lower color (G-H) or clarity (SI1-SI2) and still look stunning, because of its better feature to create a sparkle and brilliance.</p>\r\n\r\n<p><strong>9. Solitaire ring with Fancy cut diamond</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_52.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Basically, all diamond cuts sold for use in jewelry are one of ten fancy or round cut diamond shapes. The most well-known diamond shapes are:</p>\r\n\r\n<p>* Round &ndash; round brilliant cut diamond</p>\r\n\r\n<p>* Princess&ndash; square princess cut diamond</p>\r\n\r\n<p>* Emerald cut &ndash; rectangular step cut diamond</p>\r\n\r\n<p>* Oval cut &ndash; similar to the round brilliant but elongated like an oval</p>\r\n\r\n<p>* Marquise cut &ndash; boat shaped with pointed ends</p>\r\n\r\n<p>* Heart cut &ndash; romantic heart shaped brilliant cut</p>\r\n\r\n<p>* Pear cut - pear shaped diamond is a mix of a round and a marquise shape, with a diminished point toward one side</p>\r\n\r\n<p>* Cushion cut - The cushion cut diamond is a combination of a square cut with rounded corners, much like a pillow</p>\r\n\r\n<p>* Asscher cut - The Asscher cut diamond is similar to the emerald cut, It is a stepped square cut with larger step facets, a higher crown, and a smaller table. the Asscher has cropped corners</p>\r\n\r\n<p>* Radiant cut - The radiant cut diamond is a combination of the sparkle of the Emerald cut diamond and the brilliance of the Round.</p>\r\n\r\n<p><strong>8. Three stone ring&nbsp;</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_4.png\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Three stone rings are very popular and for good reason. They are are another timeless style.The Proportion is an important factor in the aesthetics of a three stone ring. You shouldkeep in mind the centre stone size and whether that specific size will work in three stone design. In our opinion, focusing towards the centre while keeping the sides proportionate (length to width ratio) will give you the most elegantly balanced finished ring. The cutting style of the side stones is also an important factor to be considered while choosing a three stone ring.</p>\r\n\r\n<p>Points to note before you buy three stone engagement rings in Dubai &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Be sure to have the ring independently properly evaluated.</li>\r\n	<li>Stress on proper certification of the diamonds.&nbsp;</li>\r\n	<li>Ensure that the height difference between the centre and side diamonds is uniform and the diamonds securely set.</li>\r\n</ul>\r\n\r\n<p><strong>7. Trinity ring</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_53.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Three bands of three colors : Pink, yellow and white gold stand for love, fidelity and friendship. The three colors are intertwined to a beautiful craft known as Trinity ring style created by the Louis Cartier in 1924.</p>\r\n\r\n<p>Point to note before you buy Trinity rings in Dubai &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<ul>\r\n	<li>It is a little difficult to have a Trinity ring resized to fit the finger. Therefore knowledge of the exact ring size is crucial.</li>\r\n</ul>\r\n\r\n<p><strong>6. Eternity band</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_54.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">For me, a diamond eternity band displays an eternal expression when worn as an engagement or wedding ring. With a row or multiple lines of diamonds that circle the ring entirely, these bands are elegant from any angle and exhibit an eternal radiance unmatched by other styles.</p>\r\n\r\n<p style=\"text-align: justify;\">While considering an eternity band it is essential to remember the cut and size of the diamonds, the setting style, and the width of the band.&nbsp;</p>\r\n\r\n<p>Points to note before you buy eternity band in Dubai :&nbsp;</p>\r\n\r\n<ul>\r\n	<li>It is quite difficult to have an eternity ring resized to fit the finger. Therefore knowledge of the exact ring size is crucial.</li>\r\n	<li>Stress on proper certification of the diamonds</li>\r\n	<li>The diamonds should complement each other in terms of color, clarity and cut.&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>5. Half eternity band</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_55.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Half eternity band are quite popular as well. Rather than a complete circle of diamonds like in a diamond eternity ring, half-eternity rings just have diamonds on the face of the wedding band. It&#39;s a less expensive alternative compared to eternity rings since an only half a number of diamonds are used, unless you decide to go for bigger size of the diamonds .</p>\r\n\r\n<p>Points to note before you buy half eternity band online in Dubai</p>\r\n\r\n<ul>\r\n	<li>Stress on proper certification of the diamonds</li>\r\n	<li>The diamonds should complement each other in terms of color, clarity and cut.&nbsp;</li>\r\n	<li>Consider the choice of metal color : 18K Rose Gold, White Gold or Yellow gold as it can add dollops to the overall look.&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>4. Split shank engagement rings</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_56.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">In a Split shank engagement ring, the shank is the unique feature of the engagement ring. The Shank is basically the band of the ring or the part that supports the middle setting. In a split shank ring, it splits in half till the center. It could be diamond studded, plain platinum, engraved, curved (hello lace shank), or doubled or tripled up.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">It gives the ring an open look, by opening up the negative space between two shanks. It can make the middle stone look much bigger. Itgives the engagement ring a modern and classy vibe, and still leaves a lot of space for unique customization.&nbsp;</p>\r\n\r\n<p>Points to note before you buy split shank engagement rings online in Dubai</p>\r\n\r\n<ul>\r\n	<li>Stress on proper certification of the diamonds</li>\r\n	<li>Keep in mind the size of the centre stone. It should still stay as the focal point of the ring.</li>\r\n	<li>Keep in mind the ring size of the wearer. The design features of the shank should not appear overwhelming to the wearer for daily wear.&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>3. Engagement ring and wedding band sets</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_57.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">While your wedding ring and engagement ring don&#39;t need to be worn as one, if you do want to wear them together, it&#39;s essential that the band doesn&#39;t overpower the engagement ring. Balance is essential!</p>\r\n\r\n<p>Points to note before you Buy engagement ring and wedding band sets online in Dubai :</p>\r\n\r\n<ul>\r\n	<li>The diamonds should complement each other in terms of color, clarity and cut</li>\r\n	<li>The design of the engagement ring and wedding ring should complement each other and ideally, the bands should sit flush when worn together.</li>\r\n</ul>\r\n\r\n<p><strong>2. Pop of color</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_58.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">To most women, diamonds are their best friends. However, in some cases, not everybody wants a clear sparkler. Nowadays ladies are looking out for added color like never before for their unique rings.</p>\r\n\r\n<p style=\"text-align: justify;\">Emeralds are such a lovely choice for an engagement ring. Symbolizing affection and trust, it is positively a suitable stone to decide. Another popular option is sapphire, which symbolizes faithfulness and sincerity.&nbsp;</p>\r\n\r\n<p>Points to note before you Buy pop of color on diamond rings online in Dubai :&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Keep in mind the size of the centre stone. It should still stay as the focal point of the ring</li>\r\n	<li>Keep in mind the size, color and cut of the surrounding diamonds.&nbsp;</li>\r\n	<li>Consider the choice of metal color : 18K Rose Gold, White Gold or Yellow gold. It should complement the choice of color of the stones.&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>1. Personalized Engagement rings and Wedding Bands</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_58.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">There are the innumerable styles of engagement and wedding rings, and then there is the personalized ring. There is always something about wearing a personalized and custom crafted ring. What I like about personalized rings is that it says a thousand things, and it says it your way !</p>\r\n\r\n<p style=\"text-align: justify;\">Working with your trusted jeweler and creating a symbolic jewel that is inspired by your unique story and sentiments, seems like the most befitting way to mark such an important milestone in your life.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Should you wish to create a unique designer ring for your special day, contact us here and our team will be in touch with you : Contact Vinita Michael</p>\r\n\r\n<p style=\"text-align: justify;\">We&#39;re offering free shipping!&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Avail the offer now : <a href=\"https://shop.vinitamichael.com/product-category/celebstyle/\" style=\"text-decoration:none;\" target=\"_blank\"><span style=\"color:#000000;\">https://shop.vinitamichael.com/product-category/celebstyle/</span></a></p>\r\n', 0, 'Top 10 Engagement Ring Styles | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 06:57:11', '0000-00-00 00:00:00'),
(86, 103, 'HOW TO FIX A RING THAT IS TOO BIG FOR A FINGER?', 'how-to-fix-a-ring-that-is-too-big-for-a-finger', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/download_60_91.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_60.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">To fix a ring that is too big for the finger it rests upon, apply something to the inner side of the bottom, such as a liquid rubber solution like Cushion Solution or a ring guard. You need one of the following: Cushion Solution, a ring guard or adhesive moleskin.</p>\r\n\r\n<p style=\"text-align: justify;\">Apply Cushion Solution : Apply a thin layer of the Cushion Solution substance to the inner side of the bottom of the ring. Allow the solution to dry overnight. If the solution makes the ring too small and causes the finger to swell, scrape the layer off. Apply a thinner layer or attempt a different solution.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_61.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Attach a ring guard : Purchase a ring guard that matches the material of the ring, or purchase one that is transparent. Attach the guard to the inside of the bottom of the ring, and slide it up or down until the ring is a perfect fit.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_62.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Attach an adhesive material : Apply an adhesive material as a last resort solution. Cut a piece of adhesive moleskin that is as wide as the ring. Attach the adhesive to the inner side of the ring. Apply as many layers as needed until the ring fits perfectly on your finger.</p>\r\n\r\n<p style=\"text-align: justify;\">Consult your jeweler : While the above listed methods are simple DIY solutions, it is important to note that these are not the most secure or reliable options. These do work great as temporary solutions though, for instance, if the ring gets slightly loose due to sudden weight loss etc. However, should there be a drastic difference in the size of the ring and the ring size of the wearer, it is best to take it to your jeweler and have it resized, especially if it is an expensive piece or a ring with high sentimental value.</p>\r\n\r\n<p style=\"text-align: justify;\">We&#39;re offering free shipping!</p>\r\n', 0, 'How To Fix A Ring That Is Too Big For A Finger? | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 07:52:58', '2021-03-04 07:53:43'),
(87, 103, 'HOW TO CLEAN YOUR JEWELRY', 'how-to-clean-your-jewelry', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/download_63_900x_1_1080x.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_63.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">Please note that this method is applicable only for Fine Jewellery ( Gold, Platinum ) and non-plated 925 Sterling Silver Jewelry. You would need a few items before starting the process. It is fairly simple DIY process - soak the earrings in mild detergent and warm water, and gently scrub it with a toothbrush. Finally, wipe it dry with a soft cloth to restore its beauty.</p>\r\n\r\n<p>Here&rsquo;s the step by step procedure :&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Gather materials : dish soap, toothbrush and soft cloth, two shallow bowls, a strainer, mild dish soap, warm water, old toothbrushes and lint-free cloths.</li>\r\n	<li>Gather the jewelry that need to be cleaned. Additional cloths can be useful for lining the work surface to protect it and the jewelry.</li>\r\n	<li>Soak jewelry : Add to the bowl a few drops of soap and enough warm water to cover the earrings. Place jewelry in strainer, lower into water and soak for five minutes.</li>\r\n	<li>Scrub gently : If needed, use an old toothbrush to gently scrub away dirt and grime. Be careful not to loosen any stones or settings.</li>\r\n	<li>Rinse, and dry : Fill another bowl with more warm water. Return the jewelry to the strainer, and submerge in clean rinse water. Swish them around if necessary. Remove, then dry with a lint-free cloth. Buff to restore the shine.</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_64.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">Clean pearl jewelry : For pearl earrings, soaking is not recommended, since a soak can damage the pearls. Instead lay them on a soft cloth, then brush them gently with a soft brush dipped in mild soapy water. Rinse them with a damp, soft cloth. Allow the pearl earrings to air dry.</p>\r\n\r\n<p>We&#39;re offering free shipping!</p>\r\n', 0, 'How To Clean Your Jewelry | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 08:00:22', '0000-00-00 00:00:00'),
(88, 103, 'PERSONALIZED WEDDING RINGS IN DUBAI: SAYING IT YOUR WAY', 'personalized-wedding-rings-in-dubai-saying-it-your-way', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/download_65_900x_1_1080x.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_65.jpg\" /></p>\r\n\r\n<p style=\"text-align: justify;\">A few days back, I had penned down an article listing my pick of &lsquo;top 10 styles of Engagement and Wedding rings&rsquo;. My no.1 pick was the personalized version. A jewelry piece always says so much &ndash; and what I like most about personalized jewelry is that it says it in your unique way! Over the years, I have been fortunate to work alongside some lovely clients to create bespoke pieces for them. I must admit that designing and crafting Bridal or Wedding Jewelry is always a special experience as it marks such an important milestone in the couple&rsquo;s lives. And to be trusted with creating a symbolic jewel that is inspired by their unique story and sentiments, is a matter of much joy and honor. I happened to get in touch with a lovely couple I had worked with sometime back, and got down to recounting our experience of working on their personalized wedding rings.</p>\r\n\r\n<p style=\"text-align: justify;\">I met Leah and Andrew in the early summer months of 2015. They were in the midst of planning their wedding and looking to get personalized wedding rings for their big day.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">I remember being particularly impressed with Leah&rsquo;s knowledge of gemstones and the types of different stone settings we could explore. I later found out that while in secondary school, during the summer she had worked at a jewelry store in her hometown. &ldquo;I knew a few styles and settings I liked and preferred more of the prong set band, rather than channel set etc. When I decided to use stones with personal meaning it meant finding the right person to help create my vision&rdquo;, she says.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">She shared with me a beautiful gold bracelet, set with diamonds and sapphires. The bracelet had a lovely story behind it and Leah was keen to explore the option of using the gemstones from the bracelet in her ring.&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_66.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">The embroidered satin patch was sewn into the lining of Leah&#39;s dress so that she could keep a picture of her dad with her throughout the day and as she walked down the aisle</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;I love and cherish things with sentimental value. My dad passed away when I was young, and I have held onto a few items of his or things he gave my mom. One of those was a bracelet with sapphires and diamonds. It was one of two bracelets, the other was shared with my sister when she had her first child. My mom was born in September so my dad always liked to give her jewelry with her birthstone. Not always knowing what I would necessarily do with the bracelet, I always kept it in my jewelry box as a special memento. After Andrew and I got engaged and started to discuss our wedding bands it seemed only natural to use the bracelet. It was a way I could incorporate my dad into our special day, and not only have him as a part of that day, but a part of our marriage forever. Knowing that the band I wear everyday was part of my parents&rsquo; marriage made it all the more special.&rdquo;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_67_f96a67ed-fc3d-4cf4-a1b8-a8a63546ac8a.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Leah and her dad</p>\r\n\r\n<p style=\"text-align: justify;\">The first step was to clean the diamonds and sapphires and see if we could still use them by inspecting them for any fractures. Knowing the history behind the bracelet, I was very keen to use the stones in the ring and was elated to note that the gems were still in great condition. Later, I graded the diamonds for their cut, weight, color and clarity so that if we needed to source additional diamonds, we knew what factors to look for.&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_68.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Ferguson wedding</p>\r\n\r\n<p style=\"text-align: justify;\">The next step was the designing process. I knew that Leah intended to wear both rings in one finger, so it was important that the engagement ring and the wedding ring complemented each other. Her engagement ring was an 18K White Gold three-stone-ring set with an oval cut diamond flanked by pear cuts on either sides. We both agreed that a white gold band set with alternating diamonds and sapphires in prong setting would go beautifully with the wedding ring. As for the thickness of the band and the height at which the stones would be set, I took reference from the engagement ring. The setting height was worked out in a manner such that when the two rings were worn together, the center oval cut diamond of the engagement ring appeared highest, and the round diamonds and sapphires of the wedding band appeared a step lower. This would ensure that while the rings sat flush, the stones did not not clash at any point.</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_69.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">A closeup of the rings</p>\r\n\r\n<p style=\"text-align: justify;\">Andrew gravitated towards a casual understated look for his ring. As he wasn&rsquo;t used to wearing jewelry on an everyday basis, we decided to go with a classic band in 18K White Gold with Matte Brush finish, which he was comfortable to wear daily, in terms of both the look and the feel.</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;We had a wonderful experience with Vinita. We both work and Vinita was very accommodating when it came to scheduling appointments to design and try on the bands etc. She worked with us every step of the way, meeting a few times throughout the design and manufacturing process, to make sure we were happy with the style and fit. All of these factors ensured that when we received the final bands, they were perfect!&rdquo;, recount Leah and Andrew happily.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Dear Leah and Andrew, it was an absolute pleasure creating your wedding rings, and thank you so much for allowing me to be a small part of your beautiful fairytale, and I wish for you a lifetime of love and blessed togetherness!&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_70.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Leah and Andrew at their wedding</p>\r\n\r\n<p>To create your own personalized wedding/engagement ring you can contact us here&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 'Personalized Wedding Rings In Dubai: Saying It Your Way | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 08:07:32', '0000-00-00 00:00:00'),
(89, 103, 'HOW TO FIND YOUR RING SIZE', 'how-to-find-your-ring-size', '', 'VINITA MICHAEL', '2018-12-18', '', 'uploads/blog/download_71_2.jpg', NULL, '<p><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_71.jpg\" /></p>\r\n\r\n<ul>\r\n	<li>The first step is to gather the materials required : You can either have a small piece of string or a piece of paper</li>\r\n	<li>The second step is to cut the string approximately 6 inches long.&nbsp;</li>\r\n</ul>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_72.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>If the string is not available, a piece of paper about 6 inches long and 1/4 inch wide also works.</li>\r\n	<li>Wrap the string or paper around the finger (Have a friend help if necessary)</li>\r\n</ul>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_73.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Wrap the string or strip of paper around the ring finger, pulling it snug but not too tight.</li>\r\n	<li>Mark the spot where the end of the string or paper overlaps.</li>\r\n	<li>Remove the string or paper and measure</li>\r\n</ul>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://emiratesdirectory.com/vi/uploads/content/download_74_e420e944-2c53-46a0-8240-7cdd32ce685c.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Take the string or piece of paper from around the finger.&nbsp;</li>\r\n	<li>Hold it up to a ring measuring chart, or use the following measurements: size 5 is 1 1/16 inch, size 6 is 1 1/8 inch, size 7 is 1 3/16 inch, size 8 is 1 1/4 inch, size 9 is 1 5/16 inch, size 10 is 1 6/16 inch, size 11 is 1 7/16 inch, size 12 is 1 1/2 inch, size 13 is 1 9/16 inch, and size 14 is 1 5/8 inch. Men&#39;s and women&#39;s rings are measured identically.</li>\r\n	<li>Round up to larger size if necessary</li>\r\n	<li>If the string method falls between two sizes, choose the larger size for the ring.</li>\r\n</ul>\r\n', 0, 'How to find your ring size | Blog | Vinita Michael', '', '', 0, 1, '2021-03-04 08:20:36', '2021-03-04 08:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(50) NOT NULL,
  `slug` tinytext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `category`, `is_active`, `display_order`, `slug`, `created_at`, `updated_at`) VALUES
(103, 'Vinita Michael', 1, 1, 'Vinita-Michael', '2021-02-27 06:21:22', '0000-00-00 00:00:00'),
(105, 'Personalized', 1, 0, 'Personalized', '2021-03-26 11:00:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `display_order` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `user_id`, `name`, `email`, `title`, `comment`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(4, 66, NULL, 'Muhammad Alfaiz', 'alfaizm19@gmail.com', 'Test', 'Best blog ever', 1, 2, '2021-02-18 10:38:34', '2021-02-18 06:54:58'),
(5, 66, NULL, 'Muhamamd Alfaiz', 'alfaizm19@gmail.com', 'Test', 'Hello World Test', 1, 1, '2021-02-18 10:37:42', '2021-02-18 06:54:58'),
(9, 90, NULL, 'Ram', 'ram@infoquestit.com', 'This is for QA & Testing purpose 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nibh nisi, commodo eget nulla et, faucibus commodo nibh. Vivamus vulputate nibh mattis, scelerisque lectus sed, ultrices massa. Maecenas vel tempor nisi. Nam id tempus mi, fringilla condimentum diam. Phasellus tincidunt ligula vel vulputate accumsan. Maecenas turpis metus, egestas sit amet massa eu, egestas blandit mi. Morbi quis vehicula lectus, sed porta orci. Duis molestie, orci quis consectetur suscipit, lectus dui vestibulum risus, ut tincidunt ex est at ligula. Morbi sodales luctus leo ut luctus. Morbi sit amet velit lacinia erat varius cursus et ut nisi. Morbi volutpat nisl eget mollis tincidunt. Praesent ex urna, euismod nec turpis sed, faucibus aliquet tellus. Morbi elementum fermentum nibh, sit amet mattis turpis maximus a. Etiam ut convallis lacus, vel egestas erat. Ut ipsum leo, sagittis in enim id, varius tempus felis. Duis ut lacus sed arcu vestibulum elementum. 1', 1, 0, '2021-03-20 00:52:25', '2021-03-20 09:56:36'),
(10, 90, NULL, 'ggdgdf', 'ram@infoquestit.com', 'dfgdf', 'dfgdf', 1, 0, '2021-03-20 00:52:55', '2021-03-20 09:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `blog_gallery`
--

CREATE TABLE `blog_gallery` (
  `blog_gallery_type_id` int(10) NOT NULL,
  `blog_gallery_type` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_gallery`
--

INSERT INTO `blog_gallery` (`blog_gallery_type_id`, `blog_gallery_type`) VALUES
(1, 'Image'),
(2, 'Embed Code'),
(3, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `blog_like`
--

CREATE TABLE `blog_like` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_like`
--

INSERT INTO `blog_like` (`id`, `blog_id`, `ip_address`, `created_date`) VALUES
(2, 53, '157.51.102.8', '2020-06-08 05:34:12'),
(5, 55, '157.51.102.8', '2020-06-08 05:52:46'),
(6, 54, '157.51.102.8', '2020-06-08 05:52:57'),
(7, 56, '157.51.97.252', '2020-06-08 06:32:20'),
(8, 55, '43.241.146.218', '2020-06-08 08:38:23'),
(9, 54, '43.241.146.218', '2020-06-08 08:39:31'),
(10, 54, '157.51.97.252', '2020-06-08 09:39:04'),
(11, 57, '157.51.102.8', '2020-06-09 01:43:13'),
(12, 57, '43.241.146.193', '2020-06-09 12:57:40'),
(18, 59, '157.51.206.127', '2020-06-10 12:25:21'),
(19, 59, '157.51.88.143', '2020-06-10 03:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `blog_media`
--

CREATE TABLE `blog_media` (
  `id` int(11) NOT NULL,
  `blog_media_type_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `video_link` text NOT NULL,
  `video_file` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` int(10) NOT NULL,
  `blog_id` int(10) NOT NULL,
  `cat_id` varchar(150) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `display_order` int(2) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `position_name`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(10, 'Developer', 0, 1, '2020-06-27 13:47:28', '0000-00-00 00:00:00'),
(11, 'Developer', 0, 1, '2020-06-27 16:28:48', '0000-00-00 00:00:00'),
(12, 'Developer', 0, 1, '2020-06-27 16:30:52', '0000-00-00 00:00:00'),
(13, 'Developer', 0, 1, '2020-06-27 16:33:08', '0000-00-00 00:00:00'),
(14, 'Developer', 0, 1, '2020-06-28 11:09:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `career_country`
--

CREATE TABLE `career_country` (
  `id` int(10) NOT NULL,
  `career_id` int(10) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `career_country`
--

INSERT INTO `career_country` (`id`, `career_id`, `country_name`) VALUES
(3, 1, 'UAE'),
(4, 2, 'UAE'),
(16, 3, 'UAE'),
(17, 3, 'Qatar'),
(18, 3, 'Oman'),
(19, 4, 'UAE'),
(20, 5, 'UAE'),
(21, 5, 'Qatar'),
(22, 5, 'Oman'),
(23, 6, 'UAE'),
(24, 7, 'UAE'),
(30, 8, 'UAE'),
(31, 8, 'Qatar'),
(32, 8, 'Oman'),
(33, 9, 'UAE'),
(34, 9, 'Qatar'),
(35, 9, 'Oman'),
(36, 10, 'UAE'),
(37, 10, 'Qatar'),
(38, 10, 'Oman'),
(39, 11, 'UAE'),
(40, 11, 'Qatar'),
(41, 11, 'Oman'),
(42, 12, 'UAE'),
(43, 13, 'UAE'),
(44, 14, 'UAE');

-- --------------------------------------------------------

--
-- Table structure for table `career_enquiry`
--

CREATE TABLE `career_enquiry` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `position_name` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `phoneormobile` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `questions` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `resume_path` varchar(500) NOT NULL,
  `ip_address` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `career_experience`
--

CREATE TABLE `career_experience` (
  `id` int(10) NOT NULL,
  `career_id` int(10) NOT NULL,
  `experience_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `career_experience`
--

INSERT INTO `career_experience` (`id`, `career_id`, `experience_id`) VALUES
(30, 9, 6),
(31, 10, 6),
(32, 11, 6),
(33, 12, 6),
(34, 13, 6),
(35, 14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `career_questions`
--

CREATE TABLE `career_questions` (
  `career_question_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `questions_id` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career_questions`
--

INSERT INTO `career_questions` (`career_question_id`, `career_id`, `questions_id`, `created_date`) VALUES
(2, 13, '4', '2020-06-27 14:33:08'),
(3, 13, '5', '2020-06-27 14:33:08'),
(4, 13, '3', '2020-06-27 14:33:08'),
(5, 13, '7', '2020-06-27 14:33:08'),
(6, 13, '9', '2020-06-27 14:33:08'),
(7, 14, '4', '2020-06-28 09:09:38'),
(8, 14, '5', '2020-06-28 09:09:38'),
(9, 14, '6', '2020-06-28 09:09:38'),
(10, 14, '1', '2020-06-28 09:09:38'),
(11, 14, '2', '2020-06-28 09:09:38'),
(12, 14, '7', '2020-06-28 09:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `temp_cart_id` varchar(510) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` varchar(512) DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `notify_time` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `id` int(11) NOT NULL,
  `catalogue` text NOT NULL,
  `catalogue_pdf` varchar(500) NOT NULL,
  `catalogue_image` varchar(500) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`id`, `catalogue`, `catalogue_pdf`, `catalogue_image`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(33, 'Company Catalogue', 'uploads/catalogue/pdf/QA.pdf', 'uploads/catalogue/image/layer 567.png', 1, 1, '2019-02-04 13:32:09', '2020-06-03 16:25:22'),
(34, 'Lorem ipsum dolor', 'uploads/catalogue/pdf/dummy_1.pdf', 'uploads/catalogue/image/layer 5671.png', 1, 5, '2019-02-04 13:32:50', '2020-06-07 05:06:38'),
(35, 'Lorem ipsum dolor', 'uploads/catalogue/pdf/UB_PROJECT_CATALOGUE_2018.pdf', 'uploads/catalogue/image/layer 5672.png', 1, 2, '2019-02-04 13:33:31', '2020-06-07 05:06:57'),
(36, 'Lorem ipsum dolor', 'uploads/catalogue/pdf/UB_EMIRATES_Catalogue.pdf', 'uploads/catalogue/image/layer 5677.png', 1, 3, '2019-02-04 13:34:12', '2020-06-07 05:08:37'),
(37, 'Lorem ipsum dolor', 'uploads/catalogue/pdf/dummy_5.pdf', 'uploads/catalogue/image/layer 678.png', 1, 6, '2019-02-04 13:34:55', '2020-06-07 05:09:28'),
(40, 'Lorem ipsum dolor', 'uploads/catalogue/pdf/UB_Brochure_4_page_mail.pdf', 'uploads/catalogue/image/layer 5678.png', 1, 4, '2019-03-27 11:01:21', '2020-06-07 05:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `heading` varchar(500) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `banner_image` varchar(500) NOT NULL,
  `banner_image_alt` varchar(500) DEFAULT NULL,
  `category_image` text DEFAULT NULL,
  `category_image_alt` varchar(500) DEFAULT NULL,
  `display_on_home` tinyint(1) NOT NULL,
  `template` enum('listing','custom') NOT NULL DEFAULT 'listing',
  `custom_template` text DEFAULT NULL,
  `display_order` int(50) NOT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_key_words` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `slug`, `parent`, `is_active`, `heading`, `content`, `banner_image`, `banner_image_alt`, `category_image`, `category_image_alt`, `display_on_home`, `template`, `custom_template`, `display_order`, `meta_title`, `meta_key_words`, `meta_description`, `created_at`, `updated_at`) VALUES
(10, 'Gold', 'gold', 0, 1, '999.9 Purest Gold Bar', 'We are offering you the unique goods because our product is the real treasure.It seems that our fanatic desire to have jewelry ...', 'uploads/category/gold-coin.png', '', 'uploads/category/image/gold-c1.png', '', 1, 'listing', '<h1 style=\"font-size:30px;\">hello</h1>\r\n', 1, 'Gold', '', '', '2021-04-24 10:03:38', '2021-04-26 06:22:02'),
(11, 'Silver', 'silver', 0, 1, '', '', 'uploads/category/silver-coins.png', '', 'uploads/category/image/silver-c2.png', '', 1, 'listing', '', 2, 'Silver', '', '', '2021-04-24 10:05:34', '2021-04-24 18:21:45'),
(12, 'Collectibles', 'collectibles', 0, 1, '', '', 'uploads/category/3510037-middle.png', '', 'uploads/category/image/collectives-c3.png', '', 1, 'listing', '', 3, 'Collectibles', '', '', '2021-04-24 10:06:45', '2021-04-24 18:22:11'),
(15, 'Gold Coin', 'gold-coin', 10, 1, '', '', 'uploads/category/gold-coin.png', '', 'uploads/category2/image/gold-coin-sub-category.png', '', 1, 'listing', '', 1, 'Gold Coin', '', '', '2021-04-24 10:20:55', '2021-04-24 18:35:51'),
(16, 'Gold Bar', 'gold-bar', 10, 1, '', '', 'uploads/category/gold-bar.png', '', 'uploads/category2/image/gold-bar.png', '', 1, 'listing', '', 2, 'Gold Bar', '', '', '2021-04-24 10:23:09', '2021-04-24 18:38:26'),
(17, 'Silver Coin', 'silver-coin', 11, 1, '', '', 'uploads/category/silver-coin.png', '', 'uploads/category2/image/silver-coin-1.png', '', 1, 'listing', '', 3, 'Silver Coin', '', '', '2021-04-24 10:24:02', '2021-04-24 18:39:04'),
(18, 'Silver Bar', 'silver-bar', 11, 1, '', '', 'uploads/category/silver-bar.png', '', 'uploads/category2/image/silver-bar-1.png', '', 1, 'listing', '', 4, 'Silver Bar', '', '', '2021-04-24 10:24:45', '2021-04-24 18:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `celeb_style`
--

CREATE TABLE `celeb_style` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `price_aed` double(10,2) NOT NULL,
  `price_usd` double(10,2) NOT NULL,
  `celeb_image` text NOT NULL,
  `product_image` text DEFAULT NULL,
  `crop_celeb_image` text DEFAULT NULL,
  `crop_product_image` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `background` enum('white','light_grey','peach') NOT NULL DEFAULT 'white',
  `is_active` int(1) NOT NULL,
  `display_order` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `celeb_style`
--

INSERT INTO `celeb_style` (`id`, `title`, `description`, `price_aed`, `price_usd`, `celeb_image`, `product_image`, `crop_celeb_image`, `crop_product_image`, `link`, `background`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(2, 'Diana Penty - Mystique ( Midnight Blue )', '<p>This statement ring is crafted in 925 Sterling silver with black rhodium and yellow gold plating. It is embellished with crystals from Swarovski.</p>\r\n\r\n<p>This statement ring is like an ethereal wilting petal wrapped around your finger. Crafted in 925 sterling silver with black rhodium and yellow gold plating. It is embellished with bedazzling crystals from Swarovski in midnight hues. Team them with co-ordinated earrings from the same collection.</p>\r\n', 481.00, 131.00, 'uploads/celeb-image/diana_penty_ mystique_1.jpg', 'uploads/celeb-image/product-image/diana_penty_2.jpg', NULL, NULL, 'https://www.vinitamichael.com/products/diana-penty-mystique-midnight-blue', 'white', 1, 3, '2021-02-18 02:53:59', '2021-03-28 21:50:19'),
(5, 'Priyanka Chopra - Felicity Ring', '<p>This ring is crafted in 925 Sterling Silver and plated with 18K Rose gold. Embellished with crystals from Swarovski, this piece adds an understated swirl of elegance to your look. This piece matches beautifully with our Felicity palm cuff to add a complete bold look infused with a touch of delicateness. Sported by the gorgeous Priyanka Chopra at a press event.</p>\r\n', 441.00, 120.00, 'uploads/celeb-image/priyanka1.jpg', 'uploads/celeb-image/product-image/priyanka_1.png', NULL, 'uploads/crop/product_image60642eb1d22f6.png', 'https://www.vinitamichael.com/products/priyanka-chopra-felicity-ring', 'light_grey', 1, 1, '2021-02-27 10:00:52', '2021-03-31 06:41:29'),
(6, 'Bhumi Pednekar - </br>Excelsior Earrings', '<p>Crowning the venetian lion in its form, these statement earrings are crafted in 925 sterling silver with black rhodium, yellow gold and white rhodium plating. Set with emeralds, zircons and crystals from Swarovski. Seen on the gorgeous Indian actress, Bhumi Pednekar.</p>\r\n', 639.00, 174.00, 'uploads/celeb-image/yrf_bhumipednekar_1.jpg', 'uploads/celeb-image/product-image/bhumipednekar_2.png', NULL, NULL, 'https://www.vinitamichael.com/products/bhumi-pednekar-excelsior-earrings', 'peach', 1, 2, '2021-02-27 10:04:02', '2021-03-28 21:50:45'),
(7, 'Diana Penty - Ethereal Beauty ( Midnight Blue )', '<p>These statement earrings are crafted in 925 Sterling Silver with black rhodium and yellow gold plating. They are embellished with bedazzling crystals from Swarovski.</p>\r\n\r\n<p>Inspired by the organic forms of a wilting petal, these statement ear studs are truly one of a kind. They are crafted in sterling silver with black rhodium plating and yellow gold plating, embellished with bedazzling crystals from Swarovski in midnight hues. Dress them up with co ordinated ring from the same collection.</p>\r\n', 580.00, 158.00, 'uploads/celeb-image/diana_penty_ethereal_1.jpg', 'uploads/celeb-image/product-image/diana_penty_ethereal_2.png', NULL, NULL, 'https://www.vinitamichael.com/products/diana-penty-ethereal-beauty-midnight-blue', 'light_grey', 1, 4, '2021-03-03 12:26:25', '2021-03-28 21:50:58'),
(8, 'Divya Khosla - Ethereal beauty ( Tropical pink )', '<p>Inspired by the organic forms of a wilting petal, these statement ear studs are truly one of a kind.</p>\r\n\r\n<p>They are crafted in 925 sterling silver with black rhodium plating and yellow gold plating, and embellished with bedazzling crystals from Swarovski in crimson hues. Dress them up with co ordinated ring from the same collection.</p>\r\n', 580.00, 158.00, 'uploads/celeb-image/divya_khosla_ethereal_beauty_earrings_1 (2).jpg', 'uploads/celeb-image/product-image/divya_khosla_ethereal_beauty_earrings_2.png', NULL, NULL, 'https://www.vinitamichael.com/products/divya-khosla-ethereal-beauty-tropical-pink', 'peach', 1, 5, '2021-03-03 12:28:59', '2021-03-28 21:51:09'),
(9, 'Divya Khosla - Mystique ( Tropical Pink )', '<p>This statement ring is crafted in 925 Sterling silver with black rhodium and yellow gold plating. It is embellished with crystals from Swarovski.</p>\r\n\r\n<p>The ring is like an ethereal wilting petal wrapped around your finger. Crafted in 925 sterling silver with black rhodium and yellow gold plating, it is embellished with bedazzling crystals from Swarovski in crimson hues. Team them with co-ordinated earrings from the same collection.</p>\r\n', 481.00, 131.00, 'uploads/celeb-image/divya_khosla_mystique_ring_2.jpg', 'uploads/celeb-image/product-image/divya_khosla_mystique_ring_3.png', NULL, NULL, 'https://www.vinitamichael.com/products/divya-khosla-mystique-tropical-pink', 'light_grey', 1, 6, '2021-03-03 12:30:55', '2021-03-28 21:51:23'),
(10, 'Double Crescent in Silver', '<p>This ring is crafted in 925 Sterling silver and set with crystals from Swarovski. This double crescent ring set with crescent cut crystal from Swarovski is the ultimate accessory to liven up your festive outfit.</p>\r\n', 547.00, 149.00, 'uploads/celeb-image/double-crescent-in-silver-1.jpg', 'uploads/celeb-image/product-image/double-crescent-in-silver-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/double-crescent-in-silver', 'peach', 1, 7, '2021-03-03 12:37:41', '2021-03-28 21:51:37'),
(11, 'Kangana Ranaut – Solo Ring', '<p>This ring is crafted in 925 Sterling Silver and plated with 18K Rose gold and 18K Yellow gold. Extremely modern and edgy in its visual appeal, it is the ultimate statement ring. Was recently sported by Kangana Ranaut and was also seen on Alia Bhatt in the June 16 Hello Magazine cover story.This ring is crafted in 925 Sterling Silver and plated with 18K Rose gold and 18K Yellow gold. Extremely modern and edgy in its visual appeal, it is the ultimate statement ring. Was recently sported by Kangana Ranaut and was also seen on Alia Bhatt in the June 16 Hello Magazine cover story.</p>\r\n', 551.00, 150.00, 'uploads/celeb-image/kangana-ranaut-1.jpg', 'uploads/celeb-image/product-image/kangana-ranaut-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/kangana-ranaut-solo-ring', 'light_grey', 1, 8, '2021-03-03 12:42:26', '2021-03-28 21:51:49'),
(12, 'Deepika Padukone – ‘My golden Maiko’ briolette earrings', '<p>This pair of earrings is crafted in 925 Sterling Silver and plated with 18K Yellow gold and 18K Rose gold. Embellished with crystals from Swarovski, these earrings add a touch of glamour to any look! Sported by the gorgeous Deepika Padukone.</p>\r\n', 826.00, 225.00, 'uploads/celeb-image/deepika_1.jpg', 'uploads/celeb-image/product-image/deepika_2.png', NULL, NULL, 'https://www.vinitamichael.com/products/deepika-padukone-my-golden-maiko-briolette-earrings', 'white', 1, 9, '2021-03-03 12:54:49', '2021-03-28 21:52:49'),
(13, 'Kriti Sanon – Starry night concave ring', '<p>This ring is crafted in 925 Sterling Silver and plated with 18K Rose gold. It is embellished with crystals from Swarovski. Statement crystallized starry sparkling concave ring. You can now have a starry night wrapped around your finger. Was recently sported by Kriti Sanon in her Dabboo Ratnani Calendar 2016 shot.</p>\r\n', 430.00, 117.00, 'uploads/celeb-image/kriti-1.jpg', 'uploads/celeb-image/product-image/kriti-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/kriti-sanon-starry-night-concave-ring', 'light_grey', 1, 10, '2021-03-03 12:58:07', '2021-03-28 21:53:07'),
(14, 'Yami Gautam – First ray of the winter sun earrings', '<p>These earrings are crafted in 925 Sterling Silver with 18K Yellow gold plating. The piece is embellished with crystals from Swarovski. Minimalist crystallized earrings with crystal drop at the end. Add a dash of easy elegance with these stunning slip-ons. Was sported by Kriti Sanon as she looks fabulous in her Dabboo Ratnani Calendar &nbsp;shot and also by the beautiful Yami Gautam.</p>\r\n', 441.00, 120.00, 'uploads/celeb-image/yamini-1.jpg', 'uploads/celeb-image/product-image/yamini-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/yami-gautam-first-ray-of-the-winter-sun-earrings', 'white', 1, 11, '2021-03-03 13:01:42', '2021-03-28 21:53:23'),
(15, 'Tabu – Cherry blossom earrings', '<p>This pair of earrings is crafted in 925 Sterling Silver and plated with 18K Yellow gold and Rose gold. It is embellished with crystals from Swarovski. Accessorized by the elegant Tabu.</p>\r\n', 643.00, 175.00, 'uploads/celeb-image/tabu.jpg', 'uploads/celeb-image/product-image/tabu-1.png', NULL, NULL, 'https://www.vinitamichael.com/products/tabu-cherry-blossom-earrings', 'light_grey', 1, 12, '2021-03-03 13:09:19', '2021-03-28 21:53:38'),
(16, 'Neha Dupia – Radiant earrings', '<p>This pair of earrings is crafted in 925 Sterling Silver and plated with 18K Yellow gold and 18K Rose gold. It is embellished with crystals from Swarovski. Statement circular delightful crystallized earrings with a modern touch. Sported by the gorgeous Neha Dupia.</p>\r\n', 757.00, 206.00, 'uploads/celeb-image/neha-1.jpg', 'uploads/celeb-image/product-image/neha-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/neha-dupia-radiant-earrings', 'white', 1, 13, '2021-03-03 13:11:42', '2021-03-28 21:54:15'),
(17, 'Parineeti Chopra - Ribbon Wrap', '<p>This statement ring is crafted in 925 Sterling silver and plated with 18K yellow gold. Inspired by the gentle fluid movements of ribbons, it is like having a silk ribbon carelessly wrapped around your finger. The tall ring is composed of three individual rings linked with chains at the back, which make the piece striking and comfortable to wear.</p>\r\n\r\n<p>The ring was sported by the ever gorgeous Malaika Arora Khan and Parineeti Chopra at a recent event</p>\r\n', 547.00, 149.00, 'uploads/celeb-image/parineeti-1.jpg', 'uploads/celeb-image/product-image/parineeti-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/parineeti-chopra-ribbon-wrap', 'light_grey', 1, 14, '2021-03-03 13:14:53', '2021-03-28 21:54:25'),
(18, 'Madhuri Dixit – Sundrop toggle clasp earrings', '<p>These earrings are crafted in 925 Sterling silver with yellow gold plating. The earrings are embellished with crystals from Swarovski.<br />\r\nThe earrings were recently spotted on the ever gorgeous Madhuri Dixit.</p>\r\n\r\n<p>Size Specifications: 7 cms top to tip.</p>\r\n', 536.00, 146.00, 'uploads/celeb-image/madhuri-1.jpg', 'uploads/celeb-image/product-image/madhuri-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/madhuri-dixit-sundrop-toggle-clasp-earrings', 'white', 1, 15, '2021-03-03 13:21:15', '2021-03-28 21:54:37'),
(19, 'Lisa Haydon – Toggle clasp necklace', '<p>This necklace is crafted in 925 Sterling Silver with 18K Yellow gold and 18K Rose gold plating. The piece is embellished with crystals from Swarovski. Sported by Lisa Haydon in the March 2015 issue of Elle magazine.</p>\r\n', 386.00, 105.00, 'uploads/celeb-image/lisa.jpg', 'uploads/celeb-image/product-image/lisa-1.png', NULL, NULL, 'https://www.vinitamichael.com/products/lisa-haydon-toggle-clasp-necklace', 'light_grey', 1, 16, '2021-03-03 13:34:20', '2021-03-28 21:54:52'),
(20, 'SapnaPabbi – Promise of spring (cherry red) earrings', '<p>This pair of earrings is crafted in 925 Sterling Silver and plated with 18K Yellow gold and 18K Rose gold. They are embellished with crystals from Swarovski. One off and chic, these earrings are sure to add dollops to any ensemble. Sported by British actress and model, Sapna Pabbi at the lakme fashion week as she cleverly styled it as an ear cuff.</p>\r\n', 551.00, 150.00, 'uploads/celeb-image/sapna-1.jpg', 'uploads/celeb-image/product-image/sapna-3.png', NULL, NULL, 'https://www.vinitamichael.com/products/sapnapabbi-promise-of-spring-cherry-red-earrings', 'white', 1, 17, '2021-03-03 13:39:09', '2021-03-28 21:55:09'),
(21, 'Jacqueline Fernandes – Felicity palm cuff', '<p>This palm cuff is crafted in 925 Sterling silver and plated with 18K Yellow gold and 18K Rose gold. Embellished with crystals from Swarovski. Add volumes to any ensemble with this unique accessory. Sported on the super adorable Jacqueline Fernandes.</p>\r\n', 643.00, 175.00, 'uploads/celeb-image/jack-1.jpg', 'uploads/celeb-image/product-image/jack-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/jacqueline-fernandes-felicity-palm-cuff', 'light_grey', 1, 18, '2021-03-03 13:48:36', '2021-03-28 21:55:27'),
(22, 'Lisa Haydon - African masks Tassel earrings', '<p>These striking and elegant tassel earrings are crafted in Sterling silver and plated with 18K Yellow Gold and 18K Rose gold. A Swarovski briolette dangles at the bottom adding to the beauty of the piece. Sported by Lisa Haydon on the cover of the June 2015 issue of Maxim magazine.</p>\r\n', 753.00, 205.00, 'uploads/celeb-image/lisa-haydon-1.jpg', 'uploads/celeb-image/product-image/lisa-haydon-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/lisa-haydon-african-masks-tassel-earrings', 'white', 1, 19, '2021-03-03 13:52:25', '2021-03-28 22:00:14'),
(23, 'Malaika Arora – ‘Song of the geisha’ brooch', '<p>This brooch cum pendant is crafted in 925 Sterling Silver and plated with 18K Rose gold. It is embellished with crystals from Swarovski. This unique geisha face statement brooch is sure to add dollops to your ensemble ! Sported on the ever stylish Malaika Arora.</p>\r\n', 679.00, 185.00, 'uploads/celeb-image/malaika-1.jpg', 'uploads/celeb-image/product-image/malaika-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/malaika-arora-song-of-the-geisha-brooch', 'light_grey', 1, 20, '2021-03-03 13:56:11', '2021-03-28 21:59:56'),
(24, 'Priyanka Chopra – ‘Reflections of the setting sun’', '<p>This classic yet striking pair of Ear Studs is crafted in 92.5 Sterling Silver and plated with Black rhodium and 18K Yellow Gold. Sported by Priyanka Chopra at the 21st lions award red carpet.</p>\r\n', 650.00, 177.00, 'uploads/celeb-image/priyanka-2.jpg', 'uploads/celeb-image/product-image/priyanka-3.png', NULL, NULL, '', 'white', 1, 21, '2021-03-03 14:03:59', '2021-03-28 22:01:11'),
(25, 'Sonakshi Sinha – Better halves earrings', '<p>This lovely pair of earrings in 18K Gold plated Sterling Silver is as unique as it is versatile. Embellished with Repousse&#39; and cut-work, it is extremely light weight and at the same time, dresses up any outfit.The design was sported by Actress Sonakshi Sinha, at one of her movie promotions.</p>\r\n', 477.00, 130.00, 'uploads/celeb-image/sonak-1.jpg', 'uploads/celeb-image/product-image/sonak-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/sonakshi-sinha-better-halves-earrings', 'light_grey', 1, 22, '2021-03-03 14:06:45', '2021-03-28 21:58:10'),
(26, 'Esha Gupta – Night sky’ earrings', '<p>This pair of earrings is crafted in 925 Sterling Silver and plated with 18K Rose gold and 18K Yellow Gold. It is embellished with crystals from Swarovski. These simple yet exquisite night sky earrings are extremely versatile and can liven up any outfit.</p>\r\n', 657.00, 179.00, 'uploads/celeb-image/esha-1.jpg', 'uploads/celeb-image/product-image/esha-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/esha-gupta-night-sky-earrings', 'white', 1, 23, '2021-03-03 14:16:32', '2021-03-28 21:57:57'),
(27, 'Kriti Sanon – First ray of the winter sun earrings', '<p>These earrings are crafted in 925 Sterling Silver with 18K Yellow gold plating. The piece is embellished with crystals from Swarovski. Minimalist crystallized earrings with crystal drop at the end. Add a dash of easy elegance with these stunning slip-ons. Was sported by Kriti Sanon as she looks fabulous in her Dabboo Ratnani Calendar 2016 shot and also by the beautiful Yami Gautam.</p>\r\n', 441.00, 120.00, 'uploads/celeb-image/kriti-3.jpg', 'uploads/celeb-image/product-image/kriti-4.png', NULL, NULL, 'https://www.vinitamichael.com/products/kriti-sanon-first-ray-of-the-winter-sun-earrings', 'light_grey', 1, 24, '2021-03-03 14:32:47', '2021-03-28 21:57:44'),
(28, ' Pernia Qureshi – The winter’s song earrings', '<p>This pair of earrings is crafted in 925 Sterling Silver and plated with 18K Rose gold and 18K Yellow Gold. It is embellished with crystals from Swarovski. These bedazzling and statement long earrings are sure to liven up any outfit. The earrings were recently sported by the ever stylish Pernia Qureshi.</p>\r\n', 830.00, 226.00, 'uploads/celeb-image/pernia-1.jpg', 'uploads/celeb-image/product-image/pernia-2.png', NULL, NULL, 'https://www.vinitamichael.com/products/pernia-qureshi-the-winters-song-earrings', 'white', 1, 25, '2021-03-03 14:36:28', '2021-03-28 21:57:32'),
(29, 'Sonakshi Sinha – ‘Blossom’ pearl ear hoops in deep purple', '<p>This pair of ear hoops is crafted in 925 Sterling silver and plated with 18K Rose gold. It is embellished with crystals from Swarovski. We always need at least one pair of hoops! Chic and fun, these ear hoops will add effortless style to a casual attire. Sported by Sonakshi Sinha as she accessorizes her smart casual look.</p>\r\n', 496.00, 135.00, 'uploads/celeb-image/sonak-3.jpg', 'uploads/celeb-image/product-image/sonak-4.png', NULL, NULL, 'https://www.vinitamichael.com/products/sonakshi-sinha-blossom-pearl-ear-hoops-in-deep-purple', 'light_grey', 1, 26, '2021-03-03 17:05:13', '2021-03-28 21:57:19'),
(30, 'Jacqueline Fernandez - Night sky’ earrings', '<p>This pair of earrings is crafted in 925 Sterling Silver and plated with 18K Rose gold and 18K Yellow Gold. It is embellished with crystals from Swarovski. These simple yet exquisite night sky earrings are extremely versatile and can liven up any outfit. The earrings were sported Jacqueline Fernandez in the Elle Jan&#39;16 cover story.</p>\r\n', 657.00, 179.00, 'uploads/celeb-image/jack-3.jpg', 'uploads/celeb-image/product-image/jack-4.png', NULL, NULL, 'https://www.vinitamichael.com/products/jacqueline-fernandez-night-sky-earrings', 'white', 1, 27, '2021-03-03 17:08:30', '2021-03-28 21:57:08'),
(31, 'Lisa Haydon - River by the Okiya\' body chain', '<p>This Body chain is crafted in 925 Sterling Silver and plated with 18K Yellow gold and 18K Rose gold. It is embellished with crystals from Swarovski. Add an understated glam quotient with this body chain! Sported by Lisa Haydon on the cover of June&#39;15 issue of Femina.</p>\r\n', 735.00, 200.00, 'uploads/celeb-image/lisa-2.jpg', 'uploads/celeb-image/product-image/lisa-4.png', NULL, NULL, 'https://www.vinitamichael.com/products/lisa-haydon-river-by-the-okiya-body-chain', 'light_grey', 1, 28, '2021-03-03 17:11:59', '2021-03-28 21:56:24'),
(32, 'Malaika Arora - \'African masks\' double finger ring', '<p>This fun double finger ring is inspired by the Tribal African masks. The piece is handcrafted in 92.5 Sterling Silver and plated with 18K Yellow gold and 18K Rose gold. Sported by Malaika Arora looking her flawless best at the Lakme Fashion Weak.</p>\r\n', 403.98, 110.00, 'uploads/celeb-image/malaika-3.jpg', 'uploads/celeb-image/product-image/malaika-4.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/malaika-arora-african-masks-double-finger-ring', 'white', 1, 29, '2021-03-03 17:14:25', '2021-03-12 06:40:18'),
(33, 'Priyanka Chopra - Felicity Ring', '<p>This ring is crafted in 925 Sterling Silver and plated with 18K Rose gold. Embellished with crystals from Swarovski, this piece adds an understated swirl of elegance to your look. This piece matches beautifully with our Felicity palm cuff to add a complete bold look infused with a touch of delicateness. Sported by the gorgeous Priyanka Chopra at a press event.</p>\r\n', 440.70, 120.00, 'uploads/celeb-image/priyanka4.jpg', 'uploads/celeb-image/product-image/priyanka_2.png', NULL, 'uploads/crop/product_image6064301c26485.png', 'http://www.emiratesdirectory.com/vi/products/priyanka-chopra-felicity-ring', 'light_grey', 1, 30, '2021-03-03 17:19:10', '2021-03-31 06:47:32'),
(34, 'Sonam Kapoor - Cherry blossom ring', '<p>This ring is crafted in 925 Sterling Silver and plated with 18K Rose gold. Embellished with crystals from Swarovski , A statement ring to add a unique element to your look! Sported by Sonam Kapoor as she pulls off an easy breezy look.</p>\r\n', 525.17, 143.00, 'uploads/celeb-image/sonam-1.jpg', 'uploads/celeb-image/product-image/sonam-2.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/sonam-kapoor-cherry-blossom-ring', 'white', 1, 31, '2021-03-03 17:20:40', '2021-03-12 06:43:37'),
(35, 'Jacquelin Fernandes - Sombre mini ring', '<p>This ring is crafted in 925 Sterling Silver and plated with 18K Yellow gold. Embellished with crystal pearl from Swarovski, this ring adds an easy flair of grace and femininity to your overall look. Complete the look with our Sombre mini ring. The beautiful Jacqueline Fernandez finishes off her oriental inspired look with our Sombre ring and mini ring.</p>\r\n', 257.08, 70.00, 'uploads/celeb-image/jack-5.jpg', 'uploads/celeb-image/product-image/jack-6.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/jacquelin-fernandes-sombre-mini-ring', 'light_grey', 1, 32, '2021-03-03 17:23:37', '2021-03-12 06:45:22'),
(36, 'Malaika Arora – ‘Ribbon Wrap’ ring', '<p>This statement ring is crafted in 925 Sterling silver and plated with 18K yellow gold. Inspired by the gentle fluid movements of ribbons, it is like having a silk ribbon carelessly wrapped around your finger. The tall ring is composed of three individual rings linked with chains at the back, which make the piece striking and comfortable to wear.</p>\r\n\r\n<p>The ring was sported by the ever gorgeous Malaika Arora Khan and Parineeti Chopra at a recent event.</p>\r\n', 547.20, 149.00, 'uploads/celeb-image/malaika-5.jpg', 'uploads/celeb-image/product-image/malaika-6.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/malaika-arora-ribbon-wrap-ring', 'white', 1, 33, '2021-03-03 17:26:28', '2021-03-12 07:09:20'),
(37, 'Pernia Qureshi -‘Spring is here’ slim danglers', '<p>These earrings are crafted in 925 Sterling Silver with 18K Yellow gold and 18K Rose gold plating. The piece is embellished with crystals from Swarovski. One off and classy earrings to add the finishing touch to your ensemble. Pernia Qureshi looks as fresh as a flower in our &#39;Spring is here&#39; slim danglers.</p>\r\n', 826.31, 225.00, 'uploads/celeb-image/pernia-3.jpg', 'uploads/celeb-image/product-image/pernia-4.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/pernia-qureshi-spring-is-here-slim-danglers', 'light_grey', 1, 34, '2021-03-03 17:30:09', '2021-03-12 07:10:22'),
(38, 'Sonakshi Sinha - \'Geisha\'s mystery\' stiffneck pearl-drop earrings', '<p>These earrings are crafted in 925 Sterling Silver with 18K Yellow gold and Rose gold plating. The piece is embellished with crystals from Swarovski to emanate an elegant and dressy feel. A unique pair of earrings to add to the oomph factor of your ensemble ! Sported by Sonakshi Sinha as she looks like a dream.</p>\r\n', 679.41, 185.00, 'uploads/celeb-image/sonak-5.jpg', 'uploads/celeb-image/product-image/sonak-6.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/sonakshi-sinha-geishas-mystery-stiffneck-pearl-drop-earrings', 'white', 1, 35, '2021-03-03 17:33:51', '2021-03-12 07:11:57'),
(39, 'Jacquelin Fernandes – Sombre ring', '<p>This ring is crafted in 925 Sterling Silver and plated with 18K Yellow gold. Embellished with crystal pearl from Swarovski, this ring adds an easy flair of grace and femininity to your overall look. Complete the look with our Sombre mini ring. The beautiful Jacqueline Fernandez finishes off her oriental inspired look with our Sombre ring and mini ring. Size Specifications: US 6 (Adjustable)</p>\r\n', 367.25, 100.00, 'uploads/celeb-image/jack-7.jpg', 'uploads/celeb-image/product-image/jack-8.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/jacquelin-fernandes-sombre-ring', 'light_grey', 1, 36, '2021-03-03 17:59:06', '2021-03-12 07:30:15'),
(40, 'Alia Bhatt - Solo ring', '<p>This ring is crafted in 925 Sterling Silver and plated with 18K Rose gold and 18K Yellow gold. Extremely modern and edgy in its visual appeal, it is the ultimate statement ring. Was recently sported by Kangana Ranaut and was also seen on Alia Bhatt in the June 16 Hello Magazine cover story.This ring is crafted in 925 Sterling Silver and plated with 18K Rose gold and 18K Yellow gold. Extremely modern and edgy in its visual appeal, it is the ultimate statement ring. Was recently sported by Kangana Ranaut and was also seen on Alia Bhatt in the June 16 Hello Magazine cover story.</p>\r\n', 550.88, 150.00, 'uploads/celeb-image/alia-1.jpg', 'uploads/celeb-image/product-image/alia-2.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/alia-bhatt-solo-ring', 'white', 1, 37, '2021-03-03 18:01:40', '2021-03-12 07:30:52'),
(41, 'Arise in black enamel ring', '<p>Statement two finger ring crafted in 925 sterling silver with gold plating. Fine black enamel adds to the timeless charm of the piece. The ring is set with facetted trilliant crystals from Swarovski.</p>\r\n', 550.88, 150.00, 'uploads/celeb-image/arise-1.jpg', 'uploads/celeb-image/product-image/arise-2.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/arise-in-black-enamel-ring', 'light_grey', 1, 38, '2021-03-03 18:05:49', '2021-03-12 07:31:36'),
(42, 'Huma - Regal gold falcon necklace', '<p>This necklace is crafted in 925 Sterling silver with yellow gold plating. It is embellished with crystals from Swarovski.</p>\r\n', 451.72, 123.00, 'uploads/celeb-image/arise-3.jpg', 'uploads/celeb-image/product-image/arise-5.jpg', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/huma-regal-gold-falcon-necklace', 'white', 1, 39, '2021-03-03 18:08:08', '2021-03-12 07:32:26'),
(43, 'Sonakshi Sinha - Dream of Venice (Blue)', '<p>Inspired by the intricate craftsmanship and structure of the venetian columns, these earrings are crafted in 925 sterling silver with yellow gold plating and black rhodium plating. They are set with zircons and crystals from Swarovski</p>\r\n', 631.67, 172.00, 'uploads/celeb-image/sonak-7.jpg', 'uploads/celeb-image/product-image/sonak-8.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/sonakshi-sinha-dream-of-venice-blue', 'light_grey', 1, 40, '2021-03-03 18:10:40', '2021-03-12 07:33:03'),
(44, 'Kareena Kapoor - Regal gold falcon necklace', '<p>This necklace is crafted in 925 Sterling silver with yellow gold plating. It is embellished with crystals from Swarovski.</p>\r\n', 451.72, 123.00, 'uploads/celeb-image/kareena.jpg', 'uploads/celeb-image/product-image/arise-6.jpg', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/kareena-kapoor-regal-gold-falcon-necklace', 'white', 1, 41, '2021-03-03 18:12:54', '2021-03-12 07:33:44'),
(45, 'Shraddha Kapoor - Glide rose falcon ring', '<p>This ring is crafted in 925 Sterling silver with rose gold plating. It is embellished with crystals from Swarovski.</p>\r\n', 422.34, 115.00, 'uploads/celeb-image/shraddha-1.jpg', 'uploads/celeb-image/product-image/shraddha-2.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/shraddha-kapoor-glide-rose-falcon-ring', 'light_grey', 1, 42, '2021-03-03 18:15:40', '2021-03-12 07:34:23'),
(46, 'Kajol - Sheen silver falcon earrings', '<p>These fabulous falcon earrings are an absolute winner. Slipping easily from casual to formal, they will add an elegant charm to your ensemble. Crafted in 925 sterling silver, they are set with clear crystals from Swarovski.</p>\r\n', 580.26, 158.00, 'uploads/celeb-image/kajol.jpg', 'uploads/celeb-image/product-image/kajol-2.png', NULL, NULL, '', 'white', 1, 43, '2021-03-03 18:18:55', NULL),
(47, 'Bhumi Pednekar - Excelsior Earrings', '<p>Crowning the venetian lion in its form, these statement earrings are crafted in 925 sterling silver with black rhodium, yellow gold and white rhodium plating. Set with emeralds, zircons and crystals from Swarovski. Seen on the gorgeous Indian actress, Bhumi Pednekar.</p>\r\n', 639.02, 174.00, 'uploads/celeb-image/yrf_bhumipednekar_2.jpg', 'uploads/celeb-image/product-image/bhumipednekar_3.png', NULL, NULL, 'http://www.emiratesdirectory.com/vi/products/bhumi-pednekar-excelsior-earrings', 'light_grey', 1, 44, '2021-03-03 18:20:57', '2021-03-12 03:56:07'),
(48, 'Bhumi Pednekar - Herald Ring', '<p>Celebrating the venetian lion, this two finger ring is crafted in 925 sterling silver with black rhodium, white rhodium, yellow gold and rose gold plating.</p>\r\n', 429.68, 117.00, 'uploads/celeb-image/bhumi-1.jpg', 'uploads/celeb-image/product-image/bhumi-2.png', NULL, NULL, '', 'white', 1, 45, '2021-03-03 18:23:01', NULL),
(49, 'Tamannaah - Mellow drop : ear hoops', '<p>These ear hoops are crafted in 925 Sterling silver with yellow gold plating. The earrings are embellished with crystals from Swarovski.</p>\r\n', 495.79, 135.00, 'uploads/celeb-image/tamannah-1.jpg', 'uploads/celeb-image/product-image/tamannah-2.png', NULL, NULL, '', 'light_grey', 1, 46, '2021-03-03 18:26:02', NULL),
(50, 'Parineeti Chopra - Aglow : Three finger ring', '<p>This ring is crafted in 925 Sterling silver and set with crystals from Swarovski. Add a hint of sparkle with this striking yet elegant three finger ring. Size Specifications: US 6 ( adjustable )</p>\r\n\r\n<p>Seen on the celebrated Indian actress, Parineeti Chopra.</p>\r\n', 499.46, 136.00, 'uploads/celeb-image/parineeti-3.jpg', 'uploads/celeb-image/product-image/parineeti-4.jpg', NULL, NULL, '', 'white', 1, 47, '2021-03-03 18:28:35', NULL),
(51, 'Pooja Hegde - Adorn two finger ring', '<p>This unique two finger ring is crafted in 925 Sterling silver with yellow gold plating. The ring is embellished with crystals from Swarovski</p>\r\n', 533.00, 145.00, 'uploads/celeb-image/pooja-1.jpg', 'uploads/celeb-image/product-image/pooja-2.png', NULL, NULL, '', 'light_grey', 1, 48, '2021-03-03 18:30:44', '2021-03-28 17:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

CREATE TABLE `certification` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(2) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`id`, `name`, `image`, `is_active`, `display_order`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(29, 'test', 'uploads/certificate/1602138862586_ms shopping store1  copy.png', 1, 0, '<p><img alt=\"\" src=\"http://localhost/dhofar_global/uploads/content/1602138862586_ms shopping store1  copy.png\" style=\"width: 1834px; height: 1303px;\" /></p>\r\n', '2020-12-15 17:21:03', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `external_link` varchar(4000) NOT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `external_link`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(21, 'Government of Dubai', 'uploads/clients/client_1.png', '', 1, 1, '2020-06-08 14:24:16', '0000-00-00 00:00:00'),
(22, 'Etisalat', 'uploads/clients/client_2.png', '', 2, 1, '2020-06-08 14:30:28', '0000-00-00 00:00:00'),
(23, 'Qatar Airways', 'uploads/clients/client_3.png', '', 3, 1, '2020-06-08 14:35:10', '0000-00-00 00:00:00'),
(24, 'BMW', 'uploads/clients/client_4.png', '', 4, 1, '2020-06-08 14:36:54', '0000-00-00 00:00:00'),
(25, 'Benz', 'uploads/clients/client_5.png', '', 5, 1, '2020-06-08 14:38:56', '0000-00-00 00:00:00'),
(26, 'Dewa', 'uploads/clients/client_6.png', '', 6, 1, '2020-06-08 14:42:17', '0000-00-00 00:00:00'),
(27, 'Audi', 'uploads/clients/client_7.png', '', 7, 1, '2020-06-08 14:44:59', '0000-00-00 00:00:00'),
(28, 'Honda', 'uploads/clients/client_8.png', '', 8, 1, '2020-06-08 14:46:37', '0000-00-00 00:00:00'),
(29, 'Nissan', 'uploads/clients/client_9.png', '', 9, 1, '2020-06-08 15:01:47', '0000-00-00 00:00:00'),
(30, 'Pizza Hut', 'uploads/clients/client_10.png', '', 0, 1, '2020-06-08 15:04:24', '0000-00-00 00:00:00'),
(31, 'Al Futtaim', 'uploads/clients/client_11.png', '', 11, 1, '2020-06-08 15:09:32', '0000-00-00 00:00:00'),
(32, 'Emaar', 'uploads/clients/client_12.png', '', 12, 1, '2020-06-08 15:14:08', '0000-00-00 00:00:00'),
(33, 'Sharjah International Airport', 'uploads/clients/client_13.png', '', 13, 1, '2020-06-08 15:18:35', '0000-00-00 00:00:00'),
(34, 'GMC Hospital', 'uploads/clients/client_14.png', '', 14, 1, '2020-06-08 15:21:09', '0000-00-00 00:00:00'),
(35, 'American Hospital', 'uploads/clients/client_15.jpg', '', 15, 1, '2020-06-08 15:23:28', '0000-00-00 00:00:00'),
(36, 'Porsche', 'uploads/clients/client_16.png', '', 16, 1, '2020-06-08 15:29:39', '0000-00-00 00:00:00'),
(37, 'Rolls Royce', 'uploads/clients/client_17.png', '', 17, 1, '2020-06-08 15:32:37', '0000-00-00 00:00:00'),
(38, 'Toyota', 'uploads/clients/client_18.png', '', 18, 1, '2020-06-08 15:35:29', '0000-00-00 00:00:00'),
(39, 'DU', 'uploads/clients/client_19.png', '', 19, 1, '2020-06-08 15:39:02', '0000-00-00 00:00:00'),
(40, 'Burjeel', 'uploads/clients/client_20.png', '', 20, 1, '2020-06-08 15:41:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `collaboration`
--

CREATE TABLE `collaboration` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `banner` text NOT NULL,
  `crop_banner` text DEFAULT NULL,
  `video_background_image` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `display_order` int(2) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collaboration`
--

INSERT INTO `collaboration` (`id`, `title`, `slug`, `description`, `banner`, `crop_banner`, `video_background_image`, `video`, `meta_title`, `meta_keyword`, `meta_description`, `is_active`, `display_order`, `updated_at`, `created_at`) VALUES
(4, 'Swarovski', 'swarovski', '<section>\r\n<p>Sparkling Couture is a Swarovski exhibition showcasing &ldquo;one of a kind&rdquo; pieces in collaboration with their selected Ingredient Partners from across the globe, each selected for their excellence in innovation and design.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A bejeweled &#39;falcon clutch&#39; that deconstructs into jewelry pieces was designed and crafted for the event. The clutch opens up to reveal a statement falcon ring, a cuff, a pair of oversized earrings and a necklace with tassel detail.</p>\r\n</section>\r\n', 'uploads/collaboration/swarovski-11.jpg', NULL, 'uploads/collaboration/background/swarovski-12.png', '<iframe width=\"100%\" height=\"464\" src=\"https://www.youtube.com/embed/qocxjXrRhZA\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Swarovski', '', '', 1, 1, '2021-03-04 03:42:14', '2021-02-23 06:46:06'),
(5, 'TRESemme Arabia', 'tresemme-arabia', '<p>For the first time in the region, TRESemm&eacute; Arabia is creating an exclusive headpiece in collaboration with award winning jewelry designer and gemologist Vinita Michael.Vinita Michael has been designing jewelry for many years and specializes in both fine gold set with precious gems and sterling silver jewelry. Her pieces have been seen on many Bollywood celebrities such as Priyanka Chopra, Sonam Kapoor, Deepika Padukone and Jacqueline Fernandez. The Asian-inspired headpiece designed exclusively for TRESemm&eacute; is heavily influenced by Vinita&rsquo;s own experience. &ldquo;I was trained in Bharatnatyam and some of my most memorable moments as a dancer are of the stage performances where we would adorn the beautiful costumes and the exquisite temple jewelry,&rdquo; she says. &ldquo;The piece in particular is inspired by the three important hair jewels worn by a bharatnatyam dancer during her act: the moon (chandran), the sun (suryan) and the central hairpiece netti chutti) which emphasizes the forehead and hair parting.&rdquo;</p>\r\n', 'uploads/collaboration/tresemme-2.jpg', NULL, 'uploads/collaboration/background/tresemme-1.jpg', '<iframe width=\"100%\" height=\"464\" src=\"https://www.youtube.com/embed/1NesvXWJf3M\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'TRESemmé Arabia | Collaborations', '', '', 1, 3, '2021-03-05 07:05:16', '2021-03-04 03:44:21'),
(6, 'Monsieur Fox', 'monsieur-fox', '<p>Monsieur Fox is a men&rsquo;s accessories brand based in Dubai, U.A.E. The design range developed is called &lsquo;The Cabaret&rsquo;. Corsets, fan feathers and the graceful movements of the Burlesque artists set the inspiration board. At the same time, the fox, which is the brand&rsquo;s symbol, plays a striking role in inspiring the look and feel of the range.</p>\r\n', 'uploads/collaboration/monsieur-1.jpg', NULL, 'uploads/collaboration/background/monsieur-5.png', '<iframe width=\"100%\" height=\"464\" src=\"https://www.youtube.com/embed/inncT7Kd8bg\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Monsieur Fox | Collaborations', '', '', 1, 4, '2021-03-04 04:01:07', '2021-03-04 04:01:07'),
(7, 'Blue Stone', 'blue-stone', '<p>Ziba, designed for bluestone.com, is inspired by Persian art and architecture. Crafted with diamonds and gold, the collection boldly challenges form factors to surprise, delight and enthrall the senses.</p>\r\n', 'uploads/collaboration/blue-banner-8.jpg', NULL, NULL, '', 'Blue Stone | Collaborations', '', '', 1, 2, '2021-03-05 07:12:19', '2021-03-05 07:12:19'),
(8, 'AuDITIONS Design Award', 'auditions-design-award', '<p>AuDITIONS is the world&rsquo;s most prestigious gold couture award. The design was inspired by the Yimchunger shawls of the Naga warriors and was adjudged a finalist at the &rsquo;08-&rsquo;09 design awards. The design was realized in 22K Gold by Tanishq.</p>\r\n', 'uploads/collaboration/b3.jpg', NULL, NULL, '', 'AuDITIONS Design Award | Collaborations', '', '', 1, 5, '2021-03-05 07:30:18', '2021-03-05 07:30:18'),
(9, 'World Gold Council and Anmol Jewellers', 'world-gold-council-and-anmol-jewellers', '<p>The project involved a thorough study of the product profiles of eleven leading fashion and lifestyle magazines of India, which were the primal inspiration for the collection. The designs were realized in 18k Gold.</p>\r\n', 'uploads/collaboration/b4.jpg', NULL, NULL, '', 'World Gold Council and Anmol Jewellers | Collaborations', '', '', 1, 7, '2021-03-05 08:48:36', '2021-03-05 08:48:12'),
(10, 'World Gold Council & PN Gadgil', 'world-gold-council-pn-gadgil', '<p>The piece was developed as a part of the &lsquo;Bold Gold&rsquo; Collection for the World Gold Council and P.N Gadgil Jewellers. The product is crafted in 18K Gold and is composed of a bangle, a pair of earrings, a pendant and a brooch. The chief features seen in the collection were paisleys, spirals, spheres, eternal knots, four leaf clovers, eight pointed stars and the odin&rsquo;s horn. These were kept in mind during the form development of the product.</p>\r\n', 'uploads/collaboration/b5.jpg', NULL, NULL, '', 'World Gold Council & PN Gadgil | Collaborations', '', '', 1, 8, '2021-03-05 09:00:24', '2021-03-05 09:00:24'),
(11, 'Amrapali', 'amrapali', '<p>AHAM: &quot;I am all I need, I have all I need&quot;<br />\r\nJewellery Box composed of jewellery pieces</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Inspired by the Underlying principle of yoga &#39;You are all you need, you have all you need&#39;, This Jewellery Box was designed and manufactured for Amrapali Jewels, Jaipur, India. The box opens up to give individual jewellery pieces: A pair of earrings, a Brooch, a Ring and a Bangle.</p>\r\n', 'uploads/collaboration/b6_123.jpg', NULL, NULL, '', 'Amrapali | Collaborations', '', '', 1, 9, '2021-03-05 10:59:46', '2021-03-05 09:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `collaboration_gallery`
--

CREATE TABLE `collaboration_gallery` (
  `id` int(11) NOT NULL,
  `collab_id` int(11) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `image_path_thumb` varchar(500) NOT NULL,
  `medium_image_path` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collaboration_gallery`
--

INSERT INTO `collaboration_gallery` (`id`, `collab_id`, `image_path`, `image_path_thumb`, `medium_image_path`, `created_at`, `updated_at`) VALUES
(13, 4, 'uploads/collaborationgallery/swarovski-1.jpg', 'uploads/collaborationgallery/thumb/swarovski-1.jpg', 'uploads/collaborationgallery/medium/swarovski-1.jpg', '2021-03-03 21:20:55', '0000-00-00 00:00:00'),
(14, 4, 'uploads/collaborationgallery/swarovski-2.jpg', 'uploads/collaborationgallery/thumb/swarovski-2.jpg', 'uploads/collaborationgallery/medium/swarovski-2.jpg', '2021-03-03 21:20:55', '0000-00-00 00:00:00'),
(15, 4, 'uploads/collaborationgallery/swarovski-3.jpg', 'uploads/collaborationgallery/thumb/swarovski-3.jpg', 'uploads/collaborationgallery/medium/swarovski-3.jpg', '2021-03-03 21:20:55', '0000-00-00 00:00:00'),
(16, 4, 'uploads/collaborationgallery/swarovski-4.jpg', 'uploads/collaborationgallery/thumb/swarovski-4.jpg', 'uploads/collaborationgallery/medium/swarovski-4.jpg', '2021-03-03 21:20:55', '0000-00-00 00:00:00'),
(17, 4, 'uploads/collaborationgallery/swarovski-5.jpg', 'uploads/collaborationgallery/thumb/swarovski-5.jpg', 'uploads/collaborationgallery/medium/swarovski-5.jpg', '2021-03-03 21:20:55', '0000-00-00 00:00:00'),
(18, 4, 'uploads/collaborationgallery/swarovski-9.jpg', 'uploads/collaborationgallery/thumb/swarovski-9.jpg', 'uploads/collaborationgallery/medium/swarovski-9.jpg', '2021-03-03 21:20:55', '0000-00-00 00:00:00'),
(19, 4, 'uploads/collaborationgallery/swarovski-6.jpg', 'uploads/collaborationgallery/thumb/swarovski-6.jpg', 'uploads/collaborationgallery/medium/swarovski-6.jpg', '2021-03-03 21:20:56', '0000-00-00 00:00:00'),
(20, 4, 'uploads/collaborationgallery/swarovski-7.jpg', 'uploads/collaborationgallery/thumb/swarovski-7.jpg', 'uploads/collaborationgallery/medium/swarovski-7.jpg', '2021-03-03 21:20:56', '0000-00-00 00:00:00'),
(21, 4, 'uploads/collaborationgallery/swarovski-8.jpg', 'uploads/collaborationgallery/thumb/swarovski-8.jpg', 'uploads/collaborationgallery/medium/swarovski-8.jpg', '2021-03-03 21:20:56', '0000-00-00 00:00:00'),
(22, 5, 'uploads/collaborationgallery/tresemme-3.jpg', 'uploads/collaborationgallery/thumb/tresemme-3.jpg', 'uploads/collaborationgallery/medium/tresemme-3.jpg', '2021-03-03 21:46:10', '0000-00-00 00:00:00'),
(23, 5, 'uploads/collaborationgallery/tresemme-4.jpg', 'uploads/collaborationgallery/thumb/tresemme-4.jpg', 'uploads/collaborationgallery/medium/tresemme-4.jpg', '2021-03-03 21:46:10', '0000-00-00 00:00:00'),
(24, 5, 'uploads/collaborationgallery/tresemme-5.jpg', 'uploads/collaborationgallery/thumb/tresemme-5.jpg', 'uploads/collaborationgallery/medium/tresemme-5.jpg', '2021-03-03 21:46:11', '0000-00-00 00:00:00'),
(25, 5, 'uploads/collaborationgallery/tresemme-6.jpg', 'uploads/collaborationgallery/thumb/tresemme-6.jpg', 'uploads/collaborationgallery/medium/tresemme-6.jpg', '2021-03-03 21:46:11', '0000-00-00 00:00:00'),
(26, 5, 'uploads/collaborationgallery/tresemme-7.jpg', 'uploads/collaborationgallery/thumb/tresemme-7.jpg', 'uploads/collaborationgallery/medium/tresemme-7.jpg', '2021-03-03 21:46:11', '0000-00-00 00:00:00'),
(27, 5, 'uploads/collaborationgallery/tresemme-8.jpg', 'uploads/collaborationgallery/thumb/tresemme-8.jpg', 'uploads/collaborationgallery/medium/tresemme-8.jpg', '2021-03-03 21:46:11', '0000-00-00 00:00:00'),
(28, 5, 'uploads/collaborationgallery/tresemme-9.jpg', 'uploads/collaborationgallery/thumb/tresemme-9.jpg', 'uploads/collaborationgallery/medium/tresemme-9.jpg', '2021-03-03 21:46:11', '0000-00-00 00:00:00'),
(29, 5, 'uploads/collaborationgallery/tresemme-10.jpg', 'uploads/collaborationgallery/thumb/tresemme-10.jpg', 'uploads/collaborationgallery/medium/tresemme-10.jpg', '2021-03-03 21:46:11', '0000-00-00 00:00:00'),
(30, 5, 'uploads/collaborationgallery/tresemme-11.jpg', 'uploads/collaborationgallery/thumb/tresemme-11.jpg', 'uploads/collaborationgallery/medium/tresemme-11.jpg', '2021-03-03 21:46:11', '0000-00-00 00:00:00'),
(31, 6, 'uploads/collaborationgallery/monsieur-2.jpg', 'uploads/collaborationgallery/thumb/monsieur-2.jpg', 'uploads/collaborationgallery/medium/monsieur-2.jpg', '2021-03-03 22:02:01', '0000-00-00 00:00:00'),
(32, 6, 'uploads/collaborationgallery/monsieur-3.jpg', 'uploads/collaborationgallery/thumb/monsieur-3.jpg', 'uploads/collaborationgallery/medium/monsieur-3.jpg', '2021-03-03 22:02:01', '0000-00-00 00:00:00'),
(33, 6, 'uploads/collaborationgallery/monsieur-4.jpg', 'uploads/collaborationgallery/thumb/monsieur-4.jpg', 'uploads/collaborationgallery/medium/monsieur-4.jpg', '2021-03-03 22:02:01', '0000-00-00 00:00:00'),
(34, 7, 'uploads/collaborationgallery/blue-2.jpg', 'uploads/collaborationgallery/thumb/blue-2.jpg', 'uploads/collaborationgallery/medium/blue-2.jpg', '2021-03-05 01:16:21', '0000-00-00 00:00:00'),
(35, 7, 'uploads/collaborationgallery/blue-3.jpg', 'uploads/collaborationgallery/thumb/blue-3.jpg', 'uploads/collaborationgallery/medium/blue-3.jpg', '2021-03-05 01:16:21', '0000-00-00 00:00:00'),
(36, 7, 'uploads/collaborationgallery/blue-4.jpg', 'uploads/collaborationgallery/thumb/blue-4.jpg', 'uploads/collaborationgallery/medium/blue-4.jpg', '2021-03-05 01:16:21', '0000-00-00 00:00:00'),
(37, 7, 'uploads/collaborationgallery/blue-5.jpg', 'uploads/collaborationgallery/thumb/blue-5.jpg', 'uploads/collaborationgallery/medium/blue-5.jpg', '2021-03-05 01:16:21', '0000-00-00 00:00:00'),
(38, 7, 'uploads/collaborationgallery/blue-6.jpg', 'uploads/collaborationgallery/thumb/blue-6.jpg', 'uploads/collaborationgallery/medium/blue-6.jpg', '2021-03-05 01:16:21', '0000-00-00 00:00:00'),
(39, 7, 'uploads/collaborationgallery/blue-7.jpg', 'uploads/collaborationgallery/thumb/blue-7.jpg', 'uploads/collaborationgallery/medium/blue-7.jpg', '2021-03-05 01:16:21', '0000-00-00 00:00:00'),
(40, 8, 'uploads/collaborationgallery/b4.png', 'uploads/collaborationgallery/thumb/b4.png', 'uploads/collaborationgallery/medium/b4.png', '2021-03-05 01:32:02', '0000-00-00 00:00:00'),
(41, 8, 'uploads/collaborationgallery/b5.png', 'uploads/collaborationgallery/thumb/b5.png', 'uploads/collaborationgallery/medium/b5.png', '2021-03-05 01:32:02', '0000-00-00 00:00:00'),
(42, 8, 'uploads/collaborationgallery/b6.jpg', 'uploads/collaborationgallery/thumb/b6.jpg', 'uploads/collaborationgallery/medium/b6.jpg', '2021-03-05 01:32:02', '0000-00-00 00:00:00'),
(52, 9, 'uploads/collaborationgallery/wa-1_400x400 (1).jpg', 'uploads/collaborationgallery/thumb/wa-1_400x400 (1).jpg', 'uploads/collaborationgallery/medium/wa-1_400x400 (1).jpg', '2021-03-05 02:55:22', '0000-00-00 00:00:00'),
(53, 9, 'uploads/collaborationgallery/wa-2_400x400 (1).jpg', 'uploads/collaborationgallery/thumb/wa-2_400x400 (1).jpg', 'uploads/collaborationgallery/medium/wa-2_400x400 (1).jpg', '2021-03-05 02:57:51', '0000-00-00 00:00:00'),
(54, 9, 'uploads/collaborationgallery/wa-3_400x400 (1).jpg', 'uploads/collaborationgallery/thumb/wa-3_400x400 (1).jpg', 'uploads/collaborationgallery/medium/wa-3_400x400 (1).jpg', '2021-03-05 02:57:51', '0000-00-00 00:00:00'),
(55, 9, 'uploads/collaborationgallery/wa-4_400x400 (1).jpg', 'uploads/collaborationgallery/thumb/wa-4_400x400 (1).jpg', 'uploads/collaborationgallery/medium/wa-4_400x400 (1).jpg', '2021-03-05 02:57:51', '0000-00-00 00:00:00'),
(56, 9, 'uploads/collaborationgallery/wa-5_400x400 (1).jpg', 'uploads/collaborationgallery/thumb/wa-5_400x400 (1).jpg', 'uploads/collaborationgallery/medium/wa-5_400x400 (1).jpg', '2021-03-05 02:57:51', '0000-00-00 00:00:00'),
(57, 9, 'uploads/collaborationgallery/wa-6_400x400 (1).jpg', 'uploads/collaborationgallery/thumb/wa-6_400x400 (1).jpg', 'uploads/collaborationgallery/medium/wa-6_400x400 (1).jpg', '2021-03-05 02:57:51', '0000-00-00 00:00:00'),
(58, 9, 'uploads/collaborationgallery/wa-7_400x400 (1).jpg', 'uploads/collaborationgallery/thumb/wa-7_400x400 (1).jpg', 'uploads/collaborationgallery/medium/wa-7_400x400 (1).jpg', '2021-03-05 02:57:51', '0000-00-00 00:00:00'),
(59, 9, 'uploads/collaborationgallery/wa-8_400x400 (1).jpg', 'uploads/collaborationgallery/thumb/wa-8_400x400 (1).jpg', 'uploads/collaborationgallery/medium/wa-8_400x400 (1).jpg', '2021-03-05 02:57:51', '0000-00-00 00:00:00'),
(60, 9, 'uploads/collaborationgallery/wa-9_400x400 (1).jpg', 'uploads/collaborationgallery/thumb/wa-9_400x400 (1).jpg', 'uploads/collaborationgallery/medium/wa-9_400x400 (1).jpg', '2021-03-05 02:57:51', '0000-00-00 00:00:00'),
(61, 10, 'uploads/collaborationgallery/wg-1_400x400.jpg', 'uploads/collaborationgallery/thumb/wg-1_400x400.jpg', 'uploads/collaborationgallery/medium/wg-1_400x400.jpg', '2021-03-05 03:01:19', '0000-00-00 00:00:00'),
(62, 10, 'uploads/collaborationgallery/wg-2_400x400.jpg', 'uploads/collaborationgallery/thumb/wg-2_400x400.jpg', 'uploads/collaborationgallery/medium/wg-2_400x400.jpg', '2021-03-05 03:01:19', '0000-00-00 00:00:00'),
(63, 10, 'uploads/collaborationgallery/wg-3_400x400.jpg', 'uploads/collaborationgallery/thumb/wg-3_400x400.jpg', 'uploads/collaborationgallery/medium/wg-3_400x400.jpg', '2021-03-05 03:01:19', '0000-00-00 00:00:00'),
(64, 10, 'uploads/collaborationgallery/wg-4_400x400.jpg', 'uploads/collaborationgallery/thumb/wg-4_400x400.jpg', 'uploads/collaborationgallery/medium/wg-4_400x400.jpg', '2021-03-05 03:01:19', '0000-00-00 00:00:00'),
(65, 10, 'uploads/collaborationgallery/wg-5_400x400.jpg', 'uploads/collaborationgallery/thumb/wg-5_400x400.jpg', 'uploads/collaborationgallery/medium/wg-5_400x400.jpg', '2021-03-05 03:01:19', '0000-00-00 00:00:00'),
(66, 11, 'uploads/collaborationgallery/am-1_400x400-2.jpg', '', 'uploads/collaborationgallery/medium/am-1_400x400-2.jpg', '2021-03-05 04:51:19', '2021-03-05 04:57:15'),
(67, 11, 'uploads/collaborationgallery/am-2_400x400_2.jpg', '', 'uploads/collaborationgallery/medium/am-2_400x400_2.jpg', '2021-03-05 04:51:19', '2021-03-05 04:57:35'),
(68, 11, 'uploads/collaborationgallery/aham-3_400x400.jpg', 'uploads/collaborationgallery/thumb/aham-3_400x400.jpg', 'uploads/collaborationgallery/medium/aham-3_400x400.jpg', '2021-03-05 04:51:19', '0000-00-00 00:00:00'),
(69, 11, 'uploads/collaborationgallery/aham-4_400x400.jpg', 'uploads/collaborationgallery/thumb/aham-4_400x400.jpg', 'uploads/collaborationgallery/medium/aham-4_400x400.jpg', '2021-03-05 04:51:19', '0000-00-00 00:00:00'),
(70, 11, 'uploads/collaborationgallery/aham-5_400x400.jpg', 'uploads/collaborationgallery/thumb/aham-5_400x400.jpg', 'uploads/collaborationgallery/medium/aham-5_400x400.jpg', '2021-03-05 04:51:19', '0000-00-00 00:00:00'),
(71, 11, 'uploads/collaborationgallery/aham-9_400x400.jpg', 'uploads/collaborationgallery/thumb/aham-9_400x400.jpg', 'uploads/collaborationgallery/medium/aham-9_400x400.jpg', '2021-03-05 04:51:19', '0000-00-00 00:00:00'),
(72, 13, 'uploads/collaborationgallery/aham-3_400x400.jpg', 'uploads/collaborationgallery/thumb/aham-3_400x400.jpg', 'uploads/collaborationgallery/medium/aham-3_400x400.jpg', '2021-03-26 10:53:31', '0000-00-00 00:00:00'),
(73, 13, 'uploads/collaborationgallery/aham-4_400x400.jpg', 'uploads/collaborationgallery/thumb/aham-4_400x400.jpg', 'uploads/collaborationgallery/medium/aham-4_400x400.jpg', '2021-03-26 10:53:31', '0000-00-00 00:00:00'),
(74, 13, 'uploads/collaborationgallery/aham-9_400x400.jpg', 'uploads/collaborationgallery/thumb/aham-9_400x400.jpg', 'uploads/collaborationgallery/medium/aham-9_400x400.jpg', '2021-03-26 10:53:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `collections` varchar(200) NOT NULL,
  `slug` text DEFAULT NULL,
  `gender` varchar(150) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(50) NOT NULL,
  `image_path` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_key_words` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `collections`, `slug`, `gender`, `is_active`, `display_order`, `image_path`, `meta_title`, `meta_key_words`, `meta_description`, `created_at`, `updated_at`) VALUES
(32, 'Pristine', 'pristine', 'Women', 1, 6, 'uploads/collection/pristine-1.jpg', 'Pristine | Collections | Vinita Michael', '', '', '2021-02-10 07:34:04', '2021-03-18 14:24:44'),
(33, 'Flights of fantasy', 'flights-of-fantasy', 'Women', 1, 7, 'uploads/collection/flights-banner-site.jpg', 'Flights of fantasy | Collections', '', '', '2021-02-10 07:34:13', '2021-03-18 14:24:43'),
(34, 'Lighter than air', 'lighter-than-air', 'Women', 1, 5, 'uploads/collection/lighter-than-air-2.jpg', 'Lighter than air | Collections', '', '', '2021-02-10 07:34:22', '2021-03-18 14:24:43'),
(36, 'Gardens of Utopia', 'gardens-of-utopia', 'Women', 1, 0, 'uploads/collection/gardens-1.jpg', 'Garden Of Utopia | Vinita Michael', '', '', '2021-02-10 07:34:39', '2021-03-28 17:06:26'),
(37, 'Let there be light', 'let-there-be-light', 'Women', 1, 2, 'uploads/collection/let_there_be.jpg', 'Let there be light | Collections', '', '', '2021-02-10 07:34:47', '2021-03-18 14:24:41'),
(38, 'A walk through venice', 'a-walk-through-venice', 'Women', 1, 3, 'uploads/collection/walk.jpg', 'A WALK THROUGH VENICE | Collections', '', '', '2021-02-10 07:34:55', '2021-03-18 14:24:40'),
(39, 'Flora Fantastica', 'flora-fantastica', 'Women', 1, 4, 'uploads/collection/flora-fantastica.jpg', 'Flora Fantastica | Collections', '', '', '2021-02-10 07:35:02', '2021-03-18 14:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `building_no` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(25) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `company_name` varchar(512) DEFAULT NULL,
  `shipping_address_1` text NOT NULL,
  `shipping_address_2` text DEFAULT NULL,
  `shipping_address_3` text DEFAULT NULL,
  `shipping_notes` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `user_id`, `name`, `city`, `street`, `building_no`, `mobile_no`, `phone`, `company_name`, `shipping_address_1`, `shipping_address_2`, `shipping_address_3`, `shipping_notes`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 1, 'test', 'test', 'test', 'test', '22334444554', '', NULL, '', NULL, NULL, NULL, '2020-06-06 01:26:19', 1, '0000-00-00 00:00:00', 0),
(4, 18, 'asdf', 'asdf', 'asdfasdf', 'asdf', '94567855467', '', 'asdfasdf', 'asdfadsf', 'asdf', 'asdf', 'adsf', '2020-06-20 08:29:14', 18, '0000-00-00 00:00:00', 0),
(5, 18, 'aaaaa', 'aaaa', 'asdf', '657576575765', '6576778688768', '', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '2020-06-20 08:29:54', 18, '0000-00-00 00:00:00', 0),
(6, 18, 'aaaaaaa', 'aaaaaa', 'aaaaa', 'aaaaa', '1212121212112', '', '', 'aaaaa', 'aaaaa', 'aaaa', 'asdflkjlaksdf jklajsdf klajsdlfj laskdfj lkasfdjal sdfj', '2020-06-21 01:53:45', 18, '0000-00-00 00:00:00', 0),
(7, 18, NULL, NULL, NULL, NULL, NULL, '', 'tttt', 'ttt', 'tttt', 'ttt', 'ttt', '2020-06-26 07:33:38', 18, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `display_order` int(2) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `title`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `is_active`, `display_order`, `updated_at`, `created_at`) VALUES
(3, 'Lotus', 'lotus', NULL, NULL, NULL, 1, 0, '2021-04-17 08:36:48', '2021-04-17 08:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `distributor_enquiry`
--

CREATE TABLE `distributor_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `country` enum('uae','oman','qatar') NOT NULL DEFAULT 'uae',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor_enquiry`
--

INSERT INTO `distributor_enquiry` (`id`, `name`, `product`, `email`, `phone_number`, `subject`, `message`, `ip_address`, `country`, `created_at`) VALUES
(1, 'est', '', 'test123@gmail.com', '34234234234234', 'qweqw', 'wqewq', '157.46.121.88', 'uae', '2020-06-04 00:00:00'),
(2, 'sdas', '34', 'dhofar.admin@gmail.com', '34234234234234', 'sad', 'sadas', '157.46.121.88', 'uae', '2020-06-04 00:00:00'),
(3, 'babji', '34', 'babjibalaji@gmail.com', '9003034777', 'Subject Subject', 'Message Message', '115.97.73.231', 'uae', '2020-06-04 00:00:00'),
(4, 'babji', '42', 'a@b.com', '9231231231', 'subj', 'st', '115.97.73.231', 'uae', '2020-06-04 00:00:00'),
(5, 'test', 'Select Product Category', 'test@gmail.com', '1234567800', '', '', '157.32.35.193', 'uae', '2020-06-09 00:00:00'),
(6, 'ddd', '47', 'test@gmail.com', '1234567890', 'test', 'asdasdasd', '157.32.9.227', 'uae', '2020-06-09 00:00:00'),
(7, 'asdf', '48', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(8, 'asdf', '48', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(9, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(10, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(11, 'asdf', '49', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(12, 'asdf', '49', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(13, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(14, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(15, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(16, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(17, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(18, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(19, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(20, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(21, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(22, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(23, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(24, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(25, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(26, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(27, 'asdf', '46', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(28, 'asdf', '46', 'asdf@asd.sd', '01234567890', '', 'asdf', '::1', 'uae', '2020-06-22 00:00:00'),
(29, 'asdf', '47', 'asdf@asdf.asd', '1231232132', '', 'asdfasdfasdfasdf', '::1', 'uae', '2020-06-22 00:00:00'),
(30, 'asdf', '47', 'asdf@asdf.asd', '1231232132', '', 'asdfasdfasdfasdf', '::1', 'uae', '2020-06-22 00:00:00'),
(31, 'asdf', '52', 'asdf@asd.sd', '01234567890', '', 'a sdfas df', '::1', 'uae', '2020-06-22 00:00:00'),
(32, 'asdf', '52', 'asdf@asd.sd', '01234567890', '', 'a sdfas df', '::1', 'uae', '2020-06-22 00:00:00'),
(33, 'asdf', '49', 'asdf@asd.sd', '01234567890', '', 'as dfasd fasdf asdf asdf', '::1', 'uae', '2020-06-23 00:00:00'),
(34, 'asdf', '50', 'asdf@asdf.sd', '01234567890', '', 'asdffasdf', '::1', 'uae', '2020-06-23 00:00:00'),
(35, 'asdf', '47', 'asdf@asd.sd', '01234567890', '', 'asdfasdf', '::1', 'uae', '2020-06-23 00:00:00'),
(36, 'asdf', '46', 'adsf@asdf.asd', '123123123213', '', 'a sofas df', '::1', 'uae', '2020-06-23 00:00:00'),
(37, 'upendra', '48', 'upendrau@gmail.com', '09058419801', '', ' asdfa sd', '::1', 'uae', '2020-06-26 00:00:00'),
(38, 'upendra upadhyay', '48', 'hi@upendra.me', '123123123123', '', 'a sdfa sd', '::1', 'uae', '2020-06-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(10) NOT NULL,
  `email_template_title` varchar(100) NOT NULL,
  `email_template_subject` varchar(200) NOT NULL,
  `email_template_description` text NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `created_id` int(11) NOT NULL,
  `created_duration` datetime NOT NULL,
  `updated_id` int(11) NOT NULL,
  `updated_duration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `email_template_title`, `email_template_subject`, `email_template_description`, `is_active`, `created_id`, `created_duration`, `updated_id`, `updated_duration`) VALUES
(1, 'Admin Forgot Password', 'Dhofar Global |  Forgot Password', '<div style=\"width: 650px; margin:auto;\">&nbsp;\r\n	<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\" width=\"650px\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #3E3E3E\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px\" alt=\"%%project_name%%\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Forgot Password</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">Hello %%username%%,</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"5\">&nbsp;</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">Your Account Password Reset Request !</td>\r\n						</tr>\r\n											<tr>\r\n							<td height=\"5\">&nbsp;</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">\r\n							<p>We received a request to reset the password associated with this e-mail address. If you made this request, please follow the instructions below.</p>\r\n	\r\n							<p>Click on the link below to reset your password now<br />\r\n							<br />\r\n							<a href=\"%%uid%%\">%%uid%%</a></p>\r\n	\r\n							<p>If you did not request to have your password reset you can safely ignore this email. Rest assured that your account is safe.</p>\r\n	\r\n							<p>If clicking the link does not work, you can copy and paste the link into your browser window, or retype it. Once you have returned to %%project_name%% Application, we will give you instructions for resetting your password.</p>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"padding-left: 20px;padding-bottom: 15px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;\">Regards,<br />\r\n							Dhofar Global Team</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#3E3E3E\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	', 1, 1, '2017-02-26 21:45:26', 1, '2018-02-16 12:03:00'),
(5, 'Contact Us Enquiry', 'Dhofar Global | Contact-Us Enquiry', '<div style=\"width: 650px; margin:auto;\">\r\n	&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #3E3E3E\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Contact-Us Enquiry Received</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Name:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone/Mobile:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%phone%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Product Category:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%product_category%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Message:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%;\">%%message_contact%%</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#3E3E3E\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	\r\n	', 1, 1, '2017-12-30 10:22:19', 1, '2018-02-16 10:52:07'),
(6, 'Admin Newsletter', 'Newsletter', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<div style=\"width: 900px; margin:auto; border: 1px solid #CECECE;\">\r\n<div style=\"font-family:\"Brandon\",Helvetica,Arial!important;font-size:16px;color:#30373b;background-color:#fff; margin: 25px;\">\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr height=\"80\" valign=\"top\">\r\n			<td height=\"80\">\r\n			<table border=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><img alt=\"%%project_name%%\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" style=\"padding-bottom: 10px\" /></td>\r\n					</tr>\r\n					<tr>\r\n						<td bgcolor=\"#0d706d\" style=\"text-align:right;font-family:Verdana;font-size:18px;color:#fff;text-decoration:none;text-indent:10px;height: 25px;\"><b>%%project_name%% Newsletter</b>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"padding:20px;\">%%description%%</td>\r\n		</tr>\r\n		<tr>\r\n			<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"20\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center;\">%%copyright%%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 'Newsletter Subscription', 'Dhofar Global | Newsletter Subscription', '<div style=\"width: 650px; margin:auto;\">&nbsp;\r\n	<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\" width=\"650px\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #0d706d\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"padding:5px\" alt=\"%%project_name%%\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Newsletter Subscription</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">Hello Admin,</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"5\">&nbsp;</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">A new user has successfully subscribed on Dhofar Global to receive the newsletters.</td>\r\n						</tr>\r\n											<tr>\r\n							<td height=\"5\">&nbsp;</td>\r\n						</tr>\r\n											<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">Email: %%email%%</td>\r\n						</tr>\r\n	\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"padding-left: 20px;padding-bottom: 15px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;\">Regards,<br />\r\n							Dhofar Global Support Team</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 'New User Register', 'Vinita Michael | New User Registration', '<div style=\"width: 650px; margin:auto;\">&nbsp;\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\" width=\"650px\">\r\n	<tbody>\r\n		<tr height=\"80\" valign=\"top\">\r\n			<td height=\"80\" style=\"border-bottom:solid 2px #3E3E3E\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr style=\"height: 60px;\">\r\n						<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img alt=\"\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n						<br />\r\n						<b>New User Registration</b></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n			<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>First Name:</b></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%first_name%%</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Last Name:</b></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%last_name%%</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email:</b></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>\r\n					</tr>\r\n					\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td bgcolor=\"#3E3E3E\" style=\"height: 25px;\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', 1, 1, '2019-03-12 01:04:04', 0, '0000-00-00 00:00:00'),
(9, 'User Registration', 'Dhofar Global | Registration', '<div style=\"width: 650px; margin:auto;\">&nbsp;<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\" width=\"650px\">	<tbody>		<tr height=\"80\" valign=\"top\">			<td height=\"80\" style=\"border-bottom:solid 2px #0d706d\">			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">				<tbody>					<tr style=\"height: 60px;\">						<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img alt=\"\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />						<br />						<b>Registration</b></td>					</tr>				</tbody>			</table>			</td>		</tr>		<tr>			<td>			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">				<tbody>					<tr>						<td style=\"padding-left:20px;padding-top:20px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;padding-right:20px;\">						<p>Dear %%username%%,</p>						</td>						<td style=\"padding-top:20px;padding-right:20px;text-align:right;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;padding-right:20px;\">&nbsp;</td>					</tr>					<tr>						<td colspan=\"2\" height=\"40\" style=\"padding-left:20px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none; padding-top:2px;\">						<p>Thank you for registering with Dhofar Global.</p>						</td>					</tr>					<tr>						<td colspan=\"2\" height=\"40\" style=\"padding-left:20px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none; padding-top:2px;\">						<p>Please kindly verify your email address by clicking the below.&nbsp;</p>						</td>					</tr>					<tr>						<td colspan=\"2\" height=\"60\" style=\"padding-bottom:10px;padding-left:20px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none; padding-top:2px;\">						<table>							<tbody>								<tr>									<td style=\"padding:10px;background-color:rgb(255, 255, 255);\"><a href=\"%%verification_code%%\" style=\"background-color:#0d706d;color:#fff;padding:20px; text-decoration:none;\" target=\"_blank\">Verify Your Email Address</a></td>								</tr>							</tbody>						</table>						</td>					</tr>					<tr>						<td colspan=\"2\" height=\"40\" style=\"padding-left:20px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none; padding-top:2px;\">						<p>Should you require any further information please contact us at <a href=\"mailto:info@dhofarglobal.com\">info@dhofarglobal.com</a></p>						</td>					</tr>				</tbody>			</table>			</td>		</tr>		<tr>			<td>			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">				<tbody>					<tr>						<td style=\"padding-left: 20px;padding-bottom: 15px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;\">Regards,<br />						Dhofar Global Support Team.</td>					</tr>				</tbody>			</table>			</td>		</tr>		<tr>			<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>		</tr>		<tr>			<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>		</tr>	</tbody></table></div>\r\n', 1, 1, '2019-03-12 01:10:09', 0, '0000-00-00 00:00:00'),
(10, 'User Forgot Password', 'Dhofar Global | Forgot Password', '<div style=\"width: 650px; margin:auto;\">\r\n	&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #0d706d\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n							<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img alt=\"\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Forgot Password</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">Hello %%username%%,</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"5\">&nbsp;</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">Your Account Password Reset Request !</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">\r\n							<p>We received a request to reset the password associated with this e-mail address. If you made this request, please follow the instructions below.</p>\r\n	\r\n							<p>Click on the link below to reset your password now<br />\r\n							<br />\r\n							<a href=\"%%site_url%%reset-password/%%uid%%\">%%site_url%%reset-password/%%uid%%</a></p>\r\n	\r\n							<p>If you did not request to have your password reset you can safely ignore this email. Rest assured that your account is safe.</p>\r\n	\r\n							<p>If clicking the link does not work, you can copy and paste the link into your browser window, or retype it. Once you have returned to %%project_name%% Application, we will give you instructions for resetting your password.</p>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"padding-left: 20px;padding-bottom: 15px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;\">Regards,<br />\r\n							Dhofar Global Team</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	', 1, 1, '2019-03-13 01:04:05', 0, '0000-00-00 00:00:00'),
(11, 'Book a Free Consultation', 'Dhofar Global | Free Consultation Request', '<div style=\"width: 650px; margin:auto;\">&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n	  <tbody>\r\n		<tr height=\"80\" valign=\"top\">\r\n		  <td height=\"80\" style=\"border-bottom:solid 2px #0d706d\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n			  <tbody>\r\n				<tr style=\"height: 60px;\">\r\n				  <td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"%%project_name%%\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n					<br />\r\n					<b>Free Consultation Request Received</b></td>\r\n				</tr>\r\n			  </tbody>\r\n			</table></td>\r\n		</tr>\r\n		<tr>\r\n		  <td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\"><table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n			  <tbody>\r\n				<tr>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:30%\"><b>Name :</b></td>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:70%\">%%name%%</td>\r\n				</tr>\r\n				<tr>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:30%\"><b>Email :</b></td>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:70%\">%%email%%</td>\r\n				</tr>\r\n				<tr>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:30%\"><b>Phone / Mobile :</b></td>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:70%\">%%phone%%</td>\r\n				</tr>\r\n				<tr>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:30%\"><b>Service :</b></td>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:70%;\">%%service%%</td>\r\n				</tr>\r\n				<tr>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:30%\"><b>Message :</b></td>\r\n				  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;border-bottom: 1px solid rgb(167,167,167); border-top: 1px solid rgb(167,167,167); border-left: 1px solid rgb(167,167,167); border-right: 1px solid rgb(167,167,167);width:70%;\">%%message%%</td>\r\n				</tr>\r\n			  </tbody>\r\n			</table></td>\r\n		</tr>\r\n		<tr>\r\n		  <td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n		  <td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n		</tr>\r\n	  </tbody>\r\n	</table>\r\n  </div>\r\n  ', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(12, 'Admin Placed Order', 'Dhofar Global | Admin Placed Order', '<div style=\"width: 750px; margin:auto;\">&nbsp;<table align=\"center\" width=\"750px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 750px; margin:auto; border: 1px solid #CECECE;\">	<tbody>		<tr height=\"80\" valign=\"top\">			<td height=\"80\" style=\"border-bottom:solid 2px #0d706d\">			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">				<tbody>					<tr style=\"height: 60px;\">                                            <td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />						<br />						<b>Admin Placed Order</b><br />						<b>Order ID: %%orderid%%</b></td>					</tr>				</tbody>			</table>			</td>		</tr>		<tr>			<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">			<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">				<tbody>					<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Customer Name :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>					</tr>					<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>					</tr>					<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone Number :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%phone%%</td>					</tr>                                        <tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Total Cost :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">AED %%total_cost%%</td>					</tr>					<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Delivery Charges :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%delivery_charges%%</td>					</tr><tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Vat (5%) :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">AED %%vat_amount%%</td>					</tr>					<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Amount Paid :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">AED %%amount_paid%%</td>					</tr>                                        %%order%%				</tbody>			</table>			</td>		</tr>		<tr>			<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>		</tr>		<tr>			<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>		</tr>	</tbody></table></div>\r\n', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(13, 'Placed Order', 'Vinita Michael | Placed Order', '<div style=\"width: 750px; margin:auto;\">&nbsp;<table align=\"center\" width=\"750px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 750px; margin:auto; border: 1px solid #CECECE;\">	<tbody>		<tr height=\"80\" valign=\"top\">			<td height=\"80\" style=\"border-bottom:solid 2px #3E3E3E\">			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">				<tbody>					<tr style=\"height: 60px;\">                                            <td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />						<br />						<b>Placed Order</b><br />						<b>Order ID: %%orderid%%</b></td>					</tr>				</tbody>			</table>			</td>		</tr>		<tr>			<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">			<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">				<tbody>					<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Customer Name :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>					</tr>					<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>					</tr>					<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone Number :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%phone%%</td>					</tr>                                        \r\n	<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Sub Total :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%curr%%. %%sub_total%%</td>				\r\n	</tr>\r\n	<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Shipping :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%curr%%. %%shipping%%</td>				\r\n	</tr>\r\n	<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Discount :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%curr%%. %%discount%%</td>				\r\n	</tr>\r\n	<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Wallet :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%curr%%. %%wallet%%</td>				\r\n	</tr>\r\n	<tr>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Paid Amount :</b></td>						<td colspan=\"2\" style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%curr%%. %%paid_amount%%</td>				\r\n	</tr>\r\n\r\n%%order%%				\r\n</tbody>			</table>			</td>		</tr>		<tr>			<td bgcolor=\"#3E3E3E\" style=\"height: 25px;\">&nbsp;</td>		</tr>		<tr>			<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>		</tr>	</tbody></table></div>\r\n', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(14, 'Subscription', 'Dhofar Global | Subscription Request', '<div style=\"width: 650px; margin:auto;\">\r\n	&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #0d706d\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Subscription Request Received</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Name :</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone/Email :</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Subscription :</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%subscription%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Message :</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%;\">%%message_contact%%</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(15, 'Service Enquiry', 'Tabrah Flowers | %service-title%', '<div style=\"width: 650px; margin:auto;\">\r\n	&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #0d706d\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Service Enquiry Received</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Name :</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email :</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone Number :</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%phone%%</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	', 1, 1, '2020-01-18 02:04:03', 0, '0000-00-00 00:00:00'),
(16, 'Product Enquiry', 'Dhofar Global | Product Enquiry', '<div style=\"width: 650px; margin:auto;\">\r\n	&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #0d706d\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Product Enquiry Received</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Name:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone/Mobile:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%phone%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Product Name/SKU:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%productName%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Message:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%;\">%%message_contact%%</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	\r\n	', 1, 1, '2020-06-21 17:12:36', 1, '2020-06-21 17:12:36'),
(17, 'Chat Message Received', 'Dhofar Global |   Chat Message Received', '<div style=\"width: 650px; margin:auto;\">\r\n	&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #0d706d\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Chat Message</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Name:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone/Mobile:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%phone%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Products/Services:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%;\">%%service%%</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	\r\n	', 1, 1, '2018-02-16 12:03:00', 1, '2018-02-16 12:03:00');
INSERT INTO `email_template` (`id`, `email_template_title`, `email_template_subject`, `email_template_description`, `is_active`, `created_id`, `created_duration`, `updated_id`, `updated_duration`) VALUES
(18, 'Complaint And Feedback', 'Dhofar Global | Complaint And Feedback', '<div style=\"width: 650px; margin:auto;\">\r\n	&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #0d706d\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Feedback & Suggestions</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Name:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone/Mobile:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%phone%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Option:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%option%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Message:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%;\">%%message%%</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#0d706d\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	\r\n	', 1, 1, '2020-06-22 21:16:05', 1, '2020-06-22 21:16:05'),
(19, 'Forgot Password', 'Forgot Password', '<div style=\"width: 650px; margin:auto;\">&nbsp;\r\n	<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\" width=\"650px\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #3E3E3E\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px\" alt=\"%%project_name%%\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Forgot Password</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">Hello %%fname%%,</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"5\">&nbsp;</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">Your Account Password Reset Request !</td>\r\n						</tr>\r\n											<tr>\r\n							<td height=\"5\">&nbsp;</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;\">\r\n							<p>We received a request to reset the password associated with this e-mail address. If you made this request, please follow the instructions below.</p>\r\n	\r\n							<p>Click on the link below to reset your password now<br />\r\n							<br />\r\n							<a href=\"%%uid%%\">%%uid%%</a></p>\r\n	\r\n							<p>If you did not request to have your password reset you can safely ignore this email. Rest assured that your account is safe.</p>\r\n	\r\n							<p>If clicking the link does not work, you can copy and paste the link into your browser window, or retype it. Once you have returned to %%project_name%% Application, we will give you instructions for resetting your password.</p>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"padding-left: 20px;padding-bottom: 15px;font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;\">Regards,<br />\r\n							Vinita Michael</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#3E3E3E\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	', 1, 1, '2017-02-26 21:45:26', 1, '2018-02-16 12:03:00'),
(20, 'Personalized', 'Personalized', '<div style=\"width: 650px; margin:auto;\">\r\n	&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #3E3E3E\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Personalized Enquiry</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Name:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone/Mobile:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%phone%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Looking for:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%looking%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Photo:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%photo%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Message:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%;\">%%message%%</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#3E3E3E\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	\r\n	', 1, 1, '2017-02-26 21:45:26', 1, '2018-02-16 12:03:00'),
(21, 'Contact Enquiry', 'Contact Enquiry', '<div style=\"width: 650px; margin:auto;\">\r\n	&nbsp;\r\n	<table align=\"center\" width=\"650px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\">\r\n		<tbody>\r\n			<tr height=\"80\" valign=\"top\">\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #3E3E3E\">\r\n				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n					<tbody>\r\n						<tr style=\"height: 60px;\">\r\n												<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n							<br />\r\n							<b>Contact Enquiry</b></td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n				<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Name:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Email:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%email%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Phone/Mobile:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%phone%%</td>\r\n						</tr>\r\n						<tr>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Message:</b></td>\r\n							<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%;\">%%message%%</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor=\"#3E3E3E\" style=\"height: 25px;\">&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</div>\r\n	\r\n	', 1, 1, '2017-02-26 21:45:26', 1, '2018-02-16 12:03:00'),
(22, 'Admin Gift Card', 'Admin Gift Card', '<div style=\"width: 650px; margin:auto;\">&nbsp;\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 650px; margin:auto; border: 1px solid #CECECE;\" width=\"650px\">\r\n	<tbody>\r\n		<tr height=\"80\" valign=\"top\">\r\n			<td height=\"80\" style=\"border-bottom:solid 2px #3E3E3E\">\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n				<tbody>\r\n					<tr style=\"height: 60px;\">\r\n						<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\"><img alt=\"\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" /></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />\r\n						<br />\r\n						<b>A Gift For You</b></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\">\r\n			<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Name:</b></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%name%%</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>To:</b></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%to%%</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Gift Code:</b></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%gift_code%%</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Currency:</b></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%currency%%</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%\"><b>Price:</b></td>\r\n						<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%\">%%price%%</td>\r\n					</tr>\r\n					\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td bgcolor=\"#3E3E3E\" style=\"height: 25px;\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', 1, 1, '2017-02-26 21:45:26', 1, '2018-02-16 12:03:00'),
(23, 'Loyalty Earned', 'Loyalty Earned', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"margin: 0;\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(%%base_url%%images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"%%base_url%%images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"%%base_url%%images/giftloyal.png\" style=\"max-width: 275px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"%%base_url%%images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 5px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: %%date%%</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 30px 42px 40px 42px;\">\r\n										<h5 style=\"color: #B59677;font-size: 25px;font-weight: 600;width: 465px;margin: 0 auto 10px;\">Dear %%name%%,</h5>\r\n										<p style=\"color: #788188;font-size: 27px;font-weight: 500;width: 465px;line-height: 37px;text-align: center;margin: 0 auto\">Congratulations! You have earned <label style=\"color: #B59677;font-size: 27px;font-weight: 600;\">%%curr%% %%loyality%%</label> as a Reward for the purchased amount <label style=\"color: #B59677;font-size: 27px;font-weight: 600;\">%%curr%% %%grand_total%%.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"%%base_url%%images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 15px 0 0 0;\">\r\n										<p style=\"color: #788188;font-size: 13px;font-weight:600;font-family: \'Montserrat\', sans-serif;\">*This reward will be added on your wallet.</p>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"%%base_url%%images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"%%base_url%%images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"%%base_url%%images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', 1, 1, '2017-02-26 21:45:26', 1, '2018-02-16 12:03:00'),
(24, 'Gift Card To Friend', 'Gift Card To Friend', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(%%base_url%%images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"%%base_url%%images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"%%base_url%%images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"%%base_url%%images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: %%date%%</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">To:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"%%to%%\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">From:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"%%from%%\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"%%code%%\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (%%currency%%):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"%%price%%\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"%%base_url%%images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"%%base_url%%images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"%%base_url%%images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"%%base_url%%images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"%%base_url%%images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n							<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n											<a target=\"_blank\" href=\"%%print_url%%\" style=\"color: white;text-decoration: none;\">\r\n												Print\r\n											</a>\r\n								</label>\r\n							</h5>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', 1, 1, '2017-02-26 21:45:26', 1, '2018-02-16 12:03:00'),
(25, 'Gift Card To Ownself', 'Gift Card To Ownself', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(%%base_url%%images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"%%base_url%%images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"%%base_url%%images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"%%base_url%%images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: %%date%%</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"%%code%%\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (%%currency%%):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"%%price%%\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"%%base_url%%images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"%%base_url%%images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"%%base_url%%images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"%%base_url%%images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"%%base_url%%images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n							<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\">\r\n								<label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n									<a target=\"_blank\" href=\"%%print_url%%\" style=\"color: white;text-decoration: none;\">Print</a>\r\n								</label>\r\n							</h5>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', 1, 1, '2017-02-26 21:45:26', 1, '2018-02-16 12:03:00'),
(26, 'Abandoned Cart', 'Abandoned Cart', '<div style=\"width: 750px; margin:auto;\">&nbsp;\r\n	<table align=\"center\" width=\"750px\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 750px; margin:auto; border: 1px solid #CECECE;\">	\r\n		<tbody>		\r\n			<tr height=\"80\" valign=\"top\">			\r\n				<td height=\"80\" style=\"border-bottom:solid 2px #3E3E3E\">\r\n					<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n						<tbody>					\r\n							<tr style=\"height: 60px;\">\r\n								<td style=\"padding-top: 10px; padding-bottom: 5px; padding-left:5px;\">\r\n									<img style=\"opacity: 1.8;padding:20px;\" alt=\"front-logo\" border=\"0\" src=\"%%site_url%%%%site_logo%%\" />\r\n								</td>						\r\n								<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;padding:10px;width: 400px;text-align:right\"><b>%%date%%</b><br />						\r\n									<br />						<b>Abandoned Cart</b><br /></td></tr></tbody>			\r\n								</table>			\r\n							</td>		\r\n						</tr>		\r\n						<tr>			\r\n							<td style=\"padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px\" colspan=\"4\">			<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" class=\"table table-bordered tableformat\" style=\"border-collapse:collapse;border-color:#d7d7d7;border: 1px solid #d7d7d7;\" width=\"100%\">				\r\n								<tbody>\r\n\r\n								<p style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:left;padding-top: 10px; padding-bottom: 10px;\">Dear %%customer_name%%,</p>\r\n\r\n								<p style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:left;padding-top: 10px; padding-bottom: 10px;\">You added items to your shopping cart and haven’t completed your order purchase. You can complete it now while they’re still available.</p>\r\n\r\n								%%order%%				\r\n</tbody>			</table>			</td>		</tr>		<tr>			<td bgcolor=\"#3E3E3E\" style=\"height: 25px;\">&nbsp;</td>		</tr>		<tr>			<td style=\"font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-align:center;padding-top: 10px; padding-bottom: 10px;\"><b>%%copyright%%</b></td>		</tr>	</tbody></table></div>\r\n', 1, 1, '2017-02-26 21:45:26', 1, '2018-02-16 12:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(10) NOT NULL,
  `enquiry_name` varchar(100) NOT NULL,
  `product_category` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `country` enum('uae','qatar','oman') DEFAULT 'uae',
  `ip_address` varchar(50) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `yearsofexperience` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `yearsofexperience`, `is_active`, `updated_at`, `created_at`) VALUES
(6, '1 Year', 1, '0000-00-00 00:00:00', '2020-06-25 20:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `visa_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `visa_id`, `question`, `answer`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(12, 5, 'Question', 'Answer', 1, 1, '2020-06-03 11:06:28', '2021-01-06 07:06:10'),
(14, 5, 'Question1', 'Answer', 1, 2, '2020-06-03 11:06:28', '2021-01-06 07:02:57'),
(17, 7, 'Do you have at least one year experiances?', 'Yes I have', 1, 2, '2021-01-06 07:16:38', '2021-01-06 07:21:44'),
(18, 7, 'Arab Visa FAQ', 'Arab Visa Answer', 1, 1, '2021-01-06 07:25:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gift_card_code`
--

CREATE TABLE `gift_card_code` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_used` int(1) DEFAULT NULL,
  `used_by` int(1) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `display_order` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gift_card_code`
--

INSERT INTO `gift_card_code` (`id`, `order_id`, `product_id`, `code`, `quantity`, `is_used`, `used_by`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(2, 0, 374, '604B602283857', 0, 0, NULL, 1, 0, '2021-03-12 12:35:46', NULL),
(3, 0, 375, '604B60A24FB5B', 0, 0, NULL, 1, 0, '2021-03-12 12:37:54', NULL),
(4, 14, 371, '6051470c48bf9', 11, 1, 4, 0, 0, '2021-03-17 00:02:20', '2021-03-17 00:59:57'),
(5, 17, 371, '6051503b1dcea', 1, 1, 4, 0, 0, '2021-03-17 00:41:31', '2021-03-17 00:52:27'),
(6, 0, 378, '605151FC48603', 0, 0, NULL, 1, 0, '2021-03-17 00:49:00', NULL),
(7, 0, 379, '6051525190CAB', 0, 0, NULL, 1, 0, '2021-03-17 00:50:25', NULL),
(8, 0, 380, '605153227CEC8', 0, 0, NULL, 1, 0, '2021-03-17 00:53:54', NULL),
(9, 18, 371, '605155301f615', 1, 0, NULL, 1, 0, '2021-03-17 01:02:40', NULL),
(10, 36, 376, '6054ee1199a26', 1, 0, NULL, 1, 0, '2021-03-19 18:31:45', NULL),
(11, 37, 370, '6054eeec3aa6f', 1, 0, NULL, 1, 0, '2021-03-19 18:35:24', NULL),
(12, NULL, 382, '6055619F08D15', 1, 1, 4, 0, 0, '2021-03-20 02:44:47', '2021-03-20 02:50:12'),
(14, NULL, 384, '605563FEAB2F0', 1, 1, 4, 0, 0, '2021-03-20 02:54:54', '2021-03-20 02:55:15'),
(15, 38, 376, '60557cbe51c27', 1, 0, NULL, 1, 0, '2021-03-20 04:40:30', NULL),
(16, 39, 370, '6055844cc1bd6', 1, 0, NULL, 1, 0, '2021-03-20 05:12:44', NULL),
(17, 40, 372, '605584ad6d6ad', 1, 0, NULL, 1, 0, '2021-03-20 05:14:21', NULL),
(18, 41, 371, '605585de9480f', 1, 0, NULL, 1, 0, '2021-03-20 05:19:26', NULL),
(19, 45, 370, '6059b8f01a919', 1, 0, NULL, 1, 0, '2021-03-23 09:46:24', NULL),
(20, 48, 370, '605c6d509403c', 1, 0, NULL, 1, 0, '2021-03-25 11:00:32', NULL),
(21, 54, 376, '605cdbb87529a', 1, 1, 6, 0, 0, '2021-03-25 18:51:36', '2021-03-25 18:59:49'),
(22, 55, 371, '605cdccda22d1', 1, 1, 6, 0, 0, '2021-03-25 18:56:13', '2021-03-25 18:59:24'),
(23, 56, 372, '605cded2336af', 1, 1, 4, 0, 0, '2021-03-25 19:04:50', '2021-03-25 19:07:38'),
(24, 57, 376, '605ce46013785', 1, 1, 7, 0, 0, '2021-03-25 19:28:32', '2021-03-25 19:33:44'),
(25, NULL, 386, '605CE739E072B', 1, 1, 7, 0, 0, '2021-03-25 19:40:41', '2021-03-25 19:41:17'),
(26, NULL, 387, '605CE84B5275B', 1, 1, 4, 0, 0, '2021-03-25 19:45:15', '2021-03-25 19:46:56'),
(27, NULL, 388, '605D8F1B4A266', 1, 1, 4, 0, 0, '2021-03-26 07:36:59', '2021-03-26 07:39:06'),
(28, NULL, 390, '6062113123F7A', 1, 0, NULL, 1, 0, '2021-03-29 17:41:05', NULL),
(29, NULL, 403, '60630BCECD7C3', 1, 0, NULL, 1, 0, '2021-03-30 11:30:22', NULL),
(30, 62, 370, '60681e27b1976', 1, 0, NULL, 1, 0, '2021-04-03 07:49:59', NULL),
(31, 63, 370, '60681f254916c', 1, 0, NULL, 1, 0, '2021-04-03 07:54:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `google_analytics`
--

CREATE TABLE `google_analytics` (
  `id` int(10) NOT NULL,
  `google_analytics_code` varchar(500) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `google_analytics`
--

INSERT INTO `google_analytics` (`id`, `google_analytics_code`, `updated_id`, `updated_at`) VALUES
(1, '', 1, '2021-04-18 21:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `tel_phone_number` varchar(50) NOT NULL,
  `fax_number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `map_embed_code` text NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `address`, `tel_phone_number`, `fax_number`, `email`, `map_embed_code`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'UB Emirates LLC - Branch', 'P.O. Box 52459 <br>\r\nAbu Dhabi, Branch, <br>\r\nUnited Arab Emirates ', '+971 2 5504949', '+971 2 5504944', 'ubadh@ubemirates.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.768055086523!2d55.26907412433019!3d25.24473608249357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai+-+United+Arab+Emirates!5e0!3m2!1sen!2sin!4v1559890978329!5m2!1sen!2sin\" width=\"100%\" height=\"430\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 1, 0, '2019-04-20 09:06:48', '2019-06-07 09:03:22'),
(3, 'UBE Electrical Trading', 'P.O.Box 20196 <br>\r\nDubai,3 <br>\r\nUnited Arab Emirates ', '+971 4 2382249', '+971 4 2382289', 'info@ubemirates.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2022.4024110197886!2d55.45886772497684!3d25.42115896617587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai+-+United+Arab+Emirates!5e0!3m2!1sen!2sin!4v1559891056152!5m2!1sen!2sin\" width=\"100%\" height=\"430\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 1, 2, '2019-04-20 09:12:11', '2019-06-07 09:04:35'),
(4, 'UB EMIRATES LLC - BRANCH', 'P.O. Box 22244 <br>\r\nAjman Branch, <br>\r\nUnited Arab Emirates', '+971 6 7489394', '+971 6 7487975', 'electrical@ubemirates.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7226.015585909511!2d55.228031571050316!3d25.101597540474017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai+-+United+Arab+Emirates!5e0!3m2!1sen!2sin!4v1559890419078!5m2!1sen!2sin\" width=\"100%\" height=\"430\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 1, 1, '2019-04-20 13:02:41', '2019-06-07 08:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `main_category_new`
--

CREATE TABLE `main_category_new` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `url` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category_new`
--

INSERT INTO `main_category_new` (`id`, `name`, `display_order`, `is_active`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(46, 'Air fresher Refills', 1, 1, 'air-fresher-refills', '2020-06-09 06:05:33', 1, '0000-00-00 00:00:00', 0),
(47, 'Bags', 2, 1, 'bags', '2020-06-09 06:05:45', 1, '0000-00-00 00:00:00', 0),
(48, 'Chemicals', 3, 1, 'chemicals', '2020-06-09 06:06:01', 1, '0000-00-00 00:00:00', 0),
(49, 'Cleaning Equipments', 4, 1, 'cleaning-equipments', '2020-06-09 06:06:15', 1, '0000-00-00 00:00:00', 0),
(50, 'Cleaning Sponge', 5, 1, 'cleaning-sponge', '2020-06-09 06:06:32', 1, '0000-00-00 00:00:00', 0),
(51, 'Diffusers', 6, 1, 'diffusers', '2020-06-09 06:07:49', 1, '0000-00-00 00:00:00', 0),
(52, 'Dispensers', 7, 1, 'dispensers', '2020-06-09 06:08:23', 1, '0000-00-00 00:00:00', 0),
(53, 'Gloves', 8, 1, 'gloves', '2020-06-09 06:08:44', 1, '0000-00-00 00:00:00', 0),
(54, 'Personal Protective Equipments', 9, 1, 'personal-protective-equipments', '2020-06-09 06:09:01', 1, '0000-00-00 00:00:00', 0),
(55, 'Sanitizer', 10, 1, 'sanitizer', '2020-06-09 06:09:21', 1, '0000-00-00 00:00:00', 0),
(56, 'Tissue', 11, 1, 'tissue', '2020-06-09 08:16:07', 1, '0000-00-00 00:00:00', 0),
(57, 'asdfasdf', 2, 1, 'asdfasdf', '2020-06-25 19:26:01', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `metal`
--

CREATE TABLE `metal` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `display_order` int(2) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metal`
--

INSERT INTO `metal` (`id`, `title`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `is_active`, `display_order`, `updated_at`, `created_at`) VALUES
(3, 'Gold', 'gold', NULL, NULL, NULL, 1, 0, '2021-04-17 08:34:46', '2021-04-17 08:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_slug` text NOT NULL,
  `blog_url` varchar(250) NOT NULL,
  `blog_author` varchar(100) NOT NULL,
  `blog_date` date NOT NULL,
  `image_caption` varchar(200) NOT NULL,
  `blog_image` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `meta_description` varchar(2000) NOT NULL,
  `display_order` int(50) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `blog_title`, `blog_slug`, `blog_url`, `blog_author`, `blog_date`, `image_caption`, `blog_image`, `description`, `likes`, `meta_title`, `meta_keyword`, `meta_description`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(55, 0, 'Dhofar Global aiming to clean out competition', 'dhofar-global-aiming-to-clean-out-competition', '', 'Ed Clowes, Staff Reporter', '2017-11-02', '', 'uploads/blog/news1.jpg', '<p style=\"text-align: justify;\">The corporate hygiene sector will undergo a large shake-up in 2018, with smaller players in the market likely to be squeezed out, according to a senior industry executive.</p>\r\n\r\n<p style=\"text-align: justify;\">The industry, which supplies things like paper towel dispensers, wet wipes, air fresheners, soaps and other chemicals, is still fragmented, according to Chandan Singh, CEO of Dhofar Global.</p>\r\n\r\n<p style=\"text-align: justify;\">Dhofar Global is one of the largest suppliers of such products to hotels and retailers in the UAE, with Singh claiming to control 70 per cent of the market.</p>\r\n\r\n<p style=\"text-align: justify;\">This is only set to increase, he says.</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;You will see more changes coming in the second quarter of 2018,&rdquo; Singh said, adding: &ldquo;In business, when any turbulence comes, the bottom people get affected.&rdquo;</p>\r\n\r\n<p style=\"text-align: justify;\">The turbulence Singh is referring to is the arrival of the value added tax (VAT).</p>\r\n\r\n<p style=\"text-align: justify;\">The UAE and Saudi Arabia are among the first countries in the Gulf to implement the 5 per cent tax on goods and services starting January 1, 2018. It is expected to provide a new source of revenue for governments to spend on infrastructure and other public services.</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;In business, [when] any turbulence comes, the bottom people &hellip; get affected because they don&rsquo;t have cash to manage the business, and the big fish manage the whole thing,&rdquo; he said.</p>\r\n\r\n<p style=\"text-align: justify;\">This coming change would ultimately see the &ldquo;big fish manage the whole thing&rdquo;, Singh added.</p>\r\n\r\n<p style=\"text-align: justify;\">According to the CEO, factors such as cash flow and financial strength would see the &ldquo;best&rdquo; companies retain the market.</p>\r\n\r\n<p style=\"text-align: justify;\">Singh conceded that these top firms in the market might see a slight impact on their margins from VAT, but added that the companies at the bottom may very well have to close down their businesses.</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;They cannot sustain the kinds of margins that will be shrunk &hellip;[in the end] only the top five yield guys will still be there, and out of the top five, only the top three guys will be earning profit,&rdquo; Singh said.</p>\r\n\r\n<p style=\"text-align: justify;\">Rather than acquiring these smaller companies, Singh said that these smaller companies were likely to simply become &ldquo;victims of business,&rdquo; and Dhofar would scoop up the contracts.</p>\r\n\r\n<p style=\"text-align: justify;\">To keep pace with a rapidly changing industry, Dhofar Global, an Omani company which has contracts with hotel groups including Emaar and AccorHotels Group, is looking to distance itself from the competition.</p>\r\n\r\n<p style=\"text-align: justify;\">This will be achieved through the introduction of a new business model.</p>\r\n\r\n<p style=\"text-align: justify;\">According to Singh, the company conducted a market evaluation this year, assessing the strengths of Dhofar&rsquo;s competitors.</p>\r\n\r\n<p style=\"text-align: justify;\">The CEO says that he realised his company&rsquo;s strength was supplying end to end solutions instead of individual products. Following Dhofar&rsquo;s pivot from a supplier to a solutions provider, Singh says that the Omani company won around 170 large contracts from its competitors.</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;The strength we have is being able to offer everything. [Our competitors] don&rsquo;t have chemicals, don&rsquo;t have tools. If we have a challenge with the tissue, we can offer chemicals, and the tissue and chemical go as a combo,&rdquo; Singh said.</p>\r\n\r\n<p style=\"text-align: justify;\">&ldquo;We will kill the competition then and there,&rdquo; he added.</p>\r\n\r\n<p style=\"text-align: justify;\">News Credit: <a href=\"https://gulfnews.com/business/tourism/dhofar-global-aiming-to-clean-out-competition-1.2117901\" style=\"text-decoration:none;\" target=\"_blank\">Gulf News</a></p>\r\n', 1, 'News | Dhofar Global', '', '', 0, 1, '2020-06-08 16:10:30', '2020-06-08 16:56:18'),
(56, 0, 'Dhofar Global signs up AccorHotels in the UAE', 'dhofar-global-signs-up-accorhotels-in-the-uae', '', 'Diane Fermin Roeder', '2017-08-13', '', 'uploads/blog/news2.jpg', '<p style=\"text-align: justify;\">Hygiene products supplier Dhofar Global has signed an agreement with AccorHotels for the group&#39;s operating hotels in the UAE, Oman, Bahrain and the Seychelles.</p>\r\n\r\n<p style=\"text-align: justify;\">The deal supports Dhofar Global&rsquo;s ongoing expansion into new markets, while adding to its growing list of clients in the hospitality sector.</p>\r\n\r\n<p style=\"text-align: justify;\">Dhofar Global CEO Chandan Singh said: &ldquo;The new agreement signed with AccorHotels reflects Dhofar Global&rsquo;s efforts to continuously broaden its horizons and infiltrate new markets all over the world. This is an opportunity for us to expand our dynamic international portfolio of hospitality clients, while reiterating our commitment to supplying our customers with only the highest quality cleaning and hygiene products. We are pleased to be working alongside AccorHotels to ensure the highest level of hygiene in its hotels across the UAE, Oman, Bahrain and the Seychelles.&rdquo;</p>\r\n\r\n<p style=\"text-align: justify;\">News Credit: <a href=\"https://www.hoteliermiddleeast.com/31400-dhofar-global-signs-up-accorhotels-in-the-uae\" style=\"text-decoration:none;\" target=\"_blank\">Hotelier</a></p>\r\n', 1, 'News | Dhofar Global', '', '', 0, 1, '2020-06-08 16:17:23', '0000-00-00 00:00:00'),
(57, 0, 'Dhofar Global Signs Agreement With Gromaxx Hotel Management', 'dhofar-global-signs-agreement-with-gromaxx-hotel-management', '', 'Admin', '2017-08-29', '', 'uploads/blog/news3.jpg', '<p style=\"text-align: justify;\">Dhofar Global, a leading supplier of hygiene care products in the Middle East, recently announced that it has signed an agreement with Gromaxx Hotel Management, a leading hotel management company in the UAE. Dhofar Global will supply world-class cleaning and hygiene products such as dispensers and consumables for the head office of Gromaxx and the 12 hotels managed by company, some of which include the Ramada Hotel Abu Dhabi, TRYP by Wyndham Abu Dhabi, Howard Johnson Bur Dubai, Hawthorn Suites by Wyndham Abu Dhabi, City Plaza Hotel Fujairah, Eclipse Hotel Apartment Abu Dhabi, and Ivory Hotel Apartments Abu Dhabi.</p>\r\n\r\n<p style=\"text-align: justify;\">As a one of the country&rsquo;s leading hotel management groups, Gromaxx Hotel Management operates a range of high-quality hotels across the emirates of Abu Dhabi, Dubai and Fujairah. These hotels are all conveniently located in close proximity to business districts, and offer guests a choice of stylish yet comfortable rooms and suites that places Gromaxx at the forefront of their industry. Gromaxx&rsquo;s hospitality services encompass all realms of the sector including operations in hotel management and an array of other associated hotel services including industrial laundry, hotel supplies and interiors among others.</p>\r\n\r\n<p style=\"text-align: justify;\">Chandan Singh, CEO of Dhofar Global, said: &ldquo;This new agreement signed with Gromaxx Hotel Management forms part of our continuous efforts to support the hospitality industry in the UAE while reinforcing our drive to broaden our horizons and ensure the happiness of all our current and future customers. This agreement is a new opportunity for us to add to our growing portfolio of clients in the hospitality industry, and allows us to highlight our commitment to providing only the highest-quality cleaning products, on par with the highest international standards. We are excited to begin this new partnership with Gromaxx, to ensure the highest level of hygiene throughout its portfolio of hotels in the UAE.&rdquo;</p>\r\n\r\n<p style=\"text-align: justify;\">Dhofar Global was established to offer clients the best international-standard hygiene products at a competitive price, and has now expanded throughout the Middle East and parts of Asia. As a market leader, Dhofar Global has been catering to the hospitality industry, the banking sector, government ministries, and other prominent private sector corporations for the last ten years.</p>\r\n\r\n<p style=\"text-align: justify;\">News Credit: <a href=\"https://www.albawaba.com/business/pr/dhofar-global-signs-agreement-gromaxx-hotel-management-1015712\" style=\"text-decoration:none;\" target=\"_blank\">albawaba</a></p>\r\n', 3, 'News | Dhofar Global', '', '', 0, 1, '2020-06-08 16:28:15', '2020-06-27 14:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `news_like`
--

CREATE TABLE `news_like` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_like`
--

INSERT INTO `news_like` (`id`, `news_id`, `ip_address`, `created_date`) VALUES
(9, 55, '157.50.171.7', '2020-06-09 04:06:58'),
(10, 57, '43.241.146.193', '2020-06-09 12:52:47'),
(16, 57, '43.250.156.44', '2020-06-10 01:07:54'),
(18, 56, '43.250.156.44', '2020-06-10 01:10:53'),
(19, 57, '157.51.206.127', '2020-06-10 03:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `news_media`
--

CREATE TABLE `news_media` (
  `id` int(11) NOT NULL,
  `blog_media_type_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `video_link` text NOT NULL,
  `video_file` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_media`
--

INSERT INTO `news_media` (`id`, `blog_media_type_id`, `blog_id`, `caption`, `image_path`, `video_link`, `video_file`, `created_at`, `updated_at`) VALUES
(8, 1, 51, '', 'uploads/blog-image/latestnews52.jpg', '', '', '2020-04-02 08:22:24', '0000-00-00 00:00:00'),
(9, 1, 51, '', 'uploads/blog-image/latestnews521.jpg', '', '', '2020-04-02 08:22:49', '0000-00-00 00:00:00'),
(10, 2, 51, '', '', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bGtxumJGRzE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2020-04-02 08:24:49', '0000-00-00 00:00:00'),
(11, 1, 53, '', 'uploads/blog-image/bg-4.jpg', '', '', '2020-05-06 09:57:23', '0000-00-00 00:00:00'),
(12, 1, 54, '', 'uploads/blog-image/dgaco1.jpg', '', '', '2020-06-03 20:25:21', '0000-00-00 00:00:00'),
(13, 2, 54, '', '', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6WOO52ahhX8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2020-06-03 20:25:41', '0000-00-00 00:00:00'),
(14, 1, 57, '', 'uploads/blog-image/image.jpeg', '', '', '2020-06-18 03:42:19', '0000-00-00 00:00:00'),
(16, 3, 57, '', '', '', 'uploads/blog-video/new_video.mp4', '2020-06-21 00:06:40', '2020-06-25 11:33:59'),
(17, 2, 57, '', '', '<iframe width=\"100%\" height=\"auto\" src=\"https://www.youtube.com/embed/rOax50EDIZQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', '2020-06-25 13:03:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `custom_orderid` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shipping_first_name` varchar(510) NOT NULL,
  `shipping_last_name` varchar(510) NOT NULL,
  `shipping_email` varchar(510) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_pincode` varchar(255) NOT NULL,
  `shipping_state` int(11) NOT NULL,
  `shipping_city` varchar(510) NOT NULL,
  `shipping_country` varchar(510) NOT NULL,
  `shipping_address` text NOT NULL,
  `is_billing_same` tinyint(1) NOT NULL DEFAULT 1,
  `billing_first_name` varchar(510) NOT NULL,
  `billing_last_name` varchar(510) DEFAULT NULL,
  `billing_email` varchar(510) DEFAULT NULL,
  `billing_phone` varchar(510) DEFAULT NULL,
  `billing_pincode` varchar(255) DEFAULT NULL,
  `billing_state` int(11) DEFAULT NULL,
  `billing_city` varchar(510) NOT NULL,
  `billing_country` varchar(510) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `order_status` enum('confirmed','shipped','delivered') NOT NULL DEFAULT 'confirmed',
  `order_date` datetime NOT NULL,
  `delivery_charges` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `gst` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `razorpay_payment_id` text NOT NULL,
  `razorpay_order_id` text NOT NULL,
  `razorpay_signature` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `custom_orderid`, `user_id`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone`, `shipping_pincode`, `shipping_state`, `shipping_city`, `shipping_country`, `shipping_address`, `is_billing_same`, `billing_first_name`, `billing_last_name`, `billing_email`, `billing_phone`, `billing_pincode`, `billing_state`, `billing_city`, `billing_country`, `billing_address`, `order_status`, `order_date`, `delivery_charges`, `discount`, `promo_code`, `sub_total`, `gst`, `paid_amount`, `razorpay_payment_id`, `razorpay_order_id`, `razorpay_signature`, `created_at`, `updated_at`) VALUES
(1, 'PAMP21042900001', 6, 'Muhammad', 'Alfaiz', 'alfaizm19@gmail.com', '1234567890', '200111', 31, '', 'india', 'test', 1, '', '', '', '', '', 0, '', 'india', '', 'confirmed', '2021-04-29 17:51:58', '0.00', '0.00', NULL, '81500.00', '2445.00', '81500.00', 'pay_H4iYbch55wwVnY', 'order_H4iYNoQM4peoyI', '34d1725a11abe225846d4f6371ff08a4d74b8ff1678ec12f452d0c96f91724dd', '2021-04-29 12:21:58', NULL),
(2, 'PAMP21043000002', 6, 'Muhammad', 'Alfaiz', 'alfaizm19@gmail.com', '9876543210', '200114', 34, '', 'india', '28/349 GM Agra', 1, '', '', '', '', '', 0, '', 'india', '', 'confirmed', '2021-04-30 08:03:24', '0.00', '0.00', NULL, '81500.00', '2445.00', '81500.00', 'pay_H4y8Jsq2SHkTuF', 'order_H4y7wsRAICsI93', 'ec4d92eb88614a153b673daea551a9ce69e8e6a0905573f93d8569ca2f3e25e1', '2021-04-30 02:33:24', NULL),
(3, 'PAMP21043000003', 6, 'Test', 'Test', 'test@gmail.com', '9876543210', '200111', 34, '', 'india', 'Sector 120', 1, '', '', '', '', '', 0, '', 'india', '', 'confirmed', '2021-04-30 08:09:17', '0.00', '0.00', NULL, '5000.00', '150.00', '5000.00', 'pay_H4yEWi5xLKwR6P', 'order_H4yEEAfs5aPIoV', 'f72a0b755946b26cfa0de8d0427cd907508bb2c4216ecbcb95cd63ba8fab4522', '2021-04-30 02:39:17', NULL),
(4, 'PAMP21043000004', 6, 'Muhammad', 'Alfaiz', 'alfaizm19@gmail.com', '9876543210', '200111', 33, 'Agra', 'india', 'Test', 1, '', '', '', '', '', 0, '', 'india', '', 'confirmed', '2021-04-30 11:30:54', '0.00', '0.00', NULL, '10000.00', '300.00', '10000.00', 'pay_H51fVkFWjxQbmB', 'order_H51fDMEwUekKTF', 'f03a695d7337ae1a4ea1608003e0a2ac2b2162e953539312dc4578b70686e728', '2021-04-30 06:00:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 40000.00, 2, '2021-04-29 12:21:58', NULL),
(2, 1, 16, 1500.00, 1, '2021-04-29 12:21:58', NULL),
(3, 2, 13, 40000.00, 2, '2021-04-30 02:33:24', NULL),
(4, 2, 16, 1500.00, 1, '2021-04-30 02:33:24', NULL),
(5, 3, 12, 5000.00, 1, '2021-04-30 02:39:17', NULL),
(6, 4, 12, 5000.00, 2, '2021-04-30 06:00:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(10) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `banner_image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_description` int(11) NOT NULL,
  `video_type` int(1) NOT NULL,
  `page_video` varchar(255) NOT NULL,
  `video_embed_code` text NOT NULL,
  `video_image` varchar(255) NOT NULL,
  `about_us_title1` varchar(100) NOT NULL,
  `about_us_title2` varchar(100) NOT NULL,
  `about_us_description` text NOT NULL,
  `project_title_1` varchar(100) NOT NULL,
  `project_title_2` varchar(100) NOT NULL,
  `feature_1` varchar(100) NOT NULL,
  `feature_2` varchar(100) NOT NULL,
  `feature_3` varchar(100) NOT NULL,
  `feature_4` varchar(100) NOT NULL,
  `about_company_image` varchar(100) NOT NULL,
  `about_company_video` varchar(255) NOT NULL,
  `about_video_embed_code` text NOT NULL,
  `brand_title1` varchar(100) NOT NULL,
  `brand_title2` varchar(100) NOT NULL,
  `brand_description` text NOT NULL,
  `contact_us_title` varchar(255) NOT NULL,
  `blog_title1` varchar(200) NOT NULL,
  `blog_title2` varchar(200) NOT NULL,
  `blog_description` text NOT NULL,
  `company_title1` varchar(200) NOT NULL,
  `company_title2` varchar(200) NOT NULL,
  `company_advantage_title` varchar(200) NOT NULL,
  `company_advantage_description` text NOT NULL,
  `company_description` text NOT NULL,
  `company_advantage_description1` text NOT NULL,
  `company_image` varchar(500) NOT NULL,
  `company_catalogue` varchar(500) NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `client_title` varchar(200) NOT NULL,
  `client_description` text NOT NULL,
  `contact_us_description` varchar(500) NOT NULL,
  `contact_location_title` varchar(255) NOT NULL,
  `contact_location_description` text NOT NULL,
  `right_image` varchar(500) NOT NULL,
  `catalogue_image` varchar(500) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `feature1_icon` varchar(255) DEFAULT NULL,
  `feature1_title` varchar(255) DEFAULT NULL,
  `feature1_description` varchar(255) DEFAULT NULL,
  `feature2_icon` varchar(255) DEFAULT NULL,
  `feature2_title` varchar(255) DEFAULT NULL,
  `feature2_description` varchar(255) DEFAULT NULL,
  `feature3_icon` varchar(255) DEFAULT NULL,
  `feature3_title` varchar(255) DEFAULT NULL,
  `feature3_description` varchar(255) DEFAULT NULL,
  `feature4_icon` varchar(255) DEFAULT NULL,
  `feature4_title` varchar(255) DEFAULT NULL,
  `feature4_description` varchar(255) DEFAULT NULL,
  `feature5_icon` varchar(255) NOT NULL,
  `feature5_title` varchar(255) NOT NULL,
  `feature5_description` varchar(255) NOT NULL,
  `feature6_icon` varchar(255) NOT NULL,
  `feature6_title` varchar(255) NOT NULL,
  `feature6_description` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='0';

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_name`, `title`, `banner_image_path`, `description`, `is_description`, `video_type`, `page_video`, `video_embed_code`, `video_image`, `about_us_title1`, `about_us_title2`, `about_us_description`, `project_title_1`, `project_title_2`, `feature_1`, `feature_2`, `feature_3`, `feature_4`, `about_company_image`, `about_company_video`, `about_video_embed_code`, `brand_title1`, `brand_title2`, `brand_description`, `contact_us_title`, `blog_title1`, `blog_title2`, `blog_description`, `company_title1`, `company_title2`, `company_advantage_title`, `company_advantage_description`, `company_description`, `company_advantage_description1`, `company_image`, `company_catalogue`, `mission`, `vision`, `client_title`, `client_description`, `contact_us_description`, `contact_location_title`, `contact_location_description`, `right_image`, `catalogue_image`, `meta_title`, `meta_keyword`, `meta_description`, `feature1_icon`, `feature1_title`, `feature1_description`, `feature2_icon`, `feature2_title`, `feature2_description`, `feature3_icon`, `feature3_title`, `feature3_description`, `feature4_icon`, `feature4_title`, `feature4_description`, `feature5_icon`, `feature5_title`, `feature5_description`, `feature6_icon`, `feature6_title`, `feature6_description`, `is_active`, `updated_at`, `created_at`) VALUES
(1, 'Home', 'Vinita Michael', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vinita Michael Celeb Style Trending &amp; Fashionable Jewellery', '', 'Browse the stunning range of Vinita Michael celebrity style trending and fashionable men and women jewellery online including earrings, rings, bracelets, cufflinks and many more at an exciting range of prices. Vinita Michael is an award winning jewellery designer and gemologist. Visit us now!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-19 12:08:15', '0000-00-00 00:00:00'),
(10, 'Contact Us', 'Contact Us', 'uploads/page/banner-image/banners-contact.png', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Contact Us', 'Contact Us Keyword', 'Contact Us Description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-25 07:34:31', '0000-00-00 00:00:00'),
(11, 'Blog', 'Our Blog', 'uploads/page/banner-image/blogs-banner.jpg', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blog | Vinita Michael', 'Designer Jeweler in Dubai', 'Best designer jeweler in Dubai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-30 04:11:12', '0000-00-00 00:00:00'),
(17, 'Refund Policy', 'Refund', 'uploads/page/banner-image/inner-banners.png', '<p style=\"text-align: justify;\">No refunds or returns can be claimed for any reason unless the product you purchase is damaged when it arrives. In case of damage please reach out to us with a clear picture of the damaged area and proof of receipt date within 24 hours of receipt of the merchandise. The cost of the return shipping will be borne by the customer. Upon receipt of the damaged merchandise the customer will be offered store credit equal to the value of the returned merchandise.&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">We can be reached at <a href=\"mailto:vinita@vinitamichael.com\" style=\"text-decoration:none;\"><span style=\"color:#757b7e;\">vinita@vinitamichael.com</span></a> or via whatsapp at +971-50-7092290 between 8am- 5pm GST (Gulf Standard Time), Sunday to Thursday.</p>\r\n', 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Refund Policy', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-25 10:17:07', '0000-00-00 00:00:00'),
(18, 'Terms & Conditions', 'Terms & Conditions', 'uploads/page/banner-image/innerbanner.png', '<p style=\"text-align: justify;\"><strong>Use of the Website</strong></p>\r\n\r\n<p style=\"text-align: justify;\">By accessing the website, you warrant and represent to the website owner that you are legally entitled to do so and to make use of information made available via the website.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Trademarks</strong></p>\r\n\r\n<p style=\"text-align: justify;\">The trademarks, names, logos and service marks (collectively &ldquo;trademarks&rdquo;) displayed on this website are registered and unregistered trademarks of the website owner. Nothing contained on this website should be construed as granting any license or right to use any trademark without the prior written permission of the website owner.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>External links</strong></p>\r\n\r\n<p style=\"text-align: justify;\">External links may be provided for your convenience, but they are beyond the control of the website owner and no representation is made as to their content. Use or reliance on any external links and the content thereon provided is at your own risk.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Warranties</strong></p>\r\n\r\n<p style=\"text-align: justify;\">The website owner makes no warranties, representations, statements or guarantees (whether express, implied in law or residual) regarding the website.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Prices</strong></p>\r\n\r\n<p style=\"text-align: justify;\">Our pricing is calculated using current precious metal and gem prices to give you the best possible value. These prices do change from time to time, owing to the fluctuations in prices of precious metal and gem prices, so our prices change as well. Prices on vinitamichael.com are subject to change without notice. Please expect to be charged the price for the vinitamichael.com merchandise you buy as it is listed on the day of purchase.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Disclaimer of liability</strong></p>\r\n\r\n<p style=\"text-align: justify;\">The website owner shall not be responsible for and disclaims all liability for any loss, liability, damage (whether direct, indirect or consequential), personal injury or expense of any nature whatsoever which may be suffered by you or any third party (including your company), as a result of or which may be attributable, directly or indirectly, to your access and use of the website, any information contained on the website, your or your company&rsquo;s personal information or material and information transmitted over our system. In particular, neither the website owner nor any third party or data or content provider shall be liable in any way to you or to any other person, firm or corporation whatsoever for any loss, liability, damage (whether direct or consequential), personal injury or expense of any nature whatsoever arising from any delays, inaccuracies, errors in, or omission of any share price information or the transmission thereof, or for any actions taken in reliance thereon or occasioned thereby or by reason of non-performance or interruption, or termination thereof. We as a merchant shall be under no liability whatsoever in respect of any loss or damage arising directly or indirectly out of the decline of authorization for any Transaction, on Account of the Cardholder having exceeded the preset limit mutually agreed by us with our acquiring bank from time to time.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Conflict of terms</strong></p>\r\n\r\n<p style=\"text-align: justify;\">If there is a conflict or contradiction between the provisions of these website terms and conditions and any other relevant terms and conditions, policies or notices, the other relevant terms and conditions, policies or notices which relate specifically to a particular section or module of the website shall prevail in respect of your use of the relevant section or module of the website.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Severability</strong></p>\r\n\r\n<p style=\"text-align: justify;\">Any provision of any relevant terms and conditions, policies and notices, which is or&nbsp;becomes unenforceable in any jurisdiction, whether due to being void, invalidity, illegality, unlawfulness or for any reason whatever, shall, in such jurisdiction only and only to the extent that it is so unenforceable, be treated as void and the remaining provisions of any relevant terms and conditions, policies and notices shall remain in full force and effect.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Applicable laws (choice of venue and forum)</strong></p>\r\n\r\n<p style=\"text-align: justify;\">Use of this website shall in all respects be governed by the laws of the UAE, regardless of the laws that might be applicable under principles of conflicts of law. The parties agree that the courts located in UAE, shall have exclusive jurisdiction over all controversies arising under this agreement and agree that venue is proper in those courts.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Shipping</strong></p>\r\n\r\n<p style=\"text-align: justify;\">Vinita Michael provides free delivery/shipping on all items within UAE for international shipping the fees will be calculated during the checkout process. Fulfillment time is 24-48hrs for &ldquo;Available in Stock&rdquo; items and 10 business days for &ldquo;Make to Order&rdquo; items.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Customs &amp; Duties</strong></p>\r\n\r\n<p style=\"text-align: justify;\">For orders that is being shipped outside of the United Arab Emirates, the customer may be subject to import taxes, customs duties and fees levied by the destination country. The customer must assume additional charges for customs clearance, vinitamichael.com has no control over these charges and cannot predict what they may total.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Returns</strong></p>\r\n\r\n<p style=\"text-align: justify;\">PolicyNo refunds or returns can be claimed for any reason unless the product you purchase is damaged when it arrives. In case of damage please reach out to us with a clear picture&nbsp;of the damaged area and proof of receipt date within 24 hours of receipt of the merchandise. The cost of the return shipping will be borne by the customer. Upon receipt of the damaged merchandise the customer will be offered store credit equal to the value of the returned merchandise.</p>\r\n\r\n<p style=\"text-align: justify;\">We can be reached at vinita@vinitamichael.com or at +971-50-7092290 between 8am- 5pm GST (Gulf Standard Time), Sunday to Thursday.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Physical Address:</strong></p>\r\n\r\n<p style=\"text-align: justify;\">Vinita Michael FZE, Creative City, P.O. Box 4422, Fujairah, UAE</p>\r\n', 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Terms & Conditions | Vinita Michael', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-30 04:12:17', '0000-00-00 00:00:00'),
(23, 'Ships in 24 Hours', 'SHIPS IN 24 HOURS', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ships in 24 Hours | Vinita Michael', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-30 04:11:56', '0000-00-00 00:00:00'),
(32, 'Celeb Style', 'CELEBRITIES SPOTTED WEARING VINITA MICHAEL', 'uploads/page/banner-image/celeb_bg.png', '<p>Bold and edgy, our designs are sported by A-list celebrities and fashion influencers worldwide. Get inspired and shop our &#39;Celeb Style&#39; picks here !</p>\r\n', 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Celebrity  – Vinita Michael', '', 'CELEBRITIES SPOTTED WEARING VINITA MICHAEL Bold and edgy, our designs are sported by A-list celebrities and fashion influencers worldwide. Get inspired and shop our \'Celeb Style\' picks here!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-26 09:19:34', '0000-00-00 00:00:00'),
(34, 'Designer Profile', 'Vinita Michael', 'uploads/page/banner-image/designer.png', '<p>Award winning jewelry designer and gemologist, Vinita&rsquo;s eponymous label strives to bring together the magnificence of unique design conceptualizations and intricate craftsmanship, in the form of jewelry and precious lifestyle products. Filigree, Repousse&#39;, Chasing, Engraving and Etching are some of the many rich metal crafts of the Indian Subcontinent that have encouraged her to experiment with the limitless possibilities in exploring the metallic surface.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Today, Vinita specializes in both Fine Gold set with precious gems and Sterling Silver jewelry. Her pieces have adorned Bollywood celebrities such as<span style=\"color:null;\"><strong> </strong>Priyanka Chopra, Sonam Kapoor, Deepika Padukone and Jacqueline Fernandez</span>, to name a few.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Besides developing collections for her own line, Vinita also works on special commissioned projects for international fashion and jewelry brands such as Swarovski TRESemm&eacute; Arabia, Bluestone, Monsieur Fox, Al Mahmood Pearls, Amrapali Jewels, Anmol Jewellers, World Gold Council and Mikura Pearls, to name a few.</p>\r\n', 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The designer  – Vinita Michael', '', 'Vinita Michael Award winning jewelry designer and gemologist, Vinita\'s eponymous label strives to bring together the magnificence of unique design conceptualizations and intricate craftsmanship, in the form of jewelry and precious lifestyle products. Filigree, Repousse\', Chasing, Engraving and Etching are some of the m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-26 10:20:49', '0000-00-00 00:00:00'),
(35, 'Personalized', 'Personalized', 'uploads/page/banner-image/banners-contact.png', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Personalized | Vinita Michael', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-30 04:13:09', '0000-00-00 00:00:00'),
(36, 'Shipping & Delivery', 'Shipping & Delivery', 'uploads/page/banner-image/innerbanner.png', '<p style=\"text-align: justify;\"><strong>Shipping</strong></p>\r\n\r\n<p style=\"text-align: justify;\">Vinita Michael provides free delivery/shipping on all items within UAE. For international shipping, the fees will be calculated during the checkout process. Fulfillment time is 24-48hrs for &ldquo;Available in Stock&rdquo; items and 7-10 business days for &ldquo;Make to Order&rdquo; items.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>Customs &amp; Duties</strong></p>\r\n\r\n<p style=\"text-align: justify;\">For orders that are being shipped outside of the United Arab Emirates, the customer may be subject to import taxes, customs duties and fees levied by the destination country. The customer must assume additional charges for customs clearance, vinitamichael.com has no control over these charges and cannot predict what they may total.</p>\r\n', 1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Shipping & Delivery | Vinita Michael', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 1, '2021-03-30 04:12:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `paid_amount` varchar(100) NOT NULL,
  `paid_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `unique_id` text NOT NULL,
  `type` enum('1','2') NOT NULL,
  `template` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `unique_id`, `type`, `template`, `created_date`) VALUES
(1, '605', '1', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"test\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\">\r\n											<label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n												<a target=\"_blank\" href=\"http://localhost/vinita-michel/print/gift-card/605dc57687ea4/1\" style=\"color: white;text-decoration: none;\">Print</a>\r\n											</label>\r\n										</h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 11:28:54'),
(2, '605', '2', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">To:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"alfaizm19@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">From:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"alfaizm19@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"test\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n											<a target=\"_blank\" href=\"http://localhost/vinita-michel/print/gift-card/605dc57b63fa4/2\" style=\"color: white;text-decoration: none;\">\r\n												Print\r\n											</a>\r\n										</label></h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 11:28:59'),
(3, '605dc70c284c5', '1', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"test\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\">\r\n											<label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n												<a target=\"_blank\" href=\"http://localhost/vinita-michel/print/gift-card/605dc70c284c5/1\" style=\"color: white;text-decoration: none;\">Print</a>\r\n											</label>\r\n										</h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 11:35:40'),
(4, '605dc710a1074', '2', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">To:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"alfaizm19@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">From:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"alfaizm19@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"test\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n											<a target=\"_blank\" href=\"http://localhost/vinita-michel/print/gift-card/605dc710a1074/2\" style=\"color: white;text-decoration: none;\">\r\n												Print\r\n											</a>\r\n										</label></h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 11:35:44'),
(5, '605dc7a4a732f', '1', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"test\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\">\r\n											<label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n												<a target=\"_blank\" href=\"http://localhost/vinita-michel/print/gift-card/605dc7a4a732f/1\" style=\"color: white;text-decoration: none;\">Print</a>\r\n											</label>\r\n										</h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 11:38:12'),
(6, '605dc7a8b42ae', '2', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">To:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"alfaizm19@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">From:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"alfaizm19@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"test\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n											<a target=\"_blank\" href=\"http://localhost/vinita-michel/print/gift-card/605dc7a8b42ae/2\" style=\"color: white;text-decoration: none;\">\r\n												Print\r\n											</a>\r\n										</label></h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 11:38:16');
INSERT INTO `pdf` (`id`, `unique_id`, `type`, `template`, `created_date`) VALUES
(7, '605dc8eac58cf', '1', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"test\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\">\r\n											<label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n												<a target=\"_blank\" href=\"http://localhost/vinita-michel/generate/gift-card/605dc8eac58cf/1\" style=\"color: white;text-decoration: none;\">Print</a>\r\n											</label>\r\n										</h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 11:43:38'),
(8, '605dc8f06a2f7', '2', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">To:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"alfaizm19@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">From:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"alfaizm19@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"test\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n											<a target=\"_blank\" href=\"http://localhost/vinita-michel/generate/gift-card/605dc8f06a2f7/2\" style=\"color: white;text-decoration: none;\">\r\n												Print\r\n											</a>\r\n										</label></h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 11:43:44'),
(9, '605dce08a3acf', '2', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">To:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"imcoolalfaiz@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">From:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"alfaizm19@gmail.com\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"605dce08a26b7\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"1000.55\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n											<a target=\"_blank\" href=\"http://localhost/vinita-michel/generate/gift-card/605dce08a3acf/2\" style=\"color: white;text-decoration: none;\">\r\n												Print\r\n											</a>\r\n										</label></h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 12:05:28'),
(10, '605dce1085c0f', '1', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 26/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"605dce108420c\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\">\r\n											<label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n												<a target=\"_blank\" href=\"http://localhost/vinita-michel/generate/gift-card/605dce1085c0f/1\" style=\"color: white;text-decoration: none;\">Print</a>\r\n											</label>\r\n										</h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-26 12:05:36'),
(11, '60630bcecebec', '1', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 30/03/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"60630BCECD7C3\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"100\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\">\r\n											<label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n												<a target=\"_blank\" href=\"http://localhost/vinita-michel/generate/gift-card/60630bcecebec/1\" style=\"color: white;text-decoration: none;\">Print</a>\r\n											</label>\r\n										</h5>\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-03-30 11:30:22'),
(12, '60681f2549e47', '1', '<html>\r\n<head>\r\n	<title></title>\r\n	<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"display:block\">\r\n	<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color: #fff;padding: 9px;max-width: 700px;width: 100%;margin: 0 auto;background-image: url(http://localhost/vinita-michel/assets/giftcard/images/giftbg.png);background-repeat: no-repeat;background-position: center;\">\r\n		<tr>\r\n			<td>\r\n				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;border: 2px solid #4A4A4A\">\r\n					<tr>\r\n						<td>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">		\r\n								<tr>\r\n									<td style=\"text-align: left;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border1.png\"></td>\r\n									<td style=\"text-align: center;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gifttext.png\" style=\"max-width: 221px;\"></td>\r\n									<td style=\"text-align: right;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border4.png\"></td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: right;font-size: 18px;font-family: \'Montserrat\', sans-serif;padding: 8px 42px;font-weight: 500;\">\r\n										<span style=\"color: #788188;\">Date: 03/04/21</span>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Gift Code:</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"60681f254916c\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"font-family: \'Montserrat\', sans-serif;padding: 5px 42px 10px 42px;\">\r\n										<p style=\"border-bottom: 2px solid #B59677;padding-bottom: 3px;margin-bottom: 0;margin-top: 15px;\">\r\n										<span style=\"color: #B59677;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;\">Price (AED):</span>\r\n										<input type=\"text\" name=\"\" style=\"color: #788188;font-weight: 500;font-size: 19px;font-family: \'Montserrat\', sans-serif;box-shadow: none;border:none;outline:none;background:transparent;\" value=\"250\">\r\n										</p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 515px;width: 100%;margin: 0 auto;\">\r\n								<tr>\r\n									<td style=\"text-align: left;padding: 19px 0;\">\r\n										<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\"><label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">Instructions</label></h5>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188\">Step 1: Log on to <a href=\"www.vinitamichael.com\" target=\"_blank\" style=\"color: #B59677;font-weight: 600;text-decoration: none;\">www.vinitamichael.com</a></p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 2: Login/Register on the website to Redeem the Gift Card</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 3: Select <label style=\"color: #B59677;font-weight: 600;\">\"REDEEM GIFT CARD\"</label> tab on my account section</p>\r\n										<p style=\"font-family: \'Montserrat\', sans-serif;font-size: 16px;margin:0 0 5px 0;font-weight: 500;color: #788188;\">Step 4: Enter the <label style=\"color: #B59677;font-weight: 600;\">Gift Card Code</label> to add funds into your <label style=\"color: #B59677;font-weight: 600;\">Wallet.</label></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;background: #B59677;color: #fff;min-height: 35px;font-size: 17px;font-family: \'Montserrat\', sans-serif;padding: 8px 0;\">\r\n										<a href=\"mailto:enquiries@vinitamichael.com\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">enquiries@vinitamichael.com</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"telno:+971 50 709 2290\" style=\"color: #fff;text-decoration: none;font-size: 17px;font-weight: 600;\">+971 50 709 2290</a>\r\n										<p style=\"margin: 0;overflow:hidden;height: 1.5px;line-height: 1.5px;vertical-align: top;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/border.png\" style=\"vertical-align: top;\"></p>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: center;padding: 27px 0 14px 0;\">\r\n										<a href=\"\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/giftcard.png\" style=\"max-width: 293px;\"></a>\r\n									</td>\r\n								</tr>\r\n							</table>							\r\n							<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"padding: 0px;max-width: 680px;width: 100%;\">\r\n								<tr>\r\n									<td style=\"text-align: left;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border2.png\" style=\"vertical-align: bottom;\"></td>\r\n									<td style=\"text-align: center;padding:16px 0 23px 0;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/logo.png\"></td>\r\n									<td style=\"text-align: right;vertical-align: bottom;\"><img src=\"http://localhost/vinita-michel/assets/giftcard/images/gift_border3.png\" style=\"vertical-align: bottom;\"></td>\r\n								</tr>\r\n							</table>\r\n							<h5 style=\"text-align: center;margin-bottom: 24px;margin-top: 0;\">\r\n								<label style=\"width: 145px;height: 25px;background: #B59677;color: #fff;text-transform: uppercase;font-family: \'Montserrat\', sans-serif;font-size: 16px;font-weight: 600;display: inline-block;vertical-align:middle;text-align: center;border-radius: 3px;line-height: 26px;\">\r\n									<a target=\"_blank\" href=\"http://localhost/vinita-michel/generate/gift-card/60681f2549e47/1\" style=\"color: white;text-decoration: none;\">Print</a>\r\n								</label>\r\n							</h5>\r\n						</td>\r\n					</tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2021-04-03 07:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `personalized_enquiry`
--

CREATE TABLE `personalized_enquiry` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `looking_for` int(11) NOT NULL,
  `photo` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `id` int(11) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `delivery_days` varchar(500) DEFAULT NULL,
  `display_order` int(50) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`id`, `pincode`, `city`, `state`, `delivery_days`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(30, '200111', 'Lucknow', 'UP', '1 to 4 Days', 0, 1, '2021-04-27 03:44:00', '2021-04-29 07:26:16'),
(31, '200112', 'Lucknow', 'UP', NULL, 0, 1, '2021-04-27 03:44:00', NULL),
(32, '200113', 'Lucknow', 'UP', NULL, 0, 1, '2021-04-27 03:44:00', NULL),
(33, '200114', 'Lucknow', 'UP', NULL, 0, 1, '2021-04-27 03:44:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position_name` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `is_active`, `updated_at`, `created_at`) VALUES
(9, 'UI Developer', 1, '2021-01-14 12:04:02', '2020-06-27 13:47:06'),
(10, 'Backend Developer', 0, '2021-01-29 10:58:23', '2021-01-29 10:58:11'),
(11, 'Manager', 1, '0000-00-00 00:00:00', '2021-01-29 10:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `press`
--

CREATE TABLE `press` (
  `id` int(11) NOT NULL,
  `press_name` text NOT NULL,
  `slug` text NOT NULL,
  `title` text NOT NULL,
  `image_path` text NOT NULL,
  `image_path_crop_image` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `banner_crop_image` text DEFAULT NULL,
  `display_order` int(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `press`
--

INSERT INTO `press` (`id`, `press_name`, `slug`, `title`, `image_path`, `image_path_crop_image`, `banner`, `banner_crop_image`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Styles Magazine', 'styles-magazine', 'Profile of a Rising Star Title', 'uploads/press/press_5.jpg', NULL, 'uploads/press/banner/press_bg_1.png', NULL, 2, 1, '2021-02-19 05:54:47', '2021-03-14 08:51:39'),
(2, 'La Femme', 'la-femme', 'Unbearable Lightness', 'uploads/press/press_2.jpg', NULL, 'uploads/press/banner/press_3.jpg', NULL, 2, 1, '2021-02-24 01:23:23', '2021-03-14 08:54:59'),
(3, 'Mojeh', 'mojeh', 'Ribbon Dance', 'uploads/press/press3-1.jpg', NULL, 'uploads/press/banner/press3-2.jpg', NULL, 3, 1, '2021-03-03 18:57:57', '2021-03-15 07:22:06'),
(4, 'OK!', 'ok', '27 QUESTIONS WITH VINITA MICHAEL', 'uploads/press/press4-1.jpg', NULL, 'uploads/press/banner/press4-2.jpg', NULL, 4, 1, '2021-03-03 19:07:02', '2021-03-15 07:22:05'),
(5, 'Adorn', 'adorn', 'Teller of Tales', 'uploads/press/press5-1.jpg', NULL, 'uploads/press/banner/press5-2.jpg', NULL, 5, 1, '2021-03-03 19:43:45', '2021-03-15 07:22:05'),
(6, 'Elle! India', 'elle-india', 'Art and Design', 'uploads/press/press6-1.jpg', NULL, 'uploads/press/banner/press6-2.jpg', NULL, 6, 1, '2021-03-03 19:48:34', '2021-03-15 07:22:05'),
(7, 'Femina Middle East', 'femina-middle-east', 'Fashion Debut', 'uploads/press/press7-1.jpg', NULL, 'uploads/press/banner/press7-2.jpg', NULL, 7, 1, '2021-03-03 19:53:46', '2021-03-15 07:22:04'),
(8, 'Femina India', 'femina-india', 'Golden Compass', 'uploads/press/press8-1.jpg', NULL, 'uploads/press/banner/press8-2.jpg', NULL, 8, 1, '2021-03-03 19:58:05', '2021-03-15 07:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `press_image`
--

CREATE TABLE `press_image` (
  `id` int(11) NOT NULL,
  `press_id` int(11) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `image_path_thumb` varchar(500) NOT NULL,
  `medium_image_path` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `press_image`
--

INSERT INTO `press_image` (`id`, `press_id`, `image_path`, `image_path_thumb`, `medium_image_path`, `created_at`, `updated_at`) VALUES
(5, 1, 'uploads/pressimage/press2.png', 'uploads/pressimage/thumb/press2.png', 'uploads/pressimage/medium/press2.png', '2021-02-19 07:35:52', '2021-02-27 04:22:49'),
(7, 2, 'uploads/pressimage/press_4.jpg', 'uploads/pressimage/thumb/press_4.jpg', 'uploads/pressimage/medium/press_4.jpg', '2021-02-27 04:24:30', '0000-00-00 00:00:00'),
(8, 3, 'uploads/pressimage/press3-3.jpg', 'uploads/pressimage/thumb/press3-3.jpg', 'uploads/pressimage/medium/press3-3.jpg', '2021-03-03 12:59:56', '0000-00-00 00:00:00'),
(9, 4, 'uploads/pressimage/press4-3.jpg', 'uploads/pressimage/thumb/press4-3.jpg', 'uploads/pressimage/medium/press4-3.jpg', '2021-03-03 13:07:36', '0000-00-00 00:00:00'),
(10, 5, 'uploads/pressimage/press5-3.jpg', 'uploads/pressimage/thumb/press5-3.jpg', 'uploads/pressimage/medium/press5-3.jpg', '2021-03-03 13:44:08', '0000-00-00 00:00:00'),
(11, 6, 'uploads/pressimage/press6-3.jpg', 'uploads/pressimage/thumb/press6-3.jpg', 'uploads/pressimage/medium/press6-3.jpg', '2021-03-03 13:48:57', '0000-00-00 00:00:00'),
(12, 7, 'uploads/pressimage/press7-3.jpg', 'uploads/pressimage/thumb/press7-3.jpg', 'uploads/pressimage/medium/press7-3.jpg', '2021-03-03 13:54:26', '0000-00-00 00:00:00'),
(13, 8, 'uploads/pressimage/press8-3.jpg', 'uploads/pressimage/thumb/press8-3.jpg', 'uploads/pressimage/medium/press8-3.jpg', '2021-03-03 13:58:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` text DEFAULT NULL,
  `bm_name` varchar(510) NOT NULL,
  `category_level_1` int(11) NOT NULL,
  `category_level_2` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `sku_code` varchar(255) DEFAULT NULL,
  `dimension` varchar(255) NOT NULL,
  `net_weight` decimal(10,3) NOT NULL,
  `deno` int(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `attributes` text DEFAULT NULL,
  `product_tag` varchar(255) DEFAULT NULL,
  `available_date` date DEFAULT NULL,
  `available_time` time DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_key_words` text NOT NULL,
  `meta_description` text NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `featured` tinyint(1) NOT NULL,
  `popular` tinyint(1) NOT NULL,
  `display_on_home` tinyint(1) NOT NULL,
  `on_sale` tinyint(1) NOT NULL,
  `display_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `slug`, `bm_name`, `category_level_1`, `category_level_2`, `description`, `sku_code`, `dimension`, `net_weight`, `deno`, `stock`, `mrp`, `selling_price`, `attributes`, `product_tag`, `available_date`, `available_time`, `image_path`, `meta_title`, `meta_key_words`, `meta_description`, `is_active`, `featured`, `popular`, `display_on_home`, `on_sale`, `display_order`, `created_at`, `updated_at`) VALUES
(12, '25 GRAM 22 KARAT GOLD BISCUIT', '25-gram-22-karat-gold-biscuit', '25 GRAM 22 KARAT GOLD BISCUIT', 10, 16, '<h2>25 GRAM 22 KARAT GOLD BISCUIT</h2>\r\n', 'GOLDBISCUIT', '1', '25.000', 25, 2, '10000.00', '5000.00', NULL, 'Featured', '2021-04-24', '23:03:29', 'uploads/product/600212zcaabp00_1.png', '25 GRAM 22 KARAT GOLD BISCUIT', '', '', 1, 1, 0, 1, 0, 0, '2021-04-24 12:29:09', '2021-04-30 06:00:54'),
(13, '25 GRAM 24 KARAT GOLD BISCUIT', '25-gram-24-karat-gold-biscuit', '25 GRAM 24 KARAT GOLD BISCUIT', 10, 16, '<h2>25 GRAM 24 KARAT GOLD BISCUIT</h2>\r\n', 'GOLDBISCUIT2', '25', '25.000', 25, 21, '50000.00', '40000.00', NULL, 'Sale', NULL, NULL, 'uploads/product/600212zcdrbs00_12.png', '25 GRAM 24 KARAT GOLD BISCUIT', '', '', 1, 1, 0, 1, 0, 0, '2021-04-24 12:31:21', '2021-04-30 02:33:24'),
(14, '2 GRAM 22 KARAT GOLD COIN WITH LAKSHMI MOTIF', '2-gram-22-karat-gold-coin-with-lakshmi-motif', '2 GRAM 22 KARAT GOLD COIN WITH LAKSHMI MOTIF', 10, 15, '<h2>2 GRAM 22 KARAT GOLD COIN WITH LAKSHMI MOTIF</h2>\r\n', 'GCOIN', '2', '2.000', 2, 0, '10000.00', '5000.00', NULL, 'Trending', '2021-04-24', '06:00:00', 'uploads/product/600105zicaap00_1.png', '2 GRAM 22 KARAT GOLD COIN WITH LAKSHMI MOTIF', 'Gold, Silver', '', 1, 1, 0, 1, 0, 0, '2021-04-24 12:33:21', '2021-04-27 10:15:43'),
(15, '2 GRAM 22 KARAT KRISHNA MOTIF GOLD COIN', '2-gram-22-karat-krishna-motif-gold-coin', '2 GRAM 22 KARAT KRISHNA MOTIF GOLD COIN', 10, 15, '<h2>2 GRAM 22 KARAT KRISHNA MOTIF GOLD COIN</h2>\r\n\r\n<h2>&nbsp;</h2>\r\n', 'GCOIN2', '2', '2.000', 2, 2, '25000.00', '8000.00', NULL, '', NULL, NULL, 'uploads/product/600736zaaabp00_1.png', '2 GRAM 22 KARAT KRISHNA MOTIF GOLD COIN', '', '', 1, 1, 0, 1, 0, 0, '2021-04-24 12:34:45', NULL),
(16, '250 Gram (999 Purity) Lakshmi Silver Coin', '250-gram-999-purity-lakshmi-silver-coin', '250 Gram (999 Purity) Lakshmi Silver Coin', 11, 17, '<h1>250 Gram (999 Purity) Lakshmi Silver Coin</h1>\r\n', 'SILVER01', '250', '250.000', 250, 8, '1500.00', '0.00', NULL, '', NULL, NULL, 'uploads/product/jvsc250gh3_1.png', '250 Gram (999 Purity) Lakshmi Silver Coin', '', '', 1, 1, 0, 1, 0, 0, '2021-04-24 12:38:36', '2021-04-30 02:33:24'),
(17, '250 Gram (999 Purity) Ganesh Silver Coin', '250-gram-999-purity-ganesh-silver-coin', '250 Gram (999 Purity) Ganesh Silver Coin', 11, 17, '<h1>250 Gram (999 Purity) Ganesh Silver Coin</h1>\r\n', 'SILVER02', '250', '250.000', 250, 10, '21000.00', '0.00', NULL, 'Popular', NULL, NULL, 'uploads/product/jvsc250gh2_12.png', '250 Gram (999 Purity) Ganesh Silver Coin', '', '', 1, 1, 0, 0, 0, 0, '2021-04-24 12:40:10', '2021-04-26 05:28:05'),
(18, '10 Gram (999 Purity) Flower Silver Coin', '10-gram-999-purity-flower-silver-coin', '10 Gram (999 Purity) Flower Silver Coin', 11, 17, '<h1>10 Gram (999 Purity) Flower Silver Coin</h1>\r\n', 'SILVER03', '10', '10.000', 10, 10, '15000.00', '10000.00', NULL, 'Featured', '2021-04-24', '06:15:00', 'uploads/product/silverrose_fr-1.png', '10 Gram (999 Purity) Flower Silver Coin', '', '', 1, 1, 0, 0, 0, 0, '2021-04-24 12:42:15', '2021-04-26 05:28:39'),
(19, '200 Gram (999 Purity) Silver Bar', '200-gram-999-purity-silver-bar', '200 Gram (999 Purity) Silver Bar', 11, 18, '<h1>200 Gram (999 Purity) Silver Bar</h1>\r\n', 'SILVER05', '200', '200.000', 200, 6, '17696.00', '0.00', NULL, '', NULL, NULL, 'uploads/product/esl4002611_01.png', '200 Gram (999 Purity) Silver Bar', '', '', 1, 1, 0, 0, 0, 0, '2021-04-24 12:45:00', '2021-04-26 05:29:16'),
(20, '50 Gram (999 Purity) Silver Bar', '50-gram-999-purity-silver-bar', '50 Gram (999 Purity) Silver Bar', 11, 18, '<h1>50 Gram (999 Purity) Silver Bar</h1>\r\n', 'SILVER06', '50', '50.000', 50, 7, '4789.00', '0.00', NULL, '', NULL, NULL, 'uploads/product/esl4002596_01.png', '50 Gram (999 Purity) Silver Bar', '', '', 1, 1, 0, 1, 0, 0, '2021-04-24 12:47:15', NULL),
(21, 'Valentine\'s Day Collection Gold Pendant', 'valentines-day-collection-gold-pendant', 'Valentine\'s Day Collection Gold Pendant', 12, 0, '<h1>Valentine&#39;s Day Collection Gold Pendant</h1>\r\n', 'COLVDCGP', '1.407', '1.407', 1, 30, '8664.00', '0.00', NULL, '', NULL, NULL, 'uploads/product/bm18035780_1.png', 'Valentine\'s Day Collection Gold Pendant', '', '', 1, 1, 0, 0, 0, 0, '2021-04-24 12:50:19', '2021-04-26 05:29:49'),
(22, 'Valentine\'s Day Collection Gold Pendant', 'valentines-day-collection-gold-pendant-1', 'Valentine\'s Day Collection Gold Pendant', 12, 0, '<h1>Valentine&#39;s Day Collection Gold Pendant</h1>\r\n', 'VDCGP', '1.278', '1.278', 1, 25, '8000.00', '0.00', NULL, '', NULL, NULL, 'uploads/product/bm18035808_1-1.png', 'Valentine\'s Day Collection Gold Pendant', '', '', 0, 1, 0, 0, 0, 0, '2021-04-24 12:52:43', '2021-04-26 05:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_country_details`
--

CREATE TABLE `product_country_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount_price` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_country_details`
--

INSERT INTO `product_country_details` (`id`, `product_id`, `country_id`, `stock_quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(100, 197, 1, 10, '9', '', '2020-06-21 04:38:13', '0000-00-00 00:00:00'),
(102, 198, 1, 1111, '12', '11', '2020-06-21 07:20:13', '0000-00-00 00:00:00'),
(103, 199, 1, 100, '12', '10', '2020-06-21 07:21:09', '0000-00-00 00:00:00'),
(105, 195, 1, 1800, '1800', '', '2020-06-23 12:21:42', '0000-00-00 00:00:00'),
(106, 193, 1, 11, '11', '', '2020-06-25 08:09:36', '0000-00-00 00:00:00'),
(107, 201, 1, 3333, '22', '', '2020-06-25 08:10:22', '0000-00-00 00:00:00'),
(112, 196, 1, 300, '30', '', '2020-06-26 04:24:03', '0000-00-00 00:00:00'),
(113, 196, 2, 100, '23', '', '2020-06-26 04:24:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` enum('image','video') NOT NULL DEFAULT 'image',
  `video_url` text DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL,
  `image_alt` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `type`, `video_url`, `image_path`, `image_alt`, `created_at`, `updated_at`) VALUES
(9, 14, 'image', NULL, 'uploads/crop/crop_product_image_6085a3ac9dcb5.png', 'Image 1', '2021-04-25 22:45:24', '0000-00-00 00:00:00'),
(10, 14, 'image', NULL, 'uploads/crop/crop_product_image_6085a3aca0117.png', 'Image 2', '2021-04-25 22:45:24', '0000-00-00 00:00:00'),
(12, 14, 'image', NULL, 'uploads/crop/crop_product_image_6085a3aca3ae8.png', NULL, '2021-04-25 22:45:24', '0000-00-00 00:00:00'),
(13, 14, 'video', 'https://www.youtube.com/embed/lqj-QNYsZFk?controls=1', NULL, NULL, '2021-04-25 22:45:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `promo_banner`
--

CREATE TABLE `promo_banner` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_title_color` varchar(20) NOT NULL,
  `banner_description` tinytext NOT NULL,
  `embed_video` text NOT NULL,
  `banner_video` varchar(255) NOT NULL,
  `button1_text` varchar(255) NOT NULL,
  `button1_link` varchar(255) NOT NULL,
  `button2_text` varchar(255) NOT NULL,
  `button2_link` varchar(255) NOT NULL,
  `media_type` int(1) NOT NULL DEFAULT 1 COMMENT '1-image,2-video ,3-iframe',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `external_link` varchar(500) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo_banner`
--

INSERT INTO `promo_banner` (`id`, `banner_image`, `banner_caption`, `description`, `banner_title`, `banner_title_color`, `banner_description`, `embed_video`, `banner_video`, `button1_text`, `button1_link`, `button2_text`, `button2_link`, `media_type`, `start_date`, `end_date`, `external_link`, `is_active`, `display_order`, `updated_at`, `created_at`) VALUES
(34, '', '', '', '', '', '', 'asd fasdf asd', '', '', '', '', '', 3, '2020-06-10', '2020-07-10', '', 1, 0, '0000-00-00 00:00:00', '2020-06-26 13:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id` int(11) NOT NULL,
  `promo_title` text NOT NULL,
  `discount_type` enum('1','2') NOT NULL DEFAULT '1',
  `promo_code` char(7) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo_code`
--

INSERT INTO `promo_code` (`id`, `promo_title`, `discount_type`, `promo_code`, `start_date`, `end_date`, `discount`, `is_active`, `created_at`, `updated_at`) VALUES
(8, 'Test', '2', 'ADSAD', '2021-04-21', '0000-00-00', '20.00', 1, '2021-04-21 11:23:31', '2021-04-21 11:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `province` text NOT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `country`, `province`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 99, 'Tamil Nadu', 0, 1, '2021-02-16 04:04:29', NULL),
(6, 1, 'Herat', 0, 1, '2021-02-16 04:05:27', NULL),
(7, 1, 'Kabul', 0, 1, '2021-02-16 04:05:36', NULL),
(8, 1, 'Kandahar', 0, 1, '2021-02-16 04:05:47', NULL),
(10, 99, 'Tamil Nadu 1', 0, 1, '2021-02-28 05:23:08', NULL),
(11, 224, 'Dubai', 0, 1, '2021-03-26 05:29:25', NULL),
(12, 224, 'Abu Dhabi', 0, 1, '2021-03-26 05:29:40', NULL),
(13, 224, 'Ajman', 0, 1, '2021-03-26 05:32:29', NULL),
(14, 224, 'Ras Al-Khaimah', 0, 1, '2021-03-26 05:33:06', NULL),
(15, 224, 'Sharjah', 0, 1, '2021-03-26 05:33:31', NULL),
(16, 224, 'Umm Al-Quwain', 0, 1, '2021-03-26 05:34:03', NULL),
(17, 226, 'Alabama', 1, 1, '2021-03-29 19:41:20', '2021-03-29 19:41:57'),
(18, 226, 'Alaska', 1, 1, '2021-03-29 19:41:30', '2021-03-29 19:41:49'),
(19, 226, 'American Samoa', 0, 1, '2021-03-29 19:41:41', NULL),
(20, 226, 'Arizona', 0, 1, '2021-03-29 19:43:42', NULL),
(21, 226, 'Arkansas', 0, 1, '2021-03-29 19:43:50', NULL),
(22, 226, 'Armed Forces Americas', 0, 1, '2021-03-29 19:43:58', NULL),
(23, 226, 'Armed Forces Europe', 0, 1, '2021-03-29 19:44:08', NULL),
(24, 226, 'Armed Forces Pacific', 0, 1, '2021-03-29 19:44:18', NULL),
(25, 226, 'California', 0, 1, '2021-03-29 19:44:27', NULL),
(26, 226, 'Colorado', 0, 1, '2021-03-29 19:44:35', NULL),
(27, 226, 'Connecticut', 0, 1, '2021-03-29 19:44:43', NULL),
(28, 226, 'Delaware', 0, 1, '2021-03-29 19:44:52', NULL),
(29, 226, 'Washington DC', 0, 1, '2021-03-29 19:45:00', NULL),
(30, 226, 'Micronesia', 0, 1, '2021-03-29 19:45:17', NULL),
(31, 226, 'Florida', 0, 1, '2021-03-29 19:45:27', NULL),
(32, 226, 'Georgia', 0, 1, '2021-03-29 19:45:35', NULL),
(33, 226, 'Guam', 0, 1, '2021-03-29 19:45:43', NULL),
(34, 226, 'Hawaii', 0, 1, '2021-03-29 19:45:51', NULL),
(35, 226, 'Idaho', 0, 1, '2021-03-29 19:45:58', NULL),
(36, 226, 'Illinois', 0, 1, '2021-03-29 19:46:06', NULL),
(37, 226, 'Indiana', 0, 1, '2021-03-29 19:46:20', NULL),
(38, 226, 'Iowa', 0, 1, '2021-03-29 19:46:29', NULL),
(39, 226, 'Kansas', 0, 1, '2021-03-29 19:46:48', NULL),
(40, 226, 'Kentucky', 0, 1, '2021-03-29 19:46:57', NULL),
(41, 226, 'Louisiana', 0, 1, '2021-03-29 19:47:05', NULL),
(42, 226, 'Maine', 0, 1, '2021-03-29 19:47:14', NULL),
(43, 226, 'Marshall Islands', 0, 1, '2021-03-29 19:47:22', NULL),
(44, 226, 'Maryland', 0, 1, '2021-03-29 19:47:35', NULL),
(45, 226, 'Massachusetts', 0, 1, '2021-03-29 19:47:55', NULL),
(46, 226, 'Michigan', 0, 1, '2021-03-29 19:48:03', NULL),
(47, 226, 'Minnesota', 0, 1, '2021-03-29 19:48:11', NULL),
(48, 226, 'Mississippi', 0, 1, '2021-03-29 19:48:19', NULL),
(49, 226, 'Missouri', 0, 1, '2021-03-29 19:48:27', NULL),
(50, 226, 'Montana', 0, 1, '2021-03-29 19:48:35', NULL),
(51, 226, 'Nebraska', 0, 1, '2021-03-29 19:48:43', NULL),
(52, 226, 'Nevada', 0, 1, '2021-03-29 19:48:51', NULL),
(53, 226, 'New Hampshire', 0, 1, '2021-03-29 19:48:59', NULL),
(54, 226, 'New Jersey', 0, 1, '2021-03-29 19:49:06', NULL),
(55, 226, 'New Mexico', 0, 1, '2021-03-29 19:49:18', NULL),
(56, 226, 'New York', 0, 1, '2021-03-29 19:49:25', NULL),
(57, 226, 'North Carolina', 0, 1, '2021-03-29 19:49:34', NULL),
(58, 226, 'North Dakota', 0, 1, '2021-03-29 19:49:42', NULL),
(59, 226, 'Northern Mariana Islands', 0, 1, '2021-03-29 19:49:51', NULL),
(60, 226, 'Ohio', 0, 1, '2021-03-29 19:50:00', NULL),
(61, 226, 'Oklahoma', 0, 1, '2021-03-29 19:50:10', NULL),
(62, 226, 'Oregon', 0, 1, '2021-03-29 19:50:17', NULL),
(63, 226, 'Palau', 0, 1, '2021-03-29 19:50:27', NULL),
(64, 226, 'Pennsylvania', 0, 1, '2021-03-29 19:50:36', NULL),
(65, 226, 'Puerto Rico', 0, 1, '2021-03-29 19:50:43', NULL),
(66, 226, 'Rhode Island', 0, 1, '2021-03-29 19:50:52', NULL),
(67, 226, 'South Carolina', 0, 1, '2021-03-29 19:50:59', NULL),
(68, 226, 'South Dakota', 0, 1, '2021-03-29 19:51:09', NULL),
(69, 226, 'Tennessee', 0, 1, '2021-03-29 19:51:17', NULL),
(70, 226, 'Texas', 0, 1, '2021-03-29 19:51:28', NULL),
(71, 226, 'Utah', 0, 1, '2021-03-29 19:51:39', NULL),
(72, 226, 'Vermont', 0, 1, '2021-03-29 19:51:49', NULL),
(73, 226, 'U.S. Virgin Islands', 0, 1, '2021-03-29 19:51:58', NULL),
(74, 226, 'Virginia', 0, 1, '2021-03-29 19:52:09', NULL),
(75, 226, 'Washington', 0, 1, '2021-03-29 19:52:17', NULL),
(76, 226, 'Wisconsin', 0, 1, '2021-03-29 19:52:36', NULL),
(77, 226, 'West Virginia', 0, 1, '2021-03-29 19:52:46', NULL),
(78, 226, 'Wyoming', 0, 1, '2021-03-29 19:52:59', NULL),
(79, 224, 'Fujairah', 1, 1, '2021-03-29 19:58:05', '2021-03-29 19:59:00'),
(80, 10, 'Buenos Aires Province', 0, 1, '2021-03-29 21:04:09', NULL),
(81, 10, 'Catamarca', 0, 1, '2021-03-29 21:04:21', NULL),
(82, 10, 'Chaco', 0, 1, '2021-03-29 21:04:30', NULL),
(83, 10, 'Chubut', 0, 1, '2021-03-29 21:04:40', NULL),
(84, 10, 'Buenos Aires (Autonomous City)', 0, 1, '2021-03-29 21:04:54', NULL),
(85, 10, 'Corrientes', 0, 1, '2021-03-29 21:05:06', NULL),
(86, 10, 'Córdoba', 0, 1, '2021-03-29 21:05:19', NULL),
(87, 10, 'Entre Ríos', 0, 1, '2021-03-29 21:05:34', NULL),
(88, 10, 'Formosa', 0, 1, '2021-03-29 21:05:46', NULL),
(89, 10, 'Jujuy', 0, 1, '2021-03-29 21:06:00', NULL),
(90, 10, 'La Pampa', 0, 1, '2021-03-29 21:06:11', NULL),
(91, 10, 'La Rioja', 0, 1, '2021-03-29 21:06:21', NULL),
(92, 10, 'Mendoza', 0, 1, '2021-03-29 21:06:33', NULL),
(93, 10, 'Misiones', 0, 1, '2021-03-29 21:06:46', NULL),
(94, 10, 'Neuquén', 0, 1, '2021-03-29 21:08:09', NULL),
(95, 10, 'Río Negro', 0, 1, '2021-03-29 21:08:53', NULL),
(96, 10, 'Salta', 0, 1, '2021-03-29 21:09:04', NULL),
(97, 10, 'San Juan', 0, 1, '2021-03-29 21:09:15', NULL),
(98, 10, 'San Luis', 0, 1, '2021-03-29 21:09:26', NULL),
(99, 10, 'Santa Cruz', 0, 1, '2021-03-29 21:09:35', NULL),
(100, 10, 'Santa Fe', 0, 1, '2021-03-29 21:09:46', NULL),
(101, 10, 'Santiago del Estero', 0, 1, '2021-03-29 21:09:58', NULL),
(102, 10, 'Tierra del Fuego', 0, 1, '2021-03-29 21:10:08', NULL),
(103, 10, 'Tucumán', 0, 1, '2021-03-29 21:10:26', NULL),
(104, 13, 'Australian Capital Territory', 0, 1, '2021-03-29 21:16:52', NULL),
(105, 13, 'New South Wales', 0, 1, '2021-03-29 21:17:11', NULL),
(106, 13, 'Northern Territory', 0, 1, '2021-03-29 21:17:21', NULL),
(107, 13, 'Queensland', 0, 1, '2021-03-29 21:17:30', NULL),
(108, 13, 'South Australia', 0, 1, '2021-03-29 21:17:41', NULL),
(109, 13, 'Tasmania', 0, 1, '2021-03-29 21:17:51', NULL),
(110, 13, 'Victoria', 0, 1, '2021-03-29 21:18:01', NULL),
(111, 13, 'Western Australia', 0, 1, '2021-03-29 21:18:10', NULL),
(112, 30, 'Acre', 0, 1, '2021-03-29 21:39:36', NULL),
(113, 30, 'Alagoas', 0, 1, '2021-03-29 21:39:47', NULL),
(114, 30, 'Amapá', 0, 1, '2021-03-29 21:40:11', NULL),
(115, 30, 'Amazonas', 0, 1, '2021-03-29 21:40:23', NULL),
(116, 30, 'Bahia', 0, 1, '2021-03-29 21:40:40', NULL),
(117, 30, 'Ceará', 0, 1, '2021-03-29 21:41:00', NULL),
(118, 30, 'Federal District', 0, 1, '2021-03-29 21:41:11', NULL),
(119, 30, 'Espírito Santo', 0, 1, '2021-03-29 21:41:23', NULL),
(120, 30, 'Goiás', 0, 1, '2021-03-29 21:41:33', NULL),
(121, 30, 'Maranhão', 0, 1, '2021-03-29 21:41:44', NULL),
(122, 30, 'Mato Grosso', 0, 1, '2021-03-29 21:41:55', NULL),
(123, 30, 'Mato Grosso do Sul', 0, 1, '2021-03-29 21:42:06', NULL),
(124, 30, 'Minas Gerais', 0, 1, '2021-03-29 21:42:49', NULL),
(125, 30, 'Paraná', 0, 1, '2021-03-29 21:42:59', NULL),
(126, 30, 'Paraíba', 0, 1, '2021-03-29 21:43:11', NULL),
(127, 30, 'Pará', 0, 1, '2021-03-29 21:43:30', NULL),
(128, 30, 'Pernambuco', 0, 1, '2021-03-29 21:43:40', NULL),
(129, 30, 'Piauí', 0, 1, '2021-03-29 21:43:50', NULL),
(130, 30, 'Rio Grande do Norte', 0, 1, '2021-03-29 21:44:02', NULL),
(131, 30, 'Rio Grande do Sul', 0, 1, '2021-03-29 21:44:15', NULL),
(132, 30, 'Rio de Janeiro', 0, 1, '2021-03-29 21:44:26', NULL),
(133, 30, 'Rondônia', 0, 1, '2021-03-29 21:44:35', NULL),
(134, 30, 'Roraima', 0, 1, '2021-03-29 21:44:46', NULL),
(135, 30, 'Santa Catarina', 0, 1, '2021-03-29 21:44:56', NULL),
(136, 30, 'Sergipe', 0, 1, '2021-03-29 21:45:05', NULL),
(137, 30, 'São Paulo', 0, 1, '2021-03-29 21:45:15', NULL),
(138, 30, 'Tocantins', 0, 1, '2021-03-29 21:45:23', NULL),
(139, 38, 'Alberta', 0, 1, '2021-03-29 22:08:33', NULL),
(140, 38, 'British Columbia', 0, 1, '2021-03-29 22:08:43', NULL),
(141, 38, 'Manitoba', 0, 1, '2021-03-29 22:08:52', NULL),
(142, 38, 'New Brunswick', 0, 1, '2021-03-29 22:09:03', NULL),
(143, 38, 'Newfoundland and Labrador', 0, 1, '2021-03-29 22:09:14', NULL),
(144, 38, 'Northwest Territories', 0, 1, '2021-03-29 22:09:26', NULL),
(145, 38, 'Nova Scotia', 0, 1, '2021-03-29 22:09:38', NULL),
(146, 38, 'Nunavut', 0, 1, '2021-03-29 22:09:47', NULL),
(147, 38, 'Ontario', 0, 1, '2021-03-29 22:09:56', NULL),
(148, 38, 'Prince Edward Island', 0, 1, '2021-03-29 22:10:05', NULL),
(149, 38, 'Quebec', 0, 1, '2021-03-29 22:10:15', NULL),
(150, 38, 'Saskatchewan', 0, 1, '2021-03-29 22:10:25', NULL),
(151, 38, 'Yukon', 0, 1, '2021-03-29 22:10:35', NULL),
(152, 43, 'Antofagasta', 0, 1, '2021-03-29 22:14:30', NULL),
(153, 43, 'Araucanía', 0, 1, '2021-03-29 22:14:43', NULL),
(154, 43, 'Arica y Parinacota', 0, 1, '2021-03-29 22:14:52', NULL),
(155, 43, 'Atacama', 0, 1, '2021-03-29 22:15:01', NULL),
(156, 43, 'Aysén', 0, 1, '2021-03-29 22:15:11', NULL),
(157, 43, 'Bío Bío', 0, 1, '2021-03-29 22:15:25', NULL),
(158, 43, 'Coquimbo', 0, 1, '2021-03-29 22:15:35', NULL),
(159, 43, 'Los Lagos', 0, 1, '2021-03-29 22:15:45', NULL),
(160, 43, 'Los Ríos', 0, 1, '2021-03-29 22:15:54', NULL),
(161, 43, 'Magallanes Region', 0, 1, '2021-03-29 22:16:05', NULL),
(162, 43, 'Maule', 0, 1, '2021-03-29 22:16:16', NULL),
(163, 43, 'Libertador General Bernardo O’Higgins', 0, 1, '2021-03-29 22:16:27', NULL),
(164, 43, 'Santiago Metropolitan', 0, 1, '2021-03-29 22:16:37', NULL),
(165, 43, 'Arapacá', 0, 1, '2021-03-29 22:16:49', NULL),
(166, 43, 'Valparaíso', 0, 1, '2021-03-29 22:16:59', NULL),
(167, 43, 'Ñuble', 0, 1, '2021-03-29 22:17:08', NULL),
(168, 44, 'Anhui', 0, 1, '2021-03-29 22:17:18', NULL),
(169, 44, 'Beijing', 0, 1, '2021-03-29 22:17:37', NULL),
(170, 44, 'Chongqing', 0, 1, '2021-03-29 22:17:47', NULL),
(171, 44, 'Fujian', 0, 1, '2021-03-29 22:17:56', NULL),
(172, 44, 'Gansu', 0, 1, '2021-03-29 22:18:07', NULL),
(173, 44, 'Guangdong', 0, 1, '2021-03-29 22:18:17', NULL),
(174, 44, 'Guangxi', 0, 1, '2021-03-29 22:18:29', NULL),
(175, 44, 'Guizhou', 0, 1, '2021-03-29 22:18:38', NULL),
(176, 44, 'Hainan', 0, 1, '2021-03-29 22:18:48', NULL),
(177, 44, 'Hebei', 0, 1, '2021-03-29 22:18:58', NULL),
(178, 44, 'Heilongjiang', 0, 1, '2021-03-29 22:19:07', NULL),
(179, 44, 'Henan', 0, 1, '2021-03-29 22:19:16', NULL),
(180, 44, 'Hubei', 0, 1, '2021-03-29 22:19:24', NULL),
(181, 44, 'Hunan', 0, 1, '2021-03-29 22:19:34', NULL),
(182, 44, 'Inner Mongolia', 0, 1, '2021-03-29 22:28:19', NULL),
(183, 44, 'Jiangsu', 0, 1, '2021-03-29 22:28:28', NULL),
(184, 44, 'Jiangxi', 0, 1, '2021-03-29 22:28:40', NULL),
(185, 44, 'Jilin', 0, 1, '2021-03-29 22:28:55', NULL),
(186, 44, 'Liaoning', 0, 1, '2021-03-29 22:29:07', NULL),
(187, 44, 'Ningxia', 0, 1, '2021-03-29 22:29:17', NULL),
(188, 44, 'Qinghai', 0, 1, '2021-03-29 22:29:27', NULL),
(189, 44, 'Shaanxi', 0, 1, '2021-03-29 22:29:37', NULL),
(190, 44, 'Shandong', 0, 1, '2021-03-29 22:29:48', NULL),
(191, 44, 'Shanghai', 0, 1, '2021-03-29 22:29:57', NULL),
(192, 44, 'Shanxi', 0, 1, '2021-03-29 22:30:06', NULL),
(193, 44, 'Sichuan', 0, 1, '2021-03-29 22:30:15', NULL),
(194, 44, 'Tianjin', 0, 1, '2021-03-29 22:30:23', NULL),
(195, 44, 'Xinjiang', 0, 1, '2021-03-29 22:30:31', NULL),
(196, 44, 'Tibet', 0, 1, '2021-03-29 22:30:40', NULL),
(197, 44, 'Yunnan', 0, 1, '2021-03-29 22:30:48', NULL),
(198, 44, 'Zhejiang', 0, 1, '2021-03-29 22:30:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `category` text NOT NULL,
  `is_active` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `category`, `is_active`) VALUES
(1, 'Do you have at least one year experiance?', 'experience', 'active'),
(2, 'Have you ever worked', 'experience', 'active'),
(3, 'Is your experience more than 5 years?', 'experience', 'active'),
(4, 'What is your education?', 'education', 'active'),
(5, 'Type of education', 'education', 'active'),
(6, 'Education type', 'education', 'active'),
(7, 'What is your qualification', 'qualification', 'active'),
(8, 'Type of qualification', 'qualification', 'active'),
(9, 'Number of qualification degree', 'qualification', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_name` varchar(500) NOT NULL,
  `email` text NOT NULL,
  `title` text NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `review` text NOT NULL,
  `rating` double(10,1) NOT NULL,
  `profile_picture` varchar(500) DEFAULT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews_bkp`
--

CREATE TABLE `reviews_bkp` (
  `id` int(11) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `testimonial` text NOT NULL,
  `external_link` varchar(4000) NOT NULL,
  `media_type` int(1) DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `video_file` varchar(255) DEFAULT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews_bkp`
--

INSERT INTO `reviews_bkp` (`id`, `company_name`, `client_name`, `designation`, `logo`, `testimonial`, `external_link`, `media_type`, `video_link`, `video_file`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'New Company', 'James Fernando', 'CEO', 'uploads/reviews/icon.png', '', '', 3, '<iframe width=\"100%\" height=\"auto\" src=\"https://www.youtube.com/embed/rOax50EDIZQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'uploads/reviews-video/new_video.mp4', 1, 1, '2020-05-01 00:39:10', '2020-06-21 14:32:27'),
(2, 'New Company', 'James Fernando', 'Manager of Racer', 'uploads/reviews/foodgrains-oil-masala.jpg', '', '', 1, NULL, NULL, 1, 1, '2020-05-01 00:39:10', '2020-06-21 00:20:08'),
(3, 'New Company', 'James Fernando', 'Manager of Racer', 'uploads/reviews/sd1.jpg', '', '', 3, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/S0r-BHE1fS4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, 1, 1, '2020-05-01 00:39:10', '2020-06-21 00:27:54'),
(4, 'New Company', 'James Fernando', 'Manager of Racer', 'uploads/reviews/fruit-vegetables.jpg', '', '', 1, NULL, NULL, 1, 1, '2020-05-01 00:39:10', '2020-06-21 00:20:51'),
(5, 'New Company', 'James Fernando', 'Manager of Racer', 'uploads/reviews/hashing-encryption.jpg', '', '', 1, NULL, NULL, 1, 1, '2020-05-01 00:39:10', '2020-06-21 00:21:14'),
(6, 'New Company', 'James Fernando', 'Manager of Racer', 'uploads/reviews/rlvd2020041322514313842598-1.jpg', '', '', 1, NULL, NULL, 1, 1, '2020-05-01 00:39:10', '2020-06-21 00:21:40'),
(7, 'New Company', 'James Fernando', 'Manager of Racer', 'uploads/reviews/parle-g-50-gm.jpg', '', '', 1, NULL, NULL, 1, 1, '2020-05-01 00:39:10', '2020-06-21 00:22:07'),
(8, 'New Company', 'James Fernando', 'Manager of Racer', 'uploads/reviews/image.jpeg', '', '', 1, NULL, NULL, 1, 1, '2020-05-01 00:39:10', '2020-06-21 00:22:29'),
(9, 'Ram', 'Testing', 'QA & Testing', 'uploads/reviews/arhar-dal.jpg', '', '', 3, 'asdfasdf', NULL, 4, 1, '2020-06-03 13:58:03', '2020-06-21 00:31:26'),
(10, 'fgdfsgdf', 'dfgsdfg', 'dsfgsdfgsdfg', 'uploads/reviews/business-card.jpg', '', '', 2, NULL, 'uploads/reviews-video/new_video.mp4', 0, 1, '2020-06-08 14:14:22', '2020-06-21 00:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `second_sub_category`
--

CREATE TABLE `second_sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `second_sub_category_name` varchar(255) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `second_sub_category`
--

INSERT INTO `second_sub_category` (`id`, `category_id`, `sub_category_id`, `second_sub_category_name`, `meta_title`, `meta_keyword`, `meta_description`, `url`, `display_order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(37, 0, 51, 'Garbage Bags', 'Garbage Bags | Dhofar Global', '', '', 'garbage-bags', 1, 1, '2020-06-09 08:21:25', 1, '0000-00-00 00:00:00', 0),
(38, 0, 57, 'Jumbo Mini Toilet Roll Dispenser', 'Jumbo Mini Toilet Roll Dispenser | Dhofar Global', '', '', 'jumbo-mini-toilet-roll-dispenser', 2, 1, '2020-06-09 08:22:25', 1, '0000-00-00 00:00:00', 0),
(39, 0, 57, 'Maxi Centerfeed Dispenser-92300', 'Maxi Centerfeed Dispenser | Dhofar Global', '', '', 'maxi-centerfeed-dispenser-92300', 0, 1, '2020-06-09 08:24:19', 1, '0000-00-00 00:00:00', 0),
(40, 0, 57, 'Maxi Centerfeed Dispenser-92320', 'Maxi Centerfeed Dispenser | Dhofar Global', '', '', 'maxi-centerfeed-dispenser-92320', 3, 1, '2020-06-09 08:24:56', 1, '0000-00-00 00:00:00', 0),
(41, 0, 58, 'Auto Foam Dispensers-750495', 'Auto Foam Dispensers | Dhofar Global', '', '', 'auto-foam-dispensers-750495', 0, 1, '2020-06-09 08:25:59', 1, '0000-00-00 00:00:00', 0),
(42, 0, 58, 'Auto Foam Dispensers-1817013', 'Auto Foam Dispensers | Dhofar Global', '', '', 'auto-foam-dispensers-1817013', 0, 1, '2020-06-09 08:26:40', 1, '0000-00-00 00:00:00', 0),
(43, 0, 58, 'Auto Foam Dispensers-1851397', 'Auto Foam Dispensers | Dhofar Global', '', '', 'auto-foam-dispensers-1851397', 0, 1, '2020-06-09 08:27:03', 1, '0000-00-00 00:00:00', 0),
(44, 0, 58, 'Auto Foam Dispensers-1817131', 'Auto Foam Dispensers | Dhofar Global', '', '', 'auto-foam-dispensers-1817131', 0, 1, '2020-06-09 08:27:30', 1, '0000-00-00 00:00:00', 0),
(45, 0, 59, 'Auto Janitor-TC401205', 'Auto Janitor-TC401205 | Dhofar Global', '', '', 'auto-janitor-tc401205', 1, 1, '2020-06-09 08:45:08', 1, '0000-00-00 00:00:00', 0),
(46, 0, 59, 'Auto Janitor-TC3486589', 'Auto Janitor-TC3486589 | Dhofar Global', '', '', 'auto-janitor-tc3486589', 0, 1, '2020-06-09 08:46:08', 1, '0000-00-00 00:00:00', 0),
(47, 0, 59, 'Auto Janitor-1817013', 'Auto Janitor-1817013 | Dhofar Global', '', '', 'auto-janitor-1817013', 0, 1, '2020-06-09 08:46:42', 1, '0000-00-00 00:00:00', 0),
(48, 0, 58, 'Manual Form Dispensers', 'Manual Form Dispensers | Dhofar Global', '', '', 'manual-form-dispensers', 0, 1, '2020-06-09 08:47:06', 1, '0000-00-00 00:00:00', 0),
(49, 0, 61, 'Hygiene Bag Dispenser', 'Hygiene Bag Dispenser | Dhofar Global', '', '', 'hygiene-bag-dispenser', 0, 1, '2020-06-09 08:48:47', 1, '0000-00-00 00:00:00', 0),
(50, 0, 57, 'Maxi Jumbo Roll Dispenser', 'Maxi Jumbo Roll Dispenser | Dhofar Global', '', '', 'maxi-jumbo-roll-dispenser', 0, 1, '2020-06-09 08:49:16', 1, '0000-00-00 00:00:00', 0),
(51, 0, 62, 'Powdered', 'Powdered | Dhofar Global', '', '', 'powdered', 0, 1, '2020-06-09 08:49:39', 1, '0000-00-00 00:00:00', 0),
(52, 0, 62, 'Powder Free', 'Powder Free | Dhofar Global', '', '', 'powder-free', 0, 1, '2020-06-09 08:50:46', 1, '0000-00-00 00:00:00', 0),
(53, 0, 65, 'Shoe Cover', 'Shoe Cover | Dhofar Global', '', '', 'shoe-cover', 0, 1, '2020-06-09 09:00:35', 1, '0000-00-00 00:00:00', 0),
(54, 0, 65, 'Hair Net', 'Hair Net | Dhofar Global', '', '', 'hair-net', 0, 1, '2020-06-09 09:01:08', 1, '0000-00-00 00:00:00', 0),
(55, 0, 65, 'Space Masks', 'Space Masks | Dhofar Global', '', '', 'space-masks', 0, 1, '2020-06-09 09:01:41', 1, '0000-00-00 00:00:00', 0),
(56, 0, 39, 'Apron', 'Apron | Dhofar Global', '', '', 'apron', 13, 1, '2020-06-09 09:02:05', 1, '2020-06-20 13:30:59', 1),
(57, 0, 39, 'Napkin', 'Napkin | Dhofar Global', '', '', 'napkin', 14, 1, '2020-06-09 09:02:37', 1, '2020-06-20 13:30:49', 1),
(58, 0, 67, 'test', 'test', '', '', 'test', 23, 1, '2020-06-20 13:31:14', 1, '0000-00-00 00:00:00', 0),
(59, 48, 52, 'asdfasdf', 'asdfasdf', 'asdf asd asdf', '', 'asdfasdf', 11, 1, '2020-06-21 17:13:19', 1, '2020-06-21 17:30:31', 1),
(60, 47, 51, 'qwer', 'asdf', '', '', 'qwer', 17, 1, '2020-06-21 17:30:54', 1, '2020-06-26 11:57:53', 1),
(61, 52, 57, 'asdfasdf', 'asdfa dsf asdf', '', '', 'asdfasdf', 0, 1, '2020-06-21 17:31:43', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `unique_id` text NOT NULL,
  `user_sess` longtext DEFAULT NULL,
  `shipping_sess` longtext DEFAULT NULL,
  `promo_sess` longtext DEFAULT NULL,
  `wallet_sess` longtext DEFAULT NULL,
  `customer_data` longtext DEFAULT NULL,
  `temp_cart_id` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `unique_id`, `user_sess`, `shipping_sess`, `promo_sess`, `wallet_sess`, `customer_data`, `temp_cart_id`, `created_at`, `updated_at`) VALUES
(5, '6051441d1ca53', NULL, NULL, NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:19:\"QA & Test Address 1\";s:9:\"address_2\";s:19:\"QA & Test Address 2\";s:5:\"phone\";s:10:\"9176094579\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:13:\"157.49.91.183\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"6051441d1ca53\";}', '52c8420653e924500e58e1be1143c309', '2021-03-16 23:49:50', NULL),
(14, '60514dab722b2', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', NULL, NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:14:\"Test Address 1\";s:9:\"address_2\";s:14:\"Test Address 2\";s:5:\"phone\";s:9:\"917609479\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:2:\"10\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:13:\"157.49.91.183\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"60514dab722b2\";}', 'ab1802eb556adc056eef1290f99db5c0', '2021-03-17 00:30:36', NULL),
(15, '60514dee40ef6', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', NULL, NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:14:\"Test Address 1\";s:9:\"address_2\";s:14:\"Test Address 2\";s:5:\"phone\";s:9:\"917609479\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:2:\"10\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:13:\"157.49.91.183\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"60514dee40ef6\";}', 'ab1802eb556adc056eef1290f99db5c0', '2021-03-17 00:31:43', NULL),
(27, '605179a455da2', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', 'a:2:{s:13:\"shipping_cost\";d:40.60000000000000142108547152020037174224853515625;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:19:\"123, Test Address 1\";s:9:\"address_2\";s:14:\"Test Address 2\";s:5:\"phone\";s:9:\"917609479\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:15:\"207.246.240.117\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"605179a455da2\";}', 'ab1802eb556adc056eef1290f99db5c0', '2021-03-17 03:38:13', NULL),
(28, '605182b7b4ab8', NULL, 'a:2:{s:13:\"shipping_cost\";d:40.60000000000000142108547152020037174224853515625;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:14:\"Test Address 1\";s:9:\"address_2\";s:14:\"Test Address 2\";s:5:\"phone\";s:10:\"1234687687\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:5:\"12364\";s:2:\"ip\";s:15:\"207.246.240.123\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"605182b7b4ab8\";}', '2da92349f9c9700b80a503657d0539c2', '2021-03-17 04:16:57', NULL),
(29, '60518f00977ae', NULL, 'a:2:{s:13:\"shipping_cost\";d:40.60000000000000142108547152020037174224853515625;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:4:\"Test\";s:9:\"address_1\";s:6:\"Test 1\";s:9:\"address_2\";s:6:\"Test 2\";s:5:\"phone\";s:10:\"1234567777\";s:5:\"email\";s:14:\"ramdf@mail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:15:\"207.246.240.123\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"60518f00977ae\";}', 'a8dd2472578c98a26791ade3c2d6af37', '2021-03-17 05:09:22', NULL),
(30, '605194e878b94', NULL, 'a:2:{s:13:\"shipping_cost\";d:40.60000000000000142108547152020037174224853515625;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:4:\"test\";s:9:\"last_name\";s:4:\"test\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:14:\"test@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:15:\"207.246.240.117\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"605194e878b94\";}', '823dd45b0f45361ffe0e557d606845e4', '2021-03-17 05:34:33', NULL),
(31, '6051969d7399f', NULL, 'a:2:{s:13:\"shipping_cost\";d:40.60000000000000142108547152020037174224853515625;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:4:\"Test\";s:9:\"last_name\";s:4:\"test\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:14:\"test@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:15:\"207.246.240.119\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"6051969d7399f\";}', '823dd45b0f45361ffe0e557d606845e4', '2021-03-17 05:41:50', NULL),
(34, '6051980f2ea2e', NULL, 'a:2:{s:13:\"shipping_cost\";d:40.60000000000000142108547152020037174224853515625;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:4:\"test\";s:9:\"last_name\";s:4:\"test\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:11:\"09876543210\";s:5:\"email\";s:14:\"test@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:15:\"207.246.240.117\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"6051980f2ea2e\";}', 'bc7beb6878026ffcb336da9462297d74', '2021-03-17 05:48:00', NULL),
(36, '60519a483fe0e', NULL, 'a:2:{s:13:\"shipping_cost\";d:40.60000000000000142108547152020037174224853515625;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:4:\"test\";s:9:\"last_name\";s:4:\"test\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:11:\"09876543210\";s:5:\"email\";s:14:\"test@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:15:\"207.246.240.117\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"60519a483fe0e\";}', '823dd45b0f45361ffe0e557d606845e4', '2021-03-17 05:57:29', NULL),
(47, '605439f532f4b', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', 'a:2:{s:13:\"shipping_cost\";d:41.2000000000000028421709430404007434844970703125;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:14:\"Test Address 1\";s:9:\"address_2\";s:14:\"Test Address 2\";s:5:\"phone\";s:14:\"+9176067135456\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"600001\";s:2:\"ip\";s:14:\"157.51.136.141\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"605439f532f4b\";}', 'f45bb1e05bea8c0d5489326b537db1c9', '2021-03-19 05:43:18', NULL),
(56, '6055e6d635f7a', 'a:2:{s:6:\"userId\";s:1:\"1\";s:5:\"fname\";s:8:\"Muhammad\";}', 'a:2:{s:13:\"shipping_cost\";d:280;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:8:\"Muhammad\";s:9:\"last_name\";s:6:\"Alfaiz\";s:9:\"address_1\";s:4:\"Test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:19:\"alfaizm19@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:8:\"12345678\";s:2:\"ip\";s:12:\"103.73.32.34\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"6055e6d635f7a\";}', '2ad9179d9c6590f9ea183fe4ebd5a05d', '2021-03-20 12:13:11', NULL),
(57, '6055e71e31b31', 'a:2:{s:6:\"userId\";s:1:\"1\";s:5:\"fname\";s:8:\"Muhammad\";}', 'a:2:{s:13:\"shipping_cost\";d:280;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:8:\"Muhammad\";s:9:\"last_name\";s:6:\"Alfaiz\";s:9:\"address_1\";s:4:\"Test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:19:\"alfaizm19@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:8:\"12345678\";s:2:\"ip\";s:12:\"103.73.32.34\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"6055e71e31b31\";}', '2ad9179d9c6590f9ea183fe4ebd5a05d', '2021-03-20 12:14:23', NULL),
(61, '6056e60203db6', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', NULL, NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:19:\"123, Test Address 1\";s:9:\"address_2\";s:14:\"Test Address 2\";s:5:\"phone\";s:9:\"917609479\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:1:\"2\";s:8:\"province\";s:0:\"\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:13:\"157.51.132.71\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"6056e60203db6\";}', 'aa60ec42f985505e998c52e073b1478a', '2021-03-21 06:21:55', NULL),
(64, '605c051bc3755', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', 'a:2:{s:13:\"shipping_cost\";d:250;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:19:\"123, Test Address 1\";s:9:\"address_2\";s:14:\"Test Address 2\";s:5:\"phone\";s:9:\"917609479\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"600001\";s:2:\"ip\";s:11:\"157.51.98.4\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"605c051bc3755\";}', '2ebace8d9bb7293a23a170e4e31ac72b', '2021-03-25 03:35:57', NULL),
(75, '605ce2035276f', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', 'a:2:{s:13:\"shipping_cost\";d:140.599999999999994315658113919198513031005859375;s:4:\"curr\";s:3:\"USD\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:8:\"hfghdfgh\";s:9:\"address_2\";s:8:\"dfghdfgh\";s:5:\"phone\";s:14:\"12315345454545\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123654\";s:2:\"ip\";s:12:\"157.51.78.43\";s:4:\"curr\";s:3:\"USD\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"605ce2035276f\";}', '36158c2aaece934cff0c74748450abdb', '2021-03-25 19:18:29', NULL),
(77, '605ced1eabdbb', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', 'a:2:{s:13:\"shipping_cost\";d:250;s:4:\"curr\";s:3:\"AED\";}', 'a:3:{s:8:\"promo_id\";s:1:\"4\";s:10:\"promo_code\";s:5:\"VM125\";s:8:\"discount\";d:8.5936000000000003495870259939692914485931396484375;}', NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:8:\"hfghdfgh\";s:9:\"address_2\";s:8:\"dfghdfgh\";s:5:\"phone\";s:14:\"12315345454545\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:12:\"157.51.78.43\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"605ced1eabdbb\";}', '36158c2aaece934cff0c74748450abdb', '2021-03-25 20:05:52', NULL),
(80, '6061ed616ef5e', NULL, 'a:2:{s:13:\"shipping_cost\";s:5:\"20.00\";s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:8:\"fdsfasdf\";s:9:\"last_name\";s:7:\"sdfasdf\";s:9:\"address_1\";s:8:\"asdfasdf\";s:9:\"address_2\";s:7:\"asdfasd\";s:5:\"phone\";s:10:\"5234523324\";s:5:\"email\";s:13:\"test@mail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"600001\";s:2:\"ip\";s:15:\"207.246.240.123\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"6061ed616ef5e\";}', '34df65f71395e2fd71b10acc419bad40', '2021-03-29 15:08:19', NULL),
(81, '6061f4f4c8040', NULL, 'a:2:{s:13:\"shipping_cost\";d:0;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:6:\"Melvin\";s:9:\"last_name\";s:6:\"Joseph\";s:9:\"address_1\";s:26:\"villa 25, ghadeer avenue 2\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"0566553857\";s:5:\"email\";s:23:\"melvinandrews@gmail.com\";s:7:\"country\";s:3:\"224\";s:8:\"province\";s:2:\"11\";s:6:\"postal\";s:5:\"25500\";s:2:\"ip\";s:15:\"207.246.240.117\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"6061f4f4c8040\";}', '46ac15f5912b24dedf25fd0a0129a774', '2021-03-29 15:40:38', NULL),
(82, '6062139351e52', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', 'a:2:{s:13:\"shipping_cost\";s:4:\"0.00\";s:4:\"curr\";s:3:\"USD\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:12:\"hfghdfghhjhj\";s:9:\"address_2\";s:8:\"dfghdfgh\";s:5:\"phone\";s:14:\"45234523452345\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:3:\"224\";s:8:\"province\";s:2:\"13\";s:6:\"postal\";s:5:\"12356\";s:2:\"ip\";s:15:\"207.246.240.123\";s:4:\"curr\";s:3:\"USD\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"6062139351e52\";}', '34df65f71395e2fd71b10acc419bad40', '2021-03-29 17:51:17', NULL),
(83, '606213f3b9ecd', 'a:2:{s:6:\"userId\";s:1:\"4\";s:5:\"fname\";s:3:\"Ram\";}', 'a:2:{s:13:\"shipping_cost\";s:5:\"35.00\";s:4:\"curr\";s:3:\"USD\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:3:\"Ram\";s:9:\"last_name\";s:9:\"Shanmugam\";s:9:\"address_1\";s:8:\"hfghdfgh\";s:9:\"address_2\";s:8:\"dfghdfgh\";s:5:\"phone\";s:14:\"12315345454545\";s:5:\"email\";s:19:\"ram@infoquestit.com\";s:7:\"country\";s:1:\"2\";s:8:\"province\";N;s:6:\"postal\";s:6:\"600001\";s:2:\"ip\";s:15:\"207.246.240.123\";s:4:\"curr\";s:3:\"USD\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"606213f3b9ecd\";}', '34df65f71395e2fd71b10acc419bad40', '2021-03-29 17:52:53', NULL),
(84, '6062dccceb442', NULL, 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:4:\"Test\";s:9:\"last_name\";s:4:\"Test\";s:9:\"address_1\";s:4:\"Test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:14:\"test@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"6062dccceb442\";}', '1d486839e1d650a653bb9860cb35e9bd', '2021-03-30 08:09:54', NULL),
(85, '6062dd7c643a7', NULL, 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:4:\"Test\";s:9:\"last_name\";s:4:\"Test\";s:9:\"address_1\";s:4:\"Test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:11:\"12345678990\";s:5:\"email\";s:14:\"test@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"6062dd7c643a7\";}', '1d486839e1d650a653bb9860cb35e9bd', '2021-03-30 08:12:50', NULL),
(86, '6062de076d2f2', NULL, 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:4:\"Test\";s:9:\"last_name\";s:4:\"Test\";s:9:\"address_1\";s:4:\"Test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:9:\"123456789\";s:5:\"email\";s:14:\"test@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:5:\"guest\";s:8:\"uniqueId\";s:13:\"6062de076d2f2\";}', '1d486839e1d650a653bb9860cb35e9bd', '2021-03-30 08:15:06', NULL),
(87, '6068182312acd', 'a:2:{s:6:\"userId\";s:1:\"1\";s:5:\"fname\";s:8:\"Muhammad\";}', 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, 'a:1:{s:17:\"use_wallet_amount\";s:4:\"1000\";}', 'a:13:{s:10:\"first_name\";s:8:\"Muhammad\";s:9:\"last_name\";s:6:\"Alfaiz\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:19:\"alfaizm19@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"6068182312acd\";}', 'fb114a433c2bf2c5a6a61cefec4e60aa', '2021-04-03 07:24:22', NULL),
(88, '606818706c117', 'a:2:{s:6:\"userId\";s:1:\"1\";s:5:\"fname\";s:8:\"Muhammad\";}', 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:8:\"Muhammad\";s:9:\"last_name\";s:6:\"Alfaiz\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:19:\"alfaizm19@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"606818706c117\";}', 'fb114a433c2bf2c5a6a61cefec4e60aa', '2021-04-03 07:25:38', NULL),
(89, '606818db769cf', 'a:2:{s:6:\"userId\";s:1:\"1\";s:5:\"fname\";s:8:\"Muhammad\";}', 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:8:\"Muhammad\";s:9:\"last_name\";s:6:\"Alfaiz\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:19:\"alfaizm19@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"606818db769cf\";}', 'fb114a433c2bf2c5a6a61cefec4e60aa', '2021-04-03 07:27:48', NULL),
(90, '6068195eb51f3', 'a:2:{s:6:\"userId\";s:1:\"1\";s:5:\"fname\";s:8:\"Muhammad\";}', 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:8:\"Muhammad\";s:9:\"last_name\";s:6:\"Alfaiz\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:19:\"alfaizm19@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"6068195eb51f3\";}', 'fb114a433c2bf2c5a6a61cefec4e60aa', '2021-04-03 07:30:04', NULL),
(91, '606819dd19e81', 'a:2:{s:6:\"userId\";s:1:\"1\";s:5:\"fname\";s:8:\"Muhammad\";}', 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:8:\"Muhammad\";s:9:\"last_name\";s:6:\"Alfaiz\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:19:\"alfaizm19@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"606819dd19e81\";}', 'fb114a433c2bf2c5a6a61cefec4e60aa', '2021-04-03 07:31:50', NULL),
(92, '60681a3490968', 'a:2:{s:6:\"userId\";s:1:\"1\";s:5:\"fname\";s:8:\"Muhammad\";}', 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:8:\"Muhammad\";s:9:\"last_name\";s:6:\"Alfaiz\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:19:\"alfaizm19@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"60681a3490968\";}', 'fb114a433c2bf2c5a6a61cefec4e60aa', '2021-04-03 07:33:12', NULL),
(93, '60681c51c676d', 'a:2:{s:6:\"userId\";s:1:\"1\";s:5:\"fname\";s:8:\"Muhammad\";}', 'a:2:{s:13:\"shipping_cost\";d:80;s:4:\"curr\";s:3:\"AED\";}', NULL, NULL, 'a:13:{s:10:\"first_name\";s:8:\"Muhammad\";s:9:\"last_name\";s:6:\"Alfaiz\";s:9:\"address_1\";s:4:\"test\";s:9:\"address_2\";s:0:\"\";s:5:\"phone\";s:10:\"1234567890\";s:5:\"email\";s:19:\"alfaizm19@gmail.com\";s:7:\"country\";s:2:\"99\";s:8:\"province\";s:1:\"4\";s:6:\"postal\";s:6:\"123456\";s:2:\"ip\";s:3:\"::1\";s:4:\"curr\";s:3:\"AED\";s:13:\"customer_type\";s:10:\"registered\";s:8:\"uniqueId\";s:13:\"60681c51c676d\";}', 'fb114a433c2bf2c5a6a61cefec4e60aa', '2021-04-03 07:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shape`
--

CREATE TABLE `shape` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `display_order` int(2) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `first_half_aed` decimal(10,2) NOT NULL,
  `first_half_usd` decimal(10,2) NOT NULL,
  `adnl_half_aed` decimal(10,2) NOT NULL,
  `adnl_half_usd` decimal(10,2) NOT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `country`, `first_half_aed`, `first_half_usd`, `adnl_half_aed`, `adnl_half_usd`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 99, '20.00', '5.00', '15.00', '4.00', 1, 1, '2021-02-16 05:11:24', '2021-03-29 22:33:56'),
(4, 1, '130.00', '35.00', '80.00', '22.00', 1, 1, '2021-03-20 12:29:06', '2021-03-29 20:41:54'),
(6, 224, '0.00', '0.00', '0.00', '0.00', 0, 1, '2021-03-26 05:36:51', NULL),
(7, 226, '70.00', '19.00', '60.00', '16.00', 0, 1, '2021-03-29 19:56:37', NULL),
(8, 2, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 20:44:10', NULL),
(9, 3, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 20:58:13', NULL),
(10, 5, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 20:59:17', NULL),
(11, 6, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 20:59:57', NULL),
(12, 7, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:00:25', NULL),
(13, 9, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:01:03', NULL),
(14, 10, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:02:35', NULL),
(15, 11, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:12:28', NULL),
(16, 12, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:13:35', NULL),
(17, 13, '70.00', '19.00', '60.00', '16.00', 0, 1, '2021-03-29 21:16:09', NULL),
(18, 14, '70.00', '19.00', '60.00', '16.00', 0, 1, '2021-03-29 21:18:51', NULL),
(19, 15, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:20:37', NULL),
(20, 16, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:21:35', NULL),
(21, 17, '25.00', '7.00', '20.00', '5.00', 0, 1, '2021-03-29 21:22:29', NULL),
(22, 18, '50.00', '14.00', '35.00', '10.00', 0, 1, '2021-03-29 21:23:33', NULL),
(23, 19, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:24:34', NULL),
(24, 20, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:26:28', NULL),
(25, 21, '60.00', '16.00', '50.00', '14.00', 1, 1, '2021-03-29 21:27:07', '2021-03-29 22:32:59'),
(26, 22, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:28:33', NULL),
(27, 23, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:32:07', NULL),
(28, 24, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:34:03', NULL),
(29, 25, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:34:15', NULL),
(30, 26, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:36:54', NULL),
(31, 27, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:37:40', NULL),
(32, 28, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:38:02', NULL),
(33, 30, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:38:58', NULL),
(34, 31, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:56:04', NULL),
(35, 233, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:56:47', NULL),
(36, 32, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 21:57:29', NULL),
(37, 33, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:05:14', NULL),
(38, 34, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:05:39', NULL),
(39, 35, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:06:05', NULL),
(40, 36, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:06:43', NULL),
(41, 37, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:07:00', NULL),
(42, 38, '70.00', '19.00', '60.00', '16.00', 0, 1, '2021-03-29 22:08:00', NULL),
(43, 39, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:11:22', NULL),
(44, 40, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:12:17', NULL),
(45, 41, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:12:51', NULL),
(46, 42, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:13:20', NULL),
(47, 43, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:13:58', NULL),
(48, 44, '60.00', '16.00', '50.00', '14.00', 0, 1, '2021-03-29 22:32:13', NULL),
(49, 45, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:35:08', NULL),
(50, 46, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:35:46', NULL),
(51, 47, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:36:16', NULL),
(52, 48, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:36:59', NULL),
(53, 51, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:37:56', NULL),
(54, 52, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:41:30', NULL),
(55, 54, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:42:02', NULL),
(56, 56, '60.00', '16.00', '50.00', '14.00', 0, 1, '2021-03-29 22:47:00', NULL),
(57, 57, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:48:00', NULL),
(58, 53, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:48:37', NULL),
(59, 58, '70.00', '19.00', '60.00', '16.00', 0, 1, '2021-03-29 22:49:43', NULL),
(60, 59, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:50:12', NULL),
(61, 60, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:53:41', NULL),
(62, 61, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:54:02', NULL),
(63, 62, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 22:55:35', NULL),
(64, 63, '60.00', '16.00', '50.00', '14.00', 0, 1, '2021-03-29 22:56:31', NULL),
(65, 64, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:08:43', NULL),
(66, 65, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:09:21', NULL),
(67, 66, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:10:04', NULL),
(68, 67, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:10:42', NULL),
(69, 68, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:11:47', NULL),
(70, 69, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:13:10', NULL),
(71, 70, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:14:07', NULL),
(72, 71, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:14:36', NULL),
(73, 72, '70.00', '19.00', '60.00', '16.00', 0, 1, '2021-03-29 23:15:20', NULL),
(74, 73, '60.00', '16.00', '50.00', '14.00', 0, 1, '2021-03-29 23:16:08', NULL),
(75, 74, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:16:38', NULL),
(76, 75, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:17:21', NULL),
(77, 77, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:18:34', NULL),
(78, 78, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:19:20', NULL),
(79, 79, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:20:23', NULL),
(80, 80, '60.00', '16.00', '50.00', '14.00', 0, 1, '2021-03-29 23:21:06', NULL),
(81, 81, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:21:51', NULL),
(82, 82, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:22:17', NULL),
(83, 83, '70.00', '19.00', '60.00', '16.00', 0, 1, '2021-03-29 23:23:08', NULL),
(84, 84, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:23:35', NULL),
(85, 85, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:23:54', NULL),
(86, 86, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:24:42', NULL),
(87, 88, '130.00', '35.00', '80.00', '22.00', 0, 1, '2021-03-29 23:25:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_faqs`
--

CREATE TABLE `site_faqs` (
  `id` int(11) NOT NULL,
  `service` enum('Air Tickets','Staycations','Dubai Tours','Visa Services') NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_faqs`
--

INSERT INTO `site_faqs` (`id`, `service`, `question`, `answer`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Visa Services', 'Lorem', 'Lorem', 1, 1, '2021-01-15 06:45:04', '2021-01-15 06:53:20'),
(2, 'Visa Services', 'Staycation', 'Lorem', 1, 1, '2021-01-15 06:49:04', '0000-00-00 00:00:00'),
(8, 'Visa Services', 'Lorem', 'Lorem', 1, 1, '2021-01-15 06:45:04', '2021-01-15 06:53:20'),
(9, 'Staycations', 'Staycation', 'Lorem', 1, 1, '2021-01-15 06:49:04', '0000-00-00 00:00:00'),
(10, 'Dubai Tours', 'Lorem', 'Lorem', 1, 1, '2021-01-15 06:45:04', '2021-01-15 06:53:20'),
(11, 'Staycations', 'Staycation', 'Lorem', 1, 1, '2021-01-15 06:49:04', '0000-00-00 00:00:00'),
(12, 'Dubai Tours', 'Lorem', 'Lorem', 1, 1, '2021-01-15 06:45:04', '2021-01-15 06:53:20'),
(13, 'Air Tickets', 'Staycation', 'Lorem', 1, 1, '2021-01-15 06:49:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `site_reviews`
--

CREATE TABLE `site_reviews` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `testimonial` text NOT NULL,
  `name` text NOT NULL,
  `company` text NOT NULL,
  `rating` double(10,2) NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_reviews`
--

INSERT INTO `site_reviews` (`id`, `title`, `testimonial`, `name`, `company`, `rating`, `profile_picture`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'BDE Work From Home', 'Test', 'test', 'test', 1.00, 'uploads/site-reviews/1/hireme.jpg', 1, 1, '2021-01-12 04:01:11', '2021-01-12 06:12:48'),
(11, 'Test', 'Test', 'Ram Final', 'Infoquest', 5.00, 'uploads/site-reviews/11/hero_1.png', 4, 1, '2021-01-12 04:11:13', '2021-01-12 06:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_email` varchar(50) NOT NULL,
  `site_copy_right` varchar(100) NOT NULL,
  `site_project_name` varchar(100) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `website_frontend_logo` varchar(500) NOT NULL,
  `website_frontend_header_logo1` varchar(500) NOT NULL,
  `website_frontend_header_logo2` varchar(500) NOT NULL,
  `footer_logo` varchar(200) NOT NULL,
  `website_frontend_logo_caption` varchar(200) NOT NULL,
  `website_admin_logo` varchar(200) NOT NULL,
  `location_map` varchar(200) NOT NULL,
  `site_phone_number` varchar(20) NOT NULL,
  `site_fax_number` varchar(20) NOT NULL,
  `site_menu_name` varchar(100) NOT NULL,
  `site_frontend_footer_description` varchar(500) NOT NULL,
  `site_address` varchar(500) NOT NULL,
  `uae_orders_email` varchar(100) NOT NULL,
  `qatar_location_map` varchar(200) NOT NULL,
  `qatar_map_iframe` text NOT NULL,
  `qatar_email` varchar(50) NOT NULL,
  `qatar_address` varchar(500) NOT NULL,
  `qatar_phone_number` varchar(20) NOT NULL,
  `qatar_fax_number` varchar(20) NOT NULL,
  `qatar_mailing_address` varchar(100) NOT NULL,
  `qatar_orders_email` varchar(100) NOT NULL,
  `qatar_vat` int(11) NOT NULL,
  `uae_vat` int(11) NOT NULL,
  `oman_location_map` varchar(200) NOT NULL,
  `oman_map_iframe` text NOT NULL,
  `oman_email` varchar(50) NOT NULL,
  `oman_address` varchar(500) NOT NULL,
  `oman_phone_number` varchar(20) NOT NULL,
  `oman_fax_number` varchar(20) NOT NULL,
  `oman_mailing_address` varchar(100) NOT NULL,
  `oman_orders_email` varchar(100) NOT NULL,
  `oman_vat` int(11) NOT NULL,
  `pinterest_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `linkedin_link` text DEFAULT NULL,
  `admin_mailing_address` varchar(100) NOT NULL,
  `map_iframe` text NOT NULL,
  `video_image` varchar(255) NOT NULL,
  `video_type` int(1) NOT NULL,
  `video` varchar(255) NOT NULL,
  `video_embed_code` text NOT NULL,
  `display_banner_video` int(1) NOT NULL,
  `is_banner_active` int(1) DEFAULT NULL,
  `min_cart_amount_aed` decimal(10,2) DEFAULT NULL,
  `min_cart_amount_usd` decimal(10,2) NOT NULL,
  `loyality` decimal(10,2) DEFAULT NULL,
  `timing` text DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_email`, `site_copy_right`, `site_project_name`, `site_url`, `website_frontend_logo`, `website_frontend_header_logo1`, `website_frontend_header_logo2`, `footer_logo`, `website_frontend_logo_caption`, `website_admin_logo`, `location_map`, `site_phone_number`, `site_fax_number`, `site_menu_name`, `site_frontend_footer_description`, `site_address`, `uae_orders_email`, `qatar_location_map`, `qatar_map_iframe`, `qatar_email`, `qatar_address`, `qatar_phone_number`, `qatar_fax_number`, `qatar_mailing_address`, `qatar_orders_email`, `qatar_vat`, `uae_vat`, `oman_location_map`, `oman_map_iframe`, `oman_email`, `oman_address`, `oman_phone_number`, `oman_fax_number`, `oman_mailing_address`, `oman_orders_email`, `oman_vat`, `pinterest_link`, `instagram_link`, `twitter_link`, `facebook_link`, `youtube_link`, `linkedin_link`, `admin_mailing_address`, `map_iframe`, `video_image`, `video_type`, `video`, `video_embed_code`, `display_banner_video`, `is_banner_active`, `min_cart_amount_aed`, `min_cart_amount_usd`, `loyality`, `timing`, `updated_at`) VALUES
(1, 'alfaizm19@gmail.com', 'Copyright © 2021 <span>MMTC-PAMP India 2021</span>. All Rights Reserved.', 'MMTC PAMP', 'https://www.mmtcpamp.com/', 'uploads/site-setting/frontend/logo.png', 'uploads/site-setting/frontend-header-logo1/25-years.png', 'uploads/site-setting/frontend-header-logo2/img_2.png', 'uploads/site-setting/footer-logo/footer-logo.png', 'Sanjeev Krishna Yoga Centre', 'uploads/site-setting/adminlogo/mmtc.png', 'uploads/site-setting/location-map/aadhar_self_attested.pdf', '011-49684200', '', '', '', 'A-13 Green Park (Main) Aurobindo Marg, New Delhi -110016', '', 'uploads/site-setting/location-map/DBC-Workflow3.pdf', '', '', '', '', '', '', '', 0, 0, 'uploads/site-setting/location-map/webinar.pdf', '', '', '', '', '', '', '', 0, 'https://www.pinterest.com/', 'https://www.instagram.com/', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.youtube.com/', 'https://www.linkedin.com/', 'alfaizm19@gmail.com', '', 'uploads/site-setting/videoimage/2020-04-13 21_40_48-window.png', 0, '', '<iframe src=\"https://www.youtube.com/embed/tgbNymZ7vqY\"></iframe>', 0, 1, '1000.00', '1500.00', '1.50', '08:00 am - 05:00 pm GST (Gulf Standard Time), Sunday to Thursday', '2021-04-24 09:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `site_settingsbkp`
--

CREATE TABLE `site_settingsbkp` (
  `id` int(11) NOT NULL,
  `site_email` varchar(50) NOT NULL,
  `site_copy_right` varchar(100) NOT NULL,
  `site_project_name` varchar(100) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `website_frontend_logo` varchar(500) NOT NULL,
  `website_frontend_header_logo1` varchar(500) NOT NULL,
  `website_frontend_header_logo2` varchar(500) NOT NULL,
  `footer_logo` varchar(200) NOT NULL,
  `website_frontend_logo_caption` varchar(200) NOT NULL,
  `website_admin_logo` varchar(200) NOT NULL,
  `location_map` varchar(200) NOT NULL,
  `site_phone_number` varchar(20) NOT NULL,
  `site_fax_number` varchar(20) NOT NULL,
  `site_menu_name` varchar(100) NOT NULL,
  `site_frontend_footer_description` varchar(500) NOT NULL,
  `site_address` varchar(500) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `admin_mailing_address` varchar(100) NOT NULL,
  `map_iframe` text NOT NULL,
  `video_image` varchar(255) NOT NULL,
  `video_type` int(1) NOT NULL,
  `video` varchar(255) NOT NULL,
  `video_embed_code` text NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settingsbkp`
--

INSERT INTO `site_settingsbkp` (`id`, `site_email`, `site_copy_right`, `site_project_name`, `site_url`, `website_frontend_logo`, `website_frontend_header_logo1`, `website_frontend_header_logo2`, `footer_logo`, `website_frontend_logo_caption`, `website_admin_logo`, `location_map`, `site_phone_number`, `site_fax_number`, `site_menu_name`, `site_frontend_footer_description`, `site_address`, `linkedin_link`, `instagram_link`, `twitter_link`, `admin_mailing_address`, `map_iframe`, `video_image`, `video_type`, `video`, `video_embed_code`, `updated_at`) VALUES
(1, 'info@dhofarglobal.com', 'Copyright © 2020 Dhofar Global. All Right Reserved.', 'Dhofar Global', 'http://www.emiratesdirectory.com/dhofar_global', 'uploads/site-setting/frontend/dhofar_logo.png', 'uploads/site-setting/frontend-header-logo1/25-years.png', 'uploads/site-setting/frontend-header-logo2/img_2.png', 'uploads/site-setting/footer-logo/footer-logo.png', 'Sanjeev Krishna Yoga Centre', 'uploads/site-setting/adminlogo/adminlogo.jpg', 'uploads/site-setting/location-map/serenity-map.jpg', '1234567777', '1211244234', 'Lorem ipsum dolor sit amet,', 'Description', 'Address 1', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'info@dhofarglobal.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.1264638529124!2d55.37259431545028!3d25.299954833731395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f723a066d0e69%3A0x6ab565947eeab339!2sDhofar%20Global%20Tr%20Co%20LLC!5e0!3m2!1sen!2sin!4v1587835336663!5m2!1sen!2sin\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 'uploads/site-setting/videoimage/2020-04-13 21_40_48-window.png', 1, '', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gSZh7dMXLgg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2020-06-17 16:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `display_order` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(2, 'ANDHRA PRADESH', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(3, 'ARUNACHAL PRADESH', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(4, 'ASSAM', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(5, 'BIHAR', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(6, 'CHATTISGARH', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(7, 'CHANDIGARH', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(8, 'DAMAN AND DIU', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(9, 'DELHI', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(10, 'DADRA AND NAGAR HAVELI', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(11, 'GOA', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(12, 'GUJARAT', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(13, 'HIMACHAL PRADESH', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(14, 'HARYANA', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(15, 'JAMMU AND KASHMIR', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(16, 'JHARKHAND', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(17, 'KERALA', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(18, 'KARNATAKA', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(19, 'LAKSHADWEEP', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(20, 'MEGHALAYA', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(21, 'MAHARASHTRA', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(22, 'MANIPUR', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(23, 'MADHYA PRADESH', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(24, 'MIZORAM', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(25, 'NAGALAND', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(26, 'ORISSA', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(27, 'PUNJAB', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(28, 'PONDICHERRY', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(29, 'RAJASTHAN', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(30, 'SIKKIM', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(31, 'TAMIL NADU', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(32, 'TRIPURA', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(33, 'UTTARAKHAND', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(34, 'UTTAR PRADESH', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(35, 'WEST BENGAL', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22'),
(36, 'TELANGANA', 1, 0, '2021-04-29 04:59:56', '2021-04-29 05:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `staycations`
--

CREATE TABLE `staycations` (
  `id` int(11) NOT NULL,
  `emirates` varchar(500) NOT NULL,
  `staycations_name` text NOT NULL,
  `staycations_slug` text NOT NULL,
  `review_link` text NOT NULL,
  `description` text NOT NULL,
  `day_night` varchar(500) NOT NULL,
  `aed` double(10,2) NOT NULL,
  `usd` double(10,2) NOT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `amenities` text NOT NULL,
  `deals` int(1) DEFAULT NULL,
  `homepage` int(1) DEFAULT NULL,
  `cover_image` text DEFAULT NULL,
  `image` text NOT NULL,
  `banner_image` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `display_order` int(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staycations`
--

INSERT INTO `staycations` (`id`, `emirates`, `staycations_name`, `staycations_slug`, `review_link`, `description`, `day_night`, `aed`, `usd`, `discount`, `amenities`, `deals`, `homepage`, `cover_image`, `image`, `banner_image`, `meta_title`, `meta_keyword`, `meta_description`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(7, 'Dubai', 'Atlantis The Palm', 'atlantis-the-palm', 'review/atlantis-the-palm', '<p>One of the most famous hotels in Dubai that have waterpark (Atlantis Aquaventure) and aquarium (Lost Chamber) inside, were it is free to access those who are staying at the hotel. This accommodation has four kinds of room/suites such as Guest rooms which are king/queen room with a palm or ocean view, Imperial Club rooms, upgraded with a little luxury that have lounge access and benefits, Club suites, ideal for families and couples seeking comfort and luxury, and the Signature suites that includes the underwater suite. The Charges includes for 2 Guests on Bed and Breakfast Basis.</p>\r\n', ' 2 Nights / 3 Days', 3149.00, 858.00, 0.00, '* 2 swimming pools, *Non-smoking rooms,  *very good fitness centre,  *Spa and wellness centre,  *Restaurant,  *Room service,  *Facilities for disabled guests,  *Tea/coffee maker in all rooms,  *Bar,  *Fabulous breakfast, *Beachfront, *Private beach area,  *etc', 1, 1, NULL, 'uploads/staycations/47_1.jpg', 'uploads/staycations/banner/478685_imagegallerylightboxlarge.jpg', 'Atlantis The Palm', '', '', 0, 1, '2021-01-22 05:40:09', '2021-01-28 06:56:01'),
(8, 'Dubai', 'Anantara The Palm', 'anantara-the-palm', 'review/anantara-the-palm', '<p>A stay at Anantara will give you an exceptional staycation. They provide the complete facilities that you are looking for. This property was established in 2001, the first-ever luxury property in Thailand&rsquo;s historic seaside retreat of Hua Hin. One of the famous staycations in Dubai, located at Palm Jumeirah. Enjoy the Thai-style property which Anantara is known for. The Charges includes for 2 Guests on Bed and Breakfast Basis.</p>\r\n', ' 2 Nights / 3 Days', 2189.00, 597.00, 0.00, '* 1 swimming pools   *Non-smoking rooms  *fabulous fitness centre  *Spa and wellness centre  *Restaurant  *Room service  *Facilities for disabled guests  *Tea/coffee maker in all rooms  *Bar  *very good breakfast  *Beachfront   *Private beach area  *etc', 1, NULL, NULL, 'uploads/staycations/anantara_the_palm_exterior_desktop_banner_new_1920x1080_1.jpg', 'uploads/staycations/banner/anantara-dubai-the-palm-15_6073.jpg', 'Anantara The Palm', '', '', 0, 1, '2021-01-22 05:42:32', '2021-01-28 06:56:10'),
(9, 'Ra\'s al-Khaimah', 'BM Beach Resort', 'bm-beach-resort', 'review/bm-beach-resort', '<p>The BM Beach Resort occupies a prime position on a 2,000 m stretch of private beach. It has an outdoor pool and offers a guestroom with sea views. Free WiFi is available in the lobby area. Elegantly and great decorated, tucked away to afford the privacy and tranquility you seek in a beachfront hotel. A perfect getaway for you and your loved ones. The property is giving a warm welcome to enjoy the beauty of the gulf (Al Khaleej) in Ras Al Khaimah. The Charges includes for 2 Guests on Bed and Breakfast Basis.</p>\r\n', ' 2 Nights / 3 Days', 599.00, 164.00, 5.00, '2 swimming pools, Spa and wellness centre, Fitness centre, Non-smoking rooms Restaurant, Room service Facilities for disabled guests, Tea/coffee maker in all rooms, Bar, Good breakfast, Beachfront, Private beach area, Children\'s cots (upon request), and etc.', 1, 1, NULL, 'uploads/staycations/bm-beach-resort_1.jpg', 'uploads/staycations/banner/9023e67810f4c3edf0fef22d76158215.jpg', 'BM Beach Resort', '', '', 0, 1, '2021-01-22 05:44:11', '2021-01-28 07:03:07'),
(10, 'Abu Dhabi', 'test', 'test', 'review/test', '<p>test</p>\r\n', '1', 1.00, 1.00, 1.00, 'Hello,World', 1, 1, NULL, 'uploads/staycations/credit saison india.jpg', 'uploads/staycations/banner/hero.png', 'test', '', '', 1, 1, '2021-01-25 06:15:28', '2021-01-28 06:56:21'),
(11, 'Abu Dhabi', 'testingggg', 'testingggg', 'review/testingggg', '<p>test</p>\r\n', '10', 1.00, 1.00, 1.00, 'tetst', 1, 1, 'uploads/staycations/cover/1.jpg', 'uploads/staycations/sign_1.png', 'uploads/staycations/banner/bg-counter.jpg', 'Test', '', '', 1, 1, '2021-01-27 07:00:20', '2021-01-28 06:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `staycations_reviews`
--

CREATE TABLE `staycations_reviews` (
  `id` int(11) NOT NULL,
  `staycation_id` int(11) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city` varchar(500) NOT NULL,
  `review` text NOT NULL,
  `rating` double(10,1) NOT NULL,
  `profile_picture` varchar(500) NOT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staycations_reviews`
--

INSERT INTO `staycations_reviews` (`id`, `staycation_id`, `customer_name`, `country_id`, `city`, `review`, `rating`, `profile_picture`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 9, 'Ram 1', 7, 'Noida', 'Best', 1.0, 'uploads/staycations-reviews/1/credit saison india.jpg', 2, 1, '2021-01-12 13:18:05', '2021-01-12 09:04:49'),
(2, 9, 'Alfaiz 2', 99, 'Noida', 'Best', 1.0, 'uploads/staycations-reviews/2/ft-logo.png', 1, 1, '2021-01-19 13:21:28', '2021-01-12 09:05:05'),
(7, 11, 'Muhammad Alfaiz', 99, 'Noida', 'Test', 0.5, '/uploads/staycations-reviews/1612261194.jpg', 0, 1, '0000-00-00 00:00:00', '2021-02-02 11:22:43'),
(8, 11, 'Alfaiz C&C Pvt. Ltd', 99, 'Agra', 'dsdsa', 2.0, '/uploads/staycations-reviews/1612261234.png', 0, 1, '0000-00-00 00:00:00', '2021-02-02 11:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `video` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `display_order` int(2) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `slug`, `video`, `meta_title`, `meta_keyword`, `meta_description`, `is_active`, `display_order`, `updated_at`, `created_at`) VALUES
(3, 'Vinita Michael - Flights of Fantasy', 'vinita-michael-flights-of-fantasy', '<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/qocxjXrRhZA\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Jewellery Diploma - 1 Year Diploma in Silver Jewellery', '', '', 1, 1, '2021-02-27 10:10:16', '2021-02-19 09:53:44'),
(5, 'Vinita Michael - The Process', 'vinita-michael-the-process', '<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/MK_VCv9U9DU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, 1, 3, '2021-03-03 18:48:45', '2021-02-27 10:12:16'),
(6, 'Making Of \'Celestia\' in collaboration with Tresemme\' Arabia for the NYFW', 'making-of-celestia-in-collaboration-with-tresemme-arabia-for-the-nyfw', '<iframe width=\"100#\" height=\"315\" src=\"https://www.youtube.com/embed/1NesvXWJf3M\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, 1, 2, '2021-03-03 18:48:32', '2021-02-27 10:12:59'),
(7, 'Vinita Michael presents \'Lighter than Air\'', 'vinita-michael-presents-lighter-than-air', '<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/u2I9SNUPJ6U\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, 1, 4, '2021-02-27 10:13:48', '2021-02-27 10:13:48'),
(10, 'In conversion with In5 DDFC', 'in-conversion-with-in5-ddfc', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ISDhWpnjOl0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, 1, 5, '2021-03-26 07:25:48', '2021-03-26 07:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(10) NOT NULL,
  `email_address` varchar(20) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `email_address`, `is_active`, `updated_at`, `created_at`) VALUES
(27, 'ram@infoquestit.com', 1, NULL, '2021-03-20 10:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category_name`, `meta_title`, `meta_keyword`, `meta_description`, `url`, `display_order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(37, 46, 'Clean Sense', 'Clean Sense | Dhofar Global', '', '', 'clean-sense', 1, 1, '2020-06-09 07:38:15', 1, '0000-00-00 00:00:00', 0),
(38, 46, 'Discretion', 'Discretion | Dhofar Global', '', '', 'discretion', 2, 1, '2020-06-09 07:38:39', 1, '0000-00-00 00:00:00', 0),
(39, 46, 'Oudh', 'Oudh | Dhofar Global', '', '', 'oudh', 0, 1, '2020-06-09 07:39:02', 1, '0000-00-00 00:00:00', 0),
(40, 46, 'Expressions', 'Expressions | Dhofar Global', '', '', 'expressions', 3, 1, '2020-06-09 07:39:27', 1, '0000-00-00 00:00:00', 0),
(41, 46, 'Ice', 'Ice | Dhofar Global', '', '', 'ice', 1, 1, '2020-06-09 07:39:52', 1, '0000-00-00 00:00:00', 0),
(42, 46, 'Inspirations', 'Inspirations | Dhofar Global', '', '', 'inspirations', 2, 1, '2020-06-09 07:41:27', 1, '0000-00-00 00:00:00', 0),
(43, 46, 'Kilimanjaro', 'Kilimanjaro | Dhofar Global', '', '', 'kilimanjaro', 3, 1, '2020-06-09 07:43:18', 1, '0000-00-00 00:00:00', 0),
(44, 46, 'Perceptions', 'Perceptions | Dhofar Global', '', '', 'perceptions', 4, 1, '2020-06-09 07:44:29', 1, '0000-00-00 00:00:00', 0),
(45, 46, 'Radiant Sense', 'Radiant Sense | Dhofar Global', '', '', 'radiant-sense', 9, 1, '2020-06-09 07:45:39', 1, '0000-00-00 00:00:00', 0),
(46, 46, 'Reflections', 'Reflections | Dhofar Global', '', '', 'reflections', 10, 1, '2020-06-09 07:46:16', 1, '0000-00-00 00:00:00', 0),
(47, 46, 'Sensations', 'Sensations | Dhofar Global', '', '', 'sensations', 11, 1, '2020-06-09 07:55:15', 1, '0000-00-00 00:00:00', 0),
(48, 46, 'Tranquil Sense', 'Tranquil Sense | Dhofar Global', '', '', 'tranquil-sense', 12, 1, '2020-06-09 07:57:31', 1, '0000-00-00 00:00:00', 0),
(49, 46, 'Vibrant Sense', 'Vibrant Sense | Dhofar Global', '', '', 'vibrant-sense', 13, 1, '2020-06-09 07:57:55', 1, '0000-00-00 00:00:00', 0),
(50, 46, 'Relaxing Spa', 'Relaxing Spa | Dhofar Global', '', '', 'relaxing-spa', 14, 1, '2020-06-09 07:58:13', 1, '0000-00-00 00:00:00', 0),
(51, 47, 'Plastic', 'Plastic | Dhofar Global', '', '', 'plastic', 1, 1, '2020-06-09 07:58:40', 1, '0000-00-00 00:00:00', 0),
(52, 48, 'Ambiente ECO', 'Ambiente ECO | Dhofar Global', '', '', 'ambiente-eco', 1, 1, '2020-06-09 07:59:10', 1, '0000-00-00 00:00:00', 0),
(53, 48, 'Ambiente Professional', 'Ambiente Professional | Dhofar Global', '', '', 'ambiente-professional', 2, 1, '2020-06-09 08:00:21', 1, '0000-00-00 00:00:00', 0),
(54, 49, 'Tools', 'Tools | Dhofar Global', '', '', 'tools', 1, 1, '2020-06-09 08:01:35', 1, '0000-00-00 00:00:00', 0),
(55, 51, 'Smaller Area', 'Smaller Area | Dhofar Global', '', '', 'smaller-area', 10, 1, '2020-06-09 08:01:52', 1, '2020-06-09 08:03:08', 1),
(56, 51, 'Medium Area', 'Medium Area | Dhofar Global', '', '', 'medium-area', 10, 1, '2020-06-09 08:02:26', 1, '2020-06-09 08:03:25', 1),
(57, 52, 'Tissue Dispenser', 'Tissue Dispenser | Dhofar Global', '', '', 'tissue-dispenser', 1, 1, '2020-06-09 08:08:33', 1, '0000-00-00 00:00:00', 0),
(58, 52, 'Soap Dispensers', 'Soap Dispensers | Dhofar Global', '', '', 'soap-dispensers', 2, 1, '2020-06-09 08:09:15', 1, '0000-00-00 00:00:00', 0),
(59, 52, 'Auto Clean Dispenser', 'Auto Cean Dispenser | Dhofar Global', '', '', 'auto-clean-dispenser', 3, 1, '2020-06-09 08:09:49', 1, '2020-06-09 08:11:17', 1),
(60, 52, 'Toilet Seat Cover', 'Toilet Seat Cover | Dhofar Global', '', '', 'toilet-seat-cover', 4, 1, '2020-06-09 08:12:00', 1, '0000-00-00 00:00:00', 0),
(61, 52, 'Bag Dispenser', 'Bag Dispenser | Dhofar Global', '', '', 'bag-dispenser', 5, 1, '2020-06-09 08:12:19', 1, '0000-00-00 00:00:00', 0),
(62, 53, 'Vinyl Gloves', 'Vinyl Gloves | Dhofar Global', '', '', 'vinyl-gloves', 1, 1, '2020-06-09 08:13:21', 1, '0000-00-00 00:00:00', 0),
(63, 53, 'Latex Gloves', 'Latex Gloves | Dhofar Global', '', '', 'latex-gloves', 2, 1, '2020-06-09 08:13:49', 1, '0000-00-00 00:00:00', 0),
(64, 53, 'Nitrile Gloves', 'Nitrile Gloves | Dhofar Global', '', '', 'nitrile-gloves', 3, 1, '2020-06-09 08:14:41', 1, '0000-00-00 00:00:00', 0),
(65, 54, 'Disposables', 'Disposables | Dhofar Global', '', '', 'disposables', 1, 1, '2020-06-09 08:15:12', 1, '0000-00-00 00:00:00', 0),
(66, 55, 'Gell', 'Gell | Dhofar Global', '', '', 'gell', 1, 1, '2020-06-09 08:15:36', 1, '0000-00-00 00:00:00', 0),
(67, 56, 'Autocut', 'Autocut | Dhofar Global', '', '', 'autocut', 1, 1, '2020-06-09 08:16:45', 1, '0000-00-00 00:00:00', 0),
(68, 56, 'Interfold', 'Interfold | Dhofar Global', '', '', 'interfold', 2, 1, '2020-06-09 08:17:16', 1, '0000-00-00 00:00:00', 0),
(69, 56, 'Jumbo Mini Toilet Roll', 'Jumbo Mini Toilet Roll | Dhofar Global', '', '', 'jumbo-mini-toilet-roll', 3, 1, '2020-06-09 08:17:52', 1, '0000-00-00 00:00:00', 0),
(70, 56, 'Maxipull', 'Maxipull | Dhofar Global', '', '', 'maxipull', 4, 1, '2020-06-09 08:18:17', 1, '0000-00-00 00:00:00', 0),
(71, 56, 'Minipull', 'Minipull | Dhofar Global', '', '', 'minipull', 5, 1, '2020-06-09 08:18:47', 1, '0000-00-00 00:00:00', 0),
(72, 56, 'Facial Tissue', 'Facial Tissue | Dhofar Global', '', '', 'facial-tissue', 6, 1, '2020-06-09 08:19:36', 1, '0000-00-00 00:00:00', 0),
(73, 56, 'Airlaid Napkin', 'Airlaid Napkin | Dhofar Global', '', '', 'airlaid-napkin', 6, 1, '2020-06-09 08:20:28', 1, '2020-06-22 03:40:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(250) NOT NULL,
  `tag_url` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`, `tag_url`, `is_active`, `updated_at`, `created_at`) VALUES
(29, 'Products', 'Products', 1, '0000-00-00 00:00:00', '2020-06-08 16:42:50'),
(30, 'About Dhofar Global', 'About-Dhofar-Global', 1, '0000-00-00 00:00:00', '2020-06-08 16:52:07'),
(31, 'Environment', 'Environment', 1, '0000-00-00 00:00:00', '2020-06-08 16:52:30'),
(32, 'Hygiene', 'Hygiene', 1, '2020-06-09 23:49:38', '2020-06-08 16:53:43'),
(33, 'Test', 'Test', 1, '0000-00-00 00:00:00', '2021-02-01 12:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `emirates` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `tour_name` text NOT NULL,
  `tour_slug` text NOT NULL,
  `review_link` text NOT NULL,
  `best_seller` int(1) DEFAULT NULL,
  `featured` int(1) DEFAULT NULL,
  `popular` int(1) DEFAULT NULL,
  `overview` text NOT NULL,
  `inclusion` text NOT NULL,
  `policy` text NOT NULL,
  `duration` varchar(255) NOT NULL,
  `departure_point` varchar(255) NOT NULL,
  `reporting_point` varchar(255) NOT NULL,
  `tour_language` varchar(255) NOT NULL,
  `meals` varchar(255) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `cancellation` varchar(255) DEFAULT NULL,
  `starting_time` varchar(255) NOT NULL,
  `confirmation` varchar(255) DEFAULT NULL,
  `pickup` enum('yes','no','optional') DEFAULT 'no',
  `deals` int(1) DEFAULT 0,
  `image` varchar(500) NOT NULL,
  `banner_image` varchar(500) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `display_order` int(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id`, `type`, `emirates`, `category`, `tour_name`, `tour_slug`, `review_link`, `best_seller`, `featured`, `popular`, `overview`, `inclusion`, `policy`, `duration`, `departure_point`, `reporting_point`, `tour_language`, `meals`, `availability`, `cancellation`, `starting_time`, `confirmation`, `pickup`, `deals`, `image`, `banner_image`, `meta_title`, `meta_keyword`, `meta_description`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(6, 'Tickets', 'Dubai', 7, 'Burj Khalifa', 'burj-khalifa', 'review/burj-khalifa', 1, 1, 1, '<p>One of the reasons why tourists choose Dubai to visit is to see Burj Khalifa! The tallest building in the world from 2009 till present, with a total height of 829.8m (2.722 Ft.) still stands as a major landmark of Dubai. The building was opened in 2010 at the time of Dubai&#39;s downtown development. The building originally named &lsquo;Burj Dubai&rsquo; later renamed Burj Khalifa. It sets several world records based on its height and structure. And the world&rsquo;s largest light &amp; sound show makes Burjkhalifa even more attractive to tourists. Available tickets are 124th and 125th floor which can give you a good looking view and if you want to more they also have 148th floor. You will also have the COMBO ticket that includes the 124th Floor At the Top and Dubai Mall Aquarium Tickets that provides a view of Underwater Zoo Aquarium with 300 species that includes sharks.<br />\r\n&nbsp;</p>\r\n', '<p>*124th and 125th Floor Entrance Ticket&nbsp;<br />\r\n&nbsp;*30 Minutes view from the Observation Deck on non prime hrs</p>\r\n', '<p>Cancellation Policy<br />\r\n&nbsp;All Cancellations made 48 hours prior to the Tour departure time NO charges will be applicable<br />\r\n&nbsp;If Cancellation made within 48 hours to your Tour departure time 100% charges will be applicable<br />\r\n&nbsp;If eligible for Refund your Amount will be returned back to your Account within 7 working days.<br />\r\n&nbsp;Child Policy<br />\r\n&nbsp;Children under 4 years will be considered as infant and entry will be free of cost.<br />\r\n&nbsp;Children between age 4 to 12 will be considered as child and charged child rate.<br />\r\n&nbsp;Children above age 12 will be considered as an adult and charged adult rate.</p>\r\n', '4-5hrs', 'HOTEL/RESIDENCE', 'HOTEL LOBBY/RESIDENCE', 'English', 'Not Included', 'DAILY', '48HRS - ALL PRIOR', '10:00', NULL, 'optional', 1, 'uploads/tour/burj_tour_cover_1.jpg', 'uploads/tour/banner/banner-2.jpg', 'Burj Khalifa', '', '', 1, 1, '2021-01-19 10:41:35', '2021-01-19 11:32:31'),
(7, 'Tickets', 'Ra\'s al-Khaimah', 11, 'Dubai Aquarium', 'dubai-aquarium', 'review/dubai-aquarium', 1, 1, NULL, '<p>Are you and your kids love cars? Then include Ferrari World on your bucket list to visit. This attraction has the record of being the largest space frame structure built over an area of 86,000 square meters. 37 rides for you and your kids will be there including the world&rsquo;s fastest roller coaster which they call Formula Rossa. Here are some rides to expect: Flying Aces which is the highest roller coaster in the world, Scuderia Challenge, the state of the art racing simulator, Turbo Track which is an epic drop from the top, they also have the race across parallel courses with F430 spider-shaped cars which is called Fiorano GT Challenge. It also includes some awesome restaurants and shops where you hang after doing the rides. The tickets will be 2-types one it the Standard that includes unlimited access to the park and if you wish to have unlimited fast pass access you can choose the Premium one. We also offer a combo ticket that includes 2 Days 2 Parks at any parks (Ferrari World, Warner Bros, or Yas Water World) and 1Day 2Parks at your choice at a special. price.</p>\r\n', '<p>*General Admission ticket to Ferrari world<br />\r\n&nbsp;*Access to 25 racing-themed rides, shows and attractions</p>\r\n', '<p>All <span style=\"color:#f39c12;\">Cancellations</span> made 48 hours prior to the Tour departure time NO charges will be applicable<br />\r\n&nbsp;If Cancellation made within 48 hours to your Tour departure time 100% charges will be applicable<br />\r\n&nbsp;If eligible for Refund your Amount will be returned back to your Account within 7 working days.<br />\r\n&nbsp;Child Policy<br />\r\n&nbsp;Children under 3 years &amp; below 1.3 meters height will be considered as infant and entry will be free of cost.<br />\r\n&nbsp;Children between age 3 to 10 will be considered as child and charged child rate.<br />\r\n&nbsp;Children above age 10 will be considered as an adult and charged adult rate.</p>\r\n', '10HRS', 'HOTEL/RESIDENCE', 'HOTEL LOBBY/RESIDENCE', 'English', '', '', '', '12:00', NULL, 'yes', 1, 'uploads/tour/cover-for-aquarium-in-dubai_1.jpg', 'uploads/tour/banner/main-banner.jpg', 'Dubai Aquarium', '', '', 1, 1, '2021-01-20 06:46:03', '2021-02-04 06:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `tour_category`
--

CREATE TABLE `tour_category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(50) NOT NULL,
  `slug` tinytext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_category`
--

INSERT INTO `tour_category` (`id`, `category`, `is_active`, `display_order`, `slug`, `created_at`, `updated_at`) VALUES
(7, 'Attraction', 1, 1, 'Attraction', '2021-01-19 10:59:16', '0000-00-00 00:00:00'),
(8, 'Adventure', 1, 0, 'Adventure', '2021-01-19 11:02:54', '0000-00-00 00:00:00'),
(9, 'Tour', 1, 0, 'Tour', '2021-01-19 11:03:04', '0000-00-00 00:00:00'),
(10, 'Theme Park', 1, 0, 'Theme-Park', '2021-01-19 11:03:13', '0000-00-00 00:00:00'),
(11, 'Water Park', 1, 0, 'Water-Park', '2021-01-19 11:03:22', '0000-00-00 00:00:00'),
(12, 'Seasonal Attraction', 1, 0, 'Seasonal-Attraction', '2021-01-19 11:03:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tour_faqs`
--

CREATE TABLE `tour_faqs` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `display_order` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_faqs`
--

INSERT INTO `tour_faqs` (`id`, `tour_id`, `question`, `answer`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(6, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit1', 'Web design aorem apsum dolor sit amet, adipiscing elit, sed diam nibh euismod tincidunt ut laoreet\r\n      dolore magna aliquam erat volutpat. Claritas est etiam processus. ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Claritas est etiam processus.', 1, 0, '2021-01-20 14:18:26', '0000-00-00 00:00:00'),
(7, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit1', 'Web design aorem apsum dolor sit amet, adipiscing elit, sed diam nibh euismod tincidunt ut laoreet\r\n      dolore magna aliquam erat volutpat. Claritas est etiam processus. ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Claritas est etiam processus.', 1, 0, '2021-01-20 14:18:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tour_gallery`
--

CREATE TABLE `tour_gallery` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `image_path_thumb` varchar(500) NOT NULL,
  `medium_image_path` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_gallery`
--

INSERT INTO `tour_gallery` (`id`, `tour_id`, `image_path`, `image_path_thumb`, `medium_image_path`, `created_at`, `updated_at`) VALUES
(4, 2, 'uploads/tourgallery/ft-logo.png', 'uploads/tourgallery/thumb/ft-logo.png', 'uploads/tourgallery/medium/ft-logo.png', '2021-01-11 13:05:43', '0000-00-00 00:00:00'),
(5, 2, 'uploads/tourgallery/hireme.jpg', 'uploads/tourgallery/thumb/hireme.jpg', 'uploads/tourgallery/medium/hireme.jpg', '2021-01-11 13:05:43', '2021-01-11 13:18:13'),
(6, 6, 'uploads/tourgallery/30100.jpg', 'uploads/tourgallery/thumb/30100.jpg', 'uploads/tourgallery/medium/30100.jpg', '2021-01-19 11:46:33', '2021-01-27 11:21:19'),
(7, 6, 'uploads/tourgallery/contact_banner.jpg', 'uploads/tourgallery/thumb/contact_banner.jpg', 'uploads/tourgallery/medium/contact_banner.jpg', '2021-01-19 11:46:33', '2021-01-27 11:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `tour_options`
--

CREATE TABLE `tour_options` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tour_option_name` text NOT NULL,
  `description` text DEFAULT NULL,
  `without_transfer` int(1) DEFAULT NULL,
  `adult_aed` decimal(10,2) DEFAULT NULL,
  `adult_usd` decimal(10,2) DEFAULT NULL,
  `child_aed` decimal(10,2) DEFAULT NULL,
  `child_usd` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `sharing_transfer` int(1) DEFAULT NULL,
  `st_adult_aed` decimal(10,2) DEFAULT NULL,
  `st_adult_usd` decimal(10,2) DEFAULT NULL,
  `st_child_aed` decimal(10,2) DEFAULT NULL,
  `st_child_usd` decimal(10,2) DEFAULT NULL,
  `st_discount` decimal(10,2) DEFAULT NULL,
  `private_transfer` int(1) DEFAULT NULL,
  `pt_adult_aed` decimal(10,2) DEFAULT NULL,
  `pt_adult_usd` decimal(10,2) DEFAULT NULL,
  `pt_child_aed` decimal(10,2) DEFAULT NULL,
  `pt_child_usd` decimal(10,2) DEFAULT NULL,
  `pt_discount` decimal(10,2) DEFAULT NULL,
  `transfer_cost` decimal(10,2) DEFAULT NULL,
  `transfer_cost_usd` decimal(10,2) NOT NULL,
  `guest_limit` int(11) DEFAULT NULL,
  `transfer_timings` text DEFAULT NULL,
  `duration` text DEFAULT NULL,
  `st_transfer_timings` text DEFAULT NULL,
  `st_duration` text DEFAULT NULL,
  `pt_transfer_timings` text DEFAULT NULL,
  `pt_duration` text DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_options`
--

INSERT INTO `tour_options` (`id`, `tour_id`, `tour_option_name`, `description`, `without_transfer`, `adult_aed`, `adult_usd`, `child_aed`, `child_usd`, `discount`, `sharing_transfer`, `st_adult_aed`, `st_adult_usd`, `st_child_aed`, `st_child_usd`, `st_discount`, `private_transfer`, `pt_adult_aed`, `pt_adult_usd`, `pt_child_aed`, `pt_child_usd`, `pt_discount`, `transfer_cost`, `transfer_cost_usd`, `guest_limit`, `transfer_timings`, `duration`, `st_transfer_timings`, `st_duration`, `pt_transfer_timings`, `pt_duration`, `is_active`, `created_at`, `updated_at`) VALUES
(9, 6, '124th Floor non prime', 'One of the reasons why tourists choose Dubai to visit is to see Burj Khalifa! The tallest building in the world from 2009 till present, with a total height of 829.8m (2.722 Ft.) still stands as a major landmark of Dubai. The building was opened in 2010 at the time of Dubai\'s downtown development. The building originally named ‘Burj Dubai’ later renamed Burj Khalifa. It sets several world records based on its height and structure. And the world’s largest light & sound show makes Burjkhalifa even more attractive to tourists. Available tickets are 124th and 125th floor which can give you a good looking view and if you want to more they also have 148th floor. You will also have the COMBO ticket that includes the 124th Floor At the Top and Dubai Mall Aquarium Tickets that provides a view of Underwater Zoo Aquarium with 300 species that includes sharks.', 1, '200.00', '100.00', '150.00', '120.00', '5.00', 1, '150.00', '50.00', '50.00', '25.00', '5.00', 1, '150.00', '41.00', '100.00', '40.00', '5.00', '190.00', '0.00', 5, '', '', '3 to 5 Days', '10 Days', '', '', 1, '2021-01-19 10:55:38', NULL),
(10, 6, '124th Floor prime', 'Burj Khalifa! The tallest building in the world from 2009 till present, with a total height of 829.8m (2.722 Ft.) still stands as a major landmark of Dubai. The building was opened in 2010 at the time of Dubai\'s downtown development. The building originally named ‘Burj Dubai’ later renamed Burj Khalifa. It sets several world records based on its height and structure. And the world’s largest light & sound show makes Burjkhalifa even more attractive to tourists. Available tickets are 124th and 125th floor which can give you a good looking view and if you want to more they also have 148th floor. You will also have the COMBO ticket that includes the 124th Floor At the Top and Dubai Mall Aquarium Tickets that provides a view of Underwater Zoo Aquarium with 300 species that includes sharks.', 0, NULL, NULL, NULL, NULL, NULL, 1, '100.00', '75.00', '100.00', '50.00', '5.00', 1, '215.00', '59.00', '0.00', '0.00', '0.00', '190.00', '80.00', 5, NULL, NULL, '', '', '', '', 1, '2021-01-19 10:57:55', NULL),
(11, 7, 'Underwater Zoo-Standard', 'While roaming around the Dubai Mall, the Dubai aquarium and underwater zoo will surely catch your eye! It is located on the ground floor of the mall. Dubai Aquarium has 3 main divisions. The first one is the Aquarium tank, which is home to 140 species of thousands of aquatic animals and marine life. And the second one Aquarium tunnel, the 48-meter long tunnel offers a closer look at the amazing marine world. The last section underwater zoo helps you to explore the stunning range of ocean creatures through 40 different display tanks. And there are many different activities such as cage snorkeling, shark feeding encounter, shark diving, etc. these activities make your day unforgettable. Tickets are available for standard the will include access to Aquarium Tunnel and Underwater Zoo. If you want to explore more they provide an Explorer ticket which will include an additional Glass Boat Tour!', 1, '95.00', '26.00', '95.00', '26.00', '0.00', 0, NULL, NULL, NULL, NULL, NULL, 1, '205.00', '190.00', '51.77', '55.86', '0.00', '190.00', '180.00', 5, 'SUBJECT TO TICKET SELECTION', ' 4-5hrs', NULL, NULL, NULL, NULL, 1, '2021-01-20 06:48:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tour_reviews`
--

CREATE TABLE `tour_reviews` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city` varchar(500) NOT NULL,
  `review` text NOT NULL,
  `rating` double(10,1) NOT NULL,
  `profile_picture` varchar(500) NOT NULL,
  `display_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_reviews`
--

INSERT INTO `tour_reviews` (`id`, `tour_id`, `customer_name`, `country_id`, `city`, `review`, `rating`, `profile_picture`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 6, 'Ram', 99, 'Kolkata', 'Best Tour', 5.0, 'uploads/tour-reviews/1/img_20190719_074215_02.jpg', 1, 1, '2021-01-11 16:17:51', '2021-01-21 06:43:23'),
(2, 6, 'Moin Muhammad', 187, 'Abu Dhabi', 'Best Tour Update', 3.5, 'uploads/tour-reviews/2/5cbddabff083e-bpfull.jpg', 1, 1, '2021-01-11 16:17:51', '2021-01-21 06:43:40'),
(7, 6, 'Muhammad Moin', 187, 'Abu Dhabi', 'Best Tour Update', 4.5, 'uploads/tour-reviews/2/5cbddabff083e-bpfull.jpg', 1, 1, '2021-01-11 16:17:51', '2021-01-21 06:43:40'),
(8, 6, 'Moin Muhammad', 187, 'Abu Dhabi', 'Best Tour Update', 3.0, 'uploads/tour-reviews/2/5cbddabff083e-bpfull.jpg', 1, 1, '2021-01-11 16:17:51', '2021-01-21 06:43:40'),
(9, 6, 'Moin Muhammad', 187, 'Abu Dhabi', 'Best Tour Update', 2.5, 'uploads/tour-reviews/2/5cbddabff083e-bpfull.jpg', 1, 1, '2021-01-11 16:17:51', '2021-01-21 06:43:40'),
(10, 6, 'Moin Muhammad', 187, 'Abu Dhabi', 'Best Tour Update', 1.5, 'uploads/tour-reviews/2/5cbddabff083e-bpfull.jpg', 1, 1, '2021-01-11 16:17:51', '2021-01-21 06:43:40'),
(11, 6, 'Moin Muhammad', 187, 'Abu Dhabi', 'Best Tour Update', 0.5, 'uploads/tour-reviews/2/5cbddabff083e-bpfull.jpg', 1, 1, '2021-01-11 16:17:51', '2021-01-21 06:43:40'),
(12, 6, 'Moin Muhammad', 187, 'Abu Dhabi', 'Best Tour Update', 1.0, 'uploads/tour-reviews/2/5cbddabff083e-bpfull.jpg', 1, 1, '2021-01-11 16:17:51', '2021-01-21 06:43:40'),
(13, 7, 'ALfaiz Dubai', 1, 'Dubai', 'Dubai Aqua Rev', 1.5, 'uploads/tour-reviews/1612262284.png', 0, 1, '0000-00-00 00:00:00', '2021-02-02 11:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(500) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `profile_picture` text DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `gender`, `profile_picture`, `verification_code`, `token`, `is_active`, `created_at`, `updated_at`) VALUES
(6, 'Muhammad', 'ALfaiz', 'alfaizm19@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9876543210', 'male', NULL, NULL, NULL, 1, '2021-04-28 10:11:29', '2021-04-28 17:52:51'),
(7, 'Muhammad', 'Alfaiz', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9876543222', 'male', NULL, NULL, NULL, 1, '2021-04-29 04:41:12', NULL),
(8, 'test', 'test', 'testing@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9876543216', 'male', NULL, NULL, NULL, 1, '2021-04-29 08:09:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(510) NOT NULL,
  `last_name` varchar(510) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `address1` text NOT NULL,
  `address2` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL,
  `province` int(255) DEFAULT NULL,
  `zip_code` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_default` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `company_name`, `address1`, `address2`, `city`, `country`, `updated_at`, `province`, `zip_code`, `phone`, `is_default`) VALUES
(4, 4, 'Ram', 'Shanmugam', 'hdfghdfg', 'hfghdfgh', 'dfghdfgh', 'dfghdfghdfgh', '2', '0000-00-00 00:00:00', 0, '600001', '12315345454545', 'yes'),
(5, 4, 'Ram', 'Shanmugam', 'hdfghdfg12333', 'hfghdfghhjhj', 'dfghdfgh', 'dfghdfghdfgh', '224', '0000-00-00 00:00:00', 13, '', '45234523452345', 'no'),
(6, 1, 'Muhammad', 'Alfaiz', 'Test', 'test', '', 'Test', '99', '0000-00-00 00:00:00', 4, '123456', '1234567890', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `id` int(11) NOT NULL,
  `type` enum('UAE Visa','International Visa') NOT NULL,
  `country` int(11) NOT NULL,
  `visa_name` varchar(255) NOT NULL,
  `visa_slug` text NOT NULL,
  `review_link` text NOT NULL,
  `description` text NOT NULL,
  `documents` text NOT NULL,
  `how_to_apply` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `banner_image` varchar(500) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `display_order` int(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visa`
--

INSERT INTO `visa` (`id`, `type`, `country`, `visa_name`, `visa_slug`, `review_link`, `description`, `documents`, `how_to_apply`, `image`, `banner_image`, `meta_title`, `meta_keyword`, `meta_description`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'International Visa', 99, 'Indian Visa', 'indian-visa', 'review/indian-visa', '<p>Description</p>\r\n', '<p>Documents</p>\r\n', '<p>How to Apply</p>\r\n', 'uploads/visa/5.png', 'uploads/visa/banner/photo-1512453979798-5ea266f8880c.jpeg', 'Test', '', '', 1, 1, '2021-01-05 11:06:06', '2021-01-23 10:06:18'),
(6, 'UAE Visa', 187, 'Arab Visa', 'arab-visa', 'review/arab-visa', '<p>Description</p>\r\n', '<p>Documents</p>\r\n', '<p>How To Apply</p>\r\n', 'uploads/visa/credit saison india.jpg', 'uploads/visa/banner/hassan_ceo.png', 'Clean Sense 150Ml Aerosol', '', '', 2, 1, '2021-01-05 11:32:35', '2021-01-05 07:35:53'),
(7, 'UAE Visa', 13, 'Australia Visa', 'australia-visa', 'review/australia-visa', '<p>Australia Visa</p>\r\n', '<p>Australia Visa</p>\r\n', '<p>Australia Visa</p>\r\n', 'uploads/visa/dubai-uae-buildings-skyscrapers-night-hd-wallpaper-93494-wallpaper-preview.jpg', 'uploads/visa/banner/e6336251264bb295c6ed1b427494f94e.jpg', 'Australia Visa', '', '', 4, 1, '2021-01-07 05:52:50', '2021-01-23 10:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `visa_options`
--

CREATE TABLE `visa_options` (
  `id` int(11) NOT NULL,
  `visa_type` enum('UAE Visa','International Visa') NOT NULL,
  `visa_id` int(11) NOT NULL,
  `visa_option_name` varchar(510) NOT NULL,
  `normal` varchar(255) DEFAULT NULL,
  `normal_aed` double(10,2) DEFAULT NULL,
  `normal_usd` double(10,2) DEFAULT NULL,
  `normal_discount` double(10,2) DEFAULT NULL,
  `normal_duration` varchar(510) DEFAULT NULL,
  `express` varchar(510) DEFAULT NULL,
  `express_aed` double(10,2) DEFAULT NULL,
  `express_usd` double(10,2) DEFAULT NULL,
  `express_discount` double(10,2) DEFAULT NULL,
  `express_duration` varchar(510) DEFAULT NULL,
  `valid_to_enter` varchar(510) NOT NULL,
  `valid_to_stay` varchar(510) NOT NULL,
  `display_order` int(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visa_options`
--

INSERT INTO `visa_options` (`id`, `visa_type`, `visa_id`, `visa_option_name`, `normal`, `normal_aed`, `normal_usd`, `normal_discount`, `normal_duration`, `express`, `express_aed`, `express_usd`, `express_discount`, `express_duration`, `valid_to_enter`, `valid_to_stay`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'International Visa', 5, 'UAE Visa for dubai toor', 'normal', 100.00, 80.00, 5.00, '5 Days', NULL, NULL, NULL, NULL, NULL, '13', '14', 1, 1, '2021-01-07 07:45:55', '2021-01-28 11:11:51'),
(2, 'International Visa', 5, 'Indian Visa for Mumbai Tour', 'normal', 50.00, 45.50, 4.50, '10 Days', 'express', 55.60, 70.50, 10.00, '5 Days', '15', '14 Days', 2, 1, '2021-01-07 07:47:37', '2021-01-28 11:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(29, 3, 221, '2021-02-28 07:43:15', NULL),
(30, 3, 215, '2021-02-28 07:43:19', NULL),
(31, 3, 217, '2021-02-28 07:43:23', NULL),
(41, 6, 225, '2021-03-25 19:01:01', NULL),
(42, 4, 223, '2021-03-25 19:58:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `attribute_name`
--
ALTER TABLE `attribute_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_gallery`
--
ALTER TABLE `blog_gallery`
  ADD PRIMARY KEY (`blog_gallery_type_id`);

--
-- Indexes for table `blog_like`
--
ALTER TABLE `blog_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_media`
--
ALTER TABLE `blog_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_country`
--
ALTER TABLE `career_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_enquiry`
--
ALTER TABLE `career_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_experience`
--
ALTER TABLE `career_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_questions`
--
ALTER TABLE `career_questions`
  ADD PRIMARY KEY (`career_question_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `celeb_style`
--
ALTER TABLE `celeb_style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collaboration_gallery`
--
ALTER TABLE `collaboration_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributor_enquiry`
--
ALTER TABLE `distributor_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_card_code`
--
ALTER TABLE `gift_card_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_analytics`
--
ALTER TABLE `google_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_category_new`
--
ALTER TABLE `main_category_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metal`
--
ALTER TABLE `metal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_like`
--
ALTER TABLE `news_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_media`
--
ALTER TABLE `news_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalized_enquiry`
--
ALTER TABLE `personalized_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press`
--
ALTER TABLE `press`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press_image`
--
ALTER TABLE `press_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_country_details`
--
ALTER TABLE `product_country_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_banner`
--
ALTER TABLE `promo_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews_bkp`
--
ALTER TABLE `reviews_bkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `second_sub_category`
--
ALTER TABLE `second_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shape`
--
ALTER TABLE `shape`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_faqs`
--
ALTER TABLE `site_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_reviews`
--
ALTER TABLE `site_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settingsbkp`
--
ALTER TABLE `site_settingsbkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staycations`
--
ALTER TABLE `staycations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staycations_reviews`
--
ALTER TABLE `staycations_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_category`
--
ALTER TABLE `tour_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_faqs`
--
ALTER TABLE `tour_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_gallery`
--
ALTER TABLE `tour_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_options`
--
ALTER TABLE `tour_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_reviews`
--
ALTER TABLE `tour_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa_options`
--
ALTER TABLE `visa_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_name`
--
ALTER TABLE `attribute_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blog_gallery`
--
ALTER TABLE `blog_gallery`
  MODIFY `blog_gallery_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_like`
--
ALTER TABLE `blog_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `blog_media`
--
ALTER TABLE `blog_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `career_country`
--
ALTER TABLE `career_country`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `career_enquiry`
--
ALTER TABLE `career_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `career_experience`
--
ALTER TABLE `career_experience`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `career_questions`
--
ALTER TABLE `career_questions`
  MODIFY `career_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `celeb_style`
--
ALTER TABLE `celeb_style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `certification`
--
ALTER TABLE `certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `collaboration`
--
ALTER TABLE `collaboration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `collaboration_gallery`
--
ALTER TABLE `collaboration_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `distributor_enquiry`
--
ALTER TABLE `distributor_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gift_card_code`
--
ALTER TABLE `gift_card_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `google_analytics`
--
ALTER TABLE `google_analytics`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `main_category_new`
--
ALTER TABLE `main_category_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `metal`
--
ALTER TABLE `metal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `news_like`
--
ALTER TABLE `news_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `news_media`
--
ALTER TABLE `news_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personalized_enquiry`
--
ALTER TABLE `personalized_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `press`
--
ALTER TABLE `press`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `press_image`
--
ALTER TABLE `press_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_country_details`
--
ALTER TABLE `product_country_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `promo_banner`
--
ALTER TABLE `promo_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews_bkp`
--
ALTER TABLE `reviews_bkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `second_sub_category`
--
ALTER TABLE `second_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `shape`
--
ALTER TABLE `shape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `site_faqs`
--
ALTER TABLE `site_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `site_reviews`
--
ALTER TABLE `site_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_settingsbkp`
--
ALTER TABLE `site_settingsbkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `staycations`
--
ALTER TABLE `staycations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staycations_reviews`
--
ALTER TABLE `staycations_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tour_category`
--
ALTER TABLE `tour_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tour_faqs`
--
ALTER TABLE `tour_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tour_gallery`
--
ALTER TABLE `tour_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tour_options`
--
ALTER TABLE `tour_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tour_reviews`
--
ALTER TABLE `tour_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visa`
--
ALTER TABLE `visa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visa_options`
--
ALTER TABLE `visa_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `blog_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
