<?php

// Añadir acción para ocultar notificaciones en el área de administración y la página de inicio de sesión
add_action('admin_enqueue_scripts', 'ocultarNotificaciones');
add_action('login_enqueue_scripts', 'ocultarNotificaciones');

function ocultarNotificaciones() {
    // Añadir CSS en línea para ocultar notificaciones
    echo '<style>
        .notice, .notice-warning, .update-nag, .updated, .error, .is-dismissible {
            display: none !important;
        }
    </style>';
}
