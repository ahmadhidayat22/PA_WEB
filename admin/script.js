



$('#menu-label').click(function(){

    $('.sidebar').toggleClass('hide');
    $('.description').toggleClass('hide');
    $('.content').toggleClass('hide');
    $('.head-list').toggleClass('hide');
    $('.list-item').toggleClass('center');

    if($('.description-header').text() == "BS" ){
        $('.description-header').text("Booking Site")
    }else{
        $('.description-header').text("BS")
    }
    

    
})