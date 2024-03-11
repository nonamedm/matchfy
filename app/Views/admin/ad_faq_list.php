<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/static/js/jquery.min.js"></script>
    <title>Matchfy 관리자 페이지</title>
    <script src="/static/js/ad_board.js"></script>
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
            <h2>FAQ 목록</h2> 
            <input type="button" value="등록" Onclick="fn_EditClick('faq');"/>
            <?php foreach ($faqs as $faq): ?>
                <div class="list_li">
                    <a href="/ad/faq/faqView/<?= $faq['id'] ?>">
                        <p><strong><?= $faq['id'] ?></strong></p>
                        <p><strong><?= $faq['title'] ?></strong></p>
                        <?php
                            $content = $faq['content'];
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
                    <div class="btn-up-del-box">
                        <input type="button" value="수정" Onclick="fn_clickUpdate('faq','<?= $faq['id']?>')"/>
                        <input type="button" value="삭제"  Onclick="fn_clickDelete('<?= $faq['id']?>','faq')"/>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>