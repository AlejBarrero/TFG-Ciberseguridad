console.log("SecureDesk cargado");

// Confirmación simple (UX básica)
document.addEventListener("DOMContentLoaded", function () {
    let deletes = document.querySelectorAll(".btn-danger");

    deletes.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            if (!confirm("¿Estás seguro de eliminar esto?")) {
                e.preventDefault();
            }
        });
    });
});
