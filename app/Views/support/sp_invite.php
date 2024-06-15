<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
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

        <?php $title = lang('Korean.friendsInvite');
        $prevUrl = "/support/menu";//변경 필요
        include 'spheader.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="invite_wrap">
                    <div class="invite_img">
                        <img src="/static/images/invite.png" style="width:335px" />
                    </div>
                    <div class="invite_code">
                        <a id="copyButton" data-code="<?= $unique_code ?>">
                            <h2><?= $unique_code ?></h2>
                            <p><img src="/static/images/ico_copy_14x14.png" /><?= lang('Korean.friendsLinkCopy') ?></p>
                        </a>
                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="btn_group invite">
                    <button type="button" class="btn type01" id="shareButton" data-code="<?= $unique_code ?>"><?= lang('Korean.friendsShare') ?></button>
                </div>

            </footer>
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

        $(document).ready(function() {
            $('#copyButton').click(function() {
                var code = $(this).attr('data-code');
                var tempInput = $('<textarea>');

                $('body').append(tempInput);
                tempInput.val(code).select();
                document.execCommand('copy');
                tempInput.remove();
                fn_alert('초대코드가 클립보드에 복사되었습니다!');
            });
        });

        document.getElementById('shareButton').addEventListener('click', function() {
            var code = this.getAttribute('data-code');
            var inviteURL = 'https://matchfy.net';//서포터즈로 변경 필요
            if (navigator.share) {
                navigator.share({
                    title: 'Matchfy 초대',
                    text: 'Matchfy에 초대합니다! 여기 코드를 사용하세요: ' + code,
                    url: inviteURL
                }).then(() => {
                    console.log('공유 완료');
                }).catch((error) => {
                    console.log('공유 실패 : ', error);
                });
            } else {
                fn_alert('지원되지 않는 기기입니다.');
            }
        });
    </script>

    <!-- -->


</body>

</html>