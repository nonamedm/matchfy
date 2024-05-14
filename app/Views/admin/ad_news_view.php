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
                    <li><a href="#" Onclick="fn_clickList('news')"><img src="/static/images/left_arrow.png"></a></li>
                    <li><h2>이용약관</h2></li>
                </ul>
            </div>

            <input type="hidden" id="news_id" name="news_id" value="<?= $news['id'] ?>"/>
            <strong><?= $news['title'] ?></strong><br>
            <hr>
            <div style="font-size:12px;"><p><?= nl2br($news['content']); ?></p></div>
            <div class="btn_up_del_box">
                <input type="button" value="수정" Onclick="fn_clickUpdate('news','<?= $news['id']?>')"/>
                <input type="button" value="<?=lang('Korean.delete')?>"  Onclick="fn_clickDelete('<?= $news['id']?>','news')"/>
            </div>

        </div>
    </div>
</body>
</html>