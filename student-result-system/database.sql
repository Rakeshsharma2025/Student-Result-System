CREATE DATABASE IF NOT EXISTS student_result_db;
USE student_result_db;

-- ===============================
-- STUDENTS TABLE
-- ===============================
CREATE TABLE IF NOT EXISTS students (
id INT AUTO_INCREMENT PRIMARY KEY,
roll_no VARCHAR(20),
reg_no VARCHAR(20),
name VARCHAR(100),
department VARCHAR(50),
year INT,
dob DATE
);

-- ===============================
-- SUBJECT TABLE
-- ===============================
CREATE TABLE IF NOT EXISTS subjects (
id INT AUTO_INCREMENT PRIMARY KEY,
department VARCHAR(20),
subject_code VARCHAR(20),
subject_name VARCHAR(100),
credits INT
);

-- ===============================
-- MARKS TABLE
-- ===============================
CREATE TABLE IF NOT EXISTS marks (
id INT AUTO_INCREMENT PRIMARY KEY,
student_id INT,
subject_id INT,
internal_marks INT,
external_marks INT,
total INT,
grade VARCHAR(5)
);

CREATE INDEX idx_student ON marks(student_id);

-- ===============================
-- SUBJECTS
-- ===============================

INSERT INTO subjects (department,subject_code,subject_name,credits) VALUES

-- CSE
('CSE','CSE301','Maths I',4),
('CSE','CSE302','English',3),
('CSE','CSE303','Software Project Management',3),
('CSE','CSE304','Java',4),
('CSE','CSE305','Python',4),
('CSE','CSE306','Python Lab',2),
('CSE','CSE307','Data Structure Lab',2),

-- IT
('IT','IT301','Maths I',4),
('IT','IT302','English',3),
('IT','IT303','Software Project Management',3),
('IT','IT304','Data Structures',4),
('IT','IT305','Python',4),
('IT','IT306','Python Lab',2),
('IT','IT307','Java Lab',2),

-- AIDS
('AIDS','AI301','Maths I',4),
('AIDS','AI302','English',3),
('AIDS','AI303','Software Project Management',3),
('AIDS','AI304','Java',4),
('AIDS','AI305','Python',4),
('AIDS','AI306','Python Lab',2),
('AIDS','AI307','Java Lab',2);

-- ===============================
-- STUDENTS (60)
-- ===============================

INSERT INTO students (roll_no, reg_no, name, department, year, dob) VALUES

('ES22CS61','730422104061','Student 1','CSE',3,'2005-03-07'),
('ES22CS62','730422104062','Student 2','CSE',3,'2005-03-07'),
('ES22CS63','730422104063','Student 3','CSE',3,'2005-03-07'),
('ES22CS64','730422104064','Student 4','CSE',3,'2005-03-07'),
('ES22CS65','730422104065','Student 5','CSE',3,'2005-03-07'),
('ES22CS66','730422104066','Student 6','CSE',3,'2005-03-07'),
('ES22CS67','730422104067','Student 7','CSE',3,'2005-03-07'),
('ES22CS68','730422104068','Student 8','CSE',3,'2005-03-07'),
('ES22CS69','730422104069','Student 9','CSE',3,'2005-03-07'),
('ES22CS70','730422104070','Student 10','CSE',3,'2005-03-07'),
('ES22CS71','730422104071','Student 11','CSE',3,'2005-03-07'),
('ES22CS72','730422104072','Student 12','CSE',3,'2005-03-07'),
('ES22CS73','730422104073','Student 13','CSE',3,'2005-03-07'),
('ES22CS74','730422104074','Student 14','CSE',3,'2005-03-07'),
('ES22CS75','730422104075','Student 15','CSE',3,'2005-03-07'),
('ES22CS76','730422104076','Student 16','CSE',3,'2005-03-07'),
('ES22CS77','730422104077','Student 17','CSE',3,'2005-03-07'),
('ES22CS78','730422104078','Student 18','CSE',3,'2005-03-07'),
('ES22CS79','730422104079','Student 19','CSE',3,'2005-03-07'),
('ES22CS80','730422104080','Student 20','CSE',3,'2005-03-07'),

