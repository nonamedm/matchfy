<div class="layerPopup alert middle report" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a onclick="closePopup()">X</a>
        </div>
        <div class="layerPopup_content medium">
            <p class="txt report_title"><?= lang('Korean.declaration') ?></p>

            <div class="">
                <div class="report_title">
                    <h2><?= lang('Korean.ReasonReport') ?></h2>
                </div>
                <div class="report_category">
                    <select id="report_category">
                        <option value=""><?= lang('Korean.selected') ?></option>
                        <option value="1"><?= lang('Korean.abuse') ?></option>
                        <option value="2"><?= lang('Korean.embezzlement') ?></option>
                        <option value="3"><?= lang('Korean.fakeAccount') ?></option>
                        <option value="4"><?= lang('Korean.frequentAbsence') ?></option>
                        <option value="0"><?= lang('Korean.directInput') ?></option>
                    </select>
                </div>
            </div>
            <div class="report_text">
                <textarea id="report_text" placeholder="<?= lang('Korean.reportCon1') ?>"></textarea>
            </div>
            <div class="review_caution">
                <!-- <img src="/static/images/caution_mark.png"/>
                <p class="">
                입력해주신 정보는 AI 학습을 위해 이용되며, 상대방에게 <br/>전달되지 않습니다.</p> -->
            </div>
            <input type="hidden" id="report_target" value="" />
            <div class="layerPopup_bottom">
                <div class="btn_group">
                    <button class="btn type01" onclick="sndRpt();"><?= lang('Korean.reviewSub') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

    });
    const sndRpt = () => {
        const rptctgr = $("#report_category").val();
        const rpttxt = $("#report_text").val();
        const num = $("#report_target").val();
        if (rptctgr === "" || rptctgr === null) {
            alert('카테고리를 선택해 주세요');
            return false;
        }
        if (rpttxt === "" || rpttxt === null) {
            alert('상세 내용을 입력해 주세요');
            return false;
        }
        if (confirm('후기를 전송하시겠습니까?')) {
            $.ajax({
                url: '/ajax/sndRpt',
                type: 'POST',
                data: {
                    "room_ci": $("#room_ci").val(),
                    "num": num,
                    "rptctgr": rptctgr,
                    "rpttxt": rpttxt
                },
                async: false,
                success: function(data) {
                    console.log(data);
                    if (data.status === 'success') {
                        // 성공
                        // moveToUrl('/');
                        alert('후기가 전송되었습니다!');
                        closePopup();
                        $("#report_category").val("");
                        $("#report_text").val("");
                        $("#report_target").val("");
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
</script>