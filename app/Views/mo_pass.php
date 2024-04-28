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
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: none;"></mobileheader>

        <?php $title = "휴대폰 본인인증";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <form class="temp_input" action="/mo/agree" method="post">
                    <div class="content_title">
                        <h2><?= lang('Korean.passTitle') ?></h2>
                        <p><?= lang('Korean.passCon') ?> </p>
                    </div>
                    <div class="content_body">
                        <img src="/static/images/pass_phone_img.png" />
                    </div>
                    <div class="btn_group">
                        <button type="button" class="btn type01" onclick="certIdentify()"><?= lang('Korean.passTitle') ?></button>
                    </div>
            </div>
            <div class="content_title">
                <p>* <?= lang('Korean.passCon2') ?></p>
            </div>
            <input type="hidden" name="nickname" value="<?= $nickname ?>" />
            <input type="hidden" name="sns_type" value="<?= $sns_type ?>" />
            <input type="hidden" name="oauth_id" value="<?= $oauth_id ?>" />
            <input id="input_name" class="temp_input_text" type="text" name="name" placeholder="<?= lang('Korean.passCon1') ?>" value="<?= $name ?>" />
            <input id="input_mobile_no" class="temp_input_text" type="text" name="mobile_no" placeholder="<?= lang('Korean.passCon2') ?>" value="<?= $mobile_no ?>" />
            <input id="input_birthday" class="temp_input_text" type="text" name="birthday" placeholder="<?= lang('Korean.passCon3') ?>" value="<?= $birthday ?>" />
            <select id="input_gender" class="temp_input_text" name="gender">
                <option><?= lang('Korean.passGender') ?></option>
                <option value="0" <?php if ($gender === '0') : ?>selected<?php endif ?>><?= lang('Korean.woman') ?></option>
                <option value="1" <?php if ($gender === '1') : ?>selected<?php endif ?>><?= lang('Korean.man') ?></option>
            </select>
            </form>
        </div>


        <div style="height: 50px;"></div>
        <footer class="footer">

        </footer>
    </div>


    <!-- SCRIPTS -->
    <script src="/static/js/jquery.min.js"></script>
    <script>
        // $(document).ready(function () {
        //     $.ajax({
        //         url: "/ajax/delCmt",
        //         type: "post",
        //         data: { cmt_idx: '_cmt_idx', trgt_id: '_trgt_id', trgt_idx: '_trgt_idx' }, //
        //         dataType: "json",
        //         async: false,
        //         success: function (data) {
        //             console.log(data);
        //             if (data) {
        //                 // 성공
        //                 //console.log('111');

        //             } else {
        //                 // 삭제 성공
        //                 //console.log('222');
        //                 alert("오류가 발생하였습니다. \n다시 시도해 주세요.");
        //             }
        //             return false;
        //         },
        //         error: function (data, status, err) {
        //             alert("there was an error while fetching events!");
        //             console.log(err);
        //         },
        //     });
        // });
    </script>

    <!-- -->


</body>

</html>