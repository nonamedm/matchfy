<div class="layerPopup alert middle" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a onclick="closePopup()">X</a>
        </div>
        <div class="layerPopup_content">
            <p class="txt">인증</p>
            <em class="desc">인증을 위한 <b id="type">혼인관계증명서</b>를<br />등록해주세요</em>
            <div class="">
                <div class="regist_file">
                    <label id="profile_regist_label" for="profile_regist"
                        class="signin_label profile_photo_input"></label>
                    <input id="profile_regist" type="file" accept="image/*">
                </div>
            </div>
            <div class="chk_box">
                <input type="checkbox" id="totAgree" name="chkDefault00">
                <label class="totAgree_label" for="totAgree">동의합니다</label>
            </div>
            <div class="notice_box">
                <p class="notice_text">본인은 업로드한 문서에 허위 사항이 없음을 확인하며,<br />
                    허위 사실이 있을경우 그 손해에 대해<br />
                    법정 최대 손해배상을 할 것을 동의합니다.</p>
            </div>
            <div class="layerPopup_bottom">
                <div class="btn_group">
                    <button type="button" class="btn type01" onclick="submitFile()">확인</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // image input 초기화        
        const profile_regist = document.getElementById('profile_regist');
        const imgRegist = document.getElementById('profile_regist_label');
        imgRegist.style.display = 'block';

        profile_regist.addEventListener('change', function (e) {
            if (profile_regist.files.length > 0) {
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i;
                if (!allowedExtensions.exec(profile_regist.files[0].name)) {
                    alert('이미지 파일만 업로드할 수 있습니다.');
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
                            } else {
                                // 기존에 추가된 이미지
                                var previousImage = document.getElementById('newImage');
                                // 이전에 추가된 이미지가 있으면 제거
                                if (previousImage) {
                                    previousImage.parentNode.removeChild(previousImage);
                                }
                                imgRegist.style.display = 'block';

                                alert('사진 사이즈가 너무 큽니다. \n다른 사진을 첨부해 주세요.');
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