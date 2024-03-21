<?php     function isMobileDevice() {
        return preg_match('/(android|iphone|ipod|ipad|windows phone|iemobile|opera mini)/i', $_SERVER['HTTP_USER_AGENT']);
    }
?>
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
        <?php $title = "내 피드"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <?php 
                    foreach ($feeds as $feed) {
                ?>
                    <div class="content_feed_list">
                        <div class="content_mypage recieve_profile">
                            <?php if ($feed['file_name']) { ?>
                                <img class="profile_img" src="/<?= $feed['file_path'].$feed['file_name']?>" />
                            <?php } else {?>
                                <img class="profile_img" src="/static/images/profile_noimg.png" />
                            <?php } ?>
                            <div class="content_mypage_info">
                                <div class="profile">
                                    <h2><?=$feed['nickname']?><span style="font-size:15px;"> 님</span></h2><span
                                        class="match_percent">99%</span>
                                </div>
                                <p><?=$feed['birthyear']?> · <?=$feed['city']?> · <?=$feed['mbti']?></p>
                            </div>
                            <div class="profile_btn">
                                <button class="popup_view_profile" onclick="moveToUrl('/mo/myfeed/view/profile/<?= $feed['nickname'] ?>')">프로필</button>
                            </div>
                        </div>
                        <div class="feed_img_box">
                            <?php 
                                $patternImg = "/\.(jpg|jpeg|png|gif|bmp|tiff|tif|webp|svg)$/i";
                                $patternMov = "/\.(mp4|avi|mov|mkv|flv|wmv|webm)$/i";
                                $patternOnlyMov = "/\.(mov)$/i";
                            ?>
                            <?php if(isMobileDevice()&&preg_match($patternOnlyMov,$feed['feed_filename'])) { ?>
                                <img src="/<?= $feed['feed_filepath']?><?= $feed['feed_filename']?>"/>
                            <?php } else if (preg_match($patternMov,$feed['feed_filename'])) { ?>
                                <video src="/<?= $feed['feed_filepath']?><?= $feed['feed_filename']?>" autoplay="autoplay" muted="muted" playsinline></video>
                            <?php } else if (preg_match($patternImg,$feed['feed_filename'])) { ?>
                                <img src="/<?= $feed['feed_filepath']?><?= $feed['feed_filename']?>" />
                            <?php } ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
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