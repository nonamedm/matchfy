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
        include 'header.php'; ?>

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
                    <div class="content_partner" style="margin: 50px 5px;">
                        <div class="content_partner_header">
                            <h2><?= lang('Korean.matchCon1') ?> </h2>
                            <p style="margin-top: 20px;">[<?= lang('Korean.factorCon4') ?>]</p>
                            <p style="text-indent: -10px;">
                                * <?= lang('Korean.matchCon2') ?>
                            </p>
                        </div>
                    </div>
                    <div class="content_partner content_factor" style="margin: 50px 5px;">
                        <div class="content_partner_header">
                            <p style="margin-top: 20px;"><?= lang('Korean.matchCon3') ?></p>
                            <br />
                            <p>4<?= lang('Korean.matchCon4') ?><br />
                                1<?= lang('Korean.ranking') ?> X 40<?= lang('Korean.score') ?><br />
                                2<?= lang('Korean.ranking') ?> X 30<?= lang('Korean.score') ?><br />
                                3<?= lang('Korean.ranking') ?> X 20<?= lang('Korean.score') ?><br />
                                4<?= lang('Korean.ranking') ?> X 10<?= lang('Korean.score') ?><br />
                            </p>
                            <br />
                            <p>3<?= lang('Korean.matchCon4') ?><br />
                                1<?= lang('Korean.ranking') ?> X 50<?= lang('Korean.score') ?><br />
                                2<?= lang('Korean.ranking') ?> X 30<?= lang('Korean.score') ?><br />
                                3<?= lang('Korean.ranking') ?> X 20<?= lang('Korean.score') ?><br />
                            </p>
                            <br />
                            <p>2<?= lang('Korean.matchCon4') ?><br />
                                1<?= lang('Korean.ranking') ?> X 60<?= lang('Korean.score') ?><br />
                                2<?= lang('Korean.ranking') ?> X 40<?= lang('Korean.score') ?><br />
                            </p>
                            <br />
                            <p><?= lang('Korean.matchCon5') ?></p>
                        </div>
                    </div>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="first_factor" class="signin_label">1<?= lang('Korean.ranking') ?><span class="required">*</span></label>
                                <select id="first_factor" name="first_factor">
                                    <option value><?= lang('Korean.noSelected') ?></option>
                                    <option value="mbti">MBTI</option>
                                    <!-- <option value="animal_type1"><?= lang('Korean.faceType') ?></option> -->
                                    <option value="stylish"><?= lang('Korean.styleType') ?></option>
                                    <option value="drinking"><?= lang('Korean.drinkingType') ?></option>
                                    <option value="birthday"><?= lang('Korean.ageType') ?></option>
                                    <option value="bodyshape"><?= lang('Korean.formType') ?></option>
                                    <option value="city"><?= lang('Korean.region') ?></option>
                                    <option value="married"><?= lang('Korean.marryType') ?></option>
                                    <option value="smoker"><?= lang('Korean.smokeType') ?></option>
                                    <option value="religion"><?= lang('Korean.religionType') ?></option>
                                    <option value="gender"><?= lang('Korean.gender') ?></option>
                                    <option value="height"><?= lang('Korean.height') ?></option>
                                    <option value="education"><?= lang('Korean.education') ?></option>
                                    <option value="job"><?= lang('Korean.occupational') ?></option>
                                    <option value="asset_range"><?= lang('Korean.assetGroup') ?></option>
                                    <option value="income_range"><?= lang('Korean.incomeGroup') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="second_factor" class="signin_label">2<?= lang('Korean.ranking') ?><span class="required">*</span></label>
                                <select id="second_factor" name="second_factor">
                                    <option value><?= lang('Korean.noSelected') ?></option>
                                    <option value="mbti">MBTI</option>
                                    <!-- <option value="animal_type1"><?= lang('Korean.faceType') ?></option> -->
                                    <option value="stylish"><?= lang('Korean.styleType') ?></option>
                                    <option value="drinking"><?= lang('Korean.drinkingType') ?></option>
                                    <option value="birthday"><?= lang('Korean.ageType') ?></option>
                                    <option value="bodyshape"><?= lang('Korean.formType') ?></option>
                                    <option value="city"><?= lang('Korean.region') ?></option>
                                    <option value="married"><?= lang('Korean.marryType') ?></option>
                                    <option value="smoker"><?= lang('Korean.smokeType') ?></option>
                                    <option value="religion"><?= lang('Korean.religionType') ?></option>
                                    <option value="gender"><?= lang('Korean.gender') ?></option>
                                    <option value="height"><?= lang('Korean.height') ?></option>
                                    <option value="education"><?= lang('Korean.education') ?></option>
                                    <option value="job"><?= lang('Korean.occupational') ?></option>
                                    <option value="asset_range"><?= lang('Korean.assetGroup') ?></option>
                                    <option value="income_range"><?= lang('Korean.incomeGroup') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="third_factor" class="signin_label">3<?= lang('Korean.ranking') ?></label>
                                <select id="third_factor" name="third_factor">
                                    <option value><?= lang('Korean.noSelected') ?></option>
                                    <option value="mbti">MBTI</option>
                                    <!-- <option value="animal_type1"><?= lang('Korean.faceType') ?></option> -->
                                    <option value="stylish"><?= lang('Korean.styleType') ?></option>
                                    <option value="drinking"><?= lang('Korean.drinkingType') ?></option>
                                    <option value="birthday"><?= lang('Korean.ageType') ?></option>
                                    <option value="bodyshape"><?= lang('Korean.formType') ?></option>
                                    <option value="city"><?= lang('Korean.region') ?></option>
                                    <option value="married"><?= lang('Korean.marryType') ?></option>
                                    <option value="smoker"><?= lang('Korean.smokeType') ?></option>
                                    <option value="religion"><?= lang('Korean.religionType') ?></option>
                                    <option value="gender"><?= lang('Korean.gender') ?></option>
                                    <option value="height"><?= lang('Korean.height') ?></option>
                                    <option value="education"><?= lang('Korean.education') ?></option>
                                    <option value="job"><?= lang('Korean.occupational') ?></option>
                                    <option value="asset_range"><?= lang('Korean.assetGroup') ?></option>
                                    <option value="income_range"><?= lang('Korean.incomeGroup') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="fourth_factor" class="signin_label">4<?= lang('Korean.ranking') ?></label>
                                <select id="fourth_factor" name="fourth_factor">
                                    <option value><?= lang('Korean.noSelected') ?></option>
                                    <option value="mbti">MBTI</option>
                                    <!-- <option value="animal_type1"><?= lang('Korean.faceType') ?></option> -->
                                    <option value="stylish"><?= lang('Korean.styleType') ?></option>
                                    <option value="drinking"><?= lang('Korean.drinkingType') ?></option>
                                    <option value="birthday"><?= lang('Korean.ageType') ?></option>
                                    <option value="bodyshape"><?= lang('Korean.formType') ?></option>
                                    <option value="city"><?= lang('Korean.region') ?></option>
                                    <option value="married"><?= lang('Korean.marryType') ?></option>
                                    <option value="smoker"><?= lang('Korean.smokeType') ?></option>
                                    <option value="religion"><?= lang('Korean.religionType') ?></option>
                                    <option value="gender"><?= lang('Korean.gender') ?></option>
                                    <option value="height"><?= lang('Korean.height') ?></option>
                                    <option value="education"><?= lang('Korean.education') ?></option>
                                    <option value="job"><?= lang('Korean.occupational') ?></option>
                                    <option value="asset_range"><?= lang('Korean.assetGroup') ?></option>
                                    <option value="income_range"><?= lang('Korean.incomeGroup') ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="content_partner except_header" style="margin: 50px 5px;">
                        <div class="content_partner_header">
                            <h2>이런 분은 싫어요! </h2>
                            <p>매칭 제외 항목 설정</p>
                        </div>
                    </div>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="except1" class="signin_label"><?= lang('Korean.exclusionItems') ?>1<span class="required">*</span></label>
                                <div class="multy_select">
                                    <select id="except1" name="except1" onchange="chgExcept(this);">
                                        <option value><?= lang('Korean.noSelected') ?></option>
                                        <option value="mbti">MBTI</option>
                                        <!-- <option value="animal_type1"><?= lang('Korean.faceType') ?></option> -->
                                        <option value="stylish"><?= lang('Korean.styleType') ?></option>
                                        <option value="drinking"><?= lang('Korean.drinkingType') ?></option>
                                        <!-- <option value="birthday"><?= lang('Korean.ageType') ?></option> -->
                                        <option value="bodyshape"><?= lang('Korean.formType') ?></option>
                                        <option value="city"><?= lang('Korean.region') ?></option>
                                        <option value="married"><?= lang('Korean.marryType') ?></option>
                                        <option value="smoker"><?= lang('Korean.smokeType') ?></option>
                                        <option value="religion"><?= lang('Korean.religionType') ?></option>
                                        <!-- <option value="gender"><?= lang('Korean.gender') ?></option> -->
                                        <!-- <option value="height"><?= lang('Korean.height') ?></option> -->
                                        <option value="education"><?= lang('Korean.education') ?></option>
                                        <option value="job"><?= lang('Korean.occupational') ?></option>
                                        <option value="asset_range"><?= lang('Korean.assetGroup') ?></option>
                                        <option value="income_range"><?= lang('Korean.incomeGroup') ?></option>
                                    </select>
                                    <select id="except1_detail" name="except1_detail">
                                        <option value><?= lang('Korean.noSelected') ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="except2" class="signin_label"><?= lang('Korean.exclusionItems') ?>2<span class="required">*</span></label>
                                <div class="multy_select">
                                    <select id="except2" name="except2" onchange="chgExcept(this);">
                                        <option value><?= lang('Korean.noSelected') ?></option>
                                        <option value="mbti">MBTI</option>
                                        <!-- <option value="animal_type1"><?= lang('Korean.faceType') ?></option> -->
                                        <option value="stylish"><?= lang('Korean.styleType') ?></option>
                                        <option value="drinking"><?= lang('Korean.drinkingType') ?></option>
                                        <!-- <option value="birthday"><?= lang('Korean.ageType') ?></option> -->
                                        <option value="bodyshape"><?= lang('Korean.formType') ?></option>
                                        <option value="city"><?= lang('Korean.region') ?></option>
                                        <option value="married"><?= lang('Korean.marryType') ?></option>
                                        <option value="smoker"><?= lang('Korean.smokeType') ?></option>
                                        <option value="religion"><?= lang('Korean.religionType') ?></option>
                                        <!-- <option value="gender"><?= lang('Korean.gender') ?></option> -->
                                        <!-- <option value="height"><?= lang('Korean.height') ?></option> -->
                                        <option value="education"><?= lang('Korean.education') ?></option>
                                        <option value="job"><?= lang('Korean.occupational') ?></option>
                                        <option value="asset_range"><?= lang('Korean.assetGroup') ?></option>
                                        <option value="income_range"><?= lang('Korean.incomeGroup') ?></option>
                                    </select>
                                    <select id="except2_detail" name="except2_detail">
                                        <option value><?= lang('Korean.noSelected') ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="saveFactorInfo()"><?= lang('Korean.save') ?></button>
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
            var first_factor = "<?php echo $first_factor; ?>"
            var second_factor = "<?php echo $second_factor; ?>"
            var third_factor = "<?php echo $third_factor; ?>"
            var fourth_factor = "<?php echo $fourth_factor; ?>"
            var except1 = "<?php echo $except1; ?>"
            var except2 = "<?php echo $except2; ?>"
            var except1_detail = "<?php echo $except1_detail; ?>"
            var except2_detail = "<?php echo $except2_detail; ?>"

            if (first_factor !== "" && first_factor !== null) {
                $("#first_factor").val(first_factor);
            }
            if (second_factor !== "" && second_factor !== null) {
                $("#second_factor").val(second_factor);
            }
            if (third_factor !== "" && third_factor !== null) {
                $("#third_factor").val(third_factor);
            }
            if (fourth_factor !== "" && fourth_factor !== null) {
                $("#fourth_factor").val(fourth_factor);
            }
            if (except1 !== "" && except1 !== null) {
                $("#except1").val(except1);
                if ($("#except1").val(except1) !== "") {
                    chgExcept($("#except1")[0]);
                    if (except1_detail !== "" || except1_detail !== null) {
                        $("#except1_detail").val(except1_detail);
                    }
                }
            }
            if (except2 !== "" && except2 !== null) {
                $("#except2").val(except2);
                if ($("#except2").val(except2) !== "") {
                    chgExcept($("#except2")[0]);
                    if (except2_detail !== "" || except2_detail !== null) {
                        $("#except2_detail").val(except2_detail);
                    }
                }
            }
        });
        const chgExcept = (e) => {
            if (e.value) {
                $.ajax({
                    url: '/ajax/chgExcept', // todo : 추후 본인인증 연결
                    type: 'POST',
                    data: {
                        "value": e.value
                    },
                    async: false,
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') {
                            // 성공                   
                            $("#" + e.id + "_detail").html('');
                            data.data.forEach(item => {
                                $("#" + e.id + "_detail").append('<option value=' + item.value + '>' + item.name + '</option>');
                            });
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
            } else {
                $("#" + e.id + "_detail").html('');
                $("#" + e.id + "_detail").append('<option><?= lang('Korean.noSelected') ?></option>');
            }
        }

        const saveFactorInfo = () => {
            let tempValidation = false;
            if ($('#first_factor').val().trim() === '') {
                fn_alert('1순위 항목을 선택해주세요');
                tempValidation = false;
                $('#first_factor').focus();
            } else if ($('#second_factor').val().trim() === '') {
                fn_alert('2순위 항목을 선택해주세요');
                tempValidation = false;
                $('#second_factor').focus();
            } else if ($('#except1').val().trim() === '') {
                fn_alert('배제1 항목을 선택해 주세요');
                tempValidation = false;
                $('#except1').focus();
            } else if ($('#except1_detail').val().trim() === '') {
                fn_alert('배제1 상세항목을 선택해 주세요');
                tempValidation = false;
                $('#except1_detail').focus();
            } else if ($('#except2').val().trim() === '') {
                fn_alert('배제2 항목을 선택해 주세요');
                tempValidation = false;
                $('#except2').focus();
            } else if ($('#except2_detail').val().trim() === '') {
                fn_alert('배제2 상세항목을 선택해 주세요');
                tempValidation = false;
                $('#except2_detail').focus();
            }

            if (
                $('#first_factor').val() !== '' &&
                $('#second_factor').val() !== '' &&
                $('#except1').val() !== '' &&
                $('#except2').val() !== '' &&
                $('#except1_detail').val() !== '' &&
                $('#except2_detail').val() !== ''
            ) {
                tempValidation = true;
            }
            if (tempValidation) {
                var postData = new FormData($('form')[0]);
                $.ajax({
                    url: '/ajax/saveFactorInfo',
                    type: 'POST',
                    data: postData,
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') { // 성공                        
                            console.log('저장', data);
                            fn_confirm('파트너 정보저장 성공! \n홈으로 이동합니다.', 'calcMatchRate')
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
                    url: '/ajax/calcMatchRate', // todo : 추후 로그인완료로 이동
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