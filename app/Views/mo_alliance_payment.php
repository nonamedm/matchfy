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
    <script>
        var alliance_idx = <?= $idx ?>;
        var reserv_people = <?= $people ?>;
        var reserv_date = '<?= strval($date) ?>';
        var reserv_time = '<?= strval($time) ?>';
    </script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "제휴";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="loading"><img src="/static/images/loading.gif" /></div>
            <div class="loading_bg"></div>
            <div class="content_wrap">
                <div class="alliance_payment">
                    <div class="alliance_payment_point">
                        <p><?= lang('Korean.mypoint') ?></p>
                        <h2><?= number_format($points, 0) ?> <?= lang('Korean.won') ?></h2>
                    </div>
                    <div class="amount_pay">
                        <div class="amount_pay_left alliance">
                            <h2><?= lang('Korean.allPay') ?></h2>
                        </div>
                        <div class="amount_pay_right">
                            <h2><?= number_format($alliancePay, 0) ?> <?= lang('Korean.won') ?></h2>
                        </div>
                    </div>
                    <hr class="hoz_part" />
                    <div class="alliance_detail_cont">
                        <h2><?= lang('Korean.ticketInfo') ?></h2>
                        <div class="alliance_profile_content">
                            <h2><?= lang('Korean.ticketHolder') ?></h2>
                            <p><?= $user['name'] ?></p>
                        </div>
                        <div class="alliance_profile_content">
                            <h2><?= lang('Korean.allianceCompanyContact') ?></h2>
                            <p><?= $user['mobile_no'] ?></p>
                        </div>
                    </div>
                    <hr class="hoz_part" />
                    <div class="alliance_detail_cont">
                        <h2><?= lang('Korean.paymentPravacy') ?></h2>
                        <div class="alliance_terms_agree allance_btn">
                            <p><?= nl2br($privacys['title']); ?></p>
                            <img src="/static/images/select_arrow.png" />
                        </div>
                        <div class="allance_content" style="display:none;">
                            <p class=""><?= nl2br($privacys['content']); ?></p>
                        </div>
                    </div>
                    <hr class="hoz_part" />
                    <div class="alliance_detail_cont">
                        <h2><?= lang('Korean.allianceCancelCon') ?></h2>
                        <table class="basic_table">
                            <tr>
                                <td><?= lang('Korean.allianceCancelCon2') ?></td>
                                <td><?= lang('Korean.allianceCancelCon3') ?></td>
                            </tr>
                            <tr>
                                <td><?= lang('Korean.allianceCancelCon4') ?></td>
                                <td><?= lang('Korean.allianceCancelCon5') ?></td>
                            </tr>
                        </table>
                    </div>
                    <hr class="hoz_part" />

                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="pay_agree_desc">
                    <div class="chk_box">
                        <input type="checkbox" id="agree01" name="chkDefault00" checked="">
                        <label class="agree_cont_label" for="agree01"><?= lang('Korean.allianceAgreeTrue') ?></label>
                    </div>
                    <p>· <?= lang('Korean.paymentCon1') ?></p>
                </div>
                <div class="btn_group multy">
                    <button type="button" class="btn type02" id="cancelButton"><?= lang('Korean.cancel') ?></button>
                    <button type="button" class="btn type01" id="alliance_reserve" onclick="alliancePaymentChk()"><?= lang('Korean.paymentChk') ?></button>
                </div>
                <!-- <div class="footer_logo mb40">
                    matchfy
                </div>
                <div class="footer_link mb40">
                    <a href="#"><?= lang('Korean.companyName') ?></a>
                    <a href="#"><?= lang('Korean.pravacyName') ?></a>
                    <a href="#"><?= lang('Korean.serviceName') ?></a>
                    <a href="#"><?= lang('Korean.supporterName') ?></a>
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
    </script>
    <script>
        $(document).ready(function() {
            toggleMenu();

            // 취소
            $('#cancelButton').click(function() {
                window.history.back();
            });

            $('#alliance_reserve').click(function() {

                // 동의 확인
                if (!$('#agree01').is(':checked')) {
                    fn_alert('구매 조건 확인 및 결제 진행에 동의해 주세요.');
                    return false;
                }

                //결제 포인트 체크
                var points = <?= $points ?>;
                var alliancePay = <?= $alliancePay ?>;

                if (alliancePay > points) {
                    fn_alert('보유포인트가 부족합니다.');
                    return false;
                }

            });
        });

        function toggleMenu() {
            $('.allance_btn').click(function() {
                var $answer = $(this).next('.allance_content');
                if ($answer.is(':visible')) {
                    $answer.slideUp();
                    $(this).find('img').attr('src', '/static/images/select_arrow.png');
                } else {
                    $answer.slideDown();
                    $(this).find('img').attr('src', '/static/images/select_arrow_up.png');
                }
            });
        }
    </script>

    <!-- -->


</body>

</html>