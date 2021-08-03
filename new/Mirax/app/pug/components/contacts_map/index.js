
(function ($) {

    /*-------------------------------------
    Google maps API
    -------------------------------------*/
    if ($('#map').length && $(window).width() > 992) {
        var mapName = $('#map'),
            data_zoom = 15,
            data_address;

        if (mapName.attr("data-zoom") !== undefined) {
            data_zoom = parseInt(mapName.attr("data-zoom"), 10);
        }

        if (mapName.attr("data-address") !== undefined) {
            data_address = mapName.attr("data-address");
        }

        mapName.gmap3({
            address: data_address,
            zoom: data_zoom,
            mapTypeId: "shadeOfGrey",
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, "shadeOfGrey"]
            }
        })
            .styledmaptype(
                "shadeOfGrey",
                [
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    }
                ],
                {name: "Shades of Grey"}
            )

            .marker({
                icon: 'https://maps.google.com/mapfiles/marker_green.png'
            });
    }

    /*-------------------------------------
     Contact Form Home Page Activation
     -------------------------------------*/
    $('#contact-form').submit(function () {
        var form = $(this);
        var error = false;
        if (!error) {
            var data = form.serialize();
            $.ajax({
                type: 'POST',
                url: 'php/form.php',
                dataType: 'json',
                data: data,
                beforeSend: function () {
                    form.find('input[type="submit"]').attr('disabled', 'disabled');
                    form.trigger('reset');
                },
                success: function (data) {
                    if (data['error']) {
                        alert(data['error']);
                    } else {
                        $('#success').slideToggle('slow');
                    }
                },
                error: function () {
                    $('#error').slideToggle('slow');
                },
                complete: function () {
                    form.find('input[type="submit"]').prop('disabled', false);
                }
            });
        }
        return false;
    });

    $('.contacts__textarea').on('click', function () {
        $('.form__result').css('display','none');
    })
})(jQuery);