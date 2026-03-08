<?php
include("config/db.php");

// Truncate the marks table to remove all existing marks
mysqli_query($conn, "TRUNCATE TABLE marks");

// Insert new random marks with around 26 students failing in some subjects
$sql = "INSERT INTO marks (student_id, subject_id, internal_marks, external_marks, total, grade)
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
) AS temp_marks;";

if (mysqli_query($conn, $sql)) {
    echo "Successfully regenerated marks: 26 demo students have explicitly failed some test subjects.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
