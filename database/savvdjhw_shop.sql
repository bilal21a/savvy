-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2023 at 11:15 AM
-- Server version: 10.5.20-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savvdjhw_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'muhammad', 'bilal', 'expbilal@gmail.com', NULL, 'sdadsdasd', NULL, NULL),
(2, 'asd', 'ad', 'bilasdl@gmail.com', NULL, 'asdasda', NULL, NULL),
(3, 'asd', 'ad', 'bilasdl@gmail.com', NULL, 'asdasda', NULL, NULL),
(4, 'asd', 'ad', 'bilasdl@gmail.com', NULL, 'asdasda', NULL, NULL),
(5, 'Haseeb', 'Ahsan', 'hasy.ahsan@gmail.com', NULL, 'Please connect for a demo', NULL, NULL),
(6, 'Lucky', 'John', 'lucky.john@gmail.com', NULL, 'Let\'s have a meeting for the demo', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_25_074548_add_column_user_type_and_add_new_user_for_admin_panel_to_users_table', 2),
(6, '2023_03_25_100424_add_column_forget_password_pin_verification_to_users_table', 2),
(7, '2023_03_26_182222_add_columns_pin_verification_time_forget_password_pin_verification_time_to_users_table', 3),
(8, '2023_03_28_184830_add_column_status_to_users_table', 4),
(9, '2023_03_29_194003_create_product_categories_table', 5),
(10, '2023_03_29_205410_create_product_sub_categories_table', 5),
(11, '2023_03_29_214507_create_product_sections_table', 6),
(12, '2023_03_29_221126_create_products_table', 6),
(13, '2023_03_29_221140_create_product_ratings_table', 6),
(14, '2023_03_29_221149_create_product_reviews_table', 6),
(15, '2023_03_29_221157_create_product_colors_table', 6),
(16, '2023_03_29_221218_create_product_wish_lists_table', 6),
(17, '2023_03_29_221233_create_product_images_table', 6),
(18, '2023_03_29_221251_create_product_links_table', 6),
(19, '2023_04_01_144903_add_column_status_to_products_table', 7),
(20, '2023_04_01_154321_add_column_name_to_colors_table', 7),
(21, '2023_04_01_163419_add_column_colors_to_products_table', 7),
(22, '2023_04_01_180520_update_description_column_date_type_in_products_table', 8),
(23, '2023_04_01_185801_add_column_state_to_users_table', 9),
(24, '2023_04_01_202415_add_column_name_to_product_images_table', 10),
(25, '2023_04_02_191142_update_column_data_type_of_gender_in_users_table', 11),
(26, '2023_04_05_201445_add_column_top_item_to_products_and_product_categories_table', 12),
(27, '2023_04_09_174403_create_contact_us_table', 13),
(28, '2023_04_09_195133_add_column_profile_image_to_users_table', 14),
(29, '2023_04_12_141413_add_column_category_image_to_product_categories_table', 15),
(30, '2023_04_18_201126_create_subscriptions_table', 16);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 3, 'IyVvVz80rdMGLiW3FQCSxeAnz5jTssb7GFeo6jt9', 'fddefcd83c2fe4ea7b7141ccc4376118f43707134ca8b1b65955656292581ef2', '[\"*\"]', NULL, NULL, '2023-03-26 23:11:09', '2023-03-26 23:11:09'),
(4, 'App\\Models\\User', 5, 'sAJTXDe3u6Jc1HltqUdBOv0qEeWVYdOvFNEhb9cv', '2885fa0ccf426afbc9b219f39c47bb76b2b41f0eb543b08aff45e136be57cccb', '[\"*\"]', NULL, NULL, '2023-04-01 19:29:24', '2023-04-01 19:29:24'),
(5, 'App\\Models\\User', 5, 'jihySoL4V9Ftcew3nrAaeADub6o6Y5hMOqiMDpZS', '1f1ab884da0fe3480538cef9b90b08f7241ed139cec246d383cacf63d01f9717', '[\"*\"]', NULL, NULL, '2023-04-01 20:54:42', '2023-04-01 20:54:42'),
(6, 'App\\Models\\User', 5, '5COYqWXoMhCLbE3HFBQfypagSijeJgUQb7b6PTY4', '24b7b04df454cd49e90c0772f37a1f70185bfbbe508524a59a572276df3aef5b', '[\"*\"]', NULL, NULL, '2023-04-01 21:42:05', '2023-04-01 21:42:05'),
(7, 'App\\Models\\User', 5, '4MGaacA2rFlTJT4R1mNojIz5ycE6GvFIM0kZJok7', '577b6c15811becc4d0838c61dea3cf7341fab6976a0f2936e1ecd21d7da0df3b', '[\"*\"]', NULL, NULL, '2023-04-01 21:42:15', '2023-04-01 21:42:15'),
(9, 'App\\Models\\User', 7, 'tyvDVtWhaKLBzOb8hOIibeBbBMQ18S9HqhvXgQrz', 'cadbad6f086a757190c090517dc6c3eb9ac3312cbd1aff461890e0ed86416a29', '[\"*\"]', NULL, NULL, '2023-04-01 22:54:10', '2023-04-01 22:54:10'),
(10, 'App\\Models\\User', 8, '7nYGOIRZo0g0Z6u5cSJahbwjCMAQIwPEGiVgTcnD', 'a3d7de92017f72a23bd43a7f96163c210a53da7ce0c577dc67a672e745d4653b', '[\"*\"]', NULL, NULL, '2023-04-01 23:44:51', '2023-04-01 23:44:51'),
(11, 'App\\Models\\User', 9, '7uh1Bvg5Swpgw0zVviObR6gzCXY3JGzha0FGFxoA', 'dc5669c878c0b67b9b30e42b425283c928468761555047a7bad2888f4dfbb885', '[\"*\"]', NULL, NULL, '2023-04-02 00:12:25', '2023-04-02 00:12:25'),
(12, 'App\\Models\\User', 10, 'aDplmc16YM65XwMoUB7Qq4nst2dW0GYK8AqRiKSu', 'a2b7b6d2b7a3e238dbfc8a872db474c6247b06caad628e2adf97dc0bbc254820', '[\"*\"]', NULL, NULL, '2023-04-02 00:25:49', '2023-04-02 00:25:49'),
(13, 'App\\Models\\User', 11, 'aGAymlGYUWoacuNXrO7exQ0rMUFTAkExNXnOFYFL', 'ff00a8299b108eab43c91648464347acca926b51ad53c6556721f85a237ee3ee', '[\"*\"]', NULL, NULL, '2023-04-02 00:29:03', '2023-04-02 00:29:03'),
(14, 'App\\Models\\User', 12, 'ZhjoDb1sCzLUJlhjA158ku12iL3YmGPc0k8uTzt8', 'a42ed5246424837a0132781f51a762a999c53ddb4b6b41483779b2d3d6b9a718', '[\"*\"]', NULL, NULL, '2023-04-02 00:31:13', '2023-04-02 00:31:13'),
(15, 'App\\Models\\User', 13, 'GIV7mbHv75QZk9iUWuxqs0pTmZqzuf8qrhxYcgGA', '36a1d37a4ea2d6e9107275efbfbcad3d7f68be150ff403f0be9eeb5ec8fa3a03', '[\"*\"]', NULL, NULL, '2023-04-02 00:31:49', '2023-04-02 00:31:49'),
(16, 'App\\Models\\User', 14, 'e8ytgl0YTBG55n87uMnKku8UlQOGZXyzbQI7OSMy', '02131f4aa463700fa0659bc2d0c20b525b96ee3695f23dc809ec8b6776f937b0', '[\"*\"]', NULL, NULL, '2023-04-02 00:33:32', '2023-04-02 00:33:32'),
(17, 'App\\Models\\User', 15, 'zPVBtNOIOwX4ZEQiwxMTFx5fpFaZ0iWpVGlhnNNi', '808e93bc26d2a6beabe8f28edd4174efbb374401462f35ad4f314f9f8fe6dece', '[\"*\"]', NULL, NULL, '2023-04-02 00:34:13', '2023-04-02 00:34:13'),
(18, 'App\\Models\\User', 16, 'DcmL0hqPPG9Xldf0hBBABu6OcFv0X7zYmwJye1QO', '7be70377beb58052d0cf36d1ddce5490efb4c485f516c6a2298e8ca8fccff830', '[\"*\"]', NULL, NULL, '2023-04-02 00:34:43', '2023-04-02 00:34:43'),
(19, 'App\\Models\\User', 17, '83HWUdcUvCHszVUOV9ygEraMTdlMyISarX75wczZ', 'c045322a977a70adc852292dbf0ec02916a41a22f4cb13b265d9aaaadb33b793', '[\"*\"]', NULL, NULL, '2023-04-02 00:36:34', '2023-04-02 00:36:34'),
(20, 'App\\Models\\User', 18, 'NMQRWDyqCyZmx2k2VN1zJLB1SKeRqEBHZ3BTM8xK', '38fdbac6396b043f3361aadd60fe2a984fdfa2ceaeb0ea6b9955ef422ab8d003', '[\"*\"]', '2023-04-02 01:11:16', NULL, '2023-04-02 00:37:35', '2023-04-02 01:11:16'),
(23, 'App\\Models\\User', 13, 'tnwkYfCpVDgQYNXUccIg5K3yrP38CLgInztMrz2e', '75602e1947e8016d6fa5310fd65797af8e56457545088f05b0352e3308560eae', '[\"*\"]', NULL, NULL, '2023-04-02 01:02:17', '2023-04-02 01:02:17'),
(24, 'App\\Models\\User', 13, 'H8xX056t74R7dVGNpiqQCGOx23WtP7zBIK5g8O0T', 'ad831f394f15398c840df48d48b5b47aca23a635142006e41230102f8690e728', '[\"*\"]', NULL, NULL, '2023-04-02 01:02:47', '2023-04-02 01:02:47'),
(25, 'App\\Models\\User', 13, 'APobFBsb4J9aIkcWWRkXHs5eFDz3YyuLW8Vm7XZF', '181fd5249963ca7716b614598eaad968170464751bf5198c884fbc95070cee65', '[\"*\"]', NULL, NULL, '2023-04-02 01:03:53', '2023-04-02 01:03:53'),
(26, 'App\\Models\\User', 13, 'P3Y30IHcBgUDrf2tXL7OQhP5d0TXlefRl1xsZaWv', 'b71ded1d1f0fab4ed03d54a4c41509d41f5642d4f171ce278d183702459f0ee5', '[\"*\"]', NULL, NULL, '2023-04-02 01:05:49', '2023-04-02 01:05:49'),
(27, 'App\\Models\\User', 13, 'yKkwnKiDhw1sZTySHYlQmjCVBsrTOvsaZh44ymrP', '4d34d8fcb4d4ce9bfd9e8791ec5e01b24e117a2f908c62a706230837e04f03cd', '[\"*\"]', NULL, NULL, '2023-04-02 01:09:26', '2023-04-02 01:09:26'),
(28, 'App\\Models\\User', 13, 'l1xMrm6lhmleIo6bhLMURX5fMKdpVb7QsD3jwV0t', '739b99bcd2a20a06fec21ceaefaa16436fd6814017a06bcd6d1bc47527d5b539', '[\"*\"]', NULL, NULL, '2023-04-02 01:10:05', '2023-04-02 01:10:05'),
(29, 'App\\Models\\User', 19, 'rB6w8fOEBuWUj0RQAGz6E1LlHfQVFDIWWRkrtzWr', '2f56aa0187821fc0d0ce3d0b29af4c6ea4e07824a0db0b5c396a583e0dc84456', '[\"*\"]', NULL, NULL, '2023-04-02 01:12:18', '2023-04-02 01:12:18'),
(30, 'App\\Models\\User', 20, 'm8LjxL48pPbQhHpvGHhcuOjWgctUEZV768aOrhzx', '9fc620901478085858c0cd64a7ae1de6e46dbdcb20b26256e1aae8fcc470969f', '[\"*\"]', '2023-04-02 01:13:31', NULL, '2023-04-02 01:12:38', '2023-04-02 01:13:31'),
(31, 'App\\Models\\User', 20, 'PhahS3WJpZw7FUeAuT9coHRsKwlUCWyuCwdNyfXr', '39930524eca5ea15bbd74d901d4232e9f3a2d7a70762bdb1e1d8df4e706405a6', '[\"*\"]', NULL, NULL, '2023-04-02 01:16:53', '2023-04-02 01:16:53'),
(32, 'App\\Models\\User', 21, 'TCy6P12dtO4AwdkD4XgB99D7yfcAoaFl8q18T8qL', 'b15b09c33b7916b19a8802be2876948e20ed2bd3cae69269a684c54dc3145352', '[\"*\"]', '2023-04-02 01:20:03', NULL, '2023-04-02 01:17:50', '2023-04-02 01:20:03'),
(33, 'App\\Models\\User', 21, 'vUyGg96HFzqZrtA4GumAGMIKUpR3GMIadrGEZh9G', '731379a70ffe451d9087533a290c4af3825181f9b1230cd5ff173b47756c8dc4', '[\"*\"]', NULL, NULL, '2023-04-02 01:18:07', '2023-04-02 01:18:07'),
(34, 'App\\Models\\User', 21, 'YKFXeHCQlC4r30RCUXqrIKCDOrepBdDbZgENZRwb', '9941ea135870818fb51c0e2ee9a8218c49688b0ee397b0a62ed415d52704ec8b', '[\"*\"]', NULL, NULL, '2023-04-02 01:19:36', '2023-04-02 01:19:36'),
(35, 'App\\Models\\User', 21, 'FFn3pc7DiTRhYqrpiP4WL9rDF9qrakxtNjYE9bfJ', '50ae392164819d77a1e8d77b0a8850847a2dc0a9d47bfe7329db47e3015d8871', '[\"*\"]', NULL, NULL, '2023-04-02 01:22:39', '2023-04-02 01:22:39'),
(36, 'App\\Models\\User', 22, 'lOjpuiuu4zOBBYEKE9a5pnOz39t9u4HvKQO4N595', '4f75b41c341b677312fdb48c8bfc7412520f57a7fea8487229550504c6adaf25', '[\"*\"]', '2023-04-02 01:24:10', NULL, '2023-04-02 01:23:31', '2023-04-02 01:24:10'),
(37, 'App\\Models\\User', 22, 'emWmUJAtp5iBSepn7MVHKOaRu5CDQ4hvQNTFBUiG', 'dd81c665e8d3219a04f9b5d8c5130f42541c670b13a708b3b283bca120307fb2', '[\"*\"]', NULL, NULL, '2023-04-02 01:23:50', '2023-04-02 01:23:50'),
(39, 'App\\Models\\User', 20, '4sFXFvaaabc3edHq6Z5wZ5YWla71GOuIuEOzhewP', '238a3f66e4779c8cfd8171ba3a6eb6f495c3113942904fbf186f300b84e0a55f', '[\"*\"]', NULL, NULL, '2023-04-02 03:05:24', '2023-04-02 03:05:24'),
(40, 'App\\Models\\User', 20, '5sEt6WRskPryQbYxPA7K7PXSMyNzH36la5rokvOJ', '43e7c7406783a1e778665181b2a661b04ede332705345e1ee1c60640dd0b2445', '[\"*\"]', NULL, NULL, '2023-04-02 03:05:25', '2023-04-02 03:05:25'),
(42, 'App\\Models\\User', 23, 'FdcDbK4l7iNej1djYDGxMhixfQhW1MmliebH7pg0', '4b3fba9ea511c0eae912e71e8be4db9d275340823edeeffb6284508e3a010fff', '[\"*\"]', '2023-04-02 04:03:28', NULL, '2023-04-02 04:03:03', '2023-04-02 04:03:28'),
(43, 'App\\Models\\User', 24, 'U5yMxRBBQ0IyhJYvazQ8OyzveCzpKjNivmMPiHxs', 'dda2fe79b7283347d676e379912c8eb2858a95f7c6e432a81a97ea551e1d60c1', '[\"*\"]', NULL, NULL, '2023-04-02 04:22:40', '2023-04-02 04:22:40'),
(45, 'App\\Models\\User', 25, 'GkMs9h2uwEunoYkAukX3snyGBmQYGrJYzRmTMR8q', '70891b0c4e530596ffe0fa1326b5bd921d82e0e52ac9998e2c97dc1746ba6758', '[\"*\"]', '2023-04-02 22:16:20', NULL, '2023-04-02 22:14:20', '2023-04-02 22:16:20'),
(46, 'App\\Models\\User', 25, 'HvDK9F5su7VygBVIqzEf8fdKtaXLb3p91IWWFY9L', '7f71f612fa2bbfa15d9a8d0cc1411bbd555a796c164ef31dc3d12375aae41077', '[\"*\"]', NULL, NULL, '2023-04-02 22:17:41', '2023-04-02 22:17:41'),
(47, 'App\\Models\\User', 25, 'XGrYs43NOT1bM9ebrhu9OLoPwkcAjzo9UR7a1UGC', '34ebd132adbf12a88591eadc6fef08373c08e2533e8201eea43f12b280d52127', '[\"*\"]', NULL, NULL, '2023-04-02 22:46:37', '2023-04-02 22:46:37'),
(48, 'App\\Models\\User', 26, 'ycsF5GnXjwYCxFD6fR2U7SsGETj5DVK1ws4jWPRl', '4f9684ca71d82623f57e6fa2c35ac1024165cb3ad0ca40864354eaa234d58a8a', '[\"*\"]', '2023-04-02 22:50:01', NULL, '2023-04-02 22:49:20', '2023-04-02 22:50:01'),
(50, 'App\\Models\\User', 25, 'd55cYWvyhAxEelLioctTdxjbsBmVJHxvdHiRc43I', 'f6e5565476fe7950a5f06680930aa2449a875ec5112624f3271ee335af143918', '[\"*\"]', NULL, NULL, '2023-04-02 23:25:13', '2023-04-02 23:25:13'),
(51, 'App\\Models\\User', 27, 'IOW8QUEzywqgabfUj3XKYFkAujjK7QVH7hKE8L4y', 'fe0c39eeebfe3a801f6a9833aa01010c66becfd0d93983126bf78a3cba89e507', '[\"*\"]', NULL, NULL, '2023-04-03 22:29:21', '2023-04-03 22:29:21'),
(52, 'App\\Models\\User', 28, '5vYfUayarHIsjZ0bXw8Q30vIBzxpNzRu3FLdJ4aY', 'fb2acd1e367c5b832e0c301b77bc3e2829bb0e2e00e46d2a8191d5649ed96bde', '[\"*\"]', NULL, NULL, '2023-04-03 22:32:00', '2023-04-03 22:32:00'),
(53, 'App\\Models\\User', 25, 'haKhJO9vwFRWzmEk2ozsR1c3ukblJPCg5lHi5Xcq', 'b4f2d65bddcd82342d687e840d82c69ffb7d8abfac8fd6f4fe879ab8a96211ed', '[\"*\"]', NULL, NULL, '2023-04-03 22:37:01', '2023-04-03 22:37:01'),
(54, 'App\\Models\\User', 25, '0FHuHbJhNr2FdkwIeNXJC2iSii3Jnc632M8CbEwo', '05c642b245b6ffb33889833a98bc99301f738f5db21b9d50c58dde82bd7e83e7', '[\"*\"]', NULL, NULL, '2023-04-03 22:55:01', '2023-04-03 22:55:01'),
(55, 'App\\Models\\User', 29, '0PvbBFzfI0qYeXn6YlicHZ9b35KzUhVa0d9u4gQ6', '74354c8449929f3316eb2a0fd72ce18760b23e2d7bf627c5ff456bae9dc42e8e', '[\"*\"]', NULL, NULL, '2023-04-03 22:59:55', '2023-04-03 22:59:55'),
(56, 'App\\Models\\User', 25, 'm4Rreqjtirpjj8vrobKb6Cn22d67Cku3amFTR4Wg', '2f4cd17be8ca29aa57dc921fe3ffa29eb11bde7a376be211b7b5d92a9e97c900', '[\"*\"]', NULL, NULL, '2023-04-04 22:08:16', '2023-04-04 22:08:16'),
(57, 'App\\Models\\User', 25, 'CR3PNcfsIV2AzWBxt1sN2KbGncbD4DcpeyfsBjHh', 'f2bed64a6f5da2e61e5b36417f5dac9482de479c7b9a6cac2f60325c8d14cd07', '[\"*\"]', NULL, NULL, '2023-04-04 22:08:22', '2023-04-04 22:08:22'),
(58, 'App\\Models\\User', 30, 'SCJe2sNuqGlBPsZ0qlY89Cvgyo9owe12OglbLAoN', '02ba177aa9488b7e392f8ae03bc7a35312b09571dd72a9cc7af3f8b8974519d3', '[\"*\"]', NULL, NULL, '2023-04-04 22:10:06', '2023-04-04 22:10:06'),
(59, 'App\\Models\\User', 31, 'SV38uGTMrsBV0VuTKrfmbKBtMoxxAJUPabOJCpV1', '2b7b3dc9a2c9623cf0f59baf4e0081201732dc4659c92d9b5d041b68a3645cbe', '[\"*\"]', NULL, NULL, '2023-04-04 22:10:46', '2023-04-04 22:10:46'),
(60, 'App\\Models\\User', 31, 'BZV1gHWyK6MF24Fyw5BggXTtd7DaTtZsdMKxhcqp', '1403f0d937e10c58d000e402ffb2e84dabfef6c53a74eb676d58eae26b6ff014', '[\"*\"]', NULL, NULL, '2023-04-04 22:17:52', '2023-04-04 22:17:52'),
(62, 'App\\Models\\User', 31, 'JZWGfvHkN3NBISsOQE7kPG4eAAAxzqhjpRD7VrSM', '2ec3a815ba7e0f1e898991de0aaeb70b857be1411ba360a7a2c1a0bf2898ab64', '[\"*\"]', NULL, NULL, '2023-04-04 22:22:56', '2023-04-04 22:22:56'),
(63, 'App\\Models\\User', 31, '8QU8v9yRywTF543cE0WUpVnoryBvoN8Tp7RGgaZ2', '6f1242af9be7c5b800ac21f2261973bfab910fdc65b432e737f91b4fda8df995', '[\"*\"]', NULL, NULL, '2023-04-04 22:23:23', '2023-04-04 22:23:23'),
(66, 'App\\Models\\User', 31, 'xTBb643wr3H9GQaFwOk306aUMR7yOijfOBl51Zid', 'e41c143efcd1839b32ce99292d3b4185505d1c005b17c4094e112882489d1762', '[\"*\"]', NULL, NULL, '2023-04-04 22:23:36', '2023-04-04 22:23:36'),
(70, 'App\\Models\\User', 33, 'eflobKwbsHCNSFX3pyF87UkBFEcd2fgdNcoZthPD', 'b4d946638fa3b38c6db01d0e9e9766b575c3b6579565a425e230235c521c9cbe', '[\"*\"]', '2023-04-04 22:26:14', NULL, '2023-04-04 22:25:29', '2023-04-04 22:26:14'),
(71, 'App\\Models\\User', 33, 'XiEzDkE3ApbwRmfQ3CmfTHu5wjDDW1en7amNfA7Y', '8bbe807496ecb694ce16ab9bb4f5154b82b63e9b699a294727fb585ce57e0baf', '[\"*\"]', NULL, NULL, '2023-04-04 22:26:31', '2023-04-04 22:26:31'),
(72, 'App\\Models\\User', 33, 'fW6PuS45XqGPKPgm3S1QUfF3CdsTelj3XqPe1jjR', 'af861000c79038b5c6f045ded567afb3755b105046612a391b8914a6c808364c', '[\"*\"]', NULL, NULL, '2023-04-04 22:26:35', '2023-04-04 22:26:35'),
(73, 'App\\Models\\User', 33, 'EbuhPdqAP2HzohQdiNY6Ite46hkIxFpirp9SBrQD', '6e760ff02b0f402760de981311af1ff545389c4cdec871c96159c771395f64fa', '[\"*\"]', NULL, NULL, '2023-04-04 22:26:35', '2023-04-04 22:26:35'),
(74, 'App\\Models\\User', 33, 'zYPJhaZ2cuDWuUylbaLHwYv63vBw5BpAQl6KDcrP', 'e013d79db6fbcd7fbce0b681386dc0dafc742e3a587f9cc2b8eec56a3153758b', '[\"*\"]', NULL, NULL, '2023-04-04 22:26:35', '2023-04-04 22:26:35'),
(75, 'App\\Models\\User', 33, 'hEMUWyDm7JpvkWE7QmIs6u3ggAxbgS6MSYCx1OxV', '893af707c59afa5d33fd32dd89e67aa1514b2c8f38c00aeefaf66860d079cc80', '[\"*\"]', NULL, NULL, '2023-04-04 22:26:36', '2023-04-04 22:26:36'),
(76, 'App\\Models\\User', 33, 'IjjY1sGQIcmXShqkvTwGNJb5Hfj99oASBAhznCgO', '1e8540deff02fc3e9545078f8950f743fcc50062bd015f42ee591827e7ef4cea', '[\"*\"]', NULL, NULL, '2023-04-04 22:26:47', '2023-04-04 22:26:47'),
(93, 'App\\Models\\User', 35, 'YQ4HilsOj0Hyhyt2lXIXoOn8dE2vt8Zo2ENzOISF', '136d7abd104f96d8dde5052472126bbecf3c670148fe6a8e547e79266d16119f', '[\"*\"]', NULL, NULL, '2023-04-06 21:36:37', '2023-04-06 21:36:37'),
(94, 'App\\Models\\User', 36, 'udBCZgc5UdgTH2dTPZZFCJmndZgCSKmpY54YdanU', '769a524caabb52694268542a61e4c8f2d4340faa2ba313198ed84d3495ee885d', '[\"*\"]', NULL, NULL, '2023-04-06 21:36:59', '2023-04-06 21:36:59'),
(105, 'App\\Models\\User', 37, 'XNQPQAeu63OO91oVVRfcR36CIwfYd3LKc1KxYd8l', '635ef936c4d452c63b6a9c55fcfcd0d8dc898c51ece25668ecf581b24c82851d', '[\"*\"]', NULL, NULL, '2023-04-07 03:18:55', '2023-04-07 03:18:55'),
(159, 'App\\Models\\User', 7, 'ynYLse2lPuNKWpFZRBewaaZX1mij2q31LcgHfEKS', '816612095c3d8920d8be0d26a0e4ce52e122752f34e869485ce18c3ff0fab401', '[\"*\"]', '2023-04-12 00:15:26', NULL, '2023-04-12 00:13:47', '2023-04-12 00:15:26'),
(173, 'App\\Models\\User', 38, 'e948Qrp1S1AIROEClna8NRRZactXuBVnJ4tJlUu4', '74c4436093dfb7f92d039e410d0b3bb9f8369319898fd0cc76b71fc8d1c72c9a', '[\"*\"]', NULL, NULL, '2023-04-21 23:04:53', '2023-04-21 23:04:53'),
(174, 'App\\Models\\User', 39, 'HdQk9ByYaiGMNjXSbVl61njVVSlp8R32TKBssUg0', '97ce9f19f0b984166f858e4facb53c0db308f6793586d20e29480c493ef34d8d', '[\"*\"]', NULL, NULL, '2023-04-21 23:05:45', '2023-04-21 23:05:45'),
(180, 'App\\Models\\User', 34, 'ELSUt4SFggSL2ZjxN0157y5JungwIw4EdDddpdua', '963ac3cc32a0f0da8422b4cb390cb2e1aaf67876b692a1fee30e2c421c36350d', '[\"*\"]', NULL, NULL, '2023-04-25 14:57:14', '2023-04-25 14:57:14'),
(184, 'App\\Models\\User', 43, 'KegynBjjhETNovMpJxjq8Fx8nvDRFyaaSRG8w8tV', '12ff713454eeb31552bbbbbb937a40162c61d55b30811d034b443521d036224e', '[\"*\"]', NULL, NULL, '2023-04-26 23:52:35', '2023-04-26 23:52:35'),
(185, 'App\\Models\\User', 44, 'GOqwt4TtnLT4ee1Fvkzum7Q4TIMwJtQsnPowKx0a', '79f98db1cf11090b80293a4a236f3785b41d9be6fdf20d858cb5524ec29b6d45', '[\"*\"]', NULL, NULL, '2023-04-26 23:54:36', '2023-04-26 23:54:36'),
(188, 'App\\Models\\User', 47, 'FUxNPZ5O71kCpOCaVCPvVMqNVHObf2aCzmFE5q0a', '2639d301bcf01e84294063a3deea2435334958071dc9036fecb915cf8ee22c13', '[\"*\"]', NULL, NULL, '2023-04-27 00:03:18', '2023-04-27 00:03:18'),
(189, 'App\\Models\\User', 48, 'QCaYZfPgfMUv79pl7XfBlRZgbWzdKmjAx7BwJ6is', 'f51178cf69379f5f73a65ec70da39389b1705eb95f93914ef9595373c9d11dca', '[\"*\"]', NULL, NULL, '2023-04-27 00:06:57', '2023-04-27 00:06:57'),
(190, 'App\\Models\\User', 49, 'ZryY5WA7h8GP1TSlXv7sRpaHxvGCYB6UcZFtJLP8', '2192ff3c684f570f1214b326a75a7d1f3c4c5704ad89308ad4ee1dea6a1cdb61', '[\"*\"]', NULL, NULL, '2023-04-27 00:07:24', '2023-04-27 00:07:24'),
(191, 'App\\Models\\User', 50, 'bYD7CgdfCfHJD7yO4asDzBufy4zPo7u13pTtvkiP', '1bb4a18af3a53fab7d24bb23a3c7dfb69c3ac925b74774e13532363fad781ff1', '[\"*\"]', NULL, NULL, '2023-04-27 00:09:56', '2023-04-27 00:09:56'),
(192, 'App\\Models\\User', 51, '9GFhlgDZS0lz9u6JuowADCEKaPo08GHxdOMzme5v', 'bb8074ce3faf17e60cbf351f9d943a04a5ae412e4baa2222da212c3340167a87', '[\"*\"]', NULL, NULL, '2023-04-27 00:12:11', '2023-04-27 00:12:11'),
(193, 'App\\Models\\User', 52, 'yhrQHh6dCIBnA1cQEczpdwutxIltKuy4VY0nsGfd', '76c86d3deedc3653760c034d9932e8c02162c736a0e56569e0e7e75414d8f0aa', '[\"*\"]', NULL, NULL, '2023-04-27 00:18:50', '2023-04-27 00:18:50'),
(198, 'App\\Models\\User', 4, '2F3z6yDz0R50WbBFx7sa72yBNKzBDZvX347TrMo0', '94a9fc70d719f99021db83ec6602157a54cb8abf2d87deb15105b2d5ced29b7d', '[\"*\"]', '2023-05-14 15:09:14', NULL, '2023-05-14 15:08:06', '2023-05-14 15:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `colors` text DEFAULT NULL,
  `recommendation` int(11) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('published','draft') NOT NULL DEFAULT 'draft',
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sub_category_id`, `section_id`, `title`, `slug`, `amount`, `discount`, `colors`, `recommendation`, `description`, `created_at`, `updated_at`, `status`, `type`) VALUES
(1, 3, 1, 'Wireless Earphones Touch Control', 'wireless-earphones-touch-control', '1400.00', '400.00', '#ff0000,#00a31b', 0, '<h2>Product details of New M10 TWS Wireless Earphones Touch Control 5.1 with power bank charger Headset Waterproof 9D Hifi Quality Earbuds 2000mAh Stereo Sports Headphones With Microphone</h2><ul><li>The Newest bluetooth 4.0 headset with lightweight and Simple and Stylish Compact, Ultra mini design popular and easy to carry</li><li>Rechargeable, long battery life, fast charging</li><li>High-fidelity sound quality, enjoy high quality songs</li><li>Bluetooth V5.1, supporting most Bluetooth devices, lower power consumption</li><li>The 2000mAh charging box can charge two earphones for about two times, providing more music time</li><li>Waterproof technology, no need to worry about water and sweat</li><li>8mm driver unit, enjoy 9D strong and deep bass music effect</li><li>Popular touch control, supporting song switching, phone, volume control and call voice assistant</li><li>Original Bluetooth Handfree with mic Wireless HandfreeWireless Bluetooth Earphones Wireless Bluetooth headset compatible with android and other devices Bluetooth earphone for games Bluetooth Neckband</li><li>&nbsp;</li><li>The Bluetooth headset enables you to enjoy great sounds on-the-go.</li><li>Comfortable and snug fit make sure the headset stays tightly when you are out running, jogging or exercising and doing other activities.</li><li>The portable, user-friendly magnet design lets the headphones hang like a necklace, very easy to store into your clothing or bag, and not easy to fall off.</li><li>A good choice as a gift for your friends and family.+Specification:</li></ul><p>Bluetooth-Compatible Version: 5.1<br>Protocol: HFP 1.7 / HSP1.2 / A2DP 1 / AVRCP 1.6/ SPP1.2 / PBAP1.0<br>Noise reduction version: CVC8.0<br>Frequency range: 2.402GHZ ~ 2.480GHZ<br>Working distance: 0-10m<br>Charging input voltage and current: 5V Above 600mA<br>Headphone battery capacity：50mAh<br>Charging compartment battery capacity: 2000mAh<br>Headphone charging time 2 hours<br>Music playback time: 3-4hours<br>Talk time: 3-4hours</p>', '2023-04-03 21:55:14', '2023-04-03 21:55:14', 'published', NULL),
(2, 3, 1, 'Pronalytics', 'pronalytics', '120.00', '11.00', '#ff0000', 0, '<ul><li><strong>Body:</strong> 146.7x71.5x7.8mm, 172g; Glass front (Corning-made glass), glass back (Corning-made glass), aluminum frame; IP68 dust/water resistant (up to 6m for 30 mins), Apple Pay (Visa, MasterCard, AMEX certified).</li><li><strong>Display:</strong> 6.10\" Super Retina XDR OLED, HDR10, Dolby Vision, 800 nits (HBM), 1200 nits (peak), 1170x2532px resolution, 19.48:9 aspect ratio, 460ppi.</li><li><strong>Chipset:</strong> Apple A15 Bionic (5 nm): Hexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard); Apple GPU (5-core graphics).</li><li><strong>Memory:</strong> 128GB 6GB RAM, 256GB 6GB RAM, 512GB 6GB RAM; NVMe.</li><li><strong>OS/Software:</strong> iOS 16, upgradable to iOS 16.0.2.</li><li><strong>Rear camera:</strong> Wide (main): 12 MP, f/1.5, 26mm, 1/1.7\", 1.9µm, dual pixel PDAF, sensor-shift OIS; Ultra wide angle: 12 MP, f/2.4, 13mm, 120-degree.</li><li><strong>Front camera:</strong> Wide: 12 MP, f/1.9, 23mm, 1/3.6\", PDAF.</li><li><strong>Video capture:</strong> Rear camera: 4K@24/25/30/60fps, 1080p@25/30/60/120/240fps, HDR, Dolby Vision HDR (up to 60fps), Cinematic mode (4K@30fps), stereo sound rec; Front camera: 4K@24/25/30/60fps, 1080p@25/30/60/120fps, gyro-EIS.</li><li><strong>Battery:</strong> 3279mAh; Fast charging, 50% in 30 min (advertised), USB Power Delivery 2.0, MagSafe fast wireless charging 15W, Qi wireless charging 7.5W.</li><li><strong>Misc:</strong> Face ID, accelerometer, gyro, proximity, compass, barometer; NFC; stereo speakers; Ultra Wideband (UWB) support, Emergency SOS via satellite (SMS sending/receiving).</li></ul>', '2023-04-03 22:17:33', '2023-04-06 21:46:00', 'published', NULL),
(3, 3, 1, 'Iphone Wireless Charger', 'iphone-wireless-charger', '150.00', '10.00', '', 0, '<ul><li><strong>Fast-charge:</strong> Up to 50% charge in 30 minutes with 20W adapter or higher</li><li>MagSafe wireless charging up to 15W</li><li>Qi wireless charging up to 7.5W</li></ul><p>And here is the list with all chargers we\'ve used for this test:</p><ul><li>Apple 5W charger (iPhone)</li><li>Apple 10W charger (iPad)</li><li>Apple 12W charger (iPad)</li><li>Apple 18W charger (iPhone)</li><li>Apple 20W charger (iPhone)</li><li>Apple 29W charger (MacBook)</li><li>Google 18W USB-PD charger (Pixel 3)</li><li>Samsung 25W charger (Galaxy Note20 Ultra)</li><li>Xiaomi 10W charger (Redmi 9)</li><li>Xiaomi 22.5W charger (Redmi Note 9S)</li><li>Huawei 18W charger (P30 Lite)</li><li>IKEA KOPPLA 12W charger</li><li>Aukey 12W car charger</li><li>Apple MagSafe wireless charger</li><li>Samsung Wireless Charging Stand (2018)</li><li>Samsung Wireless Charging Stand (2019)</li><li>Xiaomi Powerbank 20,000 mAh 18W, 2x USB-A, microUSB</li></ul><p>Finally, we\'ve used these two cables for our charging tests:</p><ul><li>Apple USB-C to Lightning cable from iPhone 12 Pro</li><li>Apple USB-A to Lightning cable from iPhone X</li></ul>', '2023-04-03 22:23:25', '2023-04-03 22:24:06', 'published', NULL),
(4, 3, 1, 'iPhone 14 Pro Max Clear Case with MagSafe', 'iphone-14-pro-max-clear-case-with-magsafe', '15.00', '0.00', '#000000', 0, '<p>Thin, light, and easy to grip — this Apple-designed case shows off the brilliant colored finish of iPhone 14 Pro Max while providing extra protection.</p><p>Crafted with a blend of optically clear polycarbonate and flexible materials, the case fits right over the buttons for easy use. On the surface, a scratch-resistant coating has been applied to both the interior and exterior. And all materials and coatings are optimized to prevent yellowing over&nbsp;time.</p><p>With built-in magnets that align perfectly with iPhone 14 Pro Max, this case offers a magical attach experience and faster wireless charging, every time. When it’s time to charge, just leave the case on your iPhone and snap on your MagSafe charger, or set it on your Qi-certified charger.</p><p>Like every Apple-designed case, it undergoes thousands of hours of testing throughout the design and manufacturing process. So not only does it look great, it’s built to protect your iPhone from scratches and drops.</p>', '2023-04-03 22:26:13', '2023-05-07 20:46:23', 'published', NULL),
(5, 10, 2, 'Beauty', 'beauty', '120.00', '10.00', '#ff0000,#00a31b', 0, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>', '2023-04-05 22:19:10', '2023-05-14 15:19:08', 'published', 'top'),
(6, 10, 2, 'Apple Injection', 'lux-aroma-diffuser', '100.00', '10.00', '#ff0000,#000000', 0, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>', '2023-04-05 22:20:18', '2023-05-14 15:20:07', 'published', 'top'),
(9, 3, 2, 'Savvyshoppr Injection', 'savvyshoppr-injection', '12.00', '10.00', '#ff0000', 0, '<p>This is for Savvyshoppr Manager to get him</p>', '2023-04-06 21:43:29', '2023-04-06 21:43:29', 'published', 'top'),
(10, 3, 2, 'Motivational book', 'books', '5.00', '0.50', '#ff0000,#00a31b,#000000', 0, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>', '2023-04-08 10:54:50', '2023-04-08 10:55:15', 'published', NULL),
(11, 3, 2, 'Charger', 'electronics', '10.00', '1.00', '#ff0000,#000000', 0, '<p>Fast charger electronic&nbsp;</p>', '2023-04-08 13:31:22', '2023-04-08 13:31:29', 'published', NULL),
(12, 4, 1, '43\" T5300 Full HD Flat Smart TV', 'smart-tv', '12.00', '1.00', '#000000', 0, '<p>Your favorite TV programs and movies get real. The rich and vivid Full HD resolution with twice the resolution of HD TV.</p>', '2023-04-08 20:13:24', '2023-04-08 20:13:24', 'published', NULL),
(13, 4, 1, '43\" T5300 Full HD Flat Smart TV', 'tv', '12.00', '1.00', '#000000', 0, '<p>Your favorite TV programs and movies get real. The rich and vivid Full HD resolution with twice the resolution of HD TV.</p>', '2023-04-08 20:15:46', '2023-04-08 20:15:57', 'published', NULL),
(14, 4, 1, 'Q60T QLED Smart 4K TV', '4k-tv', '120.00', '10.00', '#00a31b', 0, '<p>Quantum Dot Technology delivers our finest picture ever. With Color Volume 100%, Quantum Dot takes light and turns it into breathtaking color that stays true at any level of brightness.</p>', '2023-04-08 20:15:51', '2023-04-08 20:15:51', 'published', NULL),
(15, 6, 1, 'HP ProBook MT31 Mobile Thin Client', 'hp-probook', '89.00', '10.00', '#000000', 0, '<figure class=\"table\"><table><tbody><tr><th>Brand</th><td>Hp</td></tr><tr><th>Generation</th><td>Intel Celeron</td></tr><tr><th>Processor Type</th><td>Intel Celeron 3865U processor</td></tr><tr><th>Processor Speed</th><td>1.8 GHz 2 cores and 2 MB cache Intel HD Graphics</td></tr><tr><th>Installed RAM</th><td>04 GB</td></tr><tr><th>Type of memory</th><td>DDR</td></tr><tr><th>Hard drive size</th><td>128 GB SSD</td></tr><tr><th>Hard drive speed</th><td>-</td></tr><tr><th>Optical Drive</th><td>No</td></tr><tr><th>Type of optical drive</th><td>-</td></tr><tr><th>SSD</th><td>128 GB SSD</td></tr><tr><th>Type of harddrive</th><td>SSD</td></tr><tr><th>Dedicated graphics</th><td>No</td></tr><tr><th>Graphics memory</th><td>Intel HD Graphics 610</td></tr><tr><th>Type of graphics memory</th><td>Shared</td></tr><tr><th>Switchable graphics</th><td>No</td></tr><tr><th>Graphics processor</th><td>Intel</td></tr><tr><th>Backlight</th><td>LED</td></tr><tr><th>Screen size</th><td>13.3\" diagonal HD SVA anti-glare LED backlit non-touch, 220 cd/m2, 45% sRGB (1366 x 768)</td></tr><tr><th>Screen surface</th><td>33.78 cm (13.3 in) diagonal HD SVA anti-glare LED backlit non-touch, 220 cd/m2, 45% sRGB</td></tr><tr><th>Screen resolution</th><td>1366 x 768</td></tr><tr><th>Touchscreen</th><td>No</td></tr><tr><th>Color</th><td>Silver</td></tr><tr><th>Weight</th><td>1.48 kg (3.26 lb)</td></tr><tr><th>Fingerprint Reader</th><td>No</td></tr><tr><th>Numeric keyboard</th><td>No</td></tr><tr><th>Backlit keyboard</th><td>No</td></tr><tr><th>Bluetooth</th><td>Bluetooth 4.2 Combo</td></tr><tr><th>LAN</th><td>Yes</td></tr><tr><th>Speed</th><td>Realtek RTL8111HSH Gigabit Ethernet</td></tr><tr><th>Wireless/Wifi</th><td>Yes</td></tr><tr><th>Type</th><td>Intel Dual Band Wireless-AC 8265 802.11a/b/g/n/ac (2x2) Wi-Fi</td></tr><tr><th>Condition</th><td>Open Box</td></tr><tr><th>USB</th><td>(1) USB 3.1 Type-C (Power Delivery, DisplayPort) | (2) USB 3.1 Gen 1 (1 powered port)</td></tr><tr><th>HDMI</th><td>(1) VGA (1) HDMI 1.4b (cable sold separately)</td></tr><tr><th>Camera</th><td>720p HD webcam</td></tr><tr><th>Operating system (Primary)</th><td>DOS</td></tr><tr><th>Manual</th><td>https://support.hp.com/sg-en/document/c06188887</td></tr><tr><th>Product page</th><td>https://support.hp.com/sg-en/document/c06188887</td></tr><tr><th>Warranty</th><td>01 Month</td></tr></tbody></table></figure>', '2023-04-08 20:19:31', '2023-04-08 20:36:11', 'published', NULL),
(16, 6, 1, 'HP ZBook 14u G5 Mobile Workstation', 'hp-zbook', '110.00', '10.00', '#000000', 0, '<figure class=\"table\"><table><tbody><tr><th>Brand</th><td>Hp</td></tr><tr><th>Generation</th><td>08th Generation</td></tr><tr><th>Processor Type</th><td>8th Generation Core i7-8550u QuadCore Processor (4 Cores - 8 Threads)</td></tr><tr><th>Processor Speed</th><td>1.8 GHz Turbo Boost 4.0 (8 MB Cache)</td></tr><tr><th>Installed RAM</th><td>16 GB</td></tr><tr><th>Type of memory</th><td>-</td></tr><tr><th>Hard drive size</th><td>256 GB PCIe® NVMe™ M.2 SSD</td></tr><tr><th>Hard drive speed</th><td>-</td></tr><tr><th>Optical Drive</th><td>No</td></tr><tr><th>Type of optical drive</th><td>-</td></tr><tr><th>SSD</th><td>256 GB SSD</td></tr><tr><th>Type of harddrive</th><td>256 GB PCIe® NVMe™ M.2 SSD</td></tr><tr><th>Dedicated graphics</th><td>No</td></tr><tr><th>Graphics memory</th><td>Intel UHD 620 Graphics</td></tr><tr><th>Type of graphics memory</th><td>Shared</td></tr><tr><th>Switchable graphics</th><td>No</td></tr><tr><th>Graphics processor</th><td>Intel</td></tr><tr><th>Backlight</th><td>LED</td></tr><tr><th>Screen size</th><td>35.56 cm (14.0 in) diagonal Touch LED-backlit FHD UWVA eDP (1920 x 1080)</td></tr><tr><th>Screen surface</th><td>35.56 cm (14.0 in) diagonal Touch LED-backlit FHD UWVA eDP (1920 x 1080)</td></tr><tr><th>Screen resolution</th><td>1920x1080</td></tr><tr><th>Touchscreen</th><td>Yes</td></tr><tr><th>Color</th><td>Grey</td></tr><tr><th>Weight</th><td>1.48 kg (3.26 lb)</td></tr><tr><th>Fingerprint Reader</th><td>No</td></tr><tr><th>Numeric keyboard</th><td>No</td></tr><tr><th>Backlit keyboard</th><td>No</td></tr><tr><th>Bluetooth</th><td>Yes</td></tr><tr><th>LAN</th><td>Yes</td></tr><tr><th>Speed</th><td>10/100/1000</td></tr><tr><th>Wireless/Wifi</th><td>Yes</td></tr><tr><th>Type</th><td>Wireless-AC 8265 802.11 a/b/g/n/ac (2x2) WiFi</td></tr><tr><th>Condition</th><td>Open Box</td></tr><tr><th>USB</th><td>(1) USB 3.0 charging port, (1) USB 3.1 Gen 1 (1) USB 3.0 port</td></tr><tr><th>HDMI</th><td>Yes</td></tr><tr><th>Camera</th><td>Yes</td></tr><tr><th>Operating system (Primary)</th><td>Genuine Windows 10 Pro</td></tr><tr><th>Manual</th><td>https://support.hp.com/us-en/document/c05873311#AbT4</td></tr><tr><th>Product page</th><td>https://support.hp.com/us-en/document/c05873311#AbT4</td></tr><tr><th>Warranty</th><td>International</td></tr></tbody></table></figure>', '2023-04-08 20:20:50', '2023-04-08 20:36:06', 'published', NULL),
(17, 7, 1, 'Samsung Galaxy Tab A7 Lite 8.7 inches (T225N)', 'samsung-galaxy-tab', '11.00', '1.00', '#000000', 0, '<figure class=\"table\"><table><thead><tr><th colspan=\"2\">General Features</th></tr></thead><tbody><tr><th><strong>Release Date</strong></th><td><strong>2021-11-17</strong></td></tr><tr><th><strong>SIM Support</strong></th><td><strong>Nano-SIM</strong></td></tr><tr><th><strong>Tablet Dimensions</strong></th><td><strong>212.5 x 124.7 x 8 mm</strong></td></tr><tr><th><strong>Tablet Weight</strong></th><td><strong>371 g</strong></td></tr><tr><th><strong>Operating System</strong></th><td><strong>Android 11</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><thead><tr><th colspan=\"2\">Display</th></tr></thead><tbody><tr><th><strong>Screen Size</strong></th><td><strong>8.7 inches</strong></td></tr><tr><th><strong>Screen Resolution</strong></th><td><strong>800 x 1340</strong></td></tr><tr><th><strong>Screen Type</strong></th><td><strong>TFT</strong></td></tr><tr><th><strong>Screen Protection</strong></th><td><strong>N/A</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><thead><tr><th colspan=\"2\">Memory</th></tr></thead><tbody><tr><th><strong>Internal Memory</strong></th><td><strong>32GB</strong></td></tr><tr><th><strong>RAM</strong></th><td><strong>3GB</strong></td></tr><tr><th><strong>Card Slot</strong></th><td><strong>microSDXC (dedicated slot)</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><thead><tr><th colspan=\"2\">Performance</th></tr></thead><tbody><tr><th><strong>Processor</strong></th><td><strong>Octa-core (4x2.3 GHz Cortex-A53 &amp; 4x1.8 GHz Cortex-A53)</strong></td></tr><tr><th><strong>GPU</strong></th><td><strong>PowerVR GE8320</strong></td></tr></tbody></table></figure>', '2023-04-08 20:23:02', '2023-04-08 20:36:01', 'published', NULL),
(18, 7, NULL, 'Samsung Galaxy Tab S6 Lite 10.4 inches (P613)', 'galaxy-tab', '111.00', '10.00', '#000000', 0, '<figure class=\"table\"><table><thead><tr><th colspan=\"2\">General Features</th></tr></thead><tbody><tr><th><strong>Release Date</strong></th><td><strong>2022-05-23</strong></td></tr><tr><th><strong>SIM Support</strong></th><td><strong>No</strong></td></tr><tr><th><strong>Tablet Dimensions</strong></th><td><strong>244.5 x 154.3 x 7 mm</strong></td></tr><tr><th><strong>Tablet Weight</strong></th><td><strong>467 g</strong></td></tr><tr><th><strong>Operating System</strong></th><td><strong>Android 12, upgradable to Android 13, One UI 5</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><thead><tr><th colspan=\"2\">Display</th></tr></thead><tbody><tr><th><strong>Screen Size</strong></th><td><strong>10.4 inches</strong></td></tr><tr><th><strong>Screen Resolution</strong></th><td><strong>1200 x 2000 pixels</strong></td></tr><tr><th><strong>Screen Type</strong></th><td><strong>TFT LCD</strong></td></tr><tr><th><strong>Screen Protection</strong></th><td><strong>N/A</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><thead><tr><th colspan=\"2\">Memory</th></tr></thead><tbody><tr><th><strong>Internal Memory</strong></th><td><strong>64GB</strong></td></tr><tr><th><strong>RAM</strong></th><td><strong>4GB RAM</strong></td></tr><tr><th><strong>Card Slot</strong></th><td><strong>microSDXC</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><thead><tr><th colspan=\"2\">Performance</th></tr></thead><tbody><tr><th><strong>Processor</strong></th><td><strong>Octa-core (2x2.3 GHz Kryo 465 Gold &amp; 6x1.8 GHz Kryo 465 Silver)</strong></td></tr><tr><th><strong>GPU</strong></th><td><strong>Adreno 618</strong></td></tr></tbody></table></figure>', '2023-04-08 20:24:36', '2023-04-08 20:35:56', 'published', NULL),
(20, 5, 2, 'Iphone X', 'iphone-x', '800.00', '12.00', '#00a31b', 0, '<h2>ALL VERSIONS</h2><h2>A1901</h2><h2>A1865</h2><p>Also known as Apple iPhone 10, Apple iPhone Ten<br>Versions:<br>A1865 (USA, Hong Kong, Australia, New Zealand, China)<br>A1901 (EMEA, UAE, LATAM, Canada, USA - AT&amp;T/T-Mobile, Singapore)<br>A1902 (Japan), A1903 (Unknown market)</p><figure class=\"table\"><table><tbody><tr><th>NETWORK</th><td><a href=\"https://www.gsmarena.com/network-bands.php3\">Technology</a></td><td><a href=\"https://www.gsmarena.com/apple_iphone_x-8858.php#\">GSM / HSPA / LTE</a></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"2\">LAUNCH</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=phone-life-cycle\">Announced</a></td><td>2017, September 12</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=phone-life-cycle\">Status</a></td><td>Available. Released 2017, November 03</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"5\">BODY</th><td><a href=\"https://www.gsmarena.com/apple_iphone_x-8858.php#\">Dimensions</a></td><td>143.6 x 70.9 x 7.7 mm (5.65 x 2.79 x 0.30 in)</td></tr><tr><td><a href=\"https://www.gsmarena.com/apple_iphone_x-8858.php#\">Weight</a></td><td>174 g (6.14 oz)</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=build\">Build</a></td><td>Glass front (Corning-made glass), glass back (Corning-made glass), stainless steel frame</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=sim\">SIM</a></td><td>Nano-SIM</td></tr><tr><td>&nbsp;</td><td>IP67 dust/water resistant (up to 1m for 30 min)<br>Apple Pay (Visa, MasterCard, AMEX certified)</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"5\">DISPLAY</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=display-type\">Type</a></td><td>Super Retina OLED, HDR10, Dolby Vision, 625 nits (HBM)</td></tr><tr><td><a href=\"https://www.gsmarena.com/apple_iphone_x-8858.php#\">Size</a></td><td>5.8 inches, 84.4 cm2 (~82.9% screen-to-body ratio)</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=resolution\">Resolution</a></td><td>1125 x 2436 pixels, 19.5:9 ratio (~458 ppi density)</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=screen-protection\">Protection</a></td><td>Scratch-resistant glass</td></tr><tr><td>&nbsp;</td><td>3D Touch</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"4\">PLATFORM</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=os\">OS</a></td><td>iOS 11.1.1, up to iOS 16.4</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=chipset\">Chipset</a></td><td>Apple A11 Bionic (10 nm)</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=cpu\">CPU</a></td><td>Hexa-core 2.39 GHz (2x Monsoon + 4x Mistral)</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=gpu\">GPU</a></td><td>Apple GPU (three-core graphics)</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"3\">MEMORY</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=memory-card-slot\">Card slot</a></td><td>No</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=dynamic-memory\">Internal</a></td><td>64GB 3GB RAM, 256GB 3GB RAM</td></tr><tr><td>&nbsp;</td><td>NVMe</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"3\">MAIN CAMERA</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=camera\">Dual</a></td><td>12 MP, f/1.8, 28mm (wide), 1/3\", 1.22µm, dual pixel PDAF, OIS<br>12 MP, f/2.4, 52mm (telephoto), 1/3.4\", 1.0µm, PDAF, OIS, 2x optical zoom</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=camera\">Features</a></td><td>Quad-LED dual-tone flash, HDR (photo/panorama), panorama, HDR</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=camera\">Video</a></td><td>4K@24/30/60fps, 1080p@30/60/120/240fps</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"3\">SELFIE CAMERA</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=secondary-camera\">Single</a></td><td>7 MP, f/2.2, 32mm (standard)<br>SL 3D, (depth/biometrics sensor)</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=secondary-camera\">Features</a></td><td>HDR</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=secondary-camera\">Video</a></td><td>1080p@30fps</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"2\">SOUND</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=loudspeaker\">Loudspeaker</a></td><td>Yes, with stereo speakers</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=audio-jack\">3.5mm jack</a></td><td>No</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"6\">COMMS</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=wi-fi\">WLAN</a></td><td>Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=bluetooth\">Bluetooth</a></td><td>5.0, A2DP, LE</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=gnss\">Positioning</a></td><td>GPS, GLONASS, GALILEO, QZSS</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=nfc\">NFC</a></td><td>Yes</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=fm-radio\">Radio</a></td><td>No</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=usb\">USB</a></td><td>Lightning, USB 2.0</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th>FEATURES</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=sensors\">Sensors</a></td><td>Face ID, accelerometer, gyro, proximity, compass, barometer</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"3\">BATTERY</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=rechargeable-battery-types\">Type</a></td><td>Li-Ion 2716 mAh, non-removable (10.35 Wh)</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=battery-charging\">Charging</a></td><td>15W wired, PD2.0, 50% in 30 min (advertised)<br>Wireless (Qi)</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=talk-time\">Talk time</a></td><td>Up to 21 h (3G)</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"4\">MISC</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=build\">Colors</a></td><td>Space Gray, Silver</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=models\">Models</a></td><td>A1865, A1901, A1902, A1903, iPhone10,3, iPhone10,6</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=sar\">SAR</a></td><td>1.09 W/kg (head) &nbsp; &nbsp; 1.17 W/kg (body) &nbsp; &nbsp;</td></tr><tr><td><a href=\"https://www.gsmarena.com/glossary.php3?term=price\">Price</a></td><td>About 280 EUR</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th rowspan=\"6\">TESTS</th><td><a href=\"https://www.gsmarena.com/glossary.php3?term=benchmarking\">Performance</a></td><td>AnTuTu: 233100 (v7)<br>GeekBench: 10215 (v4.4)<br>GFXBench: 28fps (ES 3.1 onscreen)</td></tr><tr><td><a href=\"https://www.gsmarena.com/gsmarena_lab_tests-review-751p2.php\">Display</a></td><td><a href=\"https://www.gsmarena.com/apple_iphone_x-review-1681p3.php#dt\">Contrast ratio: Infinity (nominal), 5.013 (sunlight)</a></td></tr><tr><td><a href=\"https://www.gsmarena.com/gsmarena_lab_tests-review-751p5.php\">Camera</a></td><td><a href=\"https://www.gsmarena.com/piccmp.php3?idType=1&amp;idPhone1=8858&amp;nSuggest=1\">Photo</a> / <a href=\"https://www.gsmarena.com/vidcmp.php3?idType=3&amp;idPhone1=8858&amp;nSuggest=1\">Video</a></td></tr><tr><td><a href=\"https://www.gsmarena.com/gsmarena_lab_tests-review-751p7.php\">Loudspeaker</a></td><td><a href=\"https://www.gsmarena.com/apple_iphone_x-review-1681p6.php#lt\">Voice 68dB / Noise 74dB / Ring 76dB</a></td></tr><tr><td><a href=\"https://www.gsmarena.com/gsmarena_lab_tests-review-751p4.php\">Audio quality</a></td><td><a href=\"https://www.gsmarena.com/apple_iphone_x-review-1681p7.php#aq\">Noise -93.7dB / Crosstalk -82.8dB</a></td></tr><tr><td><a href=\"https://www.gsmarena.com/gsmarena_lab_tests-review-751p6.php\">Battery life</a></td><td><a href=\"https://www.gsmarena.com/apple_iphone_x-8858.php#\">Endurance rating 74h</a></td></tr></tbody></table></figure>', '2023-04-08 20:34:00', '2023-04-09 21:45:56', 'published', 'top'),
(21, 8, 2, 'Sennheiser HD 400 Pro professional wired headphones', 'wired-headphones', '12.00', '0.00', '', 0, '<p>The Sennheiser HD 400 Pro are a pair of professional mastering headphones. They are the first pair of open-back headphones in the company\'s Pro lineup, which has only had closed-back headphones until now.</p><h3>Design</h3><p>The design of the HD 400 Pro is nearly identical to that of the HD 560S, which itself looks similar to several other HD 500 series headphones.</p><p>The differences between the HD 400 Pro and HD 560S come down to the blacking out of certain details. The silver Sennheiser logo on the side of the earcups has been painted black. Similarly, the Sennheiser wordmark on top of the headband has also been turned black, although it is a bit larger now.</p><h3>Comfort</h3><p>The HD 400 Pro are a comfortable pair of headphones. There is some clamping force but it never gets uncomfortable and helps keep the headphones secure no matter how much you move your head around.</p>', '2023-04-08 20:37:48', '2023-05-07 20:45:28', 'published', 'top'),
(22, 9, 1, 'Butterfly Vine Flower Wall Stickers', 'wall-stickers', '11.00', '1.00', '#000000', 0, '<h2><strong>Item specifics</strong></h2><p><strong>Condition&nbsp;</strong></p><p>New: A brand-new, unused, unopened, undamaged item in its original packaging.</p><p>Design: Art</p><p>Shape: Butterfly</p><p>Material: Vinyl</p><p>Theme: Art</p><p>Type: Wall Decal</p>', '2023-04-16 12:28:57', '2023-04-16 12:29:43', 'published', NULL),
(23, 9, 2, 'Butterfly Vine Flower Wall Stickers', 'wall-stickerss', '12.00', '1.00', '#ff0000,#000000', 0, '<h2><strong>Item specifics</strong></h2><p><strong>Condition&nbsp;</strong></p><p>New: A brand-new, unused, unopened, undamaged item in its original packaging.</p><p>Design: Flower</p><p>Material: Vinyl</p><p>Theme: Art</p><p>Type: Transfers &amp; Stickers</p>', '2023-04-16 12:34:49', '2023-05-07 20:45:16', 'published', NULL),
(24, 9, 1, 'Long Strip Mirror Acrylic Wall Stickers', 'wall-sticker', '123.00', '12.00', '#000000', 0, '<h2><strong>Item specifics</strong></h2><p><strong>Condition&nbsp;</strong></p><p>New: A brand-new, unused, unopened, undamaged item in its original packaging</p><p>Design: Art</p><p>Shape: Butterfly</p><p>Material: Vinyl</p><p>Theme: Art</p><p>Type: Wall Sticker</p><p>Suitable For: Door, Floor, Furniture, Mailbox, Tiles, Wardrobe, Window</p>', '2023-04-16 12:38:14', '2023-05-07 20:45:02', 'published', NULL),
(25, 9, 1, 'Long Strip Mirror Acrylic Wall Stickers', 'wall-stickers', '111.00', '10.00', '#ff0000,#000000', 0, '<h2><strong>Item specifics</strong></h2><p><strong>Condition&nbsp;</strong></p><p>New: A brand-new, unused, unopened, undamaged item in its original packaging.</p><p>Design: Art</p><p>Shape: Butterfly</p><p>Style: Modern</p><p>Material: Vinyl</p><p>Theme: Art</p><p>Type: Mirror Sticker</p>', '2023-04-16 12:43:39', '2023-04-16 12:43:39', 'published', NULL),
(26, 10, 2, 'Vitamin D3+K2 (MK-7)', 'fitness', '12.00', '5.00', '#000000', 0, '<h2><strong>Item specifics</strong></h2><p>&nbsp;</p><h3><strong>Condition&nbsp;</strong></h3><ul><li>New: New: A brand-new, unused, unopened, undamaged item in its original packaging</li><li>Design: Art</li><li>Shape: Butterfly</li><li>Material: Vinyl</li><li>Theme: Art</li><li>Type: Vitamin</li><li>Features: Alcohol Free, All Natural, Eco-Friendly</li><li>Volume: 120pcs</li><li>Color: Light Yellow</li><li>Dosage: 250mcg</li><li>Brand: Mulittea</li></ul><p>&nbsp;</p>', '2023-04-16 12:59:40', '2023-05-07 20:44:43', 'published', NULL),
(27, 11, 2, 'Mens Under Armour Valsetz RTS 1.5', 'men-shoes', '110.00', '10.00', '#000000', 0, '<h2>FEATURES</h2><p>Style: 3021034-001<br>Color: Black/Black/Black<br>Gender: Mens</p><ul><li>Synthetic leather and textile upper materials with welded, abrasion-resistant film around foot perimeter.</li><li>UA ClutchFit™ technology wraps the ankle with a lightweight second skin for optimal support and a great in-shoe feel.</li><li>Lace-up closure.</li><li>TPU toe cap.</li><li>Padded tongue and collar.</li><li>Smooth, breathable textile lining.</li><li>Molded, antimicrobial Ortholite® sockliner provides a comfortable, odor-free foot environment.</li><li>Ultralight Micro G™ EVA midsole for underfoot support and shock absorption.</li><li>Lightweight TPU shank provides mid-foot support and an ideal amount of rigidity.</li><li>New, high traction rubber lug outsole for grip in a variety of conditions.</li><li>Imported.</li><li>Product measurements were taken using size 9.5, width D - Medium. Please note that measurements may vary by size.</li><li>Weight of footwear is based on a single item, not a pair.</li></ul><p>Measurements:</p><ul><li>Weight: 15 oz</li><li>Shaft: 5&nbsp;3⁄4 in</li></ul>', '2023-04-16 21:20:35', '2023-05-07 20:44:33', 'published', NULL),
(28, 12, 1, 'Safety Work Shoes', 'women-shoe', '100.00', '1.50', '#000000', 0, '<h2><strong>Item specifics</strong></h2><p>&nbsp;</p><h3><strong>Condition&nbsp;</strong></h3><ul><li>New without box: A brand-new, unused, and unworn item (including handmade items) that is not in ... Read moreabout the condition</li><li>Brand: Unbranded</li><li>US Shoe Size: multi size</li><li>Style: Sneaker</li><li>Department: Women</li><li>Type: Athletic</li><li>UK Shoe Size: multi size</li><li>Theme: Holiday, Outdoor, Sports, USA, Western</li><li>Upper Material: Mesh (Air mesh)</li><li>Features: Breathable, Comfort, Lightweight</li><li>Accents: Lace</li><li>Shoe Width: Standard</li><li>EU Shoe Size: multi size</li><li>Performance/Activity: Hiking, Riding, Running &amp; Jogging, Walking</li></ul>', '2023-04-16 21:32:27', '2023-05-07 20:45:41', 'published', 'top');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('published','draft') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`, `type`, `category_image`) VALUES
(1, 'Home & Garden', 'home-and-garden', 'published', '2023-03-30 20:32:31', '2023-04-12 18:36:15', 'top', 'app/category_image/6436c1de2a9d8.webp'),
(2, 'Electronics', 'electronics', 'published', '2023-03-30 20:52:28', '2023-05-02 23:37:45', 'top', 'app/category_image/643838741a7f0.png'),
(3, 'Travel', 'travel', 'published', '2023-04-05 19:12:39', '2023-05-07 20:24:16', 'top', 'app/category_image/6457d0b0b9a8e.jfif'),
(4, 'Fashion & Beauty', 'faishion-and-beauty', 'published', '2023-04-05 19:13:32', '2023-05-07 20:22:39', 'top', 'app/category_image/6457d04f34d89.png'),
(5, 'Automotive', 'automotive', 'published', '2023-04-05 19:14:00', '2023-05-07 20:23:40', 'top', 'app/category_image/6457d08cadc04.jfif'),
(6, 'Health & Fitness', 'health-and-fitness', 'published', '2023-04-05 19:14:27', '2023-04-16 12:48:33', 'top', 'app/category_image/643bb657c8609.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Red', '#ff0000', '2023-04-03 21:46:41', '2023-04-03 21:46:41'),
(2, NULL, 'Green', '#00a31b', '2023-04-03 21:47:00', '2023-04-03 21:47:00'),
(3, NULL, 'Black', '#000000', '2023-04-03 21:47:07', '2023-04-03 21:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` enum('cover','other') NOT NULL DEFAULT 'other',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'fb48bba0c548ff24e2c6c05b75374a95.jpg_720x720.jpg_.webp', 'app/product_images/642b130283958.webp', 'other', NULL, NULL),
(2, 1, 'b67c790c5d4b39e54651a75287516073.jpg_720x720.jpg_.webp', 'app/product_images/642b1302c7615.webp', 'other', NULL, NULL),
(3, 2, 'apple-iphone-14-3.jpg', 'app/product_images/642b183d42af9.jpg', 'other', NULL, NULL),
(4, 2, 'gsmarena_001.jpg', 'app/product_images/642b183d4ac3c.jpg', 'other', NULL, NULL),
(5, 2, 'gsmarena_002.jpg', 'app/product_images/642b183d55c91.jpg', 'other', NULL, NULL),
(6, 3, 'gsmarena_003.jpg', 'app/product_images/642b199d6667c.jpg', 'other', NULL, NULL),
(7, 3, 'download (2).jfif', 'app/product_images/642b199d73d06.jfif', 'other', NULL, NULL),
(8, 3, 'download (1).jfif', 'app/product_images/642b199d7573c.jfif', 'other', NULL, NULL),
(9, 3, 'download.jfif', 'app/product_images/642b199d7693f.jfif', 'other', NULL, NULL),
(10, 4, 'MPU73_AV3.jfif', 'app/product_images/642b1a45b06eb.jfif', 'other', NULL, NULL),
(11, 4, 'MPU73.jfif', 'app/product_images/642b1a45b4d52.jfif', 'other', NULL, NULL),
(12, 4, 'MPU73_AV1.jfif', 'app/product_images/642b1a45b842e.jfif', 'other', NULL, NULL),
(13, 5, 'Rectangle 20.png', 'app/product_images/642dbb9e69809.png', 'other', NULL, NULL),
(14, 6, 'Rectangle 51.png', 'app/product_images/642dbbe2ec6b0.png', 'other', NULL, NULL),
(16, 8, 'Rectangle 76.png', 'app/product_images/642dbe234d76b.png', 'other', NULL, NULL),
(17, 7, 'Rectangle 75.png', 'app/product_images/642dbf85edab4.png', 'other', NULL, NULL),
(18, 9, 'apple-iphone-14-3.jpg', 'app/product_images/642f04c1b933c.jpg', 'other', NULL, NULL),
(19, 10, 'book.jpg', 'app/product_images/64310fbaef9b0.jpg', 'other', NULL, NULL),
(20, 11, 'Android-Mobile-Fast-Travel-Charger.jpg', 'app/product_images/6431346a6c25d.jpg', 'other', NULL, NULL),
(21, 12, 'Screenshot_1.png', 'app/product_images/643192a46ef7a.png', 'other', NULL, NULL),
(22, 14, 'Screenshot_2.png', 'app/product_images/6431933746a99.png', 'other', NULL, NULL),
(23, 13, 'Screenshot_1.png', 'app/product_images/643193683be7d.png', 'other', NULL, NULL),
(24, 15, 'unnamed.jpg', 'app/product_images/64319413669bb.jpg', 'other', NULL, NULL),
(25, 16, 'images.jfif', 'app/product_images/6431946249ff6.jfif', 'other', NULL, NULL),
(26, 17, 'images (1).jfif', 'app/product_images/643194e65445d.jfif', 'other', NULL, NULL),
(27, 18, 'images (2).jfif', 'app/product_images/64319544557a3.jfif', 'other', NULL, NULL),
(28, 20, 'unnamed (1).jpg', 'app/product_images/64319778ab029.jpg', 'other', NULL, NULL),
(29, 21, 'images (4).jfif', 'app/product_images/6431985ca0107.jfif', 'other', NULL, NULL),
(30, 22, 'unnamed (1).jpg', 'app/product_images/643bb1c9e72e2.jpg', 'other', NULL, NULL),
(31, 22, 'unnamed (2).jpg', 'app/product_images/643bb1c9f146c.jpg', 'other', NULL, NULL),
(32, 22, 'unnamed.jpg', 'app/product_images/643bb1ca00be6.jpg', 'other', NULL, NULL),
(33, 23, 'unnamed (3).jpg', 'app/product_images/643bb3296d575.jpg', 'other', NULL, NULL),
(34, 23, 'unnamed (2).jpg', 'app/product_images/643bb329728d7.jpg', 'other', NULL, NULL),
(35, 23, 'unnamed (5).jpg', 'app/product_images/643bb32975f8e.jpg', 'other', NULL, NULL),
(36, 24, 'unnamed (9).jpg', 'app/product_images/643bb3f688b3e.jpg', 'other', NULL, NULL),
(37, 24, 'unnamed (7).jpg', 'app/product_images/643bb3f68f745.jpg', 'other', NULL, NULL),
(38, 24, 'unnamed (8).jpg', 'app/product_images/643bb3f6931f9.jpg', 'other', NULL, NULL),
(39, 25, 'unnamed (10).jpg', 'app/product_images/643bb53ba4240.jpg', 'other', NULL, NULL),
(40, 25, 'unnamed (11).jpg', 'app/product_images/643bb53ba9de2.jpg', 'other', NULL, NULL),
(45, 27, 'download.jfif', 'app/product_images/643c2e630676e.jfif', 'other', NULL, NULL),
(46, 28, 's-l500 (1).jpg', 'app/product_images/643c312bd34ee.jpg', 'other', NULL, NULL),
(47, 28, 's-l500.jpg', 'app/product_images/643c312bda334.jpg', 'other', NULL, NULL),
(50, 26, 'unnamed (1).jpg', 'app/product_images/6460c25ef40d0.jpg', 'other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_links`
--

CREATE TABLE `product_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `links` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_links`
--

INSERT INTO `product_links` (`id`, `product_id`, `links`, `created_at`, `updated_at`) VALUES
(3, 3, 'https://www.gsmarena.com/the_best_chargers_for_your_new_iphone-review-2205.php', NULL, '2023-04-03 22:24:06'),
(20, 2, 'https://www.gsmarena.com/apple_iphone_14-review-2481.php', NULL, '2023-04-06 21:46:00'),
(22, 22, 'https://www.ebay.com/itm/261405632641?var=560300001882', NULL, '2023-04-16 12:29:43'),
(25, 25, 'https://www.ebay.com/itm/374367750428?_trkparms=amclksrc%3DITM%26aid%3D1110006%26algo%3DHOMESPLICE.SIM%26ao%3D1%26asc%3D247311%26meid%3D6ab5934c6cec4855b786a2d2fc6853ac%26pid%3D101195%26rk%3D2%26rkt%3D12%26sd%3D374371283170%26itm%3D374367750428%26pmt%3D1%26noa%3D0%26pg%3D2047675%26algv%3DSimplAMLv11WebTrimmedV3MskuWithLambda85KnnRecallV1V4V6ItemNrtInQueryAndCassiniVisualRankerAndBertRecallCPCBlended%26brand%3DUnbranded&_trksid=p2047675.c101195.m1851&amdata=cksum%3A3743677504286ab5934c6cec4855b786a2d2fc6853ac%7Cenc%3AAQAIAAABUClE7Rni7LPdZba0E4PpnN9sqdNIfzrngjJmhUj%252BPVGabI8X4okIddREUp4Q0zc2AzeQ%252BYWQSxoBqGa9J%252Bx35NrBHVFYUVGsflNyHmFJfvouFhcLtSal3PrT8uqN34xP8tTkRtMZH%252Bjfqn4MA7rMqmrxhcFjZy770aRcRZMS5xbBXU2Wjq580F6rmweOPtNxcJkjPsEZlNmEKxvTi6iOpwrslKull%252B9tPqP1W%252BTw4PrU7zcvRtjz6nta9VDUPgyaNsttYDeq%252BzmiaTd4HkRoHnu0Ve6CvIUtMZkG2f7upYnW%252FsVuoFvSgdyrkVaj7fy5Uc9rH2IN9s1vRdCIEkYW9bO9Rg7G4AlX8uzPgKxWK1qoACi%252FC9F4JbhW6bNlxW22EJrMTj1p4mtSKO4ctHBckVQbGwVgveeCE2en9UDWf0T455lo2Py3NJBAKafDcZrehg%253D%253D%7Campid%3APL_CLK%7Cclp%3A2047675', '2023-04-16 12:43:39', NULL),
(40, 27, 'https://www.ebay.com/itm/283462450072?_trkparms=5373%3A5000014492%7C5374%3AFashion%7C5079%3A5000014492', NULL, '2023-05-07 20:44:33'),
(42, 24, 'https://www.ebay.com/itm/374371283170?_trkparms=amclksrc%3DITM%26aid%3D1110006%26algo%3DHOMESPLICE.SIM%26ao%3D1%26asc%3D20201210111451%26meid%3Db56c679c1e66452cb10419f2fd2b8a7a%26pid%3D101196%26rk%3D4%26rkt%3D12%26sd%3D260636126263%26itm%3D374371283170%26pmt%3D1%26noa%3D0%26pg%3D2047675%26algv%3DSimplAMLv5PairwiseWebWithBBEV2bAndUBSourceDemotionWithUltimatelyBoughtOfCoviewV1%26brand%3DUnbranded&_trksid=p2047675.c101196.m2219&amdata=cksum%3A374371283170b56c679c1e66452cb10419f2fd2b8a7a%7Cenc%3AAQAIAAABMPzGgyhK8D4QCApcBuWVQe1qsoN395NgJVWTF7eo2rfipPwdfCio0EI4F5H%252Bx0wtS8%252Fu%252Fr%252FRUxEZ1KxNtbAGuwQqNawa9Mz45LW45pYy0nuj7yInofBJapOqSi4e%252FotVXZI%252FL0qfUTzD6dwGYjICsYDfKkVBElxzfmo2WTg3Je8oBO14Dwqiiy8BHN%252FclVMzpcAdCCnn5OmUYCXlOta8ytSfsZ%252F1fQ83wg%252FBPAoqwWKv%252BeaXWp2KJzcpWcF1m4P60VbA3VBNp0FbeTrNYTIJaxACLarWGmu48CZFAtVd0WyCR%252Fa00I2mLJXHuJY1rbAhxzlysiuqK3H8tT8vri%252B1VUV65pkYLbvG7UYxXHFCiGg%252FgEfEDjQ%252BQejIfgaFDknuw65umLd6Bw0llQJMBTEHUCk%253D%7Campid%3APL_CLK%7Cclp%3A2047675', NULL, '2023-05-07 20:45:03'),
(43, 23, 'https://www.ebay.com/itm/260636126263?_trkparms=amclksrc%3DITM%26aid%3D1110006%26algo%3DHOMESPLICE.SIM%26ao%3D1%26asc%3D20201210111451%26meid%3Da8ff8f81d11a47e58e98318f10b7cdeb%26pid%3D101196%26rk%3D4%26rkt%3D12%26sd%3D261405632641%26itm%3D260636126263%26pmt%3D1%26noa%3D0%26pg%3D2047675%26algv%3DSimplAMLv5PairwiseWebWithBBEV2bAndUBSourceDemotionWithUltimatelyBoughtOfCoviewV1&_trksid=p2047675.c101196.m2219&amdata=cksum%3A260636126263a8ff8f81d11a47e58e98318f10b7cdeb%7Cenc%3AAQAIAAABIPzGgyhK8D4QCApcBuWVQe1qsoN395NgJVWTF7eo2rfipPwdfCio0EI4F5H%252Bx0wtS8%252Fu%252Fr%252FRUxEZ1KxNtbAGuwQqNawa9Mz45LW45pYy0nujtRUk6V9ViNwskkoQd25Z%252B93nqq22mqNA67WXfvw3D5yVQsBaZASwt4ZQKVa0wurPZmLiCflM9RKIaTGrqLdJIW65Mik8OIyefLPsJK7xNtjXUkjN5yoijWFdvOxXTQVUESxuSbFwofQM6m6RpH9RIHmlsSkmI3tzdJinRdzy7WWKlzu9pT78%252Bt7sQ4v6xsPNfHwOnhncTRHsPSAmcAOAYm0I6flyQ87jW5DZoT3WkQAH2AR1xBvtZCtNfDsGO9NZew3XQNBgCmoUUMT1oO257g%253D%253D%7Campid%3APL_CLK%7Cclp%3A2047675', NULL, '2023-05-07 20:45:16'),
(44, 28, 'https://www.ebay.com/itm/385536271185?hash=item59c3c0a351:g:5YsAAOSwIkZh-Emr&amdata=enc%3AAQAIAAAA4GfJh6%2BpIhkMGDbK2YUwm6iJE%2Bd1Yh7%2BRIQxjdmRopy7NOic3W3ANDuyKFrFSIuhTCEYxhI5DkBIDrbDeT0f%2Ff20o4to%2FdK1m3p5YYTyvWGsX0m1%2B%2BbwHS3fXoSkvdBIOAOe6dCtKYdfA4S8BAY5LZoPos%2FtmWzayKl3OVXuR3uivkGgoYNiEhD%2BKiN5WtG%2F4kS%2BLyJh5e45ZBDcnHkO1xEZ%2Bsm8yUHGhaXOnxcFetrwDGItYtZJ%2BR7YDfWShkR%2BhAOKb1SFv%2Fg7xx%2BmW%2BxlQzyjZHoIIyiOtgFwm9hGnl5H%7Ctkp%3ABFBM1qbQsfFh', NULL, '2023-05-07 20:45:41'),
(45, 4, 'https://www.apple.com/shop/product/MPU73ZM/A/Iphone-14-pro-max-clear-case-with-magsafe?fnode=70130698b8828d0e08f6307a1a40aa0f45c58dbe6db607490e1d84f693b4fe9b952c8c59d73fa110480371894db91aa004c2e003152356adfeddbc37610659035ff0a993e7aa1e9eb713cfbb262d9de178c4ebba833379f547aef36ee570eb0bbb3d1abbf041e191d18432c4206c6609', NULL, '2023-05-07 20:46:23'),
(46, 26, 'https://www.ebay.com/itm/385401092741?hash=item59bbb1fa85:g:VdgAAOSw4r5j42zc&amdata=enc%3AAQAIAAAA4BXrWKtE4j94cpD34UC2Ln8qwj7Ckfu8jDaokRUj3tKm%2FZbSYW7kzRQW3S1BrozkNNe38ZbOJSyHxEDz3IPQK7alQF0ErlM6SUdzdI0GcxsjT25bSZQD0Zu9wbR0JWpopEJpyF16XIaq4QAfiS55hA3b9tEaidI76IpWM1%2BI9OUV68youn7F93bbvRISXTOOoDfMXSmtdRbgOskyRQdppKmJ8bmlEYOkyh3navGYI%2FNKzLkJLYpTdqcbxLJ%2BYIZZjt6oof%2F6bmQVbdaYUdbH14iMPZqBWADNw4R701MuA%2BeY%7Ctkp%3ABFBM3oSZlPFh', NULL, '2023-05-14 15:13:34'),
(47, 5, 'https://www.apple.com/shop/product/MPU73ZM/A/Iphone-14-pro-max-clear-case-with-magsafe?fnode=70130698b8828d0e08f6307a1a40aa0f45c58dbe6db607490e1d84f693b4fe9b952c8c59d73fa110480371894db91aa004c2e003152356adfeddbc37610659035ff0a993e7aa1e9eb713cfbb262d9de178c4ebba833379f547aef36ee570eb0bbb3d1abbf041e191d18432c4206c6609', NULL, '2023-05-14 15:19:08'),
(48, 6, 'https://www.apple.com/shop/product/MPU73ZM/A/Iphone-14-pro-max-clear-case-with-magsafe?fnode=70130698b8828d0e08f6307a1a40aa0f45c58dbe6db607490e1d84f693b4fe9b952c8c59d73fa110480371894db91aa004c2e003152356adfeddbc37610659035ff0a993e7aa1e9eb713cfbb262d9de178c4ebba833379f547aef36ee570eb0bbb3d1abbf041e191d18432c4206c6609', NULL, '2023-05-14 15:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sections`
--

CREATE TABLE `product_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sections`
--

INSERT INTO `product_sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Trends', '2023-03-30 20:31:53', '2023-03-30 20:31:53'),
(2, 'Deal of the Day', '2023-03-30 20:53:45', '2023-03-30 20:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('published','draft') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`id`, `category_id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 'Gaming Devices', 'electronics-gaming-device', 'published', '2023-04-03 21:51:14', '2023-04-08 20:01:58'),
(4, 2, 'TV', 'tv', 'published', '2023-04-08 20:04:16', '2023-04-08 20:04:30'),
(5, 2, 'Smartphones', 'smartphone', 'published', '2023-04-08 20:05:01', '2023-04-08 20:05:01'),
(6, 2, 'Laptops', 'laptops', 'published', '2023-04-08 20:05:16', '2023-04-08 20:05:16'),
(7, 2, 'Tablets', 'tablets', 'published', '2023-04-08 20:05:53', '2023-04-08 20:05:53'),
(8, 2, 'Headphones', 'headphones', 'published', '2023-04-08 20:06:12', '2023-04-08 20:06:12'),
(9, 1, 'Home Decor', 'home-decor', 'published', '2023-04-16 12:29:28', '2023-04-16 12:29:28'),
(10, 6, 'Health & Fitness', 'fitness', 'published', '2023-04-16 12:52:38', '2023-04-16 12:52:38'),
(11, 4, 'Men\'s Shoes', 'men-shoes', 'published', '2023-04-16 21:21:29', '2023-04-16 21:21:29'),
(12, 4, 'Women Shoes', 'women-shoe', 'published', '2023-04-16 21:24:00', '2023-04-16 21:24:00'),
(13, 4, 'Jewellery', 'jewellery', 'published', '2023-04-16 21:25:02', '2023-04-16 21:25:02'),
(14, 4, 'women dresses', 'dresses', 'draft', '2023-04-16 21:25:25', '2023-04-16 21:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_wish_lists`
--

CREATE TABLE `product_wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(9, 'asimchohan04349@gmail.com', NULL, NULL),
(10, 'haseebevent@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `type` enum('admin','website') NOT NULL DEFAULT 'website',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `pin_verification` varchar(255) DEFAULT NULL,
  `pin_verification_time` datetime DEFAULT NULL,
  `forget_password_pin_verification` varchar(255) DEFAULT NULL,
  `forget_password_pin_verification_time` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `city`, `state`, `country`, `type`, `email_verified_at`, `pin_verification`, `pin_verification_time`, `forget_password_pin_verification`, `forget_password_pin_verification_time`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `profile_image`) VALUES
(1, 'Asym Rasheed', 'asym@gmail.com', 'male', NULL, NULL, NULL, 'admin', NULL, NULL, NULL, 'ATJNTASPIH', '2023-03-28 23:24:39', '$2y$10$T1iDqqAg9w/ys7gV.Hz3Oe/10KdEVDBUomBVerpLLQHqj1XPs/AmC', 'P50wIoOplKcNAZz3HMmjy4HwJNjUf8zFPuAmYA6w7bIHbaXzChWCabRolpvt', NULL, '2023-03-29 03:24:39', 'enabled', NULL),
(2, 'asym rasheed', 'asimchohan04349@gmail.com', 'male', 'london', NULL, 'UK', 'admin', NULL, '9JE2IBWVHQ', '2023-03-26 19:10:10', '5818', '2023-04-21 11:48:51', '$2y$10$T1iDqqAg9w/ys7gV.Hz3Oe/10KdEVDBUomBVerpLLQHqj1XPs/AmC', NULL, '2023-03-26 22:52:51', '2023-04-21 15:48:51', 'enabled', NULL),
(3, 'asym rasheed', 'asymrasheed@mailinator.com', 'male', 'london', NULL, 'UK', 'website', NULL, 'Y7IPDQEWVQ', '2023-03-26 19:20:53', '9429', '2023-04-14 18:04:10', '123456', NULL, '2023-03-26 23:11:09', '2023-04-14 22:04:10', 'enabled', NULL),
(4, 'Haseeb Ahsan', 'hasy.ahsan@gmail.com', 'male', 'Lahore', 'Punjab', 'Pakistan', 'admin', '2023-04-24 22:32:45', '', '2023-04-24 18:32:02', '', '2023-04-24 18:30:54', '$2y$10$hUcmjq1XH8oOfQyEKEfkVeqUxbANOGm491cN8RIb1WaoTwB0.c8Ru', NULL, '2023-03-30 20:50:33', '2023-05-14 15:09:14', 'enabled', 'app/profile_image/6460c15a3ef2f.jpg'),
(5, 'Xavior charls', 'charls@gmail.com', 'male', 'Aruba', NULL, 'Angola', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$HyUmn8RZnRnQgm6t6WtVB.NnYHCL8ZHZFD2pw1YVEDKL2wc41Wf5K', NULL, '2023-04-01 19:29:24', '2023-04-01 19:29:24', 'enabled', NULL),
(6, 'Muhammad Bilal', 'expbilal@gmail.com', 'male', 'Panama', NULL, 'Aruba', 'website', NULL, '8703', '2023-04-26 20:28:09', '4900', '2023-04-02 00:19:48', '$2y$10$G5vWAcgC7457UB/w2WoL9.xEzDa9cIZ6TZO.Wyq/1CfcRR3.NzKS6', NULL, '2023-04-01 21:47:39', '2023-04-27 00:28:09', 'enabled', NULL),
(7, 'asym rasheed', 'asymrashid@mailinator.com', 'male', 'london', NULL, 'UK', 'website', NULL, NULL, NULL, '4467', '2023-04-01 18:54:16', '$2y$10$0bD1HJkZIYiqSB/2T5TL7u7ry3XARh33PeDQCKHafuW0v7hBukRAy', NULL, '2023-04-01 22:54:10', '2023-04-01 22:54:16', 'enabled', NULL),
(8, 'Muhammad Bilal', 'expertbilal@mailinator.com', 'male', 'Lahore', NULL, 'Pakistan', 'website', NULL, '3126', '2023-04-01 19:44:52', NULL, NULL, '$2y$10$0YZm/JDekD9iKf8a5SzrnOT5WkgIprf3SDiTPl1zGvBtlaevw/l6W', NULL, '2023-04-01 23:44:51', '2023-04-01 23:44:52', 'enabled', NULL),
(9, 'testing', 'tester2@mailinator.com', 'male', 'Lahore', NULL, 'Pakistan', 'website', NULL, '3022', '2023-04-01 20:12:26', NULL, NULL, '$2y$10$AYtPo7rk5HJksXojmgV5vOL7lYm3yJDVkW9NvTy36cZCfgJ7TSiYu', NULL, '2023-04-02 00:12:25', '2023-04-02 00:12:26', 'enabled', NULL),
(10, 'Muhammad Bilal', 'testing@mailinator.com', 'male', 'Ashkāsham', NULL, 'Afghanistan', 'website', NULL, '7725', '2023-04-01 20:25:50', NULL, NULL, '$2y$10$zuwg1UTQoF6EvH3E1B1EM.ytQe089uwDlbcwcRKhypMdQVcLhyqhm', NULL, '2023-04-02 00:25:49', '2023-04-02 00:25:50', 'enabled', NULL),
(11, 'asd', 'testis@mailinator.com', 'male', 'Ashkāsham', NULL, 'Afghanistan', 'website', NULL, '8999', '2023-04-01 20:29:04', NULL, NULL, '$2y$10$2/72hO7M8KbMxjijYH8lAuQG0wK8oJ1QU55ybV8k7bMQlL1oVnZCu', NULL, '2023-04-02 00:29:03', '2023-04-02 00:29:04', 'enabled', NULL),
(12, 'asd', 'testiss@mailinator.com', 'male', 'Ashkāsham', NULL, 'Afghanistan', 'website', NULL, '9870', '2023-04-01 20:31:24', NULL, NULL, '$2y$10$wumyLPL7uQIRUPhHBKHKy.lHY8trV4UMKlYtfiSWQsNipBVBdHhgG', NULL, '2023-04-02 00:31:13', '2023-04-02 00:31:24', 'enabled', NULL),
(13, 'asd', 'testm@mailinator.com', 'male', 'Ashkāsham', NULL, 'Afghanistan', 'website', NULL, '4959', '2023-04-01 22:13:21', '', '2023-04-01 23:27:10', '$2y$10$2ey9OBf4eFPw1gLA.ARPr.Sl8YywAtnBYDMamt.T.OSFhWfq0bmiG', NULL, '2023-04-02 00:31:49', '2023-04-02 03:30:53', 'enabled', NULL),
(14, 'asd', 'testk@mailinator.com', 'male', 'Ashkāsham', NULL, 'Afghanistan', 'website', NULL, '6852', '2023-04-01 20:33:33', NULL, NULL, '$2y$10$WATIoHlnjsYBlH9WZ6hjg.m7La092VuhgoUDOoHkxDhNIkjd4Eefa', NULL, '2023-04-02 00:33:32', '2023-04-02 00:33:33', 'enabled', NULL),
(15, 'asd', 'testka@mailinator.com', 'male', 'Ashkāsham', NULL, 'Afghanistan', 'website', NULL, '8856', '2023-04-01 20:34:17', NULL, NULL, '$2y$10$B56eIWw2MMFthGqpOqYy9uk7TkSXzr8osbGQ7NnEVgYkFLlCQV2aC', NULL, '2023-04-02 00:34:13', '2023-04-02 00:34:17', 'enabled', NULL),
(16, 'asd', 'testkaa@mailinator.com', 'male', 'Ashkāsham', NULL, 'Afghanistan', 'website', NULL, '6953', '2023-04-01 20:34:44', NULL, NULL, '$2y$10$.NBW/OOlIYH./npIo3OOeeZ3Ux2HuJr10Yquz3yuTNyPr4qMqrOQm', NULL, '2023-04-02 00:34:43', '2023-04-02 00:34:44', 'enabled', NULL),
(17, 'asd', 'testkaa1@mailinator.com', 'male', 'Ashkāsham', NULL, 'Afghanistan', 'website', NULL, '7502', '2023-04-01 20:36:35', NULL, NULL, '$2y$10$EsaPOof5nnGczdUs4pomC.s0QWV031BwL1I1E96.yHoZgkFZtlHaC', NULL, '2023-04-02 00:36:34', '2023-04-02 00:36:35', 'enabled', NULL),
(18, 'asd', 'hhh@mailinator.com', 'male', 'Ashkāsham', NULL, 'Afghanistan', 'website', '2023-04-02 00:40:32', '', '2023-04-01 20:40:08', NULL, NULL, '$2y$10$V/y.h0B6prbZloXF66upf.PhdER58LzLghZX8pEao/KMsSmqdpxUq', NULL, '2023-04-02 00:37:35', '2023-04-02 00:40:32', 'enabled', NULL),
(19, 'asd', 'asd@gmail.com', 'male', 'Qala i Naw', NULL, 'Afghanistan', 'website', NULL, '3261', '2023-04-01 21:12:19', NULL, NULL, '$2y$10$RffGGy201v27zWWoKhq/r.BNnUSfV1rkW1jbMGDTS/URUkjq8iM.S', NULL, '2023-04-02 01:12:18', '2023-04-02 01:12:19', 'enabled', NULL),
(20, 'asd', 'asd@mailinator.com', 'male', 'Qala i Naw', NULL, 'Afghanistan', 'website', '2023-04-02 01:13:31', '', '2023-04-01 21:12:39', NULL, NULL, '$2y$10$10258INA7ZPhttzpM9rPqO921asp9KkqvAyZrEFCiAI1uB8pp4VBm', NULL, '2023-04-02 01:12:38', '2023-04-02 01:13:31', 'enabled', NULL),
(21, 'ooo', 'oo@mailinator.com', 'male', 'Bab Ezzouar', NULL, 'Algeria', 'website', '2023-04-02 01:20:03', '', '2023-04-01 21:19:37', NULL, NULL, '$2y$10$bmnzbjSiy/tVJZpTbg7yUeN4B99a4FiG0Iw0t1keFjqMNvDqA9nz6', NULL, '2023-04-02 01:17:50', '2023-04-02 01:20:03', 'enabled', NULL),
(22, 'asd', 'aa@mailinator.com', 'male', 'Andorra la Vella', NULL, 'Andorra', 'website', '2023-04-02 01:24:10', '', '2023-04-01 21:23:51', NULL, NULL, '$2y$10$WMh640qx7xmNrpmP9zR0aOuMaEax.cLGwY4V0.fxPLbuLpnuPoXvm', NULL, '2023-04-02 01:23:31', '2023-04-02 01:24:10', 'enabled', NULL),
(23, 'cool', 'coolgy@mailinator.com', 'male', 'Lahore', NULL, 'Pakistan', 'website', '2023-04-02 04:03:28', '', '2023-04-02 00:03:04', NULL, NULL, '$2y$10$v4wMn2.wgJQWuuSivbIrVu5SzpJQDrJIN8RPz730GlZJi5uNUeUHu', NULL, '2023-04-02 04:03:03', '2023-04-02 04:03:28', 'enabled', NULL),
(24, 'asdasd', 'adus@mailinator.com', 'male', 'Abu Dhabi Island and Internal Islands City', NULL, 'United Arab Emirates', 'website', NULL, '4965', '2023-04-02 00:22:41', NULL, NULL, '$2y$10$NEB9RGvKatlGBSG.nzd0aOlLIVZfEteG4wnXXihp0HgtlMLWBuiVC', NULL, '2023-04-02 04:22:40', '2023-04-02 04:22:41', 'enabled', NULL),
(25, 'asym', 'asym@mailinator.com', 'male', 'Lahore', NULL, 'Pakistan', 'website', '2023-04-02 22:16:20', '', '2023-04-02 18:15:25', '6824', '2023-04-04 18:18:11', '$2y$10$xrumhlc4x2AXhB1hhDy5AesGnuGd.f.NbOwQ526qAwDDiAiJ5IlZW', NULL, '2023-04-02 22:14:20', '2023-04-04 22:18:11', 'enabled', NULL),
(26, 'Test02', 'test02@mailinator.com', 'male', 'Lahore', NULL, 'Pakistan', 'website', '2023-04-02 22:50:01', '', '2023-04-02 18:49:21', NULL, NULL, '$2y$10$RfQB1ckAOu3g3H9dJcvV3.8nrGYbualtmNqfWhFtMR.13AQ7swZ5a', NULL, '2023-04-02 22:49:20', '2023-04-02 22:50:01', 'enabled', NULL),
(27, 'Haseeb', 'hasy.ahsan+1@gmail.com', 'Other', 'Ahmadpur Sial', NULL, 'Pakistan', 'website', NULL, '4224', '2023-04-03 18:29:22', NULL, NULL, '$2y$10$Lx66anOY.QRQB9ECO7mTmuWeN/0UfF.rL4bmPS54xxtGIwQ2SNinC', NULL, '2023-04-03 22:29:21', '2023-04-03 22:29:22', 'enabled', NULL),
(28, 'Haseeb', 'abdul.haseeb3353@gmail.com', 'Other', 'Ahmadpur Sial', NULL, 'Pakistan', 'website', NULL, '6069', '2023-04-03 18:35:36', NULL, NULL, '$2y$10$qEvbZaGa2H6M3Mbs0bpkf.DQNfcdZsdFEcgWb5IN6N5NfqWzdoHKC', NULL, '2023-04-03 22:32:00', '2023-04-03 22:35:36', 'enabled', NULL),
(29, 'asym', 'asym123@gmail.com', NULL, NULL, NULL, NULL, 'website', NULL, '5163', '2023-04-03 19:03:13', NULL, NULL, '$2y$10$GkMyUEXPz8oEqwzt8EjotO.PnernOytgHf/f9D3A4CLIcSCA/EGIK', NULL, '2023-04-03 22:56:58', '2023-04-03 23:03:13', 'enabled', NULL),
(30, 'haseeb', 'haseeb@mailnator.com', 'Male', 'Dublin City', NULL, 'Ireland', 'website', NULL, '9395', '2023-04-04 18:10:06', NULL, NULL, '$2y$10$rbOsWwz/.xscUyywH.yFbezu4OL1HZSZD./qwJ0cgeziHloQ1Ut0S', NULL, '2023-04-04 22:10:06', '2023-04-04 22:10:06', 'enabled', NULL),
(31, 'haseeb', 'asym@mailnator.com', 'Male', 'Dublin City', NULL, 'Ireland', 'website', NULL, '8642', '2023-04-04 18:10:47', '9074', '2023-04-04 18:12:26', '$2y$10$Pf35eRFc.vErcZ7Akyyunu/LQ0/EZ7JbfjP2V7jF9PU6UbDKNo5Qe', NULL, '2023-04-04 22:10:46', '2023-04-04 22:22:32', 'enabled', NULL),
(32, 'Haseeb', 'haseeb@mailinator.com', 'Male', 'Arklow', '', 'Ireland', 'website', '2023-04-09 12:11:16', '', '2023-04-09 08:10:35', NULL, NULL, '$2y$10$0hkU/gUgLCvNdkiTc5v4WuAwVivA7HAya4JVxmu2wa1oGPTF8rJ5G', NULL, '2023-04-04 22:19:20', '2023-04-13 21:45:42', 'enabled', 'app/profile_image/64383fc641fb8.png'),
(33, 'asim', 'asim@mailinator.com', 'Other', 'An Muileann gCearr', NULL, 'Ireland', 'website', '2023-04-04 22:26:14', '', '2023-04-04 18:25:29', NULL, NULL, '$2y$10$WRQsXZ2XRfgTUsirf25kQuBbWeP2L/bymqop4inoTzkF4tPm4X/MW', NULL, '2023-04-04 22:25:29', '2023-04-04 22:26:14', 'enabled', NULL),
(34, 'bilal x', 'bilal@mailinator.com', 'Male', 'Bhimbar', 'Azad Kashmir', 'Pakistan', 'website', '2023-04-05 23:02:12', '3600', '2023-04-06 23:59:31', '', '2023-04-12 20:24:08', '$2y$10$qQfuqEteVu1fkB5CsHPxxOLuj6/NeE7daJJeBKL7q0mObUopd2Ymu', NULL, '2023-04-05 23:01:59', '2023-04-13 00:25:54', 'enabled', 'app/profile_image/6436eacf2be26.png'),
(35, 'Haseeb', 'john@mailinator.com', 'Male', 'Alik Ghund', NULL, 'Pakistan', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$sNof51xPyR2549l38MhXMuLiSd7kf6T01Jzi/smhGxY.wmtBwrEga', NULL, '2023-04-06 21:36:37', '2023-04-06 21:36:37', 'enabled', NULL),
(36, 'Haseeb', 'kevin@mailinator.com', 'Male', 'Alik Ghund', NULL, 'Pakistan', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$YCbirw8smW3hofP4eSn.pO3ZfUswrTb86NnNwqMN.tQUsuvVC6/iq', NULL, '2023-04-06 21:36:59', '2023-04-06 21:36:59', 'enabled', NULL),
(37, 'asym rasheed', 'asymrashidd@mailinator.com', 'male', 'london', NULL, 'UK', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$1tR2aXMqt0ER9fUM9/XMhugpYHi.h6V92DXB2bP/kO0Gp24zZaF..', NULL, '2023-04-07 03:18:55', '2023-04-07 03:18:55', 'enabled', NULL),
(38, 'Haseeb Ahsan', 'abdul.haseeb3352@gmail.com', 'Male', 'Kotli', NULL, 'Pakistan', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$HMfQOEKQoSP1lFccddklEuKRZjB42kaQi99GZU4kzCu1TKFDRTs2u', NULL, '2023-04-21 23:04:53', '2023-04-21 23:04:53', 'enabled', NULL),
(39, 'Haseeb Ahsan', 'chenabian.001@gmail.com', 'Male', 'Kotli', NULL, 'Pakistan', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$l5izj0hUg/5pZ56KMfsCqO8OU35fzTH8Jeqa1wbA9EggY1SXCL3XG', NULL, '2023-04-21 23:05:45', '2023-04-21 23:05:45', 'enabled', NULL),
(40, 'Haseeb Ahsan', 'chapairkha@gmail.com', 'Male', 'Kotli', '', 'Pakistan', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$Dx66jRsZTASKTPssLp8ehOx2C65PBajtbOeGKr8XtlQVPgi8ocokW', NULL, '2023-04-21 23:06:14', '2023-04-21 23:08:06', 'enabled', 'app/profile_image/6442df16e8694.jpg'),
(41, 'Haseeb Event', 'haseebevent@gmail.com', 'Male', 'Ghormach', '', 'Afghanistan', 'website', '2023-04-21 23:12:37', '', '2023-04-21 19:11:56', NULL, NULL, '$2y$10$aX.a4GKRoVf.D1GR2.YvmOsgxE94TNnTrA.SSxnt50l.nR1fUBywS', NULL, '2023-04-21 23:10:13', '2023-04-21 23:15:31', 'enabled', 'app/profile_image/6442e0d37e1ff.jpg'),
(42, 'jahanzaib', 'cibikes893@meidecn.com', 'Male', 'Ghormach', NULL, 'Afghanistan', 'website', NULL, '6096', '2023-04-26 15:52:16', NULL, NULL, '$2y$10$DKyL0qK7xbHWAwp0WsO.meseS/sbo32a0IcTwA6HZCF89gSunkIy2', NULL, '2023-04-26 19:50:41', '2023-04-26 19:52:16', 'enabled', NULL),
(43, 'test', 'testas@gmail.com', 'Male', 'Aïn Taya', NULL, 'Algeria', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$g/70mCo.PMG43zbfTkUYrem/htwmiNKEU1Di8UudMPQ/qooSTvFkC', NULL, '2023-04-26 23:52:35', '2023-04-26 23:52:35', 'enabled', NULL),
(44, 'caje', 'asd@gnauk.com', 'Male', 'Adrar', NULL, 'Algeria', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$RmUOth8zSxJnfcex1lQ2BuWHv2jL/m/8pJuTR7rUGJ8LneGRckNF6', NULL, '2023-04-26 23:54:36', '2023-04-26 23:54:36', 'enabled', NULL),
(45, 'caje', 'asd@gnausk.com', 'Male', 'Adrar', NULL, 'Algeria', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$IBCP9m7KAVKNiETlsFW8aeyb0ihEAq9nCyStrZaT5n6bV7Yc8i4ga', NULL, '2023-04-26 23:58:42', '2023-04-26 23:58:42', 'enabled', NULL),
(46, 'asd', 'asdsas@gnauk.com', 'Male', 'Fayzabad', NULL, 'Afghanistan', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$21LpMPh2yniFpdsuEzxETePWdnpcQOeE4gyMmOV2i1itQmwLsvq0e', NULL, '2023-04-26 23:59:42', '2023-04-26 23:59:42', 'enabled', NULL),
(47, 'asdasdas', 'asdasdasd@gmail.com', 'Male', 'Aïn Taya', NULL, 'Algeria', 'website', NULL, '3700', '2023-04-26 20:03:18', NULL, NULL, '$2y$10$WMWMcZiYUPCw9UttQfYgH.ePCh7FZFy6gyvk8kR2lsik6/50cgSeC', NULL, '2023-04-27 00:03:18', '2023-04-27 00:03:18', 'enabled', NULL),
(48, 'ads', 'adsasda@afa.con', 'Male', 'El Tarter', NULL, 'Andorra', 'website', NULL, '7725', '2023-04-26 20:06:57', NULL, NULL, '$2y$10$VbpQzy3jSQ.rYe1/79S3Ce7KcGGG7tPr2goJD8hQwBPJforV5A816', NULL, '2023-04-27 00:06:57', '2023-04-27 00:06:57', 'enabled', NULL),
(49, 'ads', 'adsasda@gmail.com', 'Male', 'El Tarter', NULL, 'Andorra', 'website', NULL, '6738', '2023-04-26 20:07:46', NULL, NULL, '$2y$10$wvMIJb3HIxYllp04iPiMqeDWzLTgrl6891wXzSOeO2AuCe8FdrDiK', NULL, '2023-04-27 00:07:24', '2023-04-27 00:07:46', 'enabled', NULL),
(50, 'ASasA', 'ASDASD@Gmail.com', 'Male', 'Benguela', NULL, 'Angola', 'website', NULL, NULL, NULL, NULL, NULL, '$2y$10$8QONdzt5G6KERZPsYnXrxOlPaFBE1U/feefLa.FFPjye04fBjXylO', NULL, '2023-04-27 00:09:56', '2023-04-27 00:09:56', 'enabled', NULL),
(51, 'sasd', 'aaaasd@gmail.com', 'Male', 'Qala i Naw', NULL, 'Afghanistan', 'website', NULL, '9253', '2023-04-26 20:17:53', NULL, NULL, '$2y$10$gK3qblxJAKJoy621MiLQaep9yUWNw2kzRzdiLoCUyqzfyDWnvtAqW', NULL, '2023-04-27 00:12:11', '2023-04-27 00:17:53', 'enabled', NULL),
(52, 'sasd', 'aadaasd@gmail.com', 'Male', 'Qala i Naw', NULL, 'Afghanistan', 'website', NULL, '1097', '2023-04-26 20:18:51', NULL, NULL, '$2y$10$Rlc3htaJSetNWrhg7.hMG.EvrLjiH9sPUpXnJLVMaeV0mvYL23c2e', NULL, '2023-04-27 00:18:50', '2023-04-27 00:18:51', 'enabled', NULL),
(53, 'sasd', 'aadaasdd@gmail.com', 'Male', 'Qala i Naw', NULL, 'Afghanistan', 'website', NULL, '2472', '2023-04-26 20:22:45', NULL, NULL, '$2y$10$rZRdpWnDuBw9qPfDWumMROOa9jkQ.31hzG2c5rFKyi/hlJyW36y3S', NULL, '2023-04-27 00:19:30', '2023-04-27 00:22:45', 'enabled', NULL),
(54, 'asd', '2asd@gmail.com', 'Female', 'Ghormach', NULL, 'Afghanistan', 'website', NULL, '4584', '2023-04-26 20:43:24', NULL, NULL, '$2y$10$vdb4aaL19WzIGJF1b3pfQeLZw2jLpWn4YSGn9Vlj8qklA.A2oBI5u', NULL, '2023-04-27 00:43:24', '2023-04-27 00:43:24', 'enabled', NULL),
(55, 'sasd', 'easd@gmail.com', 'Male', 'Ghormach', NULL, 'Afghanistan', 'website', NULL, '6590', '2023-04-26 20:52:23', NULL, NULL, '$2y$10$XWnFrAdM7CiV7r/uR/pRH.GFCMha1fsr./KMXcI5vspTaAlj.OupO', NULL, '2023-04-27 00:52:23', '2023-04-27 00:52:23', 'enabled', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_links`
--
ALTER TABLE `product_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sections`
--
ALTER TABLE `product_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_wish_lists`
--
ALTER TABLE `product_wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_links`
--
ALTER TABLE `product_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sections`
--
ALTER TABLE `product_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_wish_lists`
--
ALTER TABLE `product_wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
