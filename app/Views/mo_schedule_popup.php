<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/static/css/datepicker.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body class="mo_wrap">
    <div class="layerPopup alert middle"><!-- class: imgPop 추가 -->
        <div class="layerPopup_wrap">
            <div class="layerPopup_content medium">
                <p class="txt">약속</p>
                
                <div class="">
                    <div>
                        <div class="schedule_title">
                            <h2>날짜</h2>
                        </div>
                        <div class="schedule_calendar">
                            <input type="text" id="datepicker"/>
                        </div>
                    </div>
                    <div>
                        <div class="schedule_title">
                            <h2>시간</h2>
                        </div>
                        <div class="schedule_calendar multy_select">
                            <select>
                                <option value=""><?=lang('Korean.selected')?></option>
                            </select>
                            <select>
                                <option value=""><?=lang('Korean.selected')?></option>
                            </select>
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="schedule_title">
                            <h2>구분</h2>
                        </div>
                        <div class="schedule_calendar">
                            <div class="chk_box radio_box">
                                <input type="radio" id="grade01" name="grade" checked="">
                                <label for="grade01">
                                    <h2>식사/차</h2>
                                </label>
                            </div>
                            <div class="chk_box radio_box">
                                <input type="radio" id="grade02" name="grade" checked="">
                                <label for="grade02">
                                    <h2>술</h2>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; height: 110px;">
                        <div class="schedule_title">
                            <h2>예약금액</h2>
                        </div>
                        <div class="schedule_fee">
                            <p>5,000 P</p>
                        </div>
                    </div>
                </div>
                
                <div class="layerPopup_bottom">
                    <div class="btn_group">
                        <button class="btn type01">완료</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- SCRIPTS -->

    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>
    <script>
        $(function() {
            //input을 datepicker로 선언
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                ,showMonthAfterYear:true // 월- 년 순서가아닌 년도 - 월 순서
                // ,changeYear: true //option값 년 선택 가능
                // ,changeMonth: true //option값  월 선택 가능                
                ,showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                ,buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                ,buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                ,buttonText: "선택" //버튼 호버 텍스트        
                ,monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'] //달력의 월 부분 텍스트
                ,monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'] //달력의 월 부분 Tooltip
                ,dayNamesMin: ['일','월','화','수','목','금','토'] //달력의 요일 텍스트
                ,dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'] //달력의 요일 Tooltip
                ,minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                ,maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
            });                    
            
            //초기값을 오늘 날짜로 설정
            $('#datepicker').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)            
        });
    </script>

    <!-- -->


</body>

</html>