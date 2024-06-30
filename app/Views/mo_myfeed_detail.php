<div class="layerPopup alert middle detail" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a href="#" class="btn_popup_close" onclick="closePopup();" style="float: right;">닫기</a>
        </div>
        <div class="layerPopup_content medium">
            <p id="feed_title" class="txt"><?= lang('Korean.feedDetail') ?></p>

            <div class="myfeed_detail">
                <div class="myfeed_detail_feed_box scroll_body">
                    <img id="myfeed_detail_img" src="/static/images/profile_img_detail.png" style="display:none" />
                </div>
                <video id="myfeed_detail_mov" src="/static/images/profile_img_detail.png" style="display:none"></video>
            </div>
            <div class="myfeed_cont">
                <p id="myfeed_cont">
                    <?= lang('Korean.feedDetailCon') ?>
                </p>
            </div>
            <!-- <div class="report_text">
                <textarea placeholder="<?= lang('Korean.reportCon1') ?>"></textarea>
            </div> -->
            <input id="feed_idx" type="hidden" value="" />
            <?php
            $session = $session = session();
            $ci = $session->get('ci');
            if ($user['ci'] === $ci) {
            ?>
                <div class="layerPopup_bottom">
                    <div class="btn_group multy">
                        <button class="btn type02" onclick="myFeedDelete()"><?= lang('Korean.delete') ?></button>
                        <button class="btn type01" onclick="myFeedModify()">수정</button>
                    </div>
                </div>
            <?php } else  if ($adminYn === 'Y') {
            ?>
                <div class="layerPopup_bottom">
                    <div class="btn_group">
                        <button class="btn type02" onclick="myFeedDeleteAdmin()">관리자 삭제</button>
                    </div>
                </div>
            <?php } else {
            ?>
                <div class="layerPopup_bottom">
                    <div class="btn_group">
                        <button class="btn type01" onclick="closePopup()"><?= lang('Korean.close') ?></button>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
</div>