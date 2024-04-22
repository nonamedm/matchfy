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
                <p class="txt"><?=lang('Korean.region')?> <?=lang('Korean.selected')?></p>
                <!-- <em class="desc">인증을 위한 혼인관계증명서를<br/>등록해주세요</em> -->

                <div class="region_list">
                    <div class="region_list_box"><?=lang('Korean.all')?></div>
                    <div class="region_list_box on"><?=lang('Korean.seoul')?></div>
                    <div class="region_list_box"><?=lang('Korean.gyeonggi')?></div>
                    <div class="region_list_box"><?=lang('Korean.incheon')?></div>
                    <div class="region_list_box"><?=lang('Korean.daejeon')?></div>
                    <div class="region_list_box"><?=lang('Korean.sejong')?></div>
                    <div class="region_list_box"><?=lang('Korean.chungnam')?></div>
                    <div class="region_list_box"><?=lang('Korean.chungbuk')?></div>
                    <div class="region_list_box"><?=lang('Korean.gwangju')?></div>
                    <div class="region_list_box"><?=lang('Korean.jeonnam')?></div>
                    <div class="region_list_box"><?=lang('Korean.jeonbuk')?></div>
                    <div class="region_list_box"><?=lang('Korean.daegu')?></div>
                    <div class="region_list_box"><?=lang('Korean.gyeongbuk')?></div>
                    <div class="region_list_box"><?=lang('Korean.busan')?></div>
                    <div class="region_list_box"><?=lang('Korean.ulsan')?></div>
                    <div class="region_list_box"><?=lang('Korean.gyeongnam')?></div>
                    <div class="region_list_box"><?=lang('Korean.gangwon')?></div>
                    <div class="region_list_box"><?=lang('Korean.jeju')?></div>
                </div>
                <div class="layerPopup_bottom">
                    <div class="btn_group multy">
                        <button class="btn type03"><?=lang('Korean.reset')?></button>
                        <button class="btn type01"><?=lang('Korean.check')?></button>
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