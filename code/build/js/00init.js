var draw = [];
for(let i = 1; i<=7; i++){
    draw[ i ] = SVG().addTo('#canvas' + i);
}


$(document).ready(function () {
    for(let i = 1; i<=7; i++){
        draw[ i ].size( 250, 135 );
    }

    subline.init();

    $('.message').hide();

});
