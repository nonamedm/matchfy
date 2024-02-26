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
                <p class="txt">피드 등록</p>
                <div class="">
                    <div class="regist_file myfeed_file">
                        <label for="profile_mov" class="signin_label profile_photo_input"></label>
                        <input id="profile_mov" type="file" value="" placeholder="">
                    </div>
                </div>
                <div class="myfeed_text">
                    <textarea placeholder="내용을 입력하세요"></textarea>
                </div>

                <div class="schedule_calendar" style="height: 75px; text-align: center;">
                    <div class="chk_box radio_box">
                        <input type="radio" id="grade01" name="grade" checked="">
                        <label for="grade01">
                            <h2>공개</h2>
                        </label>
                    </div>
                    <div class="chk_box radio_box">
                        <input type="radio" id="grade02" name="grade" checked="">
                        <label for="grade02">
                            <h2>비공개</h2>
                        </label>
                    </div>
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