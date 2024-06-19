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
            <h2>회원 정보</h2>

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
                        <th class="th">이름</th>
                        <th class="th">닉네임</th>
                        <th class="th">생년월일</th>
                        <th class="th">성별</th>
                        <th class="th">이메일(ID)</th>
                        <th class="th">전화번호</th>
                        <th class="th">등급</th>
                        <th class="th">등급<br />(임시)</th>
                        <th class="th">사진</th>
                        <th class="th">소셜유형</th>
                        <th class="th">최근접속</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    foreach ($datas as $data) : ?>
                        <tr class="tr">
                            <td class="td"><?= $index ?></td>
                            <td class="td"><?= $data['name'] ?></td>
                            <td class="td"><?= $data['nickname'] ?></td>
                            <td class="td"><?= $data['birthday'] ?></td>
                            <td class="td"><?php if ($data['gender'] === '0') {
                                                echo '여';
                                            } else {
                                                echo '남';
                                            } ?></td>
                            <td class="td"><?= $data['email'] ?></td>
                            <td class="td"><?= substr($data['mobile_no'], 0, 3) . "-" . substr($data['mobile_no'], 3, 4) . "-" . substr($data['mobile_no'], 7) ?></td>
                            <td class="td"><?= $data['grade'] ?></td>
                            <td class="td"><?= $data['temp_grade'] ?></td>
                            <td class="td">
                                <span class="attatch_file_div"><a class="attach_file" href="<?= '/' . $data['file_path'] . $data['file_name']; ?>" target="_blank"><?= $data['org_name']; ?></a></span>
                            </td>
                            <td class="td"><?= $data['sns_type'] ?></td>
                            <td class="td"><?= $data['last_access_dt'] ?></td>
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