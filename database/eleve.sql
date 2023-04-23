-- Adminer 4.8.1 MySQL 8.0.32 dump



DROP TABLE IF EXISTS `eleve`;
CREATE TABLE `eleve` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_promotion` int NOT NULL,
  `id_photo` int DEFAULT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mdp` varchar(80) DEFAULT NULL,
  `actif` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_promotion` (`id_promotion`),
  CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `eleve` (`id`, `id_promotion`, `id_photo`, `nom`, `prenom`, `email`, `mdp`, `actif`) VALUES
(2,	1,	1,	'CONVERT',	'Loïc',	'btss21lconve@eleve-irup.com',	'c27e859e337878a5177e431c59eec454',	1),
(3,	1,	5,	'coco',	'coco',	'coco@gmail.com',	'12',	0),
(36,	1,	NULL,	'zdqefsrvd',	'dfvgb',	'defsg@gmail.com',	'0f72a1fccbb80554f9871ebb0eddacf3',	0),
(37,	1,	NULL,	'BTSS21',	NULL,	NULL,	NULL,	NULL),
(38,	1,	NULL,	'BTSS21',	NULL,	NULL,	NULL,	NULL),
(39,	1,	NULL,	'dfd',	NULL,	NULL,	NULL,	NULL),
(40,	1,	NULL,	'dfd',	NULL,	NULL,	NULL,	NULL),
(41,	1,	NULL,	'Bastien',	'Poinas',	'btss21bpoinas@eleve-irup.com',	'6ef7c7c9dafb5f9f7d35c1b7ed664d15',	NULL),
(50,	1,	NULL,	'sxdcg',	'sqdsfvbg',	'sxcdsvfbg@glmqzsds',	'e03659d479683b86206ca1d91018791a',	NULL),
(51,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(52,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(53,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(54,	1,	NULL,	'PLOMB',	'Titouan',	'tplomb@gmail.com',	'9bc52898ba2e575442747f4669ebcfb4',	NULL),
(55,	1,	5,	'Caballero',	'Sara',	'sara@gmail.com',	'sara',	NULL),
(56,	1,	4,	'Caba',	'Sara',	'sara@hotmail.com',	'sara',	NULL),
(57,	1,	5,	'test',	'Test',	'test@gmail.com',	'test',	NULL);

