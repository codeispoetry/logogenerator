const subline = {

    svg1: draw[1].circle(0),
    svg2: draw[2].circle(0),
    svg3: draw[3].circle(0),


    draw(){
        subline.svg1.remove();
        subline.svg2.remove();
        subline.svg3.remove();

        subline.svg1 = draw[1].text($('#subline').val().toUpperCase()).fill( 'white' ).move(5,125).font(
            {
                family: 'Futura Condensed Extra Bold',
                size: 10,
                anchor: 'left',
                weight: 300
            }
        );

        
        subline.svg2 = draw[2].text($('#subline').val().toUpperCase()).fill( 'white' ).move(5,125).font(
            {
                family: 'Futura Condensed Extra Bold',
                size: 10,
                anchor: 'left',
                weight: 300
            }
        ),

        subline.svg3 = draw[3].text($('#subline').val().toUpperCase()).fill( 'white' ).move(5,125).font(
            {
                family: 'Futura Condensed Extra Bold',
                size: 10,
                anchor: 'left',
                weight: 300
            }
        )
    },
};

function check_wording(){
   
    if( $('#subline').val().match(/^KV|^OV|^Kreisv|^Ortsv/i) ){
        $('.message').slideDown();
    }else{
        $('.message').hide();
    }
}

$('#subline').bind('input propertychange', subline.draw);
$('#subline').bind('input propertychange', check_wording);
