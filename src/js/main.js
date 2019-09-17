import {handlers} from "./handlers";


// INITIALIZE EVENTS
$(document).ready(function() {

    $('table').tablesort();

    $('#add-url').click(handlers.onShortenClick);
});

