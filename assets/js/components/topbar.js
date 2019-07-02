import $ from 'jquery';

// Manage topbar appearance according to vertical page position
$(function () {
    $(document).on('scroll', function () {
        let st = $(this).scrollTop();
        let viewportHeight = $(window).height();
        let topbar = $("#topbar");

        if (st > viewportHeight) {
            topbar
                .addClass('fixed')
                .addClass('navbar-light')
                .removeClass('navbar-dark');
        } else {
            topbar
                .removeClass('fixed')
                .removeClass('navbar-light')
                .addClass('navbar-dark');
        }
    });
});