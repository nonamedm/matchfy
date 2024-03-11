<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <script src="/static/js/jquery.min.js"></script>
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
            <h2>공지사항 수정</h2>
            <input type="button" value="목록으로 돌아가기" Onclick="fn_clickList('notice')"/><br>
            <form action="/ad/notice/noticeUpdate" method="post" enctype="multipart/form_data">
                <input type="hidden" id="notice_id" name="notice_id" value="<?= $notice['id'] ?>"/>
                <input type="hidden" id="notice_id" name="board_type" value="<?= $notice['board_type'] ?>"/>
                <input type="hidden" id="file_id" name="file_id" value="<?= $file['id'] ?>"/>
                <br>
                <label for="title">제목:</label><br>
                <input type="text" id="title" name="title" value="<?= $notice['title'] ?>"><br>
                <label for="content">내용:</label><br>
                <textarea id="content" name="content"><?=htmlspecialchars($notice['content']); ?></textarea><br>
            
                <br>
                <label for="userfile">파일 선택:</label><br>
                <input type="file" id="userfile" name="userfile"><br>

                <?php if ($file): ?>
                    <p class="file_org_name"><?= $file['org_name'] ?>
                    <input type="button" value="파일 삭제" Onclick="fn_clickFileDelete('<?= $file['id']?>')"/></p>
                <?php endif; ?>

                <br>
                <input type="submit" value="수정" class="btn_update"/>
            </form>
        </div>
    </div>
</body>
</html>