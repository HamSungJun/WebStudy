create table Product(
    maker char(20) Not NULL,
    model number(38) Not NULL,
    type char(20) Not NULL,
    primary key(model) 
);

create table PC(
    model  number(38) Not NULL,
    speed  number(38) Not NULL,
    ram  number(38) Not NULL,
    hd numeric(2,1) Not NULL,
    cd char(20) Not NULL,
    price  number(38) Not NULL,
    primary key(model) 
);

create table Laptop(
    model  number(38) Not NULL,
    speed  number(38) Not NULL,
    ram  number(38) Not NULL,
    hd numeric(3,2) Not NULL,
    screen numeric(3,1) Not NULL,
    price  number(38) Not NULL,
    primary key(model)
);

create table Printer(
    model  number(38) Not NULL,
    color char(20) Not NULL,
    type char(20) Not NULL,
    price  number(38) Not NULL,
    primary key(model) 
);

set space 1;
set wrap on;
set head on;
set pagesize 20;
set line 130;
