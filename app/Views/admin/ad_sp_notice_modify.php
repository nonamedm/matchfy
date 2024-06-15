<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
                    <li><a href="#" Onclick="fn_clickList('spnotice')"><img src="/static/images/left_arrow.png"></a></li>
                    <li><h2>서포터즈 공지사항 수정</h2></li>
                </ul>
            </div>
           
            <form action="/ad/support/noticeUpdate" method="post" enctype="multipart/form-data">
                <input type="hidden" id="notice_id" name="notice_id" value="<?= $notice['id'] ?>"/>
                <input type="hidden" id="notice_id" name="board_type" value="<?= $notice['board_type'] ?>"/>
                <input type="hidden" id="file_id" name="file_id" value="<?= $file['id'] ?>"/>
                <br>
                <label for="title">제목:</label><br>
                <input type="text" id="title" class="temp_input_text" name="title" value="<?= $notice['title'] ?>"><br>
                <label for="content">내용:</label><br>
                <textarea id="content" name="content"><?=htmlspecialchars($notice['content']); ?></textarea><br>
            
                <br>
                <label for="userfile">파일 <?=lang('Korean.selected')?>:</label><br>
                <input type="file" id="userfile" name="userfile"><br>

                <?php if ($file): ?>
                    <span class="attatch_file_div"><a class="attatch_file"><?= $file['org_name'] ?></a></span>
                    <input type="button" value="파일 <?=lang('Korean.delete')?>" Onclick="fn_clickFileDelete('<?= $file['id']?>')"/></p>
                <?php endif; ?>

                <br>
                <input type="submit" value="수정" class="btn_update btn type01 edit"/>
            </form>
        </div>
    </div>
</body>
</html>