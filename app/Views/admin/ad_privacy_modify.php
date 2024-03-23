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
        <div class="page_header">
                <ul>
                    <li><a href="#" Onclick="fn_clickList('privacy')"><img src="/static/images/left_arrow.png"></a></li>
                    <li><h2>개인정보처리방침 수정</h2></li>
                </ul>
            </div>
           
            <form action="/ad/privacy/privacyUpdate" method="post">
                <input type="hidden" id="privacy_id" name="privacy_id" value="<?= $privacy['id'] ?>"/>
                <label for="title">제목:</label><br>
                <input type="text" class="temp_input_text" id="title" name="title" value="<?= $privacy['title'] ?>"><br>
                <label for="content">내용:</label><br>
                <textarea id="content" name="content" rows="4" cols="50"><?=htmlspecialchars($privacy['content']); ?></textarea><br><br>
                <input type="submit" class="btn type01 edit" value="수정"/>
            </form>
        </div>
    </div>
</body>
</html>