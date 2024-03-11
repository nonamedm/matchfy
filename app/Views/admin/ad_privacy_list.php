<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h2>개인정보처리방침 목록</h2> 
            <input type="button" value="등록" Onclick="fn_EditClick('privacy');"/>
            <?php foreach ($privacys as $privacy): ?>
                <div class="list_li">
                    <a href="/ad/privacy/privacyView/<?= $privacy['id'] ?>">
                        <p><strong><?= $privacy['id'] ?></strong></p>
                        <p><strong><?= $privacy['title'] ?></strong></p>
                        <?php
                            $content = $privacy['content'];
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
                        <input type="button" value="수정" Onclick="fn_clickUpdate('privacy','<?= $privacy['id']?>')"/>
                        <input type="button" value="삭제"  Onclick="fn_clickDelete('<?= $privacy['id']?>','privacy')"/>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>