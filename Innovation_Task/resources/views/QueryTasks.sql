1)  SELECT std_name,
       CASE 
           WHEN std_status = '1' THEN 'Active' 
           WHEN std_status = '0' THEN 'InActive' 
       END AS s_status
FROM task1students;


2)  SELECT std_name, registered_on 
FROM task1students 
WHERE (MONTH(registered_on) = 6 OR MONTH(registered_on) = 6) 
AND YEAR(registered_on) = 2024;


3)   SELECT c.class_name,
       COUNT(s.id) AS student_count
FROM class c
LEFT JOIN task1students s ON c.id = s.std_class
WHERE c.class_status = 1
GROUP BY c.class_name;


4)SELECT c.class_name,
       COUNT(s.id) AS student_count
FROM class c
LEFT JOIN task1students s ON c.id = s.std_class
WHERE c.class_status = 1
GROUP BY c.class_name
HAVING COUNT(s.id) > 10;


5)SELECT std_name,
       DATEDIFF(registered_on, DATE_SUB(registered_on, INTERVAL WEEKDAY(registered_on) DAY)) + 1 
       - (DATEDIFF(registered_on, DATE_SUB(registered_on, INTERVAL WEEKDAY(registered_on) DAY)) + 1) DIV 7 * 1 AS days_excluding_sundays
FROM task1students;


6)  SELECT c.class_name,
       COALESCE(s.min_age, 0) AS min_age,
       COALESCE(s.max_age, 0) AS max_age
FROM class c
LEFT JOIN (
    SELECT std_class,
           MIN(std_age) AS min_age,
           MAX(std_age) AS max_age
    FROM task1students
    GROUP BY std_class
) s ON c.id = s.std_class;
