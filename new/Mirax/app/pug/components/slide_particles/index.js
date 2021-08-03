(function ($) {

    var particles = $('#particles');


    /*-------------------------------------
     * Particleground
     -------------------------------------*/
    if (particles.length) {
        particles.particleground({
            dotColor: '#fff',
            lineColor: 'rgba(255, 255, 255, 0.1)',
            minSpeedX: 0.1,
            maxSpeedX: 0.6,
            minSpeedY: 0.1,
            maxSpeedY: 0.6,
            lineWidth: 1,
            density: 11000, // One particle every n pixels
            curvedLines: false,
            proximity: 150, // How close two dots need to be before they join
            parallaxMultiplier: 10, // Lower the number is more extreme parallax
            particleRadius: 3, // Dot size
        });
    }
})(jQuery);