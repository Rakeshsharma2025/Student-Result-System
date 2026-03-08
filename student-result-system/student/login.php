<?php
session_start();
include("../config/db.php");

if(isset($_POST['login']))
{
$reg = mysqli_real_escape_string($conn, $_POST['reg']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);

$sql = "SELECT * FROM students WHERE reg_no='$reg'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Verify DOB (assuming YYYY-MM-DD format from HTML date input)
    if($row['dob'] == $dob)
    {
    $_SESSION['student']=$row['id'];
    header("Location:dashboard.php");
    exit();
    } else {
        $error = "Invalid Date of Birth.";
    }
} else {
    $error = "Student Registration Number not found.";
}
}
include('../includes/header.php');
?>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-lg">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Student Login
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Enter your credentials to view your results
                </p>
            </div>
            
            <?php if(isset($error)) { ?>
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: solid/x-circle -->
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">
                                <?php echo $error; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <form class="mt-8 space-y-6" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm -space-y-px text-left">
                    <div class="mb-4">
                        <label for="reg" class="block text-sm font-medium text-gray-700">Registration Number</label>
                        <input id="reg" name="reg" type="text" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="e.g. 730422104045">
                    </div>
                    <div>
                        <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input id="dob" name="dob" type="date" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit" name="login" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-bold rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 transition-colors">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-amber-500 group-hover:text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        View Results
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php include('../includes/footer.php'); ?>
