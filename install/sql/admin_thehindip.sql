-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 12:50 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_thehindip`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_spaces`
--

CREATE TABLE `ad_spaces` (
  `id` int(11) NOT NULL,
  `ad_space` text,
  `ad_code_728` text,
  `ad_code_468` text,
  `ad_code_300` text,
  `ad_code_234` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ad_spaces`
--

INSERT INTO `ad_spaces` (`id`, `ad_space`, `ad_code_728`, `ad_code_468`, `ad_code_300`, `ad_code_234`) VALUES
(1, 'index_top', '', '', '', ''),
(2, 'index_bottom', '', '', '', ''),
(3, 'post_top', '', '', '', ''),
(4, 'post_bottom', '', '', '', ''),
(5, 'category_top', '', '', '', ''),
(6, 'category_bottom', '', '', '', ''),
(7, 'tag_top', '', '', '', ''),
(8, 'tag_bottom', '', '', '', ''),
(9, 'search_top', '', '', '', ''),
(10, 'search_bottom', '', '', '', ''),
(11, 'profile_top', '', '', '', ''),
(12, 'profile_bottom', '', '', '', ''),
(13, 'reading_list_top', '', '', '', ''),
(14, 'reading_list_bottom', '', '', '', ''),
(15, 'sidebar_top', '', '', '', ''),
(16, 'sidebar_bottom', '', '', '', ''),
(17, 'header', '', '', '', ''),
(18, 'posts_top', '', '', '', ''),
(19, 'posts_bottom', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `audios`
--

CREATE TABLE `audios` (
  `id` int(11) NOT NULL,
  `audio_path` varchar(255) DEFAULT NULL,
  `audio_name` varchar(500) DEFAULT NULL,
  `musician` varchar(500) DEFAULT NULL,
  `download_button` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `name_slug` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `block_type` varchar(255) DEFAULT NULL,
  `category_order` int(11) DEFAULT '0',
  `show_at_homepage` int(11) DEFAULT '1',
  `show_on_menu` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `lang_id`, `name`, `name_slug`, `parent_id`, `description`, `keywords`, `color`, `block_type`, `category_order`, `show_at_homepage`, `show_on_menu`, `created_at`) VALUES
(1, 1, 'राजनीति', 'politics', 0, '', '', '#ad7575', 'block-1', 1, 1, 1, '2018-09-04 12:17:13'),
(2, 1, 'राज्य', 'states', 0, '', '', '#937070', 'block-1', 1, 1, 1, '2018-09-05 08:53:52'),
(3, 1, 'देश', 'nation', 0, '', '', '#ed4242', 'block-1', 1, 1, 1, '2018-09-05 08:56:22'),
(4, 1, 'बिजनेस', 'business', 0, '', '', '#bf0909', 'block-1', 1, 1, 1, '2018-09-05 08:57:19'),
(5, 1, 'टेक', 'tech', 0, '', '', '#678c19', 'block-1', 1, 1, 1, '2018-09-05 08:58:52'),
(6, 1, 'खेल', 'sports', 0, '', '', '#0315b5', 'block-1', 1, 1, 1, '2018-09-05 08:59:15'),
(7, 1, 'वायरल', 'viral', 0, '', '', '#2e51aa', 'block-1', 1, 1, 1, '2018-09-05 09:00:55'),
(8, 1, 'दुनिया', 'world', 0, '', '', '#2cb75b', 'block-1', 1, 1, 1, '2018-09-05 09:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `comment` varchar(5000) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `parent_id`, `comment`, `status`, `created_at`) VALUES
(1, 1, 2, 0, 'sfsdafsda', 0, '2018-09-13 06:20:24'),
(2, 1, 2, 0, 'sadfsdafdsaf', 0, '2018-09-13 06:20:44'),
(3, 1, 2, 0, 'r555555', 0, '2018-09-13 06:20:48'),
(4, 7, 1, 0, '22222', 0, '2018-10-29 10:34:33'),
(5, 7, 2, 0, '33333', 0, '2018-10-29 10:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'WilliesEvodo', 'filipkwak@op.pl', 'Hello, Downloads music club Dj\'s, mp3 private server. \r\nPrivate FTP Music/Albums/mp3 1990-2018: \r\nhttp://0daymusic.org/premium.php \r\n \r\n \r\nBest Regards, \r\nRobert', '2018-09-07 04:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT '1',
  `title` varchar(500) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `path_big` varchar(255) DEFAULT NULL,
  `path_small` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `site_lang` int(11) NOT NULL DEFAULT '1',
  `multilingual_system` int(11) DEFAULT '1',
  `site_color` varchar(100) DEFAULT 'default',
  `show_hits` int(11) DEFAULT '1',
  `show_rss` int(11) DEFAULT '1',
  `show_newsticker` int(11) DEFAULT '1',
  `pagination_per_page` int(11) DEFAULT '10',
  `google_analytics` text,
  `primary_font` varchar(255) DEFAULT NULL,
  `secondary_font` varchar(255) DEFAULT NULL,
  `tertiary_font` varchar(255) DEFAULT NULL,
  `mail_protocol` varchar(100) DEFAULT 'smtp',
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT '587',
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_title` varchar(255) DEFAULT NULL,
  `facebook_app_id` varchar(500) DEFAULT NULL,
  `facebook_app_secret` varchar(500) DEFAULT NULL,
  `google_app_name` varchar(500) DEFAULT NULL,
  `google_client_id` varchar(500) DEFAULT NULL,
  `google_client_secret` varchar(500) DEFAULT NULL,
  `facebook_comment` text,
  `facebook_comment_active` int(11) DEFAULT '1',
  `show_featured_section` int(11) DEFAULT '1',
  `show_latest_posts` int(11) DEFAULT '1',
  `registration_system` int(11) DEFAULT '1',
  `comment_system` int(11) DEFAULT '1',
  `emoji_reactions` int(11) DEFAULT '1',
  `newsletter` int(11) DEFAULT '1',
  `show_post_author` int(11) DEFAULT '1',
  `show_post_date` int(11) DEFAULT '1',
  `show_copy_paste` int(11) DEFAULT '1',
  `menu_limit` int(11) DEFAULT '8',
  `copyright` varchar(500) DEFAULT NULL,
  `head_code` text,
  `vr_key` varchar(500) NOT NULL,
  `purchase_code` varchar(255) NOT NULL,
  `recaptcha_site_key` varchar(255) DEFAULT NULL,
  `recaptcha_secret_key` varchar(255) DEFAULT NULL,
  `recaptcha_lang` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_lang`, `multilingual_system`, `site_color`, `show_hits`, `show_rss`, `show_newsticker`, `pagination_per_page`, `google_analytics`, `primary_font`, `secondary_font`, `tertiary_font`, `mail_protocol`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_title`, `facebook_app_id`, `facebook_app_secret`, `google_app_name`, `google_client_id`, `google_client_secret`, `facebook_comment`, `facebook_comment_active`, `show_featured_section`, `show_latest_posts`, `registration_system`, `comment_system`, `emoji_reactions`, `newsletter`, `show_post_author`, `show_post_date`, `show_copy_paste`, `menu_limit`, `copyright`, `head_code`, `vr_key`, `purchase_code`, `recaptcha_site_key`, `recaptcha_secret_key`, `recaptcha_lang`, `created_at`) VALUES
