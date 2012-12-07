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
	codigoActivacion varchar(20) null,
	correoElectronico varchar(200) not null,
	idTipoUsuario int not null,
	primary key (id),
	foreign key (idTipoUsuario)
		references TipoUsuario(id)
		on delete cascade
);
insert into Usuario (nombre, clave, correoElectronico, idTipoUsuario)
values ('admin', md5('admin'), 'villarroel.gj@gmail.com', 1);

drop table if exists Link;
create table Link (
	id int not null auto_increment,
	texto varchar(100) not null,
	link varchar(200),
	idTipoUsuario int not null,
	idLinkPadre int,
	orden	int not null,
	primary key (id),
	foreign key (idTipoUsuario)
		references TipoUsuario(id)
		on delete cascade,
	foreign key (idLinkPadre)
		references Link(id)
		on delete cascade
);
insert into Link (texto, link, idTipoUsuario, idLinkPadre, orden)
values ('Administrar', null, 1, null, 1);
insert into Link (texto, link, idTipoUsuario, idLinkPadre, orden)
values ('Usuario', 'usuario/buscar', 1, 1, 1);
insert into Link (texto, link, idTipoUsuario, idLinkPadre, orden)
values ('Compromiso', 'compromiso/buscar', 1, 1, 1);
insert into Link (texto, link, idTipoUsuario, idLinkPadre, orden)
values ('Proyecto', 'proyecto/buscar', 1, 1, 1);
insert into Link (texto, link, idTipoUsuario, idLinkPadre, orden)
values ('Foro', 'foro', 1, null, 1);

insert into Link (texto, link, idTipoUsuario, idLinkPadre, orden)
values ('Foro', 'foro', 1, null, 1);
insert into Link (texto, link, idTipoUsuario, idLinkPadre, orden)
values ('Ver compromisos', 'compromisos/ver', 1, null, 1);

