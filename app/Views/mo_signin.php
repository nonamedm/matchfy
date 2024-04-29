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
        <mobileheader style="height:44px; display: none;"></mobileheader>

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
                        <a id="profileArea" class="profile_area" onclick="editPhoto()">
                            <img src="/static/images/profile_noimg.png" />
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
                                <label for="name" class="signin_label"><?= lang('Korean.name') ?></label>
                                <input id="name" name="name" type="text" value="<?php echo $name ?>" placeholder="<?= lang('Korean.signUpNamePlaceholder') ?>" readonly>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="birthday" class="signin_label"><?= lang('Korean.birthTrueFalse') ?></label>
                                <input id="birthday" name="birthday" type="text" value="<?php echo $birthday ?>" placeholder="<?= lang('Korean.signUpBirthPlaceholder') ?>" readonly>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="gender" class="signin_label"><?= lang('Korean.gender') ?></label>
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
                            <div class="signin_form_div multy">
                                <label for="city" class="signin_label"><?= lang('Korean.region') ?></label>
                                <div class="multy_select">
                                    <select id="city" name="city" onchange="chgCity(this)">
                                        <option value><?= lang('Korean.signUpCityPlaceholder') ?></option>
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
                                    <select id="town" name="town">
                                        <option value><?= lang('Korean.signUpGunguPlaceholder') ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="email" class="signin_label"><?= lang('Korean.email') ?></label>
                                <div class="input_btn">
                                    <input id="email" name="email" type="text" placeholder="<?= lang('Korean.signUpEmailPlaceholder') ?>">
                                    <button type="button" class="btn btn_input_form" onclick="regEmail()"><?= lang('Korean.certification') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="emailReg" class="signin_label"><?= lang('Korean.emailReg') ?></label>
                                <div class="input_btn">
                                    <input id="emailReg" name="emailReg" type="text" placeholder="<?= lang('Korean.signUpEmailRegPlaceholder') ?>">
                                    <button type="button" class="btn btn_input_form" onclick="regCode()"><?= lang('Korean.certification') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="pswd" class="signin_label"><?= lang('Korean.pswd') ?></label>
                                <input id="pswd" name="pswd" type="password" placeholder="<?= lang('Korean.pswdPlaceholder') ?>">
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="pswdChk" class="signin_label"><?= lang('Korean.pswdChk') ?></label>
                                <input id="pswdChk" name="pswdChk" type="password" placeholder="<?= lang('Korean.pswdChkPlaceholder') ?>">
                            </div>
                        </div>

                        <input type="hidden" name="mobile_no" value="<?= $mobile_no ?>" />
                        <input type="hidden" name="nickname" value="<?= $nickname ?>" />
                        <input type="hidden" name="sns_type" value="<?= $sns_type ?>" />
                        <input type="hidden" name="oauth_id" value="<?= $oauth_id ?>" />
                        <div id="main_photo_uploaded" style="display:none;"></div>
                        <!-- <div id="profile_photo_uploaded" style="display:none;"></div>
                        <div id="profile_mov_uploaded" style="display:none;"></div> -->
                        <div class="btn_group multy">
                            <button type="button" class="btn type02"><?= lang('Korean.cancel') ?></button>
                            <button type="button" class="btn type01" onclick="signUp()">회원가입</button>
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
            editPhotoListner();
        });
        const chgCity = (e) => {
            $.ajax({
                url: '/ajax/gunguSch',
                type: 'POST',
                data: {
                    "value": e.value
                },
                async: false,
                success: function(data) {
                    console.log(data)
                    $("#town").html("");
                    var html = '<option value>시/군/구</option>';
                    data.data.forEach(function(item) {
                        html += '<option value="' + item.id + '">' + item.name + '</option>';
                    });
                    $("#town").append(html);
                }
            });
        }
    </script>

    <!-- -->


</body>

</html>