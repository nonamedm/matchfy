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
                <p class="txt"><?=lang('Korean.declaration')?></p>
                
                <div class="">
                    <div class="report_title">
                        <h2><?=lang('Korean.ReasonReport')?></h2>
                    </div>
                    <div class="report_category">
                        <select>
                            <option value=""><?=lang('Korean.selected')?></option>
                            <option><?=lang('Korean.abuse')?></option>
                            <option><?=lang('Korean.embezzlement')?></option>
                            <option><?=lang('Korean.fakeAccount')?></option>
                            <option><?=lang('Korean.frequentAbsence')?></option>
                            <option><?=lang('Korean.directInput')?></option>
                        </select>
                    </div>
                </div>
                <div class="report_text">
                    <textarea placeholder="<?=lang('Korean.reportCon1')?>"></textarea>
                </div>
                <div class="review_caution">
                    <!-- <img src="/static/images/caution_mark.png"/>
                    <p class="">
                    <?=lang('Korean.reviewCon2')?></p> -->
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