(1, 1, 1, 'default', 1, 1, 1, 16, '', 'mukta', 'mukta', 'mukta', 'smtp', '', '', '', '', '', '', '', 'The Hind Print', '', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 12, 'Copyright © 2018 The Hind Print - All Rights Reserved.', '', 'asdfdsafdsaf', '221b6eff-3d75-43e6-bd8b-f19658ef5793', '6LdHIHgUAAAAAEg2LRulKXDtad8RiNl9LSulIcXw', '6LdHIHgUAAAAAP-6DRQC5SXVuCDxHXvfCTTLNQPi', 'en', '2017-07-06 00:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT '1',
  `image_big` varchar(255) DEFAULT NULL,
  `image_default` varchar(255) DEFAULT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `image_mid` varchar(255) DEFAULT NULL,
  `image_small` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `lang_id`, `image_big`, `image_default`, `image_slider`, `image_mid`, `image_small`) VALUES
(1, 1, 'uploads/images/image_750x422_5b8e778741952.jpg', 'uploads/images/image_750x_5b8e7787e5bbc.jpg', 'uploads/images/image_600x460_5b8e7788903ca.jpg', 'uploads/images/image_380x240_5b8e77891e462.jpg', 'uploads/images/image_140x98_5b8e77894948b.jpg'),
(6, 1, 'uploads/images/image_750x422_5ba0904d34c8f.jpg', 'uploads/images/image_750x_5ba0904e0fb4c.jpg', 'uploads/images/image_600x460_5ba0904ebfecf.jpg', 'uploads/images/image_380x240_5ba0904f6e13a.jpg', 'uploads/images/image_140x98_5ba0904fa5cb3.jpg'),
(7, 1, 'uploads/images/image_750x422_5ba090a50a2d2.jpg', 'uploads/images/image_750x_5ba090a5e2c25.jpg', 'uploads/images/image_600x460_5ba090a6ca1ae.jpg', 'uploads/images/image_380x240_5ba090a76e749.jpg', 'uploads/images/image_140x98_5ba090a7a6ffb.jpg'),
(8, 1, 'uploads/images/image_750x422_5ba090e5c13ac.jpg', 'uploads/images/image_750x_5ba090e685bfd.jpg', 'uploads/images/image_600x460_5ba090e762576.jpg', 'uploads/images/image_380x240_5ba090e813b1b.jpg', 'uploads/images/image_140x98_5ba090e844fd9.jpg'),
(9, 1, 'uploads/images/image_750x422_5bcd84ca98ebb.jpg', 'uploads/images/image_750x_5bcd84cbacee7.jpg', 'uploads/images/image_600x460_5bcd84ccd6937.jpg', 'uploads/images/image_380x240_5bcd84cd90b14.jpg', 'uploads/images/image_140x98_5bcd84cdd27ec.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_form` varchar(255) NOT NULL,
  `language_code` varchar(100) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `text_direction` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `language_order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_form`, `language_code`, `folder_name`, `text_direction`, `status`, `language_order`) VALUES
