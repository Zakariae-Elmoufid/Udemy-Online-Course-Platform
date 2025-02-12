<aside class="w-full md:min-w-28 md:max-w-72 bg-blue-900 text-white flex flex-col">
            <div class="p-4 text-center font-bold text-xl border-b border-blue-700">
                Admin Dashboard
            </div>
            <nav class="flex-grow">
            <ul>
                  <li class="p-4 hover:bg-blue-700">
                    <a href="" class="flex items-center space-x-2">
                        <span>📊</span>
                        <span>Global Statistics</span>
                    </a>
                </li>
                    <li class="p-4 hover:bg-blue-700">
                        <a href="userManagment/teacherValidation.php" class="flex items-center space-x-2">
                            <span>📝</span>
                            <span>Teacher Account Validation</span>
                        </a>
                    </li>
                    <li class="p-4 hover:bg-blue-700">
                        <a href="userManagment/userValidation.php" class="flex items-center space-x-2">
                            <span>👤</span>
                            <span>User Management</span>
                        </a>
                    </li>
                    <li class="p-4 hover:bg-blue-700">
                        <a href="contentManagment/index.php" class="flex items-center space-x-2">
                            <span>📚</span>
                            <span>Content Management</span>
                        </a>
                    </li>
                    
                </ul>
            </nav>

            <div class="p-4 text-center">
                <form action="../auth/logout.php" method="POST"> 
                    <button class="w-full bg-blue-700 py-2 rounded hover:bg-blue-800" type="submit" name="submit">
                        Logout
                    </button>
                </form>
            </div>
            
        </aside>