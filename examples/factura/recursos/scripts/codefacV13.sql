/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     18/07/2016 22:34:24                          */
/*==============================================================*/


drop table if exists CLIENTE;

drop table if exists DETALLE;

drop table if exists FACTURA;

drop table if exists PRODUCTO;

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE
(
   CEDULA               varchar(12) not null,
   NOMBRE               varchar(64),
   TELEFONO             varchar(12),
   primary key (CEDULA)
);

/*==============================================================*/
/* Table: DETALLE                                               */
/*==============================================================*/
create table DETALLE
(
   ID_DETALLE           bigint not null,
   ID_FACTURA           bigint,
   CODIGO_PRODUCTO      varchar(16),
   CANTIDAD             int,
   primary key (ID_DETALLE)
);

/*==============================================================*/
/* Table: FACTURA                                               */
/*==============================================================*/
create table FACTURA
(
   ID_FACTURA           bigint not null,
   CEDULA               varchar(12),
   NUMERO_FACTURA       int,
   FECHA                datetime,
   primary key (ID_FACTURA)
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO
(
   CODIGO_PRODUCTO      varchar(16) not null,
   NOMBRE               varchar(64),
   PRECIO               decimal(8,2),
   primary key (CODIGO_PRODUCTO)
);

alter table DETALLE add constraint FK_REFERENCE_1 foreign key (ID_FACTURA)
      references FACTURA (ID_FACTURA) on delete restrict on update restrict;

alter table DETALLE add constraint FK_REFERENCE_2 foreign key (CODIGO_PRODUCTO)
      references PRODUCTO (CODIGO_PRODUCTO) on delete restrict on update restrict;

alter table FACTURA add constraint FK_REFERENCE_3 foreign key (CEDULA)
      references CLIENTE (CEDULA) on delete restrict on update restrict;

