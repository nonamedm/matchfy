<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0,  user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->

        <?php $title = "서포터즈 전체 메뉴";
        $prevUrl = "/support/menu";
        include 'spheader.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="terms_cont">
                    <div class="terms_cont_box scroll_body">

                        <b><?= $terms['title'] ?></b>
                        <p><?= nl2br($terms['content']); ?></p>

                    </div>
                </div>
            </div>
        </div>

        <div style="height: 50px;"></div>
        <footer class="footer">

        </footer>
    </div>

</body>

</html>