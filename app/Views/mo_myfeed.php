<html lang="ko">
<?php function isMobileDevice()
{
    return preg_match('/(android|iphone|ipod|ipad|windows phone|iemobile|opera mini)/i', $_SERVER['HTTP_USER_AGENT']);
}

// if (isMobileDevice()) {
//     echo "현재 접속 기기는 모바일입니다.";
// } else {
//     echo "현재 접속 기기는 PC입니다.";
// }
?>

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
    <script src="/static/js/myfeed.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>

        <?php $title = "내피드";
        include 'header.php'; ?>
        <?php $word_file_path = APPPATH . 'data/MemberCode.php';
        require($word_file_path); ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_body content_mypage">
                    <!-- <img class="profile_img" src="/static/images/mypage_pfofile.png" /> -->
                    <img class="profile_img" src="/<?= $file_path ?>/<?= $file_name ?>" />
                    <div class="content_mypage_info">
                        <div class="profile">
                            <h2>
                                <?= $user['nickname'] ?><span style="font-size:15px;"> 님</span>
                            </h2>
                        </div>
                        <p>
                            <?= substr($user['birthday'], 0, 4); ?>
                            <?php foreach ($sidoCode as $item) {
                                if ($item['id'] === $user['city']) echo ' · ' . $item['name'];
                            } ?>
                            <?php foreach ($mbtiCode as $item) {
                                if ($item['id'] === $user['mbti']) echo ' · ' . $item['name'];
                            } ?>
                        </p>
                    </div>
                    <div>
                        <button class="popup_view_profile" onclick="moveToUrl('/mo/viewProfile/<?= $user['nickname'] ?>')">프로필</button>
                    </div>
                </div>
                <div class="profile_img_box">
                    <div class="form_row signin_form">
                        <div class="signin_form_div">
                            <div id="feed_photo_view" class="myfeed_list">

                                <!-- 본인계정일 때만 add 활성 -->
                                <?php
                                $session = $session = session();
                                $ci = $session->get('ci');
                                if ($user['ci'] === $ci) {
                                ?>
                                    <div class="profile_photo_div">
                                        <div id="feed_photo" class="feed_photo" onclick="addMyFeed();"></div>
                                    </div>

                                <?php
                                }
                                ?>

                                <?php
                                if (count($feed_list) > 0) {
                                ?>
                                    <!-- todo: 추후 10개만 출력하고 더보기 구현 -->
                                    <?php foreach ($feed_list as $feed) : ?>
                                        <a onclick="showFeedDetail('feedDetail', '<?= $feed['feed_idx'] ?>') ">
                                            <?php if ($feed['public_yn'] === '0') { ?>
                                                <?php
                                                $patternImg = "/\.(jpg|jpeg|png|gif|bmp|tiff|tif|webp|svg)$/i";
                                                $patternMov = "/\.(mp4|avi|mov|mkv|flv|wmv|webm)$/i";
                                                $patternOnlyMov = "/\.(mov)$/i";
                                                ?>
                                                <?php if (isMobileDevice() && preg_match($patternOnlyMov, $feed['thumb_filename'])) { ?>
                                                    <img src="/<?= $feed['thumb_filepath'] ?><?= $feed['thumb_filename'] ?>" />
                                                <?php } else if (preg_match($patternMov, $feed['thumb_filename'])) { ?>
                                                    <video src="/<?= $feed['thumb_filepath'] ?><?= $feed['thumb_filename'] ?>" autoplay="autoplay" muted="muted" playsinline></video>
                                                <?php } else if (preg_match($patternImg, $feed['thumb_filename'])) { ?>
                                                    <img src="/<?= $feed['thumb_filepath'] ?><?= $feed['thumb_filename'] ?>" />
                                                <?php } ?>

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
        $(document).ready(function() {
            myfeedPhotoListner();
        });

        function addMyFeed() {
            showFeedPopup('addMyFeed');
        }
    </script>

    <!-- -->


</body>

</html>