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
            <h2>회원 계좌이체 승인 목록</h2> 

            <table>
                <thead>
                    <tr class="tr">
                        <th class="th num">idx</th>
                        <th class="th">회원명</th>
                        <th class="th">닉네임</th>
                        <th class="th">이메일</th>
                        <th class="th">추천인 코드</th>
                        <th class="th">현재 등급</th>
                        <th class="th">신청 등급</th>
                        <th class="th">승인 확인</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $index = 1;
                    foreach ($datas as $data): ?>
                        <tr class="tr">
                            <td class="td"><?= $index ?></td>
                            <td class="td"><?= $data['name'] ?></td>
                            <td class="td"><?= $data['nickname'] ?></td>
                            <td class="td"><?= $data['email'] ?></td>
                            <td class="td"><?= $data['recommender_code'] ?></td>
                            <td class="td"><?= $data['grade'] ?></td>
                            <td class="td"><?= $data['temp_grade'] ?></td>
                            <td class="td">
                            <?php
                                if ($data['grade_match'] == 'n') {
                                    echo "<button class='member_payment_btn btn00 btn type01' data-idx='" . $data['idx'] . "' data-approve-level='" . $data['temp_grade'] . "'>승인</button>";
                                } elseif ($data['grade_match'] == 'y') {
                                    echo "<button class='member_payment_btn btn00 btn type02'>완료</button>";
                                }
                                ?>  
                            </td>
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
</body>
</html>