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
    <script src="/static/js/basic.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=dfeedb645765a4f5e27cfb8dda43a2c8&libraries=services"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>

        <?php $title = "모임 등록"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <form class="main_signin_form group_create" method="post" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label">대표사진</h4>
                                <div class="profile_photo_div">
                                    <label for="group_photo" class="signin_label profile_photo_input group_photo_input"></label>
                                    <input id="group_photo" name="meeting_photo" type="file" value="" placeholder=""
                                        multiple accept="image/*">
                                    <div id="meeting_photo_view" class="meeting_photo_view" style="margin-top: 10px;">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="category" class="signin_label">카테고리</label>
                                <select id="category" name="category" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="01">주중모임</option>
                                    <option value="02">주중여행</option>
                                    <option value="03">주말모임</option>
                                    <option value="04">주말여행</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="name" class="signin_label">모집기간</label>
                                <div class="schedule_calendar multy_select">
                                    <div class="schedule_calendar">
                                        <div class="schedule_calendar_div">
                                            <input type="text" id="datepicker" name="recruitment_start_date"/>
                                        </div>
                                        <div class="schedule_calendar_div" style="margin-left: 8px;">
                                            <input type="text" id="datepicker1" name="recruitment_end_date"/>
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
                                            <input type="text" id="datepicker2" name="meeting_start_date"/>
                                        </div>
                                        <div class="schedule_calendar_div" style="margin-left: 8px;">
                                            <input type="text" id="datepicker3" name="meeting_end_date"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="number_of_people" class="signin_label">인원</label>
                                <input id="number_of_people" name="number_of_people" type="text" value="<?php echo $name ?>"
                                    placeholder="모집 인원을 입력하세요" >
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="group_age" class="signin_label">나이</label>
                                <div class="multy_input">
                                    <input id="group_min_age" type="text" name="group_min_age" value="" placeholder="나이를 입력하세요"><br />
                                    - 
                                    <input id="group_max_age" type="text" name="group_max_age" value="" placeholder="나이를 입력하세요"><br />
                                    <!-- <select id="group_age1" class="custom_select" value="">
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
                                    </select> -->
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="matching_rate" class="signin_label">매칭률</label>
                                <input id="matching_rate" type="text" name="matching_rate" value="" placeholder="매칭률을 입력하세요"><br />
                                <!-- <select id="matching_rate" class="custom_select" name="matching_rate" value="">
                                    <option value="">선택</option>
                                    <option value="01">~50%</option>
                                    <option value="02">50~60%</option>
                                    <option value="03">60~70%</option>
                                    <option value="04">70~80%</option>
                                    <option value="05">80~70%</option>
                                    <option value="06">90% 이상</option>
                                </select> -->
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="group_detail" class="signin_label">모임상세</label>
                                <input id="title" type="text" name="title" value="" placeholder="제목을 입력하세요"><br />
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <textarea id="content" name="content" value="" placeholder="내용을 입력하세요"></textarea></br />
                            </div>
                        </div>
                        <!-- <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <select id="reservation_previous" name= "reservation_previous" class="custom_select" value="">
                                    <option>예약 내역 선택</option>
                                    <option value="0">20대</option>
                                    <option value="1">30대</option>
                                    <option value="2">40대</option>
                                    <option value="2">50대 이상</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="meeting_place" class="signin_label">모임장소</label>
                                <div class="input_ico_search">
                                    <input id="meeting_place" type="text" name="meeting_place" value="" placeholder="주소검색">
                                    <img src="/static/images/ico_search_18x18.png" onclick="searchPlaces()"/>
                                </div>
                                <div id="map" style="width:335px;height:175px;margin-top: 20px;"></div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="membership_fee" class="signin_label">회비</label>
                                <div class="input_ico_search">
                                    <input id="membership_fee" type="text" name="membership_fee" value="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="btn_group multy">
                            <button type="button" class="btn type02">취소</button>
                            <button type="button" class="btn type01" onclick="meetingSave()">저장</button>
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


        /* 카카오 맵 */ 
        var mapContainer = document.getElementById('map'), 
            mapOption = {
                center: new kakao.maps.LatLng(33.450701, 126.570667), 
                level: 3 
            }; 

        // 지도 생성
        var map = new kakao.maps.Map(mapContainer, mapOption); 
        
        // 장소 검색 객체 생성
        var ps = new kakao.maps.services.Places();  
    
        function searchPlaces() {
            var keyword = document.getElementById('meeting_place').value;

            if (!keyword.replace(/^\s+|\s+$/g, '')) {
                alert('키워드를 입력해주세요!');
                return false;
            }

            // 키워드로 장소 검색
            ps.keywordSearch(keyword, placesSearchCB); 
        }

        //앤터 추가
        document.getElementById('meeting_place').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') { 
                searchPlaces();
            }
        });

        function placesSearchCB(data, status, pagination) {
            if (status === kakao.maps.services.Status.OK) {

                var coords = new kakao.maps.LatLng(data[0].y, data[0].x);//위치 이동
                console.log(coords);
                map.setCenter(coords);
                
                //마커
                var marker = new kakao.maps.Marker({
                    map: map,
                    position: coords
                });
            } else {
                alert('검색 결과가 없습니다.');
            }
        }

        document.getElementById('group_photo').addEventListener('change', function(event) {
            var files = event.target.files;
            var imagePreviewContainer = document.getElementById('meeting_photo_view');
            imagePreviewContainer.innerHTML = ''; // 기존의 미리보기를 클리어

            Array.from(files).forEach(function(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '335px'; // 이미지 너비 고정
                    img.style.maxHeight = '220px'; // 이미지 최대 높이
                    img.style.objectFit = 'cover'; // 이미지 비율 유지
                    img.style.marginTop = '10px';
                    img.style.border = '1px solid #dddddd';
                    img.style.borderRadius = '10px';
                    imagePreviewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });


    </script>
    <!-- -->


</body>

</html>