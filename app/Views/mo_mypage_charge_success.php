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
                    <img src="/static/images/point_success.png" />
                    <div class="success_text">
                        <p><?= lang('Korean.chargeSuccCon') ?></p>
                        <em><?= $msg ?></em>
                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="btn_group">
                    <button type="button" class="btn type01" onclick='loc_WalletLocation()'><?= lang('Korean.checkDepositDetails') ?></button>
                </div>

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