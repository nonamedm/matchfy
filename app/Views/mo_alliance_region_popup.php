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
                <p class="txt">지역 선택</p>
                <!-- <em class="desc">인증을 위한 혼인관계증명서를<br/>등록해주세요</em> -->

                <div class="region_list">
                    <div class="region_list_box">전체</div>
                    <div class="region_list_box on">서울</div>
                    <div class="region_list_box">경기</div>
                    <div class="region_list_box">인천</div>
                    <div class="region_list_box">대전</div>
                    <div class="region_list_box">세종</div>
                    <div class="region_list_box">충남</div>
                    <div class="region_list_box">충북</div>
                    <div class="region_list_box">광주</div>
                    <div class="region_list_box">전남</div>
                    <div class="region_list_box">전북</div>
                    <div class="region_list_box">대구</div>
                    <div class="region_list_box">경북</div>
                    <div class="region_list_box">부산</div>
                    <div class="region_list_box">울산</div>
                    <div class="region_list_box">경남</div>
                    <div class="region_list_box">강원</div>
                    <div class="region_list_box">제주</div>
                </div>
                <div class="layerPopup_bottom">
                    <div class="btn_group multy">
                        <button class="btn type03">초기화</button>
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