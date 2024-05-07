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
    <script src="/static/js/wallet.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->



        <div class="sub_wrap">
            <div class="content_wrap center_wrap">
                <div class="content_body" style="margin-top:235px">
                    <img src="/static/images/alliance_succese.png" />
                    <div class="success_text">
                        <p><?= ($num == 1) ? "제휴 신청 완료" : (($num == 2) ? "제휴 예약완료" : "완료") ?></p>
                        <em><?= $msg ?></em>
                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="btn_group">
                    <button type="button" class="btn type01" onclick='moveToUrl("/")'><?= lang('Korean.rootBtn') ?></button>
                </div>
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

        document.addEventListener('DOMContentLoaded', function() {
            var gradeText = localStorage.getItem('gradeText');

            if (gradeText) {
                document.querySelector('.success_text em').textContent = `${gradeText} 가입을 축하합니다.`;
                localStorage.removeItem('gradeText'); //localstorage 비우기
            }
        });
    </script>

    <!-- -->


</body>

</html>