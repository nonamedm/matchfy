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
    <div class="wrap" style="background-color:#f9f9f9;">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>

        <?php $title = "프로필";
        include 'header.php'; ?>
        <?php $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path); ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_body content_profile">
                    <?php if ($image) : ?>
                        <img class="profile_img" src="/<?= $image['file_path'] ?>/<?= $image['file_name'] ?>" />
                    <?php else : ?>
                        <img class="profile_img" src="/static/images/profile_noimg.png" />
                    <?php endif; ?>
                </div>

                <div class="content_mypage_list">
                    <ul>
                        <li class="profile_header">
                            <h2>
                                <?= $nickname ?>
                            </h2>
                            <p>
                                <?= substr($birthday, 0, 4) ?>
                                <?php foreach ($sidoCode as $item) {
                                    if ($item['id'] === $city) echo ' · ' . $item['name'];
                                } ?>
                                <?php foreach ($mbtiCode as $item) {
                                    if ($item['id'] === $mbti) echo ' · ' . $item['name'];
                                } ?>
                            </p>
                        </li>
                        <hr class="hoz_part" />
                        <li class="profile_body">
                            <div class="profile_content">
                                <h2><?=lang('Korean.name')?></h2>
                                <p>
                                    <?= $name ?>
                                </p>
                            </div>
                            <div class="profile_content">
                                <h2><?=lang('Korean.birthTrueFalse')?></h2>
                                <p>
                                    <?= $birthday ?>
                                </p>
                            </div>
                            <div class="profile_content">
                                <h2><?=lang('Korean.gender')?></h2>
                                <p>
                                    <?php foreach ($genderCode as $item) {
                                        if ($item['id'] === $gender) echo $item['name'];
                                    } ?>
                                </p>
                            </div>
                            <div class="profile_content">
                                <h2><?=lang('Korean.region')?></h2>
                                <p>
                                    <?php foreach ($sidoCode as $item) {
                                        if ($item['id'] === $city) echo $item['name'];
                                    } ?>
                                </p>
                            </div>
                            <!-- <div class="profile_content">
                                <h2>관심사</h2>
                                <p> </p>
                            </div> -->
                        </li>
                        <?php if (isset($grade) && ($grade === 'grade02' || $grade === 'grade03')) : ?>
                            <hr class="hoz_part" />
                            <li class="profile_body">
                                <div class="profile_content">
                                    <h2><?=lang('Korean.marryTrueFalse')?></h2>
                                    <p>
                                        <?= $married === 0 ? '미혼' : '기혼' ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.smokeType')?></h2>
                                    <p>
                                        <?php foreach ($smokingCode as $item) {
                                            if ($item['id'] === $smoker) echo $item['name'];
                                        } ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.drinkingType')?></h2>
                                    <p>
                                        <?php foreach ($drinkingCode as $item) {
                                            if ($item['id'] === $drinking) echo $item['name'];
                                        } ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.religionType')?></h2>
                                    <p>
                                        <?php foreach ($religionCode as $item) {
                                            if ($item['id'] === $religion) echo $item['name'];
                                        } ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2>MBTI</h2>
                                    <p>
                                        <?php foreach ($mbtiCode as $item) {
                                            if ($item['id'] === $mbti) echo $item['name'];
                                        } ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.height')?> </h2>
                                    <p>
                                        <?= $height ?> cm
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.styleType')?></h2>
                                    <p>
                                        <?php
                                        if ($gender === '0') {
                                            foreach ($femaleStyle as $item) {
                                                if ($item['value'] === $stylish) echo $item['name'];
                                            }
                                        } else {
                                            foreach ($maleStyle as $item) {
                                                if ($item['value'] === $stylish) echo $item['name'];
                                            }
                                        } ?>
                                    </p>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($grade) && ($grade === 'grade02' || $grade === 'grade03')) : ?>
                            <hr class="hoz_part" />
                            <li class="profile_body">
                                <div class="profile_content">
                                    <h2><?=lang('Korean.education')?></h2>
                                    <p>
                                        <?php foreach ($educationCode as $item) {
                                            if ($item['id'] === $education) echo $item['name'];
                                        } ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.school')?><?=lang('Korean.people')?></h2>
                                    <p>
                                        <?= $school ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.major')?></h2>
                                    <p>
                                        <?= $major ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.assetGroup')?></h2>
                                    <p>
                                        <?php foreach ($asset as $item) {
                                            if ($item['id'] === $asset_range) echo $item['name'];
                                        } ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.incomeGroup')?></h2>
                                    <p>
                                        <?php foreach ($income as $item) {
                                            if ($item['id'] === $income_range) echo $item['name'];
                                        } ?>
                                    </p>
                                </div>
                                <!-- <div class="profile_content">
                                    <h2>몸무게</h2>
                                    <p></p>
                                </div>
                                <div class="profile_content">
                                    <h2>자녀계획</h2>
                                    <p></p>
                                </div>
                                <div class="profile_content">
                                    <h2>특이사항</h2>
                                    <p></p>
                                </div> -->
                            </li>
                        <?php endif; ?>
                        <?php if (isset($grade) && $grade === 'grade03') : ?>
                            <hr class="hoz_part" />
                            <li class="profile_body">
                                <div class="profile_content">
                                    <h2><?=lang('Korean.father')?></h2>
                                    <p>
                                        <?= $father_birth_year ?><?=lang('Korean.year')?> /
                                        <?= $father_job ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.mather')?></h2>
                                    <p>
                                        <?= $mother_birth_year ?><?=lang('Korean.year')?> /
                                        <?= $mother_job ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.sibling')?></h2>
                                    <p>
                                        <?= $siblings ?>
                                    </p>
                                </div>
                                <div class="profile_content">
                                    <h2><?=lang('Korean.ResidenceType')?></h2>
                                    <p>
                                        <?= $residence1 ?>/
                                        <?= $residence2 ?>(
                                        <?= $residence3 ?>)
                                    </p>
                                </div>
                            </li>
                        <?php endif; ?>
                        <!-- <hr class="hoz_part" />
                        <li class="profile_body">
                            
                        </li> -->
                        <!-- <hr class="hoz_part" /> -->
                    </ul>
                </div>
                <div style="height: 50px;"></div>
                <footer class="footer">

                    <div class="btn_group">
                        <button type="button" class="btn type01" onclick="moveToUrl('/mo/mymsg')"><?=lang('Korean.msgBtn')?></button>
                    </div>
                </footer>
            </div>
        </div>





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