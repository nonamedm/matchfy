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
                        환전
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="alliance_payment">
                    <div class="alliance_payment_point">
                        <p>보유포인트</p>
                        <h2>1,000,000</h2>
                    </div>
                    <div class="form_row signin_form">
                        <div class="signin_form_div">
                            <label for="alliance_exchange_amount" class="signin_label">환전 금액</label>
                            <div>
                                <input id="alliance_exchange_amount" type="number" value="" placeholder="금액 입력(원)">
                            </div>
                        </div>
                    </div>
                    <hr class="hoz_part" />
                    <div class="alliance_detail_cont">
                        <h2>환전 정보</h2>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_exchange_bank" class="signin_label">은행</label>
                                <select id="alliance_exchange_bank" class="custom_select" value="">
                                    <option>은행 선택</option>
                                    <option value="0">신한</option>
                                    <option value="1">국민</option>
                                    <option value="2">부산</option>
                                    <option value="3">경남</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_exchange_account" class="signin_label">계좌번호</label>
                                <div>
                                    <input id="alliance_exchange_account" type="number" value="" placeholder="금액 입력(원)">
                                </div>
                            </div>
                        </div>
                        <div class="amount_pay">
                            <div class="amount_pay_left alliance">
                                <h2>총 환전금액</h2>
                            </div>
                            <div class="amount_pay_right">
                                <h2>40,000 원</h2>
                            </div>
                        </div>
                    </div>
                    <hr class="hoz_part" />

                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="pay_agree_desc">
                    <div class="chk_box">
                        <input type="checkbox" id="agree01" name="chkDefault00" checked="">
                        <label class="agree_cont_label" for="agree01">위 구매조건 확인 및 결제진행에 동의</label>
                    </div>
                    <p>· 환전 신청 후 3~5 영업일 이내에 본인계좌에 입급됩니다.</p>
                </div>
                <div class="btn_group">
                    <button type="button" class="btn type01">환전하기</button>
                </div>
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

    <!-- -->


</body>

</html>