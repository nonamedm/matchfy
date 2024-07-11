<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0,  user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/wallet.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "내지갑";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="mypage_wallet">
                    <div class="mypage_wallet_point">
                        <p><?= lang('Korean.mypoint') ?></p>
                        <h2 class="current_points"></h2>
                    </div>
                    <div class="mypage_wallet_charge">
                        <div class="btn_group multy">
                            <button class="btn type01" onclick="loc_pointCharge();"><?= lang('Korean.btnPointCharge') ?></button>
                            <button class="btn type03" onclick="loc_pointExchange();"><?= lang('Korean.exchange') ?></button>
                        </div>
                    </div>
                    <div class="tab_wrap">
                        <ul>
                            <li>
                                <a href="/mo/mypage/wallet"><?= lang('Korean.DepositDetails') ?></a>
                            </li>
                            <li class="on">
                                <a href="/mo/mypage/wallet2"><?= lang('Korean.useDetails') ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="mypage_wallet_list">
                        <div class="mypage_wallet_filter">
                            <select class="point_order small use">
                                <option value="latest"> <?= lang('Korean.latestOrder') ?></option>
                                <option value="oldest"> <?= lang('Korean.oldOrder') ?></option>
                                <option value="highest_amount"> <?= lang('Korean.highestOrder') ?></option>
                                <option value="lowest_amount"> <?= lang('Korean.smallOrder') ?></option>
                            </select>
                            <div class="mypage_wallet_period">
                                <div class="btn_group multy">
                                    <button class="1week point_date btn type01 on" onclick="getPointSearch($('.point_order').val(),'1week','use')"><?= lang('Korean.1week') ?>일</button>
                                    <button class="1month point_date btn type01" onclick="getPointSearch($('.point_order').val(),'1month','use')"><?= lang('Korean.1month') ?></button>
                                    <button class="3month point_date btn type01" onclick="getPointSearch($('.point_order').val(),'3month','use')"><?= lang('Korean.3month') ?></button>
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
                                        <p>- <?= number_format($point['use_point']) ?></p>
                                    </div>
                                </div>
                                <hr class="hoz_part" />
                            <?php endforeach ?>
                        </div>
                        <!-- <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>홍대 파티룸</p>
                            </div>
                            <div class="price">
                                <p>- 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>전지현</p>
                            </div>
                            <div class="price">
                                <p>- 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>포차어게인</p>
                            </div>
                            <div class="price">
                                <p>- 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>고봉민 김밥</p>
                            </div>
                            <div class="price">
                                <p>- 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>이태원 파티룸</p>
                            </div>
                            <div class="price">
                                <p>- 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                        <div class="mypage_wallet_detail">
                            <div class="date">
                                <p>2024.01.06</p>
                            </div>
                            <div class="desc">
                                <p>서초 파티룸</p>
                            </div>
                            <div class="price">
                                <p>- 30,000</p>
                            </div>
                        </div>
                        <hr class="hoz_part" /> -->
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