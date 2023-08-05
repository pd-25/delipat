-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 06:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delipat_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2023_07_25_164953_create_services_table', 2),
(17, '2023_07_29_144311_create_service_contents_table', 3),
(18, '2023_07_30_050430_add_fields_to_services', 4),
(19, '2023_08_01_155213_add_fields_to_service_contents', 5),
(21, '2023_08_02_121110_create_site_infos_table', 6),
(22, '2023_08_03_143235_add_fields_to_services', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_slug` varchar(250) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `taken` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL DEFAULT 'service'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_slug`, `service_name`, `status`, `created_at`, `updated_at`, `taken`, `type`) VALUES
(8, 'service-a2', 'Service A2', 1, '2023-08-01 11:15:13', '2023-08-01 11:16:19', 1, 'service'),
(9, 'service-d', 'Service D', 0, '2023-08-01 11:19:14', '2023-08-02 11:04:34', 1, 'service'),
(11, 'sa', 'sa', 1, '2023-08-02 05:00:01', '2023-08-02 05:03:12', 1, 'service'),
(12, 'salseforce-1', 'Salseforce test2', 1, '2023-08-03 09:18:29', '2023-08-03 09:28:11', 0, 'salseforce'),
(13, 'sss', 'sss', 0, '2023-08-03 09:20:02', '2023-08-03 09:35:26', 0, 'salseforce'),
(14, 'sss-2', 'sss', 1, '2023-08-03 09:20:35', '2023-08-03 09:45:26', 1, 'salseforce');

-- --------------------------------------------------------

--
-- Table structure for table `service_contents`
--

CREATE TABLE `service_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_contents`
--

