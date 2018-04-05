/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : onlinestore

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-12-03 16:10:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for relacion_usuarios_tipos
-- ----------------------------
DROP TABLE IF EXISTS `relacion_usuarios_tipos`;
CREATE TABLE `relacion_usuarios_tipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `usuarios_tipos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of relacion_usuarios_tipos
-- ----------------------------
INSERT INTO `relacion_usuarios_tipos` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cumpleanios` date DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fotografia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'admin@admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2015-12-01', 'admin', null, null, null);

-- ----------------------------
-- Table structure for usuarios_tipos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_tipos`;
CREATE TABLE `usuarios_tipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of usuarios_tipos
-- ----------------------------
INSERT INTO `usuarios_tipos` VALUES ('1', 'Administrador', null);
INSERT INTO `usuarios_tipos` VALUES ('2', 'Usuario', null);
