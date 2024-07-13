<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <title>Matchfy 관리자페이지</title>
</head>
<script>
    <?php
    if (session()->has('msg')) {
        echo "alert('" . session('msg') . "');";
    }
    ?>
    $(document).ready(function() {
        mediaRadio();
        introChk();
    });
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
                    <li>
                        <h2>회사소개 - Media 수정</h2>
                    </li>
                </ul>
            </div>

            <form action="/ad/intro/newsUpdate" method="post">
                <input type="hidden" id="news_id" name="news_id" value="<?= $news['id'] ?>" />

                <div class="label_input_text">
                    <label for="title">제목</label>
                    <input type="text" class="temp_input_text" id="title" name="title" value="<?= $news['title'] ?>">
                </div>

                <div class="label_input_text">
                    <label>보도 타입</label>
                    <input type="radio" name="bigo1" id="type01" value="01" <?php if ($news['bigo1'] == "01") echo "checked"; ?>>
                    <label for="type01">언론보도</label>

                    <input type="radio" name="bigo1" id="type02" value="02" <?php if ($news['bigo1'] == "02") echo "checked"; ?>>
                    <label for="type02">보도자료</label>
                </div>

                <div class="label_input_text" id="media_link" style="display:<?php if ($news['bigo1'] == "01") {
                                                                                    echo 'block';
                                                                                } else {
                                                                                    echo 'none';
                                                                                }; ?>;">
                    <label for="link">링크</label>
                    <input type="text" class="temp_input_text" id="link" name="bigo2" value="<?= $news['bigo2'] ?>">
                </div>
                <div class="label_input_text" id="media_content" style="display:<?php if ($news['bigo1'] == "02") {
                                                                                    echo 'block';
                                                                                } else {
                                                                                    echo 'none';
                                                                                }; ?>;">
                    <label for="content">내용</label>
                    <div class="content_text">
                        <textarea id="content" name="content" rows="4" cols="50"><?= htmlspecialchars($news['content']); ?></textarea><br><br>
                        <script type="text/javascript">
                            CKEDITOR.replace('content', {
                                filebrowserUploadUrl: '/ckeditorUpload'
                            });
                        </script>
                    </div>
                </div>



                <input type="submit" class="btn type01 edit" value="수정" />
            </form>
        </div>
    </div>
</body>

</html>