INSERT INTO `service_contents` (`id`, `slug`, `title`, `service_id`, `description`, `image`, `created_at`, `updated_at`, `type`) VALUES
(17, NULL, 'Enim sit rerum verit', 8, 'Debitis dolorem do v', '16909083774908.png', '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'topContent'),
(18, NULL, 'Animi ex totam mole', 8, 'Deserunt non nulla e', '16909083785424.png', '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'middleCardContent'),
(19, NULL, 'Quia aute sed aut as', 8, 'Ullam corporis ullam', '16909083785424.png', '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'middleCardContent'),
(20, NULL, 'Et facilis magni fac', 8, 'Non voluptate ut cum', '16909083785424.png', '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'middleCardContent'),
(21, NULL, 'Magna in dolorem ut', 8, 'Cillum aperiam vel m', '16909083785424.png', '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'middleCardContent'),
(22, NULL, 'Ut tempora in rerum', 8, 'Quia corporis conseq', NULL, '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'middleContentHeader'),
(23, NULL, 'Ducimus quae quos b', 8, 'Dolores cum voluptat', NULL, '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'afterMiddleContentt'),
(24, NULL, 'Ex provident proide', 8, 'Eiusmod velit totam', NULL, '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'afterMiddleContentt'),
(25, NULL, 'Nobis dolore recusan', 8, 'Qui neque in iusto e', NULL, '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'afterMiddleContentt'),
(26, NULL, 'Et saepe deserunt ea', 8, 'Corrupti consectetu', NULL, '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'faqContent'),
(27, NULL, 'Vel aut ut iste fuga', 8, 'Quia quia vel quidem', NULL, '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'faqContent'),
(28, NULL, 'Tempora aute ex quis', 8, 'Corrupti adipisicin', NULL, '2023-08-01 11:16:18', '2023-08-01 11:16:18', 'faqContent'),
(29, NULL, 'Quam quia saepe sapi', 9, 'Asperiores optio ei', '16909087283823.png', '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'topContent'),
(30, NULL, 'Id id vitae itaque q', 9, 'Minus reiciendis quo', '16909087281460.png', '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'middleCardContent'),
(31, NULL, 'Omnis saepe aliqua', 9, 'Expedita dolore enim', '16909087283955.png', '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'middleCardContent'),
(32, NULL, 'Rem ipsum commodo iu', 9, 'Voluptatem similique', '16909087284420.png', '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'middleCardContent'),
(33, NULL, 'Veritatis eveniet i', 9, 'Dolorem consectetur', NULL, '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'middleContentHeader'),
(34, NULL, 'Et in debitis vel eu', 9, 'Corporis amet quo a', NULL, '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'afterMiddleContentt'),
(35, NULL, 'Officiis sint id des', 9, 'Et nihil omnis paria', NULL, '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'afterMiddleContentt'),
(36, NULL, 'Nulla officia dignis', 9, 'Dolor occaecat ea ma', NULL, '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'afterMiddleContentt'),
(37, NULL, 'Odio aliquip aut hic', 9, 'Id velit aut illo i', NULL, '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'faqContent'),
(38, NULL, 'Et non excepturi do', 9, 'Irure rerum quidem a', NULL, '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'faqContent'),
(39, NULL, 'Sit excepteur labor', 9, 'Est qui qui et numqu', NULL, '2023-08-01 11:22:08', '2023-08-01 11:22:08', 'faqContent'),
(45, NULL, 'Test title TOp', 11, 'THis is test description THis is test description THis is test description THis is test description THis is test description THis is test description\r\nTHis is test description THis is test description\r\nTHis is test description', '16909759486339.PNG', '2023-08-02 05:03:11', '2023-08-02 06:02:28', 'topContent'),
(46, NULL, 'Middle 11', 11, 'THis is test description THis is test description THis is test description THis is test description THis is test description THis is test description\r\nTHis is test description THis is test description\r\nTHis is test description THis is test description THis is test description THis is test description THis is test description THis is test description THis is test description\r\nTHis is test description THis is test description\r\nTHis is test description', '16909761873781.jpg', '2023-08-02 05:03:11', '2023-08-02 06:07:16', 'middleCardContent'),
(47, NULL, 'Middle 2', 11, 'THis is test description THis is test description THis is test description THis is test description THis is test description THis is test description\r\nTHis is test description THis is test description\r\nTHis is test description THis is test description THis is test description THis is test description THis is test description THis is test description THis is test description\r\nTHis is test description THis is test description\r\nTHis is test description', '16909762124519.PNG', '2023-08-02 05:03:11', '2023-08-02 06:06:52', 'middleCardContent'),
(48, NULL, 'Labore sit sed elit', 11, 'Quam beatae aliquid', '16909723917107.png', '2023-08-02 05:03:11', '2023-08-02 05:03:11', 'middleCardContent'),
(49, NULL, 'Fugit et quidem eiu', 11, 'Placeat accusantium', '16909723917107.png', '2023-08-02 05:03:11', '2023-08-02 05:03:11', 'middleCardContent'),
(50, NULL, 'Nemo et et sit quae', 11, 'Lorem et sint ab ali', '16909768663497.PNG', '2023-08-02 05:03:11', '2023-08-02 06:17:46', 'middleCardContent'),
(51, NULL, 'After middle Content header 1', 11, 'After Middle Content After Middle Content After Middle Content After Middle Content', NULL, '2023-08-02 05:03:11', '2023-08-02 10:51:15', 'middleContentHeader'),
(52, NULL, 'COntent1', 11, 'F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Vite.php(273): Illuminate\\\\Foundation\\\\Vite->manifest(\'build\')\r\n#1 F:\\\\xampp\\\\htdocs\\\\delipat\\\\resources\\\\views\\\\layouts\\\\app.blade.php(17): Illuminate\\\\Foundation\\\\Vite->__invoke(Object(Illuminate\\\\Support\\\\Collection))\r\n#2 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(124): require(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\')\r\n#3 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(125): Illuminate\\\\Filesystem\\\\Filesystem::Illuminate\\\\Filesystem\\\\{closure}()\r\n#4 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\PhpEngine.php(58): Illuminate\\\\Filesystem\\\\Filesystem->getRequire(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#5 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\CompilerEngine.php(72): Illuminate\\\\View\\\\Engines\\\\PhpEngine->evaluatePath(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#6 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\View.php(195): Illuminate\\\\View\\\\Engines\\\\CompilerEngine->get(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#7 F:\\\\xampp\\\\htdocs\\\\d\r\nF:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Vite.php(273): Illuminate\\\\Foundation\\\\Vite->manifest(\'build\')\r\n#1 F:\\\\xampp\\\\htdocs\\\\delipat\\\\resources\\\\views\\\\layouts\\\\app.blade.php(17): Illuminate\\\\Foundation\\\\Vite->__invoke(Object(Illuminate\\\\Support\\\\Collection))\r\n#2 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(124): require(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\')\r\n#3 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(125): Illuminate\\\\Filesystem\\\\Filesystem::Illuminate\\\\Filesystem\\\\{closure}()\r\n#4 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\PhpEngine.php(58): Illuminate\\\\Filesystem\\\\Filesystem->getRequire(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#5 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\CompilerEngine.php(72): Illuminate\\\\View\\\\Engines\\\\PhpEngine->evaluatePath(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#6 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\View.php(195): Illuminate\\\\View\\\\Engines\\\\CompilerEngine->get(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#7 F:\\\\xampp\\\\htdocs\\\\d', NULL, '2023-08-02 05:03:11', '2023-08-02 06:11:27', 'afterMiddleContentt'),
(53, NULL, 'Content2', 11, 'F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Vite.php(273): Illuminate\\\\Foundation\\\\Vite->manifest(\'build\')\r\n#1 F:\\\\xampp\\\\htdocs\\\\delipat\\\\resources\\\\views\\\\layouts\\\\app.blade.php(17): Illuminate\\\\Foundation\\\\Vite->__invoke(Object(Illuminate\\\\Support\\\\Collection))\r\n#2 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(124): require(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\')\r\n#3 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(125): Illuminate\\\\Filesystem\\\\Filesystem::Illuminate\\\\Filesystem\\\\{closure}()\r\n#4 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\PhpEngine.php(58): Illuminate\\\\Filesystem\\\\Filesystem->getRequire(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#5 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\CompilerEngine.php(72): Illuminate\\\\View\\\\Engines\\\\PhpEngine->evaluatePath(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#6 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\View.php(195): Illuminate\\\\View\\\\Engines\\\\CompilerEngine->get(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#7 F:\\\\xampp\\\\htdocs\\\\dF:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Vite.php(273): Illuminate\\\\Foundation\\\\Vite->manifest(\'build\')\r\n#1 F:\\\\xampp\\\\htdocs\\\\delipat\\\\resources\\\\views\\\\layouts\\\\app.blade.php(17): Illuminate\\\\Foundation\\\\Vite->__invoke(Object(Illuminate\\\\Support\\\\Collection))\r\n#2 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(124): require(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\')\r\n#3 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(125): Illuminate\\\\Filesystem\\\\Filesystem::Illuminate\\\\Filesystem\\\\{closure}()\r\n#4 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\PhpEngine.php(58): Illuminate\\\\Filesystem\\\\Filesystem->getRequire(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#5 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\CompilerEngine.php(72): Illuminate\\\\View\\\\Engines\\\\PhpEngine->evaluatePath(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#6 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\View.php(195): Illuminate\\\\View\\\\Engines\\\\CompilerEngine->get(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#7 F:\\\\xampp\\\\htdocs\\\\dF:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Vite.php(273): Illuminate\\\\Foundation\\\\Vite->manifest(\'build\')\r\n#1 F:\\\\xampp\\\\htdocs\\\\delipat\\\\resources\\\\views\\\\layouts\\\\app.blade.php(17): Illuminate\\\\Foundation\\\\Vite->__invoke(Object(Illuminate\\\\Support\\\\Collection))\r\n#2 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(124): require(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\')\r\n#3 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Filesystem\\\\Filesystem.php(125): Illuminate\\\\Filesystem\\\\Filesystem::Illuminate\\\\Filesystem\\\\{closure}()\r\n#4 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\PhpEngine.php(58): Illuminate\\\\Filesystem\\\\Filesystem->getRequire(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#5 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\Engines\\\\CompilerEngine.php(72): Illuminate\\\\View\\\\Engines\\\\PhpEngine->evaluatePath(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#6 F:\\\\xampp\\\\htdocs\\\\delipat\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\View.php(195): Illuminate\\\\View\\\\Engines\\\\CompilerEngine->get(\'F:\\\\\\\\xampp\\\\\\\\htdocs...\', Array)\r\n#7 F:\\\\xampp\\\\htdocs\\\\d', NULL, '2023-08-02 05:03:11', '2023-08-02 06:11:46', 'afterMiddleContentt'),
(54, NULL, 'Neque in tempora eos', 11, 'Ex consectetur labo', NULL, '2023-08-02 05:03:11', '2023-08-02 05:03:11', 'afterMiddleContentt'),
(55, NULL, 'Faq12', 11, 'faqContentfaqContentfaqContent', NULL, '2023-08-02 05:03:11', '2023-08-02 06:15:13', 'afterMiddleContentt'),
(56, NULL, 'dfdf', 11, 'sdsdd', NULL, '2023-08-02 05:03:11', '2023-08-02 06:17:20', 'faqContent'),
(57, NULL, 'Iusto est tempore v', 11, 'Rem id obcaecati iru', NULL, '2023-08-02 05:03:11', '2023-08-02 05:03:11', 'faqContent'),
(58, NULL, 'Optio molestiae vel', 11, 'Ut voluptatem Nam et', NULL, '2023-08-02 05:03:12', '2023-08-02 05:03:12', 'faqContent'),
(59, NULL, 'Sit facilis irure eo', 11, 'Veniam laborum labo', NULL, '2023-08-02 05:03:12', '2023-08-02 05:03:12', 'faqContent'),
(60, NULL, 'ddd', 11, 'dddd', NULL, '2023-08-02 05:03:12', '2023-08-02 06:17:04', 'faqContent'),
(61, NULL, 'Maxime architecto ob', 14, 'Quod qui perferendis', '1691075724325.PNG', '2023-08-03 09:45:24', '2023-08-03 09:45:24', 'topContent'),
(62, NULL, 'Quo ut mollit magna', 14, 'Ab aute non omnis qu', '169107572431.PNG', '2023-08-03 09:45:24', '2023-08-03 09:45:24', 'middleCardContent'),
(63, NULL, 'Sed voluptate labori', 14, 'Non culpa in ut eli', '16910758365929.PNG', '2023-08-03 09:45:25', '2023-08-03 09:47:16', 'middleCardContent'),
(64, NULL, 'Excepturi dolore ver', 14, 'Vero aliquam dolorem', '16910757259212.PNG', '2023-08-03 09:45:25', '2023-08-03 09:45:25', 'middleCardContent'),
(65, NULL, 'Culpa deserunt conse', 14, 'Nisi tempore dolor', NULL, '2023-08-03 09:45:25', '2023-08-03 09:45:25', 'middleContentHeader'),
(66, NULL, 'Ipsum reprehenderit', 14, 'Fugiat eum omnis la', NULL, '2023-08-03 09:45:25', '2023-08-03 09:45:25', 'afterMiddleContentt'),
(67, NULL, 'Provident qui simil', 14, 'Et exercitationem of', NULL, '2023-08-03 09:45:25', '2023-08-03 09:45:25', 'afterMiddleContentt'),
(68, NULL, 'Tempora irure accusa', 14, 'Ipsa rem id ration', NULL, '2023-08-03 09:45:25', '2023-08-03 09:45:25', 'afterMiddleContentt'),
(69, NULL, 'Sunt sunt adipisicin', 14, 'Qui ducimus qui ass', NULL, '2023-08-03 09:45:25', '2023-08-03 09:45:25', 'faqContent'),
(70, NULL, 'Quam ab sunt volupta', 14, 'Sint exercitationem', NULL, '2023-08-03 09:45:25', '2023-08-03 09:45:25', 'faqContent'),
(71, NULL, 'Cillum iure dolore p', 14, 'Ad numquam optio mo', NULL, '2023-08-03 09:45:26', '2023-08-03 09:45:26', 'faqContent');

-- --------------------------------------------------------

--
-- Table structure for table `site_infos`
--

CREATE TABLE `site_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `logo_image` varchar(255) DEFAULT NULL,
  `favicon_image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_infos`
--

INSERT INTO `site_infos` (`id`, `slug`, `site_name`, `logo_image`, `favicon_image`, `address`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'delipat-site', NULL, '1690993455173.PNG', '16909913904695.jpg', 'Durgapur, West Bengal, India', 'delipat@mail.com', '3430993232', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `slug`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin-delipat', 'Admin Delipat', 'delipat@mail.com', NULL, '$2y$10$1g1ZtblgjxY1aR2a0EQtTuoVkeEyaEzs1zUT/ykYnmfVwrNqXwfa6', NULL, '2023-07-24 11:29:16', '2023-07-24 11:29:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_service_slug_unique` (`service_slug`);

--
-- Indexes for table `service_contents`
--
ALTER TABLE `service_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_contents_slug_unique` (`slug`);

--
-- Indexes for table `site_infos`
--
ALTER TABLE `site_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_infos_slug_unique` (`slug`),
  ADD UNIQUE KEY `site_infos_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service_contents`
--
ALTER TABLE `service_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `site_infos`
--
ALTER TABLE `site_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
