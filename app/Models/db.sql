CREATE TABLE `inbox` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `message` text,
  `idSend` int NOT NULL,
  `idReceive` int NOT NULL,
  `created` datetime DEFAULT NULL,
)

CREATE TABLE `challenge` (
  `id` int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
)

CREATE TABLE `submission` (
  `id` int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idStudent` int unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
)