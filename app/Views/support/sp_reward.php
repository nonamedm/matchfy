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
function getChkType($chkValue)
{
    $value='';

    if ($chkValue == 0) {
        $value = '확인중';
    } elseif ($chkValue == 1) {
        $value = '지급완료';
    } else {
        $value = '지급불가';
    }
    return $value;
}

function getChkClass($chkValue)
{
    $className='';

    if ($chkValue == 0) {
        $className = 'reward01';
    } elseif ($chkValue == 1) {
        $className = 'reward02';
    } else {
        $className = 'reward03';
    }
    return $className;
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
function getGender($value){
    if($value == 0){
        return "남성";
    }else if($value == 1){
        return "여성";
    }
}
?>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->

        <?php $title = "리워드 내역";
        $prevUrl = "/support/menu";
        include 'spheader.php'; ?>

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
                <?php if (!empty($datas)) : ?>
                    <?php foreach ($datas as $data) : ?>
                        <div class="alliance_sch_list">
                            <div class="alliance_sch_item">
                                <div class="reward_type">
                                    <div class="<?=getChkClass($data['check'])?>"><?= getChkType($data['check'])?></div>
                                    <?php
                                        if($data['reward_type'] != 1){
                                            if($data['reward_type'] == 'meeting'){
                                                echo '<a href="/mo/mypage/group/detail/'.$data['reward_meeting_idx'].'">';    
                                                echo '<img src="/static/images/right_arrow.png" />';
                                                echo '</a>';
                                            }
                                        }
                                    ?>
                                </div>
                                <h2><?= esc($data['reward_title']) ?></h2>
                                <p class=""><?= formatDateTime($data['reward_date']) ?></p>
                                <?php if($data['reward_type'] == 'meeting'){?>
                                    <span class="">
                                        <?= lang('Korean.personnel') ?> <?= esc($data['reward_meeting_members']) ?><?= lang('Korean.people') ?>
                                         |
                                         참석자 동일 비율 <?=number_format($data['reward_meeting_percent'], 0);?>%
                                    </span>
                                <?php }else if($data['reward_type'] == 'invite'){ ?>
                                    <span class=""><?=getGender($data['recommender_gender'])?></span>
                                <?php } ?>
                                
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>데이터가 없습니다.</p>
                <?php endif; ?>
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


    </footer>
    </div>


    <!-- SCRIPTS -->

    <script>
    </script>

    <!-- -->


</body>

</html>