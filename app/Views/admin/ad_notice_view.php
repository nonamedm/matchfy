<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <title>Matchfy 관리자페이지</title>

</head>
<body>
    <div class="ad-box">
        <div>
            <?php
                include 'header.php';
            ?>
        </div>
        <div class="ad-con">
            <h2>공지사항</h2>
            <input type="button" value="목록으로 돌아가기" Onclick="fn_clickList('notice')"/></br>
            <input type="hidden" id="notice_id" name="notice_id" value="<?= $notice['id'] ?>"/>
            <strong><label for="title">제목:</label></strong><br>
            <p><?= $notice['title'] ?></p><br>
            <strong><label for="content">내용:</label></strong><br>
            <p><?= nl2br($notice['content']); ?></p>
            <?php if ($file): ?>
                <p><strong>파일 : </strong><a href="/downloadFile/<?= $file['id'] ?>"><?= $file['org_name'] ?></a></p>
            <?php endif?>
            <div class="btn-up-del-box">
                <input type="button" value="삭제" Onclick="fn_clickBoFileDelete('<?= $notice['id']?>','<?= $file['id']?>')"/>
                <input type="button" value="수정" Onclick="fn_clickUpdate('notice','<?= $notice['id']?>')"/>
            </div>
        </div>
    </div>
</body>
</html>