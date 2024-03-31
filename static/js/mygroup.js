var mygroupDelArr=[];
$(document).ready(function() {
    MyGoupCheckbox();

    $(document).on('change', '.totAgree', function() {
        MyGoupCheckbox();
    });    

});

function MyGoupCheckbox(){
    mygroupDelArr=[];
    $('.totAgree').each(function() {
        if ($(this).is(':checked')) {
            var id = $(this).attr('id');
            var numericPart = id.replace('totAgree', '');
            mygroupDelArr.push(numericPart);
        }
    });
}

/*참석멤버 리스트*/
function meetingMemberList(idx){
    $.ajax({
        url: '/mo/mypage/group/partcntPopup',
        data:{
            meetingIdx:idx,
        },
        type: 'post',
        success: function(data) {
            var html='';
            if(data.success == true){
                var data = data.data;
                    html += '<div class="meetingMemPopup layerPopup alert middle">';
                    html += '<div class="layerPopup_wrap">';
                    html += '<div class="layerPopup_content medium">';
                    html += '<div style="position: relative;display: flex;">';
                    html += '<p class="txt" style="width: 90%;padding-left: 5%;">참석멤버</p>';
                    html += '<a href="#" class="btn_close"  onclick="alertClose();" style="float: right;">닫기</a>';
                    html += '</div>';
                    html += '<div class="scroll_body">';
                    for(var i=0; i<data.length;i++){
                        
                        html += '<div class="chat_member">';
                        html += '<div class="chat_member_profile">';
                        if(data[i].file_path){
                            html += '<img class="profile_img" src="'+data[i].file_path+data[i].file_name+'" />';
                        }else{
                            html += '<img class="profile_img" src="/static/images/mypage_no_pfofile.png" />';
                        }
                        html += '<p>'+data[i].name+'</p>';
                        if(data[i].meeting_master =='K'){
                            html += '<img class="group_master" src="/static/images/group_master.png" />';
                        }
                        html += '</div>';
                        html += '<div class="group_member_detail">';
                        html += data[0].birthday.slice(2,4) + ' · ' + data[i].city + ' · ' + data[i].mbti;
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
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}
/*참석멤버 닫기*/
function meetingPopupClose(){
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

    var formattedDate = year + '. ' + ('0' + month).slice(-2) + '. ' + ('0' + day).slice(-2) + '(' + dayOfWeek + ') ' + ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2);

    return formattedDate;
}

function alertClose(){
    $('.alert').hide();
}

function MeetingEditChk(){
    $('.meet_delete_chk_box').show();
    $('.meet_menu_right').show();
    $('#meet_edit_btn').hide();    
    $.ajax({
        url: '/mo/mypage/mygroup/select',
        type: 'post',
        success: function(data) {
            var html='';
            if(data.success == true){
                var data =data.data
                for(var i=0;i<data.length;i++){
                    var endedOverlay = data[i].isEnded ? '<div class="ended_overlay">종료</div>' : '';
                    var grayscaleClass = data[i].isEnded ? 'grayscale' : '';
                    html+='<label class="totAgree_label" for="totAgree'+data[i].meeting_idx+'">';
                    html+=`<div class="apply_group_detail ${grayscaleClass}">`;
                    html+='<div class="chk_box meet_delete_chk_box">';
                    html+='<input type="checkbox" class="totAgree" id="totAgree'+data[i].meeting_idx+'" name="'+data[i].meeting_idx+'">';
                    html+='<label class="totAgree_label" for="totAgree'+data[i].meeting_idx+'"></label>';
                    html+='</div>';
                    html+='<div class="relative-container">';
                    html+=`${endedOverlay ? '<div class="ended_overlay">종료</div>' : ''}`
                    html+=`<img class="profile_img" src="/${data[i].file_path}${data[i].file_name}" />`;
                    html+='</div>';
                    html+='<div class="group_list_item group_apply_item">';
                    html+='<div class="group_particpnt">';
                    html+='<span>신청'+data[i].meeting_idx_count+'</span>/'+data[i].number_of_people+'명';
                    html+='</div>';
                    html+='<div class="group_location">';
                    html+='<img src="/static/images/ico_location_16x16.png" />';
                    html+= data[i].meeting_place;
                    html+='</div>';
                    html+='<p class="group_price">'+Number(data[i].membership_fee).toLocaleString()+'원</p>';
                    html+='<p class="group_schedule">'+MyGoupDate(data[i].meeting_start_date)+'</p>';
                    html+='</div>';
                    html+='</div>';
                    html+='</label>';
                }
            }
            $('#mygroup_list_body').html(html);
            
            
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}
function MyGoupDelconfrim(){
    var msg='';
    var html='';
    if(mygroupDelArr.length != 0){
        msg='선택한 모임을 삭제 하시겠습니까?';
        html += '<div class="layerPopup alert middle">';
        html += '<div class="layerPopup_wrap">';
        html += '<div class="layerPopup_content msmall">';
        html += '<p class="txt">내 모임 삭제</p>';
        html += '<div class="apply_group">';
        html += '<p>'+msg+'</p>';
        html += '</div>';
        html += '<div class="layerPopup_bottom">';
        html += '<div class="btn_group multy">';
        html += '<button class="btn type01" onclick="MyGoupDelcheck();">확인</button>';
        html += '<button class="btn type02" onclick="alertClose();">취소</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
    }else{
        msg='삭제할 모임을 선택 해주세요.';
        html += '<div class="layerPopup alert middle">';
        html += '<div class="layerPopup_wrap">';
        html += '<div class="layerPopup_content msmall">';
        html += '<p class="txt">내 모임 삭제</p>';
        html += '<div class="apply_group">';
        html += '<p>'+msg+'</p>';
        html += '</div>';
        html += '<div class="layerPopup_bottom">';
        html += '<div class="btn_group">';
        html += '<button class="btn type01" onclick="alertClose();">확인</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
    }

    $('body').append(html);
}

function MyGoupDelcheck(){
    $.ajax({
        url: '/mo/mypage/mygroup/del',
        data:{delArr:mygroupDelArr},
        type: 'post',
        success: function(data) {
            var html='';
            if(data.success == true){
                var data =data.data
                for(var i=0;i<data.length;i++){
                    html+='<div class="apply_group_detail">';
                    html+='<div class="chk_box meet_delete_chk_box">';
                    html+='<input type="checkbox" class="totAgree" id="totAgree'+data[i].meeting_idx+'" name="'+data[i].meeting_idx+'">';
                    html+='<label class="totAgree_label" for="totAgree'+data[i].meeting_idx+'"></label>';
                    html+='</div>';
                    html+='<a href="/mo/mypage/group/detail/'+data[i].meeting_idx+'">';
                    html+='<img src="/'+data[i].file_path+data[i].file_name+'" />';
                    html+='</a>';
                    html+='<div class="group_list_item group_apply_item">';
                    html+='<div class="group_particpnt">';
                    html+='<span>신청'+data[i].meeting_idx_count+'</span>/'+data[i].number_of_people+'명';
                    html+='</div>';
                    html+='<a href="/mo/mypage/group/detail/'+data[i].meeting_idx+'">';
                    html+='<div class="group_location">';
                    html+='<img src="/static/images/ico_location_16x16.png" />';
                    html+= data[i].meeting_place;
                    html+='</div>';
                    html+='<p class="group_price">'+Number(data[i].membership_fee).toLocaleString()+'원</p>';
                    html+='<p class="group_schedule">'+MyGoupDate(data[i].meeting_start_date)+'</p>';
                    html+='</a>';
                    html+='</div>';
                    html+='</div>';
                }
            }
            $('#mygroup_list_body').html(html);
            alertClose();
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}
function MeetCancelChk(){
    $('.meet_delete_chk_box').hide();
    $('.meet_menu_right').hide();
    $('#meet_edit_btn').show();

    $.ajax({
        url: '/mo/mypage/mygroup/select',
        type: 'post',
        success: function(data) {
            var html='';
            if(data.success == true){
                var data =data.data
                for(var i=0;i<data.length;i++){
                    var endedOverlay = data[i].isEnded ? '<div class="ended_overlay">종료</div>' : '';
                    var grayscaleClass = data[i].isEnded ? 'grayscale' : '';
                    html+='<label class="totAgree_label" for="totAgree'+data[i].meeting_idx+'">';
                    html+=`<div class="apply_group_detail ${grayscaleClass}">`;
                    html+='<div class="relative-container">';
                    html+=`${endedOverlay ? '<div class="ended_overlay">종료</div>' : ''}`
                    html+='<a href="/mo/mypage/group/detail/'+data[i].meeting_idx+'">';
                    html+=`<img class="profile_img" src="/${data[i].file_path}${data[i].file_name}" />`;
                    html+='</a>';
                    html+='</div>';
                    html+='<div class="group_list_item group_apply_item">';
                    html+='<div class="group_particpnt">';
                    html+='<span>신청'+data[i].meeting_idx_count+'</span>/'+data[i].number_of_people+'명';
                    html+='</div>';
                    html+='<div class="group_location">';
                    html+='<img src="/static/images/ico_location_16x16.png" />';
                    html+= data[i].meeting_place;
                    html+='</div>';
                    html+='<p class="group_price">'+Number(data[i].membership_fee).toLocaleString()+'원</p>';
                    html+='<p class="group_schedule">'+MyGoupDate(data[i].meeting_start_date)+'</p>';
                    html+='</div>';
                    html+='</div>';
                    html+='</label>';
                }
            }
            $('#mygroup_list_body').html(html);
            
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function MyGoupDate(value){
    var date = new Date(value);
    var year = date.getFullYear();
    var month = (date.getMonth() + 1).toString().padStart(2, '0'); // 월은 0부터 시작하므로 1을 더하고, 2자리 숫자로 표시
    var day = date.getDate().toString().padStart(2, '0'); // 일도 2자리 숫자로 표시
    var dayOfWeek = ['일', '월', '화', '수', '목', '금', '토'][date.getDay()]; // 요일을 배열에서 가져옴

    var finalDate = year + '.' + month + '.' + day + ' (' + dayOfWeek + ') 모임';
    return finalDate;
}

function MyGoupDate2(value){

    var date = new Date(value);
    
    var daysOfWeek = ['일', '월', '화', '수', '목', '금', '토'];

    var month = date.getMonth() + 1; 
    var day = date.getDate();
    var hour = date.getHours();
    var minute = date.getMinutes();
    var dayOfWeek = daysOfWeek[date.getDay()];

    var ampm = hour >= 12 ? '오후' : '오전';

    hour = hour % 12;
    hour = hour ? hour : 12;

    var formattedDateTime = month + '.' + day + ' (' + dayOfWeek + ') ' + ampm + ' ' + hour + ':' + (minute < 10 ? '0' : '') + minute;

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
            var timeDiff = startDateTimestamp - currentTimestamp + (24 * 60 * 60 * 1000); // 하루를 느리게 계산
            var days = Math.floor(timeDiff / (24 * 60 * 60 * 1000));
            if (days === 1) {
                dday = '내일';
            } else if (days === 0) {
                dday = '당일';
            } else {
                dday = 'D-' + days;
            }
        } else {
            var timeDiff = endDateTimestamp - currentTimestamp;
            var days = Math.floor(timeDiff / (24 * 60 * 60 * 1000));
            if (days === 1) {
                dday = '내일';
            } else if (days === 0) {
                dday = '당일';
            } else {
                dday = 'D-' + days;
            }
        }
    } else {
        dday = '예약취소';
    }
    return dday;
}


function MygroupPopup(idx,idValue){
    var cancel_rsv = $('#'+idValue).text();
    if(cancel_rsv !='예약취소' && cancel_rsv !='종료'){
        $.ajax({
            url: '/mo/mypage/mygroup/cancelReservation',
            data : {meetingIdx:idx},
            type: 'post',
            success: function(data) {
                var html='';
                if(data.success == true){
                    var data =data.data
                    var html ='';
                    for(var i=0;i<data.length;i++){
                        html += '<div class="layerPopup alert middle">';
                        html += '<div class="layerPopup_wrap">';
                        html += '<div class="layerPopup_content medium">';
                        html += '<div style="position: relative;display: flex;">';
                        html += '<p class="txt" style="width: 90%;padding-left: 5%;">에약확인</p>';
                        html += '<a href="#" class="btn_close" onclick="alertClose();" style="float: right;">닫기</a>';
                        html += '</div>';
                        html += '<div class="apply_group">';
                        // html += '<p>'+data[i].meeting_idx+'</p>';
                        html += '<p>'+GroupDday(data[i].meeting_end_date,data[i].meeting_start_date,data[i].delete_yn)+'</p>';
                        html += '<p>'+data[i].meeting_place+'</p>';
                        html += '<p>'+MyGoupDate2(data[i].meeting_start_date)+'</p>';
                        html += '<p> 인원 : '+data[i].meeting_idx_count+'</p>';
                        html += '</div>';
                        html += '<div class="layerPopup_bottom">';
                        if(cancel_rsv == 'D-2' ||  cancel_rsv == '내일' || cancel_rsv == '당일'){
                            html += '<div class="btn_group">';
                            html += '<button class="btn type01">대화방입장</button>';
                            html += '</div>';
                        }else{
                            html += '<div class="btn_group multy">';
                            html += '<button class="btn type01" onclick="CancelReservation('+data[i].meeting_idx+');">예약취소</button>';
                            html += '<button class="btn type02">대화방입장</button>';
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
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }else{
        return false;
    }
    
}

function CancelReservation(idx){
    $.ajax({
        url: '/mo/mypage/mygroup/cancelReservationChk',
        data : {meetingIdx:idx},
        type: 'post',
        success: function(data) {
            var html ='';
            html += '<div class="layerPopup alert middle">';
            html += '<div class="layerPopup_wrap">';
            html += '<div class="layerPopup_content msmall">';
            html += '<p class="txt">예약취소</p>';
            html += '<div class="apply_group">';
            html += '<p>'+'예약이 취소 되었습니다.'+'</p>';
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
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function mygoupRefresh(){
    alertClose();
    $.ajax({
        url: '/mo/mypage/mygroup/mygroupReservationRefresh',
        type: 'get',
        success: function(data) {
            var data = data.data;
            var html='';
            for(var i=0;i<data.length;i++){
                html += '<div class="apply_group_detail" onclick="javascript:MygroupPopup(' + data[i].meeting_idx + ',\'cancel_rsv_' + data[i].meeting_idx + '\')">';
                html += '<div class="group_list_item group_apply_item">';
                html += '<p class="group_price" id="cancel_rsv_' + data[i].meeting_idx + '">' + GroupDday(data[i].meeting_end_date, data[i].meeting_start_date, data[i].delete_yn) + '</p>';
                html += '<p class="group_price">'+data[i].meeting_place+'</p>';
                html += '<p class="group_schedule">'+MyGoupDate2(data[i].meeting_start_date)+'</p>';
                html += '<p class="group_schedule"> 인원 '+data[i].meeting_idx_count+'명</p>';
                html += '</div>';
                html += '</div>';   
            }
        
            $('#mygroup_list_body').html(html);
            
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });


}