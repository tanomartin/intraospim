-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2014 a las 13:49:16
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistem22_intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1002`
--

CREATE TABLE IF NOT EXISTS `apoi1002` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1101`
--

CREATE TABLE IF NOT EXISTS `apoi1101` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1102`
--

CREATE TABLE IF NOT EXISTS `apoi1102` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1103`
--

CREATE TABLE IF NOT EXISTS `apoi1103` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1106`
--

CREATE TABLE IF NOT EXISTS `apoi1106` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1107`
--

CREATE TABLE IF NOT EXISTS `apoi1107` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1108`
--

CREATE TABLE IF NOT EXISTS `apoi1108` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1109`
--

CREATE TABLE IF NOT EXISTS `apoi1109` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1110`
--

CREATE TABLE IF NOT EXISTS `apoi1110` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1201`
--

CREATE TABLE IF NOT EXISTS `apoi1201` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1202`
--

CREATE TABLE IF NOT EXISTS `apoi1202` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1203`
--

CREATE TABLE IF NOT EXISTS `apoi1203` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1301`
--

CREATE TABLE IF NOT EXISTS `apoi1301` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1302`
--

CREATE TABLE IF NOT EXISTS `apoi1302` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1401`
--

CREATE TABLE IF NOT EXISTS `apoi1401` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1402`
--

CREATE TABLE IF NOT EXISTS `apoi1402` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1501`
--

CREATE TABLE IF NOT EXISTS `apoi1501` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1601`
--

CREATE TABLE IF NOT EXISTS `apoi1601` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1701`
--

CREATE TABLE IF NOT EXISTS `apoi1701` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1702`
--

CREATE TABLE IF NOT EXISTS `apoi1702` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1703`
--

CREATE TABLE IF NOT EXISTS `apoi1703` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1802`
--

CREATE TABLE IF NOT EXISTS `apoi1802` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi1901`
--

CREATE TABLE IF NOT EXISTS `apoi1901` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2001`
--

CREATE TABLE IF NOT EXISTS `apoi2001` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2101`
--

CREATE TABLE IF NOT EXISTS `apoi2101` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2102`
--

CREATE TABLE IF NOT EXISTS `apoi2102` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2103`
--

CREATE TABLE IF NOT EXISTS `apoi2103` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2201`
--

CREATE TABLE IF NOT EXISTS `apoi2201` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2301`
--

CREATE TABLE IF NOT EXISTS `apoi2301` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2401`
--

CREATE TABLE IF NOT EXISTS `apoi2401` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2402`
--

CREATE TABLE IF NOT EXISTS `apoi2402` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2403`
--

CREATE TABLE IF NOT EXISTS `apoi2403` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2501`
--

CREATE TABLE IF NOT EXISTS `apoi2501` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2602`
--

CREATE TABLE IF NOT EXISTS `apoi2602` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2603`
--

CREATE TABLE IF NOT EXISTS `apoi2603` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2604`
--

CREATE TABLE IF NOT EXISTS `apoi2604` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2701`
--

CREATE TABLE IF NOT EXISTS `apoi2701` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2801`
--

CREATE TABLE IF NOT EXISTS `apoi2801` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi2902`
--

CREATE TABLE IF NOT EXISTS `apoi2902` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi3001`
--

CREATE TABLE IF NOT EXISTS `apoi3001` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoi3101`
--

CREATE TABLE IF NOT EXISTS `apoi3101` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecrec` date NOT NULL DEFAULT '0000-00-00',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `imptra` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`nrcuil`,`anotra`,`mestra`,`contra`,`fecrec`,`indbcr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizacionpedida`
--

