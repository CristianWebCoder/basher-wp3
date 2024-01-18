function createCustomSelect(realSelectId) {
    var $realSelect = $('#' + realSelectId);
    var firstOptionText = $realSelect.find('option:first').text(); // Obtiene el texto de la primera opción
    var $customSelect = $('<div class="custom-select"></div>');
    var $customSelectDisplay = $('<div class="custom-select-display"></div>');
    var $displayText = $('<span></span>').text(firstOptionText); // Crea un span para el texto

    $customSelectDisplay.append($displayText); // Añade el span al custom-select-display

    var $customOptions = $('<div class="custom-options" style="display: none;"></div>');

    $realSelect.find('option').each(function() {
        var $option = $(this);
        var $customOption = $('<div class="custom-option"></div>').text($option.text());

        $customOption.on('click', function() {
            $realSelect.val($option.val()).trigger('change');
            $displayText.text($option.text()); // Actualiza el texto del span
            $customOptions.hide();
            $customSelect.removeClass('open');
        });

        $customOptions.append($customOption);
    });

    $customSelect.append($customSelectDisplay);
    $customSelect.append($customOptions);

    $customSelectDisplay.on('click', function() {
        $customOptions.toggle();
        $customSelect.toggleClass('open');
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.custom-select').length) {
            $customOptions.hide();
            $customSelect.removeClass('open');
        }
    });

    // Añadir el select personalizado después del select real
    $realSelect.after($customSelect);
}

$(document).ready(function() {
    createCustomSelect('select-real-identi');
    createCustomSelect('select-real-contacto');
});

$(document).ready(function() {
    // Función para mostrar/ocultar campos basado en la selección
    function toggleContactFields() {
        var selectedOption = $('#select-real-contacto').val();

        if (selectedOption === 'Whatsapp') {
            $('.box_input_whatsapp').show();
            $('.box_input_telegram').hide();
        } else if (selectedOption === 'Telegram') {
            $('.box_input_telegram').show();
            $('.box_input_whatsapp').hide();
        } else {
            // Oculta ambos campos si la opción seleccionada es "Seleccione una opción de contacto" o cualquier otra opción
            $('.box_input_whatsapp, .box_input_telegram').hide();
        }
    }
    $('.box_input_whatsapp, .box_input_telegram').hide();
    $('#select-real-contacto').change(toggleContactFields);
    toggleContactFields();
});



document.addEventListener('wpcf7mailsent', function(event) {
    var $containerThankYou = jQuery('.container_thank_you');
    var $containerForm = jQuery('.container_form');

    // Mostrar el mensaje de agradecimiento y ocultar el formulario
    $containerThankYou.addClass('active');
    $containerForm.addClass('hide');

    // Esperar 3 segundos (3000 milisegundos) y luego revertir los cambios
    setTimeout(function() {
        $containerThankYou.removeClass('active');
        $containerForm.removeClass('hide');
    }, 3000); // 3000 milisegundos equivalen a 3 segundos
}, false);