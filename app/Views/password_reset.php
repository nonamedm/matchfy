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


        <?php $title = "비밀번호 재설정";
        $prevUrl = "/mo";
        include 'header.php'; ?>

        <?php
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);
        ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <form class="main_signin_form" method="post" action="/mo/signinPhoto" enctype="multipart/form-data">
                    <div class="form_row signin_form">
                        <div class="signin_form_div">
                            <label for="email" class="signin_label">로그인 <?= lang('Korean.email') ?></label>
                            <input id="email" name="email" type="text" value="<?= $email ?>" readonly>
                        </div>
                    </div>

                    <div class="form_row signin_form">
                        <div class="signin_form_div">
                            <label for="pswd" class="signin_label"><?= lang('Korean.pswd') ?> 재설정</label>
                            <input id="pswd" name="pswd" type="password" placeholder="<?= lang('Korean.pswdPlaceholder') ?>">
                        </div>
                    </div>
                    <div class="form_row signin_form">
                        <div class="signin_form_div">
                            <label for="pswdChk" class="signin_label"><?= lang('Korean.pswdChk') ?></label>
                            <input id="pswdChk" name="pswdChk" type="password" placeholder="<?= lang('Korean.pswdChkPlaceholder') ?>">
                        </div>
                    </div>


                    <div class="btn_group multy">
                        <button type="button" class="btn type02"><?= lang('Korean.cancel') ?></button>
                        <button type="button" class="btn type01" onclick="passwdUpdate()">비밀번호 재설정</button>
                    </div>
            </div>
            </form>
        </div>
    </div>





    <div style="height: 50px;"></div>
    <footer class="footer">
    </footer>
    </div>
</body>

</html>