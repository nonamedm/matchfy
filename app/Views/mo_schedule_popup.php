<div class="layerPopup alert middle mtng" style="display:none;">
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a href="#" class="btn_popup_close" onclick="closePopup();" style="float: right;">닫기</a>
        </div>
        <div class="layerPopup_content medium">
            <p class="txt"><?= lang('Korean.promise') ?></p>

            <div class="">
                <div>
                    <div class="schedule_title">
                        <h2><?= lang('Korean.date') ?></h2>
                    </div>
                    <div class="schedule_calendar">
                        <input type="text" id="scdl_date" />
                    </div>
                </div>
                <div>
                    <div class="schedule_title">
                        <h2><?= lang('Korean.time') ?></h2>
                    </div>
                    <div class="schedule_calendar multy_select">
                        <select id="scdl_hour">
                            <?php
                            for ($hour = 0; $hour <= 23; $hour++) {
                                printf('<option value="%02d">%02d 시</option>', $hour, $hour);
                            }
                            ?>
                        </select>
                        <select id="scdl_min">
                            <?php
                            for ($min = 0; $min <= 59; $min++) {
                                printf('<option value="%02d">%02d 분</option>', $min, $min);
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div style="display:flex;">
                    <div class="schedule_title">
                        <h2><?= lang('Korean.division') ?></h2>
                    </div>
                    <div class="schedule_calendar">
                        <div class="chk_box radio_box">
                            <input type="radio" id="scdl_type01" name="scdl_type" value="1" onclick="scdlType(this)" checked>
                            <label for="scdl_type01">
                                <h2><?= lang('Korean.mealTea') ?></h2>
                            </label>
                        </div>
                        <div class="chk_box radio_box">
                            <input type="radio" id="scdl_type02" name="scdl_type" value="2" onclick="scdlType(this)">
                            <label for="scdl_type02">
                                <h2><?= lang('Korean.alcohol') ?></h2>
                            </label>
                        </div>
                    </div>
                </div>
                <div style="display: flex; height: 110px;">
                    <div class="schedule_title">
                        <h2><?= lang('Korean.reservationAmount') ?></h2>
                    </div>
                    <div class="schedule_fee">
                        <p id="scdl_point">5,000 P</p>
                    </div>
                </div>
            </div>

            <div class="layerPopup_bottom">
                <div class="btn_group">
                    <button class="btn type01" onclick="submitScdl()"><?= lang('Korean.complete') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/static/css/datepicker.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        //input을 datepicker로 선언
        $("#scdl_date").datepicker({
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
            minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                ,
            maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
        });

        //초기값을 오늘 날짜로 설정
        $('#scdl_date').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)            
    });
    const scdlType = (e) => {
        console.log(e.value);
        if (e.value === '1') {
            $("#scdl_point").html('5,000 P');
        } else {
            $("#scdl_point").html('10,000 P');
        }

    }
    const submitScdl = () => {
        if (confirm('약속을 전송하시겠습니까?')) {
            var scdl_type = $('input[name="scdl_type"]:checked').val();
            var scdl_date = $('#scdl_date').val() + " " + $('#scdl_hour').val() + ":" + $('#scdl_min').val();
            console.log(scdl_date)
            $.ajax({
                url: '/ajax/submitScdl',
                type: 'POST',
                data: {
                    "room_ci": $("#room_ci").val(),
                    "scdl_type": scdl_type,
                    "scdl_date": scdl_date,
                },
                async: false,
                success: function(data) {
                    console.log(data);
                    if (data.status === 'success') {
                        // 성공
                        fn_alert('약속이 전송되었습니다!');
                        closePopup();
                    } else if (data.status === 'error') {
                        console.log('실패', data);
                    } else {
                        fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function(data, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });

        }
    }
    const partScdl = () => {
        if (confirm('모임에 참석하시겠습니까?')) {
            $.ajax({
                url: '/ajax/partScdl',
                type: 'POST',
                data: {
                    "room_ci": $("#room_ci").val()
                },
                async: false,
                success: function(data) {
                    console.log(data);
                    if (data.result === '0') {
                        // 성공
                        fn_alert('모임 참석자로 등록되었습니다!');
                    } else if (data.result === '1') {
                        fn_alert('이미 참석중입니다!');
                    } else {
                        fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function(data, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });

        }
    }
</script>