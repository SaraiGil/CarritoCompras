-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.6-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para maid_cleaning_service
CREATE DATABASE IF NOT EXISTS `maid_cleaning_service` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `maid_cleaning_service`;

-- Volcando estructura para tabla maid_cleaning_service.ciudad
CREATE TABLE IF NOT EXISTS `ciudad` (
  `cve_ciu` char(6) NOT NULL,
  `nom_ciu` char(50) DEFAULT NULL,
  `cve_est` int(2) DEFAULT NULL,
  PRIMARY KEY (`cve_ciu`),
  KEY `cve_est` (`cve_est`),
  CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`cve_est`) REFERENCES `estado` (`cve_est`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.ciudad: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` (`cve_ciu`, `nom_ciu`, `cve_est`) VALUES
	('j_38', 'Guadalajara', 15),
	('j_55', 'Magdalena', 15),
	('j_94', 'Tequila', 15),
	('m_04', 'Gustavo A. Madero', 7),
	('m_09', 'Alvaro Obregon', 7),
	('m_15', 'Miguel Hidalgo', 7),
	('q_06', 'Corregidora', 22),
	('q_12', 'Pedro Escobedo', 22),
	('q_14', 'Querétaro', 22);
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `cve_comp` int(5) NOT NULL AUTO_INCREMENT,
  `fec_comp` date DEFAULT NULL,
  `cve_prov` int(5) NOT NULL,
  PRIMARY KEY (`cve_comp`),
  KEY `cve_prov` (`cve_prov`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cve_prov`) REFERENCES `proveedor` (`cve_prov`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.compra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.detalle_compra
CREATE TABLE IF NOT EXISTS `detalle_compra` (
  `cve_detcomp` int(5) NOT NULL AUTO_INCREMENT,
  `cve_comp` int(5) NOT NULL,
  `no_inv` int(5) NOT NULL,
  `cant_detc` int(4) DEFAULT NULL,
  PRIMARY KEY (`cve_detcomp`),
  KEY `cve_comp` (`cve_comp`),
  KEY `no_inv` (`no_inv`),
  CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`cve_comp`) REFERENCES `compra` (`cve_comp`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`no_inv`) REFERENCES `inventario` (`no_inv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.detalle_compra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_compra` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.detalle_inventario
CREATE TABLE IF NOT EXISTS `detalle_inventario` (
  `cve_detinv` int(5) NOT NULL AUTO_INCREMENT,
  `cve_serv` int(5) NOT NULL,
  `no_inv` int(5) NOT NULL,
  `cant_det` int(4) DEFAULT NULL,
  PRIMARY KEY (`cve_detinv`),
  KEY `cve_serv` (`cve_serv`),
  KEY `no_inv` (`no_inv`),
  CONSTRAINT `detalle_inventario_ibfk_1` FOREIGN KEY (`cve_serv`) REFERENCES `servicio` (`cve_serv`),
  CONSTRAINT `detalle_inventario_ibfk_2` FOREIGN KEY (`no_inv`) REFERENCES `inventario` (`no_inv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.detalle_inventario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_inventario` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `cve_emp` char(6) NOT NULL,
  `id_us` int(6) NOT NULL,
  `cve_suc` char(5) DEFAULT NULL,
  `pues_emp` char(20) DEFAULT NULL,
  PRIMARY KEY (`cve_emp`),
  UNIQUE KEY `cve_emp` (`cve_emp`),
  KEY `cve_suc` (`cve_suc`),
  KEY `id_us` (`id_us`),
  CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`cve_suc`) REFERENCES `sucursal` (`cve_suc`),
  CONSTRAINT `empleado_ibfk_4` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id_us`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.empleado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `cve_est` int(2) NOT NULL,
  `nom_est` char(40) DEFAULT NULL,
  PRIMARY KEY (`cve_est`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.estado: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`cve_est`, `nom_est`) VALUES
	(1, 'Aguascalientes'),
	(2, 'Baja California'),
	(3, 'Baja California Sur'),
	(4, 'Campeche'),
	(5, 'Chiapas'),
	(6, 'Chihuahua'),
	(7, 'Ciudad de México'),
	(8, 'Coahuila de Zaragoza'),
	(9, 'Colima'),
	(10, 'Durango'),
	(11, 'Estado de México'),
	(12, 'Guanajuato'),
	(13, 'Guerrero'),
	(14, 'Hidalgo'),
	(15, 'Jalisco'),
	(16, 'Michoacán de Ocampo'),
	(17, 'Morelos'),
	(18, 'Nayarit'),
	(19, 'Nuevo León'),
	(20, 'Oaxaca'),
	(21, 'Puebla'),
	(22, 'Querétaro'),
	(23, 'Quintana Roo'),
	(24, 'San Luis Potosí'),
	(25, 'Sinaloa'),
	(26, 'Sonora'),
	(27, 'Tabasco'),
	(28, 'Tamaulipas'),
	(29, 'Tlaxcala'),
	(30, 'Veracruz de Ignacio de la Llave'),
	(31, 'Yucatán'),
	(32, 'Zacatecas');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `cve_fac` char(5) NOT NULL,
  `fec_fac` date DEFAULT NULL,
  `cve_serv` int(5) NOT NULL,
  PRIMARY KEY (`cve_fac`),
  UNIQUE KEY `cve_fac` (`cve_fac`),
  KEY `cve_serv` (`cve_serv`),
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`cve_serv`) REFERENCES `servicio` (`cve_serv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.factura: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.inventario
CREATE TABLE IF NOT EXISTS `inventario` (
  `no_inv` int(5) NOT NULL AUTO_INCREMENT,
  `cve_suc` char(6),
  `cve_prod` char(5) DEFAULT NULL,
  `cant_inv` int(4) DEFAULT NULL,
  PRIMARY KEY (`no_inv`),
  KEY `cve_suc` (`cve_suc`),
  KEY `cve_prod` (`cve_prod`),
  CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`cve_suc`) REFERENCES `sucursal` (`cve_suc`),
  CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`cve_prod`) REFERENCES `producto` (`cve_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.inventario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.paquete
CREATE TABLE IF NOT EXISTS `paquete` (
  `cve_paq` int(6) NOT NULL AUTO_INCREMENT,
  `nom_paq` char(35) DEFAULT NULL,
  `desc_paq` char(90) DEFAULT NULL,
  `prec_paq` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`cve_paq`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.paquete: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `paquete` DISABLE KEYS */;
INSERT INTO `paquete` (`cve_paq`, `nom_paq`, `desc_paq`, `prec_paq`) VALUES
	(1, 'PAQUETE Limpieza 1', 'Multiusos', 180.50);
/*!40000 ALTER TABLE `paquete` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `cve_prod` char(5) NOT NULL,
  `desc_prod` char(30) DEFAULT NULL,
  `cve_tip` int(4) NOT NULL,
  `prec_prod` decimal(6,2) DEFAULT NULL,
  `cto_prod` decimal(6,2) DEFAULT NULL,
  `img_prod` char(255) DEFAULT NULL,
  PRIMARY KEY (`cve_prod`),
  KEY `cve_tip` (`cve_tip`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cve_tip`) REFERENCES `tipo_producto` (`cve_tip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.producto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`cve_prod`, `desc_prod`, `cve_tip`, `prec_prod`, `cto_prod`, `img_prod`) VALUES
	('p_01', 'Limpiador pisos PINOL', 2, 20.00, 10.00, ''),
	('p_02', 'Quitacochambre', 3, 35.00, 10.00, ''),
	('p_03', 'Scotch Brite fibra', 1, 15.00, 10.00, '');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `cve_prov` int(5) NOT NULL AUTO_INCREMENT,
  `nom_prov` char(35) DEFAULT NULL,
  `calle_prov` char(35) DEFAULT NULL,
  `ncalle_prov` char(6) DEFAULT NULL,
  `col_prov` char(25) DEFAULT NULL,
  `cp_prov` int(5) DEFAULT NULL,
  `tel_prov` char(10) DEFAULT NULL,
  `cve_ciu` char(6) NOT NULL,
  PRIMARY KEY (`cve_prov`),
  KEY `cve_ciu` (`cve_ciu`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`cve_ciu`) REFERENCES `ciudad` (`cve_ciu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.servicio
CREATE TABLE IF NOT EXISTS `servicio` (
  `cve_serv` int(5) NOT NULL AUTO_INCREMENT,
  `fec_serv` date DEFAULT NULL,
  `id_clie` char(6) DEFAULT NULL,
  `cve_emp` char(6) DEFAULT NULL,
  `cve_paq` int(6) NOT NULL,
  `stat_serv` char(15) DEFAULT NULL,
  `img_serv` char(25) DEFAULT NULL,
  PRIMARY KEY (`cve_serv`),
  KEY `id_clie` (`id_clie`),
  KEY `cve_emp` (`cve_emp`),
  KEY `cve_paq` (`cve_paq`),
  CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_clie`) REFERENCES `cliente` (`id_clie`),
  CONSTRAINT `servicio_ibfk_2` FOREIGN KEY (`cve_emp`) REFERENCES `empleado` (`cve_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.servicio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.sesiones
CREATE TABLE IF NOT EXISTS `sesiones` (
  `idSesión` int(3) NOT NULL AUTO_INCREMENT,
  `user` int(6) NOT NULL,
  `sesion` char(50) NOT NULL,
  PRIMARY KEY (`idSesión`),
  KEY `user` (`user`),
  CONSTRAINT `fkSesionUser` FOREIGN KEY (`user`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.sesiones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sesiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `sesiones` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.sucursal
CREATE TABLE IF NOT EXISTS `sucursal` (
  `cve_suc` char(6) NOT NULL,
  `calle_suc` char(45) DEFAULT NULL,
  `numc_suc` char(4) DEFAULT NULL,
  `col_suc` char(25) DEFAULT NULL,
  `cp_suc` int(5) DEFAULT NULL,
  `cve_ciu` char(6) NOT NULL,
  `nom_suc` char(25) DEFAULT NULL,
  PRIMARY KEY (`cve_suc`),
  UNIQUE KEY `cve_suc` (`cve_suc`),
  KEY `cve_ciu` (`cve_ciu`),
  CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`cve_ciu`) REFERENCES `ciudad` (`cve_ciu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.sucursal: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` (`cve_suc`, `calle_suc`, `numc_suc`, `col_suc`, `cp_suc`, `cve_ciu`, `nom_suc`) VALUES
	('1', 'calle1', '123', 'colonia2', 34234, 'q_06', 'Corregidora'),
	('2', 'calle', '1', 'colonia', 23456, 'j_38', 'Guadalajara'),
	('3', 'calle', '1', 'col', 89787, 'm_04', 'Ciudad de México');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.tipousuario
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `cve_tipous` int(4) NOT NULL AUTO_INCREMENT,
  `nom_tipous` char(30) NOT NULL,
  PRIMARY KEY (`cve_tipous`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.tipousuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` (`cve_tipous`, `nom_tipous`) VALUES
	(1, 'Administrador'),
	(2, 'Cliente'),
	(3, 'Empleado');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.tipo_producto
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `cve_tip` int(4) NOT NULL AUTO_INCREMENT,
  `desc_tip` char(25) DEFAULT NULL,
  PRIMARY KEY (`cve_tip`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.tipo_producto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_producto` DISABLE KEYS */;
INSERT INTO `tipo_producto` (`cve_tip`, `desc_tip`) VALUES
	(1, 'Limpiadores'),
	(2, 'Pisos'),
	(3, 'Baños');
/*!40000 ALTER TABLE `tipo_producto` ENABLE KEYS */;

-- Volcando estructura para tabla maid_cleaning_service.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_us` int(6) NOT NULL AUTO_INCREMENT,
  `nickuser` char(9) NOT NULL,
  `pass_us` varchar(255) NOT NULL DEFAULT '',
  `nom_us` char(20) NOT NULL,
  `ap_us` char(20) NOT NULL,
  `am_us` char(20) DEFAULT NULL,
  `calle_us` char(20) NOT NULL,
  `numc_us` int(3) DEFAULT NULL,
  `col_us` char(20) NOT NULL,
  `cp_us` int(5) DEFAULT NULL,
  `tel_us` char(10) DEFAULT NULL,
  `rfc_us` char(13) DEFAULT NULL,
  `email_us` char(70) NOT NULL,
  `cve_ciu` char(5) NOT NULL,
  `cve_tipous` int(4) NOT NULL,
  PRIMARY KEY (`id_us`),
  UNIQUE KEY `nickuser` (`nickuser`),
  KEY `cve_ciu` (`cve_ciu`),
  KEY `cve_tipous` (`cve_tipous`),
  CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`cve_ciu`) REFERENCES `ciudad` (`cve_ciu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cliente_ibfk_4` FOREIGN KEY (`cve_tipous`) REFERENCES `tipousuario` (`cve_tipous`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla maid_cleaning_service.usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_us`, `nickuser`, `pass_us`, `nom_us`, `ap_us`, `am_us`, `calle_us`, `numc_us`, `col_us`, `cp_us`, `tel_us`, `rfc_us`, `email_us`, `cve_ciu`, `cve_tipous`) VALUES
	(1, 'admin', '$2y$10$Wf0NAVlQBLABwLqHBQaQDe3G1Q4yE6jI8zWGtzVFktzuqOJ0WsZ5a', 'Administrador', 'de la', 'Pagina', 'Calle', 123, 'Colonia', 12345, '4421234567', 'ADMI123456SDF', 'admin@admin.com', 'q_14', 1),
	(2, 'prueba', '$2y$10$GHGPT7.lTrXc8416umgy5.WcQjiXtm7WtgxNRjeEAu.TOAM9HhCvu', 'Alejandro', 'Vargas', 'Diaz', 'calle', 23, 'colonia', 76020, '4423456789', 'ALEX123456SDF', 'lexvargas@correo.com', 'q_14', 2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
