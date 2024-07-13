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
    <div class="wrap" style="background-color:#f9f9f9;">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "마이페이지";
        $prevUrl = "/";
        include 'header.php'; ?>
        <?php $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path); ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_body content_mypage">
                    <?php if ($image) : ?>
                        <img class="profile_img" src="/<?= $image['file_path'] ?>/<?= $image['file_name'] ?>" />
                    <?php else : ?>
                        <img class="profile_img" src="/static/images/profile_noimg.png" />
                    <?php endif; ?>
                    <div class="content_mypage_info">
                        <div class="profile">
                            <h2 onclick="moveToUrl('/mo/viewProfile/<?= $nickname ?>')">
                                <?= $nickname ?><span style="font-size:15px;"> <?= lang('Korean.sir') ?></span>
                            </h2>
                            <button class="myinfo_level" data-grade="<?= $grade ?>">수정</button>
                        </div>
                        <p>
                            <?= $birthday ?>
                            <?php foreach ($sidoCode as $item) {
                                if ($item['id'] === $city) echo ' · ' . $item['name'];
                            } ?>
                            <?php foreach ($mbtiCode as $item) {
                                if ($item['id'] === $mbti) echo ' · ' . $item['name'];
                            } ?>
                        </p>
                    </div>
                    <button class="content_mypage_logout" onclick="userLogout()">
                        <svg width="16" height="11" viewBox="0 -1 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.64754 6.8753C8.27961 6.86575 7.97008 7.06307 7.95619 7.31602C7.92488 7.88627 7.8809 8.30248 7.83766 8.60089C7.79508 8.89477 7.53702 9.07159 7.1773 9.10182C6.75313 9.13747 6.15477 9.16665 5.33367 9.16665C4.51254 9.16665 3.91418 9.13747 3.49002 9.10182C3.13048 9.0716 2.87229 8.8947 2.8297 8.60075C2.74944 8.04684 2.667 7.08985 2.667 5.49998C2.66701 3.9101 2.74944 2.95312 2.8297 2.39921C2.87229 2.10526 3.13048 1.92835 3.49002 1.89814C3.91418 1.86249 4.51254 1.83331 5.33367 1.83331C6.15477 1.83331 6.75313 1.86249 7.1773 1.89813C7.53702 1.92837 7.79508 2.10519 7.83766 2.39907C7.8809 2.69748 7.92488 3.11368 7.95619 3.68394C7.97008 3.93689 8.27961 4.1342 8.64754 4.12465C9.01546 4.1151 9.30247 3.90231 9.28858 3.64936C9.25644 3.06405 9.21087 2.62872 9.16443 2.3082C9.06679 1.63437 8.38345 1.07601 7.33908 0.988241C6.85294 0.947385 6.19979 0.916646 5.33367 0.916646C4.46752 0.916646 3.81436 0.947386 3.32822 0.988245C2.28377 1.07603 1.60055 1.63465 1.50293 2.30834C1.41698 2.90154 1.33367 3.89053 1.33367 5.49998C1.33367 7.10943 1.41698 8.09842 1.50293 8.69162C1.60055 9.36531 2.28377 9.92393 3.32822 10.0117C3.81436 10.0526 4.46752 10.0833 5.33367 10.0833C6.19979 10.0833 6.85294 10.0526 7.33908 10.0117C8.38345 9.92395 9.06679 9.36559 9.16443 8.69176C9.21087 8.37124 9.25644 7.93591 9.28858 7.3506C9.30247 7.09765 9.01546 6.88485 8.64754 6.8753Z" fill="black" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1956 6.78008C10.9352 6.95907 10.9352 7.24927 11.1956 7.42826C11.4559 7.60725 11.878 7.60725 12.1384 7.42826L14.4717 5.82409C14.7321 5.6451 14.7321 5.3549 14.4717 5.17591L12.1384 3.57174C11.878 3.39275 11.4559 3.39275 11.1956 3.57174C10.9352 3.75073 10.9352 4.04093 11.1956 4.21992L12.3908 5.04167H6.00033C5.63214 5.04167 5.33366 5.24687 5.33366 5.5C5.33366 5.75313 5.63214 5.95833 6.00033 5.95833L12.3908 5.95833L11.1956 6.78008Z" fill="black" />
                        </svg>

                        <?= lang('Korean.logout') ?>
                    </button>
                </div>
                <div class="line_banner" onclick="moveToUrl('/mo/mymsgAimsg')">
                    <a>
                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 6C0 2.68629 2.68629 0 6 0H14C17.3137 0 20 2.68629 20 6V10C20 13.3137 17.3137 16 14 16H0V6Z" fill="white" />
                            <circle cx="6" cy="8" r="1" fill="#FF0267" />
                            <circle cx="10" cy="8" r="1" fill="#FF0267" />
                            <circle cx="14" cy="8" r="1" fill="#FF0267" />
                        </svg>
                        <p><?= lang('Korean.mypageCon') ?></p>
                    </a>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.65685 1.34315L10.3137 7L4.65685 12.6569" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <div class="content_mypage_list">
                    <ul>
                        <!-- <li onclick="moveToUrl('/mo/mypage/wallet')">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" fill="white" stroke="#111111" stroke-width="1.5" stroke-linejoin="bevel" />
                                <path d="M5 6L6.99681 13L9 6L10.9968 13L13 6" fill="white" />
                                <path d="M5 6L6.99681 13L9 6L10.9968 13L13 6" stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4 8H14" stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p>
                                <?= lang('Korean.mywallet') ?>
                            </p>
                        </li> -->
                        <li onclick="moveToUrl('/mo/mymsg/list')">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.00083 16L15.7473 9.23865L16.2639 8.64554C17.4092 6.96552 17.2002 4.71487 15.7611 3.27291C14.1158 1.6244 11.4392 1.6244 9.79357 3.27328L9.01664 4.0523L8.20275 3.23625C6.55714 1.58792 3.88088 1.58792 2.23619 3.23625C1.43884 4.03609 1 5.09775 1 6.2263C1 6.81223 1.12373 7.40073 1.35869 7.93506L1.42818 8.03788C1.63298 8.4694 1.90949 8.86112 2.24997 9.20272L3.06184 10.0483L9.00083 16Z" stroke="#111111" stroke-width="1.5" stroke-linejoin="round" />
                            </svg>
                            <p>
                                내 대화
                            </p>
                        </li>
                        <hr class="hoz_part" />
                        <li onclick="moveToUrl('/mo/myfeed/<?= $nickname ?>')">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.75" y="0.75" width="14.5" height="14.5" rx="2.25" stroke="#111111" stroke-width="1.5" />
                            </svg>

                            <p>
                                <?= lang('Korean.myfeed') ?>
                            </p>
                        </li>
                        <hr class="hoz_part" />
                        <li onclick="moveToUrl('/mo/mypage/mygroup/myList')">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.3001 16.2001V13.5001C15.3001 11.5119 13.6883 9.90015 11.7001 9.90015H6.30007C4.31185 9.90015 2.70007 11.5119 2.70007 13.5001V16.2001" stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <circle cx="9.00006" cy="4.50015" r="2.85" stroke="#111111" stroke-width="1.5" />
                            </svg>
                            <p>
                                <?= lang('Korean.myMeet') ?>
                            </p>
                        </li>
                        <hr class="hoz_part" />
                        <li onclick="moveToUrl('/mo/mypage/mygroup/list')">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.3001 16.2001V13.5001C15.3001 11.5119 13.6883 9.90015 11.7001 9.90015H6.30007C4.31185 9.90015 2.70007 11.5119 2.70007 13.5001V16.2001" stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <circle cx="9.00006" cy="4.50015" r="2.85" stroke="#111111" stroke-width="1.5" />
                            </svg>
                            <p>
                                <?= lang('Korean.myMeetSetting') ?>
                            </p>
                        </li>
                        <hr class="hoz_part" />
                        <li onclick="moveToUrl('/mo/partner')">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.00083 16L15.7473 9.23865L16.2639 8.64554C17.4092 6.96552 17.2002 4.71487 15.7611 3.27291C14.1158 1.6244 11.4392 1.6244 9.79357 3.27328L9.01664 4.0523L8.20275 3.23625C6.55714 1.58792 3.88088 1.58792 2.23619 3.23625C1.43884 4.03609 1 5.09775 1 6.2263C1 6.81223 1.12373 7.40073 1.35869 7.93506L1.42818 8.03788C1.63298 8.4694 1.90949 8.86112 2.24997 9.20272L3.06184 10.0483L9.00083 16Z" stroke="#111111" stroke-width="1.5" stroke-linejoin="round" />
                            </svg>
                            <p>
                                <?= lang('Korean.myPartner') ?>
                            </p>
                        </li>
                        <hr class="hoz_part" />


                    </ul>
                </div>
            </div>
            <div style="height: 50px;"></div>

            <footer class="footer">
            </footer>
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

        $(document).ready(function() {
            $('.myinfo_level').on('click', function() {
                var grade = $(this).data('grade');

                if (grade === 'grade02') {
                    window.location.href = '/mo/updateRegular';
                } else if (grade === 'grade03') {
                    window.location.href = '/mo/updatePremium';
                } else if (grade === 'grade01') {
                    window.location.href = '/mo/updateMyinfo';
                }
            });
        });
    </script>

    <!-- -->


</body>

</html>