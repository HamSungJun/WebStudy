create table e_Report(
    EMPNO  number(10),
    dname varchar2(10),
    JOB varchar2(16),
    HIREDATE date(8),
    SAL number(6),
    COMM number(8)
);

INSERT INTO e_Report values(7369,'SMITH','CLERK','80/12/17',800.00,NULL);
INSERT INTO e_Report values(7499,'ALLEN','SALESMAN','81/02/20',1600.00,300);
INSERT INTO e_Report values(7499,'WADD','SALESMAN','81/02/22',1250.00,500);
INSERT INTO e_Report values(7499,'ALIS','MANAGER','91/02/23',2000.00,NULL);
INSERT INTO e_Report values(7499,'MOON','GUITARIST','79/02/23',1800.00,300);


column SAL on;
column SAL format $9999.99;
set space 1;
set wrap on;
set head on;
set pagesize 24;
set line 110;
ttitle center 'Employee_Report';
btitle center 'confiential'

