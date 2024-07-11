<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
    <script src="/static/js/jquery.min.js"></script>
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
                        <h2>회사소개 - Media </h2>
                    </li>
                </ul>
            </div>

            <input type="hidden" id="news_id" name="news_id" value="<?= $news['id'] ?>" />
            <p>
                <?php
                if ($news['bigo1']) {
                    $typename;
                    $typeclass;
                    if ($news['bigo1'] == '01') {
                        $typename = '언론보도';
                        $typeclass = 'news_type';
                    } else {
                        $typename = '보도자료';
                        $typeclass = 'news_type2';
                    }
                    echo "<b class='news_type " . $typeclass . "'>" . $typename . "</b>";
                }
                ?>
                <strong><?= $news['title'] ?></strong>
            </p>
            <hr>
            <?php
            if ($news['bigo2']) {
            ?>
                <p class="link_btn">
                    <a class="link_btn" href="<?= $news['bigo2'] ?>">해당링크 바로가기</a>
                </p>
            <?php
            }
            ?>
            <div style="font-size:12px;">
                <p><?= $news['content']; ?></p>
            </div>
            <div class="btn_up_del_box">
                <input type="button" class="btn type01" value="수정" Onclick="fn_clickUpdate('news','<?= $news['id'] ?>')" />
                <input type="button" class="btn type02" value="<?= lang('Korean.delete') ?>" Onclick="fn_clickDelete('<?= $news['id'] ?>','news')" />
            </div>

        </div>
    </div>
</body>

</html>