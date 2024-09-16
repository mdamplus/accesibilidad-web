<?php
/**
 * Plugin Name: Accesibilidad Web A - AA - AAA
 * Plugin URI: https://tu-sitio.com
 * Description: Un plugin para mejorar la accesibilidad web y cumplir con el nivel de las WCAG.
 * Version: 2024.09.14 X
 * Author: martinarnedo.com
 * Author URI: https://martinarnedo.com
 * License: GPLv2 or later
 * Text Domain: accesibilidad-web
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Cargar los archivos de estilos y scripts
// Enqueue script with localized data
function wcagEnqueueAssets() {
    wp_enqueue_style('wcag-css', plugin_dir_url(__FILE__) . 'assets/css/accesibilidadWeb.css');
    wp_enqueue_script('wcag-js', plugin_dir_url(__FILE__) . 'assets/js/accesibilidadWeb.js', array('jquery'), null, true);

    // meto el script de accesibilidad
    wp_localize_script('wcag-js', 'accesibilidadWeb', array(
        'shortcuts' => array(), // Agrega los datos necesarios ??
        'socialNetworks' => array(),
        'enableAccessibility' => get_option('wcag_enable_accessibility', false),
        'enableTTS' => get_option('wcag_enable_tts', false),
    ));
}
add_action('wp_enqueue_scripts', 'wcagEnqueueAssets');

// Incluir archivos para funcionalidades
require_once plugin_dir_path(__FILE__) . 'includes/menu.php';
require_once plugin_dir_path(__FILE__) . 'includes/info.php';
require_once plugin_dir_path(__FILE__) . 'includes/keyboard.php';
require_once plugin_dir_path(__FILE__) . 'includes/frontend.php';
require_once plugin_dir_path(__FILE__) . 'includes/svg.php';
require_once plugin_dir_path(__FILE__) . 'includes/notice.php';
require_once plugin_dir_path(__FILE__) . 'includes/settings.php';



// Registrar opciones
function wcagRegisterSettings() {
    register_setting('wcag_settings_group', 'wcag_social_networks');
    register_setting('wcag_settings_group', 'wcag_enable_accessibility');
    register_setting('wcag_settings_group', 'wcag_enable_tts');
}
add_action('admin_init', 'wcagRegisterSettings');
