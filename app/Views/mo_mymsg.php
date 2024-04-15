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
    <script src="/static/js/myfeed.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>

        <?php $title = "메시지";
        include 'header.php'; ?>
        <?php $session = session();
        $member_ci = $session->get('ci');

        ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="tab_wrap">
                    <ul>
                        <li>
                            AI 메시지
                        </li>
                        <li class="on">
                            메시지함
                        </li>
                    </ul>
                </div>
                <div id="chat_wrap" class="chat_wrap">
                    <?php foreach ($allMsg as $row) {
                        if ($row['chk'] === 'me') {
                    ?>
                            <div class="send_msg">
                                <div class="send_text">
                                    <div class="receive_time">
                                        <p>
                                            <?= $row['created_at'] ?>
                                        </p>
                                    </div>
                                    <div class="send_msg_area">
                                        <p><?= $row['msg_cont'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="receive_msg">
                                <div class="receive_profile">
                                    <?php if ($row['file_name']) {
                                    ?>
                                        <img src="/<?= $row['file_path'] ?><?= $row['file_name'] ?>" />
                                    <?php
                                    } else {
                                    ?>
                                        <img src="/static/images/profile_noimg.png" />
                                    <?php
                                    } ?>
                                </div>
                                <div class="receive_text">
                                    <p class="receive_profile_name"><?= $row['nickname'] ?><span class="match_percent"><?= number_format($row['match_rate'], 0) ?>%</span></p>
                                    <div class="receive_msg_area">
                                        <p><?= $row['msg_cont'] ?></p>
                                    </div>
                                </div>
                                <div class="receive_time">
                                    <p>
                                        <?= $row['created_at'] ?>
                                    </p>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="message_input_box">
                    <!-- <div class="btn_group multy ai_date_check">
                        <button type="button" class="btn type01">수락</button>
                        <button type="button" class="btn type04">거절</button>
                        <button type="button" class="btn type05">보류</button>
                    </div>  -->
                    <hr class="hoz_part" />
                    <div class="chat_input_box">
                        <div style="padding:20px 8px;">
                            <img src="/static/images/hamberger_menu.png" />
                        </div>
                        <div class="message_input_box_border">
                            <textarea id="msgbox" type="text" placeholder="메세지를 입력하세요" rows={1}></textarea>
                            <img style="position:absolute; right: 30px" src="/static/images/message_send_btn.png" onclick="sendMsg()" />
                        </div>
                    </div>
                </div>
                <input id="room_ci" type="hidden" value="<?= $room_ci ?>" />
            </footer>
        </div>





    </div>


    <!-- SCRIPTS -->

    <script>
        $(document).ready(function() {
            $("#msgbox").on("propertychange change keyup paste input", function(e) {
                $(e.target).css('height', '26px'); // height 초기화
                $(e.target).css('height', $(e.target)[0].scrollHeight + 'px');
            });
            scrollToBottom();
            setInterval(function() {
                reloadMsg();
            }, 5000)
        });
        const reloadMsg = () => {
            $.ajax({
                url: '/ajax/reloadMsg',
                type: 'POST',
                data: {
                    "room_ci": $("#room_ci").val()
                },
                async: false,
                success: function(data) {
                    console.log(data);
                    if (data.status === 'success') {
                        // 성공
                        $("#chat_wrap").html("");
                        var member_ci = "<?= $member_ci ?>";
                        var html = "";
                        data.data.reulst_value.allMsg.forEach(item => {
                            if (item.chk === 'me') {
                                html += '<div class="send_msg">';
                                html += '<div class="send_text">';
                                html += '<div class="receive_time"><p>';
                                html += item.created_at + '</p></div>';
                                html += '<div class = "send_msg_area" ><p>';
                                html += item.msg_cont + '</p></div></div></div>';
                            } else {
                                html += '<div class="receive_msg">';
                                html += '<div class="receive_profile">';
                                if (item.file_name) {
                                    html += '<img src="/' + item.file_path + item.file_name + '" />';
                                } else {
                                    html += '<img src="/static/images/profile_noimg.png" />';
                                }
                                html += '</div>';
                                html += '<div class="receive_text">';
                                html += '<p class="receive_profile_name">' + item.nickname + '<span class="match_percent">' + item.match_rate + '%</span></p>';
                                html += '<div class="receive_msg_area"><p>' + item.msg_cont + '</p></div></div>';
                                html += '<div class="receive_time"><p>' + item.created_at + '</p></div></div>';
                            }
                        });
                        $("#chat_wrap").html(html);
                        // moveToUrl('/mo/factorInfo');
                    } else if (data.status === 'error') {
                        console.log('실패', data);
                    } else {
                        alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function(data, status, err) {
                    console.log(err);
                    alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }
        const sendMsg = () => {
            var sendMsg = $("#msgbox").val();
            if (sendMsg !== "") {
                $.ajax({
                    url: '/ajax/sendMsg',
                    type: 'POST',
                    data: {
                        "room_ci": $("#room_ci").val(),
                        "msg_cont": sendMsg
                    },
                    async: false,
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') {
                            // 성공
                            reloadMsg();
                            scrollToBottom();
                            // moveToUrl('/mo/factorInfo');
                        } else if (data.status === 'error') {
                            console.log('실패', data);
                        } else {
                            alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                        }
                        return false;
                    },
                    error: function(data, status, err) {
                        console.log(err);
                        alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    },
                });
            }
            console.log(sendMsg)
            $("#msgbox").val("");
        }

        function scrollToBottom() {
            var element = $("#chat_wrap");
            element.animate({
                scrollTop: element.height()
            }, 'slow');
        }
    </script>

    <!-- -->


</body>

</html>