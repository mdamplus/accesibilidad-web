<?php
// Crear el menú en el admin
function wcagCreateAdminMenu() {
    add_menu_page(
        'Accesibilidad Web',
        'Accesibilidad Web',
        'manage_options',
        'wcag-info',
        'wcagRenderInfoPage',
        'dashicons-universal-access-alt',
        6
    );

    add_submenu_page('wcag-info', 'Información WCAG', 'Información WCAG', 'manage_options', 'wcag-info', 'wcagRenderInfoPage');
    add_submenu_page('wcag-info', 'WCAG A', 'WCAG A', 'manage_options', 'wcag-a', 'wcagRenderInfoPage');
    add_submenu_page('wcag-info', 'WCAG AA', 'WCAG AA', 'manage_options', 'wcag-aa', 'wcagRenderInfoPage');
    add_submenu_page('wcag-info', 'WCAG AAA', 'WCAG AAA', 'manage_options', 'wcag-aaa', 'wcagRenderInfoPage');
    add_submenu_page('wcag-info', 'Acceso Teclado', 'Acceso Teclado', 'manage_options', 'wcag-keyboard', 'wcagRenderKeyboardPage');
    add_submenu_page('wcag-info', 'Configuración', 'Configuración', 'manage_options', 'wcag-settings', 'wcagRenderSettingsPage');
}
add_action('admin_menu', 'wcagCreateAdminMenu');
