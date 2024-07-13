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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "준회원 프로필";
        include 'header.php'; ?>
        <?php
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);
        ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <form class="main_signin_form">
                    <div class="content_body">
                        <a id="profileArea" class="profile_area" onclick="editPhoto()">
                            <?php
                            if ($file_path) {
                                echo '<img src="/' . $file_path . $file_name . '" style="border-radius: 50%; width: 74px; height: 74px;" />';
                            } else {
                                echo '<img src="/static/images/profile_noimg.png" style="border-radius: 50%; width: 74px; height: 74px;" />';
                            }
                            ?>

                        </a>
                    </div>
                    <div class="btn_group">
                        <button type="button" class="btn type02" onclick="editPhoto()"><?= lang('Korean.profilePhoto') ?></button>
                        <input type="file" id="main_photo" name="main_photo" style="display:none;" accept="image/*" />
                    </div>
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="nickname" class="signin_label"><?= lang('Korean.nickname') ?></label>
                                <input id="nickname" name="nickname" type="text" value="<?= $nickname ?>" placeholder="<?= lang('Korean.sinupNickPlaceholder') ?>">
                            </div>
                        </div>


                        <input type="hidden" name="ci" value="<?php echo $ci ?>" />
                        <input type="hidden" name="grade" value="<?php echo $grade ?>" />
                        <div id="main_photo_uploaded" style="display:none;"></div>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="myinfoUpdate('grade01')"><?= lang('Korean.updateprofile') ?></button>
                        </div>
                    </div>
                </form>
                <div class="withdrawal_div" onclick="withdrawal()">회원탈퇴</div>
            </div>
        </div>
        <?php include 'mo_withdrawal_popup.php'; ?>




        <div style="height: 50px;"></div>
        <footer class="footer">
        </footer>
    </div>


    <!-- SCRIPTS -->

    <script>
        $(document).ready(function() {
            editPhotoListner();
        });

        $(document).ready(function() {});
    </script>

    <!-- -->


</body>

</html>