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
        
        <?php $title = "피드보기"; include 'header.php'; ?>


        <div class="sub_wrap">
            <div class="content_wrap">

                <div class="content_mypage">
                    <img class="profile_img" src="/static/images/mypage_pfofile.png" />
                    <div class="content_mypage_info">
                        <div class="profile">
                            <h2>장원영<span style="font-size:15px;"> <?=lang('Korean.sir')?></span></h2>
                        </div>
                        <p>96 · <?=lang('Korean.seoul')?> 강남 · ESTJ</p>
                    </div>
                    <div>
                        <button class="popup_view_profile"><?=lang('Korean.profile')?></button>
                    </div>
                </div>
                <div class="sns_img_filter">
                    <p><?=lang('Korean.getSnsPhoto')?></p>
                </div>
                <div class="profile_img_box">
                    <form class="main_signin_form">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <div class="myfeed_list">
                                    <div class="profile_photo_div">
                                        <label for="profile_mov" class="signin_label profile_photo_input"></label>
                                        <input id="profile_mov" type="file" value="" placeholder="">
                                    </div>
                                    <img src="/static/images/profile_img_1.png" />
                                    <img src="/static/images/profile_img_2.png" />
                                    <img src="/static/images/profile_img_3.png" />
                                    <img src="/static/images/profile_img_4.png" />
                                    <img src="/static/images/profile_img_5.png" />
                                    <img src="/static/images/profile_img_private.png" />
                                    <img src="/static/images/profile_img_6.png" />
                                    <img src="/static/images/profile_img_7.png" />
                                    <img src="/static/images/profile_img_8.png" />
                                    <img src="/static/images/profile_img_9.png" />
                                    <img src="/static/images/profile_img_10.png" />
                                    <img src="/static/images/profile_img_11.png" />
                                    <img src="/static/images/profile_img_12.png" />
                                    <img src="/static/images/profile_img_13.png" />

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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