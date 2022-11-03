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
  KEY `adm_id` (`adm_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
  KEY `cli_id` (`cli_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.cliente: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
REPLACE INTO `cliente` (`cli_id`, `cli_ci_nit`, `cli_nombre`, `cli_genero`, `cli_direccion`, `cli_celular`, `cli_fecha_registro`) VALUES
	(4, 65466576, '3454GDRGDFGFD', 'FEMENINO', 'CGVDSHGFD KL DMDLKFM SDLK FM', 56785786, '2022-10-31 21:25:24');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `comp_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) DEFAULT NULL,
  `comp_caducidad` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `comp_detalle` varchar(90) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `comp_cantidad` int(11) DEFAULT NULL,
  `comp_subtotal` float DEFAULT NULL,
  `comp_precio_unitario` float DEFAULT NULL,
  `comp_fecha_registro` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `comp_vendedor` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `comp_tipo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  KEY `comp_id` (`comp_id`) USING BTREE,
  KEY `comp_prod` (`prod_id`),
  CONSTRAINT `comp_prod` FOREIGN KEY (`prod_id`) REFERENCES `producto` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.compra: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
REPLACE INTO `compra` (`comp_id`, `prod_id`, `comp_caducidad`, `comp_detalle`, `comp_cantidad`, `comp_subtotal`, `comp_precio_unitario`, `comp_fecha_registro`, `comp_vendedor`, `comp_tipo`) VALUES
	(1, 29, '2022-11-27', 'BEBIDA ENDULZANTE', 150, 6, 8, '2022-11-03 15:14:33', 'JOSE PEREZ', 'CONTADO');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

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
  `det_codigo` varchar(10) DEFAULT NULL,
  KEY `det_id` (`det_id`) USING BTREE,
  KEY `prod_id` (`prod_id`),
  KEY `fac_id` (`fac_id`),
  CONSTRAINT `fac_id` FOREIGN KEY (`fac_id`) REFERENCES `factura` (`fac_id`),
  CONSTRAINT `prod_id` FOREIGN KEY (`prod_id`) REFERENCES `producto` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
  KEY `adm_id` (`adm_id`) USING BTREE,
  KEY `cli_id` (`cli_id`) USING BTREE,
  KEY `fac_id` (`fac_id`) USING BTREE,
  CONSTRAINT `adm_id` FOREIGN KEY (`adm_id`) REFERENCES `administrador` (`adm_id`),
  CONSTRAINT `cli_id` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.factura: ~0 rows (aproximadamente)
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
  KEY `not_id` (`not_id`),
  KEY `nota_adm` (`adm_id`),
  CONSTRAINT `nota_adm` FOREIGN KEY (`adm_id`) REFERENCES `administrador` (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.nota: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;

-- Volcando estructura para tabla importadora.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nombre_comercial` varchar(255) DEFAULT NULL,
  `prod_imagen` varchar(255) DEFAULT NULL,
  `prod_fabricante` varchar(255) DEFAULT NULL,
  `prod_stock_minimo` int(11) DEFAULT NULL,
  `prod_stock` int(11) DEFAULT NULL,
  `prod_vencimiento` date DEFAULT NULL,
  `prod_ubicacion` varchar(255) DEFAULT NULL,
  `prod_precio_compra` decimal(7,2) DEFAULT NULL,
  `prod_precio_venta` decimal(7,2) DEFAULT NULL,
  `prod_precio_unitario` decimal(7,2) DEFAULT NULL,
  `prod_inversion` decimal(7,2) DEFAULT NULL,
  `prod_mas_vendido` int(111) DEFAULT NULL,
  `prod_barcode` varchar(255) DEFAULT NULL,
  `prod_fecha_actualizacion` date DEFAULT NULL,
  `prod_fecha_registro` date DEFAULT NULL,
  `prod_estado` tinyint(1) DEFAULT NULL,
  KEY `prod_id` (`prod_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla importadora.producto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
REPLACE INTO `producto` (`prod_id`, `prod_nombre_comercial`, `prod_imagen`, `prod_fabricante`, `prod_stock_minimo`, `prod_stock`, `prod_vencimiento`, `prod_ubicacion`, `prod_precio_compra`, `prod_precio_venta`, `prod_precio_unitario`, `prod_inversion`, `prod_mas_vendido`, `prod_barcode`, `prod_fecha_actualizacion`, `prod_fecha_registro`, `prod_estado`) VALUES
	(1, 'COCA COLA', '/assets/images/default/anonymous.png', 'EMBOL', 10, 150, '2022-11-30', 'ESTANTERIA 5', 10.00, 10.00, 10.00, NULL, NULL, 'AKJNFKJSDNFUSDFEU', '2022-11-02', '2022-11-02', 1),
	(2, 'EXCELSIOR', '/assets/images/default/anonymous.png', 'BOLIVIA', 7, 200, '2023-03-01', 'ESTANTERIA 2', 9.50, 12.00, 12.00, NULL, NULL, 'LASKDNFDNHIUHAR7437', '2022-11-02', '2022-11-02', 0),
	(3, 'PEPSI', '/assets/images/default/anonymous.png', 'EMBOL', 50, 240, '2022-10-02', 'ESTANTERIA 6', 9.00, 10.00, 11.00, NULL, NULL, 'SFLJKHUFUEHFIEUY8R43Y7', '2022-11-02', '2022-11-02', 1),
	(29, 'MOISNAFNFD', '/assets/images/default/anonymous.png', 'ZXDSADSADAS', 10, 150, '2022-11-27', 'ESTANTERIA 5', 6.00, 7.00, 8.00, NULL, NULL, 'COALAKMOIFQI4E823742', '2022-11-03', '2022-11-03', 1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
