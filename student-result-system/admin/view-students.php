<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../config/db.php");
include('../includes/header.php');

// Handle Delete Request
$msg = "";
if(isset($_GET['delete'])) {
    $del_id = intval($_GET['delete']);
    // First delete marks associated with the student to maintain referential integrity
    mysqli_query($conn, "DELETE FROM marks WHERE student_id=$del_id");
    // Then delete the student
    if(mysqli_query($conn, "DELETE FROM students WHERE id=$del_id")) {
        $msg = "<div class='bg-green-50 p-4 rounded-md mb-4 border border-green-200'><p class='text-green-700 font-semibold'>Student deleted successfully.</p></div>";
    } else {
        $msg = "<div class='bg-red-50 p-4 rounded-md mb-4 border border-red-200'><p class='text-red-700 font-semibold'>Error deleting student.</p></div>";
    }
}

// Fetch all students ordered by year, then department, then roll number
$sql = "SELECT * FROM students ORDER BY year ASC, department ASC, roll_no ASC";
$result = mysqli_query($conn, $sql);

// Group students by year and department in PHP
$students_grouped = [];
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $year = $row['year'] ? $row['year'] : 'Unassigned Year';
        $dept = $row['department'] ? $row['department'] : 'Unassigned Dept';
        $group_key = $year . ' - ' . $dept;
        $students_grouped[$group_key][] = $row;
    }
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8 flex justify-between items-center border-b pb-4">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900">Student Directory</h2>
            <p class="mt-2 text-sm text-gray-600">View all registered students categorized by their respective year and department.</p>
        </div>
        <div>
            <a href="add-student.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-bold rounded-md text-blue-900 bg-amber-500 hover:bg-amber-400 shadow-sm transition-colors">
                + Add New Student
            </a>
        </div>
    </div>

    <?php if(!empty($msg)) echo $msg; ?>

    <?php if(empty($students_grouped)): ?>
        <div class="bg-gray-50 p-8 text-center rounded-lg border border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">No students found</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by adding students to the system.</p>
        </div>
    <?php else: ?>
        
        <div class="space-y-10">
            <?php foreach($students_grouped as $group_name => $students): ?>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg border-t-4 border-amber-500">
                    <div class="px-4 py-5 bg-blue-900 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-bold text-amber-500 uppercase">
                            <?php echo htmlspecialchars($group_name); ?>
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-blue-200 font-semibold">
                            Total Students: <?php echo count($students); ?>
                        </p>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Roll No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">DOB</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach($students as $student): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?php echo htmlspecialchars($student['roll_no']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo htmlspecialchars($student['reg_no']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                                            <?php echo htmlspecialchars($student['name']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            <?php echo htmlspecialchars($student['dob']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <a href="upload-marks.php" class="text-blue-800 hover:text-blue-900 text-xs bg-amber-200 px-3 py-1 font-bold rounded-md shadow-sm mr-2">Upload Marks</a>
                                            <a href="?delete=<?php echo $student['id']; ?>" onclick="return confirm('Are you sure you want to delete this student and all their marks? This action cannot be undone.');" class="text-red-700 hover:text-white bg-red-100 hover:bg-red-600 transition-colors text-xs px-3 py-1 font-bold rounded-md shadow-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>
