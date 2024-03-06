/* 공통함수 */
const moveToUrl = (url) => {
    location.href = url
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
const editPhoto = () => {
    const profile_photo_input = document.getElementById('main_photo')
    profile_photo_input.click();
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
        document.querySelector('form').submit()
    } else {
        alert('항목에 동의해 주세요')
        return false
    }
}

const signIn = (postData) => {
    var postData = postData
    console.log(postData)
    $.ajax({
        url: '/ajax/signIn', // todo : 추후 본인인증 연결
        type: 'POST',
        data: postData,
        async: false,
        success: function (data) {
            console.log(data)
            if (data) {
                // 성공
                location.href = '/mo/signinSuccess'
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
