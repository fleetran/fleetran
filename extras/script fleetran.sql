create database fleetran;
use fleetran;
create table plan(
id_plan int auto_increment primary key,
actividad_plan varchar(100),
flota_plan varchar(100),
monto_plan int
);

use fleetran_log;
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
insert into licencias value(null,'19359735-1','14/06/2019','25000');
insert into licencias value(null,'12345678-9','14/06/2019','25000');
create table conductor(
rut_conductor varchar(12) primary key,
nombre1_conductor varchar(30),
nombre2_conductor varchar(30),
apellido1_conductor varchar(30),
apellido2_conductor varchar(30),
direccion_conductor varchar(50),
numero_conductor varchar(10),
carnet1_conductor varchar(50),
carnet2_conductor varchar(50),
licencia1_conductor varchar(50),
licencia2_conductor varchar(50),
rut_user varchar(10)
);

create table vehiculo(
patente_vehiculo varchar(12) primary key,
tipo_vehiculo varchar(30),
marca_vehiculo varchar(30),
modelo_vehiculo varchar(30),
color_vehiculo varchar(30),
año_vehiculo varchar(50),
vin_vehiculo varchar(10),
motor_vehiculo varchar(50),
rut_conductor varchar(12),
rut_user varchar(10)
);

select * from vehiculo;
select * from conductor;
select * from licencias;
select * from usuario;
select * from plan;
select rut_user,nombre_user,email_user,plan.actividad_plan,plan.flota_plan,password_user from usuario,plan where usuario.id_plan=plan.id_plan;

create table entrega(
id_entrega int auto_increment primary key,
patente_vehiculo varchar(12),
rut_conductor varchar(12),
fecha_entrega varchar(10),
monto_entrega int,
rut_user varchar(10)
);
select * from conductor;

select * from vehiculo;
insert into vehiculo values('AABB11','5','Nissan','V16','Negro','2010','aaa1111','bbb2222','10333444-4','19359735-1');
select * from entrega;
insert into entrega values(null,'AABB11','10333444-4','16/06/2019','50000','19359735-1');
-- entrega
select * from entrega;

select id_entrega,patente_vehiculo,conductor.rut_conductor,conductor.nombre1_conductor,conductor.apellido1_conductor,entrega.monto_entrega from entrega,conductor where entrega.rut_conductor=conductor.rut_conductor and entrega.rut_user='19359735-1';
select vehiculo.patente_vehiculo as 'Patente', concat(marca_vehiculo," ",modelo_vehiculo) as Vehiculo, conductor.rut_conductor as 'Rut conductor', concat(conductor.nombre1_conductor," ",conductor.nombre2_conductor) as 'Nombre conductor', concat(conductor.apellido1_conductor," ",conductor.apellido2_conductor) as 'Apellido conductor' from vehiculo, conductor where vehiculo.rut_conductor=conductor.rut_conductor and vehiculo.rut_user='19359735-1';
select * from vehiculo where rut_user='19359735-1' and rut_conductor='';
select * from conductor where estado=0 and rut_user='19359735-1';
select * from conductor;
select patente_vehiculo,tipo_vehiculo,marca_vehiculo,modelo_vehiculo,color_vehiculo,ano_vehiculo,vin_vehiculo,motor_vehiculo,vehiculo.rut_conductor,vehiculo.rut_user from vehiculo,conductor where vehiculo.rut_user='19359735-1' and vehiculo.rut_conductor=conductor.rut_conductor ;
select * from vehiculo where vehiculo.rut_user='19359735-1';
select conductor.rut_conductor,conductor.nombre1_conductor,conductor.apellido1_conductor from conductor,vehiculo where vehiculo.rut_conductor=conductor.rut_conductor and vehiculo.rut_user='$user' and vehiculo.patente_vehiculo='$pat';

select id_entrega,entrega.patente_vehiculo,concat(vehiculo.marca_vehiculo," ",modelo_vehiculo) as vehiculo,conductor.rut_conductor,concat(conductor.nombre1_conductor," ",conductor.nombre2_conductor," ",conductor.apellido1_conductor," ",conductor.apellido2_conductor) as nombre,fecha_entrega,entrega.monto_entrega from entrega,conductor,vehiculo where entrega.rut_conductor=conductor.rut_conductor and entrega.rut_user='19359735-1' and entrega.patente_vehiculo=vehiculo.patente_vehiculo;

select * from vehiculo;

update vehiculo set rut_conductor = "" where patente_vehiculo="BGYG96";
insert into entrega values (null,363692,1231231,'2015-01-01',100000,'19359735-1');
select * from entrega;


INSERT INTO entrega(`fecha_entrega`) VALUES(  STR_TO_DATE( '01-09-1986', '%d-%m-%Y' ) );
SELECT SUM(monto_entrega) AS total FROM entrega WHERE MONTH(fecha_entrega) = 6 AND rut_user='19359735-1' AND YEAR(fecha_entrega) = 2019 LIMIT 1 

select * from entrega;
select min(year(fecha_entrega)) from entrega where rut_user="19359735-1";
select max(year(fecha_entrega)) from entrega;
select * from usuario;
select * from licencias;
insert into licencias values(null,'10101010-0','14/06/2019',25000);
insert into entrega values(null,'AABB11','87654321-0','2019-01-01','30000','19359735-1');
insert into ingreso values (null,'','','','','1');
