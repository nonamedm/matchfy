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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        <header>

            <div class="menu">
                <ul>
                    <li class="left_arrow">
                        <img src="/static/images/left_arrow.png" />
                    </li>
                    <li class="header_title">
                        준회원 프로필
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_title">
                    <h2><span>사진</span> 추가등록 또는<br><span>동영상</span>프로필 등록.</h2>
                </div>
                <form class="main_signin_form" method="post" action="/mo/signinType" enctype="multipart/form-data">
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label">사진 (1장 이상 필수)</h4>
                                <div class="profile_photo_div">
                                    <label for="profile_photo" class="signin_label profile_photo_input"></label>
                                    <input id="profile_photo" name="profile_photo" type="file" value="" placeholder=""
                                        multiple accept="image/*">
                                    <div id="profile_photo_view" class="profile_photo_view">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label">동영상 프로필 (권장)</h4>
                                <div class="profile_photo_div">
                                    <label for="profile_mov" class="signin_label profile_photo_input"></label>
                                    <input id="profile_mov" name="profile_mov" type="file" value="" placeholder=""
                                        multiple>
                                    <div id="profile_mov_view" class="profile_mov_view">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="mobile_no" value="<?php echo $postData['mobile_no'] ?>" />
                        <input type="hidden" name="ci" value="<?php echo $postData['ci'] ?>" />
                        <input type="hidden" id="file_path" name="file_path"
                            value="<?php echo $postData['file_path'] ?>" />
                        <input type="hidden" id="file_name" name="file_name"
                            value="<?php echo $postData['file_name'] ?>" />
                        <div id="profile_photo_uploaded" style="display:none;"></div>
                        <div id="profile_mov_uploaded" style="display:none;"></div>
                        <div class="btn_group multy">
                            <button type="button" class="btn type02">건너뛰기</button>
                            <button type="submit" class="btn type01">저장</button>
                        </div>
                    </div>
                </form>
            </div>
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
        $(document).ready(function () {
            editPhotoListListner();
        });        
    </script>

    <!-- -->


</body>

</html>