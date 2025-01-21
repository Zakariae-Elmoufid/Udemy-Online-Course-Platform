
  <header class="bg-white text-fuchsia-600 py-4 border-fuchsia-900 border-b-2"">
        <div class="container mx-auto flex justify-between items-center px-6">
            <!-- Logo -->
            <h1 class="text-2xl font-bold">Udemy</h1>
            
            <!-- Navigation -->
            <nav class="flex items-center space-x-6 ">
                <a href="#course-catalog" class="text-sm font-medium hover:text-gray-300">Course Catalog</a>
                <a href="myCourses.php" class="text-sm font-medium hover:text-gray-300">My Courses</a>
                <!-- Profile Icon -->
            </nav>
            <div class="relative group z-10">
                <div class="flex items-center gap-2 cursor-pointer">
                    <img class="w-10 h-10 rounded-full border-2 border-gray-300" 
                         src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1130-1727859974.JPG" 
                         alt="Profile Image">
                    <span class="font-medium text-black">Teacher</span>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-md hidden group-hover:block">
                    <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 4H7a1 1 0 01-1-1V7a1 1 0 011-1h10a1 1 0 011 1v8a1 1 0 01-1 1z" />
                        </svg>
                        Settings
                    </a>
                    <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16m-7 6h7" />
                        </svg>
                        Edit Profile
                    </a>
                    <form method="POST" action="../auth/logout.php" class="w-full">
                        <button type="submit" name="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
    </div>
        </div>
    </header>