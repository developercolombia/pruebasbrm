

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- Base de datos: `contactos`
-- Estructura de tabla para la tabla `contactos`

CREATE TABLE "contactos" (
  'id' int(11) ,
  'name' varchar(30) NOT NULL,
  'phone' varchar(30) NOT NULL UNIQUE,
 'date' date NOT NULL,
  'address' varchar(25) NOT NULL,
  'email' varchar(20) DEFAULT NULL,
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- llenado inicial o "Facade" para la tabla `contactos`

INSERT INTO "contactos" ('id','name','phone','date','address','email'
) VALUES
(1,'walter carrillo','3204213823','2022/07/14','waltercarrillo.c18@hotmail.com'),
(2,'BRM','111111111','2022/07/14','BRM@hotmail.com'),

-- Indices de la tabla `contactos`
ALTER TABLE "contactos"
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de la tabla `contactos`

ALTER TABLE "contactos"
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
