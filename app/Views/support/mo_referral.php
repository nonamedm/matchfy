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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "내부 서포터 추천하기";
        $prevUrl = "/support/menu";
        include 'spheader.php'; ?>

        <?php
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);
        ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <form class="main_signin_form" method="post" action="" enctype="multipart/form-data">
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
                                <input id="name" name="name" type="text" value="<?php echo $name ?>" placeholder="<?= lang('Korean.signUpNamePlaceholder') ?>">
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="birthday" class="signin_label"><?= lang('Korean.birthTrueFalse') ?></label>
                                <input id="birthday" name="birthday" type="text" value="<?php echo $birthday ?>" placeholder="<?= lang('Korean.signUpBirthPlaceholder') ?>">
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="gender" class="signin_label"><?= lang('Korean.gender') ?></label>
                                <select id="gender" name="gender">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0"><?= lang('Korean.woman') ?></option>
                                    <option value="1"><?= lang('Korean.man') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="mobile_no" class="signin_label"><?= lang('Korean.moblieNo') ?></label>
                                <input id="mobile_no" name="mobile_no" type="text" value="" placeholder="<?= lang('Korean.mobileNoPlaceholder') ?>">
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="marital" class="signin_label"><?= lang('Korean.marryTrueFalse') ?></label>
                                <select id="marital" name="marital" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0"><?= lang('Korean.single') ?></option>
                                    <option value="1"><?= lang('Korean.married') ?></option>
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
                            <div class="signin_form_div">
                                <label for="height" class="signin_label"><?= lang('Korean.height') ?></label>
                                <input id="height" name="height" type="number" value="<?= $height ?>" placeholder="<?= lang('Korean.sinupHeightPlaceholder') ?>">
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="education" class="signin_label"><?= lang('Korean.education') ?></label>
                                <select id="education" name="education" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0"><?= lang('Korean.highSchoolGradu') ?></option>
                                    <option value="1"><?= lang('Korean.attendingUniversity') ?></option>
                                    <option value="2"><?= lang('Korean.universityGrad') ?></option>
                                    <option value="3"><?= lang('Korean.attendingGraduate') ?></option>
                                    <option value="4"><?= lang('Korean.GradSchoolHig') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="job" class="signin_label"><?= lang('Korean.occupational') ?></label>
                                <select id="job" name="job" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0"><?= lang('Korean.Management') ?></option>
                                    <option value="1"><?= lang('Korean.Administration') ?></option>
                                    <option value="2"><?= lang('Korean.Finance') ?></option>
                                    <option value="3"><?= lang('Korean.Education') ?></option>
                                    <option value="4"><?= lang('Korean.Legal') ?></option>
                                    <option value="5"><?= lang('Korean.Healthcare') ?></option>
                                    <option value="6"><?= lang('Korean.Social') ?></option>
                                    <option value="7"><?= lang('Korean.Culture') ?></option>
                                    <option value="8"><?= lang('Korean.Transportation') ?></option>
                                    <option value="9"><?= lang('Korean.Sales') ?></option>
                                    <option value="10"><?= lang('Korean.Security') ?></option>
                                    <option value="11"><?= lang('Korean.Hospitality') ?></option>
                                    <option value="12"><?= lang('Korean.Foodservice') ?></option>
                                    <option value="13"><?= lang('Korean.Construction') ?></option>
                                    <option value="14"><?= lang('Korean.Mechanical') ?></option>
                                    <option value="15"><?= lang('Korean.Materials') ?></option>
                                    <option value="16"><?= lang('Korean.Biochemical') ?></option>
                                    <option value="17"><?= lang('Korean.Textiles') ?></option>
                                    <option value="18"><?= lang('Korean.Electrical') ?></option>
                                    <option value="19"><?= lang('Korean.IT') ?></option>
                                    <option value="20"><?= lang('Korean.Foodprocessing') ?></option>
                                    <option value="21"><?= lang('Korean.Printing') ?></option>
                                    <option value="22"><?= lang('Korean.Environmental') ?></option>
                                    <option value="23"><?= lang('Korean.Agriculture') ?></option>

                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="detailed_content" class="signin_label"><?= lang('Korean.reasonReferral') ?></label>
                                <textarea id="detailed_content" value="" name="detailed_content" placeholder="<?= lang('Korean.Placehoder1') ?>"></textarea></br />
                            </div>
                        </div>

                        <div id="main_photo_uploaded" style="display:none;"></div>

                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="referralRegistration()"><?= lang('Korean.referralBtn') ?></button>
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