<div class="layerPopup alert middle member" style="display:none;">
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a href="#" class="btn_popup_close" onclick="closePopup();" style="float: right;">닫기</a>
        </div>
        <div class="layerPopup_content medium">
            <p class="member_title txt"><?= lang('Korean.groupTalkMember') ?></p>
            <div class="" style="height: 300px; overflow-y: scroll;">
                <?php
                foreach ($member_info as $row) {
                ?>
                    <div class="chat_member">
                        <div class="chat_member_profile">
                            <?php if ($row['chk'] !== 'me' && $row['member_gender'] !== $my_gender && $fork_onoff === 'on') {
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
                                <img class="fork_img" src="" />
                            <?php
                            } ?>
                            <a class="nicknameBtnBox" onclick="moveToUrl('/mo/viewProfile/<?= $row['nickname'] ?>')">
                                <img class="profile_img" src="/<?= $row['file_path'] ?><?= $row['file_name'] ?>" />
                                <p><?= $row['name'] ?></p>
                            </a>
                        </div>
                        <div class="chat_member_report">
                            <?php if ($row['chk'] !== 'me') {
                            ?>
                                <?php if ($member_type[0]['member_type']  === '1' || $member_type[0]['member_type'] === '9') {
                                ?>
                                    <button class="type02" onclick="banUsr(<?= $row['entry_num'] ?>)"><?= lang('Korean.resign') ?></button>
                                <?php
                                } ?>
                                <button class="type01" onclick="reptUsr(<?= $row['entry_num'] ?>)"><?= lang('Korean.declaration') ?></button>
                            <?php
                            } ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {


    });
    const banUsr = (num) => {
        fn_confirm('강퇴하시겠습니까?', 'banusr')
    }

    function fn_banUsr(value) {
        if (value) {
            $.ajax({
                url: '/ajax/banUsr',
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
    }
    const reptUsr = (num) => {
        $('.layerPopup').css('display', 'none');
        $('.layerPopup.report').css('display', 'flex');
        $('#report_target').val(num);
    }

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
                        fn_alert('찔러보기 성공!', '/mo/mymsg');
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