DROP PROCEDURE IF EXISTS RRHH.SP_INSERTAR_LUGAR_POBLADO;
DELIMITER $$
CREATE PROCEDURE RRHH.SP_INSERTAR_LUGAR_POBLADO () BEGIN

	-- Variables donde almacenar lo que nos traemos desde el SELECT
	DECLARE v_id_depto	INTEGER;
	DECLARE v_id_muni 	INTEGER;
	DECLARE v_nombre 	VARCHAR(300);
	DECLARE v_codigo 	VARCHAR(100);
	
	-- Variable para controlar el fin del bucle
	DECLARE fin 			INTEGER DEFAULT 0;
	DECLARE vExisteRegistro	INTEGER DEFAULT 0;

	-- El SELECT que vamos a ejecutar
	DECLARE	lugares CURSOR FOR
	SELECT		DISTINCT C.ID_MUNICIPIO, TRIM(A.LUGARPOBLADO) NOMBRE, TRIM(A.LUGPOB) CODIGO
	FROM 		RRHH.CSPROSTRUCTURE A
	INNER JOIN	RRHH.DEPARTAMENTO B ON B.CODIGO = TRIM(A.DEPARTAMENTO)
	INNER JOIN	RRHH.MUNICIPIO C ON C.CODIGO = TRIM(A.MUNICIPIO)
	AND 		B.ID_DEPARTAMENTO = C.ID_DEPARTAMENTO;

	-- Condición de salida
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = 1;

	OPEN lugares;
		get_runners: LOOP
			FETCH lugares INTO v_id_muni, v_nombre, v_codigo;

			IF fin = 1 THEN
				LEAVE get_runners;
			END IF;

			-- verificar que exista el registro
			SELECT	COUNT(1) INTO vExisteRegistro
			FROM	RRHH.LUGAR_POBLADO
			WHERE	ID_MUNICIPIO 			= v_id_muni
			AND 	UPPER(NOMBRE_BOLETA)	= UPPER(v_nombre)
			AND		CODIGO					= TRIM(v_codigo)
			COLLATE utf8_general_ci;
			
			IF (vExisteRegistro = 0) THEN
				-- insertar registro nuevo
				INSERT INTO RRHH.LUGAR_POBLADO (ID_MUNICIPIO, CODIGO, NOMBRE_BOLETA)
				VALUES (v_id_muni, v_codigo, v_nombre);
			END IF;

		END LOOP get_runners;
	CLOSE lugares;
END$$
DELIMITER ;


/***  ***/
DROP PROCEDURE IF EXISTS RRHH.SP_ACTUALIZAR_INSTITUCION;
DELIMITER $$
CREATE PROCEDURE RRHH.SP_ACTUALIZAR_INSTITUCION() BEGIN

	-- Variables donde almacenar lo que nos traemos desde el SELECT
	DECLARE v_id_depto	INTEGER;
	DECLARE v_id_muni 	INTEGER;
	DECLARE v_nombre 	VARCHAR(300);
	DECLARE v_codigo 	VARCHAR(100);
	
	-- Variable para controlar el fin del bucle
	DECLARE fin 			INTEGER DEFAULT 0;
	DECLARE vExisteRegistro	INTEGER DEFAULT 0;

	-- El SELECT que vamos a ejecutar
	DECLARE	lugares CURSOR FOR
	SELECT		DISTINCT C.ID_MUNICIPIO, TRIM(A.LUGARPOBLADO) NOMBRE, TRIM(A.LUGPOB) CODIGO
	FROM 		RRHH.CSPROSTRUCTURE A
	INNER JOIN	RRHH.DEPARTAMENTO B ON B.CODIGO = TRIM(A.DEPARTAMENTO)
	INNER JOIN	RRHH.MUNICIPIO C ON C.CODIGO = TRIM(A.MUNICIPIO)
	AND 		B.ID_DEPARTAMENTO = C.ID_DEPARTAMENTO;

	-- Condición de salida
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = 1;

	OPEN lugares;
		get_runners: LOOP
			FETCH lugares INTO v_id_muni, v_nombre, v_codigo;

			IF fin = 1 THEN
				LEAVE get_runners;
			END IF;

			-- verificar que exista el registro
			SELECT	COUNT(1) INTO vExisteRegistro
			FROM	RRHH.LUGAR_POBLADO
			WHERE	ID_MUNICIPIO 			= v_id_muni
			AND 	UPPER(NOMBRE_BOLETA)	= UPPER(v_nombre)
			AND		CODIGO					= TRIM(v_codigo)
			COLLATE utf8_general_ci;
			
			IF (vExisteRegistro = 0) THEN
				-- insertar registro nuevo
				INSERT INTO RRHH.LUGAR_POBLADO (ID_MUNICIPIO, CODIGO, NOMBRE_BOLETA)
				VALUES (v_id_muni, v_codigo, v_nombre);
			END IF;

		END LOOP get_runners;
	CLOSE lugares;
END$$
DELIMITER ;