<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <title>Matchfy 관리자페이지</title>
    <script>
    <?php
        if(session()->has('msg')) {
            echo "alert('" . session('msg') . "');";
        }
    ?>

    </script>
</head>
<body>
    <div class="ad-box">
        <div>
            <?php
                include 'header.php';
            ?>
        </div>
        <div class="ad-con">
            <h2>개인정보처리방침 수정</h2>
            <input type="button" value="목록으로 돌아가기" Onclick="fn_clickList('privacy')"/><br>
            <form action="/ad/privacy/privacyUpdate" method="post">
                <input type="hidden" id="privacy_id" name="privacy_id" value="<?= $privacy['id'] ?>"/>
                <label for="title">제목:</label><br>
                <input type="text" id="title" name="title" value="<?= $privacy['title'] ?>"><br>
                <label for="content">내용:</label><br>
                <textarea id="content" name="content" rows="4" cols="50"><?=htmlspecialchars($privacy['content']); ?></textarea><br><br>
                <input type="submit" value="수정"/>
            </form>
        </div>
    </div>
</body>
</html>