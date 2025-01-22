<header class="bg-fuchsia-800 text-white w-full h-20 ">
    <div class="flex items-center justify-between py-4 px-6">
        <!-- Logo -->
        <a href="#" class="flex items-center">
            <span class="ml-3 text-2xl font-bold">Udemy</span>
        </a>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="lg:hidden text-white focus:outline-none">
         <i class='bx bx-menu h-6 w-6 text-white hover:text-gray-200'></i>
        </button>

        <!-- Icons and User Menu -->
        <div class="flex items-center gap-6">
        

            <!-- Notification Icon -->
            <div class="relative group">
                <button class="relative">
                <i class='bx bx-bell h-6 w-6 text-white hover:text-gray-200'></i>
                <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold rounded-full px-1.5">3</span>
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded shadow-md hidden group-hover:block z-10">
                    <div class="p-4 text-gray-800 text-sm">
                        <p class="font-bold mb-2">Notifications</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2">
                                <div class="bg-green-100 text-green-600 p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p>Task completed successfully!</p>
                            </li>
                            <li class="flex items-start gap-2">
                                <div class="bg-red-100 text-red-600 p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-3-7a4 4 0 110 8 4 4 0 010-8z" />
                                    </svg>
                                </div>
                                <p>Password reset requested.</p>
                            </li>
                            <li class="flex items-start gap-2">
                                <div class="bg-blue-100 text-blue-600 p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l4-4-4-4m8 8l-4-4 4-4" />
                                    </svg>
                                </div>
                                <p>New message from HR.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- User Menu -->
            <div class="relative group z-10">
                <div class="flex items-center gap-2 cursor-pointer">
                    <img class="w-10 h-10 rounded-full border-2 border-gray-300" 
                         src="https://intranet.youcode.ma/storage/users/profile/thumbnail/1130-1727859974.JPG" 
                         alt="Profile Image">
                    <span class="font-medium text-white"><?php echo $_SESSION['username']?></span>
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
                    <form method="POST" action="/logout" class="w-full">
                        <button type="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">
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

    <!-- Mobile Sidebar -->
    <div id="mobile-menu" class="lg:hidden absolute top-0 left-0 w-full h-screen bg-fuchia-700 text-white transform -translate-x-full transition-transform">
        <div class="flex justify-between items-center py-4 px-6">
            <a href="#" class="text-2xl font-bold">CareerLink</a>
            <button id="close-mobile-menu" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="px-6 py-4">
            <a href="#" class="block py-2">Dashboard</a>
            <a href="#" class="block py-2">Messages</a>
            <a href="#" class="block py-2">Settings</a>
            <a href="#" class="block py-2">Logout</a>
        </div>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('-translate-x-full');
    });

    document.getElementById('close-mobile-menu').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('-translate-x-full');
    });
</script>
