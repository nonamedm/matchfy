<div class="layerPopup alert middle" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a href="#" class="btn_popup_close" onclick="closePopup();" style="float: right;">닫기</a>
        </div>
        <div class="layerPopup_content">
            <p class="txt"><?=lang('Korean.authentication')?></p>
            <em class="desc"><?=lang('Korean.certificationCon1')?></em>
            <div class="">
                <div class="regist_file">
                    <label id="profile_regist_label" for="profile_regist"
                        class="signin_label profile_photo_input"></label>
                    <input id="profile_regist" type="file" accept="image/*">
                </div>
            </div>
            <div class="chk_box">
                <input type="checkbox" id="totAgree" name="chkDefault00">
                <label class="totAgree_label" for="totAgree"><?=lang('Korean.certificationCon2')?></label>
            </div>
            <div class="notice_box">
                <p id="certifi_con" class="notice_text"><?=lang('Korean.certificationCon3')?></p>
            </div>
            <div class="layerPopup_bottom">
                <div class="btn_group">
                    <button type="button" class="btn type01" onclick="submitFile()"><?=lang('Korean.check')?></button>
                </div>
            </div>
            <input id="ci" type="hidden" value="" />
            <input id="type" type="hidden" value="" />
        </div>
    </div>
</div>
<script>
    var certificationCon3 = '<?=lang('Korean.certificationCon3')?>';
    var certificationCon4 ='<?=lang('Korean.certificationCon4')?>';
    $(document).ready(function () {
        // image input 초기화        
        const profile_regist = document.getElementById('profile_regist');
        const imgRegist = document.getElementById('profile_regist_label');
        imgRegist.style.display = 'block';

        profile_regist.addEventListener('change', function (e) {
            if (profile_regist.files.length > 0) {
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i;
                if (!allowedExtensions.exec(profile_regist.files[0].name)) {
                    fn_alert('이미지 파일만 업로드할 수 있습니다.');
                    // 입력한 파일을 초기화하여 업로드를 취소
                    this.value = '';
                } else {
                    // 최근에 선택된 이미지 파일에 대해 반복
                    const latestFileIndex = profile_regist.files.length - 1;
                    const latestFile = profile_regist.files[latestFileIndex];

                    // FileReader 객체 생성
                    const reader = new FileReader();

                    // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                    fileUpload(latestFile)
                        .then((data) => {
                            console.log('result : ', data);
                            if (data.org_name) {
                                reader.onload = function (e) {
                                    // 기존에 추가된 이미지
                                    var previousImage = document.getElementById('newImage');
                                    // 이전에 추가된 이미지가 있으면 제거
                                    if (previousImage) {
                                        previousImage.parentNode.removeChild(previousImage);
                                    }

                                    imgRegist.style.display = 'none';

                                    // 새로운 이미지 생성
                                    var newImage = document.createElement('img');
                                    newImage.id = 'newImage';
                                    newImage.src = e.target.result;
                                    newImage.style.borderRadius = '10px';
                                    newImage.style.margin = '20px';
                                    newImage.style.width = '295px';
                                    newImage.style.height = '200px';
                                    newImage.onclick = function () {
                                        profile_regist.click();
                                    };

                                    // label 바로 다음에 새로운 요소 추가
                                    imgRegist.parentNode.insertBefore(newImage, imgRegist.nextSibling);
                                };
                                // 파일 읽기 시작
                                reader.readAsDataURL(latestFile);

                                // upload 파일 db에 저장하기
                                const typeValue = $("#type").val();
                                $.ajax({
                                    type: "post",
                                    url: "/ajax/mbrFileRegUp",
                                    data: { ci: $("#ci").val(), org_name: data.org_name, file_name: data.file_name, file_path: data.file_path, ext: data.ext, board_type: typeValue },
                                    success: function (data) {
                                        console.log(data);
                                        // if (data.data.board_type === 'school' || data.data.board_type === 'job')
                                        //     $("#" + typeValue).val(data.data.org_name);
                                    },
                                    error: function (xhr, status, error) {
                                        console.log(error);
                                    }
                                });


                            } else {
                                // 기존에 추가된 이미지
                                var previousImage = document.getElementById('newImage');
                                // 이전에 추가된 이미지가 있으면 제거
                                if (previousImage) {
                                    previousImage.parentNode.removeChild(previousImage);
                                }
                                imgRegist.style.display = 'block';

                                fn_alert('사진 사이즈가 너무 큽니다. \n다른 사진을 첨부해 주세요.');
                            }
                        })
                        .catch((error) => {
                            // 기존에 추가된 이미지
                            var previousImage = document.getElementById('newImage');
                            // 이전에 추가된 이미지가 있으면 제거
                            if (previousImage) {
                                previousImage.parentNode.removeChild(previousImage);
                            }
                            imgRegist.style.display = 'block';
                            console.error('error : ', error);
                        });

                    // javascript에서 fileUpload 호출
                }
            } else {
            }
        });
    });
</script>