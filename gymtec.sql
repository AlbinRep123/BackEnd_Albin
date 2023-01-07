drop database if exists gymtec;
 
create database gymtec;

use gymtec;

create table ejercicios(
    id_ejercicios int (8) not null primary key auto_increment, /*1=principiante, 2=intermedio y 3=avanzado*/
    parte_superior varchar (255)not null, /*tipos de ejercios segun el nivel en el que se encuentre (principiante, intermedio o avanzado)*/
    parte_media varchar (255)not null,
    parte_inferior varchar (255)not null
);

create table planAlimentacion(
    id_plan_alimentacion int (8) not null primary key auto_increment, /*1=principiante, 2=intermedio y 3=avanzado*/
    tipos_de_comidas_semana varchar (255)not null, /*carnes, verduras, frutas, etc.*/
    cantidad_de_comidas_semana varchar (255)not null /*cantidad de porciones recomendadas a la semana de carnes, verduras, frutas, etc.*/
);


create table planEntrenamiento(
    id_plan_entrenamiento int (8) not null primary key auto_increment, /*1=principiante, 2=intermedio y 3=avanzado*/
    tipo_de_complexion varchar (255) not null, /*Ectomorfo, endomorfo, mesomorfo*/
    horas_de_entrenamiento_semana int (8) not null, /*Cantidad de horas que desea entrenar a la semana*/
    id_ejerci int (8) not null,
    id_alimen int (8) not null,
    Foreign Key (id_ejerci) REFERENCES ejercicios(id_ejercicios),
    Foreign Key (id_alimen) REFERENCES planAlimentacion(id_plan_alimentacion)
);


create table usuarios(
    id_usuarios int (8) not null primary key auto_increment,
    nombres varchar(255) not null,
    apellido_paterno varchar (255) not null,
    apellido_materno varchar (255) not null,
    edad int (3) not null,
    sexo varchar (255) not null,
    imc int (6) not null, /*Indice de masa corporal*/
    id_entrenamiento int (8) not null,
    Foreign Key (id_entrenamiento) REFERENCES planEntrenamiento(id_plan_entrenamiento)
);

INSERT INTO ejercicios (parte_superior, parte_media, parte_inferior) VALUES ('20 Press banco plano','20 Abdominales completos','20 Sentadillas');
INSERT INTO ejercicios (parte_superior, parte_media, parte_inferior) VALUES ('20 Press Arnold','20 Ejercicios del tronco completo','20 Peso muerto');
INSERT INTO ejercicios (parte_superior, parte_media, parte_inferior) VALUES ('20 Pullover','1 minuto Plancha','20 Zancadas con rebote');


INSERT INTO planAlimentacion (tipos_de_comidas_semana, cantidad_de_comidas_semana) VALUES ('Pollo, Res, Pezcado, Verduras y Frutas', '150g de cada carne a la semana, 200g de Verduras a la semana y 2 Frutas a la semana');
INSERT INTO planAlimentacion (tipos_de_comidas_semana, cantidad_de_comidas_semana) VALUES ('Pollo, Res, Pezcado, Verduras y Frutas', '200g de cada carne a la semana, 250g de Verduras a la semana y 3 Frutas a la semana');
INSERT INTO planAlimentacion (tipos_de_comidas_semana, cantidad_de_comidas_semana) VALUES ('Pollo, Res, Pezcado, Verduras y Frutas', '300g de cada carne a la semana, 350g de Verduras a la semana y 4 Frutas a la semana');


INSERT INTO planEntrenamiento (tipo_de_complexion, horas_de_entrenamiento_semana, id_ejerci, id_alimen) VALUES ('Ectomorfo','5','1','1');
INSERT INTO planEntrenamiento (tipo_de_complexion, horas_de_entrenamiento_semana, id_ejerci, id_alimen) VALUES ('Endomorfo','5','1','1');
INSERT INTO planEntrenamiento (tipo_de_complexion, horas_de_entrenamiento_semana, id_ejerci, id_alimen) VALUES ('Mesomorfo','5','1','1');
INSERT INTO planEntrenamiento (tipo_de_complexion, horas_de_entrenamiento_semana, id_ejerci, id_alimen) VALUES ('Ectomorfo','7','2','2');
INSERT INTO planEntrenamiento (tipo_de_complexion, horas_de_entrenamiento_semana, id_ejerci, id_alimen) VALUES ('Endomorfo','7','2','2');
INSERT INTO planEntrenamiento (tipo_de_complexion, horas_de_entrenamiento_semana, id_ejerci, id_alimen) VALUES ('Mesomorfo','7','2','2');
INSERT INTO planEntrenamiento (tipo_de_complexion, horas_de_entrenamiento_semana, id_ejerci, id_alimen) VALUES ('Ectomorfo','10','3','3');
INSERT INTO planEntrenamiento (tipo_de_complexion, horas_de_entrenamiento_semana, id_ejerci, id_alimen) VALUES ('Endomorfo','10','3','3');
INSERT INTO planEntrenamiento (tipo_de_complexion, horas_de_entrenamiento_semana, id_ejerci, id_alimen) VALUES ('Mesomorfo','10','3','3');


INSERT INTO usuarios (nombres, apellido_paterno, apellido_materno, edad, sexo, imc, id_entrenamiento) VALUES ('Pedro', 'Lopez', 'Rodriguez', '20', 'Masculino', '19', '7');
INSERT INTO usuarios (nombres, apellido_paterno, apellido_materno, edad, sexo, imc, id_entrenamiento) VALUES ('Maria', 'Bellido', 'Rubio', '22', 'Femenino', '25', '2');
INSERT INTO usuarios (nombres, apellido_paterno, apellido_materno, edad, sexo, imc, id_entrenamiento) VALUES ('Beatriz', 'Ponce', 'Veiga', '19', 'Femenino', '20', '4');
INSERT INTO usuarios (nombres, apellido_paterno, apellido_materno, edad, sexo, imc, id_entrenamiento) VALUES ('Juan', 'Chacon', 'Barroso', '23', 'Masculino', '23', '8');
INSERT INTO usuarios (nombres, apellido_paterno, apellido_materno, edad, sexo, imc, id_entrenamiento) VALUES ('Ana', 'Parrado', 'Gonzales', '21', 'Femenino', '28', '1');
INSERT INTO usuarios (nombres, apellido_paterno, apellido_materno, edad, sexo, imc, id_entrenamiento) VALUES ('Manuel', 'Serna', 'Vidal', '19', 'Masculino', '18', '1');
INSERT INTO usuarios (nombres, apellido_paterno, apellido_materno, edad, sexo, imc, id_entrenamiento) VALUES ('Eduardo', 'Martin', 'Romero', '22', 'Masculino', '24', '6');

