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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
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
                <div class="content_body content_mypage">
                    <!-- <img class="profile_img" src="/static/images/mypage_pfofile.png" /> -->
                    <img class="profile_img" src="/writable/<?= $file_path ?>/<?= $file_name ?>" />
                    <div class="content_mypage_info">
                        <div class="profile">
                            <h2>
                                <?= $name ?><span style="font-size:15px;"> 님</span>
                            </h2>
                        </div>
                        <p>
                            <?= substr($user['birthday'], 0, 4); ?> ·
                            <?= $user['city'] ?> ·
                            <?= $user['mbti'] ?>
                        </p>
                    </div>
                    <div>
                        <button class="popup_view_profile">프로필</button>
                    </div>
                </div>
                <div class="profile_img_box">
                    <form class="main_signin_form">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <div id="feed_photo_view" class="myfeed_list">
                                    <div class="profile_photo_div">
                                        <div id="feed_photo" class="feed_photo" onclick="addMyFeed();"></div>
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
    <?php include 'mo_myfeed_edit.php'; ?>

    <!-- SCRIPTS -->

    <script>
        $(document).ready(function () {
            myfeedPhotoListner();
        });
        function addMyFeed() {
            showFeedPopup();
        }
    </script>

    <!-- -->


</body>

</html>