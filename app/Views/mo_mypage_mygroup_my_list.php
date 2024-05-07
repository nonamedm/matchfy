<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
    <script src="/static/js/mygroup.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>
<?php
function getDday($endDate, $startDate, $deleteYn)
{
    $currentTimestamp = time();
    $endDateTimestamp = strtotime($endDate);
    $startDateTimestamp = strtotime($startDate);
    $dday = '';

    if ($deleteYn == 'N' || $deleteYn == 'n') {
        if ($currentTimestamp > $endDateTimestamp) {
            $dday = '종료';
        } elseif ($currentTimestamp < $startDateTimestamp) {
            $timeDiff = $startDateTimestamp - $currentTimestamp + (24 * 60 * 60); // 하루를 느리게 계산
            $days = floor($timeDiff / (60 * 60 * 24));
            if ($days == 1) {
                $dday = '내일';
            } else if ($days == 0) {
                $dday = '당일';
            } else {
                $dday = $days . '일전';
            }
        } else {
            $timeDiff = $endDateTimestamp - $currentTimestamp;
            $days = floor($timeDiff / (60 * 60 * 24));
            if ($days == 1) {
                $dday = '내일';
            } else if ($days == 0) {
                $dday = '당일';
            } else {
                $dday = $days . '일전';
            }
        }
    } else {
        $dday = '취소';
    }

    return $dday;
}
function getClass($endDate, $deleteYn)
{
    $currentTimestamp = time();
    $endDateTimestamp = strtotime($endDate);
    $dday = '';

    if ($deleteYn == 'N' || $deleteYn == 'n') {
        if ($currentTimestamp > $endDateTimestamp) {
            $dday = 'finish';
        } else {
            $dday = '';
        }
    } else {
        $dday = 'cancel';
    }

    return $dday;
}
function formatDateTime($value)
{
    $date = new DateTime($value);
    $daysOfWeek = ['일', '월', '화', '수', '목', '금', '토'];

    $month = $date->format('n');
    $day = $date->format('j');
    $hour = $date->format('G');
    $minute = $date->format('i');
    $dayOfWeekIndex = $date->format('w');
    $dayOfWeek = $daysOfWeek[$dayOfWeekIndex];

    // $ampm = $hour >= 12 ? '오후' : '오전';

    $hour = $hour % 12;
    $hour = $hour ? $hour : 12;

    $formattedDateTime = $month . '.' . $day . ' (' . $dayOfWeek . ') ' . ' ' . $hour . ':'  . $minute;

    return $formattedDateTime;
}
?>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->

        <?php $title = "내 모임";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="notice_filter">
                    <!-- <p>09.01 ~ 09.30</p> -->
                    <select id="mygroup_order">
                        <option value="all"><?= lang('Korean.all') ?></option>
                        <option value="latest"><?= lang('Korean.recent') ?></option>
                    </select>
                </div>
                <div class="mygroup_list" id="mygroup_list_body">
                    <?php foreach ($meetings as $meeting) : ?>
                        <?php $today = date('Y-m-d'); ?>
                        <div class="alliance_sch_list" onclick="javascript:MygroupPopup(<?= $meeting->meeting_idx ?>,'cancel_rsv_<?= $meeting->meeting_idx ?>','<?= $meeting->meeting_master ?>')">
                            <div class="alliance_sch_item">
                                <div class="alliance_sch_sts">
                                    <div class="<?= getClass($meeting->meeting_end_date, $meeting->delete_yn) ?>" id="cancel_rsv_<?= $meeting->meeting_idx ?>"><?= getDday($meeting->meeting_end_date, $meeting->meeting_start_date, $meeting->delete_yn) ?></div>
                                    <?php if ($meeting->meeting_end_date > $today) : ?>
                                        <img src="/static/images/right_arrow.png" />
                                    <?php endif; ?>
                                </div>
                                <h2><?= $meeting->meeting_place ?></h2>
                                <p class=""><?= formatDateTime($meeting->meeting_start_date) ?></p>
                                <span class=""><?= lang('Korean.personnel') ?> <?= $meeting->meeting_idx_count ?><?= lang('Korean.people') ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="">3일전</div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="">1일전</div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="finish"><?= lang('Korean.close') ?></div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="finish"><?= lang('Korean.close') ?></div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div>
                <div class="alliance_sch_list">
                    <div class="alliance_sch_item">
                        <div class="alliance_sch_sts">
                            <div class="finish"><?= lang('Korean.close') ?></div>
                            <img src="/static/images/right_arrow.png" />
                        </div>
                        <h2>레드버튼 (이수점)</h2>
                        <p class="">12.8 (금) 11:00</p>
                        <span class=""><?= lang('Korean.personnel') ?> 2<?= lang('Korean.people') ?></span>
                    </div>
                </div> -->
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
                <a href="#"><?=lang('Korean.supporterName')?></a>
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
    </script>

    <!-- -->


</body>

</html>