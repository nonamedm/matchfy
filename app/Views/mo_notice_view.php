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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/static/js/board.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        <header>

            <div class="menu">
                <ul>
                    <li class="left_arrow" >
                        <a href="/mo/notice">
                            <img src="/static/images/left_arrow.png" />
                        </a>
                    </li>
                    <li class="header_title">
                        공지사항
                    </li>
                </ul>
            </div>

        </header>

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
                    <?php if ($file): ?>    
                        <div class="attatch_file_div">
                            <a class="attatch_file" href="/downloadFile/<?= $file['id'] ?>"><?= $file['org_name'] ?><?= $data['org_name'] ?></a>
                        </div>
                    <?php endif?>
                        
                </div>
            </div>
            <div style="height: 50px;"></div>
                <footer class="footer">
                
                <div class="btn_group">
                    <button type="button" class="btn type01" onclick="fn_clickList('notice');">목록으로</button>
                </div>
            </footer>
        </div>





        <div style="height: 50px;"></div>
<footer class="footer">
            
            <!-- <div class="footer_logo mb40">
                matchfy
            </div>
            <div class="footer_link mb40">
                <a href="#">회사정보</a>
                <a href="#">개인정보 처리방침</a>
                <a href="#">서비스 이용약관</a>
            </div>
            <div class="footer_info mb40">
                <span>(주)회사명 <img src="/static/images/part_line.png" /> 서울특별시 강남구 논현로 9길 26 길동빌딩 502호</span>
                <span>대표이사 : 홍길동 <img src="/static/images/part_line.png" /> 사업자등록번호 : 123-45-6789<img
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