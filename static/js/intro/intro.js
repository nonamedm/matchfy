$(document).ready(function () {
    headerMenuDrop();
    plusDrop();
    plusOrganBtn();
    plusMediaBtn();
});

const headerMenuDrop=() =>{
    $('.item-link-service').mouseenter(function(){
        $(this).find('.submenu').stop().slideDown();
    }).mouseleave(function(){
        $(this).find('.submenu').stop().slideUp();
    });
}

const plusDrop = () => {
    $(".contents-ul").on("click", ".plus-btn a", function(event){
        event.preventDefault(); // 링크의 기본 동작 중지

        var contentsLi = $(this).closest(".contents-li");
        contentsLi.toggleClass("expanded");
        $(this).toggleClass("rotated");
        contentsLi.find("p").toggle();

    });
}

const plusOrganBtn=()=>{
    $(".plus_organ_btn a").on("click", function(event){
        event.preventDefault(); // 링크의 기본 동작 중지
        $(this).toggleClass("rotated");
        $('.organ_img').toggle();
    });
}

const plusMediaBtn=()=>{
    $(".plus_media_btn a").on("click", function(event){
        event.preventDefault(); // 링크의 기본 동작 중지
        $(this).toggleClass("rotated");
        $('.media_img').toggle();
    });
}

