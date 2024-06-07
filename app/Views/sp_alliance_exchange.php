<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/wallet.js"></script>
    <script src="/static/js/basic.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "포인트 환전";
        $prevUrl = "/support/mypage/wallet";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="loading"><img src="/static/images/loading.gif" /></div>
            <div class="loading_bg"></div>
            <div class="content_wrap">
                <div class="alliance_payment">
                    <div class="alliance_payment_point">
                        <p><?= lang('Korean.mypoint') ?></p>
                        <h2 class="current_points"></h2>
                    </div>
                    <div class="form_row signin_form">
                        <div class="signin_form_div">
                            <label for="alliance_exchange_amount" class="signin_label"><?= lang('Korean.exchangePay') ?></label>
                            <div>
                                <input id="alliance_exchange_amount" type="number" value="" placeholder="<?= lang('Korean.exchangePayWon') ?>">
                            </div>
                        </div>
                    </div>
                    <hr class="hoz_part" />
                    <div class="alliance_detail_cont">
                        <h2><?= lang('Korean.exchangeInfo') ?></h2>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_exchange_bank" class="signin_label"><?= lang('Korean.bank') ?></label>
                                <select id="alliance_exchange_bank" class="custom_select" value="">
                                    <option value="korea"><?= lang('Korean.korea') ?><?= lang('Korean.bank') ?></option>
                                    <option value="shinhan"><?= lang('Korean.shinhan') ?><?= lang('Korean.bank') ?></option>
                                    <option value="kb"><?= lang('Korean.kb') ?><?= lang('Korean.bank') ?></option>
                                    <option value="woori"><?= lang('Korean.woori') ?><?= lang('Korean.bank') ?></option>
                                    <option value="hana"><?= lang('Korean.hana') ?><?= lang('Korean.bank') ?></option>
                                    <option value="nonghyup"><?= lang('Korean.nonghyup') ?><?= lang('Korean.bank') ?></option>
                                    <option value="ibk"><?= lang('Korean.ibk') ?><?= lang('Korean.bank') ?></option>
                                    <option value="sc"><?= lang('Korean.sc') ?><?= lang('Korean.bank') ?></option>
                                    <option value="kebhana"><?= lang('Korean.kebhana') ?><?= lang('Korean.bank') ?></option>
                                    <option value="busan"><?= lang('Korean.busan') ?><?= lang('Korean.bank') ?></option>
                                    <option value="daegu"><?= lang('Korean.daegu') ?><?= lang('Korean.bank') ?></option>
                                    <option value="jeonbuk"><?= lang('Korean.jeonbuk') ?><?= lang('Korean.bank') ?></option>
                                    <option value="jeju"><?= lang('Korean.jeju') ?><?= lang('Korean.bank') ?></option>
                                    <option value="suhyup"><?= lang('Korean.suhyup') ?><?= lang('Korean.bank') ?></option>
                                    <option value="shinhan"><?= lang('Korean.shinhan') ?><?= lang('Korean.bank') ?></option>
                                    <option value="kakao"><?= lang('Korean.kakao') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_exchange_account" class="signin_label"><?= lang('Korean.exchangeAccount') ?></label>
                                <div>
                                    <input id="alliance_exchange_account" type="number" value="" placeholder="<?= lang('Korean.exchangePayWon') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="amount_pay">
                            <div class="amount_pay_left alliance">
                                <h2><?= lang('Korean.allExchangePay') ?></h2>
                            </div>
                            <div class="amount_pay_right">
                                <h2 id="exchange_pay">0<?= lang('Korean.won') ?></h2>
                            </div>
                        </div>
                    </div>
                    <hr class="hoz_part" />

                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="pay_agree_desc">
                    <div class="chk_box">
                        <input type="checkbox" id="agree02" name="chkDefault00">
                        <label class="agree_cont_label" for="agree02"><?= lang('Korean.allianceAgreeTrue') ?></label>
                    </div>
                    <p>· <?= lang('Korean.exchangeCon') ?></p>
                </div>
                <div class="btn_group">
                    <button type="button" id="exchangeBtn" class="btn type01" onclick="spExchangePointSubmit();" disabled><?= lang('Korean.exchangeBtn') ?></button>
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
    </script>

    <!-- -->


</body>

</html>