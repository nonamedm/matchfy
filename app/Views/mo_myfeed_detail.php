<div class="layerPopup alert middle detail" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a onclick="closePopup()">X</a>
        </div>
        <div class="layerPopup_content medium">
            <p id="feed_title" class="txt">피드 상세</p>

            <div class="myfeed_detail">
                <img id="myfeed_detail_img" src="/static/images/profile_img_detail.png" style="display:none"/>
                <video id="myfeed_detail_mov" src="/static/images/profile_img_detail.png" style="display:none"></video>
            </div>
            <div class="myfeed_cont">
                <p id="myfeed_cont">
                    피드 상세 내용
                </p>
            </div>
            <!-- <div class="report_text">
                <textarea placeholder="기타 의견을 입력해주세요."></textarea>
            </div> -->
            <input id="feed_idx" type="hidden" value="" />
            <?php 
                $session = $session = session();
                $ci = $session->get('ci');
                if ($user['ci'] === $ci) {
            ?>
            <div class="layerPopup_bottom">
                <div class="btn_group multy">
                    <button class="btn type02" onclick="myFeedDelete()">삭제</button>
                    <button class="btn type01" onclick="myFeedModify()">수정</button>
                </div>
            </div>
            <?php } else {
            ?>
            <div class="layerPopup_bottom">
                <div class="btn_group">
                    <button class="btn type01" onclick="closePopup()">닫기</button>
                </div>
            </div>
            <?php
            }?>
        </div>
    </div>
</div>

