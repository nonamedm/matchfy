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
                    <li><a href="#" Onclick="fn_clickList('privacy')"><img src="/static/images/left_arrow.png"></a></li>
                    <li>
                        <h2>개인정보처리방침 작성</h2>
                    </li>
                </ul>
            </div>

            <input type="hidden" id="privacy_id" name="privacy_id" value="<?= $privacy['id'] ?>" />
            <strong><?= $privacy['title'] ?></strong><br>
            <hr>
            <div style="font-size:12px;">
                <p><?= nl2br($privacy['content']); ?></p>
            </div>
            <div class="btn_up_del_box">
                <input type="button" value="수정" Onclick="fn_clickUpdate('privacy','<?= $privacy['id'] ?>')" />
                <input type="button" value="<?= lang('Korean.delete') ?>" Onclick="fn_clickDelete('<?= $privacy['id'] ?>','privacy')" />
            </div>

        </div>
    </div>
</body>

</html>