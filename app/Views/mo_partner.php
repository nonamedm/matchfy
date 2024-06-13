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


        <?php $title = "내 상대";
        $prevUrl = "/mo/mypage";
        include 'header.php'; ?>
        <?php
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);
        ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_partner">
                    <div class="content_partner_header">
                        <p>
                            <?= $name ?><?= lang('Korean.factorCon1') ?>
                        </p>
                        <h2><?= lang('Korean.factorCon2') ?></h2>
                    </div>
                    <img src="/static/images/partner.png" />
                </div>
                <form class="main_signin_form" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="" style="width: 335px;margin: 0 auto;">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="appear_type" class="signin_label"><?= lang('Korean.gender') ?></label>
                                <div>
                                    <div class="chk_box radio_box partner">
                                        <input type="radio" id="female" name="partner_mf" value="0" checked="" onclick="selectGender(this)">
                                        <label for="female">
                                            <h2><?= lang('Korean.woman') ?></h2>
                                        </label>
                                    </div>
                                    <div class="chk_box radio_box partner">
                                        <input type="radio" id="male" name="partner_mf" value="1" onclick="selectGender(this)">
                                        <label for="male">
                                            <h2><?= lang('Korean.man') ?></h2>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label"><?= lang('Korean.ageType') ?></label>
                                <div class="multy_select">
                                    <select id="fromyear" name="fromyear" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <?php
                                        $nowYear = date('Y');
                                        $pastYear = 1945;
                                        for ($year = $nowYear; $year >= $pastYear; $year--) {
                                            echo '<option value="' . $year . '">' . $year . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <p style="margin-right: 7px;line-height: 0px;">~ </p>
                                    <select id="toyear" name="toyear" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <?php
                                        $nowYear = date('Y');
                                        $pastYear = 1945;
                                        for ($year = $nowYear; $year >= $pastYear; $year--) {
                                            echo '<option value="' . $year . '">' . $year . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="region" class="signin_label"><?= lang('Korean.region') ?></label>
                                <select id="region" name="region" class="custom_select" value="">
                                    <option value="0"><?= lang('Korean.irrelevant') ?></option>
                                    <?php
                                    foreach ($sidoCode as $item) {
                                    ?>
                                        <option value="<?= $item['id'] ?>">
                                            <?= $item['name'] ?>
                                        </option>
                                    <?php } ?>
                                    <option value="99"><?= lang('Korean.extra') ?></option>
                                </select>
                            </div>
                        </div>

                        <?php if (isset($grade) && ($grade === 'grade02' || $grade === 'grade03')) : ?>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="marital" class="signin_label"><?= lang('Korean.marryType') ?></label>
                                    <select id="marital" name="marital" class="custom_select" value="">
                                        <option value="0"><?= lang('Korean.irrelevant') ?></option>
                                        <option value="1"><?= lang('Korean.absolutelyNot') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="smoking" class="signin_label"><?= lang('Korean.smokeType') ?></label>
                                    <select id="smoking" name="smoking" class="custom_select" value="">
                                        <option value="0"><?= lang('Korean.irrelevant') ?></option>
                                        <option value="1"><?= lang('Korean.absolutelyNot') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="drinking" class="signin_label"><?= lang('Korean.drinkingType') ?></label>
                                    <select id="drinking" name="drinking" class="custom_select" value="">
                                        <option value="0"><?= lang('Korean.irrelevant') ?></option>
                                        <option value="1"><?= lang('Korean.notAtAll') ?></option>
                                        <option value="2"><?= lang('Korean.month2') ?></option>
                                        <option value="3"><?= lang('Korean.week12') ?></option>
                                        <option value="4"><?= lang('Korean.week3') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="religion" class="signin_label"><?= lang('Korean.religionType') ?></label>
                                    <select id="religion" name="religion" class="custom_select" value="">
                                        <option value="5"><?= lang('Korean.notRelevant') ?></option>
                                        <option value="0"><?= lang('Korean.atheism') ?></option>
                                        <option value="1"><?= lang('Korean.christian') ?></option>
                                        <option value="2"><?= lang('Korean.catholicism') ?></option>
                                        <option value="3"><?= lang('Korean.buddhism') ?></option>
                                        <option value="4"><?= lang('Korean.extra') ?></option>

                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="mbti" class="signin_label">MBTI</label>
                                    <select id="mbti" name="mbti" class="custom_select" value="">
                                        <option value="16"><?= lang('Korean.irrelevant') ?></option>
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
                                    <label for="height" class="signin_label"><?= lang('Korean.height') ?></label>
                                    <div style="display:flex;">
                                        <input type="number" id="height" name="height" placeholder="<?= lang('Korean.parnerCon1') ?>" style="width:260px;">
                                        <p class="height_cm"><?= lang('Korean.cmmore') ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="bodyshape" class="signin_label"><?= lang('Korean.formType') ?></label>
                                    <select id="bodyshape" name="bodyshape" class="custom_select">
                                        <option value="0"><?= lang('Korean.normal') ?></option>
                                        <option value="1"><?= lang('Korean.dry') ?></option>
                                        <option value="2"><?= lang('Korean.littleThin') ?></option>
                                        <option value="3"><?= lang('Korean.littleChubby') ?></option>
                                        <option value="4"><?= lang('Korean.chubby') ?></option>
                                        <option value="5" selected><?= lang('Korean.irrelevant') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="personal_style" class="signin_label"><?= lang('Korean.styleType') ?></label>
                                    <select id="personal_style" name="personal_style" class="custom_select">

                                    </select>
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
                                        <option value="5" selected><?= lang('Korean.irrelevant') ?></option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="major" class="signin_label"><?= lang('Korean.major') ?></label>
                                        <input id="major" type="text" value="" placeholder="<?= lang('Korean.sinupMajorPlaceholder') ?>">
                                    </div>
                                </div> -->

                            <!-- <div class="form_row signin_form">
                                    <div class="signin_form_div input_btn">
                                        <h4 class="profile_photo_label"><?= lang('Korean.schoolNname') ?></h4>
                                        <div class="input_btn">
                                            <input id="school" type="text" value="" placeholder="<?= lang('Korean.sinupSchoolPlaceholder') ?>">
                                            <button class="btn btn_input_form"><?= lang('Korean.authentication') ?></button>
                                        </div>
                                    </div>
                                </div> -->

                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="job" class="signin_label"><?= lang('Korean.occupational') ?>군</label>
                                    <select id="job" name="job" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0"><?= lang('Korean.jobVal1') ?></option>
                                        <option value="1"><?= lang('Korean.jobVal2') ?></option>
                                        <option value="2"><?= lang('Korean.jobVal3') ?></option>
                                        <option value="3" selected><?= lang('Korean.irrelevant') ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="asset_range" class="signin_label"><?= lang('Korean.assetGroup') ?></label>
                                    <div class="input_btn">
                                        <select id="asset_range" name="asset_range" class="custom_select" value="">
                                            <option value=""><?= lang('Korean.selected') ?></option>
                                            <option value="0"><?= lang('Korean.assetRange1000') ?></option>
                                            <option value="1"><?= lang('Korean.assetRange2000') ?></option>
                                            <option value="2"><?= lang('Korean.assetRange3000') ?></option>
                                            <option value="3"><?= lang('Korean.assetRange4000') ?></option>
                                            <option value="4"><?= lang('Korean.assetRange5000') ?></option>
                                            <option value="5"><?= lang('Korean.assetRange5000Up') ?></option>
                                            <option value="6" selected><?= lang('Korean.irrelevant') ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="income_range" class="signin_label"><?= lang('Korean.incomeGroup') ?></label>
                                    <div class="input_btn">
                                        <select id="income_range" name="income_range" class="custom_select" value="">
                                            <option value=""><?= lang('Korean.selected') ?></option>
                                            <option value="0"><?= lang('Korean.assetRange1000') ?></option>
                                            <option value="1"><?= lang('Korean.assetRange2000') ?></option>
                                            <option value="2"><?= lang('Korean.assetRange3000') ?></option>
                                            <option value="3"><?= lang('Korean.assetRange4000') ?></option>
                                            <option value="4"><?= lang('Korean.assetRange5000') ?></option>
                                            <option value="5"><?= lang('Korean.assetRange5000Up') ?></option>
                                            <option value="6" selected><?= lang('Korean.irrelevant') ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($grade) && ($grade === 'grade03')) : ?>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="parents" class="signin_label"><?= lang('Korean.father') ?>(<?= lang('Korean.occupational') ?>)</label>
                                    <select id="father_job" name="father_job" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0"><?= lang('Korean.jobVal1') ?></option>
                                        <option value="1"><?= lang('Korean.jobVal2') ?></option>
                                        <option value="2"><?= lang('Korean.jobVal3') ?></option>
                                        <option value="3" selected><?= lang('Korean.irrelevant') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="parents" class="signin_label"><?= lang('Korean.mather') ?>(<?= lang('Korean.occupational') ?>)</label>
                                    <select id="mother_job" name="mother_job" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0"><?= lang('Korean.jobVal1') ?></option>
                                        <option value="1"><?= lang('Korean.jobVal2') ?></option>
                                        <option value="2"><?= lang('Korean.jobVal3') ?></option>
                                        <option value="3" selected><?= lang('Korean.irrelevant') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="siblings" class="signin_label"><?= lang('Korean.sibling') ?></label>
                                    <select id="siblings" name="siblings" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0"><?= lang('Korean.onlyChild') ?></option>
                                        <option value="1"><?= lang('Korean.1boy1girl') ?></option>
                                        <option value="2"><?= lang('Korean.2boy1girl') ?></option>
                                        <option value="3"><?= lang('Korean.1boy2girl') ?></option>
                                        <option value="4"><?= lang('Korean.2boy2girl') ?></option>
                                        <option value="5"><?= lang('Korean.extra') ?></option>
                                        <option value="6" selected><?= lang('Korean.irrelevant') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="residence" class="signin_label"><?= lang('Korean.ResidenceType') ?></label>
                                    <div class="multy_select">
                                        <select id="residence1" name="residence1" class="custom_select" value="">
                                            <option value=""><?= lang('Korean.selected') ?></option>
                                            <option value="0"><?= lang('Korean.apartment') ?></option>
                                            <option value="1"><?= lang('Korean.house') ?></option>
                                            <option value="2"><?= lang('Korean.residentComComplex') ?></option>
                                            <option value="3"><?= lang('Korean.officetels') ?></option>
                                            <option value="4"><?= lang('Korean.multiFamilyHousing') ?></option>
                                            <option value="5"><?= lang('Korean.extra') ?></option>
                                            <option value="6" selected><?= lang('Korean.irrelevant') ?></option>
                                        </select>
                                        <select id="residence2" name="residence2" class="custom_select" value="">
                                            <option value=""><?= lang('Korean.selected') ?></option>
                                            <option value="0"><?= lang('Korean.selfHouse') ?></option>
                                            <option value="1"><?= lang('Korean.charter') ?></option>
                                            <option value="2"><?= lang('Korean.monthly') ?></option>
                                            <option value="3"><?= lang('Korean.extra') ?></option>
                                            <option value="4" selected><?= lang('Korean.irrelevant') ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="savePartnerInfo()"><?= lang('Korean.save') ?></button>
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
        const selectGender = (e) => {
            console.log(e.value);
            $('#personal_style').empty();
            if (e.value === '0') {
                <?php
                if (!empty($femaleStyle)) {
                    foreach ($femaleStyle as $item) { ?>
                        $("#personal_style").append("<option value='<?= $item['value'] ?>'><?= $item['name'] ?></option>")
                <?php }
                } ?>

            } else {
                <?php
                if (!empty($maleStyle)) {
                    foreach ($maleStyle as $item) { ?>
                        $("#personal_style").append("<option value='<?= $item['value'] ?>'><?= $item['name'] ?></option>")
                <?php }
                } ?>
            }

        }
        $(document).ready(function() {
            selectGender(0);
            ageUpDawnChk();
            var partnerGender = <?php echo json_encode($partnerInfo['partner_gender']); ?>;

            var region = "<?php echo $partnerInfo['region']; ?>";
            var fromyear = "<?php echo $partnerInfo['fromyear']; ?>";
            var toyear = "<?php echo $partnerInfo['toyear']; ?>";
            var height = "<?php echo $partnerInfo['height']; ?>";
            var bodyshape = "<?php echo $partnerInfo['bodyshape']; ?>";
            var personalStyle = "<?php echo $partnerInfo['stylish']; ?>";
            var marital = "<?php echo $partnerInfo['married']; ?>";
            var smoking = "<?php echo $partnerInfo['smoker']; ?>";
            var drinking = "<?php echo $partnerInfo['drinking']; ?>";
            var religion = "<?php echo $partnerInfo['religion']; ?>";
            var mbti = "<?php echo $partnerInfo['mbti']; ?>";
            var education = "<?php echo $partnerInfo['education']; ?>";
            var job = "<?php echo $partnerInfo['job']; ?>";
            var assetRange = "<?php echo $partnerInfo['asset_range']; ?>";
            var incomeRange = "<?php echo $partnerInfo['income_range']; ?>";
            var fatherJob = "<?php echo $partnerInfo['father_job']; ?>";
            var motherJob = "<?php echo $partnerInfo['mother_job']; ?>";
            var siblings = "<?php echo $partnerInfo['siblings']; ?>";
            var residence1 = "<?php echo $partnerInfo['residence1']; ?>";
            var residence2 = "<?php echo $partnerInfo['residence2']; ?>";

            if (partnerGender !== "" && partnerGender !== null) {
                $('input[name="partner_mf"][value="' + partnerGender + '"]').prop('checked', true);
            }
            if (region !== "" && region !== null) {
                $("#region").val(region);
            }
            if (fromyear !== "" && fromyear !== null) {
                $("#fromyear").val(fromyear);
            }
            if (toyear !== "" && toyear !== null) {
                $("#toyear").val(toyear);
            }
            if (height !== "" && height !== null) {
                $("#height").val(height);
            }
            if (bodyshape !== "" && bodyshape !== null) {
                $("#bodyshape").val(bodyshape);
            }
            if (personalStyle !== "" && personalStyle !== null) {
                $("#personal_style").val(personalStyle);
            }
            if (marital !== "" && marital !== null) {
                $("#marital").val(marital);
            }
            if (smoking !== "" && smoking !== null) {
                $("#smoking").val(smoking);
            }
            if (drinking !== "" && drinking !== null) {
                $("#drinking").val(drinking);
            }
            if (religion !== "" && religion !== null) {
                $("#religion").val(religion);
            }
            if (mbti !== "" && mbti !== null) {
                $("#mbti").val(mbti);
            }
            if (education !== "" && education !== null) {
                $("#education").val(education);
            }
            if (job !== "" && job !== null) {
                $("#job").val(job);
            }
            if (assetRange !== "" && assetRange !== null) {
                $("#asset_range").val(assetRange);
            }
            if (incomeRange !== "" && incomeRange !== null) {
                $("#income_range").val(incomeRange);
            }
            if (fatherJob !== "" && fatherJob !== null) {
                $("#father_job").val(fatherJob);
            }
            if (fatherJob !== "" && fatherJob !== null) {
                $("#mother_job").val(motherJob);
            }
            if (siblings !== "" && siblings !== null) {
                $("#siblings").val(siblings);
            }
            if (residence1 !== "" && residence1 !== null) {
                $("#residence1").val(residence1);
            }
            if (residence2 !== "" && residence2 !== null) {
                $("#residence2").val(residence2);
            }

        });

        function ageUpDawnChk() {
            $("#fromyear").on("change", function() {
                var fromYear = parseInt($(this).val());
                var toYear = parseInt($("#toyear").val());
                if (fromYear >= toYear) {
                    fn_alert("나이 연도 선택을 다시 해주세요.");
                    $(this).val("");
                }
            });

            // toyear에 대한 검사
            $("#toyear").on("change", function() {
                var toYear = parseInt($(this).val());
                var fromYear = parseInt($("#fromyear").val());
                if (toYear <= fromYear) {
                    fn_alert("나이 연도 선택을 다시 해주세요.");
                    $(this).val("");
                }
            });
        }

        function savePartnerInfo() {
            let tempValidation = false;
            if ($('#fromyear').val().trim() === '') {
                fn_alert('연령정보를 선택해 주세요');
                tempValidation = false;
                $('#fromyear').focus();
            } else if ($('#toyear').val().trim() === '') {
                fn_alert('연령정보를 선택해 주세요');
                tempValidation = false;
                $('#toyear').focus();
            } else if ($('#region').val().trim() === '') {
                fn_alert('지역을 선택해 주세요');
                tempValidation = false;
                $('#region').focus();
            }
            <?php if (isset($grade) && ($grade === 'grade02' || $grade === 'grade03')) : ?>
                if ($('#marital').val().trim() === '') {
                    fn_alert('결혼경험유무를 선택해 주세요');
                    tempValidation = false;
                    $('#marital').focus();
                } else if ($('#smoking').val().trim() === '') {
                    fn_alert('흡연유무를 선택해 주세요');
                    tempValidation = false;
                    $('#smoking').focus();
                } else if ($('#drinking').val().trim() === '') {
                    fn_alert('음주횟수를 선택해 주세요');
                    tempValidation = false;
                    $('#drinking').focus();
                } else if ($('#religion').val().trim() === '') {
                    fn_alert('종교를 선택해 주세요');
                    tempValidation = false;
                    $('#religion').focus();
                } else if ($('#mbti').val().trim() === '') {
                    fn_alert('MBTI를 선택해 주세요');
                    tempValidation = false;
                    $('#mbti').focus();
                } else if ($('#height').val().trim() === '') {
                    fn_alert('최소 키를 입력해 주세요');
                    tempValidation = false;
                    $('#height').focus();
                } else if ($('#bodyshape').val().trim() === '') {
                    fn_alert('체형을 선택해 주세요');
                    tempValidation = false;
                    $('#bodyshape').focus();
                } else if ($('#personal_style').val().trim() === '') {
                    fn_alert('스타일을 선택해 주세요');
                    tempValidation = false;
                    $('#personal_style').focus();
                } else if ($('#education').val().trim() === '') {
                    fn_alert('최종학력을 선택해 주세요');
                    tempValidation = false;
                    $('#education').focus();
                } else if ($('#job').val().trim() === '') {
                    fn_alert('직업군을 선택해 주세요');
                    tempValidation = false;
                    $('#job').focus();
                } else if ($('#asset_range').val().trim() === '') {
                    fn_alert('자산구간을 선택해 주세요');
                    tempValidation = false;
                    $('#asset_range').focus();
                } else if ($('#income_range').val().trim() === '') {
                    fn_alert('연소득을 선택해 주세요');
                    tempValidation = false;
                    $('#income_range').focus();
                }
            <?php endif; ?>

            if (
                $('#fromyear').val() !== '' &&
                $('#toyear').val() !== '' &&
                <?php if (isset($grade) && ($grade === 'grade02' || $grade === 'grade03')) : ?> $('#marital').val() !== '' &&
                    $('#smoking').val() !== '' &&
                    $('#drinking').val() !== '' &&
                    $('#religion').val() !== '' &&
                    $('#mbti').val() !== '' &&
                    $('#height').val() !== '' &&
                    $('#bodyshape').val() !== '' &&
                    $('#personal_style').val() !== '' &&
                    $('#education').val() !== '' &&
                    $('#job').val() !== '' &&
                    $('#asset_range').val() !== '' &&
                    $('#income_range').val() !== '' &&
                <?php endif; ?> $('#region').val() !== ''
            ) {
                tempValidation = true;
            }
            if (tempValidation) {
                var postData = new FormData($('form')[0]);
                $('#ranked li').each(function(index, li) {
                    var value = $(li).data('value');
                    postData.append('animal_type' + (index + 1), value);
                });

                $.ajax({
                    url: '/ajax/savePartner',
                    type: 'POST',
                    data: postData,
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') {
                            // 성공
                            <?php if (isset($grade) && ($grade === 'grade01')) : ?>
                                fn_confirm('파트너 정보저장 성공! \n홈으로 이동합니다.', 'calcMatchRateEdit')
                            <?php endif; ?>
                            <?php if (isset($grade) && ($grade === 'grade02' || $grade === 'grade03')) : ?>
                                moveToUrl('/mo/factorBasic');
                            <?php endif; ?>
                        } else if (data.status === 'error') {
                            console.log('실패', data);
                        } else {
                            fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                        }
                        return false;
                    },
                    error: function(data, status, err) {
                        console.log(err);
                        fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    },
                });
            }

        }

        function fn_calcMatchRate(value) {
            if (value) {
                $.ajax({
                    url: '/ajax/calcMatchRateEdit', // todo : 추후 로그인완료로 이동
                    type: 'POST',
                    async: false,
                    success: function(data) {
                        moveToUrl('/');
                    },
                    error: function(data, status, err) {
                        console.log(err);
                        fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    },
                });
            }
        }
    </script>

    <!-- -->


</body>

</html>