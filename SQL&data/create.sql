/*Relations of DBMS*/
/* DROP THE TABLES FIRST*/

DROP TABLE IF EXISTS Kid_Physical;
DROP TABLE IF EXISTS Meal_Nutrit;
DROP TABLE IF EXISTS Medical_History;
DROP TABLE IF EXISTS Disease;
DROP TABLE IF EXISTS Kid_basicINFO;
DROP TABLE IF EXISTS Nutritionist;
DROP TABLE IF EXISTS Teacher;
DROP TABLE IF EXISTS Class;
DROP TABLE IF EXISTS Parents;
DROP TABLE IF EXISTS Userdb;
DROP TABLE IF EXISTS Type;

/*CREATE TABLE */
create table Type(
	Type_ID int not null,
	Type_name varchar(50) not null,
	primary key (Type_ID)
);

create table Userdb(
	User_ID varchar(50) not null,
	User_name varchar(50) not null,
	Password varchar(50) not null,
	Type_ID int not null,
	primary key (User_ID),
	foreign key (Type_ID) references Type (Type_ID)
	on delete cascade on update cascade
);

create table Parents(
	P_ID varchar(50) not null,
	F_name varchar(50) not null,
	M_name varchar(50) not null,
	F_PN varchar(20) not null,
	M_PN varchar(20) not null,
	F_email varchar(50),
	M_email varchar(50),
	Addr varchar(50),
	primary key (P_ID),
	foreign key (P_ID) references Userdb (User_ID)
	on delete cascade on update cascade
);

create table Class(
	Class_ID varchar(50) not null,
	Start_TIME datetime,
	End_TIME datetime,
	primary key (Class_ID)
);

create table Teacher(
	T_ID varchar(50) not null,
	T_name varchar(50) not null,
	Gender varchar(20),
	Age int,
	T_email varchar(50),
	T_PN varchar(20),
	Class_ID varchar(20),
	primary key (T_ID),
	foreign key (T_ID) references Userdb (User_ID)
	on delete cascade on update cascade,
	foreign key (Class_ID) references Class (Class_ID)
	on delete cascade on update cascade
);

create table Nutritionist(
	N_ID varchar(50) not null,
	N_name varchar(50) not null,
	Gender varchar(20) not null,
	Office_Time varchar(50),
	Specialty varchar(50),
	N_email varchar(50),
	N_PN varchar(20),
	primary key (N_ID),
	foreign key (N_ID) references Userdb (User_ID)
	on delete cascade on update cascade
);

create table Kid_basicINFO (
	Kid_ID int not null,
	Kid_name varchar(20),
	Class_ID varchar(20),
	P_ID varchar(50),
	Gender varchar(20),
	Birth datetime,
	Enter_T datetime,
	Grad_T datetime,
	primary key (Kid_ID),
	foreign key (Class_ID) references Class (Class_ID)
	on delete cascade on update cascade,
	foreign key (P_ID) references Parents (P_ID)
	on delete cascade on update cascade
);

create table Kid_Physical(
	Kid_ID int not null,
	BIM float,
	Height float,
	Weight float,
	L_Vision float,
	R_Vision float,
	L_Audition float,
	R_Audition float,
	primary key (Kid_ID),
	foreign key (Kid_ID) references Kid_basicINFO (Kid_ID)
	on delete cascade on update cascade
);


create table Meal_Nutrit (
	Kid_ID int not null,
	Meal_Type varchar(50) not null,
	Meal_Date date not null,
	Veg int,
	Meat int,
	Grain int,
	Protein int,
	primary key (Kid_ID, Meal_Type, Meal_Date),
	foreign key (Kid_ID) references Kid_basicINFO (Kid_ID)
	on delete cascade on update cascade
);

create table Disease(
	Disease_Name varchar(50) not null,
	Description text,
	primary key (Disease_Name)
);

create table Medical_History (
	Kid_ID int not null,
	Disease_Name varchar(50),
	Med_Date datetime,
	Medicine_List text,
	primary Key (Kid_ID, Disease_Name),
	foreign key (Kid_ID) references Kid_basicINFO (Kid_ID)
	on delete cascade on update cascade,
	foreign key (Disease_Name) references Disease (Disease_Name)
	on delete cascade on update cascade
);










