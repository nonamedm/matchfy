<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
    <script src="/static/js/jquery.min.js"></script>

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
        <div class="ad_con" style="scrollbar-width: thin;">
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
                        <th class="th">1차 매칭<button onclick="partyMatch(1)">실행</button></th>
                        <th class="th">2차 매칭<button onclick="partyMatch(2)">실행</button></th>
                        <th class="th">3차 매칭<button onclick="partyMatch(3)">실행</button></th>
                        <th class="th">4차 매칭<button onclick="partyMatch(4)">실행</button></th>
                        <th class="th">수동 매칭</th>
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
                            <td class="td" id="<?= $row['nickname'] ?>"><?= $row['nickname'] ?></td>
                            <td class="td"><?php
                                            if ($partyMemberData1[$row['ci']]) {
                                                foreach ($partyMemberData1[$row['ci']] as $rrow) {
                                                    echo $rrow['your_nickname'] . ' - ' . $rrow['match_score'] . '/' . $rrow['match_score_max'] . '(' . $rrow['match_rate'] . '%)<br/>';
                                                }
                                            }
                                            ?>
                            </td>
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
                            <td class="td">
                                <input id="your_nickname" type="text" placeholder="상대방닉네임 입력" style="width:120px;">
                                <button onclick="partyManualMatch(event)">수동전송</button>
                            </td>
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
    <script>
        $(document).ready(function() {

        });
        const partyMatch = num => {
            $.ajax({
                url: '/ad/partyMngmentTest1',
                type: 'POST',
                data: {
                    'num': num
                },
                async: false,
                success: function(data) {
                    console.log(data)
                    alert(data.msg);
                }
            });
        }

        const partyManualMatch = e => {
            var $button = $(e.target);

            var $parentTd = $button.parent();
            var $tr = $parentTd.parent();
            var my_nickname = $tr.find('td').eq(2).attr('id');
            var your_nickname = $tr.find('input').val();


            $.ajax({
                url: '/ad/partyManualMatch',
                type: 'POST',
                data: {
                    'my_nickname': my_nickname,
                    'your_nickname': your_nickname
                },
                async: false,
                success: function(data) {
                    console.log(data)
                    alert(data.data.nickname + "님에게 메세지 전송 완료")
                }
            });
        }
        /*common alert */
        function fn_alert(msg, loc) {
            var html = '';

            html += '<div class="layerPopup alert middle callAlert">';
            html += '<div class="layerPopup_wrap">';
            html += '<div class="layerPopup_content msmall">';
            html += '<p class="txt">알림</p>';
            html += '<div class="apply_group">';
            html += '<p>' + msg + '</p>';
            html += '</div>';
            html += '<div class="layerPopup_bottom">';
            html += '<div class="btn_group">';
            if (loc) {
                html += '<button class="btn type01" onclick="moveToUrl(\'' + loc + '\')">확인</button>';
            } else {
                html += '<button class="btn type01" onclick="alertClose()">확인</button>';
            }
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            $('body').append(html);
        }
    </script>
</body>

</html>