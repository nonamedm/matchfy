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
    <div class="wrap main_wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <header>

            <!-- <div class="menu">
            <ul>
                <li class="logo">
                    <img src="/static/images/matchfy.png" />
                </li>
                <li class="menu-toggle">
                    <button onclick="toggleMenu();">&#9776;</button>
                </li>

                <li class="menu_item">

                    <button class="login_btn" href="#" target="_blank"><img src="/static/images/login_ico.png" />
                        <p>로그인</p>
                    </button>
                </li>
            </ul>
        </div> -->

        </header>

        <div class="sub_wrap">
            <div class="login_wrap">
                <div class="main_logo">
                    matchfy
                </div>
                <form class="main_login_form">                    
                    <legend></legend>
                    <div class="login_box">
                        <div class="form_row">
                            <label for="id" class="blind">아이디</label>
                            <input id="id" type="text" value="" placeholder="휴대폰 번호 입력">
                        </div>
                        <div class="chk_box">
                            <input type="checkbox" id="keep" name="chkDefault00" checked="">
                            <label for="keep">자동 로그인</label>
                        </div>
                        <div class="btn_group">
                            <button type="button" class="btn type01">로그인</button>
                        </div>
                        <img src="/static/images/main_login_hr.png" style="margin: 40px 0px 30px 0px;"/>
                        <div class="btn_group">
                            <button type="button" class="btn type00">휴대폰 번호로 회원가입</button>
                        </div>
                        <div class="btn_group">
                            <button type="button" class="btn naver_login">네이버로 계속하기</button>
                        </div>
                    </div>
                </form>
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