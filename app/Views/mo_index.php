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
    <div class="wrap main_wrap" style="overflow-y: scroll;">

        <!-- HEADER: MENU + HEROE SECTION -->
        <header>

        </header>

        <div class="">
            <div class=" login_wrap" style="height:100%;">
                <div class="main_logo">
                    matchfy
                </div>
                <form class="main_login_form">
                    <legend></legend>
                    <div class="login_box">
                        <div class="form_row" style="text-align:center;">
                            <label for="id" class="blind"><?= lang('Korean.id') ?></label>
                            <input id="id" type="text" value="" style="width: 301px;" placeholder="<?= lang('Korean.loginPlacehoder') ?>" onkeypress="handleKeyPress(event)">
                        </div>
                        <div class="form_row" style="text-align:center; margin-top: 20px;">
                            <label for="id" class="blind"><?= lang('Korean.id') ?></label>
                            <input id="pw" type="password" value="" style="width: 301px;" placeholder="<?= lang('Korean.loginPlacehoder2') ?>" onkeypress="handleKeyPress(event)">
                        </div>
                        <div class="chk_box" style="margin-left: 7px; left: calc(50% - 302px / 2 + 0.5px);">
                            <input type="checkbox" id="keep" name="chkDefault00" checked="">
                            <label for="keep"><?= lang('Korean.autoId') ?></label>
                        </div>
                        <div class="btn_group">
                            <button type="button" style="width: 301px;" class="btn type01" onclick="userLogin()"><?= lang('Korean.login') ?></button>
                        </div>
                </form>
                <img src="/static/images/main_login_hr.png" style="position: relative; margin: 40px 0px 30px 0px;left: calc(50% - 302px / 2 + 0.5px);" />
                <div class="btn_group">
                    <button type="button" style="width: 301px;" class="btn type00" onclick="moveToUrl('/mo/pass')"><?= lang('Korean.signup') ?></button>
                </div>
                <div class="btn_group">
                    <img src="/static/images/oauth/kakao_login_medium_wide.png" class="oauth_login" onclick="location.href='/auth/kakao/login'" />
                </div>
                <!-- <div class="btn_group">
                    <img src="/static/images/oauth/naver_login_medium_wide.png" class="oauth_login" onclick="location.href='/auth/naver/login'" />
                </div> -->
                <div class="btn_group" style="height: 150px;"></div>
            </div>
        </div>
    </div>





    <div style="height: 50px;"></div>
    <footer class="footer">

    </footer>
    </div>


    <!-- SCRIPTS -->

    <script>
        $(document).ready(function() {

        });

        function handleKeyPress(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                userLogin();
            }
        }
    </script>

    <!-- -->


</body>

</html>