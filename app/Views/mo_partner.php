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
                        내 상대
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_partner">
                    <div class="content_partner_header">
                        <p>장원영님, 반갑습니다.<br />
                            어떤 친구를 원하시나요?</p>
                        <h2>만나고 싶은 친구의 정보를<br />
                            입력해주세요! </h2>
                    </div>
                    <img src="/static/images/partner.png" />
                </div>
                <form class="main_signin_form">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="appear_type" class="signin_label">외모유형</label>
                                <select id="appear_type" value="">
                                    <option value="">선택</option>
                                    <option value="0">강아지상</option>
                                    <option value="1">고양이상</option>
                                    <option value="2">여우상</option>
                                    <option value="3">기타</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="region1" class="signin_label">지역</label>
                                <select id="region1" value="">
                                    <option>시/군/구</option>
                                    <option value="0">서울특별시</option>
                                    <option value="1">경기도</option>
                                    <option value="2">인천광역시</option>
                                    <option value="3">기타</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="region2" class="signin_label">지역</label>
                                <select id="region2" value="">
                                    <option>시/군/구</option>
                                    <option value="0">서울특별시</option>
                                    <option value="1">경기도</option>
                                    <option value="2">인천광역시</option>
                                    <option value="3">기타</option>
                                </select>
                            </div>
                        </div>

                        <div class="btn_group">
                            <button type="button" class="btn type01">저장</button>
                        </div>
                    </div>
                </form>
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