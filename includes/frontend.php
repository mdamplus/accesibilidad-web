<?php
// Encolar el script en el frontend
function wcagEnqueueScripts() {
    wp_enqueue_script(
        'accesibilidad-web-js',
        plugins_url('/../assets/js/accesibilidadWeb.js', __FILE__),
        [],
        '1.0',
        true
    );

    $keyboard_keys = get_option('wcag_keyboard_keys', []);
    $keyboard_actions = get_option('wcag_keyboard_actions', []);
    $keyboard_urls = get_option('wcag_keyboard_urls', []);

    $shortcuts = [];
    foreach ($keyboard_keys as $index => $key) {
        $shortcuts[] = [
            'modifier' => strtolower($key),
            'action' => strtolower($keyboard_actions[$index]),
            'url' => $keyboard_urls[$index]
        ];
    }

    wp_localize_script('accesibilidad-web-js', 'accesibilidadWeb', [
        'shortcuts' => $shortcuts,
        'socialNetworks' => get_option('wcag_social_networks', []),
        'enableAccessibility' => get_option('wcag_enable_accessibility', 0),
        'enableTTS' => get_option('wcag_enable_tts', 0)
    ]);
}
add_action('wp_enqueue_scripts', 'wcagEnqueueScripts');

// Mostrar los iconos de redes sociales
function wcagDisplaySocialIcons() {
    $social_networks = get_option('wcag_social_networks', []);
    $position = 'left';
    $bottom = 'bottom';

    ?>
    <div id="social-icons" style="position: fixed; <?php echo $position; ?>: 0; bottom: <?php echo $bottom; ?>; z-index: 9999;">
        <?php foreach ($social_networks as $network => $visibility): ?>
            <?php if (!empty($visibility['desktop']) || !empty($visibility['mobile'])): ?>
                <a href="#" class="social-icon <?php echo $network; ?>" style="display: <?php echo !empty($visibility['desktop']) ? 'block' : 'none'; ?>">
                    <!-- Aquí iría el icono correspondiente -->
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php
}
add_action('wp_footer', 'wcagDisplaySocialIcons');

// Mostrar las opciones de accesibilidad
function wcagDisplayAccessibility() {
    $accessibility = get_option('wcag_enable_accessibility', 0);

    if ($accessibility) {
        ?>
        <div id="accessibility-menu" style="position: fixed; top: 10px; right: 10px; z-index: 9999;">
            <div id="accessibility-button" style="cursor: pointer;">
                <img src="<?php echo plugin_dir_url(__FILE__); ?>assets/icons/accessibility-icon.png" alt="Accesibilidad" />
            </div>
            <div id="accessibility-options" style="display: none;">
                <button id="increase-font">A+</button>
                <button id="decrease-font">A-</button>
                <button id="grayscale">Escala de Grises</button>
                <button id="high-contrast">Alto Contraste</button>
                <button id="text-only">Solo Texto</button>
                <button id="reset">Restablecer</button>
            </div>
        </div>
        <?php
    }
}
add_action('wp_footer', 'wcagDisplayAccessibility');

// Mostrar el botón de texto a voz
function wcagDisplayTTS() {
    $tts_enabled = get_option('wcag_enable_tts', 0);

    if ($tts_enabled) {
        ?>
        <div id="tts-button" style="position: fixed; top: 50px; right: 10px; z-index: 9999;">
            <button onclick="speakText()">Leer Página</button>
        </div>
        <?php
    }
}
add_action('wp_footer', 'wcagDisplayTTS');
