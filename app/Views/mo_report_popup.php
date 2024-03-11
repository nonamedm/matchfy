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
    <div class="layerPopup alert middle"><!-- class: imgPop 추가 -->
        <div class="layerPopup_wrap">
            <div class="layerPopup_content medium">
                <p class="txt">신고</p>
                
                <div class="">
                    <div class="report_title">
                        <h2>신고사유</h2>
                    </div>
                    <div class="report_category">
                        <select>
                            <option value="">선택</option>
                            <option>욕설</option>
                            <option>도용</option>
                            <option>허위계정</option>
                            <option>잦은불참</option>
                            <option>직접입력</option>
                        </select>
                    </div>
                </div>
                <div class="report_text">
                    <textarea placeholder="기타 의견을 입력해주세요."></textarea>
                </div>
                <div class="review_caution">
                    <!-- <img src="/static/images/caution_mark.png"/>
                    <p class="">
                    입력해주신 정보는 AI 학습을 위해 이용되며, 상대방에게 <br/>전달되지 않습니다.</p> -->
                </div>
                <div class="layerPopup_bottom">
                    <div class="btn_group">
                        <button class="btn type01">후기 보내기</button>
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