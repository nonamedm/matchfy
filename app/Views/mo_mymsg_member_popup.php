<div class="layerPopup alert middle member" style="display:none;">
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a onclick="closePopup()">X</a>
        </div>
        <div class="layerPopup_content medium">
            <p class="member_title txt">단톡방 멤버</p>
            <div class="" style="height: 300px; overflow-y: scroll;">
                <?php
                foreach ($member_info as $row) {
                ?>
                    <div class="chat_member">
                        <div class="chat_member_profile">
                            <img class="profile_img" src="/<?= $row['file_path'] ?><?= $row['file_name'] ?>" />
                            <p><?= $row['name'] ?></p>
                        </div>
                        <div class="chat_member_report">
                            <?php if ($row['chk'] !== 'me') {
                            ?>
                                <button class="type02" onclick="banUsr(<?= $row['entry_num'] ?>)">강퇴</button>
                                <button class="type01" onclick="reptUsr(<?= $row['entry_num'] ?>)">신고</button>
                            <?php
                            } ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <script>
                $(document).ready(function() {


                });
                const banUsr = (num) => {
                    if (confirm('강퇴하시겠습니까?')) {
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
                const reptUsr = (num) => {
                    $('.layerPopup').css('display', 'none');
                    $('.layerPopup.report').css('display', 'flex');
                }
            </script>
        </div>
    </div>
</div>