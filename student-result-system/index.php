<?php include('includes/header.php'); ?>

<!-- Full Width Hero Section (Bannari Amman Style) -->
<div class="relative w-full bg-white overflow-hidden flex flex-col lg:flex-row pb-12 sm:pb-0">
    <!-- Blue/Purple Geometric Background Shape on the right -->
    <div class="absolute right-0 top-0 h-full w-1/3 z-0 overflow-hidden pointer-events-none hidden lg:block">
        <div class="absolute right-[-10%] top-[-10%] w-[120%] h-[120%] bg-[#1e3a8a] rotate-12 origin-top-right transform -skew-x-12 opacity-95"></div>
        <!-- inner accent triangle -->
        <div class="absolute right-[5%] bottom-[10%] w-[100px] h-[100px] border-[20px] border-amber-500 rounded-full opacity-80"></div>
    </div>

    <!-- Virtual Campus Tour Button (Absolute positioned on the right over the blue block) -->
    <div class="absolute right-0 top-1/2 transform -translate-y-1/2 z-20 hidden lg:block pr-8">
        <a href="#" class="inline-block bg-[#4b2482] text-white font-bold px-6 py-3 rounded-l-lg rounded-r-none border-l-4 border-amber-500 shadow-xl hover:bg-amber-500 hover:text-[#4b2482] transition-colors whitespace-nowrap">
            Virtual Campus Tour
        </a>
    </div>

    <!-- Left side: Photo Collage Grid -->
    <div class="w-full lg:w-[45%] p-4 sm:p-6 grid grid-cols-2 grid-rows-2 gap-2 sm:gap-4 relative z-10 bg-white min-h-[400px] lg:min-h-[600px]">
        <div class="col-span-1 row-span-2 relative overflow-hidden rounded-md border-4 border-gray-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Students Award" class="absolute inset-0 w-full h-full object-cover">
        </div>
        <div class="col-span-1 row-span-1 relative overflow-hidden rounded-md border-4 border-gray-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1515162816999-a0c47dc192f7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Student Achievement" class="absolute inset-0 w-full h-full object-cover">
        </div>
        <div class="col-span-1 row-span-1 relative overflow-hidden rounded-md border-4 border-gray-100 shadow-sm group">
            <img src="Photo1.jpg" alt="Graduation Day" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        </div>
    </div>

    <!-- Right side: Stats and Title -->
    <div class="w-full lg:w-[55%] flex flex-col justify-center px-6 sm:px-12 lg:pr-40 relative z-10 pt-8 lg:pt-0">
        <!-- Title -->
        <h2 class="text-4xl sm:text-5xl lg:text-[64px] font-serif italic mb-8 sm:mb-12 leading-tight drop-shadow-sm w-full font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-[#4b2482]">
            Remarkable Achievement
        </h2>

        <!-- TNSkill Badge & Stats Row -->
        <div class="flex flex-col sm:flex-row items-center sm:items-start justify-between w-full relative">
            
            <!-- TNSkill Card -->
            <div class="bg-white rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] p-6 flex flex-col items-center justify-center border-b-4 border-blue-600 mb-8 sm:mb-0 transform sm:-rotate-2 z-20 w-44 shrink-0">
                <div class="text-3xl font-black tracking-tighter">
                    <span class="text-blue-700">TN</span><span class="text-amber-500">Skill</span>
                </div>
                <div class="text-3xl font-extrabold text-[#1e3a8a] mt-2">
                    2025
                </div>
            </div>

            <!-- Stats Container -->
            <div class="flex flex-wrap sm:flex-nowrap justify-center sm:justify-end gap-6 sm:gap-10 w-full pt-4 sm:pt-6">
                
                <!-- 20 Students -->
                <div class="flex flex-col items-center text-center">
                    <svg class="w-10 h-10 text-[#1e3a8a] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <div class="text-5xl font-black text-amber-500 leading-none">20</div>
                    <div class="text-xl font-bold text-[#1e3a8a] mt-1">Students</div>
                </div>

                <!-- 15 Skills -->
                <div class="flex flex-col items-center text-center">
                    <svg class="w-10 h-10 text-[#1e3a8a] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <div class="text-5xl font-black text-amber-500 leading-none">15</div>
                    <div class="text-xl font-bold text-[#1e3a8a] mt-1">Skills</div>
                </div>

                <!-- 08 Silver -->
                <div class="flex flex-col items-center text-center">
                    <svg class="w-10 h-10 text-gray-400 mb-2 drop-shadow-md" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3 6h6l-5 4 2 6-6-4-6 4 2-6-5-4h6z"/></svg>
                    <div class="text-5xl font-black text-amber-500 leading-none">08</div>
                    <div class="text-xl font-bold text-[#1e3a8a] mt-1">Silver</div>
                </div>

                <!-- 12 Gold -->
                <div class="flex flex-col items-center text-center">
                    <svg class="w-10 h-10 text-yellow-500 mb-2 drop-shadow-md" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3 6h6l-5 4 2 6-6-4-6 4 2-6-5-4h6z"/></svg>
                    <div class="text-5xl font-black text-amber-500 leading-none">12</div>
                    <div class="text-xl font-bold text-[#1e3a8a] mt-1">Gold</div>
                </div>

            </div>
        </div>

        <div class="mt-12 lg:hidden flex justify-center w-full relative z-30">
            <a href="#" class="inline-block bg-[#4b2482] text-white font-bold px-8 py-4 rounded-xl shadow-xl hover:bg-amber-500 hover:text-[#4b2482] transition-colors text-lg">
                Virtual Campus Tour
            </a>
        </div>
    </div>
</div>

