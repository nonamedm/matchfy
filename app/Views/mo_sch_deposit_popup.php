<div class="layerPopup alert middle deposit" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a onclick="closePopup()">X</a>
        </div>
        <div class="layerPopup_content medium">
            <p class="txt"><?= lang('Korean.reservDepoRemit') ?></p>

            <div class="">
                <div>
                    <div class="schedule_title">
                        <h2><?= lang('Korean.amount') ?></h2>
                    </div>
                    <div class="schedule_deposit">
                        <input type="number" id="" />
                        <p><?= lang('Korean.won') ?></p>
                    </div>
                </div>
                <p style="text-align: right; margin-right: 25px;">사용가능한 예약금 <span id="usable_point">0</span>원</p>

                <div class="schedule_photo">
                    <div class="schedule_title">
                        <h2><?= lang('Korean.attachPicturesPlace') ?></h2>
                    </div>
                    <div class="form_row signin_form" style="height:150px;">
                        <div class="signin_form_div">
                            <div class="profile_photo_div">
                                <label for="profile_photo" class="signin_label profile_photo_input"></label>
                                <input id="profile_photo" type="file" value="" placeholder="">
                                <div>
                                    <img class="profile_photo_posted" src="/static/images/input_img_1.png" />
                                    <img class="profile_photo_posted" src="/static/images/input_img_2.png" />
                                    <!-- <img class="profile_photo_posted" src="/static/images/input_img_3.png" /> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layerPopup_bottom">
                <div class="btn_group">
                    <button class="btn type01"><?= lang('Korean.send') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- SCRIPTS -->

<script>
</script>

<!-- -->