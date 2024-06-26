/* 공통함수 */
const moveToUrl = (url, param) => {
    if (!param) {
        location.href = url;
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
};

const certIdentify = () => {
    submitForm();
};

const userLogin = () => {
    const emailAddr = document.getElementById('id').value;
    const passwd = document.getElementById('pw').value;
    const autoLogin = document.getElementById('keep').checked;
    console.log(autoLogin);

    // 빈 값 validation
    if (emailAddr.length === 0) {
        fn_alert('이메일 주소를 입력해 주세요.');
        return;
    }

    //휴대폰 번호 11자리 숫자로 validation
    // const phoneRegex = /^\d{11}$/;

    // if (!phoneRegex.test(phoneNumber)) {
    //     fn_alert('휴대폰 번호는 11자리 숫자여야 합니다.');
    //     return;
    // }

    $.ajax({
        url: '/ajax/login',
        type: 'POST',
        data: { email: emailAddr, passwd: passwd, auto_login: autoLogin },
        async: false,
        success: function (data) {
            console.log(data);
            if (data.status === 'success') {
                $.ajax({
                    url: '/ajax/calcMatchRate',
                    type: 'POST',
                    async: false,
                    success: function (data) {
                        moveToUrl('/');
                        console.log(data);
                    },
                    error: function (data, status, err) {
                        console.log(err);
                        fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    },
                });
                //location.href = '/index/login'
            } else {
                fn_alert(data.message);
            }
            return false;
        },
        error: function (data, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });
};
const supportUserLogin = () => {
    const emailAddr = document.getElementById('id').value;
    const passwd = document.getElementById('pw').value;
    const autoLogin = document.getElementById('keep').checked;

    // 빈 값 validation
    if (emailAddr.length === 0) {
        fn_alert('이메일 주소를 입력해 주세요.');
        return;
    }

    //휴대폰 번호 11자리 숫자로 validation
    // const phoneRegex = /^\d{11}$/;

    // if (!phoneRegex.test(phoneNumber)) {
    //     fn_alert('휴대폰 번호는 11자리 숫자여야 합니다.');
    //     return;
    // }

    $.ajax({
        url: '/ajax/support/login',
        type: 'POST',
        data: { email: emailAddr, passwd: passwd, auto_login: autoLogin },
        async: false,
        success: function (data) {
            console.log(data);
            if (data.status === 'success') {
                moveToUrl('/support');//변경 필요
                console.log(data);
                // $.ajax({
                //     url: '/ajax/calcMatchRate',
                //     type: 'POST',
                //     async: false,
                //     success: function (data) {
                //         moveToUrl('/');
                //         console.log(data);
                //     },
                //     error: function (data, status, err) {
                //         console.log(err);
                //         fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                //     },
                // });
                //location.href = '/index/login'
            } else {
                fn_alert(data.message);
            }
            return false;
        },
        error: function (data, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });
};
const userLogout = () => {
    fn_confirm('로그아웃 하시겠습니까?', 'logout');
};
const spLogout = () => {
    fn_confirm('나가시겠습니까?', 'splogout');
};
function fn_userLogout(value) {
    if (value) {
        $.ajax({
            url: '/ajax/logout',
            type: 'POST',
            async: false,
            success: function (data) {
                console.log(data);
                fn_alert('로그아웃 되었습니다.', '/');
                // moveToUrl('/');
            },
            error: function (data, status, err) {
                console.log(err);
                fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            },
        });
    }
}
function fn_spLogout(value) {
    moveToUrl('/');
}
// const userLogout = () => {
//     if (confirm('로그아웃 하시겠습니까?')) {
//         $.ajax({
//             url: '/ajax/logout',
//             type: 'POST',
//             async: false,
//             success: function (data) {
//                 console.log(data);
//                 fn_alert('로그아웃 되었습니다.','/');
//                 // moveToUrl('/');
//             },
//             error: function (data, status, err) {
//                 console.log(err);
//                 fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
//             },
//         });
//     }
// };

const submitForm = () => {
    document.querySelector('form').submit();
};
const submitFormAgree = () => {
    const agree1 = document.getElementById('agree1');
    const agree2 = document.getElementById('agree2');
    const agree3 = document.getElementById('agree3');
    const agree4 = document.getElementById('agree4');

    // agree1, agree2, agree3의 체크 여부 확인
    const isAllChecked = agree1.checked && agree2.checked && agree3.checked && agree4.checked;

    // 모든 체크박스의 상태를 변경
    if (isAllChecked) {
        submitForm();
    } else {
        fn_alert('항목에 동의해 주세요');
        return false;
    }
};

const SupportSubmitFormAgree = () => {
    const agree1 = document.getElementById('agree1');
    const agree2 = document.getElementById('agree2');
    const agree3 = document.getElementById('agree3');
    const agree4 = document.getElementById('agree4');

    // agree1, agree2, agree3의 체크 여부 확인
    const isAllChecked = agree1.checked && agree2.checked && agree3.checked && agree4.checked;

    // 모든 체크박스의 상태를 변경
    if (isAllChecked) {
        document.getElementById('hiddenAgree1').value = agree1.checked ? 'Y' : 'N';
        document.getElementById('hiddenAgree2').value = agree2.checked ? 'Y' : 'N';
        document.getElementById('hiddenAgree3').value = agree3.checked ? 'Y' : 'N';
        document.getElementById('hiddenAgree4').value = agree4.checked ? 'Y' : 'N';

        submitForm();
    } else {
        fn_alert('항목에 동의해 주세요');
        return false;
    }
};

const signUp = () => {
    var postData = new FormData(document.querySelector('form'));

    let tempValidation = false;
    if ($('#name').val().trim() === '') {
        fn_alert('이름을 입력해 주세요');
        tempValidation = false;
        $('#name').focus();
    } else if ($('#birthday').val().trim() === '') {
        fn_alert('생년월일을 입력해 주세요');
        tempValidation = false;
        $('#birthday').focus();
    } else if ($('#city').val().trim() === '') {
        fn_alert('시/도를 선택해 주세요');
        tempValidation = false;
        $('#city').focus();
    } else if ($('#town').val().trim() === '') {
        fn_alert('시/군/구를 선택해 주세요');
        tempValidation = false;
        $('#city').focus();
    } else if ($('#gender').val().trim() === '') {
        fn_alert('성별을 선택해 주세요');
        tempValidation = false;
        $('#gender').focus();
    } else if ($('#pswd').val().trim() === '') {
        fn_alert('비밀번호를 입력해 주세요');
        tempValidation = false;
        $('#pswd').focus();
    } else if ($('#pswdChk').val().trim() === '') {
        fn_alert('비밀번호를 다시 입력해 주세요');
        tempValidation = false;
        $('#pswdChk').focus();
    }

    if (
        $('#name').val() !== '' &&
        $('#birthday').val() !== '' &&
        $('#city').val() !== '' &&
        $('#town').val() !== '' &&
        $('#pswd').val() !== '' &&
        $('#pswdChk').val() !== '' &&
        $('#gender').val() !== ''
    ) {
        tempValidation = true;
    }
    if (tempValidation) {
        if ($('#pswd').val() !== $('#pswdChk').val()) {
            fn_alert('비밀번호를 확인해 주세요');
            $('#pswd').focus();
        } else {
            $.ajax({
                url: '/ajax/signUp', // todo : 추후 본인인증 연결
                type: 'POST',
                data: postData,
                processData: false,
                contentType: false,
                async: false,
                success: function (data) {
                    console.log(data);
                    if (data.status === 'success') {
                        // 성공
                        var formData = document.querySelector('form');
                        if (!data.data.org_name) {
                            data.data.org_name = 'profile_noimg.png';
                            data.data.file_name = 'profile_noimg.png';
                            data.data.file_path = 'static/images/';
                            data.data.ext = 'png';
                        }
                        for (var key in data.data) {
                            if (data.data.hasOwnProperty(key)) {
                                if (key === 'ci') {
                                    var input = document.createElement('input');
                                    input.type = 'hidden'; // hidden 필드로 생성
                                    input.name = key;
                                    input.value = data.data[key];
                                    formData.appendChild(input);
                                }
                                if (key === 'mobile_no') {
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
                        if (data.result === '2') {
                            // 중복이메일
                            fn_alert('이미 가입된 메일주소입니다. 다른 메일주소를 사용해 주세요.');
                            // 코드 확인
                            var regBtn = $('#emailBtn');
                            var emailCodeTxt = $('#emailReg');
                            var chkBtn = $('#emailRegBtn');

                            // 이메일입력, 코드입력, 인증코드 모두 비활성화
                            // emailTxt.prop('disabled', true);
                            regBtn.prop('disabled', false);
                            emailCodeTxt.prop('disabled', false);
                            chkBtn.prop('disabled', false);
                        } else if (data.result === '5') {
                            // 중복이메일
                            fn_alert('인증되지 않은 이메일 주소입니다. ');
                        } else {
                            // 한번만 출력되게 함
                            $('.alert_validation').remove();
                            // 오류 메시지 표시
                            Object.keys(data.errors).forEach(function (key, index) {
                                var field = $('[name="' + key + '"]');
                                var topMostDiv = field.closest('.form_row'); // form_row 클래스를 가진 최상위 div 선택

                                // 오류 메시지 추가
                                if (!topMostDiv.next().hasClass('alert_validation')) {
                                    // 이미 오류 메시지가 있는지 확인
                                    topMostDiv.after(
                                        '<div class="alert alert_validation">' + data.errors[key] + '</div>',
                                    );
                                }
                                // 처음 validation 포커스
                                if (index === 0) {
                                    field.focus();
                                }
                            });
                        }
                    } else {
                        fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function (data, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }
    } else {
    }
};

const signUpSupporters = () => {
    var postData = new FormData(document.querySelector('form'));

    let tempValidation = false;
    if ($('#name').val().trim() === '') {
        fn_alert('이름을 입력해 주세요');
        tempValidation = false;
        $('#name').focus();
    } else if ($('#birthday').val().trim() === '') {
        fn_alert('생년월일을 입력해 주세요');
        tempValidation = false;
        $('#birthday').focus();
    } else if ($('#city').val().trim() === '') {
        fn_alert('시/도를 선택해 주세요');
        tempValidation = false;
        $('#city').focus();
    } else if ($('#town').val().trim() === '') {
        fn_alert('시/군/구를 선택해 주세요');
        tempValidation = false;
        $('#city').focus();
    } else if ($('#gender').val().trim() === '') {
        fn_alert('성별을 선택해 주세요');
        tempValidation = false;
        $('#gender').focus();
    } else if ($('#pswd').val().trim() === '') {
        fn_alert('비밀번호를 입력해 주세요');
        tempValidation = false;
        $('#pswd').focus();
    } else if ($('#pswdChk').val().trim() === '') {
        fn_alert('비밀번호를 다시 입력해 주세요');
        tempValidation = false;
        $('#pswdChk').focus();
    }

    if (
        $('#name').val() !== '' &&
        $('#birthday').val() !== '' &&
        $('#city').val() !== '' &&
        $('#town').val() !== '' &&
        $('#pswd').val() !== '' &&
        $('#pswdChk').val() !== '' &&
        $('#gender').val() !== ''
    ) {
        tempValidation = true;
    }
    if (tempValidation) {
        if ($('#pswd').val() !== $('#pswdChk').val()) {
            fn_alert('비밀번호를 확인해 주세요');
            $('#pswd').focus();
        } else {
            $.ajax({
                url: '/ajax/support/signUp', // todo : 추후 본인인증 연결
                type: 'POST',
                data: postData,
                processData: false,
                contentType: false,
                async: false,
                success: function (data) {
                    console.log(data);
                    if (data.status === 'success') {
                        // 성공
                        moveToUrl('/support/signinSuccess');
                    } else if (data.status === 'error') {
                        if (data.result === '2') {
                            // 중복이메일
                            fn_alert('이미 가입된 메일주소입니다. 다른 메일주소를 사용해 주세요.');
                            // 코드 확인
                            var regBtn = $('#emailBtn');
                            var emailCodeTxt = $('#emailReg');
                            var chkBtn = $('#emailRegBtn');

                            // 이메일입력, 코드입력, 인증코드 모두 비활성화
                            // emailTxt.prop('disabled', true);
                            regBtn.prop('disabled', false);
                            emailCodeTxt.prop('disabled', false);
                            chkBtn.prop('disabled', false);
                        } else if (data.result === '5') {
                            // 중복이메일
                            fn_alert('인증되지 않은 이메일 주소입니다. ');
                        } else {
                            // 한번만 출력되게 함
                            $('.alert_validation').remove();
                            // 오류 메시지 표시
                            Object.keys(data.errors).forEach(function (key, index) {
                                var field = $('[name="' + key + '"]');
                                var topMostDiv = field.closest('.form_row'); // form_row 클래스를 가진 최상위 div 선택

                                // 오류 메시지 추가
                                if (!topMostDiv.next().hasClass('alert_validation')) {
                                    // 이미 오류 메시지가 있는지 확인
                                    topMostDiv.after(
                                        '<div class="alert alert_validation">' + data.errors[key] + '</div>',
                                    );
                                }
                                // 처음 validation 포커스
                                if (index === 0) {
                                    field.focus();
                                }
                            });
                        }
                    } else {
                        fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function (data, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }
    } else {
    }
};

const isValidRecommendCode = (inviteCode, callback) => {
    $.ajax({
        url: '/ajax/isValidRecommendCode',
        type: 'POST',
        data: { inviteCode: inviteCode },
        success: function (data) {
            console.log(data);
            if (data.isValid) {
                callback(true);
            } else {
                fn_alert('유효하지 않은 초대 코드입니다.');
                callback(false);
            }
        },
        error: function (data, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            callback(false);
        },
    });
};

const signUpdate = (postData) => {
    let tempValidation = false;
    if (!postData) {
        if ($('#marital').val().trim() === '') {
            fn_alert('결혼경험유무를 선택해 주세요');
            tempValidation = false;
            $('#marital').focus();
        } else if ($('#smoking').val().trim() === '') {
            fn_alert('흡연유무를 선택해 주세요');
            tempValidation = false;
            $('#smoking').focus();
        } else if ($('#drinking').val().trim() === '') {
            fn_alert('음주횟수를 선택해 주세요');
            tempValidation = false;
            $('#drinking').focus();
        } else if ($('#religion').val().trim() === '') {
            fn_alert('종교를 선택해 주세요');
            tempValidation = false;
            $('#religion').focus();
        } else if ($('#mbti').val().trim() === '') {
            fn_alert('MBTI를 선택해 주세요');
            tempValidation = false;
            $('#mbti').focus();
        } else if ($('#height').val().trim() === '') {
            fn_alert('키를 입력해 주세요');
            tempValidation = false;
            $('#height').focus();
        } else if ($('#bodyshape').val().trim() === '') {
            fn_alert('체형을 선택해 주세요');
            tempValidation = false;
            $('#bodyshape').focus();
        } else if ($('#personal_style').val().trim() === '') {
            fn_alert('스타일을 선택해 주세요');
            tempValidation = false;
            $('#personal_style').focus();
        } else if ($('#education').val().trim() === '') {
            fn_alert('최종학력을 선택해 주세요');
            tempValidation = false;
            $('#education').focus();
        } else if ($('#major').val().trim() === '') {
            fn_alert('전공을 입력해 주세요');
            tempValidation = false;
            $('#major').focus();
        } else if ($('#school').val().trim() === '') {
            fn_alert('학교명을 입력해 주세요');
            tempValidation = false;
            $('#school').focus();
        } else if ($('#job').val().trim() === '') {
            fn_alert('직업을 선택해 주세요');
            tempValidation = false;
            $('#job').focus();
        } else if ($('#asset_range').val().trim() === '') {
            fn_alert('자산구간을 선택해 주세요');
            tempValidation = false;
            $('#asset_range').focus();
        } else if ($('#income_range').val().trim() === '') {
            fn_alert('연소득을 선택해 주세요');
            tempValidation = false;
            $('#income_range').focus();
        }

        if (
            $('#marital').val() !== '' &&
            $('#smoking').val() !== '' &&
            $('#drinking').val() !== '' &&
            $('#religion').val() !== '' &&
            $('#mbti').val() !== '' &&
            $('#height').val() !== '' &&
            $('#bodyshape').val() !== '' &&
            $('#personal_style').val() !== '' &&
            $('#education').val() !== '' &&
            $('#major').val() !== '' &&
            $('#school').val() !== '' &&
            $('#job').val() !== '' &&
            $('#asset_range').val() !== '' &&
            $('#income_range').val() !== ''
        ) {
            tempValidation = true;
        }
    } else {
        tempValidation = true;
    }
    if ($('#nickname').length > 0 && $('#nickname').val().trim() === '') {
        fn_alert('닉네임을 입력해 주세요');
        $('#nickname').focus();
        tempValidation = false;
    }

    if (tempValidation) {
        var postData = new FormData(document.querySelector('form'));

        $.ajax({
            url: '/ajax/signUpdate',
            type: 'POST',
            data: postData,
            processData: false,
            contentType: false,
            async: false,
            success: function (data) {
                console.log(data);
                if (data.status === 'success') {
                    // 성공
                    const path = window.location.pathname;

                    if (
                        path.includes('/mo/updateMyinfo') ||
                        path.includes('/mo/updatePremium') ||
                        path.includes('/mo/updateRegular')
                    ) {
                        moveToUrl('/mo/mypage');
                    } else {
                        moveToUrl('/mo/signinSuccess');
                    }
                    // submitForm();
                } else if (data.status === 'error') {
                    // 한번만 출력되게 함
                    $('.alert_validation').remove();
                    // 오류 메시지 표시
                    Object.keys(data.errors).forEach(function (key, index) {
                        var field = $('[name="' + key + '"]');
                        var topMostDiv = field.closest('.form_row'); // form_row 클래스를 가진 최상위 div

                        // 오류 메시지 추가
                        if (!topMostDiv.next().hasClass('alert_validation')) {
                            // 이미 오류 메시지가 있는지 확인
                            topMostDiv.after('<div class="alert alert_validation">' + data.errors[key] + '</div>');
                        }
                        // 처음 validation 포커스
                        if (index === 0) {
                            field.focus();
                        }
                    });
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
const myinfoUpdate = (grade) => {
    let tempValidation = false;
    if (!grade) {
        if ($('#marital').val().trim() === '') {
            fn_alert('결혼경험유무를 선택해 주세요');
            tempValidation = false;
            $('#marital').focus();
        } else if ($('#smoking').val().trim() === '') {
            fn_alert('흡연유무를 선택해 주세요');
            tempValidation = false;
            $('#smoking').focus();
        } else if ($('#drinking').val().trim() === '') {
            fn_alert('음주횟수를 선택해 주세요');
            tempValidation = false;
            $('#drinking').focus();
        } else if ($('#religion').val().trim() === '') {
            fn_alert('종교를 선택해 주세요');
            tempValidation = false;
            $('#religion').focus();
        } else if ($('#mbti').val().trim() === '') {
            fn_alert('MBTI를 선택해 주세요');
            tempValidation = false;
            $('#mbti').focus();
        } else if ($('#height').val().trim() === '') {
            fn_alert('키를 입력해 주세요');
            tempValidation = false;
            $('#height').focus();
        } else if ($('#bodyshape').val().trim() === '') {
            fn_alert('체형을 선택해 주세요');
            tempValidation = false;
            $('#bodyshape').focus();
        } else if ($('#personal_style').val().trim() === '') {
            fn_alert('스타일을 선택해 주세요');
            tempValidation = false;
            $('#personal_style').focus();
        } else if ($('#education').val().trim() === '') {
            fn_alert('최종학력을 선택해 주세요');
            tempValidation = false;
            $('#education').focus();
        } else if ($('#major').val().trim() === '') {
            fn_alert('전공을 입력해 주세요');
            tempValidation = false;
            $('#major').focus();
        } else if ($('#school').val().trim() === '') {
            fn_alert('학교명을 입력해 주세요');
            tempValidation = false;
            $('#school').focus();
        } else if ($('#job').val().trim() === '') {
            fn_alert('직업을 선택해 주세요');
            tempValidation = false;
            $('#job').focus();
        } else if ($('#asset_range').val().trim() === '') {
            fn_alert('자산구간을 선택해 주세요');
            tempValidation = false;
            $('#asset_range').focus();
        } else if ($('#income_range').val().trim() === '') {
            fn_alert('연소득을 선택해 주세요');
            tempValidation = false;
            $('#income_range').focus();
        }

        if (
            $('#marital').val() !== '' &&
            $('#smoking').val() !== '' &&
            $('#drinking').val() !== '' &&
            $('#religion').val() !== '' &&
            $('#mbti').val() !== '' &&
            $('#height').val() !== '' &&
            $('#bodyshape').val() !== '' &&
            $('#personal_style').val() !== '' &&
            $('#education').val() !== '' &&
            $('#major').val() !== '' &&
            $('#school').val() !== '' &&
            $('#job').val() !== '' &&
            $('#asset_range').val() !== '' &&
            $('#income_range').val() !== ''
        ) {
            tempValidation = true;
        }
    } else {
        tempValidation = true;
    }
    if ($('#nickname').length > 0 && $('#nickname').val().trim() === '') {
        fn_alert('닉네임을 입력해 주세요');
        $('#nickname').focus();
        tempValidation = false;
    }

    if (tempValidation) {
        var postData = new FormData(document.querySelector('form'));

        $.ajax({
            url: '/ajax/myinfoUpdate',
            type: 'POST',
            data: postData,
            processData: false,
            contentType: false,
            async: false,
            success: function (data) {
                console.log(data);
                if (data.status === 'success') {
                    // 성공
                    const path = window.location.pathname;

                    if (
                        path.includes('/mo/updateMyinfo') ||
                        path.includes('/mo/updatePremium') ||
                        path.includes('/mo/updateRegular')
                    ) {
                        moveToUrl('/mo/mypage');
                    } else {
                        moveToUrl('/mo/signinSuccess');
                    }
                    // submitForm();
                } else if (data.status === 'error') {
                    // 한번만 출력되게 함
                    $('.alert_validation').remove();
                    // 오류 메시지 표시
                    Object.keys(data.errors).forEach(function (key, index) {
                        var field = $('[name="' + key + '"]');
                        var topMostDiv = field.closest('.form_row'); // form_row 클래스를 가진 최상위 div

                        // 오류 메시지 추가
                        if (!topMostDiv.next().hasClass('alert_validation')) {
                            // 이미 오류 메시지가 있는지 확인
                            topMostDiv.after('<div class="alert alert_validation">' + data.errors[key] + '</div>');
                        }
                        // 처음 validation 포커스
                        if (index === 0) {
                            field.focus();
                        }
                    });
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
const signInType = (postData) => {
    var postData = postData;
    var grade = document.getElementsByName('grade');
    for (var i = 0; i < grade.length; i++) {
        var isSelected = grade[i].matches(':checked');
        if (isSelected) {
            postData['grade'] = grade[i].value;
        }
    }
    var url = '';

    switch (postData.grade) {
        case 'grade01':
            url = '/mo/signinSuccess';
            break;
        case 'grade02':
            url = '/mo/signinRegular';
            break;
        case 'grade03':
            url = '/mo/signinPremium';
            break;
        default:
            url = '/mo/signinSuccess';
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
    if (postData.grade === 'grade01') {
        moveToUrl(url);
    } else {
        moveToUrl(url, postData); //계좌 2. grade03 있음
    }

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
};

const upgradeGrade = (selectedGrade) => {
    var url = '';

    switch (selectedGrade) {
        case 'grade02':
            url = '/mo/signinRegular';
            break;
        case 'grade03':
            url = '/mo/signinPremium';
            break;
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

    $.ajax({
        url: '/ajax/upgradeGrade',
        type: 'POST',
        data: { grade: selectedGrade },
        async: false,
        success: function (response) {
            console.log('Grade submitted successfully:', response.data);
            moveToUrl(url, response.data);
        },
        error: function (data, status, err) {
            console.log(err);
            alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });

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
};

const totalAgree = () => {
    // agree1, agree2, agree3 요소들을 가져옴
    const agree1 = document.getElementById('agree1');
    const agree2 = document.getElementById('agree2');
    const agree3 = document.getElementById('agree3');
    const agree4 = document.getElementById('agree4');

    // agree1, agree2, agree3의 체크 여부 확인
    const isAllChecked = agree1.checked && agree2.checked && agree3.checked && agree4.checked;

    // 모든 체크박스의 상태를 변경
    agree1.checked = !isAllChecked;
    agree2.checked = !isAllChecked;
    agree3.checked = !isAllChecked;
    agree4.checked = !isAllChecked;
};

const chkAgree = () => {
    // agree1, agree2, agree3, totAgree 요소들을 가져옴
    const agree1 = document.getElementById('agree1');
    const agree2 = document.getElementById('agree2');
    const agree3 = document.getElementById('agree3');
    const agree4 = document.getElementById('agree4');
    const totAgree = document.getElementById('totAgree');

    // 모든 체크박스가 체크되어 있다면 totAgree도 체크
    const allChecked = agree1.checked && agree2.checked && agree3.checked && agree4.checked;
    totAgree.checked = allChecked;
};

const editPhoto = () => {
    const profile_photo_input = document.getElementById('main_photo');
    profile_photo_input.click();
};

const editPhotoListner = () => {
    const main_photo_input = document.getElementById('main_photo');
    const imgRegist = document.getElementById('profileArea');
    main_photo_input.addEventListener('change', function (e) {
        // 이전에 추가된 이미지 요소들을 모두 제거
        if (main_photo_input.files.length > 0) {
            const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i;
            if (!allowedExtensions.exec(main_photo_input.files[0].name)) {
                fn_alert('이미지 파일만 업로드할 수 있습니다.');
                // 입력한 파일을 초기화하여 업로드를 취소
                this.value = '';
            } else {
                imgRegist.innerHTML = '';
                // 최근에 선택된 이미지 파일에 대해 반복
                const latestFileIndex = main_photo_input.files.length - 1;
                const latestFile = main_photo_input.files[latestFileIndex];

                // FileReader 객체 생성
                const reader = new FileReader();

                // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                fileUpload(latestFile)
                    .then((data) => {
                        console.log('result : ', data);
                        if (data.org_name) {
                            $('#main_photo_uploaded').html('');
                            const org_name = $('<input type="hidden">').attr('name', 'org_name').val(data.org_name);
                            $('#main_photo_uploaded').append(org_name);
                            const file_name = $('<input type="hidden">').attr('name', 'file_name').val(data.file_name);
                            $('#main_photo_uploaded').append(file_name);
                            const file_path = $('<input type="hidden">').attr('name', 'file_path').val(data.file_path);
                            $('#main_photo_uploaded').append(file_path);
                            const ext = $('<input type="hidden">').attr('name', 'ext').val(data.ext);
                            $('#main_photo_uploaded').append(ext);

                            // 첨부사진을 화면에 뿌림
                            reader.onload = function (e) {
                                // 이미지 요소 생성
                                const imageElement = document.createElement('img');
                                // 이미지 요소에 읽어온 파일의 URL 할당
                                imageElement.src = e.target.result;
                                // 이미지에 스타일 적용
                                imageElement.style.borderRadius = '50%';
                                imageElement.style.width = '74px';
                                imageElement.style.height = '74px';
                                // 이미지를 이미지 컨테이너에 추가
                                imgRegist.appendChild(imageElement);
                            };
                            // 파일 읽기 시작
                            reader.readAsDataURL(latestFile);
                        } else {
                            const imageElement = document.createElement('img');
                            // 이미지 요소에 읽어온 파일의 URL 할당
                            imageElement.src = '/static/images/profile_noimg.png';
                            // 이미지에 스타일 적용
                            imageElement.style.borderRadius = '50%';
                            imageElement.style.width = '74px';
                            imageElement.style.height = '74px';
                            // 이미지를 이미지 컨테이너에 추가
                            imgRegist.appendChild(imageElement);
                            fn_alert(data);
                        }
                    })
                    .catch((error) => {
                        const imageElement = document.createElement('img');
                        // 이미지 요소에 읽어온 파일의 URL 할당
                        imageElement.src = '/static/images/profile_noimg.png';
                        // 이미지에 스타일 적용
                        imageElement.style.borderRadius = '50%';
                        imageElement.style.width = '74px';
                        imageElement.style.height = '74px';
                        imgRegist.appendChild(imageElement);
                        console.error('error : ', error);
                    });

                // javascript에서 fileUpload 호출
            }
        } else {
        }
    });
};
const editPhotoListListner = () => {
    const profile_photo_input = document.getElementById('profile_photo');
    const profile_mov_input = document.getElementById('profile_mov');
    const imgRegist = document.getElementById('profile_photo_view');
    const imgRegist2 = document.getElementById('profile_mov_view');
    // 파일 정보 저장할 배열
    let uploadedFiles = [];
    let uploadedMovs = [];

    profile_photo_input.addEventListener('change', function () {
        if (profile_photo_input.files.length > 0) {
            for (let i = 0; i < profile_photo_input.files.length; i++) {
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.webp|\.svg)$/i;
                if (!allowedExtensions.exec(profile_photo_input.files[i].name)) {
                    fn_alert('이미지 파일만 업로드할 수 있습니다.');
                    // 입력한 파일을 초기화하여 업로드를 취소
                    this.value = '';
                } else {
                    // FileReader 객체 생성
                    const reader = new FileReader();

                    // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                    reader.onload = function (e) {
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
                                if (data.org_name) {
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
                                    deleteButton.addEventListener('click', function () {
                                        // 이미지 요소 제거
                                        imageElement.remove();
                                        uploadedFiles = uploadedFiles.filter(
                                            (file) => file.file_name !== fileInfo.file_name,
                                        );
                                    });
                                    // 이미지 요소에 삭제 버튼 추가
                                    imageElement.appendChild(deleteButton);
                                } else {
                                    fn_alert(data);
                                }
                            })
                            .catch((error) => {
                                console.error('error : ', error);
                            });
                    };
                    // 파일 읽기 시작
                    reader.readAsDataURL(profile_photo_input.files[i]);
                }
            }
        } else {
        }
    });

    profile_mov_input.addEventListener('change', function () {
        if (profile_mov_input.files.length > 0) {
            for (let i = 0; i < profile_mov_input.files.length; i++) {
                const allowedExtensions = /(\.mp4|\.avi|\.mov|\.mkv|\.flv|\.wmv|\.webm)$/i;
                if (!allowedExtensions.exec(profile_mov_input.files[i].name)) {
                    fn_alert('이미지 파일만 업로드할 수 있습니다.');
                    // 입력한 파일을 초기화하여 업로드를 취소
                    this.value = '';
                } else {
                    // FileReader 객체 생성
                    const reader = new FileReader();

                    // 파일 읽기가 완료되었을 때 실행되는 콜백 함수 정의
                    reader.onload = function (e) {
                        // 이미지 요소 생성
                        const imageElement = document.createElement('div');
                        imageElement.style.position = 'relative';
                        imgRegist2.prepend(imageElement);

                        // 이미지 요소에 이미지 추가
                        const img = document.createElement('video');
                        img.src = e.target.result;
                        img.setAttribute('width', '100%');
                        img.setAttribute('height', '100%');
                        img.addEventListener('click', function () {
                            if (img.paused) {
                                img.play();
                            } else {
                                img.pause();
                            }
                        });
                        img.classList.add('profile_photo_posted');
                        imageElement.appendChild(img);

                        // javascript에서 fileUpload 호출
                        fileUpload(profile_mov_input.files[i])
                            .then((data) => {
                                if (data.org_name) {
                                    const fileInfo = {
                                        org_name: data.org_name,
                                        file_name: data.file_name,
                                        file_path: data.file_path,
                                        ext: data.ext,
                                    };
                                    uploadedMovs.push(fileInfo);

                                    // 삭제 버튼 생성
                                    const deleteButton = document.createElement('span');
                                    // deleteButton.textContent = 'X';
                                    deleteButton.classList.add('feed_close_button');
                                    // 삭제 버튼에 클릭 이벤트 추가
                                    deleteButton.addEventListener('click', function () {
                                        // 이미지 요소 제거
                                        imageElement.remove();
                                        uploadedMovs = uploadedMovs.filter(
                                            (file) => file.file_name !== fileInfo.file_name,
                                        );
                                    });
                                    // 이미지 요소에 삭제 버튼 추가
                                    imageElement.appendChild(deleteButton);
                                } else {
                                    fn_alert(data);
                                }
                            })
                            .catch((error) => {
                                console.error('error : ', error);
                            });
                    };
                    // 파일 읽기 시작
                    reader.readAsDataURL(profile_mov_input.files[i]);
                }
            }
        } else {
        }
    });

    $('#skipButton, #saveButton').click(function (e) {
        $('.layerPopup').show();
    });
    $('.layerPopup_bottom .btn').click(function (event) {
        event.preventDefault();
        if ($(this).hasClass('type01')) {
            var inviteCode = $('#invite_code').val();
            isValidRecommendCode(inviteCode, function (isValid) {
                if (isValid) {
                    const formData = new FormData();

                    // 기존의 input 요소의 값을 FormData에 추가
                    const inputElements = document.querySelectorAll('.main_signin_form input');
                    inputElements.forEach((input) => {
                        formData.append(input.name, input.value);
                    });
                    uploadedFiles.forEach((file, index) => {
                        for (const key in file) {
                            formData.append(`uploadedFiles[${index}][${key}]`, file[key]);
                        }
                    });
                    uploadedMovs.forEach((file, index) => {
                        for (const key in file) {
                            formData.append(`uploadedMovs[${index}][${key}]`, file[key]);
                        }
                    });

                    // 수정된 FormData를 서버로 전송
                    fetch('/ajax/updtUserData', {
                        method: 'POST',
                        body: formData,
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            console.log('Upload success', data);
                            moveToUrl('/mo/signinType', {
                                ci: data.data.ci,
                                mobile_no: data.data.mobile_no,
                                file_path: $('#file_path').val(),
                                file_name: $('#file_name').val(),
                                invite_code: $('#invite_code').val(),
                            });
                            // 성공한 경우, 필요에 따라 리다이렉션 또는 메시지 표시 등의 작업 수행
                        })
                        .catch((error) => {
                            console.error('Upload failed', error);
                            // 실패한 경우, 오류 메시지 표시 등의 작업 수행
                        });
                }
            });
        } else {
            $('#invite_code').val(null);
            const formData = new FormData();

            // 기존의 input 요소의 값을 FormData에 추가
            const inputElements = document.querySelectorAll('.main_signin_form input');
            inputElements.forEach((input) => {
                formData.append(input.name, input.value);
            });
            uploadedFiles.forEach((file, index) => {
                for (const key in file) {
                    formData.append(`uploadedFiles[${index}][${key}]`, file[key]);
                }
            });
            uploadedMovs.forEach((file, index) => {
                for (const key in file) {
                    formData.append(`uploadedMovs[${index}][${key}]`, file[key]);
                }
            });

            // 수정된 FormData를 서버로 전송
            fetch('/ajax/updtUserData', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    console.log('Upload success', data);
                    moveToUrl('/mo/signinType', {
                        ci: data.data.ci,
                        mobile_no: data.data.mobile_no,
                        file_path: $('#file_path').val(),
                        file_name: $('#file_name').val(),
                    });
                    // 성공한 경우, 필요에 따라 리다이렉션 또는 메시지 표시 등의 작업 수행
                })
                .catch((error) => {
                    console.error('Upload failed', error);
                    // 실패한 경우, 오류 메시지 표시 등의 작업 수행
                });
        }
    });
};

const fileUpload = (file) => {
    if (file) {
        return new Promise((resolve, reject) => {
            var formData = new FormData();
            formData.append('file', file);
            // console.log('첨부파일 확인 : ', formData.get('file'))
            $.ajax({
                url: '/upload',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                async: false,
                success: function (res) {
                    if (res) {
                        // console.log('result : ', res)
                        resolve(res.data);
                    } else {
                        fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                        reject('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                },
                error: function (res, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    reject('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        });
    }
};

const showPopupRgt = (contents, ci) => {
    console.log(contents, ci);
    // image input 초기화
    const imgRegist = document.getElementById('profile_regist_label');
    imgRegist.style.display = 'block';
    var previousImage = document.getElementById('newImage');
    if (previousImage) {
        previousImage.parentNode.removeChild(previousImage);
    }
    $('#ci').val(ci);
    $('#type').val(contents);

    var title = '';
    var value = '';

    switch (contents) {
        case 'school':
            title = '졸업증명서';
            value = certificationCon3;
            break;
        case 'job':
            title = '명함/재직증명서';
            value = certificationCon3;
            break;
        case 'marital':
            title = '혼인관계증명서';
            value = certificationCon4;
            break;
        case 'asset_range':
            title = '잔고증명/등기부등본';
            value = certificationCon3;
            break;
        case 'income_range':
            title = '소득금액증명';
            value = certificationCon3;
            break;
        default:
            title = '졸업증명서';
            value = certificationCon3;
    }
    $('#type').text(title);
    $('#certifi_con').html(value);
    $('.layerPopup').css('display', 'flex');
};

const closePopup = () => {
    $('.layerPopup').css('display', 'none');
};

const submitFile = () => {
    const agree1 = document.getElementById('totAgree');

    if (agree1.checked) {
        $('.layerPopup').css('display', 'none');
    } else {
        fn_alert('항목에 동의해 주세요');
        return false;
    }
};
const regEmail = () => {
    const email = $('#email').val();
    const ci = $('#mobile_no').val();
    $.ajax({
        url: '/ajax/getVerifyCode',
        type: 'POST',
        data: {
            email: email,
            ci: ci,
        },
        async: false,
        success: function (data) {
            console.log(data);
            if (data.result === '0' && data.email) {
                var countP = $('#countdown');
                var emailTxt = $('#email');
                var regBtn = $('#emailBtn');
                countP.css('display', 'block');
                var minutes = 5;
                var seconds = 0;

                // regBtn.prop('disabled', true);
                // emailTxt.prop('disabled', true);
                var countdownInterval = setInterval(function () {
                    if (seconds === 0) {
                        if (minutes === 0) {
                            clearInterval(countdownInterval);
                            countP.css('display', 'none');
                            // regBtn.prop('disabled', false);
                            // emailTxt.prop('disabled', false);
                            return;
                        } else {
                            minutes--;
                            seconds = 59;
                        }
                    } else {
                        seconds--;
                    }

                    var formattedSeconds = seconds < 10 ? '0' + seconds : seconds;
                    countP.text(minutes + ':' + formattedSeconds);
                }, 1000);
            } else if (data.result === '1') {
                fn_alert('이메일 형식을 다시 확인해 주세요.');
            } else {
                fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            }
        },
        error: function (res, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });
};

const regCode = () => {
    const email = $('#email').val();
    const ci = $('#mobile_no').val();
    const code = $('#emailReg').val();
    $.ajax({
        url: '/ajax/chkVerifyCode',
        type: 'POST',
        data: {
            email: email,
            ci: ci,
            code: code,
        },
        async: false,
        success: function (data) {
            console.log(data);
            // 코드 확인
            var countP = $('#countdown');
            var emailTxt = $('#email');
            var regBtn = $('#emailBtn');
            var emailCodeTxt = $('#emailReg');
            var chkBtn = $('#emailRegBtn');

            // 이메일입력, 코드입력, 인증코드 모두 비활성화
            // emailTxt.prop('disabled', true);
            regBtn.prop('disabled', true);
            emailCodeTxt.prop('disabled', true);
            chkBtn.prop('disabled', true);
            if (data.result === '0') {
                // 성공
                countP.css('display', 'none');
            } else if (data.result === '1') {
                fn_alert('잘못된 코드입니다. 다시 확인해 주세요');
                emailCodeTxt.prop('disabled', false);
                chkBtn.prop('disabled', false);
            } else {
                fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                emailCodeTxt.prop('disabled', false);
                chkBtn.prop('disabled', false);
            }
        },
        error: function (res, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });
};

const supportRecommendCodeCheck = () => {
    var inviteCode = $('#invite_code').val();
    console.log(inviteCode);
    $.ajax({
        url: '/ajax/support/isValidRecommendCode',
        type: 'POST',
        data: { inviteCode: inviteCode },
        success: function (data) {
            console.log(data);
            if (data.isValid) {
                fn_alert('확인 되었습니다.');
            } else {
                fn_alert('유효하지 않은 초대 코드입니다.');
                $('#invite_code').val('');
            }
        },
        error: function (data, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });
}

const meetingSave = (postData) => {
    if ($('#group_photo').val().trim() === '') {
        fn_alert('대표사진을 선택해 주세요.');
        $('#group_photo').focus();
        return;
    }
    if ($('#category').val().trim() === '') {
        fn_alert('카테고리를 선택해 주세요.');
        $('#category').focus();
        return;
    }
    if ($('#datepicker').val().trim() === '') {
        fn_alert('모집기간 시작일을 입력해 주세요.');
        $('#datepicker').focus();
        return;
    }
    if ($('#datepicker1').val().trim() === '') {
        fn_alert('모집기간 종료일을 입력해 주세요.');
        $('#datepicker1').focus();
        return;
    }
    if ($('#datepicker2').val().trim() === '') {
        fn_alert('모임일자를 입력해 주세요.');
        $('#datepicker2').focus();
        return;
    }
    // if ($('#datepicker3').val().trim() === '') {
    //     alert('모임일자 종료일을 입력해 주세요.');
    //     $('#datepicker3').focus();
    //     return;
    // }
    if ($('#number_of_people').val().trim() === '') {
        fn_alert('모집 인원을 입력해 주세요.');
        $('#number_of_people').focus();
        return;
    }
    if ($('#group_min_age').val().trim() === '') {
        fn_alert('최소 나이를 입력해 주세요.');
        $('#group_min_age').focus();
        return;
    }
    if ($('#group_max_age').val().trim() === '') {
        fn_alert('최대 나이를 입력해 주세요.');
        $('#group_max_age').focus();
        return;
    }
    // if ($('#matching_rate').val().trim() === '') {
    //     fn_alert('매칭률을 입력해 주세요.');
    //     $('#matching_rate').focus();
    //     return;
    // }
    if ($('#title').val().trim() === '') {
        fn_alert('제목을 입력해 주세요.');
        $('#title').focus();
        return;
    }
    var editor = CKEDITOR.instances['content'];
    var content = editor.getData();
    if (content.trim() === '') {
        fn_alert('내용을 입력해 주세요.');
        editor.focus();
        return;
    }
    if ($('#meeting_place').val().trim() === '') {
        fn_alert('모임장소를 입력해 주세요.');
        $('#meeting_place').focus();
        return;
    }
    if ($('#membership_fee').val().trim() === '') {
        fn_alert('회비를 입력해 주세요.');
        $('#membership_fee').focus();
        return;
    }

    var postData = new FormData(document.querySelector('form'));
    postData.append('content', content);
    $.ajax({
        url: '/ajax/meetingSave',
        type: 'POST',
        data: postData,
        processData: false,
        contentType: false,
        async: false,
        success: function (data) {
            console.log(data);
            if (data.status === 'success') {
                // 성공
                moveToUrl('/mo/mypage/group/detail/' + data.inserted_id);
            } else if (data.status === 'error') {
                // 한번만 출력되게 함
                $('.alert_validation').remove();
                // 오류 메시지 표시
                Object.keys(data.errors).forEach(function (key, index) {
                    var field = $('[name="' + key + '"]');
                    var topMostDiv = field.closest('.form_row'); // form_row 클래스를 가진 최상위 div

                    // 오류 메시지 추가
                    if (!topMostDiv.next().hasClass('alert_validation')) {
                        // 이미 오류 메시지가 있는지 확인
                        topMostDiv.after('<div class="alert alert_validation">' + data.errors[key] + '</div>');
                    }
                    // 처음 validation 포커스
                    if (index === 0) {
                        field.focus();
                    }
                });
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

    return false;
};

const meetingFiltering = (category, searchText, filterOption) => {
    var postData = new FormData();

    if (category !== undefined && category !== '') {
        postData.append('category', category);
    }

    if (searchText !== undefined && searchText !== '') {
        postData.append('searchText', searchText);
    }

    if (filterOption !== undefined && filterOption !== '') {
        postData.append('filterOption', filterOption);
    }

    $.ajax({
        url: '/ajax/meetingFilter',
        type: 'POST',
        data: postData,
        processData: false,
        contentType: false,
        async: false,
        success: function (data) {
            //console.log(data);
            var listHtml = '';
            if (data.length > 0) {
                data.forEach(function (meeting) {
                    var imagePath = meeting.meeting_idx
                        ? '/' + meeting.file_path + meeting.file_name
                        : '/static/images/group_list_1.png';
                    listHtml += `
                        <a href="/mo/mypage/group/detail/${meeting.idx}">
                            <div class="group_list_item">
                                <img class="profile_img" src="${imagePath}" />
                                <div class="group_particpnt">
                                    <span>신청 ${meeting.count}</span>/${meeting.number_of_people}명
                                </div>
                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    ${meeting.meeting_place}
                                </div>
                                <p class="group_price">${parseInt(meeting.membership_fee).toLocaleString('ko-KR')}원</p>
                                <p class="group_schedule">${meeting.meetingDateTime}</p>
                            </div>
                        </a>
                    `;
                });
            } else {
                listHtml = `<div style="text-align: center; margin-top: 20px; color: gray;">검색 결과가 없습니다.</div>`;
            }
            $('.group_search_list').html(listHtml);
        },
        error: function (xhr, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });
};

const MymeetingFiltering = (filterOption) => {
    var postData = new FormData();

    if (filterOption !== undefined && filterOption !== '') {
        postData.append('filterOption', filterOption);
    }

    $.ajax({
        url: '/ajax/myMeetingFilter',
        type: 'POST',
        data: postData,
        processData: false,
        contentType: false,
        async: false,
        success: function (data) {
            console.log(data);
            var listHtml = '';
            if (data.length > 0) {
                data.forEach(function (meeting) {
                    var imagePath = meeting.meeting_idx
                        ? '/' + meeting.file_path + meeting.file_name
                        : '/static/images/group_list_1.png';
                    var endedOverlay = meeting.isEnded ? '<div class="ended_overlay">종료</div>' : '';
                    var grayscaleClass = meeting.isEnded ? 'grayscale' : '';

                    listHtml += `
                        <a href="/mo/mypage/group/detail/${meeting.idx}">
                            <div class="apply_group_detail">
                                <div class="relative-container ${grayscaleClass}">
                                ${endedOverlay ? '<div class="ended_overlay">종료</div>' : ''}
                                <img class="profile_img" src="${imagePath}" />
                                </div>
                                <div class="group_list_item group_apply_item">
                                    <div class="group_particpnt">
                                        <span>신청 ${meeting.count}</span>/${meeting.number_of_people}명
                                    </div>
                                    <div class="group_location">
                                        <img src="/static/images/ico_location_16x16.png" />
                                        ${meeting.meeting_place}
                                    </div>
                                    <p class="group_price">${parseInt(meeting.membership_fee).toLocaleString(
                                        'ko-KR',
                                    )}원</p>
                                    <p class="group_schedule">${meeting.meetingDateTime}</p>
                                </div>
                            </div>
                        </a>
                    `;
                });
            } else {
                listHtml =
                    '<div style="text-align: center; margin-top: 20px; color: gray;">검색 결과가 없습니다.</div>';
            }
            $('.mygroup_list').html(listHtml);
        },
        error: function (xhr, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });
};
/*제휴 번호인증 */
const alianceCertIdentify = () => {
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
    // var form = document.createElement('form');
    // form.setAttribute('action', '/mo/agree');
    // form.setAttribute('method', 'post');

    // // hidden input 요소 생성
    // var mobileNoInput = document.createElement('input');
    // mobileNoInput.setAttribute('type', 'hidden');
    // mobileNoInput.setAttribute('name', 'mobile_no');
    // mobileNoInput.setAttribute('value', '01026220923'); // todo : 추후 인증 결과값으로 변경
    // form.appendChild(mobileNoInput);

    // var nameInput = document.createElement('input');
    // nameInput.setAttribute('type', 'hidden');
    // nameInput.setAttribute('name', 'name');
    // nameInput.setAttribute('value', '서승표'); // todo : 추후 인증 결과값으로 변경
    // form.appendChild(nameInput);

    // var birthdayInput = document.createElement('input');
    // birthdayInput.setAttribute('type', 'hidden');
    // birthdayInput.setAttribute('name', 'birthday');
    // birthdayInput.setAttribute('value', '19890923'); // todo : 추후 인증 결과값으로 변경
    // form.appendChild(birthdayInput);

    // // 폼을 body에 추가 후 제출
    // document.body.appendChild(form);
    // form.submit();
    let tempValidation = false;
    if ($('#input_ali_name').val().trim() === '') {
        fn_alert('이름을 입력해 주세요');
        tempValidation = false;
        $('#input_ali_name').focus();
    } else if ($('#input_ali_mobile_no').val().trim() === '') {
        fn_alert('전화번호를 입력해 주세요');
        tempValidation = false;
        $('#input_ali_mobile_no').focus();
    } else if ($('#input_ali_company_name').val().trim() === '') {
        fn_alert('업체명을 입력해 주세요.');
        tempValidation = false;
        $('#input_ali_company_name').focus();
    } else if ($('#input_gender').val().trim() === '') {
        fn_alert('성별을 선택해 주세요');
        tempValidation = false;
        $('#input_gender').focus();
    }

    if (
        $('#input_ali_name').val() !== '' &&
        $('#input_ali_mobile_no').val() !== '' &&
        $('#input_ali_company_name').val() !== '' &&
        $('#input_gender').val() !== ''
    ) {
        if (checkPhoneNumber($('#input_ali_mobile_no').val())) {
            tempValidation = true;
        } else {
            tempValidation = false;
        }
    }

    if (tempValidation) {
        /* 전화번호 형식테크 */
        submitForm();
    } else {
    }

    //     } else {
    //         // 삭제 성공
    //         //console.log('222');
    //         alert('오류가 발생하였습니다. \n다시 시도해 주세요.')
    //     }
    //     return false
    // },
    // error: function (data, status, err) {
    //     fn_alert('there was an error while fetching events!')
    //     console.log(err)
    // },
    // })
};
/*제휴 신청 */
const allianceUp = () => {
    $('.loading').show();
    $('.loading_bg').show();
    var postData = new FormData(document.querySelector('form'));
    var files = $('#alliance_photo_detail')[0].files;
    for (var i = 0; i < files.length; i++) {
        postData.append('alliance_photo_detail[]', files[i]);
    }

    var filesInput = $('#alliance_photo_detail')[0];
    var filesArray = Array.from(filesInput.files);

    let tempValidation = false;
    if ($('#alliance_ceo_num').val().trim().length === 0) {
        fn_alert('사업자등록번호를 입력해 주세요.');
        tempValidation = false;
        $('#alliance_ceo_num').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_ceonum_file').val().length === 0) {
        fn_alert('사업자등록증 첨부파일을 등록해주세요.');
        tempValidation = false;
        $('#alliance_ceonum_file').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_category').val().trim() === '00') {
        fn_alert('제휴 유형을 선택해 주세요.');
        tempValidation = false;
        $('#alliance_category').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_number').val().trim() === '') {
        fn_alert('업체연락처를 입력해 주세요');
        tempValidation = false;
        $('#alliance_number').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_email').val().trim() === '') {
        fn_alert('이메일을 입력해 주세요');
        tempValidation = false;
        $('#alliance_email').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_name').val().trim() === '') {
        fn_alert('업체명을 입력해 주세요');
        tempValidation = false;
        $('#alliance_name').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_ceoname').val().trim() === '') {
        fn_alert('대표명을 입력해 주세요');
        tempValidation = false;
        $('#alliance_ceoname').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_address1').val().trim() === '') {
        fn_alert('주소를 입력해 주세요');
        tempValidation = false;
        $('#alliance_address1').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_address2').val().trim() === '') {
        fn_alert('상세주소를 입력해 주세요');
        tempValidation = false;
        $('#alliance_address2').focus();
        $('.loading').hide();
    } else if ($('#alliance_bizday').val().trim() === '') {
        fn_alert('영업요일을 선택 해주세요.');
        tempValidation = false;
        $('#biz_day').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_ceonumber').val().trim() === '') {
        fn_alert('대표 연락처를 입력해 주세요');
        tempValidation = false;
        $('#alliance_alliance_ceonumberaddress2').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_biztime1').val().trim() === '') {
        fn_alert('영업 시작 시간을 선택해 주세요');
        tempValidation = false;
        $('#alliance_biztime1').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_biztime2').val().trim() === '') {
        fn_alert('영업 종료 시간을 선택해 주세요');
        tempValidation = false;
        $('#alliance_biztime2').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_pay').val().trim() === '') {
        fn_alert('인당 예약 금액을 정해주세요');
        tempValidation = false;
        $('#alliance_pay').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_photo').val().trim() === '') {
        fn_alert('메인 사진을 등록 해주세요.');
        tempValidation = false;
        $('#alliance_photo').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if (filesArray.length === 0) {
        fn_alert('상세 사진을 등록 해주세요.');
        tempValidation = false;
        $('#alliance_photo_detail').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#alliance_cont').val().trim() === '') {
        fn_alert('상세내용을 선택해 주세요');
        tempValidation = false;
        $('#alliance_cont').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    } else if ($('#agree01').is(':checked') == false) {
        fn_alert('동의 체크 해주세요.');
        tempValidation = false;
        $('#agree01').focus();
        $('.loading').hide();
        $('.loading_bg').hide();
    }

    if (
        $('#alliance_ceo_num').val() !== '' &&
        $('.alliance_ceonum_upload').val() !== '' &&
        $('#alliance_category').val() !== '' &&
        $('#alliance_number').val() !== '' &&
        $('#alliance_email').val() !== '' &&
        $('#alliance_name').val() !== '' &&
        $('#gealliance_ceonamender').val() !== '' &&
        $('#alliance_address1').val() !== '' &&
        $('#alliance_address2').val() !== '' &&
        $('#alliance_ceonumber').val() !== '' &&
        $('#alliance_bizday').val() !== '' &&
        $('#alliance_biztime1').val() !== '' &&
        $('#alliance_biztime2').val() !== '' &&
        $('#alliance_pay').val() !== '' &&
        $('#alliance_photo').val() !== '' &&
        filesArray.length !== 0 &&
        $('#alliance_cont').val() !== '' &&
        $('#agree01').is(':checked')
    ) {
        if (!checkCeoNumber($('#alliance_ceo_num').val())) {
            tempValidation = false;
            $('#alliance_ceo_num').focus();
            $('.loading').hide();
            $('.loading_bg').hide();
            return false;
        }

        if (!checkPhoneNumber($('#alliance_number').val())) {
            tempValidation = false;
            $('#alliance_number').focus();
            $('.loading').hide();
            $('.loading_bg').hide();
            return false;
        }

        tempValidation = true;
    }

    if (tempValidation) {
        setTimeout(function () {
            $.ajax({
                url: '/ajax/alianceUp', // todo : 추후 본인인증 연결
                type: 'POST',
                data: postData,
                processData: false,
                contentType: false,
                async: false,
                success: function (data) {
                    console.log(data);
                    $('.loading').show();
                    $('.loading_bg').show();
                    if (data.status === 'success') {
                        // moveToUrl
                        window.location.href = '/mo/alliance/alert/1';
                    } else if (data.status === 'error') {
                        window.location.href = '/mo/alliance/fail/0';
                    }

                    $('.loading').hide();
                    $('.loading_bg').hide();
                    return false;
                },
                error: function (data, status, err) {
                    console.log(err);
                    $('.loading').hide();
                    $('.loading_bg').hide();
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }, 2000);
    }
};

/*phonenum check */
const checkPhoneNumber = (phoneNumber) => {
    var regex = /^\d{3}\d{3,4}\d{4}$/;
    if (regex.test(phoneNumber.replace(/\s/g, ''))) {
        return true;
    } else {
        fn_alert('전화번호 형식에 맞지않습니다.');
        return false;
    }
};

/*ceonumber check */
const checkCeoNumber = (businessNumber) => {
    var regex = /^[0-9]{10}$/;
    if (regex.test(businessNumber.replace(/\s/g, ''))) {
        return true;
    } else {
        fn_alert('사업자번호 형식에 맞지않습니다.');
        return false;
    }
};
const allianceFiltering = (category, searchText, filterOption) => {
    var postData = new FormData();

    if (category !== undefined && category !== '') {
        postData.append('category', category);
    }

    if (searchText !== undefined && searchText !== '') {
        postData.append('searchText', searchText);
    }

    if (filterOption !== undefined && filterOption !== '') {
        postData.append('filterOption', filterOption);
    }

    $.ajax({
        url: '/ajax/allianceFilter',
        type: 'POST',
        data: postData,
        processData: false,
        contentType: false,
        async: false,
        success: function (data) {
            //console.log(data);
            var listHtml = '';
            if (data.length > 0) {
                data.forEach(function (alliance) {
                    var imagePath = alliance.alliance_idx
                        ? '/' + alliance.file_path + alliance.file_name
                        : '/static/images/group_list_1.png';
                    listHtml += `
                        <a href="/mo/alliance/detail/${alliance.idx}">
                            <div class="group_list_item">
                                <img src="${imagePath}"/>
                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    ${alliance.company_name}
                                </div>
                                <p class="group_price">${alliance.address}</p>
                                <p class="group_schedule">${allianceType(+`${alliance.alliance_type}`)}</p>
                            </div>
                        </a>
                    `;
                });
            } else {
                listHtml = `<div style="text-align: center; margin-top: 20px; color: gray;">검색 결과가 없습니다.</div>`;
            }
            $('.group_search_list').html(listHtml);
        },
        error: function (xhr, status, err) {
            console.log(err);
            fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
        },
    });
};
const allianceType = (type) => {
    if (type == '01') {
        return '음식점';
    } else if (type == '02') {
        return '카페';
    } else if (type == '03') {
        return '숙박';
    } else {
        return '기타';
    }
};

const allianceSave = () => {
    if ($('.alliance_reserv_time.on').length === 0) {
        fn_alert('회차를 선택해 주세요.');
        return;
    }
    if ($('#quantity').val().trim() === '0') {
        fn_alert('인원을 선택해 주세요..');
        $('#quantity').focus();
        return;
    }

    // $.ajax({
    //     url: '',
    //     type: 'POST',
    //     data: {
    //         idx: allianceIdx
    //     },
    //     processData: false,
    //     contentType: false,
    //     async: false,
    //     success: function (data) {

    //     },
    //     error: function (xhr, status, err) {
    //         console.log(err);
    //         fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
    //     },
    // });
};
const alliancePaymentChk = () => {
    $('.loading').show();
    $('.loading_bg').show();

    setTimeout(function () {
        $.ajax({
            url: '/mo/alliance/alliancePaymentChk', // todo : 추후 본인인증 연결
            type: 'POST',
            data: {
                allianceIdx: alliance_idx,
                numberPeople: reserv_people,
                reservationDate: reserv_date,
                reservationTime: reserv_time,
            },
            success: function (data) {
                console.log(data);
                $('.loading').show();
                $('.loading_bg').show();
                if (data.status === 'success') {
                    window.location.href = '/mo/alliance/alert/2';
                } else if (data.status === 'error') {
                    window.location.href = '/mo/alliance/alert/0';
                } else {
                    fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                }
                $('.loading').hide();
                $('.loading_bg').hide();
                return false;
            },
            error: function (data, status, err) {
                console.log(err);
                $('.loading').hide();
                $('.loading_bg').hide();
                fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            },
        });
    }, 2000);
};

/* referral */
const referralRegistration = () => {
    var postData = new FormData(document.querySelector('form'));

    let tempValidation = false;
    if ($('#name').val().trim() === '') {
        fn_alert('이름을 입력해 주세요');
        tempValidation = false;
        $('#name').focus();
    } else if ($('#birthday').val().trim() === '') {
        fn_alert('생년월일을 입력해 주세요');
        tempValidation = false;
        $('#birthday').focus();
    } else if ($('#gender').val().trim() === '') {
        fn_alert('성별을 선택해 주세요');
        tempValidation = false;
        $('#gender').focus();
    } else if ($('#mobile_no').val().trim() === '') {
        fn_alert('휴대폰 번호를 입력해 주세요');
        tempValidation = false;
        $('#mobile_no').focus();
    } else if ($('#marital').val().trim() === '') {
        fn_alert('결혼경험유무를 선택해 주세요');
        tempValidation = false;
        $('#marital').focus();
    } else if ($('#city').val().trim() === '') {
        fn_alert('시/도를 선택해 주세요');
        tempValidation = false;
        $('#city').focus();
    } else if ($('#town').val().trim() === '') {
        fn_alert('시/군/구를 선택해 주세요');
        tempValidation = false;
        $('#city').focus();
    } else if ($('#height').val().trim() === '') {
        fn_alert('키를 입력해 주세요');
        tempValidation = false;
        $('#height').focus();
    } else if ($('#education').val().trim() === '') {
        fn_alert('학력을 선택해 주세요');
        tempValidation = false;
        $('#education').focus();
    } else if ($('#job').val().trim() === '') {
        fn_alert('직업 선택해 주세요');
        tempValidation = false;
        $('#job').focus();
    } else if ($('#detailed_content').val().trim() === '') {
        fn_alert('추천이유를 입력해 주세요');
        tempValidation = false;
        $('#detailed_content').focus();
    } 

    if (
        $('#name').val() !== '' &&
        $('#birthday').val() !== '' &&
        $('#gender').val() !== '' &&
        $('#mobile_no').val() !== '' &&
        $('#marital').val() !== '' &&
        $('#city').val() !== '' &&
        $('#town').val() !== '' &&
        $('#height').val() !== '' &&
        $('#education').val() !== '' &&
        $('#job').val() !== '' &&
        $('#detailed_content').val() !== ''
    ) {
        tempValidation = true;
    }
    if (tempValidation) {
        
        $.ajax({
            url: '/ajax/support/referral', 
            type: 'POST',
            data: postData,
            processData: false,
            contentType: false,
            async: false,
            success: function (data) {
                console.log(data);
                if (data.status === 'success') {
                    // 성공
                    moveToUrl('/support/referralSuccess');
                } else if (data.status === 'error') {
                    
                    // 한번만 출력되게 함
                    $('.alert_validation').remove();
                    // 오류 메시지 표시
                    Object.keys(data.errors).forEach(function (key, index) {
                        var field = $('[name="' + key + '"]');
                        var topMostDiv = field.closest('.form_row'); // form_row 클래스를 가진 최상위 div 선택

                        // 오류 메시지 추가
                        if (!topMostDiv.next().hasClass('alert_validation')) {
                            // 이미 오류 메시지가 있는지 확인
                            topMostDiv.after(
                                '<div class="alert alert_validation">' + data.errors[key] + '</div>',
                            );
                        }
                        // 처음 validation 포커스
                        if (index === 0) {
                            field.focus();
                        }
                    });
                } else {
                    fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                }
                return false;
            },
            error: function (data, status, err) {
                console.log(err);
                fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            },
        });
        
    } else {
    }
};


/*common alert */
function fn_alert(msg, loc) {
    var html = '';

    html += '<div class="layerPopup alert middle callAlert">';
    html += '<div class="layerPopup_wrap">';
    html += '<div class="layerPopup_content msmall">';
    html += '<p class="txt">알림</p>';
    html += '<div class="apply_group">';
    html += '<p>' + msg + '</p>';
    html += '</div>';
    html += '<div class="layerPopup_bottom">';
    html += '<div class="btn_group">';
    if (loc) {
        html += '<button class="btn type01" onclick="moveToUrl(\'' + loc + '\')">확인</button>';
    } else {
        html += '<button class="btn type01" onclick="alertClose()">확인</button>';
    }
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    $('body').append(html);
}
/*common confirm */
function fn_confirm(msg, loc) {
    var html = '';
    var value;
    html += '<div class="layerPopup alert middle callAlert">';
    html += '<div class="layerPopup_wrap">';
    html += '<div class="layerPopup_content msmall">';
    html += '<p class="txt">알림</p>';
    html += '<div class="apply_group">';
    html += '<p>' + msg + '</p>';
    html += '</div>';
    html += '<div class="layerPopup_bottom">';
    html += '<div class="btn_group multy">';
    if (loc == 'logout') {
        html += '<button class="btn type01" onclick="fn_userLogout(\'true\')">확인</button>';
    } else if (loc == 'myfeeddel') {
        html += '<button class="btn type01" onclick="fn_myFeedDelete(\'true\')">확인</button>';
    } else if (loc == 'banusr') {
        html += '<button class="btn type01" onclick="fn_banUsr(\'true\')">확인</button>';
    } else if (loc == 'extRm') {
        html += '<button class="btn type01" onclick="fn_extRm(\'true\')">확인</button>';
    } else if (loc == 'submitScdl') {
        html += '<button class="btn type01" onclick="fn_submitScdl(\'true\')">확인</button>';
    } else if (loc == 'partScdl') {
        html += '<button class="btn type01" onclick="fn_partScdl(\'true\')">확인</button>';
    } else if (loc == 'calcMatchRate') {
        html += '<button class="btn type01" onclick="fn_calcMatchRate(\'true\')">확인</button>';
    } else if (loc == 'sndRpt') {
        html += '<button class="btn type01" onclick="fn_sndRpt(\'true\')">확인</button>';
    } else if (loc == 'splogout') {
        html += '<button class="btn type01" onclick="fn_spLogout(\'true\')">확인</button>';
    }
    html += '<button class="btn type02" onclick="alertClose()">취소</button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    $('body').append(html);
}

/*common alert close */
function alertClose() {
    $('.callAlert').hide();
    $('.callAlert').remove();
}
/*common alert close */
function btnClose() {
    $('.alert').hide();
}

/*number input text */
function clearInput(input) {
    var value = input.value;
    var newValue = value.replace(/[^0-9]/g, '');
    input.value = newValue;
}

/* idpw find*/
const passwdUpdate = () => {
    var postData = new FormData(document.querySelector('form'));

    let tempValidation = false;
    if ($('#email').val().trim() === '') {
        fn_alert('해당 이메일을 입력해주세요');
        tempValidation = false;
        $('#name').focus();
    } else if ($('#pswd').val().trim() === '') {
        fn_alert('비밀번호를 입력해 주세요');
        tempValidation = false;
        $('#pswd').focus();
    } else if ($('#pswdChk').val().trim() === '') {
        fn_alert('비밀번호를 다시 입력해 주세요');
        tempValidation = false;
        $('#pswdChk').focus();
    }

    if ($('#email').val() !== '' && $('#pswd').val() !== '' && $('#pswdChk').val() !== '') {
        tempValidation = true;
    }
    if (tempValidation) {
        if ($('#pswd').val() !== $('#pswdChk').val()) {
            fn_alert('비밀번호를 확인해 주세요');
            $('#pswd').focus();
        } else {
            $.ajax({
                url: '/ajax/passwordUpdate', // todo : 추후 본인인증 연결
                type: 'POST',
                data: postData,
                processData: false,
                contentType: false,
                async: false,
                success: function (data) {
                    console.log(data);
                    if (data.status === 'success') {
                        fn_alert('비밀번호가 변경되었습니다. </br> 로그인 화면으로 이동합니다.', '/mo');
                    } else if (data.status === 'error') {
                        if (data.result == '0') {
                            fn_alert('이메일을 다시 확인해주세요.');
                        } else {
                            fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                        }
                    } else {
                        fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function (data, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }
    } else {
    }
};

/* idpw find*/
const supportPasswdUpdate = () => {
    var postData = new FormData(document.querySelector('form'));

    let tempValidation = false;
    if ($('#email').val().trim() === '') {
        fn_alert('해당 이메일을 입력해주세요');
        tempValidation = false;
        $('#name').focus();
    } else if ($('#pswd').val().trim() === '') {
        fn_alert('비밀번호를 입력해 주세요');
        tempValidation = false;
        $('#pswd').focus();
    } else if ($('#pswdChk').val().trim() === '') {
        fn_alert('비밀번호를 다시 입력해 주세요');
        tempValidation = false;
        $('#pswdChk').focus();
    }

    if ($('#email').val() !== '' && $('#pswd').val() !== '' && $('#pswdChk').val() !== '') {
        tempValidation = true;
    }
    if (tempValidation) {
        if ($('#pswd').val() !== $('#pswdChk').val()) {
            fn_alert('비밀번호를 확인해 주세요');
            $('#pswd').focus();
        } else {
            $.ajax({
                url: '/support/ajax/supportPasswordUpdate', // todo : 추후 본인인증 연결
                type: 'POST',
                data: postData,
                processData: false,
                contentType: false,
                async: false,
                success: function (data) {
                    console.log(data);
                    if (data.status === 'success') {
                        fn_alert('비밀번호가 변경되었습니다. </br> 로그인 화면으로 이동합니다.', '/support/mo');
                    } else if (data.status === 'error') {
                        if (data.result == '0') {
                            fn_alert('이메일을 다시 확인해주세요.');
                        } else {
                            fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                        }
                    } else {
                        fn_alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function (data, status, err) {
                    console.log(err);
                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }
    } else {
    }
};
const helpJopPopup=() =>{
    var html = '';
    html += '<div class="layerPopup alert middle callAlert">';
    html += '<div class="layerPopup_wrap">';
    html += '<div class="layerPopup_content medium" style="padding:20px;min-height: 245px;">';
    html += '<p class="txt">직업 도움말</p>';
    html += '<div class="apply_group">';
    html += '<p style="text-align: left;">1군 : 법인대표, 전문직(의사, 변호사, 변리사, 한의사, 수의사, 회계사, 세무사, 법무사)</p>';
    html += '<p style="text-align: left;">2군 : 상장사, 대기업, 공기업 회사원/공무원/개인사업자</p>';
    html += '<p style="text-align: left;">3군 : 중소기업 회사원/프리랜서 등 기타</p>';
    html += '</div>';
    html += '<div class="layerPopup_bottom">';
    html += '<div class="btn_group">';
    html += '<button class="btn type01" onclick="closePopup();">확인</button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    $('body').append(html);
}
const helpSinupSchoolPopup=() =>{
    var html = '';
    html += '<div class="layerPopup alert middle callAlert">';
    html += '<div class="layerPopup_wrap">';
    html += '<div class="layerPopup_content medium" style="padding:20px;min-height: 482px;">';
    html += '<p class="txt" style="color:#ff0267;">학교 인증을 꼭 해야 하나요?</p>';
    html += '<div class="apply_group">';
    html += '<p style="text-align: left;">학교 인증은 선택사항입니다.<br><br>';
    html += '인증 없이 텍스트로 학교명을 입력해주셔도 됩니다.';
    html += '다만 인증된 정보 옆에는 다른분들이 확인하실 수 있는 인증 뱃지가 부여됩니다.<br> 인증뱃지가 있는 프로필이 신뢰도가 더 높습니다.</p>';
    html += '</div><br>';
    html += '<p class="txt" style="color:#ff0267;">학교 인증을 꼭 해야 하나요?</p>';
    html += '<div class="apply_group">';
    html += '<p style="text-align: left;">인증버튼을 클릭하시면 이미지를 업로드할 수 있는 창이 나옵니다.<br><br>';
    html += '졸업증명서, 재학증명서 등 본인의 학교를 인증할 수 있는 서류를 업로드 해 주시면 꼼꼼한 확인 과정을 거쳐 인증 뱃지가 부여됩니다.<br><br>';
    html += '확인을 위해 시간이 필요한 점 양해 부탁드립니다.</p>';
    html += '</div>';
    html += '<div class="layerPopup_bottom">';
    html += '<div class="btn_group">';
    html += '<button class="btn type01" onclick="closePopup();">확인</button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    $('body').append(html);
}
const helpSinupJopPopup=() =>{
    var html = '';
    html += '<div class="layerPopup alert middle callAlert">';
    html += '<div class="layerPopup_wrap">';
    html += '<div class="layerPopup_content medium" style="padding:20px;min-height: 482px;">';
    html += '<p class="txt" style="color:#ff0267;">직업 인증을 꼭 해야 하나요?</p>';
    html += '<div class="apply_group">';
    html += '<p style="text-align: left;">직업 인증은 선택사항입니다.<br><br>';
    html += '인증 없이 직업 분류만 선택해 주셔도 됩니다.<br><br>';
    html += '다만 인증된 정보 옆에는 다른분들이 확인하실 수 있는 인증 뱃지가 부여됩니다. 인증뱃지가 있는 프로필이 신뢰도가 더 높습니다.</p>';
    html += '</div><br>';
    html += '<p class="txt" style="color:#ff0267;">직업  인증은 어떻게 하나요?</p>';
    html += '<div class="apply_group">';
    html += '<p style="text-align: left;">인증버튼을 클릭하시면 이미지를 업로드할 수 있는 창이 나옵니다.<br><br>';
    html += '명함, 재직증명서, 면허 등 본인의 직업 인증할 수 있는 서류를 업로드 해 주시면 꼼꼼한 확인 과정을 거쳐 인증 뱃지가 부여됩니다.<br><br>';
    html += '확인을 위해 시간이 필요한 점 양해 부탁드립니다.</p>';
    html += '</div>';
    html += '<div class="layerPopup_bottom">';
    html += '<div class="btn_group">';
    html += '<button class="btn type01" onclick="closePopup();">확인</button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    $('body').append(html);
}