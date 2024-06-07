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


        <?php $title = "약관동의";
        $prevUrl = "/mo/pass";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_title">
                    <h2><?= lang('Korean.agreeCon') ?></h2>
                </div>
                <form class="" method="post" action="/support/signin">
                    <legend></legend>
                    <div class="login_box">
                        <div class="chk_box">
                            <input type="checkbox" id="totAgree" name="" onclick="totalAgree()" />
                            <label class="totAgree_label" for="totAgree"><?= lang('Korean.agreeBtn') ?></label>
                        </div>
                        <hr class="hoz_part" />
                        <div class="agree_cont">
                            <div class="chk_box">
                                <input type="checkbox" id="agree1" name="agree1" value="1" onclick="chkAgree()">
                                <label class="agree_cont_label" for="agree1"><?= lang('Korean.agreeChk') ?></label>
                            </div>
                            <div class="textarea">
                                <b>
                                    <?= $terms['title'] ?>
                                </b>
                                <p>
                                    <?= nl2br($terms['content']); ?>
                                </p>
                            </div>
                            <div class="chk_box">
                                <input type="checkbox" id="agree2" name="agree2" value="2" onclick="chkAgree()">
                                <label class="agree_cont_label" for="agree2"><?= lang('Korean.agreePravacy') ?></label>
                            </div>
                            <div class="textarea">
                                <b>
                                    <?= $privacy['title'] ?>
                                </b>
                                <p>
                                    <?= nl2br($privacy['content']); ?>
                                </p>
                            </div>
                            <div class="chk_box">
                                <input type="checkbox" id="agree3" name="agree3" value="3" onclick="chkAgree()">
                                <label class="agree_cont_label" for="agree3"><?= lang('Korean.agreePravacy2') ?></label>
                            </div>
                            <div class="textarea">
                                <b>
                                    <?= $privacy['title'] ?>
                                </b>
                                <p>
                                    <?= nl2br($privacy['content']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="hiddenAgree1" name="agree1">
                    <input type="hidden" id="hiddenAgree2" name="agree2">
                    <input type="hidden" id="hiddenAgree3" name="agree3">
                    <input type="hidden" name="mobile_no" value="<?= $decrypted['mobileno'] ?>" />
                    <input type="hidden" name="name" value="<?= urldecode($decrypted['utf8_name']) ?>" />
                    <input type="hidden" name="birthday" value="<?= $decrypted['birthdate'] ?>" />
                    <input type="hidden" name="gender" value="<?= $decrypted['gender'] ?>" />
                    <input type="hidden" name="nickname" value="<?= $nickname ?>" />
                    <input type="hidden" name="sns_type" value="<?= $sns_type ?>" />
                    <input type="hidden" name="oauth_id" value="<?= $oauth_id ?>" />
                </form>

                <div style="height: 50px;"></div>
                <footer class="footer">

                    <div class="btn_group">
                        <button type="button" class="btn type01" onclick="SupportSubmitFormAgree()"><?= lang('Korean.next') ?></button>
                    </div>
                </footer>
            </div>
        </div>

    </div>
</body>

</html>