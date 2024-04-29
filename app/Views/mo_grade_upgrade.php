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


        <?php $title = "등급 업그레이드";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_title">
                    <h2 class="member_grade"><?= lang('Korean.signinType1') ?></h2>
                </div>
                <form class="main_signin_form" method="post" action="">
                    <div class="content_body">
                        <div class="grade_box grade01" style="position: relative;">
                            <div class="grade_box_title">
                                <div class="chk_box radio_box">
                                    <input type="radio" id="grade01" name="grade" value="grade01">
                                    <label for="grade01">
                                        <h2><?= lang('Korean.signinType2') ?></h2>
                                    </label>
                                </div>
                                <span>Free</span>
                            </div>
                            <div class="grade_box_cont">
                                <p><?= lang('Korean.signinType3') ?></p>
                                <span><?= lang('Korean.name') ?> / <?= lang('Korean.birthTrueFalse') ?> / <?= lang('Korean.gender') ?></span>
                            </div>
                        </div>
                        <div class="grade_box grade02" style="position: relative;">
                            <div class="grade_box_title">
                                <div class="chk_box radio_box">
                                    <input type="radio" id="grade02" name="grade" value="grade02">
                                    <label for="grade02">
                                        <h2><?= lang('Korean.signinType4') ?></h2>
                                    </label>
                                </div>
                                <div class="grade_box_price">
                                    <img src="/static/images/now_signin.png" />
                                    <div class="price_box">
                                        <p class="org_price">109,900</p>
                                        <p class="tot_price"><?= $isDiscounted ? number_format(99000 / 2) : '99,000' ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="grade_box_cont">
                                <p><?= lang('Korean.signinType5') ?></p>
                                <span><?= lang('Korean.marryTrueFalse') ?> / <?= lang('Korean.smokeType') ?> / 음주회수(주) / <?= lang('Korean.religionType') ?> /</span><br />
                                <span>MBTI/<?= lang('Korean.height') ?>/ <?= lang('Korean.styleType') ?> / <?= lang('Korean.education') ?> / <?= lang('Korean.schoolNname') ?> / <?= lang('Korean.major') ?> /</span><br />
                                <span><?= lang('Korean.occupational') ?>/ <?= lang('Korean.assetGroup') ?> / <?= lang('Korean.incomeGroup') ?></span>
                            </div>
                        </div>
                        <div class="grade_box grade03" style="position: relative;">
                            <div class="grade_box_title">
                                <div class="chk_box radio_box">
                                    <input type="radio" id="grade03" name="grade" value="grade03">
                                    <label for="grade03">
                                        <h2><?= lang('Korean.signinType6') ?></h2>
                                    </label>
                                </div>
                                <div class="grade_box_price">
                                    <img src="/static/images/now_signin.png" />
                                    <div class="price_box">
                                        <p class="org_price">1,399,900</p>
                                        <p class="tot_price"><?= $isDiscounted ? number_format(990000 / 2) : '990,000' ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="grade_box_cont">
                                <p><?= lang('Korean.signinType5') ?> <?= lang('Korean.certification') ?></p>
                                <span><?= lang('Korean.signinType8') ?></span><br />
                                <span><?= lang('Korean.signinType9') ?> </span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="btn_group">
                    <button type="button" class="btn type01"><?= lang('Korean.next') ?></button>
                </div>
            </div>
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
            var currentGrade = '<?php echo $grade; ?>'; // PHP 변수에서 사용자의 현재 등급을 가져옵니다.

            console.log(currentGrade);

            // 등급별 비활성화 로직
            var grades = ['grade01', 'grade02', 'grade03']; // 사용 가능한 모든 등급
            var currentGradeIndex = grades.indexOf(currentGrade); // 현재 사용자 등급의 인덱스

            grades.forEach(function(grade, index) {
                if (index <= currentGradeIndex) {
                    var selector = '.' + grade;
                    $(selector).addClass('disabled-grade'); // 낮은 등급 비활성화
                    $(selector).find('input[type="radio"]').prop('disabled', true); // 라디오 버튼 비활성화
                }
            });

            $('.btn.type01').click(function() {
                var selectedGrade = $('input[name="grade"]:checked').val();
                if (!selectedGrade) {
                    alert('등급을 선택해주세요.');
                    return false;
                }
                upgradeGrade(selectedGrade);
            });
        });
    </script>

    <!-- -->


</body>

</html>