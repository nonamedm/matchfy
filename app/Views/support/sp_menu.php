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


        <?php $title = "서포터즈 전체 메뉴";
        $prevUrl = "/support";
        include 'spheader.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="menu_wrap">
                    <div class="menu_title">
                        <span>리워드 관리</span>
                    </div>
                    <div class="menu_cont">
                        <p onclick="moveToUrl('/support/mypage/wallet')"><a>포인트 지갑</a></p>
                        <p onclick="moveToUrl('/support/reward')"><a>리워드 내역 확인</a></p>
                        <p onclick="moveToUrl('/support/invite')"><a>친구초대 코드 발급</a></p>
                        <p onclick="moveToUrl('/support/referral')"><a>내부 서포터 추천하기</a></p>
                    </div>
                </div>
                <hr class="hoz_part" />
                <div class="menu_wrap">
                    <div class="menu_title">
                        <span>서포터즈 <?= lang('Korean.matchserviceCenter') ?></span>
                    </div>
                    <div class="menu_cont">
                        <p onclick="moveToUrl('/support/notice')"><a>서포터즈 <?= lang('Korean.matchNotice') ?></a></p>
                        <p onclick="moveToUrl('/support/faq')"><a>서포터즈 FAQ</a></p>
                        <p onclick="moveToUrl('/support/terms')"><a><?= lang('Korean.matchTerms') ?></a></p>
                        <p onclick="moveToUrl('/support/privacy')"><a><?= lang('Korean.matchPravacy') ?></a></p>
                    </div>
                </div>
            </div>
            
            <footer class="footer footer_display">
            <button class="content_spmypage_logout" onclick="userLogout()">
                    <?= lang('Korean.logout') ?>
                </button>

                <button class="content_spmypage_logout" onclick="spLogout()">
                    서포터즈 나가기
                </button>
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