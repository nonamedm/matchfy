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
                                <button class="type02" onclick="">강퇴</button>
                                <button class="type01" onclick="">신고</button>
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