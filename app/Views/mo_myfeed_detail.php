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
            <div class="layerPopup_content medium">
                <p class="txt">피드 상세</p>

                <div class="myfeed_detail">
                    <img src="/static/images/profile_img_detail.png" />
                </div>
                <div class="myfeed_cont">
                    <p>
                        내 취향이 가득한 꽃다발
                    </p>
                </div>
                <!-- <div class="report_text">
                    <textarea placeholder="기타 의견을 입력해주세요."></textarea>
                </div> -->

                <div class="layerPopup_bottom">
                    <div class="btn_group multy">
                        <button class="btn type02">삭제</button>
                        <button class="btn type01">수정</button>
                    </div>
                </div>
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