(1, 'English', 'en', 'en_us', 'default', 'ltr', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`) VALUES
(1, 'madamswatimishra@gmail.com', '2018-09-05 12:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT '1',
  `title` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `is_custom` int(11) DEFAULT '1',
  `page_content` text,
  `page_order` int(11) DEFAULT '1',
  `visibility` int(11) DEFAULT '1',
  `title_active` int(11) DEFAULT '1',
  `breadcrumb_active` int(11) DEFAULT '1',
  `right_column_active` int(11) DEFAULT '1',
  `need_auth` int(11) DEFAULT '0',
  `location` varchar(255) DEFAULT 'top',
  `link` varchar(1000) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `page_type` varchar(50) DEFAULT 'page',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `lang_id`, `title`, `slug`, `description`, `keywords`, `is_custom`, `page_content`, `page_order`, `visibility`, `title_active`, `breadcrumb_active`, `right_column_active`, `need_auth`, `location`, `link`, `parent_id`, `page_type`, `created_at`) VALUES
(1, 1, 'Register', 'register', 'Varient Register Page', 'register, auth', 0, NULL, 2, 1, 1, 1, 0, 0, 'none', NULL, 0, 'page', '2017-11-22 17:07:52'),
(2, 1, 'Login', 'login', 'Varient Login Page', 'login, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', NULL, 0, 'page', '2017-11-22 17:14:41'),
(3, 1, 'Reset Password', 'reset-password', 'Varient Reset Password Page', 'reset password, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', NULL, 0, 'page', '2017-11-22 17:16:38'),
(4, 1, 'Change Password', 'change-password', 'Varient Change Password Page', 'change password, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', NULL, 0, 'page', '2017-11-22 17:19:07'),
(5, 1, 'Update Profile', 'profile-update', 'Varient Update Profile Page', 'update profile, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', NULL, 0, 'page', '2017-11-22 17:20:32'),
(6, 1, 'Contact', 'contact', 'Varient Contact Page', 'varient, contact, page', 0, NULL, 1, 1, 1, 1, 0, 0, 'top', NULL, 0, 'page', '2017-11-22 17:22:18'),
(7, 1, 'फ़ोटो गैलरी', 'gallery', '', 'gallery , page', 0, NULL, 2, 1, 1, 1, 0, 0, 'main', NULL, 0, 'page', '2017-11-22 17:33:50'),
(8, 1, 'Posts', 'posts', 'Varient Posts Page', 'varient, posts, articles, page', 0, NULL, 0, 1, 1, 1, 1, 0, 'none', NULL, 0, 'page', '2017-11-22 17:35:36'),
(9, 1, 'RSS Feeds', 'rss-feeds', 'Varient RSS Feeds Page', 'varient, rss, rss feeds', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', NULL, 0, 'page', '2017-11-22 17:44:10'),
(10, 1, 'Reading List', 'reading-list', 'Varient Reading List Page', 'varient, reading list,  read later', 0, NULL, 0, 1, 1, 1, 1, 0, 'none', NULL, 0, 'page', '2017-11-22 17:49:16'),
(11, 1, 'User Agreement', 'user-agreement', 'Varient User Agreement Page', 'varient, user agreement, terms', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', NULL, 0, 'page', '2017-11-22 17:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT '1',
  `question` text,
  `option1` text,
  `option2` text,
  `option3` text,
  `option4` text,
  `option5` text,
  `option6` text,
  `option7` text,
  `option8` text,
  `option9` text,
  `option10` text,
  `status` int(11) DEFAULT '1',
  `vote_permission` varchar(50) DEFAULT 'all',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poll_votes`
--

CREATE TABLE `poll_votes` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vote` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT '1',
  `title` varchar(500) DEFAULT NULL,
  `title_slug` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `summary` varchar(5000) DEFAULT NULL,
  `content` longtext,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `image_big` varchar(255) DEFAULT NULL,
  `image_default` varchar(255) DEFAULT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `image_mid` varchar(255) DEFAULT NULL,
  `image_small` varchar(255) DEFAULT NULL,
  `hit` int(11) DEFAULT '0',
  `optional_url` varchar(1000) DEFAULT NULL,
  `need_auth` int(11) DEFAULT '0',
  `is_slider` int(11) DEFAULT '0',
  `slider_order` int(11) DEFAULT '1',
  `is_featured` int(11) DEFAULT '0',
  `featured_order` int(11) DEFAULT '1',
  `is_recommended` int(11) DEFAULT '0',
  `is_breaking` int(11) DEFAULT '1',
  `visibility` int(11) DEFAULT '1',
  `show_right_column` int(11) DEFAULT '1',
  `post_type` varchar(100) DEFAULT 'post',
  `video_path` varchar(255) DEFAULT NULL,
  `image_url` text,
  `video_embed_code` text,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `feed_id` int(11) DEFAULT NULL,
  `post_url` varchar(1000) DEFAULT NULL,
  `show_post_url` int(11) DEFAULT '1',
  `image_description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `lang_id`, `title`, `title_slug`, `keywords`, `summary`, `content`, `category_id`, `subcategory_id`, `image_big`, `image_default`, `image_slider`, `image_mid`, `image_small`, `hit`, `optional_url`, `need_auth`, `is_slider`, `slider_order`, `is_featured`, `featured_order`, `is_recommended`, `is_breaking`, `visibility`, `show_right_column`, `post_type`, `video_path`, `image_url`, `video_embed_code`, `user_id`, `status`, `feed_id`, `post_url`, `show_post_url`, `image_description`, `created_at`) VALUES
