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
                <p class="txt"><?=lang('Korean.groupTalkMember')?></p>
                
                <div class="">
                    <div class="chat_member">
                        <div class="chat_member_profile">
                            <img class="profile_img" src="/static/images/mypage_pfofile.png"/>
                            <p>장원영</p>
                        </div>
                        <div class="chat_member_report">
                            <button class="type02"><?=lang('Korean.resign')?></button>
                            <button class="type01"><?=lang('Korean.declaration')?></button>
                        </div>
                    </div>
                    <div class="chat_member">
                        <div class="chat_member_profile">
                            <img class="profile_img" src="/static/images/mypage_pfofile_1.png"/>
                            <p>김여름</p>
                        </div>
                        <div class="chat_member_report">
                            <button class="type02"><?=lang('Korean.resign')?></button>
                            <button class="type01"><?=lang('Korean.declaration')?></button>
                        </div>
                    </div>
                    <div class="chat_member">
                        <div class="chat_member_profile">
                            <img class="profile_img" src="/static/images/mypage_pfofile_2.png"/>
                            <p>정로라</p>
                        </div>
                        <div class="chat_member_report">
                            <button class="type02"><?=lang('Korean.resign')?></button>
                            <button class="type01"><?=lang('Korean.declaration')?></button>
                        </div>
                    </div>
                    <div class="chat_member">
                        <div class="chat_member_profile">
                            <img class="profile_img" src="/static/images/mypage_pfofile_3.png"/>
                            <p>강해진</p>
                        </div>
                        <div class="chat_member_report">
                            <button class="type02"><?=lang('Korean.resign')?></button>
                            <button class="type01"><?=lang('Korean.declaration')?></button>
                        </div>
                    </div>
                    <div class="chat_member">
                        <div class="chat_member_profile">
                            <img class="profile_img" src="/static/images/mypage_pfofile_4.png"/>
                            <p>유재니</p>
                        </div>
                        <div class="chat_member_report">
                            <button class="type02"><?=lang('Korean.resign')?></button>
                            <button class="type01"><?=lang('Korean.declaration')?></button>
                        </div>
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