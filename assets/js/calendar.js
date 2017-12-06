/*
    File: calendar.pjs
    Location: /xampp/htcdocs/assets/js/calendar.js
    Description: Match background to corresponding restaurant
    Author: Nicole Ho
*/

$(window).on('load', function() {
    for ($i = 1; $i <= 9; $i++) {
        $('.location').each(function() {
            if ($(this).hasClass($i)) {
                $(this).parent().parent().css('background', 'linear-gradient(rgba(80, 80, 80, 0.7), rgba(80, 80, 80, 0.7)),' + 
                'url(/assets/img/' + $i + '.jpg) 0 0 no-repeat');
                $(this).parent().parent().css('background-size', 'cover');
            };
        });
    };
});