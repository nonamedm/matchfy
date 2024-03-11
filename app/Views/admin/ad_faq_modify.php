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
            <h2>FAQ 수정</h2>
            <input type="button" value="목록으로 돌아가기" Onclick="fn_clickList('faq')"/><br>
            <form action="/ad/faq/faqUpdate" method="post">
                <input type="hidden" id="faq_id" name="faq_id" value="<?= $faq['id'] ?>"/>
                <label for="title">질문:</label><br>
                <input type="text" id="title" name="title" value="<?= $faq['title'] ?>"><br>
                <label for="content">답변:</label><br>
                <textarea id="content" name="content" rows="4" cols="50"><?=htmlspecialchars($faq['content']); ?></textarea><br><br>
                <input type="submit" value="수정"/>
            </form>
        </div>
    </div>
</body>
</html>