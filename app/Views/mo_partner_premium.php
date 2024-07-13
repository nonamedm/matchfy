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
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "내 상대";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_partner">
                    <div class="content_partner_header">
                        <p>장원영<?= lang('Korean.factorCon1') ?></p>
                        <h2><?= lang('Korean.factorCon2') ?></h2>
                    </div>
                    <img src="/static/images/partner.png" />
                </div>
                <form class="main_signin_form">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="appear_type" class="signin_label"><?= lang('Korean.faceType') ?></label>
                                <select id="appear_type" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0"><?= lang('Korean.dagFace') ?></option>
                                    <option value="1"><?= lang('Korean.catFace') ?></option>
                                    <option value="2"><?= lang('Korean.foxFace') ?></option>
                                    <option value="3"><?= lang('Korean.extra') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="region1" class="signin_label"><?= lang('Korean.region') ?></label>
                                <select id="region1" value="">
                                    <option><?= lang('Korean.cityCountyDistrict') ?></option>
                                    <option value="0"><?= lang('Korean.seoul2') ?></option>
                                    <option value="1"><?= lang('Korean.gyeonggi2') ?></option>
                                    <option value="2"><?= lang('Korean.incheon2') ?></option>
                                    <option value="3"><?= lang('Korean.extra') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="region2" class="signin_label"><?= lang('Korean.region') ?></label>
                                <select id="region2" value="">
                                    <option><?= lang('Korean.cityCountyDistrict') ?></option>
                                    <option value="0"><?= lang('Korean.seoul2') ?></option>
                                    <option value="1"><?= lang('Korean.gyeonggi2') ?></option>
                                    <option value="2"><?= lang('Korean.incheon2') ?></option>
                                    <option value="3"><?= lang('Korean.extra') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label"><?= lang('Korean.marryTrueFalse') ?></h4>
                                <select id="marital" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0"><?= lang('Korean.existence') ?></option>
                                    <option value="1"><?= lang('Korean.zero') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="smoking" class="signin_label"><?= lang('Korean.smokeType') ?></label>
                                <select id="smoking" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0"><?= lang('Korean.existence') ?></option>
                                    <option value="1"><?= lang('Korean.zero') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="drinking" class="signin_label"><?= lang('Korean.drinkingType') ?></label>
                                <select id="drinking" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="religion" class="signin_label"><?= lang('Korean.religionType') ?></label>
                                <select id="religion" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0"><?= lang('Korean.atheism') ?></option>
                                    <option value="1"><?= lang('Korean.christian') ?></option>
                                    <option value="2"><?= lang('Korean.buddhism') ?></option>
                                    <option value="3"><?= lang('Korean.catholicism') ?></option>
                                    <option value="4"><?= lang('Korean.wonBuddhism') ?></option>
                                    <option value="5"><?= lang('Korean.Islam') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="mbti" class="signin_label">MBTI</label>
                                <select id="mbti" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
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
                                <input id="height" type="number" value="" placeholder="<?= lang('Korean.sinupHeightPlaceholder') ?>">
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="personal_style" class="signin_label"><?= lang('Korean.styleType') ?></label>
                                <select id="personal_style" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0"><?= lang('Korean.strength') ?></option>
                                    <option value="1"><?= lang('Korean.dandy') ?></option>
                                    <option value="2"><?= lang('Korean.nerd') ?></option>
                                    <option value="3"><?= lang('Korean.Free') ?></option>
                                    <option value="4"><?= lang('Korean.AndSoExtra') ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="education" class="signin_label"><?= lang('Korean.education') ?></label>
                                <select id="education" class="custom_select" value="">
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
                                <label for="major" class="signin_label"><?= lang('Korean.major') ?></label>
                                <input id="major" type="text" value="" placeholder="<?= lang('Korean.sinupMajorPlaceholder') ?>">
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label"><?= lang('Korean.schoolNname') ?></h4>
                                <p class="profile_photo_desc"><?= lang('Korean.premiumCon2') ?></p>
                                <div class="input_btn">
                                    <input id="school" type="text" value="" placeholder="<?= lang('Korean.sinupSchoolPlaceholder') ?>">
                                    <button class="btn btn_input_form"><?= lang('Korean.authentication') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label"><?= lang('Korean.occupational') ?></h4>
                                <p class="profile_photo_desc"><?= lang('Korean.premiumCon1') ?></p>
                                <div class="input_btn">
                                    <input id="job" type="text" value="" placeholder="<?= lang('Korean.premiumCon2') ?>">
                                    <button class="btn btn_input_form"><?= lang('Korean.authentication') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="religion" class="signin_label"><?= lang('Korean.assetGroup') ?></label>
                                <p class="profile_photo_desc"><?= lang('Korean.premiumCon4') ?></p>
                                <div class="input_btn">
                                    <select id="religion" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0"><?= lang('Korean.2000thousand') ?></option>
                                        <option value="1"><?= lang('Korean.2000100million') ?></option>
                                        <option value="2"><?= lang('Korean.100million') ?></option>
                                    </select>
                                    <button class="btn btn_input_form"><?= lang('Korean.authentication') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="religion" class="signin_label"><?= lang('Korean.incomeGroup') ?></label>
                                <p class="profile_photo_desc"><?= lang('Korean.premiumCon4') ?>
                                    <!-- <a href="#"> [<?= lang('Korean.government24') ?> →]</a> -->
                                </p>

                                <div class="input_btn">
                                    <select id="religion" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0"><?= lang('Korean.incomeGroup') ?>1</option>
                                        <option value="1"><?= lang('Korean.incomeGroup') ?>2</option>
                                        <option value="2"><?= lang('Korean.incomeGroup') ?>3</option>
                                        <option value="3"><?= lang('Korean.incomeGroup') ?>4</option>
                                        <option value="4"><?= lang('Korean.incomeGroup') ?>5</option>
                                        <option value="5"><?= lang('Korean.incomeGroup') ?>6</option>
                                    </select>
                                    <button class="btn btn_input_form"><?= lang('Korean.authentication') ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label"><?= lang('Korean.father') ?></label>
                                <div class="multy_select">
                                    <select id="parents1" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select id="parents2" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label"><?= lang('Korean.mather') ?></label>
                                <div class="multy_select">
                                    <select id="parents3" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select id="parents4" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="brother" class="signin_label"><?= lang('Korean.sibling') ?></label>
                                <select id="brother" class="custom_select" value="">
                                    <option value=""><?= lang('Korean.selected') ?></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label"><?= lang('Korean.ResidenceType') ?></label>
                                <div class="multy_select_three">
                                    <select id="parents3" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select id="parents4" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select id="parents4" class="custom_select" value="">
                                        <option value=""><?= lang('Korean.selected') ?></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="btn_group">
                            <button type="button" class="btn type01"><?= lang('Korean.save') ?></button>
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
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->


</body>

</html>