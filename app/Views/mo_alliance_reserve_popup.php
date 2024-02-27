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
    <div class="layerPopup alert"><!-- class: imgPop 추가 -->
        <div class="layerPopup_wrap">
            <div class="layerPopup_content small">
                <p class="txt">예약 확인</p>

                <div class="alliance_sch_list popup">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="">3일전</div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>박효신 연말 콘서트</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class="">인원 2명</span>
                    </div>
                </div>
                <div style="height: 50px;"></div>
                <div class="layerPopup_bottom">
                    <div class="btn_group multy">
                        <button class="btn type03">예약 취소</button>
                        <button class="btn type01">대화방 입장</button>
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