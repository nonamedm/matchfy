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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/wallet.js"></script>
    <script src="https://pay.nicepay.co.kr/v1/js/"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
    <script>
        
        </script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        <header>

            <div class="menu">
                <ul>
                    <li class="left_arrow">
                        <a href="/mo/mypage/wallet"><img src="/static/images/left_arrow.png" /></a>
                    </li>
                    <li class="header_title">
                        내지갑
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="mypage_wallet charge">
                    <div class="mypage_wallet_point">
                        <p>보유포인트</p>
                        <h2>1,000,000</h2>
                    </div>
                    <hr class="hoz_part" />
                    <form class="main_signin_form">
                        <legend></legend>
                        <div class="">
                            <div class="mypage_wallet_select">
                                <p>구매포인트</p>
                                <div class="charge_select1 selected" >
                                    <p data-points="5000" data-price="5500">5,000P (5,500원)</p>
                                </div>
                                <div class="charge_select2" style="margin-top: 10px;">
                                    <p data-points="100000" data-price="100000">100,000P (100,000원)</p>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="quantity" class="signin_label">구매수량</label>
                                    <div style="display: flex; align-items: center;">
                                        <input id="quantity" type="number" value="1" min="1" style="width:225px;" placeholder="수량입력" />
                                        <p style="margin-left:8px; font-size: 15px;">개</p>
                                        <a class="quantity_plus" style="margin-left:15px;"><img src="/static/images/ico_plus_30x30.png" /></a>
                                        <a class="quantity_minus" style="margin-left:12px;"><img src="/static/images/ico_minus_30x30.png" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="paymethod" class="signin_label">충전수단</label>
                                    <select id="paymethod" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">신용카드</option>
                                        <option value="1">간편결제</option>
                                        <option value="2">계좌이체</option>
                                        <option value="3">무통장입금</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="amount_pay">
                                    <div class="amount_pay_left">
                                        <h2>총 결제금액</h2>
                                    </div>
                                    <div class="amount_pay_right">
                                        <p id="selected_pay_type">결재선택</p>
                                        <h2 id="total_price">5,000</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="height: 50px;"></div>
<footer class="footer">

                <div class="pay_agree_desc">
                    <div class="chk_box">
                        <input type="checkbox" id="agree01" name="chkDefault00" checked="">
                        <label class="agree_cont_label" for="agree01">위 구매조건 확인 및 결제진행에 동의</label>
                    </div>
                    <p>· 회원탈퇴 시 회원정보가 삭제됨으로 구매하신 포인트는
                        자동 소멸됩니다.</p>
                </div>
                <div class="btn_group">
                    <button type="button" class="btn type01" onclick="serverAuth()">충전하기</button>
                    
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