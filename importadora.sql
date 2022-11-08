-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para importadora
CREATE DATABASE IF NOT EXISTS `importadora` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `importadora`;

-- Volcando estructura para tabla importadora.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_nombre` varchar(45) DEFAULT NULL,
  `adm_usuario` varchar(45) DEFAULT NULL,
  `adm_pass` varchar(45) DEFAULT NULL,
  `adm_rol` varchar(50) NOT NULL,
  PRIMARY KEY (`adm_id`),
  KEY `adm_id` (`adm_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.administrador: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
REPLACE INTO `administrador` (`adm_id`, `adm_nombre`, `adm_usuario`, `adm_pass`, `adm_rol`) VALUES
	(1, 'jose', 'jose', '4a3487e57d90e2084654b6d23937e75af5c8ee55', 'admin');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.caja
CREATE TABLE IF NOT EXISTS `caja` (
  `caja_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_id` int(11) DEFAULT NULL,
  `caja_administrador` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `caja_fecha_apertura` datetime DEFAULT NULL,
  `caja_monto_inicial` decimal(7,2) DEFAULT NULL,
  `caja_fecha_cierre` datetime DEFAULT NULL,
  `caja_monto_final` decimal(7,2) DEFAULT NULL,
  `caja_estado` int(11) DEFAULT NULL,
  `caja_cambio` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`caja_id`),
  KEY `caja_id` (`caja_id`) USING BTREE,
  KEY `caja_adm` (`adm_id`),
  CONSTRAINT `caja_adm` FOREIGN KEY (`adm_id`) REFERENCES `administrador` (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.caja: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_ci_nit` bigint(20) DEFAULT NULL,
  `cli_nombre` varchar(45) DEFAULT NULL,
  `cli_genero` varchar(10) DEFAULT NULL,
  `cli_direccion` varchar(45) DEFAULT NULL,
  `cli_celular` int(11) DEFAULT NULL,
  `cli_fecha_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`cli_id`),
  KEY `cli_id` (`cli_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nombre_comercial` varchar(255) DEFAULT NULL,
  `prod_imagen` varchar(255) DEFAULT NULL,
  `prod_fabricante` varchar(255) DEFAULT NULL,
  `prod_ubicacion` varchar(255) DEFAULT NULL,
  `prod_codigo` varchar(255) DEFAULT NULL,
  `prod_descripcion` varchar(255) DEFAULT NULL,
  `prod_stock` int(11) DEFAULT '0',
  `prod_stock_minimo` int(11) DEFAULT '10',
  `prod_precio_compra` double DEFAULT '0',
  `prod_precio_venta` double DEFAULT '0',
  `prod_precio_unitario` double DEFAULT '0',
  `prod_inversion` double DEFAULT '0',
  `prod_mas_vendido` int(111) DEFAULT '0',
  `prod_barcode` varchar(255) DEFAULT NULL,
  `prod_fecha_actualizacion` date DEFAULT NULL,
  `prod_fecha_registro` date DEFAULT NULL,
  `prod_estado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`prod_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.producto: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
REPLACE INTO `producto` (`prod_id`, `prod_nombre_comercial`, `prod_imagen`, `prod_fabricante`, `prod_ubicacion`, `prod_codigo`, `prod_descripcion`, `prod_stock`, `prod_stock_minimo`, `prod_precio_compra`, `prod_precio_venta`, `prod_precio_unitario`, `prod_inversion`, `prod_mas_vendido`, `prod_barcode`, `prod_fecha_actualizacion`, `prod_fecha_registro`, `prod_estado`) VALUES
	(1, 'TV 32’’ VIGO MOD: LG – LX780', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 15, 0, 50, 12, 10, NULL, NULL, NULL, '2022-11-08', '2022-11-07', 0),
	(2, 'TV 23’’ VIGO MOD: UG 780CN', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(3, 'TV 50’’ VIGO MOD: VG8008CN', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(4, 'TV 55’’ VIGO MOD: VG8008CN', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(5, 'TV 65’’ VIGO MOD: VG8008CN', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(6, 'TV 40’’ SKYWORTH MOD: 40STD 6500', '/assets/images/default/404.png', 'SKYWORTH', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(7, 'TV 40’’ PREMIER MOD: 7818XF40SFWT', '/assets/images/default/404.png', 'PREMIER', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(8, 'TV 40’’ SAMSUNG MOD: JN40J6400AG', '/assets/images/default/404.png', 'SAMSUNG', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(9, 'TV 32’’ JUC MOD: LT – 32KB3S', '/assets/images/default/404.png', 'JUC', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(10, 'TV 43’’ JUC MOD: LT 43KB65', '/assets/images/default/404.png', 'JUC', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(11, 'TV 50’’ PANASONIC MOD: TUC – SOA400L', '/assets/images/default/404.png', 'PANASONIC', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(12, 'TV 21’’ IRT MOD: CTK2199VP', '/assets/images/default/404.png', 'IRT', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(13, 'TV 14’’ LG MOD:14CU2AB – L2', '/assets/images/default/404.png', 'LG', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(14, 'DUO LG MOD8 DP547', '/assets/images/default/404.png', 'LG', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(15, 'DUO VIGO NORMAL MOD: VG 660', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(16, 'DUO VIGO HDMI MOD: VG 660', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(17, 'DUO IRT MOD: DUO 1000', '/assets/images/default/404.png', 'IRT', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(18, 'VENTILADORA PREMIER MOD: AB – 1805-2', '/assets/images/default/404.png', 'PREMIER', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(19, 'SAMSUNG BLURAY MOD: BD – H5900', '/assets/images/default/404.png', 'SAMSUNG', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(20, 'ESTUFA VIGO MOD: YF-180', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(21, 'LAVADORA SAMSUNG MOD: WA17T6260BY', '/assets/images/default/404.png', 'SAMSUNG', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(22, 'LAVADORA VIGO MOD: WM10SHI-I', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(23, 'LAVADORA VIGO MOD: V611SH1-3', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(24, 'LAVADORA PARA TENIS VIGO MOD:VG-0800', '/assets/images/default/404.png', 'VIGO', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(25, 'REFRIGERADOR PREMIER MOD: AC220VISO H2', '/assets/images/default/404.png', 'PREMIER', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0),
	(26, 'REFRIGERADOR PREMIER MOD:NV-7190R2V17B2', '/assets/images/default/404.png', 'PREMIER', NULL, NULL, NULL, 0, 10, 0, 0, 0, NULL, NULL, NULL, '2022-11-07', '2022-11-07', 0);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `comp_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) DEFAULT NULL,
  `comp_caducidad` date DEFAULT NULL,
  `comp_detalle` varchar(90) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `comp_cantidad` int(11) DEFAULT '0',
  `comp_subtotal` float DEFAULT '0',
  `comp_precio_unitario` float DEFAULT '0',
  `comp_fecha_registro` date DEFAULT NULL,
  `comp_vendedor` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `comp_tipo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`comp_id`),
  KEY `comp_id` (`comp_id`) USING BTREE,
  KEY `comp_prod` (`prod_id`),
  CONSTRAINT `comp_prod` FOREIGN KEY (`prod_id`) REFERENCES `producto` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.compra: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
REPLACE INTO `compra` (`comp_id`, `prod_id`, `comp_caducidad`, `comp_detalle`, `comp_cantidad`, `comp_subtotal`, `comp_precio_unitario`, `comp_fecha_registro`, `comp_vendedor`, `comp_tipo`) VALUES
	(1, 1, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-08', NULL, 'CONTADO'),
	(2, 2, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(3, 3, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(4, 4, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(5, 5, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(6, 6, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(7, 7, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(8, 8, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(9, 9, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(10, 10, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(11, 11, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(12, 12, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(13, 13, '2022-11-07', 'TELEVISOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(14, 14, '2022-11-07', 'REPRODUCTOR DE DVD', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(15, 15, '2022-11-07', 'REPRODUCTOR DE DVD', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(16, 16, '2022-11-07', 'REPRODUCTOR DE DVD', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(17, 17, '2022-11-07', 'REPRODUCTO DE DVD', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(18, 18, '2022-11-07', 'VENTILADOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(19, 19, '2022-11-07', 'REPRODUCTOR DE BLURAY', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(20, 20, '2022-11-07', 'ESTUFA', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(21, 21, '2022-11-07', 'LAVADORA', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(22, 22, '2022-11-07', 'LAVADORA', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(23, 23, '2022-11-07', 'LAVADORA', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(24, 24, '2022-11-07', 'LAVADORA', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(25, 25, '2022-11-07', 'REFRIGERADOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO'),
	(26, 26, '2022-11-07', 'REFRIGERADOR', 0, 0, 0, '2022-11-07', NULL, 'CONTADO');
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.configuracion
CREATE TABLE IF NOT EXISTS `configuracion` (
  `eoq` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `mes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_detalle` int(11) DEFAULT NULL,
  `prod_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `laboratorio` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_cambio` decimal(7,2) DEFAULT NULL,
  `prod_barcode` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.configuracion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.detalle_factura
CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_id` int(11) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `det_producto` varchar(200) NOT NULL,
  `det_cantidad` int(11) NOT NULL,
  `det_precio_unitario` decimal(7,2) NOT NULL,
  `det_subtotal` decimal(7,2) NOT NULL,
  `det_utilidad` decimal(7,2) NOT NULL,
  `det_fecha` date DEFAULT NULL,
  `det_codigo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `det_id` (`det_id`) USING BTREE,
  KEY `prod_id` (`prod_id`),
  KEY `fac_id` (`fac_id`),
  CONSTRAINT `fac_id` FOREIGN KEY (`fac_id`) REFERENCES `factura` (`fac_id`),
  CONSTRAINT `prod_id` FOREIGN KEY (`prod_id`) REFERENCES `producto` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.detalle_factura: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_factura` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_id` int(11) DEFAULT NULL,
  `fac_nombre_cliente` varchar(45) DEFAULT NULL,
  `adm_id` int(11) DEFAULT NULL,
  `fac_nombre_usuario` varchar(45) DEFAULT NULL,
  `fac_total` decimal(7,2) DEFAULT NULL,
  `fac_utilidad` decimal(7,2) DEFAULT NULL,
  `fac_estado` int(11) DEFAULT NULL,
  `fac_fecha_hora` datetime DEFAULT NULL,
  `fac_forma_pago` varchar(45) DEFAULT NULL,
  `fac_importe` decimal(7,2) DEFAULT NULL,
  `fac_cambio` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`fac_id`),
  KEY `adm_id` (`adm_id`) USING BTREE,
  KEY `cli_id` (`cli_id`) USING BTREE,
  KEY `fac_id` (`fac_id`) USING BTREE,
  CONSTRAINT `adm_id` FOREIGN KEY (`adm_id`) REFERENCES `administrador` (`adm_id`),
  CONSTRAINT `cli_id` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.factura: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.nota
CREATE TABLE IF NOT EXISTS `nota` (
  `not_id` int(11) NOT NULL AUTO_INCREMENT,
  `not_usuario` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `not_titulo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `not_comentario` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `not_fecha_hora` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `adm_id` int(11) DEFAULT NULL,
  `not_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`not_id`),
  KEY `not_id` (`not_id`),
  KEY `nota_adm` (`adm_id`),
  CONSTRAINT `nota_adm` FOREIGN KEY (`adm_id`) REFERENCES `administrador` (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.nota: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;



-- Volcando estructura para vista importadora.vistaproducto
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vistaproducto` 
) ENGINE=MyISAM;

-- Volcando estructura para vista importadora.vistaproducto
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vistaproducto`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaproducto` AS SELECT * FROM producto ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
