const subline = {
    svg: new Array(),

    init(){
        for(let i = 1; i <= 6; i++){
            subline.svg[ i ] = draw[ i ].circle(0);
        }
    },


    draw(){

        for(let i = 1; i <= 6; i++){
            subline.svg[ i ].remove();
        

            subline.svg[ i ] = draw[ i ].text($('#subline').val().toUpperCase()).fill( 'white' ).move(5,126).font(
                {
                    family: 'Futura Condensed Extra Bold',
                    size: 9,
                    anchor: 'left',
                    weight: 300
                }
            );

        }
       
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
