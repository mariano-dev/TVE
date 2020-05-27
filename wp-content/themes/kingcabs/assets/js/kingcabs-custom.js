jQuery(document).ready(function(jQuery) {

    jQuery( '.menu-toggle' ).click( function() {
        jQuery( '.nav-menu' ).slideToggle('slow');
    } );

    jQuery( 'li.menu-item-has-children' ).prepend('<span class="toggle-button"><i class="fa fa-angle-down" aria-hidden="true"></i><span>');
    jQuery( 'li.menu-item-has-children > .toggle-button' ).click( function() {
        jQuery( this ).siblings( 'ul.sub-menu' ).slideToggle('slow');
    } );


    if(jQuery('.main-header li.dropdown ul').length){

        jQuery('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
        
        //Dropdown Button
        jQuery('.main-header li.dropdown .dropdown-btn').on('click', function() {
            jQuery(this).prev('ul').slideToggle(500);
        });
        
        
        //Disable dropdown parent link
        jQuery('.navigation li.dropdown > a').on('click', function(e) {
            e.preventDefault();
        });
    }  
    

    /**
     * Testimonials
     */
    jQuery(".kc-testimonials").lightSlider({
        item:3,
        pager:true,
        loop:true,
        speed:600,
        controls:false,
        slideMargin:20,
        auto:false,
        pauseOnHover:true,
        onSliderLoad: function() {
            jQuery('.kc-testimonials').removeClass('cS-hidden');
        },
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:2,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1,
                  }
            }
        ]
    });

    /**
     * Our Team Member
     */

    var teamcolumn = kingcabs_ajax_script.teamcolumn;

    jQuery(".team-carousel").lightSlider({
        item: teamcolumn ,
        pager:false,
        loop:true,
        speed:600,
        controls:true,
        slideMargin:20,
        auto:false,
        pauseOnHover:true,
        onSliderLoad: function() {
            jQuery('.team-carousel').removeClass('cS-hidden');
        },
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:2,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1,
                  }
            }
        ]
    });


    /**
     * Our Client/Brand Logo
     */
    jQuery(".happy-clients").lightSlider({
        item:4,
        pager:false,
        loop:true,
        speed:600,
        controls:false,
        slideMargin:20,
        auto:true,
        pauseOnHover:true,
        onSliderLoad: function() {
            jQuery('.team-carousel').removeClass('cS-hidden');
        },
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:2,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1,
                  }
            }
        ]
    });


    /**
     * Init Counter 
    */
    jQuery('.counter').counterUp({ delay: 4, time: 1000 });(jQuery);


    /**
     * Scroll To Top
    */
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.scroll-top').fadeIn();
        } else {
            jQuery('.scroll-top').fadeOut();
        }
    });

    //Click event to scroll to top
    jQuery('.scroll-top').click(function() {
        jQuery('html, body').animate({ scrollTop: 0 }, 900);
        return false;
    });

    /**
     * Isotop Active
    */
    if (jQuery.fn.isotope) {
        jQuery(".isotop-active").isotope({
            filter: '*',
        });

            jQuery('.gallery-nav ul li').on('click', function() {
            jQuery(".gallery-nav ul li").removeClass("active");
            jQuery(this).addClass("active");

            var selector = jQuery(this).attr('data-filter');
            jQuery(".isotop-active").isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'easeInOutQuart',
                    queue: false,
                }
            });
            return false;
        });
    }

});

jQuery(window).on('load', function() {  

    var offset = 1000,
    offset_opacity = 1200,
    scroll_top_duration = 500, //grab the "back to top" link
    jQueryback_to_top = jQuery('.scroll-top');

    //hide or show the "back to top" link
    jQuery(window).on('scroll', function() {
        (jQuery(this).scrollTop() > offset) ? jQueryback_to_top.addClass('scroll-top-visible'): jQueryback_to_top.removeClass('scroll-top-visible scroll-top-fade-out');
    if (jQuery(this).scrollTop() > offset_opacity) {
        jQueryback_to_top.addClass('scroll-top-fade-out');
    }
});

});(jQuery);

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var container, button, menu, links, i, len;

    container = document.getElementById( 'site-navigation' );
    if ( ! container ) {
        return;
    }

    button = container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof button ) {
        return;
    }

    menu = container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof menu ) {
        button.style.display = 'none';
        return;
    }

    menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
        menu.className += ' nav-menu';
    }

    button.onclick = function() {
        if ( -1 !== container.className.indexOf( 'toggled' ) ) {
            container.className = container.className.replace( ' toggled', '' );
            button.setAttribute( 'aria-expanded', 'false' );
            menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            container.className += ' toggled';
            button.setAttribute( 'aria-expanded', 'true' );
            menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    links    = menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( i = 0, len = links.length; i < len; i++ ) {
        links[i].addEventListener( 'focus', toggleFocus, true );
        links[i].addEventListener( 'blur', toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'focus' ) ) {
                    self.className = self.className.replace( ' focus', '' );
                } else {
                    self.className += ' focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( container ) {
        var touchStartFn, i,
            parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, i;

                if ( ! menuItem.classList.contains( 'focus' ) ) {
                    e.preventDefault();
                    for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
                        if ( menuItem === menuItem.parentNode.children[i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[i].classList.remove( 'focus' );
                    }
                    menuItem.classList.add( 'focus' );
                } else {
                    menuItem.classList.remove( 'focus' );
                }
            };

            for ( i = 0; i < parentLink.length; ++i ) {
                parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( container ) );
} )();
