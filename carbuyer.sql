-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 10:52 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carbuyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `disabled`, `parent`) VALUES
(1, 'Automobili', 0, 0),
(4, 'Oldtimeri', 0, 1),
(5, 'Motocikli', 0, 0),
(99, 'Kamioni', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(7, 'Bjelovarsko-bilogorska'),
(12, 'Brodsko-posavska'),
(19, 'Dubrovačko-neretvanska'),
(21, 'Grad Zagreb'),
(18, 'Istarska'),
(4, 'Karlovačka'),
(6, 'Koprivničko-križevačka'),
(2, 'Krapinsko-zagorska'),
(9, 'Ličko-senjska'),
(20, 'Međimurska'),
(14, 'Osječko-baranjska'),
(11, 'Požeško-slavonska'),
(8, 'Primorsko-goranska'),
(15, 'Šibensko-kninska'),
(3, 'Sisačko-moslavačka'),
(17, 'Splitsko-dalmatinska'),
(5, 'Varaždinska'),
(10, 'Virovitičko-podravska'),
(16, 'Vukovarsko-srijemska'),
(13, 'Zadarska'),
(1, 'Zagrebačka');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `user_url` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `location` varchar(60) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `recent` varchar(15) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `brand` varchar(15) DEFAULT NULL,
  `model` varchar(15) DEFAULT NULL,
  `kilometers` double DEFAULT NULL,
  `power` smallint(6) DEFAULT NULL,
  `engine_displacement` varchar(15) DEFAULT NULL,
  `transmission` varchar(15) DEFAULT NULL,
  `transmission_number` varchar(15) DEFAULT NULL,
  `motor_type` varchar(200) DEFAULT NULL,
  `manufacture_year` smallint(6) DEFAULT NULL,
  `image` varchar(500) CHARACTER SET latin1 NOT NULL,
  `image2` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `image3` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `image4` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `image5` varchar(500) DEFAULT NULL,
  `image6` varchar(500) DEFAULT NULL,
  `image7` varchar(500) DEFAULT NULL,
  `image8` varchar(500) DEFAULT NULL,
  `image9` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL,
  `slag` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `user_url`, `name`, `location`, `status`, `recent`, `description`, `category_id`, `price`, `brand`, `model`, `kilometers`, `power`, `engine_displacement`, `transmission`, `transmission_number`, `motor_type`, `manufacture_year`, `image`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `date`, `slag`) VALUES
