alter table e_Report add DEPARTMENT number(3);
update e_Report set DEPARTMENT = 20 WHERE dname='SMITH';
update e_Report set DEPARTMENT = 30 WHERE dname='ALLEN';
update e_Report set DEPARTMENT = 30 WHERE dname='WADD';
update e_Report set DEPARTMENT = 10 WHERE dname='ALIS';
update e_Report set DEPARTMENT = 10 WHERE dname='MOON';