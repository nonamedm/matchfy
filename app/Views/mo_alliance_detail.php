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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        
        <?php $title = "제휴"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_deatil_img">
                    <div id="imageSlider" class="slider">
                        <?php foreach ($files as $file): ?>
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
                        <div class="group_detail_type"><?= $alliance_type ?></div>
                        <p>　</p>
                    </div>
                    <div class="group_detail_title">
                        <h2><?= $company_name ?></h2>
                        <p class="group_detail_schedule"><?= $address ?> <?= $detailed_address ?></p>
                    </div>
                    <div class="tab_wrap">
                        <ul>
                            <li class="tab on" data-target="#tab-reservation">예약하기</li>
                            <li class="tab" data-target="#tab-detail">상세정보</li>
                        </ul>
                    </div>
                    <div id="tab-reservation" class="alliance_tab_content active">
                        <div class="alliance_detail_cont">
                            <h2>일정을 선택하세요</h2>
                            <div id="calendar"></div>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2>회차를 선택하세요</h2>
                            <div class="alliance_reserv_list">
                                <?php foreach ($time_slots as $time_slot): ?>
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
                            <h2>인원을 선택해주세요</h2>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <div style="display: flex; align-items: center;">
                                        <input id="quantity" type="number" value="0" style="width:225px;"
                                            placeholder="인원수" />
                                        <p style="margin-left:8px; font-size: 15px;">명</p>
                                        <a style="margin-left:15px;" id="plus"><img src="/static/images/ico_plus_30x30.png" /></a>
                                        <a style="margin-left:12px;" id="minus"><img src="/static/images/ico_minus_30x30.png" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="amount_pay">
                                <div class="amount_pay_left alliance">
                                    <h2>총 결제금액</h2>
                                </div>
                                <div class="amount_pay_right">
                                    <h2 id="totalAmount"><?= number_format($alliance_pay, 0) ?> 원</h2>
                                </div>
                            </div>
                        </div>
                        <div class="chk_box">
                            <input type="checkbox" id="totAgree" name="chkDefault00" checked="">
                            <label class="totAgree_label" for="totAgree">위 구매조건 확인 및 결제진행에 동의</label>
                        </div>
                    </div>
                    <div id="tab-detail" class="alliance_tab_content">
                        <div class="alliance_detail_cont">
                            <h2>소개</h2>
                            <?= $detailed_content ?>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2>취소/환불 규정</h2>                        
                            <table class="basic_table">
                                <tr>
                                    <td>이용 1일 전까지</td>
                                    <td>결제 금액에 대한 취소 수수료 없음</td>
                                </tr>
                                <tr>
                                    <td>이용 당일</td>
                                    <td>결제 금액의 100% 차감</td>
                                </tr>
                            </table>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2>오시는 길</h2>
                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                <?= $address ?> <?= $detailed_address ?>
                            </div>                        
                            <div class="group_detail_map">
                                <img src="/static/images/group_naver_map.png" />
                            </div>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2>판매자 정보</h2>
                            <div class="alliance_profile_content">
                                <h2>상호</h2>
                                <p><?= $company_name ?></p>
                            </div>                            
                            <div class="alliance_profile_content">
                                <h2>대표자명</h2>
                                <p><?= $representative_name ?></p>
                            </div>                            
                            <div class="alliance_profile_content">
                                <h2>사업자번호</h2>
                                <p>추가필요</p>
                            </div>                            
                            <div class="alliance_profile_content">
                                <h2>연락처</h2>
                                <p><?= $company_contact ?></p>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div style="height: 50px;"></div>
                <footer class="footer">

                    <div class="btn_group">
                        <button type="button" class="btn type01" id="alliance_reserve">예약하기</button>
                    </div>
                </footer>
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

        $(document).ready(function() {
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

            // 인원 수 증가
            $('#plus').click(function() {
                let currentValue = parseInt($('#quantity').val(), 10);
                $('#quantity').val(currentValue + 1);
                updateTotalAmount();
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
                    updateTotalAmount();
                }
            });

            //validation check
            $('#alliance_reserve').click(function() {
                var reserveTime = $('.alliance_reserv_time.on').text();
                // 회차 선택 확인
                if ($('.alliance_reserv_time.on').length === 0) {
                    alert('회차를 선택해 주세요.');
                    return false;
                }
                // 인원 선택 확인
                var quantity = parseInt($('#quantity').val(), 10);
                if (isNaN(quantity) || quantity < 1) {
                    alert('인원을 선택해 주세요.');
                    return false;
                }

                // 구매 조건 동의 확인
                if (!$('#totAgree').is(':checked')) {
                    alert('구매 조건 확인 및 결제 진행에 동의해 주세요.');
                    return false;
                }

                // moveToUrl('/mo/alliance/payment/<?= $idx ?>?totalAmount=' + totalAmount);
                moveToUrl('/mo/alliance/payment/<?= $idx ?>/'+quantity+'/'+selectedDate+'/'+reserveTime);
            });
        });

        //달력
        document.addEventListener('DOMContentLoaded', function() {
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
                contentHeight:"auto",
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
                        data: { date: selectedDate,
                                idx: allianceIdx },
                        success: function(response) {
                            //console.log(response);
                            updateReservationList(response);// 예약 시간 표현
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching reservation data:", error);
                        }
                    });
                },
                dayCellContent: function (info) {
                    var number = document.createElement("a");
                    number.classList.add("fc-daygrid-day-number");
                    number.innerHTML = info.dayNumberText.replace("일", '');
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

    </script>

    <!-- -->


</body>

</html>