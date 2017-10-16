
prompt 'Create New_Emp record';
prompt 'insert Employee infomation';
prompt;

accept ENAME char format a10 prompt 'Last Name : ';
accept EMPNO number format 9999 prompt 'Employee # : ';
accept SAL number format 99999.99 default 1000.00 prompt 'Salary [1000] : ';
accept COMM number format 9999.99 default 0 prompt 'Commission [%] : ';
accept HIREDATE date format 'mm/dd/yyyy' prompt 'Hire date[mm/dd/yyyy] : ';

prompt 'List of available jobs:';
prompt;
SELECT DISTINCT JOB FROM emp;
prompt;
accept JOB char format a10 prompt 'JOB :';
prompt 'List of department numbers and names:';
prompt;
SELECT deptno , dname FROM dept ORDER BY deptno ASC;

accept DEPTNO number format 999 prompt 'Department #:'; 

insert into emp values (&EMPNO , '&ENAME' , '&JOB' , to_date( '&HIREDATE' , 'mm/dd/yyyy') , &SAL , &COMM , &DEPTNO);