CREATE TABLE IF NOT EXISTS `autorizacionpedida` (
  `nrosolicitud` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `delcod` int(4) unsigned NOT NULL DEFAULT '0',
  `fechasolicitud` date NOT NULL DEFAULT '0000-00-00',
  `nrcuil` varchar(11) NOT NULL DEFAULT '',
  `nrafil` int(7) unsigned DEFAULT NULL,
  `codpar` int(2) unsigned DEFAULT NULL,
  `nombre` varchar(60) NOT NULL DEFAULT '',
  `practica` int(1) unsigned DEFAULT NULL,
  `material` int(1) unsigned DEFAULT NULL,
  `medicamento` int(1) unsigned DEFAULT NULL,
  `tipomaterial` int(2) unsigned DEFAULT NULL,
  `pedidomedico` mediumblob,
  `resumenhc` mediumblob,
  `avalsolicitud` mediumblob,
  `presupuesto1` mediumblob,
  `presupuesto2` mediumblob,
  `presupuesto3` mediumblob,
  `presupuesto4` mediumblob,
  `presupuesto5` mediumblob,
  PRIMARY KEY (`nrosolicitud`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=1 COMMENT='Almacena las solicitudes de autorizacion de las delegaciones' AUTO_INCREMENT=3351 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizacionprocesada`
--

CREATE TABLE IF NOT EXISTS `autorizacionprocesada` (
  `nrosolicitud` int(9) unsigned NOT NULL DEFAULT '0',
  `delcod` int(4) unsigned NOT NULL DEFAULT '0',
  `fechasolicitud` date NOT NULL DEFAULT '0000-00-00',
  `nrcuil` varchar(11) NOT NULL DEFAULT '',
  `nrafil` int(7) unsigned DEFAULT NULL,
  `codpar` int(2) unsigned DEFAULT NULL,
  `nombre` varchar(60) NOT NULL DEFAULT '',
  `tiposolicitud` int(1) NOT NULL DEFAULT '0',
  `tipomaterial` int(2) unsigned DEFAULT NULL,
  `statusverificacion` int(1) DEFAULT NULL,
  `fechaverificacion` date DEFAULT NULL,
  `rechazoverificacion` text,
  `statusautorizacion` int(1) DEFAULT NULL,
  `fechaautorizacion` date DEFAULT NULL,
  `rechazoautorizacion` text,
  `fechaemail` datetime DEFAULT NULL,
  PRIMARY KEY (`nrosolicitud`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajafam`
--

CREATE TABLE IF NOT EXISTS `bajafam` (
  `nrafil` int(7) NOT NULL DEFAULT '0',
  `codpar` int(2) NOT NULL DEFAULT '0',
  `estudi` char(1) NOT NULL DEFAULT '',
  `discap` char(1) NOT NULL DEFAULT '',
  `nombre` char(30) NOT NULL DEFAULT '',
  `tipdoc` int(1) NOT NULL DEFAULT '0',
  `nrodoc` int(8) NOT NULL DEFAULT '0',
  `fecnac` date NOT NULL DEFAULT '0000-00-00',
  `ssexxo` char(1) NOT NULL DEFAULT '',
  `fecing` date NOT NULL DEFAULT '0000-00-00',
  `fecbaj` date DEFAULT '0000-00-00',
  `fecemi` date DEFAULT '0000-00-00',
  `nrcuil` char(11) DEFAULT NULL,
  `delcod` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nrafil`,`codpar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajatit`
--

CREATE TABLE IF NOT EXISTS `bajatit` (
  `nrafil` int(7) NOT NULL DEFAULT '0',
  `fecing` date NOT NULL DEFAULT '0000-00-00',
  `fecbaj` date DEFAULT '0000-00-00',
  `nombre` char(30) NOT NULL DEFAULT '',
  `tipdoc` int(1) NOT NULL DEFAULT '0',
  `nrodoc` int(8) NOT NULL DEFAULT '0',
  `fecnac` date NOT NULL DEFAULT '0000-00-00',
  `ssexxo` char(1) NOT NULL DEFAULT '',
  `estciv` char(1) NOT NULL DEFAULT '',
  `nacion` int(3) NOT NULL DEFAULT '0',
  `domici` char(45) NOT NULL DEFAULT '',
  `locali` char(30) NOT NULL DEFAULT '',
  `provin` int(2) NOT NULL DEFAULT '0',
  `codpos` int(4) DEFAULT '0',
  `nrcuit` char(11) NOT NULL,
  `delcod` int(4) NOT NULL DEFAULT '0',
  `fecemp` date NOT NULL DEFAULT '0000-00-00',
  `catego` char(20) DEFAULT NULL,
  `fecemi` date DEFAULT '0000-00-00',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `tipafi` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`nrafil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabacuer`
--

CREATE TABLE IF NOT EXISTS `cabacuer` (
  `nrcuit` char(11) NOT NULL,
  `nroacu` int(3) NOT NULL DEFAULT '0',
  `tipacu` int(1) NOT NULL DEFAULT '0',
  `estacu` int(1) NOT NULL DEFAULT '0',
  `fecacu` date DEFAULT '0000-00-00',
  `totacu` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`nrcuit`,`nroacu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabjur`
--

CREATE TABLE IF NOT EXISTS `cabjur` (
  `delcod` int(4) NOT NULL,
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `canper` int(4) NOT NULL DEFAULT '0',
  `totrem` double(10,2) NOT NULL DEFAULT '0.00',
  `totdec` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancermama`
--

CREATE TABLE IF NOT EXISTS `cancermama` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `delcod` int(4) unsigned NOT NULL,
  `profesional` char(100) NOT NULL,
  `fechaatencion` date NOT NULL,
  `nrcuil` char(11) NOT NULL,
  `nrafil` int(7) unsigned DEFAULT NULL,
  `codpar` int(2) unsigned DEFAULT NULL,
  `nombre` char(60) NOT NULL,
  `ddntelefono` int(5) unsigned DEFAULT NULL,
  `nrotelefono` int(10) unsigned DEFAULT NULL,
  `edad` int(3) unsigned NOT NULL,
  `antecedentes` int(1) unsigned NOT NULL,
  `personaantecedente` int(1) unsigned DEFAULT NULL,
  `examenmamario` int(1) unsigned NOT NULL,
  `ultimoexamenmamario` date DEFAULT NULL,
  `mamografia` int(1) unsigned NOT NULL,
  `ultimamamografia` date DEFAULT NULL,
  `emitediagnostico` int(1) unsigned NOT NULL,
  `diagnostico` text,
  `subdiagnostico` text,
  `observaciones` text,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` datetime DEFAULT NULL,
  `descargado` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canceruterino`
--

CREATE TABLE IF NOT EXISTS `canceruterino` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `delcod` int(4) unsigned NOT NULL,
  `profesional` char(100) NOT NULL,
  `fechaatencion` date NOT NULL,
  `nrcuil` char(11) NOT NULL,
  `nrafil` int(7) unsigned NOT NULL,
  `codpar` int(2) unsigned NOT NULL,
  `nombre` char(60) NOT NULL,
  `ddntelefono` int(5) unsigned DEFAULT NULL,
  `nrotelefono` int(10) unsigned DEFAULT NULL,
  `edad` int(3) unsigned NOT NULL,
  `antecedentes` int(1) unsigned NOT NULL,
  `personaantecedente` int(1) unsigned DEFAULT NULL,
  `pap` int(1) unsigned NOT NULL,
  `ultimopap` date DEFAULT NULL,
  `colpo` int(1) unsigned NOT NULL,
  `ultimacolpo` date DEFAULT NULL,
  `emitediagnostico` int(1) unsigned NOT NULL,
  `diagnostico` text,
  `subdiagnostico` text,
  `observaciones` text,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` datetime DEFAULT NULL,
  `descargado` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cie10capitulos`
--

CREATE TABLE IF NOT EXISTS `cie10capitulos` (
  `idcapitulo` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `numerocapitulo` char(10) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idcapitulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cie10categorias`
--

CREATE TABLE IF NOT EXISTS `cie10categorias` (
  `idcategoria` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `idgrupo` int(4) unsigned NOT NULL,
  `letracodigo` char(1) NOT NULL,
  `numerocodigo` char(2) NOT NULL,
  `simbolocodigo` char(1) DEFAULT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2044 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cie10grupos`
--

CREATE TABLE IF NOT EXISTS `cie10grupos` (
  `idgrupo` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `idcapitulo` int(3) unsigned NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idgrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=264 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cie10subcategorias`
--

CREATE TABLE IF NOT EXISTS `cie10subcategorias` (
  `idsubcategoria` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria` int(5) unsigned NOT NULL,
  `numerosubcodigo` char(1) NOT NULL,
  `simbolosubcodigo` char(1) DEFAULT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idsubcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12183 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificamaterial`
--

CREATE TABLE IF NOT EXISTS `clasificamaterial` (
  `codigo` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` char(100) NOT NULL DEFAULT '',
  `presuminimo` int(1) unsigned NOT NULL DEFAULT '0',
  `presumaximo` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Clasifica materiales para establecer puntos minimos y maximo' AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1002`
--

CREATE TABLE IF NOT EXISTS `cuij1002` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1101`
--

CREATE TABLE IF NOT EXISTS `cuij1101` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1102`
--

CREATE TABLE IF NOT EXISTS `cuij1102` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1103`
--

CREATE TABLE IF NOT EXISTS `cuij1103` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1106`
--

CREATE TABLE IF NOT EXISTS `cuij1106` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1107`
--

CREATE TABLE IF NOT EXISTS `cuij1107` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1108`
--

CREATE TABLE IF NOT EXISTS `cuij1108` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1109`
--

CREATE TABLE IF NOT EXISTS `cuij1109` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1110`
--

CREATE TABLE IF NOT EXISTS `cuij1110` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1201`
--

CREATE TABLE IF NOT EXISTS `cuij1201` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1202`
--

CREATE TABLE IF NOT EXISTS `cuij1202` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1203`
--

CREATE TABLE IF NOT EXISTS `cuij1203` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1301`
--

CREATE TABLE IF NOT EXISTS `cuij1301` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1302`
--

CREATE TABLE IF NOT EXISTS `cuij1302` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1401`
--

CREATE TABLE IF NOT EXISTS `cuij1401` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1402`
--

CREATE TABLE IF NOT EXISTS `cuij1402` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1501`
--

CREATE TABLE IF NOT EXISTS `cuij1501` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1601`
--

CREATE TABLE IF NOT EXISTS `cuij1601` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1701`
--

CREATE TABLE IF NOT EXISTS `cuij1701` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1702`
--

CREATE TABLE IF NOT EXISTS `cuij1702` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1703`
--

CREATE TABLE IF NOT EXISTS `cuij1703` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1802`
--

CREATE TABLE IF NOT EXISTS `cuij1802` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij1901`
--

CREATE TABLE IF NOT EXISTS `cuij1901` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2001`
--

CREATE TABLE IF NOT EXISTS `cuij2001` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2101`
--

CREATE TABLE IF NOT EXISTS `cuij2101` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2102`
--

CREATE TABLE IF NOT EXISTS `cuij2102` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2103`
--

CREATE TABLE IF NOT EXISTS `cuij2103` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2201`
--

CREATE TABLE IF NOT EXISTS `cuij2201` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2301`
--

CREATE TABLE IF NOT EXISTS `cuij2301` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2401`
--

CREATE TABLE IF NOT EXISTS `cuij2401` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2402`
--

CREATE TABLE IF NOT EXISTS `cuij2402` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2403`
--

CREATE TABLE IF NOT EXISTS `cuij2403` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2501`
--

CREATE TABLE IF NOT EXISTS `cuij2501` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2602`
--

CREATE TABLE IF NOT EXISTS `cuij2602` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2603`
--

CREATE TABLE IF NOT EXISTS `cuij2603` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2604`
--

CREATE TABLE IF NOT EXISTS `cuij2604` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2701`
--

CREATE TABLE IF NOT EXISTS `cuij2701` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2801`
--

CREATE TABLE IF NOT EXISTS `cuij2801` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij2902`
--

CREATE TABLE IF NOT EXISTS `cuij2902` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij3001`
--

CREATE TABLE IF NOT EXISTS `cuij3001` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuij3101`
--

CREATE TABLE IF NOT EXISTS `cuij3101` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `remimp` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`nrcuil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuoacuer`
--

CREATE TABLE IF NOT EXISTS `cuoacuer` (
  `nrcuit` char(11) NOT NULL,
  `nroacu` int(3) NOT NULL DEFAULT '0',
  `nrocuo` int(3) NOT NULL DEFAULT '0',
  `moncuo` double(10,2) NOT NULL DEFAULT '0.00',
  `fecvto` date NOT NULL DEFAULT '0000-00-00',
  `monpag` double(10,2) DEFAULT NULL,
  `fecpag` date DEFAULT NULL,
  PRIMARY KEY (`nrcuit`,`nroacu`,`nrocuo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delega`
--

CREATE TABLE IF NOT EXISTS `delega` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nombre` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`delcod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desemple`
--

CREATE TABLE IF NOT EXISTS `desemple` (
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nrcuil`,`anotra`,`mestra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detacuer`
--

CREATE TABLE IF NOT EXISTS `detacuer` (
  `nrcuit` char(11) NOT NULL,
  `nroacu` int(3) NOT NULL DEFAULT '0',
  `anoacu` int(4) NOT NULL DEFAULT '0',
  `mesacu` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nrcuit`,`nroacu`,`anoacu`,`mesacu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diabetes`
--

CREATE TABLE IF NOT EXISTS `diabetes` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `delcod` int(4) unsigned NOT NULL,
  `profesional` char(100) NOT NULL,
  `fechaatencion` date NOT NULL,
  `nrcuil` char(11) NOT NULL,
  `nrafil` int(7) unsigned NOT NULL,
  `codpar` int(2) unsigned NOT NULL,
  `nombre` char(60) NOT NULL,
  `ddntelefono` int(5) unsigned DEFAULT NULL,
  `nrotelefono` int(10) unsigned DEFAULT NULL,
  `edad` int(3) unsigned NOT NULL,
  `talla` decimal(3,2) unsigned NOT NULL,
  `peso` decimal(6,3) unsigned NOT NULL,
  `presion` char(7) NOT NULL,
  `cinturaabdominal` decimal(5,2) unsigned NOT NULL,
  `masamuscular` decimal(5,2) unsigned NOT NULL,
  `masacorporal` decimal(5,2) unsigned NOT NULL,
  `antecedentes` int(1) unsigned NOT NULL,
  `personaantecedente` int(1) unsigned DEFAULT NULL,
  `nivelglucemia` int(3) unsigned NOT NULL,
  `emitediagnostico` int(1) unsigned NOT NULL,
  `diagnostico` text,
  `subdiagnostico` text,
  `observaciones` text,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` datetime DEFAULT NULL,
  `descargado` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nombre` char(100) NOT NULL DEFAULT '',
  `domile` char(100) NOT NULL DEFAULT '',
  `locale` char(100) NOT NULL DEFAULT '',
  `provle` int(2) NOT NULL DEFAULT '0',
  `copole` char(8) NOT NULL DEFAULT '',
  `telef1` char(14) NOT NULL DEFAULT '',
  `fecini` date DEFAULT NULL,
  `nrcuit` char(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`delcod`,`nrcuit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE IF NOT EXISTS `familia` (
  `nrafil` int(7) NOT NULL DEFAULT '0',
  `codpar` int(2) NOT NULL DEFAULT '0',
  `estudi` char(1) NOT NULL DEFAULT '',
  `discap` char(1) NOT NULL DEFAULT '',
  `nombre` char(30) NOT NULL DEFAULT '',
  `tipdoc` int(1) NOT NULL DEFAULT '0',
  `nrodoc` int(8) NOT NULL DEFAULT '0',
  `fecnac` date NOT NULL DEFAULT '0000-00-00',
  `ssexxo` char(1) NOT NULL DEFAULT '',
  `fecing` date NOT NULL DEFAULT '0000-00-00',
  `fecemi` date NOT NULL DEFAULT '0000-00-00',
  `nrcuil` char(11) DEFAULT NULL,
  `delcod` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nrafil`,`codpar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hipertension`
--

CREATE TABLE IF NOT EXISTS `hipertension` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `delcod` int(4) unsigned NOT NULL,
  `profesional` char(100) NOT NULL,
  `fechaatencion` date NOT NULL,
  `nrcuil` char(11) NOT NULL,
  `nrafil` int(7) unsigned NOT NULL,
  `codpar` int(2) unsigned NOT NULL,
  `nombre` char(60) NOT NULL,
  `ddntelefono` int(5) unsigned DEFAULT NULL,
  `nrotelefono` int(10) unsigned DEFAULT NULL,
  `edad` int(3) unsigned NOT NULL,
  `talla` decimal(3,2) unsigned NOT NULL,
  `peso` decimal(6,3) unsigned NOT NULL,
  `presion` char(7) NOT NULL,
  `antecedenteshipertension` int(1) unsigned NOT NULL,
  `personaantecedentehipertension` int(1) unsigned DEFAULT NULL,
  `antecedentescardiacos` int(1) unsigned NOT NULL,
  `personaantecedentecardiaco` int(1) unsigned DEFAULT NULL,
  `emitediagnostico` int(1) unsigned NOT NULL,
  `diagnostico` text,
  `subdiagnostico` text,
  `observaciones` text,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` datetime DEFAULT NULL,
  `descargado` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juicios`
--

CREATE TABLE IF NOT EXISTS `juicios` (
  `nrcuit` char(11) NOT NULL,
  `anojui` int(4) NOT NULL DEFAULT '0',
  `mesjui` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nrcuit`,`anojui`,`mesjui`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maternoinfantil`
--

CREATE TABLE IF NOT EXISTS `maternoinfantil` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `delcod` int(4) unsigned NOT NULL,
  `profesional` char(100) NOT NULL,
  `fechaatencion` date NOT NULL,
  `nrcuil` char(11) NOT NULL,
  `nrafil` int(7) unsigned NOT NULL,
  `codpar` int(2) unsigned NOT NULL,
  `nombre` char(60) NOT NULL,
  `nombrepaciente` char(60) NOT NULL,
  `ddntelefono` int(5) unsigned DEFAULT NULL,
  `nrotelefono` int(10) unsigned DEFAULT NULL,
  `edad` int(3) unsigned NOT NULL,
  `talla` decimal(3,2) unsigned NOT NULL,
  `peso` decimal(6,3) unsigned NOT NULL,
  `perimetrocefalico` decimal(4,2) unsigned NOT NULL,
  `estudiofei` int(1) unsigned DEFAULT NULL,
  `otoemisionesacusticas` int(1) unsigned DEFAULT NULL,
  `fondodeojo` int(1) unsigned DEFAULT NULL,
  `ecocadera` int(1) unsigned DEFAULT NULL,
  `controlnro` int(2) unsigned NOT NULL,
  `vacunasaldia` int(1) unsigned NOT NULL,
  `vacunasfaltantes` text,
  `lactanciamaterna` int(1) unsigned NOT NULL,
  `emitediagnostico` int(1) unsigned NOT NULL,
  `diagnostico` text,
  `subdiagnostico` text,
  `observaciones` text,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` datetime DEFAULT NULL,
  `descargado` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontologica`
--

CREATE TABLE IF NOT EXISTS `odontologica` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `delcod` int(4) unsigned NOT NULL,
  `profesional` char(100) NOT NULL,
  `fechaatencion` date NOT NULL,
  `nrcuil` char(11) NOT NULL,
  `nrafil` int(7) unsigned NOT NULL,
  `codpar` int(2) unsigned NOT NULL,
  `nombre` char(60) NOT NULL,
  `ddntelefono` int(5) unsigned DEFAULT NULL,
  `nrotelefono` int(10) unsigned DEFAULT NULL,
  `edad` int(3) unsigned NOT NULL,
  `fluor` int(1) unsigned NOT NULL,
  `cepillado` int(1) unsigned NOT NULL,
  `fosasyfisuras` text,
  `pasta` text,
  `embarazo` int(1) unsigned NOT NULL,
  `semanaembarazo` int(2) unsigned DEFAULT NULL,
  `consultanro` int(2) unsigned NOT NULL,
  `emitediagnostico` int(1) unsigned NOT NULL,
  `diagnostico` text,
  `subdiagnostico` text,
  `observaciones` text,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` datetime DEFAULT NULL,
  `descargado` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `indbcr` char(1) NOT NULL DEFAULT '',
  `contra` char(6) NOT NULL DEFAULT '',
  `fecdep` date NOT NULL DEFAULT '0000-00-00',
  `totdep` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`delcod`,`nrcuit`,`anotra`,`mestra`,`indbcr`,`contra`,`fecdep`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenatal`
--

CREATE TABLE IF NOT EXISTS `prenatal` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `delcod` int(4) unsigned NOT NULL,
  `profesional` char(100) NOT NULL,
  `fechaatencion` date NOT NULL,
  `nrcuil` char(11) NOT NULL,
  `nrafil` int(7) unsigned NOT NULL,
  `codpar` int(2) unsigned NOT NULL,
  `nombre` char(60) NOT NULL,
  `ddntelefono` int(5) unsigned DEFAULT NULL,
  `nrotelefono` int(10) unsigned DEFAULT NULL,
  `edad` int(3) unsigned NOT NULL,
  `talla` decimal(3,2) unsigned NOT NULL,
  `peso` decimal(6,3) unsigned NOT NULL,
  `presion` char(7) NOT NULL,
  `serologia` int(10) unsigned NOT NULL,
  `fum` date NOT NULL,
  `edadgestacional` int(2) unsigned NOT NULL,
  `alturauterina` decimal(4,2) unsigned NOT NULL,
  `fpp` date NOT NULL,
  `gestas` int(2) unsigned DEFAULT NULL,
  `vivos` int(2) unsigned DEFAULT NULL,
  `abortos` int(2) unsigned DEFAULT NULL,
  `controlnro` int(2) unsigned NOT NULL,
  `cantidadecografias` int(2) unsigned NOT NULL,
  `toxoplasmosis` int(1) unsigned NOT NULL,
  `chagas` int(1) unsigned NOT NULL,
  `vdrl` int(1) unsigned NOT NULL,
  `hepatitis` int(1) unsigned NOT NULL,
  `hiv` int(1) unsigned NOT NULL,
  `emitediagnostico` int(1) unsigned NOT NULL,
  `diagnostico` text,
  `subdiagnostico` text,
  `observaciones` text,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` datetime DEFAULT NULL,
  `descargado` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provin`
--

CREATE TABLE IF NOT EXISTS `provin` (
  `codigo` int(2) NOT NULL DEFAULT '0',
  `nombre` char(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saludsexual`
--

CREATE TABLE IF NOT EXISTS `saludsexual` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `delcod` int(4) unsigned NOT NULL,
  `profesional` char(100) NOT NULL,
  `fechaatencion` date NOT NULL,
  `nrcuil` char(11) NOT NULL,
  `nrafil` int(7) unsigned NOT NULL,
  `codpar` int(2) unsigned NOT NULL,
  `nombre` char(60) NOT NULL,
  `ddntelefono` int(5) unsigned DEFAULT NULL,
  `nrotelefono` int(10) unsigned DEFAULT NULL,
  `edad` int(3) unsigned NOT NULL,
  `informacion` int(1) unsigned NOT NULL,
  `metodoanticonceptivo` int(1) unsigned NOT NULL,
  `preservativos` int(1) unsigned DEFAULT NULL,
  `diu` int(1) unsigned DEFAULT NULL,
  `anticonceptivos` int(1) unsigned DEFAULT NULL,
  `motivonoentrega` text,
  `emitediagnostico` int(1) unsigned NOT NULL,
  `diagnostico` text,
  `subdiagnostico` text,
  `observaciones` text,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechamodificacion` datetime DEFAULT NULL,
  `descargado` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocu`
--

CREATE TABLE IF NOT EXISTS `tipodocu` (
  `codigo` int(1) NOT NULL DEFAULT '0',
  `descri` char(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titular`
--

CREATE TABLE IF NOT EXISTS `titular` (
  `nrafil` int(7) NOT NULL DEFAULT '0',
  `fecing` date NOT NULL DEFAULT '0000-00-00',
  `nombre` char(30) NOT NULL DEFAULT '',
  `tipdoc` int(1) NOT NULL DEFAULT '0',
  `nrodoc` int(8) NOT NULL DEFAULT '0',
  `fecnac` date NOT NULL DEFAULT '0000-00-00',
  `ssexxo` char(1) NOT NULL DEFAULT '',
  `estciv` char(1) NOT NULL DEFAULT '',
  `nacion` int(3) NOT NULL DEFAULT '0',
  `domici` char(45) NOT NULL DEFAULT '',
  `locali` char(30) NOT NULL DEFAULT '',
  `provin` int(2) NOT NULL DEFAULT '0',
  `codpos` int(4) DEFAULT '0',
  `nrcuit` char(11) NOT NULL,
  `delcod` int(4) NOT NULL DEFAULT '0',
  `fecemp` date NOT NULL DEFAULT '0000-00-00',
  `catego` char(20) DEFAULT NULL,
  `fecemi` date DEFAULT '0000-00-00',
  `nrcuil` char(11) NOT NULL DEFAULT '',
  `tipafi` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`nrafil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nombre` char(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `emails` char(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `claves` char(8) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `fecuac` date DEFAULT NULL,
  `horuac` time DEFAULT NULL,
  `acceso` int(1) NOT NULL DEFAULT '0',
  `fechaactualizacion` date NOT NULL DEFAULT '2014-04-27',
  PRIMARY KEY (`delcod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
