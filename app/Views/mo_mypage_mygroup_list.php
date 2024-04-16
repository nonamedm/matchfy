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
    <script src="/static/js/mygroup.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        <?php $title = "내 모임 관리";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="notice_filter">
                    <select class="small" id="notice_filter">
                        <option value="create_at">등록순</option>
                        <option value="meeting_start_date">빠른 모임순</option>
                        <option value="membership_fee">예약금 낮은 순</option>
                    </select>
                </div>
                <div class="mygroup_list" id="mygroup_list_body">
                    <?php foreach ($meetings as $meeting) : ?>
                        <div class="apply_group_detail">
                            <div class="chk_box meet_delete_chk_box" style="display:none;">
                                <input type="checkbox" class="totAgree" id="totAgree<?= $meeting->meeting_idx ?>" name="chkDefault00">
                                <label class="totAgree_label" for="totAgree<?= $meeting->meeting_idx ?>"></label>
                            </div>
                            <div class="relative-container <?= $meeting->isEnded ? 'grayscale' : '' ?>">
                                <?php if ($meeting->isEnded) : ?>
                                    <div class="ended_overlay">종료</div>
                                <?php endif; ?>
                                <a href="/mo/mypage/group/detail/<?= $meeting->meeting_idx ?>">
                                    <img src="/<?= $meeting->file_path ?><?= $meeting->file_name ?>" />
                                </a>
                            </div>
                            <div class="group_list_item group_apply_item">
                                <div class="group_particpnt" onclick="javascript:meetingMemberList(<?= $meeting->meeting_idx ?>);">
                                    <span>신청 <?= $meeting->meeting_idx_count ?></span>/<?= $meeting->number_of_people ?><?=lang('Korean.people')?>
                                </div>
                                <a href="/mo/mypage/group/detail/<?= $meeting->meeting_idx ?>">
                                    <div class="group_location">
                                        <img src="/static/images/ico_location_16x16.png" />
                                        <?= $meeting->meeting_place ?>
                                    </div>
                                    <p class="group_price"><?= number_format($meeting->membership_fee) ?><?=lang('Korean.won')?></p>
                                    <?php
                                    $date = $meeting->meeting_start_date;
                                    $dayOfWeek = date('w', strtotime($date)); // 요일을 숫자(0~6)로 가져옴

                                    $days = array('일', '월', '화', '수', '목', '금', '토');
                                    $newDate = date('Y.m.d', strtotime($date)) . ' (' . $days[$dayOfWeek] . ') 모임';
                                    ?>
                                    <p class="group_schedule"><?= $newDate ?> </p>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
            // 필터링 옵션
            $('#notice_filter').change(function() {
                var filterOption = $(this).val();
                MymeetingFiltering(filterOption);
            });
        });
    </script>

    <!-- -->


</body>

</html>