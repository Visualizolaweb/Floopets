-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2016 a las 16:04:39
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `floopets`
--
CREATE DATABASE IF NOT EXISTS `floopets` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `floopets`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopcion`
--

CREATE TABLE `adopcion` (
  `ado_cod_adopcion` int(11) NOT NULL,
  `ani_cod_animal` int(11) NOT NULL,
  `usu_cod_usuario` int(11) NOT NULL,
  `ado_fecha` date NOT NULL,
  `ado_hora` time NOT NULL,
  `ado_imagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `ani_cod_animal` int(11) NOT NULL,
  `ra_cod_raza` int(11) NOT NULL,
  `ani_nombre` varchar(50) NOT NULL,
  `ani_esterilizado` tinyint(1) NOT NULL,
  `ani_edad` int(11) NOT NULL,
  `ani_descripcion` varchar(100) NOT NULL,
  `ani_numero_microchip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuidado`
--

CREATE TABLE `cuidado` (
  `cu_cod_cuidado` int(11) NOT NULL,
  `cu_nombre` varchar(50) NOT NULL,
  `cu_descripcion` varchar(50) NOT NULL,
  `galeria` longtext NOT NULL,
  `video` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE `denuncia` (
  `de_cod_denuncia` int(11) NOT NULL,
  `td_cod_tipo_denuncia` int(11) NOT NULL,
  `de_descripcion` varchar(50) NOT NULL,
  `de_contacto` varchar(100) NOT NULL,
  `de_telefono` varchar(10) NOT NULL,
  `de_nombre` varchar(100) DEFAULT NULL,
  `de_fecha` datetime NOT NULL,
  `de_imagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `denuncia`
--

INSERT INTO `denuncia` (`de_cod_denuncia`, `td_cod_tipo_denuncia`, `de_descripcion`, `de_contacto`, `de_telefono`, `de_nombre`, `de_fecha`, `de_imagen`) VALUES
(2, 1, 'le pega', 'yesid', '3769878', 'lolo', '2016-08-23 11:03:12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias_organizacion`
--

CREATE TABLE `denuncias_organizacion` (
  `de_cod_denuncia` int(11) NOT NULL,
  `org_cod_orgnizacion` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE `donacion` (
  `don_cod_donacion` int(11) NOT NULL,
  `td_cod_tipo_donacion` int(11) NOT NULL,
  `don_fecha` date NOT NULL,
  `don_descripcion` varchar(50) NOT NULL,
  `org_cod_organizacion` int(11) NOT NULL,
  `usu_cod_usuario` int(11) NOT NULL,
  `don_imagen` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `eve_cod_evento` int(11) NOT NULL,
  `te_cod_tipo_evento` int(11) NOT NULL,
  `eve_nombre` varchar(30) NOT NULL,
  `eve_direccion` varchar(30) NOT NULL,
  `eve_fecha` date NOT NULL,
  `eve_hora` time NOT NULL,
  `eve_descripcion` varchar(100) NOT NULL,
  `imagen` longtext NOT NULL,
  `geo_x` longtext NOT NULL,
  `geo_y` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_organizacion`
--

CREATE TABLE `evento_organizacion` (
  `eve_cod_evento` int(11) NOT NULL,
  `org_cod_organizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `cod_noticia` int(11) NOT NULL,
  `usu_cod_usuario` int(11) NOT NULL,
  `not_titulo` varchar(100) NOT NULL,
  `not_contenido` varchar(500) NOT NULL,
  `not_fecha_publicacion` date NOT NULL,
  `not_galeria` longtext NOT NULL,
  `not_portada` longtext NOT NULL,
  `not_palabras_clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE `organizacion` (
  `org_cod_organizacion` int(11) NOT NULL,
  `to_cod_tipo_organizacion` int(11) NOT NULL,
  `org_nombre` varchar(50) NOT NULL,
  `org_nit` int(11) NOT NULL,
  `org_email` varchar(50) NOT NULL,
  `org_telefono` varchar(30) NOT NULL,
  `org_direccion` varchar(30) NOT NULL,
  `org_clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`org_cod_organizacion`, `to_cod_tipo_organizacion`, `org_nombre`, `org_nit`, `org_email`, `org_telefono`, `org_direccion`, `org_clave`) VALUES
(1, 1, 'Los Yesid''s', 16516, 'dnvo@svv', '3216589', 'csvdvdv', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `cod_permiso` int(11) NOT NULL,
  `permiso_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE `permiso_rol` (
  `cod_permiso` int(11) NOT NULL,
  `cod_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `ra_cod_raza` int(11) NOT NULL,
  `ra_nombre` varchar(50) NOT NULL,
  `ta_cod_tipo_animal` int(11) NOT NULL,
  `ra_historia` varchar(1000) NOT NULL,
  `ra_imagen` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `cod_rol` int(11) NOT NULL,
  `rol_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`cod_rol`, `rol_nombre`) VALUES
(1, 'Usuario'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_animal`
--

CREATE TABLE `tipo_animal` (
  `ta_cod_tipo_animal` int(11) NOT NULL,
  `ta_nombre` varchar(50) NOT NULL,
  `cu_cod_cuidado` int(11) NOT NULL,
  `tamano` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_denuncia`
--

CREATE TABLE `tipo_denuncia` (
  `td_cod_tipo_denuncia` int(11) NOT NULL,
  `td_nombre` varchar(50) NOT NULL,
  `td_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_denuncia`
--

INSERT INTO `tipo_denuncia` (`td_cod_tipo_denuncia`, `td_nombre`, `td_estado`) VALUES
(1, 'Maltrato', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_donacion`
--

CREATE TABLE `tipo_donacion` (
  `td_cod_tipo_donacion` int(11) NOT NULL,
  `td_nombre` varchar(50) NOT NULL,
  `td_estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE `tipo_evento` (
  `te_cod_tipo_evento` int(11) NOT NULL,
  `te_nombre` varchar(50) NOT NULL,
  `te_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_organizacion`
--

CREATE TABLE `tipo_organizacion` (
  `to_cod_tipo_organizacion` int(11) NOT NULL,
  `to_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_organizacion`
--

INSERT INTO `tipo_organizacion` (`to_cod_tipo_organizacion`, `to_nombre`) VALUES
(1, 'Fundacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_cod_usuario` int(11) NOT NULL,
  `usu_nombre` varchar(50) NOT NULL,
  `usu_apellido` varchar(50) NOT NULL,
  `usu_telefono` varchar(20) NOT NULL,
  `usu_cedula` int(20) NOT NULL,
  `usu_email` varchar(50) NOT NULL,
  `cod_rol` int(11) NOT NULL,
  `usu_clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `vac_cod_vacuna` int(11) NOT NULL,
  `vac_nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna_animal`
--

CREATE TABLE `vacuna_animal` (
  `ani_cod_animal` int(11) NOT NULL,
  `vac_cod_vacuna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntarios`
--

CREATE TABLE `voluntarios` (
  `vo_cod_voluntario` int(11) NOT NULL,
  `vo_nombre` varchar(100) NOT NULL,
  `vo_telefono` int(11) NOT NULL,
  `vo_direccion` varchar(50) NOT NULL,
  `vo_imagen` longtext NOT NULL,
  `org_cod_organizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD PRIMARY KEY (`ado_cod_adopcion`),
  ADD KEY `ani_cod_animal` (`ani_cod_animal`,`usu_cod_usuario`),
  ADD KEY `usu_cod_usuario` (`usu_cod_usuario`);

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`ani_cod_animal`),
  ADD KEY `ra_cod_raza` (`ra_cod_raza`);

--
-- Indices de la tabla `cuidado`
--
ALTER TABLE `cuidado`
  ADD PRIMARY KEY (`cu_cod_cuidado`);

--
-- Indices de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`de_cod_denuncia`),
  ADD KEY `rd_cod_tipo_denuncia` (`td_cod_tipo_denuncia`);

--
-- Indices de la tabla `denuncias_organizacion`
--
ALTER TABLE `denuncias_organizacion`
  ADD PRIMARY KEY (`de_cod_denuncia`,`org_cod_orgnizacion`),
  ADD KEY `org_cod_orgnizacion` (`org_cod_orgnizacion`),
  ADD KEY `de_cod_denuncia` (`de_cod_denuncia`);

--
-- Indices de la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`don_cod_donacion`),
  ADD KEY `td_cod_tipo_donacion` (`td_cod_tipo_donacion`,`org_cod_organizacion`,`usu_cod_usuario`),
  ADD KEY `usu_cod_usuario` (`usu_cod_usuario`),
  ADD KEY `org_cod_organizacion` (`org_cod_organizacion`),
  ADD KEY `td_cod_tipo_donacion_2` (`td_cod_tipo_donacion`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`eve_cod_evento`),
  ADD KEY `te_cod_tipo_evento` (`te_cod_tipo_evento`);

--
-- Indices de la tabla `evento_organizacion`
--
ALTER TABLE `evento_organizacion`
  ADD PRIMARY KEY (`eve_cod_evento`,`org_cod_organizacion`),
  ADD KEY `eve_cod_evento` (`eve_cod_evento`),
  ADD KEY `org_cod_organizacion` (`org_cod_organizacion`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`cod_noticia`),
  ADD UNIQUE KEY `usu_cod_usuario` (`usu_cod_usuario`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD PRIMARY KEY (`org_cod_organizacion`),
  ADD KEY `to_cod_tipo_empresa` (`to_cod_tipo_organizacion`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`cod_permiso`);

--
-- Indices de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`cod_permiso`,`cod_rol`),
  ADD KEY `cod_permiso` (`cod_permiso`),
  ADD KEY `cod_rol` (`cod_rol`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`ra_cod_raza`),
  ADD KEY `ta_cod_tipo_animal` (`ta_cod_tipo_animal`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `tipo_animal`
--
ALTER TABLE `tipo_animal`
  ADD PRIMARY KEY (`ta_cod_tipo_animal`),
  ADD KEY `cu_cod_cuidado` (`cu_cod_cuidado`);

--
-- Indices de la tabla `tipo_denuncia`
--
ALTER TABLE `tipo_denuncia`
  ADD PRIMARY KEY (`td_cod_tipo_denuncia`);

--
-- Indices de la tabla `tipo_donacion`
--
ALTER TABLE `tipo_donacion`
  ADD PRIMARY KEY (`td_cod_tipo_donacion`);

--
-- Indices de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  ADD PRIMARY KEY (`te_cod_tipo_evento`);

--
-- Indices de la tabla `tipo_organizacion`
--
ALTER TABLE `tipo_organizacion`
  ADD PRIMARY KEY (`to_cod_tipo_organizacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_cod_usuario`),
  ADD KEY `cod_rol` (`cod_rol`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`vac_cod_vacuna`);

--
-- Indices de la tabla `vacuna_animal`
--
ALTER TABLE `vacuna_animal`
  ADD PRIMARY KEY (`ani_cod_animal`,`vac_cod_vacuna`),
  ADD KEY `ani_cod_animal` (`ani_cod_animal`),
  ADD KEY `vac_cod_vacuna` (`vac_cod_vacuna`);

--
-- Indices de la tabla `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD PRIMARY KEY (`vo_cod_voluntario`),
  ADD KEY `org_cod_organizacion` (`org_cod_organizacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  MODIFY `ado_cod_adopcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `ani_cod_animal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuidado`
--
ALTER TABLE `cuidado`
  MODIFY `cu_cod_cuidado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `de_cod_denuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `donacion`
--
ALTER TABLE `donacion`
  MODIFY `don_cod_donacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `eve_cod_evento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `cod_noticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  MODIFY `org_cod_organizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `cod_permiso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `ra_cod_raza` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `cod_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_animal`
--
ALTER TABLE `tipo_animal`
  MODIFY `ta_cod_tipo_animal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_denuncia`
--
ALTER TABLE `tipo_denuncia`
  MODIFY `td_cod_tipo_denuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_donacion`
--
ALTER TABLE `tipo_donacion`
  MODIFY `td_cod_tipo_donacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  MODIFY `te_cod_tipo_evento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_organizacion`
--
ALTER TABLE `tipo_organizacion`
  MODIFY `to_cod_tipo_organizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `vac_cod_vacuna` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD CONSTRAINT `adopcion_ibfk_2` FOREIGN KEY (`ani_cod_animal`) REFERENCES `animal` (`ani_cod_animal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `adopcion_ibfk_3` FOREIGN KEY (`usu_cod_usuario`) REFERENCES `usuario` (`usu_cod_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`ra_cod_raza`) REFERENCES `raza` (`ra_cod_raza`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `denuncia_ibfk_4` FOREIGN KEY (`td_cod_tipo_denuncia`) REFERENCES `tipo_denuncia` (`td_cod_tipo_denuncia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `denuncias_organizacion`
--
ALTER TABLE `denuncias_organizacion`
  ADD CONSTRAINT `denuncias_organizacion_ibfk_2` FOREIGN KEY (`de_cod_denuncia`) REFERENCES `denuncia` (`de_cod_denuncia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `denuncias_organizacion_ibfk_3` FOREIGN KEY (`org_cod_orgnizacion`) REFERENCES `organizacion` (`org_cod_organizacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD CONSTRAINT `donacion_ibfk_4` FOREIGN KEY (`td_cod_tipo_donacion`) REFERENCES `tipo_donacion` (`td_cod_tipo_donacion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donacion_ibfk_5` FOREIGN KEY (`org_cod_organizacion`) REFERENCES `organizacion` (`org_cod_organizacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`te_cod_tipo_evento`) REFERENCES `tipo_evento` (`te_cod_tipo_evento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento_organizacion`
--
ALTER TABLE `evento_organizacion`
  ADD CONSTRAINT `evento_organizacion_ibfk_2` FOREIGN KEY (`eve_cod_evento`) REFERENCES `evento` (`eve_cod_evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evento_organizacion_ibfk_3` FOREIGN KEY (`org_cod_organizacion`) REFERENCES `organizacion` (`org_cod_organizacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`usu_cod_usuario`) REFERENCES `usuario` (`usu_cod_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD CONSTRAINT `organizacion_ibfk_1` FOREIGN KEY (`to_cod_tipo_organizacion`) REFERENCES `tipo_organizacion` (`to_cod_tipo_organizacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `permiso_rol_ibfk_1` FOREIGN KEY (`cod_permiso`) REFERENCES `permiso` (`cod_permiso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_rol_ibfk_2` FOREIGN KEY (`cod_rol`) REFERENCES `rol` (`cod_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `raza_ibfk_1` FOREIGN KEY (`ta_cod_tipo_animal`) REFERENCES `tipo_animal` (`ta_cod_tipo_animal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_animal`
--
ALTER TABLE `tipo_animal`
  ADD CONSTRAINT `tipo_animal_ibfk_1` FOREIGN KEY (`cu_cod_cuidado`) REFERENCES `cuidado` (`cu_cod_cuidado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_rol`) REFERENCES `rol` (`cod_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vacuna_animal`
--
ALTER TABLE `vacuna_animal`
  ADD CONSTRAINT `vacuna_animal_ibfk_1` FOREIGN KEY (`vac_cod_vacuna`) REFERENCES `vacunas` (`vac_cod_vacuna`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vacuna_animal_ibfk_2` FOREIGN KEY (`ani_cod_animal`) REFERENCES `animal` (`ani_cod_animal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD CONSTRAINT `voluntarios_ibfk_1` FOREIGN KEY (`org_cod_organizacion`) REFERENCES `organizacion` (`org_cod_organizacion`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;