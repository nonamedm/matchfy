<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    $(document).ready(function(){
        $('form').submit(function(){
            var question = $('#question').val();
            var answer = $('#answer').val();

            if(question.trim() == '') {
                alert('질문을 입력해주세요.');
                return false;
            }

            if(answer.trim() === '') {
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
            <h2>FAQ 작성</h2>

            <form action="/ad/faq/faqUpload" method="post">
                <label for="question">질문:</label><br>
                <input type="text" id="question" name="question"><br>
                <label for="answer">답변:</label><br>
                <textarea id="answer" name="answer" rows="4" cols="50"></textarea><br><br>
                <input type="submit" value="등록">
            </form>
        </div>
    </div>
</body>
</html>