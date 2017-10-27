create table Product (
	maker		char(20)	not null,
	model 		integer		not null,
	type		char(20)	not null,
	primary key (model)
);

create table PC (
	model		integer		not null,
	speed		integer		not null,
	ram		integer		not null,
	hd		number		not null,
	cd		char(20)	not null,
	price		integer		not null,
	primary key (model)
);

create table Laptop (
	model		integer		not null,
	speed		integer		not null,
	ram		integer		not null,
	hd		number		not null,
	screen		number		not null,
	price		integer		not null,
	primary key (model)
);

create table Printer (
	model		integer		not null,
	color		char(20)	not null,
	type		char(20)	not null,
	price		integer		not null,
	primary key (model)
);