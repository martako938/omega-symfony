CREATE DATABASE IF NOT EXISTS omegaV1;
USE omegaV1;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE areas(
  id                int(255) auto_increment not null,
  nombre            varchar(100) NOT NULL,
  descripcion       mediumtext,
  CONSTRAINT pk_areas PRIMARY KEY(id)
)ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Técnica', NULL),
(2, 'Administrativa', NULL),
(3, 'Gerencia', NULL),
(4, 'Sistemas', NULL),
(5, 'Contabilidad', NULL),
(6, 'Facturación', NULL),
(7, 'Desarrollo Organizacional', NULL),
(8, 'Nóminas', NULL),
(9, 'Tesorería', NULL),
(10, 'Operaciones', NULL),
(11, 'Comercial', NULL),
(12, 'Crédito y Cobranza', NULL),
(13, 'Logística e Inventarios', NULL),
(14, 'Dirección', NULL),
(15, 'Auditoría', NULL);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE puestos(
  id                int(255) auto_increment not null,
  area_id           int(255) NOT NULL,
  nombre            varchar(100) NOT NULL,
  descripcion       mediumtext,
  CONSTRAINT pk_puestos PRIMARY KEY(id),
  CONSTRAINT fk_puesto_area FOREIGN KEY(area_id) REFERENCES areas(id)
)ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`id`, `area_id`, `nombre`, `descripcion`) VALUES
(1, 1, 'Técnico', NULL),
(2, 2, 'Asistente Administrativo', NULL),
(3, 2, 'Becario', NULL),
(4, 3, 'Gerente Sucursal', NULL),
(5, 3, 'Gerente Administrativo', NULL),
(6, 4, 'Gerente Sistemas', NULL),
(7, 4, 'Soporte Técnico', NULL),
(8, 4, 'Desarrollo Software', NULL),
(9, 5, 'Gerente Contabilidad', NULL),
(10, 5, 'Contador', NULL),
(11, 5, 'Contador Junior', NULL),
(12, 5, 'Auxiliar Contable', NULL),
(13, 6, 'Gerente Facturación', NULL),
(14, 6, 'Analista Facturación', NULL),
(15, 7, 'Gerente DO', NULL),
(16, 7, 'Jefe DO', NULL),
(17, 7, 'Asistente DO', NULL),
(18, 7, 'Comunicación', NULL),
(19, 7, 'Reclutamiento y Selección', NULL),
(20, 8, 'Jefe Nóminas', NULL),
(21, 8, 'Asistente Nóminas', NULL),
(22, 9, 'Gerente Tesorería', NULL),
(23, 9, 'Asistente Tesorería', NULL),
(24, 10, 'Gerente Operaciones', NULL),
(25, 10, 'Cordinador Regional', NULL),
(26, 10, 'Asesor de Ventas', NULL),
(27, 10, 'Capacitación Auditoría', NULL),
(28, 11, 'Gerente Comercial', NULL),
(29, 11, 'Comercial Ventas Redes', NULL),
(30, 11, 'Mercadólogo', NULL),
(31, 11, 'Supervisora Comercial', NULL),
(32, 11, 'Encargado de proyecto', NULL),
(33, 11, 'Asesor Técnico Comercial', NULL),
(34, 12, 'Gerente Crédito y Cobranza', NULL),
(35, 12, 'Cobranza Extrajudicial Jurídico', NULL),
(36, 12, 'Encargada de cobranza', NULL),
(37, 12, 'Jurídico', NULL),
(38, 12, 'Asistente Crédito y Cobranza', NULL),
(39, 12, 'Control Interno', NULL),
(40, 13, 'Gerente Logística Inventarios', NULL),
(41, 13, 'Supervisor Inventarios', NULL),
(42, 13, 'Auxiliar Logística', NULL),
(43, 13, 'Almacenista', NULL),
(44, 13, 'Asistente Almacenista', NULL),
(45, 14, 'Director General', NULL),
(46, 14, 'Administrador Flotilla', NULL),
(47, 14, 'Asistente Dirección', NULL);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `checadores`
--

CREATE TABLE checadores(
  id                int(255) auto_increment not null,
  nombre            varchar(100) NOT NULL,
  serietag          varchar(255) NOT NULL,
  factura           varchar(255),
  cotizacion        varchar(255),
  descripcion       mediumtext,
  CONSTRAINT pk_checadores PRIMARY KEY(id)
)ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `checadores`
--

