import $ from 'jquery';

// Contact form
$(function () {
    $('#contact form')
        .on('submit', function () {
            $.ajax({
                type: "POST",
                url: "assets/php/contact.php",
                data: fields,
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        $('#contact-form input').val('');
                        $('#contact-form textarea').val('');
                    }
                    $('#response').empty().html(response.html);
                }
            });
        })
        .find('input, textarea').on('change keyup', function () {
            let form = $(this).parents('form').get('0');

            if (form.checkValidity()) {
                $(form).find('.g-recaptcha').removeClass('d-none');
            }
        })
    ;
});
