<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/static/js/jquery.min.js"></script>

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
            <h2>이용약관</h2>
            <input type="button" value="목록으로 돌아가기" Onclick="fn_clickList('terms')"/><br>
            <input type="hidden" id="terms_id" name="terms_id" value="<?= $terms['id'] ?>"/>
            <strong><label for="title">제목:</label></strong><br>
            <p><?= $terms['title'] ?></p><br>
            <strong><label for="content">내용:</label></strong>
            <p><?=nl2br($terms['content']); ?></p>
            <div class="btn-up-del-box">
                <input type="button" value="수정" Onclick="fn_clickUpdate('terms','<?= $terms['id']?>')"/>
                <input type="button" value="삭제"  Onclick="fn_clickDelete('<?= $terms['id']?>','terms')"/>
            </div>

        </div>
    </div>
</body>
</html>