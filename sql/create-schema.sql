CREATE DATABASE `cadastro_produtos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cadastro_produtos`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `un_descricao` (`descricao`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(130) NOT NULL,
  `valor_compra` double(10,2) NOT NULL,
  `valor_venda` double(10,2) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `un_nome` (`nome`),
  KEY `fk_categoria_id` (`categoria_id`),
  CONSTRAINT `fk_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
