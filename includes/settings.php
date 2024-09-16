<?php
// Renderizar la página de configuración del plugin
function wcagRenderSettingsPage() {
    ?>
    <div class="wrap">
        <h1>Configuración del Plugin</h1>
        
        <form method="post" action="options.php">
            <?php
            settings_fields('wcag_settings_group');
            do_settings_sections('wcag_settings');
            ?>
            
            <h2>Redes Sociales</h2>
            <?php
            $networks = [
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'pinterest' => 'Pinterest',
                'linkedin' => 'LinkedIn',
                'tumblr' => 'Tumblr',
                'reddit' => 'Reddit',
                'whatsapp' => 'WhatsApp',
                'email' => 'Email',
                'sms' => 'SMS',
                'vk' => 'VKontakte',
                'ok' => 'OK.ru',
                'douban' => 'Douban',
                'baidu' => 'Baidu',
                'xing' => 'Xing',
                'renren' => 'RenRen',
                'weibo' => 'Weibo',
                'telegram' => 'Telegram'
            ];

            foreach ($networks as $key => $label) {
                ?>
                <h3><?php echo $label; ?></h3>
                <label>
                    <input type="checkbox" name="wcag_social_networks[<?php echo $key; ?>][desktop]" value="1" <?php checked(1, get_option('wcag_social_networks')[$key]['desktop']); ?>>
                    Mostrar en escritorio
                </label>
                <label>
                    <input type="checkbox" name="wcag_social_networks[<?php echo $key; ?>][mobile]" value="1" <?php checked(1, get_option('wcag_social_networks')[$key]['mobile']); ?>>
                    Mostrar en móvil
                </label>
                <?php
            }
            ?>

            <h2>Opciones de Accesibilidad</h2>
            <label>
                <input type="checkbox" name="wcag_enable_accessibility" value="1" <?php checked(1, get_option('wcag_enable_accessibility')); ?>>
                Activar Accesibilidad
            </label>

            <label>
                <input type="checkbox" name="wcag_enable_tts" value="1" <?php checked(1, get_option('wcag_enable_tts')); ?>>
                Activar Texto a Voz
            </label>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
