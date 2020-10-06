
CREATE TABLE `Assignment` (
  `id` int unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mime` varchar(50) NOT NULL DEFAULT 'text/plain',
  `size` bigint unsigned NOT NULL DEFAULT '0',
  `data` mediumblob NOT NULL,
  `created` datetime NOT NULL,
  `type` enum('assignment','quiz') DEFAULT NULL,
)

CREATE TABLE `inbox` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `message` text,
  `idSender` int NOT NULL,
  `idReceiver` int NOT NULL,
  `created` datetime DEFAULT NULL,
  `isRead` tinyint(1) DEFAULT '0',
) 

CREATE TABLE `quizs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
)

CREATE TABLE `submission` (
  `id` int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idAssignment` int unsigned NOT NULL,
  `idStudent` int unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mime` varchar(50) NOT NULL DEFAULT 'text/plain',
  `size` bigint unsigned NOT NULL DEFAULT '0',
  `data` mediumblob NOT NULL,
  `created` datetime NOT NULL,
) 

CREATE TABLE `users` (
  `id` int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(100) DEFAULT NULL,
  `isAdmin` tinyint NOT NULL DEFAULT '0',
)