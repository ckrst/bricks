CREATE TABLE `app` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `owner_id` bigint(20) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `campo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `objeto_id` bigint(20) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_campo_objeto_idx` (`objeto_id`),
  CONSTRAINT `fk_campo_objeto` FOREIGN KEY (`objeto_id`) REFERENCES `objeto` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

CREATE TABLE `chave` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `objeto_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chave_objeto_idx` (`objeto_id`),
  CONSTRAINT `fk_chave_objeto` FOREIGN KEY (`objeto_id`) REFERENCES `objeto` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `mashup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `layout` int(11) NOT NULL DEFAULT '0',
  `style` int(11) NOT NULL DEFAULT '0',
  `app_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mashup_app_idx` (`app_id`),
  CONSTRAINT `fk_mashup_app` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `mashup_widget_xref` (
  `id` bigint(20) NOT NULL,
  `mashup_id` bigint(20) NOT NULL,
  `widget_id` bigint(20) NOT NULL,
  `zona` int(11) NOT NULL DEFAULT '0',
  `ordem` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_mashup_widget_xref_mashup_idx` (`mashup_id`),
  KEY `fk_mashup_widget_xref_widget_idx` (`widget_id`),
  CONSTRAINT `fk_mashup_widget_xref_mashup` FOREIGN KEY (`mashup_id`) REFERENCES `mashup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_mashup_widget_xref_widget` FOREIGN KEY (`widget_id`) REFERENCES `widget` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `objeto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_objeto_app_idx` (`app_id`),
  CONSTRAINT `fk_objeto_app` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `valor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `campo_id` bigint(20) NOT NULL,
  `valor_campo` text,
  `chave_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_valor_campo_idx` (`campo_id`),
  KEY `fk_valor_chave_idx` (`chave_id`),
  CONSTRAINT `fk_valor_campo` FOREIGN KEY (`campo_id`) REFERENCES `campo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_valor_chave` FOREIGN KEY (`chave_id`) REFERENCES `chave` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

CREATE TABLE `widget` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `objeto_id` bigint(20) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_widget_objeto_idx` (`objeto_id`),
  CONSTRAINT `fk_widget_objeto` FOREIGN KEY (`objeto_id`) REFERENCES `objeto` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
