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


        <?php $title = "프리미엄 프로필";
        include 'header.php'; ?>
        <?php
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);
        ?>
        <div class="sub_wrap">
            <div class="content_wrap">
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
                <form class="main_signin_form">
                    <legend></legend>
                    <div class="">

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="nickname" class="signin_label"><?= lang('Korean.nickname') ?></label>
                                <input id="nickname" name="nickname" type="text" value="<?= $nickname ?>" placeholder="<?= lang('Korean.sinupNickPlaceholder') ?>">
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label"><?= lang('Korean.marryTrueFalse') ?></h4>
                                <p class="profile_photo_desc"><?= lang('Korean.premiumCon1') ?></p>
                                <div class="input_btn">
                                    <select id="marital" name="marital" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0" <?= $married === '0' ? 'selected' : '' ?>><?= lang('Korean.single') ?></option>
                                        <option value="1" <?= $married === '1' ? 'selected' : '' ?>><?= lang('Korean.married') ?></option>
                                    </select>
                                    <button type="button" class="btn btn_input_form" onclick="showPopupRgt('marital','<?php echo $ci ?>')"><?= lang('Korean.certification') ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="smoking" class="signin_label"><?= lang('Korean.smokeType') ?></label>
                                <select id="smoking" name="smoking" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <!-- <option value="0" <?= $smoker === '0' ? 'selected' : '' ?>><?= lang('Korean.NotAtAll') ?></option>
                                    <option value="1" <?= $smoker === '1' ? 'selected' : '' ?>><?= lang('Korean.oneday12') ?></option>
                                    <option value="2" <?= $smoker === '2' ? 'selected' : '' ?>><?= lang('Korean.oneday35') ?></option>
                                    <option value="3" <?= $smoker === '3' ? 'selected' : '' ?>><?= lang('Korean.oneday5') ?></option> -->
                                    <option value="0" <?= $smoker === '0' ? 'selected' : '' ?>><?= lang('Korean.smokeok') ?></option>
                                    <option value="1" <?= $smoker === '1' ? 'selected' : '' ?>><?= lang('Korean.smokeno') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="drinking" class="signin_label"><?= lang('Korean.drinkingType') ?></label>
                                <select id="drinking" name="drinking" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0" <?= $drinking === '0' ? 'selected' : '' ?>><?= lang('Korean.irrelevant') ?></option>
                                    <option value="1" <?= $drinking === '1' ? 'selected' : '' ?>><?= lang('Korean.notAtAll') ?></option>
                                    <option value="2" <?= $drinking === '2' ? 'selected' : '' ?>><?= lang('Korean.month2') ?></option>
                                    <option value="3" <?= $drinking === '3' ? 'selected' : '' ?>><?= lang('Korean.week12') ?></option>
                                    <option value="4" <?= $drinking === '4' ? 'selected' : '' ?>><?= lang('Korean.week3') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="religion" class="signin_label"><?= lang('Korean.religionType') ?></label>
                                <select id="religion" name="religion" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0" <?= $religion === '0' ? 'selected' : '' ?>><?= lang('Korean.atheism') ?></option>
                                    <option value="1" <?= $religion === '1' ? 'selected' : '' ?>><?= lang('Korean.christian') ?></option>
                                    <option value="2" <?= $religion === '2' ? 'selected' : '' ?>><?= lang('Korean.catholicism') ?></option>
                                    <option value="3" <?= $religion === '3' ? 'selected' : '' ?>><?= lang('Korean.buddhism') ?></option>
                                    <option value="4" <?= $religion === '4' ? 'selected' : '' ?>><?= lang('Korean.extra') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="mbti" class="signin_label">MBTI</label>
                                <select id="mbti" name="mbti" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0" <?= $mbti === '0' ? 'selected' : '' ?>>ENFP</option>
                                    <option value="1" <?= $mbti === '1' ? 'selected' : '' ?>>ENFJ</option>
                                    <option value="2" <?= $mbti === '2' ? 'selected' : '' ?>>ENTP</option>
                                    <option value="3" <?= $mbti === '3' ? 'selected' : '' ?>>ENTJ</option>
                                    <option value="4" <?= $mbti === '4' ? 'selected' : '' ?>>ESFP</option>
                                    <option value="5" <?= $mbti === '5' ? 'selected' : '' ?>>ESFJ</option>
                                    <option value="6" <?= $mbti === '6' ? 'selected' : '' ?>>ESTP</option>
                                    <option value="7" <?= $mbti === '7' ? 'selected' : '' ?>>ESTJ</option>
                                    <option value="8" <?= $mbti === '8' ? 'selected' : '' ?>>INFP</option>
                                    <option value="9" <?= $mbti === '9' ? 'selected' : '' ?>>INFJ</option>
                                    <option value="10" <?= $mbti === '10' ? 'selected' : '' ?>>INTP</option>
                                    <option value="11" <?= $mbti === '11' ? 'selected' : '' ?>>INTJ</option>
                                    <option value="12" <?= $mbti === '12' ? 'selected' : '' ?>>ISFP</option>
                                    <option value="13" <?= $mbti === '13' ? 'selected' : '' ?>>ISFJ</option>
                                    <option value="14" <?= $mbti === '14' ? 'selected' : '' ?>>ISTP</option>
                                    <option value="15" <?= $mbti === '15' ? 'selected' : '' ?>>ISTJ</option>
                                </select>
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
                                <label for="bodyshape" class="signin_label"><?= lang('Korean.formType') ?></label>
                                <select id="bodyshape" name="bodyshape" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0" <?= $bodyshape === '0' ? 'selected' : '' ?>><?= lang('Korean.normal') ?></option>
                                    <option value="1" <?= $bodyshape === '1' ? 'selected' : '' ?>><?= lang('Korean.dry') ?></option>
                                    <option value="2" <?= $bodyshape === '2' ? 'selected' : '' ?>><?= lang('Korean.littleThin') ?></option>
                                    <option value="3" <?= $bodyshape === '3' ? 'selected' : '' ?>><?= lang('Korean.littleChubby') ?></option>
                                    <option value="4" <?= $bodyshape === '4' ? 'selected' : '' ?>><?= lang('Korean.chubby') ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="personal_style" class="signin_label"><?= lang('Korean.styleType') ?></label>
                                <select id="personal_style" name="personal_style" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <?php
                                    if ($gender === "0") {
                                        foreach ($femaleStyle as $item) {
                                    ?>
                                            <option value="<?= $item['value'] ?>"><?= $item['name'] ?></option>
                                        <?php
                                        }
                                    } else {
                                        foreach ($maleStyle as $item) {
                                        ?>
                                            <option value="<?= $item['value'] ?>"><?= $item['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="education" class="signin_label"><?= lang('Korean.education') ?></label>
                                <select id="education" name="education" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0" <?= $education === '0' ? 'selected' : '' ?>><?= lang('Korean.highSchoolGradu') ?></option>
                                    <option value="1" <?= $education === '1' ? 'selected' : '' ?>><?= lang('Korean.attendingUniversity') ?></option>
                                    <option value="2" <?= $education === '2' ? 'selected' : '' ?>><?= lang('Korean.universityGrad') ?></option>
                                    <option value="3" <?= $education === '3' ? 'selected' : '' ?>><?= lang('Korean.attendingGraduate') ?></option>
                                    <option value="4" <?= $education === '4' ? 'selected' : '' ?>><?= lang('Korean.GradSchoolHig') ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="major" class="signin_label"><?= lang('Korean.major') ?></label>
                                <input id="major" name="major" type="text" value="<?= $major ?>" placeholder="<?= lang('Korean.sinupMajorPlaceholder') ?>">
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label"><?= lang('Korean.schoolNname') ?></h4>
                                <p class="profile_photo_desc"><?= lang('Korean.premiumCon2') ?></p>
                                <div class="input_btn">
                                    <input id="school" name="school" type="text" value="<?= $school ?>" placeholder="<?= lang('Korean.sinupSchoolPlaceholder') ?>">
                                    <button type="button" class="btn btn_input_form" onclick="showPopupRgt('school','<?php echo $ci ?>')"><?= lang('Korean.certification') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label"><?= lang('Korean.occupational') ?></h4>
                                <p class="profile_photo_desc"><?= lang('Korean.premiumCon3') ?></p>
                                <div class="input_btn">
                                    <select id="job" name="job" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0" <?= $job === '0' ? 'selected' : '' ?>><?= lang('Korean.jobVal1') ?></option>
                                        <option value="1" <?= $job === '1' ? 'selected' : '' ?>><?= lang('Korean.jobVal2') ?></option>
                                        <option value="2" <?= $job === '2' ? 'selected' : '' ?>><?= lang('Korean.jobVal3') ?></option>
                                    </select>
                                    <button type="button" class="btn btn_input_form" onclick="showPopupRgt('job','<?php echo $ci ?>')"><?= lang('Korean.certification') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="asset_range" class="signin_label"><?= lang('Korean.assetGroup') ?></label>
                                <p class="profile_photo_desc"><?= lang('Korean.premiumCon4') ?></p>
                                <div class="input_btn">
                                    <select id="asset_range" name="asset_range" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0" <?= $asset_range === '0' ? 'selected' : '' ?>><?= lang('Korean.assetRange1000') ?></option>
                                        <option value="1" <?= $asset_range === '1' ? 'selected' : '' ?>><?= lang('Korean.assetRange2000') ?></option>
                                        <option value="2" <?= $asset_range === '2' ? 'selected' : '' ?>><?= lang('Korean.assetRange3000') ?></option>
                                        <option value="3" <?= $asset_range === '3' ? 'selected' : '' ?>><?= lang('Korean.assetRange4000') ?></option>
                                        <option value="4" <?= $asset_range === '4' ? 'selected' : '' ?>><?= lang('Korean.assetRange5000') ?></option>
                                        <option value="5" <?= $asset_range === '5' ? 'selected' : '' ?>><?= lang('Korean.assetRange5000Up') ?></option>
                                    </select>
                                    <button type="button" class="btn btn_input_form" onclick="showPopupRgt('asset_range','<?php echo $ci ?>')"><?= lang('Korean.certification') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="income_range" class="signin_label"><?= lang('Korean.incomeGroup') ?></label>
                                <p class="profile_photo_desc"><?= lang('Korean.premiumCon5') ?> <a href="#"> [<?= lang('Korean.government24') ?> →]</a></p>

                                <div class="input_btn">
                                    <select id="income_range" name="income_range" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0" <?= $income_range === '0' ? 'selected' : '' ?>><?= lang('Korean.assetRange1000') ?></option>
                                        <option value="1" <?= $income_range === '1' ? 'selected' : '' ?>><?= lang('Korean.assetRange2000') ?></option>
                                        <option value="2" <?= $income_range === '2' ? 'selected' : '' ?>><?= lang('Korean.assetRange3000') ?></option>
                                        <option value="3" <?= $income_range === '3' ? 'selected' : '' ?>><?= lang('Korean.assetRange4000') ?></option>
                                        <option value="4" <?= $income_range === '4' ? 'selected' : '' ?>><?= lang('Korean.assetRange5000') ?></option>
                                        <option value="5" <?= $income_range === '5' ? 'selected' : '' ?>><?= lang('Korean.assetRange5000Up') ?></option>
                                    </select>
                                    <button type="button" class="btn btn_input_form" onclick="showPopupRgt('income_range','<?php echo $ci ?>')"><?= lang('Korean.certification') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label"><?= lang('Korean.father') ?></label>
                                <div class="multy_select">
                                    <select id="father_birth_year" name="father_birth_year" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <?php
                                        $nowYear = date('Y');
                                        $pastYear = 1945;
                                        for ($year = $nowYear; $year >= $pastYear; $year--) {
                                            $selected = ($year == $father_birth_year) ? 'selected' : '';
                                            echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select id="father_job" name="father_job" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0">1군 : 중소기업 회사원/자영업/프리랜서 등 기타</option>
                                        <option value="1">2군 : 상장사, 대기업 회사원/기업대표/공무원/공기업</option>
                                        <option value="2">3군 : 전문직(의사, 변호사, 변리사, 한의사, 수의사, 회계사, 세무사, 법무사)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label"><?= lang('Korean.mather') ?></label>
                                <div class="multy_select">
                                    <select id="mother_birth_year" name="mother_birth_year" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <?php
                                        $nowYear = date('Y');
                                        $pastYear = 1945;
                                        for ($year = $nowYear; $year >= $pastYear; $year--) {
                                            $selected = ($year == $mother_birth_year) ? 'selected' : '';
                                            echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <select id="mother_job" name="mother_job" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0">1군 : 중소기업 회사원/자영업/프리랜서 등 기타</option>
                                        <option value="1">2군 : 상장사, 대기업 회사원/기업대표/공무원/공기업</option>
                                        <option value="2">3군 : 전문직(의사, 변호사, 변리사, 한의사, 수의사, 회계사, 세무사, 법무사)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="siblings" class="signin_label"><?= lang('Korean.sibling') ?></label>
                                <select id="siblings" name="siblings" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0" <?= $siblings === '0' ? 'selected' : '' ?>><?= lang('Korean.onlyChild') ?></option>
                                    <option value="1" <?= $siblings === '1' ? 'selected' : '' ?>><?= lang('Korean.1boy1girl') ?></option>
                                    <option value="2" <?= $siblings === '2' ? 'selected' : '' ?>><?= lang('Korean.2boy1girl') ?></option>
                                    <option value="3" <?= $siblings === '3' ? 'selected' : '' ?>><?= lang('Korean.1boy2girl') ?></option>
                                    <option value="4" <?= $siblings === '4' ? 'selected' : '' ?>><?= lang('Korean.2boy2girl') ?></option>
                                    <option value="5" <?= $siblings === '5' ? 'selected' : '' ?>><?= lang('Korean.extra') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="residence" class="signin_label"><?= lang('Korean.ResidenceType') ?></label>
                                <div class="multy_select_three">
                                    <select id="residence1" name="residence1" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0" <?= $residence1 === '0' ? 'selected' : '' ?>><?= lang('Korean.apartment') ?></option>
                                        <option value="1" <?= $residence1 === '1' ? 'selected' : '' ?>><?= lang('Korean.house') ?></option>
                                        <option value="2" <?= $residence1 === '2' ? 'selected' : '' ?>><?= lang('Korean.residentComComplex') ?></option>
                                        <option value="3" <?= $residence1 === '3' ? 'selected' : '' ?>><?= lang('Korean.officetels') ?></option>
                                        <option value="4" <?= $residence1 === '4' ? 'selected' : '' ?>><?= lang('Korean.multiFamilyHousing') ?></option>
                                        <option value="5" <?= $residence1 === '5' ? 'selected' : '' ?>><?= lang('Korean.extra') ?></option>
                                    </select>
                                    <select id="residence2" name="residence2" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0" <?= $residence2 === '0' ? 'selected' : '' ?>><?= lang('Korean.selfHouse') ?></option>
                                        <option value="1" <?= $residence2 === '1' ? 'selected' : '' ?>><?= lang('Korean.charter') ?></option>
                                        <option value="2" <?= $residence2 === '2' ? 'selected' : '' ?>><?= lang('Korean.monthly') ?></option>
                                        <option value="3" <?= $residence2 === '3' ? 'selected' : '' ?>><?= lang('Korean.extra') ?></option>
                                    </select>
                                    <select id="residence3" name="residence3" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0" <?= $residence3 === '0' ? 'selected' : '' ?>><?= lang('Korean.ownerFather') ?></option>
                                        <option value="1" <?= $residence3 === '1' ? 'selected' : '' ?>><?= lang('Korean.ownerMather') ?></option>
                                        <option value="2" <?= $residence3 === '2' ? 'selected' : '' ?>><?= lang('Korean.ownerMe') ?></option>
                                        <option value="3" <?= $residence3 === '3' ? 'selected' : '' ?>><?= lang('Korean.ownerExtra') ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ci" value="<?php echo $ci ?>" />
                        <input type="hidden" name="grade" value="<?php echo $grade ?>" />
                        <div id="main_photo_uploaded" style="display:none;"></div>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="signUpdate()"><?= lang('Korean.updateprofile') ?></button>
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
                <a href="#"><?= lang('Korean.companyName') ?></a>
                <a href="#"><?= lang('Korean.pravacyName') ?></a>
                <a href="#"><?= lang('Korean.serviceName') ?></a>
            </div>
            <div class="footer_info mb40">
                <span><?= lang('Korean.footerInfo1') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo2') ?></span>
                <span><?= lang('Korean.footerInfo3') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo4') ?><img
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
            // editPhotoListListner();
            // editMovListListner();
        });
    </script>

    <!-- -->


</body>

</html>