<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        <header>

            <div class="menu">
                <ul>
                    <li class="left_arrow">
                        <img src="/static/images/left_arrow.png" />
                    </li>
                    <li class="header_title">
                        메시지
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="tab_wrap">
                    <ul>
                        <li class="on">
                            AI 메시지
                        </li>
                        <li>
                            메시지함
                        </li>
                    </ul>
                </div>
                <div class="chat_wrap">
                    <div class="receive_msg">
                        <div class="receive_profile">
                            <img src="/static/images/ai_send.png" />
                        </div>
                        <div class="receive_text">
                            <p class="receive_profile_name">AI 매니저</p>
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
                            <p class="receive_profile_name">AI 매니저</p>
                            <div class="receive_msg_area">
                                <div class="recieve_profile">
                                    <img src="/static/images/ai_date_profile.png" />
                                    <div class="content_mypage_info">
                                        <div class="profile">
                                            <h2>김민지</h2>
                                            <button class="match_percent">99%</button>
                                        </div>
                                        <p>96 · 서울 강남 · ESTJ</p>
                                    </div>
                                </div>
                                <p class="receive_match_msg">띵동 AI 소개팅이 도착했어요<br /> 정보를 확인하실래요?</p>
                                <button class="receive_profile_view">정보보기</button>
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
            <footer class="footer">
                <div class="message_input_box">
                    <div class="btn_group multy ai_date_check">
                        <button type="button" class="btn type01">수락</button>
                        <button type="button" class="btn type04">거절</button>
                        <button type="button" class="btn type05">보류</button>
                    </div>
                    <hr class="hoz_part" />
                    <div class="message_input_box_border">
                        <textarea type="text" placeholder="메세지를 입력하세요"></textarea>
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