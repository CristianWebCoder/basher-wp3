jQuery(document).ready(function($) {

    function closeServiceModal() {
        $('.modal-service').removeClass('show');
        // $('.main_scrollsnap').removeClass('modal-active');
        $('body').removeClass('modal-active');
    }
    // Función para cerrar todos los modales
    function closeAllModals() {
        $('.modal-service, .modal-video').removeClass('show');
        // $('.main_scrollsnap').removeClass('modal-active');
        $('body').removeClass('modal-active');
        $('.modal-video iframe').remove();
    }

    function openVideoModal(youtubeUrl) {
        var embedUrl = youtubeUrl;
        if (youtubeUrl.includes('watch?v=')) {
            var videoId = youtubeUrl.split('watch?v=')[1];
            embedUrl = 'https://www.youtube.com/embed/' + videoId;
        }

        embedUrl += "?autoplay=1";
        
        var $iframe = $('<iframe>', {
            src: embedUrl,
            frameborder: 0,
            allow: 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture',
            allowfullscreen: true
        });
        $('.modal-video').empty().append($iframe).addClass('show');
    }

    $('.open_modal').on('click', function(event) {
        event.preventDefault();
        var postId = $(this).data('post-id');
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'get_service_details',
                post_id: postId
            },
            success: function(data) {
                $('.modal-service .subtitle').text(data.title);
                $('.modal-service .service_description').text(data.description);
                $('.modal-service .img_modal').attr('src', data.image_url);
                $('.modal iframe').attr('src', data.youtube_iframe_url);
                $('.show-video-modal').attr('href', data.youtube_iframe_url);

                if (data.has_youtube_url) {
                    $('.show-video-modal').attr('href', data.youtube_iframe_url).show();
                } else {
                    $('.show-video-modal').hide();
                }

                $('.modal-service').addClass('show');
                // $('.main_scrollsnap').addClass('modal-active');
                $('body').addClass('modal-active');
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });

    $('.close_video_modal').on('click', function() {
        closeAllModals();
    });

    $('.close_modal').on('click', function() {
        closeServiceModal();
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.modal-service, .modal-video').length) {
            closeAllModals();
        }
    });

    $('.modal-service, .modal-video').on('click', function(event) {
        event.stopPropagation();
    });

    $('.show-video-modal').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();

        var youtubeUrl = $(this).attr('href');
        
        closeServiceModal();
        // $('.main_scrollsnap').addClass('modal-active');
        $('body').addClass('modal-active');
        openVideoModal(youtubeUrl);
    });
});