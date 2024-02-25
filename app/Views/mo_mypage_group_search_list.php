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
                        매칭모임
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_search">
                    <input style="text" placeholder="모임을 검색해보세요!" value="강남" />
                    <img src="/static/images/ico_search_18x18.png" />
                </div>

                <div class="group_search_list">
                    <div class="group_list_item">
                        <img src="/static/images/group_list_1.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            서울/강남구
                        </div>
                        <p class="group_price">20,000원</p>
                        <p class="group_schedule">2024.02.14(수) 20:00</p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_2.png" />
                        <div class="group_particpnt">
                            <span>신청 5</span>/6명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            서울/성동구
                        </div>
                        <p class="group_price">25,000원</p>
                        <p class="group_schedule">2024. 02. 24(토) 19:30 </p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_3.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/6명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            서울/도봉구
                        </div>
                        <p class="group_price">20,000원</p>
                        <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_4.png" />
                        <div class="group_particpnt">
                            <span>신청 4</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            경기/분당
                        </div>
                        <p class="group_price">20,000원</p>
                        <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_1.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            서울/강남구
                        </div>
                        <p class="group_price">20,000원</p>
                        <p class="group_schedule">2024.02.14(수) 20:00</p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_2.png" />
                        <div class="group_particpnt">
                            <span>신청 5</span>/6명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            서울/성동구
                        </div>
                        <p class="group_price">25,000원</p>
                        <p class="group_schedule">2024. 02. 24(토) 19:30 </p>
                    </div>
                </div>
            </div>
        </div>
    </div>





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