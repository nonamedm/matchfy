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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "<?=lang('Korean.all')?> 메뉴";
        $prevUrl = "/";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="menu_wrap">
                    <div class="menu_title">
                        <span><?= lang('Korean.matchfy') ?></span>
                    </div>
                    <div class="menu_cont">
                        <p onclick="moveToUrl('/mo/mypage/group/list')">
                            <a><?= lang('Korean.matchMeet') ?></a>
                        </p>
                        <!-- <p><a onclick="moveToUrl('/mo/partner')"><?= lang('Korean.matchInfoBtn') ?></a></p> -->
                        <p onclick="moveToUrl('/mo/matchFeed')"><a><?= lang('Korean.matchFeed') ?></a></p>
                        <p onclick="moveToUrl('/mo/alliance/list')"><a><?= lang('Korean.matchAliiance') ?></a></p>
                        <p onclick="moveToUrl('/mo/upgradeGrade')"><a><?= lang('Korean.matchUpgrade') ?></a></p>
                        <p onclick="moveToUrl('/mo/alliance/pass')"><a><?= lang('Korean.matchAllianceAppli') ?></a></p>
                        <p onclick="moveToUrl('/mo/invite')"><a>친구 초대</a></p>

                    </div>
                </div>
                <hr class="hoz_part" />
                <div class="menu_wrap">
                    <div class="menu_title">
                        <span><?= lang('Korean.matchserviceCenter') ?></span>
                    </div>
                    <div class="menu_cont">
                        <p onclick="moveToUrl('/mo/notice')"><a><?= lang('Korean.matchNotice') ?></a></p>
                        <p onclick="moveToUrl('/mo/faq')"><a>FAQ</a></p>
                        <p onclick="moveToUrl('/mo/terms')"><a><?= lang('Korean.matchTerms') ?></a></p>
                        <p onclick="moveToUrl('/mo/privacy')"><a><?= lang('Korean.matchPravacy') ?></a></p>
                    </div>
                </div>
            </div>
            <div class="commerce_banner"><?= lang('Korean.matchBanner') ?></div>
            <div style="height: 50px;"></div>
            <footer class="footer">



            </footer>
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