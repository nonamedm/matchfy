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
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        
        <?php $title = "제휴"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_deatil_img">
                    <img src="/static/images/alliance_detail.png" />
                </div>
                <div class="group_detail_info">
                    <div class="group_detail_header">
                        <div class="group_detail_type">기타</div>
                        <p>　</p>
                    </div>
                    <div class="group_detail_title">
                        <h2>레드버튼 보드게임(이수점)</h2>
                        <p class="group_detail_schedule">서울 동작</p>
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
                            <img src="/static/images/calendar.png" />

                        </div>
                        <div class="alliance_detail_cont">
                            <h2>회차를 선택하세요</h2>
                            <div class="alliance_reserv_list">
                                <div class="alliance_reserv_time">10:00</div>
                                <div class="alliance_reserv_time">11:00</div>
                                <div class="alliance_reserv_time">12:00</div>
                                <div class="alliance_reserv_time">13:00</div>
                                <div class="alliance_reserv_time close">14:00</div>
                                <div class="alliance_reserv_time">15:00</div>
                                <div class="alliance_reserv_time on">16:00</div>
                                <div class="alliance_reserv_time">17:00</div>
                                <div class="alliance_reserv_time">18:00</div>
                                <div class="alliance_reserv_time">19:00</div>
                                <div class="alliance_reserv_time">20:00</div>
                            </div>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2>인원을 선택해주세요</h2>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <div style="display: flex; align-items: center;">
                                        <input id="quantity" type="number" value="" style="width:225px;"
                                            placeholder="인원수" />
                                        <p style="margin-left:8px; font-size: 15px;">명</p>
                                        <a style="margin-left:15px;"><img src="/static/images/ico_plus_30x30.png" /></a>
                                        <a style="margin-left:12px;"><img src="/static/images/ico_minus_30x30.png" /></a>
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
                                    <h2>40,000 원</h2>
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
                            <p>· 최소 2인 이상 예약 및 체험이 가능합니다.</p>
                            <p>· 입장 시간 10분 전까지 도착해주세요.</p>
                            <p>· 예약처리 기준 15분 내 미 방문 시 자동 사용 완료 처리 됩니다.</p>
                            <p>· 주차 불가 </p>
                            <p>· 외부 음료 반입 금지</p>

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
                                서울시 동작구 상도동 205-23 2층
                            </div>                        
                            <div class="group_detail_map">
                                <img src="/static/images/group_naver_map.png" />
                            </div>
                        </div>
                        <div class="alliance_detail_cont">
                            <h2>판매자 정보</h2>
                            <div class="alliance_profile_content">
                                <h2>상호</h2>
                                <p>레드버튼 이수</p>
                            </div>                            
                            <div class="alliance_profile_content">
                                <h2>대표자명</h2>
                                <p>홍길동</p>
                            </div>                            
                            <div class="alliance_profile_content">
                                <h2>사업자번호</h2>
                                <p>112-34-55667</p>
                            </div>                            
                            <div class="alliance_profile_content">
                                <h2>연락처</h2>
                                <p>02-1234-1234</p>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div style="height: 50px;"></div>
                <footer class="footer">

                    <div class="btn_group">
                        <button type="button" class="btn type01">예약하기</button>
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
            $('.tab').click(function() {
                $('.tab').removeClass('on');
                $(this).addClass('on');
                
                $('.alliance_tab_content').hide();
                $($(this).data('target')).show();// 클릭된 탭에 해당하는 콘텐츠만 보여줌
            });
        });
    </script>

    <!-- -->


</body>

</html>