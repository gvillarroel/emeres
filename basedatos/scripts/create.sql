drop table if exists TipoUsuario;
create table TipoUsuario (
	id int not null auto_increment,
	nombre varchar(100) not null,
	primary key (id)
);
insert into TipoUsuario (nombre) values ('Emeres');
insert into TipoUsuario (nombre) values ('Socio');

drop table if exists Usuario;
create table Usuario (
	id int not null auto_increment,
	nombre varchar(200) not null,
	clave varchar(32) not null,
	correoElectronico varchar(200) not null,
	idTipoUsuario int not null,
	primary key (id),
	foreign key (idTipoUsuario)
		references TipoUsuario(id)
		on delete cascade
);
insert into Usuario (nombre, clave, correoElectronico, idTipoUsuario)
values ('admin', md5('admin'), 'villarroel.gj@gmail.com', 1);


