var draw = [];
draw[1] = SVG().addTo('#canvas1');
draw[2] = SVG().addTo('#canvas2');
draw[3] = SVG().addTo('#canvas3');



$(document).ready(function () {
    draw[1].size( 250, 135 );
    draw[2].size( 250, 135 );
    draw[3].size( 250, 135 );

    $('.message').hide();

});
