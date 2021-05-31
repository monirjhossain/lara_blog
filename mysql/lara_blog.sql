-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 06:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Fridge', 'fridge', 'The fridge is cooling technology!', 'fridge60812613e0a9d.jpg', '2021-04-22 01:30:27', '2021-04-22 01:30:27'),
(4, 'Corona Virus', 'corona-virus', 'করোনা ভাইরাস: কোভিড-১৯ রোগের লক্ষণ', 'corona-virus6083ba1349150.jpg', '2021-04-24 00:26:27', '2021-04-24 00:26:27'),
(5, 'Cricket', 'cricket', 'Cricket is passion and all about emotion!', 'cricket6083ba5dd109e.jpg', '2021-04-24 00:27:41', '2021-04-24 00:27:41'),
(6, 'Human Antibody', 'human-antibody', 'This is human antibody', 'human-antibody609b8072e75c1.jpg', '2021-05-12 01:14:58', '2021-05-12 01:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(6, 30, 10, 'Hey, these are Nice Comments from Admin!', '2021-05-22 07:17:44', '2021-05-22 07:17:44'),
(8, 30, 12, 'Hello I am a User', '2021-05-22 09:40:39', '2021-05-22 09:40:39'),
(9, 26, 12, 'This is so good!!!!!!!!!!!!!', '2021-05-22 11:08:50', '2021-05-22 11:08:50'),
(10, 22, 10, 'Nice Mobile Phone!', '2021-05-23 20:15:36', '2021-05-23 20:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `comment_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(4, 6, 12, '@Shardul Thanks for comments', '2021-05-22 09:00:38', '2021-05-22 09:00:38'),
(6, 6, 10, '@Farin Tansnim You are so obedient!', '2021-05-22 09:01:53', '2021-05-22 09:01:53'),
(7, 6, 12, '@Shardul Thanks Admit for your beautiful word! :)', '2021-05-22 09:02:39', '2021-05-22 09:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2021_03_20_075506_create_roles_table', 1),
(24, '2021_03_29_040619_create_categories_table', 1),
(25, '2021_03_30_100842_create_posts_table', 1),
(26, '2021_04_24_080915_create_tags_table', 2),
(27, '2021_05_21_042109_create_comments_table', 3),
(28, '2021_05_22_114317_create_comment_replies_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `image`, `body`, `view_count`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 2, 'করোনায় চব্বিশ ঘণ্টায় ৮৮ জনের', 'kronay-cbbis-ghntay-88-jner', 'kronay-cbbis-ghntay-88-jner-6083b5ef6a7b31619244527.jpg', '<div id=\"ac2e5466-2331-409b-b82c-19434e315975\" style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 10px;\"><div class=\"story-card-m__wrapper__ounrk story-card-m__bn-wrapper__OgEBK\" style=\"font-size: 1.4rem; --borderColor:var(--primaryColor); color: var(--black); max-width: 622px; margin: 0px auto;\"><div class=\"  bn-story-element\"><div class=\"story-element story-element-text\" style=\"padding: 0px; margin: 0px auto; max-width: 622px;\"><p style=\"margin-right: 0px; margin-bottom: var(--space2); margin-left: 0px; padding: 0px; font-family: var(--font-2); font-size: 1.8rem; line-height: 1.67; white-space: break-spaces;\">করোনায় গত ২৪ ঘণ্টায় দেশে ৮৮ জনের মৃত্যু হয়েছে। আর নতুন রোগী শনাক্ত হয়েছে ৩ হাজার ৬২৯ জন। আজ শুক্রবার স্বাস্থ্য অধিদপ্তরের নিয়মিত বিজ্ঞপ্তিতে এ তথ্য জানানো হয়।</p></div></div><div class=\"  bn-story-element\"><div class=\"story-element story-element-text\" style=\"padding: 0px; margin: 0px auto; max-width: 622px;\"><p style=\"margin-right: 0px; margin-bottom: var(--space2); margin-left: 0px; padding: 0px; font-family: var(--font-2); font-size: 1.8rem; line-height: 1.67; white-space: break-spaces;\">গত ২৪ ঘণ্টায় (গতকাল সকাল ৮টা থেকে আজ সকাল ৮টা পর্যন্ত) নমুনা পরীক্ষা হয়েছে ২৫ হাজার ৮৯৬ জনের। নমুনা পরীক্ষা বিবেচনায় রোগী শনাক্তের হার ১৪ শতাংশ।</p></div></div><div class=\"  bn-story-element\"><div class=\"story-element story-element-text\" style=\"padding: 0px; margin: 0px auto; max-width: 622px;\"><p style=\"margin-right: 0px; margin-bottom: var(--space2); margin-left: 0px; padding: 0px; font-family: var(--font-2); font-size: 1.8rem; line-height: 1.67; white-space: break-spaces;\"> এ পর্যন্ত দেশে মোট ৭ লাখ ৩৯ হাজার ৭০৩ জনের করোনার সংক্রমণ শনাক্ত হয়েছে। তাঁদের মধ্যে মারা গেছেন ১০ হাজার ৮৬৯ জন। মোট সুস্থ হয়েছেন ৬ লাখ ৪৭ হাজার ৬৭৪ জন।</p></div></div><div class=\"  bn-story-element\"><div class=\"story-element story-element-text\" style=\"padding: 0px; margin: 0px auto; max-width: 622px;\"><p style=\"margin-right: 0px; margin-bottom: var(--space2); margin-left: 0px; padding: 0px; font-family: var(--font-2); font-size: 1.8rem; line-height: 1.67; white-space: break-spaces;\">গতকাল করোনায় ৯৮ জনের মৃত্যু হয়েছিল এবং ৪ হাজার ১৪ জন নতুন রোগী শনাক্ত হয়েছিল।</p></div></div></div></div><div id=\"b6536480-c068-41e7-92ac-e11b1f9fe8e0\" style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 10px;\"><div class=\"story-card-m__wrapper__ounrk story-card-m__bn-wrapper__OgEBK\" style=\"font-size: 1.4rem; --borderColor:var(--primaryColor); color: var(--black); max-width: 622px; margin: 0px auto;\"><div class=\"  bn-story-element\"><div class=\"story-element story-element-text\" style=\"padding: 0px; margin: 0px auto; max-width: 622px;\"><p style=\"margin-right: 0px; margin-bottom: var(--space2); margin-left: 0px; padding: 0px; font-family: var(--font-2); font-size: 1.8rem; line-height: 1.67; white-space: break-spaces;\">গত বছরের ৮ মার্চ দেশে প্রথম করোনা শনাক্তের কথা জানায় সরকার। গত বছরের মে মাসের মাঝামাঝি থেকে সংক্রমণ বাড়তে শুরু করে। আগস্টের তৃতীয় সপ্তাহ পর্যন্ত শনাক্তের হার ২০ শতাংশের ওপরে ছিল। এরপর থেকে শনাক্তের হার কমতে শুরু করে।</p></div></div><div class=\"  bn-story-element\"><div class=\"story-element story-element-text\" style=\"padding: 0px; margin: 0px auto; max-width: 622px;\"><p style=\"margin-right: 0px; margin-bottom: var(--space2); margin-left: 0px; padding: 0px; font-family: var(--font-2); font-size: 1.8rem; line-height: 1.67; white-space: break-spaces;\">গত জুন থেকে আগস্ট—এই তিন মাস করোনার সংক্রমণ ছিল তীব্র । মাঝে নভেম্বর-ডিসেম্বরে কিছুটা বাড়লেও বাকি সময় সংক্রমণ নিম্নমুখী ছিল। এ বছরের মার্চে শুরু হয়েছে করোনার দ্বিতীয় ঢেউ। প্রথম ঢেউয়ের চেয়ে এবার সংক্রমণ বেশি তীব্র। মধ্যে কয়েক মাস ধরে শনাক্তের চেয়ে সুস্থ বেশি হওয়ায় দেশে চিকিৎসাধীন রোগীর সংখ্যা কমে আসছিল। কিন্তু মার্চ থেকে চিকিৎসাধীন রোগীর সংখ্যাও আবার বাড়তে শুরু করেছে।</p></div></div></div></div>', 0, 1, '2021-04-23 04:33:24', '2021-04-24 00:08:47'),
(8, 1, 5, 'Shakib Al Hasan', 'shakib-al-hasan', 'shakib-al-hasan-6083ce61b57141619250785.jpg', '<p style=\"text-align: justify;\"><span style=\"text-align: left; font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">Shakib Al Hasan</span><span style=\"text-align: left; color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;is without a doubt the biggest name to have emerged from Bangladesh cricket circles. Being a genuine all-rounder, Shakib is a vital cog in&nbsp;</span><br></p>', 0, 1, '2021-04-24 01:53:06', '2021-04-26 17:30:23'),
(9, 1, 3, 'WordPress Theme Customizations', 'wordpress-theme-customizations', 'wordpress-theme-customizations-60874dced3e491619480014.jpg', '<p>sfagasgsdefgsdfg</p>', 0, 1, '2021-04-26 17:33:36', '2021-04-26 17:33:36'),
(10, 1, 3, 'WordPress Theme Customization bd', 'wordpress-theme-customization-bd', 'wordpress-theme-customization-bd-60874e296af2e1619480105.jpg', '<p>dgfaesrgswatgews</p>', 0, 1, '2021-04-26 17:35:05', '2021-04-26 17:35:05'),
(11, 1, 2, 'Monir', 'monir', 'monir-60874ec87e9161619480264.jpg', '<p>asdfasdfasdfa</p>', 0, 1, '2021-04-26 17:37:45', '2021-04-26 17:37:45'),
(12, 1, 3, 'This is a slider title yo', 'this-is-a-slider-title-yo', 'this-is-a-slider-title-yo-60874f077755a1619480327.jpg', '<p>sarfearfgqaerf</p>', 0, 1, '2021-04-26 17:38:48', '2021-04-26 17:38:48'),
(13, 1, 4, 'This is a slider title Boss', 'this-is-a-slider-title-boss', 'this-is-a-slider-title-boss-6087528fdc7dd1619481231.jpg', '<p>werewtqwerg</p>', 0, 1, '2021-04-26 17:53:52', '2021-04-26 17:53:52'),
(15, 1, 2, 'Sony Bravia', 'sony-bravia', 'sony-bravia-60875358473011619481432.jpg', '<p>sadfasdfadsfads</p>', 0, 1, '2021-04-26 17:57:12', '2021-04-26 17:57:12'),
(16, 1, 3, 'Conca Fridge', 'conca-fridge', 'conca-fridge-6087544c4e1f81619481676.jpg', '<p>asdfadsfadf</p>', 0, 1, '2021-04-26 18:01:16', '2021-04-26 18:01:16'),
(17, 1, 3, 'This is a slider title Bosss', 'this-is-a-slider-title-bosss', 'this-is-a-slider-title-bosss-608761f8447da1619485176.jpg', '<p>ertgewrgtgw</p>', 0, 1, '2021-04-26 18:59:36', '2021-04-26 18:59:36'),
(18, 1, 5, 'Newzealand', 'newzealand', 'newzealand-608a72e4e5ca71619686116.JPG', '<p>qewfqfeqwefqw</p>', 0, 1, '2021-04-29 02:48:39', '2021-04-29 02:48:39'),
(19, 10, 5, 'Srilankan', 'srilankan', 'srilankan-60ab11d370e671621823955.jpg', '<ul style=\"box-sizing: inherit; margin: 0.3em 0px 0px 1.6em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; list-style: url(&quot;/w/skins/Vector/resources/common/images/bullet-icon.svg?d4515&quot;) none; font-family: Poppins, sans-serif; font-size: 14px; color: rgb(32, 33, 34);\"><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\">compendiums of information, usually of a specific type, compiled in a book for ease of reference. That is, the information is intended to be quickly found when needed.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Culture_and_the_arts\" title=\"Wikipedia:Contents/Culture and the arts\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">Culture</a>&nbsp;– encompasses the social behavior and norms found in human societies, as well as the knowledge, beliefs, arts, laws, customs, capabilities and habits of the individuals in these groups.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Geography_and_places\" title=\"Wikipedia:Contents/Geography and places\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">Geography</a>&nbsp;– field of science devoted to the study of the lands, features, inhabitants, and phenomena of the Earth and planets.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Health_and_fitness\" title=\"Wikipedia:Contents/Health and fitness\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">Health</a>&nbsp;– state of physical, mental and social well-being.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/History_and_events\" title=\"Wikipedia:Contents/History and events\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">History</a>&nbsp;– the past as it is described in written documents, and the study thereof.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Human_activities\" title=\"Wikipedia:Contents/Human activities\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">Human activities</a>&nbsp;– the various activities done by people. For instance, it includes leisure, entertainment, industry, recreation, war, and exercise.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Mathematics_and_logic\" title=\"Wikipedia:Contents/Mathematics and logic\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">Mathematics</a>&nbsp;– the study of topics such as quantity (numbers), structure, space, and change. It evolved through the use of abstraction and logical reasoning, from counting, calculation, measurement, and the systematic study of the shapes and motions of physical objects.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Natural_and_physical_sciences\" title=\"Wikipedia:Contents/Natural and physical sciences\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">Natural science</a>&nbsp;– branch of science concerned with the description, prediction, and understanding of natural phenomena, based on empirical evidence from observation and experimentation.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/People_and_self\" title=\"Wikipedia:Contents/People and self\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">People</a>&nbsp;– plurality of persons considered as a whole, as is the case with an ethnic group or nation.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Philosophy_and_thinking\" title=\"Wikipedia:Contents/Philosophy and thinking\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">Philosophy</a>&nbsp;– study of general and fundamental questions about existence, knowledge, values, reason, mind, and language.</li><li style=\"box-sizing: inherit; margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Religion_and_belief_systems\" title=\"Wikipedia:Contents/Religion and belief systems\" style=\"box-sizing: inherit; color: rgb(6, 69, 173); text-decoration: none; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; touch-action: manipulation; transition-duration: 0.3s; outline-style: initial; outline-width: 0px;\">Religions</a>&nbsp;– social-cultural systems of designated behaviors and practices, morals, worldviews, texts, sanctified places, prophecies, ethics, or organizations, that relates humanity to supernatural, transcendental, or spiritual elements.</li></ul>', 0, 1, '2021-04-29 02:54:15', '2021-05-23 20:39:15'),
(20, 1, 3, 'The world Best Coffee Nir', 'the-world-best-coffee-nir', 'the-world-best-coffee-nir-608aa014839621619697684.jpg', '<p>asdfas fasdfadsf asdfasdf&nbsp;</p>', 0, 1, '2021-04-29 06:01:25', '2021-04-29 06:01:25'),
(21, 1, 4, 'WordPress Theme Customizationsde', 'wordpress-theme-customizationsde', 'wordpress-theme-customizationsde-608aa0d4ab2701619697876.jpg', '<p>sdfaewsfawrefqaw</p>', 0, 1, '2021-04-29 06:04:36', '2021-04-29 06:04:36'),
(22, 10, 4, '২ জুনের মধ্যে করোনা আক্রান্ত হলে', '2-juner-mdhze-krona-akrant-hle', '2-juner-mdhze-krona-akrant-hle-609a6f3aaeba71620733754.jpg', '<p><span style=\"color: rgb(18, 18, 18); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px; white-space: break-spaces;\">দীর্ঘ সফর অপেক্ষা করছে কোহলিদের সামনে। টেস্ট চ্যাম্পিয়নশিপের ফাইনাল খেলতে জুন মাসের দুই তারিখে ইংল্যান্ডে রওনা দেবে ভারত। এরপর স্বাগতিক ইংল্যান্ডের বিপক্ষে পাঁচ ম্যাচের টেস্ট সিরিজও আছে। সব মিলিয়ে কয়েক মাসের জন্য ইংল্যান্ডে থাকতে হবে কোহলিদের। এত দীর্ঘ সময় পরিবার ছাড়া থাকা যায়?</span><br></p>', 0, 1, '2021-04-29 06:06:18', '2021-05-11 05:49:14'),
(23, 1, 3, 'WordPress Theme Customizationdswfe', 'wordpress-theme-customizationdswfe', 'wordpress-theme-customizationdswfe-608aa34253f911619698498.jpg', '<p>wfewerfqw rqwe rqwer qwer</p>', 0, 1, '2021-04-29 06:14:59', '2021-04-29 06:14:59'),
(24, 1, 4, 'WordPress Theme Customizationwedf', 'wordpress-theme-customizationwedf', 'wordpress-theme-customizationwedf-608aa49f282341619698847.jpg', '<p>sdfawerfqrewfqr3efq3</p>', 0, 1, '2021-04-29 06:20:47', '2021-04-29 06:20:47'),
(26, 10, 4, 'You are so cutee', 'you-are-so-cutee', 'you-are-so-cutee-609a84d61f3511620739286.jpg', '<p><span style=\"color: rgb(18, 18, 18); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 18px; white-space: break-spaces;\">বিসিসিআই বোঝে সেটা। বোঝে বলেই ক্রিকেটারদের সফরসঙ্গী হিসেবে যেন পরিবারের সদস্যরা থাকতে পারেন, সে অনুমতি দিয়েছেন বোর্ডকর্তারা। ক্রিকেটারদের মনের অবস্থা বুঝে এ ব্যাপারে বিসিসিআই ‘কোমল’ হলেও, ‘কঠোর’ হচ্ছে আরেকটা ক্ষেত্রে। ভারতের ক্রিকেট বোর্ড সাফ জানিয়ে দিয়েছে, ইংল্যান্ডের প্লেনে ওঠার আগে দলের কেউ যদি কোভিড পজিটিভ হন, তাঁকে ছাড়াই রওনা দেবে বাকি দল। করোনার কারণে আইপিএল বন্ধ হয়ে গেছে, টেস্ট চ্যাম্পিয়নশিপের ফাইনালেও দলের ওপর করোনার থাবা পড়ুক, কোনোভাবেই চায় না বিসিসিআই। তাই এত বাড়তি সতর্কতা।</span><br></p>', 0, 1, '2021-05-11 05:51:06', '2021-05-11 07:21:26'),
(28, 10, 6, 'compendiums of information', 'compendiums-of-information', 'compendiums-of-information-609b89fb9c7fb1620806139.jpg', '<ul style=\"list-style-image: url(&quot;/w/skins/Vector/resources/common/images/bullet-icon.svg?d4515&quot;); margin: 0.3em 0px 0px 1.6em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; color: rgb(32, 33, 34); font-size: 14px;\"><li style=\"margin-bottom: 0.1em;\">&nbsp;compendiums of information, usually of a specific type, compiled in a book for ease of reference. That is, the information is intended to be quickly found when needed.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Culture_and_the_arts\" title=\"Wikipedia:Contents/Culture and the arts\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Culture</a>&nbsp;– encompasses the social behavior and norms found in human societies, as well as the knowledge, beliefs, arts, laws, customs, capabilities and habits of the individuals in these groups.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Geography_and_places\" title=\"Wikipedia:Contents/Geography and places\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Geography</a>&nbsp;– field of science devoted to the study of the lands, features, inhabitants, and phenomena of the Earth and planets.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Health_and_fitness\" title=\"Wikipedia:Contents/Health and fitness\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Health</a>&nbsp;– state of physical, mental and social well-being.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/History_and_events\" title=\"Wikipedia:Contents/History and events\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">History</a>&nbsp;– the past as it is described in written documents, and the study thereof.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Human_activities\" title=\"Wikipedia:Contents/Human activities\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Human activities</a>&nbsp;– the various activities done by people. For instance, it includes leisure, entertainment, industry, recreation, war, and exercise.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Mathematics_and_logic\" title=\"Wikipedia:Contents/Mathematics and logic\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Mathematics</a>&nbsp;– the study of topics such as quantity (numbers), structure, space, and change. It evolved through the use of abstraction and logical reasoning, from counting, calculation, measurement, and the systematic study of the shapes and motions of physical objects.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Natural_and_physical_sciences\" title=\"Wikipedia:Contents/Natural and physical sciences\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Natural science</a>&nbsp;– branch of science concerned with the description, prediction, and understanding of natural phenomena, based on empirical evidence from observation and experimentation.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/People_and_self\" title=\"Wikipedia:Contents/People and self\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">People</a>&nbsp;– plurality of persons considered as a whole, as is the case with an ethnic group or nation.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Philosophy_and_thinking\" title=\"Wikipedia:Contents/Philosophy and thinking\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Philosophy</a>&nbsp;– study of general and fundamental questions about existence, knowledge, values, reason, mind, and language.</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://en.wikipedia.org/wiki/Wikipedia:Contents/Religion_and_belief_systems\" title=\"Wikipedia:Contents/Religion and belief systems\" style=\"text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Religions</a>&nbsp;– social-cultural systems of designated behaviors and practices, morals, worldviews, texts, sanctified places, prophecies, ethics, or organizations, that relates humanity to supernatural, transcendental, or spiritual elements.</li></ul>', 0, 1, '2021-05-12 01:55:39', '2021-05-12 01:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-04-04 03:45:12', '2021-04-04 03:45:12'),
(2, 'User', '2021-04-04 03:45:12', '2021-04-04 03:45:12'),
(3, 'Suspend', '2021-04-04 03:45:12', '2021-04-04 03:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `postID`, `name`) VALUES
(21, '28', 'Australia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `user_id`, `email`, `email_verified_at`, `password`, `image`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin super', 'admin03', 'admin@gmail.com', NULL, '$2y$10$2pBTInKlEGRVjAa0BhjFGe3pTJKr5mrbOuNKaWtl17CpJ2z2K1T1.', '1620293552.jpg', 'asdfadsfadfadf', NULL, '2021-04-04 03:45:12', '2021-05-06 03:48:27'),
(3, 2, 'user', 'user1', 'user@gmail.com', NULL, '$2y$10$/fiF4Wu/qokBRlgYspA3r.7k2c.ja.02us4VBIxox.90JY3.cU.he', 'default.jpg', NULL, NULL, '2021-04-04 04:05:14', '2021-04-04 04:05:14'),
(5, 1, 'Md. Monir Hossain', 'admin04', 'admin@monirjhossain.com', NULL, '$2y$10$E0msDbJq871orFuzrVcu1esliUNJb8zdX9v.wEArQTa50BWgnWXWC', 'default.jpg', NULL, NULL, '2021-05-06 03:56:42', '2021-05-06 04:01:02'),
(6, 1, 'admin', 'admin05', 'admins@gmail.com', NULL, '$2y$10$S7OM1CgN0cjesWSkNeKiGeDHv8rVP5LIUcLuQNMmXWjsK4yJa3gZu', 'default.jpg', NULL, NULL, '2021-05-06 04:09:56', '2021-05-06 04:09:56'),
(7, 1, 'Rajib', 'admin06', 'rajib@gmail.com', NULL, '$2y$10$atAAEczG3G0EqTtGNcmGJecc9M8933uZ6ILlJo37JQ2jKzJ528Ti2', 'default.jpg', NULL, NULL, '2021-05-06 08:16:05', '2021-05-06 08:18:01'),
(8, 1, 'ranu', 'admin07', 'ranu@gamil.com', NULL, '$2y$10$H8tVsUhcwjmAwr1Wak.v1OzZQ4wFLPIpbNvs6V4SXqh2Qu3qixwf2', '1620376710.jpg', NULL, NULL, '2021-05-06 10:22:39', '2021-05-07 02:38:30'),
(9, 1, 'User', 'User113', 'user1@gmail.com', NULL, '$2y$10$dTAyaOPtuFUnjA0nLkzRwOaoP7ar6wadPHhbnMyd4knxy8RKvHBNa', '1620378077.jpeg', NULL, NULL, '2021-05-07 02:52:25', '2021-05-07 03:01:17'),
(10, 1, 'Shardul', 'admin26', 'sardul@gmail.com', NULL, '$2y$10$S8fJ.mhIuSHqkdV9UVFKT.gDxXRoxaR8RKu3BMRcibuPDjHa6HItq', '1621689247.jpg', 'askjdhfkajdhsf', NULL, '2021-05-11 05:28:05', '2021-05-22 07:14:07'),
(11, 2, 'user', 'user123', 'rakib@gmail.com', NULL, '$2y$10$.95QdugE9ilEAGa7cvOhP.S.QLkCdb2vcgwjrkK9J3.QgWfdKxjKO', 'default.jpg', NULL, NULL, '2021-05-21 10:10:06', '2021-05-21 10:10:06'),
(12, 2, 'Farin Tansnim', 'User98', 'farin@gmail.com', NULL, '$2y$10$wWq560cJDMJZ4j.MMVvkTe2CHJ.CuL3iMcBM2exkDEdALccpzBpDS', 'default.jpg', NULL, NULL, '2021-05-22 02:34:29', '2021-05-22 02:34:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
