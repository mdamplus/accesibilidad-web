document.addEventListener('DOMContentLoaded', function () {
    const accessibilityButton = document.getElementById('accessibility-button');
    const accessibilityOptions = document.getElementById('accessibility-options');

    accessibilityButton.addEventListener('click', function () {
        accessibilityOptions.style.display = (accessibilityOptions.style.display === 'none') ? 'block' : 'none';
    });

    // Añadir funcionalidad para cada opción de accesibilidad aquí
});
