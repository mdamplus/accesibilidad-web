<?php
if (!defined('ABSPATH')) {
    exit;
}

// Obtener las teclas y URLs guardadas previamente
$keyboard_keys = get_option('wcag_keyboard_keys', []);
$keyboard_actions = get_option('wcag_keyboard_actions', []);
$keyboard_urls = get_option('wcag_keyboard_urls', []);
?>

<div class="wrap">
    <h1>Acceso Teclado</h1>
    <p>Selecciona entre CTRL y Option o Alt más una tecla e incluye una URL para facilitar el acceso navegable por teclado.</p>

    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
        <input type="hidden" name="action" value="wcag_save_keyboard">
        
        <div id="keyboard-fields">
            <?php if (!empty($keyboard_keys)): ?>
                <?php foreach ($keyboard_keys as $index => $key): ?>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="select">
                                <select name="wcag_keyboard_keys[]">
                                    <option value="ctrl" <?php selected($key, 'ctrl'); ?>>CTRL</option>
                                    <option value="alt" <?php selected($key, 'alt'); ?>>Option / Alt</option>
                                    <option value="shift" <?php selected($key, 'shift'); ?>>Shift</option>
                                </select>
                            </div>
                        </div>
                        <div class="control">
                            <input class="input" type="text" name="wcag_keyboard_actions[]" value="<?php echo esc_attr($keyboard_actions[$index]); ?>" placeholder="Ej. F1, A, etc." />
                        </div>
                        <div class="control">
                            <input class="input" type="url" name="wcag_keyboard_urls[]" value="<?php echo esc_url($keyboard_urls[$index]); ?>" placeholder="Ej. https://ejemplo.com" />
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Si no hay teclas preguardadas, muestra un campo vacío por defecto -->
                <div class="field is-grouped">
                    <div class="control">
                        <div class="select">
                            <select name="wcag_keyboard_keys[]">
                                <option value="ctrl">CTRL</option>
                                <option value="alt">Option / Alt</option>
                                <option value="shift">Shift</option>
                            </select>
                        </div>
                    </div>
                    <div class="control">
                        <input class="input" type="text" name="wcag_keyboard_actions[]" placeholder="Ej. F1, A, etc." />
                    </div>
                    <div class="control">
                        <input class="input" type="url" name="wcag_keyboard_urls[]" placeholder="Ej. https://ejemplo.com" />
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="field">
            <div class="control">
                <button type="button" class="button is-info" id="add-keyboard-field">Agregar más teclas</button>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.getElementById('add-keyboard-field');
    const keyboardFields = document.getElementById('keyboard-fields');

    // Añadir más campos al hacer clic en "Agregar más teclas"
    addButton.addEventListener('click', function() {
        const newField = `
            <div class="field is-grouped">
                <div class="control">
                    <div class="select">
                        <select name="wcag_keyboard_keys[]">
                            <option value="ctrl">CTRL</option>
                            <option value="alt">Option / Alt</option>
                            <option value="shift">Shift</option>
                        </select>
                    </div>
                </div>
                <div class="control">
                    <input class="input" type="text" name="wcag_keyboard_actions[]" placeholder="Ej. F1, A, etc." />
                </div>
                <div class="control">
                    <input class="input" type="url" name="wcag_keyboard_urls[]" placeholder="Ej. https://ejemplo.com" />
                </div>
            </div>
        `;
        keyboardFields.insertAdjacentHTML('beforeend', newField);
    });
});
</script>
