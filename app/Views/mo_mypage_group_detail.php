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
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        
        <?php $title = "매칭모임"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_deatil_img">
                    <img src="/static/images/group_deatil.png" />
                </div>
                <div class="group_detail_info">
                    <div class="group_detail_header">
                        <div class="group_detail_type"><?=$catetory?><?php $postData ?></div>
                        <p>매칭률 <span><?=$matching_rate?></span></p>
                    </div>
                    <div class="group_detail_title">
                        <h2><?=$title?></h2>
                        <p class="group_detail_schedule"><?=$meeting_start_date?> ~ <?=$meeting_end_date?> 모임</p>
                        <p class="group_detail_period"><?=$recruitment_start_date?> ~ <?=$recruitment_end_date?> 까지 모집중</p>
                        <div class="group_particpnt">
                            <span>신청 2</span>/<?=$number_of_people?>명
                        </div>
                    </div>
                    <hr class="hoz_part" />
                    <div class="group_detail_cont">
                    <?=$content?>
                        <div class="group_detail_location">
                            <div>
                                <img src="/static/images/group_location_detail.png" />
                            </div>
                            <div style="padding: 10px 0 0 20px;">
                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    <?=$meeting_place?>
                                </div>
                                <p class="group_location_schedule"><?=$meeting_start_date?> (금) 20시 </p>
                                <p class="group_location_fee"><span><?=$meeting_fee?>원</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="group_detail_map">
                        <h2>모임장소</h2>
                        <img src="/static/images/group_naver_map.png" />

                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">
                <div class="btn_group">
                    <button type="button" class="btn type01">함께하기</button>
                </div>
                
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
    </script>

    <!-- -->


</body>

</html>