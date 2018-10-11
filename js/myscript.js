$(window).scroll(function () {
    var sticky = $('#headerBar'),
        scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('headerScroll');
    else sticky.removeClass('headerScroll');
});


smoothScroll.init();

//Check to see if the window is top if not then display button
$(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
        $('.scrollToTop').fadeIn();
    } else {
        $('.scrollToTop').fadeOut();
    }
});

//Click event to scroll to top
$('.scrollToTop').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 800);
    return false;
});



$(document).ready(function () {
    $('.service_item').mouseover(function () {
        $(this).addClass('hover');
    });
    $('.service_item').mouseout(function () {
        $(this).removeClass('hover');
    });
});