(29, '3', 'gnEOLQ20LXNO2KOBTzPKkMCwp4lHM3epj4FpN9E2FDpqkfqT', 'Audi A4 1,8 TFSI', 'Šibensko-kninska', 'Za prodaju', 'Da', 'Prodaja ili zamjena Auto u odlicnom stanju, prisa samo 120 000 km, moguca provjera bilo di o vasem trosku. Reg do 4 mjeseca, ulaganja nema Servisna knjizica i izvjesce sa Car Vertical Moze zamjena iskljucivo za: Mercedes C klasa Honda Accord Mazda cx 3 Kljuc za kljuc ili moja nadoplata Nista starije od 2008 godine i iznad 180 000 km Prednost imaju benzinci( plin ne dolazi u obzir) Likovi sa forama ciji je auto skuplji zato jer je zamjena neka me ne uznemiravaju. Dodatne slike saljem na whatsapp, viber ili mail', 1, 67401, 'Audi', 'A4', 120000, 88, '1.8', 'Ručni', '6', 'Benzin', 2008, 'uploads/69xSlNX9E4NFE6NqM04A5erAurwY67nHPwIa640ib2YmEYdlZAZHfe7W4Sgy.jpg', 'uploads/0HWr2QaTMpSRGzVXhWrvpNyuWbNJfixRLQhps1m0PDEro88Vl06M0RMtgo0D.jpg', 'uploads/lkGMNDFasXfZkzyAWudQhmnTuP4mZbHhtt82c0YoWGH8VIHc8MERTmKBRATP.jpg', 'uploads/CJE6dnpV70IKTIslwfRuRaZ1VZAt4a0AoWKZMr6r2bGqluX0FHBRADmRNMak.jpg', 'uploads/r9Xmfv0MCKZTkwKrIeLaxdR2XctKWBchS1C7yzFfJqgQM6evMIesh4ws7pb5.jpg', 'uploads/SLR2HY9gladJOyi7LHM8J2iNhVUDgAnpPjO9v35yBzTxKfkuhmxj4RzZtbYb.jpg', 'uploads/IKnSr1u6KrVa70NZMi7AU1q7lJJvhIZt0ob9oXljKOywwRjQFUGaFMy4Vqdb.jpg', '', '', '2021-10-02 09:07:49', 'audi-a4-1-8-tfsi'),
(30, '3', 'gnEOLQ20LXNO2KOBTzPKkMCwp4lHM3epj4FpN9E2FDpqkfqT', 'Audi A4 Avant 2.0 TDI Multitronic 110kw - 5 Godina Garancije!', 'Varaždinska', 'Za prodaju', 'Da', 'Referencijski broj:190396  Vozilo je spremno za isporuku!  Vozilo se nalazi na lokaciji Optujska 155, 42000 Varaždin.   Kontakt:  Valentina Langus 099 366 49 49 valentina.lagnus@psc-varazdin.hr  Boris Dovečer 098 173 89 42 boris.dovecer@psc-varazdin.hr  *Cijena se odnosi na gotovinsko / virmansko plaćanje te na financiranje putem autokredita / leasinga, te ne obuhvaća plaćanje putem potrošačkih kredita *vozilo se može kupiti putem kreditne kartice visa (PBZ) do 60 rata  Nudimo vam: * besplatnu procjenu vašeg vozila * zamjenu vašeg vozila za vozilo iz naše ponude OGLASI SE GENERIRAJU AUTOMATSKI! Zato postoji mogućnost odstupanja u opisu dodatne opreme iz oglasa i vozila. Psc Zagreb će uložiti sve kako bi osigurao da se oglasi ne razlikuju od stvarnih podataka na vozilima za što se unaprijed ispričavamo. Za točne podatke o vozilu, motoru, opremi, mjenjaču, godištu i točne kilometre, molimo Vas da provjerite osobno na vozilu ili kod prodavatelja.', 1, 105900, 'Audi', 'A4', 186810, 110, '2.0', 'Automatski', '0', 'Diesel', 2015, 'uploads/KffOZQQOMlwRL7LzyFxr7Z1oW43ft8cdWvoWHGgPd8zcY0Nya8Bad1jS9Vmo.jpg', 'uploads/lP1e9Ih4vRY54ds5ZPIJo1n30EwbhLM5TPUhkW8OYlq4lMABgQlVVOl64xsZ.jpg', 'uploads/lWFG0ZKW8Nu3NaTfEnVsKzjIZyNwMk2UYoXtY1J9OBkcBvR420ar6pHK2S5s.jpg', 'uploads/5gkFSjnaIao4wxIFzcVo2WVxkngNapl7c0ofqjApyKxug04IAtJOJtLESuC5.jpg', '', '', '', '', '', '2021-10-02 09:10:47', 'audi-a4-avant-2-0-tdi-multitronic-110kw-5-godina-garancije'),
(31, '3', 'gnEOLQ20LXNO2KOBTzPKkMCwp4lHM3epj4FpN9E2FDpqkfqT', 'Ford Fairmont Reg. 9/22 35tis Milja Prvi Lak Automatik Klima', 'Grad Zagreb', 'Za prodaju', 'Da', 'Ford fairmont  -jedini koji se prodaje u Hrvatskoj i susjednim zemljama  -registriran godinu dana  -nove gume  -prvi lak,sve u potpuno orginalnom stanju  -1978g  -klima  -automatik  -antena na struju  -2000kubika,66kw,benzinac  -unutrašnjost kao nova  -35000 milja odnosno 55000 km cca uvezen 1993 u Hrvatsku iz Švedske ,posjedujem svu dokumentaciju  095 1972 537', 4, 60000, 'Ford', 'Fiesta', 35000, 74, '1.6', 'Ručni', '5', 'Benzin', 1990, 'uploads/kTbv9U2yhOuJqPOy32ydTk5n4Whdp1dhe9bDC8iGmzJYLNk2r2NGqJSG61mO.jpg', 'uploads/e0UGzgwwMuJ5Hf73R96T9RmwePAoiHGOQhlJHfkANU3znAoFSwyNaz4NpYor.jpg', 'uploads/k1nVxm0cEKLcvV7s57qp2LjGXHWQuwbYZmXlyeDFJcCI16EQV66Yjli92YDA.jpg', 'uploads/BXZyHs3ll3We9Limf09JDp57w4zJzBSi6gsjs4NlcXuX8S4TcOyuLprB3kzY.jpg', 'uploads/NzmjtXK70VMN4nbaE08T7g0jC5VVZA9h1QxLY5Pfg5NKR0hRd6YHc1ynFDfe.jpg', '', '', '', '', '2021-10-02 09:15:28', 'ford-fairmont-reg-9-22-35tis-milja-prvi-lak-automatik-klima'),
(32, '3', 'gnEOLQ20LXNO2KOBTzPKkMCwp4lHM3epj4FpN9E2FDpqkfqT', 'BMW 325 Ix', 'Bjelovarsko-bilogorska', 'Za prodaju', 'Ne', '21 000€ samo keš, bez zamjena Samo poziv bez poruka!!! 091 188 1001', 1, 157500, 'BMW', 'Serija 3', 400000, 74, '1.6', 'Ručni', '5', 'Benzin', 1986, 'uploads/TbGBODg7HsNgpoiD9adVHiXpJPUTpv5QzmWTJaiEahHablhPRCr0bDb16DJ9.jpg', 'uploads/fuWQV9eyEVzwa0kjLi9eh7NOpm6iH7yDwWxsE0vl6lsZRFQPkTtX3b2SEQoq.jpg', 'uploads/dvdYiTbPKyxOgn97o4pCiuZGLFS1O3TnpBfe7puYvJqWpsWjJ0zxfRlOaQAR.jpg', '', '', '', '', '', '', '2021-10-02 10:41:08', 'bmw-325-ix'),
(33, '5', 'f1SoICtD5UKN2xgvDW9A7vPt6PrPBXMGL96ekOFFDhduhv7Ibmvv', 'BMW R 1200 GS, 2005 God.', 'Zagrebačka', 'Za prodaju', 'Da', 'Uščuvan, održavan motor, bočni original BMW Vario kuferi + centralni alu kufer Kappa, Givi tank torba, crashbar. Zadnji servis na 78000 napravljen u Autostar BMW Italija : remen alternatora, svječice, sva ulja (motor, getriba, kardan, kočnice), filter ulje, zrak , gorivo, podešavanje ventila ... U sezoni 04/2021 promjenjeno ulje (Motorex Boxer 4T) + filter . Model bez ABS-a, sa ručnim podešavanjem ovjesa. Probna voznja moguča uz polog istaknute cijene motora po načelu pad=kupljeno vozilo, ili bez pologa (kupac kao suvozač).', 5, 48679, 'BMW', 'M', 87200, 74, '1.1', 'Ručni', '5', 'Benzin', 2005, 'uploads/paS7fLYKMX36zCvszQhltfqG95mxQ7Kx9NuhQmWarz5RPyT080E4xcuKpYMM.jpg', 'uploads/ZzsvfDdgUD4hp6IGC3fdK0AKpvcGjxjbJqXnrJVG4wmtNfBKcx5E99AxFxdB.jpg', 'uploads/k4hPHCOlCTCpw0cr2atAuk7TdviUDuxlbQtS7Cyg5zxd8L6PUcxP4WTnSJyU.jpg', '', '', '', '', '', '', '2021-10-02 10:50:36', 'bmw-r-1200-gs-2005-god');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `url_address` varchar(60) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `telephone` char(50) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(64) CHARACTER SET latin1 NOT NULL,
  `date` datetime NOT NULL,
  `rank` varchar(8) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `url_address`, `name`, `last_name`, `telephone`, `image`, `email`, `password`, `date`, `rank`) VALUES
