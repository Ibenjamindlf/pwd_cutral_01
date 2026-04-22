// --- FUNCIONES AUXILIARES ---

// Funcion encargada de pintar de rojo y mensaje feedback
function marcarInvalido(input, mensaje) {
    // Console.log probado en clase
    // console.log("Estoy dentro de la funcion marcarInvalido()");
    input.classList.remove("is-valid");
    input.classList.add("is-invalid");

    // Buscamos si ya creamos el div de error antes
    let feedback = input.parentElement.querySelector(".invalid-feedback");

    // Si no existe, lo creamos dinámicamente (Excelente práctica de DOM)
    if (!feedback) {
        feedback = document.createElement("div");
        feedback.classList.add("invalid-feedback");
        // Lo insertamos justo debajo del input
        input.insertAdjacentElement("afterend", feedback);
    }
    // Le asignamos el mensaje correspondiente (recibido por parametros)
    feedback.textContent = mensaje;
}

// Funcion encargada de pintar de verde
function marcarValido(input) {
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
}

document.addEventListener("DOMContentLoaded", () => {
    // 1. Capturamos el formulario (id = 'datosPersonales')
    const formulario = document.getElementById("datosPersonales");

    // 2. Escuchamos el evento 'submit' (cuando se aprieta el botón)
    formulario.addEventListener("submit", (evento) => {
        // Evitamos que el formulario viaje a PHP inmediatamente
        evento.preventDefault();

        let formularioValido = true;

        // Definimos las Expresiones Regulares
        const regexTexto = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
        const regexApellido = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/;
        const regexDireccion = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+\s\d+$/;

        // --- VALIDACIONES ---

        // Validar Nombre
        const inputNombre = document.getElementById("nombre");
        if (!regexTexto.test(inputNombre.value.trim())) {
            marcarInvalido(
                inputNombre,
                "El nombre es obligatorio y solo debe contener letras.",
            );
            formularioValido = false;
        } else {
            marcarValido(inputNombre);
        }
        // Validar apellido
        const inputApellido = document.getElementById("apellido");
        if (!regexTexto.test(inputApellido.value.trim())) {
            marcarInvalido(
                inputApellido,
                "El apellido es obligatorio y solo debe contener letras.",
            );
            // IMPORTANTE
            // Si la validacion no es adecuada, entonces la variable correspondiente a verificar su validacion, debe modificar.
            formularioValido = false;
        } else {
            marcarValido(inputApellido);
        }
        // Validar edad ....

        // Validar direccion ....

        // --- ENVÍO FINAL ---
        // Si todas las validaciones pasaron, enviamos el formulario de verdad
        if (formularioValido) {
            formulario.submit();
        }
    });
});
