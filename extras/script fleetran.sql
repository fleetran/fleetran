create database fleetran;
use fleetran;

create table plan(
id_plan int auto_increment primary key,
actividad_plan varchar(100),
flota_plan varchar(100),
monto_plan int
);

create table usuario(
rut_user varchar(10)  PRIMARY KEY,
nombre_user varchar(30),
email_user varchar(50),
id_plan int,
password_user varchar(100),
foreign key plan(id_plan) references plan(id_plan)
);

create table licencias(
id_licencia int auto_increment primary key,
rut_user varchar(50),
inicio_licencia varchar(10),
monto_licencia int,
foreign key usuario(rut_user) references usuario(rut_user)
);
insert into licencias value(null,'19359735-1','14/06/2019','25000');
insert into plan value(null,"Camiones +2 ejes","1 a 5 vehiculos",27000);
insert into plan value(null,"Camiones +2 ejes","6 a 20 vehiculos",30000);
insert into plan value(null,"Camiones +2 ejes","21 a 100 vehiculos",36000);
insert into plan value(null,"Vehiculos de construccion","1 a 5 vehiculos",20250);
insert into plan value(null,"Vehiculos de construccion","6 a 20 vehiculos",22500);
insert into plan value(null,"Vehiculos de construccion","21 a 100 vehiculos",27000);
insert into plan value(null,"Maquiarias Agricolas","1 a 5 vehiculos",17550);
insert into plan value(null,"Maquiarias Agricolas","6 a 20 vehiculos",19500);
insert into plan value(null,"Maquiarias Agricolas","21 a 100 vehiculos",23400);
insert into plan value(null,"Furgones - Camiones 3/4","1 a 5 vehiculos",20250);
insert into plan value(null,"Furgones - Camiones 3/4","6 a 20 vehiculos",22500);
insert into plan value(null,"Furgones - Camiones 3/4","21 a 100 vehiculos",27000);
insert into plan value(null,"Taxis - Colectivos - Radiotaxis","1 a 5 vehiculos",20250);
insert into plan value(null,"Taxis - Colectivos - Radiotaxis","6 a 20 vehiculos",22500);
insert into plan value(null,"Taxis - Colectivos - Radiotaxis","21 a 100 vehiculos",27000);
insert into plan value(null,"Rent-a-car","1 a 5 vehiculos",20250);
insert into plan value(null,"Rent-a-car","6 a 20 vehiculos",22500);
insert into plan value(null,"Rent-a-car","21 a 100 vehiculos",27000);
insert into plan value(null,"Motos","1 a 5 vehiculos",10800);
insert into plan value(null,"Motos","6 a 20 vehiculos",12000);
insert into plan value(null,"Motos","21 a 100 vehiculos",14400);		
insert into usuario values('19359735-1','alvaro','alvi@inacap.cl',7,'e10adc3949ba59abbe56e057f20f883e');
insert into licencias value(null,'19359735-1','14/06/2019',100000);
insert into licencias value(null,'10827671-1','14/06/2019',100000);



CREATE TABLE `conductor` (
  `rut_conductor` varchar(12) NOT NULL,
  `nombre1_conductor` varchar(30) DEFAULT NULL,
  `nombre2_conductor` varchar(30) DEFAULT NULL,
  `apellido1_conductor` varchar(30) DEFAULT NULL,
  `apellido2_conductor` varchar(30) DEFAULT NULL,
  `direccion_conductor` varchar(50) DEFAULT NULL,
  `numero_conductor` varchar(10) DEFAULT NULL,
  `carnet1_conductor` varchar(50) DEFAULT NULL,
  `carnet2_conductor` varchar(50) DEFAULT NULL,
  `licencia1_conductor` varchar(50) DEFAULT NULL,
  `licencia2_conductor` varchar(50) DEFAULT NULL,
  `rut_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `vehiculo` (
  `patente_vehiculo` varchar(12) NOT NULL,
  `tipo_vehiculo` varchar(30) DEFAULT NULL,
  `marca_vehiculo` varchar(30) DEFAULT NULL,
  `modelo_vehiculo` varchar(30) DEFAULT NULL,
  `color_vehiculo` varchar(30) DEFAULT NULL,
  `año_vehiculo` varchar(50) DEFAULT NULL,
  `vin_vehiculo` varchar(10) DEFAULT NULL,
  `motor_vehiculo` varchar(50) DEFAULT NULL,
  `rut_conductor` varchar(12) DEFAULT NULL,
  `rut_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

select * from vehiculo;
select * from licencias;
select * from usuario;
select * from plan;
select rut_user,nombre_user,email_user,plan.actividad_plan,plan.flota_plan,password_user from usuario,plan where usuario.id_plan=plan.id_plan;