('ES22CS81','730422104081','Student 21','IT',3,'2005-03-07'),
('ES22CS82','730422104082','Student 22','IT',3,'2005-03-07'),
('ES22CS83','730422104083','Student 23','IT',3,'2005-03-07'),
('ES22CS84','730422104084','Student 24','IT',3,'2005-03-07'),
('ES22CS85','730422104085','Student 25','IT',3,'2005-03-07'),
('ES22CS86','730422104086','Student 26','IT',3,'2005-03-07'),
('ES22CS87','730422104087','Student 27','IT',3,'2005-03-07'),
('ES22CS88','730422104088','Student 28','IT',3,'2005-03-07'),
('ES22CS89','730422104089','Student 29','IT',3,'2005-03-07'),
('ES22CS90','730422104090','Student 30','IT',3,'2005-03-07'),
('ES22CS91','730422104091','Student 31','IT',3,'2005-03-07'),
('ES22CS92','730422104092','Student 32','IT',3,'2005-03-07'),
('ES22CS93','730422104093','Student 33','IT',3,'2005-03-07'),
('ES22CS94','730422104094','Student 34','IT',3,'2005-03-07'),
('ES22CS95','730422104095','Student 35','IT',3,'2005-03-07'),
('ES22CS96','730422104096','Student 36','IT',3,'2005-03-07'),
('ES22CS97','730422104097','Student 37','IT',3,'2005-03-07'),
('ES22CS98','730422104098','Student 38','IT',3,'2005-03-07'),
('ES22CS99','730422104099','Student 39','IT',3,'2005-03-07'),
('ES22CS100','730422104100','Student 40','IT',3,'2005-03-07'),

('ES22CS101','730422104101','Student 41','AIDS',3,'2005-03-07'),
('ES22CS102','730422104102','Student 42','AIDS',3,'2005-03-07'),
('ES22CS103','730422104103','Student 43','AIDS',3,'2005-03-07'),
('ES22CS104','730422104104','Student 44','AIDS',3,'2005-03-07'),
('ES22CS105','730422104105','Student 45','AIDS',3,'2005-03-07'),
('ES22CS106','730422104106','Student 46','AIDS',3,'2005-03-07'),
('ES22CS107','730422104107','Student 47','AIDS',3,'2005-03-07'),
('ES22CS108','730422104108','Student 48','AIDS',3,'2005-03-07'),
('ES22CS109','730422104109','Student 49','AIDS',3,'2005-03-07'),
('ES22CS110','730422104110','Student 50','AIDS',3,'2005-03-07'),
('ES22CS111','730422104111','Student 51','AIDS',3,'2005-03-07'),
('ES22CS112','730422104112','Student 52','AIDS',3,'2005-03-07'),
('ES22CS113','730422104113','Student 53','AIDS',3,'2005-03-07'),
('ES22CS114','730422104114','Student 54','AIDS',3,'2005-03-07'),
('ES22CS115','730422104115','Student 55','AIDS',3,'2005-03-07'),
('ES22CS116','730422104116','Student 56','AIDS',3,'2005-03-07'),
('ES22CS117','730422104117','Student 57','AIDS',3,'2005-03-07'),
('ES22CS118','730422104118','Student 58','AIDS',3,'2005-03-07'),
('ES22CS119','730422104119','Student 59','AIDS',3,'2005-03-07'),
('ES22CS120','730422104120','Student 60','AIDS',3,'2005-03-07');

-- ===============================
-- AUTO GENERATE MARKS (420 rows)
-- ===============================

INSERT INTO marks (student_id, subject_id, internal_marks, external_marks, total, grade)
SELECT 
    student_id,
    subject_id,
    internal_marks,
    external_marks,
    LEAST((internal_marks + external_marks), 100) AS total,
    CASE 
        WHEN LEAST((internal_marks + external_marks), 100) >= 90 THEN 'A+'
        WHEN LEAST((internal_marks + external_marks), 100) >= 80 THEN 'A'
        WHEN LEAST((internal_marks + external_marks), 100) >= 70 THEN 'B+'
        WHEN LEAST((internal_marks + external_marks), 100) >= 60 THEN 'B'
        WHEN LEAST((internal_marks + external_marks), 100) >= 50 THEN 'C+'
        WHEN LEAST((internal_marks + external_marks), 100) >= 40 THEN 'C'
        ELSE 'RA'
    END AS grade
FROM (
    SELECT 
        s.id AS student_id,
        sub.id AS subject_id,
        CASE 
            WHEN s.id BETWEEN 20 AND 45 AND sub.id % 3 = 0 THEN FLOOR(RAND()*12)+5
            ELSE FLOOR(RAND()*40)+10 
        END AS internal_marks,
        CASE 
            WHEN s.id BETWEEN 20 AND 45 AND sub.id % 3 = 0 THEN FLOOR(RAND()*15)+5
            ELSE FLOOR(RAND()*60)+20 
        END AS external_marks
    FROM students s
    JOIN subjects sub ON s.department = sub.department
) AS temp_marks;