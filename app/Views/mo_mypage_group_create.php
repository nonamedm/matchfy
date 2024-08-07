<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0,  user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/static/css/datepicker.css">
    <script src="/static/js/basic.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="/static/js/ckeditor/ckeditor.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "모임 등록";
        $prevUrl = "/mo/mypage/group/list";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="loading"><img src="/static/images/loading.gif" /></div>
            <div class="loading_bg"></div>
            <div class="content_wrap">
                <form class="main_signin_form group_create" method="post" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label"><?= lang('Korean.meetMainPhoto') ?></h4>
                                <div class="profile_photo_div">
                                    <label for="group_photo" class="signin_label profile_photo_input group_photo_input"></label>
                                    <input id="group_photo" name="meeting_photo" type="file" value="" placeholder="" multiple accept="image/*">
                                    <div style="margin-top: 2px; font-size: 11px; color: gray; font-style: italic;">* 사진은 100MB 이하, 375*248px 이하만 가능합니다.</div>
                                    <div id="meeting_photo_view" class="meeting_photo_view" style="margin-top: 10px;"></div>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="category" class="signin_label"><?= lang('Korean.category') ?></label>
                                    <select id="category" name="category" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="01"><?= lang('Korean.weekdayMeeting') ?></option>
                                        <option value="02"><?= lang('Korean.weekdayTrip') ?></option>
                                        <option value="03"><?= lang('Korean.holiMeeting') ?></option>
                                        <option value="04"><?= lang('Korean.holiTrip') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="name" class="signin_label"><?= lang('Korean.recruitmentPeriod') ?></label>
                                    <div class="schedule_calendar multy_select">
                                        <div class="schedule_calendar">
                                            <div class="schedule_calendar_div">
                                                <input type="text" id="datepicker" name="recruitment_start_date" />
                                            </div>
                                            <br />
                                            -
                                            <div class="schedule_calendar_div" style="margin-left: 8px;">
                                                <input type="text" id="datepicker1" name="recruitment_end_date" />
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="name" class="signin_label"><?= lang('Korean.recruitmentDate') ?></label>
                                    <div class="schedule_calendar multy_select">
                                        <div class="schedule_calendar">
                                            <div class="schedule_calendar_div">
                                                <input type="text" id="datepicker2" name="meeting_start_date" class="datepicker2" />
                                            </div>
                                            <select id="meeting_start_time" class="custom_select" name="meeting_start_time" value="">
                                                <option value=""><?= lang('Korean.selected') ?></option>
                                                <?php
                                                $time00 = 0;
                                                $time23 = 23;
                                                for ($time = $time00; $time <= $time23; $time++) {
                                                    if ($time < 10) {
                                                        echo '<option value="0' . $time . '">0' . $time . '시</option>';
                                                    } else {
                                                        echo '<option value="' . $time . '">' . $time . '시</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="number_of_people" class="signin_label"><?= lang('Korean.personnel') ?></label>
                                    <input id="number_of_people" name="number_of_people" type="number" value="<?php echo $name ?>" placeholder="<?= lang('Korean.meetCon1') ?>" oninput="clearInput(this)">
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="group_age" class="signin_label"><?= lang('Korean.ageType') ?></label>
                                    <div class="multy_input">
                                        <input id="group_min_age" type="number" name="group_min_age" value="" placeholder="<?= lang('Korean.meetCon2') ?>" onchange="clearInput(this)"><br />
                                        -
                                        <input id="group_max_age" type="number" name="group_max_age" value="" placeholder="<?= lang('Korean.meetCon2') ?>" onchange="clearInput(this)"><br />
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="matching_rate" class="signin_label"><?= lang('Korean.matchingRate') ?></label>
                                    <input id="matching_rate" type="number" name="matching_rate" value="" placeholder="매칭률을 입력하세요" oninput="clearInput(this)"><br />
                                    <select id="matching_rate" class="custom_select" name="matching_rate" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="01">~50%</option>
                                    <option value="02">50~60%</option>
                                    <option value="03">60~70%</option>
                                    <option value="04">70~80%</option>
                                    <option value="05">80~70%</option>
                                    <option value="06">90% 이상</option>
                                </select>
                                </div>
                            </div> -->
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="group_detail" class="signin_label"><?= lang('Korean.meetingDetails') ?></label>
                                    <input id="title" type="text" name="title" value="" placeholder="<?= lang('Korean.meetCon3') ?>"><br />
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <textarea id="content" name="" value="" placeholder="<?= lang('Korean.Placehoder1') ?>"></textarea></br />
                                    <script type="text/javascript">
                                        CKEDITOR.replace('content', {
                                            filebrowserUploadUrl: '/ckeditorUpload'
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="group_detail" class="signin_label">예약내역</label>
                                    <select id="reservation_previous" name="reservation_previous" class="custom_select" onchange="myAllianceDetail(this)">
                                        <option value="">예약 내역 선택</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="meeting_place" class="signin_label"><?= lang('Korean.meetingPlace') ?></label>
                                    <div class="input_ico_search search_meet_place">
                                        <input id="meeting_place" type="text" name="meeting_place" placeholder="<?= lang('Korean.addressSearch') ?>">
                                        <img src="/static/images/ico_search_18x18.png" onclick="searchPlaces()" />
                                    </div>
                                    <div class="input_ico_search search_meet_detail">
                                        <input id="meeting_place_detail" type="text" name="meeting_place_detail" placeholder="<?= lang('Korean.addressDetails') ?>">
                                    </div>
                                    <div id="map" style="width:100%;height:175px;margin-top: 20px;"></div>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="membership_fee" class="signin_label"><?= lang('Korean.dues') ?></label>
                                    <div class="input_ico_search">
                                        <input id="membership_fee" type="number" name="membership_fee" value="" placeholder="" oninput="clearInput(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="btn_group multy">
                                <button type="button" class="btn type02" onclick="moveToUrl('/mo/mypage/group/list')"><?= lang('Korean.cancel') ?></button>
                                <button type="button" class="btn type01" onclick="meetingSave()"><?= lang('Korean.save') ?></button>
                            </div>

                        </div>
                </form>
            </div>
        </div>





        <div style="height: 50px;"></div>
        <footer class="footer">


        </footer>
    </div>


    <!-- SCRIPTS -->
    <script type="text/javascript" src="https://oapi.map.naver.com/openapi/v3/maps.js?ncpClientId=smqlge9tsx&submodules=geocoder"></script>
    <script>
        $(function() {
            initMap();
            setDatepicker();
            searchAddr();
            loadMyAlliance();
            ageType();
        });

        function ageType() {
            $("#group_min_age, #group_max_age").on("change", function() {
                var minAge = parseInt($("#group_min_age").val());
                var maxAge = parseInt($("#group_max_age").val());
                if (minAge !== "" && maxAge !== "" && minAge > maxAge) {
                    fn_alert("최소 연령은 최대 연령보다 작아야 합니다.");
                    $(this).val("");

                }
            });
        }

        function loadMyAlliance() {
            $.ajax({
                url: '/ajax/myAlliance',
                type: 'POST',
                //data: postData,
                async: false,
                success: function(data) {
                    data.forEach(function(key, index) {
                        $("#reservation_previous").append('<option value="' + key.wh_alliance_idx + '" >' + key.alliance_name + '(' + key.reservation_date + ')' + '</option>');
                    });

                }
            });
        }

        function myAllianceDetail(e) {
            console.log(e.value);
            if (e.value === "" || e.value === null) {
                // 예약내역 미선택, 직접입력
                $("#meeting_place").val("");
                $("#meeting_place_detail").val("");
                $("#membership_fee").val("");
                $('#datepicker2').datepicker('setDate', '+1D');
            } else {
                // 예약내역 선택
                $.ajax({
                    url: '/ajax/myAllianceDetail',
                    type: 'POST',
                    data: {
                        "value": e.value
                    },
                    async: false,
                    success: function(data) {
                        console.log(data);
                        $("#meeting_place").val(data[0].address);
                        $("#meeting_place_detail").val(data[0].detailed_address);
                        $("#membership_fee").val(data[0].alliance_pay);
                        $("#datepicker2").val(data.reservation.reservation_date);
                        naver.maps.Service.geocode({
                            address: data[0].address
                        }, function(status, response) {
                            if (status === naver.maps.Service.Status.ERROR) {
                                console.log('올바른 주소를 입력해 주세요');
                            }
                            // 성공 시의 response 처리
                            // todo: 로딩화면 종료
                            map = new naver.maps.Map('map', {
                                center: new naver.maps.LatLng(response.result.items[0].point.y, response.result.items[0].point.x),
                                zoom: 18
                            });
                            var marker = new naver.maps.Marker({
                                position: new naver.maps.LatLng(response.result.items[0].point.y, response.result.items[0].point.x),
                                map: map
                            });
                        });
                        // data.forEach(function(key, index) {
                        //     $("#reservation_previous").append('<option value="' + key.wh_alliance_idx + '" >' + key.alliance_name + '(' + key.reservation_date + ')' + '</option>');
                        // });

                    }
                });
            }
        }


        var map = null;

        function initMap() {
            map = new naver.maps.Map('map', {
                center: new naver.maps.LatLng(37.3595704, 127.105399),
                zoom: 10
            });
        }

        function searchAddr() {
            $('#meeting_place').autocomplete({
                source: function(request, response) {
                    console.log(request);
                    const postData = {
                        'confmKey': 'U01TX0FVVEgyMDI0MDcxMzE5NTM0ODExNDkyMDU=',
                        'currentPage': '1',
                        'countPerPage': '100',
                        'keyword': request.term,
                        'resultType': 'json'
                    }
                    $.ajax({
                        url: 'https://business.juso.go.kr/addrlink/addrLinkApi.do',
                        type: 'POST',
                        data: postData,
                        async: false,
                        success: function(data) {
                            console.log(data)
                            response(
                                $.map(data.results.juso, function(item) {
                                    return {
                                        label: item.jibunAddr,
                                        value: item.jibunAddr,
                                        idx: item.zipNo,
                                    }
                                })
                            )
                        }
                    });
                },
                minLength: 2, // 최소 문자 수
                select: function(event, ui) {
                    // 아이템 선택 시 동작
                    console.log(ui.item.value); // 선택된 주소명                    

                    // todo: 로딩화면 호출
                    naver.maps.Service.geocode({
                        address: ui.item.value
                    }, function(status, response) {
                        if (status === naver.maps.Service.Status.ERROR) {
                            console.log('올바른 주소를 입력해 주세요');
                        }
                        // 성공 시의 response 처리
                        // todo: 로딩화면 종료
                        map = new naver.maps.Map('map', {
                            center: new naver.maps.LatLng(response.result.items[0].point.y, response.result.items[0].point.x),
                            zoom: 18
                        });
                        var marker = new naver.maps.Marker({
                            position: new naver.maps.LatLng(response.result.items[0].point.y, response.result.items[0].point.x),
                            map: map
                        });
                    });
                }
            });
        }

        function searchPlaces() {
            var keyword = document.getElementById('meeting_place').value;

            if (!keyword.replace(/^\s+|\s+$/g, '')) {
                fn_alert('키워드를 입력해주세요!');
                return false;
            }
            const postData = {
                'confmKey': 'U01TX0FVVEgyMDI0MDcxMzE5NTM0ODExNDkyMDU=',
                'currentPage': '1',
                'countPerPage': '20',
                'keyword': keyword,
                'resultType': 'json'
            }
            // 키워드로 장소 검색
            $.ajax({
                url: 'https://business.juso.go.kr/addrlink/addrLinkApi.do',
                type: 'POST',
                data: postData,
                async: false,
                success: function(data) {

                },
                error: function(data, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }

        function setDatepicker() {
            //input을 datepicker로 선언
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                    // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                    ,
                showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
                    // ,changeYear: true //option값 년 선택 가능
                    // ,changeMonth: true //option값  월 선택 가능                
                    ,
                showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                    ,
                buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                    ,
                buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                    ,
                buttonText: "선택" //버튼 호버 텍스트        
                    ,
                monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
                    ,
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
                    ,
                dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
                    ,
                dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
                    ,
                // minDate: "-1Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                minDate: 0 // 오늘 이전의 날짜는 선택 불가능하도록 설정
                    ,
                maxDate: "+1y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
                    ,
                zIndex: 9999,
                onSelect: function(selectedDate) {
                    // datepicker에서 선택한 날짜를 가져와서 이를 최소 선택 가능 날짜로 설정
                    $("#datepicker1").datepicker("option", "minDate", selectedDate);
                }
            });

            //초기값을 오늘 날짜로 설정
            $('#datepicker').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)            
            $("#datepicker1").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                    // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                    ,
                showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
                    // ,changeYear: true //option값 년 선택 가능
                    // ,changeMonth: true //option값  월 선택 가능                
                    ,
                showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                    ,
                buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                    ,
                buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                    ,
                buttonText: "선택" //버튼 호버 텍스트        
                    ,
                monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
                    ,
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
                    ,
                dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
                    ,
                dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
                    ,
                minDate: "+1D" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                    ,
                maxDate: "+1y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
                    ,
                zIndex: 9999,
                onSelect: function(selectedDate) {
                    var nextDay = new Date(selectedDate); // 선택한 날짜를 JavaScript Date 객체로 변환
                    nextDay.setDate(nextDay.getDate() + 1); // 하루를 더하여 다음 날짜로 설정
                    var formattedNextDay = $.datepicker.formatDate('yy-mm-dd', nextDay); // 포맷 변경
                    $("#datepicker2").datepicker("option", "minDate", formattedNextDay); // 변경된 날짜 설정
                }
            });

            //초기값을 오늘 날짜로 설정
            $('#datepicker1').datepicker('setDate', '+1D'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)
            $("#datepicker2").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                    // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                    ,
                showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
                    // ,changeYear: true //option값 년 선택 가능
                    // ,changeMonth: true //option값  월 선택 가능                
                    ,
                showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                    ,
                buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                    ,
                buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                    ,
                buttonText: "선택" //버튼 호버 텍스트        
                    ,
                monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
                    ,
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
                    ,
                dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
                    ,
                dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
                    ,
                // minDate: "-1Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                minDate: "+1D" // 오늘 이전의 날짜는 선택 불가능하도록 설정
                    ,
                maxDate: "+1y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
                    ,
                zIndex: 9999,

            });

            //초기값을 오늘 날짜로 설정
            $('#datepicker2').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)            
            // $("#datepicker3").datepicker({
            //     dateFormat: 'yy-mm-dd' //달력 날짜 형태
            //         // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
            //         ,
            //     showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
            //         // ,changeYear: true //option값 년 선택 가능
            //         // ,changeMonth: true //option값  월 선택 가능                
            //         ,
            //     showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
            //         ,
            //     buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
            //         ,
            //     buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
            //         ,
            //     buttonText: "선택" //버튼 호버 텍스트        
            //         ,
            //     monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
            //         ,
            //     monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
            //         ,
            //     dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
            //         ,
            //     dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
            //         ,
            //     minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
            //         ,
            //     maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
            //         ,
            //     zIndex: 9999
            // });

            // //초기값을 오늘 날짜로 설정
            // $('#datepicker3').datepicker('setDate', '+1D'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)
        }

        //앤터 추가
        // document.getElementById('meeting_place').addEventListener('keydown', function(e) {
        //     if (e.key === 'Enter') { 
        //         searchPlaces();
        //     }
        // });

        // function placesSearchCB(data, status, pagination) {
        //     if (status === kakao.maps.services.Status.OK) {

        //         var coords = new kakao.maps.LatLng(data[0].y, data[0].x);//위치 이동
        //         console.log(coords);
        //         map.setCenter(coords);

        //         //마커
        //         var marker = new kakao.maps.Marker({
        //             map: map,
        //             position: coords
        //         });
        //     } else {
        //         alert('검색 결과가 없습니다.');
        //     }
        // }

        document.getElementById('group_photo').addEventListener('change', function(event) {
            var files = event.target.files;
            var imagePreviewContainer = document.getElementById('meeting_photo_view');
            imagePreviewContainer.innerHTML = ''; // 기존의 미리보기를 클리어

            var labelForInput = document.querySelector('label[for="group_photo"]');
            if (files.length > 0) {
                labelForInput.style.display = 'none';
            } else {
                labelForInput.style.display = 'block';
            }

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

                    // 미리보기 이미지 클릭 시 파일 선택 input 활성화
                    img.onclick = function() {
                        document.getElementById('group_photo').click();
                    };
                    imagePreviewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
    <!-- -->


</body>

</html>