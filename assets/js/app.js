import '../scss/app.scss';

import $ from 'jquery';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/scrollspy';
import 'bootstrap/js/dist/carousel';
import 'bootstrap/js/dist/util';
import TypeIt from 'typeit';
import autosize from 'autosize';
import './components/topbar';
import './components/contact-form';

$(function () {
    // Carousel
    $('.carousel').carousel();

    // Forms
    autosize($('textarea'));

    // Init TypeIt
    new TypeIt('.typeit', {
        cursor: false,
        waitUntilVisible: true
    }).go();
});
