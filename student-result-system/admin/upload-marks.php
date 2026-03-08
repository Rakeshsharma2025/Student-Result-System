<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../config/db.php");

$success_msg = "";
$error_msg = "";

if(isset($_POST["import"])) {
    $fileName = $_FILES["file"]["tmp_name"];
    
    if($_FILES["file"]["size"] > 0) {
        $file = fopen($fileName, "r");
        
        // Skip the first row (headers)
        fgetcsv($file, 10000, ",");
        
        $count = 0;
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            // Assume CSV format: reg_no, subject_code, internal_marks, external_marks, total, grade
            // The user uploads 6 columns, but we will recalculate total & grade to enforce limits
            $reg_no = mysqli_real_escape_string($conn, $column[0]);
            $subject_code = mysqli_real_escape_string($conn, $column[1]);
            $internal = intval(mysqli_real_escape_string($conn, $column[2]));
            $external = intval(mysqli_real_escape_string($conn, $column[3]));
            
            // Calculate total and ensure it does not exceed 100
            $total = $internal + $external;
            if ($total > 100) {
                $total = 100;
            }
            
            // Auto-calculate grade based on fixed total
            if ($total >= 90) {
                $grade = 'A+';
            } elseif ($total >= 80) {
                $grade = 'A';
            } elseif ($total >= 70) {
                $grade = 'B+';
            } elseif ($total >= 60) {
                $grade = 'B';
            } elseif ($total >= 50) {
                $grade = 'C+';
            } elseif ($total >= 40) {
                $grade = 'C';
            } else {
                $grade = 'RA';
            }
            
            // Lookup student ID
            $s_query = mysqli_query($conn, "SELECT id FROM students WHERE reg_no='$reg_no'");
            $student_id = ($s_row = mysqli_fetch_assoc($s_query)) ? $s_row['id'] : null;

            // Lookup subject ID
            $sub_query = mysqli_query($conn, "SELECT id FROM subjects WHERE subject_code='$subject_code'");
            $subject_id = ($sub_row = mysqli_fetch_assoc($sub_query)) ? $sub_row['id'] : null;

            if ($student_id && $subject_id) {
                // Check if mark already exists for this student and subject
                $check_sql = "SELECT id FROM marks WHERE student_id='$student_id' AND subject_id='$subject_id'";
                $check_res = mysqli_query($conn, $check_sql);
                
                if (mysqli_num_rows($check_res) > 0) {
                    // Update existing mark
                    $update_sql = "UPDATE marks SET 
                                   internal_marks='$internal', 
                                   external_marks='$external', 
                                   total='$total', 
                                   grade='$grade' 
                                   WHERE student_id='$student_id' AND subject_id='$subject_id'";
                    if (mysqli_query($conn, $update_sql)) {
                        $count++;
                    }
                } else {
                    // Insert new mark if it doesn't exist
                    $insert_sql = "INSERT into marks (student_id, subject_id, internal_marks, external_marks, total, grade)
                           values ('$student_id', '$subject_id', '$internal', '$external', '$total', '$grade')";
                           
                    if (mysqli_query($conn, $insert_sql)) {
                        $count++;
                    }
                }
            }
        }
        fclose($file);
        
        if($count > 0) {
            $success_msg = "<div class='bg-green-50 p-4 rounded-md mb-4'><p class='text-green-700'>Successfully imported $count records.</p></div>";
        } else {
            $error_msg = "<div class='bg-red-50 p-4 rounded-md mb-4'><p class='text-red-700'>Error importing data or file was empty.</p></div>";
        }
    }
}

include('../includes/header.php');
?>

<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border-t-4 border-amber-500">
        <div class="mb-8 border-b pb-4">
            <h2 class="text-3xl font-extrabold text-blue-900">Upload Examination Marks</h2>
            <p class="mt-2 text-sm text-gray-600">Bulk import student marks using a CSV file.</p>
        </div>
        
        <?php echo $success_msg; ?>
        <?php echo $error_msg; ?>

        <div class="bg-blue-900 border-l-4 border-amber-500 p-4 mb-6">
            <h3 class="text-sm font-bold text-amber-500">CSV Format Requirements:</h3>
            <p class="text-sm text-blue-200 mt-1">Your file MUST have a header row and EXACTLY these 6 columns in this order:</p>
            <code class="block mt-2 text-xs bg-white text-blue-900 font-bold p-2 rounded border border-blue-200">registration_number, subject_code, internal_marks, external_marks, total, grade</code>
        </div>

        <form class="space-y-6" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Select CSV File</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:bg-gray-50 transition-colors">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="file" class="relative cursor-pointer bg-white rounded-md font-bold text-amber-600 hover:text-amber-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-amber-500 px-2 py-1">
                                <span>Upload a file</span>
                                <input id="file" name="file" type="file" class="sr-only" accept=".csv" required>
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">CSV files up to 10MB</p>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" name="import" id="import" class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-md text-blue-900 bg-amber-500 hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 shadow-sm transition-colors">
                    Import Marks
                </button>
            </div>
        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
