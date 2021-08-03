(function ($) {
    var circle = $("#circle--rotate");

    if (circle.length) {

        /*-------------------------------------
         * Service Auto height circle
         -------------------------------------*/
        function autoHeightCircle() {
            var circle = $('.circle--rotate'),
                circleInner = $('.animate-wrapper'),
                circleH = circle.width(),
                circleInnerH = circleInner.width();
            circle.height(circleH);
            circleInner.height(circleInnerH);
        }

        /*-------------------------------------
         * Services parallax image
         -------------------------------------*/

        autoHeightCircle();

        $(window).resize(function () {
            autoHeightCircle();
        });

        $("#circle--rotate").circle();
    }
})(jQuery);