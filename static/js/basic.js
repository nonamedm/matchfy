/* 공통함수 */
const moveToUrl = (url, param) => {
    if(!param) {
        location.href = url
    } else {
        //json 형태의 param 전송 시         
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = url;

        for (var key in param) {
            if (param.hasOwnProperty(key)) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = param[key];
                form.appendChild(input);
            }
        }        
        document.body.appendChild(form);
        
        form.submit();
    }
}

const certIdentify = () => {
    // 추후 본인인증 연결
    // $.ajax({
    //     url: '/ajax/cert', // 추후 본인인증 연결
    //     type: 'post',
    //     data: { cmt_idx: '_cmt_idx', trgt_id: '_trgt_id', trgt_idx: '_trgt_idx' }, //
    //     dataType: 'json',
    //     async: false,
    //     success: function (data) {
    //         console.log(data)
    //         if (data) {
    // 성공

    // 폼 생성
    var form = document.createElement('form')
    form.setAttribute('action', '/mo/agree')
    form.setAttribute('method', 'post')

    // hidden input 요소 생성
    var mobileNoInput = document.createElement('input')
    mobileNoInput.setAttribute('type', 'hidden')
    mobileNoInput.setAttribute('name', 'mobile_no')
    mobileNoInput.setAttribute('value', '01026220923') // todo : 추후 인증 결과값으로 변경
    form.appendChild(mobileNoInput)

    var nameInput = document.createElement('input')
    nameInput.setAttribute('type', 'hidden')
    nameInput.setAttribute('name', 'name')
    nameInput.setAttribute('value', '서승표') // todo : 추후 인증 결과값으로 변경
    form.appendChild(nameInput)

    var birthdayInput = document.createElement('input')
    birthdayInput.setAttribute('type', 'hidden')
    birthdayInput.setAttribute('name', 'birthday')
    birthdayInput.setAttribute('value', '19890923') // todo : 추후 인증 결과값으로 변경
    form.appendChild(birthdayInput)

    // 폼을 body에 추가 후 제출
    document.body.appendChild(form)
    form.submit()
    //     } else {
    //         // 삭제 성공
    //         //console.log('222');
    //         alert('오류가 발생하였습니다. \n다시 시도해 주세요.')
    //     }
    //     return false
    // },
    // error: function (data, status, err) {
    //     alert('there was an error while fetching events!')
    //     console.log(err)
    // },
    // })
}

