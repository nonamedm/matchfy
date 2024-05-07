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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/static/js/meeting_member.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "매칭모임";
        include 'header.php'; ?>
        <?php $word_file_path = APPPATH . 'Data/MeetingCode.php';
        require($word_file_path); ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_deatil_img">
                    <?php if ($image) : ?>
                        <img src="/<?= $image['file_path'] ?><?= $image['file_name'] ?>" />
                    <?php else : ?>
                        <img src="/static/images/group_deatil.png" />
                    <?php endif; ?>
                </div>
                <div class="group_detail_info">
                    <div class="group_detail_header" style="margin-top: 10px;">
                        <div class="group_detail_type"><?php foreach ($categoryCode as $item) {
                                                            if ($item['value'] === $category) {
                                                                echo $item['name'];
                                                            }
                                                        }
                                                        ?><?php $postData ?></div>
                        <!-- <p><?= lang('Korean.matchingRate') ?> <span><?= $matching_rate ?>%</span></p> -->
                    </div>
                    <div class="group_detail_title">
                        <h2><?= $meeting_title ?></h2>
                        <p class="group_detail_period"><?= $recruitment_start_date ?> ~ <?= $recruitment_end_date ?> <?= lang('Korean.dateCon') ?></p>
                        <p class="group_detail_schedule"><?= $meeting_start_date ?> <?= lang('Korean.meet') ?></p>
                        <div style="display:flex;">
                            <div class="group_particpnt" onclick="meetingMemberList('<?= $idx ?>')">
                                <span><?= lang('Korean.application') ?> <?= $meeing_count ?></span>/<?= $number_of_people ?><?= lang('Korean.people') ?>
                            </div>
                            <div class="share_btn"><img src="/static/images/share_icon.png"/></div>
                        </div>
                    </div>
                    <hr class="hoz_part" />
                    <div class="group_detail_cont">
                        <?= $content ?>
                        <div class="group_detail_location">
                            <!-- <div>
                                <img src="/static/images/group_location_detail.png" />
                            </div> -->
                            <div style="padding: 10px;">
                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    <?= $meeting_place ?>
                                </div>
                                <p class="group_location_schedule"><?= $meeting_start_date ?></p>
                                <p class="group_location_fee"><span><?= number_format($membership_fee) ?><?= lang('Korean.won') ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="group_detail_map">
                        <h2><?= lang('Korean.meetingPlace') ?></h2>
                        <div id="map" style="width:100%;height:175px;margin-top: 20px;"></div>
                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">
                <div class="btn_group">
                    <?php if ($is_recruitment_full) : ?>
                        <button type="button" class="btn type01 disabled"><?= lang('Korean.recruitmentDeadline') ?></button>
                    <?php else : ?>
                        <button type="button" class="btn type01" onclick="meetingApplication('<?= $idx ?>')"><?= lang('Korean.withBtn') ?></button>
                    <?php endif; ?>
                </div>
            </footer>
        </div>
    </div>


    <!-- SCRIPTS -->

    <script type="text/javascript" src="https://oapi.map.naver.com/openapi/v3/maps.js?ncpClientId=smqlge9tsx&callback=initMap&submodules=geocoder"></script>
    <script type="text/javascript">
        var map = null;

        function initMap() {
            // todo: 로딩화면 호출
            naver.maps.Service.geocode({
                address: '<?= $meeting_place ?>'
            }, function(status, response) {
                if (status === naver.maps.Service.Status.ERROR) {
                    console.log('올바른 주소를 입력해 주세요');
                }
                // 성공 시의 response 처리
                // todo: 로딩화면 종료
                map = new naver.maps.Map('map', {
                    center: new naver.maps.LatLng(response.result.items[0].point.y, response.result.items[0].point.x),
                    zoom: 18
                });
                var marker = new naver.maps.Marker({
                    position: new naver.maps.LatLng(response.result.items[0].point.y, response.result.items[0].point.x),
                    map: map
                });
            });
        }
    </script>

    <!-- -->


</body>

</html>