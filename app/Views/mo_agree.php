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
                        약관동의
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_title">
                    <h2><span>매치파이</span>가 처음이시군요<br />약관 내용에 동의해주세요.</h2>
                </div>
                <form class="" method="post" action="/mo/signin">
                    <legend></legend>
                    <div class="login_box">
                        <div class="chk_box">
                            <input type="checkbox" id="totAgree" name="" checked="">
                            <label class="totAgree_label" for="totAgree">네, 모두 동의합니다</label>
                        </div>
                        <hr class="hoz_part" />
                        <div class="agree_cont">
                            <div class="chk_box">
                                <input type="checkbox" id="agree1" name="agree1" checked="">
                                <label class="agree_cont_label" for="agree1">이용약관 <span>(필수)</span></label>
                            </div>
                            <textarea placeholder="<?php echo $mobile_no ?>"></textarea>
                            <div class="chk_box">
                                <input type="checkbox" id="agree2" name="agree2" checked="">
                                <label class="agree_cont_label" for="agree2">개인정보 수집 이용 동의 <span>(필수)</span></label>
                            </div>
                            <textarea placeholder="<?php echo $name ?>"></textarea>
                            <div class="chk_box">
                                <input type="checkbox" id="agree3" name="agree3" checked="">
                                <label class="agree_cont_label" for="agree3">개인정보 제3자 제공동의 <span>(필수)</span></label>
                            </div>
                            <textarea placeholder="<?php echo $birthday ?>"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="mobile_no" value="<?php echo $mobile_no ?>" />
                    <input type="hidden" name="name" value="<?php echo $name ?>" />
                    <input type="hidden" name="birthday" value="<?php echo $birthday ?>" />
                </form>

                <div style="height: 50px;"></div>
                <footer class="footer">

                    <div class="btn_group">
                        <button type="button" class="btn type01" onclick="submitForm()">다음</button>
                    </div>
                </footer>
            </div>
        </div>





    </div>

</body>

</html>