(function ($) {
    /*-------------------------------------
     Contact Form Home Page Activation
     -------------------------------------*/
    var contactSecond = $('#contact-form-2');

    if (contactSecond.length) {
        contactSecond.submit(function () {
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
            $('.form__result').css('display', 'none');
        })
    }


})(jQuery);