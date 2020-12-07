-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 03 déc. 2020 à 16:57
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `camagru`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `picture_id` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `id_picture_user` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `hour_comment` varchar(255) NOT NULL,
  `date_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `picture_id`, `author_id`, `id_picture_user`, `comment`, `hour_comment`, `date_comment`) VALUES
(11, '856302087003', 14, 23, 'Ton montage me plaît beaucoup !  :-)', '16h46', '22 nov. 2020'),
(47, '234821606275', 42, 19, 'L\'effet est super !', '08h55', '26 nov. 2020'),
(70, '856302087003', 42, 23, 'Ta photo me rappelle quelque chose lol ! 🧐', '10h37', '27 nov. 2020'),
(71, '54453663470', 42, 22, 'Ça donne envie de partir en vacances mdr !', '10h38', '27 nov. 2020'),
(72, '454110673654', 42, 13, 'Original lol...', '10h38', '27 nov. 2020'),
(73, '713630900461', 42, 36, 'T\'as vraiment été là bas ? Vraiment magnifique franchement !', '10h42', '27 nov. 2020'),
(74, '856302087003', 11, 23, 'Vraiment cool ! Le montage sort super bien et en plus avec les couleurs ça fait un contraste plutôt joli. Une de mes photos préférées  👍', '11h11', '27 nov. 2020'),
(75, '856302087003', 23, 23, 'C\'est à quel endroit ???  😍', '11h26', '27 nov. 2020'),
(76, '856302087003', 37, 23, 'On se croirait dans une série 😂😂😂', '11h32', '27 nov. 2020'),
(77, '454110673654', 28, 13, '🤨🧐 ???', '11h41', '27 nov. 2020'),
(78, '234821606275', 28, 19, 'C\'est vrai que l\'effet est cool ! bravo 👏👏👏', '11h42', '27 nov. 2020'),
(79, '203776170003', 34, 43, 'Super paysage !  😊', '16h33', '27 nov. 2020'),
(80, '880486740026', 34, 30, '😍😍😍✈✈✈', '16h35', '27 nov. 2020'),
(81, '749608469924', 34, 35, 'WASTED !  🚫', '16h36', '27 nov. 2020'),
(82, '321409238661', 34, 18, 'Flippant... 🥺🥺🥺', '16h37', '27 nov. 2020'),
(83, '856302087003', 26, 23, 'COOOOOOOOOOOOOOOOOOL  👍👍👍', '16h39', '27 nov. 2020');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `picture_id` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `picture_id`, `id_user`) VALUES
(19, '234821606275', 42),
(20, '856302087003', 42),
(21, '454110673654', 42),
(22, '1852379259', 42),
(23, '321409238661', 42),
(24, '749608469924', 42),
(25, '301284000312', 42),
(26, '390997919933', 42),
(27, '425583608062', 42),
(28, '880316191615', 42),
(29, '701558018244', 42),
(31, '824089338151', 11),
(32, '985793036554', 11),
(33, '234821606275', 23),
(34, '54453663470', 23),
(35, '856302087003', 23),
(36, '1852379259', 23),
(37, '321409238661', 23),
(38, '425583608062', 23),
(39, '856302087003', 33),
(40, '454110673654', 33),
(41, '1852379259', 33),
(42, '321409238661', 33),
(43, '603555923266', 33),
(44, '137160886757', 33),
(45, '985793036554', 33),
(46, '856302087003', 30),
(47, '203776170003', 30),
(48, '234821606275', 30),
(49, '824089338151', 30),
(50, '321409238661', 30),
(52, '1852379259', 30),
(53, '603555923266', 30),
(54, '301284000312', 30),
(55, '985793036554', 30),
(56, '332069341632', 30),
(57, '234821606275', 37),
(58, '1852379259', 37),
(59, '749608469924', 37),
(60, '321409238661', 37),
(61, '390997919933', 37),
(62, '213557954374', 37),
(63, '1852379259', 43),
(64, '321409238661', 43),
(65, '425583608062', 43),
(66, '301284000312', 43),
(67, '856302087003', 43),
(68, '234821606275', 29),
(69, '321409238661', 29),
(70, '1852379259', 29),
(71, '603555923266', 29),
(72, '425583608062', 29),
(73, '485953675398', 29),
(74, '856302087003', 5),
(75, '203776170003', 5),
(76, '54453663470', 5),
(77, '824089338151', 5),
(78, '234821606275', 5),
(79, '1852379259', 5),
(80, '321409238661', 5),
(81, '425583608062', 5),
(82, '214952361612', 5),
(83, '137160886757', 5),
(84, '332069341632', 5),
(85, '985793036554', 5),
(86, '701558018244', 5),
(87, '203776170003', 25),
(88, '439592762118', 25),
(89, '713630900461', 25),
(90, '1852379259', 25),
(91, '749608469924', 25),
(92, '321409238661', 25),
(93, '425583608062', 25),
(94, '137160886757', 25),
(95, '985793036554', 25),
(96, '332069341632', 25),
(97, '203776170003', 17),
(98, '856302087003', 17),
(99, '454110673654', 17),
(100, '1852379259', 17),
(101, '749608469924', 17),
(102, '321409238661', 17),
(103, '603555923266', 17),
(104, '425583608062', 17),
(105, '214952361612', 17),
(106, '203776170003', 27),
(107, '234821606275', 27),
(108, '1852379259', 27),
(109, '749608469924', 27),
(110, '321409238661', 27),
(111, '425583608062', 27),
(112, '603555923266', 27),
(113, '530089028120', 27),
(114, '214952361612', 27),
(115, '713630900461', 16),
(116, '203776170003', 16),
(117, '856302087003', 16),
(118, '1852379259', 16),
(119, '425583608062', 16),
(120, '321409238661', 16),
(121, '603555923266', 16),
(122, '214952361612', 16),
(123, '880486740026', 16);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwordUsr` varchar(255) NOT NULL,
  `notif` tinyint(1) NOT NULL,
  `keyUsr` varchar(255) NOT NULL,
  `tokenUsr` tinyint(1) NOT NULL,
  `idCTRL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `username`, `passwordUsr`, `notif`, `keyUsr`, `tokenUsr`, `idCTRL`) VALUES
(5, 'Alayari', 'Moncef', 'heliwem386@wpfoo.com', 'manssoufi', '$2y$10$1I1AUMm5/i86kKhBUumzAumGQcUHvN6G64pBEid1SKxW7p6v3cAa.', 1, '5f9be7e0c16e2701951236749772206', 1, '3254359815908725665f9be7e0c3887393616659420674703'),
(9, 'Almaliki', 'Anas', 'lastusespi@nedoz.com', '4nas', '$2y$10$rjeJ20fVgWXzMG25NF7nuOz0lCedew6tKoLB/oUCxur21dwac7VZy', 1, '5fabd1a6e8137651670742826286349', 1, '899405394161450495fabd1a6e8a70275940761062621682'),
(11, 'Dupont', 'Jean', 'naxeyoy729@biiba.com', 'Jedup', '$2y$10$Nft2FPtBrVrRKc7IneXJieR6EjPYGfa9JWYMI4F44/mlcFdIxq8A.', 1, '5fb1104d20e92162058298391118880', 1, '6014328653946697205fb1104d217e3188461937423772223'),
(12, 'Elayari', 'Rashid', 'rovab36808@patmui.com', 'yaShid63', '$2y$10$0qoGClR/klDvgUhOHizXsO3R6dJBV6VSgfOkqziYz85PiAN4s7cCC', 1, '5fb110c95392880343208495678629', 1, '2708384781264610685fb110c955bb8339380964007541201'),
(13, 'O\'conor', 'Jimmy', 'domaliv693@patmui.com', 'JimUK-00', '$2y$10$6jWHdCX.KjAQU0ZQP9Ac1Otd1VH5pfD0yBWn8UtiIyAjKQFZKaINu', 1, '5fb1113457210323948429424810535', 1, '1935579261276674055fb1113459413120694845064603667'),
(14, 'Mcounde', 'Bacary', 'savix23570@patmui.com', 'baca_baca', '$2y$10$UpfTikDpsI7JXCzx9hcuk.UTcuob0tmfOJ6hSuzKPQiiypKevrz2i', 1, '5fb111c1ddcbb259609976485288435', 1, '3878027244921237785fb111c1e006734589379908199432'),
(16, 'Puntodo', 'Ricardo', 'wodas51957@aalyaa.com', 'ricard0', '$2y$10$CaG7Q0HPU4UFFP6X0QLnpuPWQsj3q8//TrfOWuwkR6LjvZpPzYsSK', 1, '5fb1129aea7b4284221117106658901', 1, '5687034906153495015fb1129aec84b293162129175440440'),
(17, 'Elchabi', 'Anis', 'vifesi2694@patmui.com', 'Sin4-07', '$2y$10$YHW75sdUQ3x7nY9XK71PLOZnScUAQz97zUFegJ0rbwJt.P43uitfi', 1, '5fb112ecdccff101083306407858633', 1, '4604203430374100165fb112ecdef7e397902185847922815'),
(18, 'Moisson', 'Charles', 'linasip439@biiba.com', 'charly75-', '$2y$10$wL8pkFVosaNUEjw1X9ZvweIlBf7JMv1.opuIZ91Wjpm.1mpI/A8ea', 1, '5fb1133c2f636582469450823066340', 1, '5342766543570807525fb1133c3188c52764890792747481'),
(19, 'Basunbalungo', 'Ivatchi', 'godem30927@aalyaa.com', 'iva.tch100', '$2y$10$3zO1QSqE0AjXH/J4B35s9eH/UN2zuXdn0fcrCaCa1ffVydHhu53l6', 1, '5fb113b5a0034330433076615596109', 1, '847290059662210005fb113b5a209c381847671380744241'),
(20, 'Alshaykh', 'Bendar', 'jesovaf377@biiba.com', 'bend-00', '$2y$10$nCu6ToL3gikngAE0NgKNAebpVhNBjYzhrtvPkGLHit8GJJrzonB.O', 1, '5fb11435147f2613110183582648568', 1, '4729850582379203435fb1143516963355463163410297556'),
(21, 'Valsakov', 'Abdulmanap', 'toyawa6391@aalyaa.com', 'tractoooor', '$2y$10$f57y0lPJW40v7QDSeBzAseOohbwW7HfT7BCeHsRQRBslR2p72KNZC', 1, '5fb114cd2befb236460558689147327', 1, '4596047481040813035fb114cd323f1327909507965230215'),
(22, 'Ferjani', 'Chokri', 'xefol50956@biiba.com', 'cho-chok', '$2y$10$dIJxT/HSIa7Rje2dfamJw.jBgDU4E7nWQeZFo26Yq6sVi28i4hDOa', 1, '5fb11545d2dab441980815764381989', 1, '5829079328649083985fb11545d4fd895131204138392634'),
(23, 'Doe', 'John', 'conive4007@aalyaa.com', 'john-doe', '$2y$10$kMI0NBn39wjzeYbzhJ02IuSRIHdps4XjhilW5qlUtGlwZ8BCD4ISO', 1, '5fb115bef1736333608543357460691', 1, '6650367085270289045fb115bef39fe430759826290986943'),
(25, 'Ait ahmed', 'Jukurta', 'lirixat987@0335g.com', 'J.U.K.U.R.T', '$2y$10$qkB7BBuODuaau5yfVv.hnOxSzonhVRufMwgjjIi/B5gur1hnSQTD.', 1, '5fb128363a5a8169433517929084146', 1, '3972581686733722945fb128363c72393961125941593643'),
(26, 'Moisnier', 'Isabelle', 'poxet83686@0335g.com', 'I-SA777', '$2y$10$.kbhpa1JaDIazu5RbpoCWOSfS2mQnvNqGDZsxdZu8XYlXyhza8sJC', 1, '5fb12885434e9154045914160531900', 1, '2208140762755575115fb1288545617227516432697113660'),
(27, 'Nurgmadov', 'Ilchet', 'nareyi1797@aalyaa.com', 'ilcheto--', '$2y$10$sRdpx9UbexM77kC4w2UvkO3Ct3/kM9y9LIap7juY21bmogxVXE2bO', 1, '5fb12a49d9218892379395578810063', 1, '2819978202040208935fb12a49db448311203685944263862'),
(28, 'Bean', 'Mister', 'dixobi1352@aalyaa.com', 'Mr.bean', '$2y$10$7KI25RZBs4cfvPBq0tTM2uf7ksQKOJpcwmwIX/wZa/kS7F149CRCi', 1, '5fb12acef260b321631649437905513', 1, '1877035430682490045fb12acf0070363376502936243824'),
(29, 'Camara', 'Fode', 'fobese7390@patmui.com', 'fo-fode19', '$2y$10$2pFRqedr6paV.qKmA10nVeNkB1nv5LTLhNRWg6uXB2lNsXG9rF7oe', 1, '5fb12b421e244618750587108650924', 1, '5016618046724532525fb12b42205dc221263863449877710'),
(30, 'Elmansouri', 'Mountassar', 'lijih34452@biiba.com', 'L4rge007', '$2y$10$KQ4E8RS0HO.tt.MjQNEBk.pNwlM/zPIHIcoy3ztjxwcrqGN3A6r9e', 1, '5fb12bc3cc849305236273812298273', 1, '5541709037780785315fb12bc3ce948118955366700384639'),
(31, 'Martinez', 'Helena', 'hepar80599@aalyaa.com', 'hellona-3.3', '$2y$10$DMSJ.qgXBpUSc9vUz6eWsuw16WQXsPSjLv0qloqpyXkgEelt3lq.a', 1, '5fb12c28460a6479632804592159430', 1, '3852859768941292285fb12c2848443228161620096550031'),
(33, 'Muller', 'Hans', 'bevegev990@patmui.com', 'd3utshans', '$2y$10$cVvY8aj4w1J7mHmc36z3V.9K9/9bLGRX9DDabqOt7SazXNYQZBbhS', 1, '5fb12d22399cc482814929082222536', 1, '666233128431481665fb12d223bd17281563520945434791'),
(34, 'Majri', 'Abir', 'gogajey523@patmui.com', 'abirM216', '$2y$10$o1xmTbDG86Wa6GMCb33Que9HtIIpKjIkCxlEGLHyzOYmWM0EOPGKC', 1, '5fb12daf834d0550355031869352544', 1, '6460570276661471915fb12daf85cba297456110581529435'),
(35, 'Said', 'Sadik', 'milecoy844@0335g.com', 'Saidoud0k', '$2y$10$rdPUehhVp2vVdauKQc.nMuoZR6cCZwqtGI3PYvWEOUx6I89nZ2pW6', 1, '5fb12dfcafb60434553019694946224', 1, '6150762422133725365fb12dfcb1cd4288812261692035560'),
(36, 'Largo', 'Winch', 'sodas85668@patmui.com', 'larg0_tn', '$2y$10$pGR9pWi9XgUTEI3jZ.BC2e.I5wdGqrxzhVM17o52tF1jMYb.qrbnC', 1, '5fb12e40903d4711105294284227216', 1, '5091887267054721255fb12e40929aa183534251215797535'),
(37, 'Pernes', 'Anais', 'gefawom461@patmui.com', 'pincessan-94', '$2y$10$QWPGLRlMMQe8sVom5lyA1uRxS6S9nE2jeVd7hfXo8FE/3MZysfG4m', 1, '5fb12ebf72dc5790752851574127524', 1, '1949759120883624675fb12ebf7514a271623035786568151'),
(42, 'Firstname', 'Name', 'niwex93416@patmui.com', 'my_username', '$2y$10$.F7V/X6uPvWNgCH908aw5ezJurgdfIm.hY45KH8GLU0pN4fc9QqfO', 1, '5fb255176e7a4542387979080258185', 1, '6201287265417734545fb2551770bcc236550643446118981'),
(43, 'Bentahar', 'Milouda', 'ratov95083@patmui.com', 'AVENGERS6821002', '$2y$10$uik27b0cQ1r17ITwwyOyoOwuwqKjnXoQ5C9C1R2724FWCNkv0.mRe', 1, '5fb4d3ca6dbb4501795762214338358', 1, '5867755763334519645fb4d3ca6e597242980678879801865');

-- --------------------------------------------------------

--
-- Structure de la table `user_pictures`
--

CREATE TABLE `user_pictures` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `picture_id` varchar(255) NOT NULL,
  `picture_path` varchar(255) NOT NULL,
  `hour_picture` varchar(255) NOT NULL,
  `date_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_pictures`
--

INSERT INTO `user_pictures` (`id`, `id_user`, `picture_id`, `picture_path`, `hour_picture`, `date_picture`) VALUES
(95, 5, '669022218579', '../public/users_pictures/669022218579.jpeg', '11h09', '16 nov. 2020'),
(103, 42, '505625000502', '../public/users_pictures/505625000502.jpeg', '11h33', '16 nov. 2020'),
(104, 14, '863891096942', '../public/users_pictures/863891096942.jpeg', '12h05', '16 nov. 2020'),
(105, 25, '392090888626', '../public/users_pictures/392090888626.jpeg', '12h20', '16 nov. 2020'),
(106, 21, '323661136426', '../public/users_pictures/323661136426.jpeg', '13h04', '16 nov. 2020'),
(107, 27, '834708111745', '../public/users_pictures/834708111745.jpeg', '08h52', '18 nov. 2020'),
(108, 43, '923373168164', '../public/users_pictures/923373168164.jpeg', '08h58', '18 nov. 2020'),
(109, 16, '304433504113', '../public/users_pictures/304433504113.jpeg', '11h29', '18 nov. 2020'),
(110, 34, '833320496218', '../public/users_pictures/833320496218.jpeg', '11h30', '18 nov. 2020'),
(111, 33, '369143313557', '../public/users_pictures/369143313557.jpeg', '11h35', '18 nov. 2020'),
(112, 5, '878000906484', '../public/users_pictures/878000906484.jpeg', '11h36', '18 nov. 2020'),
(113, 42, '775387686223', '../public/users_pictures/775387686223.jpeg', '11h37', '18 nov. 2020'),
(114, 14, '604043669436', '../public/users_pictures/604043669436.jpeg', '11h37', '18 nov. 2020'),
(115, 25, '225099902719', '../public/users_pictures/225099902719.jpeg', '11h38', '18 nov. 2020'),
(116, 21, '144314041445', '../public/users_pictures/144314041445.jpeg', '11h38', '18 nov. 2020'),
(117, 27, '215788158055', '../public/users_pictures/215788158055.jpeg', '11h39', '18 nov. 2020'),
(118, 43, '133641573801', '../public/users_pictures/133641573801.jpeg', '11h40', '18 nov. 2020'),
(119, 16, '541091960833', '../public/users_pictures/541091960833.jpeg', '11h41', '18 nov. 2020'),
(120, 34, '195857398960', '../public/users_pictures/195857398960.jpeg', '11h41', '18 nov. 2020'),
(121, 33, '892148807848', '../public/users_pictures/892148807848.jpeg', '12h02', '18 nov. 2020'),
(122, 5, '485953675398', '../public/users_pictures/485953675398.jpeg', '12h06', '18 nov. 2020'),
(123, 42, '83501377123', '../public/users_pictures/83501377123.jpeg', '12h30', '18 nov. 2020'),
(124, 42, '210125350744', '../public/users_pictures/210125350744.jpeg', '12h30', '18 nov. 2020'),
(125, 14, '836847770430', '../public/users_pictures/836847770430.jpeg', '12h31', '18 nov. 2020'),
(126, 25, '146517123586', '../public/users_pictures/146517123586.jpeg', '12h33', '18 nov. 2020'),
(127, 42, '701558018244', '../public/users_pictures/701558018244.jpeg', '12h35', '18 nov. 2020'),
(128, 21, '826073508912', '../public/users_pictures/826073508912.jpeg', '12h38', '18 nov. 2020'),
(129, 27, '146213453635', '../public/users_pictures/146213453635.jpeg', '12h39', '18 nov. 2020'),
(130, 43, '738559217377', '../public/users_pictures/738559217377.jpeg', '12h40', '18 nov. 2020'),
(131, 42, '847459492506', '../public/users_pictures/847459492506.jpeg', '12h42', '18 nov. 2020'),
(132, 16, '3449704672', '../public/users_pictures/3449704672.jpeg', '12h43', '18 nov. 2020'),
(133, 34, '880316191615', '../public/users_pictures/880316191615.jpeg', '12h44', '18 nov. 2020'),
(134, 33, '549500300027', '../public/users_pictures/549500300027.jpeg', '12h45', '18 nov. 2020'),
(135, 42, '336457673433', '../public/users_pictures/336457673433.jpeg', '12h46', '18 nov. 2020'),
(136, 5, '21021422376', '../public/users_pictures/21021422376.jpeg', '12h49', '18 nov. 2020'),
(137, 14, '756324104061', '../public/users_pictures/756324104061.jpeg', '12h50', '18 nov. 2020'),
(138, 25, '667235027062', '../public/users_pictures/667235027062.jpeg', '12h55', '18 nov. 2020'),
(139, 42, '390997919933', '../public/users_pictures/390997919933.jpeg', '12h58', '18 nov. 2020'),
(140, 21, '968422694688', '../public/users_pictures/968422694688.jpeg', '13h08', '18 nov. 2020'),
(141, 42, '985793036554', '../public/users_pictures/985793036554.jpeg', '13h08', '18 nov. 2020'),
(142, 42, '332069341632', '../public/users_pictures/332069341632.jpeg', '13h09', '18 nov. 2020'),
(143, 42, '213557954374', '../public/users_pictures/213557954374.jpeg', '13h09', '18 nov. 2020'),
(144, 42, '301284000312', '../public/users_pictures/301284000312.jpeg', '13h10', '18 nov. 2020'),
(145, 42, '137160886757', '../public/users_pictures/137160886757.jpeg', '13h10', '18 nov. 2020'),
(146, 42, '698966780023', '../public/users_pictures/698966780023.jpeg', '13h11', '18 nov. 2020'),
(147, 20, '425583608062', '../public/users_pictures/425583608062.jpeg', '13h15', '18 nov. 2020'),
(148, 31, '603555923266', '../public/users_pictures/603555923266.jpeg', '13h17', '18 nov. 2020'),
(149, 30, '880486740026', '../public/users_pictures/880486740026.jpeg', '13h18', '18 nov. 2020'),
(150, 28, '530089028120', '../public/users_pictures/530089028120.jpeg', '13h20', '18 nov. 2020'),
(151, 18, '321409238661', '../public/users_pictures/321409238661.jpeg', '13h21', '18 nov. 2020'),
(152, 35, '749608469924', '../public/users_pictures/749608469924.jpeg', '13h23', '18 nov. 2020'),
(153, 26, '1852379259', '../public/users_pictures/1852379259.jpeg', '13h26', '18 nov. 2020'),
(154, 37, '214952361612', '../public/users_pictures/214952361612.jpeg', '13h29', '18 nov. 2020'),
(155, 22, '54453663470', '../public/users_pictures/54453663470.jpeg', '13h50', '18 nov. 2020'),
(156, 23, '856302087003', '../public/users_pictures/856302087003.jpeg', '13h55', '18 nov. 2020'),
(158, 11, '439592762118', '../public/users_pictures/439592762118.jpeg', '14h09', '18 nov. 2020'),
(159, 17, '824089338151', '../public/users_pictures/824089338151.jpeg', '14h13', '18 nov. 2020'),
(160, 13, '454110673654', '../public/users_pictures/454110673654.jpeg', '14h15', '18 nov. 2020'),
(161, 36, '713630900461', '../public/users_pictures/713630900461.jpeg', '14h17', '18 nov. 2020'),
(162, 43, '203776170003', '../public/users_pictures/203776170003.jpeg', '14h19', '18 nov. 2020'),
(163, 19, '234821606275', '../public/users_pictures/234821606275.jpeg', '14h20', '18 nov. 2020');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_pictures`
--
ALTER TABLE `user_pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `user_pictures`
--
ALTER TABLE `user_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