const userLogin = () => {
    const phoneNumber = document.getElementById('id').value;
    console.log(phoneNumber);

    // 빈 값 validation
    if(phoneNumber.length === 0) {
        alert('전화번호를 입력해 주세요.');
        return;
    }

    //휴대폰 번호 11자리 숫자로 validation
    const phoneRegex = /^\d{11}$/;

    if(!phoneRegex.test(phoneNumber)) {
        alert('휴대폰 번호는 11자리 숫자여야 합니다.');
        return;
    }

    $.ajax({
        url: '/ajax/login',
        type: 'POST',
        data: {'mobile_no': phoneNumber},
        async: false,
        success: function (data) {
            console.log(data)
            if (data) {
                moveToUrl('/index/login');
                //location.href = '/index/login'
            } else {
                alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            }
            return false
        },
        error: function (data, status, err) {
            console.log(err)
            alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    })
}


const submitForm = () => {
    document.querySelector('form').submit()
}
const submitFormAgree = () => {
    const agree1 = document.getElementById('agree1')
    const agree2 = document.getElementById('agree2')
    const agree3 = document.getElementById('agree3')

    // agree1, agree2, agree3의 체크 여부 확인
    const isAllChecked = agree1.checked && agree2.checked && agree3.checked

    // 모든 체크박스의 상태를 변경
    if (isAllChecked) {
        submitForm();
    } else {
        alert('항목에 동의해 주세요')
        return false
    }
}

const signUp = () => {
    var postData = new FormData(document.querySelector('form'))
    $.ajax({
        url: '/ajax/signUp', // todo : 추후 본인인증 연결
        type: 'POST',
        data: postData,
        processData: false,
        contentType: false,
        async: false,
        success: function (data) {
            console.log(data)
            if (data.status === 'success') {
                // 성공
                var formData = document.querySelector('form');
                for (var key in data.data) {
                    if (data.data.hasOwnProperty(key)) {
                        if(key==='ci') {
                            var input = document.createElement('input');
                            input.type = 'hidden'; // hidden 필드로 생성
                            input.name = key;
                            input.value = data.data[key];
                            formData.appendChild(input);
                        }
                    }
                  }
                submitForm();
            } else if (data.status === 'error') {
                // 한번만 출력되게 함
                $('input').each(function() {
                    $(this).next('.alert-validation').remove();
                });
                // 오류 메시지 표시
                Object.keys(data.errors).forEach(function(key, index) {
                    var field = $('[name="' + key + '"]');
                    var topMostDiv = field.closest('.form_row'); // form_row 클래스를 가진 최상위 div 선택

                    // 오류 메시지 추가
                    if (!topMostDiv.next().hasClass('alert-validation')) { // 이미 오류 메시지가 있는지 확인
                        topMostDiv.after('<div class="alert alert-validation">' + data.errors[key] + '</div>');
                    }
                    // 처음 validation 포커스
                    if (index === 0) {
                        input.focus();
                    }
                });
            } else {
                alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.')
            }
            return false
        },
        error: function (data, status, err) {
            console.log(err)
            alert('오류가 발생하였습니다. \n다시 시도해 주세요.')
        },
    })
}

const signUpdate = (postData) => {
    var postData = new FormData(document.querySelector('form'))
    $.ajax({
        url: '/ajax/signUpdate',
        type: 'POST',
        data: postData,
        processData: false,
        contentType: false,
        async: false,
        success: function (data) {
            console.log(data)
            if (data.status === 'success') {
                // 성공
                moveToUrl('/mo/signinSuccess')
                // submitForm();
            }  else if (data.status === 'error') {
                // 한번만 출력되게 함
                $('.alert-validation').remove();
                // 오류 메시지 표시
                Object.keys(data.errors).forEach(function(key, index) {
                    var field = $('[name="' + key + '"]');
                    var topMostDiv = field.closest('.form_row'); // form_row 클래스를 가진 최상위 div 선택

                    // 오류 메시지 추가
                    if (!topMostDiv.next().hasClass('alert-validation')) { // 이미 오류 메시지가 있는지 확인
                        topMostDiv.after('<div class="alert alert-validation">' + data.errors[key] + '</div>');
                    }
                    // 처음 validation 포커스
                    if (index === 0) {
                        field.focus();
                    }
                });
            } else {
            alert('오류가 발생하였습니다. \n다시 시도해 주세요.')
            }
            return false
        },
        error: function (data, status, err) {
            console.log(err)
            alert('오류가 발생하였습니다. \n다시 시도해 주세요.')
        },
    })
}
const signInType = (postData) => {
    var postData = postData
    var grade = document.getElementsByName('grade')
    for (var i = 0; i < grade.length; i++) {
        var isSelected = grade[i].matches(':checked')
        if (isSelected) {
            postData['grade'] = grade[i].value
        }
    }
    var url = ''
    
    switch (postData.grade) {
        case 'grade01':
            url = '/mo/signinSuccess'
            break
        case 'grade02':
            url = '/mo/signinRegular'
            break
        case 'grade03':
            url = '/mo/signinPremium'
            break
        default:
            url = '/mo/signinSuccess'
    }

    // todo : 추후 정회원, 프리미엄이면 결제 연결
    // $.ajax({
    //     url: url,
    //     type: 'POST',
    //     data: postData,
    //     async: false,
    //     success: function (data) {
    //         console.log(data)
    //         if (data) {
    
    // 성공시
    moveToUrl(url, postData)
    
    //         } else {
    //             alert('오류가 발생하였습니다. \n다시 시도해 주세요.')
    //         }
    //         return false
    //     },
    //     error: function (data, status, err) {
    //         console.log(err)
    //         alert('오류가 발생하였습니다. \n다시 시도해 주세요.')
    //     },
    // })
}

const totalAgree = () => {
    // agree1, agree2, agree3 요소들을 가져옴
    const agree1 = document.getElementById('agree1')
    const agree2 = document.getElementById('agree2')
    const agree3 = document.getElementById('agree3')

    // agree1, agree2, agree3의 체크 여부 확인
    const isAllChecked = agree1.checked && agree2.checked && agree3.checked

    // 모든 체크박스의 상태를 변경
    agree1.checked = !isAllChecked
    agree2.checked = !isAllChecked
    agree3.checked = !isAllChecked
}

const chkAgree = () => {
    // agree1, agree2, agree3, totAgree 요소들을 가져옴
    const agree1 = document.getElementById('agree1')
    const agree2 = document.getElementById('agree2')
    const agree3 = document.getElementById('agree3')
    const totAgree = document.getElementById('totAgree')

    // 모든 체크박스가 체크되어 있다면 totAgree도 체크
    const allChecked = agree1.checked && agree2.checked && agree3.checked
    totAgree.checked = allChecked
}

const editPhoto = () => {
    const profile_photo_input = document.getElementById('main_photo')
    profile_photo_input.click()
}

const editPhotoListner = () => {
    const main_photo_input = document.getElementById('main_photo')
    const imgRegist = document.getElementById('profileArea')
    main_photo_input.addEventListener('change', function (e) {
        // 이전에 추가된 이미지 요소들을 모두 제거
        if (main_photo_input.files.length > 0) {
            const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i
            if (!allowedExtensions.exec(main_photo_input.files[0].name)) {
                alert('이미지 파일만 업로드할 수 있습니다.')
                // 입력한 파일을 초기화하여 업로드를 취소
                this.value = ''
            } else {
                imgRegist.innerHTML = ''
                // 최근에 선택된 이미지 파일에 대해 반복
                const latestFileIndex = main_photo_input.files.length - 1
                const latestFile = main_photo_input.files[latestFileIndex]

                // FileReader 객체 생성
                const reader = new FileReader()

                // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                fileUpload(latestFile)
                    .then((data) => {
                        console.log('result : ', data)
                        if (data.org_name) {
                            $('#main_photo_uploaded').html('')
                            const org_name = $('<input type="hidden">').attr('name', 'org_name').val(data.org_name)
                            $('#main_photo_uploaded').append(org_name)
                            const file_name = $('<input type="hidden">').attr('name', 'file_name').val(data.file_name)
                            $('#main_photo_uploaded').append(file_name)
                            const file_path = $('<input type="hidden">').attr('name', 'file_path').val(data.file_path)
                            $('#main_photo_uploaded').append(file_path)
                            const ext = $('<input type="hidden">').attr('name', 'ext').val(data.ext)
                            $('#main_photo_uploaded').append(ext)

                            // 첨부사진을 화면에 뿌림
                            reader.onload = function (e) {
                                // 이미지 요소 생성
                                const imageElement = document.createElement('img')
                                // 이미지 요소에 읽어온 파일의 URL 할당
                                imageElement.src = e.target.result
                                // 이미지에 스타일 적용
                                imageElement.style.borderRadius = '50%'
                                imageElement.style.width = '74px'
                                imageElement.style.height = '74px'
                                // 이미지를 이미지 컨테이너에 추가
                                imgRegist.appendChild(imageElement)
                            }
                            // 파일 읽기 시작
                            reader.readAsDataURL(latestFile)
                        } else {
                            const imageElement = document.createElement('img')
                            // 이미지 요소에 읽어온 파일의 URL 할당
                            imageElement.src = '/static/images/profile_noimg.png'
                            // 이미지에 스타일 적용
                            imageElement.style.borderRadius = '50%'
                            imageElement.style.width = '74px'
                            imageElement.style.height = '74px'
                            // 이미지를 이미지 컨테이너에 추가
                            imgRegist.appendChild(imageElement)
                            alert('사진 사이즈가 너무 큽니다. \n다른 사진을 첨부해 주세요.')
                        }
                    })
                    .catch((error) => {
                        const imageElement = document.createElement('img')
                        // 이미지 요소에 읽어온 파일의 URL 할당
                        imageElement.src = '/static/images/profile_noimg.png'
                        // 이미지에 스타일 적용
                        imageElement.style.borderRadius = '50%'
                        imageElement.style.width = '74px'
                        imageElement.style.height = '74px'
                        imgRegist.appendChild(imageElement)
                        console.error('error : ', error)
                    })

                // javascript에서 fileUpload 호출
            }
        } else {
        }
    })
}
const editPhotoListListner = () => {
    const profile_photo_input = document.getElementById('profile_photo')
    const imgRegist = document.getElementById('profile_photo_view')
    const formData = new FormData(document.querySelector('.main_signin_form'))

    profile_photo_input.addEventListener('change', function () {
        if (profile_photo_input.files.length > 0) {
            for (let i = 0; i < profile_photo_input.files.length; i++) {
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i
                if (!allowedExtensions.exec(profile_photo_input.files[i].name)) {
                    alert('이미지 파일만 업로드할 수 있습니다.')
                    // 입력한 파일을 초기화하여 업로드를 취소
                    this.value = ''
                } else {
                    formData.append('profile_photos[]', profile_photo_input.files[i])
                    // FileReader 객체 생성
                    const reader = new FileReader()

                    // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                    reader.onload = function (e) {
                        // 이미지 요소 생성
                        const imageElement = document.createElement('div')
                        imageElement.style.position = 'relative'
                        imgRegist.prepend(imageElement)

                        // 이미지 요소에 이미지 추가
                        const img = document.createElement('img')
                        img.src = e.target.result
                        img.classList.add('profile_photo_posted')
                        imageElement.appendChild(img)

                        // 삭제 버튼 생성
                        const deleteButton = document.createElement('button')
                        deleteButton.textContent = 'X'
                        deleteButton.classList.add('posted_delete_button')
                        // 삭제 버튼에 클릭 이벤트 추가
                        deleteButton.addEventListener('click', function () {
                            // 이미지 요소 제거
                            imageElement.remove()
                            // FormData에서도 해당 파일 제거
                            formData.delete('profile_photos[]', profile_photo_input.files[i])
                        })
                        // 이미지 요소에 삭제 버튼 추가
                        imageElement.appendChild(deleteButton)
                    }

                    // 파일 읽기 시작
                    reader.readAsDataURL(profile_photo_input.files[i])

                    // javascript에서 fileUpload 호출
                    fileUpload(profile_photo_input.files[i])
                        .then((data) => {
                            console.log('result : ', data)
                        })
                        .catch((error) => {
                            console.error('error : ', error)
                        })
                }
            }
        } else {
        }
    })
}
const editMovListListner = () => {
    const profile_mov_input = document.getElementById('profile_mov')
    const imgRegist = document.getElementById('profile_mov_view')
    const formData = new FormData(document.querySelector('.main_signin_form'))

    profile_mov_input.addEventListener('change', function () {
        if (profile_mov_input.files.length > 0) {
            for (let i = 0; i < profile_mov_input.files.length; i++) {
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i
                if (!allowedExtensions.exec(profile_mov_input.files[i].name)) {
                    alert('이미지 파일만 업로드할 수 있습니다.')
                    // 입력한 파일을 초기화하여 업로드를 취소
                    this.value = ''
                } else {
                    formData.append('profile_movs[]', profile_mov_input.files[i])
                    // FileReader 객체 생성
                    const reader = new FileReader()

                    // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                    reader.onload = function (e) {
                        // 이미지 요소 생성
                        const imageElement = document.createElement('div')
                        imageElement.style.position = 'relative'
                        imgRegist.prepend(imageElement)

                        // 이미지 요소에 이미지 추가
                        const img = document.createElement('img')
                        img.src = e.target.result
                        img.classList.add('profile_photo_posted')
                        imageElement.appendChild(img)

                        // 삭제 버튼 생성
                        const deleteButton = document.createElement('button')
                        deleteButton.textContent = 'X'
                        deleteButton.classList.add('posted_delete_button')
                        // 삭제 버튼에 클릭 이벤트 추가
                        deleteButton.addEventListener('click', function () {
                            // 이미지 요소 제거
                            imageElement.remove()
                            // FormData에서도 해당 파일 제거
                            formData.delete('profile_movs[]', profile_photo_input.files[i])
                        })
                        // 이미지 요소에 삭제 버튼 추가
                        imageElement.appendChild(deleteButton)
                    }

                    // 파일 읽기 시작
                    reader.readAsDataURL(profile_mov_input.files[i])
                }
            }
        } else {
        }
    })
}

const fileUpload = (file) => {
    console.log('전달값 확인 : ', file)
    return new Promise((resolve, reject) => {
        var formData = new FormData()
        formData.append('file', file)
        // console.log('첨부파일 확인 : ', formData.get('file'))
        $.ajax({
            url: '/upload', // todo : 추후 본인인증 연결
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            async: false,
            success: function (res) {
                if (res) {
                    // console.log('result : ', res)
                    resolve(res.data)
                } else {
                    alert('오류가 발생하였습니다. \n다시 시도해 주세요.')
                    reject('오류가 발생하였습니다. \n다시 시도해 주세요.')
                }
            },
            error: function (res, status, err) {
                console.log(err)
                alert('오류가 발생하였습니다. \n다시 시도해 주세요.')
                reject('오류가 발생하였습니다. \n다시 시도해 주세요.')
            },
        })
    })
}
