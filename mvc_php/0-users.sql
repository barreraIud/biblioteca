CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

INSERT INTO `users` (`id`, `name`) VALUES
(24, 'Abby Ward'),
(21, 'Aleksandra Devine'),
(43, 'Aston Simmonds'),
(47, 'Aston Simmonds'),
(15, 'Beth Skywalker'),
(26, 'Bridget Wooten'),
(10, 'Coby Kelleigh'),
(20, 'Darrah Shadow'),
(9, 'Drake Adelaide'),
(12, 'Elizabeth Stewart'),
(19, 'Gareth Solderini'),
(42, 'Gregor Bryant'),
(46, 'Gregor Bryant'),
(13, 'Hannah Strickland'),
(52, 'Harvey Frame'),
(7, 'Imogene Thad'),
(53, 'Ismaeel Carty'),
(41, 'Issac Calderon'),
(45, 'Issac Calderon'),
(2, 'Jane Doe'),
(5, 'Jaslyn Keely'),
(40, 'Jax Howe'),
(39, 'Joey Whyte'),
(1, 'John Doe'),
(17, 'Joseph Stewart'),
(34, 'Julia Greaves'),
(31, 'Junior Douglas'),
(32, 'Kaiden Bentley'),
(16, 'Kenneth Sanders'),
(30, 'Keziah Knapp'),
(28, 'Kirstie Thomas'),
(33, 'Lawrence Murphy'),
(14, 'Leah Shan'),
(51, 'Marcus Best'),
(29, 'Maya Paine'),
(23, 'Myla Bostock'),
(50, 'Nathaniel Khan'),
(4, 'Peers Sera'),
(6, 'Richard Breann'),
(54, 'Rowan Avalos'),
(3, 'Rusty Terry'),
(37, 'Sacha Gross'),
(27, 'Sally Castillo'),
(11, 'Sarah Sanders'),
(18, 'Seth Sonnel'),
(38, 'Shannon Peterson'),
(25, 'Shayan Clements'),
(49, 'Shoaib Vickers'),
(35, 'Sulaiman Gilmour'),
(44, 'Taran Morin'),
(48, 'Taran Morin'),
(22, 'Thelma Kim'),
(8, 'Tillie Sharalyn'),
(36, 'Virgil Collier');