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
<script>
    <?php
        if(session()->has('msg')) {
            echo "alert('" . session('msg') . "');";
        }
    ?>
</script>
<body>
    <div class="ad_box">
        <div>
            <?php
                include 'header.php';
            ?>
        </div>
        <div class="ad_con">
            <div class="page_header">
                <ul>
                    <li><a href="#" Onclick="fn_clickList('report')"><img src="/static/images/left_arrow.png"></a></li>
                    <li><h2>회원 신고 내용</h2></li>
                </ul>
            </div>
            <input type="hidden" id="report_id" name="report_id" value="<?= $report['idx'] ?>"/>
            <strong><?= $report['member_name'] ?>(신고자) → <?= $report['target_name'] ?>(신고대상)</strong><br>
            <hr>
            <div style="font-size:12px;"><p><?= nl2br($report['report_text']); ?></p></div>
            <div class="btn_up_del_box">
                <input type="button"  class="btn type01" value="<?=lang('Korean.delete')?>" Onclick="fn_clickReportDelete('<?= $report['idx']?>')"/>
            </div>
        </div>
    </div>
</body>
</html>