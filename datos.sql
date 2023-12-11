-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 05:22:48
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ruta_archivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `nombre`, `ruta_archivo`) VALUES
(1, 'antonio', 'pdfs/pdf_6576120501325.pdf'),
(2, 'pdf_657619eb64838.pdf', 'pdfs/pdf_657619eb64838.pdf'),
(3, 'pdf_65761af887d94.pdf', 'pdfs/pdf_65761af887d94.pdf'),
(4, 'pdf_65761afbcc2cd.pdf', 'pdfs/pdf_65761afbcc2cd.pdf'),
(5, 'pdf_65761b527a4d8.pdf', 'pdfs/pdf_65761b527a4d8.pdf'),
(6, 'pdf_65761c2ce6c1f.pdf', 'pdfs/pdf_65761c2ce6c1f.pdf'),
(7, 'pdf_65761d9933d1b.pdf', 'pdfs/pdf_65761d9933d1b.pdf'),
(8, 'pdf_65761ef39cf2b.pdf', 'pdfs/pdf_65761ef39cf2b.pdf'),
(9, 'pdf_657621dc002d1.pdf', 'pdfs/pdf_657621dc002d1.pdf'),
(10, 'pdf_6576270da0bb4.pdf', 'pdfs/pdf_6576270da0bb4.pdf'),
(11, 'pdf_6576283724fff.pdf', 'pdfs/pdf_6576283724fff.pdf'),
(12, 'pdf_657629835781f.pdf', 'pdfs/pdf_657629835781f.pdf'),
(13, 'pdf_65762aa03541b.pdf', 'pdfs/pdf_65762aa03541b.pdf'),
(14, 'pdf_65762b20ce2da.pdf', 'pdfs/pdf_65762b20ce2da.pdf'),
(15, 'pdf_65762be5edfe1.pdf', 'pdfs/pdf_65762be5edfe1.pdf'),
(16, 'pdf_65762e018e3bc.pdf', 'pdfs/pdf_65762e018e3bc.pdf'),
(17, 'pdf_6576302197865.pdf', 'pdfs/pdf_6576302197865.pdf'),
(18, 'pdf_65763a01a05a8.pdf', 'pdfs/pdf_65763a01a05a8.pdf'),
(19, 'pdf_65763c3a4767b.pdf', 'pdfs/pdf_65763c3a4767b.pdf'),
(20, 'pdf_657648c231fb1.pdf', 'pdfs/pdf_657648c231fb1.pdf'),
(21, 'pdf_65766da07d0c3.pdf', 'pdfs/pdf_65766da07d0c3.pdf'),
(22, 'pdf_6576790ee952c.pdf', 'pdfs/pdf_6576790ee952c.pdf'),
(23, 'pdf_6576851253123.pdf', 'pdfs/pdf_6576851253123.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(6, 'Laime', '12345678'),
(7, 'Sara', '12345678'),
(9, 'David', '12345678'),
(10, 'Alex', '12345678'),
(11, 'Laime', '12345678'),
(12, 'Limberd', '12345678'),
(13, 'Carrillo', '12345678'),
(15, 'Antonio', '12345678'),
(16, 'Miguel', '12345678'),
(17, 'Antonio', '123456789');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
