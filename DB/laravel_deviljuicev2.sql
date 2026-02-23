-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2026 at 08:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_deviljuicev2`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_test`
--

CREATE TABLE `paypal_test` (
  `id` int(11) NOT NULL,
  `details` text NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paypal_test`
--

INSERT INTO `paypal_test` (`id`, `details`, `added_at`) VALUES
(1, '{\"id\":\"8AV15969M4657680U\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"ORD1769843895\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"25.50\"},\"payee\":{\"email_address\":\"sb-hozzo27199641@business.example.com\",\"merchant_id\":\"WXRHJ2ELGWASS\"},\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"shipping\":{\"name\":{\"full_name\":\"john doe\"},\"address\":{\"address_line_1\":\"san jose\",\"admin_area_2\":\"san jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"3UT36445V5933772D\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"25.50\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"NOT_ELIGIBLE\"},\"create_time\":\"2026-01-31T07:19:36Z\",\"update_time\":\"2026-01-31T07:19:36Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"email_address\":\"test152@yopmail.com\",\"payer_id\":\"ES2MS4VLZXQ8W\",\"address\":{\"country_code\":\"US\"}},\"create_time\":\"2026-01-31T07:18:28Z\",\"update_time\":\"2026-01-31T07:19:36Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/8AV15969M4657680U\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2026-01-31 07:19:36'),
(2, '{\"id\":\"02X50819KA925740L\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"10\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"269.99\"},\"payee\":{\"email_address\":\"sb-mzgnc48457677@business.example.com\",\"merchant_id\":\"UBHW5P9YUUAFS\"},\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"shipping\":{\"name\":{\"full_name\":\"john doe\"},\"address\":{\"address_line_1\":\"san jose\",\"admin_area_2\":\"san jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"1LJ33307PA495805L\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"269.99\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"create_time\":\"2026-02-13T10:32:16Z\",\"update_time\":\"2026-02-13T10:32:16Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"email_address\":\"test152@yopmail.com\",\"payer_id\":\"5SADK277PXG5C\",\"address\":{\"country_code\":\"US\"}},\"create_time\":\"2026-02-13T10:31:02Z\",\"update_time\":\"2026-02-13T10:32:17Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/02X50819KA925740L\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2026-02-13 10:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `address` varchar(400) NOT NULL,
  `added_by` int(5) NOT NULL,
  `update_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `name`, `email`, `password`, `ip_address`, `phone`, `image`, `privilege_id`, `address`, `added_by`, `update_by`, `status`, `created`, `updated`) VALUES
(1, 'laravel7825', 'admin@admin.com', '$2y$12$rfIb3rMql0VAUoF6e.JSoeb91VTN6GC5i6JGvfkK7HZT0JP86pXju', '::1', '2356896589', 'user_1768210717.jpg', 1, 'delhi', 1, 1, 1, '2021-09-06 10:23:19', '2026-01-12 09:39:05'),
(15, 'test1234', 'test@yopmail.com', '$2y$10$fqYWNLFqBT3yt7nCO4xsROQuDPi1Evl74/zTRkNkzlh2k4qVYQ4JG', '::1', '2356897485', 'u_1672132507.jpg', 3, 'delhi', 1, 1, 1, '2022-12-27 09:15:07', '2023-03-05 11:10:42'),
(16, 'test175', 'test175@yopmail.com', '$2y$10$n6uyNrkfB9SHBImdRrCsR.x5sgHFkCCwQtQLODH65CqOasEOrFLBO', '::1', '7865432343', 'u_1672145257.jpg', 3, 'delhi', 1, 1, 1, '2022-12-27 12:47:37', '2023-02-15 10:54:14'),
(17, 'abc', 'abc@yopmail.com', '$2y$10$TbeSFZ0.q5ZSJpfkgnHDiOfsJE0rn29o9L9DiV0PWuYy9SfGwagKi', '::1', '9162925142', 'u_1676480019.jpg', 3, 'ara', 1, 1, 1, '2023-02-14 17:07:38', '2023-02-15 10:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `main_title` varchar(100) DEFAULT NULL,
  `sub_title` varchar(150) DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `video` varchar(150) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `main_title`, `sub_title`, `page`, `url`, `image`, `video`, `status`, `created_at`, `update_at`) VALUES
(1, 'Witness the Art of Temptation', 'Step inside the world where fire meets finesse. Watch how every drop of Devil’s Juice Vodka is born, distilled in darkness, perfected in passion.', 1, NULL, '', 'banner-video-Ovs7ESEk.mp4', 1, '2025-12-30 07:01:02', '2025-12-30 07:34:43'),
(2, 'Pure. Powerful. Devilishly Smooth.', 'A vodka so pure it tempts the fearless—smooth enough to seduce, bold enough to burn.', 5, NULL, 'banner-WAUNoiEp.webp', NULL, 1, '2025-12-31 12:23:26', '2026-01-24 06:05:56'),
(3, 'Cocktails Club', 'Step inside the Cocktails Club—a place built for the daring, the creative, and those who pour with passion.', 6, NULL, 'banner-q75tm7JL.webp', NULL, 1, '2026-01-02 06:30:03', '2026-01-24 06:36:46'),
(4, 'Cocktails Club', 'Step inside the Cocktails Club — a place built for the daring, the creative, and the ones who pour with passion.', 3, NULL, 'banner-6rpfuKAH.webp', NULL, 1, '2026-01-02 06:37:11', NULL),
(5, 'THE STORY OF DEVIL’S JUICE', 'Boldly Distilled. Fearlessly Crafted. Unmistakably Devil.', 4, NULL, NULL, NULL, 1, '2026-01-02 06:42:02', NULL),
(6, 'Our Vodka', 'A spirit born from obsession and perfected through precision. Every drop of Devil’s Juice Vodka embodies balance, smooth yet fierce, refined yet raw. ', 7, NULL, NULL, NULL, 1, '2026-01-02 06:44:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blg_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_details` text NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_url` varchar(255) NOT NULL,
  `related_blogs` varchar(255) NOT NULL,
  `blog_added_by` varchar(255) NOT NULL,
  `blog_cat_id` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `blog_status` enum('0','1') NOT NULL,
  `added_at` datetime NOT NULL,
  `modefied_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blg_id`, `blog_title`, `blog_details`, `blog_image`, `blog_url`, `related_blogs`, `blog_added_by`, `blog_cat_id`, `post_date`, `meta_title`, `meta_description`, `meta_keyword`, `blog_status`, `added_at`, `modefied_at`) VALUES
