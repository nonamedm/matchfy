<div class="layerPopup alert withdrawal_layer" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a href="#" class="btn_popup_close" onclick="closePopup();" style="float: right;">닫기</a>
        </div>
        <div class="layerPopup_content">
            <p class="txt">회원탈퇴</p>
            <em class="desc">매치파이를 떠나신다니 너무 아쉽네요.</em>
            <div class="notice_box">
                <p id="certifi_con" class="notice_text">
                    <!-- 매치파이를 떠나신다니 너무 아쉽네요.<br /><br /> -->
                    먼저, 저희 서비스를 이용해주신 <br />회원님께 진심으로 감사드립니다.<br /><br />
                    회원 탈퇴를 신청하시려면 아래의 절차를<br /> 따라주시기 바랍니다.<br /><br />
                    탈퇴 사유를 간단하게 작성해 주세요.
                </p>
                <textarea id="withdrwlTxt" placeholder="탈퇴사유를 입력해 주세요"></textarea>
                <p id="certifi_con" class="notice_text">
                    탈퇴 후에는 해당 계정의 모든 정보가 삭제되며<br /> 복구가 불가능합니다.<br />
                    계정과 관련된 모든 데이터가 삭제되므로 <br />신중히 결정해주시기 바랍니다.
                    <br />
                    탈퇴 신청 후에도 일정 기간 동안 일부 정보는 <br />법령에 따라 보관될 수 있습니다.<br /><br />

                    다시 한번, 그동안 저희 서비스를 <br />이용해주셔서감사합니다.

                </p>
            </div>
            <!-- <div class="chk_box">
                <input type="checkbox" id="totAgree" name="chkDefault00">
                <label class="totAgree_label" for="totAgree"><?= lang('Korean.certificationCon2') ?></label>
            </div> -->
            <div class="layerPopup_bottom">
                <div class="btn_group multy">
                    <button type="button" class="btn type02" onclick="closePopup()">취소</button>
                    <button type="button" class="btn type01" onclick="submitWithdrawal()">탈퇴</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

    });
</script>