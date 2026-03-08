<?php
session_start();

// Hardcoded Admin Credentials
$admin_user = "admin";
$admin_pass = "admin123";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === $admin_user && $password === $admin_pass) {
        $_SESSION['admin'] = true;
        header("Location: view-students.php");
        exit();
    } else {
        $error = "Invalid Admin Credentials.";
    }
}

include('../includes/header.php');
?>

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-lg border-t-4 border-amber-500">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-blue-900">
                Staff & Admin Login
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Secure faculty portal
            </p>
        </div>
        
        <?php if(isset($error)) { ?>
            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4">
                <p class="text-sm text-red-700"><?php echo $error; ?></p>
            </div>
        <?php } ?>

        <form class="mt-8 space-y-6" method="POST">
            <div class="rounded-md shadow-sm -space-y-px text-left">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input id="username" name="username" type="text" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 sm:text-sm" placeholder="admin">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 sm:text-sm" placeholder="••••••••">
                </div>
            </div>

            <div>
                <button type="submit" name="login" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-bold rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 transition-colors shadow-sm">
                    Access Portal
                </button>
            </div>
        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
