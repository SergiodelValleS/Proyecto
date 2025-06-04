
           document.addEventListener("click", (event) => {
            // Verifica si el clic ocurrió en un elemento con la clase "editable"
            if (event.target.classList.contains("editable")) {
                const clickedElement = event.target; // Elemento clicado

                // Crea un campo de texto para editar el contenido
                const input = document.createElement("input");
                input.type = "text";
                input.value = clickedElement.innerText; // Carga el texto actual en el input

                // Reemplaza el elemento clicado con el input temporalmente
                clickedElement.replaceWith(input);

                // Detecta cuando el usuario termina de editar
                input.addEventListener("blur", () => {
                    clickedElement.innerText = input.value; // Actualiza el texto del elemento
                    input.replaceWith(clickedElement); // Restaura el elemento original
                });

                // Detecta si el usuario presiona "Enter" para finalizar la edición
                input.addEventListener("keypress", (event) => {
                    if (event.key === "Enter") {
                        input.blur(); // Finaliza la edición
                    }
                });

                input.focus(); // Enfoca el campo de texto automáticamente
            }
        });