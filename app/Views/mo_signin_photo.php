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
        <mobileheader style="height:44px; display: block;"></mobileheader>

        <?php $title = "준회원 프로필";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_title">
                    <h2><?= lang('Korean.signupCon1') ?></h2>
                </div>
                <form class="main_signin_form" method="post" action="/mo/signinType" enctype="multipart/form-data">
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label"><?= lang('Korean.signupCon2') ?></h4>
                                <div class="profile_photo_div">
                                    <label for="profile_photo" class="signin_label profile_photo_input"></label>
                                    <input id="profile_photo" name="profile_photo" type="file" value="" placeholder="" multiple accept="image/*">
                                    <div id="profile_photo_view" class="profile_photo_view">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label"><?= lang('Korean.signupCon3') ?></h4>
                                <div class="profile_photo_div">
                                    <label for="profile_mov" class="signin_label profile_photo_input"></label>
                                    <input id="profile_mov" name="profile_mov" type="file" value="" placeholder="" multiple accept="video/mp4,video/mkv, video/x-m4v,video/*">
                                    <div id="profile_mov_view" class="profile_mov_view">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layerPopup bottom" style="display: none;">
                            <div class="layerPopup_wrap">
                                <div class="layerPopup_heading">
                                    <img src="/static/images/invite_popup_img.png" style="position: absolute; right: 20px; top: -40px;" />
                                    <!-- <h2 class="heading">상담안내</h2> -->
                                    <!-- <a href="javascript:avoid(0)" class="btn_close">닫기</a> -->
                                </div>
                                <div class="layerPopup_content bg_white">
                                    <h2 class="title">초대코드 입력 시<br />
                                        정회원 / 프리미엄 회원 <span>50% 할인!</span></h2>

                                    <div class="invite_code_popup">
                                        <input type="text" id="invite_code" name="invite_code" placeholder="초대코드를 입력해주세요" />
                                    </div>
                                </div>
                                <div class="layerPopup_bottom">
                                    <div class="btn_group multy">
                                        <button type="button" class="btn type02">건너뛰기</button>
                                        <button type="button" class="btn type01">등록</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="mobile_no" value="<?php echo $postData['mobile_no'] ?>" />
                        <input type="hidden" name="ci" value="<?php echo $postData['ci'] ?>" />
                        <input type="hidden" id="file_path" name="file_path" value="<?php echo $postData['file_path'] ?>" />
                        <input type="hidden" id="file_name" name="file_name" value="<?php echo $postData['file_name'] ?>" />

                        <div id="profile_photo_uploaded" style="display:none;"></div>
                        <div id="profile_mov_uploaded" style="display:none;"></div>
                        <div class="btn_group multy">
                            <button type="submit" class="btn type02" id="skipButton"><?= lang('Korean.skip') ?></button>
                            <button type="submit" class="btn type01" id="saveButton"><?= lang('Korean.save') ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div style="height: 50px;"></div>
        <footer class="footer">

        </footer>
    </div>


    <!-- SCRIPTS -->

    <script>
        $(document).ready(function() {
            editPhotoListListner();

            // 버튼 클릭 이벤트 리스너 추가
            $('#skipButton, #saveButton').click(function(e) {
                e.preventDefault();
                $('.layerPopup').show();
            });

            $('.layerPopup_bottom .btn').click(function() {
                if ($(this).hasClass('type01')) {
                    var inviteCode = $('#invite_code').val();
                    isValidRecommendCode(inviteCode, function(isValid) {
                        if (isValid) {
                            $('.main_signin_form').submit();
                        }
                    });
                } else {
                    $('#invite_code').val(null);
                    $('.main_signin_form').submit();
                }
            });
        });
    </script>

    <!-- -->


</body>

</html>