$(window).on('load', function() {
    var $loader = $('.loader');
    var $image = $('.loader img');

    setTimeout(function() {
        var duration = 1000; // Duración de la animación de salida en ms
        var startTime = performance.now();

        // Eliminar la animación CSS 'pulse'
        $image.css('animation', 'none');

        // Función para actualizar la animación de salida
        function animate(time) {
            var timeElapsed = time - startTime;
            var progress = timeElapsed / duration;

            // Calcular la nueva escala y opacidad
            var scale = 1 + (29 * progress); // Incrementar de 1 a 30
            var opacity = 1 - progress; // Decrementar de 1 a 0

            // Aplicar transformaciones
            $image.css('transform', 'scale(' + scale + ')');
            $loader.css('opacity', opacity);

            // Si la animación no ha terminado, repetir el frame
            if (timeElapsed < duration) {
                requestAnimationFrame(animate);
            } else {
                // Finalizar la animación
                $loader.css('visibility', 'hidden');
            }
        }

        // Iniciar la animación de salida
        requestAnimationFrame(animate);

    }, 1500);
});