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

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body class="mo_wrap">
    <div class="layerPopup alert middle"><!-- class: imgPop 추가 -->
        <div class="layerPopup_wrap">
            <div class="layerPopup_content medium">
                <p class="txt">예약금 송금</p>
                
                <div class="">
                    <div>
                        <div class="schedule_title">
                            <h2>금액</h2>
                        </div>
                        <div class="schedule_deposit">
                            <input type="number" id=""/>
                            <p><?=lang('Korean.won')?></p>
                        </div>
                    </div>
                    
                    <div style="schedule_photo">
                        <div class="schedule_title">
                            <h2>사진을 첨부해주세요</h2>
                        </div>
                        <div class="form_row signin_form" style="height:150px;">
                            <div class="signin_form_div">
                                <div class="profile_photo_div">
                                    <label for="profile_photo" class="signin_label profile_photo_input"></label>
                                    <input id="profile_photo" type="file" value="" placeholder="">
                                    <div>
                                        <img class="profile_photo_posted" src="/static/images/input_img_1.png" />
                                        <img class="profile_photo_posted" src="/static/images/input_img_2.png" />
                                        <!-- <img class="profile_photo_posted" src="/static/images/input_img_3.png" /> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                
                <div class="layerPopup_bottom">
                    <div class="btn_group">
                        <button class="btn type01">보내기</button>
                    </div>
                </div>
            </div>
        </div>
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