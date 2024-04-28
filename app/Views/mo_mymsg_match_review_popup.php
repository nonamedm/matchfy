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
                <p class="txt"><?=lang('Korean.reviewEdit')?></p>
                
                <div class="">
                    <div class="review_title">
                        <h2><span>장원영</span><?=lang('Korean.reviewCon')?></h2>
                    </div>
                    <div class="review_point">
                        <button class="review_point_on"></button>
                        <button class="review_point_off"></button>
                        <button class="review_point_off"></button>
                        <button class="review_point_off"></button>
                        <button class="review_point_off"></button>
                    </div>
                    <div class="review_button">
                        <button class="review_button_on"><?=lang('Korean.veryGood2')?></button>
                        <button class="review_button_off"><?=lang('Korean.good2')?></button>
                        <button class="review_button_off"><?=lang('Korean.qnanormal2')?></button>
                        <button class="review_button_off"><?=lang('Korean.dontLike2')?></button>
                        <button class="review_button_off"><?=lang('Korean.verryHate2')?></button>
                    </div>
                </div>
                <div class="review_text">
                    <textarea placeholder="<?=lang('Korean.reviewPlaceholder')?>"></textarea>
                </div>
                <div class="review_caution">
                    <img src="/static/images/caution_mark.png"/>
                    <p class="">
                    <?=lang('Korean.reviewCon2')?></p>
                </div>
                <div class="layerPopup_bottom">
                    <div class="btn_group">
                        <button class="btn type01"><?=lang('Korean.reviewSub')?></button>
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