(3, 'gnEOLQ20LXNO2KOBTzPKkMCwp4lHM3epj4FpN9E2FDpqkfqT', 'Bernard', 'Jelinić', '091-461-5251', 'users/dOO4alygjA4zPIh84BZw5FCVjlO0qW99RjMcF8JqnXRvrvnWfQLOZr2d5RDb.png', 'jelinic@gmail.com', 'd171d1631fe16faf77d359418904d910573d7155', '2021-04-12 07:46:02', 'admin'),
(5, 'f1SoICtD5UKN2xgvDW9A7vPt6PrPBXMGL96ekOFFDhduhv7Ibmvv', 'Ivo', 'Ivic', '091-777-9999', 'users/oSklUyYTdC2ki0q5r3KoHogTYyDfRw4Pb7U6qZoPNxfd6jQGnyWgJErNqNUk.jpg', 'ivic@gmail.com', '6e41f63dd3bdf5746e807317524d94a5fbc17a27', '2021-06-29 09:07:53', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slag` (`slag`),
  ADD KEY `date` (`date`),
  ADD KEY `price` (`price`),
  ADD KEY `category` (`category_id`),
  ADD KEY `description` (`description`(768)),
  ADD KEY `user_url` (`user_url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `email` (`email`),
  ADD KEY `name` (`name`),
  ADD KEY `rank` (`rank`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
