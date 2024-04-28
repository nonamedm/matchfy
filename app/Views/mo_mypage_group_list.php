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
        <mobileheader style="height:44px; display: none;"></mobileheader>

        <?php $title = "매칭모임";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_search">
                    <input type="text" placeholder="<?=lang('Korean.meetplaceholder')?>" />
                    <img src="/static/images/ico_search_18x18.png" class="group_serch_img" />
                </div>
                <div class="group_category">
                    <div class="group_category_all" data-category="">
                        <img src="/static/images/group_category_all.png" />
                        <p><?=lang('Korean.all')?></p>
                    </div>
                    <div class="group_category_1" data-category="01">
                        <img src="/static/images/group_category_1.png" />
                        <p><?=lang('Korean.weekdayMeeting')?></p>
                    </div>
                    <div class="group_category_2" data-category="02">
                        <img src="/static/images/group_category_2.png" />
                        <p><?=lang('Korean.weekdayTrip')?></p>
                    </div>
                    <div class="group_category_3" data-category="03">
                        <img src="/static/images/group_category_3.png" />
                        <p><?=lang('Korean.holiMeeting')?></p>
                    </div>
                    <div class="group_category_4 " data-category="04">
                        <img src="/static/images/group_category_4.png" />
                        <p><?=lang('Korean.holiTrip')?></p>
                    </div>
                </div>
                <div class="group_search_filter">
                    <select class="small" id="groupFilterSelect">
                        <option value="create_at"><?=lang('Korean.registrationOrder')?></option>
                        <option value="meeting_start_date"><?=lang('Korean.quickMeetingOrder')?></option>
                        <option value="membership_fee"><?=lang('Korean.lowestReservationDeposit')?></option>
                    </select>
                    <div class="group_create_btn">
                        <img src="/static/images/ico_btn_plus_8x8.png" />
                        <button class="btn type01 on" onclick="moveToUrl('/mo/mypage/group/create')"><?=lang('Korean.meet')?><?=lang('Korean.registration')?></button>
                    </div>
                </div>
                <div class="group_search_list">
                    <?php foreach ($meetings as $meeting) : ?>
                        <a href="/mo/mypage/group/detail/<?= $meeting['idx'] ?>">
                            <div class="group_list_item">
                                <?php if ($meeting['meeting_idx']) : ?>
                                    <img class="profile_img" src="/<?= $meeting['file_path'] ?><?= $meeting['file_name'] ?>" />
                                <?php else : ?>
                                    <img src="/static/images/group_list_1.png" />
                                <?php endif; ?>

                                <div class="group_particpnt">
                                    <span><?=lang('Korean.application')?> <?= $meeting['count'] ?></span>/<?= $meeting['number_of_people'] ?><?=lang('Korean.people')?>
                                </div>
                                <div class="group_location">
                                    <?= $meeting['title'] ?>
                                </div>
                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    <?= $meeting['meeting_place'] ?>
                                </div>
                                <p class="group_price"><?= number_format($meeting['membership_fee']) ?><?=lang('Korean.won')?></p>
                                <p class="group_schedule"><?= $meeting['meetingDateTime'] ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
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
                <a href="#"><?=lang('Korean.companyName')?></a>
                <a href="#"><?=lang('Korean.pravacyName')?></a>
                <a href="#"><?=lang('Korean.serviceName')?></a>
            </div>
            <div class="footer_info mb40">
                <span><?=lang('Korean.footerInfo1')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo2')?></span>
                <span><?=lang('Korean.footerInfo3')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo4')?><img
                        src="/static/images/part_line.png" /> gildong@naver.com</span>
            </div>
            <div class="footer_copy">
                COPYRIGHT 2023. ALL RIGHTS RESERVED.
            </div> -->

    </footer>
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
            // 카테고리 클릭
            $('.group_category div').click(function() {
                $('.group_category img').removeClass('highlighted');
                $(this).find('img').addClass('highlighted');
                updateMeetingFiltering();
            });

            // 검색 - 돋보기 클릭
            $('.group_serch_img').click(function() {
                updateMeetingFiltering();
            });

            // 검색 - 엔터 키
            $('.group_search input[type="text"]').keypress(function(event) {
                if (event.which == 13) {
                    event.preventDefault();
                    updateMeetingFiltering();
                }
            });

            // 검색창 내용 변경 시
            $('.group_search input[type="text"]').on('input', function() {
                updateMeetingFiltering();
            });

            // 필터링 옵션 변경 시
            $('#groupFilterSelect').change(function() {
                updateMeetingFiltering();
            });

            // 공통
            function updateMeetingFiltering() {
                var selectedCategory = $('.group_category div img.highlighted').closest('div').data('category') || '';
                var searchText = $('.group_search input[type="text"]').val();
                var filterOption = $('#groupFilterSelect').val();
                meetingFiltering(selectedCategory, searchText, filterOption);
            }
        });
    </script>

    <!-- -->


</body>

</html>