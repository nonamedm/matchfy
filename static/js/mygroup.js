var mygroupDelArr = [];
$(document).ready(function () {
    MyGoupCheckbox();

    $(document).on('change', '.totAgree', function () {
        MyGoupCheckbox();
    });
});

function MyGoupCheckbox() {
    mygroupDelArr = [];
    $('.totAgree').each(function () {
        if ($(this).is(':checked')) {
            var id = $(this).attr('id');
            var numericPart = id.replace('totAgree', '');
            mygroupDelArr.push(numericPart);
        }
    });
}
var mbtiTypes = {
    "0": "ENFP",
    "1": "ENFJ",
    "2": "ENTP",
    "3": "ENTJ",
    "4": "ESFP",
    "5": "ESFJ",
    "6": "ESTP",
    "7": "ESTJ",
    "8": "INFP",
    "9": "INFJ",
    "10": "INTP",
    "11": "INTJ",
    "12": "ISFP",
    "13": "ISFJ",
    "14": "ISTP",
    "15": "ISTJ",
    "null":"없음",
    "NULL":"없음"
};
var cityTypes={
    "11":"서울특별시",
    "26":"부산광역시",
    "27":"대구광역시",
    "28":"인천광역시",
    "29":"광주광역시",
    "30":"대전광역시",
    "31":"울산광역시",
    "36":"세종특별자치시",
    "41":"경기도",
    "42":"강원도",
    "43":"충청북도", 
    "44":"충청남도", 
    "45":"전라북도", 
    "46":"전라남도", 
    "47":"경상북도", 
    "48":"경상남도", 
    "50":"제주특별자치도"
}

