$(document).ready(function() {
    // 요소와 창의 높이를 초기화합니다.
    var elems = $(".hidden");
    var windowHeight = $(window).height();
  
    // 스크롤 이벤트 핸들러와 리사이즈 이벤트 핸들러를 추가합니다.
    $(window).on("scroll resize", function() {
        // 현재 스크롤 위치를 계산합니다.
        var windowTop = $(window).scrollTop();
  
        // 각 숨겨진 요소에 대해 반복하여 위치를 확인하고 클래스를 변경합니다.
        elems.each(function() {
            var elem = $(this);
            var posFromTop = elem.offset().top;
            if (posFromTop - windowHeight <= windowTop) {
                elem.removeClass("hidden").addClass("fade-in");
            }
        });
    });
  
    // 초기화 함수를 호출합니다.
    $(window).trigger("scroll");
});