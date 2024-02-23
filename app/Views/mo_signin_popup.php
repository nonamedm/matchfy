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
                <p class="txt">인증</p>
                <em class="desc">인증을 위한 혼인관계증명서를<br/>등록해주세요</em>
                <div class="">
                    <div class="regist_file">
                        <label for="profile_mov" class="signin_label profile_photo_input"></label>
                        <input id="profile_mov" type="file" value="" placeholder="">
                    </div>
                </div>
                <div class="chk_box">
                    <input type="checkbox" id="totAgree" name="chkDefault00" checked="">
                    <label class="totAgree_label" for="totAgree">동의합니다</label>
                </div>
                <div class="notice_box">
                    <p class="notice_text">본인은 업로드한 문서에 허위 사항이 없음을 확인하며,<br/>
                    허위 사실이 있을경우 그 손해에 대해<br/>
                    법정 최대 손해배상을 할 것을 동의합니다.</p>
                </div>
                <div class="layerPopup_bottom">
                    <div class="btn_group">
                        <button class="btn type01">확인</button>
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