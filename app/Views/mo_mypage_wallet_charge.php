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
    <script src="https://pay.nicepay.co.kr/v1/js/"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
    <script>

    </script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: none;"></mobileheader>

        <?php $title = "내지갑";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="loading"><img src="/static/images/loading.gif" /></div>
            <div class="content_wrap">
                <div class="mypage_wallet charge">
                    <div class="mypage_wallet_point">
                        <p><?=lang('Korean.mypoint')?></p>
                        <h2 class="current_points"></h2>
                    </div>
                    <hr class="hoz_part" />
                    <form class="main_signin_form">
                        <legend></legend>
                        <div class="">
                            <div class="mypage_wallet_select">
                                <p><?=lang('Korean.purchasePoint')?></p>
                                <div class="charge_select1 selected">
                                    <p data-points="5000" data-price="5500">5,000P (5,500<?=lang('Korean.won')?>)</p>
                                </div>
                                <div class="charge_select2" style="margin-top: 10px;">
                                    <p data-points="100000" data-price="100000">100,000P (100,000<?=lang('Korean.won')?>)</p>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="quantity" class="signin_label"><?=lang('Korean.purchaseQuantity')?></label>
                                    <div style="display: flex; align-items: center;">
                                        <input id="quantity" type="number" value="1" min="1" style="width:225px;" placeholder="<?=lang('Korean.enterQuantity')?>" />
                                        <p style="margin-left:8px; font-size: 15px;"><?=lang('Korean.piece')?></p>
                                        <a class="quantity_plus" style="margin-left:15px;"><img src="/static/images/ico_plus_30x30.png" /></a>
                                        <a class="quantity_minus" style="margin-left:12px;"><img src="/static/images/ico_minus_30x30.png" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="paymethod" class="signin_label"><?=lang('Korean.chargingMeans')?></label>
                                    <select id="paymethod" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="card"><?=lang('Korean.creditCard')?></option>
                                        <option value="kakaopayCard"><?=lang('Korean.easyPayment')?></option>
                                        <option value="bank"><?=lang('Korean.accountTransfer')?></option>
                                        <option value="cellphone"><?=lang('Korean.phonePaymen')?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="amount_pay">
                                    <div class="amount_pay_left">
                                        <h2><?=lang('Korean.allPay')?></h2>
                                    </div>
                                    <div class="amount_pay_right">
                                        <p id="selected_pay_type"><?=lang('Korean.payment')?><?=lang('Korean.selected')?></p>
                                        <h2 id="total_price">5,500</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="pay_agree_desc">
                    <div class="chk_box">
                        <input type="checkbox" id="agree01" name="chkDefault00">
                        <label class="agree_cont_label" for="agree01"><?=lang('Korean.allianceAgreeTrue')?></label>
                    </div>
                    <p>· <?=lang('Korean.paymentCon1')?></p>
                </div>
                <div class="btn_group">
                    <button type="button" class="btn type01" onclick="serverAuth()"><?=lang('Korean.btnCharge')?></button>

                </div>
                <!-- <div class="footer_logo mb40">
                    matchfy
                </div>
                <div class="footer_link mb40">
                    <a href="#"><?=lang('Korean.companyName')?></a>
                    <a href="#"><?=lang('Korean.pravacyName')?></a>
                    <a href="#"><?=lang('Korean.serviceName')?></a>
                </div>
                <div class="footer_info mb40">
                    <span><?=lang('Korean.footerInfo1')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo2')?></span>
                    <span><?=lang('Korean.footerInfo3')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo4')?><img
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

    <!-- -->


</body>

</html>