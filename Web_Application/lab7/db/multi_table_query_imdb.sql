
-- ex.6 --
search all roles played in the movie named Pi. (28 rows)
select role from movies , roles where movies.id = roles.movie_id and movies.name like 'Pi';

search first/last names of all actors who appeared in Pi along with their roles (28 rows)
select first_name , last_name from movies , roles , actors where movies.name ='Pi' and movies.id = roles.movie_id and roles.actor_id = actors.id;

search first/last names of all actors who appeared in both Kill Bill: Vol. 1 and Kill Bill: Vol. 2 (10 rows)
SELECT DISTINCT A.first_name, A.last_name FROM actors A JOIN roles R ON A.id = R.actor_id JOIN movies M ON R.movie_id = M.id WHERE M.name='Kill Bill: Vol. 1' 
and first_name IN (SELECT DISTINCT A.first_name FROM actors A JOIN roles R ON A.id = R.actor_id JOIN movies M ON R.movie_id = M.id WHERE M.name='Kill Bill: Vol. 2') 
and last_name IN (SELECT DISTINCT A.last_name FROM actors A JOIN roles R ON A.id = R.actor_id JOIN movies M ON R.movie_id = M.id WHERE M.name='Kill Bill: Vol. 2');

search for top 7 actors who have appeared in the most films, in descending order
select A.first_name , A.last_name , count(A.id) from actors A JOIN roles R ON A.id = R.actor_id JOIN movies M ON R.movie_id = M.id 
GROUP BY A.id ORDER BY count(A.id) desc limit 7;

search for top 3 most popular genres of films, in descending order
select MG.genre FROM movies M JOIN movies_genres MG ON M.id = MG.movie_id group by MG.genre ORder by sum(M.rank) desc limit 3;

search the name of the director who has directed the most Thriller films
SELECT D.first_name , D.last_name FROM directors D JOIN movies_directors MD ON D.id = MD.director_id JOIN movies M ON MD.movie_id = M.id JOIN movies_genres MG ON M.id= MG.movie_id
WHERE MG.genre = 'Thriller' GROUP BY D.first_name ORDER BY count(D.first_name) desc limit 1;

-- ex. 7 --

search all roles grades given in the course Computer Science 143 (4 rows)
select G.student_id , G.grade FROM courses C JOIN grades G ON C.id = G.course_id WHERE C.name = 'Computer Science 143';

search names and grades of all students who took Computer Science 143 and got a B- or better (2 rows)
select S.name , G.grade FROM students S JOIN grades G ON S.id=G.student_id JOIN courses C ON C.id = G.course_id WHERE C.name = 'Computer Science 143' and grade <= 'B-' ORDER BY grade;

search names of all students who got a B- or better in any course, along with the names of the course and the grades (5 rows)
SELECT S.name , S.id , C.name , G.grade FROM students S JOIN grades G ON S.id = G.student_id JOIN courses C ON G.course_id = C.id
WHERE G.grade <= 'B-';

search names of all courses that have been taken by 2 or more students (2 rows)
SELECT C.name FROM courses C JOIN grades G ON C.id = G.course_id GROUP BY G.course_id HAVING count(student_id) >= 2;