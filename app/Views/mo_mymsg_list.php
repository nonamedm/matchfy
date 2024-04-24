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

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="tab_wrap">
                    <ul>
                        <li>
                            <?= lang('Korean.AIMsg') ?>
                        </li>
                        <li class="on">
                            <?= lang('Korean.messageBox') ?>
                        </li>
                    </ul>
                </div>
                <?php
                if ($my_chat_room) {
                ?>
                    <?php
                    foreach ($my_chat_room as $row) {
                    ?>
                        <?php if ($row['room_type'] === '1') {
                            // 단톡방
                        ?>
                            <div class="chat_list_wrap" onclick="enterCtRm('<?= $row['room_ci'] ?>')">
                                <div class="chat_room_title">
                                    <div class="receive_profile">
                                        <img src="/static/images/group_chat_profile.png" />
                                    </div>
                                    <div class="receive_text">
                                        <p class="receive_profile_name"><?= $row['member_name'] ?><span class="match_percent btw8090">89%</span>
                                        </p>
                                        <div class="receive_msg_area">
                                            <?php if ($row['last_msg']) {
                                            ?>
                                                <p style="width: 220px;"><?= $row['last_msg']['msg_cont'] ?></p>
                                            <?php
                                            } else {
                                            ?>
                                                <p>대화에 초대되었습니다</p>
                                            <?php
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="receive_time">
                                        <?php if ($row['last_msg']) {
                                        ?>
                                            <p style="width: 220px;"><?= $row['last_msg']['created_at'] ?></p>
                                        <?php
                                        } else {
                                        ?>
                                            <p style="width: 220px;"></p>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <hr class="hoz_part" />
                        <?php
                        } else if ($row['room_type'] === '0') {
                            //1:1톡방
                        ?>
                            <div class="chat_list_wrap" onclick="sendMsg('<?= $row['member_nickname'] ?>')">
                                <div class="chat_room_title">
                                    <div class="receive_profile">
                                        <img src="/<?= $row['member_file']['file_path'] ?><?= $row['member_file']['file_name'] ?>" />
                                    </div>
                                    <div class="receive_text">
                                        <p class="receive_profile_name"><?= $row['member_name'] ?><span class="match_percent"><?php
                                                                                                                                if ($row['match_rate']) {
                                                                                                                                    echo $row['match_rate']['match_rate'] . "%";
                                                                                                                                } ?></span></p>
                                        <div class="receive_msg_area">
                                            <?php if ($row['last_msg']) {
                                            ?>
                                                <p style="width: 220px;"><?= $row['last_msg']['msg_cont'] ?></p>
                                            <?php
                                            } else {
                                            ?>
                                                <p style="width: 220px;">대화에 초대되었습니다</p>
                                            <?php
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="receive_time">
                                        <?php if ($row['last_msg']) {
                                        ?>
                                            <p style="width: 220px; max-height: 15px;"><?= $row['last_msg']['created_at'] ?></p>
                                        <?php
                                        } else {
                                        ?>
                                            <p></p>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <hr class="hoz_part" />
                        <?php
                        } ?>
                    <?php
                    }
                    ?>
                <?php
                } else {
                ?>
                    <div class="chat_list_wrap">
                        <div class="chat_room_title">
                            <div class="receive_profile" style="width:50px; height:50px;">
                            </div>
                            <div class="receive_text">
                                <p class="receive_profile_name"><span class="match_percent"></span></p>
                                <div class="receive_msg_area">
                                    <p style="width: 220px;">진행중인 대화방이 없습니다</p>
                                </div>
                            </div>
                            <div class="receive_time">

                                <p></p>
                            </div>
                        </div>
                    </div>
                    <hr class="hoz_part" />
                <?php
                }
                ?>

            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">


            </footer>
        </div>





    </div>


    <!-- SCRIPTS -->

    <script>
        $(document).ready(function() {

        });
        const sendMsg = (nickname) => {
            $.ajax({
                url: '/ajax/createChat',
                type: 'POST',
                data: {
                    "nickname": nickname
                },
                async: false,
                success: function(data) {
                    if (data.status === 'success') {
                        // 성공
                        console.log(data)
                        moveToUrl('/mo/mymsg', {
                            room_ci: data.data.room_ci
                        });
                    } else if (data.status === 'error') {
                        console.log('메세지 전송 실패', data);
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
        const enterCtRm = (ci) => {
            $.ajax({
                url: '/ajax/createMultyChat',
                type: 'POST',
                data: {
                    "room_ci": ci
                },
                async: false,
                success: function(data) {
                    if (data.status === 'success') {
                        // 성공
                        console.log(data)
                        moveToUrl('/mo/mymsg', {
                            room_ci: data.data.room_ci
                        });
                    } else if (data.status === 'error') {
                        console.log('메세지 전송 실패', data);
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
    </script>

    <!-- -->


</body>

</html>