(1, 1, 'राहुल गांधी: भाजपा और आरएसएस कर रहे देश को तोड़ने का काम', 'rahul-gandhi-bjp-and-rss-are-working-to-break-the-country', '', '', '<p><strong>नई दिल्ली</strong><strong>|</strong>&nbsp;कांग्रेस अध्यक्ष राहुल गांधी ने भारतीय जनता पार्टी (भाजपा) और राष्ट्रीय स्वयंसेवक संघ (आरएसएस) पर निशाना साधते हुए कहा कि वे भारत को तोड़ने और नफरत फैलाने का काम कर रहे हैं। राहुल ने गुरुवार को बर्लिन में इंडियन ओवरसीज कांग्रेस को संबोधित करने के दौरान यह बयान दिया। तकनीकी गड़बड़ी के कारण उनके संबोधन को सीधा प्रसारित नहीं किया जा सका।भारतीय मूल के सांसदों के साथ बातचीत करने के दौरान राहुल ने कहा,&rdquo;वर्तमान में भारत में सत्तारूढ़ सरकार भाजपा और आरएसएस देश को तोड़ना चाहते हैं और नफरत फैलाना चाहते हैं। कांग्रेस पार्टी ऐसा नहीं होने देगी।&rdquo;राहुल ने कहा कि भारत की ताकत धर्म, समाज और जाति के विभिन्न वर्ग के बावजूद हर नागरिक के विचारों को सुनने में निहित है।</p>\r\n', 1, 0, 'uploads/images/image_750x422_5b8e778741952.jpg', 'uploads/images/image_750x_5b8e7787e5bbc.jpg', 'uploads/images/image_600x460_5b8e7788903ca.jpg', 'uploads/images/image_380x240_5b8e77891e462.jpg', 'uploads/images/image_140x98_5b8e77894948b.jpg', 26, '', 0, 1, 1, 0, 1, 0, 0, 1, 1, 'post', NULL, NULL, NULL, 1, 1, NULL, NULL, 0, '', '2018-09-04 12:17:58'),
(2, 1, 'ssfasf', 'safsadf', '', 'safsadfsad', '', 1, 0, 'uploads/images/image_750x422_5b8e778741952.jpg', 'uploads/images/image_750x_5b8e7787e5bbc.jpg', 'uploads/images/image_600x460_5b8e7788903ca.jpg', 'uploads/images/image_380x240_5b8e77891e462.jpg', 'uploads/images/image_140x98_5b8e77894948b.jpg', 0, '', 0, 0, 1, 0, 1, 0, 0, 0, 1, 'post', NULL, NULL, NULL, 2, 1, NULL, NULL, 0, '', '2018-09-13 06:09:10'),
(3, 1, 'sdafadsfsda', 'fsadfsadf', '', 'safdsfdsf', '', 2, 0, 'uploads/images/image_750x422_5b8e778741952.jpg', 'uploads/images/image_750x_5b8e7787e5bbc.jpg', 'uploads/images/image_600x460_5b8e7788903ca.jpg', 'uploads/images/image_380x240_5b8e77891e462.jpg', 'uploads/images/image_140x98_5b8e77894948b.jpg', 0, '', 0, 0, 1, 0, 1, 0, 0, 0, 1, 'post', NULL, NULL, NULL, 2, 1, NULL, NULL, 0, '', '2018-09-13 06:09:53'),
(4, 1, 'राहुल गांधी: भाजपा और आरएसएस कर रहे देश को तोड़ने का काम', 'rahul-gandhi-bjp-and-rss-are-working-to-break-the-country-4', '', 'sfsdfs', '', 1, 0, 'uploads/images/image_750x422_5b8e778741952.jpg', 'uploads/images/image_750x_5b8e7787e5bbc.jpg', 'uploads/images/image_600x460_5b8e7788903ca.jpg', 'uploads/images/image_380x240_5b8e77891e462.jpg', 'uploads/images/image_140x98_5b8e77894948b.jpg', 6, '', 0, 0, 1, 0, 1, 0, 0, 1, 1, 'post', NULL, NULL, NULL, 1, 1, NULL, NULL, 0, '', '2018-09-13 06:16:10'),
(6, 1, 'मायावती ', 'मायावती ', '', 'लोकसभा 2019 में गठबंधन को लेकर BSP सुप्रीमो मायावती ने दिखाए तेवर, दिया साफ संदेश', '<ul>\r\n	<li>\r\n	<h4>बीएसपी अध्यक्ष मायावती ने लोकसभा चुनाव में एकजुटता की वकालत कर रहे विपक्षी दलों को साफ संदेश दिया और अपने इरादे भी जता दिये हैं. उन्होंने कहा है कि बीएसपी सिर्फ सम्मानजनक संख्या में सीटें मिलने की सूरत में ही किसी दल के साथ गठबंधन करेगी, वरना वह अकेले ही चुनाव मैदान में उतरेगी.&nbsp;&nbsp;</h4>\r\n	</li>\r\n	<li>बीएसपी अध्यक्ष मायावती ने लोकसभा चुनाव में एकजुटता की वकालत कर रहे विपक्षी दलों को साफ संदेश दिया और अपने इरादे भी जता दिये हैं. उन्होंने कहा है कि बीएसपी सिर्फ सम्मानजनक संख्या में सीटें मिलने की सूरत में ही किसी दल के साथ गठबंधन करेगी, वरना वह अकेले ही चुनाव मैदान में उतरेगी.&nbsp;</li>\r\n</ul>\r\n', 1, 0, 'uploads/images/image_750x422_5ba090a50a2d2.jpg', 'uploads/images/image_750x_5ba090a5e2c25.jpg', 'uploads/images/image_600x460_5ba090a6ca1ae.jpg', 'uploads/images/image_380x240_5ba090a76e749.jpg', 'uploads/images/image_140x98_5ba090a7a6ffb.jpg', 3, '', 0, 0, 1, 0, 1, 0, 0, 1, 1, 'post', NULL, NULL, NULL, 4, 1, NULL, NULL, 0, 'मायावती ', '2018-09-17 05:57:20'),
(7, 1, 'अखिलेश यादव', '7', '', 'अखिलेश यादव ने कहा, \'मैंने कहा कि यूपी का चुनाव सांप्रदायिकता के साथ लड़ा गया था. बीजेपी के नेताओं ने कहा था कि हिंदुओं की मौत पर कुछ नहीं होता है, मुस्लिमों की मौत पर 50 लाख की मदद की जाती है.\'', '<p>सपा पर जातिवादी पार्टी होने के आरोप लगते रहे हैं. बीजेपी अक्सर इस मुद्दे पर सपा को घेरती रही है. इस आरोप के जवाब में अखिलेश ने कहा, 2019 में ऐसा नहीं होगा. अब हमने उनका फॉर्मूला उन्हीं पर लगा दिया है. अब वो नहीं जीत पाएंगे, इसलिए हार रहे हैं. अगर हम गठजोड़ करें तो कहा जाता है कि जातिवादी लोग हैं, बीजेपी करे तो उसे<a href=\"https://aajtak.intoday.in/topic/%E0%A4%B8%E0%A5%8B%E0%A4%B6%E0%A4%B2-%E0%A4%87%E0%A4%82%E0%A4%9C%E0%A5%80%E0%A4%A8%E0%A4%BF%E0%A4%AF%E0%A4%B0%E0%A4%BF%E0%A4%82%E0%A4%97.html\" target=\"_blank\">&nbsp;सोशल इंजीनियरिंग&nbsp;</a>कहा जाता है. इस सोशल इंजीनियरिंग की हिंदी क्या होती है. बीजेपी के लोग मुद्दे पर चुनाव नहीं लड़ना चाहते हैं, हम उन्हें मुद्दों से नहीं भटकने देना चाहते हैं.</p>\r\n\r\n<p>यूपी के पिछले विधानसभा चुनाव में सपा की हार हुई थी. उस चुनाव में कांग्रेस और सपा का गठबंधन था. गठबंधन के लिए राहुल गांधी और अखिलेश यादव दोनों ने गंभीरता से कदम बढ़ाए थे. हालांकि दोनों पार्टियों को करारी शिकस्त का सामना करना पड़ा.&nbsp;</p>\r\n\r\n<p>भावी चुनावों में क्या दोनों पार्टियां फिर एकसाथ आएंगी? इसके जवाब में अखिलेश ने कहा कि राहुल जी से हमारी अच्छी दोस्ती थी. मैं उस चुनाव (असेंबली चुनाव) की बात कर रहा हूं. तब बीजेपी के लोग घबरा गए थे. मैं उस तरह का नौजवान हूं कि एक बार दोस्ती कर लेता हूं तो फिर कभी नहीं छोड़ता हूं.</p>\r\n', 1, 0, 'uploads/images/image_750x422_5ba090e5c13ac.jpg', 'uploads/images/image_750x_5ba090e685bfd.jpg', 'uploads/images/image_600x460_5ba090e762576.jpg', 'uploads/images/image_380x240_5ba090e813b1b.jpg', 'uploads/images/image_140x98_5ba090e844fd9.jpg', 7, '', 0, 1, 1, 0, 1, 0, 0, 1, 1, 'post', NULL, NULL, NULL, 3, 1, NULL, NULL, 0, 'अखिलेश ', '2018-09-17 06:29:01'),
(8, 1, 'विश्व क्रिकेट में छा गई चेन्नई की गलियों से निकली फिरकी', '8', '', 'रविचंद्रन अश्विन ने अब तक 62 टेस्ट मैचों में 327 विकेट चटकाए हैं. इसके अलावा 111 वनडे में उन्होंने 150 विकेट अपने नाम किए हैं. साथ ही 46 टी-20 इंटरनेशनल में 52 विकेट निकाले.', '<p>चेन्नई की गलियों से निकली &#39;फिरकी&#39; ने विश्व क्रिकेट में ऐसी धूम मचाई कि बड़े से बड़े बल्लेबाज पस्त होते दिखे. जी हां! बात हो रही है टीम इंडिया के स्टार ऑफ स्पिनर<a href=\"https://aajtak.intoday.in/topic/%E0%A4%B0%E0%A4%B5%E0%A4%BF%E0%A4%9A%E0%A4%82%E0%A4%A6%E0%A5%8D%E0%A4%B0%E0%A4%A8-%E0%A4%85%E0%A4%B6%E0%A5%8D%E0%A4%B5%E0%A4%BF%E0%A4%A8.html\" target=\"_blank\">&nbsp;रविचंद्रन अश्विन&nbsp;</a>की, जो कभी टेनिस गेंद से स्पिन के गुर सीखे थे. अश्विन आज (सोमवार) 32 साल के हो गए. उनका जन्म 17 सितंबर 1986 को मद्रास (अब चेन्नई) में हुआ था.</p>\r\n\r\n<p>अश्विन फिलहाल सीमित ओवरों के प्रारूप की भारतीय टीम से बाहर हैं. लगातार तीन<a href=\"https://aajtak.intoday.in/topic/%E0%A4%8F%E0%A4%B6%E0%A4%BF%E0%A4%AF%E0%A4%BE-%E0%A4%95%E0%A4%AA.html\" target=\"_blank\">&nbsp;एशिया कप&nbsp;</a>टूर्नामेंट (2012, 2014, 2016) खेलने के बाद यह पहला मौका है, जब उन्हें टीम इंडिया में जगह नहीं मिली है. इन दिनों वनडे और टी-20 के लिए कलाई के स्पिनरों की जोड़ी- युजवेंद्र चहल और कुलदीप यादव चयनकर्ताओं का भरोसा जीतने में कामयाब रहे हैं.</p>\r\n', 6, 0, 'uploads/images/image_750x422_5ba0904d34c8f.jpg', 'uploads/images/image_750x_5ba0904e0fb4c.jpg', 'uploads/images/image_600x460_5ba0904ebfecf.jpg', 'uploads/images/image_380x240_5ba0904f6e13a.jpg', 'uploads/images/image_140x98_5ba0904fa5cb3.jpg', 2, '', 0, 0, 1, 0, 1, 0, 0, 1, 1, 'post', NULL, NULL, NULL, 4, 1, NULL, NULL, 0, 'रविचंद्रन अश्विन', '2018-09-17 07:39:46'),
(9, 1, 'अमृतसर हादसे में घिरे सिद्धू बोले- रेलवे की गलती, शिअद ने कहा- नवजाेत कौर पर हो केस', '9', '', 'जेएनएन, अमृतसर। स्थानीय निकाय मंत्री नवजोत सिंह सिद्धू यहां जोड़ा फाटक के पास हादसे में 62 लाेगों के मारे जाने के मामले में पत्‍नी डॉ. नवजोत कौर सिद्धू के बचाव में खुलकर सामने आ गए हैं। सिद्धू ने कहा कि  रेलवे ट्रैक पर हुई मौतों के लिए रेलवे को जिम्मेदार है, मेरी पत्‍नी नहीं। उन्होंने कहा कि यह एक हादसा था, जो रेलवे की सतर्कता न होने की वजह से हुआ। उधर, शिरोमणि अकाली दल ने इस मामले में डाॅ. नवजोत कौर को भी दोषी ठहराया है और उनके खिलाफ केस दर्ज करने की मांग की है। पार्टी ने कहा कि डॉ. नवजोत कौर के खिलाफ काफी साक्ष्‍य हैं।', '<p>उन्&zwj;होंने कहा कि जोड़ा फाटक के पास धोबीघाट में रावण दहन के लिए दशहरा कमेटी ने पुलिस से अनुमति ली थी, जबकि हादसा ग्राउंड की दीवारों के पार रेल ट्रैक पर हुआ। रेल ट्रैक रेलवे की संपत्ति है और इसकी सुरक्षा जीआरपी का दायित्व है। आयोजन स्थल की चारदीवारी से रेलवे ट्रैक तकरीबन पचास फीट की दूरी पर स्थित है।</p>\r\n', 1, 0, 'uploads/images/image_750x422_5bcd84ca98ebb.jpg', 'uploads/images/image_750x_5bcd84cbacee7.jpg', 'uploads/images/image_600x460_5bcd84ccd6937.jpg', 'uploads/images/image_380x240_5bcd84cd90b14.jpg', 'uploads/images/image_140x98_5bcd84cdd27ec.jpg', 3, '', 0, 0, 1, 0, 1, 0, 0, 1, 1, 'post', NULL, NULL, NULL, 2, 1, NULL, NULL, 0, 'नवजोत‍ सिंह सिद्धू अमृतसर के जोड़ा फाटक के पास हुए हादसे में सवालोें के घेरे आईं अपनी पत्‍नी के बचाव में उतर आए हैं। उन्‍होंने कहा कि हादसे के लिए रेलवे जिम्‍मेदार है।', '2018-10-22 08:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `post_audios`
--

CREATE TABLE `post_audios` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `audio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `image_big` varchar(255) DEFAULT NULL,
  `image_default` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `post_id`, `image_big`, `image_default`, `created_at`) VALUES
(1, 1, 'uploads/images/image_750x422_5b8e778741952.jpg', 'uploads/images/image_750x_5b8e7787e5bbc.jpg', '2018-09-04 12:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `re_like` int(11) DEFAULT '0',
  `re_dislike` int(11) DEFAULT '0',
  `re_love` int(11) DEFAULT '0',
  `re_funny` int(11) DEFAULT '0',
  `re_angry` int(11) DEFAULT '0',
  `re_sad` int(11) DEFAULT '0',
  `re_wow` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`id`, `post_id`, `re_like`, `re_dislike`, `re_love`, `re_funny`, `re_angry`, `re_sad`, `re_wow`) VALUES
(1, 1, 1, 1, 0, 1, 2, 1, 0),
(2, 4, 1, 0, 0, 0, 0, 0, 0),
(3, 5, 0, 0, 0, 0, 0, 0, 0),
(4, 6, 0, 0, 0, 0, 0, 0, 0),
(5, 7, 0, 0, 0, 0, 0, 0, 0),
(6, 8, 0, 0, 0, 0, 0, 0, 0),
(7, 9, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reading_lists`
--

CREATE TABLE `reading_lists` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reading_lists`
--

INSERT INTO `reading_lists` (`id`, `post_id`, `user_id`, `created_at`) VALUES
(1, 1, 1, '2018-09-04 12:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `rss_feeds`
--

CREATE TABLE `rss_feeds` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT '1',
  `feed_name` varchar(500) DEFAULT NULL,
  `feed_url` varchar(1000) DEFAULT NULL,
  `post_limit` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `image_big` varchar(250) DEFAULT NULL,
  `image_default` varchar(250) DEFAULT NULL,
  `image_slider` varchar(250) DEFAULT NULL,
  `image_mid` varchar(250) DEFAULT NULL,
  `image_small` varchar(250) DEFAULT NULL,
  `auto_update` int(11) DEFAULT '1',
  `read_more_button` int(11) DEFAULT '1',
  `read_more_button_text` varchar(255) DEFAULT 'Read More',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `site_title` varchar(255) DEFAULT NULL,
  `home_title` varchar(255) DEFAULT 'Home',
  `site_description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `application_name` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `google_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `pinterest_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `vk_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `optional_url_button_name` varchar(500) DEFAULT 'Click',
  `about_footer` varchar(1000) DEFAULT NULL,
  `contact_text` text,
  `contact_address` varchar(500) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `map_api_key` varchar(500) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `copyright` varchar(500) DEFAULT NULL,
  `cookies_warning` int(11) DEFAULT '0',
  `cookies_warning_text` text,
  `footer_text` int(11) DEFAULT '0',
  `footer_text_editor` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `lang_id`, `site_title`, `home_title`, `site_description`, `keywords`, `application_name`, `facebook_url`, `twitter_url`, `google_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `optional_url_button_name`, `about_footer`, `contact_text`, `contact_address`, `contact_email`, `contact_phone`, `map_api_key`, `latitude`, `longitude`, `copyright`, `cookies_warning`, `cookies_warning_text`, `footer_text`, `footer_text_editor`, `created_at`) VALUES
