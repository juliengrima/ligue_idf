-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 07 avr. 2019 à 21:38
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ligue_idf`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `nom`, `address`, `postal`, `city`, `lat`, `lng`) VALUES
(1, 'Parc des Sports du Hameau N°1', 'Terrain Est 9 avenue Paul Langevin', '92350', 'LE-PLESSIS-ROBINSON', '48.7799999', '2.2509393'),
(2, 'Parc des Sports du Hameau N°2', 'Terrain Ouest/ATHLETISME 9 avenue Paul Langevin', '92350', 'LE-PLESSIS-ROBINSON', '48.7799999', '2.2509393'),
(3, 'STADE LEO LAGRANGE N°1', 'FACE AU PARC FLORAL, ROUTE DE LA PYRAMIDE BOIS DE VINCENNES', '75012', 'PARIS-12', '48.8359911', '2.4404719'),
(4, 'STADE LEO LAGRANGE N°2', 'TERRAIN MATUIDI, ROUTE DE LA PYRAMIDE FACE AU PARC FLORAL', '75012', 'PARIS-12', '48.8384951', '2.4443454'),
(5, 'STADE LEO LAGRANGE N°3', 'TERRAIN MIXTE FOOT/RUGBY ROUTE DE LA PYRAMIDE FACE AU PARC FLORAL', '75012', 'PARIS-12', '48.8359911', '2.4404719'),
(6, 'STADE LEO LAGRANGE N°4', 'TERRAIN BRAHIMI, ROUTE DE LA PYRAMIDE', '75012', 'PARIS-12', '48.830384', '2.4500277'),
(7, 'STADE GEORGE S LEFEVRE N°5', 'CAMP DES LOGES , AVENUE KENEDY', '78100', 'SAINT-GERMAIN-EN-LAYE', '48.9139812', '2.0822905'),
(8, 'STADE DU PARC DES PRINCES', '24 RUE DU COMMANDANT GUILBAUD', '75016', 'PARIS-16', '48.8414664', '2.2521336'),
(9, 'STADE GEORGE S LEFEVRE N°1', '10 AVENUE DU PRESIDENT JF KENNEDY', '78100', 'SAINT-GERMAIN-EN-LAYE', '48.9133844', '2.0774668'),
(10, 'STADE GEORGE S LEFEVRE N°2', 'TERRAIN ANNEXE, AVENUE KENNEDY CAMP DES LOGES', '78100', 'SAINT-GERMAIN-EN-LAYE', '48.9126472', '2.0783452'),
(11, 'STADE GEORGE S LEFEVRE N°3', 'TERRAIN ANNEXE, AVENUE KENNEDY CAMP DES LOGES', '78100', 'SAINT-GERMAIN-EN-LAYE', '48.9126472', '2.0783452'),
(12, 'STADE GEORGES LEFEVRE N°4', 'TERRAIN ANNEXE, AVENUE KENNEDY CAMP DES LOGES', '78100', 'SAINT-GERMAIN-EN-LAYE', '48.9126472', '2.0783452'),
(13, 'PARC DES SPORTS ET LOISIRS N°1', 'BOULEVARD DUCHER', '95310', 'SAINT-OUEN-L\'AUMONE', '49.0428396', '2.1035331'),
(14, 'PARC DES SPORTS ET LOISIRS N°2', 'TERRAIN ANNEXE 1, BOULEVARD DUCHER', '95310', 'SAINT-OUEN-L\'AUMONE', '49.041294', '2.1028297'),
(15, 'STADE LUCIEN ESCUTARY', '13 RUE LEO LAGRANGE', '95310', 'SAINT-OUEN-L\'AUMONE', '49.0329505', '2.1159401'),
(16, 'STADE LEO LAGRANGE', '60 BOULEVARD PONIATOWSKI', '75012', 'PARIS-12', '48.8312031', '2.398045'),
(17, 'COMPLEXE SPORTIF ALAIN MIMOUN', '15 RUE DE LA NOUVELLE CALEDONIE', '75012', 'PARIS-12', '48.8394199', '2.411723'),
(18, 'COMPEXE SPORTIF LOUIS LUMIERE 1', '30 RUE LOUIS LUMIERE', '75020', 'PARIS-20', '48.8589027', '2.4122905'),
(19, 'COMPLEXE SPORTIF LOUIS LUMIERE 2', 'TERRAIN ANNEXE , 30 RUE DE LOUIS LUMIERE', '75020', 'PARIS-20', '48.8589482', '2.4123574'),
(20, 'PARC DES SPORTS PLAINE NORD', 'CARREFOUR, POMPADOUR PARC INTERDEPARTEMENTAL', '94600', 'CHOISY-LE-ROI', '48.7592392', '2.4233437'),
(21, 'PARC DES SPORTS PLAINE SUD', 'CHEMIN DES BOEUFS,PARC INTERDEPARTEMENTAL', '94000', 'CRETEIL', '48.769434', '2.4315844'),
(22, 'STADE NELSON MANDELA 1', 'TERRAIN HONNEUR, 36 RUE PAUL PROUTEAU', '92250', 'LA-GARENNE-COLOMBES', '48.9050639', '2.2322177'),
(23, 'STADE NELSON MANDELA 2', 'TERRAIN ANNEXE, 36 RUE PAUL PROTEAU', '92250', 'LA-GARENNE-COLOMBES', '48.9050639', '2.2322177'),
(24, 'STADE NELSON MANDELA 3', 'TERRAIN ANNEXE, 36 RUE PAUL PROTEAU', '92000', 'NANTERRE', '48.9050639', '2.2322177'),
(25, 'STADE NELSON MANDELA 4', 'TERRAIN ANNEXE , 179 AVENUE FRANCOIS ARAGO', '92000', 'NANTERRE', '48.8996499', '2.2216578'),
(26, 'STADE MARCEL PAYEN', '132 AVENUE FRANCOIS ARAGO', '92000', 'NANTERRE', '48.9017763', '2.2277459'),
(27, 'STADE DU CHAT PERCHE', 'RUE DE LA PARABOLE', '95800', 'CERGY', '49.047647', '2.024076'),
(28, 'STADE DU CHAT PERCHE', 'RUE DE LA PARABOLE', '95800', 'CERGY', '49.047647', '2.024076'),
(29, 'COMPLEXE SPORTIF SALIF KEITA N°2', 'TERRAIN ANNEXE 1, BOULEVARD D\'OSNY PLAINE DES LINANDES', '95000', 'CERGY', '49.0532723', '2.0485062'),
(30, 'COMPLEXE SPORTIF SALIF KEITA N°1', 'TERRAIN HONNEUR, BOULEVARD D\'OSNY PLAINE DES LINANDES', '95000', 'CERGY', '49.0525242', '2.0464749'),
(31, 'COMPLEXE SPORTIF SALIF KEITA N°3', 'TERRAIN ANNEXE 2, BOULEVARD D\'OSNY PLAINE DES LINANDES', '95000', 'CERGY', '49.0432585', '2.0627556'),
(32, 'STADE MUNICIPAL', '2 RUE DU PREMIER DRAGON', '95300', 'PONTOISE', '49.0426132', '2.0897352'),
(33, 'STADE DES MARADAS 1', 'PASSAGE DU LYCEE', '95300', 'PONTOISE', '49.035271', '2.0864864'),
(34, 'STADE AUGUSTE DELAUNE 3', 'TERRAIN ANNEXE 48 RUE DU 19 MARS 1962', '93200', 'SAINT-DENIS', '48.9481072', '2.3543731'),
(35, 'STADE AUGUSTE DELAUNE 1', '48 RUE DU 19 MARS 1962', '93200', 'SAINT-DENIS', '48.9481072', '2.3543731'),
(36, 'STADE AUGUSTE DELAUNE 3', 'TERRAIN ANNEXE 48 RUE DU 19 MARS 1962', '93200', 'SAINT-DENIS', '48.9481072', '2.3543731'),
(37, 'STADE AUGUSTE DELAUNE 4', '9 AVENUE ROGER SEMAT', '93200', 'SAINT-DENIS', '48.9461688', '2.3548952'),
(38, 'STADE CHARLES FINALTERI 1', '197 RUE DES LANDES', '78400', 'CHATOU', '48.9004644', '2.1421703'),
(39, 'STADE CHARLES FINALTERI 2', 'TERRAIN FOOT/RUGBY, 197 RUE DES LANDES', '78400', 'CHATOU', '48.9006969', '2.14095'),
(40, 'STADE ILE DES IMPRESSIONNISTES', 'MAIL DES IMPRESSIONNISTES', '78400', 'CHATOU', '48.886483', '2.1606341'),
(41, 'STADE MUNICIPAL', 'TERRAIN HONNEUR, RUE CHARLES CROS', '95320', 'SAINT-LEU-LA-FORET', '49.0035363', '2.2494425'),
(42, 'COMPLEXE SPORTIF JEAN MOULIN', 'EX STADE DES DIABLOTS, 9 AVENUE DES DIABLOTS', '95320', 'SAINT-LEU-LA-FORET', '49.0107856', '2.2370509'),
(43, 'STADE DES ANDRESYS 1', 'BOULEVARD ANDRE BREMONT, RUE D\'ERMONT', '95320', 'SAINT-LEU-LA-FORET', '49.0056959', '2.2481015'),
(44, 'STADE DES ANDRESYS 2', 'TERRAIN DANIEL ROBIN, BOULEVARD ANDRE BREMONT, RUE D\'ERMONT', '95320', 'SAINT-LEU-LA-FORET', '49.0056959', '2.2481015'),
(45, 'STADE LEON BIANCOTTO 1', '12 RUE DE STALINGRAD', '78700', 'CONFLANS-SAINTE-HONORINE', '48.9936082', '2.1023534'),
(46, 'STADE LEON BIANCOTTO 2', 'TERRAIN ANNEXE, 12 RUE DE STALINGRAD', '78700', 'CONFLANS-SAINTE-HONORINE', '48.9927703', '2.1016519'),
(47, 'STADE LEON GRAFFIN 1', '2 RUE DE LA FORET', '95350', 'SAINT-BRICE-SOUS-FORET', '49.004707', '2.348081'),
(48, 'STADE LEON GRAFFIN 3', 'TERRAIN ANNEXE DE LA SOLITUDE, 2 RUE DE LA FORET', '95350', 'SAINT-BRICE-SOUS-FORET', '49.0053068', '2.3483048'),
(49, 'STADE LEON GRAFFIN 2', 'TERRAIN ANNEXE, 2 RUE DE LA FORET', '95350', 'SAINT-BRICE-SOUS-FORET', '49.0053068', '2.3483048'),
(50, 'STADE DES BORDS DE MARNE 1', '43 RUE LEON BERNARD', '93160', 'NOISY-LE-GRAND', '48.8535324', '2.5513611'),
(51, 'STADE DES BORDS DE MARNE 2', '43 RUE LEON BERNARD', '93160', 'NOISY-LE-GRAND', '48.8535324', '2.5513611'),
(52, 'STADE DES BORDS DE MARNE 2', '43 RUE LEON BERNARD', '93160', 'NOISY-LE-GRAND', '48.8535324', '2.5513611'),
(53, 'STADE DES BORS DE MARNE 4', '41 RUE LEON BERNARD', '93160', 'NOISY-LE-GRAND', '48.8529271', '2.5524612'),
(54, 'PARC DES SPORTS 2', 'RUE JEAN JAURES', '93260', 'LES-LILLAS', '48.8876973', '2.4246712'),
(55, 'STADE PAUL RABAN', 'COMPLEXE SPORTIF ANDRE TREMET, 1 RUE DE NOISEMENT', '77550', 'MOISSY-CRAMAYEL', '48.6326885', '2.5937132'),
(56, 'COMPLEXE SPORTIF ANDRE TREMET 1', 'TERRAIN ANNEXE 1, RUE DE NOISEMENT', '77550', 'MOISSY-CRAMAYEL', '48.6326885', '2.5937132'),
(57, 'COMPLEXE SPORTIF ANDRE TREMET 2', 'TERRAIN ANNEXE 2, RUE DE NOISEMENT', '77550', 'MOISSY-CRAMAYEL', '48.6326423', '2.5936356'),
(58, 'COMPLEXE SPORTIF ANDRE TREMET 3', 'TERRAIN ANNEXE 3, RUE DE NOISEMENT', '77550', 'MOISSY-CRAMAYEL', '48.6327715', '2.5936802'),
(59, 'COMPLEXE SPORTIF ANDRE TREMET 4', 'TERRAIN ANNEXE 4, RUE DE NOISEMENT', '77550', 'MOISSY-CRAMAYEL', '48.6326498', '2.5936604'),
(60, 'STADE HENRI LONGUET 2', 'TERRAIN ANNEXE 2, RUE POLONCEAU', '91170', 'VIRY-CHATILLON', '48.6714181', '2.3815616'),
(61, 'STADE HENRI LONGUET 1', 'COMPLEXE SPORTIF (EX-FRANCOEUR) 3 RUE POLONCEAU', '91170', 'VIRY-CHATILLON', '48.6714181', '2.3815616'),
(62, 'STADE HENRI LONGUET 3', 'RUE FRANCOEUR', '91170', 'VIRY-CHATILLON', '48.6728763', '2.3807308'),
(63, 'PLAINE DE JEUX MULLER N°1', 'TERRAIN RENE CIRET, RUE DES PRAIRIES', '91650', 'BREUILLET', '48.5675563', '2.1764927'),
(64, 'STADE INTERCO PANSEROT 1', 'COMPLEXE SPORTIF RENE GRENAULT, 7 RUE TIRE BARBE', '91510', 'LARDY', '48.5206412', '2.2651288'),
(65, 'STADE AUGUSTE GENTELET 1', 'TERRAIN D\'HONNEUR, RUE ROGER CLAVIER, RD 445-ROND POINT', '91700', 'FLEURY-MEROGIS', '48.6337579', '2.363572'),
(66, 'STADE AUGUSTE GENTELET 2', 'TERRAIN WALTER FELDER, RUE ROGER CLAVIER, RD 445 ROND POINT', '91700', 'FLEURY-MEROGIS', '48.630249', '2.3610859'),
(67, 'STADE LASCOMBE', 'EX J.ANQUETIL, 5 RUE PIERRE BROSSELETTE', '91700', 'FLEURY-MEROGIS', '48.6351679', '2.3611318'),
(68, 'STADE LUCIEN SIMON', 'ALLEE DES PRAIRIES', '91240', 'SAINT-MICHEL-SUR-ORGE', '48.639457', '2.300803'),
(69, 'STADE RENE FAYEL', '1 ROUTE DE MONTLHERY', '91240', 'SAINT-MICHEL-SUR-ORGE', '48.6336675', '2.2940118'),
(70, 'STADE COSOM', '39 RUE DE CARCASSONNE', '91310', 'LINAS', '48.6239096', '2.2700168'),
(71, 'STADE PAUL DESGOUILLONS 1', 'BOULEVARD TEMERAIRE', '91310', 'MONTLHERY', '48.637805', '2.27742'),
(72, 'STADE PAUL DESGOUILLONS 2', 'BOULEVARD TEMERAIRE', '91310', 'MONTLHERY', '48.637805', '2.27742'),
(73, 'GYMNASE DE LILANDRY', 'BOULEVARD DES SPORTS', '77700', 'BAILLY-ROMAINVILLIERS', '48.8500439', '2.824429'),
(74, 'STADE MUNICIPAL', 'RUE DU CENTRE', '77174', 'VILLENEUVE-LE-COMTE', '48.825612', '2.7855681'),
(75, 'STADE INTERCOMMUNAL DE LILANDRY', 'BOULEVARD DES SPORTS', '77700', 'BAILLY-ROMAINVILLIERS', '48.8500439', '2.824429'),
(76, 'STADE DES ALIZES', 'RUE DES MURONS', '77700', 'BAILLY-ROMAINVILLIERS', '48.8547057', '2.8288507'),
(77, 'STADE DE L\'HERMIERE', 'TERRAIN HONNEUR, RUE DE L\'HERMIERE (EX STADE CHAMP MOULIN)', '77700', 'SERRIS', '48.8450028', '2.7794231'),
(78, 'STADE DES MARMOUSETS', 'LA MERIDIENNE', '77700', 'SERRIS', '48.8512456', '2.7844687'),
(79, 'COMPLEXE SPORTIF DU FREMOY 1', '10 RUE DU BAZARD', '77200', 'TORCY', '48.8535868', '2.6524777'),
(80, 'COMPLEXE SPORTIF DU FREMOY 2', 'TERRAIN ANNEXE J-P DAMONT, 10 RUE DU BAZARD', '7720', 'TORCY', '48.850572', '2.654472'),
(81, 'STADE ROGER COUDERC', 'ALLEE ROGER COUDERC', '77200', 'TORCY', '48.8478471', '2.645866'),
(82, 'PARC DES SPORTS N°2', 'TERRAIN ANNEXE 2 42-44, ROUTE DE LA QUEUE EN BRIE', '94370', 'SUCY-EN-BRIE', '48.7595968', '2.5335622'),
(83, 'PARC DES SPORTS N°3', 'TERRAIN ANNEXE 3 42-44, ROUTE DE LA QUEUE EN BRIE', '94370', 'SUCY-EN-BRIE', '48.7595968', '2.5335622'),
(84, 'PARC DES SPORTS N°1', '76 RUE DES TILLEUL', '94370', 'SUCY-EN-BRIE', '48.7578648', '2.5317544'),
(85, 'STADE LUCIEN GRELINGER 1', 'TERRAIN HONNEUR, AVENUE DE LA REPUBLIQUE', '94150', 'RUNGIS', '48.7510534', '2.3530162'),
(86, 'STADE LUCIEN GRELINGER 2', 'TERRAIN ANNEXE, AVENUE DE LA REPUBLIQUE', '94150', 'RUNGIS', '48.7510534', '2.3530162'),
(87, 'STADE MUNICIPAL', 'RUE DORE', '77000', 'MELUN', '48.531131', '2.661563'),
(88, 'STADE PAUL FISCHER 1', 'AVENUE DE LA 7EME DB AMERICAINE', '77000', 'MELUN', '48.5295113', '2.6636862'),
(89, 'PARC DES SPORTS DEPARTEMENTALS DES GUILANDS', 'RUE DE L\'EPINE PROLONGÉE , QUARTIER LA NOUE-CLOS FRANCAIS', '93100', 'MONTREUIL', '48.8660425', '2.427932'),
(90, 'STADE JULES VERNE', '64 RUE EDOUARD BRANLY', '93100', 'MONTREUIL', '48.8704405', '2.460514'),
(91, 'STADE ROBERT LEGROS 1', '21 RUE DES GRANDS PECHERS', '93100', 'MONTREUIL', '48.8591093', '2.4636759'),
(92, 'STADE JEAN DELBERT', 'RUE LENAIN DE TILLEMONT', '93100', 'MONTREUIL', '48.8590959', '2.4613277'),
(93, 'STADE JEAN MILAUD 1', 'RUE DE RAVIN', '91350', 'GRIGNY', '48.6474342', '2.3688846'),
(94, 'PARC DES SPORTS ET LOISIRS', 'RUE CONDORCET', '91350', 'GRIGNY', '48.6444145', '2.3799747'),
(95, 'STADE HENRI HURT 1', '2 AVENUE PRESIDENT SALVADOR ALLENDE', '91560', 'CROSNE', '48.7195577', '2.4757486'),
(96, 'STADE HENRI HURT 2', 'TERRAIN ANNEXE 2, AVENUE PRESIDENT SALVADOR ALLENDE', '91560', 'CROSNE', '48.7195577', '2.4757486'),
(97, 'STADE PIERRE MOLLET N°1', 'RUE JULES FERRY', '91330', 'YERRES', '48.7142706', '2.477567'),
(98, 'STADE PIERRE MOLLET N°2', 'TERRAIN ANNEXE, RUE JULES FERRY', '91330', 'YERRES', '48.7137809', '2.4763076'),
(99, 'STADE LEO LAGRANGE N°1', '(EX M.ARMEE) AVENUE JEAN ROSTAND', '91330', 'YERRES', '48.7235154', '2.4959303'),
(100, 'STADE JESSE OWENS 1', '22 RUE DE L\'EUROPE', '91380', 'CHILLY-MAZARIN', '48.7078621', '2.3240691'),
(101, 'COMPLEXE SPORTIF DU COSEC 1', 'AVENUE DE LA CROIX BOISSELIERE', '91420', 'MORANGIS', '48.7076803', '2.343369'),
(102, 'COMPLEXE SPORTIF DU COSEC 2', 'TERRAIN ANNEXE 1, AVENUE DE LA CROIX BOISSELIERE', '91420', 'MORANGIS', '48.7076804', '2.343369'),
(103, 'COMPLEXE SPORTIF DU COSEC 3', 'TERRAIN ANNEXE 2, RUE COLETTE BESSON', '91420', 'MORANGIS', '48.7059768', '2.3401539'),
(104, 'COMPLEXE SPORTIF DU COSEC 4', 'TERRAIN ANNEXE 3, AVENUE DE LA CROIX BOISSELIERE', '91420', 'MORANGIS', '48.7076804', '2.343369'),
(105, 'COMPLEXE SPORTIF DU COSEC 4', 'TERRAIN ANNEXE 3, AVENUE DE LA CROIX BOISSELIERE', '91420', 'MORANGIS', '48.7076804', '2.343369'),
(106, 'STADE DOMINIQUE DUVAUCHELLE', 'TERRAIN ANNEXE OUEST,  RUE DOMINIQUE DUVAUCHELLE', '94000', 'CRETEIL', '48.7676743', '2.4614954'),
(107, 'PARC DES SPORTS PLAINE NORD', 'CARREFOUR, POMPADOUR PARC INTERDEPARTEMENTAL', '94600', 'CHOISY-LE-ROI', '48.7592392', '2.4233437'),
(108, 'STADE DOMINIQUE DUVAUCHELLE', 'RUE DOMINIQUE DUVAUCHELLE', '94000', 'CRETEIL', '48.7682637', '2.4581437'),
(109, 'PARC DES SPORTS PLAINE SUD N°2', 'CHEMIN DES BOEUFS,PARC INTERDEPARTEMENTAL', '94000', 'CRETEIL', '48.769434', '2.4315844'),
(110, 'STADE FRANCOIS DESMONT', 'ENTREE GYMNASE PLAISANCE, AVENUE LAFERRIERE', '94000', 'CRETEIL', '48.7998922', '2.4560294'),
(111, 'STADE DE CLERVILLE', '3 RUE LUCIEN SELVA', '94200', 'IVRY-SUR-SEINE', '48.8087469', '2.383669'),
(112, 'STADE DES LILAS', '16 BIS RUE GASTON MONMOUSSEAU', '94200', 'IVRY-SUR-SEINE', '48.8050029', '2.3792462'),
(113, 'STADE LENINE', '50 BOULEVARS DE BRANDEBOURG', '94200', 'IVRY-SUR-SEINE', '48.814765', '2.3968426'),
(114, 'STADE DE GOURNAY', '183 BOULEVARD STALINGRAD', '94200', 'IVRY-SUR-SEINE', '48.8057621', '2.3737046'),
(115, 'STADE JEAN BOUIN', '15 RUE DE KRUFT', '91550', 'PARAY-VIELLE-POSTE', '48.7139381', '2.3678051'),
(116, 'STADE PIERRE DE COURBETIN 1', '186 AVENUE DU GENERAL DE GAULLE', '91550', 'PARAY-VIELLE-POSTE', '48.7184524', '2.3673097'),
(117, 'STADE PIERRE DE COURBETIN 2', '186 AVENUE DU GENERAL DE GAULLE', '91550', 'PARAY-VIELLE-POSTE', '48.7184524', '2.3673097'),
(118, 'GYMNASE GEORGES GOSNAT', '4 AVENUE DU COLONEL', '94400', 'VITRY-SUR-SEINE', '48.7815796', '2.3820718'),
(119, 'STADE GABRIEL PERI N°1', '94 RUE GABRIEL PERI', '94400', 'VITRY-SUR-SEINE', '48.788768', '2.404005'),
(120, 'STADE ROGER COUDERC', '97 RUE AUBER', '94400', 'VITRY-SUR-SEINE', '48.8037174', '2.3720332'),
(121, 'STADE ARRIGHI', '49 RUE DE CHOISY', '94400', 'VITRY-SUR-SEINE', '48.783251', '2.4000755'),
(122, 'STADE GEORGES GOSNAT', '4 AVENUE DU COLONEL FABIEN', '94400', 'VITRY-SUR-SEINE', '48.7815796', '2.3820718'),
(123, 'STADE PILLAUDIN', 'AVENUE DE LA REPUBLIQUE', '94400', 'VITRY-SUR-SEINE', '48.8035733', '2.3960435'),
(124, 'STADE JOLIOT CURIE', '6 PASSAGE I ET F JOLIOT CURIE', '94400', 'VITRY-SUR-SEINE', '48.7889233', '2.3932923'),
(125, 'GYMNASE PAUL ELUARD', '1 RUE DE BURNLEY', '94400', 'VITRY-SUR-SEINE', '48.7871643', '2.3890347'),
(126, 'STADE HONORE BALZAC', '103 RUE DE BALZAC', '94400', 'VITRY-SUR-SEINE', '48.7770573', '2.4004124'),
(127, 'STADE JEAN LEZER', '2 RUE CHATEAUBRIAND', '92120', 'MONTROUGE', '48.8115227', '2.3096889'),
(128, 'STADE MAURICE ARNOUX', '107 RUE MAURICE ARNOUX', '92120', 'MONTROUGE', '48.8145459', '2.3109007'),
(129, 'STADE MAURICE CREUZET 1', 'ROUTE DE SAINT LEU', '77240', 'CESSON', '48.5614289', '2.600239'),
(130, 'STADE DU GYMNASE', 'COMPLEXE SPORTIF COLLETTE BESSON, AVENUE DE LA ZIBELINE CESSON LA FORET', '77240', 'CESSON', '48.555851', '2.5991129'),
(131, 'COMPLEXE SPORTIF SONIA DELAUNAY', 'RUE AIME CESAIRE', '77240', 'VERT-SAINT-DENIS', '48.5719266', '2.6090055'),
(132, 'STADE BERNARD ISAMBERT', '35/37 RUE EMILE DESCHANEL', '92400', 'COURBEVOIE', '48.9007159', '2.2418769'),
(133, 'STADE JEAN BLOT 1', 'TERRAIN CORDERIE HONNEUR, 21 RUE PIERRE BROSSELETTE', '92400', 'COURBEVOIE', '48.9035535', '2.2535726'),
(134, 'STADE ANDRE KARMAN', '15/19 RUE FIRMIN GEMIER', '93300', 'AUBERVILLIERS', '48.9089572', '2.3821124'),
(135, 'STADE AUGUSTE DELAINE', '35 RUE HELENE COCHENNEC', '93300', 'AUBERVILLIERS', '48.9177631', '2.4026058');

-- --------------------------------------------------------

--
-- Structure de la table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `club1_id` int(11) DEFAULT NULL,
  `club2_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `level` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scores` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `club_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`) VALUES
(241, 'AB Saint Denis'),
(92, 'AC Boulogne Billancourt'),
(299, 'AC Osny'),
(289, 'Accès FC'),
(156, 'Achères CS CDM'),
(52, 'Adamois O.'),
(104, 'Alfortville US'),
(350, 'Alliance 77'),
(120, 'Antony Foot Evolution'),
(177, 'ARCOP Nanterre'),
(160, 'Argenteuil Franco-Port. CDM'),
(73, 'Argenteuil RFC'),
(124, 'Arpajonnais'),
(48, 'AS Ararat Issy'),
(138, 'AS Bondy'),
(197, 'AS Chelles'),
(327, 'AS Le Perreux 94'),
(117, 'AS Meudon'),
(76, 'ASA Montereau'),
(127, 'Asnières FC'),
(268, 'ASS Futsal Courbevoie'),
(287, 'Attainville Futsal'),
(97, 'Aubergenville FC'),
(37, 'Aubervilliers FCM'),
(249, 'Aubervilliers OFF.M'),
(61, 'Aulnay CSL'),
(262, 'Aulnay Futsal'),
(69, 'Aulnaysienne ESP'),
(270, 'Avicenne ASC'),
(347, 'Avon Futsal'),
(260, 'B2M Futsal'),
(140, 'Bagneaux Nemours'),
(84, 'Bagneux COM'),
(281, 'Bagneux Futsal AS'),
(206, 'Bagnolet FC'),
(152, 'Ballancourt FC'),
(171, 'Beynes FC'),
(303, 'Bezons USECOM'),
(62, 'Blanc Mesnil SF'),
(106, 'Bobigny Académie'),
(223, 'Bois d\'Arcy AS'),
(80, 'Bonneuil S/ Marne CSM'),
(214, 'Bourg La Reine AS'),
(325, 'Bourget FC'),
(116, 'Brétigny FCS'),
(344, 'Breuilloise AS'),
(136, 'Briard SC'),
(146, 'Brie Nord ES CDM'),
(316, 'Brunoy FC'),
(238, 'Bruyères Foot AS'),
(203, 'Bry FC'),
(139, 'Bussy Saint Georges FC'),
(240, 'Cachan ASC CO'),
(222, 'Carrières Gresillons'),
(302, 'Carrières S/ Seine US'),
(7, 'Cergy Pontoise FC'),
(35, 'Cesson VSD ES'),
(167, 'Champenois Mam. Ver.'),
(290, 'Champigny CF'),
(68, 'Champigny FC 94'),
(253, 'Champs A. Futsal'),
(126, 'Champs S/ Marne AS'),
(221, 'Chanteloup Les Vignes US'),
(105, 'Charenton CAP'),
(188, 'Châtelet en Brie US'),
(231, 'Chatillonnais SCM'),
(9, 'Chatou AS'),
(164, 'Chevilly Larue ELAN CDM'),
(63, 'Choisy Le Roi AS'),
(58, 'Claye Souilly S.'),
(201, 'Clichois UF'),
(229, 'Collégien AS'),
(321, 'Colombes LSO'),
(39, 'Colombienne FOOT ES'),
(225, 'Combs la Ville CA'),
(11, 'Conflans FC'),
(192, 'Corbreuse Sainte Mesme'),
(134, 'Cormeillais ACS'),
(50, 'Cosmo Taverny'),
(36, 'Courbevoie Sports'),
(247, 'Créteil Futsal US'),
(28, 'Créteil Lusitanos US'),
(291, 'Créteil Palais Futsal'),
(230, 'Créteil UF'),
(277, 'Crosne FC'),
(288, 'CSC'),
(308, 'CSM Clamart Foot'),
(228, 'Dammarie Les Lys FC'),
(320, 'Dammartin CS'),
(250, 'Diamant Futsal'),
(239, 'Domont FC'),
(313, 'Dourdan Sports'),
(194, 'Drancy FC'),
(218, 'Ecouen FC'),
(172, 'Elancourt OSC'),
(209, 'Eléctricité Paris'),
(339, 'Emerainville'),
(323, 'Entente Féminine Pays de Fontainebleau'),
(41, 'Entente SSG'),
(101, 'Epinay Académie'),
(159, 'Ermont AMS CDM'),
(195, 'ES Caudacienne'),
(293, 'Espace Jeune'),
(141, 'Espérance Paris 19ème'),
(285, 'Espoir Melunais'),
(79, 'Etampes FC'),
(275, 'Etoile FC Melun'),
(307, 'Evasion Urbaine Torcy Futsal'),
(81, 'Evry FC'),
(204, 'Ezanville Ecouen US'),
(341, 'FC Chapelle Rablais'),
(343, 'FC Chevry Cossigny'),
(38, 'FC Courcouronnes'),
(351, 'Ferté SS/ Jouarre ASM'),
(173, 'Feucherolles USA CDM'),
(17, 'Fleury 91 FC'),
(55, 'Fontenay Sous Bois US'),
(233, 'Fontenay Trésigny AS'),
(304, 'Football Féminin Academy 77'),
(318, 'Fosses Féminines'),
(100, 'Franconville FC'),
(163, 'Fresnes AAS'),
(246, 'Futsal Paulista'),
(6, 'Garenne Colombes AF'),
(334, 'Gargenville Stade'),
(252, 'Garges Djibson'),
(130, 'Garges Gonesse FCM'),
(59, 'Gennevilliers CSM'),
(294, 'Gennevilliers Soccer'),
(314, 'Gentilly AC'),
(57, 'Gobelins FC'),
(336, 'Goelly Compans FC'),
(109, 'Goussainville FC'),
(309, 'Gretz Tournan SPC'),
(25, 'Grigny US'),
(205, 'Groslay FC'),
(132, 'Guyancourt Foot ES'),
(333, 'Hardricourt US'),
(67, 'Houilles AC'),
(89, 'Igny AFC'),
(311, 'Inter Loing FC'),
(338, 'Isles Les Villenoy'),
(236, 'Issy Foot Féminin'),
(51, 'Issy Les Moulineaux FC'),
(154, 'Ivry Desportiva Vima CDM'),
(29, 'Ivry US'),
(43, 'JA Drancy'),
(118, 'Jeunesse Aubervilliers AS'),
(264, 'Joliot Groom'),
(297, 'Jouy Le Moutier FC'),
(282, 'KB Futsal'),
(305, 'Kremlin Bicetre Futsal'),
(265, 'La Courneuve AS'),
(180, 'La Serbie AS CDM'),
(271, 'La Toile'),
(332, 'Le Chesnay 78'),
(88, 'Le Mée Sports'),
(342, 'Le Pin Villevaude'),
(251, 'Les Artistes'),
(95, 'Les Mureaux OFC'),
(301, 'Les Petits Pains'),
(150, 'Lesigny USC'),
(137, 'Lieusaint Foot AS'),
(14, 'Lilas FC'),
(49, 'Limay ALJ'),
(18, 'Linas Monthléry ESA'),
(187, 'Lissois FC'),
(60, 'Livry Gargan FC'),
(103, 'Lognes US'),
(306, 'Longjumeau FC'),
(207, 'Louveciennes AS'),
(166, 'Maccabi Créteil FC CDM'),
(5, 'Maccabi Paris UJA'),
(108, 'Maisons Alfort FC'),
(178, 'Malakoff USM'),
(227, 'Mandres Périgny'),
(47, 'Mantois 78 FC'),
(107, 'Marly La Ville ES'),
(330, 'Marly Le Roi US'),
(119, 'Massy 91 FC'),
(286, 'Massy UF'),
(125, 'Maurepas AS'),
(283, 'Maurepas EF'),
(349, 'May en Multien FC'),
(111, 'Meaux Académie CS'),
(82, 'Meaux Adom'),
(23, 'Melun FC'),
(170, 'Menucourt AS'),
(220, 'Mery Meriel Bessanco'),
(147, 'Minhotos de Braga CDM'),
(153, 'Minhotos OS G.S CDM'),
(110, 'Mitry Mory Football'),
(335, 'Montesson US'),
(56, 'Montfermeil FC'),
(224, 'Montigny Le Bretonneux AS'),
(328, 'Montigny Les Cormeilles'),
(292, 'Montmorency Futsal'),
(24, 'Montreuil RSC'),
(34, 'Montrouge FC 92'),
(157, 'Montrouge GS CDM'),
(155, 'Montsoult Baillet US CDM'),
(27, 'Morangis Chilly FC'),
(352, 'Mormant FC'),
(279, 'MYA Futsal'),
(185, 'Nandy FC'),
(219, 'Nanterre AJSC'),
(65, 'Nanterre ES'),
(149, 'Nanterre Police 92 CDM'),
(44, 'Neauphle - Pont.'),
(267, 'Neuilly Fustal Club 92'),
(66, 'Neuilly Marne SFC'),
(248, 'New Team 91 Futsal'),
(243, 'Nicolaite Chaillot'),
(13, 'Noisy Le Grand FC'),
(72, 'Noisy Le Sec'),
(295, 'Nouveau Souffle FC'),
(98, 'Osny FC'),
(199, 'Othis CO'),
(74, 'Ozoir FC 77'),
(91, 'Pantin Olympique'),
(30, 'Paray FC'),
(280, 'Paris 14 FC'),
(87, 'Paris 15 AC'),
(261, 'Paris ACASA'),
(86, 'Paris CA'),
(131, 'Paris Centre Formation'),
(115, 'Paris FC'),
(256, 'Paris Métropole'),
(3, 'Paris Saint Germain FC'),
(254, 'Paris Sporting Club'),
(123, 'Paris Université Club'),
(151, 'Paris US Suisse CDM'),
(242, 'Paris XI US'),
(273, 'Paris XV Futsal'),
(46, 'Parisienne ES'),
(99, 'Parisis FC'),
(300, 'Parmain Futsal AS'),
(189, 'Pays de Bières'),
(93, 'Pecq US LE'),
(213, 'Perreux AS FRANC'),
(245, 'Pierrefitte FC'),
(133, 'Plaisirois FO'),
(1, 'Plessis Robinson FC'),
(71, 'Poissy AS'),
(145, 'Pontault Combault UMS'),
(345, 'Ponthierry US'),
(217, 'Porcheville FC'),
(200, 'Porto La Portugaise CDM'),
(176, 'Portugais d\'Antony CDM'),
(169, 'Portugais d\'Aubergenville CDM'),
(190, 'Portugais de Fontainebleau CDM'),
(346, 'Portugais de Pontault Combault'),
(148, 'Portugais de Villeneuve Saint Georges CDM'),
(184, 'Portugais Paix Vivre CDM'),
(83, 'Puteaux CSM'),
(298, 'Puteaux Futsal'),
(202, 'Quincy Voisins FC US'),
(128, 'RC Joinville'),
(113, 'RCFF Colombes 92'),
(122, 'RCP Fontainebleau'),
(158, 'Real Mayday CDM'),
(340, 'Réau SP'),
(53, 'Red Star FC'),
(183, 'Relais Créole CDM'),
(144, 'Ris Orangis US'),
(269, 'Roissy en Brie Futsal'),
(142, 'Roissy en Brie US'),
(326, 'Romainville FC'),
(182, 'Rueil Abeille CDM'),
(94, 'Rueil Malmaison FC'),
(266, 'Rungis Futsal'),
(22, 'Rungis US'),
(12, 'Saint Brice FC'),
(181, 'Saint Cloud FC'),
(174, 'Saint Cyr Luso CDM'),
(237, 'Saint Denis RC'),
(8, 'Saint Denis US'),
(10, 'Saint Leu 95 FC'),
(198, 'Saint Mard AS'),
(196, 'Saint Maur Lusitanos US'),
(121, 'Saint Maur VGA'),
(276, 'Saint Maurice AJ'),
(191, 'Saint Michel Sports'),
(4, 'Saint Ouen l\'Aumone AS'),
(75, 'Sainte Genevieve Sports'),
(324, 'Salesienne de Paris'),
(54, 'Sarcelles AAS'),
(331, 'Sartrouville FC'),
(312, 'Savigny Foot CO'),
(143, 'Savigny Le Temple FC'),
(129, 'Seizième ES'),
(15, 'Sénart Moissy'),
(258, 'Sengol 77'),
(186, 'Servon FC'),
(234, 'Sevran FC'),
(272, 'Sevran FU'),
(315, 'Sèvres FC'),
(208, 'Soisy Andilly Margen'),
(165, 'Soisy S/ Seine AS'),
(179, 'Solitaires FC'),
(257, 'Sport Coeur Marcouv.'),
(296, 'Sportifs de Garges'),
(348, 'Sportin Savigny Foot 77'),
(232, 'Stade EST Pavillon'),
(211, 'Stains ES'),
(21, 'Sucy FC'),
(216, 'Sud Essonne Etréchy'),
(96, 'Suresnes JS'),
(337, 'Thorigny FC'),
(274, 'Torcy Futsal EU'),
(20, 'Torcy PVM US'),
(102, 'Trappes ES'),
(42, 'Tremblay FC'),
(77, 'Tremplin Foot'),
(114, 'Ulis CO'),
(162, 'Ulis Portugais CDM'),
(85, 'US Avon'),
(284, 'US Nogent 94'),
(45, 'US Palaiseau'),
(329, 'US Persan'),
(168, 'US Saint Gratien CDM'),
(112, 'Vaires S/ Marne US'),
(19, 'Val d\'Europe'),
(310, 'Val de France'),
(26, 'Val Yerres Crosne'),
(322, 'Vanves Stade'),
(235, 'Vaux Le Pénil FC'),
(161, 'Vélizy F. Portugais CDM'),
(319, 'Verrieres Le Buisson'),
(90, 'Versailles 78 FC'),
(226, 'Vert Le Grand F91'),
(317, 'Vexin AS'),
(278, 'Villabé ET.S'),
(70, 'Villejuif AS'),
(259, 'Villejuif City Futsal'),
(64, 'Villemomble Sports'),
(210, 'Villeneuve La Garenne'),
(193, 'Villenoy AC'),
(78, 'Villeparisis USM'),
(244, 'Villepinte Féminin'),
(135, 'Villetaneuse CS'),
(2, 'Vincennois CO'),
(175, 'Viroflay AM FOOT'),
(16, 'Viry Chatillon ES'),
(263, 'Vision Nova'),
(33, 'Vitry CA'),
(215, 'Voltaire Chatenay Malabry'),
(212, 'Wissous FC');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'decide66@hotmail.com', 'decide66@hotmail.com', 1, NULL, '$2y$13$UA4Q7jAEkDlr3qs2qewVBujeh1sif57XNAIWnrIv1sAX.CT3hvDkC', '2019-04-04 19:37:53', NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EA9A1461EDA6519` (`club1_id`),
  ADD KEY `IDX_6EA9A146C6FCAF7` (`club2_id`),
  ADD KEY `IDX_6EA9A14612469DE2` (`category_id`),
  ADD KEY `IDX_6EA9A146F5B7AF75` (`address_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3AF34668D5B80441` (`category_name`);

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A5BD31233AEBB4E6` (`club_name`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F06D397077792576` (`group_name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT pour la table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `FK_6EA9A14612469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_6EA9A1461EDA6519` FOREIGN KEY (`club1_id`) REFERENCES `clubs` (`id`),
  ADD CONSTRAINT `FK_6EA9A146C6FCAF7` FOREIGN KEY (`club2_id`) REFERENCES `clubs` (`id`),
  ADD CONSTRAINT `FK_6EA9A146F5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);
