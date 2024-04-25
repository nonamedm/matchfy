const myfeedPhotoListner = () => {
    const feed_photo_input = document.getElementById('feed_photo_insert');
    const imgRegist = document.getElementById('myfeed_file_posted');
    // 파일 정보 저장할 배열
    let uploadedFeeds = [];

    feed_photo_input.addEventListener('change', function (e) {
        if (feed_photo_input.files.length > 0) {
            for (let i = 0; i < feed_photo_input.files.length; i++) {
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg|\.mp4|\.avi|\.mov|\.mkv|\.flv|\.wmv|\.webm)$/i;
                const allowedExtensionsImg = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i;
                const allowedExtensionsMov = /(\.mp4|\.avi|\.mov|\.mkv|\.flv|\.wmv|\.webm)$/i;
                if (!allowedExtensions.exec(feed_photo_input.files[i].name)) {
                    fn_alert('이미지 또는 영상만 업로드할 수 있습니다.');
                    // 입력한 파일을 초기화하여 업로드를 취소
                    this.value = '';
                } else {
                    $('#edit_photo_type').val('addMyFeed'); // 등록한 이미지 값을 받아오기 위한 trigger
                    // FileReader 객체 생성
                    const reader = new FileReader();
                    // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                    reader.onload = function (e) {
                        // 이미지 요소 생성
                        const imageElement = document.createElement('div');
                        imageElement.style.position = 'relative';
                        imgRegist.prepend(imageElement);

                        // label 숨기기
                        const input_label = document.getElementById('feed_photo_label');
                        input_label.style.display = 'none';

                        var fileName = feed_photo_input.files[i].name;
                        const temp_ext = fileName.split('.').pop();

                        if(allowedExtensionsImg.exec(feed_photo_input.files[i].name)) {
                            // 이미지 요소에 이미지 추가
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('profile_photo_posted');
                            imageElement.appendChild(img);
                        } else if(allowedExtensionsMov.exec(feed_photo_input.files[i].name)) {
                            // 이미지 요소에 이미지 추가
                            const img = document.createElement('video');
                            img.src = e.target.result;
                            img.setAttribute('width', '100%');
                            img.setAttribute('height', '100%');
                            img.addEventListener('click',function() {
                                if (img.paused) {
                                    img.play();
                                } else {
                                    img.pause();
                                }
                            });
                            img.classList.add('profile_photo_posted');
                            imageElement.appendChild(img);
                        }

                        // javascript에서 fileUpload 호출
                        fileUpload(feed_photo_input.files[i])
                            .then((data) => {
                                console.log('result', data);
                                const fileInfo = {
                                    org_name: data.org_name,
                                    file_name: data.file_name,
                                    file_path: data.file_path,
                                    ext: data.ext,
                                };
                                uploadedFeeds.push(fileInfo);

                                // 삭제 버튼 생성
                                const deleteButton = document.createElement('span');
                                // deleteButton.textContent = 'X';
                                deleteButton.classList.add('feed_close_button');
                                // 삭제 버튼에 클릭 이벤트 추가
                                deleteButton.addEventListener('click', function () {
                                    // label 숨김해제
                                    input_label.style.display = 'block';
                                    // 이미지 요소 제거
                                    imageElement.remove();
                                    uploadedFeeds = uploadedFeeds.filter(
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
                    reader.readAsDataURL(feed_photo_input.files[i]);
                }
            }
        } else {
        }
    });

    document.querySelector('.main_signin_form').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData();

        // 라디오 버튼 요소의 값을 FormData에 추가
        var selectedRadio = document.querySelector('input[name="public_yn"]:checked');
        formData.append(selectedRadio.name, selectedRadio.value);

        const feed_cont = document.getElementsByName('feed_cont')[0];
        const edit_type = document.getElementById('edit_type');
        const feed_idx = document.getElementById('feed_idx');
        formData.append(feed_cont.name, feed_cont.value);
        formData.append(edit_type.name, edit_type.value);
        formData.append(feed_idx.name, feed_idx.value);
        if ($('#edit_photo_type').val() === 'addMyFeed') {
            // 사진 변경했을 때만 값 받아오기
            uploadedFeeds.forEach((file, index) => {
                for (const key in file) {
                    formData.append(`uploadedFeeds[${index}][${key}]`, file[key]);
                }
            });
        }

        // 수정된 FormData를 서버로 전송
        fetch('/ajax/updtFeedData', {
            method: 'POST',
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                console.log('Upload success', data);
                fn_alert('피드가 등록되었습니다.');
                closePopup();
                location.reload();
            })
            .catch((error) => {
                console.error('Upload failed', error);
                // 실패한 경우, 오류 메시지 표시 등의 작업 수행
            });
    });
};

const myFeedDelete = () => {
    const feed_idx = $('#feed_idx').val();
    if (confirm('피드를 삭제하시겠습니까?')) {
        $.ajax({
            url: '/ajax/myFeedDelete',
            type: 'POST',
            data: { feed_idx: feed_idx },
            async: false,
            success: function (data) {
                console.log(data);
                if (data.data) {
                    fn_alert('피드가 삭제되었습니다.');
                    closePopup();
                    location.reload();
                } else {
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                }
                return false;
            },
            error: function (data, status, err) {
                console.log(err);
                fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            },
        });
    }
};

const myFeedModify = () => {
    const feed_idx = $('#feed_idx').val();
    $.ajax({
        url: '/ajax/myFeedUpdate',
        type: 'POST',
        data: { feed_idx: feed_idx },
        async: false,
        success: function (data) {
            console.log(data);
            if (data.data) {
                closePopup();
                $('#feed_cont').val(data.data.feed_cont);
                const imgRegist = document.getElementById('myfeed_file_posted');
                const imageElement = document.createElement('div');
                imageElement.style.position = 'relative';
                imgRegist.prepend(imageElement);

                // label 숨기기
                const input_label = document.getElementById('feed_photo_label');
                input_label.style.display = 'none';

                // 이미지/영상 분기
                const allowedExtensionsImg = /(jpg|jpeg|png|gif|bmp|tiff|tif|webp|svg)$/i;
                const allowedExtensionsMov = /(mp4|avi|mov|mkv|flv|wmv|webm)$/i;
                if(allowedExtensionsImg.exec(data.data.ext)) {
                    // 이미지 요소에 이미지 추가
                    const img = document.createElement('img');
                    img.src = '/' + data.data.thumb_filepath + '/' + data.data.thumb_filename;
                    img.classList.add('profile_photo_posted');
                    imageElement.appendChild(img);
                } else if(allowedExtensionsMov.exec(data.data.ext)) {
                    const img = document.createElement('video');
                    img.src = '/' + data.data.thumb_filepath + '/' + data.data.thumb_filename;
                    img.setAttribute('width', '100%');
                    img.setAttribute('height', '100%');
                    img.classList.add('profile_photo_posted');
                    img.addEventListener('click',function() {
                        if (img.paused) {
                            img.play();
                        } else {
                            img.pause();
                        }
                    })
                    imageElement.appendChild(img);
                }

                // 삭제 버튼 생성
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'X';
                deleteButton.classList.add('posted_delete_button');
                // 삭제 버튼에 클릭 이벤트 추가
                deleteButton.addEventListener('click', function () {
                    // label 숨김해제
                    input_label.style.display = 'block';
                    // 이미지 요소 제거
                    imageElement.remove();
                });
                // 이미지 요소에 삭제 버튼 추가
                imageElement.appendChild(deleteButton);
                showFeedPopup('modMyFeed', feed_idx);
            } else {
                fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            }
            return false;
        },
        error: function (data, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });
};

const showFeedPopup = (contents, feedIdx) => {
    console.log(contents, feedIdx);
    var title = '';
    switch (contents) {
        case 'addMyFeed':
            title = '피드 등록';
            $('#feed_photo_label').css('display', 'block');
            $('#feed_cont').val('');
            $('#myfeed_file_posted').html('');
            break;
        case 'modMyFeed':
            title = '피드 수정';
            break;
        default:
            title = '피드 등록';
    }
    $('#edit_type').val(contents);
    $('#feed_idx').val(feedIdx);
    $('#feed_title').text(title);
    $('#edit_photo_type').val(contents);

    $('.layerPopup.edit').css('display', 'flex');
};

const showFeedDetail = (contents, feedIdx) => {
    var myfeedDetailImg = $("#myfeed_detail_img");
    var myfeedDetailMov = document.getElementById("myfeed_detail_mov");
    myfeedDetailImg.attr('style','display:none');
    myfeedDetailMov.style.display = 'none';
    console.log(contents, feedIdx);
    $.ajax({
        url: '/ajax/showFeedDetail',
        type: 'POST',
        data: { feed_idx: feedIdx },
        async: false,
        success: function (data) {
            console.log(data);
            if (data.data) {
                const allowedExtensionsImg = /(jpg|jpeg|png|gif|bmp|tiff|tif|webp|svg)$/i;
                const allowedExtensionsMov = /(mp4|avi|mov|mkv|flv|wmv|webm)$/i;
                if(allowedExtensionsImg.exec(data.data.ext)) {
                    myfeedDetailImg.attr('style','display:inline-block');
                    myfeedDetailImg.attr('src', '/' + data.data.thumb_filepath + '/' + data.data.thumb_filename);
                    $('#myfeed_cont').text(data.data.feed_cont);
                    $('#feed_idx').val(data.data.feed_idx);
                } else if(allowedExtensionsMov.exec(data.data.ext)) {
                    myfeedDetailMov.style.display = 'inline-block';
                    myfeedDetailMov.addEventListener('click',function() {
                        if (myfeedDetailMov.paused) {
                            myfeedDetailMov.play();
                        } else {
                            myfeedDetailMov.pause();
                        }
                    })
                    myfeedDetailMov.setAttribute('src', '/' + data.data.thumb_filepath + '/' + data.data.thumb_filename);
                    $('#myfeed_cont').text(data.data.feed_cont);
                    $('#feed_idx').val(data.data.feed_idx);
                }
            } else {
                fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            }
            return false;
        },
        error: function (data, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });

    $('.layerPopup.detail').css('display', 'flex');
};
