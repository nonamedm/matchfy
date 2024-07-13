<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0,  user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->

        <header>

            <div class="menu">
                <ul>
                    <li class="left_arrow">
                        <img src="/static/images/left_arrow.png" />
                    </li>
                    <li class="header_title">
                        <?= lang('Korean.myMeet') ?>
                    </li>
                </ul>
                <div class="menu_right edit"><?= lang('Korean.delete') ?></div>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="notice_filter">
                    <p>09.01 ~ 09.30</p>
                    <select>
                        <option><?= lang('Korean.recent') ?></option>
                        <option><?= lang('Korean.recent') ?></option>
                        <option><?= lang('Korean.recent') ?></option>
                    </select>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="cancel"><?= lang('Korean.cancel') ?></div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="">3일전</div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="">1일전</div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="finish"><?= lang('Korean.close') ?></div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="finish"><?= lang('Korean.close') ?></div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="finish"><?= lang('Korean.close') ?></div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div style="height: 50px;"></div>
    <footer class="footer">


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