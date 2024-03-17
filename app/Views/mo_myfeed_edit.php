<div class="layerPopup alert middle edit" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a onclick="closePopup()">X</a>
        </div>
        <div class="layerPopup_content medium">
            <p id="feed_title" class="txt">피드 등록</p>

            <form class="main_signin_form" method="post" enctype="multipart/form-data">
                <div class="">
                    <div class="regist_file myfeed_file">
                        <label id="feed_photo_label" for="feed_photo_insert"
                            class="signin_label profile_photo_input"></label>
                        <input id="feed_photo_insert" name="feed_photo_insert" type="file" value="" placeholder=""
                            accept="image/*" />
                    </div>
                    <div id="myfeed_file_posted" class="regist_file myfeed_file_posted">

                    </div>
                </div>
                <div class="myfeed_text">
                    <textarea id="feed_cont" name="feed_cont" placeholder="내용을 입력하세요"></textarea>
                </div>

                <div class="schedule_calendar" style="height: 75px; text-align: center;">
                    <div class="chk_box radio_box">
                        <input type="radio" id="public_yn1" name="public_yn" value="0" checked="">
                        <label for="public_yn1">
                            <h2>공개</h2>
                        </label>
                    </div>
                    <div class="chk_box radio_box">
                        <input type="radio" id="public_yn2" name="public_yn" value="1">
                        <label for="public_yn2">
                            <h2>비공개</h2>
                        </label>
                    </div>
                </div>
                <!-- <div class="report_text">
                    <textarea placeholder="기타 의견을 입력해주세요."></textarea>
                </div> -->
                <input id="edit_type" name="edit_type" type="hidden" value="">
                <div class="layerPopup_bottom">
                    <div class="btn_group multy">
                        <button class="btn type02" onclick="closePopup()">취소</button>
                        <button type="submit" class="btn type01">등록</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>