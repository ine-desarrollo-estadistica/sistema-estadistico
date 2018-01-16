create table rrhh.institucion_consolidada
(
	id_institucion	int not null auto_increment,
	nombre 			varchar(300) not null,
	
	primary key 	(id_institucion)
);

create table rrhh.departamento
(
	id_departamento	int not null auto_increment,
	codigo 			varchar(100) not null,
	nombre 			varchar(300) not null,
	
	primary key 	(id_departamento)
);

create table rrhh.municipio
(
	id_municipio	int not null auto_increment,
	codigo 			varchar(100) not null,
	nombre 			varchar(300) not null,
	id_departamento	int not null,
	
	foreign key  	(id_departamento) references rrhh.departamento(id_departamento),
	primary key 	(id_municipio)
);

create table rrhh.institucion
(
	id_institucion	int not null auto_increment,
	codigo 			varchar(100) not null,
	nombre 			varchar(300) not null,
	direccion		varchar(300),
	zona			varchar(10),
	colonia			varchar(50),
	descripcion		varchar(300),

	primary key 	(id_institucion)
);

create table rrhh.ministerio
(
	id_ministerio	int not null auto_increment,
	codigo 			varchar(100),
	nombre 			varchar(300) not null,

	primary key 	(id_ministerio)	
);

create table rrhh.pais
(
	id_pais			int not null auto_increment,
	nombre			varchar(100) not null,
	codigo			varchar(10),
	
	primary key 	(id_pais)
);

create table rrhh.nacionalidad
(
	id_nacionalidad	int not null auto_increment,
	nombre			varchar(100) not null,
	codigo			varchar(10),
	
	primary key 	(id_nacionalidad)
);

create table rrhh.rol
(
	id_rol 			int not null auto_increment,
	nombre 			varchar(200) not null,
	descripcion		varchar(300),
	
	primary key 	(id_rol)
);

create table rrhh.persona
(
	id_persona				int  not null auto_increment,
	pnombre					varchar(100) not null,
	snombre					varchar(100),
	onombre					varchar(100),
	papellido				varchar(100) not null,
	sapellido				varchar(100),
	capellido				varchar(100),
	dpi						double not null,
	nit						varchar(15),
	codigo_empleado			varchar(15),
	edad					int,
	dia_nacimiento			int,
	mes_nacimiento			int,
	anio_nacimiento			int,
	id_pais_nacimiento 		int not null,
	id_municipio_nacimiento	int,
	id_nacionalidad 		int not null,
	foreign key  			(id_pais_nacimiento) 		references rrhh.pais(id_pais),
	foreign key  			(id_municipio_nacimiento)	references rrhh.municipio(id_municipio),
	foreign key  			(id_nacionalidad) 			references rrhh.nacionalidad(id_nacionalidad),
	
	primary key 			(id_persona)
);

create table rrhh.usuario
(
	id_usuario 			int not null auto_increment,
	usuario 			varchar(100) not null,
	hash_clave 			varchar(300) not  null,
	id_persona 			int not null,
	fecha_registro 		datetime not null,
	fecha_ult_acceso	datetime,
	estado 				bit not null default 1,
	foreign key  		(id_persona) references rrhh.persona(id_persona),
	
	primary key 		(id_usuario)
);

create table rrhh.rol_usuario
(
	id_rol 			int not null auto_increment,
	id_usuario		int not null,
	foreign key		(id_usuario) references rrhh.usuario(id_usuario),
	foreign key		(id_rol) references rrhh.rol(id_rol),
	
	primary key 	(id_rol, id_usuario)
);

create table rrhh.sesion
(
	id_sesion		int not null auto_increment,
	fecha_login		datetime not null,
	fecha_logout 	datetime,
	id_usuario 		int not null,
	foreign key  	(id_usuario) references rrhh.usuario(id_usuario),
	
	primary key 	(id_sesion)
);

create table rrhh.lugar_poblado
(
	id_lugar_poblado	int not null auto_increment,
	codigo 				varchar(100) not null,
	nombre 				varchar(300) ,
	nombre_boleta		varchar(300) not null,
	id_municipio 		int,
	foreign key  		(id_municipio) references rrhh.municipio(id_municipio),
	
	primary key 		(id_lugar_poblado)	
);

create table rrhh.boleta
(
	id_boleta			int  not null auto_increment,
	codigo				varchar(10),
	id_municipio		int,
	id_lugar_poblado	int,
	id_institucion		int,
	id_ministerio		int,
	foreign key  		(id_municipio) 		references rrhh.municipio(id_municipio),
	foreign key  		(id_lugar_poblado)	references rrhh.lugar_poblado(id_lugar_poblado),
	foreign key  		(id_institucion) 	references rrhh.institucion(id_institucion),
	foreign key  		(id_ministerio) 	references rrhh.ministerio(id_ministerio),
	primary key 		(id_boleta)	
);



create table rrhh.detalle_boleta
(
	id_detalle				int not null auto_increment,
	id_boleta				int,
	id_usuario_empadronador	int,
	fecha_entrevista		date,
	hora_inicio				int,
	hora_final				int,
	device_id				varchar(20),
	id_persona_encuestada	int,
	foreign key  			(id_usuario_empadronador) 	references rrhh.usuario(id_usuario),
	foreign key  			(id_persona_encuestada) 	references rrhh.persona(id_persona),
	primary key				(id_detalle)
);

create table rrhh.grupo
(
	id_grupo 		int not null auto_increment,
	codigo			int not null,
	id_departamento	int not null,
	foreign key  	(id_departamento) 	references rrhh.departamento(id_departamento),
	primary key		(id_grupo)
);

create table rrhh.asignacion_grupo
(
	id_asignacion_grupo	int not null auto_increment,
	id_grupo			int not null,
	id_usuario			int not null,
	foreign key  		(id_usuario) 	references rrhh.usuario(id_usuario),
	foreign key  		(id_grupo) 		references rrhh.grupo(id_grupo),
	primary key			(id_asignacion_grupo)
);