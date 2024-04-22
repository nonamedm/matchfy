<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        
        <?php $title = "이용약관"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="terms_cont">
                    <div class="terms_cont_box">

                        <b><?= $terms['title'] ?></b>
                        <p><?=nl2br($terms['content']); ?></p>
                        <!-- <p>제1조(목적)</p>
                        <p></p>
                        <p>본 약관은 등록한 약관을 보여주는 영역입니다. 약관은 회사마다, 서비스마다 다르기 때문에 사용하시는 약관으로 등록하여 보여주시면 됩니다. </p>
                        <p></p>
                        <p>제2조(용어정의)</p>
                        <p></p>
                        <p>본 약관에서 사용하는 용어의 정의는 다음과 같습니다. </p>
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
            
            <!-- <div class="footer_logo mb40">
                matchfy
            </div>
            <div class="footer_link mb40">
                <a href="#"><?=lang('Korean.companyName')?></a>
                <a href="#"><?=lang('Korean.pravacyName')?></a>
                <a href="#"><?=lang('Korean.serviceName')?></a>
            </div>
            <div class="footer_info mb40">
                <span><?=lang('Korean.footerInfo1')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo2')?></span>
                <span><?=lang('Korean.footerInfo3')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo4')?><img
                        src="/static/images/part_line.png" /> gildong@naver.com</span>
            </div>
            <div class="footer_copy">
                COPYRIGHT 2023. ALL RIGHTS RESERVED.
            </div> -->

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