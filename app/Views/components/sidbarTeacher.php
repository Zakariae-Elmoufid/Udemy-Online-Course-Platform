<div class="w-full md:min-w-28 md:max-w-72 bg-fuchsia-800 text-white flex flex-col">

            <!-- Logo Section -->

            <div class="text-center my-10">
                <img src="../public/images/profil.jpg"
                 alt="Youdemy Logo" class="w-20 mx-auto rounded-full">
            </div>
            <nav class="flex-grow">
            <ul>
                  <li class="p-4 hover:bg-blue-700">
                    <a href="../teacher/index.php"class="flex items-center space-x-2">
                        <span>🏠</span>
                        <span>Home</span>
                    </a>
                </li>
                <li class="p-4 hover:bg-blue-700">
                    <a href="../teacher/courses.php" class="flex items-center space-x-2">
                        <span>📚</span>
                        <span>My Courses</span>
                    </a>
                </li>
                    <li class="p-4 hover:bg-blue-700">
                        <a href="../teacher/add.php" class="flex items-center space-x-2">
                            <span>📝</span>
                            <span>Add New Course</span>
                        </a>
                    </li>
                    <li class="p-4 hover:bg-blue-700">
                        <a href="../teacher/delete.php" class="flex items-center space-x-2">
                            <span>⚙️</span>
                            <span>sitenge</span>
                        </a>
                    </li>
                    
                </ul>
            
            </nav>

            <div class="p-4 text-center">
                <form action="../auth/logout.php" method="POST">
                    <button class="w-full bg-fuchsia-700 py-2 rounded hover:bg-fuchsia-800" type="submit" name="submit">
                        Logout
                    </button>
                </form>
            </div>
            
            <div class="mt-auto text-center">
                <p class="text-sm">Youdemy &copy; 2025</p>
            </div>


        </div>