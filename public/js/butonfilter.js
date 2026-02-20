const searchInput = document.getElementById("searchInput");
const cursos = document.querySelectorAll(".curso");
const filtros = document.querySelectorAll(".dropdown-item");

searchInput.addEventListener("keyup", function() {
    const texto = this.value.toLowerCase();

    cursos.forEach(curso => {
        const nombre = curso.textContent.toLowerCase();

        if (nombre.includes(texto)) {
            curso.style.display = "block";
        } else {
            curso.style.display = "none";
        }
    });
});

filtros.forEach(filtro => {
    filtro.addEventListener("click", function(e) {
        e.preventDefault();
        const categoria = this.dataset.filter;

        cursos.forEach(curso => {
            if (categoria === "todos" || curso.dataset.categoria === categoria) {
                curso.style.display = "block";
            } else {
                curso.style.display = "none";
            }
        });
    });
});