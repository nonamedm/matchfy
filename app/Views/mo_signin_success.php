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
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>


        <div class="sub_wrap">
            <div class="content_wrap center_wrap">
                <div class="content_body" style="margin-top:235px">
                    <img src="/static/images/signup_success.png" />
                    <div class="success_text">
                        <p>가입 완료!</p>
                        <em>준회원 가입을 축하합니다.</em>
                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="btn_group">
                    <button type="button" class="btn type01" onclick='moveToUrl("/")'>메인화면으로 이동</button>
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

        document.addEventListener('DOMContentLoaded', function() {
            var gradeText = localStorage.getItem('gradeText');

            if (gradeText) {
                document.querySelector('.success_text em').textContent = `${gradeText} 가입을 축하합니다.`;
                localStorage.removeItem('gradeText');//localstorage 비우기
            }
        });
    </script>

    <!-- -->


</body>

</html>