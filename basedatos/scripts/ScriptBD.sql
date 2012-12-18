/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     14-12-2012 21:58:15                          */
/*==============================================================*/


drop table if exists ACTIVIDAD;

drop table if exists COMPROMISO;

drop table if exists DOC_PLAN;

drop table if exists INICIATIVA;

drop table if exists OBJETIVO;

drop table if exists PERSPECTIVA;

drop table if exists PLAN_ESTRATEGICO;

drop table if exists PROYECTO;

drop table if exists TIPO_USUARIO;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: ACTIVIDAD                                             */
/*==============================================================*/
create table ACTIVIDAD
(
   ID_PROYECTO          int not null auto_increment,
   CORREL_NOVEDAD       int not null,
   NOMBRE_ACTIVIDAD     char(200),
   DESCRIPCION_ACTIVIDAD varchar(500),
   FECHA_INICIO_ACTIVIDAD date,
   FECHA_TERMINO_ACTIVIDAD date,
   ESTADO_ACTIVIDAD     int,
   primary key (ID_PROYECTO, CORREL_NOVEDAD)
);

/*==============================================================*/
/* Table: COMPROMISO                                            */
/*==============================================================*/
create table COMPROMISO
(
   ID_COMPROMISO        int not null auto_increment,
   CORREL_INICIA        int,
   ID_USUARIO           int,
   NOMBRE_COMPROMISO    text,
   ESTADO_COMPROMISO    int,
   DESCRIPCION_COMPROMISO varchar(1000),
   FECHA_INICIO_COMPROMISO date,
   FECHA_FIN_COMPROMISO date,
   primary key (ID_COMPROMISO)
);

/*==============================================================*/
/* Table: DOC_PLAN                                              */
/*==============================================================*/
create table DOC_PLAN
(
   ID_DOC_PLAN          int not null auto_increment,
   ID_PLAN              int,
   FECHA_DOC_PLAN       date,
   DESCRIPCION_DOC_PLAN varchar(300),
   URL_DOC_PLAN         varchar(300),
   primary key (ID_DOC_PLAN)
);

/*==============================================================*/
/* Table: INICIATIVA                                            */
/*==============================================================*/
create table INICIATIVA
(
   CORREL_INICIA        int not null auto_increment,
   CORREL_OBJ           int not null,
   ID_USUARIO           int,
   DESCRIPCION_INICIA   text,
   INDICADOR            text,
   META                 text,
   F_INIT_INICIA        date,
   F_END_INICIA         date,
   VALORIZACION_INICIA  text,
   primary key (CORREL_INICIA)
);

/*==============================================================*/
/* Table: OBJETIVO                                              */
/*==============================================================*/
create table OBJETIVO
(
   CORREL_OBJ           int not null auto_increment,
   ID_PERSP             int not null,
   DESCRIPCION          text,
   primary key (CORREL_OBJ)
);

/*==============================================================*/
/* Table: PERSPECTIVA                                           */
/*==============================================================*/
create table PERSPECTIVA
(
   ID_PERSP             int not null auto_increment,
   ID_PLAN              int,
   NOMBRE_PERSP         varchar(100),
   primary key (ID_PERSP)
);

/*==============================================================*/
/* Table: PLAN_ESTRATEGICO                                      */
/*==============================================================*/
create table PLAN_ESTRATEGICO
(
   ID_PLAN              int not null auto_increment,
   NOMBRE_PLAN          date,
   primary key (ID_PLAN)
);

/*==============================================================*/
/* Table: PROYECTO                                              */
/*==============================================================*/
create table PROYECTO
(
   ID_PROYECTO          int not null auto_increment,
   ID_PLAN              int,
   ID_USUARIO           int,
   DESCRIPCION_PROYECTO varchar(1000),
   NOMBRE_PROYECTO      varchar(100),
   FECHA_INICIO_PROYECTO date,
   FECHA_TERMINO_PROYECTO date,
   primary key (ID_PROYECTO)
);

/*==============================================================*/
/* Table: TIPO_USUARIO                                          */
/*==============================================================*/
create table TIPO_USUARIO
(
   ID_TIPO_USUARIO      int not null auto_increment,
   DESCRIPCION_TIPO_USUARIO varchar(200),
   primary key (ID_TIPO_USUARIO)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   ID_USUARIO           int not null auto_increment,
   ID_TIPO_USUARIO		int not null,
   CODIGO_ACTIVACION	varchar(32),
   MAIL                 text not null,
   NOMBRES_USUARIO      text,
   APELLIDOS_USUARIO    text,
   CLAVE                varchar(32),
   FONO                 text,
   PERTENENCIA          varchar(300),
   NICK                 varchar(20) not null,
   primary key (ID_USUARIO)
);

alter table ACTIVIDAD add constraint FK_RELATIONSHIP_10 foreign key (ID_PROYECTO)
      references PROYECTO (ID_PROYECTO) on delete restrict on update restrict;

alter table COMPROMISO add constraint FK_CREA foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table COMPROMISO add constraint FK_RELATIONSHIP_3 foreign key (CORREL_INICIA)
      references INICIATIVA (CORREL_INICIA) on delete restrict on update restrict;

alter table DOC_PLAN add constraint FK_RELATIONSHIP_15 foreign key (ID_PLAN)
      references PLAN_ESTRATEGICO (ID_PLAN) on delete restrict on update restrict;

alter table INICIATIVA add constraint FK_RELATIONSHIP_2 foreign key (CORREL_OBJ)
      references OBJETIVO (CORREL_OBJ) on delete restrict on update restrict;

alter table INICIATIVA add constraint FK_RELATIONSHIP_20 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table OBJETIVO add constraint FK_RELATIONSHIP_1 foreign key (ID_PERSP)
      references PERSPECTIVA (ID_PERSP) on delete restrict on update restrict;

alter table PERSPECTIVA add constraint FK_RELATIONSHIP_11 foreign key (ID_PLAN)
      references PLAN_ESTRATEGICO (ID_PLAN) on delete restrict on update restrict;

alter table PROYECTO add constraint FK_RELATIONSHIP_12 foreign key (ID_PLAN)
      references PLAN_ESTRATEGICO (ID_PLAN) on delete restrict on update restrict;

alter table PROYECTO add constraint FK_RELATIONSHIP_14 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table USUARIO add constraint FK_RELATIONSHIP_13 foreign key (ID_TIPO_USUARIO)
      references TIPO_USUARIO (ID_TIPO_USUARIO) on delete restrict on update restrict;

