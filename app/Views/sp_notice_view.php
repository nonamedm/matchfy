<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/static/js/board.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "서포터즈 공지사항";
        $prevUrl = "/support/notice";
        include 'spheader.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="notice_wrap">
                    <div class="notice_list">
                        <div class="notice_view_label">
                            <div>
                                <h2><?= $notice['title'] ?></h2>
                                <p><?= $notice['created_at'] ?></p>
                            </div>
                        </div>
                    </div>
                    <hr class="hoz_part">
                    <div class="notice_cont">
                        <p><?= $notice['content'] ?></p>

                    </div>
                    <hr class="hoz_part">
                    <?php if ($file) : ?>
                        <div class="attatch_file_div">
                            <a class="attatch_file" href="/downloadFile/<?= $file['id'] ?>"><?= $file['org_name'] ?><?= $data['org_name'] ?></a>
                        </div>
                    <?php endif ?>

                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="btn_group">
                    <button type="button" class="btn type01" onclick="fn_clickList('spnotice');"><?= lang('Korean.btnList') ?></button>
                </div>
            </footer>
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