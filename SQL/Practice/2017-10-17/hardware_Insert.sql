-- Product Insert

insert into Product values ('A' , 1001 , 'pc'); 
insert into Product values ('A' , 1002 , 'pc');
insert into Product values ('A' , 1003 , 'pc');
insert into Product values ('B' , 1004 , 'pc');
insert into Product values ('B' , 1005 , 'pc');
insert into Product values ('B' , 3002 , 'printer');
insert into Product values ('B' , 3004 , 'printer');
insert into Product values ('C' , 1006 , 'pc');
insert into Product values ('C' , 1007 , 'pc');
insert into Product values ('D' , 1008 , 'pc');
insert into Product values ('D' , 1009 , 'pc');
insert into Product values ('D' , 1010 , 'pc');
insert into Product values ('D' , 2001 , 'laptop');
insert into Product values ('D' , 2002 , 'laptop');
insert into Product values ('D' , 2003 , 'laptop');
insert into Product values ('D' , 3001 , 'printer');
insert into Product values ('D' , 3003 , 'printer');
insert into Product values ('E' , 2004 , 'laptop');
insert into Product values ('E' , 2008 , 'laptop');
insert into Product values ('F' , 2005 , 'laptop');
insert into Product values ('G' , 2006 , 'laptop');
insert into Product values ('G' , 2007 , 'laptop');
insert into Product values ('H' , 3005 , 'printer');
insert into Product values ('I' , 3006 , 'printer');

-- Pc Insert

insert into Pc values(1001, 133, 16, 1.6, '6x', 1595);
insert into Pc values(1002, 120, 16, 1.6, '6x', 1399);
insert into Pc values(1003, 166, 24, 2.5, '6x', 1899);
insert into Pc values(1004, 166, 32, 2.5, '8x', 1999);
insert into Pc values(1005, 166, 16, 2.0, '8x', 1999);
insert into Pc values(1006, 200, 32, 3.1, '8x', 2099);
insert into Pc values(1007, 200, 32, 3.2, '8x', 2349);
insert into Pc values(1008, 180, 32, 2.0, '8x', 3699);
insert into Pc values(1009, 200, 32, 2.5, '8x', 2599);
insert into Pc values(1010, 160, 16, 1.2, '8x', 1495);

-- Laptop Insert

insert into Laptop values(2001 , 100 , 20, 1.10,  9.5, 1999);
insert into Laptop values(2002 , 117 , 12, 0.75, 11.3, 2499);
insert into Laptop values(2003 , 117 , 32, 1.00, 10.4, 3599);
insert into Laptop values(2004 , 133 , 16, 1.10, 11.2, 3499);
insert into Laptop values(2005 , 133 , 16, 1.00, 11.3, 2599);
insert into Laptop values(2006 , 120 ,  8, 0.81, 12.1, 1999);
insert into Laptop values(2007 , 150 , 16, 1.35, 12.1, 4799);
insert into Laptop values(2008 , 120 , 16, 1.10, 12.1, 2099);

-- Printer Insert

insert into Printer values(3001, 'true', 'ink-jet', 1999);
insert into Printer values(3002, 'true', 'ink-jet', 2499);
insert into Printer values(3003, 'false', 'laser', 3599);
insert into Printer values(3004, 'false', 'laser', 3499);
insert into Printer values(3005, 'false', 'ink-jet', 2599);
insert into Printer values(3006, 'true', 'dry', 1999);