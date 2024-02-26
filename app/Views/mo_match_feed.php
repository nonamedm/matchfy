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
                        내 피드
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="contetn_feed_list">
                    <div class="content_mypage recieve_profile">
                        <img class="profile_img" src="/static/images/mypage_pfofile.png" />
                        <div class="content_mypage_info">
                            <div class="profile">
                                <h2>장원영<span style="font-size:15px;"> 님</span></h2><span
                                    class="match_percent">99%</span>
                            </div>
                            <p>96 · 서울 강남 · ESTJ</p>
                        </div>
                        <div>
                            <button class="popup_view_profile">프로필</button>
                        </div>
                    </div>
                    <div class="feed_img_box">
                        <img src="/static/images/feed_img_1.png" />
                    </div>
                </div>
                <hr class="hoz_part" />
                <div class="contetn_feed_list">
                    <div class="content_mypage recieve_profile">
                        <img class="profile_img" src="/static/images/mypage_pfofile_1.png" />
                        <div class="content_mypage_info">
                            <div class="profile">
                                <h2>김제니<span style="font-size:15px;"> 님</span></h2><span
                                    class="match_percent">99%</span>
                            </div>
                            <p>96 · 서울 강남 · ESTJ</p>
                        </div>
                        <div>
                            <button class="popup_view_profile">프로필</button>
                        </div>
                    </div>
                    <div class="feed_img_box">
                        <img src="/static/images/feed_img_2.png" />
                    </div>
                </div>
                <hr class="hoz_part" />
                <div class="contetn_feed_list">
                    <div class="content_mypage recieve_profile">
                        <img class="profile_img" src="/static/images/mypage_pfofile_2.png" />
                        <div class="content_mypage_info">
                            <div class="profile">
                                <h2>임윤아<span style="font-size:15px;"> 님</span></h2><span
                                    class="match_percent">99%</span>
                            </div>
                            <p>96 · 서울 강남 · ESTJ</p>
                        </div>
                        <div>
                            <button class="popup_view_profile">프로필</button>
                        </div>
                    </div>
                    <div class="feed_img_box">
                        <img src="/static/images/feed_img_3.png" />
                    </div>
                </div>
                <hr class="hoz_part" />
            </div>
            <div style="height: 50px;"></div>
<footer class="footer">
                

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