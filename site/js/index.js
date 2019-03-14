$(document).ready(function () {
    $('.sub > a').click(function(){
        $('.sub ul').slideUp(1000);
        if ($(this).next().is(":visible")){
            $(this).next().slideUp(1000);
        } else {
            $(this).next().slideToggle(1000);
        }
        return false;
    });
    $('.mini-menu > ul > li > a').click(function(){
        $('.mini-menu > ul > li > a, .sub a').removeClass('active');
        $(this).addClass('active');
    }),
        $('.sub ul li a').click(function(){
            $('.sub ul li a').removeClass('active');
            $(this).addClass('active');
        });
});