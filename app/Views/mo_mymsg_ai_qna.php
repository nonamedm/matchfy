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
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "AI 문답";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="chat_wrap">
                    <div class="receive_msg">
                        <div class="receive_profile">
                            <img src="/static/images/ai_send.png" />
                        </div>
                        <div class="receive_text">
                            <p class="receive_profile_name"><?= lang('Korean.AIManager') ?></p>
                            <div class="receive_msg_area">
                                <p>홍길동 <?= lang('Korean.sir') ?>, <br />
                                    일주일 만에 만난 애인이 집데이트를 하자고 한다면 어떠신가요? </p>
                            </div>
                        </div>
                        <div class="receive_time">
                            <p>
                                14:00
                            </p>
                        </div>
                    </div>
                    <div class="send_msg">
                        <div class="send_text">
                            <div class="receive_time">
                                <p>
                                    14:00
                                </p>
                            </div>
                            <div class="send_msg_area">
                                <p>그건 싫어</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="btn_group multy ai_qna">
                    <button type="button" class="btn on"><?= lang('Korean.veryGood') ?></button>
                    <button type="button" class="btn"><?= lang('Korean.good') ?></button>
                    <button type="button" class="btn"><?= lang('Korean.qnanormal') ?></button>
                    <button type="button" class="btn"><?= lang('Korean.dontLike') ?></button>
                    <button type="button" class="btn"><?= lang('Korean.verryHate') ?></button>
                    <hr class="hoz_part" />
                </div>
                <div class="btn_group">
                    <button type="button" class="btn type01"><?= lang('Korean.save') ?></button>
                </div>
                <!-- <div class="message_input_box">
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