(1, 'The Most Inspiring Interior Design Of 201688', 'We went down the lane, by the body of the man in black, sodden now from the overnight hail,', 'b_1626281172.jpg', 'the-most-inspiring-interior-design-of-201688', '', 'Admin', 0, '2021-03-23', 'The Most Inspiring Interior Design Of 201685', 'The Most Inspiring Interior Design Of 201685', 'The Most Inspiring Interior Design Of 201685', '1', '2021-07-14 23:10:52', '2021-03-23 17:07:18'),
(2, 'daffodills', 'daffodils daffodils daffodils daffodils', '', 'daffodils ', 'the very much design', 'Admin', 0, '2021-03-23', 'The Most Inspiring Interior Design Of 201685', 'The Most Inspiring Interior Design Of 201685', 'The Most Inspiring Interior Design Of 201685', '1', '2024-03-03 16:46:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms`
--

CREATE TABLE `tbl_cms` (
  `id` int(11) NOT NULL,
  `page` varchar(100) DEFAULT NULL,
  `banner_title` varchar(255) DEFAULT NULL,
  `banner_head` varchar(255) DEFAULT NULL,
  `cms_banner` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description2` text DEFAULT NULL,
  `description3` text DEFAULT NULL,
  `description4` text DEFAULT NULL,
  `description5` text DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0-Inactive,1-Active',
  `added_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cms`
--

INSERT INTO `tbl_cms` (`id`, `page`, `banner_title`, `banner_head`, `cms_banner`, `description`, `description2`, `description3`, `description4`, `description5`, `status`, `added_at`, `update_at`) VALUES
(5, 'privacy-policy', 'Privacy Policy', '', 'banner-mYAu37Mm.webp', '<h3>DEVIL&rsquo;S JUICE</h3>\r\n<p class=\"FirstParagraph\"><strong>PRIVACY POLICY</strong></p>\r\n<p class=\"MsoBodyText\"><strong>Effective Date:</strong> 2026-01-21<br><strong>Last Updated:</strong> 2026-01-21</p>\r\n<p class=\"MsoBodyText\">Devil&rsquo;s Juice (&ldquo;Company,&rdquo; &ldquo;we,&rdquo; &ldquo;our,&rdquo; or &ldquo;us&rdquo;) respects your privacy and is committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard information when you visit our website or interact with our services.</p>\r\n<p class=\"MsoBodyText\">This Policy applies only to websites and digital services operated by Devil&rsquo;s Juice.</p>\r\n<h3>NOTICE AT COLLECTION</h3>\r\n<p class=\"FirstParagraph\">The type of personal information we collect depends on how you interact with us.</p>\r\n<h4>Information We May Collect</h4>\r\n<p class=\"Compact\" style=\"margin-left: .5in; text-indent: -.25in; mso-list: l0 level1 lfo1;\"><!-- [if !supportLists]--><span style=\"font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;\"><span style=\"mso-list: Ignore;\">&middot;<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><strong>Contact Information:</strong> Name, email address, phone number, mailing address<br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></p>\r\n<p class=\"Compact\" style=\"margin-left: .5in; text-indent: -.25in; mso-list: l0 level1 lfo1;\"><!-- [if !supportLists]--><span style=\"font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;\"><span style=\"mso-list: Ignore;\">&middot;<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><strong>Payment Information:</strong> Billing address and payment details (processed securely through third-party providers)<br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></p>\r\n<p class=\"Compact\" style=\"margin-left: .5in; text-indent: -.25in; mso-list: l0 level1 lfo1;\"><!-- [if !supportLists]--><span style=\"font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;\"><span style=\"mso-list: Ignore;\">&middot;<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><strong>Feedback &amp; Communications:</strong> Messages, inquiries, reviews, or customer support requests<br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></p>\r\n<p class=\"Compact\" style=\"margin-left: .5in; text-indent: -.25in; mso-list: l0 level1 lfo1;\"><!-- [if !supportLists]--><span style=\"font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;\"><span style=\"mso-list: Ignore;\">&middot;<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><strong>Demographic Information:</strong> Age, birthdate, location (to verify legal drinking age and eligibility)<br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></p>\r\n<p class=\"Compact\" style=\"margin-left: .5in; text-indent: -.25in; mso-list: l0 level1 lfo1;\"><!-- [if !supportLists]--><span style=\"font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;\"><span style=\"mso-list: Ignore;\">&middot;<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><strong>Website Usage Information:</strong> IP address, browser type, device identifiers, pages visited, time spent on site, cookies, and similar tracking technologies</p>\r\n<p class=\"FirstParagraph\">We retain personal information only as long as necessary for legitimate business purposes or as required by law.</p>\r\n<h3>BUSINESS PURPOSES FOR COLLECTING INFORMATION</h3>\r\n<p class=\"FirstParagraph\"><span style=\"font-size: 12.0pt; font-family: \'Aptos\',\'sans-serif\'; mso-ascii-theme-font: minor-latin; mso-fareast-font-family: Aptos; mso-fareast-theme-font: minor-latin; mso-hansi-theme-font: minor-latin; mso-bidi-font-family: \'Times New Roman\'; mso-bidi-theme-font: minor-bidi; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\">We use collected information to: - Communicate with you regarding orders, inquiries, or policies<br>- Process transactions and pre-orders<br>- Improve our website, products, and customer experience<br>- Customize user preferences<br>- Send marketing communications (with opt-out options)<br>- Protect against fraud, abuse, and unauthorized access<br>- Comply with legal and regulatory obligations</span></p>\r\n<h3>METHODS OF COLLECTING INFORMATION</h3>\r\n<p class=\"FirstParagraph\">We collect information: - Directly from you when you submit forms, place orders, or contact us<br>- Automatically through cookies, analytics tools, and tracking technologies<br>- From third parties such as payment processors, CRM systems, and service providers</p>\r\n<h3>COOKIES &amp; TRACKING TECHNOLOGIES</h3>\r\n<p class=\"FirstParagraph\">We use cookies and similar technologies to: - Ensure website functionality<br>- Analyze performance and usage<br>- Improve marketing relevance</p>\r\n<p class=\"FirstParagraph\"><span style=\"font-size: 12.0pt; font-family: \'Aptos\',\'sans-serif\'; mso-ascii-theme-font: minor-latin; mso-fareast-font-family: Aptos; mso-fareast-theme-font: minor-latin; mso-hansi-theme-font: minor-latin; mso-bidi-font-family: \'Times New Roman\'; mso-bidi-theme-font: minor-bidi; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\">You may manage cookie preferences via Cookie &amp; Ad Settings or your browser settings. Blocking cookies may impact site functionality.</span></p>\r\n<h3>SHARING &amp; DISCLOSURE OF INFORMATION</h3>\r\n<p class=\"FirstParagraph\">We do not sell personal information.</p>\r\n<p class=\"MsoBodyText\">We may share information with: - Service providers (payment processing, CRM, hosting, analytics)<br>- Government or regulatory authorities when required by law<br>- Successor entities in the event of a merger, sale, or restructuring</p>\r\n<h3>YOUR RIGHTS</h3>\r\n<p class=\"FirstParagraph\">Depending on your state of residence, you may have the right to: 1. Access personal information<br>2. Request correction<br>3. Request deletion<br>4. Request portability<br>5. Opt out of marketing communications</p>\r\n<p class=\"MsoBodyText\">Requests may be submitted via our Rights Request Form.</p>\r\n<h3>AGE RESTRICTION</h3>\r\n<p class=\"FirstParagraph\">This website is intended only for individuals <strong>21 years of age or older</strong>.<br>We do not knowingly collect information from individuals under 21.</p>\r\n<h3>DATA SECURITY</h3>\r\n<p class=\"FirstParagraph\">We implement reasonable administrative, technical, and physical safeguards. However, no system is completely secure.</p>\r\n<h3><a name=\"contact-us\"></a>CONTACT US</h3>\r\n<p class=\"FirstParagraph\"><span style=\"mso-bookmark: contact-us;\">📧 info@devilsjuice.com<br>📧 support@devilsjuice.com<br>📞 (800) 492-9134<br>📍 DEVIL&rsquo;S JUICE<br>341 South Orange Street<br>Salt Lake City, UT 84104</span></p>\r\n<h3>UPDATES TO THIS POLICY</h3>\r\n<p class=\"FirstParagraph\">We may update this Privacy Policy periodically. Changes will be posted on this page.</p>', '', '', '', '', 1, '2024-10-20 06:21:31', '2026-01-21 09:49:45'),
(7, 'terms-condition', 'Terms & Conditions', '', 'banner-Tpq98Soq.webp', '<h2>TERMS &amp; CONDITIONS OF USE</h2>\r\n<h2>DEVIL&rsquo;S JUICE</h2>\r\n<p class=\"FirstParagraph\"><span style=\"mso-bookmark: devils-juice-1;\"><strong>TERMS &amp; CONDITIONS</strong></span></p>\r\n<p class=\"MsoBodyText\"><span style=\"mso-bookmark: devils-juice-1;\"><strong>Last Updated:</strong> 2026-01-21</span></p>\r\n<p class=\"MsoBodyText\"><span style=\"mso-bookmark: devils-juice-1;\">By accessing this website, you agree to these Terms &amp; Conditions.</span></p>\r\n<div class=\"MsoNormal\" style=\"text-align: center;\" align=\"center\"><hr align=\"center\" size=\"2\" width=\"100%\"></div>\r\n<h3>1. ELIGIBILITY</h3>\r\n<p class=\"FirstParagraph\"><span style=\"mso-bookmark: eligibility;\">This site is intended only for individuals <strong>21 years of age or older</strong> and where alcohol consumption and purchase are legal.</span></p>\r\n<div class=\"MsoNormal\" style=\"text-align: center;\" align=\"center\"><hr align=\"center\" size=\"2\" width=\"100%\"></div>\r\n<h3>2. USE OF WEBSITE</h3>\r\n<p class=\"FirstParagraph\"><span style=\"mso-bookmark: use-of-website;\">You agree to: - Use the site lawfully and responsibly<br>- Provide accurate information<br>- Refrain from misuse, hacking, or unauthorized access<br>- Avoid posting illegal, offensive, or misleading content</span></p>\r\n<div class=\"MsoNormal\" style=\"text-align: center;\" align=\"center\"><hr align=\"center\" size=\"2\" width=\"100%\"></div>\r\n<h3>3. INTELLECTUAL PROPERTY</h3>\r\n<p class=\"FirstParagraph\"><span style=\"mso-bookmark: intellectual-property;\">All content (text, images, logos, designs, trademarks) belongs to Devil&rsquo;s Juice and may not be copied or used without permission.</span></p>\r\n<div class=\"MsoNormal\" style=\"text-align: center;\" align=\"center\"><hr align=\"center\" size=\"2\" width=\"100%\"></div>\r\n<h3>4. ORDERS &amp; PRE-ORDERS</h3>\r\n<p class=\"FirstParagraph\"><span style=\"mso-bookmark: orders-pre-orders;\">All orders are subject to availability, regulatory approval, and age verification. We reserve the right to cancel orders if required by law.</span></p>\r\n<div class=\"MsoNormal\" style=\"text-align: center;\" align=\"center\"><hr align=\"center\" size=\"2\" width=\"100%\"></div>\r\n<h3>5. DISCLAIMER</h3>\r\n<p class=\"FirstParagraph\"><span style=\"mso-bookmark: disclaimer;\">Information on this site is provided &ldquo;as is.&rdquo; We make no guarantees regarding uninterrupted access or accuracy.</span></p>\r\n<div class=\"MsoNormal\" style=\"text-align: center;\" align=\"center\"><hr align=\"center\" size=\"2\" width=\"100%\"></div>\r\n<h3>6. LIMITATION OF LIABILITY</h3>\r\n<p class=\"FirstParagraph\"><span style=\"mso-bookmark: limitation-of-liability;\">Devil&rsquo;s Juice shall not be liable for indirect, incidental, or consequential damages arising from site use.</span></p>\r\n<div class=\"MsoNormal\" style=\"text-align: center;\" align=\"center\"><hr align=\"center\" size=\"2\" width=\"100%\"></div>\r\n<h3>7. GOVERNING LAW</h3>\r\n<p class=\"FirstParagraph\"><span style=\"mso-bookmark: governing-law;\">These Terms are governed by the laws of the <strong>State of Utah, United States</strong>.</span></p>\r\n<div class=\"MsoNormal\" style=\"text-align: center;\" align=\"center\"><hr align=\"center\" size=\"2\" width=\"100%\"></div>\r\n<h3>8. CONTACT</h3>\r\n<p class=\"FirstParagraph\">📧 info@devilsjuice.com<br>📞 (800) 492-9134</p>', '', '', '', '', 1, '2025-01-19 11:14:39', '2026-01-21 09:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cocktails`
--

CREATE TABLE `tbl_cocktails` (
  `id` int(11) NOT NULL,
  `created_by` varchar(150) NOT NULL,
  `insta_user_name` varchar(150) NOT NULL,
  `cocktail_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `featured` int(2) NOT NULL,
  `status` int(11) NOT NULL,
  `added_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cocktails`
--

INSERT INTO `tbl_cocktails` (`id`, `created_by`, `insta_user_name`, `cocktail_name`, `slug`, `short_desc`, `ingredients`, `instructions`, `image`, `featured`, `status`, `added_at`, `update_at`) VALUES
(1, 'Eleanor Vance', '@mixwithmaya', 'Devil’s Mule', 'devils-mule', 'A bold, fiery twist on a classic — smooth, spicy, and dangerously easy to drink.', '<ul class=\"ingredient-list\">\r\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\r\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\r\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\r\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\r\n<li>Crushed ice</li>\r\n<li>Fresh mint sprig</li>\r\n<li>Lime wheel</li>\r\n<li>A small slice of fresh ginger (for garnish)</li>\r\n</ul>', '<ol class=\"instruction-list\">\r\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\r\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\r\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\r\n<li>Top with ginger beer, giving it a bold kick.</li>\r\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\r\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\r\n</ol>', 'cimg-Aa92L8mp.webp', 0, 1, '2025-12-30 12:43:53', '2025-12-31 12:45:47'),
(2, 'Eleanor Vance', '@mixwithmaya', 'Midnight Flame', 'midnight-flame', 'For those who love their nights like their drinks — smooth and burning.', '<ul class=\"ingredient-list\">\r\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\r\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\r\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\r\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\r\n<li>Crushed ice</li>\r\n<li>Fresh mint sprig</li>\r\n<li>Lime wheel</li>\r\n<li>A small slice of fresh ginger (for garnish)</li>\r\n</ul>', '<ol class=\"instruction-list\">\r\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\r\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\r\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\r\n<li>Top with ginger beer, giving it a bold kick.</li>\r\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\r\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\r\n</ol>', 'cimg-2tk1rM81.webp', 0, 1, '2025-12-30 12:49:27', '2025-12-31 12:45:56'),
(3, 'Eleanor Vance', '@mixwithmaya', 'Inferno Martinig', 'inferno-martinig', 'The ultimate power move in a glass.', '<ul class=\"ingredient-list\">\r\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\r\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\r\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\r\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\r\n<li>Crushed ice</li>\r\n<li>Fresh mint sprig</li>\r\n<li>Lime wheel</li>\r\n<li>A small slice of fresh ginger (for garnish)</li>\r\n</ul>', '<ol class=\"instruction-list\">\r\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\r\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\r\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\r\n<li>Top with ginger beer, giving it a bold kick.</li>\r\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\r\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\r\n</ol>', 'cimg-6dXggAFj.webp', 0, 1, '2025-12-30 12:54:09', '2025-12-31 12:47:39'),
(4, 'Eleanor Vance2', '@mixwithmaya2', 'Inferno Martinif', 'inferno-martinif', 'The ultimate power move in a glass.', '<ul class=\"ingredient-list\">\r\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\r\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\r\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\r\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\r\n<li>Crushed ice</li>\r\n<li>Fresh mint sprig</li>\r\n<li>Lime wheel</li>\r\n<li>A small slice of fresh ginger (for garnish)</li>\r\n</ul>', '<ol class=\"instruction-list\">\r\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\r\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\r\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\r\n<li>Top with ginger beer, giving it a bold kick.</li>\r\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\r\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\r\n</ol>', 'cimg-9ZF1y1jz.webp', 0, 1, '2025-12-30 12:54:09', '2025-12-31 12:47:19'),
(5, 'Eleanor Vance3', '@mixwithmaya3', 'Inferno Martinie', 'inferno-martinie', 'The ultimate power move in a glass.', '<ul class=\"ingredient-list\">\r\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\r\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\r\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\r\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\r\n<li>Crushed ice</li>\r\n<li>Fresh mint sprig</li>\r\n<li>Lime wheel</li>\r\n<li>A small slice of fresh ginger (for garnish)</li>\r\n</ul>', '<ol class=\"instruction-list\">\r\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\r\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\r\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\r\n<li>Top with ginger beer, giving it a bold kick.</li>\r\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\r\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\r\n</ol>', 'cimg-R22bzy9E.webp', 0, 1, '2025-12-30 12:54:09', '2025-12-31 12:47:09'),
(6, 'Eleanor Vance3', '@mixwithmaya3', 'Inferno Martinid', 'inferno-martinid', 'The ultimate power move in a glass.', '<ul class=\"ingredient-list\">\r\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\r\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\r\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\r\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\r\n<li>Crushed ice</li>\r\n<li>Fresh mint sprig</li>\r\n<li>Lime wheel</li>\r\n<li>A small slice of fresh ginger (for garnish)</li>\r\n</ul>', '<ol class=\"instruction-list\">\r\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\r\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\r\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\r\n<li>Top with ginger beer, giving it a bold kick.</li>\r\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\r\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\r\n</ol>', 'cimg-M5tY5ioK.webp', 0, 1, '2025-12-30 12:54:09', '2025-12-31 12:46:54'),
(7, 'Eleanor Vance3', '@mixwithmaya3', 'Inferno Martiniac', 'inferno-martiniac', 'The ultimate power move in a glass.', '<ul class=\"ingredient-list\">\r\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\r\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\r\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\r\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\r\n<li>Crushed ice</li>\r\n<li>Fresh mint sprig</li>\r\n<li>Lime wheel</li>\r\n<li>A small slice of fresh ginger (for garnish)</li>\r\n</ul>', '<ol class=\"instruction-list\">\r\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\r\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\r\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\r\n<li>Top with ginger beer, giving it a bold kick.</li>\r\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\r\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\r\n</ol>', 'cimg-XPxggr6B.webp', 0, 1, '2025-12-30 12:54:09', '2025-12-31 12:46:42'),
(8, 'Eleanor Vance3', '@mixwithmaya3', 'Inferno Martinib', 'inferno-martinib', 'The ultimate power move in a glass.', '<ul class=\"ingredient-list\">\r\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\r\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\r\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\r\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\r\n<li>Crushed ice</li>\r\n<li>Fresh mint sprig</li>\r\n<li>Lime wheel</li>\r\n<li>A small slice of fresh ginger (for garnish)</li>\r\n</ul>', '<ol class=\"instruction-list\">\r\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\r\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\r\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\r\n<li>Top with ginger beer, giving it a bold kick.</li>\r\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\r\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\r\n</ol>', 'cimg-p6Tpefxu.webp', 0, 1, '2025-12-30 12:54:09', '2025-12-31 12:46:34'),
(10, 'Eleanor Vance3', '@mixwithmaya3', 'Inferno Martini', 'inferno-martini', 'The ultimate power move in a glass.', '<ul class=\"ingredient-list\">\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\n<li>Crushed ice</li>\n<li>Fresh mint sprig</li>\n<li>Lime wheel</li>\n<li>A small slice of fresh ginger (for garnish)</li>\n</ul>', '<ol class=\"instruction-list\">\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\n<li>Top with ginger beer, giving it a bold kick.</li>\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\n</ol>', 'cimg-73nBnRRA.webp', 1, 1, '2025-12-30 12:54:09', '2025-12-31 12:42:39'),
(11, 'raj guddu', '@rajguddu', 'Inferno Martini', 'inferno-martiniGGuuAJuB', 'The ultimate power move in a glass.', '<ul class=\"ingredient-list\">\r\n<li><strong>60ml</strong>&nbsp;Devil&rsquo;s Juice Vodka</li>\r\n<li><strong>120ml</strong>&nbsp;Ginger Beer (strong + spicy works best)</li>\r\n<li><strong>15ml</strong>&nbsp;Fresh Lime Juice</li>\r\n<li><strong>5ml</strong>&nbsp;Smoked Brown Sugar Syrup (optional but wicked)</li>\r\n<li>Crushed ice</li>\r\n<li>Fresh mint sprig</li>\r\n<li>Lime wheel</li>\r\n<li>A small slice of fresh ginger (for garnish)</li>\r\n</ul>', '<ol class=\"instruction-list\">\r\n<li>Fill a copper mug (or chilled glass) with crushed ice.</li>\r\n<li>Pour in Devil&rsquo;s Juice Vodka for that deep, fiery base.</li>\r\n<li>Add lime juice and the optional smoked brown sugar syrup for a slow-building sweetness.</li>\r\n<li>Top with ginger beer, giving it a bold kick.</li>\r\n<li>Stir gently &mdash; let the smoke, lime, and fire come together.</li>\r\n<li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>\r\n</ol>', 'cimg-jZbdmmHY.webp', 0, 0, '2026-01-08 09:09:49', '0000-00-00 00:00:00'),
(12, 'raj guddu', '@rajguddu', 'spiner', 'spinerhkGGoDuj', 'next month disccuss', '• ***raju ***', '• ***fsafsafsadas***\r\n• aSasASas', 'cimg-dxpgrEaI.webp', 0, 0, '2026-01-08 09:21:28', '0000-00-00 00:00:00'),
(13, 'raj guddu', '@rajguddu', 'Inferno Martini', 'inferno-martinihtjUVGST', 'next month disccuss', 'test', 'test', 'cimg-CO6YL3Q4.webp', 0, 0, '2026-01-08 10:03:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cocktail_club`
--

CREATE TABLE `tbl_cocktail_club` (
  `c_id` int(11) NOT NULL,
  `cocktail_name` varchar(255) NOT NULL,
  `insta_username` varbinary(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `insta_link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `is_devil_hour` int(11) NOT NULL,
  `added_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cocktail_club`
--

INSERT INTO `tbl_cocktail_club` (`c_id`, `cocktail_name`, `insta_username`, `image`, `insta_link`, `status`, `is_devil_hour`, `added_at`, `update_at`) VALUES
(3, 'Devil’s Mule', 0x40746865626f6f7a7962617269737461, 'cimg-tXuDiEiJ.webp', 'https://www.instagram.com/theboozybarista', 1, 0, '2026-01-11 14:10:00', '2026-01-11 14:13:25'),
(4, 'Midnight Flame', 0x40746865626f6f7a7962617269737461, 'cimg-443b98j4.webp', 'https://www.instagram.com/theboozybarista', 1, 0, '2026-01-11 14:13:48', '0000-00-00 00:00:00'),
(5, 'Inferno Martini', 0x40746865626f6f7a7962617269737461, 'cimg-ZAkPdZ87.webp', 'https://www.instagram.com/theboozybarista', 1, 0, '2026-01-11 14:14:10', '0000-00-00 00:00:00'),
(6, 'Scarlet Smoke', 0x40746865626f6f7a7962617269737461, 'cimg-CzZxwfsG.webp', 'https://www.instagram.com/theboozybarista', 1, 0, '2026-01-11 14:15:29', '0000-00-00 00:00:00'),
(7, 'Frostbite Elixir', 0x40746865626f6f7a7962617269737461, 'cimg-lljdLj6b.webp', 'https://www.instagram.com/theboozybarista', 1, 0, '2026-01-11 14:19:03', '0000-00-00 00:00:00'),
(8, 'Dark Ritual', 0x40746865626f6f7a7962617269737461, 'cimg-4syJiFLR.webp', 'https://www.instagram.com/theboozybarista', 1, 0, '2026-01-11 14:19:45', '0000-00-00 00:00:00'),
(9, 'Dark Ritual', 0x40746865626f6f7a7962617269737461, 'cimg-S6FvZYbD.webp', 'https://www.instagram.com/theboozybarista', 1, 0, '2026-01-11 14:20:08', '0000-00-00 00:00:00'),
(10, 'Crimson Tide', 0x40746865626f6f7a7962617269737461, 'cimg-s9hW1A4f.webp', 'https://www.instagram.com/theboozybarista', 1, 0, '2026-01-11 14:20:32', '0000-00-00 00:00:00'),
(11, 'Hellfire Spritz', 0x40746865626f6f7a7962617269737461, 'cimg-koTW0bwN.webp', 'https://www.instagram.com/theboozybarista', 1, 0, '2026-01-11 14:20:58', '0000-00-00 00:00:00'),
(12, 'Ammy', 0x40616d6d795f3233, 'cimg-l3d2ZPES.webp', 'https://www.instagram.com/ammy_23', 1, 1, '2026-01-11 14:27:04', '2026-01-11 14:27:41'),
(13, 'Ammy', 0x40616d6d795f3233, 'cimg-Xtxsmw0r.webp', 'https://www.instagram.com/ammy_23', 1, 1, '2026-01-11 14:28:10', '0000-00-00 00:00:00'),
(14, 'Ammy', 0x40616d6d795f3233, 'cimg-Hml7a3dS.webp', 'https://www.instagram.com/ammy_23', 1, 1, '2026-01-11 14:28:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0-new,1-Approve,2-Disapprove,3-Cancel',
  `added_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `country`, `phone`, `subject`, `message`, `status`, `added_at`, `update_at`) VALUES
(1, 'raj guddu', 'test152@yopmail.com', NULL, NULL, 'test subject', 'tetst ', 0, '2026-01-10 06:17:29', NULL),
(2, 'raj guddu', 'test152@yopmail.com', NULL, NULL, 'test subject', 'test message', 0, '2026-01-10 06:30:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `countries_id` int(11) NOT NULL,
  `countries_name` varchar(64) NOT NULL DEFAULT '',
  `countries_iso_code` varchar(2) NOT NULL,
  `countries_isd_code` varchar(7) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`countries_id`, `countries_name`, `countries_iso_code`, `countries_isd_code`, `status`) VALUES
(1, 'Afghanistan', 'AF', '93', 1),
(2, 'Albania', 'AL', '355', 1),
(3, 'Algeria', 'DZ', '213', 1),
(4, 'American Samoa', 'AS', '1-684', 1),
(5, 'Andorra', 'AD', '376', 1),
(6, 'Angola', 'AO', '244', 1),
(7, 'Anguilla', 'AI', '1-264', 1),
(8, 'Antarctica', 'AQ', '672', 1),
(9, 'Antigua and Barbuda', 'AG', '1-268', 1),
(10, 'Argentina', 'AR', '54', 1),
(11, 'Armenia', 'AM', '374', 1),
(12, 'Aruba', 'AW', '297', 1),
(13, 'Australia', 'AU', '61', 1),
(14, 'Austria', 'AT', '43', 1),
(15, 'Azerbaijan', 'AZ', '994', 1),
(16, 'Bahamas', 'BS', '1-242', 1),
(17, 'Bahrain', 'BH', '973', 1),
(18, 'Bangladesh', 'BD', '880', 1),
(19, 'Barbados', 'BB', '1-246', 1),
(20, 'Belarus', 'BY', '375', 1),
(21, 'Belgium', 'BE', '32', 1),
(22, 'Belize', 'BZ', '501', 1),
(23, 'Benin', 'BJ', '229', 1),
(24, 'Bermuda', 'BM', '1-441', 1),
(25, 'Bhutan', 'BT', '975', 1),
(26, 'Bolivia', 'BO', '591', 1),
(27, 'Bosnia and Herzegowina', 'BA', '387', 1),
(28, 'Botswana', 'BW', '267', 1),
(29, 'Bouvet Island', 'BV', '47', 1),
(30, 'Brazil', 'BR', '55', 1),
(31, 'British Indian Ocean Territory', 'IO', '246', 1),
(32, 'Brunei Darussalam', 'BN', '673', 1),
(33, 'Bulgaria', 'BG', '359', 1),
(34, 'Burkina Faso', 'BF', '226', 1),
(35, 'Burundi', 'BI', '257', 1),
(36, 'Cambodia', 'KH', '855', 1),
(37, 'Cameroon', 'CM', '237', 1),
(38, 'Canada', 'CA', '1', 1),
(39, 'Cape Verde', 'CV', '238', 1),
(40, 'Cayman Islands', 'KY', '1-345', 1),
(41, 'Central African Republic', 'CF', '236', 1),
(42, 'Chad', 'TD', '235', 1),
(43, 'Chile', 'CL', '56', 1),
(44, 'China', 'CN', '86', 1),
(45, 'Christmas Island', 'CX', '61', 1),
(46, 'Cocos (Keeling) Islands', 'CC', '61', 1),
(47, 'Colombia', 'CO', '57', 1),
(48, 'Comoros', 'KM', '269', 1),
(49, 'Congo Democratic Republic of', 'CG', '242', 1),
(50, 'Cook Islands', 'CK', '682', 1),
(51, 'Costa Rica', 'CR', '506', 1),
(52, 'Cote D\'Ivoire', 'CI', '225', 1),
(53, 'Croatia', 'HR', '385', 1),
(54, 'Cuba', 'CU', '53', 1),
(55, 'Cyprus', 'CY', '357', 1),
(56, 'Czech Republic', 'CZ', '420', 1),
(57, 'Denmark', 'DK', '45', 1),
(58, 'Djibouti', 'DJ', '253', 1),
(59, 'Dominica', 'DM', '1-767', 1),
(60, 'Dominican Republic', 'DO', '1-809', 1),
(61, 'Timor-Leste', 'TL', '670', 1),
(62, 'Ecuador', 'EC', '593', 1),
(63, 'Egypt', 'EG', '20', 1),
(64, 'El Salvador', 'SV', '503', 1),
(65, 'Equatorial Guinea', 'GQ', '240', 1),
(66, 'Eritrea', 'ER', '291', 1),
(67, 'Estonia', 'EE', '372', 1),
(68, 'Ethiopia', 'ET', '251', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', '500', 1),
(70, 'Faroe Islands', 'FO', '298', 1),
(71, 'Fiji', 'FJ', '679', 1),
(72, 'Finland', 'FI', '358', 1),
(73, 'France', 'FR', '33', 1),
(75, 'French Guiana', 'GF', '594', 1),
(76, 'French Polynesia', 'PF', '689', 1),
(77, 'French Southern Territories', 'TF', NULL, 1),
(78, 'Gabon', 'GA', '241', 1),
(79, 'Gambia', 'GM', '220', 1),
(80, 'Georgia', 'GE', '995', 1),
(81, 'Germany', 'DE', '49', 1),
(82, 'Ghana', 'GH', '233', 1),
(83, 'Gibraltar', 'GI', '350', 1),
(84, 'Greece', 'GR', '30', 1),
(85, 'Greenland', 'GL', '299', 1),
(86, 'Grenada', 'GD', '1-473', 1),
(87, 'Guadeloupe', 'GP', '590', 1),
(88, 'Guam', 'GU', '1-671', 1),
(89, 'Guatemala', 'GT', '502', 1),
(90, 'Guinea', 'GN', '224', 1),
(91, 'Guinea-bissau', 'GW', '245', 1),
(92, 'Guyana', 'GY', '592', 1),
(93, 'Haiti', 'HT', '509', 1),
(94, 'Heard Island and McDonald Islands', 'HM', '011', 1),
(95, 'Honduras', 'HN', '504', 1),
(96, 'Hong Kong', 'HK', '852', 1),
(97, 'Hungary', 'HU', '36', 1),
(98, 'Iceland', 'IS', '354', 1),
(99, 'India', 'IN', '91', 1),
(100, 'Indonesia', 'ID', '62', 1),
(101, 'Iran (Islamic Republic of)', 'IR', '98', 1),
(102, 'Iraq', 'IQ', '964', 1),
(103, 'Ireland', 'IE', '353', 1),
(104, 'Israel', 'IL', '972', 1),
(105, 'Italy', 'IT', '39', 1),
(106, 'Jamaica', 'JM', '1-876', 1),
(107, 'Japan', 'JP', '81', 1),
(108, 'Jordan', 'JO', '962', 1),
(109, 'Kazakhstan', 'KZ', '7', 1),
(110, 'Kenya', 'KE', '254', 1),
(111, 'Kiribati', 'KI', '686', 1),
(112, 'Korea, Democratic People\'s Republic of', 'KP', '850', 1),
(113, 'South Korea', 'KR', '82', 1),
(114, 'Kuwait', 'KW', '965', 1),
(115, 'Kyrgyzstan', 'KG', '996', 1),
(116, 'Lao People\'s Democratic Republic', 'LA', '856', 1),
(117, 'Latvia', 'LV', '371', 1),
(118, 'Lebanon', 'LB', '961', 1),
(119, 'Lesotho', 'LS', '266', 1),
(120, 'Liberia', 'LR', '231', 1),
(121, 'Libya', 'LY', '218', 1),
(122, 'Liechtenstein', 'LI', '423', 1),
(123, 'Lithuania', 'LT', '370', 1),
(124, 'Luxembourg', 'LU', '352', 1),
(125, 'Macao', 'MO', '853', 1),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', '389', 1),
(127, 'Madagascar', 'MG', '261', 1),
(128, 'Malawi', 'MW', '265', 1),
(129, 'Malaysia', 'MY', '60', 1),
(130, 'Maldives', 'MV', '960', 1),
(131, 'Mali', 'ML', '223', 1),
(132, 'Malta', 'MT', '356', 1),
(133, 'Marshall Islands', 'MH', '692', 1),
(134, 'Martinique', 'MQ', '596', 1),
(135, 'Mauritania', 'MR', '222', 1),
(136, 'Mauritius', 'MU', '230', 1),
(137, 'Mayotte', 'YT', '262', 1),
(138, 'Mexico', 'MX', '52', 1),
(139, 'Micronesia, Federated States of', 'FM', '691', 1),
(140, 'Moldova', 'MD', '373', 1),
(141, 'Monaco', 'MC', '377', 1),
(142, 'Mongolia', 'MN', '976', 1),
(143, 'Montserrat', 'MS', '1-664', 1),
(144, 'Morocco', 'MA', '212', 1),
(145, 'Mozambique', 'MZ', '258', 1),
(146, 'Myanmar', 'MM', '95', 1),
(147, 'Namibia', 'NA', '264', 1),
(148, 'Nauru', 'NR', '674', 1),
(149, 'Nepal', 'NP', '977', 1),
(150, 'Netherlands', 'NL', '31', 1),
(151, 'Netherlands Antilles', 'AN', '599', 1),
(152, 'New Caledonia', 'NC', '687	', 1),
(153, 'New Zealand', 'NZ', '64', 1),
(154, 'Nicaragua', 'NI', '505', 1),
(155, 'Niger', 'NE', '227', 1),
(156, 'Nigeria', 'NG', '234', 1),
(157, 'Niue', 'NU', '683', 1),
(158, 'Norfolk Island', 'NF', '672', 1),
(159, 'Northern Mariana Islands', 'MP', '1-670', 1),
(160, 'Norway', 'NO', '47', 1),
(161, 'Oman', 'OM', '968', 1),
(162, 'Pakistan', 'PK', '92', 1),
(163, 'Palau', 'PW', '680', 1),
(164, 'Panama', 'PA', '507', 1),
(165, 'Papua New Guinea', 'PG', '675', 1),
(166, 'Paraguay', 'PY', '595', 1),
(167, 'Peru', 'PE', '51', 1),
(168, 'Philippines', 'PH', '63', 1),
(169, 'Pitcairn', 'PN', '64', 1),
(170, 'Poland', 'PL', '48', 1),
(171, 'Portugal', 'PT', '351', 1),
(172, 'Puerto Rico', 'PR', '1-787', 1),
(173, 'Qatar', 'QA', '974', 1),
(174, 'Reunion', 'RE', '262', 1),
(175, 'Romania', 'RO', '40', 1),
(176, 'Russian Federation', 'RU', '7', 1),
(177, 'Rwanda', 'RW', '250', 1),
(178, 'Saint Kitts and Nevis', 'KN', '1-869', 1),
(179, 'Saint Lucia', 'LC', '1-758', 1),
(180, 'Saint Vincent and the Grenadines', 'VC', '1-784', 1),
(181, 'Samoa', 'WS', '685', 1),
(182, 'San Marino', 'SM', '378', 1),
(183, 'Sao Tome and Principe', 'ST', '239', 1),
(184, 'Saudi Arabia', 'SA', '966', 1),
(185, 'Senegal', 'SN', '221', 1),
(186, 'Seychelles', 'SC', '248', 1),
(187, 'Sierra Leone', 'SL', '232', 1),
(188, 'Singapore', 'SG', '65', 1),
(189, 'Slovakia (Slovak Republic)', 'SK', '421', 1),
(190, 'Slovenia', 'SI', '386', 1),
(191, 'Solomon Islands', 'SB', '677', 1),
(192, 'Somalia', 'SO', '252', 1),
(193, 'South Africa', 'ZA', '27', 1),
(194, 'South Georgia and the South Sandwich Islands', 'GS', '500', 1),
(195, 'Spain', 'ES', '34', 1),
(196, 'Sri Lanka', 'LK', '94', 1),
(197, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '290', 1),
(198, 'St. Pierre and Miquelon', 'PM', '508', 1),
(199, 'Sudan', 'SD', '249', 1),
(200, 'Suriname', 'SR', '597', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', '47', 1),
(202, 'Swaziland', 'SZ', '268', 1),
(203, 'Sweden', 'SE', '46', 1),
(204, 'Switzerland', 'CH', '41', 1),
(205, 'Syrian Arab Republic', 'SY', '963', 1),
(206, 'Taiwan', 'TW', '886', 1),
(207, 'Tajikistan', 'TJ', '992', 1),
(208, 'Tanzania, United Republic of', 'TZ', '255', 1),
(209, 'Thailand', 'TH', '66', 1),
(210, 'Togo', 'TG', '228', 1),
(211, 'Tokelau', 'TK', '690', 1),
(212, 'Tonga', 'TO', '676', 1),
(213, 'Trinidad and Tobago', 'TT', '1-868', 1),
(214, 'Tunisia', 'TN', '216', 1),
(215, 'Turkey', 'TR', '90', 1),
(216, 'Turkmenistan', 'TM', '993', 1),
(217, 'Turks and Caicos Islands', 'TC', '1-649', 1),
(218, 'Tuvalu', 'TV', '688', 1),
(219, 'Uganda', 'UG', '256', 1),
(220, 'Ukraine', 'UA', '380', 1),
(221, 'United Arab Emirates', 'AE', '971', 1),
(222, 'United Kingdom', 'GB', '44', 1),
(223, 'United States', 'US', '1', 1),
(224, 'United States Minor Outlying Islands', 'UM', '246', 1),
(225, 'Uruguay', 'UY', '598', 1),
(226, 'Uzbekistan', 'UZ', '998', 1),
(227, 'Vanuatu', 'VU', '678', 1),
(228, 'Vatican City State (Holy See)', 'VA', '379', 1),
(229, 'Venezuela', 'VE', '58', 1),
(230, 'Vietnam', 'VN', '84', 1),
(231, 'Virgin Islands (British)', 'VG', '1-284', 1),
(232, 'Virgin Islands (U.S.)', 'VI', '1-340', 1),
(233, 'Wallis and Futuna Islands', 'WF', '681', 1),
(234, 'Western Sahara', 'EH', '212', 1),
(235, 'Yemen', 'YE', '967', 1),
(236, 'Serbia', 'RS', '381', 1),
(238, 'Zambia', 'ZM', '260', 1),
(239, 'Zimbabwe', 'ZW', '263', 1),
(240, 'Aaland Islands', 'AX', '358', 1),
(241, 'Palestine', 'PS', '970', 1),
(242, 'Montenegro', 'ME', '382', 1),
(243, 'Guernsey', 'GG', '44-1481', 1),
(244, 'Isle of Man', 'IM', '44-1624', 1),
(245, 'Jersey', 'JE', '44-1534', 1),
(247, 'Curaçao', 'CW', '599', 1),
(248, 'Ivory Coast', 'CI', '225', 1),
(249, 'Kosovo', 'XK', '383', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_content`
--

CREATE TABLE `tbl_home_content` (
  `id` int(2) NOT NULL,
  `bg_video` varchar(150) NOT NULL,
  `about_title` varchar(255) DEFAULT NULL,
  `about_details` text DEFAULT NULL,
  `about_image` varchar(200) DEFAULT NULL,
  `sec5_title` varchar(255) DEFAULT NULL,
  `sec5_description` text DEFAULT NULL,
  `sec6_title` varchar(255) DEFAULT NULL,
  `sec6_description` text DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_home_content`
--

INSERT INTO `tbl_home_content` (`id`, `bg_video`, `about_title`, `about_details`, `about_image`, `sec5_title`, `sec5_description`, `sec6_title`, `sec6_description`, `update_at`) VALUES
(1, 'home-video-C7iXArTG.mp4', 'Be First to Own Devil’s Juice', '<p class=\"w-50 mx-auto\">Only 5,000 bottles will ever exist. Each one comes in an exclusive novelty gift box &mdash; crafted for collectors, thrill-seekers, and those who live bold.</p>\r\n<p class=\"weight-600 mt-4\">$50 &mdash; includes the limited-edition gift box</p>', 'about-oG6imASB.webp', 'The Devil’s Hour', 'Where the night slows, and the fire rises. A moment to unwind, indulge, and taste the luxury of rebellion — one pour at a time.', 'Speak to the Guardians of the Devil’s Pour', 'Got a question, a spark of an idea, or something you want to raise with the Devil’s Juice crew? Send us a message — the fire is always burning, and we’re here to answer.', '2026-01-12 09:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `m_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `address` varchar(400) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`m_id`, `name`, `email`, `password`, `ip_address`, `phone`, `image`, `privilege_id`, `address`, `status`, `created`, `updated`) VALUES
(1, 'raj guddu', 'test152@yopmail.com', '$2y$12$hL6WvFlWcJCAF4dN9wGNdObJSqsqaLdReMdh5uapOdv3853kACHFq', '::1', '1234567890', '', 0, '', 1, '2025-11-01 09:36:36', '2025-12-26 11:42:30'),
(2, 'raj guddu', 'raj1@yopmail.com', '$2y$12$zwpsaO2ALvwK9uYlAlYNAerOoQGRuz4i6xcfxu94hvGoJJkYeanNS', '::1', '1234567890', '', 0, '', 1, '2025-11-01 09:39:52', '2025-11-02 13:11:44'),
(3, 'md raj guddu', 'test153@yopmail.com', '$2y$12$BuSUyWU/B3Nx8ICSSJc.3u/8nPBgZ5FrQqd9Y35HVawKWsLxUB7te', '::1', '1234567890', '', 0, '', 1, '2025-12-26 12:39:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_address`
--

CREATE TABLE `tbl_member_address` (
  `add_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `code` varchar(5) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `landmark` text NOT NULL,
  `alt_code` varchar(5) NOT NULL,
  `alt_phone` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_member_address`
--

INSERT INTO `tbl_member_address` (`add_id`, `m_id`, `name`, `last_name`, `email`, `code`, `phone`, `city`, `state`, `zipcode`, `address`, `landmark`, `alt_code`, `alt_phone`, `status`, `added_at`, `update_at`) VALUES
(1, 1, 'john', 'doe', 'john@yopmail.com', '+1', '1234567890', 'delhi', 'delhi', '870365', 'ashok nagar delhi', '', '+1', '', 1, '2026-02-04 05:44:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0-Inactive 1-Active',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `page_name`, `status`, `added_on`, `updated_on`) VALUES
(1, 'Home ', '1', '2021-07-22 16:51:33', '2021-07-22 12:20:22'),
(3, 'Cocktail-Club', '1', '2021-07-22 17:51:01', '0000-00-00 00:00:00'),
(4, 'The Story', '1', '2021-07-22 17:51:18', '0000-00-00 00:00:00'),
(5, 'Cocktail', '1', '2025-10-23 06:20:54', '2025-10-23 11:50:41'),
(6, 'Cocktail-Detail', '1', '2025-10-23 06:20:54', '2025-10-23 11:50:41'),
(7, 'Our-Vodka', '1', '2025-10-23 06:20:54', '2025-10-23 11:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_transaction`
--

CREATE TABLE `tbl_payment_transaction` (
  `pt_id` int(11) NOT NULL,
  `pay_from` varchar(50) NOT NULL COMMENT 'product',
  `order_id` varchar(50) NOT NULL COMMENT 'tbl_product_order.order_id',
  `paid_amount` int(11) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `paymentIntentId` varchar(100) NOT NULL,
  `txnId` varchar(100) NOT NULL,
  `added_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment_transaction`
--

INSERT INTO `tbl_payment_transaction` (`pt_id`, `pay_from`, `order_id`, `paid_amount`, `payment_mode`, `payment_status`, `paymentIntentId`, `txnId`, `added_at`) VALUES
(1, 'Product', 'OD17678508744629', 200, 'Paypal', 'COMPLETED', '', '19F815734T817850X', '2026-01-08 05:42:49'),
(2, 'Product', 'OD17680277417447', 150, 'Paypal', 'COMPLETED', '', '4B803338N27881010', '2026-01-10 06:50:28'),
(3, 'Product', 'OD17682008806805', 100, 'Paypal', 'COMPLETED', '', '73W65198LL8102749', '2026-01-12 06:55:42'),
(4, 'Product', 'OD17695064421102', 590, 'Paypal', 'COMPLETED', '', '6VM546385G867431W', '2026-01-27 09:34:23'),
(5, 'Product', 'OD17695065912776', 100, 'Paypal', 'COMPLETED', '', '7G563824C86804802', '2026-01-27 09:36:44'),
(6, 'Product', 'OD17695067148830', 100, 'Paypal', 'COMPLETED', '', '0WT69792AR3291947', '2026-01-27 09:38:46'),
(7, 'Product', 'OD17701855852708', 50, 'Paypal', 'COMPLETED', '', '9R5292019K878542A', '2026-02-04 06:13:05'),
(8, 'Product', 'OD17701860477262', 50, 'Paypal', 'COMPLETED', '', '31U92347SN632002W', '2026-02-04 06:20:47'),
(9, 'Product', 'OD17703736958934', 50, 'Paypal', 'COMPLETED', '', '02K43816XC9217135', '2026-02-06 10:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(2) NOT NULL,
  `cat_id` int(2) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `pro_url` varchar(255) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `image4` varchar(100) NOT NULL,
  `image5` varchar(150) NOT NULL,
  `alt1` varchar(100) NOT NULL,
  `alt2` varchar(100) NOT NULL,
  `alt3` varchar(100) NOT NULL,
  `alt4` varchar(100) NOT NULL,
  `alt5` varchar(100) NOT NULL,
  `imgTitle1` varchar(100) NOT NULL,
  `imgTitle2` varchar(100) NOT NULL,
  `imgTitle3` varchar(100) NOT NULL,
  `imgTitle4` varchar(100) NOT NULL,
  `imgTitle5` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `description` text NOT NULL,
  `additional_info` text NOT NULL,
  `sp` decimal(15,2) NOT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `show_front` int(2) NOT NULL,
  `is_comming` int(11) DEFAULT NULL,
  `activeTab` int(2) NOT NULL,
  `added_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `cat_id`, `pro_name`, `sub_title`, `pro_url`, `image1`, `image2`, `image3`, `image4`, `image5`, `alt1`, `alt2`, `alt3`, `alt4`, `alt5`, `imgTitle1`, `imgTitle2`, `imgTitle3`, `imgTitle4`, `imgTitle5`, `details`, `description`, `additional_info`, `sp`, `discount`, `stock`, `status`, `show_front`, `is_comming`, `activeTab`, `added_at`, `update_at`) VALUES
(2, 0, 'Devil’s Juice Vodka2', 'Smooth as sin, born of fire, made to tempt.', 'devils-juice-vodka', 'proImage1-Q76cs4mq.webp', 'proimage2-XVlCSbsb.webp', 'proimage3-3IIn4fwY.webp', 'proimage4-eJUZSMoQ.webp', 'proimage5-onPiu9Yr.webp', 'devils-juice-vodka', 'devils-juice-vodka', 'devils-juice-vodka', 'devils-juice-vodka', 'devils-juice-vodka', 'devils-juice-vodka', 'devils-juice-vodka', 'devils-juice-vodka', 'devils-juice-vodka', 'devils-juice-vodka', '<p class=\"\">This first release of 5,000 bottles marks the beginning of the Devil&rsquo;s Juice legacy. Each bottle is crafted for collectors and fans who want to own a piece of the brand&rsquo;s story.</p>\r\n<p class=\"product-desc\">Packaged in a premium gift box, this novelty edition is priced at $50 and available exclusively for pre-order.</p>\r\n<ul class=\"product-features\">\r\n<li>Only 5,000 bottles available.</li>\r\n<li>Includes collector&rsquo;s gift box.</li>\r\n<li>$50 each &mdash; pre-order special pricing.</li>\r\n<li>Ships once the first batch is bottled and approved.</li>\r\n</ul>', '<h5 class=\"weight-700 mb-3\">Born of fire, crafted in darkness.</h5>\r\n<p>Devil&rsquo;s Juice Vodka is a bold expression of purity and power &mdash; distilled to perfection for those who dare to taste beyond the ordinary. Each bottle of Devil&rsquo;s Barrel captures the spirit of rebellion, blending meticulous craftsmanship with an untamed edge.</p>\r\n<p>From its crystal-clear smoothness to its devilishly refined finish, this limited-edition release embodies temptation in its purest form. Enclosed in a striking collector&rsquo;s box, it&rsquo;s not just vodka &mdash; it&rsquo;s a symbol of indulgence, rebellion, and refined taste.</p>\r\n<h6 class=\"mt-4 weight-700 mb-3\">Tasting Notes:</h6>\r\n<p>Smooth entry with subtle heat. Hints of grain sweetness balanced by a clean, lingering finish.</p>\r\n<h6 class=\"mt-4 weight-700 mb-3\">Perfect For:</h6>\r\n<p>Neat pours, bold cocktails, or as a centerpiece in any premium spirits collection.</p>', '<p>&bull; Bottle Volume: 750ml</p>\r\n<p>&bull; Alcohol: 40%</p>\r\n<p>&bull; Packaging: Premium collector&rsquo;s gift box</p>\r\n<p>&bull; Edition: Limited to 5,000 units</p>', 49.99, NULL, 0, 1, 1, NULL, 3, '2025-12-23 02:44:10', '2026-01-22 10:22:11'),
(3, 0, 'Devil’s Juice Vodka3', 'Smooth as sin, born of fire, made to tempt.', 'devils-juice-vodkaa', 'proImage1-TT8gr2T5.webp', 'proimage2-4iDcpEPd.webp', 'proimage3-wBc1ksYA.webp', 'proimage4-gKQnPs91.webp', 'proimage5-vJ5IrZDf.webp', '', '', '', '', '', '', '', '', '', '', '<p class=\"\">This first release of 5,000 bottles marks the beginning of the Devil&rsquo;s Juice legacy. Each bottle is crafted for collectors and fans who want to own a piece of the brand&rsquo;s story.</p>\r\n<p class=\"product-desc\">Packaged in a premium gift box, this novelty edition is priced at $50 and available exclusively for pre-order.</p>\r\n<ul class=\"product-features\">\r\n<li>Only 5,000 bottles available.</li>\r\n<li>Includes collector&rsquo;s gift box.</li>\r\n<li>$50 each &mdash; pre-order special pricing.</li>\r\n<li>Ships once the first batch is bottled and approved.</li>\r\n</ul>', '<h5 class=\"weight-700 mb-3\">Born of fire, crafted in darkness.</h5>\r\n<p>Devil&rsquo;s Juice Vodka is a bold expression of purity and power &mdash; distilled to perfection for those who dare to taste beyond the ordinary. Each bottle of Devil&rsquo;s Barrel captures the spirit of rebellion, blending meticulous craftsmanship with an untamed edge.</p>\r\n<p>From its crystal-clear smoothness to its devilishly refined finish, this limited-edition release embodies temptation in its purest form. Enclosed in a striking collector&rsquo;s box, it&rsquo;s not just vodka &mdash; it&rsquo;s a symbol of indulgence, rebellion, and refined taste.</p>\r\n<h6 class=\"mt-4 weight-700 mb-3\">Tasting Notes:</h6>\r\n<p>Smooth entry with subtle heat. Hints of grain sweetness balanced by a clean, lingering finish.</p>\r\n<h6 class=\"mt-4 weight-700 mb-3\">Perfect For:</h6>\r\n<p>Neat pours, bold cocktails, or as a centerpiece in any premium spirits collection.</p>', '<p>&bull; Bottle Volume: 750ml</p>\r\n<p>&bull; Alcohol: 40%</p>\r\n<p>&bull; Packaging: Premium collector&rsquo;s gift box</p>\r\n<p>&bull; Edition: Limited to 5,000 units</p>', 49.99, NULL, 1, 1, 1, NULL, 3, '2025-12-23 02:53:48', '2026-02-09 09:10:47'),
(4, 0, 'Devil’s Juice Vodka4', 'Smooth as sin, born of fire, made to tempt.', 'devils-juice--vodka', 'proImage1-nJ4Q8aAJ.webp', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '<p class=\"\">This first release of 5,000 bottles marks the beginning of the Devil&rsquo;s Juice legacy. Each bottle is crafted for collectors and fans who want to own a piece of the brand&rsquo;s story.</p>\r\n<p class=\"product-desc\">Packaged in a premium gift box, this novelty edition is priced at $50 and available exclusively for pre-order.</p>\r\n<ul class=\"product-features\">\r\n<li>Only 5,000 bottles available.</li>\r\n<li>Includes collector&rsquo;s gift box.</li>\r\n<li>$50 each &mdash; pre-order special pricing.</li>\r\n<li>Ships once the first batch is bottled and approved.</li>\r\n</ul>', '<h5 class=\"weight-700 mb-3\">Born of fire, crafted in darkness.</h5>\r\n<p>Devil&rsquo;s Juice Vodka is a bold expression of purity and power &mdash; distilled to perfection for those who dare to taste beyond the ordinary. Each bottle of Devil&rsquo;s Barrel captures the spirit of rebellion, blending meticulous craftsmanship with an untamed edge.</p>\r\n<p>From its crystal-clear smoothness to its devilishly refined finish, this limited-edition release embodies temptation in its purest form. Enclosed in a striking collector&rsquo;s box, it&rsquo;s not just vodka &mdash; it&rsquo;s a symbol of indulgence, rebellion, and refined taste.</p>\r\n<h6 class=\"mt-4 weight-700 mb-3\">Tasting Notes:</h6>\r\n<p>Smooth entry with subtle heat. Hints of grain sweetness balanced by a clean, lingering finish.</p>\r\n<h6 class=\"mt-4 weight-700 mb-3\">Perfect For:</h6>\r\n<p>Neat pours, bold cocktails, or as a centerpiece in any premium spirits collection.</p>', '<p>&bull; Bottle Volume: 750ml</p>\r\n<p>&bull; Alcohol: 40%</p>\r\n<p>&bull; Packaging: Premium collector&rsquo;s gift box</p>\r\n<p>&bull; Edition: Limited to 5,000 units</p>', 269.99, 'Save $30 when you buy by the case', 5, 1, 1, NULL, 3, '2025-12-23 06:52:00', '2026-02-09 09:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_order`
--

CREATE TABLE `tbl_product_order` (
  `id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `add_id` int(11) NOT NULL,
  `product_details` text NOT NULL,
  `total_qty` int(11) NOT NULL,
  `net_total` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-pre-order/reserved, 2-payment requested, 3-paid, 4-shipped, 5-delivered(completed), 6-pre-order canceled',
  `payment_token` varchar(255) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `paypal_order_id` varchar(100) NOT NULL,
  `payment_details` text NOT NULL,
  `cancel_reason` text NOT NULL,
  `orderdate` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_order`
--

INSERT INTO `tbl_product_order` (`id`, `m_id`, `order_id`, `add_id`, `product_details`, `total_qty`, `net_total`, `status`, `payment_token`, `payment_mode`, `payment_status`, `paypal_order_id`, `payment_details`, `cancel_reason`, `orderdate`, `update_at`) VALUES
(1, 1, 'OD17701855852708', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":4,\"image\":\"proImage1-TT8gr2T5.webp\"}}]', 1, '49.99', 6, '', 'Paypal', 'COMPLETED', '', '9R5292019K878542A', '', '2026-02-04 06:13:05', '0000-00-00 00:00:00'),
(2, 1, 'OD17701860477262', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":1,\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":3,\"image\":\"proImage1-TT8gr2T5.webp\"}}]', 1, '49.99', 6, '', 'Paypal', 'COMPLETED', '', '31U92347SN632002W', '', '2026-02-04 06:20:47', '0000-00-00 00:00:00'),
(3, 1, 'OD17703736958934', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":2,\"image\":\"proImage1-TT8gr2T5.webp\"}}]', 1, '49.99', 6, '', 'Paypal', 'COMPLETED', '', '02K43816XC9217135', '', '2026-02-06 10:28:15', '0000-00-00 00:00:00'),
(4, 1, 'OD17706317649035', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}}]', 2, '99.98', 6, '', '', '', '', '', '', '2026-02-09 10:09:24', '0000-00-00 00:00:00'),
(5, 1, 'OD17706320276280', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}}]', 1, '49.99', 4, '', '', '', '', '', '', '2026-02-09 10:13:47', '0000-00-00 00:00:00'),
(6, 1, 'OD17706327164385', 1, '[{\"id\":4,\"name\":\"Devil\\u2019s Juice Vodka4\",\"price\":269.99,\"quantity\":\"1\",\"subtotal\":269.99,\"attributes\":{\"pro_id\":\"4\",\"stock\":5,\"image\":\"proImage1-nJ4Q8aAJ.webp\"}},{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}}]', 3, '369.97', 4, '', '', '', '', '', '', '2026-02-09 10:25:16', '0000-00-00 00:00:00'),
(7, 1, 'OD17707083389471', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}},{\"id\":4,\"name\":\"Devil\\u2019s Juice Vodka4\",\"price\":269.99,\"quantity\":\"1\",\"subtotal\":269.99,\"attributes\":{\"pro_id\":\"4\",\"stock\":5,\"image\":\"proImage1-nJ4Q8aAJ.webp\"}}]', 3, '369.97', 4, '', '', '', '', '', '', '2026-02-10 07:25:38', '2026-02-11 06:14:43'),
(8, 1, 'OD17707142007728', 1, '[{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}},{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":2,\"subtotal\":99.98,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}}]', 3, '149.97', 5, '', '', '', '', '', '', '2026-02-10 09:03:20', '2026-02-20 05:14:59'),
(9, 1, 'OD17707142956898', 1, '[{\"id\":4,\"name\":\"Devil\\u2019s Juice Vodka4\",\"price\":269.99,\"quantity\":\"1\",\"subtotal\":269.99,\"attributes\":{\"pro_id\":\"4\",\"stock\":5,\"image\":\"proImage1-nJ4Q8aAJ.webp\"}},{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}}]', 2, '319.98', 5, '', '', '', '', '', '', '2026-02-10 09:04:55', '2026-02-20 05:04:57'),
(10, 1, 'OD17707151599905', 1, '[{\"id\":4,\"name\":\"Devil\\u2019s Juice Vodka4\",\"price\":269.99,\"quantity\":\"1\",\"subtotal\":269.99,\"attributes\":{\"pro_id\":\"4\",\"stock\":5,\"image\":\"proImage1-nJ4Q8aAJ.webp\"}}]', 1, '269.99', 6, 'dMCgv7QR8JY3AkQTlsHGN4jkN06o6PijCeZt0W9b', 'Paypal', 'COMPLETED', '31277992EM598024D', '{\"id\":\"31277992EM598024D\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"test152@yopmail.com\",\"account_id\":\"LT7HHBN6E6BT6\",\"account_status\":\"UNVERIFIED\",\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"10\",\"shipping\":{\"name\":{\"full_name\":\"john doe\"},\"address\":{\"address_line_1\":\"san jose\",\"admin_area_2\":\"san jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"56Y04424AF3008636\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"269.99\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"269.99\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"9.91\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"260.08\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/56Y04424AF3008636\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/56Y04424AF3008636\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/31277992EM598024D\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2026-02-16T06:57:46Z\",\"update_time\":\"2026-02-16T06:57:46Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"email_address\":\"test152@yopmail.com\",\"payer_id\":\"LT7HHBN6E6BT6\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/31277992EM598024D\",\"rel\":\"self\",\"method\":\"GET\"}]}', '', '2026-02-10 09:19:19', '2026-02-16 07:25:39'),
(11, 1, 'OD17714843179152', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}}]', 2, '99.98', 6, '', '', '', '', '', 'test', '2026-02-19 06:58:37', '2026-02-20 05:17:21'),
(12, 1, 'OD17714855009077', 1, '[{\"id\":4,\"name\":\"Devil\\u2019s Juice Vodka4\",\"price\":269.99,\"quantity\":\"1\",\"subtotal\":269.99,\"attributes\":{\"pro_id\":\"4\",\"stock\":5,\"image\":\"proImage1-nJ4Q8aAJ.webp\"}},{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":2,\"subtotal\":99.98,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}}]', 3, '369.97', 6, '', '', '', '', '', 't', '2026-02-19 07:18:20', '2026-02-20 04:49:04'),
(13, 1, 'OD17714857353770', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":2,\"subtotal\":99.98,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}}]', 3, '149.97', 6, '', '', '', '', '', 'test', '2026-02-19 07:22:15', '2026-02-20 04:46:11'),
(14, 1, 'OD17714858775860', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}}]', 2, '99.98', 2, 'FudKC17HblgPdzSbc36lm2THLHSATxQbFe1XIgSa', '', '', '3V876267LF984211H', '', '', '2026-02-19 07:24:37', '2026-02-19 09:44:07'),
(15, 1, 'OD17714860489807', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}}]', 2, '99.98', 4, '27jF10whACndxOP0rYvSHpHKtetbkNAxQEVFfbzj', 'Paypal', 'COMPLETED', '8MC717698K623843S', '{\"id\":\"8MC717698K623843S\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"raj@yopmail.com\",\"account_id\":\"JZRLRXZ52JXRQ\",\"account_status\":\"UNVERIFIED\",\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"15\",\"shipping\":{\"name\":{\"full_name\":\"john doe\"},\"address\":{\"address_line_1\":\"san jose\",\"admin_area_2\":\"san jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"5UH9625967798440P\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"99.98\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"99.98\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"3.98\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"96.00\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/5UH9625967798440P\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/5UH9625967798440P\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/8MC717698K623843S\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2026-02-19T09:42:53Z\",\"update_time\":\"2026-02-19T09:42:53Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"email_address\":\"raj@yopmail.com\",\"payer_id\":\"JZRLRXZ52JXRQ\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/8MC717698K623843S\",\"rel\":\"self\",\"method\":\"GET\"}]}', '', '2026-02-19 07:27:28', '2026-02-20 05:19:51'),
(16, 1, 'OD17714864356243', 1, '[{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":2,\"subtotal\":99.98,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":2,\"subtotal\":99.98,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}}]', 4, '199.96', 3, '774jtb3xP8k9wj7bSg4tOuHgWD7sUwgC4Pp7Kg5m', 'Paypal', 'COMPLETED', '8VE810794N406962A', '{\"id\":\"8VE810794N406962A\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"raj@yopmail.com\",\"account_id\":\"BUSJF6PHVS4FE\",\"account_status\":\"UNVERIFIED\",\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"16\",\"shipping\":{\"name\":{\"full_name\":\"john doe\"},\"address\":{\"address_line_1\":\"san jose\",\"admin_area_2\":\"san jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"78F96356RC0175101\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"199.96\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"199.96\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"7.47\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"192.49\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/78F96356RC0175101\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/78F96356RC0175101\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/8VE810794N406962A\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2026-02-19T09:37:21Z\",\"update_time\":\"2026-02-19T09:37:21Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"email_address\":\"raj@yopmail.com\",\"payer_id\":\"BUSJF6PHVS4FE\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/8VE810794N406962A\",\"rel\":\"self\",\"method\":\"GET\"}]}', '', '2026-02-19 07:33:55', '2026-02-19 09:36:07'),
(17, 1, 'OD17714868446252', 1, '[{\"id\":4,\"name\":\"Devil\\u2019s Juice Vodka4\",\"price\":269.99,\"quantity\":\"2\",\"subtotal\":539.98,\"attributes\":{\"pro_id\":\"4\",\"stock\":5,\"image\":\"proImage1-nJ4Q8aAJ.webp\"}},{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}}]', 4, '639.96', 4, 'RPuIRNQFelSushO08IXiHg1mPnb0BRQyrt05UEjV', 'Paypal', 'COMPLETED', '3T8520403D482103U', '{\"id\":\"3T8520403D482103U\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"test152@yopmail.com\",\"account_id\":\"H2EXXYC3UMJYN\",\"account_status\":\"UNVERIFIED\",\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"17\",\"shipping\":{\"name\":{\"full_name\":\"john doe\"},\"address\":{\"address_line_1\":\"san jose\",\"admin_area_2\":\"san jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"0RE72490XF402903A\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"639.96\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"639.96\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"22.82\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"617.14\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/0RE72490XF402903A\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/0RE72490XF402903A\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/3T8520403D482103U\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2026-02-19T09:32:13Z\",\"update_time\":\"2026-02-19T09:32:13Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"john\",\"surname\":\"doe\"},\"email_address\":\"test152@yopmail.com\",\"payer_id\":\"H2EXXYC3UMJYN\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/3T8520403D482103U\",\"rel\":\"self\",\"method\":\"GET\"}]}', '', '2026-02-19 07:40:44', '2026-02-20 05:18:39'),
(18, 1, 'OD17714869263179', 1, '[{\"id\":4,\"name\":\"Devil\\u2019s Juice Vodka4\",\"price\":269.99,\"quantity\":\"1\",\"subtotal\":269.99,\"attributes\":{\"pro_id\":\"4\",\"stock\":5,\"image\":\"proImage1-nJ4Q8aAJ.webp\"}},{\"id\":3,\"name\":\"Devil\\u2019s Juice Vodka3\",\"price\":49.99,\"quantity\":\"1\",\"subtotal\":49.99,\"attributes\":{\"pro_id\":\"3\",\"stock\":1,\"image\":\"proImage1-TT8gr2T5.webp\"}},{\"id\":2,\"name\":\"Devil\\u2019s Juice Vodka2\",\"price\":49.99,\"quantity\":2,\"subtotal\":99.98,\"attributes\":{\"pro_id\":\"2\",\"stock\":0,\"image\":\"proImage1-Q76cs4mq.webp\"}}]', 4, '419.96', 6, '', '', '', '', '', 'i will order latter', '2026-02-19 07:42:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_order_temp`
--

CREATE TABLE `tbl_product_order_temp` (
  `temp_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `add_id` int(11) NOT NULL,
  `product_details` text NOT NULL,
  `total_qty` int(11) NOT NULL,
  `net_total` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-order place, 2-shipped, 3-delivered, 4-cancel',
  `orderdate` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_order_temp`
--

INSERT INTO `tbl_product_order_temp` (`temp_id`, `m_id`, `order_id`, `add_id`, `product_details`, `total_qty`, `net_total`, `status`, `orderdate`, `update_at`) VALUES
(12, 1, 'OD17695855199021', 1, '[{\"id\":4,\"name\":\"Devil\\u2019s Juice Vodka4\",\"price\":269.99,\"quantity\":\"2\",\"subtotal\":539.98,\"attributes\":{\"pro_id\":\"4\",\"stock\":5,\"image\":\"proImage1-nJ4Q8aAJ.webp\"}}]', 2, '539.98', 1, '2026-01-28 07:32:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `facebook_link` varchar(200) DEFAULT NULL,
  `twitter_link` varchar(200) DEFAULT NULL,
  `google_link` varchar(200) DEFAULT NULL,
  `linkedin_link` varchar(200) DEFAULT NULL,
  `youtube_link` varchar(200) DEFAULT NULL,
  `instagram_link` varchar(200) DEFAULT NULL,
  `tiktok_link` varchar(200) DEFAULT NULL,
  `opening_hours` text DEFAULT NULL,
  `map_address` text DEFAULT NULL,
  `map_direction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `address`, `phone`, `email`, `name`, `website`, `facebook_link`, `twitter_link`, `google_link`, `linkedin_link`, `youtube_link`, `instagram_link`, `tiktok_link`, `opening_hours`, `map_address`, `map_direction`) VALUES
(1, '123 Inferno Street, Ember District, Nightfall City, 56789', '+911234567890', 'devil@deviljuice.com', 'Devil Juice', 'www.website.com', 'https://www.facebook.com/people/Devils-Juice', 'https://twitter.com/', '', '', 'http://youtube.com/', 'https://www.instagram.com/devils_juice_dj/', 'https://x.com/tiktok_in', 'Monday to Friday, 9 AM – 6 PM (GMT)', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.058097570956!2d-111.9422134!3d40.76074690000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8752f487a3cbaf83%3A0xfaa1b90f0b44d667!2s391%20N%20Orange%20St%20%2304%2C%20Salt%20Lake%20City%2C%20UT%2084104%2C%20USA!5e0!3m2!1sen!2sin!4v1770371639323!5m2!1sen!2sin', 'https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=2074&auto=format&fit=crop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_story_content`
--

CREATE TABLE `tbl_story_content` (
  `id` int(2) NOT NULL,
  `about_title` varchar(255) DEFAULT NULL,
  `about_details` text DEFAULT NULL,
  `bg_video` varchar(200) DEFAULT NULL,
  `sec2_title` varchar(255) DEFAULT NULL,
  `sec2_description` text DEFAULT NULL,
  `sec2_image1` varchar(200) NOT NULL,
  `sec2_image2` varchar(200) NOT NULL,
  `sec3_bg_video` varchar(255) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_story_content`
--

INSERT INTO `tbl_story_content` (`id`, `about_title`, `about_details`, `bg_video`, `sec2_title`, `sec2_description`, `sec2_image1`, `sec2_image2`, `sec3_bg_video`, `update_at`) VALUES
(1, 'Yahan Apna Title Likhein', '<p class=\"mb-3\">Yahan aap apna pehla paragraph likh sakte hain. Example: \"Humari shuruwat wahan se hui jahan sab ruk gaye the.\"</p>\r\n<p class=\"highlight-text\">Yahan dusra paragraph likhein. Apne product ya service ki khaasiyat batayein.</p>\r\n<p class=\"highlight-text\">Yahan teesra paragraph likhein.</p>\r\n<p class=\"punchline\">Yeh last line hai jo thodi bold dikhegi.</p>', 'story-video-yjviYqSb.mp4', 'Born From Obsession', '<p class=\"mb-3\">Every great spirit comes from craft. <br>Ours comes from craft, precision, and a touch of rebellion.</p>\r\n<p class=\"highlight-text\">We didn&rsquo;t chase trends. <br>We perfected a process &mdash; slow, deliberate, relentless &mdash; until the result wassmooth enough to seduce and bold enough to remember.</p>\r\n<p class=\"highlight-text\">The journey wasn&rsquo;t easy. <br>Fire never is. <br>But the outcome? A vodka that stands alone.</p>', 'story-eg1EDzHC.webp', 'story-W2NRSAdb.webp', 'story-video-BbPhFJQC.mp4', '2026-01-10 09:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'King of Town',
  `description` text DEFAULT NULL,
  `status` enum('publish','pending','draft') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_temp`
--

CREATE TABLE `tbl_users_temp` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `country` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(400) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users_temp`
--

INSERT INTO `tbl_users_temp` (`user_id`, `fname`, `mname`, `lname`, `country`, `dob`, `gender`, `email`, `password`, `ip_address`, `phone`, `image`, `address`, `status`, `created`, `updated`) VALUES
(1, 'md', 'raj', 'guddu', 99, '1986-01-02', 'male', 'raj@yopmail.com', '123456', '::1', '9162925142', 'u_1672925916.jpg', 'delhi', 0, '2023-01-05 02:08:36', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_test`
--
ALTER TABLE `paypal_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page` (`page`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blg_id`);

--
-- Indexes for table `tbl_cms`
--
ALTER TABLE `tbl_cms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page` (`page`,`status`);

--
-- Indexes for table `tbl_cocktails`
--
ALTER TABLE `tbl_cocktails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `tbl_cocktail_club`
--
ALTER TABLE `tbl_cocktail_club`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `status` (`status`),
  ADD KEY `is_devil_hour` (`is_devil_hour`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`countries_id`);

--
-- Indexes for table `tbl_home_content`
--
ALTER TABLE `tbl_home_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_image` (`about_image`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `email` (`email`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `tbl_member_address`
--
ALTER TABLE `tbl_member_address`
  ADD PRIMARY KEY (`add_id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `status` (`status`),
  ADD KEY `m_id_2` (`m_id`,`status`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_transaction`
--
ALTER TABLE `tbl_payment_transaction`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `pro_url` (`pro_url`),
  ADD KEY `status` (`status`),
  ADD KEY `show_front` (`show_front`),
  ADD KEY `pro_url_2` (`pro_url`,`status`);

--
-- Indexes for table `tbl_product_order`
--
ALTER TABLE `tbl_product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`,`payment_token`);

--
-- Indexes for table `tbl_product_order_temp`
--
ALTER TABLE `tbl_product_order_temp`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tbl_story_content`
--
ALTER TABLE `tbl_story_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_image` (`bg_video`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tbl_users_temp`
--
ALTER TABLE `tbl_users_temp`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paypal_test`
--
ALTER TABLE `paypal_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cms`
--
ALTER TABLE `tbl_cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cocktails`
--
ALTER TABLE `tbl_cocktails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_cocktail_club`
--
ALTER TABLE `tbl_cocktail_club`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `countries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `tbl_home_content`
--
ALTER TABLE `tbl_home_content`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_member_address`
--
ALTER TABLE `tbl_member_address`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_payment_transaction`
--
ALTER TABLE `tbl_payment_transaction`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product_order`
--
ALTER TABLE `tbl_product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_product_order_temp`
--
ALTER TABLE `tbl_product_order_temp`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_story_content`
--
ALTER TABLE `tbl_story_content`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users_temp`
--
ALTER TABLE `tbl_users_temp`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
