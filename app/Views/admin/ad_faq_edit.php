<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
            <h2>FAQ 작성</h2>
            <form action="/ad/faq/faqUpload" method="post">
                <label for="title">질문:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="content">답변:</label><br>
                <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>
                <input type="submit" value="등록">
            </form>
        </div>
    </div>
</body>
</html>