<!-- Extra Content Section: About ESEC -->
<div id="about" class="py-16 bg-slate-50 overflow-hidden lg:py-20 border-t border-gray-100">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row gap-8 lg:gap-16 items-start mb-16">
            <!-- Text Column -->
            <div class="w-full md:w-[60%] lg:w-[65%]">
                <h2 class="text-3xl sm:text-4xl font-light text-amber-500 mb-6 font-sans">
                    About the <span class="font-bold text-[#4b2482]">Campus</span>
                </h2>
                <p class="text-gray-700 leading-relaxed text-justify sm:text-left text-base sm:text-lg mb-4">
                    Erode Sengunthar Engineering College is an Autonomous, Self-financing Engineering College, Approved by AICTE, New Delhi and Affiliated to Anna University, Chennai. Nestled away from the odds of city life, the campus provides a serene environment for learning in harmony with nature.
                </p>
                <p class="text-gray-700 leading-relaxed text-justify sm:text-left text-base sm:text-lg">
                    The spacious and earth-hugging buildings, punctuated with landscaped courtyards and pathways, are designed to emphasize the connection between education and environmental stewardship. ESEC is committed to shaping the innovators of tomorrow.
                </p>
            </div>

            <!-- Image/Video Pillar -->
            <div class="w-full md:w-[40%] lg:w-[35%]">
                <div class="relative rounded-lg overflow-hidden shadow-lg border-b-4 border-[#4b2482] bg-gray-900">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Campus Director" class="w-full h-auto object-cover opacity-90 hover:opacity-100 transition-opacity">
                    <!-- Play button overlay mock -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="w-16 h-16 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center pb-0.5 pr-0.5">
                            <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <div class="bg-[#f3e8f9] text-[#4b2482] rounded-full p-2.5 hover:bg-purple-200 cursor-pointer transition-colors shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid of Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Feature 1 -->
            <div class="bg-gray-50 p-8 rounded-xl border border-gray-100 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-14 h-14 bg-purple-100 text-[#4b2482] rounded-lg flex items-center justify-center mb-6 border-2 border-amber-500 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-[#4b2482] mb-3">Academic Excellence</h3>
                <p class="text-gray-600">Our outcome-based education system features an industry-ready curriculum designed in tandem with leaders to meet modern technological challenges.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-gray-50 p-8 rounded-xl border border-gray-100 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mb-6 border-2 border-[#4b2482] shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-[#4b2482] mb-3">Top Placements</h3>
                <p class="text-gray-600">A highly dedicated placement cell alongside specialized career development ensures maximum career opportunities in leading multinational corporations.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-gray-50 p-8 rounded-xl border border-gray-100 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-14 h-14 bg-purple-100 text-[#4b2482] rounded-lg flex items-center justify-center mb-6 border-2 border-amber-500 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-[#4b2482] mb-3">Advanced Research</h3>
                <p class="text-gray-600">Extensive high-tech R&D facilities including our NPTEL center, IEEE sections, and specialized incubators focused on deep tech innovation.</p>
            </div>
        </div>

        <!-- Academic Programs -->
        <!-- Academic Programs -->
        <div class="rounded-lg overflow-hidden flex flex-col lg:flex-row mt-12 bg-white drop-shadow-2xl ring-1 ring-gray-200">
            <!-- Left Side: Content -->
            <div class="bg-[#4a2e85] p-10 lg:p-14 lg:w-[60%] flex flex-col justify-center border-b-4 lg:border-b-0 lg:border-r-[6px] border-amber-500 rounded-l-lg lg:rounded-tr-none">
                <h3 class="text-3xl sm:text-[34px] font-bold text-amber-500 mb-4 tracking-tight">Elite Academic Departments</h3>
                <p class="text-purple-50 mb-8 text-[15px] sm:text-[16px] leading-relaxed max-w-xl">We offer a wide range of cutting-edge undergraduate and postgraduate courses tailored to the exact demands of modern innovative industries.</p>
                <ul class="text-white space-y-5 font-semibold text-[15px] sm:text-[16px] mb-12 shrink-0 tracking-wide">
                    <li class="flex items-center"><span class="text-amber-500 font-bold mr-3 text-xl">✓</span> Computer Sci. & Eng. (Cyber Security, AI & ML, IoT)</li>
                    <li class="flex items-center"><span class="text-amber-500 font-bold mr-3 text-xl">✓</span> Information Technology & AI/DS</li>
                    <li class="flex items-center"><span class="text-amber-500 font-bold mr-3 text-xl">✓</span> Electronics and Communication (ECE, EEE, EIE)</li>
                    <li class="flex items-center"><span class="text-amber-500 font-bold mr-3 text-xl">✓</span> Mechanical, Civil, Chemical, & Bio-Technology</li>
                    <li class="flex items-center"><span class="text-amber-500 font-bold mr-3 text-xl">✓</span> MBA & MCA Master's Degree Programs</li>
                </ul>
                <div class="flex flex-wrap gap-4 font-bold text-sm tracking-wide">
                     <a href="https://erode-sengunthar.ac.in/admission/courses-offered/" class="inline-flex justify-center items-center px-8 py-3 bg-amber-500 text-[#4a2e85] rounded hover:bg-amber-400 transition-colors shadow-sm">
                        View All Courses
                     </a>
                     <a href="student/login.php" class="inline-flex justify-center items-center px-8 py-3 bg-transparent border-2 border-white text-white rounded hover:bg-white hover:text-[#4a2e85] transition-colors shadow-sm">
                        Go To Result Portal
                     </a>
                </div>
            </div>
            <!-- Right Side: Image panel -->
            <div class="lg:w-[40%] min-h-[350px] lg:min-h-full bg-cover bg-center rounded-r-lg" style="background-image: url('https://images.unsplash.com/photo-1544531586-fde5298cdd40?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');">
            </div>
        </div>
        
    </div>
</div>

<?php include('includes/footer.php'); ?>
