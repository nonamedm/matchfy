<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <title>Matchfy 관리자페이지</title>
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

            if(answer.trim() == '') {
                alert('답변을 입력해주세요.');
                return false; 
            }
        });
    });
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
            <h2>FAQ 수정</h2>
            <a href="/ad/faq/faqList">목록으로 돌아가기</a>
            <form action="/ad/faq/faqUpdate" method="post">
                <input type="hidden" id="faq_id" name="faq_id" value="<?= $faq['id'] ?>"/>
                <label for="question">질문:</label><br>
                <input type="text" id="question" name="question" value="<?= $faq['title'] ?>"><br>
                <label for="answer">답변:</label><br>
                <textarea id="answer" name="answer" rows="4" cols="50"><?=htmlspecialchars($faq['content']); ?></textarea><br><br>
                <input type="submit" value="수정"/>
            </form>
        </div>
    </div>
</body>
</html>