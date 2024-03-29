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
                    html+='<label class="totAgree_label" for="totAgree'+data[i].meeting_idx+'">';
                    html+='<div class="apply_group_detail">';
                    html+='<div class="chk_box meet_delete_chk_box">';
                    html+='<input type="checkbox" class="totAgree" id="totAgree'+data[i].meeting_idx+'" name="'+data[i].meeting_idx+'">';
                    html+='<label class="totAgree_label" for="totAgree'+data[i].meeting_idx+'"></label>';
                    html+='</div>';
                    html+='<img src="/'+data[i].file_path+data[i].file_name+'" />';
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
                    html+='<div class="apply_group_detail">';
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