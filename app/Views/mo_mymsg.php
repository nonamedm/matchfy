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
                        <textarea id="msgbox" type="text" placeholder="메세지를 입력하세요" rows={1}></textarea>
                        <img style="position:absolute; right: 30px" src="/static/images/message_send_btn.png" onclick="sendMsg()" />
                    </div>
                </div>
                <div class="chat_menu_open">
                    <div id="mymsg_photo_div" class="chat_menu_func">
                        <!-- <img src="/static/images/chat_picture.png"> -->
                        <label for="mymsg_photo" class=""></label>
                        <p>앨범</p>
                        <input id="mymsg_photo" name="mymsg_photo" type="file" value="" placeholder="" multiple accept="image/*">
                    </div>
                    <div class="chat_menu_func" onclick="crtMtng()"><img src="/static/images/chat_location.png">
                        <p>약속</p>
                    </div>
                    <div class="chat_menu_func" onclick="sndPnt()"><img src="/static/images/chat_banking.png">
                        <p>예약금<br />송금</p>
                    </div>
                    <div class="chat_menu_func" onclick="extRm()"><img src="/static/images/chat_quit.png">
                        <p>방나가기</p>
                    </div>
                    <?php if ($count_info[0]['count'] >= 2) {
                    ?>
                        <div class="chat_menu_func" onclick="rptMbr()"><img src="/static/images/chat_report.png">
                            <p>신고/강퇴</p>
                        </div>
                    <?php
                    } ?>
                    <!-- <div class="chat_menu_func"><img src="/static/images/chat_call.png">
                        <p>안심번호<br /> 통화하기</p>
                    </div> -->
                </div>
            </div>
            <input id="room_ci" type="hidden" value="<?= $room_ci ?>" />
            <?php if ($count_info[0]['count'] >= 2) {
                include 'mo_mymsg_member_popup.php';
                include 'mo_report_popup.php';
            ?>
                <script>
                    const rptMbr = (contents) => {
                        console.log(contents);
                        var title = '';
                        switch (contents) {
                            case '':
                                title = '단톡방 멤버';
                                break;
                            default:
                                title = '단톡방 멤버';
                        }
                        $('#member_title').text(title);

                        $('.layerPopup.member').css('display', 'flex');
                    };
                </script>
            <?php
            } ?>
            <footer class="footer">
            </footer>
        </div>
    </div>


    <!-- SCRIPTS -->

    <script>
        $(document).ready(function() {
            $("#msgbox").on("propertychange change keyup paste input", function(e) {
                if (!($(".message_input_box").hasClass("on")) && !($(".chat_wrap").hasClass("on"))) {
                    $(e.target).css('height', '26px'); // height 초기화
                    $(e.target).css('height', $(e.target)[0].scrollHeight + 'px');
                }
            });
            scrollToBottom();
            mymsgPhotoListener();
            setInterval(function() {
                reloadMsg();
            }, 5000);
            $("#mymsg_menu").on("click", function() {
                if (!($(".message_input_box").hasClass("on")) && !($(".chat_wrap").hasClass("on"))) {
                    $(".message_input_box").addClass("on");
                    $(".chat_wrap").addClass("on");
                } else {
                    $(".message_input_box").removeClass("on");
                    $(".chat_wrap").removeClass("on");
                }
            });

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
            $("#msgbox").val("");
        }

        const extRm = () => {
            if (confirm('채팅방에서 나가시겠습니까? \n대화내용은 저장되지 않습니다.')) {
                $.ajax({
                    url: '/ajax/extRm',
                    type: 'POST',
                    data: {
                        "room_ci": $("#room_ci").val(),
                    },
                    async: false,
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') {
                            // 성공
                            moveToUrl('/');
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
        }

        const scrollToBottom = () => {
            $("#chat_wrap").scrollTop($("#chat_wrap")[0].scrollHeight);
        }

        const mymsgPhotoListener = () => {
            const mymsg_photo_input = document.getElementById('mymsg_photo');
            let uploadedFiles = [];
            mymsg_photo_input.addEventListener('change', function() {
                if (mymsg_photo_input.files.length > 0) {
                    for (let i = 0; i < mymsg_photo_input.files.length; i++) {
                        const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i;
                        if (!allowedExtensions.exec(mymsg_photo_input.files[i].name)) {
                            alert('이미지 파일만 업로드할 수 있습니다.');
                            // 입력한 파일을 초기화하여 업로드를 취소
                            this.value = '';
                        } else {
                            // FileReader 객체 생성
                            const reader = new FileReader();

                            // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                            reader.onload = function(e) {
                                // javascript에서 fileUpload 호출
                                fileUpload(mymsg_photo_input.files[i])
                                    .then((data) => {
                                        console.log('result', data);
                                        const fileInfo = {
                                            org_name: data.org_name,
                                            file_name: data.file_name,
                                            file_path: data.file_path,
                                            ext: data.ext,
                                        };
                                        uploadedFiles.push(fileInfo);

                                        // DB저장하기
                                        $.ajax({
                                            url: '/ajax/sendMsg',
                                            type: 'POST',
                                            data: {
                                                "room_ci": $("#room_ci").val(),
                                                "msg_cont": '<img src="/' + fileInfo.file_path + fileInfo.file_name + '" style="width: 150px; height: 150px;" />',
                                                "msg_type": "1"
                                            },
                                            async: false,
                                            success: function(data) {
                                                console.log(data);
                                                if (data.status === 'success') {
                                                    // 성공
                                                    $('#msgbox').css('height', '26px'); // height 초기화
                                                    $(".message_input_box").removeClass("on");
                                                    $(".chat_wrap").removeClass("on");
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

                                    })
                                    .catch((error) => {
                                        console.error('error : ', error);
                                    });
                            };
                            // 파일 읽기 시작
                            reader.readAsDataURL(mymsg_photo_input.files[i]);
                        }
                    }
                } else {}
            });
        };
    </script>

    <!-- -->


</body>

</html>