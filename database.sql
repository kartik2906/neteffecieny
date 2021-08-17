CREATE TABLE `option` (
    `id` int(11) NOT NULL,
    `name` varchar(32) COLLATE utf8mb4_bin NOT NULL,
    `value` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
INSERT INTO `option` (`id`, `name`, `value`) VALUES
(1, 'display_price', 'yes'),(2, 'price', '50');
