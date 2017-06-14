var winHeight = jQuery(window).height();
jQuery(document).ready(function () {
    jQuery('#billboard').css({'height': winHeight});

    jQuery("#billboard .slider-container").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });
    jQuery(".post-media .gallery").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoHeight : true
    });

    jQuery('.primary-menu').slimmenu({
        resizeWidth: '1000',
        collapserTitle: '',
        animSpeed: 'medium',
        easingEffect: null,
        indentChildren: false,
        childrenIndenter: '&nbsp;',
        expandIcon: '&#9660;'
    });

    jQuery('.icon-search').on('click', function () {
        jQuery(this).parent().toggleClass('active');
    });

    if (jQuery('.sticky-bar ').length > 0) {
        var stickyBarPosition = jQuery('.sticky-bar #site-header').offset().top + 10;
        jQuery(window).on('scroll', function () {
            var scrollPosition = jQuery(window).scrollTop();
            if (scrollPosition > stickyBarPosition) {
                jQuery('.sticky-bar').addClass('sticky-bar-enabled');
            } else {
                jQuery('.sticky-bar').removeClass('sticky-bar-enabled');
            }
        });
    }
});