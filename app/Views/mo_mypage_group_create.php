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
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        <header>

            <div class="menu">
                <ul>
                    <li class="left_arrow">
                        <img src="/static/images/left_arrow.png" />
                    </li>
                    <li class="header_title">
                        모임 등록
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <form class="main_signin_form group_create">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label">대표사진</h4>
                                <div class="profile_photo_div">
                                    <label for="group_photo"
                                        class="signin_label profile_photo_input group_photo_input"></label>
                                    <input id="group_photo" type="file" value="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="group_category" class="signin_label">카테고리</label>
                                <select id="group_category" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="0">등산</option>
                                    <option value="1">스포츠</option>
                                    <option value="2">여행</option>
                                    <option value="3">...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="name" class="signin_label">모집기간</label>
                                <div class="schedule_calendar multy_select">
                                    <div class="schedule_calendar">
                                        <div class="schedule_calendar_div">
                                            <input type="text" id="datepicker" />
                                        </div>
                                        <div class="schedule_calendar_div" style="margin-left: 8px;">
                                            <input type="text" id="datepicker1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="name" class="signin_label">모집일자</label>
                                <div class="schedule_calendar multy_select">
                                    <div class="schedule_calendar">
                                        <div class="schedule_calendar_div">
                                            <input type="text" id="datepicker2" />
                                        </div>
                                        <div class="schedule_calendar_div" style="margin-left: 8px;">
                                            <input type="text" id="datepicker3" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="group_personnel" class="signin_label">인원</label>
                                <select id="group_personnel" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="0">~5명</option>
                                    <option value="1">5~10명</option>
                                    <option value="2">10명 이상</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="group_age" class="signin_label">나이</label>
                                <div class="multy_select">
                                    <select id="group_age1" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">20대</option>
                                        <option value="1">30대</option>
                                        <option value="2">40대</option>
                                        <option value="2">50대 이상</option>
                                    </select>
                                    <select id="group_age2" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">20대</option>
                                        <option value="1">30대</option>
                                        <option value="2">40대</option>
                                        <option value="2">50대 이상</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="group_percent" class="signin_label">매칭률</label>
                                <select id="group_percent" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="0">~50%</option>
                                    <option value="1">50~60%</option>
                                    <option value="2">60~70%</option>
                                    <option value="3">70~70%</option>
                                    <option value="4">80~70%</option>
                                    <option value="5">90% 이상</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="group_detail" class="signin_label">모임상세</label>
                                <input id="group_title" type="text" value="" placeholder="제목을 입력하세요"><br />
                                <textarea id="group_cont" value="" placeholder="내용을 입력하세요"></textarea></br />
                                <select id="group_revervation_list" class="custom_select" value="">
                                    <option>예약 내역 선택</option>
                                    <option value="0">20대</option>
                                    <option value="1">30대</option>
                                    <option value="2">40대</option>
                                    <option value="2">50대 이상</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="group_address" class="signin_label">모임장소</label>
                                <div class="input_ico_search">
                                    <input id="group_address" type="text" value="" placeholder="주소검색">
                                    <img src="/static/images/ico_search_18x18.png" />
                                </div>
                                <img class="group_create_map" src="/static/images/group_naver_map.png" />
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="group_fee" class="signin_label">회비</label>
                                <div class="input_ico_search">
                                    <input id="group_fee" type="text" value="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="btn_group multy">
                            <button type="button" class="btn type02">취소</button>
                            <button type="button" class="btn type01">저장</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>





        <div style="height: 50px;"></div>
<footer class="footer">
            
            <!-- <div class="footer_logo mb40">
                matchfy
            </div>
            <div class="footer_link mb40">
                <a href="#">회사정보</a>
                <a href="#">개인정보 처리방침</a>
                <a href="#">서비스 이용약관</a>
            </div>
            <div class="footer_info mb40">
                <span>(주)회사명 <img src="/static/images/part_line.png" /> 서울특별시 강남구 논현로 9길 26 길동빌딩 502호</span>
                <span>대표이사 : 홍길동 <img src="/static/images/part_line.png" /> 사업자등록번호 : 123-45-6789<img
                        src="/static/images/part_line.png" /> gildong@naver.com</span>
            </div>
            <div class="footer_copy">
                COPYRIGHT 2023. ALL RIGHTS RESERVED.
            </div> -->

        </footer>
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
        $(function () {
            //input을 datepicker로 선언
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                , showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
                // ,changeYear: true //option값 년 선택 가능
                // ,changeMonth: true //option값  월 선택 가능                
                , showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                , buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                , buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                , buttonText: "선택" //버튼 호버 텍스트        
                , monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
                , monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
                , dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
                , dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
                , minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                , maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
                , zIndex: 9999
            });

            //초기값을 오늘 날짜로 설정
            $('#datepicker').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)            
            $("#datepicker1").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                , showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
                // ,changeYear: true //option값 년 선택 가능
                // ,changeMonth: true //option값  월 선택 가능                
                , showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                , buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                , buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                , buttonText: "선택" //버튼 호버 텍스트        
                , monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
                , monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
                , dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
                , dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
                , minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                , maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
                , zIndex: 9999
            });

            //초기값을 오늘 날짜로 설정
            $('#datepicker1').datepicker('setDate', '+1D'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)
            $("#datepicker2").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                , showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
                // ,changeYear: true //option값 년 선택 가능
                // ,changeMonth: true //option값  월 선택 가능                
                , showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                , buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                , buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                , buttonText: "선택" //버튼 호버 텍스트        
                , monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
                , monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
                , dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
                , dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
                , minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                , maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
                , zIndex: 9999
            });

            //초기값을 오늘 날짜로 설정
            $('#datepicker2').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)            
            $("#datepicker3").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                , showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
                // ,changeYear: true //option값 년 선택 가능
                // ,changeMonth: true //option값  월 선택 가능                
                , showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                , buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                , buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                , buttonText: "선택" //버튼 호버 텍스트        
                , monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
                , monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
                , dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
                , dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
                , minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                , maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
                , zIndex: 9999
            });

            //초기값을 오늘 날짜로 설정
            $('#datepicker3').datepicker('setDate', '+1D'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)
        });
    </script>
    <!-- -->


</body>

</html>