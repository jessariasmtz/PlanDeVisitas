create schema Visitas;

use Visitas;

create table Empleados(
	ID int auto_increment,
    Nombre varchar(25) not null,
    Apellido varchar(25) not null,
    Email varchar(45) not null,
    Pass varchar(25) not null,
    
    constraint PK_Empleado primary key(ID)
);

create table Empresas(
	ID int auto_increment,
    Nombre varchar(128) not null unique,
    RUC varchar(24)  null unique,
    Tipo varchar(24) null,
    
    constraint PK_Empresa primary key(ID)
);

create table Sucursales(
	ID int auto_increment,
    AreaUbicacion varchar(32) null,
    Direccion varchar(255)  null,
    EmpresaID int not null,
    
    constraint PK_Sucursal primary key(ID),
     constraint FK_EmpresaSucursal foreign key(EmpresaID)
    references Empresas(ID)
);

create table EmpresaEmpleado(
	EmpresaID int not null,
    EmpleadoID int not null,
    
    constraint FK_Empresa foreign key(EmpresaID)
    references Empresas(ID),
    constraint FK_Empleado foreign key(EmpleadoID)
    references Empleados(ID),
    constraint PK_EmpresaEmpleado primary key(EmpresaID, EmpleadoID)
);

create table Contactos(
	ID int auto_increment,
    Nombre varchar(25) not null,
    Apellido varchar(25) not null,
    Email varchar(45) not null,
    EmpresaID int not null,
    
    constraint PK_Contacto primary key(ID),
    constraint FK_EmpresaContacto foreign key(EmpresaID)
    references Empresas(ID)
);

create table Telefonos(
    Telefono varchar(15) not null,
    ContactoID int not null,
    
    constraint PK_Telefono primary key(Telefono, ContactoID),
    constraint FK_Contacto foreign key(ContactoID)
    references Contactos(ID)
);

create table Visitas(
	ID int auto_increment,
    Fecha datetime not null,
    EmpresaID int not null,
    Objetivo varchar(32) not null,
    Comentarios varchar(255) null,
    Cotizacion varchar(255) null,
    Estado varchar(24) not null,
    ResponsableID int not null,
    
    constraint PK_Visitas primary key(ID),
    constraint FK_EmpresaVisita foreign key(EmpresaID)
    references Empresas(ID),
    constraint FK_ResponsableVisita foreign key(ResponsableID)
    references Empleados(ID)    
);





