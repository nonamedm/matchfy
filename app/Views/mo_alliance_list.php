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
                        제휴
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="alliance_banner" style="margin-left:-20px;">
                    <img src="/static/images/alliance_banner.png" />
                </div>
                <div class="group_search">
                    <input style="text" placeholder="제휴점을 검색해보세요!" />
                    <img src="/static/images/ico_search_18x18.png" />
                </div>
                <div class="group_category">
                    <div class="group_category_all">
                        <img src="/static/images/group_category_all.png" />
                        <p>전체</p>
                    </div>
                    <div class="group_category_1">
                        <img src="/static/images/alliance_category_1.png" />
                        <p>음식점</p>
                    </div>
                    <div class="group_category_2">
                        <img src="/static/images/alliance_category_2.png" />
                        <p>카페</p>
                    </div>
                    <div class="group_category_3">
                        <img src="/static/images/alliance_category_3.png" />
                        <p>숙박</p>
                    </div>
                    <div class="group_category_4">
                        <img src="/static/images/alliance_category_4.png" />
                        <p>기타</p>
                    </div>
                </div>
                <div class="group_search_filter">
                    <select class="small">
                        <option>지역 전체</option>

                    </select>
                </div>
                <div class="group_search_list">
                    <div class="group_list_item">
                        <img src="/static/images/alliance_shop_1.png" />

                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            코다차야
                        </div>
                        <p class="group_price">서울 강남</p>
                        <p class="group_schedule">음식점</p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/alliance_shop_2.png" />

                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            용마커피
                        </div>
                        <p class="group_price">서울 관악</p>
                        <p class="group_schedule">카페</p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/alliance_shop_3.png" />

                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            가평꿈그린
                        </div>
                        <p class="group_price">경기 가평</p>
                        <p class="group_schedule">숙박</p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/alliance_shop_4.png" />

                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            레드버튼
                        </div>
                        <p class="group_price">서울 동작</p>
                        <p class="group_schedule">기타</p>
                    </div>
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