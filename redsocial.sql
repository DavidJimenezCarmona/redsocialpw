-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2013 a las 12:46:13
-- Versión del servidor: 6.0.4
-- Versión de PHP: 6.0.0-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `redsocial`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `actividad`
-- 

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(512) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `lugar` varchar(512) NOT NULL,
  `descripcion` varchar(2048) NOT NULL,
  `plazas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `actividad`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `amigo`
-- 

CREATE TABLE `amigo` (
  `id` int(11) NOT NULL,
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL,
  `aceptado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `amigo`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ciudad`
-- 

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `ciudad`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `mensaje`
-- 

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_emisor` int(11) NOT NULL,
  `id_usuario_receptor` int(11) NOT NULL,
  `contenido` varchar(2048) NOT NULL,
  `visto` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `mensaje`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `perfil`
-- 

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_ciudad_residencia` int(11) DEFAULT NULL,
  `id_ciudad_nacimiento` int(11) DEFAULT NULL,
  `ocupacion` varchar(512) DEFAULT NULL,
  `centro_actividad` varchar(512) DEFAULT NULL,
  `foto` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `perfil`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `reporte`
-- 

CREATE TABLE `reporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_reportado` int(11) NOT NULL,
  `id_usuario_reportador` int(11) NOT NULL,
  `motivo` varchar(1024) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `reporte`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipo`
-- 

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tipo`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario`
-- 

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `apellidos` varchar(512) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `email` varchar(512) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `usuario`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario_actividad`
-- 

CREATE TABLE `usuario_actividad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_actividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `usuario_actividad`
-- 

