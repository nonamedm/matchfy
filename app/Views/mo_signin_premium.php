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
        <mobileheader style="height:44px; display: none;"></mobileheader>

        <?php $title = "프리미엄 프로필";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_body">
                    <a id="profileArea" class="profile_area" onclick="editPhoto()">
                        <?php
                        if ($file_path)
                        {
                            echo '<img src="/' . $file_path . $file_name . '" style="border-radius: 50%; width: 74px; height: 74px;object-fit: cover;" />';
                        } else
                        {
                            echo '<img src="/static/images/profile_noimg.png" style="border-radius: 50%; width: 74px; height: 74px;object-fit: cover;" />';
                        }
                        ?>

                    </a>
                </div>
                <div class="btn_group">
                    <button type="button" class="btn type02" onclick="editPhoto()"><?=lang('Korean.profilePhoto')?></button>
                    <input type="file" id="main_photo" name="main_photo" style="display:none;" accept="image/*" />
                </div>
                <form class="main_signin_form">
                    <legend></legend>
                    <div class="">

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label"><?=lang('Korean.marryTrueFalse')?></h4>
                                <p class="profile_photo_desc"><?=lang('Korean.premiumCon1')?></p>
                                <div class="input_btn">
                                    <select id="marital" name="marital" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="0"><?=lang('Korean.single')?></option>
                                        <option value="1"><?=lang('Korean.married')?></option>
                                    </select>
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('marital','<?php echo $ci ?>')"><?=lang('Korean.certification')?></button>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="smoking" class="signin_label"><?=lang('Korean.smokeType')?></label>
                                <select id="smoking" name="smoking" class="custom_select" value="">
                                    <option value=""><?=lang('Korean.selected')?></option>
                                    <option value="0"><?=lang('Korean.NotAtAll')?></option>
                                    <option value="1"><?=lang('Korean.oneday12')?></option>
                                    <option value="2"><?=lang('Korean.oneday35')?></option>
                                    <option value="3"><?=lang('Korean.oneday5')?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="drinking" class="signin_label"><?=lang('Korean.drinkingType')?></label>
                                <select id="drinking" name="drinking" class="custom_select" value="">
                                    <option value=""><?=lang('Korean.selected')?></option>
                                    <option value="1"><?=lang('Korean.notAtAll')?></option>
                                    <option value="2"><?=lang('Korean.week12')?></option>
                                    <option value="3"><?=lang('Korean.week35')?></option>
                                    <option value="4"><?=lang('Korean.week5')?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="religion" class="signin_label"><?=lang('Korean.religionType')?></label>
                                <select id="religion" name="religion" class="custom_select" value="">
                                    <option value=""><?=lang('Korean.selected')?></option>
                                    <option value="0"><?=lang('Korean.atheism')?></option>
                                    <option value="1"><?=lang('Korean.christian')?></option>
                                    <option value="2"><?=lang('Korean.catholicism')?></option>
                                    <option value="3"><?=lang('Korean.buddhism')?></option>
                                    <option value="4"><?=lang('Korean.extra')?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="mbti" class="signin_label">MBTI</label>
                                <select id="mbti" name="mbti" class="custom_select" value="">
                                    <option value=""><?=lang('Korean.selected')?></option>
                                    <option value="0">ENFP</option>
                                    <option value="1">ENFJ</option>
                                    <option value="2">ENTP</option>
                                    <option value="3">ENTJ</option>
                                    <option value="4">ESFP</option>
                                    <option value="5">ESFJ</option>
                                    <option value="6">ESTP</option>
                                    <option value="7">ESTJ</option>
                                    <option value="8">INFP</option>
                                    <option value="9">INFJ</option>
                                    <option value="10">INTP</option>
                                    <option value="11">INTJ</option>
                                    <option value="12">ISFP</option>
                                    <option value="13">ISFJ</option>
                                    <option value="14">ISTP</option>
                                    <option value="15">ISTJ</option>
                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="height" class="signin_label"><?=lang('Korean.height')?></label>
                                <input id="height" name="height" type="number" value="" placeholder="<?=lang('Korean.sinupHeightPlaceholder')?>">
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="bodyshape" class="signin_label"><?=lang('Korean.formType')?></label>
                                <select id="bodyshape" name="bodyshape" class="custom_select" value="">
                                    <option value=""><?=lang('Korean.selected')?></option>
                                    <option value="0"><?=lang('Korean.normal')?></option>
                                    <option value="1"><?=lang('Korean.dry')?></option>
                                    <option value="2"><?=lang('Korean.littleThin')?></option>
                                    <option value="3"><?=lang('Korean.littleChubby')?></option>
                                    <option value="4"><?=lang('Korean.chubby')?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="personal_style" class="signin_label"><?=lang('Korean.styleType')?></label>
                                <select id="personal_style" name="personal_style" class="custom_select" value="">
                                    <option value=""><?=lang('Korean.selected')?></option>
                                    <option value="0"><?=lang('Korean.strength')?></option>
                                    <option value="1"><?=lang('Korean.dandy')?></option>
                                    <option value="2"><?=lang('Korean.nerd')?></option>
                                    <option value="3"><?=lang('Korean.Free')?></option>
                                    <option value="4"><?=lang('Korean.AndSoExtra')?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="education" class="signin_label"><?=lang('Korean.education')?></label>
                                <select id="education" name="education" class="custom_select" value="">
                                    <option value=""><?=lang('Korean.selected')?></option>
                                    <option value="0"><?=lang('Korean.highSchoolGradu')?></option>
                                    <option value="1"><?=lang('Korean.attendingUniversity')?></option>
                                    <option value="2"><?=lang('Korean.universityGrad')?></option>
                                    <option value="3"><?=lang('Korean.attendingGraduate')?></option>
                                    <option value="4"><?=lang('Korean.GradSchoolHig')?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="major" class="signin_label"><?=lang('Korean.major')?></label>
                                <input id="major" name="major" type="text" value="" placeholder="<?=lang('Korean.sinupMajorPlaceholder')?>">
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label"><?=lang('Korean.schoolNname')?></h4>
                                <p class="profile_photo_desc"><?=lang('Korean.premiumCon2')?></p>
                                <div class="input_btn">
                                    <input id="school" name="school" type="text" value="" placeholder="<?=lang('Korean.sinupSchoolPlaceholder')?>">
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('school','<?php echo $ci ?>')"><?=lang('Korean.certification')?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label"><?=lang('Korean.occupational')?></h4>
                                <p class="profile_photo_desc"><?=lang('Korean.premiumCon3')?></p>
                                <div class="input_btn">
                                    <select id="job" name="job" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="0"><?=lang('Korean.jobVal1')?></option>
                                        <option value="1"><?=lang('Korean.jobVal2')?></option>
                                        <option value="2"><?=lang('Korean.jobVal3')?></option>
                                    </select>
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('job','<?php echo $ci ?>')"><?=lang('Korean.certification')?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="asset_range" class="signin_label"><?=lang('Korean.assetGroup')?></label>
                                <p class="profile_photo_desc"><?=lang('Korean.premiumCon4')?></p>
                                <div class="input_btn">
                                    <select id="asset_range" name="asset_range" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="0"><?=lang('Korean.assetRange1000')?></option>
                                        <option value="1"><?=lang('Korean.assetRange2000')?></option>
                                        <option value="2"><?=lang('Korean.assetRange3000')?></option>
                                        <option value="3"><?=lang('Korean.assetRange4000')?></option>
                                        <option value="4"><?=lang('Korean.assetRange5000')?></option>
                                        <option value="5"><?=lang('Korean.assetRange5000Up')?></option>
                                    </select>
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('asset_range','<?php echo $ci ?>')"><?=lang('Korean.certification')?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="income_range" class="signin_label"><?=lang('Korean.incomeGroup')?></label>
                                <p class="profile_photo_desc"><?=lang('Korean.premiumCon5')?> 
                                    <!-- <a href="#"> [<?=lang('Korean.government24')?> →]</a> -->
                                </p>

                                <div class="input_btn">
                                    <select id="income_range" name="income_range" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="0"><?=lang('Korean.assetRange1000')?></option>
                                        <option value="1"><?=lang('Korean.assetRange2000')?></option>
                                        <option value="2"><?=lang('Korean.assetRange3000')?></option>
                                        <option value="3"><?=lang('Korean.assetRange4000')?></option>
                                        <option value="4"><?=lang('Korean.assetRange5000')?></option>
                                        <option value="5"><?=lang('Korean.assetRange5000Up')?></option>
                                    </select>
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('income_range','<?php echo $ci ?>')"><?=lang('Korean.certification')?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label"><?=lang('Korean.father')?></label>
                                <div class="multy_select">
                                    <select id="father_birth_year" name="father_birth_year" class="custom_select"
                                        value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <?php
                                        $nowYear = date('Y');
                                        $pastYear = 1945;
                                        for ($year = $nowYear; $year >= $pastYear; $year--)
                                        {
                                            echo '<option value="' . $year . '">' . $year . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select id="father_job" name="father_job" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="0"><?=lang('Korean.employee')?></option>
                                        <option value="1"><?=lang('Korean.entrepreneur')?></option>
                                        <option value="2"><?=lang('Korean.selfEmployment')?></option>
                                        <option value="3"><?=lang('Korean.inoccupation')?></option>
                                        <option value="4"><?=lang('Korean.extra')?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label"><?=lang('Korean.mather')?></label>
                                <div class="multy_select">
                                    <select id="mother_birth_year" name="mother_birth_year" class="custom_select"
                                        value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <?php
                                        $nowYear = date('Y');
                                        $pastYear = 1945;
                                        for ($year = $nowYear; $year >= $pastYear; $year--)
                                        {
                                            echo '<option value="' . $year . '">' . $year . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select id="mother_job" name="mother_job" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="0"><?=lang('Korean.employee')?></option>
                                        <option value="1"><?=lang('Korean.entrepreneur')?></option>
                                        <option value="2"><?=lang('Korean.selfEmployment')?></option>
                                        <option value="3"><?=lang('Korean.housewife')?></option>
                                        <option value="4"><?=lang('Korean.extra')?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="siblings" class="signin_label"><?=lang('Korean.sibling')?></label>
                                <select id="siblings" name="siblings" class="custom_select" value="">
                                    <option value=""><?=lang('Korean.selected')?></option>
                                    <option value="0"><?=lang('Korean.onlyChild')?></option>
                                    <option value="1"><?=lang('Korean.1boy1girl')?></option>
                                    <option value="2"><?=lang('Korean.2boy1girl')?></option>
                                    <option value="3"><?=lang('Korean.1boy2girl')?></option>
                                    <option value="4"><?=lang('Korean.2boy2girl')?></option>
                                    <option value="5"><?=lang('Korean.extra')?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="residence" class="signin_label"><?=lang('Korean.ResidenceType')?></label>
                                <div class="multy_select_three">
                                    <select id="residence1" name="residence1" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="0"><?=lang('Korean.apartment')?></option>
                                        <option value="1"><?=lang('Korean.house')?></option>
                                        <option value="2"><?=lang('Korean.residentComComplex')?></option>
                                        <option value="3"><?=lang('Korean.officetels')?></option>
                                        <option value="4"><?=lang('Korean.multiFamilyHousing')?></option>
                                        <option value="5"><?=lang('Korean.extra')?></option>
                                    </select>
                                    <select id="residence2" name="residence2" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="0"><?=lang('Korean.selfHouse')?></option>
                                        <option value="1"><?=lang('Korean.charter')?></option>
                                        <option value="2"><?=lang('Korean.monthly')?></option>
                                        <option value="3"><?=lang('Korean.extra')?></option>
                                    </select>
                                    <select id="residence3" name="residence3" class="custom_select" value="">
                                        <option value=""><?=lang('Korean.selected')?></option>
                                        <option value="0"><?=lang('Korean.ownerFather')?></option>
                                        <option value="1"><?=lang('Korean.ownerMather')?></option>
                                        <option value="2"><?=lang('Korean.ownerMe')?></option>
                                        <option value="3"><?=lang('Korean.ownerExtra')?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ci" value="<?php echo $ci ?>" />
                        <input type="hidden" name="grade" value="<?php echo $grade ?>" />
                        <div id="main_photo_uploaded" style="display:none;"></div>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="signUpdate()"><?=lang('Korean.join')?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php include 'mo_signin_popup.php'; ?>


        <div style="height: 50px;"></div>
        <footer class="footer">

            <!-- <div class="footer_logo mb40">
                matchfy
            </div>
            <div class="footer_link mb40">
                <a href="#"><?=lang('Korean.companyName')?></a>
                <a href="#"><?=lang('Korean.pravacyName')?></a>
                <a href="#"><?=lang('Korean.serviceName')?></a>
            </div>
            <div class="footer_info mb40">
                <span><?=lang('Korean.footerInfo1')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo2')?></span>
                <span><?=lang('Korean.footerInfo3')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo4')?><img
                        src="/static/images/part_line.png" /> gildong@naver.com</span>
            </div>
            <div class="footer_copy">
                COPYRIGHT 2023. ALL RIGHTS RESERVED.
            </div> -->

        </footer>
    </div>


    <!-- SCRIPTS -->

    <script>
        $(document).ready(function () {
            editPhotoListner();
            // editPhotoListListner();
            // editMovListListner();
        });

    </script>

    <!-- -->


</body>

</html>