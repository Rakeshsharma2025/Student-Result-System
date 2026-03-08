<?php
// Simple header with Tailwind CSS via CDN for styling
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erode Sengunthar Engineering College - Student Result System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for printing */
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background-color: white !important;
            }
            .print-container {
                box-shadow: none !important;
                border: none !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col font-sans">
    
    <!-- Header wrapper relative for overlapping logo -->
    <header class="relative w-full z-50 no-print">
        <!-- Top Thin Bar -->
        <div class="bg-[#f3e8f9] text-[#4b2482] py-1 border-b border-[#e5d5f2]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end text-[10px] sm:text-xs font-bold uppercase tracking-wider space-x-2 sm:space-x-4">
                <a href="#" class="hover:underline">NAAC</a>
                <span>|</span>
                <a href="#" class="hover:underline">IIPC</a>
                <span>|</span>
                <a href="#" class="hover:underline">IIC</a>
                <span>|</span>
                <a href="#" class="hover:underline">TBI</a>
                <span>|</span>
                <a href="#" class="hover:underline">STARTUP</a>
                <span>|</span>
                <a href="#" class="hover:underline">ALUMNI</a>
            </div>
        </div>

        <!-- Main Navigation Bar -->
        <div class="bg-[#4b2482] text-white shadow-md relative z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative h-16 sm:h-20 lg:h-[88px] flex flex-col justify-center items-end">
                <!-- Overlapping Logo Container (Left) -->
                <div class="absolute left-4 sm:left-6 lg:left-8 top-0 bg-white rounded-b-xl shadow-lg px-3 py-2 sm:py-3 z-[60] border-b-4 border-amber-500 w-[240px] sm:w-[320px] lg:w-[350px]">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex flex-col items-center">
                            <!-- Placeholder Logo -->
                            <svg class="h-10 w-10 sm:h-12 sm:w-12 text-[#1e3a8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- A different logo proxy since it's a new design -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                            <div class="text-[8px] font-bold text-blue-900 mt-1 italic uppercase tracking-tighter">Stay Ahead</div>
                        </div>
                        <div class="ml-2 sm:ml-3">
                            <h1 class="text-[14px] sm:text-[17px] font-extrabold tracking-tight text-[#1e3a8a] leading-tight font-serif uppercase">Erode Sengunthar<br>
                                <span class="text-[12px] sm:text-[14px] font-semibold tracking-normal text-[#4b2482]">Engineering College</span>
                            </h1>
                            <p class="text-[8px] sm:text-[9px] text-gray-600 mt-0.5 leading-tight hidden sm:block">An Autonomous Institution, Approved by AICTE, Affiliated to Anna University</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links (Right) -->
                <div class="hidden md:flex flex-col items-end w-full pl-[360px]">
                    <div class="flex flex-wrap justify-end gap-x-4 sm:gap-x-5 gap-y-1 text-[13px] font-bold mb-1.5">
                        <a href="/student-result-system/index.php" class="hover:text-amber-300 transition-colors">Home</a>
                        <?php if(isset($_SESSION['admin'])): ?>
                            <a href="/student-result-system/admin/view-students.php" class="hover:text-amber-300 transition-colors">Directory</a>
                            <a href="/student-result-system/admin/upload-marks.php" class="hover:text-amber-300 transition-colors">Upload Marks</a>
                            <a href="/student-result-system/admin/add-student.php" class="hover:text-amber-300 transition-colors">Add Students</a>
                            <a href="/student-result-system/admin/logout.php" class="text-red-300 hover:text-red-400 transition-colors">Admin Logout</a>
                        <?php elseif(isset($_SESSION['student'])): ?>
                            <a href="/student-result-system/student/dashboard.php" class="hover:text-amber-300 transition-colors">My Dashboard</a>
                            <a href="/student-result-system/student/logout.php" class="text-red-300 hover:text-red-400 transition-colors">Logout</a>
                        <?php else: ?>
                            <a href="/student-result-system/student/login.php" class="hover:text-amber-300 transition-colors">Student Login</a>
                            <a href="/student-result-system/admin/login.php" class="hover:text-amber-300 transition-colors">Admin Panel</a>
                        <?php endif; ?>
                    </div>
                    <!-- Additional mock links to match the dense link bar if needed -->
                    <div class="hidden lg:flex justify-end gap-x-4 text-[11px] font-semibold text-purple-200">
                        <a href="#" class="hover:text-white">Achievements</a>
                        <a href="#" class="hover:text-white">Careers</a>
                        <a href="#" class="hover:text-white">Mandatory Disclosure</a>
                        <a href="#" class="hover:text-white">AICTE-Scholarship-Fellowship</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sub Navigation Bar -->
        <div class="bg-white border-b border-gray-200 shadow-sm relative z-40 hidden md:block">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 md:py-3 flex justify-end pl-[360px]">
                <div class="flex flex-wrap justify-end gap-x-6 sm:gap-x-8 text-[13px] font-bold text-[#1e3a8a]">
                    <a href="#" class="hover:text-[#4b2482]">Admission Enquiry 2026-2027</a>
                    <a href="#" class="hover:text-[#4b2482]">Information Brochure 2026-2027</a>
                    <a href="#" class="hover:text-[#4b2482]">For Admission Contact -</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content wrapper -->
    <main class="flex-grow w-full">
