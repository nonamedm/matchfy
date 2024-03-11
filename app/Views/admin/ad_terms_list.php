<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/static/js/ad_board.js"></script>
    <script src="/static/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <title>Matchfy 관리자페이지</title>
</head>
<body>
    <div class="ad_box">
        <div>
            <?php
                include 'header.php';
            ?>
        </div>
        <div class="ad_con">
            <h2>이용약관 목록</h2> 
            <input type="button" value="등록" Onclick="fn_EditClick('terms');"/><br>
            <?php foreach ($termss as $terms): ?>
                <div class="list_li">
                    <a href="/ad/terms/termsView/<?= $terms['id'] ?>">
                        <p><strong><?= $terms['id'] ?></strong>
                        <p><strong><?= $terms['title'] ?></strong></p>
                        <?php
                            $content = $terms['content'];
                            $max_length = 30; 

                            if (mb_strlen($content) > $max_length) {
                                $content = mb_substr($content, 0, $max_length);
                                $content = preg_replace('/\s+[^ ]*$/', '', $content);
                                $content = preg_replace('/\r?\n|\r/', '', $content);
                                $content .= '...';
                            }
                        ?>

                        <p><?= $content ?></p>
                    </a>
                    <div class="btn_up_del_box">
                        <input type="button" value="수정" Onclick="fn_clickUpdate('terms','<?= $terms['id']?>')"/>
                        <input type="button" value="삭제"  Onclick="fn_clickDelete('<?= $terms['id']?>','terms')"/>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>