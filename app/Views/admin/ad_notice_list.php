<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <title>Matchfy 관리자 페이지</title>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">

</head>
<body>
    <div class="ad-box">
        <div>
            <?php
                include 'header.php';
            ?>
        </div>
        <div class="ad-con">
            <h2>공지사항 목록</h2> 
            <input type="button" value="등록" Onclick="fn_EditClick('notice');"/>
            <?php foreach ($datas as $data): ?>
                <div class="list_li">
                    <a href="/ad/notice/noticeView/<?= $data['notice_id']?>">
                        <p><strong><?= $data['notice_id'] ?></strong></p>
                        <p><strong><?= $data['title'] ?></strong></p>
                        <?php
                            $content = $data['content'];
                            $max_length = 30; 

                            if (mb_strlen($content) > $max_length) {
                                $content = mb_substr($content, 0, $max_length);
                                $content = preg_replace('/\s+[^ ]*$/', '', $content);
                                $content = preg_replace('/\r?\n|\r/', '', $content);
                                $content .= '...';
                            }
                        ?>

                        <p><?= $content ?></p>
                        <?php if ($data['file_id']): ?>
                            <span>파일 : <a href="/downloadFile/<?= $data['file_id'] ?>"><?= $data['org_name'] ?></a></span>
                        <?php endif?>
                    </a>    
                    <div class="btn-up-del-box">
                        <input type="button" value="수정" Onclick="fn_clickUpdate('notice','<?= $data['notice_id']?>')"/>
                        <input type="button" value="삭제" Onclick="fn_clickBoFileDelete('<?= $data['notice_id']?>','<?= $data['file_id']?>')"/>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>