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
                        <li>
                            <?= lang('Korean.AIMsg') ?>
                        </li>
                        <li class="on">
                            <?= lang('Korean.messageBox') ?>
                        </li>
                    </ul>
                </div>
                <div class="chat_wrap">
                    <div class="receive_msg">
                        <div class="receive_profile">
                            <img src="/static/images/message_send.png" />
                        </div>
                        <div class="receive_text">
                            <p class="receive_profile_name">강해린<span class="match_percent">95%</span></p>
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
                                <p>7시에 강남역에서 봐요<br />맛있는거 먹어요</p>
                            </div>
                        </div>
                    </div>
                    <div class="receive_msg">
                        <div class="receive_profile">
                            <img src="/static/images/message_send.png" />
                        </div>
                        <div class="receive_text">
                            <p class="receive_profile_name">강해린<span class="match_percent">95%</span></p>
                            <div class="receive_msg_area">
                                <p>좋아요~이따봬요</p>
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

                <div class="message_input_box message_input_box_on">
                    <!-- <div class="btn_group multy ai_date_check">
                        <button type="button" class="btn type01"><?= lang('Korean.accept') ?></button>
                        <button type="button" class="btn type04"><?= lang('Korean.refuse') ?></button>
                        <button type="button" class="btn type05"><?= lang('Korean.hold') ?></button>
                    </div>  -->
                    <hr class="hoz_part" />
                    <div class="chat_input_box">
                        <div style="padding:20px 8px;">
                            <img src="/static/images/hamberger_cancel.png" />
                        </div>
                        <div class="message_input_box_border">
                            <textarea type="text" placeholder="<?= lang('Korean.aiMsgPlaceholder') ?>"></textarea>
                            <img style="position:absolute; right: 30px" src="/static/images/message_send_btn.png" />
                        </div>
                    </div>
                    <div class="chat_menu_open">
                        <div class="chat_menu_func">
                            <img src="/static/images/chat_picture.png">
                            <p>앨범</p>
                        </div>
                        <div class="chat_menu_func"><img src="/static/images/chat_location.png">
                            <p><?= lang('Korean.promise') ?></p>
                        </div>
                        <div class="chat_menu_func"><img src="/static/images/chat_banking.png">
                            <p>예약금<br />송금</p>
                        </div>
                        <div class="chat_menu_func"><img src="/static/images/chat_quit.png">
                            <p>방나가기</p>
                        </div>
                        <div class="chat_menu_func"><img src="/static/images/chat_report.png">
                            <p><?= lang('Korean.declaration') ?>/<?= lang('Korean.resign') ?></p>
                        </div>
                        <div class="chat_menu_func"><img src="/static/images/chat_call.png">
                            <p>안심번호<br /> 통화하기</p>
                        </div>
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