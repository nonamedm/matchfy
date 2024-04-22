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

        <?php
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);
        ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <form class="main_signin_form" method="post" action="/mo/signinPhoto" enctype="multipart/form-data">
                    <div class="content_body">
                        <a id="profileArea" onclick="editPhoto()">
                            <img src="/static/images/profile_noimg.png" />
                        </a>
                    </div>
                    <div class="btn_group">
                        <button type="button" class="btn type02" onclick="editPhoto()">프로필 사진수정</button>
                        <input type="file" id="main_photo" name="main_photo" style="display:none;" accept="image/*" />
                    </div>
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="name" class="signin_label">이름</label>
                                <input id="name" name="name" type="text" value="<?php echo $name ?>" placeholder="이름을 입력하세요" readonly>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="birthday" class="signin_label">생년월일</label>
                                <input id="birthday" name="birthday" type="text" value="<?php echo $birthday ?>" placeholder="생년월일을 입력하세요" readonly>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="gender" class="signin_label">성별</label>
                                <select id="gender" name="gender">
                                    <?php
                                    foreach ($genderCode as $item) {
                                        if ($item['id'] === $gender) {
                                    ?>
                                            <option value="<?= $item['value'] ?>">
                                                <?= $item['name'] ?>
                                            </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="city" class="signin_label">지역</label>
                                <select id="city" name="city">
                                    <option value>지역을 선택하세요</option>
                                    <?php
                                    foreach ($sidoCode as $item) {
                                    ?>
                                        <option value="<?= $item['id'] ?>">
                                            <?= $item['name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label">사진 (1장 이상 필수)</h4>
                                <div class="profile_photo_div">
                                    <label for="profile_photo" class="signin_label profile_photo_input"></label>
                                    <input id="profile_photo" name="profile_photo" type="file" value="" placeholder=""
                                        multiple accept="image/*">
                                    <div id="profile_photo_view" class="profile_photo_view">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label">동영상 프로필 (권장)</h4>
                                <div class="profile_photo_div">
                                    <label for="profile_mov" class="signin_label profile_photo_input"></label>
                                    <input id="profile_mov" name="profile_mov" type="file" value="" placeholder=""
                                        multiple>
                                    <div id="profile_mov_view" class="profile_mov_view">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <input type="hidden" name="town" value="town value" />
                        <input type="hidden" name="mobile_no" value="<?= $mobile_no ?>" />
                        <input type="hidden" name="nickname" value="<?= $nickname ?>" />
                        <input type="hidden" name="sns_type" value="<?= $sns_type ?>" />
                        <input type="hidden" name="oauth_id" value="<?= $oauth_id ?>" />
                        <div id="main_photo_uploaded" style="display:none;"></div>
                        <!-- <div id="profile_photo_uploaded" style="display:none;"></div>
                        <div id="profile_mov_uploaded" style="display:none;"></div> -->
                        <div class="btn_group multy">
                            <button type="button" class="btn type02">취소</button>
                            <button type="button" class="btn type01" onclick="signUp()">회원가입</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>





        <div style="height: 50px;"></div>
        <footer class="footer">

            <!-- <div class="footer_logo mb40">
                matchfy
            </div>
            <div class="footer_link mb40">
                <a href="#">회사정보</a>
                <a href="#">개인정보 처리방침</a>
                <a href="#">서비스 이용약관</a>
            </div>
            <div class="footer_info mb40">
                <span>(주)회사명 <img src="/static/images/part_line.png" /> 서울특별시 강남구 논현로 9길 26 길동빌딩 502호</span>
                <span>대표이사 : 홍길동 <img src="/static/images/part_line.png" /> 사업자등록번호 : 123-45-6789<img
                        src="/static/images/part_line.png" /> gildong@naver.com</span>
            </div>
            <div class="footer_copy">
                COPYRIGHT 2023. ALL RIGHTS RESERVED.
            </div> -->

        </footer>
    </div>


    <!-- SCRIPTS -->

    <script>
        $(document).ready(function() {
            editPhotoListner();
        });
    </script>

    <!-- -->


</body>

</html>