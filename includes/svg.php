<?php
// Permitir la carga de archivos SVG
function permitirSubidaSVG($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'permitirSubidaSVG');

// Asegurarse de que WordPress reconozca correctamente el tipo MIME para SVG
function permitirSVGMedia($status, $file, $type) {
    if ($type === 'image/svg+xml') {
        $status['ext'] = 'svg';
        $status['mime'] = 'image/svg+xml';
    }
    return $status;
}
add_filter('wp_check_filetype_and_ext', 'permitirSVGMedia', 10, 3);

// Ajustar el estilo para las miniaturas SVG en el panel de administración
function fixSVG() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
add_action('admin_head', 'fixSVG');
