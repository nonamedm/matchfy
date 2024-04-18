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
                <p class="txt"><?=lang('Korean.meetAppli')?></p>

                <div class="apply_group">
                    <div style="padding:20px;">
                        <div class="apply_group_detail">
                            <img src="/static/images/group_list_4.png" />
                            <div class="group_list_item group_apply_item">
                                <div class="group_particpnt">
                                    <span><?=lang('Korean.application')?> 5</span>/6<?=lang('Korean.people')?>
                                </div>
                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    <?=lang('Korean.seoul')?>/성동구
                                </div>
                                <p class="group_price">25,000<?=lang('Korean.won')?></p>
                                <p class="group_schedule">2024. 02. 24(토) 19:30 </p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="apply_group_point">
                            <p><?=lang('Korean.myPoint')?></p>
                            <h2>234,000<?=lang('Korean.won')?></h2>
                        </div>
                        <div class="apply_group_point">
                            <p><?=lang('Korean.meetPay')?></p>
                            <h2 class="minus">-30,000 <?=lang('Korean.won')?></h2>
                        </div>
                    </div>

                    <div class="layerPopup_bottom">
                        <div class="btn_group">
                            <button class="btn type01"><?=lang('Korean.payment')?></button>
                        </div>
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