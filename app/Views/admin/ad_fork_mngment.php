<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <script src="/static/js/basic.js"></script>
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
            <h2>포크 기능 onoff</h2>

            <table>
                <thead>
                    <colgroup>
                        <col width="3%">
                        <col>
                        <col>
                        <col>
                        <col width="3%">
                        <col width="3%">
                        <col width="3%">
                        <col>
                        <col>
                        <col width="3%">
                        <col width="3%">
                    </colgroup>
                    <tr class="tr">
                        <th class="th num">idx</th>
                        <th class="th">미팅명</th>
                        <th class="th">현재상태</th>
                        <th class="th">변경</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    foreach ($datas as $data) : ?>
                        <tr class="tr">
                            <td class="td"><?= $data['idx'] ?></td>
                            <td class="td"><?= $data['title'] ?></td>
                            <td class="td"><?php if (!$data['onoff']) {
                                                echo 'off';
                                            } else {
                                                echo ($data['onoff']);
                                            } ?></td>
                            <td class="td" style="cursor:pointer;" onclick="changeOnoff(<?= $data['idx'] ?>)">변경하기</td>
                        </tr>
                    <?php
                        $index++;
                    endforeach; ?>
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
        const changeOnoff = (num) => {
            $.ajax({
                url: '/ajax/changeOnoff',
                type: 'POST',
                data: {
                    "num": num
                },
                async: false,
                success: function(data) {
                    console.log(data);
                    if (data.status === 'success') {
                        // 성공
                        moveToUrl('/ad/forkMngment');
                    } else if (data.status === 'error') {
                        console.log('실패', data);
                    } else {
                        fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function(data, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }
    </script>
</body>

</html>