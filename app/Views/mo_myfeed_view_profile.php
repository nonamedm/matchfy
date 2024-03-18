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
    <div class="wrap" style="background-color:#f9f9f9;">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        
        <?php $title = "프로필"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_body content_profile">
                    <?php if ($image): ?>
                        <img class="profile_img" src="/<?= $image['file_path'] ?>/<?= $image['file_name'] ?>" />
                    <?php else: ?>
                        <img class="profile_img" src="/static/images/mypage_pfofile.png" />
                    <?php endif; ?>
                </div>
            
                <div class="content_mypage_list">
                    <ul>
                        <li class="profile_header">
                            <h2><?=$name?></h2>
                            <p><?=substr($birthday, 0, 4)?> · <?=$city?> · <?=$mbti?></p>
                        </li>
                        <hr class="hoz_part" />
                        <li class="profile_body">
                            <div class="profile_content">
                                <h2>이름</h2>
                                <p><?=$name?></p>
                            </div>
                            <div class="profile_content">
                                <h2>생년월일</h2>
                                <p><?=$birthday?></p>
                            </div>
                            <div class="profile_content">
                                <h2>성별</h2>
                                <p><?=$gender?></p>
                            </div>
                            <div class="profile_content">
                                <h2>지역</h2>
                                <p><?=$city?></p>
                            </div>
                            <div class="profile_content">
                                <h2>관심사</h2>
                                <p> </p>
                            </div>
                        </li>
                        <hr class="hoz_part" />
                        <li class="profile_body">
                            <div class="profile_content">
                            <h2>결혼유무</h2>
                                <p><?=$married?></p>
                            </div>
                            <div class="profile_content">
                                <h2>흡연 유무</h2>
                                <p><?=$smoker?></p>
                            </div>
                            <div class="profile_content">
                                <h2>음주 횟수</h2>
                                <p><?=$drinking?></p>
                            </div>
                            <div class="profile_content">
                                <h2>종교</h2>
                                <p><?=$religion?></p>
                            </div>
                            <div class="profile_content">
                                <h2>MBTI</h2>
                                <p><?=$mbti?></p>
                            </div>
                            <div class="profile_content">
                                <h2>키 </h2>
                                <p><?=$height?> cm</p>
                            </div>
                            <div class="profile_content">
                                <h2>외모특징</h2>
                                <p><?=$stylish?></p>
                            </div>
                        </li>
                        <hr class="hoz_part" />
                        <li class="profile_body">
                            <div class="profile_content">
                                <h2>학력</h2>
                                <p><?=$education?> 졸업</p>
                            </div>
                            <div class="profile_content">
                                <h2>학교명</h2>
                                <p><?=$school?></p>
                            </div>
                            <div class="profile_content">
                                <h2>전공</h2>
                                <p><?=$major?></p>
                            </div>
                            <div class="profile_content">
                                <h2>자산구간</h2>
                                <p><?=$asset_range?> 만원</p>
                            </div>
                            <div class="profile_content">
                                <h2>소득구간</h2>
                                <p><?=$income_range?> 만원</p>
                            </div>
                            <div class="profile_content">
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
                            </div>
                        </li>
                        <hr class="hoz_part" />
                        <li class="profile_body">
                            <div class="profile_content">
                                <h2>부</h2>
                                <p><?=$father_birth_year?>년 / <?=$father_job?></p>
                            </div>
                            <div class="profile_content">
                                <h2>모</h2>
                                <p><?=$mother_birth_year?>년 / <?=$mother_job?></p>
                            </div>
                            <div class="profile_content">
                                <h2>형제</h2>
                                <p><?=$siblings?></p>
                            </div>
                            <div class="profile_content">
                                <h2>거주형태</h2>
                                <p><?=$residence1?>/<?=$residence2?>(<?=$residence3?>) </p>
                            </div>
                        </li>
                        <!-- <hr class="hoz_part" />
                        <li class="profile_body">
                            
                        </li> -->
                        <!-- <hr class="hoz_part" /> -->
                    </ul>
                </div>
                <div style="height: 50px;"></div>
<footer class="footer">
                    
                    <div class="btn_group">
                        <button type="button" class="btn type01" onclick="moveToUrl('/mo/mymsg')">메시지 보내기</button>
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