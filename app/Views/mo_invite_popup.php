<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="layerPopup bottom">
        <div class="layerPopup_wrap">
            <div class="layerPopup_heading">
                <img src="/static/images/invite_popup_img.png" style="position: absolute; right: 20px; top: -40px;" />
                <!-- <h2 class="heading">상담안내</h2> -->
                <!-- <a href="javascript:avoid(0)" class="btn_close"><?= lang('Korean.close') ?></a> -->
            </div>
            <div class="layerPopup_content bg_white">
                <h2 class="title"><?= lang('Korean.inviteCode') ?><br />
                    <?= lang('Korean.regularMember') ?> / <?= lang('Korean.premiumMember') ?> <span>50% <?= lang('Korean.discount') ?>!</span></h2>

                <div class="invite_code_popup">
                    <input type="text" placeholder="<?= lang('Korean.invitePlaceholder') ?>" />
                </div>
            </div>
            <div class="layerPopup_bottom">
                <div class="btn_group multy">
                    <button class="btn type02"><?= lang('Korean.skip') ?></button>
                    <button class="btn type01"><?= lang('Korean.registration') ?></button>
                </div>
            </div>
        </div>
        <!-- e : 상담안내 : 전화상담 -->



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


</body>

</html>