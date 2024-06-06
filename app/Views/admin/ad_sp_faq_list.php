<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
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
            <h2>서포터즈 FAQ 목록</h2> 
            <input type="button" class="btn type01 edit" value="<?=lang('Korean.registration')?>" Onclick="fn_EditClick('spfaq');"/>
            
            <?php foreach ($faqs as $faq): ?>
                <div class="notice_list">
                    <a href="/ad/support/faqView/<?= $faq['id'] ?>">
                        <div class="notice_list_label faq_question">
                            <div>
                                <h2><span class="question">Q</span><?= $faq['title'] ?></h2>
                            </div>
                        </div>
                        <div class="notice_list_label faq_answer" style="">
                            <div class="faq_answer">
                                <h2><span class="answer">A</span></h2>
                                <div class="">
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
                                    <p><?= $content; ?></p><br>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="btn_up_del_box">
                        <input type="button" class="btn type01" value="수정" Onclick="fn_clickUpdate('spfaq','<?= $faq['id']?>')"/>
                        <input type="button" class="btn type02" value="<?=lang('Korean.delete')?>"  Onclick="fn_clickDelete('<?= $faq['id']?>','spfaq')"/>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>