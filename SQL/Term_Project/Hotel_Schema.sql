create table customer(
    name varchar2(20) Not Null unique,
    gender varchar2(10) Not Null,
    address varchar2(20) Not Null,
    Phone_call number(5) Not Null,
    constraint PK_customer primary key (name , Phone_call)
);
create table room(
    room_num number(3) primary key Not Null,
    capacity number(1) Not Null,
    room_type varchar2(20) Not Null
    
    
);
create table staff(
    name varchar2(20) Not Null unique,
    gender varchar2(10) Not Null,
    address varchar2(20) Not Null,
    Phone_call number(5) Not Null,
    constraint PK_staff primary key (name , Phone_call)
);

create table reserve(
    customer_name varchar2(20) Not Null,
    check_in date Not NULL ,
    day_long number(5) Not NULL,
    room_num number(3) Not NULL,
    staff_name varchar2(20) Not NULL,
    
    constraint PK_reserve primary key (check_in , room_num),
    
    foreign key (customer_name) references customer (name)
		on delete cascade,
    foreign key (staff_name) references staff (name)
		on delete set Null
);