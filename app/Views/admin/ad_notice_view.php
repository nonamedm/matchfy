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
                    <li><a href="#" Onclick="fn_clickList('notice')"><img src="/static/images/left_arrow.png"></a></li>
                    <li><h2>공지사항 작성</h2></li>
                </ul>
            </div>
            <input type="hidden" id="notice_id" name="notice_id" value="<?= $notice['id'] ?>"/>
            <strong><?= $notice['title'] ?></strong><br>
            <hr>
            <div style="font-size:12px;"><p><?= nl2br($notice['content']); ?></p></div>
            <?php if ($file): ?>
                <span class="attatch_file_div"><a class="attatch_file" href="/downloadFile/<?= $file['id'] ?>"><?= $file['org_name'] ?></a></span>
                
            <?php endif?>
            <div class="btn_up_del_box">
                <input type="button"  class="btn type02" value="<?=lang('Korean.delete')?>" Onclick="fn_clickBoFileDelete('<?= $notice['id']?>','<?= $file['id']?>')"/>
                <input type="button"  class="btn type01" value="수정" Onclick="fn_clickUpdate('notice','<?= $notice['id']?>')"/>
            </div>
        </div>
    </div>
</body>
</html>