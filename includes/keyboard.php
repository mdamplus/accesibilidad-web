<?php
// Renderizar la página de acceso por teclado
function wcagRenderKeyboardPage() {
    if (isset($_GET['page']) && $_GET['page'] === 'wcag-keyboard') {
        include plugin_dir_path(__FILE__) . 'accesible.php';
    }
}
