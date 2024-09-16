-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2024 at 02:22 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Công nghệ thông tin', 'Information technology', '2024-08-20 01:19:56', NULL, '2024-08-20 01:19:56'),
(4, 'Digital marketing', 'Digital marketing', NULL, '2024-08-21 19:04:23', '2024-08-21 19:04:23'),
(5, 'Thiết kế đồ họa', 'Thiết kế đồ họa', '2024-08-22 20:46:54', '2024-08-20 00:17:49', '2024-08-22 20:46:54'),
(6, 'Phát triển phần mềm', 'Phát triển phần mềm', '2024-08-20 00:20:14', NULL, '2024-08-20 00:20:14'),
(7, 'Tự động hóa', 'Tự động hóa', '2024-08-19 23:52:03', NULL, '2024-08-19 23:52:03'),
(8, 'Phát triển phần mềm', 'Phát triển phần mềm', NULL, NULL, NULL),
(9, 'Lập trình web', 'Lập trình web', NULL, NULL, NULL),
(10, 'Lập trình moblie', 'Lập trình điện thoại', '2024-08-21 02:48:11', '2024-08-21 01:46:34', '2024-08-21 02:48:11'),
(13, 'Thiết kế đồ họa', 'Thiết kế hoạt hình', '2024-08-21 01:51:40', '2024-08-21 01:46:10', '2024-08-21 01:51:40'),
(14, 'Trần Văn Tuấn', 'Chuyến bay Airline', '2024-08-21 01:19:01', '2024-08-21 01:18:55', '2024-08-21 01:19:01'),
(15, 'Trần Văn Tuấn', '1', '2024-08-21 01:52:20', '2024-08-21 01:52:04', '2024-08-21 01:52:20'),
(16, 'tuantv', 'Chuyến bay Airline', '2024-08-21 01:52:24', '2024-08-21 01:52:14', '2024-08-21 01:52:24'),
(17, 'Phát triển phần mềm', 'Lập trình java', '2024-08-22 20:46:03', '2024-08-21 18:57:26', '2024-08-22 20:46:03'),
(18, 'Trần Văn Tuấn', 'Thiết kế', '2024-08-22 01:31:46', '2024-08-22 01:30:04', '2024-08-22 01:31:46'),
(19, 'Tự động hóa', 'Tự động', '2024-08-25 20:47:36', '2024-08-25 20:45:08', '2024-08-25 20:47:36'),
(20, 'Thiết kế đồ họa', 'Thiết kế hoạt hình', '2024-08-26 23:42:42', '2024-08-26 03:50:42', '2024-08-26 23:42:42'),
(21, 'Trần Văn Tuấn', 'Chuyến bay Airline', '2024-08-27 02:27:43', '2024-08-27 02:24:36', '2024-08-27 02:27:43'),
(22, 'tuantv', '1', '2024-08-27 02:27:38', '2024-08-27 02:24:42', '2024-08-27 02:27:38'),
(23, 'Trần Văn Tú', '1', '2024-08-27 02:27:35', '2024-08-27 02:24:49', '2024-08-27 02:27:35'),
(24, 'Trần Văn Tú', 'Thiết kế hoạt hình', '2024-08-27 02:27:31', '2024-08-27 02:24:56', '2024-08-27 02:27:31'),
(25, 'Trần Văn Tuấn', 'Chuyến bay Airline', '2024-08-27 02:27:28', '2024-08-27 02:25:02', '2024-08-27 02:27:28'),
(26, 'Trần Văn Tú', 'Chuyến bay Airline', '2024-08-27 02:27:24', '2024-08-27 02:25:15', '2024-08-27 02:27:24'),
(27, 'Thiết kế đồ họa', 'Chuyến bay Airline', '2024-08-27 02:27:15', '2024-08-27 02:25:22', '2024-08-27 02:27:15'),
(28, 'tuantv', 'Chuyến bay Airline', '2024-08-27 02:27:19', '2024-08-27 02:25:29', '2024-08-27 02:27:19'),
(29, 'tuantv', 'Chuyến bay Airline', '2024-08-27 02:29:53', '2024-08-27 02:29:49', '2024-08-27 02:29:53'),
(30, 'Trần Văn Tuấn', 'Chuyến bay Airline', '2024-08-27 02:31:03', '2024-08-27 02:30:25', '2024-08-27 02:31:03'),
(31, 'Trần Văn Tuấn', 'Chuyến bay Airline', '2024-08-27 02:31:00', '2024-08-27 02:30:55', '2024-08-27 02:31:00'),
(32, 'Trần Văn Tuấn', 'Chuyến bay Airline', '2024-08-27 02:31:56', '2024-08-27 02:31:51', '2024-08-27 02:31:56'),
(33, 'Tự động hóa', 'AI', '2024-08-28 19:28:49', '2024-08-28 02:39:00', '2024-08-28 19:28:49'),
(34, 'Truyện Kiều', 'Chuyến bay Airline', '2024-08-28 10:08:09', '2024-08-28 10:08:02', '2024-08-28 10:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(2, '512545c3-bb14-49e9-9cf6-f0f8695654e3', 'database', 'default', '{\"uuid\":\"512545c3-bb14-49e9-9cf6-f0f8695654e3\",\"displayName\":\"App\\\\Jobs\\\\SendStudentLoginInfoJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendStudentLoginInfoJob\",\"command\":\"O:32:\\\"App\\\\Jobs\\\\SendStudentLoginInfoJob\\\":1:{s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Student\\\";s:2:\\\"id\\\";i:29;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'Symfony\\Component\\Mime\\Exception\\LogicException: An email must have a \"To\", \"Cc\", or \"Bcc\" header. in C:\\laragon\\www\\internphp\\vendor\\symfony\\mime\\Message.php:134\nStack trace:\n#0 C:\\laragon\\www\\internphp\\vendor\\symfony\\mime\\Email.php(414): Symfony\\Component\\Mime\\Message->ensureValidity()\n#1 C:\\laragon\\www\\internphp\\vendor\\symfony\\mailer\\SentMessage.php(33): Symfony\\Component\\Mime\\Email->ensureValidity()\n#2 C:\\laragon\\www\\internphp\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(68): Symfony\\Component\\Mailer\\SentMessage->__construct(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#3 C:\\laragon\\www\\internphp\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#4 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(573): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#5 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(335): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#6 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(213): Illuminate\\Mail\\Mailer->send(Object(Closure), Array, Object(Closure))\n#7 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#8 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(214): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#9 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(357): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#10 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(301): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\StudentLoginInfoMail))\n#11 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\StudentLoginInfoMail))\n#12 C:\\laragon\\www\\internphp\\app\\Jobs\\SendStudentLoginInfoJob.php(31): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\StudentLoginInfoMail))\n#13 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendStudentLoginInfoJob->handle()\n#14 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#15 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#16 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#17 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#18 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#19 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#20 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#21 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendStudentLoginInfoJob), false)\n#23 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#24 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#25 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#26 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendStudentLoginInfoJob))\n#27 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#28 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#29 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#30 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#33 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#34 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#35 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#36 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#37 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#38 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#39 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#40 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\laragon\\www\\internphp\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 {main}', '2024-09-04 02:55:30'),
(3, 'b67f4212-f766-4689-a322-ce6a9cfcef05', 'database', 'default', '{\"uuid\":\"b67f4212-f766-4689-a322-ce6a9cfcef05\",\"displayName\":\"App\\\\Jobs\\\\SendStudentLoginInfoJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendStudentLoginInfoJob\",\"command\":\"O:32:\\\"App\\\\Jobs\\\\SendStudentLoginInfoJob\\\":1:{s:10:\\\"\\u0000*\\u0000student\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Student\\\";s:2:\\\"id\\\";i:30;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'Symfony\\Component\\Mime\\Exception\\LogicException: An email must have a \"To\", \"Cc\", or \"Bcc\" header. in C:\\laragon\\www\\internphp\\vendor\\symfony\\mime\\Message.php:134\nStack trace:\n#0 C:\\laragon\\www\\internphp\\vendor\\symfony\\mime\\Email.php(414): Symfony\\Component\\Mime\\Message->ensureValidity()\n#1 C:\\laragon\\www\\internphp\\vendor\\symfony\\mailer\\SentMessage.php(33): Symfony\\Component\\Mime\\Email->ensureValidity()\n#2 C:\\laragon\\www\\internphp\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(68): Symfony\\Component\\Mailer\\SentMessage->__construct(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#3 C:\\laragon\\www\\internphp\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#4 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(573): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#5 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(335): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#6 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(213): Illuminate\\Mail\\Mailer->send(Object(Closure), Array, Object(Closure))\n#7 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#8 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(214): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#9 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(357): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#10 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(301): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\StudentLoginInfoMail))\n#11 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\StudentLoginInfoMail))\n#12 C:\\laragon\\www\\internphp\\app\\Jobs\\SendStudentLoginInfoJob.php(31): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\StudentLoginInfoMail))\n#13 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendStudentLoginInfoJob->handle()\n#14 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#15 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#16 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#17 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#18 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#19 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#20 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#21 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendStudentLoginInfoJob), false)\n#23 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#24 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#25 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#26 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendStudentLoginInfoJob))\n#27 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#28 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#29 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#30 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#33 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#34 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#35 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#36 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#37 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#38 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#39 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#40 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\laragon\\www\\internphp\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 {main}', '2024-09-04 02:55:30'),
(4, '4238e448-5aa1-4153-b3f5-e0260e24b446', 'database', 'default', '{\"uuid\":\"4238e448-5aa1-4153-b3f5-e0260e24b446\",\"displayName\":\"App\\\\Jobs\\\\SendStudentLoginInfoJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendStudentLoginInfoJob\",\"command\":\"O:32:\\\"App\\\\Jobs\\\\SendStudentLoginInfoJob\\\":1:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:66;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'ErrorException: Attempt to read property \"email\" on null in C:\\laragon\\www\\internphp\\app\\Jobs\\SendStudentLoginInfoJob.php:31\nStack trace:\n#0 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(255): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Attempt to read...\', \'C:\\\\laragon\\\\www\\\\...\', 31)\n#1 C:\\laragon\\www\\internphp\\app\\Jobs\\SendStudentLoginInfoJob.php(31): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Attempt to read...\', \'C:\\\\laragon\\\\www\\\\...\', 31)\n#2 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendStudentLoginInfoJob->handle()\n#3 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#9 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#10 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendStudentLoginInfoJob), false)\n#12 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#13 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentLoginInfoJob))\n#14 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendStudentLoginInfoJob))\n#16 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\internphp\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\laragon\\www\\internphp\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\laragon\\www\\internphp\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2024-09-04 03:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(45, '2024_08_19_075033_create_students_table', 1),
(46, '2024_08_19_075108_create_subjects_table', 1),
(47, '2024_08_19_075150_create_departments_table', 1),
(48, '2024_08_19_075227_create_subject_results_table', 1),
(49, '2024_08_20_025208_create_permission_tables', 2),
(50, '2014_10_12_100000_create_password_resets_table', 3),
(51, '2024_09_04_094315_create_jobs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('vantuan334456@gmail.com', '$2y$12$bWQ4f6MxhqpNgnRRVBlJquM7hwIt4s4ZvDqjphmNsxcfLz4cQZpU6', '2024-08-27 09:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add department', 'web', '2024-08-19 20:34:42', '2024-08-19 20:34:42'),
(2, 'edit department', 'web', '2024-08-19 20:35:56', '2024-08-19 20:35:56'),
(3, 'list department', 'web', '2024-08-19 20:36:08', '2024-08-19 20:36:08'),
(4, 'delete department', 'web', '2024-08-19 20:36:18', '2024-08-19 20:36:18'),
(5, 'add subject', 'web', '2024-08-19 20:38:33', '2024-08-19 20:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-08-19 20:34:42', '2024-08-19 20:34:42'),
(2, 'user', 'web', '2024-08-19 20:38:33', '2024-08-19 20:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `student_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `gender` tinyint DEFAULT '0',
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_code`, `image`, `birthday`, `gender`, `phone`, `address`, `status`, `user_id`, `department_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, 'PH021004', 'public/RTX1U3JJLmS9M9ycp4RedWw0jQAPBTaJqXsFjwfs.jpg', '2004-10-02', 1, '0904764313', '132/86 Nguyên Xá', 2, 16, 9, NULL, NULL, '2024-08-27 02:21:02'),
(23, 'PH36191', 'public/Jduar9ZeoIZX5XvnSUHWl8FGZv2T56nWvVDeOS2i.jpg', '2000-07-12', 1, '0392328141', 'Đông Khê, Đồn Sơn, Thanh Hóa', 0, 17, 9, NULL, NULL, '2024-08-26 20:48:30'),
(24, 'PH36224', 'public/OMpNMxz39Q7mh6tiAbYeLdiESfkARSPXDRCn2aGc.jpg', '2003-03-13', 0, '0388102058', 'Mê Linh, Hà Nội', 0, 18, 4, NULL, NULL, '2024-08-28 02:31:48'),
(25, 'PH31308', 'images/1725433585', '2008-03-31', 0, '0388102058', 'Hà Nội', 0, 59, 4, '2024-09-04 00:19:13', '2024-09-04 00:06:25', '2024-09-04 00:19:13'),
(26, 'PH16104', '', '2003-01-16', 1, '0862882208', 'Hà Nội', 0, 60, 8, '2024-09-04 00:19:09', '2024-09-04 00:15:51', '2024-09-04 00:19:09'),
(27, 'PH22124', 'public/2q944nZGHSsYMAOQNC2i3P98bKbnh3MToLPH6cKJ.jpg', '2004-12-22', 0, '0392328141', 'Hà Nội', 0, 61, 4, NULL, '2024-09-04 00:18:51', '2024-09-04 00:18:51'),
(29, 'PH2003', 'public/QKhkAcAuDk169H1utcPOg2BdzEroRRJgMAP5wkNP.jpg', '2003-01-16', 1, '0904447857', 'Hà Nội', 0, 63, 8, '2024-09-04 02:52:43', '2024-09-04 02:43:38', '2024-09-04 02:52:43'),
(30, 'PH021005', 'public/zblFrB8If9aDnUM1pbob6vXr7AP7mqMWeG9Z02IO.jpg', '2003-01-10', 1, '0223584941', 'Hà Nội', 0, 64, 8, '2024-09-04 03:16:10', '2024-09-04 02:55:17', '2024-09-04 03:16:10'),
(32, 'PH', 'public/j2gn6nFP0HepTFycZIgZ3YkdG3xZjVOpoSmKFtIz.jpg', '2003-01-16', 1, '0904732254', 'Hà Nội', 0, 66, 8, '2024-09-04 19:04:58', '2024-09-04 03:19:48', '2024-09-04 19:04:58'),
(33, 'PH021005', 'public/HxZKIFe6cRrFfe5MI7TXHKiCePCQ3gEwfonTKHEl.jpg', '2003-01-16', 1, '0338457284', 'Hà Nội', 1, 67, 9, NULL, '2024-09-04 19:07:06', '2024-09-04 19:07:06'),
(34, 'PH09304', 'public/XzQeJFUK6dIo9EEyAzrf75vJeCgFyUrdQi6tUFng.jpg', '2004-03-09', 0, '0342317213', 'Thanh Hóa', 0, 68, 4, '2024-09-08 23:56:15', '2024-09-04 20:30:11', '2024-09-08 23:56:15'),
(35, 'PH34583', 'public/uAUP8jcpo3oDf4MQVbgzJl4eXFvwY7mElNiUnI7v.png', '2004-11-09', 0, '0942624758', 'Ba Vì, Hà Nội', 0, 69, 4, NULL, '2024-09-04 20:36:53', '2024-09-04 20:36:53'),
(36, 'PH200156', 'public/TamPYA0mpRD1WxogejDVllj4gJ0hXhBL3M3B2zV5.png', '2001-08-22', 0, '0354224531', 'Hưng Yên', 0, 70, 4, NULL, '2024-09-04 20:40:15', '2024-09-04 20:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `score` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`id`, `student_id`, `subject_id`, `score`, `created_at`, `updated_at`) VALUES
(2, 19, 5, 9.00, NULL, '2024-09-10 19:25:41'),
(3, 23, 2, 8.00, NULL, NULL),
(4, 23, 5, 7.00, NULL, NULL),
(5, 23, 3, 8.00, NULL, NULL),
(6, 24, 15, 10.00, NULL, NULL),
(7, 24, 4, 8.20, NULL, NULL),
(8, 27, 17, 9.00, NULL, NULL),
(9, 24, 19, 9.00, NULL, NULL),
(10, 24, 15, 9.50, NULL, NULL),
(11, 24, 17, 9.50, NULL, NULL),
(12, 24, 4, 7.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `description`, `department_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Lập trình PHP3', 'Làm quen với framework laravel', 9, '2024-08-26 23:42:01', '2024-08-21 19:23:14', '2024-08-26 23:42:01'),
(3, 'Lập trình PHP1', 'Lập trình PHP', 9, NULL, NULL, NULL),
(4, 'Photoshop', 'Photo', 4, '2024-08-22 00:52:04', '2024-08-21 02:44:34', '2024-08-22 00:52:04'),
(5, 'Lập trình PHP2', 'Học về lập trình hướng đối tượng', 9, NULL, NULL, '2024-08-28 21:02:42'),
(7, 'Lập trình java 1', 'Java cơ bản cho người mới', 8, '2024-08-26 23:41:10', '2024-08-25 21:01:58', '2024-08-26 23:41:10'),
(8, 'JS nâng cao', 'JS nâng cao', 9, '2024-08-21 03:06:11', NULL, '2024-08-21 03:06:11'),
(15, 'PDP3', 'Phát triển cá nhân 2', 9, '2024-08-26 02:52:56', '2024-08-21 19:18:35', '2024-08-26 02:52:56'),
(17, 'Tiếng Anh 1.1', 'Tiếng Anh', 4, NULL, '2024-08-28 02:44:53', '2024-08-28 03:46:14'),
(18, 'tuantv', 'Chuyến bay Airline', 4, '2024-08-28 20:39:06', '2024-08-28 20:38:59', '2024-08-28 20:39:06'),
(19, 'Tiếng anh 1.2', 'Tiếng anh cơ bản', 9, NULL, '2024-08-30 00:13:26', '2024-08-30 00:13:26'),
(20, 'Marketing online', 'Marketing trên internet', 4, NULL, '2024-09-03 23:28:25', '2024-09-03 23:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'Trần Văn Tuấn', 'vantuan334456@gmail.com', '2024-08-30 00:02:47', '$2y$12$ruyx.sanEahMLng0Wt4VDOGI91squmee97sTrXkha72tVh83LWzVO', NULL, NULL, '2024-08-19 11:33:40', '2024-08-30 00:02:47'),
(17, 'tuantv', 'tuantvph36191@fpt.edu.vn', '2024-08-27 10:07:41', '$2y$12$7PjI2E5VhRRtQoc7QILpnOYB/8IGqFFGrfjzERzwfL/WwqyMpTNDe', NULL, NULL, '2024-08-19 19:25:16', '2024-08-27 10:07:41'),
(18, 'Nguyễn Thị Huyền', 'hn8624892@gmail.com', NULL, '$2y$12$SRZS4MXYGKAQj68AlTAWvu2XxWa3yJDAxHl1sdnMqqGIgHkhwaGt.', NULL, NULL, '2024-08-20 20:25:10', '2024-08-20 20:25:10'),
(61, 'Trần Văn Hoàn', 'hoantv12@gmail.com', NULL, '$2y$12$gctCtr6kFLfZgzK/vfyYSOVejotIusiEglqXi7og/e8neSlWVuoM2', NULL, NULL, '2024-09-04 00:18:51', '2024-09-04 00:18:51'),
(67, 'Phạm Thị Huệ', 'phamthihue3340@gmail.com', NULL, '$2y$12$IX2reqUdq3KFb6P59fMrsOxWI708vIOEzSx1zWUH2zXBkg.hySAE6', NULL, NULL, '2024-09-04 19:07:06', '2024-09-04 19:07:06'),
(68, 'Lê Thị Thùy Linh', 'linhxinhgai9324@gmail.com', NULL, '$2y$12$M/Ur8WSHGNPrKTbO5ciuZuwg7aJXGnFuqNAMWn1cB7.zlpOd8i4rq', NULL, NULL, '2024-09-04 20:30:11', '2024-09-04 20:30:11'),
(69, 'Nguyễn Minh Anh', 'minhanh2004bv@gmail.com', NULL, '$2y$12$QrXTd9k5BPZ9HNwFJYZMreKlDXO13n8GEDZUMhvixkaMQPhfvypK6', NULL, NULL, '2024-09-04 20:36:53', '2024-09-04 20:36:53'),
(70, 'Đoàn Thị Khánh Huyền', 'khanhhuyenftu01kdqt@gmail.com', NULL, '$2y$12$L8lRexOHj4hLxZV.RyvWZO/RBDWrNWMR6BHH5ClUk5Rj/PNAFZNuG', NULL, NULL, '2024-09-04 20:40:15', '2024-09-04 20:40:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_department_id_foreign` (`department_id`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_results_student_id_foreign` (`student_id`),
  ADD KEY `subject_results_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_department_id_foreign` (`department_id`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `subject_results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `subject_results_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
