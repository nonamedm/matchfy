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
            <h2>회원 승인 목록</h2> 

            <table>
                <thead>
                    <tr class="tr">
                        <th class="th num">idx</th>
                        <th class="th">회원명</th>
                        <th class="th">성별</th>
                        <th class="th">닉네임</th>
                        <th class="th">이메일</th>
                        <th class="th">등급</th>
                        <th class="th">유형</th>
                        <th class="th">증명서 확인</th>
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
                            <td class="td"><?= $data['gender'] ?></td>
                            <td class="td"><?= $data['nickname'] ?></td>
                            <td class="td"><?= $data['email'] ?></td>
                            <td class="td"><?= $data['grade'] ?></td>
                            <td class="td"><?= $data['board_type'] ?></td>
                            <td class="td">
                                <span class="attatch_file_div"><a class="attach_file" href="<?= '/' . $data['file_path'] . $data['file_name']; ?>" target="_blank"><?= $data['org_name']; ?></a></span>
                            </td>
                            <td class="td">
                            <?php
                                $exchange_level = $data['extra1'];
                                if ($exchange_level == 'n') {
                                    echo "<button class='member_approve_btn btn00 btn type01' data-id='".$data['id']."' data-approve-level='y'>승인</button>";
                                } elseif ($exchange_level == 'y') {
                                    echo "<button class='member_approve_btn btn00 btn type02'>완료</button>";
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