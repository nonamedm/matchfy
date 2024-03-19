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
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 1rem auto;
            border: 1px solid #ddd;
            background-color: white;
            }

            /* 테이블 행 */
            th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            text-align: center;
            }

            th {
            background-color: #eee;
            color: #333;
            }

            /* 테이블 비율 */
            th,td{
                width:13%;
            }
            td:nth-child(8){
                width:21%;
                display: flex;
            }
            th{
                font-size: 13px;
                font-weight: 300;
            }
            td{
                font-size: 12px;
            }
            .btn00{
                width: 40px;
                height: 30px;
                font-size: 13px;
                background: #fff;
                color:#fff;
            }
            .ad_btn001{
                background-color: #5e97ed;
                border: 1px solid #ddd;
            }
            
            .ad_btn002{
                background-color: #212121;
                border: 1px solid #ddd;
            }

            .ad_btn003{
                background-color: #f98171;
                border: 1px solid #ddd;
            }

            .exc_text{
                font-weight: 900;
            }

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
                    <tr>
                        <th>번호</th>
                        <th>이름</th>
                        <th>핸드폰번호</th>
                        <th>환전금액</th>
                        <th>은행</th>
                        <th>계좌번호</th>
                        <th>환전신청 상황</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datas as $data): ?>
                        <tr>
                            <td><span id="exc_idx"><?= $data['idx'] ?></span><input id="exc_mci" type="hidden" value="<?=$data['member_ci']?>"/></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['mobile_no'] ?></td>
                            <td><?= $data['point_exchange'] ?></td>
                            <td><?= $data['bank'] ?></td>
                            <td><?= $data['bank_number'] ?></td>
                            <td>
                            <?php
                                $exchange_level = $data['exchange_level'];

                                if ($exchange_level == 0) {
                                    echo "<button class='btn00 ad_btn001' data-idx='".$data['idx']."' data-exchange-level='1'>승인</button>";
                                } elseif ($exchange_level == 1) {
                                    echo "<span class='exc_text' style='margin-right:10px;'>진행중</span><button class='btn00 ad_btn003'  data-idx='".$data['idx']."' data-exchange-level='2'>완료</button>";
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