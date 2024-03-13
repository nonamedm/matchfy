<div class="layerPopup alert middle" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a onclick="closePopup()">X</a>
        </div>
        <div class="layerPopup_content medium">
            <p class="txt">피드 등록</p>
            <div class="">
                <div class="regist_file myfeed_file">
                    <label for="profile_mov" class="signin_label profile_photo_input"></label>
                    <input id="profile_mov" type="file" value="" placeholder="">
                </div>
            </div>
            <div class="myfeed_text">
                <textarea placeholder="내용을 입력하세요"></textarea>
            </div>

            <div class="schedule_calendar" style="height: 75px; text-align: center;">
                <div class="chk_box radio_box">
                    <input type="radio" id="grade01" name="grade" checked="">
                    <label for="grade01">
                        <h2>공개</h2>
                    </label>
                </div>
                <div class="chk_box radio_box">
                    <input type="radio" id="grade02" name="grade" checked="">
                    <label for="grade02">
                        <h2>비공개</h2>
                    </label>
                </div>
            </div>
            <!-- <div class="report_text">
                <textarea placeholder="기타 의견을 입력해주세요."></textarea>
            </div> -->

            <div class="layerPopup_bottom">
                <div class="btn_group multy">
                    <button class="btn type02">삭제</button>
                    <button class="btn type01">수정</button>
                </div>
            </div>
        </div>
    </div>
</div>