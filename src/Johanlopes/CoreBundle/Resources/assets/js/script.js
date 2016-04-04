var $ = window.jQuery = require('jquery');
require('bxslider');
require('jquery-modal');
//require('waypoints');

$(document).ready(function($){

    //------------------------------------- Navigation setup ------------------------------------------------//


    //--------- Scroll navigation ---------------//

    $("#mainNav a, #quote a.contact, #logo a").click(function(event){

        event.preventDefault();
        var full_url = this.href;
        var parts = full_url.split("#");
        var trgt = parts[1];
        var target_offset = $("#"+trgt).offset();
        var target_top = target_offset.top;

        $('html,body').animate({scrollTop:target_top -98}, 800);

    });

    //-------------Highlight the current section in the navigation bar------------//
    var sections = $("section");
        var navigation_links = $("#mainNav a");

        /*sections.waypoint({
            handler: function(event, direction) {

                var active_section;
                active_section = $(this);
                if (direction === "up"){
                    active_section = active_section.prev();
                    }

                var active_link = $('#mainNav a[href="#' + active_section.attr("id") + '"]');
                navigation_links.removeClass("active");
                active_link.addClass("active");


            },
            offset: '35%'
        });*/

    //------------------------------------- End navigation setup ------------------------------------------------//


    //--------------------------------- Hover animation for the elements of the portfolio --------------------------------//


    $("a.folio").css({ opacity: 0 });
    $('.work, .item').hover( function(){
        $(this).children('img').animate({ opacity: 0.50 }, 'fast');
        $(this).children('a').animate({ opacity: 1 }, 'fast');
    }, function(){
        $(this).children('img').animate({ opacity: 1 }, 'slow');
        $(this).children('a').animate({ opacity: 0 }, 'slow');
    });



    //--------------------------------- End hover animation for the elements of the portfolio --------------------------------//

    //-----------------------------------Initilaizing fancybox for the portfolio-------------------------------------------------//

        /*$('.portfolio a.folio, .columns_Three a, .blogPost a ').fancybox({
            'overlayShow'   : true,
            'opacity'       : true,
            'transitionIn'  : 'fade',
            'transitionOut' : 'none',
            'overlayOpacity'    :   0.8
        });*/

    //-----------------------------------End initilaizing fancybox for the portfolio-------------------------------------------------//

        //--------------------------------- Sorting portfolio elements with quicksand plugin  --------------------------------//

        var $portfolioClone = $('.portfolio').clone();

        $('.filter a').click(function(e){
            $('.filter li').removeClass('current');
            var $filterClass = $(this).parent().attr('class');
            if ( $filterClass == 'all' ) {
                var $filteredPortfolio = $portfolioClone.find('li');
            } else {
                var $filteredPortfolio = $portfolioClone.find('li[data-type~=' + $filterClass + ']');
            }
            $('.portfolio').quicksand( $filteredPortfolio, {
                duration: 800,
                easing: 'easeInOutQuad'
            }, function(){
                $('.item').hover( function(){
                    $(this).children('img').animate({ opacity: 0.50 }, 'fast');
                    $(this).children('a').animate({ opacity: 1 }, 'fast');
                }, function(){
                    $(this).children('img').animate({ opacity: 1 }, 'slow');
                    $(this).children('a').animate({ opacity: 0 }, 'slow');
                });


    //------------------------------ Reinitilaizing fancybox for the new cloned elements of the portfolio----------------------------//

                /*$('.portfolio a.folio').fancybox({
                    'overlayShow'   : true,
                    'opacity'       : true,
                    'transitionIn'  : 'elastic',
                    'transitionOut' : 'none',
                    'overlayOpacity'    :   0.8
                });*/

    //-------------------------- End reinitilaizing fancybox for the new cloned elements of the portfolio ----------------------------//

            });


            $(this).parent().addClass('current');
            e.preventDefault();
        });

    //--------------------------------- End sorting portfolio elements with quicksand plugin--------------------------------//


    //--------------------------------- Form validation --------------------------------//
    //---------------------------------- Forms validation -----------------------------------------//

        /*click handler on the submit button*/
        $('.contactForm').on('submit', function(){
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                timeout: 6000,
                success: function(data) {
                    $('#contactFormInner').html(data);
                }
            });

            return false;
        });
    //---------------------------------- End forms validation -----------------------------------------//

    //---------------------------------- Google map location -----------------------------------------//

    var center = {lat: 45.698938, lng: 4.947071};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 9,
        center: center,
        scrollwheel: false,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false
    });

    var styles = [
        {
            stylers: [
                { saturation: -200 }

            ]
        },{
            featureType: 'road',
            elementType: 'geometry',
            stylers: [
                { hue: "#cccccc" },
                { visibility: 'simplified' }
            ]
        },{
            featureType: 'road',
            elementType: 'labels',
            stylers: [
                { visibility: 'off' }
            ]
        }
    ];

    var customMap = new google.maps.StyledMapType(styles, {name: 'Styled Map'});
    map.mapTypes.set('map_style', customMap);
    map.setMapTypeId('map_style');

    var circleArea = new google.maps.Circle({
        fillOpacity: 0.4,
        fillColor: '#04C3A5',
        strokeOpacity: 0,
        map: map,
        center: center,
        radius: 20000
    });

    //---------------------------------- End google map location -----------------------------------------//

    //-------------------------------------------------Flex slider --------------------------------------------------//
    $('.bxslider').bxSlider({
        pager: false,
        controls: false,
        auto: true,
        randomStart: true,
    });
    //------------------------------------------------- End flex slider --------------------------------------------------//

});
