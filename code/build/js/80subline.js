const subline = {

    svg1: draw[1].circle(0),
    svg2: draw[2].circle(0),


    draw(){
        subline.svg1.remove();
        subline.svg2.remove();

        subline.svg1 = draw[1].text($('#subline').val().toUpperCase()).fill( 'white' ).move(5,125).font(
            {
                family: 'ArvoGruen',
                size: 10,
                anchor: 'left',
                weight: 300
            }
        );

        subline.svg2 = draw[2].text($('#subline').val().toUpperCase()).fill( 'white' ).move(5,125).font(
            {
                family: 'ArvoGruen',
                size: 10,
                anchor: 'left',
                weight: 300
            }
        ),

        subline.svg3 = draw[3].text($('#subline').val().toUpperCase()).fill( 'white' ).move(5,125).font(
            {
                family: 'ArvoGruen',
                size: 10,
                anchor: 'left',
                weight: 300
            }
        )
    },
};

$('#subline').bind('input propertychange', subline.draw);