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
                <button class="content_mypage_logout" onclick="userLogout()">
                    <?= lang('Korean.logout') ?>
                </button>
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