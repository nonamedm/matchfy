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
    <div class="layerPopup alert middle"><!-- class: imgPop 추가 -->
        <div class="layerPopup_wrap">
            <div class="layerPopup_content">
                <p class="txt">정보보기</p>
                <!-- <em class="desc">인증을 위한 혼인관계증명서를<br/>등록해주세요</em> -->
                <div class="content_mypage">
                    <img class="profile_img" src="/static/images/mypage_pfofile.png" />
                    <div class="content_mypage_info">
                        <div class="profile">
                            <h2>장원영<span style="font-size:15px;"> 님</span></h2>
                        </div>
                        <p>96 · 서울 강남 · ESTJ</p>
                    </div>
                    <div>
                        <button class="popup_view_profile">프로필</button>
                    </div>
                </div>

                <div class="profile_img_box">
                    <img src="/static/images/profile_img_1.png" />
                    <img src="/static/images/profile_img_2.png" />
                    <img src="/static/images/profile_img_3.png" />
                    <img src="/static/images/profile_img_4.png" />
                    <img src="/static/images/profile_img_5.png" />
                    <img src="/static/images/profile_img_6.png" />
                    <img src="/static/images/profile_img_7.png" />
                    <img src="/static/images/profile_img_8.png" />
                    <img src="/static/images/profile_img_9.png" />
                </div>
                <!-- <div class="layerPopup_bottom">
                    <div class="btn_group">
                        <button class="btn type01">확인</button>
                    </div>
                </div> -->
            </div>
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