(1, 1, 'The Hindi Print', 'Breaking News | Latest News', NULL, NULL, 'Hindi Print', '', '', '', '', '', '', '', '', 'Click Here To See More', '', '', '', '', '', '', '26.4471054', '80.1982955', 'Copyright © 2018 Poorvanchal Media - All Rights Reserved.', 1, '<p>This site uses cookies. By continuing to browse the site you are agreeing to our use of cookies <a href=\"#\">Find out more here</a></p>\r\n', 0, '<p>This is the html text editor  <a href=\"#\">Find out more here</a></p>\r\n', '2018-05-31 00:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `tag_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT 'name@domain.com',
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT 'user',
  `user_type` varchar(100) DEFAULT 'registered',
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `about_me` varchar(5000) DEFAULT NULL,
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `google_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `pinterest_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `vk_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `slug`, `email`, `password`, `role`, `user_type`, `google_id`, `facebook_id`, `avatar`, `status`, `about_me`, `facebook_url`, `twitter_url`, `google_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `created_at`) VALUES
(1, 'admin', 'admin', 'saurabhexpress@gmail.com', '$2a$08$d1/O9LHMprbwmT981F4sfOLycAlLYmPTtWO8YFlcg8Thqkmoq97P2', 'admin', 'registered', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-04 11:53:48'),
(2, 'saurabh', 'saurabh-5b8e7a6db17b4', 'saurabhexpress1@gmail.com', '$2a$08$hysgdDtk6.jwWe6pZmrBMONMxVjdbRn.WGrN9ZskL01PLpW19MCNq', 'author', 'registered', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-04 12:28:29'),
(3, 'saurabh2', 'saurabh2-5b9ca6e031926', 'saurabhexpress2@gmail.com', '$2a$08$C/5KDbs1EXUb7.bigP.LcOHNUYkTVr1czYA2WCmQKyossWxYZA/xe', 'contributor', 'registered', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-15 06:29:52'),
(4, 'saurabh3', 'saurabh3-5b9f40154d70c', 'saurabhexpress3@gmail.com', '$2a$08$BP6W5fvxFFgHK5onoAXRa.CtvpuLR8wk/Gzx/4eaEFZKKjUEHBub.', 'contributor', 'registered', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-17 05:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video_name` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visual_settings`
--

CREATE TABLE `visual_settings` (
  `id` int(11) NOT NULL,
  `post_list_style` varchar(100) NOT NULL DEFAULT 'vertical',
  `site_color` varchar(100) NOT NULL DEFAULT 'default',
  `site_block_color` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_footer` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visual_settings`
--

INSERT INTO `visual_settings` (`id`, `post_list_style`, `site_color`, `site_block_color`, `logo`, `logo_footer`, `favicon`) VALUES
(1, 'vertical', 'red', '#000000', 'uploads/logo/logo_5b90b9694ce2f.png', 'uploads/logo/logo_5b90b9ab697cd.png', 'uploads/logo/favicon_5b90b9c3291fc.png');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT '1',
  `title` varchar(500) DEFAULT NULL,
  `content` text,
  `type` varchar(100) DEFAULT NULL,
  `widget_order` int(11) DEFAULT '1',
  `visibility` int(11) DEFAULT '1',
  `is_custom` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `lang_id`, `title`, `content`, `type`, `widget_order`, `visibility`, `is_custom`, `created_at`) VALUES
(1, 1, 'Follow Us', '', 'follow-us', 1, 1, 0, '2018-05-31 00:23:19'),
(2, 1, 'Popular Posts', '', 'popular-posts', 1, 1, 0, '2018-05-31 00:23:19'),
(3, 1, 'Recommended Posts', '', 'recommended-posts', 2, 1, 0, '2018-05-31 00:23:19'),
(4, 1, 'Random Posts', '', 'random-slider-posts', 3, 1, 0, '2018-05-31 00:23:19'),
(5, 1, 'Featured Video', '', 'featured-video', 4, 1, 0, '2018-05-31 00:23:19'),
(6, 1, 'Tags', '', 'tags', 5, 1, 0, '2018-05-31 00:23:19'),
(7, 1, 'Voting Poll', '', 'poll', 6, 1, 0, '2018-05-31 00:23:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_spaces`
--
ALTER TABLE `ad_spaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_audios`
--
ALTER TABLE `post_audios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reading_lists`
--
ALTER TABLE `reading_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss_feeds`
--
ALTER TABLE `rss_feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visual_settings`
--
ALTER TABLE `visual_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_spaces`
--
ALTER TABLE `ad_spaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `audios`
--
ALTER TABLE `audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_votes`
--
ALTER TABLE `poll_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_audios`
--
ALTER TABLE `post_audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reading_lists`
--
ALTER TABLE `reading_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rss_feeds`
--
ALTER TABLE `rss_feeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visual_settings`
--
ALTER TABLE `visual_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
