<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <script src="/static/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "FAQ";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="notice_filter no_bg">

                </div>
                <div class="notice_wrap">
                    <?php foreach ($faqs as $faq) : ?>
                        <div class="notice_list">
                            <div class="notice_list_label faq_question">
                                <div>
                                    <h2><span class="question">Q</span><?= $faq['title'] ?></h2>
                                </div>
                                <div class="faq_list_icon">
                                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.6569 4.65685L7 10.3137L1.34315 4.65685" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="notice_list_label faq_answer" style="display:none;">
                                <div class="faq_answer">
                                    <h2><span class="answer">A</span></h2>
                                    <div class="">
                                        <p>
                                            <?= nl2br($faq['content']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hoz_part" />
                    <?php endforeach; ?>
                </div>
            </div>
        </div>





        <div style="height: 50px;"></div>
        <footer class="footer">

            <!-- <div class="footer_logo mb40">
                matchfy
            </div>
            <div class="footer_link mb40">
                <a href="#"><?= lang('Korean.companyName') ?></a>
                <a href="#"><?= lang('Korean.pravacyName') ?></a>
                <a href="#"><?= lang('Korean.serviceName') ?></a>
                <a href="#"><?=lang('Korean.supporterName')?></a>
            </div>
            <div class="footer_info mb40">
                <span><?= lang('Korean.footerInfo1') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo2') ?></span>
                <span><?= lang('Korean.footerInfo3') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo4') ?><img
                        src="/static/images/part_line.png" /> gildong@naver.com</span>
            </div>
            <div class="footer_copy">
                COPYRIGHT 2023. ALL RIGHTS RESERVED.
            </div> -->

        </footer>
    </div>


    <!-- SCRIPTS -->

    <script>
        var icon_bf = '<svg width="14" height="14" viewBox="0 0 14 14" fill="none"' +
            'xmlns="http://www.w3.org/2000/svg">' +
            '<path d="M12.6569 9.34315L7 3.68629L1.34315 9.34315" stroke="#999999"' +
            'stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />' +
            '</svg>';

        var icon_af = '<svg width="14" height="12" viewBox="0 0 14 12" fill="none"' +
            'xmlns="http://www.w3.org/2000/svg">' +
            '<path d="M12.6569 4.65685L7 10.3137L1.34315 4.65685" stroke="#999999"' +
            'stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />' +
            '</svg>';

        $(document).ready(function() {
            toggleMenu();
        });

        function toggleMenu() {
            $('.faq_question').click(function() {
                var $answer = $(this).next('.faq_answer');
                if ($answer.is(':visible')) {
                    $answer.slideUp();
                    $(this).children(0).eq(1).html(icon_af);
                } else {
                    $answer.slideDown();
                    $(this).children(0).eq(1).html(icon_bf);
                }
            });
        }
    </script>

    <!-- -->


</body>

</html>