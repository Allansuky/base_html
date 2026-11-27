document.querySelectorAll('form[data-confirmar]').forEach((formulario) => {
    formulario.addEventListener('submit', (evento) => {
        if (!window.confirm('¿Confirmas que deseas eliminar esta tarea?')) {
            evento.preventDefault();
        }
    });
});
