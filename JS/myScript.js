$(document).ready(function(){

    $('#itemslider').carousel({ interval: 3000 });

    $('.carousel-showmanymoveone .item').each(function(){
        var itemToClone = $(this);

        for (var i=1;i<6;i++) {
            itemToClone = itemToClone.next();

            if (!itemToClone.length) {
                itemToClone = $(this).siblings(':first');
            }

            itemToClone.children(':first-child').clone()
                .addClass("cloneditem-"+(i))
                .appendTo($(this));
        }
    });
});
/////////////////////////////////////////////////////////////
$('.carousel[data-type="multi"] .item').each(function() {
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < 2; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});



/*    if($(window).width() < 996 ) {
        $('.has-children').children('a').on('click', function(event){

            if( !checkWindowWidth() ) event.preventDefault();
            var selected = $(this);
            if( selected.next('ul').hasClass('is-hidden') ) {
                //desktop version only
                selected.addClass('selected').next('ul').removeClass('is-hidden').end().parent('.has-children').parent('ul').addClass('moves-out');
                selected.parent('.has-children').siblings('.has-children').children('ul').addClass('is-hidden').end().children('a').removeClass('selected');
                $('.cd-overlay').addClass('is-visible');
                console.log('ssssin');

            } else {
                selected.removeClass('selected').next('ul').addClass('is-hidden').end().parent('.has-children').parent('ul').removeClass('moves-out');
                $('.cd-overlay').removeClass('is-visible');
                console.log('ssssout');

            }
            toggleSearch('close');
        });
        $('.has-children').children('a').on('click', function(event){
            if( !checkWindowWidth() ) event.preventDefault();
            var selected = $(this);
            selected.removeClass('selected').next('ul').addClass('is-hidden').end().parent('.has-children').parent('ul').removeClass('moves-out');
            $('.cd-overlay').removeClass('is-visible');
            console.log('ssssout');

            toggleSearch('close');
        });

    }
    else {
        $('.has-children').children('a').on('mouseover', function(event){

            if( !checkWindowWidth() ) event.preventDefault();
            var selected = $(this);
            if( selected.next('ul').hasClass('is-hidden') ) {
                //desktop version only
                selected.addClass('selected').next('ul').removeClass('is-hidden').end().parent('.has-children').parent('ul').addClass('moves-out');
                selected.parent('.has-children').siblings('.has-children').children('ul').addClass('is-hidden').end().children('a').removeClass('selected');
                $('.cd-overlay').addClass('is-visible');
                console.log('ssssin');

            } else {
                selected.removeClass('selected').next('ul').addClass('is-hidden').end().parent('.has-children').parent('ul').removeClass('moves-out');
                $('.cd-overlay').removeClass('is-visible');
                console.log('ssssout');

            }
            toggleSearch('close');
        });
        $('.has-children').children('a').on('mouseout', function(event){
            if( !checkWindowWidth() ) event.preventDefault();
            var selected = $(this);
            selected.removeClass('selected').next('ul').addClass('is-hidden').end().parent('.has-children').parent('ul').removeClass('moves-out');
            $('.cd-overlay').removeClass('is-visible');
            console.log('ssssout');

            toggleSearch('close');
        });

    }
*/
function respansiveMenuMega() {
    const mediaXs = window.matchMedia( "(max-width: 996px)");
    const onlyLgandMD= $('#onlyLgandMD');
    if (mediaXs == true){
        onlyLgandMD.css('display','black')

    } else {
        onlyLgandMD.css('display','none')
    }
}function respansiveMenuMegaTwo() {
        const mediaXs = window.matchMedia( "(min-width: 995px)");
    const onlyLgandMD= $('#onlyXsandMD');
    if (mediaXs == true){
        onlyLgandMD.css('display','black')

    } else {
        onlyLgandMD.css('display','none')

    }
}
$(document).ready(function () {
    respansiveMenuMega();
    respansiveMenuMegaTwo();

    var currentCallback;



});
$(window).on('resize',function () {
    respansiveMenuMega();
    respansiveMenuMegaTwo();
})