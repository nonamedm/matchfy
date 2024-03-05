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
    mobileNoInput.setAttribute('value', '01026220923')
    form.appendChild(mobileNoInput)

    var nameInput = document.createElement('input')
    nameInput.setAttribute('type', 'hidden')
    nameInput.setAttribute('name', 'name')
    nameInput.setAttribute('value', '서승표')
    form.appendChild(nameInput)

    var birthdayInput = document.createElement('input')
    birthdayInput.setAttribute('type', 'hidden')
    birthdayInput.setAttribute('name', 'birthday')
    birthdayInput.setAttribute('value', '19890923')
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

const submitForm = () => {
    document.querySelector('form').submit()
}
