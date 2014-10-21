CREATE TABLE IF NOT EXISTS `consultas_medicas` (
  `id_consulta` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_consulta` date NOT NULL,
  `id_paciente` int(5) NOT NULL,
  `id_medico` int(5) NOT NULL,
  `consultorio` varchar(20) NOT NULL,
  `diagnostico` text NOT NULL,
  PRIMARY KEY (`id_consulta`),
  UNIQUE KEY `id_consulta` (`id_consulta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;


INSERT INTO `consultas_medicas` (`id_consulta`, `fecha_consulta`, `id_paciente`, `id_medico`, `consultorio`, `diagnostico`) VALUES
(1, '2010-04-14', 1, 3, 'B-05', 'DIARREA CRONICA'),
(2, '2010-05-11', 1, 1, 'A-09', 'REVISION MENSUAL'),
(3, '2010-06-17', 2, 2, 'B-06', 'dfsdf fgdfg'),
(4, '2010-07-18', 1, 3, 'D90', 'dfsdf fgdfg'),
(5, '2010-08-19', 1, 2, 'Z11', 'dfsdf fgdfg');


CREATE TABLE IF NOT EXISTS `medicos` (
  `id_medico` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) NOT NULL,
  `nombre_medico` varchar(200) NOT NULL,
  PRIMARY KEY (`id_medico`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


INSERT INTO `medicos` (`id_medico`, `cedula`, `nombre_medico`) VALUES
(1, 'DJ123456', 'Dr. Damesio John'),
(2, 'DD654123', 'Dr. Dianey Martinez'),
(3, 'QG5MX4567', 'Dr. John Cena');

CREATE TABLE IF NOT EXISTS `pacientes` (
  `id_paciente` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido_paterno` varchar(80) NOT NULL,
  `apellido_materno` varchar(80) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `domicilio` text NOT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


INSERT INTO `pacientes` (`id_paciente`, `clave`, `nombre`, `apellido_paterno`, `apellido_materno`, `sexo`, `domicilio`) VALUES
(1, 'JULL2010AB', 'Juan', 'Lopez', 'Lopez', 'M', 'av. del lago #240'),
(2, 'OLPP2010AB', 'Olivia', 'Perez', 'Perez', 'F', 'Av. las rosas sin numero.');
