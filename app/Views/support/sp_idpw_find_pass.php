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
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "서포터즈 이메일/비밀번호찾기";
        $prevUrl = "/mo";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <form name="form" id="form" action="https://nice.checkplus.co.kr/CheckPlusSafeModel/service.cb">
                    <div class="content_title">
                        <h2><?= lang('Korean.passTitle') ?></h2>
                        <p><?= lang('Korean.passCon') ?> </p>
                    </div>
                    <div class="content_body">
                        <img src="/static/images/pass_phone_img.png" />
                    </div>
                    <div class="btn_group">
                        <button type="button" class="btn type01" onclick="certIdentify()"><?= lang('Korean.passTitle') ?></button>
                        <!-- <button type="button" class="btn type01" onclick="moveToUrl('/support/mo')"><?= lang('Korean.login') ?></button> -->
                    </div>
                    <input type="hidden" name="nickname" value="<?= $nickname ?>" />
                    <input type="hidden" name="sns_type" value="<?= $sns_type ?>" />
                    <input type="hidden" name="oauth_id" value="<?= $oauth_id ?>" />
            </div>
            <input type="hidden" id="m" name="m" value="service" />
            <input type="hidden" id="token_version_id" name="token_version_id" value="" />
            <input type="hidden" id="enc_data" name="enc_data" />
            <input type="hidden" id="integrity_value" name="integrity_value" />
            </form>
        </div>

        <div style="height: 50px;"></div>
        <footer class="footer">

        </footer>
    </div>


    <!-- SCRIPTS -->
    <script src="/static/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                // url: '/proxy/createPassWeb',
                url: '/support/proxy/spIdPwFind',
                type: 'POST',
                data: {
                    "nickname": "<?= $nickname ?>",
                    "sns_type": "<?= $sns_type ?>",
                    "oauth_id": "<?= $oauth_id ?>"
                },
                success: function(response) {
                    // console.log('Success: ' + JSON.stringify(response));
                    $("#token_version_id").val(response.token_version_id);
                    $("#enc_data").val(response.enc_data);
                    $("#token_version_id").val(response.token_version_id);
                    $("#integrity_value").val(response.intergrity_val);
                },
                error: function(xhr, status, error) {
                    console.log('Error: ' + xhr.responseText);
                }
            });
            <?php if ($mobile_dup_chk === '0') {
            ?>
                fn_confirm('회원님의 등록된 이메일 주소는 <?= $email ?> 입니다. </br> 비밀번호 재설정을 원하시면 확인을 눌러주세요.', 'spIdpwFind');
            <?php
            } ?>
        });
    </script>

    <!-- -->


</body>

</html>