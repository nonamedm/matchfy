<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    $(document).ready(function(){
        $('form').submit(function(){
            var title = $('#title').val();
            var content = $('#content').val();

            if(title.trim() == '') {
                alert('질문을 입력해주세요.');
                return false;
            }

            if(content.trim() == '') {
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
            <h2>공지사항</h2>
                <a href="/ad/notice/noticeList">목록으로 돌아가기</a>
                <input type="hidden" id="notice_id" name="notice_id" value="<?= $notice['id'] ?>"/>
                <label for="title">제목:</label><br>
                <p><?= $notice['title'] ?></p><br>
                <label for="content">내용:</label><br>
                <p><?=nl2br($notice['content']); ?></p>
                <?php
                    if($notice['title']!=''){
                        echo '<a href="/ad/notice/noticeModify/'. $notice['id'] .'">수정</a>';
                    }else{
                        echo '<a href="/ad/notice/noticeEdit/">등록</a>';
                    }
                
                ?>
                
            
        </div>
    </div>
</body>
</html>