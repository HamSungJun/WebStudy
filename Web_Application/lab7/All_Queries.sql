-- EX 1~5
-- 1. Create DB and tables
CREATE DATABASE College DEFAULT CHARACTER SET 'utf8' COLLATE 'utf8' ;

USE college;

CREATE TABLE student (
    student_id INTEGER NOT NULL primary key,
    name VARCHAR(10) NOT NULL,
    year TINYINT(1) NOT NULL DEFAULT 1,
    dept_no INTEGER NOT NULL,
    major VARCHAR(20)
    
);

CREATE TABLE department(
    dept_no INTEGER AUTO_INCREMENT primary key,
    dept_name VARCHAR(20) NOT NULL UNIQUE,
    office VARCHAR(20) NOT NULL,
    office_tel VARCHAR(13)
);

-- 2.Modify table 

ALTER TABLE student MODIFY COLUMN major VARCHAR(30);
ALTER TABLE student ADD gender VARCHAR(8) NOT NULL;

-- 3 Insert data
-- INSERT INTO students VALUES (student_id , name , year , dept_no , dept_name);

INSERT INTO student VALUES (20070002, '송은이', 3, 4, '경영학'); 
INSERT INTO student VALUES (20060001, '박미선', 4, 4, '경영학'); 
INSERT INTO student VALUES (20030001, '이경규', 4, 2, '전자공학');
INSERT INTO student VALUES (20040003, '김용만', 3, 2, '전자공학'); 
INSERT INTO student VALUES (20060002, '김국진', 3, 1, '컴퓨터공학'); 
INSERT INTO student VALUES (20100002, '한선화', 3, 4, '경영학'); 
INSERT INTO student VALUES (20110001, '송지은', 2, 1, '컴퓨터공학'); 
INSERT INTO student VALUES (20080003, '전효성', 4, 3, '법학'); 
INSERT INTO student VALUES (20040002, '김구라', 4, 5, '영문학'); 
INSERT INTO student VALUES (20070001, '김숙', 4, 4, '경영학'); 
INSERT INTO student VALUES (20100001, '황광희', 3, 4, '경영학'); 
INSERT INTO student VALUES (20110002, '권지용', 2, 2, '전자공학'); 
INSERT INTO student VALUES (20030002, '김재진', 5, 1, '컴퓨터공학'); 
INSERT INTO student VALUES (20070003, '신봉선', 4, 3, '법학'); 
INSERT INTO student VALUES (20070005, '김신영', 2, 5, '영문학'); 
INSERT INTO student VALUES (20100003, '임시환', 3, 1, '컴퓨터공학'); 
INSERT INTO student VALUES (20070007, '정준하', 2, 4, '경영학');

-- INSERT INTO department VALUES(dept_no ,  dept_name , office , office_tell )

INSERT INTO department VALUES ('','컴퓨터공학', '이학관 101호', '02-3290-0123'); 
INSERT INTO department VALUES ('','전자공학', '공학관 401호', '02-3290-2345'); 
INSERT INTO department VALUES ('','법학', '법학관 201호', '02-3290-7896'); 
INSERT INTO department VALUES ('','경영학', '경영관 104호', '02-3290-1112'); 
INSERT INTO department VALUES ('','영문학', '문화관 303호', '02-3290-4412');

-- 4.Update and Delete Data

UPDATE table department set dept_name = '전자전기공학' where dept_name = '전자공학';
INSERT INTO department VALUES ('특수교육학과', '공학관 403호', '02-3290-2347');
UPDATE table student set dept_no = 6 where name='송지은';
DELETE FROM student WHERE name = '권지용'; 
DELETE FROM student WHERE name = '김재진';

-- 5. Query data

SELECT * FROM student WHERE major = '컴퓨터공학';
SELECT student_id , year , major FROM student;
SELECT * FROM student WHERE year=3;
SELECT * FROM student WHERE year=1 or year=2;
SELECT * FROM student join department using(dept_no) where dept_no=4;

-- 6. Advanced Query

SELECT * FROM student WHERE student_id LIKE '%2007%';
SELECT * FROM student ORDER BY student_id;
SELECT major FROM student GROUP BY major HAVING AVG(year) > 3;
SELECT * FROM student WHERE major='경영학' and student_id LIKE '%2007%' LIMIT 2; 

-- EX.6

select role from movies , roles where movies.id = roles.movie_id and movies.name like 'Pi';

select first_name , last_name from movies , roles , actors where movies.name ='Pi' and movies.id = roles.movie_id and roles.actor_id = actors.id;

SELECT DISTINCT A.first_name, A.last_name FROM actors A JOIN roles R ON A.id = R.actor_id JOIN movies M ON R.movie_id = M.id WHERE M.name='Kill Bill: Vol. 1' 
and first_name IN (SELECT DISTINCT A.first_name FROM actors A JOIN roles R ON A.id = R.actor_id JOIN movies M ON R.movie_id = M.id WHERE M.name='Kill Bill: Vol. 2') 
and last_name IN (SELECT DISTINCT A.last_name FROM actors A JOIN roles R ON A.id = R.actor_id JOIN movies M ON R.movie_id = M.id WHERE M.name='Kill Bill: Vol. 2');

select A.first_name , A.last_name , count(A.id) from actors A JOIN roles R ON A.id = R.actor_id JOIN movies M ON R.movie_id = M.id 
GROUP BY A.id ORDER BY count(A.id) desc limit 7;

select MG.genre FROM movies M JOIN movies_genres MG ON M.id = MG.movie_id group by MG.genre ORder by sum(M.rank) desc limit 3;

SELECT D.first_name , D.last_name FROM directors D JOIN movies_directors MD ON D.id = MD.director_id JOIN movies M ON MD.movie_id = M.id JOIN movies_genres MG ON M.id= MG.movie_id
WHERE MG.genre = 'Thriller' GROUP BY D.first_name ORDER BY count(D.first_name) desc limit 1;

-- EX.7

select G.student_id , G.grade FROM courses C JOIN grades G ON C.id = G.course_id WHERE C.name = 'Computer Science 143';

select S.name , G.grade FROM students S JOIN grades G ON S.id=G.student_id JOIN courses C ON C.id = G.course_id WHERE C.name = 'Computer Science 143' and grade <= 'B-' ORDER BY grade;

SELECT S.name , S.id , C.name , G.grade FROM students S JOIN grades G ON S.id = G.student_id JOIN courses C ON G.course_id = C.id
WHERE G.grade <= 'B-';

SELECT C.name FROM courses C JOIN grades G ON C.id = G.course_id GROUP BY G.course_id HAVING count(student_id) >= 2;

