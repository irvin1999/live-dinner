// Espera a que se cargue el documento
document.addEventListener("DOMContentLoaded", function () {
    // Obtén el formulario
    var form = document.getElementById("contactForm");

    // Agrega un evento de escucha para el envío del formulario
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita el envío del formulario por defecto

        // Realiza la validación del formulario
        if (validateForm()) {
            // Envía el formulario por AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "send_form.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Muestra la respuesta del servidor
                    document.getElementById("msgSubmit").innerHTML = xhr.responseText;
                    document.getElementById("msgSubmit").classList.remove("hidden");
                    form.reset(); // Restablece el formulario
                }
            };

            // Obtén los datos del formulario
            var formData = new FormData(form);

            // Envía la solicitud
            xhr.send(formData);
        }
    });

    // Función para validar el formulario
    function validateForm() {
        // Implementa la lógica de validación aquí
        // Por ejemplo, puedes verificar que los campos requeridos estén completos

        return true; // Devuelve true si el formulario es válido y puede enviarse
    }
});