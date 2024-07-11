<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0,  user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
    <script src="/static/js/board.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "서포터즈 공지사항";
        $prevUrl = "/support/menu";
        include 'spheader.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="notice_filter">
                    <?= $data['data2'] ?>
                    <p id="searchDate"><?= $min_date ?> ~ <?= $max_date ?></p>
                </div>
                <div class="notice_wrap">
                    <?php foreach ($datas as $data) : ?>
                        <div class="notice_list">
                            <a href="/support/notice/view/<?= $data['notice_id'] ?>">
                                <div class="notice_list_label">
                                    <div>
                                        <h2><?= $data['title'] ?></h2>
                                        <p><?= $data['created_at'] ?></p>
                                    </div>
                                    <?php if ($data['file_id']) : ?>
                                        <div>
                                            <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.4132 8.67094C14.4736 8.73122 14.5214 8.8028 14.5541 8.88159C14.5868 8.96038 14.6036 9.04484 14.6036 9.13013C14.6036 9.21543 14.5868 9.29989 14.5541 9.37868C14.5214 9.45747 14.4736 9.52905 14.4132 9.58933L7.75653 16.242C6.90435 17.094 5.74859 17.5727 4.5435 17.5726C3.33841 17.5725 2.18271 17.0937 1.33064 16.2416C0.47857 15.3894 -7.60522e-05 14.2336 9.06373e-09 13.0285C7.60703e-05 11.8235 0.478868 10.6678 1.33105 9.81568L9.38399 1.64429C9.99238 1.03525 10.8178 0.69284 11.6786 0.692383C12.5395 0.691927 13.3653 1.03346 13.9743 1.64185C14.5834 2.25025 14.9258 3.07566 14.9262 3.93651C14.9267 4.79736 14.5851 5.62314 13.9768 6.23218L5.92218 14.4036C5.55639 14.7694 5.06028 14.9749 4.54298 14.9749C4.02567 14.9749 3.52956 14.7694 3.16377 14.4036C2.79798 14.0378 2.59248 13.5417 2.59248 13.0244C2.59248 12.5071 2.79798 12.0109 3.16377 11.6452L9.92188 4.77995C9.98108 4.7168 10.0523 4.66613 10.1314 4.63092C10.2105 4.59571 10.2958 4.57667 10.3823 4.57493C10.4689 4.57319 10.5549 4.58877 10.6353 4.62077C10.7158 4.65277 10.789 4.70054 10.8507 4.76126C10.9124 4.82198 10.9613 4.89443 10.9946 4.97434C11.0278 5.05425 11.0448 5.14001 11.0444 5.22657C11.0441 5.31313 11.0264 5.39874 10.9924 5.47837C10.9585 5.558 10.909 5.63003 10.8468 5.69023L4.08784 12.5627C4.02732 12.6228 3.97922 12.6941 3.94629 12.7728C3.91336 12.8514 3.89623 12.9357 3.89589 13.021C3.89555 13.1062 3.91201 13.1907 3.94431 13.2696C3.97662 13.3485 4.02415 13.4202 4.08419 13.4807C4.14422 13.5412 4.21559 13.5893 4.29421 13.6223C4.37284 13.6552 4.45718 13.6723 4.54242 13.6727C4.62767 13.673 4.71214 13.6566 4.79102 13.6242C4.86991 13.5919 4.94166 13.5444 5.00217 13.4844L13.0559 5.31703C13.4217 4.952 13.6275 4.45661 13.628 3.93983C13.6286 3.42306 13.4238 2.92725 13.0588 2.56146C12.6937 2.19567 12.1983 1.98987 11.6816 1.98934C11.1648 1.98881 10.669 2.19359 10.3032 2.55862L2.25187 10.7268C1.95025 11.0279 1.7109 11.3855 1.54748 11.7791C1.38407 12.1728 1.29978 12.5948 1.29944 13.021C1.2991 13.4472 1.38272 13.8693 1.54551 14.2632C1.7083 14.6571 1.94708 15.0151 2.24822 15.3167C2.54936 15.6183 2.90696 15.8577 3.3006 16.0211C3.69424 16.1845 4.11621 16.2688 4.54242 16.2691C4.96864 16.2695 5.39074 16.1858 5.78464 16.0231C6.17854 15.8603 6.53652 15.6215 6.83814 15.3203L13.4957 8.66769C13.6178 8.5465 13.783 8.47876 13.9551 8.47937C14.1272 8.47998 14.292 8.54888 14.4132 8.67094Z" fill="#343330" />
                                            </svg>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
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