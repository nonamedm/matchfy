<div class="layerPopup alert middle" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a onclick="closePopup()">X</a>
        </div>
        <div class="layerPopup_content medium">
            <p class="txt">피드 등록</p>

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
                    <textarea name="feed_cont" placeholder="내용을 입력하세요"></textarea>
                </div>

                <div class="schedule_calendar" style="height: 75px; text-align: center;">
                    <div class="chk_box radio_box">
                        <input type="radio" id="public_yn1" name="public_yn" value="0" checked="">
                        <label for="public_yn">
                            <h2>공개</h2>
                        </label>
                    </div>
                    <div class="chk_box radio_box">
                        <input type="radio" id="public_yn2" name="public_yn" value="1">
                        <label for="public_yn">
                            <h2>비공개</h2>
                        </label>
                    </div>
                </div>
                <input type="hidden" name="member_ci" value="<?= $user['ci'] ?>" />
                <!-- <div class="report_text">
                    <textarea placeholder="기타 의견을 입력해주세요."></textarea>
                </div> -->

                <div class="layerPopup_bottom">
                    <div class="btn_group multy">
                        <button class="btn type02">삭제</button>
                        <button type="submit" class="btn type01">수정</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>