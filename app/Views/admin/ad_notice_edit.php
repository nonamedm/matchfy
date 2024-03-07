<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matchfy 관리자페이지</title>
    <!-- CKEditor 스크립트 및 스타일 시트 추가 -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <!-- jQuery 스크립트 추가 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="ad-box">
        <div>
            <?php include 'header.php'; ?>
        </div>
        <div class="ad-con">
            <h2>공지사항 작성</h2>
            <a href="/ad/notice/noticeList">목록으로 돌아가기</a><br>
            <!-- 파일 업로드 폼 -->
            <form action="/ad/notice/noticeUpload" method="post" enctype="multipart/form-data">
                <label for="title">제목:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="content">내용:</label><br>
                <!-- CKEditor를 사용하는 content 입력란 -->
                <textarea id="content" name="content"></textarea><br>
                <label for="userfile">파일 선택:</label><br>
                <input type="file" name="userfile"><br>
                <input type="submit" value="등록">
            </form>
        </div>
    </div>

    <!-- CKEditor 스크립트 초기화 -->
    <script>
        // CKEditor 초기화
        // CKEDITOR.replace('content');

        // 폼 제출 전 유효성 검사
        $(document).ready(function(){
            $('form').submit(function(){
                var title = $('#title').val();
                var content = $('#content').val();

                if(title.trim() == '') {
                    alert('제목을 입력해주세요.');
                    return false;
                }

                if(content.trim() === '') {
                    alert('내용을 입력해주세요.');
                    return false; 
                }
            });
        });
    </script>
</body>
</html>