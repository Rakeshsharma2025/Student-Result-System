<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../config/db.php");

if(isset($_POST['add'])) {
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $reg=$_POST['reg'];
    $dept=$_POST['dept'];
    $year=$_POST['year'];
    $dob=$_POST['dob'];

    $sql="INSERT INTO students(name,roll_no,reg_no,department,year,dob)
    VALUES('$name','$roll','$reg','$dept','$year','$dob')";

    if(mysqli_query($conn,$sql)){
        $student_id = mysqli_insert_id($conn);
        
        // Auto-assign subjects for this department with 0 marks and 'RA' grade
        // Prepare department for query to avoid SQL injection
        $safe_dept = mysqli_real_escape_string($conn, $dept);
        $subject_sql = "SELECT id FROM subjects WHERE department='$safe_dept'";
        $subject_res = mysqli_query($conn, $subject_sql);
        
        $assigned_count = 0;
        if($subject_res && mysqli_num_rows($subject_res) > 0) {
            while($sub_row = mysqli_fetch_assoc($subject_res)) {
                $sub_id = $sub_row['id'];
                
                // Generate random marks like dummy data
                $internal = rand(10, 49);
                $external = rand(20, 79);
                
                // Add a chance for the new student to occasionally fail a subject
                if(rand(1, 100) <= 20) {
                    $internal = rand(5, 15);
                    $external = rand(5, 15);
                }
                
                $total = min($internal + $external, 100);
                $grade = 'RA';
                if($total >= 90) $grade = 'A+';
                elseif($total >= 80) $grade = 'A';
                elseif($total >= 70) $grade = 'B+';
                elseif($total >= 60) $grade = 'B';
                elseif($total >= 50) $grade = 'C+';
                elseif($total >= 40) $grade = 'C';

                $mark_sql = "INSERT INTO marks (student_id, subject_id, internal_marks, external_marks, total, grade) 
                             VALUES ($student_id, $sub_id, $internal, $external, $total, '$grade')";
                if(mysqli_query($conn, $mark_sql)) {
                    $assigned_count++;
                }
            }
        }
        
        if($assigned_count > 0) {
            $success_msg = "<div class='bg-green-50 p-4 rounded-md mb-4'><p class='text-green-700'>Student added successfully and assigned $assigned_count subjects!</p></div>";
        } else {
            $success_msg = "<div class='bg-green-50 p-4 rounded-md mb-4'><p class='text-green-700'>Student added successfully! (No subjects found for department $dept)</p></div>";
        }
    } else {
        $error_msg = "<div class='bg-red-50 p-4 rounded-md mb-4'><p class='text-red-700'>Error adding student: " . mysqli_error($conn) . "</p></div>";
    }
}

include('../includes/header.php');
?>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg border-t-4 border-amber-500">
            <div class="mb-8">
                <h2 class="text-3xl font-extrabold text-blue-900 text-center">Add New Student</h2>
                <p class="mt-2 text-sm text-gray-600 text-center">Register a student in the system</p>
            </div>
            
            <?php if(isset($success_msg)) { echo $success_msg; } ?>
            <?php if(isset($error_msg)) { echo $error_msg; } ?>

            <form class="space-y-6" method="POST">
                
                <div class="grid grid-cols-1 gap-y-4 text-left">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input id="name" name="name" type="text" required class="mt-1 appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="roll" class="block text-sm font-medium text-gray-700">Roll Number</label>
                        <input id="roll" name="roll" type="text" required class="mt-1 appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="reg" class="block text-sm font-medium text-gray-700">Registration Number</label>
                        <input id="reg" name="reg" type="text" required class="mt-1 appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="dept" class="block text-sm font-medium text-gray-700">Department</label>
                            <input id="dept" name="dept" type="text" class="mt-1 appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g. CSE">
                        </div>
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                            <input id="year" name="year" type="number" class="mt-1 appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g. 2024">
                        </div>
                    </div>

                    <div>
                        <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input id="dob" name="dob" type="date" required class="mt-1 appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit" name="add" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-bold rounded-md text-blue-900 bg-amber-500 hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 shadow-sm transition-colors">
                        Register Student
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php include('../includes/footer.php'); ?>
