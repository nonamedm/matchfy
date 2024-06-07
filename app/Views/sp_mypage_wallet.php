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
    <script src="/static/js/basic.js"></script>
    <script src="/static/js/wallet.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
    <script>
        $(document).ready(function() {
            scroll();
        });
    </script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "포인트 지갑";
        $prevUrl = "/support/menu";
        include 'spheader.php'; ?>

        <div class="sub_wrap">
            <div class="loading"><img src="/static/images/loading.gif" /></div>
            <div class="content_wrap">
                <div class="mypage_wallet">
                    <div class="mypage_wallet_point">
                        <p>포인트지갑</p>
                        <h2 class="current_points"></h2>
                    </div>
                    <div class="mypage_wallet_charge">
                        <div class="btn_group">
                            <!-- <button class="btn type01" onclick="loc_pointCharge();"><?= lang('Korean.btnPointCharge') ?></button> -->
                            <button class="btn type03" onclick="loc_spPointExchange();">포인트<?= lang('Korean.exchange') ?></button>
                        </div>
                    </div>
                    <div id="wallet_tab" class="tab_wrap">
                        <ul>
                            <li class="on">
                                <a href="#" onclick="WalletPage('spadd');">적립내역</a>
                            </li>
                            <li>
                                <a href="#" onclick="WalletPage('spexchange');">환전내역</a>
                            </li>
                        </ul>
                    </div>

                    <div class="mypage_wallet_list">
                        <div class="mypage_wallet_filter">
                            <select id="point_order" class="small">
                                <option value="latest"> <?= lang('Korean.latestOrder') ?></option>
                                <option value="oldest"> <?= lang('Korean.oldOrder') ?></option>
                                <option value="highest_amount"> <?= lang('Korean.highestOrder') ?></option>
                                <option value="lowest_amount"> <?= lang('Korean.smallOrder') ?></option>
                            </select>
                            <div class="mypage_wallet_period">
                                <div class="btn_group">
                                    <button class="1week point_date btn type01 on" onclick="getPointSearch('1week')"><?= lang('Korean.1week') ?></button>
                                    <button class="1month point_date btn type01" onclick="getPointSearch('1month')"><?= lang('Korean.1month') ?></button>
                                    <button class="3month point_date btn type01" onclick="getPointSearch('3month')"><?= lang('Korean.3month') ?></button>
                                </div>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div id="point_content">
                            <?php foreach ($points as $point) : ?>
                                <div class="mypage_wallet_detail">
                                    <div class="date">
                                        <p><?= date('Y-m-d', strtotime($point['create_at'])) ?></p>
                                    </div>
                                    <div class="desc">
                                        <p><?= $point['point_details'] ?></p>
                                    </div>
                                    <div class="price">
                                        <p>+ <?= number_format($point['add_point']) ?></p>
                                    </div>
                                </div>
                                <hr class="hoz_part" />
                            <?php endforeach ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>





        <div style="height: 50px;"></div>
        <footer class="footer">


        </footer>
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