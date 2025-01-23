let currentPage = 1;

function loadPage(page) {
    fetch(`index.php?page=${page}&ajax`)
        .then(response => response.text())
        .then(data => {
            document.getElementById("course-container").innerHTML = data; 
            currentPage = page;

            document.getElementById("previous").disabled = currentPage === 1;
            document.getElementById("next").disabled = data.trim() === ""; 
            document.getElementById("page-numbers").textContent = `Page ${currentPage}`;
        })
        .catch(error => console.error("Erreur lors du chargement des cours :", error));
}

document.getElementById("previous").addEventListener("click", () => {
    if (currentPage > 1) loadPage(currentPage - 1);
});

document.getElementById("next").addEventListener("click", () => {
    loadPage(currentPage + 1);
});

loadPage(currentPage);
