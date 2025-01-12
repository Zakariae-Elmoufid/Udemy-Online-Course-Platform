<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      label img {
            border: 4px solid transparent;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s, border-color 0.3s;
        }
        input[type="radio"]:checked + label img {
            border-color: #d946ef; 
            transform: scale(1.1); 
        }
    </style>

</head>
<body class="bg-fuchsia-100">

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
            <h2 class="text-3xl font-bold text-fuchsia-800 mb-6 text-center">Register</h2>


            <form action="" method="POST">
          
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700">Username</label>
                        <input type="text" id="username" name="username" class="w-full p-3 border border-gray-300 rounded mt-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded mt-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded mt-2" required>
                    </div>
                   
                    <section class="form-section">
                 <div class="mb-6 text-center">
                         <p class="text-gray-700 mb-4">Select your role</p>
     
                         <div class="flex justify-center gap-8">
                             <div class="relative">
                                 <input type="radio" class="hidden" id="teacher" name="role" value="teacher" required>
                                 <label for="teacher"class="cursor-pointer" >
                                     <img src="https://i.pinimg.com/474x/ea/0c/ca/ea0cca6a099dd0dbd03e1ce427699355.jpg"
                                     alt="Teacher"
                                  class="w-24 h-24 rounded-lg transition-transform ">
                                 </label>
                                 <p class="mt-2 text-gray-700">Teacher</p>
                             </div>
     
                             <div>
                                 <input type="radio" class="hidden" id="student" name="role" value="student">
                                 <label for="student">
                                     <img src="https://i.pinimg.com/474x/22/12/37/221237a92d7420f35b91a275e181d5ea.jpg"
                                     class="w-24 h-24 rounded-lg transition-transform  ">
                                     
                                 </label>
                                 <p class="mt-2 text-gray-700">Student</p>
                             </div>
                         </div>
                     </div>
             </section>



                <div class="mb-4 hidden form-section" id="teacher1">
                <label for="specialty" class="block text-gray-700">Specialty</label>
                    <select id="specialty" name="specialty" class="w-full p-3 border border-gray-300 rounded mt-2" required>
                        <option value="" disabled selected>Select your specialty</option>
                        <option value="mathematics">Mathematics</option>
                        <option value="physics">Physics</option>
                        <option value="computer-science">Computer Science</option>
                        <option value="literature">Literature</option>
                    </select>
                </div>

                <div class="mb-4 hidden form-section " id="student1">
                <label class="block text-gray-700 mb-2">Fields of Study</label>
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="fields" value="science" class="h-4 w-4">
                            <span>Science</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="fields" value="engineering" class="h-4 w-4">
                            <span>Engineering</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="fields" value="business" class="h-4 w-4">
                            <span>Business</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="fields" value="arts" class="h-4 w-4">
                            <span>Arts</span>
                        </label>
                     </div>
                </div>
                <div>
                    <button  class="w-full bg-fuchsia-800 text-white py-3 px-6 rounded hover:bg-fuchsia-600 transition" id="next">Register</button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm">Already have an account? <a href="login.php" class="text-fuchsia-800 hover:underline">Login</a></p>
            </div>
        </div>
    </div>
  
    <script>
 
    const teacherSection = document.getElementById('teacher1');
    const studentSection = document.getElementById('student1');


   

        const roleRadios = document.querySelectorAll('input[name="role"]'); 
roleRadios.forEach((radio) => {
    radio.addEventListener("change", () => {
        const selectedRole = document.querySelector('input[name="role"]:checked');
        
        if (selectedRole.value === 'teacher') {
            teacherSection.classList.remove('hidden');
            studentSection.classList.add('hidden');
        } else if (selectedRole.value === 'student') {
            studentSection.classList.remove('hidden');
            teacherSection.classList.add('hidden');
        }
    });
});


  </script>
</body>
</html>