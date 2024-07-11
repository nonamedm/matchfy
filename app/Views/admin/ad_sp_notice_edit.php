<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <title>Matchfy 관리자페이지</title>
</head>

<body>
    <div class="ad_box">
        <div>
            <?php include 'header.php'; ?>
        </div>
        <div class="ad_con">
            <div class="page_header">
                <ul>
                    <li><a href="#" Onclick="fn_clickList('spnotice')"><img src="/static/images/left_arrow.png"></a></li>
                    <li>
                        <h2>서포터즈 공지사항 작성</h2>
                    </li>
                </ul>
            </div>
            <form action="/ad/support/noticeUpload" method="post" enctype="multipart/form-data">
                <label for="title">제목:</label><br>
                <input type="text" id="title" class="temp_input_text" name="title"><br>
                <label for="content">내용:</label><br>
                <textarea id="content" name="content"></textarea><br>
                <label for="userfile">파일 <?= lang('Korean.selected') ?>:</label><br>
                <input type="file" name="userfile"><br>

                <input class='btn type01 edit' type="submit" value="<?= lang('Korean.registration') ?>">
            </form>
        </div>
    </div>
</body>

</html>