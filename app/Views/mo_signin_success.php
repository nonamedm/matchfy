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



        <div class="sub_wrap">
            <div class="content_wrap center_wrap">
                <div class="content_body" style="margin-top:235px">
                    <img src="/static/images/signup_success.png" />
                    <div class="success_text">
                        <p><?= lang('Korean.siginSuccessTitle') ?></p>
                        <em>
                            <?php
                            if ($temp_grade === 'grade01') {
                                echo '준회원';
                            } else if ($temp_grade === 'grade02') {
                                echo '정회원';
                            } else {
                                echo '프리미엄회원';
                            }
                            ?>
                            <?= lang('Korean.siginSuccessCon1') ?>
                        </em>
                    </div>
                    <!-- 계좌 -->
                    <?php if ($temp_grade != 'grade01') : ?>
                        <div class="success_sub_text">
                            <span>가입 신청이 완료되었습니다.</span>
                            <br />
                            <br />
                            <!-- <span>아래 계좌로 입금하시면</span>
                            <br />
                            <span>관리자 승인 후 등급이 업그레이드 됩니다.</span>
                        </div>
                        <div class="success_sub_text">
                            <p>금액 : <?= $price ?> 원</p>
                            <p>계좌번호 : 1002-992-001231 </p>
                        </div> -->
                        <?php endif; ?>
                        </div>
                </div>
                <div style="height: 50px;"></div>
                <footer class="footer" style="text-align: center;">
                    <div class="btn_group multy">
                        <button type="button" class="btn type02" onclick='moveToUrl("/")'><?= lang('Korean.rootBtn2') ?></button>
                        <button type="button" class="btn type01" onclick='moveToUrl("/mo/partner")'><?= lang('Korean.matchInfoBtn') ?></button>
                    </div>


                </footer>
            </div>

        </div>


        <!-- SCRIPTS -->

        <script>
        </script>

        <!-- -->


</body>

</html>