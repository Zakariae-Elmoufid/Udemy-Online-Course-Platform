<?php
require_once __DIR__."/../../vendor/autoload.php";

use App\Controllers\CourseController;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$Course = new CourseController();

if (isset($_GET['ajax']) ) {
    $courses = $Course->fetchSixCourses($page);

    foreach ($courses as $course) {
        echo "<div class='bg-white p-4 shadow rounded'>";
        echo "<h3 class='text-lg font-bold'>" . htmlspecialchars($course['title']) . "</h3>";
        echo "<p class='text-gray-600'>" . htmlspecialchars($course['description']) . "</p>";
        echo "</div>";
    }
    exit;
}
?>

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
              <?php
              ?>
          </div>
          <!-- Pagination -->
          <div class="flex justify-center mt-8">
              <button id="previous" class="px-4 py-2 bg-fuchsia-500 text-white rounded-l hover:bg-fuchsia-600 disabled:opacity-50" disabled>Previous</button>
              <div id="page-numbers" class="flex items-center bg-white border border-gray-300 px-4 py-2">
                  Page 1
              </div>
              <button id="next" class="px-4 py-2 bg-fuchsia-500 text-white rounded-r hover:bg-fuchsia-600">Next</button>
          </div>
      </div>
  </section>  
         
    

  <?php include "components/footer.php" ?>
<script>
  let currentPage = 1;

function loadPage(page) {
    fetch(`index.php?page=${page}&ajax`) 
        .then(response => response.text())
        .then(data => {
            document.getElementById("course-container").innerHTML = data; // Injecte les cours dans le conteneur
            currentPage = page;

            // Gérer les boutons Previous/Next
            document.getElementById("previous").disabled = currentPage === 1;
            document.getElementById("next").disabled = data.trim() === ""; // Désactiver "Next" si aucune donnée n'est renvoyée
            document.getElementById("page-numbers").textContent = `Page ${currentPage}`;
        })
        .catch(error => console.error("Erreur lors du chargement des cours :", error));
}

// Charger la première page au démarrage
loadPage(currentPage);

// Gestion des boutons Previous et Next
document.getElementById("previous").addEventListener("click", () => {
    if (currentPage > 1) loadPage(currentPage - 1);
});

document.getElementById("next").addEventListener("click", () => {
    loadPage(currentPage + 1);
});



</script>
</body>
</html>