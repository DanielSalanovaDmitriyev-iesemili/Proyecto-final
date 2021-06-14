-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-06-2021 a las 10:19:15
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'rpg', 'img/category-7.jpg', '2021-06-12 09:48:40', '2021-06-12 09:48:40'),
(2, 'shooter', 'img/category-1.jpg', '2021-06-12 09:48:40', '2021-06-12 09:48:40'),
(3, 'rpg', 'img/category-0.jpg', '2021-06-12 09:48:40', '2021-06-12 09:48:40'),
(4, 'aventuras', 'img/category-3.jpg', '2021-06-12 09:48:40', '2021-06-12 09:48:40'),
(5, 'aventuras', 'img/category-2.jpg', '2021-06-12 09:48:41', '2021-06-12 09:48:41'),
(6, 'rol', 'img/category-4.jpg', '2021-06-12 09:48:41', '2021-06-12 09:48:41'),
(7, 'rpg', 'img/category-7.jpg', '2021-06-12 09:48:41', '2021-06-12 09:48:41'),
(8, 'mmo', 'img/category-9.jpg', '2021-06-12 09:48:41', '2021-06-12 09:48:41'),
(9, 'accion', 'img/category-5.jpg', '2021-06-12 09:48:41', '2021-06-12 09:48:41'),
(10, 'aventuras', 'img/category-4.jpg', '2021-06-12 09:48:41', '2021-06-12 09:48:41'),
(11, 'mmo', 'img/category-5.jpg', '2021-06-12 09:48:41', '2021-06-12 09:48:41'),
(12, 'shooter', 'img/category-1.jpg', '2021-06-12 09:48:41', '2021-06-12 09:48:41'),
(13, 'mmo', 'img/category-9.jpg', '2021-06-12 09:48:41', '2021-06-12 09:48:41'),
(14, 'shooter', 'img/category-3.jpg', '2021-06-12 09:48:42', '2021-06-12 09:48:42'),
(15, 'mmo', 'img/category-1.jpg', '2021-06-12 09:48:42', '2021-06-12 09:48:42'),
(16, 'mmo', 'img/category-1.jpg', '2021-06-12 09:48:42', '2021-06-12 09:48:42'),
(17, 'rpg', 'img/category-3.jpg', '2021-06-12 09:48:42', '2021-06-12 09:48:42'),
(18, 'mesa', 'img/category-2.jpg', '2021-06-12 09:48:42', '2021-06-12 09:48:42'),
(19, 'accion', 'img/category-4.jpg', '2021-06-12 09:48:42', '2021-06-12 09:48:42'),
(20, 'accion', 'img/category-1.jpg', '2021-06-12 09:48:42', '2021-06-12 09:48:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_game`
--

CREATE TABLE `category_game` (
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `game_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `category_game`
--

INSERT INTO `category_game` (`category_id`, `game_id`) VALUES
(2, 4),
(2, 5),
(3, 3),
(4, 9),
(5, 7),
(6, 5),
(8, 1),
(9, 6),
(10, 2),
(11, 5),
(11, 9),
(12, 3),
(12, 10),
(14, 4),
(15, 6),
(15, 8),
(17, 4),
(17, 10),
(19, 1),
(19, 10),
(20, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `description`) VALUES
(1, 1, 'es', 'Dolores necessitatibus quo reiciendis id dolorem id qui. Nemo aspernatur qui vero placeat. Porro quos omnis consequatur voluptates omnis. Dolor esse officia excepturi dolore laborum.'),
(2, 1, 'en', 'Ut quidem optio et iusto. Nostrum quae natus laborum voluptas est quasi. Esse molestiae ducimus consequatur consequatur.'),
(3, 2, 'es', 'Recusandae rerum nisi harum vel corrupti. Maiores harum laboriosam labore quia eveniet. Nihil autem impedit rem odit consequuntur in.'),
(4, 2, 'en', 'Unde aliquam eum et velit natus. Minima enim voluptatem qui ea amet. Dolore quo fuga excepturi maxime architecto est. Non necessitatibus et hic non.'),
(5, 3, 'es', 'Amet non fugiat nihil repellendus accusantium consequatur. Et unde quae modi dignissimos. Quia quis est fuga quis. Est aperiam neque tenetur sequi.'),
(6, 3, 'en', 'Similique alias et saepe occaecati dolor. Quae et rerum aut molestias voluptas autem odit harum. Quisquam qui laborum nam ea quas eum.'),
(7, 4, 'es', 'Nihil asperiores facilis quidem repellat sit. Doloremque quia sed laboriosam commodi sed et. Culpa accusantium consectetur ut nam. Id quo voluptates est est voluptatem.'),
(8, 4, 'en', 'Perspiciatis culpa deleniti omnis quae. Eos aut dolore et qui repellat fugit.'),
(9, 5, 'es', 'Sunt veniam sint eveniet ea deleniti dolorem odio. Voluptatem natus molestiae aspernatur qui id. Tenetur et consectetur quia. Dolores soluta enim et placeat inventore.'),
(10, 5, 'en', 'Qui quia iusto voluptatem dolore quos. Corporis autem officiis non debitis dolorem. Id commodi vel non vel. Totam et voluptatem adipisci nisi animi.'),
(11, 6, 'es', 'Autem error unde deleniti ut quia quidem. Officiis rerum enim veniam exercitationem dolores porro voluptatibus. A dolor cum vitae aliquam dolor eius.'),
(12, 6, 'en', 'Facilis ut iure et quasi corporis consequuntur qui nisi. Quia autem assumenda quia ullam culpa quasi facilis.'),
(13, 7, 'es', 'Rerum architecto quae aut sed culpa voluptatem. Ea quod error nemo unde. Necessitatibus earum modi maiores quia maxime. Sapiente aliquam distinctio voluptates sapiente.'),
(14, 7, 'en', 'Voluptate vel odit occaecati. Deserunt voluptatem aut officia est. Iste et in modi eius exercitationem facilis. Velit ducimus et earum error saepe fuga dolor.'),
(15, 8, 'es', 'Dicta provident quis vel autem porro est. Quia quae autem voluptas. Culpa ea et minima saepe eos dolores veritatis at. Quis aut quia sint et modi odit.'),
(16, 8, 'en', 'Cupiditate voluptas est ut tenetur et. Laboriosam ad quos vel tempora sed veniam.'),
(17, 9, 'es', 'Aut soluta rerum nostrum ab sed. Id perspiciatis eligendi architecto. Quos adipisci sit numquam quia quia veniam quaerat dignissimos.'),
(18, 9, 'en', 'Debitis nihil nihil delectus ex et soluta est. Magnam officiis rerum ut in repudiandae.'),
(19, 10, 'es', 'Voluptate hic quasi recusandae quae quidem cum optio. Quam rem aspernatur ut eveniet. Aut officia quis eius incidunt.'),
(20, 10, 'en', 'Ullam eos iste iusto quos veritatis ipsam deleniti. Tempora ab eum velit aut libero id iste tenetur. Amet veniam voluptatem consequatur. Corrupti voluptates ut voluptatem voluptatum.'),
(21, 11, 'es', 'Iste saepe libero odit et. Occaecati quibusdam ullam omnis vitae et consectetur. Vitae soluta officia architecto maiores non.'),
(22, 11, 'en', 'Voluptate atque temporibus modi ipsum similique et. Repudiandae eos ut sunt possimus accusantium a. Vitae modi totam placeat ut cum omnis similique. In veniam aut vel. Ut eos est voluptates.'),
(23, 12, 'es', 'At fuga et aperiam autem aut porro rerum. Sit tempora aut quisquam et voluptatum in suscipit iste.'),
(24, 12, 'en', 'Impedit praesentium molestiae necessitatibus accusamus. Rerum et distinctio possimus molestiae similique magni. A modi quo fugiat at aliquam cumque.'),
(25, 13, 'es', 'Et nobis animi est est perferendis sunt. Aspernatur itaque voluptatem reiciendis cum provident quia sequi. Voluptas a dolorem quidem velit.'),
(26, 13, 'en', 'Non quisquam dolor deleniti inventore nihil sint repellat ipsa. Magni et pariatur voluptas iure. Officiis dolore voluptatibus ut velit rerum. Maxime eos illum aut consequuntur aut ducimus.'),
(27, 14, 'es', 'Perferendis voluptatibus voluptate nisi ea excepturi quo consequatur. Esse natus voluptas facilis ipsam. Voluptas assumenda dolores quod facilis ut.'),
(28, 14, 'en', 'Nihil illum dignissimos explicabo qui eum sequi. Fugiat ut ut distinctio a doloremque voluptatem nulla ut. Ea non animi sequi voluptas. Est dolor non vel.'),
(29, 15, 'es', 'Voluptatibus nesciunt quia enim accusamus velit recusandae sed. Soluta deleniti omnis velit. Ipsam alias voluptatum vel sit. Aut explicabo eius consequatur harum.'),
(30, 15, 'en', 'Recusandae harum eum repellendus ad cum voluptas. Voluptas totam et asperiores nihil consectetur quo sed odit. Nihil quo deserunt rerum est magni qui ipsum.'),
(31, 16, 'es', 'Aut deleniti minus et mollitia. Accusamus sit sunt nulla.'),
(32, 16, 'en', 'Sit ut in est eligendi dolore eius nobis. Adipisci quia exercitationem iure et at. Vitae aspernatur aut inventore incidunt nam quia. Et quia ipsum est et deleniti.'),
(33, 17, 'es', 'Eligendi beatae incidunt commodi. Voluptate aut saepe dolores. Doloribus numquam neque voluptatem possimus. Sint fuga unde iusto recusandae quam culpa neque.'),
(34, 17, 'en', 'Ipsam rerum et dignissimos molestiae quasi. Eos unde iure harum deleniti. Quae magni explicabo iste earum. Ad libero assumenda modi consequatur nostrum iure dolorem.'),
(35, 18, 'es', 'Molestias ipsam labore facere accusamus repellat non debitis. Quisquam quod autem adipisci quia dolorum tempora. Necessitatibus in maiores saepe placeat.'),
(36, 18, 'en', 'Molestiae eveniet libero incidunt repellat et vero. Officia ad molestiae hic sed quis. Dolores laudantium dignissimos dicta laudantium numquam aut. Doloremque corporis eveniet eos.'),
(37, 19, 'es', 'Cupiditate et id sit et. Temporibus inventore ipsum commodi mollitia. Explicabo est quisquam ex quis nemo quasi. Et eveniet alias ea qui. Eaque voluptas alias vel et.'),
(38, 19, 'en', 'Libero dolorum porro et. Neque dicta et tempora quod minima quis. Odio magni nihil nisi officia. Est eaque atque possimus aut natus exercitationem dolorem.'),
(39, 20, 'es', 'Vel magnam alias numquam temporibus rerum necessitatibus quidem. Atque accusamus distinctio id placeat. Ex at ex doloribus quaerat qui. Deleniti in iste aut.'),
(40, 20, 'en', 'Dolor autem nobis nostrum dolorem vitae. Quibusdam et similique delectus similique. Fuga voluptatem eos adipisci impedit debitis. At culpa ullam voluptas totam voluptatum.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegi` enum('3','7','12','16','18') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(6,2) NOT NULL,
  `state` enum('mal','regular','bien','como nuevo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bien',
  `published_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `name`, `img`, `pegi`, `price`, `state`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Alice hastily replied.', 'img/imagen-9.jpg', '7', 58.81, 'regular', '2001-07-19', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(2, 'Queen will hear you!.', 'img/imagen-2.jpg', '16', 24.21, 'regular', '1986-01-27', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(3, 'March Hare interrupted.', 'img/imagen-3.jpg', '3', 106.99, 'como nuevo', '2020-07-11', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(4, 'Tortoise, if he doesn\'t.', 'img/imagen-8.jpg', '3', 58.11, 'como nuevo', '2016-10-10', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(5, 'I shall have some fun.', 'img/imagen-9.jpg', '7', 32.72, 'bien', '2015-03-15', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(6, 'INSIDE, you might do.', 'img/imagen-1.jpg', '18', 83.69, 'mal', '2013-07-15', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(7, 'White Rabbit, who said.', 'img/imagen-1.jpg', '18', 57.86, 'mal', '2017-03-30', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(8, 'Queen\'s shrill cries to.', 'img/imagen-2.jpg', '3', 19.34, 'regular', '1970-12-27', '2021-06-12 09:48:44', '2021-06-12 09:48:44'),
(9, 'King: \'however, it may.', 'img/imagen-0.jpg', '7', 91.00, 'mal', '2014-10-09', '2021-06-12 09:48:44', '2021-06-12 09:48:44'),
(10, 'Duchess; \'and the moral.', 'img/imagen-7.jpg', '18', 196.21, 'como nuevo', '2003-03-19', '2021-06-12 09:48:44', '2021-06-12 09:48:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game_plataform`
--

CREATE TABLE `game_plataform` (
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `plataform_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `game_plataform`
--

INSERT INTO `game_plataform` (`game_id`, `plataform_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(1, 5, NULL, NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL),
(2, 4, NULL, NULL),
(2, 5, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL),
(3, 3, NULL, NULL),
(3, 4, NULL, NULL),
(3, 5, NULL, NULL),
(4, 1, NULL, NULL),
(4, 2, NULL, NULL),
(4, 3, NULL, NULL),
(4, 4, NULL, NULL),
(4, 5, NULL, NULL),
(4, 6, NULL, NULL),
(5, 3, NULL, NULL),
(5, 4, NULL, NULL),
(6, 1, NULL, NULL),
(6, 2, NULL, NULL),
(6, 3, NULL, NULL),
(6, 4, NULL, NULL),
(6, 5, NULL, NULL),
(6, 6, NULL, NULL),
(7, 2, NULL, NULL),
(7, 3, NULL, NULL),
(7, 4, NULL, NULL),
(7, 6, NULL, NULL),
(8, 4, NULL, NULL),
(9, 2, NULL, NULL),
(10, 1, NULL, NULL),
(10, 3, NULL, NULL),
(10, 4, NULL, NULL),
(10, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game_translations`
--

CREATE TABLE `game_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `game_translations`
--

INSERT INTO `game_translations` (`id`, `game_id`, `locale`, `description`) VALUES
(1, 1, 'es', 'Rerum ullam unde id sunt distinctio eum repellat. Et quis natus dignissimos quae beatae omnis.'),
(2, 1, 'en', 'Temporibus qui nihil qui nostrum vero quia. Laudantium quia quis fugiat voluptatibus animi omnis. At voluptates atque quidem assumenda.'),
(3, 2, 'es', 'Assumenda rerum vel non voluptates quis rerum. Vero magnam similique officiis sed sequi. Veritatis voluptas consectetur beatae quia ut ipsa quis.'),
(4, 2, 'en', 'Voluptatem qui voluptates sit quis sit dolorum est. Aut et aperiam eveniet repellat. Sint fuga aut eos libero.'),
(5, 3, 'es', 'Culpa eos voluptas debitis debitis sint et dolores. Officiis repellat voluptatem quia quae. Et eos quia assumenda ea facilis ut.'),
(6, 3, 'en', 'Doloremque voluptatem alias officiis nostrum ut. Molestiae quae a alias mollitia animi molestias. Molestiae et aut ut repellat fugit consequatur est.'),
(7, 4, 'es', 'Odit sed quaerat est quo vel enim sed. Sunt aut quia sunt enim ut in. Illum voluptate et quod voluptates. Libero repudiandae cum labore fugit.'),
(8, 4, 'en', 'Nostrum qui totam nesciunt. Et id vel aut non neque veniam consequatur. Quod ratione suscipit sit impedit.'),
(9, 5, 'es', 'Qui aut distinctio sit. Suscipit eaque nostrum voluptatem in rerum praesentium quia. Sed fugit et qui eos velit.'),
(10, 5, 'en', 'Voluptate suscipit amet culpa est facere nihil autem. Ducimus distinctio sit repellendus. Laborum eligendi debitis minima ut dolorem dolorum.'),
(11, 6, 'es', 'Nisi vel voluptas aperiam rerum totam id. Non neque ut in autem est explicabo dolores. Maxime eum quo voluptatem.'),
(12, 6, 'en', 'Voluptatem ipsam sunt dolores nulla qui. Rerum vel et debitis officia quis ab recusandae. Possimus qui modi qui fugiat.'),
(13, 7, 'es', 'Sit laudantium omnis quia. Quis commodi perspiciatis tempora facere.'),
(14, 7, 'en', 'Qui veritatis quia esse eius libero dolorum. Nulla rem non consequatur sed et omnis a. Labore est est odio corporis adipisci ad occaecati.'),
(15, 8, 'es', 'Voluptas qui sit consequatur atque. Inventore ea corporis expedita ut asperiores velit. Incidunt dolor quia voluptas excepturi natus deserunt omnis.'),
(16, 8, 'en', 'Expedita nesciunt ipsam aperiam laudantium ut nihil dolor. Qui labore nobis sint. Ut et optio fuga natus. Laudantium hic dolorem qui eos non.'),
(17, 9, 'es', 'Quae quis ut rerum laudantium atque blanditiis modi. Nisi quia voluptate excepturi fuga est reiciendis. Enim aspernatur saepe fugit.'),
(18, 9, 'en', 'Odio dolorum distinctio voluptas animi. Aut est impedit harum aliquid. Unde id quaerat exercitationem quasi molestiae veritatis. Et modi minus est.'),
(19, 10, 'es', 'Sint nemo iusto sapiente dicta. Dolores non non tempora officiis ut quia fugit. Repellat perspiciatis ut incidunt est quod.'),
(20, 10, 'en', 'Minus fuga ab sequi delectus est. Totam eum atque et eligendi. Qui quasi cumque provident laudantium eveniet cum.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game_user`
--

CREATE TABLE `game_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_05_16_100416_create_rols_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_04_24_090621_create_categories_table', 1),
(6, '2021_04_24_090703_create_games_table', 1),
(7, '2021_04_24_180733_create_plataforms_table', 1),
(8, '2021_05_06_182126_create_game_translation_table', 1),
(9, '2021_05_06_195824_create_category_translation_table', 1),
(10, '2021_05_17_173903_create_rooms_table', 1),
(11, '2021_05_19_180928_create_contacts_table', 1),
(12, '2021_05_21_180737_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforms`
--

CREATE TABLE `plataforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `plataforms`
--

INSERT INTO `plataforms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ps5', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(2, 'dreamcast', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(3, 'game boy', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(4, 'psp', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(5, 'xbox one', '2021-06-12 09:48:43', '2021-06-12 09:48:43'),
(6, 'ps4', '2021-06-12 09:48:43', '2021-06-12 09:48:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-06-12 09:48:40', '2021-06-12 09:48:40'),
(2, 'client', '2021-06-12 09:48:40', '2021-06-12 09:48:40'),
(3, 'chat', '2021-06-12 09:48:40', '2021-06-12 09:48:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'private', '2021-06-12 09:48:40', '2021-06-12 09:48:40'),
(2, 'public', '2021-06-12 09:48:40', '2021-06-12 09:48:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_user`
--

CREATE TABLE `room_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `room_user`
--

INSERT INTO `room_user` (`id`, `room_id`, `user_id`, `receiver_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 7, 'TEST', NULL, NULL),
(2, 1, 7, 8, 'TEST AMIN', NULL, NULL),
(3, 2, 8, NULL, 'test client public', NULL, NULL),
(4, 2, 7, NULL, 'test chat public\n', NULL, NULL),
(5, 2, 9, NULL, 'test client2 public\n', NULL, NULL),
(6, 1, 9, 7, 'test clien2 private', NULL, NULL),
(7, 1, 7, 9, 'test', NULL, NULL),
(8, 1, 8, 7, 'test', NULL, NULL),
(9, 1, 9, 7, 'test client2 private 2\n', NULL, NULL),
(10, 1, 9, 7, 'test client2 private 3', NULL, NULL),
(11, 1, 7, 9, 'test admin 2 private', NULL, NULL),
(12, 2, 9, NULL, 'test client 2 public 2', NULL, NULL),
(13, 2, 7, NULL, 'test admin public 2', NULL, NULL),
(14, 2, 6, NULL, 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rol_id` bigint(20) UNSIGNED NOT NULL DEFAULT '2',
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rol_id`, `name`, `email`, `email_verified_at`, `stripe_id`, `card_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Raymundo Dicki', 'schuppe.kevin@example.net', '2021-06-12 09:48:44', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NRwsuCPDWj', '2021-06-12 09:48:44', '2021-06-12 09:48:44'),
(2, 2, 'Enrico Parker', 'abdullah.rowe@example.org', '2021-06-12 09:48:44', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'onG2p5wN7P', '2021-06-12 09:48:44', '2021-06-12 09:48:44'),
(3, 2, 'Dr. Carolyn Torphy', 'upagac@example.net', '2021-06-12 09:48:44', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VxZRgZGlxl', '2021-06-12 09:48:44', '2021-06-12 09:48:44'),
(4, 2, 'Adelbert Oberbrunner II', 'runolfsson.amparo@example.com', '2021-06-12 09:48:44', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fvMTZh2nQc', '2021-06-12 09:48:44', '2021-06-12 09:48:44'),
(5, 2, 'Giovani Gibson', 'cwyman@example.net', '2021-06-12 09:48:44', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i8jIGKo9wx', '2021-06-12 09:48:44', '2021-06-12 09:48:44'),
(6, 1, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, '$2y$10$CVrZiczweXsmqm6Bte1FkOw243ZoVnMgw866x.GUkbPEUmrekWvPe', NULL, '2021-06-12 09:48:44', '2021-06-12 09:48:44'),
(7, 3, 'Chat', 'chat@gmail.com', NULL, NULL, NULL, '$2y$10$lWSqi03ZiOpgug.PiE47dufPjORKcj.4ZqCyxTIL9lZx8cbywQCF6', NULL, '2021-06-12 09:48:44', '2021-06-12 09:48:44'),
(8, 2, 'Cliente', 'client@gmail.com', NULL, 'cus_Jeoz1pBq2XjY8A', NULL, '$2y$10$HBZ/uEAmTHRrQLa9NUg9EupXLyKIRqzlPeef1upyDpFPEBpV9RZ.K', NULL, '2021-06-12 09:49:55', '2021-06-12 09:49:55'),
(9, 2, 'Cliente2', 'client2@gmail.com', NULL, 'cus_Jep5VPfsQCz3AY', NULL, '$2y$10$7YbGNW0eXJmJpDB1ZohJYe1SRwgcQrrt8on4QJdCurLaAy33Ap4YS', NULL, '2021-06-12 09:56:05', '2021-06-12 09:56:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category_game`
--
ALTER TABLE `category_game`
  ADD UNIQUE KEY `category_game_category_id_game_id_unique` (`category_id`,`game_id`),
  ADD KEY `category_game_game_id_foreign` (`game_id`);

--
-- Indices de la tabla `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_game_id_foreign` (`game_id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `game_plataform`
--
ALTER TABLE `game_plataform`
  ADD UNIQUE KEY `game_plataform_game_id_plataform_id_unique` (`game_id`,`plataform_id`),
  ADD KEY `game_plataform_plataform_id_foreign` (`plataform_id`);

--
-- Indices de la tabla `game_translations`
--
ALTER TABLE `game_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `game_translations_game_id_locale_unique` (`game_id`,`locale`),
  ADD KEY `game_translations_locale_index` (`locale`);

--
-- Indices de la tabla `game_user`
--
ALTER TABLE `game_user`
  ADD KEY `game_user_user_id_foreign` (`user_id`),
  ADD KEY `game_user_game_id_foreign` (`game_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `plataforms`
--
ALTER TABLE `plataforms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `room_user`
--
ALTER TABLE `room_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_user_room_id_foreign` (`room_id`),
  ADD KEY `room_user_user_id_foreign` (`user_id`),
  ADD KEY `room_user_receiver_id_foreign` (`receiver_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `game_translations`
--
ALTER TABLE `game_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `plataforms`
--
ALTER TABLE `plataforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `room_user`
--
ALTER TABLE `room_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `category_game`
--
ALTER TABLE `category_game`
  ADD CONSTRAINT `category_game_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_game_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `game_plataform`
--
ALTER TABLE `game_plataform`
  ADD CONSTRAINT `game_plataform_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_plataform_plataform_id_foreign` FOREIGN KEY (`plataform_id`) REFERENCES `plataforms` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `game_translations`
--
ALTER TABLE `game_translations`
  ADD CONSTRAINT `game_translations_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `game_user`
--
ALTER TABLE `game_user`
  ADD CONSTRAINT `game_user_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `room_user`
--
ALTER TABLE `room_user`
  ADD CONSTRAINT `room_user_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_user_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
