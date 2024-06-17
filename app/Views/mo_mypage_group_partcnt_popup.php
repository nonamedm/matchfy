<div class="meetingMemPopup layerPopup alert middle" style="display:none;">
    <div class="layerPopup_wrap">
        <div class="layerPopup_content medium">
            <div style="position: relative;display: flex;">
                <p class="txt" style="width: 90%;padding-left: 5%;">참석멤버</p>
                <a href="#" class="btn_close" onclick="btnClose();" style="float: right;">닫기</a>
            </div>
            <div class="desc_box">
                <!-- <ul>
                <li><a href="#" class="on">매칭률순</a></li>
                <li><a href="#">이상형확률순</a></li>
                </ul> -->
            </div>
            <div class="scroll_member_body">
                <?php foreach ($memberInfo as $row) { ?>
                    <div class="chat_member">
                        <div class="chat_member_profile">
                            <?php if ($inMemberChk) {
                                if ($row['chk'] !== 'me' && $row['member_gender'] !== $my_gender && $fork_onoff === 'on') {
                                    if ($row['forked']) {
                            ?>
                                        <img onclick="fn_click_fork(<?= $row['entry_num'] ?>)" class="fork_img" src="/static/images/forked.png" />
                                    <?php
                                    } else {
                                    ?>
                                        <img onclick="fn_click_fork(<?= $row['entry_num'] ?>)" class="fork_img" src="/static/images/fork_off.png" />
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <img class="fork_img" src="/static/images/fork_none.png" />
                            <?php
                                }
                            } ?>
                            <?php if ($inMemberChk) {
                            ?>
                                <a class="nicknameBtnBox" onclick="moveToUrl('/mo/viewProfile/<?= $row['nickname'] ?>')">
                                <?php
                            } else {
                                ?>
                                    <a class="nicknameBtnBox">
                                    <?php
                                } ?>
                                    <?php if ($row['file_path']) {
                                    ?>
                                        <img class="profile_img" src="/<?= $row['file_path'] ?><?= $row['file_name'] ?>" />
                                    <?php
                                    } else {
                                    ?>
                                        <img class="profile_img" src="/static/images/mypage_no_pfofile.png" />
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $length = mb_strlen($row['name'], 'UTF-8');
                                    $firstChar = mb_substr($row['name'], 0, 1, 'UTF-8');
                                    $lastChar = mb_substr($row['name'], -1, 1, 'UTF-8');

                                    // 중간 부분을 '*'로 치환
                                    $middlePart = str_repeat('*', $length - 2);
                                    ?>
                                    <p><?= $firstChar . $middlePart . $lastChar ?></p>
                                    </a>
                                    <?php if ($row['meeting_master'] === 'K') {
                                    ?>
                                        <img class="group_master" src="/static/images/group_master.png" />
                                    <?php
                                    } ?>

                        </div>
                        <div class="group_member_detail">

                            <?= mb_substr($row['birthday'], 2, 2) ?> ·
                            <?php $word_file_path = APPPATH . 'Data/MemberCode.php';
                            require($word_file_path); ?>
                            <?php
                            foreach ($sidoCode as $item) {
                                if ($item['id'] === $row['city']) echo $item['name'];
                            } ?>
                            <?php
                            if ($row['mbti']) {
                                foreach ($mbtiCode as $item) {
                                    if ($item['id'] === $row['mbti']) echo  $item['name'];
                                }
                            } else {
                                echo ' · 없음';
                            } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($inMemberChk) {
                ?>
                    <input id="room_ci" type="hidden" value="<?= $room_ci ?>" />
                <?php
                } ?>
            </div>
            <div class="layerPopup_bottom">
                <div class="btn_group">
                    <button class="btn type01" onclick="meetingPopupClose();">확인</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {


    });
    const fn_click_fork = (num) => {
        $.ajax({
            url: '/ajax/forked',
            type: 'POST',
            data: {
                "room_ci": $("#room_ci").val(),
                "num": num
            },
            async: false,
            success: function(data) {
                console.log(data);
                if (data.status === 'success') {
                    // 성공
                    // moveToUrl('/');
                    // closePopup();
                    if (data.data.result_value === '0') {
                        fn_alert('찔러보기 성공!', '/mo/mypage/group/detail/<?= $idx ?>');
                    } else if (data.data.result_value === '1') {
                        $.ajax({
                            url: '/ajax/createChatFork',
                            type: 'POST',
                            data: {
                                "nickname": data.data.result_nickname
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
                } else if (data.status === 'error') {
                    console.log('실패', data);
                } else if (data.status === 're_forked') {
                    fn_alert('이미 찔러본 대상은 중복 선택할 수 없습니다.');
                } else if (data.status === 'too_many') {
                    fn_alert('해당 모임의 포크 횟수 한도.');
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
</script>