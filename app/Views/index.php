<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">   
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Youdemy - Online Learning Platform</title>
    

</head>
<body class="bg-gray-100 text-gray-900">
<?php include "components/header.php" ?>

 <!-- Hero Section -->
 <section class="bg-fuchsia-100 py-20">
      <div class="container mx-auto text-center px-4">
            <h2 class="text-4xl font-bold text-fuchsia-800 mb-4">Unlock Your Learning Potential</h2>
            <p class="text-lg text-gray-700 mb-8">Explore thousands of online courses tailored to your needs.</p>
            <a href="#courses" class="bg-fuchsia-800 text-white py-3 px-6 rounded hover:bg-fuchsia-600">Browse Courses</a>
            <a href="#courses" class="bg-fuchsia-800 text-white py-3 px-6 rounded hover:bg-fuchsia-600">Sing Up</a>
          </div>
   </section>
         

   <section id="catalog" class="py-16 bg-gray-100">
      <div class="container mx-auto px-4">
          <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Course Catalog</h2>
          <div id="course-container" class="grid grid-cols-1 md:grid-cols-3 gap-8">
          </div>
          <!-- Pagination -->
          <div class="flex justify-center mt-8">
              <button id="prev-btn" class="px-4 py-2 bg-fuchsia-500 text-white rounded-l hover:bg-fuchsia-600 disabled:opacity-50" disabled>Previous</button>
              <div id="page-numbers" class="flex items-center bg-white border border-gray-300 px-4 py-2">
                  Page 1
              </div>
              <button id="next-btn" class="px-4 py-2 bg-fuchsia-500 text-white rounded-r hover:bg-fuchsia-600">Next</button>
          </div>
      </div>
  </section>  
         
    

  <?php include "components/footer.php" ?>

  <!-- <script>
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        const courses = [
    { title: "Course 1", description: "Learn about topic 1." },
    { title: "Course 2", description: "Learn about topic 2." },
    { title: "Course 3", description: "Learn about topic 3." },
    { title: "Course 4", description: "Learn about topic 4." },
    { title: "Course 5", description: "Learn about topic 5." },
    { title: "Course 6", description: "Learn about topic 6." },
    { title: "Course 7", description: "Learn about topic 7." },
    { title: "Course 8", description: "Learn about topic 8." },
    { title: "Course 9", description: "Learn about topic 9." },
]; // Exemple de données

const coursesPerPage = 3;
let currentPage = 1;

function renderCourses(page) {
    const start = (page - 1) * coursesPerPage;
    const end = start + coursesPerPage;
    const currentCourses = courses.slice(start, end);

    const courseContainer = document.getElementById("course-container");
    courseContainer.innerHTML = "";

    currentCourses.forEach(course => {
        const courseCard = `
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">${course.title}</h3>
                    <p class="text-gray-700">${course.description}</p>
                </div>
            </div>`;
        courseContainer.innerHTML += courseCard;
    });

    // Update pagination info
    document.getElementById("page-numbers").textContent = `Page ${page}`;
    document.getElementById("prev-btn").disabled = page === 1;
    document.getElementById("next-btn").disabled = page === Math.ceil(courses.length / coursesPerPage);
}

document.getElementById("prev-btn").addEventListener("click", () => {
    if (currentPage > 1) {
        currentPage--;
        renderCourses(currentPage);
    }
});

document.getElementById("next-btn").addEventListener("click", () => {
    if (currentPage < Math.ceil(courses.length / coursesPerPage)) {
        currentPage++;
        renderCourses(currentPage);
    }
});

// Initial render
renderCourses(currentPage);

</script> -->

</body>
</html>