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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "제휴";
        $prevUrl = "/mo/alliance/list";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_deatil_img">
                    <div id="imageSlider" class="slider">
                        <?php foreach ($files as $file) : ?>
                            <div class="slide">
                                <img src="/<?= htmlspecialchars($file['file_path']) . htmlspecialchars($file['file_name']) ?>" alt="Slide Image" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a href="#" id="prev">&#10094;</a>
                    <a href="#" id="next">&#10095;</a>
                </div>
                <div class="group_detail_info">
                    <div class="group_detail_header">
                        <div class="group_detail_type">
                            <?php
                            if ($alliance_type === "01") {
                                echo "음식점";
                            } else if ($alliance_type === "02") {
                                echo "카페";
                            } else if ($alliance_type === "03") {
                                echo "숙박";
                            } else {
                                echo "기타";
                            }
                            ?>
                        </div>
                        <p>　</p>
                    </div>
                    <div class="group_detail_title">
                        <h2><?= $company_name ?></h2>
                        <p class="group_detail_schedule"><?= $address ?> <?= $detailed_address ?></p>
                    </div>
                    <div class="tab_wrap">
                        <ul>
                            <li class="tab on" data-target="#tab-reservation"><?= lang('Korean.reservBtn') ?></li>
                            <li class="tab" data-target="#tab-detail"><?= lang('Korean.allianceDetailInfo') ?></li>
                        </ul>
                    </div>
                    <div id="tab-reservation" class="alliance_tab_content active">
                        <div class="alliance_detail_cont">
                            <h2><?= lang('Korean.allianceDaySelected') ?></h2>
                            <div id="calendar"></div>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2><?= lang('Korean.allianceRoundSelected') ?></h2>
                            <div class="alliance_reserv_list">
                                <?php foreach ($time_slots as $time_slot) : ?>
                                    <?php
                                    $time_slot_time = explode(' ', $time_slot)[1];
                                    $isReserved = false;
                                    foreach ($reservations as $reservation) {
                                        // 예약 날짜와 시간을 결합하여 비교합니다.
                                        $reservedDateTime = substr($reservation['reservation_time'], 0, 5);
                                        if ($time_slot == $reservedDateTime) {
                                            $isReserved = true;
                                            break;
                                        }
                                    }
                                    ?>
                                    <div class="<?= $isReserved ? 'alliance_reserv_time close' : 'alliance_reserv_time' ?>">
                                        <?= htmlspecialchars($time_slot) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2><?= lang('Korean.alliancePeopleNumSelected') ?></h2>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <div style="display: flex; align-items: center;">
                                        <input id="quantity" type="number" value="1" style="width:225px;" placeholder="<?= lang('Korean.peopleNum') ?>" />
                                        <p style="margin-left:8px; font-size: 15px;"><?= lang('Korean.people') ?></p>
                                        <a style="margin-left:15px;" id="plus"><img src="/static/images/ico_plus_30x30.png" /></a>
                                        <a style="margin-left:12px;" id="minus"><img src="/static/images/ico_minus_30x30.png" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="amount_pay">
                                <div class="amount_pay_left alliance">
                                    <h2><?= lang('Korean.allPay') ?></h2>
                                </div>
                                <div class="amount_pay_right">
                                    <h2 id="totalAmount"><?= number_format($alliance_pay, 0) ?> <?= lang('Korean.won') ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="chk_box">
                            <input type="checkbox" id="totAgree" name="chkDefault00" checked="">
                            <label class="totAgree_label" for="totAgree"><?= lang('Korean.allianceAgreeTrue') ?></label>
                        </div>
                    </div>
                    <div id="tab-detail" class="alliance_tab_content">
                        <div class="alliance_detail_cont">
                            <h2><?= lang('Korean.intro') ?></h2>
                            <?= $detailed_content ?>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2>취소/환불 규정</h2>
                            <table class="basic_table">
                                <tr>
                                    <td><?= lang('Korean.allianceCancelCon2') ?></td>
                                    <td><?= lang('Korean.allianceCancelCon3') ?></td>
                                </tr>
                                <tr>
                                    <td><?= lang('Korean.allianceCancelCon4') ?></td>
                                    <td><?= lang('Korean.allianceCancelCon5') ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2><?= lang('Korean.allianceLocation') ?></h2>
                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                <?= $address ?> <?= $detailed_address ?>
                            </div>
                            <div class="group_detail_map">
                                <div id="map" style="width:100%;height:208px;margin-top: 20px;"></div>
                            </div>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2><?= lang('Korean.allianceSellerInfo') ?></h2>
                            <div class="alliance_profile_content">
                                <h2><?= lang('Korean.allianceMutual') ?></h2>
                                <p><?= $company_name ?></p>
                            </div>
                            <div class="alliance_profile_content">
                                <h2><?= lang('Korean.allianceRepresentativeName') ?></h2>
                                <p><?= $representative_name ?></p>
                            </div>
                            <div class="alliance_profile_content">
                                <h2><?= lang('Korean.allianceCeonum') ?></h2>
                                <p><?= $alliance_ceo_num ?></p>
                            </div>
                            <div class="alliance_profile_content">
                                <h2><?= lang('Korean.allianceCompanyContact') ?></h2>
                                <p><?= $company_contact ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 50px;"></div>
                <footer class="footer">

                    <div class="btn_group">
                        <button type="button" class="btn type01" id="alliance_reserve"><?= lang('Korean.reservBtn') ?></button>
                    </div>
                </footer>
            </div>

        </div>
    </div>


    <!-- SCRIPTS -->
    <script type="text/javascript" src="https://oapi.map.naver.com/openapi/v3/maps.js?ncpClientId=smqlge9tsx&submodules=geocoder"></script>
    <script>
        $(document).ready(function() {
            // 지도 호출
            initMap();

            // 이미지 슬라이드
            let slideIndex = 0;
            showSlides(slideIndex);

            $('#next').click(function(e) {
                e.preventDefault();
                showSlides(++slideIndex);
            });

            $('#prev').click(function(e) {
                e.preventDefault();
                showSlides(--slideIndex);
            });

            function showSlides(n) {
                let slides = $('.slide');
                if (n >= slides.length) slideIndex = 0;
                if (n < 0) slideIndex = slides.length - 1;

                slides.hide();
                $(slides[slideIndex]).show();
            }

            // 탭 구현
            $('.tab').click(function() {
                $('.tab').removeClass('on');
                $(this).addClass('on');

                $('.alliance_tab_content').hide();
                $($(this).data('target')).show();
            });

            // 시간 선택 테두리
            $('.alliance_reserv_list').on('click', '.alliance_reserv_time', function() {
                $('.alliance_reserv_time').removeClass('on');
                $(this).addClass('on');
            });

            var basePay = <?= $alliance_pay ?>;
            var totalAmount = basePay;

            // // 인원 수 증가
            $('#plus').click(function() {
                let currentValue = parseInt($('#quantity').val(), 10);
                $('#quantity').val(currentValue + 1);
            });

            function updateTotalAmount() {
                let currentValue = parseInt($('#quantity').val(), 10);
                totalAmount = basePay * currentValue;
                $('#totalAmount').text(totalAmount.toLocaleString() + ' 원');
            }

            // 인원 수 감소
            $('#minus').click(function() {
                let currentValue = parseInt($('#quantity').val(), 10);
                if (currentValue > 1) {
                    $('#quantity').val(currentValue - 1);
                }
            });

            //validation check
            $('#alliance_reserve').click(function() {
                var reserveTime = $('.alliance_reserv_time.on').text();
                // 회차 선택 확인
                if ($('.alliance_reserv_time.on').length === 0) {
                    fn_alert('회차를 선택해 주세요.');
                    return false;
                }
                // 인원 선택 확인
                var quantity = parseInt($('#quantity').val(), 10);
                if (isNaN(quantity) || quantity < 1) {
                    fn_alert('인원을 선택해 주세요.');
                    return false;
                }

                // 구매 조건 동의 확인
                if (!$('#totAgree').is(':checked')) {
                    fn_alert('구매 조건 확인 및 결제 진행에 동의해 주세요.');
                    return false;
                }

                // moveToUrl('/mo/alliance/payment/<?= $idx ?>?totalAmount=' + totalAmount);
                moveToUrl('/mo/alliance/payment/<?= $idx ?>/' + quantity + '/' + selectedDate + '/' + reserveTime);
            });
        });

        //달력
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            var calendarEl = document.getElementById('calendar');
            var lastSelectedDay;
            var allianceIdx = <?= $idx ?>;

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                locale: "ko",
                contentHeight: "auto",
                validRange: { // 오늘 이후의 날짜만 표시
                    start: today
                },
                dateClick: function(info) {
                    // 이전 테두리를 제거
                    if (lastSelectedDay) {
                        lastSelectedDay.classList.remove('selected-day');
                        lastSelectedDay.style.border = '';
                    }

                    // 선택한 날자 데이터 표시
                    info.dayEl.classList.add('selected-day');
                    lastSelectedDay = info.dayEl;

                    // 선택된 날짜 저장
                    selectedDate = info.dateStr;
                    console.log(selectedDate);

                    // 예약 정보 업데이트
                    $.ajax({
                        url: '/ajax/alliance/reservation',
                        type: 'GET',
                        data: {
                            date: selectedDate,
                            idx: allianceIdx
                        },
                        success: function(response) {
                            //console.log(response);
                            updateReservationList(response); // 예약 시간 표현
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching reservation data:", error);
                        }
                    });
                },
                dayCellContent: function(info) {
                    var number = document.createElement("a");
                    number.classList.add("fc-daygrid-day-number");
                    number.innerHTML = info.dayNumberText.replace("일", '');
                    // 오늘 이전의 날짜인 경우 클래스 추가하여 스타일 적용
                    if (info.date < today) {
                        number.classList.add("past-date");
                    }
                    return {
                        html: number.outerHTML
                    };
                },
            });
            calendar.render();
        });

        // 예약 시간 표현
        function updateReservationList(reservations) {
            var listHtml = '';
            var time_slots = <?php echo json_encode($time_slots); ?>;

            time_slots.forEach(function(time_slot) {
                var isReserved = reservations.some(function(reservation) {
                    return time_slot === reservation.reservation_time.substr(0, 5);
                });

                var classStr = isReserved ? 'alliance_reserv_time close' : 'alliance_reserv_time';
                listHtml += `<div class="${classStr}">${time_slot}</div>`;
            });

            document.querySelector('.alliance_reserv_list').innerHTML = listHtml;
        }

        function initMap() {
            var add1 = '<?= $address ?>';
            var add2 = '<?= $detailed_address ?>';
            naver.maps.Service.geocode({
                address: add1 + ' ' + add2
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
    </script>

    <!-- -->


</body>

</html>