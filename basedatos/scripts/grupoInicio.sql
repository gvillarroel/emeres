drop table if exists LINK;
create table LINK (
	ID_LINK int not null auto_increment,
	TEXTO varchar(100) not null,
	LINK varchar(200),
	ID_TIPO_USUARIO int not null,
	ID_LINK_PADRE int,
	ORDEN	int not null,
	primary key (ID_LINK),
	foreign key (ID_TIPO_USUARIO)
		references TIPO_USUARIO(ID_TIPO_USUARIO)
		on delete cascade,
	foreign key (ID_LINK_PADRE)
		references LINK(ID_LINK)
		on delete cascade
);
insert into LINK (TEXTO, LINK, ID_TIPO_USUARIO, ID_LINK_PADRE, ORDEN)
values 
('Administrar', null, 1, null, 1),
('Usuario', 'usuario/buscar', 1, 1, 1),
('Compromiso', 'compromiso/buscar', 1, 1, 1),
('Proyecto', 'proyecto/buscar', 1, 1, 1),
('Foro', 'foro', 1, null, 1),

('Foro', 'foro', 2, null, 1),
('Ver compromisos', 'compromisos/ver', 2, null, 1);
