-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Février 2019 à 16:54
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `resto_lacasadehavrais`
--

-- --------------------------------------------------------

--
-- Structure de la table `lcdh_card`
--

CREATE TABLE IF NOT EXISTS `lcdh_card` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(50) NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lcdh_categories`
--

CREATE TABLE IF NOT EXISTS `lcdh_categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(50) NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `lcdh_categories`
--

INSERT INTO `lcdh_categories` (`categories_id`, `categories_name`) VALUES
(1, 'Entrées'),
(2, 'Plats'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Structure de la table `lcdh_customers`
--

CREATE TABLE IF NOT EXISTS `lcdh_customers` (
  `customers_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_lastname` varchar(50) NOT NULL,
  `customers_firstname` varchar(50) NOT NULL,
  `customers_mail` varchar(50) NOT NULL,
  `customers_phone` varchar(50) NOT NULL,
  `customers_readyHour` date NOT NULL,
  PRIMARY KEY (`customers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `lcdh_customers`
--

INSERT INTO `lcdh_customers` (`customers_id`, `customers_lastname`, `customers_firstname`, `customers_mail`, `customers_phone`, `customers_readyHour`) VALUES
(1, 'Benhamouda', 'Yassine', 'yassine@yas.fr', '06525252', '2019-02-21');

-- --------------------------------------------------------

--
-- Structure de la table `lcdh_customerstodishes`
--

CREATE TABLE IF NOT EXISTS `lcdh_customerstodishes` (
  `customers_id` int(11) NOT NULL,
  `dishes_id` int(11) NOT NULL,
  `customersToDishes_quantity` tinyint(4) NOT NULL,
  PRIMARY KEY (`customers_id`,`dishes_id`),
  KEY `LCDH_customersToDishes_LCDH_dishes0_FK` (`dishes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lcdh_customerstodishes`
--

INSERT INTO `lcdh_customerstodishes` (`customers_id`, `dishes_id`, `customersToDishes_quantity`) VALUES
(1, 2, 3),
(1, 5, 3),
(1, 8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `lcdh_dishes`
--

CREATE TABLE IF NOT EXISTS `lcdh_dishes` (
  `dishes_id` int(11) NOT NULL AUTO_INCREMENT,
  `dishes_name` varchar(50) NOT NULL,
  `dishes_description` text NOT NULL,
  `dishes_price` varchar(50) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `subCategories_id` int(11) NOT NULL,
  PRIMARY KEY (`dishes_id`),
  KEY `LCDH_dishes_LCDH_categories_FK` (`categories_id`),
  KEY `LCDH_dishes_LCDH_subCategories0_FK` (`subCategories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Contenu de la table `lcdh_dishes`
--

INSERT INTO `lcdh_dishes` (`dishes_id`, `dishes_name`, `dishes_description`, `dishes_price`, `categories_id`, `subCategories_id`) VALUES
(1, 'Gaspacho multicolor', 'Trois coupes de gaspacho à la tomate, concombre et poivrons.', '8.00', 1, 1),
(2, 'Crema De Calabacín', 'Part de tarte à la crème de courgettes avec une petite salade.', '8.00', 1, 1),
(3, 'Tortillas de verduras', 'Assortiment de tortillas aux différents mélange de légumes. Accompagnée d’une crème d’avocat.', '8.00', 1, 1),
(4, 'Pipirrana', 'Salade savoureuse, fraîche et nutritive de légumes.', '8.00', 1, 1),
(5, 'Pan tumaca', 'Pain frotté à la tomate avec de l’huile d’olive et du sel.', '8.00', 1, 1),
(6, 'Patatas Bravas', 'Pomme de terre coupés en quartier et cuites au four. Accompagnée d’une sauce piquante.', '8.00', 1, 1),
(7, 'Empanadas', 'Chausson feuilleté farci à la viande et mélange de légumes.', '12.00', 1, 2),
(8, 'Foie y Jamón Ibérico', 'Toast de foie de canard et jambon ibérique avec de petits oignons.', '13.00', 1, 2),
(9, 'Tortilla de chorizo y queso', 'Assortiment de tortillas aux chorizo et différents fromages espagnols. Accompagnée d''une crème guacamole.', '12.00', 1, 2),
(10, 'Caldo Gallego', 'Bouillon de légumes et de lard.', '10.00', 1, 2),
(11, 'Croquetas', 'Croquetas de pollo (poulet) et croquetas de espinaca (épinard).', '13.00', 1, 3),
(12, 'Pinchitos de Pollo', 'Brochettes de poulet grillé avec du fromage.', '11.00', 1, 3),
(13, 'Tapas De Pollo Y Calabacín', 'Tapas de poulet et courgettes.', '12.00', 1, 3),
(14, 'Croquetas de gambas', 'Croquettes de crevettes crémeux grâce à la béchamel.', '13.00', 1, 4),
(15, 'Boquerones en Escabeche', 'Anchois au vinaigre.', '9.50', 1, 4),
(16, 'Empanadillas atún y queso cabra', 'Feuilleté de thon et fromage de chèvre, chaude ou froide, selon convenance. Accompagnée d''une crème guacamole.', '11.50', 1, 4),
(17, 'Paella', 'Plat traditionnelle modifié spécialement pour vous. Exclusivement avec des légumes !', '15.00', 2, 1),
(18, 'Pisto', 'Ratatouille espagnole. Avec ou sans œuf, selon la convenance. Exclusivement avec des légumes !', '14.50', 2, 1),
(19, 'Sopa fría de melón', 'Soupe fraîche de melon, servis avec une petite salade de légumes.', '13.50', 2, 1),
(20, 'Tortilla Andaluza', 'Galette de blé avec un mélange de légumes typiquement espagnol.', '13.00', 2, 1),
(21, 'Porrusalda', 'Estouffade de poireaux, carottes, pommes de terre, d''ail et d''oignon.', '13.00', 2, 1),
(22, 'Tomates rellenos', 'Tomates farcies froides aux légumes et accompagnée d''une sauce aïoli (ail et huile d''olive).', '12.50', 2, 1),
(23, 'Zarangollo de Murcie', 'Plat cuisiné aux courgettes et aux oignons de la ville de Murcie.', '13.50', 2, 1),
(24, 'Paella', 'Plat traditionnelle avec de la viande et du poisson. Exclusivement avec des légumes et du riz espagnole !', '17.00', 2, 2),
(25, 'Olla Podrida', 'Ragoût de viande et haricots blancs. Exclusivement avec des légumes espagnole !', '15.50', 2, 2),
(26, 'Potaje de garbanzos con chorizo y patata', 'Soupe aux pois chiches, chorizo et pommes de terre.', '15.00', 2, 2),
(27, 'Migas', 'Ragoût de pain frit avec des lardons.', '13.50', 2, 2),
(28, 'Fabada Asturiana', 'Plat à base de haricots blancs, de différents types de charcuteries, de porc, d''épices et de safran.', '16.00', 2, 2),
(29, 'Paella', 'Plat traditionnelle avec du poulet cuit à la braise et incorporer dans le riz. Exclusivement avec des légumes et du riz espagnole !', '16.50', 2, 3),
(30, 'Pollo a la Vasca', 'Poulet grillé à la flamme assaisonné aux légumes cuisiné à la basquaise. Exclusivement avec des légumes espagnole !', '16.00', 2, 3),
(31, 'Sopa de pollo', 'Soupe aux légumes, pois chiches et cuisses de poulet.', '15.50', 2, 3),
(32, 'Arroz a banda', 'Plat avec du riz d''un côté et le poisson de l''autre, assaisonné au safran. Exclusivement avec des légumes espagnole !', '17.00', 2, 4),
(33, 'Fideua', 'Paella de pâtes accompagné de poisson. Exclusivement avec des légumes espagnole !', '15.50', 2, 4),
(34, 'Bacalao a la Vizcaína', 'Morue basque accompagnée d''une sauce vizcaína.', '15.50', 2, 4),
(35, 'Mero a la Mallorquina', 'Mérou de Majorque avec dessus de nombreux légumes.', '15.00', 2, 4),
(36, 'Arroz Negro', 'Plat avec du riz noir cuisiner avec de l''encre de calamar et du poisson.', '15.00', 2, 4),
(37, 'Bacalao al Pil Pil', 'Morue basque cuisiner à l''huile d''olive et au piment.', '15.50', 2, 4),
(38, 'Pulpo a la Gallega', 'Poulpe à la galicienne cuit à l''huile d''olive et au paprika.', '15.00', 2, 4),
(39, 'Almejas', 'Palourdes aux épices.', '14.00', 2, 4),
(40, 'Caldereta de langosta', 'Marmite de langoustes bleu ou langoustes rouge, selon convenance.', '18.00', 2, 4),
(41, 'Arroz con Leche', 'Riz au lait accompagné de bâton de cannelle.', '6.00', 3, 5),
(42, 'Ensaimada', 'Brioche de Majorca.', '6.00', 3, 5),
(43, 'Flan', 'Part de flan accompagnée d''un coulis de chocolat et d''une crème fouettée.', '6.00', 3, 5),
(44, 'Xuxos', 'Beignet fourré à la crème pâtissière.', '6.00', 3, 5),
(45, 'Churros y chocolate caliente', 'Churros fait à la demande avec du chocolat noir fondue.', '6.00', 3, 5),
(46, 'Suspiro de Monja', 'Pets de nonne au nutella, à la confiture ou avec une boule de glace.', '6.00', 3, 5),
(47, 'Leche Merengada', 'Lait meringué fait avec du lait, des blancs d''oeufs, du sucre et de la cannelle.', '6.00', 3, 5),
(48, 'Crema catalana', 'Crème catalane qui ressemble beaucoup à la crème brûlée.', '6.00', 3, 5),
(49, 'Torrijas', 'Pain perdu espagnol.', '6.00', 3, 5),
(50, 'Turrón', 'Nougat espagnol fait avec un mélange de miel, amandes et blancs d''oeufs.', '6.00', 3, 5),
(51, 'Tarta de Santiago', 'Tarte de Saint Jacques principalement à la poudre d''amandes.', '6.00', 3, 5),
(52, 'Arrope', 'Sirop de raisins caramélisés.', '6.00', 3, 5),
(53, 'Guirlache', 'Confiserie originaire de la région d''Aragon, similaire au nougat.', '6.00', 3, 5),
(54, 'Miguelitos', 'Biscuits feuilletés à la ganache.', '6.00', 3, 5),
(55, 'Brazo de Gitano', 'Gâteau roulé à la crème pâtissière.', '6.00', 3, 5),
(56, 'Empanada de manzana', 'Chausson aux pommes.', '6.00', 3, 5),
(57, 'Taza de helado', 'Deux boules de glace avec parfum au choix.', '6.00', 3, 5),
(58, 'Saucisse de schtrouphh', 'Spécialité de gargamel', '8.00', 3, 5),
(59, 'dessert', 'dftudy', '9.00', 3, 5),
(60, 'tapas', 'Incroyable !', '12.22', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `lcdh_dishestocard`
--

CREATE TABLE IF NOT EXISTS `lcdh_dishestocard` (
  `dishes_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  PRIMARY KEY (`dishes_id`,`card_id`),
  KEY `LCDH_dishesToCard_LCDH_card0_FK` (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lcdh_reservation`
--

CREATE TABLE IF NOT EXISTS `lcdh_reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_lastname` varchar(50) NOT NULL,
  `reservation_firstname` varchar(50) NOT NULL,
  `reservation_numTel` varchar(10) NOT NULL,
  `reservation_mail` varchar(50) NOT NULL,
  `reservation_mailConfirm` int(11) NOT NULL,
  `reservation_smsConfirm` int(11) NOT NULL,
  `reservation_dateResa` date NOT NULL,
  `reservation_hourResa` time NOT NULL,
  `reservation_nbPers` int(11) NOT NULL,
  `reservation_arrive` tinyint(4) NOT NULL,
  `tables_id` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `tables_id` (`tables_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `lcdh_reservation`
--

INSERT INTO `lcdh_reservation` (`reservation_id`, `reservation_lastname`, `reservation_firstname`, `reservation_numTel`, `reservation_mail`, `reservation_mailConfirm`, `reservation_smsConfirm`, `reservation_dateResa`, `reservation_hourResa`, `reservation_nbPers`, `reservation_arrive`, `tables_id`) VALUES
(1, 'lastname', 'firstname', 'numTelResa', 'mailResa', 0, 0, '0000-00-00', '00:00:00', 0, 0, 1),
(2, 'BERNARD', 'Josette', '0607080910', 'josette@bernard.fr', 0, 0, '0000-00-00', '00:00:13', 5, 0, 2),
(3, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-22', '00:00:01', 2, 0, 1),
(4, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-22', '00:00:01', 2, 0, 2),
(5, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-22', '00:00:01', 2, 0, 2),
(6, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-22', '00:00:01', 2, 0, 1),
(7, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:06', 5, 0, 2),
(8, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:06', 5, 0, 2),
(9, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:03', 5, 0, 1),
(10, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:03', 5, 0, 2),
(11, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:01', 5, 0, 1),
(12, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:01', 5, 0, 1),
(13, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:01', 5, 0, 2),
(14, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:01', 5, 0, 1),
(15, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:01', 5, 0, 2),
(16, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-21', '00:00:01', 5, 0, 2),
(17, 'JEAN', 'Laura', '0644040674', 'laura.50.jean@gmail.com', 0, 0, '2019-02-28', '11:30:00', 5, 0, 2),
(18, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 2),
(19, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 1),
(20, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 1),
(21, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 2),
(22, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 1),
(23, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 1),
(24, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 2),
(25, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 2),
(26, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 1),
(27, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 1),
(28, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 2),
(29, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 2),
(30, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 2),
(31, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 2),
(32, 'Benhamouda', 'Yassine', '0644040674', 'yassine@gmail.fr', 0, 0, '2019-02-21', '11:30:00', 5, 0, 1),
(33, 'JONJON', 'Jonhathan', '0258697458', 'jonhathan@jonjon.com', 0, 0, '2019-02-21', '11:30:00', 5, 0, 1),
(34, 'JONJON', 'Jonhathan', '0258697458', 'jonhathan@jonjon.com', 0, 0, '2019-02-21', '11:30:00', 5, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lcdh_subcategories`
--

CREATE TABLE IF NOT EXISTS `lcdh_subcategories` (
  `subCategories_id` int(11) NOT NULL AUTO_INCREMENT,
  `subCategories_name` varchar(50) NOT NULL,
  PRIMARY KEY (`subCategories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `lcdh_subcategories`
--

INSERT INTO `lcdh_subcategories` (`subCategories_id`, `subCategories_name`) VALUES
(1, 'Végétarien'),
(2, 'Viande'),
(3, 'Volaille'),
(4, 'Poisson'),
(5, 'Aucun');

-- --------------------------------------------------------

--
-- Structure de la table `lcdh_tables`
--

CREATE TABLE IF NOT EXISTS `lcdh_tables` (
  `tables_id` int(11) NOT NULL AUTO_INCREMENT,
  `tables_numTables` varchar(10) NOT NULL,
  PRIMARY KEY (`tables_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `lcdh_tables`
--

INSERT INTO `lcdh_tables` (`tables_id`, `tables_numTables`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `lcdh_customerstodishes`
--
ALTER TABLE `lcdh_customerstodishes`
  ADD CONSTRAINT `LCDH_customersToDishes_LCDH_customers_FK` FOREIGN KEY (`customers_id`) REFERENCES `lcdh_customers` (`customers_id`),
  ADD CONSTRAINT `LCDH_customersToDishes_LCDH_dishes0_FK` FOREIGN KEY (`dishes_id`) REFERENCES `lcdh_dishes` (`dishes_id`);

--
-- Contraintes pour la table `lcdh_dishes`
--
ALTER TABLE `lcdh_dishes`
  ADD CONSTRAINT `LCDH_dishes_LCDH_categories_FK` FOREIGN KEY (`categories_id`) REFERENCES `lcdh_categories` (`categories_id`),
  ADD CONSTRAINT `LCDH_dishes_LCDH_subCategories0_FK` FOREIGN KEY (`subCategories_id`) REFERENCES `lcdh_subcategories` (`subCategories_id`);

--
-- Contraintes pour la table `lcdh_dishestocard`
--
ALTER TABLE `lcdh_dishestocard`
  ADD CONSTRAINT `LCDH_dishesToCard_LCDH_dishes_FK` FOREIGN KEY (`dishes_id`) REFERENCES `lcdh_dishes` (`dishes_id`),
  ADD CONSTRAINT `LCDH_dishesToCard_LCDH_card0_FK` FOREIGN KEY (`card_id`) REFERENCES `lcdh_card` (`card_id`);

--
-- Contraintes pour la table `lcdh_reservation`
--
ALTER TABLE `lcdh_reservation`
  ADD CONSTRAINT `tables_id_fk` FOREIGN KEY (`tables_id`) REFERENCES `lcdh_tables` (`tables_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
