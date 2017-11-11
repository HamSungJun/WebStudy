-- '전자공학' department changed its name to '전자전기공학'
-- a new department called '특수교육학과' is created at 공학관 403호 (02-3290-2347)
-- student named '송지은' has transferred to the newly created department
-- student named '권지용' quit the college to further pursue his singing career
-- student named '김재진' was kicked out of the college for his disrespectful and unethical actions


UPDATE table department set dept_name = '전자전기공학' where dept_name = '전자공학';
INSERT INTO department VALUES ('특수교육학과', '공학관 403호', '02-3290-2347');
UPDATE table student set dept_no = 6 where name='송지은';
DELETE FROM student WHERE name = '권지용'; 
DELETE FROM student WHERE name = '김재진'; 
