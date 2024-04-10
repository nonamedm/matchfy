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
            <h2>제휴신청 목록</h2> 
            <table>
                <thead>
                    <tr class="tr">
                        <th class="th num">번호</th>
                        <th class="th">대표이름</th>
                        <th class="th">대표핸드폰번호</th>
                        <th class="th">업체이름</th>
                        <th class="th">업체 번호</th>
                        <th class="th">이메일</th>
                        <th class="th">신청 확인</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datas as $data): ?>
                        <tr class="tr">
                            <td class="td"><span id="exc_idx"><?= $data['idx'] ?></span><input id="exc_mci" type="hidden" value="<?=$data['member_ci']?>"/></td>
                            <td class="td"><?= $data['representative_name'] ?></td>
                            <td class="td"><?= $data['representative_contact'] ?></td>
                            <td class="td"><?= $data['company_name'] ?></td>
                            <td class="td"><?= $data['company_contact'] ?></td>
                            <td class="td"><?= $data['email'] ?></td>
                            <td class="td">
                            <?php
                                $exchange_level = $data['alliance_application'];

                                if ($exchange_level == 1) {
                                    echo "<button class='alliancebtn btn00 btn type01'  data-idx='".$data['idx']."' data-alliance-level='2'>승인</button>";
                                } elseif ($exchange_level == 2) {
                                    echo "<button class='alliancebtn btn00 btn type02'>완료</button>";
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