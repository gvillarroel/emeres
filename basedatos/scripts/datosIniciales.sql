insert into TIPO_USUARIO (DESCRIPCION_TIPO_USUARIO)
values
('Emeres'),
('Socio'),
('Municipio'),
('Empresa');

insert into USUARIO (ID_TIPO_USUARIO, MAIL, NOMBRES_USUARIO, CLAVE, NICK) 
values 
(1, 'villarroel.gj@gmail.com', 'admin', md5('admin'), 'admin');
