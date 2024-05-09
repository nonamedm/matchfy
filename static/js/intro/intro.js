$(document).ready(function () {
    headerMenuDrop();
});

const headerMenuDrop=() =>{
    $('.item-link-service').mouseenter(function(){
        $(this).find('.submenu').stop().slideDown();
    }).mouseleave(function(){
        $(this).find('.submenu').stop().slideUp();
    });
}
