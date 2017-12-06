create table supplier(
    S# varchar2(10),
    SNAME varchar2(10),
    age number(2),
    Scity varchar2(10)
);
create table parts(
    P# varchar2(10),
    PNAME varchar2(10),
    COLOR varchar2(10),
    WEIGHT number(10),
    Pcity varchar2(10) 
);
create table SP(
    S# varchar2(5),
    P# varchar2(5),
    QTy number(3)
);

insert into supplier values('s1','Smith',20,'London');
insert into supplier values('s2','Jones',10,'Paris');
insert into supplier values('s3','Blake',30,'Paris');
insert into supplier values('s4','Clark',20,'London');
insert into supplier values('s5','Adams',30,'Athens');
insert into supplier values('','',,'');
-- 여기 마지막꺼 채우고

insert into Parts values('p1','Nut','Red',12,'London');
insert into Parts values('p2','Bolt','Gree',17,'Paris');
insert into Parts values('p3','Screw','Blue',17,'Ansan');
insert into Parts values('p4','Screw','Red',14,'London');
insert into Parts values('p5','Cam','Blue',12,'Jersey');
insert into Parts values('','',); 
-- 여기 마지막꺼 채우고

insert into sp values('s1','p1',300);
insert into sp values('s1','p2',200);
insert into sp values('s1','p3',400);
insert into sp values('s1','p4',200);
insert into sp values('s1','p5',100);
insert into sp values('s1','p6',100);
insert into sp values('s2','p1',300);
insert into sp values('s2','p2',400);
insert into sp values('s3','p2',200);
insert into sp values('s4','p2',200);
insert into sp values('s4','p4',300);
insert into sp values('s4','p5',400);