var cityTownTypes = {
    "11": { // 서울특별시
        "010":"종로구",
        "020":"중구",
        "030":"용산구",
        "040":"성동구",
        "050":"광진구",
        "060":"동대문구",
        "070":"중랑구",
        "080":"성북구",
        "090":"강북구",
        "100":"도봉구",
        "110":"노원구",
        "120":"은평구",
        "130":"서대문구",
        "140":"마포구",
        "150":"양천구",
        "160":"강서구",
        "170":"구로구",
        "180":"금천구",
        "190":"영등포구",
        "200":"동작구",
        "210":"관악구",
        "220":"서초구",
        "230":"강남구",
        "240":"송파구",
        "250":"강동구",
    },
    "26": { // 부산광역시
        "010":"중구",
        "020":"서구",
        "030":"동구",
        "040":"영도구",
        "050":"부산진구",
        "060":"동래구",
        "070":"남구",
        "080":"북구",
        "090":"해운대구",
        "100":"사하구",
        "110":"금정구",
        "120":"강서구",
        "130":"연제구",
        "140":"수영구",
        "150":"사상구",
        "510":"기장군"
    },
    "27": { // 대구광역시
        "010":"중구",
        "020":"동구",
        "030":"서구",
        "040":"남구",
        "050":"북구",
        "060":"수성구",
        "070":"달서구",
        "510":"달성군",
        "520":"군위군",
    },
    "28": { // 인천광역시
        "010":"중구",
        "020":"동구",
        "040":"연수구",
        "050":"남동구",
        "060":"부평구",
        "070":"계양구",
        "080":"서구",
        "090":"미추홀구",
        "510":"강화군",
        "520":"옹진군"
    },
    "29":{ //광주광역시
        "010":"동구",
        "020":"서구",
        "030":"남구",
        "040":"북구",
        "050":"광산구"
    },
    "30":{ //대전광역시
        "010":"동구",
        "020":"중구",
        "030":"서구",
        "040":"유성구",
        "050":"대덕구"
    },
    "31":{ //광주광역시
        "010":"중구",
        "020":"남구",
        "030":"동구",
        "040":"북구",
        "050":"울주군"
    },
    "36":{//세종특별자치시
        "010":"세종시"
    },
    "41":{//경기도
        "011":"수원시 장안구",
        "012":"수원시 권선구",
        "013":"수원시 팔달구",
        "014":"수원시 영통구",
        "021":"성남시 수정구",
        "022":"성남시 중원구",
        "023":"성남시 분당구",
        "030":"의정부시",
        "041":"안양시 만안구",
        "042":"안양시 동안구",
        "050":"부천시",
        "060":"광명시",
        "070":"평택시",
        "080":"동두천시",
        "091":"안산시 상록구",
        "092":"안산시 단원구",
        "101":"고양시 덕양구",
        "103":"고양시 일산동구",
        "104":"고양시 일산서구",
        "110":"과천시",
        "120":"구리시",
        "130":"남양주시",
        "140":"오산시",
        "150":"시흥시",
        "160":"군포시",
        "170":"의왕시",
        "180":"하남시",
        "191":"용인시 처인구",
        "192":"용인시 기흥구",
        "193":"용인시 수지구",
        "200":"파주시",
        "210":"이천시",
        "220":"안성시",
        "230":"김포시",
        "240":"화성시",
        "250":"광주시",
        "260":"양주시",
        "270":"포천시",
        "280":"여주시", 
        "550":"연천군",
        "570":"가평군",
        "580":"양평군",
    },
    "42":{//강원특별자치도
        "010":"춘천시",
        "020":"원주시",
        "030":"강릉시",
        "040":"동해시",
        "050":"태백시",
        "060":"속초시",
        "070":"삼척시",
        "510":"홍천군",
        "520":"횡성군",
        "530":"영월군",
        "540":"평창군",
        "550":"정선군",
        "560":"철원군",
        "570":"화천군",
        "580":"양구군",
        "590":"인제군",
        "600":"고성군",
        "610":"양양군",
    },
    "43":{//충청북도
        "020":"충주시",
        "030":"제천시",
        "041":"청주시 상당구",
        "042":"청주시 서원구",
        "043":"청주시 흥덕구",
        "044":"청주시 청원구",
        "520":"보은군",
        "530":"옥천군",
        "540":"영동군",
        "550":"진천군",
        "560":"괴산군",
        "570":"음성군",
        "580":"단양군",
        "590":"증평군",
    },
    "44":{//충청남도
        "011":"천안시 동남구",
        "012":"천안시 서북구",
        "020":"공주시",
        "030":"보령시",
        "040":"아산시",
        "050":"서산시",
        "060":"논산시",
        "070":"계룡시",
        "080":"당진시",
        "510":"금산군",
        "530":"부여군",
        "540":"서천군",
        "550":"청양군",
        "560":"홍성군",
        "570":"예산군",
        "580":"태안군",
    },
    "45":{//전라북도
        "011":"전주시 완산구",
        "012":"전주시 덕진구",
        "020":"군산시",
        "030":"익산시",
        "040":"정읍시",
        "050":"남원시",
        "060":"김제시",
        "510":"완주군",
        "520":"진안군",
        "530":"무주군",
        "540":"장수군",
        "550":"임실군",
        "560":"순창군",
        "570":"고창군",
        "580":"부안군",
    },
    "46":{//전라남도
        "010":"목포시",
        "020":"여수시",
        "030":"순천시",
        "040":"나주시",
        "060":"광양시",
        "510":"담양군",
        "520":"곡성군",
        "530":"구례군",
        "550":"고흥군",
        "560":"보성군",
        "570":"화순군",
        "580":"장흥군",
        "590":"강진군",
        "600":"해남군",
        "610":"영암군",
        "620":"무안군",
        "630":"함평군",
        "640":"영광군",
        "650":"장성군",
        "660":"완도군",
        "670":"진도군",
        "680":"신안군",
    },
    "47":{//경상북도
        "011":"포항시 남구",
        "012":"포항시 북구",
        "020":"경주시",
        "030":"김천시",
        "040":"안동시",
        "050":"구미시",
        "060":"영주시",
        "070":"영천시",
        "080":"상주시",
        "090":"문경시",
        "100":"경산시",
        "520":"의성군",
        "530":"청송군",
        "540":"영양군",
        "550":"영덕군",
        "560":"청도군",
        "570":"고령군",
        "580":"성주군",
        "590":"칠곡군",
        "600":"예천군",
        "610":"봉화군",
        "620":"울진군",
        "630":"울릉군",
    },
    "48":{
        "030":"진주시",
        "050":"통영시",
        "060":"사천시",
        "070":"김해시",
        "080":"밀양시",
        "090":"거제시",
        "100":"양산시",
        "111":"창원시 의창구",
        "112":"창원시 성산구",
        "113":"창원시 마산합포구",
        "114":"창원시 마산회원구",
        "115":"창원시 진해구",
        "510":"의령군",
        "520":"함안군",
        "530":"창녕군",
        "540":"고성군",
        "550":"남해군",
        "560":"하동군",
        "570":"산청군",
        "580":"함양군",
        "590":"거창군",
        "600":"합천군",
    },
    "50":{//제주특별자치도
        "010":"제주시",
        "020":"서귀포시"
    }

};
/*참석멤버 리스트*/
function meetingMemberList(idx) {
    $.ajax({
        url: '/mo/mypage/group/partcntPopup',
        data: {
            meetingIdx: idx,
        },
        type: 'post',
        success: function (data) {
            var html = '';
            if (data.success == true) {
                var data = data.data;
                html += '<div class="meetingMemPopup layerPopup alert middle">';
                html += '<div class="layerPopup_wrap">';
                html += '<div class="layerPopup_content medium">';
                html += '<div style="position: relative;display: flex;">';
                html += '<p class="txt" style="width: 90%;padding-left: 5%;">참석멤버</p>';
                html += '<a href="#" class="btn_close"  onclick="btnClose();" style="float: right;">닫기</a>';
                html += '</div>';
                html += '<div class="scroll_member_body">';
                for (var i = 0; i < data.length; i++) {
                    html += '<div class="chat_member">';
                    html += '<div class="chat_member_profile">';
                    html += '<a class="nicknameBtnBox" onclick="moveToUrl(\'/mo/viewProfile/' + data[i].nickname + '\')">';
                    if (data[i].file_path) {
                        html += '<img class="profile_img" src="/' + data[i].file_path + data[i].file_name + '" />';
                    } else {
                        html += '<img class="profile_img" src="/static/images/mypage_no_pfofile.png" />';
                    }
                    html += '<p>' + data[i].name + '</p>';
                    html += '</a>';
                    if (data[i].meeting_master == 'K') {
                        html += '<img class="group_master" src="/static/images/group_master.png" />';
                    }
                    html += '</div>';
                    html += '<div class="group_member_detail">';
                    html += data[0].birthday.slice(2, 4) + ' · ' + cityTownTypes[data[i].city][data[i].town] + ' · ' + mbtiTypes[data[i].mbti];
                    html += '</div>';
                    html += '</div>';
                }

                html += '</div>';
                html += '<div class="layerPopup_bottom">';
                html += '<div class="btn_group">';
                html += '<button class="btn type01" onclick="meetingPopupClose();">확인</button>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
            }
            $('body').append(html);
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}
/*참석멤버 닫기*/
function meetingPopupClose() {
    $('.meetingMemPopup').hide();
}
/* 날짜 포맷 변경 함수*/
function formatDate(dateString) {
    var date = new Date(dateString);

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    var dayOfWeek = ['일', '월', '화', '수', '목', '금', '토'][date.getDay()];

    var hours = date.getHours();
    var minutes = date.getMinutes();

    var formattedDate =
        year +
        '. ' +
        ('0' + month).slice(-2) +
        '. ' +
        ('0' + day).slice(-2) +
        '(' +
        dayOfWeek +
        ') ' +
        ('0' + hours).slice(-2) +
        ':' +
        ('0' + minutes).slice(-2);

    return formattedDate;
}

function alertClose() {
    $('.alert').hide();
}

function MeetingEditChk() {
    $('.meet_delete_chk_box').show();
    $('.meet_menu_right').show();
    $('#meet_edit_btn').hide();
    $.ajax({
        url: '/mo/mypage/mygroup/select',
        type: 'post',
        success: function (data) {
            var html = '';
            if (data.success == true) {
                var data = data.data;
                for (var i = 0; i < data.length; i++) {
                    var endedOverlay = data[i].isEnded ? '<div class="ended_overlay">종료</div>' : '';
                    var grayscaleClass = data[i].isEnded ? 'grayscale' : '';
                    html += '<label class="totAgree_label" for="totAgree' + data[i].meeting_idx + '">';
                    html += '<div class="apply_group_detail">';
                    html += '<div class="chk_box meet_delete_chk_box">';
                    html +=
                        '<input type="checkbox" class="totAgree" id="totAgree' +
                        data[i].meeting_idx +
                        '" name="' +
                        data[i].meeting_idx +
                        '">';
                    html += '<label class="totAgree_label" for="totAgree' + data[i].meeting_idx + '"></label>';
                    html += '</div>';
                    html += `<div class="relative-container ${grayscaleClass}">`;
                    html += `${endedOverlay ? '<div class="ended_overlay">종료</div>' : ''}`;
                    html += `<img class="profile_img" src="/${data[i].file_path}${data[i].file_name}" />`;
                    html += '</div>';
                    html += '<div class="group_list_item group_apply_item">';
                    html += '<div class="group_particpnt">';
                    html += '<span>신청' + data[i].meeting_idx_count + '</span>/' + data[i].number_of_people + '명';
                    html += '</div>';
                    html += '<div class="group_location">';
                    html += '<img src="/static/images/ico_location_16x16.png" />';
                    html += data[i].meeting_place;
                    html += '</div>';
                    html += '<p class="group_price">' + Number(data[i].membership_fee).toLocaleString() + '원</p>';
                    html += '<p class="group_schedule">' + MyGoupDate(data[i].meeting_start_date) + '</p>';
                    html += '</div>';
                    html += '</div>';
                    html += '</label>';
                }
            }
            $('#mygroup_list_body').html(html);
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}
function MyGoupDelconfrim() {
    var msg = '';
    var html = '';
    if (mygroupDelArr.length != 0) {
        msg = '선택한 모임을 삭제 하시겠습니까?';
        html += '<div class="layerPopup alert middle">';
        html += '<div class="layerPopup_wrap">';
        html += '<div class="layerPopup_content msmall">';
        html += '<p class="txt">내 모임 삭제</p>';
        html += '<div class="apply_group">';
        html += '<p>' + msg + '</p>';
        html += '</div>';
        html += '<div class="layerPopup_bottom">';
        html += '<div class="btn_group multy">';
        html += '<button class="btn type01" onclick="MyGoupDelcheck();">확인</button>';
        html += '<button class="btn type02" onclick="btnClose();">취소</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
    } else {
        msg = '삭제할 모임을 선택 해주세요.';
        html += '<div class="layerPopup alert middle">';
        html += '<div class="layerPopup_wrap">';
        html += '<div class="layerPopup_content msmall">';
        html += '<p class="txt">내 모임 삭제</p>';
        html += '<div class="apply_group">';
        html += '<p>' + msg + '</p>';
        html += '</div>';
        html += '<div class="layerPopup_bottom">';
        html += '<div class="btn_group">';
        html += '<button class="btn type01" onclick="btnClose();">확인</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
    }

    $('body').append(html);
}

function MyGoupDelcheck() {
    $.ajax({
        url: '/mo/mypage/mygroup/del',
        data: { delArr: mygroupDelArr },
        type: 'post',
        success: function (data) {
            var html = '';
            if (data.success == true) {
                var data = data.data;
                for (var i = 0; i < data.length; i++) {
                    html += '<div class="apply_group_detail">';
                    html += '<div class="chk_box meet_delete_chk_box">';
                    html +=
                        '<input type="checkbox" class="totAgree" id="totAgree' +
                        data[i].meeting_idx +
                        '" name="' +
                        data[i].meeting_idx +
                        '">';
                    html += '<label class="totAgree_label" for="totAgree' + data[i].meeting_idx + '"></label>';
                    html += '</div>';
                    html += '<a href="/mo/mypage/group/detail/' + data[i].meeting_idx + '">';
                    html += '<img src="/' + data[i].file_path + data[i].file_name + '" />';
                    html += '</a>';
                    html += '<div class="group_list_item group_apply_item">';
                    html += '<div class="group_particpnt">';
                    html += '<span>신청' + data[i].meeting_idx_count + '</span>/' + data[i].number_of_people + '명';
                    html += '</div>';
                    html += '<a href="/mo/mypage/group/detail/' + data[i].meeting_idx + '">';
                    html += '<div class="group_location">';
                    html += '<img src="/static/images/ico_location_16x16.png" />';
                    html += data[i].meeting_place;
                    html += '</div>';
                    html += '<p class="group_price">' + Number(data[i].membership_fee).toLocaleString() + '원</p>';
                    html += '<p class="group_schedule">' + MyGoupDate(data[i].meeting_start_date) + '</p>';
                    html += '</a>';
                    html += '</div>';
                    html += '</div>';
                }
            }
            $('#mygroup_list_body').html(html);
            btnClose();
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}
function MeetCancelChk() {
    $('.meet_delete_chk_box').hide();
    $('.meet_menu_right').hide();
    $('#meet_edit_btn').show();

    $.ajax({
        url: '/mo/mypage/mygroup/select',
        type: 'post',
        success: function (data) {
            var html = '';
            if (data.success == true) {
                var data = data.data;
                for (var i = 0; i < data.length; i++) {
                    var endedOverlay = data[i].isEnded ? '<div class="ended_overlay">종료</div>' : '';
                    var grayscaleClass = data[i].isEnded ? 'grayscale' : '';
                    html += '<label class="totAgree_label" for="totAgree' + data[i].meeting_idx + '">';
                    html += '<div class="apply_group_detail">';
                    html += `<div class="relative-container ${grayscaleClass}">`;
                    html += `${endedOverlay ? '<div class="ended_overlay">종료</div>' : ''}`;
                    html += '<a href="/mo/mypage/group/detail/' + data[i].meeting_idx + '">';
                    html += `<img class="profile_img" src="/${data[i].file_path}${data[i].file_name}" />`;
                    html += '</a>';
                    html += '</div>';
                    html += '<div class="group_list_item group_apply_item">';
                    html += '<div class="group_particpnt">';
                    html += '<span>신청' + data[i].meeting_idx_count + '</span>/' + data[i].number_of_people + '명';
                    html += '</div>';
                    html += '<div class="group_location">';
                    html += '<img src="/static/images/ico_location_16x16.png" />';
                    html += data[i].meeting_place;
                    html += '</div>';
                    html += '<p class="group_price">' + Number(data[i].membership_fee).toLocaleString() + '원</p>';
                    html += '<p class="group_schedule">' + MyGoupDate(data[i].meeting_start_date) + '</p>';
                    html += '</div>';
                    html += '</div>';
                    html += '</label>';
                }
            }
            $('#mygroup_list_body').html(html);
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}

function MyGoupDate(value) {
    var date = new Date(value);
    var year = date.getFullYear();
    var month = (date.getMonth() + 1).toString().padStart(2, '0'); // 월은 0부터 시작하므로 1을 더하고, 2자리 숫자로 표시
    var day = date.getDate().toString().padStart(2, '0'); // 일도 2자리 숫자로 표시
    var dayOfWeek = ['일', '월', '화', '수', '목', '금', '토'][date.getDay()]; // 요일을 배열에서 가져옴

    var finalDate = year + '.' + month + '.' + day + ' (' + dayOfWeek + ') 모임';
    return finalDate;
}

function MyGoupDate2(value) {
    var date = new Date(value);

    var daysOfWeek = ['일', '월', '화', '수', '목', '금', '토'];

    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hour = date.getHours();
    var minute = date.getMinutes();
    var dayOfWeek = daysOfWeek[date.getDay()];

    // var ampm = hour >= 12 ? '오후' : '오전';

    hour = hour % 12;
    hour = hour ? hour : 12;

    var formattedDateTime =
        month + '.' + day + ' (' + dayOfWeek + ') ' + ' ' + hour + ':' + (minute < 10 ? '0' : '') + minute;

    return formattedDateTime;
}

function GroupDday(endDate, startDate, deleteYn) {
    var currentTimestamp = new Date().getTime();
    var endDateTimestamp = new Date(endDate).getTime();
    var startDateTimestamp = new Date(startDate).getTime();
    var dday;

    if (deleteYn === 'N' || deleteYn === 'n') {
        if (currentTimestamp > endDateTimestamp) {
            dday = '종료';
        } else if (currentTimestamp < startDateTimestamp) {
            var timeDiff = startDateTimestamp - currentTimestamp + 24 * 60 * 60 * 1000; // 하루를 느리게 계산
            var days = Math.floor(timeDiff / (24 * 60 * 60 * 1000));
            if (days === 1) {
                dday = '내일';
            } else if (days == 0) {
                dday = '당일';
            } else {
                dday = days + '일전';
            }
        } else {
            var timeDiff = endDateTimestamp - currentTimestamp;
            var days = Math.floor(timeDiff / (24 * 60 * 60 * 1000));
            if (days === 1) {
                dday = '내일';
            } else if (days == 0) {
                dday = '당일';
            } else {
                dday = days + '일전';
            }
        }
    } else {
        dday = '취소';
    }
    return dday;
}

function GroupClass(endDate, deleteYn) {
    var currentTimestamp = new Date().getTime();
    var endDateTimestamp = new Date(endDate).getTime();
    var dday;

    if (deleteYn === 'N' || deleteYn === 'n') {
        if (currentTimestamp > endDateTimestamp) {
            dday = 'finish';
        } else {
            dday = '';
        }
    } else {
        dday = 'cancel';
    }
    return dday;
}

function MygroupPopup(idx, idValue, master) {
    var cancel_rsv = $('#' + idValue).text();

    if (cancel_rsv === '종료' || cancel_rsv === '취소') {
        return;
    }

    $.ajax({
        url: '/mo/mypage/mygroup/cancelReservation',
        data: { meetingIdx: idx },
        type: 'post',
        success: function (data) {
            var html = '';
            if (data.success == true) {
                var data = data.data;
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<div class="layerPopup alert">';
                    html += '<div class="layerPopup_wrap">';
                    html += '<div class="layerPopup_content small">';
                    html += '<div style="position: relative;display: flex;">';
                    html += '<p class="txt" style="width: 90%;padding-left: 5%;">예약확인</p>';
                    html += '<a href="#" class="btn_close" onclick="btnClose();" style="float: right;">닫기</a>';
                    html += '</div>';
                    html += '<div class="alliance_sch_list popup">';
                    html += '<a href="/mo/mypage/group/detail/' + data[i].meeting_idx + '">';
                    html += '<div class="alliance_sch_item">';
                    html += '<div class="alliance_sch_sts">';
                    html +=
                        '<div class="' +
                        GroupClass(data[i].meeting_end_date, data[i].delete_yn) +
                        '">' +
                        GroupDday(data[i].meeting_end_date, data[i].meeting_start_date, data[i].delete_yn) +
                        '</div>';
                    html += '<img src="/static/images/right_arrow.png" />';
                    html += '</div>';
                    html += '<h2>' + data[i].meeting_place + '</h2>';
                    html += '<p class="">' + MyGoupDate2(data[i].meeting_start_date) + '</p>';
                    html += '<span class="">인원 ' + data[i].meeting_idx_count + '명</span>';
                    html += '</div>';
                    html += '</a>';
                    html += '</div>';
                    html += '<div style="height: 50px;"></div>';
                    html += '<div class="layerPopup_bottom">';
                    if (
                        cancel_rsv == '1일전' ||
                        cancel_rsv == '내일' ||
                        cancel_rsv == '당일' ||
                        cancel_rsv == '2일전' ||
                        cancel_rsv == '3일전'
                    ) {
                        html += '<div class="btn_group">';
                        html +=
                            `<button class="btn type01" onclick="enterChatRoom('` +
                            data[i].chat_room_ci +
                            `')">대화방입장</button>`;
                        html += '</div>';
                    } else if (cancel_rsv == '종료' || cancel_rsv == '취소') {
                        html += '<div class="btn_group">';
                        html += '<button class="btn type01" onclick="mygoupRefresh();">확인</button>';
                        html += '</div>';
                    } else {
                        html += '<div class="btn_group multy">';
                        if (master == 'K') {
                            html += '<button class="btn type03" onclick="locationMygroup();">내 모임 관리</button>';
                        } else {
                            html +=
                                '<button class="btn type03" onclick="CancelReservation(' +
                                data[i].meeting_idx +
                                ');">예약 취소</button>';
                        }
                        html +=
                            `<button class="btn type01" onclick="enterChatRoom('` +
                            data[i].chat_room_ci +
                            `')">대화방 입장</button>`;
                        html += '</div>';
                    }
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                }
            }
            $('body').append(html);
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}

const enterChatRoom = (ci) => {
    $.ajax({
        url: '/ajax/createMultyChat',
        type: 'POST',
        data: {
            room_ci: ci,
        },
        async: false,
        success: function (data) {
            if (data.status === 'success') {
                // 성공
                console.log(data);
                moveToUrl('/mo/mymsg', {
                    room_ci: data.data.room_ci,
                });
            } else if (data.status === 'error') {
                console.log('메세지 전송 실패', data);
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
};

function locationMygroup() {
    window.location.href = '/mo/mypage/mygroup/list';
}

function CancelReservation(idx) {
    $.ajax({
        url: '/mo/mypage/mygroup/cancelReservationChk',
        data: { meetingIdx: idx },
        type: 'post',
        success: function (data) {
            var html = '';
            html += '<div class="layerPopup alert">';
            html += '<div class="layerPopup_wrap">';
            html += '<div class="layerPopup_content msmall">';
            html += '<p class="txt">예약 취소</p>';
            html += '<div class="apply_group">';
            html += '<p>' + '예약이 취소 되었습니다.' + '</p>';
            html += '</div>';
            html += '<div class="layerPopup_bottom">';
            html += '<div class="btn_group">';
            html += '<button class="btn type01" onclick="mygoupRefresh();">확인</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            $('body').append(html);
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}

function mygoupRefresh() {
    btnClose();
    $.ajax({
        url: '/mo/mypage/mygroup/mygroupReservationRefresh',
        type: 'get',
        success: function (data) {
            var data = data.data;
            var html = '';
            for (var i = 0; i < data.length; i++) {
                html +=
                    '<div class="alliance_sch_list" onclick="javascript:MygroupPopup(' +
                    data[i].meeting_idx +
                    ",'cancel_rsv_" +
                    data[i].meeting_idx +
                    "','" +
                    data[i].meeting_master +
                    '\')">';
                html += '<div class="alliance_sch_item">';
                html += '<div class="alliance_sch_sts">';
                html +=
                    '<div class="' +
                    GroupClass(data[i].meeting_end_date, data[i].delete_yn) +
                    '" id="cancel_rsv_' +
                    data[i].meeting_idx +
                    '">' +
                    GroupDday(data[i].meeting_end_date, data[i].meeting_start_date, data[i].delete_yn) +
                    '</div>';
                html += '<img src="/static/images/right_arrow.png" />';
                html += '</div>';
                html += '<h2>' + data[i].meeting_place + '</h2>';
                html += '<p class="">' + MyGoupDate2(data[i].meeting_start_date) + '</p>';
                html += '<span> 인원 ' + data[i].meeting_idx_count + '명</span>';
                html += '</div>';
                html += '</div>';
            }

            $('#mygroup_list_body').html(html);
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}
