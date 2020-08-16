require('./bootstrap');

import route from 'ziggy';
import { Ziggy } from './ziggy';

window.route = route;
window.Ziggy = Ziggy;

$(document).ready(function() {
    $('.autocomplete').select2({
        tags: true
    });

    $('.autocomplete-live').each(function () {
        let url = route($(this).data('search-type'));

        $(this).select2({
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250
            },
            minimumInputLength: 3
        })
    });

    $('.autocomplete-live-taggable').each(function () {
        let url = route($(this).data('search-type'));

        $(this).select2({
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250
            },
            minimumInputLength: 3,
            tags: true
        })
    });
});
