document.querySelectorAll('form[data-confirmar]').forEach((formulario) => {
    formulario.addEventListener('submit', (evento) => {
        if (!window.confirm('¿Confirmas que deseas eliminar este producto?')) {
            evento.preventDefault();
        }
    });
});
