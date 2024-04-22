<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
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

        <?php $title = "전체 메뉴";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="menu_wrap">
                    <div class="menu_title">
                        <span>매치파이</span>
                    </div>
                    <div class="menu_cont">
                        <p>
                            <a onclick="moveToUrl('/mo/mypage/group/list')">매칭모임</a>
                        </p>
                        <!-- <p><a onclick="moveToUrl('/mo/partner')">매칭정보 입력</a></p> -->
                        <p><a onclick="moveToUrl('/mo/matchFeed')">매칭피드</a></p>
                        <p><a onclick="moveToUrl('/mo/alliance/list')">제휴점</a></p>
                        <p><a onclick="moveToUrl('/mo/matchFeed')">회원 등급 업그레이드</a></p>
                        <p><a onclick="moveToUrl('/mo/alliance/pass')">제휴 신청</a></p>
                        <p><a onclick="moveToUrl('/mo/invite')">친구 초대</a></p>

                    </div>
                </div>
                <hr class="hoz_part" />
                <div class="menu_wrap">
                    <div class="menu_title">
                        <span>고객센터</span>
                    </div>
                    <div class="menu_cont">
                        <p><a onclick="moveToUrl('/mo/notice')">공지사항</a></p>
                        <p><a onclick="moveToUrl('/mo/faq')">FAQ</a></p>
                        <p><a onclick="moveToUrl('/mo/terms')">약관안내</a></p>
                        <p><a onclick="moveToUrl('/mo/privacy')">개인정보처리방침</a></p>
                    </div>
                </div>
            </div>
            <div class="commerce_banner">광고 배너 영역</div>
            <div style="height: 50px;"></div>
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