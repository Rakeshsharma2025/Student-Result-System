<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['student'])) {
    header("Location: login.php");
    exit();
}

$id=$_SESSION['student'];

$sql="SELECT * FROM students WHERE id=$id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);

include('../includes/header.php');
?>
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Student Info Card -->
    <div class="bg-white shadow rounded-lg mb-8 p-6 print-container">
        <div class="flex justify-between items-center mb-4 border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-800">Student Profile</h2>
            <div class="space-x-4 no-print">
                <button onclick="window.print()" class="inline-flex items-center px-4 py-2 border border-blue-900 text-sm font-bold rounded-md text-blue-900 bg-white hover:bg-amber-500 hover:text-white hover:border-amber-500 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900">
                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Download / Print PDF
                </button>
                <a href="logout.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Logout
                </a>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-500">Name</p>
                <p class="mt-1 text-lg text-gray-900 font-semibold"><?php echo $row['name']; ?></p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Roll Number</p>
                <p class="mt-1 text-lg text-gray-900 font-semibold"><?php echo $row['roll_no']; ?></p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Registration Number</p>
                <p class="mt-1 text-lg text-gray-900 font-semibold"><?php echo $row['reg_no']; ?></p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Department</p>
                <p class="mt-1 text-lg text-gray-900 font-semibold"><?php echo $row['department']; ?></p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Year</p>
                <p class="mt-1 text-lg text-gray-900 font-semibold"><?php echo $row['year']; ?></p>
            </div>
        </div>
    </div>

    <!-- Results Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden print-container">
        <div class="px-6 py-5 border-b border-gray-200">
            <h3 class="text-xl leading-6 font-medium text-gray-900">Academic Results</h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject Code</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Credits</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Internal</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">External</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    // Fetch results and calculate GPA
                    $result_sql="SELECT 
                    subjects.subject_code,
                    subjects.subject_name,
                    subjects.credits,
                    marks.internal_marks,
                    marks.external_marks,
                    marks.total,
                    marks.grade
                    FROM marks
                    JOIN subjects ON marks.subject_id = subjects.id
                    WHERE student_id = $id";

                    $result_res = mysqli_query($conn, $result_sql);
                    
                    $total_credits = 0;
                    $total_grade_points = 0;

                    // Grade mapping
                    $grade_values = [
                        'O' => 10, 'S' => 10, // Some systems use O, some use S for top grade
                        'A+' => 9, 'A' => 9,
                        'B+' => 8, 'B' => 8,
                        'C' => 7,
                        'D' => 6,
                        'E' => 5,
                        'P' => 5, // Pass
                        'F' => 0, 'U' => 0, 'RA' => 0 // Fail/Reappear
                    ];

                    if(mysqli_num_rows($result_res) > 0) {
                        while($marks_row = mysqli_fetch_assoc($result_res)) {
                            $credits = $marks_row['credits'] ?? 3; // Default to 3 if null
                            $grade = strtoupper(trim($marks_row['grade']));
                            $grade_val = isset($grade_values[$grade]) ? $grade_values[$grade] : 0;
                            
                            $total_credits += $credits;
                            $total_grade_points += ($credits * $grade_val);

                            // Determine color based on grade
                            $grade_color = 'text-green-600 font-bold';
                            if($grade == 'F' || $grade == 'U' || $grade == 'RA') {
                                $grade_color = 'text-red-600 font-bold';
                            }
                            ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $marks_row['subject_code'] ?? 'N/A'; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo $marks_row['subject_name']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $credits; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500"><?php echo $marks_row['internal_marks']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500"><?php echo $marks_row['external_marks']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-semibold text-gray-900"><?php echo $marks_row['total']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center <?php echo $grade_color; ?>"><?php echo $grade; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='7' class='px-6 py-8 text-center text-gray-500'>No results found for your profile yet.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <?php if($total_credits > 0) {
            $gpa = round($total_grade_points / $total_credits, 2);
            // Simple CGPA calculation (assuming GPA = CGPA for this semester's view)
            // In a fully normalized system, we'd query past semesters here too.
            $cgpa = $gpa; 
        ?>
        <div class="bg-blue-900 px-6 py-5 border-t-4 border-amber-500 shadow-inner">
            <div class="flex justify-end space-x-12">
                <div class="text-right">
                    <p class="text-sm font-bold text-amber-500 uppercase tracking-wider">Semester GPA</p>
                    <p class="text-3xl font-extrabold text-white"><?php echo number_format($gpa, 2); ?></p>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-amber-500 uppercase tracking-wider">Cumulative CGPA</p>
                    <p class="text-3xl font-extrabold text-white"><?php echo number_format($cgpa, 2); ?></p>
                </div>
            </div>
            <p class="mt-2 text-xs text-blue-200 text-right">Calculated based on <?= $total_credits ?> total credits mapping S/O/A+ grading system.</p>
        </div>
        <?php } ?>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
