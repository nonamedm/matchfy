<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    $(document).ready(function(){
        $('form').submit(function(){
            var title = $('#title').val();
            var content = $('#content').val();

            if(title.trim() == '') {
                alert('질문을 입력해주세요.');
                return false;
            }

            if(content.trim() === '') {
                alert('답변을 입력해주세요.');
                return false; 
            }
        });
    });
</script>
<body>
<div class="ad-box">
        <div>
            <?php
                include 'header.php';
            ?>
        </div>
        <div class="ad-con">
            <h2>이용약관 작성</h2>
            <a href="/ad/terms/termsList">목록으로 돌아가기</a></br>
            <form action="/ad/terms/termsUpload" method="post">
                <label for="title">제목:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="content">내용:</label><br>
                <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>
                <input type="submit" value="등록">
            </form>
        </div>
    </div>
</body>
</html>