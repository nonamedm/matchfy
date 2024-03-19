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
                        내지갑
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="mypage_wallet">
                    <div class="mypage_wallet_point">
                        <p>보유포인트</p>
                        <h2 class="current_points"></h2>
                    </div>
                    <div class="mypage_wallet_charge">
                        <div class="btn_group multy">
                            <button class="btn type01" onclick="pointCharge();">포인트 충전</button>
                            <button class="btn type03" onclick="pointExchange();">환전</button>
                        </div>
                    </div>
                    <div class="tab_wrap">
                        <ul>
                            <li class="on">
                                <a href="/mo/mypage/wallet">입금 내역</a>
                            </li>
                            <li>
                                <a href="/mo/mypage/wallet2">사용 내역</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mypage_wallet_list">
                        <div class="mypage_wallet_filter">
                            <select class="point_order small add">
                                <option value="latest"> 최신순</option>
                                <option value="oldest"> 오래된순</option>
                                <option value="highest_amount"> 금액많은순</option>
                                <option value="lowest_amount"> 금액적은순</option>
                            </select>
                            <div class="mypage_wallet_period">
                                <div class="btn_group multy">
                                    <button class="1week point_date btn type01 on" onclick="getPointSearch($('.point_order').val(),'1week','add')">1주일</button>
                                    <button class="1month point_date btn type01" onclick="getPointSearch($('.point_order').val(),'1month','add')">1개월</button>
                                    <button class="3month point_date btn type01" onclick="getPointSearch($('.point_order').val(),'3month','add')">3개월</button>
                                </div>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div id="point_content">
                            <?php foreach ($points as $point): ?>
                                <div class="mypage_wallet_detail">
                                    <div class="date">
                                        <p><?= date('Y-m-d', strtotime($point['create_at'])) ?></p>
                                    </div>
                                    <div class="desc">
                                        <p><?= $point['point_details'] ?></p>
                                    </div>
                                    <div class="price">
                                        <p>+ <?= number_format($point['add_point']) ?></p>
                                    </div>
                                </div>
                                <hr class="hoz_part" />
                            <?php endforeach ?>
                        </div>
                       
                        <!-- <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>포인트 충전</p>
                            </div>
                            <div class="price">
                                <p>+ 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>전지현</p>
                            </div>
                            <div class="price">
                                <p>+ 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>포인트 충전</p>
                            </div>
                            <div class="price">
                                <p>+ 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>전지현</p>
                            </div>
                            <div class="price">
                                <p>+ 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>성춘향</p>
                            </div>
                            <div class="price">
                                <p>+ 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>성춘향</p>
                            </div>
                            <div class="price">
                                <p>+ 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" /> -->
                    </div>
                </div>
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

    <!-- -->


</body>

</html>