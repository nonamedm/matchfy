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


        <?php $title = "메시지";
        $prevUrl = "/mo/mypage";
        include 'header.php'; ?>
        <?php $session = session();
        $member_ci = $session->get('ci');

        ?>
        <div class="sub_wrap">
            <div class="content_wrap">
                <!-- <div class="tab_wrap">
                    <ul>
                        <li class="on">
                            <?= lang('Korean.AIMsg') ?>
                        </li>
                        <li onclick="moveToUrl('/mo/mymsg/list')">
                            <?= lang('Korean.messageBox') ?>
                        </li>
                    </ul>
                </div> -->
                <div id="chat_wrap" class="chat_wrap scroll_body">
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
                                    <a class="nicknameBtnBox" onclick="moveToUrl('/mo/viewProfile/<?= $row['nickname'] ?>')">
                                        <?php if ($row['file_name']) {
                                        ?>
                                            <img src="/<?= $row['file_path'] ?><?= $row['file_name'] ?>" />
                                        <?php
                                        } else {
                                        ?>
                                            <img src="/static/images/profile_noimg.png" />
                                        <?php
                                        } ?>
                                    </a>
                                </div>
                                <div class="receive_text">
                                    <p class="receive_profile_name">
                                        <?php
                                        echo $row['nickname'];
                                        ?>
                                    </p>
                                    <div style="display: flex;">
                                        <div class=" receive_msg_area">
                                            <p><?= $row['msg_cont'] ?></p>
                                        </div>
                                        <div class="receive_time">
                                            <p>
                                                <?= $row['created_at'] ?>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
                </div>
            </div>
            <div style="height: 50px;"></div>


            <div class="message_input_box">
                <!-- <div class="btn_group multy ai_date_check">
                        <button type="button" class="btn type01">수락</button>
                        <button type="button" class="btn type04">거절</button>
                        <button type="button" class="btn type05">보류</button>
                    </div>  -->
                <hr class="hoz_part" />
                <div class="chat_input_box">
                    <div id="mymsg_menu" style="padding:20px 8px;">
                        <img class="hamberger_menu" src="/static/images/hamberger_menu.png" />
                        <img class="hamberger_cancel" src="/static/images/hamberger_cancel.png" />
                    </div>
                    <div class="message_input_box_border">
                        <textarea id="msgbox" type="text" placeholder="<?= lang('Korean.aiMsgPlaceholder') ?>" rows={1}></textarea>
                        <img style="position:absolute; right: 30px" src="/static/images/message_send_btn.png" onclick="sendMsg()" />
                    </div>
                </div>
            </div>
            <input id="room_ci" type="hidden" value="<?= $room_ci ?>" />


            <footer class="footer">
            </footer>
        </div>
    </div>


    <!-- SCRIPTS -->

    <script>
        $(document).ready(function() {
            const chatWrapHeight = window.innerHeight - 276;
            $('.chat_wrap').css('height', chatWrapHeight);
            // 엔터키 메세지전송, shift+enter 줄바꿈
            $('textarea').on('keydown', function(event) {
                if (event.keyCode == 13)
                    if (!event.shiftKey) {
                        event.preventDefault();
                        sendMsg();
                    }
            });

            $("#msgbox").on("propertychange change keyup paste input", function(e) {
                if (!($(".message_input_box").hasClass("on")) && !($(".chat_wrap").hasClass("on"))) {
                    $(e.target).css('height', '26px'); // height 초기화
                    $(e.target).css('height', $(e.target)[0].scrollHeight + 'px');
                }
            });
            scrollToBottom();
            // mymsgPhotoListener();
            reloadMsg();
            // setInterval(function() {
            //     reloadMsg();
            // }, 5000);
        });
        const reloadMsg = () => {
            $.ajax({
                url: '/ajax/reloadMsgAi',
                type: 'POST',
                data: {
                    "room_ci": $("#room_ci").val()
                },
                async: false,
                success: function(data) {
                    if (data.status === 'success') {
                        // 성공
                        $("#chat_wrap").html("");
                        var html = "";
                        console.log(data.data.reulst_value.allMsg.length);
                        if (data.data.reulst_value.allMsg.length !== 0) {
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
                                    html += `<a class="nicknameBtnBox" onclick="moveToUrl('/mo/viewProfile/` + item.nickname + `')">`;
                                    if (item.file_name) {
                                        html += '<img src="/' + item.file_path + item.file_name + '" />';
                                    } else {
                                        html += '<img src="/static/images/profile_noimg.png" />';
                                    }
                                    html += '</a>';
                                    html += '</div>';
                                    html += '<div class="receive_text">';
                                    html += '<p class="receive_profile_name">' + item.nickname;

                                    html += '</p>';
                                    html += '<div style="display: flex;">';
                                    html += '<div class="receive_msg_area"><p>' + item.msg_cont + '</p></div>';
                                    html += '<div class="receive_time"><p>' + item.created_at + '</p></div>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</div>';
                                }
                            });
                        } else {
                            html += '<div class="no_ai_msg">';
                            html += '<h2>아직 AI커플매니저와<br/>대화하신 내용이 없습니다</h2>';
                            html += '<p>※ AI커플매니저는 AI가 직접<br/>연애에 관련된 가벼운 상담, 조언 등을 <br/>제공하며,  <br/><br/>더 만족할 수 있는 매칭을 주선하기 위해 <br/>회원님의 데이터 및  연애 관련 자료들을 <br/>꾸준히 딥러닝해 나갈 계획입니다.</p>';
                            html += '</div>';
                        }
                        $("#chat_wrap").html(html);
                        // scrollToBottom();
                        // moveToUrl('/mo/factorInfo');
                    } else if (data.status === 'error') {
                        console.log('실패', data);
                    } else {
                        fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function(data, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }
        const sendMsg = () => {
            var sendMsg = $("#msgbox").val();
            if (sendMsg !== "") {
                $.ajax({
                    url: '/ajax/sendMsgAi',
                    type: 'POST',
                    data: {
                        "room_ci": $("#room_ci").val(),
                        "msg_cont": sendMsg,
                        "msg_type": "0"
                    },
                    async: false,
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') {
                            // 성공
                            $('#msgbox').css('height', '26px'); // height 초기화
                            reloadMsg();
                            $("#chat_wrap").append(`<div class="receive_msg">
                                                    <div class="receive_profile">
                                                        <a class="nicknameBtnBox">
                                                            <img src="/static/images/ai_send.png">
                                                        </a>
                                                    </div>
                                                    <div class="receive_text">
                                                        <p class="receive_profile_name">AI 매니저</p>
                                                        <div style="display: flex;">
                                                            <div class="receive_msg_area">
                                                                <p><img src="/static/images/loading.gif" style="width: 20px;height: 15px;" /> </p>
                                                            </div>
                                                            <div class="receive_time">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`);

                            scrollToBottom();
                            setTimeout(function() {
                                returnMsg();
                            }, 200);
                            // moveToUrl('/mo/factorInfo');
                        } else if (data.status === 'error') {
                            console.log('실패', data);
                        } else {
                            fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                        }
                        return false;
                    },
                    error: function(data, status, err) {
                        console.log(err);
                        fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    },
                });
            }
            // $("#msgbox").val("");
        }
        const returnMsg = () => {
            var sendMsg = $("#msgbox").val();
            if (sendMsg !== "") {
                $.ajax({
                    url: '/ajax/sendMsgAiReturn',
                    type: 'POST',
                    data: {
                        "room_ci": $("#room_ci").val(),
                        "msg_cont": sendMsg,
                        "msg_type": "0"
                    },
                    async: false,
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') {
                            // 성공
                            $('#msgbox').css('height', '26px'); // height 초기화
                            reloadMsg();
                            scrollToBottom();
                        } else if (data.status === 'error') {
                            console.log('실패', data);
                        } else {
                            fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                        }
                        return false;
                    },
                    error: function(data, status, err) {
                        console.log(err);
                        fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    },
                });
            }
            $("#msgbox").val("");
        }

        const scrollToBottom = () => {
            $("#chat_wrap").scrollTop($("#chat_wrap")[0].scrollHeight);
        }



        // const sndPnt = () => {
        //     $.ajax({
        //         url: '/ajax/usablePoint',
        //         type: 'POST',
        //         data: {
        //             "room_ci": $("#room_ci").val(),
        //             "room_type": $("#room_type").val(),
        //         },
        //         async: false,
        //         success: function(data) {
        //             console.log(data);
        //             if (data.status === 'success') {
        //                 // 성공
        //                 // 보유포인트 만큼 차감 후 전송
        //                 $("#snd_dpst").val("");
        //                 $("#usable_point").html(data.data.reulst_value[0].usable_point);
        //                 $('.layerPopup.deposit').css('display', 'flex');
        //                 // moveToUrl('/');
        //             } else if (data.status === 'error') {
        //                 // 사용가능한 예약금 없음 -> 또는 예약자 본인인 경우
        //                 alert('사용 가능한 예약금이 없습니다. \n예약생성자가 아닌 경우 모임에 참여 후 시도해 주세요')
        //             } else {
        //                 alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
        //             }
        //             return false;
        //         },
        //         error: function(data, status, err) {
        //             console.log(err);
        //             alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        //         },
        //     });
        // };
    </script>

    <!-- -->


</body>

</html>