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
</head>
<body>
    <div class="ad_box">
        <div>
            <?php
                include 'header.php';
            ?>
        </div>
        <div class="ad_con">
            <h2>회원 신고 목록</h2> 
            <table>
                <thead>
                    <tr class="tr">
                        <th class="th" style="width:5%;">번호</th>
                        <th class="th" style="width:10%;">신고자</th>
                        <th class="th" style="width:10%;">신고대상</th>
                        <th class="th" style="width:10%;">신고타입</th>
                        <th class="th text_left" style="width:30%;">신고내용</th>
                        <th class="th" style="width:10%;">신고일자</th>
                        <th class="th" style="width:5%;"><?=lang('Korean.delete')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $report): ?>
                        <tr class="tr">
                            <!-- <td class="td text_left">
                                <a href="/ad/privacy/privacyView/<?= $report['idx'] ?>">
                                    <strong><?= $report['report_category'] ?></strong>
                                </a>
                            </td> -->
                            <td class="td"><strong><?= $report['idx']?></strong></td>
                            <td class="td"><?= $report['member_name']?></td>
                            <td class="td"><?= $report['target_name']?></td>
                            <td class="td">
                            <?php
                                $reportType = $report['report_category'];
                                switch($reportType) {
                                    case 0:
                                        echo "기타";
                                        break;
                                    case 1:
                                        echo "욕설";
                                        break;
                                    case 2:
                                        echo "도용";
                                        break;
                                    case 3:
                                        echo "허위계정";
                                        break;
                                    case 4:
                                        echo "잦은불펌";
                                        break;
                                    default:
                                        echo "알 수 없는 타입";
                                }
                            ?>
                            </td>
                            <?php
                                $content = $report['report_text'];
                                $max_length = 30; 

                                if (mb_strlen($content) > $max_length) {
                                    $content = mb_substr($content, 0, $max_length);
                                    $content = preg_replace('/\s+[^ ]*$/', '', $content);
                                    $content = preg_replace('/\r?\n|\r/', '', $content);
                                    $content .= '...';
                                }
                            ?>
                            <td class="td text_left">
                                <a href="/ad/privacy/privacyView/<?= $report['idx'] ?>"><?= $content ?></a>
                            </td>         
                            <td class="td"><?= $report['created_at']?></td>
                            <td class="td">
                                <input type="button" class="btn type01" value="<?=lang('Korean.delete')?>"  Onclick="fn_clickDelete('<?= $report['idx']?>','privacy')"/>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>