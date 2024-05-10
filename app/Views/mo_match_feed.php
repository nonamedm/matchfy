<?php function isMobileDevice()
{
    return preg_match('/(android|iphone|ipod|ipad|windows phone|iemobile|opera mini)/i', $_SERVER['HTTP_USER_AGENT']);
}
?>
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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->

        <?php $title = "매칭피드";
        $prevUrl = "/mo/menu";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <?php
                $word_file_path = APPPATH . 'Data/MemberCode.php';
                require($word_file_path);
                foreach ($feeds as $feed) {
                ?>
                    <div class="content_feed_list">
                        <div class="content_mypage recieve_profile">
                            <?php if ($feed['file_name']) { ?>
                                <img class="profile_img" src="/<?= $feed['file_path'] . $feed['file_name'] ?>" />
                            <?php } else { ?>
                                <img class="profile_img" src="/static/images/profile_noimg.png" />
                            <?php } ?>
                            <div class="content_mypage_info">
                                <div class="profile">
                                    <h2>
                                        <?= $feed['nickname'] ?><span style="font-size:15px;"> </span>
                                    </h2>
                                    <?php
                                    $session = session();
                                    $ci = $session->get('ci');
                                    if ($feed['ci'] !== $ci) {
                                    ?>
                                        <span class="match_percent">
                                            <?php if (number_format($feed['matchScore']['match_rate'], 0) !== '0') echo number_format($feed['matchScore']['match_rate'], 0) . '%' ?>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <p>
                                    <?= $feed['birthyear'] ?>
                                    <?php foreach ($sidoCode as $item) {
                                        if ($item['id'] === $feed['city']) echo ' · ' . $item['name'];
                                    } ?>
                                    <?php foreach ($mbtiCode as $item) {
                                        if ($item['id'] === $feed['mbti']) echo ' · ' . $item['name'];
                                    } ?>
                                </p>
                            </div>
                            <div class="profile_btn">
                                <button class="popup_view_profile" onclick="moveToUrl('/mo/viewProfile/<?= $feed['nickname'] ?>')"><?= lang('Korean.profile') ?></button>
                            </div>
                        </div>
                        <div class="feed_img_box" style="background-color: #e7e7e7;">
                            <a onclick="moveToUrl('/mo/myfeed/<?= $feed['nickname'] ?>')">
                                <?php
                                $patternImg = "/\.(jpg|jpeg|png|gif|bmp|tiff|tif|webp|svg)$/i";
                                $patternMov = "/\.(mp4|avi|mov|mkv|flv|wmv|webm)$/i";
                                $patternOnlyMov = "/\.(mov)$/i";
                                ?>
                                <?php if (isMobileDevice() && preg_match($patternOnlyMov, $feed['feed_filename'])) { ?>
                                    <img src="/<?= $feed['feed_filepath'] ?><?= $feed['feed_filename'] ?>" />
                                <?php } else if (preg_match($patternMov, $feed['feed_filename'])) { ?>
                                    <video src="/<?= $feed['feed_filepath'] ?><?= $feed['feed_filename'] ?>" autoplay="autoplay" muted="muted" playsinline></video>
                                <?php } else if (preg_match($patternImg, $feed['feed_filename'])) { ?>
                                    <img src="/<?= $feed['feed_filepath'] ?><?= $feed['feed_filename'] ?>" />
                                <?php } ?>
                            </a>
                        </div>
                    </div>
                    <hr class="hoz_part" />
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
        $(document).ready(function() {
            // $.ajax({
            //     url: '/ajax/calcMatchRate', // todo : 추후 로그인완료로 이동
            //     type: 'POST',
            //     async: false,
            //     success: function(data) {
            //         console.log(data);
            //     },
            //     error: function(data, status, err) {
            //         console.log(err);
            //         fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            //     },
            // });
        });
    </script>

    <!-- -->


</body>

</html>