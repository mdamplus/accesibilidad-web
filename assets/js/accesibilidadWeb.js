document.addEventListener('DOMContentLoaded', function () {
    // Verifica que accesibilidadWeb está definido
    if (typeof accesibilidadWeb === 'undefined') {
        console.error('El objeto accesibilidadWeb no está definido.');
        return;
    }

    // Verifica y usa datos de accesibilidadWeb
    if (typeof accesibilidadWeb.shortcuts === 'object') {
        // No es necesario analizar, accesibilidadWeb.shortcuts ya es un objeto
        const shortcuts = accesibilidadWeb.shortcuts;

        // Escuchar los eventos del teclado
        document.addEventListener('keydown', function (event) {
            // Verificar si se presiona una tecla modificadora y otra tecla
            shortcuts.forEach(function (shortcut) {
                const modifierKey = shortcut.modifier.toLowerCase();
                const actionKey = shortcut.action.toLowerCase();
                const url = shortcut.url;

                // Verificar si la tecla modificadora (CTRL, ALT) y la tecla de acción están presionadas
                if (
                    (modifierKey === 'ctrl' && event.ctrlKey) ||
                    (modifierKey === 'alt' && event.altKey) ||
                    (modifierKey === 'shift' && event.shiftKey)
                ) {
                    if (event.key.toLowerCase() === actionKey) {
                        // Redirigir a la URL configurada
                        window.location.href = url;
                    }
                }
            });
        });
    } else {
        console.error('Esperaba un objeto para shortcuts.');
    }

    // Mostrar íconos de redes sociales
    if (typeof accesibilidadWeb.socialNetworks === 'object') {
        const socialNetworks = {
            'facebook': 'path-to-facebook-icon.svg',
            'twitter': 'path-to-twitter-icon.svg',
            'pinterest': 'path-to-pinterest-icon.svg',
            'linkedin': 'path-to-linkedin-icon.svg',
            'tumblr': 'path-to-tumblr-icon.svg',
            'reddit': 'path-to-reddit-icon.svg',
            'whatsapp': 'path-to-whatsapp-icon.svg',
            'email': 'path-to-email-icon.svg',
            'sms': 'path-to-sms-icon.svg',
            'vk': 'path-to-vk-icon.svg',
            'ok': 'path-to-ok-icon.svg',
            'douban': 'path-to-douban-icon.svg',
            'baidu': 'path-to-baida-icon.svg',
            'xing': 'path-to-xing-icon.svg',
            'renren': 'path-to-renren-icon.svg',
            'weibo': 'path-to-weibo-icon.svg',
            'telegram': 'path-to-telegram-icon.svg'
        };

        const socialNetworkIcons = document.createElement('div');
        socialNetworkIcons.id = 'social-network-icons';

        Object.keys(socialNetworks).forEach(network => {
            if (accesibilidadWeb.socialNetworks[network]) {
                const icon = document.createElement('img');
                icon.src = socialNetworks[network];
                icon.alt = network;
                icon.style.position = 'fixed';
                icon.style.zIndex = '9999';
                icon.style.bottom = accesibilidadWeb.socialNetworks[network].mobile ? '10px' : 'auto';
                icon.style.left = accesibilidadWeb.socialNetworks[network].position === 'left' ? '10px' : 'auto';
                icon.style.right = accesibilidadWeb.socialNetworks[network].position === 'right' ? '10px' : 'auto';
                socialNetworkIcons.appendChild(icon);
            }
        });

        document.body.appendChild(socialNetworkIcons);
    } else {
        console.error('Esperaba un objeto para socialNetworks.');
    }

    // Agregar controles de accesibilidad
    if (accesibilidadWeb.enableAccessibility) {
        const accessibilityMenu = document.createElement('div');
        accessibilityMenu.id = 'accessibility-menu';
        accessibilityMenu.style.position = 'fixed';
        accessibilityMenu.style.bottom = '10px';
        accessibilityMenu.style.right = '10px';
        accessibilityMenu.style.zIndex = '9999';
        accessibilityMenu.style.backgroundColor = '#333';
        accessibilityMenu.style.color = '#fff';
        accessibilityMenu.style.padding = '10px';
        accessibilityMenu.style.borderRadius = '5px';
        accessibilityMenu.style.cursor = 'pointer';

        const accessibilityIcon = document.createElement('img');
        accessibilityIcon.src = 'path-to-accessibility-icon.svg'; // Cambia esto por la ruta del ícono de accesibilidad
        accessibilityIcon.alt = 'Accesibilidad';
        accessibilityMenu.appendChild(accessibilityIcon);

        const submenu = document.createElement('div');
        submenu.style.display = 'none';

        const options = [
            { id: 'increase-font', text: 'Aumentar tamaño de fuente', icon: 'path-to-increase-font-icon.svg' },
            { id: 'decrease-font', text: 'Disminuir tamaño de fuente', icon: 'path-to-decrease-font-icon.svg' },
            { id: 'grayscale', text: 'Escala de grises', icon: 'path-to-grayscale-icon.svg' },
            { id: 'negative-contrast', text: 'Contraste negativo', icon: 'path-to-negative-contrast-icon.svg' },
            { id: 'high-contrast', text: 'Alto contraste', icon: 'path-to-high-contrast-icon.svg' },
            { id: 'only-text', text: 'Solo texto', icon: 'path-to-only-text-icon.svg' },
            { id: 'reset', text: 'Restablecer', icon: 'path-to-reset-icon.svg' }
        ];

        options.forEach(option => {
            const button = document.createElement('button');
            button.id = option.id;
            button.innerHTML = `<img src="${option.icon}" alt="${option.text}"> ${option.text}`;
            submenu.appendChild(button);
        });

        accessibilityMenu.appendChild(submenu);
        document.body.appendChild(accessibilityMenu);

        // Lógica del menú de accesibilidad
        accessibilityMenu.addEventListener('mouseover', () => {
            submenu.style.display = 'block';
        });

        accessibilityMenu.addEventListener('mouseout', () => {
            submenu.style.display = 'none';
        });

        // Acciones del menú de accesibilidad
        document.getElementById('increase-font').addEventListener('click', () => {
            document.body.style.fontSize = 'larger';
        });

        document.getElementById('decrease-font').addEventListener('click', () => {
            document.body.style.fontSize = 'smaller';
        });

        document.getElementById('grayscale').addEventListener('click', () => {
            document.body.style.filter = 'grayscale(100%)';
        });

        document.getElementById('negative-contrast').addEventListener('click', () => {
            document.body.style.filter = 'invert(100%)';
        });

        document.getElementById('high-contrast').addEventListener('click', () => {
            document.body.style.filter = 'contrast(200%)';
        });

        document.getElementById('only-text').addEventListener('click', () => {
            document.body.style.filter = 'saturate(0)';
        });

        document.getElementById('reset').addEventListener('click', () => {
            document.body.style = '';
        });

        // Activar TTS si está habilitado
        if (accesibilidadWeb.enableTTS) {
            const ttsButton = document.createElement('button');
            ttsButton.id = 'tts-button';
            ttsButton.innerHTML = '<img src="path-to-tts-icon.svg" alt="Texto a voz">';
            ttsButton.style.position = 'fixed';
            ttsButton.style.bottom = '70px';
            ttsButton.style.right = '10px';
            ttsButton.style.zIndex = '9999';
            ttsButton.style.backgroundColor = '#333';
            ttsButton.style.color = '#fff';
            ttsButton.style.padding = '10px';
            ttsButton.style.borderRadius = '50%';
            ttsButton.style.cursor = 'pointer';

            let isSpeaking = false;
            let utterance = null;

            ttsButton.addEventListener('click', () => {
                if (isSpeaking) {
                    if (utterance) {
                        window.speechSynthesis.cancel();
                    }
                    isSpeaking = false;
                } else {
                    utterance = new SpeechSynthesisUtterance(document.body.innerText);
                    window.speechSynthesis.speak(utterance);
                    isSpeaking = true;
                }
            });

            document.body.appendChild(ttsButton);
        }
    }
});
