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
            <h2>리워드 내역확인</h2> 

            <table>
                <thead>
                    <tr class="tr">
                        <th class="th num">idx</th>
                        <th class="th">회원명</th>
                        <th class="th">이메일</th>
                        
                        <th class="th">리워드 내역</th>
                        <th class="th">발생일자</th>
                        <th class="th">지급확인</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $index = 1;
                    foreach ($datas as $data): ?>
                        <tr class="tr">
                            <td class="td"><?= $index ?></td>
                            <td class="td"><?= $data['name'] ?></td>
                            <td class="td"><?= $data['email'] ?></td>
                            <td class="td">
                                <?= $data['reward_title'] ?><br>
                                <?php
                                    if($data['reward_type']=='meeting'){
                                        echo "<span>인원 </span>".$data['reward_meeting_members']."명";
                                        echo "<span>참석자 동일 비율 </span>".$data['reward_meeting_percent']."%";
                                    }else if($data['reward_type']=='invite'){
                                        echo "<span>초대코드 입력한 분 </span>".$data['recommender_ci']." 님";
                                    }
                                ?>
                        
                            </td>

                            <td class="td"><?= $data['reward_date'] ?></td>
                            <td class="td">
                            <?php
                                $exchange_level = $data['check'];
                                if ($exchange_level == '0') {
                                    echo "<button class='reword_approve_btn btn00 btn type01' data-id='".$data['idx']."' data-approve-level='1'>지급</button>";
                                    echo "<button class='reword_approve_btn btn00 btn type02' data-id='".$data['idx']."' data-approve-level='2'>불가</button>";
                                } elseif ($exchange_level == '1') {
                                    echo "<button class='reword_approve_btn btn00 btn type02'>지급완료</button>";
                                } elseif ($exchange_level == '2') {
                                    echo "<button class='reword_approve_btn btn00 btn type02'>지급불가</button>";
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