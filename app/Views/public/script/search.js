document.getElementById("search-input").addEventListener("input", function () {
    const query = this.value.trim();
    const courseContainer = document.getElementById("course-container");
    const searchContainer = document.getElementById("course-container-search");

    if (query.length > 2) {
        courseContainer.classList.add("hidden");

        searchContainer.classList.remove("hidden");

        fetch(`index.php?query=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(data => {
                searchContainer.innerHTML = data;
            })
            .catch(error => console.error("Erreur lors de la recherche :", error));
    } else {
        courseContainer.classList.remove("hidden");
        searchContainer.classList.add("hidden");
        searchContainer.innerHTML = ""; 
    }
});