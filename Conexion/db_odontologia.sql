-- Crear la base de datos
CREATE DATABASE db_odontologia;

-- Seleccionar la base de datos
USE db_odontologia;

-- Crear tabla para los servicios
CREATE TABLE servicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    costo DECIMAL(10, 2) NOT NULL
);

-- Crear tabla para la disponibilidad
CREATE TABLE disponibilidad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    servicio_id INT,
    FOREIGN KEY (servicio_id) REFERENCES servicios(id)
);

-- Crear tabla para las citas
CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    documento VARCHAR(20) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    servicio_id INT,
    FOREIGN KEY (servicio_id) REFERENCES servicios(id)
);

CREATE TABLE Registropacientes (
    id_Paciente  INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50)NOT NULL,
    fechanacimiento DATE NOT NULL,
    email VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    contrasenia VARCHAR(10)NOT NULL
);

CREATE TABLE Administrador (
  id_administrador INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) NOT NULL,
  contrasenia VARCHAR(10)NOT NULL
);

CREATE TABLE Usuario (
  id_Usuario INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) NOT NULL,
  contrasenia VARCHAR(10) NOT NULL
);
