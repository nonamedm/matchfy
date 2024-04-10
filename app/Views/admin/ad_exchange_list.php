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
        <div class="ad_con">
            <h2>환전신청 목록</h2> 
            <table>
                <thead>
                    <tr class="tr">
                        <th class="th num">번호</th>
                        <th class="th">이름</th>
                        <th class="th">핸드폰번호</th>
                        <th class="th">환전금액</th>
                        <th class="th">은행</th>
                        <th class="th">계좌번호</th>
                        <th class="th">환전신청 상황</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datas as $data): ?>
                        <tr class="tr">
                            <td class="td"><span id="exc_idx"><?= $data['idx'] ?></span><input id="exc_mci" type="hidden" value="<?=$data['member_ci']?>"/></td>
                            <td class="td"><?= $data['name'] ?></td>
                            <td class="td"><?= $data['mobile_no'] ?></td>
                            <td class="td"><?= $data['point_exchange'] ?></td>
                            <td class="td"><?= $data['bank'] ?></td>
                            <td class="td"><?= $data['bank_number'] ?></td>
                            <td class="td">
                            <?php
                                $exchange_level = $data['exchange_level'];

                                if ($exchange_level == 0) {
                                    echo "<button class='exchangebtn btn00 btn type01' data-idx='".$data['idx']."' data-exchange-level='1'>승인</button>";
                                } elseif ($exchange_level == 1) {
                                    echo "<button class='exchangebtn btn00 btn type02'  data-idx='".$data['idx']."' data-exchange-level='2'>완료</button>";
                                } elseif ($exchange_level == 2) {
                                    echo "<span class='exc_text'>환전완료</span>";
                                }
                                ?>  
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>  
        </div>
    </div>
</body>
</html>