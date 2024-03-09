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
                        제휴 신청
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
                                <label for="alliance_category" class="signin_label">제휴유형</label>
                                <select id="alliance_category" class="custom_select" value="">
                                    <option>제휴 유형을 선택하세요</option>
                                    <option value="0">음식점</option>
                                    <option value="1">카페</option>
                                    <option value="2">숙박</option>
                                    <option value="3">기타</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_number" class="signin_label">업체 연락처</label>
                                <div>
                                    <input id="alliance_number" type="number" value="" placeholder="-제외 연락처 입력">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_email" class="signin_label">이메일</label>
                                <div>
                                    <input id="alliance_email" type="text" value="" placeholder="이메일 입력">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_name" class="signin_label">업체명</label>
                                <div>
                                    <input id="alliance_name" type="text" value="" placeholder="업체명 입력">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_ceoname" class="signin_label">대표명</label>
                                <div>
                                    <input id="alliance_ceoname" type="text" value="" placeholder="대표명 입력">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_address" class="signin_label">주소</label>
                                <div style="margin-bottom: 10px;">
                                    <input id="alliance_address1" class="alliance_address1" type="text" value=""
                                        placeholder="주소를 입력해주세요">
                                    <button class="btn search">검색</button>
                                </div>
                                <input id="alliance_address2" class="alliance_address2" type="text" value=""
                                    placeholder="상세주소를 입력해주세요">
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_ceonumber" class="signin_label">대표 연락처</label>
                                <div>
                                    <input id="alliance_ceonumber" type="number" value="" placeholder="대표연락처 입력">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_bizday" class="signin_label">영업일</label>
                                <div class="biz_day">
                                    <div class="biz_day_box">월</div>
                                    <div class="biz_day_box on">화</div>
                                    <div class="biz_day_box">수</div>
                                    <div class="biz_day_box">목</div>
                                    <div class="biz_day_box on">금</div>
                                    <div class="biz_day_box">토</div>
                                    <div class="biz_day_box">일</div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_biztime" class="signin_label">영업시간</label>
                                <div class="multy_select">
                                    <select id="alliance_biztime1" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">00시</option>
                                        <option value="1">01시</option>
                                        <option value="2">02시</option>
                                        <option value="3">03시</option>
                                    </select>
                                    <select id="alliance_biztime2" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">00시</option>
                                        <option value="1">01시</option>
                                        <option value="2">02시</option>
                                        <option value="3">03시</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label">메인사진</h4>
                                <div class="profile_photo_div">
                                    <label for="alliance_photo"
                                        class="signin_label profile_photo_input group_photo_input"></label>
                                    <input id="alliance_photo" type="file" value="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label">상세사진</h4>
                                <div class="profile_photo_div">
                                    <label for="alliance_photo_detail" class="signin_label profile_photo_input"></label>
                                    <input id="alliance_photo_detail" type="file" value="" placeholder="">
                                    <div>
                                        <img class="profile_photo_posted" src="/static/images/input_img_1.png" />
                                        <img class="profile_photo_posted" src="/static/images/input_img_2.png" />
                                        <!-- <img class="profile_photo_posted" src="/static/images/input_img_3.png" /> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_cont" class="signin_label">상세내용</label>
                                <textarea id="alliance_cont" value="" placeholder="내용을 입력하세요"></textarea></br />
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_terms" class="signin_label">개인정보 수집 및 이용목적</label>
                                <div class="alliance_terms_agree">
                                    <p>개인정보 수집 동의</p>
                                    <img src="/static/images/select_arrow.png" />
                                </div>
                            </div>
                        </div>
                        <div class="chk_box">
                            <input type="checkbox" id="agree01" name="chkDefault00" checked="">
                            <label class="agree_cont_label" for="agree01">위 구매조건 확인 및 결제진행에 동의</label>
                        </div>
                        <div class="btn_group multy">
                            <button type="button" class="btn type02">취소</button>
                            <button type="button" class="btn type01">등록</button>
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