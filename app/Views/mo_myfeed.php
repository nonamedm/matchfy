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
                    <div class="form_row signin_form">
                        <div class="signin_form_div">
                            <div id="feed_photo_view" class="myfeed_list">
                                <div class="profile_photo_div">
                                    <div id="feed_photo" class="feed_photo" onclick="addMyFeed();"></div>
                                </div>
                                <?php 
                                    if(count($feed_list)>0) {
                                ?>
                                    <!-- todo: 추후 10개만 출력하고 더보기 구현 -->
                                    <?php foreach ($feed_list as $feed): ?>
                                        <a onclick="showFeedDetail('feedDetail', '<?= $feed['idx'] ?>') ">
                                            <?php if($feed['public_yn']==='0') { ?>
                                                <img src="/writable/<?= $feed['thumb_filepath']?>/<?= $feed['thumb_filename']?>" />

                                            <?php } else { ?>
                                                <img src="/static/images/profile_img_private.png" />
                                            <?php } ?>
                                        </a>
                                    <?php endforeach; ?>
                                <?php
                                    };
                                ?>
                            </div>
                        </div>
                    </div>
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
    <?php include 'mo_myfeed_detail.php'; ?>

    <!-- SCRIPTS -->

    <script>
        $(document).ready(function () {
            myfeedPhotoListner();
        });
        function addMyFeed() {
            showFeedPopup('addMyFeed');
        }
    </script>

    <!-- -->


</body>

</html>