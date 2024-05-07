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
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "매칭모임";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_search">
                    <input style="text" placeholder="<?= lang('Korean.meetplaceholder') ?>" value="강남" />
                    <img src="/static/images/ico_search_18x18.png" />
                </div>

                <div class="group_search_list">
                    <div class="group_list_item">
                        <img src="/static/images/group_list_1.png" />
                        <div class="group_particpnt">
                            <span><?= lang('Korean.application') ?> 2</span>/4<?= lang('Korean.people') ?>
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            <?= lang('Korean.seoul') ?>/강남구
                        </div>
                        <p class="group_price">20,000<?= lang('Korean.won') ?></p>
                        <p class="group_schedule">2024.02.14(수) 20:00</p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_2.png" />
                        <div class="group_particpnt">
                            <span><?= lang('Korean.application') ?> 5</span>/6<?= lang('Korean.people') ?>
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            <?= lang('Korean.seoul') ?>/성동구
                        </div>
                        <p class="group_price">25,000<?= lang('Korean.won') ?></p>
                        <p class="group_schedule">2024. 02. 24(토) 19:30 </p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_3.png" />
                        <div class="group_particpnt">
                            <span><?= lang('Korean.application') ?> 2</span>/6<?= lang('Korean.people') ?>
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            <?= lang('Korean.seoul') ?>/도봉구
                        </div>
                        <p class="group_price">20,000<?= lang('Korean.won') ?></p>
                        <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_4.png" />
                        <div class="group_particpnt">
                            <span><?= lang('Korean.application') ?> 4</span>/4<?= lang('Korean.people') ?>
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            <?= lang('Korean.gyeonggi') ?>/분당
                        </div>
                        <p class="group_price">20,000<?= lang('Korean.won') ?></p>
                        <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_1.png" />
                        <div class="group_particpnt">
                            <span><?= lang('Korean.application') ?> 2</span>/4<?= lang('Korean.people') ?>
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            <?= lang('Korean.seoul') ?>/강남구
                        </div>
                        <p class="group_price">20,000<?= lang('Korean.won') ?></p>
                        <p class="group_schedule">2024.02.14(수) 20:00</p>
                    </div>
                    <div class="group_list_item">
                        <img src="/static/images/group_list_2.png" />
                        <div class="group_particpnt">
                            <span><?= lang('Korean.application') ?> 5</span>/6<?= lang('Korean.people') ?>
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            <?= lang('Korean.seoul') ?>/성동구
                        </div>
                        <p class="group_price">25,000<?= lang('Korean.won') ?></p>
                        <p class="group_schedule">2024. 02. 24(토) 19:30 </p>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div style="height: 50px;"></div>
    <footer class="footer">

        <!-- <div class="footer_logo mb40">
                matchfy
            </div>
            <div class="footer_link mb40">
                <a href="#"><?= lang('Korean.companyName') ?></a>
                <a href="#"><?= lang('Korean.pravacyName') ?></a>
                <a href="#"><?= lang('Korean.serviceName') ?></a>
                <a href="#"><?=lang('Korean.supporterName')?></a>
            </div>
            <div class="footer_info mb40">
                <span><?= lang('Korean.footerInfo1') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo2') ?></span>
                <span><?= lang('Korean.footerInfo3') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo4') ?><img
                        src="/static/images/part_line.png" /> gildong@naver.com</span>
            </div>
            <div class="footer_copy">
                COPYRIGHT 2023. ALL RIGHTS RESERVED.
            </div> -->

    </footer>
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