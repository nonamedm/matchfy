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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/static/js/meeting_member.js"></script>
    <!-- <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=dfeedb645765a4f5e27cfb8dda43a2c8&libraries=services"></script> -->
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        
        <?php $title = "매칭모임"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_deatil_img">
                    <?php if ($image): ?>
                        <img src="/<?= $image['file_path'] ?><?= $image['file_name'] ?>" />
                    <?php else: ?>
                        <img src="/static/images/group_deatil.png" />
                    <?php endif; ?>
                </div>
                <div class="group_detail_info">
                    <div class="group_detail_header">
                        <div class="group_detail_type"><?=$category?><?php $postData ?></div>
                        <p>매칭률 <span><?=$matching_rate?>%</span></p>
                    </div>
                    <div class="group_detail_title">
                        <h2><?=$title?></h2>
                        <p class="group_detail_period"><?=$recruitment_start_date?> ~ <?=$recruitment_end_date?> 까지 모집중</p>
                        <p class="group_detail_schedule"><?=$meeting_start_date?> 모임</p>
                        <div class="group_particpnt" onclick="meetingMemberList('<?=$idx?>')">
                            <span>신청 <?=$meeing_count?></span>/<?=$number_of_people?>명
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
                                <p class="group_location_schedule"><?=$meeting_start_date?></p>
                                <p class="group_location_fee"><span><?=number_format($membership_fee)?>원</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="group_detail_map">
                        <h2>모임장소</h2>
                        <div id="map" style="width:335px;height:175px;margin-top: 20px;"></div>
                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">
                <div class="btn_group">
                    <?php if ($is_recruitment_full): ?>
                        <button type="button" class="btn type01 disabled">모집 마감</button>
                    <?php else: ?>
                        <button type="button" class="btn type01" onclick="meetingApplication('<?= $idx ?>')">함께하기</button>
                    <?php endif; ?>
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

        // var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        //     mapOption = {
        //         center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
        //         level: 3 // 지도의 확대 레벨
        //     };  

        // // 지도를 생성합니다    
        // var map = new kakao.maps.Map(mapContainer, mapOption); 

        // // 주소-좌표 변환 객체를 생성합니다
        // var geocoder = new kakao.maps.services.Geocoder();

        // // 주소로 좌표를 검색합니다
        // geocoder.addressSearch('<?=$meeting_place?>', function(result, status) {

        //     // 정상적으로 검색이 완료됐으면 
        //     if (status === kakao.maps.services.Status.OK) {

        //         var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

        //         // 결과값으로 받은 위치를 마커로 표시합니다
        //         var marker = new kakao.maps.Marker({
        //             map: map,
        //             position: coords
        //         });

        //         // 인포윈도우로 장소에 대한 설명을 표시합니다
        //         var infowindow = new kakao.maps.InfoWindow({
        //             content: `<div style="width:150px;text-align:center;padding:6px 0;"><?=$meeting_place?></div>`
        //         });
        //         infowindow.open(map, marker);

        //         // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
        //         map.setCenter(coords);
        //     } 
        // });    

    </script>

    <!-- -->


</body>

</html>