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
        $prevUrl = '/mo/partner';
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
                <div class="content_partner" style="margin: 50px 5px;">
                    <div class="content_partner_header">
                        <h2><?= lang('Korean.factorCon3') ?> </h2>
                        <p style="margin-top: 20px;">[<?= lang('Korean.factorCon4') ?>]</p>
                        <p style="text-indent: -10px;">
                            * <?= lang('Korean.factorCon5') ?>
                        </p>
                    </div>
                </div>
                <form class="main_signin_form" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="group1" class="signin_label">MBTI / <?= lang('Korean.faceType') ?> / <?= lang('Korean.styleType') ?> / <?= lang('Korean.drinkingType') ?></label>
                                <select id="group1" name="group1">
                                    <option value="5" selected>5</option>
                                    <option value="10">10</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="group2" class="signin_label"><?= lang('Korean.ageType') ?> / <?= lang('Korean.formType') ?> / <?= lang('Korean.region') ?><br /><?= lang('Korean.marryType') ?> / <?= lang('Korean.smokeType') ?> / <?= lang('Korean.religionType') ?></label>
                                <select id="group2" name="group2">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="group3" class="signin_label"><?= lang('Korean.gender') ?> / <?= lang('Korean.height') ?> / <?= lang('Korean.education') ?> / <?= lang('Korean.occupational') ?><br /> <?= lang('Korean.assetGroup') ?> / <?= lang('Korean.incomeGroup') ?></label>
                                <select id="group3" name="group3">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="30">30</option>
                                    <option value="50" selected>50</option>
                                    <option value="70">70</option>
                                </select>
                            </div>
                        </div>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="saveFactorBasic()"><?= lang('Korean.save') ?></button>
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
                <a href="#"><?= lang('Korean.companyName') ?></a>
                <a href="#"><?= lang('Korean.pravacyName') ?></a>
                <a href="#"><?= lang('Korean.serviceName') ?></a>
                <a href="#"><?= lang('Korean.supporterName') ?></a>
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
            var partnerGender = <?php echo json_encode($partner_gender); ?>;

            var group1 = "<?php echo $group1; ?>";
            var group2 = "<?php echo $group2; ?>";
            var group3 = "<?php echo $group3; ?>";
            var group4 = "<?php echo $group4; ?>";
            var group5 = "<?php echo $group5; ?>";

            if (group1 !== "" && group1 !== null) {
                $("#group1").val(group1);
            }
            if (group2 !== "" && group2 !== null) {
                $("#group2").val(group2);
            }
            if (group3 !== "" && group3 !== null) {
                $("#group3").val(group3);
            }
            if (group4 !== "" && group4 !== null) {
                $("#group4").val(group4);
            }
            if (group5 !== "" && group5 !== null) {
                $("#group5").val(group5);
            }
        });
        const saveFactorBasic = () => {
            var postData = new FormData($('form')[0]);
            $.ajax({
                url: '/ajax/saveFactorBasic', // todo : 추후 본인인증 연결
                type: 'POST',
                data: postData,
                processData: false,
                contentType: false,
                async: false,
                success: function(data) {
                    console.log(data);
                    if (data.status === 'success') {
                        // 성공                        
                        console.log('저장', data);
                        moveToUrl('/mo/factorInfo');
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
    </script>

    <!-- -->


</body>

</html>