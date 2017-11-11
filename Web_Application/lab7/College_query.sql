-- search for all students from 컴퓨터공학
-- search for each sutdent's id, year, and major
-- search for all 3rd year students
-- search for all 1st and 2nd year students
-- search for all students from 경영학과 using dept_no from department table

SELECT * FROM student WHERE major = '컴퓨터공학';
SELECT student_id , year , major FROM student;
SELECT * FROM student WHERE year=3;
SELECT * FROM student WHERE year=1 or year=2;
SELECT * FROM student join department using(dept_no) where dept_no=4;

-- search for all students who has student_id that contains 2007 (LIKE)
-- search for all students and order them by student_id (ORDER BY)
-- group students by the major and search for the major where its students average year is greater than 3 (GROUP BY, HAVING)
-- search for only two students from 경영학 who has student_id that contains 2007 (LIMIT)

SELECT * FROM student WHERE student_id LIKE '%2007%';
SELECT * FROM student ORDER BY student_id;
SELECT major FROM student GROUP BY major HAVING AVG(year) > 3;
SELECT * FROM student WHERE major='경영학' and student_id LIKE '%2007%' LIMIT 2;