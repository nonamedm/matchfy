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
                    <li><a href="#" Onclick="fn_clickList('news')"><img src="/static/images/left_arrow.png"></a></li>
                    <li><h2>이용약관 수정</h2></li>
                </ul>
            </div>
            
            <form action="/ad/intro/newsUpdate" method="post">
                <input type="hidden" id="news_id" name="news_id" value="<?= $news['id'] ?>"/>
                <label for="title">제목:</label><br>
                <input type="text" class="temp_input_text" id="title" name="title" value="<?= $news['title'] ?>"><br>
                <label for="bigo1">보도 타입:</label><br>
                <input type="text" class="temp_input_text" id="bigo1" name="bigo1" value="<?= $news['bigo1'] ?>"><br>
                <label for="content">링크:</label><br>
                <input name="content" class="temp_input_text" vlaue="<?=$news['content']?>"><br>
                <input type="submit" class="btn type01 edit" value="수정"/>
            </form>
        </div>
    </div>
</body>
</html>