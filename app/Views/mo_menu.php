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
                    <img src="/static/images/left_arrow.png"/>
                </li>
                <li class="header_title">
                    전체 메뉴
                </li>
            </ul>
        </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="menu_wrap">
                    <div class="menu_title">
                        <span>매치파이</span>
                    </div>
                    <div class="menu_cont">
                        <p>매칭모임</p>
                        <p>매칭피드</p>
                        <p>제휴점</p>
                        <p>회원 등급 업그레이드</p>
                        <p>제휴 신청</p>
                    </div>
                </div>
                <hr class="hoz_part"/>
                <div class="menu_wrap">
                    <div class="menu_title">
                        <span>고객센터</span>
                    </div>
                    <div class="menu_cont">
                        <p>공지사항</p>
                        <p>FAQ</p>
                        <p>약관안내</p>
                        <p>개인정보처리방침</p>
                    </div>
                </div>
            </div>
            <div class="commerce_banner">광고 배너 영역</div>
            <footer class="footer">
                
    
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