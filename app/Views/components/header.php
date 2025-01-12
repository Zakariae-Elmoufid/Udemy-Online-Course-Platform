 <header class="bg-white text-fuchsia-800 py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-2xl font-bold">Youdemy</h1>
            <nav class="hidden md:flex space-x-4  ">
                <a href="#" class="hover:underline py-2">Home</a>
                <a href="#" class="hover:underline py-2">Courses</a>
                <a href="#" class="hover:underline py-2">About Us</a>
                <a href="#" class="hover:underline py-2">Contact</a>
                <a href="auth/login.php" class="bg-fuchsia-800 text-white py-2  px-4 rounded hover:bg-fuchsia-600 hover:fuchsia-800">Login</a>
            </nav>
            <button class="md:hidden bg-white text-fuchsia-800 p-2 rounded focus:outline-none" onclick="toggleMenu()">
                <span>Menu</span>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-fuchsia-800 text-white py-2">
            <a href="#" class="block px-4 py-2 hover:underline">Home</a>
            <a href="#" class="block px-4 py-2 hover:underline">Courses</a>
            <a href="#" class="block px-4 py-2 hover:underline">About Us</a>
            <a href="#" class="block px-4 py-2 hover:underline">Contact</a>
            <a href="#login" class="block px-4 py-2 bg-white text-fuchsia-800 rounded hover:bg-fuchsia-600 hover:text-white">Login</a>
        </div>
    </header> 
   
