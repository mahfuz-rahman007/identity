-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 01:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `identity`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `freelance` varchar(255) DEFAULT NULL,
  `about_title` varchar(255) DEFAULT NULL,
  `about_text` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `position_type` text DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `age`, `residence`, `address`, `mail`, `phone`, `freelance`, `about_title`, `about_text`, `avatar`, `profile_image`, `position_type`, `latitude`, `longitude`, `created_at`, `updated_at`, `resume`) VALUES
(1, 'Mahfujur Rahman', 25, 'Dhaka', '221 breaker street', 'mahfuj34@gmail.com', '+013 998 4785', 'Available', 'Hi there I am Mahfuzur Rahman', 'Advanced through several promotions, culminating in present director-level role overseeing firm’s software development activities. Manage a $4.5M R&D budget and a 12-member developer team. Provide cradle-to-grave oversight of software project management, leading the research, design, development.', 'avatar_16324739351392272114.jpg', 'profile_image_16324739352066546997.png', 'Full Stack Web Developer', '40.730', '-73.935', NULL, '2021-09-24 03:29:41', 'resume_16324739351107376999.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `position` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `image`, `created_at`, `updated_at`, `first_name`, `last_name`, `position`) VALUES
(1, 'admin', 'mahfuj34@gmail.com', '$2y$10$TcehMoIH33Xj9xK/VAvJ/ucKveqkg9SOqJHjW2vax/QwJCq4Sqx4K', 'adminProfile_16319431781303175120.jpg', NULL, '2021-09-27 19:35:07', 'Mahfuzur', 'Rahman', 'Full Stack Developer');

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archives`
--

INSERT INTO `archives` (`id`, `date`, `created_at`, `updated_at`) VALUES
(3, '08/2021', '2021-09-27 00:33:18', '2021-09-27 00:33:18'),
(4, '02/2021', '2021-09-27 01:47:40', '2021-09-27 01:47:40'),
(5, '01/2021', '2021-09-27 01:49:09', '2021-09-27 01:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `bcategories`
--

CREATE TABLE `bcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bcategories`
--

INSERT INTO `bcategories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 1, '2021-09-26 23:50:32', '2021-09-26 23:51:38'),
(2, 'Web Development', 1, '2021-09-26 23:50:46', '2021-09-26 23:51:33'),
(3, 'Graphic Design', 1, '2021-09-26 23:50:59', '2021-09-26 23:50:59'),
(4, 'Digital Marketing', 1, '2021-09-26 23:51:13', '2021-09-26 23:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `bcategory_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `bcategory_id`, `title`, `slug`, `main_image`, `content`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`, `status`) VALUES
(2, 3, '8 Things To Know When Designing Augmented', '8-things-to-know-when-designing-augmented', '163272306141107767.jpg', 'hi there', 'design', 'Identity/design', '2021-09-27 00:11:01', '2021-09-27 00:11:01', 1),
(3, 3, 'Esay 5 way we can use Javascript Plugins for the Slider', 'esay-5-way-we-can-use-javascript-plugins-for-the-slider', '16330536741889087809.jpg', 'This is a plugin design', 'javascript,java,plugins', 'Identity/Javascript/Plugins', '2021-09-30 20:01:14', '2021-09-30 20:01:14', 1),
(4, 4, '7 steps to optimize your website for Millennials', '7-steps-to-optimize-your-website-for-millennials', '16330665171270996071.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'js,php', '7 steps to optimize your website for Millennials', '2021-09-30 23:35:17', '2021-09-30 23:35:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(2, '1632580417443876213.png', 'https://laracasts.com/', '2021-09-25 08:33:37', '2021-09-25 08:33:37'),
(3, '16328901491969394873.png', 'https://laracasts.com/', '2021-09-28 22:35:49', '2021-09-28 22:35:49'),
(4, '16328901641421701630.png', 'https://laracasts.com/', '2021-09-28 22:36:04', '2021-09-28 22:36:04'),
(5, '16328901721003284773.png', 'https://laracasts.com/', '2021-09-28 22:36:12', '2021-09-28 22:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `from_date` varchar(255) DEFAULT NULL,
  `date_to` varchar(255) DEFAULT NULL,
  `current` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `school`, `field`, `description`, `from_date`, `date_to`, `current`, `created_at`, `updated_at`) VALUES
(2, 'University of British Columbia', 'BSC IN CSS', 'The University of British Columbia is a public research university with campuses in Vancouver and Kelowna, British Columbia.', '2017', '2018', NULL, '2021-09-24 23:42:02', '2021-09-24 23:42:02'),
(3, 'University of British US', 'PHD IN CSS', 'The University of British Columbia is a public research university with campuses in Vancouver and Kelowna, British Columbia.', '2017', '2018', NULL, '2021-09-24 23:42:36', '2021-09-24 23:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `experinces`
--

CREATE TABLE `experinces` (
  `id` int(11) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `from_date` varchar(255) DEFAULT NULL,
  `date_to` varchar(255) DEFAULT NULL,
  `current` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experinces`
--

INSERT INTO `experinces` (`id`, `company`, `field`, `description`, `from_date`, `date_to`, `current`, `created_at`, `updated_at`) VALUES
(1, 'Geniusdevs', 'Web Design', 'The University of British Columbia is a public research university with campuses in Vancouver and Kelowna, British Columbia.', '2018', '2019', NULL, '2021-09-25 00:05:53', '2021-09-25 00:05:53'),
(2, 'Google', 'CEO', 'Once I was appointed as the Ceo of Google.Then I stole all there data .And then they kicked me out of the company,those idots doesnt know who i am.i will show them one day,that they should not mess with me.', '2016', '2017', NULL, '2021-09-29 23:06:30', '2021-09-29 23:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `funfacts`
--

CREATE TABLE `funfacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funfacts`
--

INSERT INTO `funfacts` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Work Done', 555, '2021-09-24 04:19:57', '2021-09-24 04:19:57'),
(3, 'Happy Clients', 522, '2021-09-24 04:53:40', '2021-09-24 04:53:40'),
(4, 'Experience Years', 2, '2021-09-24 04:54:15', '2021-09-24 04:54:15'),
(5, 'Awards Won', 10, '2021-09-24 04:54:30', '2021-09-24 04:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `submission_date` varchar(255) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `slug`, `start_date`, `submission_date`, `client_name`, `content`, `status`, `created_at`, `updated_at`, `featured_image`, `service_id`) VALUES
(2, 'Batman Man', 'batman-man', '12/06/2018', '08/07/2019', 'ElectroWorld', 'lorem capsul saosa werea bluiino ,hellow', 1, '2021-09-26 22:22:17', '2021-09-30 20:10:53', 'portfolio_1632716537510126595.jpg', 6),
(3, 'Greatlly-A Dynamic Template', 'greatlly-a-dynamic-template', '15/03/2017', '12/4/2017', 'Oxford', 'It Was A really Nice Project', 1, '2021-09-29 23:34:03', '2021-09-30 20:08:18', 'portfolio_16329800431015099437.png', 4),
(4, 'Businesio - One Page Parallax', 'businesio-one-page-parallax', '12/06/2018', '08/07/2019', 'Themeforest', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, '2021-09-29 23:35:27', '2021-09-29 23:35:27', 'portfolio_1632980127819443167.jpg', 1),
(5, 'Html design template foe beginner with html,css,bootstrap', 'html-design-template-foe-beginner-with-htmlcssbootstrap', '12/06/2018', '08/07/2018', 'Oxford', 'Its a very good template for users to make there website look better', 1, '2021-09-30 20:12:27', '2021-09-30 20:18:13', 'portfolio_1633054693581350063.jpg', 5),
(6, '9 easy Seo tepmlate to use freely to improve your website stability', '9-easy-seo-tepmlate-to-use-freely-to-improve-your-website-stability', '12/06/2018', '08/07/2019', 'Themeforest', 'it nice', 1, '2021-09-30 20:16:02', '2021-09-30 20:18:39', 'portfolio_16330547191801201829.jpg', 5),
(7, 'Syphony Corporate Portfolio & Startup Businees', 'syphony-corporate-portfolio-startup-businees', '12/06/2019', '08/07/2019', 'Web Mix', 'This Project is reaaly Good', 1, '2021-09-30 20:17:48', '2021-09-30 20:17:48', 'portfolio_1633054668391607893.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `scategories`
--

CREATE TABLE `scategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scategories`
--

INSERT INTO `scategories` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Language Skills', '2021-09-26 23:09:25', '2021-09-26 23:11:56', NULL),
(5, 'Coding Skills', '2021-09-26 23:10:59', '2021-09-26 23:10:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `service_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `image`, `service_image`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Web Design', 'web-design', 'Hopes lived by rooms oh in no death house. Contented direction september but end led excellent ourselves.', '16325440091193610271.png', '16331952371364474905.jpg', '2021-09-24 22:26:49', '2021-10-02 11:20:37', 1),
(4, 'Web Development', 'web-development', 'Hopes lived by rooms oh in no death house. Contented direction september but end led excellent ourselves.', '16325452472011240088.png', '16331952641515002090.jpg', '2021-09-24 22:47:27', '2021-10-02 11:21:04', 1),
(5, 'SEO', 'seo', 'Seo is a Search Engine Optimization,which help us to file out website when user want find something similar', '1633054167791302820.png', '1633195273594952009.jpg', '2021-09-30 20:09:27', '2021-10-02 11:21:13', 1),
(6, 'Graphic Design', 'graphic-design', 'Graphic Design are more important now a days', '16330542361205287726.png', '1633195311619118219.jpg', '2021-09-30 20:10:36', '2021-10-02 11:21:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website_title` varchar(255) DEFAULT NULL,
  `base_color` varchar(255) DEFAULT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `fav_icon` varchar(255) DEFAULT NULL,
  `copyright_text` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `education_title` varchar(255) DEFAULT NULL,
  `experince_title` varchar(255) DEFAULT NULL,
  `service_title` varchar(255) DEFAULT NULL,
  `portfolio_title` varchar(255) DEFAULT NULL,
  `testimonial_title` varchar(255) DEFAULT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `contact_title` varchar(255) DEFAULT NULL,
  `resume_title` varchar(255) DEFAULT NULL,
  `client_title` varchar(255) DEFAULT NULL,
  `is_disqus` int(3) DEFAULT NULL,
  `disqus_username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_title`, `base_color`, `header_logo`, `footer_logo`, `fav_icon`, `copyright_text`, `meta_keywords`, `meta_description`, `education_title`, `experince_title`, `service_title`, `portfolio_title`, `testimonial_title`, `blog_title`, `contact_title`, `resume_title`, `client_title`, `is_disqus`, `disqus_username`) VALUES
(1, 'Identity / My Portfolio', '#2A00FF', 'header_logo_16324995531266151267.png', 'footer_logo_163258104039948906.png', 'fav_icon_1632499553140603432.png', 'Copyright © 2021. All rights reserved by IdealDevs', 'web-development,w-design', 'Identity-Resume/Portfolio/CV', 'Education', 'Experience', 'Services', 'Portfolio', 'Testimonial', 'Blog', 'Contact', 'Resume', 'My Clients', 1, 'identity');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `scategory_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `scategory_id`, `name`, `level`, `created_at`, `updated_at`) VALUES
(2, 1, 'Jquery', 31, '2021-09-26 23:23:15', '2021-09-26 23:23:15'),
(3, 5, 'Jquery', 100, '2021-09-29 22:54:27', '2021-09-29 22:54:27'),
(6, 1, 'English', 60, '2021-09-29 22:55:54', '2021-09-29 22:55:54'),
(7, 5, 'HTML', 100, '2021-09-29 22:56:06', '2021-09-29 22:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-facebook-f', 'https://laracasts.com/', '2021-09-24 16:44:24', '2021-09-24 16:44:24'),
(2, 'fab fa-twitter', 'https://laracasts.com/', '2021-09-24 16:44:41', '2021-09-24 16:44:41'),
(3, 'fab fa-linkedin', 'https://laracasts.com/', '2021-09-24 16:44:58', '2021-09-24 16:44:58'),
(5, 'fab fa-facebook-messenger', 'https://laracasts.com/', '2021-09-24 16:48:03', '2021-09-24 16:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `message`, `image`, `rating`, `created_at`, `updated_at`) VALUES
(2, 'David', 'Full Stack Developer', 'its good', '1632565346457128102.jpg', 2, '2021-09-25 04:22:26', '2021-09-27 01:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bcategories`
--
ALTER TABLE `bcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experinces`
--
ALTER TABLE `experinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funfacts`
--
ALTER TABLE `funfacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scategories`
--
ALTER TABLE `scategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bcategories`
--
ALTER TABLE `bcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experinces`
--
ALTER TABLE `experinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `funfacts`
--
ALTER TABLE `funfacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `scategories`
--
ALTER TABLE `scategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
