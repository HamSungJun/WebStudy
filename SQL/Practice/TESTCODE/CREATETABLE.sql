CREATE table Building (
    building_Name varchar2(20) Not Null,
    college_NAme varchar2(20),
    building_Call number(13),
    popularity number(1) check (1<=popularity and popularity<=5)
    primary key(building_Name);
    
);

set space 1;
set wrap on;
set head on;
set pagesize 20;
set line 130;