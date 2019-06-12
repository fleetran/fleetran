create database fleetran;
use fleetran;
create table usuario(
email_user varchar(50)  PRIMARY KEY,
nombre_user varchar(30),
apellido_user varchar(30),
rut_user varchar(10),
empresa_user varchar(30),
password_user varchar(100)
);

create table licencias(
id_licencia int auto_increment primary key,
email_user varchar(50),
descripcion_licencia varchar(100),
inicio_licencia varchar(10),
diasrestantes_licencia int,
monto_licencia int,
foreign key usuario(email_user) references usuario(email_user)
);
-- Usuario: alvi@inacap.cl pass: 123456
-- Usuario: mati@inacap.cl pass: 123456
insert into usuario values('alvi@inacap.cl','alvaro','urzua','19359735-1','alvi corp','e10adc3949ba59abbe56e057f20f883e');
insert into usuario values('mati@inacap.cl','alvaro','urzua','19359735-1','mati corp','e10adc3949ba59abbe56e057f20f883e');
insert into licencias value(null,'alvi@inacap.cl','PLAN PRO - 30 DIAS','28-05-2019',30,100000);
