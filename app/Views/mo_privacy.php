<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <script src="/static/js/basic.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "개인정보처리방침";
        $prevUrl = "/mo/menu";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="terms_cont">
                    <div class="terms_cont_box scroll_body">

                        <b><?= $privacy['title'] ?></b>
                        <p><?= nl2br($privacy['content']); ?></p>
                        <!-- <p>제1조(목적)</p>
                        <p></p>
                        <p>본 약관은 등록한 약관을 보여주는 영역입니다. 약관은 회사마다, 서비스마다 다르기 때문에 사용하시는 약관으로 등록하여 보여주시면 됩니다. </p>
                        <p></p>
                        <p>제2조(용어정의)</p>
                        <p></p>
                        <p>본 약관에서 사용하는 용어의 정의는 <?= lang('Korean.next') ?>과 같습니다. </p>
                        <p>본 약관은 등록한 약관을 보여주는 영역입니다. 약관은 회사마다, 서비스마다 다르기 때문에 사용하시는 약관으로 등록하여 보여주시면 됩니다. </p>
                        <p>본 약관은 등록한 약관을 보여주는 영역입니다. 약관은 회사마다, 서비스마다 다르기 때문에 사용하시는 약관으로 등록하여 보여주시면 됩니다. </p>
                        <p>본 약관은 등록한 약관을 보여주는 영역입니다. 약관은 회사마다, 서비스마다 다르기 때문에 사용하시는 약관으로 등록하여 보여주시면 됩니다. </p>
                        <p></p>
                        <p>제3조 (약관의 효력 및 개정)</p>
                        <p></p>
                        <p>본 약관은 등록한 약관을 보여주는 영역입니다. 약관은 회사마다, 서비스마다 다르기 때문에 사용하시는 약관으로 등록하여 보여주시면 됩니다.</p> -->
                    </div>
                </div>
            </div>
        </div>





        <div style="height: 50px;"></div>
        <footer class="footer">


        </footer>
    </div>


    <!-- SCRIPTS -->

    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->


</body>

</html>