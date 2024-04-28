<div class="layerPopup alert middle deposit" style="display:none;"><!-- class: imgPop 추가 -->
    <div class="layerPopup_wrap">
        <div class="layerPopup_header">
            <a onclick="closePopup()">X</a>
        </div>
        <div class="layerPopup_content medium">
            <p class="txt"><?= lang('Korean.reservDepoRemit') ?></p>

            <div class="">
                <div class="snd_deposit">
                    <div class="schedule_title">
                        <h2><?= lang('Korean.amount') ?></h2>
                    </div>
                    <div class="schedule_deposit">
                        <input id="snd_dpst" name="snd_dpst" type="number" />
                        <input id="room_ci" name="room_ci" type="hidden" value="<?= $room_ci ?>" />
                        <input id="room_type" name="room_type" type="hidden" value="<?= $room_type[0]['room_type'] ?>" />
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
                            <div class="profile_photo_div" style="margin: 0 20px;">
                                <label for="profile_photo" class="signin_label profile_photo_input"></label>
                                <input id="profile_photo" type="file" value="" placeholder="" multiple accept="image/*">
                                <div id="profile_photo_view" class="profile_photo_view">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layerPopup_bottom">
                <div class="btn_group">
                    <button id="sbmtDeposit" class="btn type01"><?= lang('Korean.send') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- SCRIPTS -->

<script>
    $(document).ready(function() {
        editPhotoListListnerDeposit();
    });
    const editPhotoListListnerDeposit = () => {
        const profile_photo_input = document.getElementById('profile_photo');
        const imgRegist = document.getElementById('profile_photo_view');
        // 파일 정보 저장할 배열
        let uploadedFiles = [];

        profile_photo_input.addEventListener('change', function() {
            if (profile_photo_input.files.length > 0) {
                for (let i = 0; i < profile_photo_input.files.length; i++) {
                    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i;
                    if (!allowedExtensions.exec(profile_photo_input.files[i].name)) {
                        alert('이미지 파일만 업로드할 수 있습니다.');
                        // 입력한 파일을 초기화하여 업로드를 취소
                        this.value = '';
                    } else {
                        // FileReader 객체 생성
                        const reader = new FileReader();

                        // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                        reader.onload = function(e) {
                            // 이미지 요소 생성
                            const imageElement = document.createElement('div');
                            imageElement.style.position = 'relative';
                            imgRegist.prepend(imageElement);

                            // 이미지 요소에 이미지 추가
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('profile_photo_posted');
                            imageElement.appendChild(img);

                            // javascript에서 fileUpload 호출
                            fileUpload(profile_photo_input.files[i])
                                .then((data) => {
                                    console.log('result', data);
                                    const fileInfo = {
                                        org_name: data.org_name,
                                        file_name: data.file_name,
                                        file_path: data.file_path,
                                        ext: data.ext,
                                    };
                                    uploadedFiles.push(fileInfo);

                                    // 삭제 버튼 생성
                                    const deleteButton = document.createElement('span');
                                    // deleteButton.textContent = 'X';
                                    deleteButton.classList.add('feed_close_button');
                                    // 삭제 버튼에 클릭 이벤트 추가
                                    deleteButton.addEventListener('click', function() {
                                        // 이미지 요소 제거
                                        imageElement.remove();
                                        uploadedFiles = uploadedFiles.filter(
                                            (file) => file.file_name !== fileInfo.file_name,
                                        );
                                    });
                                    // 이미지 요소에 삭제 버튼 추가
                                    imageElement.appendChild(deleteButton);
                                })
                                .catch((error) => {
                                    console.error('error : ', error);
                                });
                        };
                        // 파일 읽기 시작
                        reader.readAsDataURL(profile_photo_input.files[i]);
                    }
                }
            } else {}
        });

        document.querySelector('#sbmtDeposit').addEventListener('click', function(event) {
            event.preventDefault();

            const formData = new FormData();

            // 기존의 input 요소의 값을 FormData에 추가
            const inputElements = document.querySelectorAll('.snd_deposit input');
            inputElements.forEach((input) => {
                formData.append(input.name, input.value);
            });
            uploadedFiles.forEach((file, index) => {
                for (const key in file) {
                    formData.append(`uploadedFiles[${index}][${key}]`, file[key]);
                }
            });
            // 수정된 FormData를 서버로 전송
            fetch('/ajax/sndDeposit', {
                    method: 'POST',
                    body: formData,
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.result === '0') {
                        reloadMsg();
                        closePopup();
                    } else if (data.result === '1') {
                        alert('예약금보다 많이 송금할 수 없습니다!')
                        closePopup();
                    }
                    // 성공한 경우, 필요에 따라 리다이렉션 또는 메시지 표시 등의 작업 수행
                })
                .catch((error) => {
                    console.error('Upload failed', error);
                    // 실패한 경우, 오류 메시지 표시 등의 작업 수행
                });
        });
    };
</script>

<!-- -->