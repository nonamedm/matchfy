<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <title>Matchfy 관리자페이지</title>
    <style>


    </style>

</head>

<body>
    <div class="ad_box">
        <div>
            <?php
            include 'header.php';
            ?>
        </div>
        <!-- <p>쿼리문: <?php echo $query; ?></p> -->
        <div class="ad_con">
            <h2>파티관리자 기능(매칭)</h2>

            <table>
                <thead>
                    <colgroup>
                        <col width="3%">
                        <col>
                        <col>
                        <col>
                        <col width="3%">
                    </colgroup>
                    <tr class="tr">
                        <th class="th num">idx</th>
                        <th class="th num">이름</th>
                        <th class="th num">닉네임</th>
                        <th class="th">1차 매칭</th>
                        <th class="th">2차 매칭</th>
                        <th class="th">3차 매칭</th>
                        <th class="th">4차 매칭</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    foreach ($memberData as $row) {
                    ?>
                        <tr class="tr">
                            <td class="td"><?= $index ?></td>
                            <td class="td"><?= $row['name'] ?></td>
                            <td class="td"><?= $row['nickname'] ?></td>
                            <td class="td"><?php
                                            if ($partyMemberData1[$row['ci']]) {
                                                foreach ($partyMemberData1[$row['ci']] as $rrow) {
                                                    echo $rrow['your_nickname'] . ' - ' . $rrow['match_score'] . '/' . $rrow['match_score_max'] . '(' . $rrow['match_rate'] . '%)<br/>';
                                                }
                                            }
                                            ?></td>
                            <td class="td"><?php
                                            if ($partyMemberData2[$row['ci']]) {
                                                foreach ($partyMemberData2[$row['ci']] as $rrow) {
                                                    echo $rrow['your_nickname'] . ' - ' . $rrow['match_score'] . '/' . $rrow['match_score_max'] . '(' . $rrow['match_rate'] . '%)<br/>';
                                                }
                                            }
                                            ?></td>
                            <td class="td"><?php
                                            if ($partyMemberData3[$row['ci']]) {
                                                foreach ($partyMemberData3[$row['ci']] as $rrow) {
                                                    echo $rrow['your_nickname'] . ' - ' . $rrow['match_score'] . '/' . $rrow['match_score_max'] . '(' . $rrow['match_rate'] . '%)<br/>';
                                                }
                                            }
                                            ?></td>
                            <td class="td"><?php
                                            if ($partyMemberData4[$row['ci']]) {
                                                foreach ($partyMemberData4[$row['ci']] as $rrow) {
                                                    echo $rrow['your_nickname'] . ' - ' . $rrow['match_score'] . '/' . $rrow['match_score_max'] . '(' . $rrow['match_rate'] . '%)<br/>';
                                                }
                                            }
                                            ?></td>
                        </tr>
                    <?php
                        $index++;
                    } ?>
                </tbody>
            </table>
            <!-- <div class="pagination">
                <?= $pager ?>
            </div> -->
        </div>
    </div>
</body>

</html>