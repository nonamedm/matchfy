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
            <h2>이용약관 수정</h2>
            <input type="button" value="목록으로 돌아가기" Onclick="fn_clickList('terms')"/><br>
            <form action="/ad/terms/termsUpdate" method="post">
                <input type="hidden" id="terms_id" name="terms_id" value="<?= $terms['id'] ?>"/>
                <label for="title">제목:</label><br>
                <input type="text" id="title" name="title" value="<?= $terms['title'] ?>"><br>
                <label for="content">내용:</label><br>
                <textarea id="content" name="content" rows="4" cols="50"><?=htmlspecialchars($terms['content']); ?></textarea><br><br>
                <input type="submit" value="수정"/>
            </form>
        </div>
    </div>
</body>
</html>