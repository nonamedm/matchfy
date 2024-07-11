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


        <?php $title = "메시지";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="tab_wrap">
                    <ul>
                        <li class="on">
                            <?= lang('Korean.AIMsg') ?>
                        </li>
                        <li>
                            <?= lang('Korean.messageBox') ?>
                        </li>
                    </ul>
                </div>
                <div class="chat_wrap">
                    <div class="receive_msg">
                        <div class="receive_profile">
                            <img src="/static/images/ai_send.png" />
                        </div>
                        <div class="receive_text">
                            <p class="receive_profile_name"><?= lang('Korean.AIManager') ?></p>
                            <div class="receive_msg_area">
                                <p>안녕하세요 안녕하세요 안녕하세요 안녕하세요 안녕하세요 안녕하세요</p>
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
                                <p>안녕하세요</p>
                            </div>
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
                                <p>무슨일인가요? 좋은소식있나요? 무슨일인가요? 좋은소식있나요?</p>
                            </div>
                        </div>
                    </div>
                    <div class="receive_msg">
                        <div class="receive_profile">
                            <img src="/static/images/ai_send.png" />
                        </div>
                        <div class="receive_text">
                            <p class="receive_profile_name"><?= lang('Korean.AIManager') ?></p>
                            <div class="receive_msg_area">
                                <div class="recieve_profile">
                                    <img src="/static/images/ai_date_profile.png" />
                                    <div class="content_mypage_info">
                                        <div class="profile">
                                            <h2>김민지</h2>
                                            <button class="match_percent">99%</button>
                                        </div>
                                        <p>96 · <?= lang('Korean.seoul') ?> 강남 · ESTJ</p>
                                    </div>
                                </div>
                                <p class="receive_match_msg"><?= lang('Korean.AIMsgCon') ?></p>
                                <button class="receive_profile_view"><?= lang('Korean.viewInfo') ?></button>
                            </div>
                        </div>
                        <div class="receive_time">
                            <p>
                                14:00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="message_input_box">
                    <div class="btn_group multy ai_date_check">
                        <button type="button" class="btn type01"><?= lang('Korean.accept') ?></button>
                        <button type="button" class="btn type04"><?= lang('Korean.refuse') ?></button>
                        <button type="button" class="btn type05"><?= lang('Korean.hold') ?></button>
                    </div>
                    <hr class="hoz_part" />
                    <div class="message_input_box_border">
                        <textarea type="text" placeholder="<?= lang('Korean.aiMsgPlaceholder') ?>"></textarea>
                        <img style="position:absolute;" src="/static/images/message_send_btn.png" />
                    </div>
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