INSERT INTO `checadores` (`id`, `nombre`, `serietag`, `factura`, `cotizacion`, `descripcion`) VALUES
(1, 'Corporativo', 'A32Y180460079', '',  '', NULL),
(2, 'Aguascalientes', 'A32Y180460348', '', '', NULL),
(3, 'Cancún', 'A32Y180460266', '',  '', NULL),
(4, 'Coatzacoalcos', 'A32Y180460196', '', '', NULL),
(5, 'Cuernavaca', 'A32Y180460018', '', '', NULL),
(6, 'Culiacán', 'A32Y180460054', '', '', NULL),
(7, 'Guadalajara', 'A32Y180460300', '', '', NULL),
(8, 'La Paz', 'A32Y180460063', '', '', NULL),
(9, 'Los Cabos', 'A32Y180460051', '', '', NULL),
(10, 'Mazatlán', 'A32Y180460247', '', '', NULL),
(11, 'Mérida', 'A32Y180460009', '', '', NULL),
(12, 'México', 'A32Y180460342', '', '', NULL),
(13, 'Monterrey', 'A32Y180460012', '', '', NULL),
(14, 'Puerto Vallarta', 'A32Y180460177', '', '', NULL),
(15, 'Puebla', 'A32Y180460137', '', '', NULL),
(16, 'Querétaro', 'A32Y180460296', '', '', NULL),
(17, 'Tijuana', 'A32Y180460328', '', '', NULL),
(18, 'Tlaquepaque', 'A32Y180460272', '', '', NULL),
(19, 'Toluca', 'A32Y180460234', '', '', NULL),
(20, 'Tuxtla', 'A32Y180460276', '', '', NULL);


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE sucursales(
  id                int(255) auto_increment not null,
  checador_id       int(255) NOT NULL,
  nombre            varchar(100) NOT NULL,
  abreviatura       varchar(255) DEFAULT NULL,
  descripcion       mediumtext,
  CONSTRAINT pk_sucursales PRIMARY KEY(id),
  CONSTRAINT fk_sucursal_checador FOREIGN KEY(checador_id) REFERENCES checadores(id)
)ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `checador_id`, `nombre`, `abreviatura`, `descripcion`) VALUES
(1, 1, 'Corporativo', 'COR', 'Rousseau 14-Piso 1, Anzures, Miguel Hidalgo, 11590 Ciudad de México, CDMX'),
(2, 2, 'Aguascalientes', 'AGS', NULL),
(3, 3, 'Cancún', 'CNC', NULL),
(4, 4, 'Coatzacoalcos', 'COA', NULL),
(5, 5, 'Cuernavaca', 'CVA', NULL),
(6, 6, 'Culiacán', 'CUL', NULL),
(7, 7, 'Guadalajara', 'GDL', NULL),
(8, 8, 'La Paz', 'PAZ', NULL),
(9, 9, 'Los Cabos', 'CAB', NULL),
(10, 10, 'Mazatlán ', 'MAZ', NULL),
(11, 11, 'Mérida', 'MER', NULL),
(12, 12, 'México', 'MEX', NULL),
(13, 13, 'Monterrey', 'MTY', NULL),
(14, 14, 'Puerto Vallarta', 'PVT', NULL),
(15, 15, 'Puebla', 'PUE', NULL),
(16, 16, 'Querétaro', 'QRO', NULL),
(17, 17, 'Tijuana', 'TIJ', NULL),
(18, 18, 'Tlaquepaque', 'TLQ', NULL),
(19, 19, 'Toluca', 'TOL', NULL),
(20, 20, 'Tuxtla', 'TUX', NULL);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE empleados(
  id                int(255) auto_increment not null,
  puesto_id         int(255) NOT NULL,
  sucursal_id       int(255) NOT NULL,
  nombre            varchar(100) NOT NULL,
  numero_Checador   int(255),
  descripcion       mediumtext,
  CONSTRAINT pk_empleados PRIMARY KEY(id),
  CONSTRAINT fk_empleado_puesto FOREIGN KEY(puesto_id) REFERENCES puestos(id),
  CONSTRAINT fk_empleado_sucursal FOREIGN KEY(sucursal_id) REFERENCES sucursales(id)
)ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE facturas(
  id                int(255) auto_increment not null,
  folio             varchar(100) NOT NULL,
  fecha             varchar(100) NOT NULL,
  proveedor         varchar(100),
  descripcion       mediumtext,
  CONSTRAINT pk_facturas PRIMARY KEY(id)
)ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE equipos(
  id                int(255) auto_increment not null,
  empleado_id       int(255) NOT NULL,
  factura_id        int(255),
  serietag          varchar(100)NOT NULL,
  modelo            varchar(100),
  marca             varchar(100),
  descripcion       mediumtext,
  CONSTRAINT pk_equipos PRIMARY KEY(id),
  CONSTRAINT fk_equipo_empleado FOREIGN KEY(empleado_id) REFERENCES empleados(id),
  CONSTRAINT fk_equipo_factura FOREIGN KEY(factura_id) REFERENCES facturas(id)
)ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `pcs`
--

CREATE TABLE pcs(
  id              int(255) auto_increment not null,
  equipo_id       int(255) NOT NULL,
  tipo            varchar(100),
  sistema         varchar(100),
  office          varchar(100),
  procesador      varchar(100),
  disco           varchar(100),
  descripcion     mediumtext,
  CONSTRAINT pk_pcs PRIMARY KEY(id),
  CONSTRAINT fk_pc_equipo FOREIGN KEY(equipo_id) REFERENCES equipos(id)
)ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `impresoras`
--

CREATE TABLE impresoras(
  id              int(255) auto_increment not null,
  equipo_id       int(255) NOT NULL,
  tipo            varchar(100),
  descripcion     mediumtext,
  CONSTRAINT pk_impresoras PRIMARY KEY(id),
  CONSTRAINT fk_impresora_equipo FOREIGN KEY(equipo_id) REFERENCES equipos(id)
)ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `responsivas`
--

CREATE TABLE responsivas(
  id              int(255) auto_increment not null,
  equipo_id       int(255) NOT NULL,
  folio           varchar(100),
  fecha           varchar(100),
  descripcion     mediumtext,
  CONSTRAINT pk_responsivas PRIMARY KEY(id),
  CONSTRAINT fk_responsiva_equipo FOREIGN KEY(equipo_id) REFERENCES equipos(id)
) ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE usuarios(
  id              int(255) auto_increment not null,
  empleado_id     int(255) NOT NULL,
  nombre          varchar(100),
  email           varchar(100),
  password        varchar(100),
  img             varchar(100),
  rol             varchar(100),
  google          bit,
  CONSTRAINT pk_usuarios PRIMARY KEY(id),
  CONSTRAINT fk_usuario_empleado FOREIGN KEY(empleado_id) REFERENCES empleados(id)
) ENGINE=InnoDB;

