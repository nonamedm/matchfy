$(document).ready(function() {

});
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

/*모임 신청하기*/
function meetingApplication(idx){
    $.ajax({
        url: '/mo/mypage/group/applyPopup',
        data:{
            meetingIdx:idx
        },
        type: 'post',
        success: function(data) {
            var html='';
            var metdata;
            if(data.success == true){
                metdata = data.data;
                    html += '<div class="layerPopup alert middle">';
                    html += '<div id="meetAppliPopup" class="layerPopup_wrap">';
                    html += '<div class="layerPopup_content medium">';
                    // html += '<p class="txt">모임신청</p>';
                    html += '<div style="position: relative;display: flex;">';
                    html += '<p class="txt" style="width: 90%;padding-left: 5%;">모임신청</p>';
                    html += '<a href="#" class="btn_close" onclick="alertClose();" style="float: right;">닫기</a>';
                    html += '</div>';
                    html += '<div class="apply_group">';
                    html += '<div style="padding:20px;">';
                    html += '<div class="apply_group_detail">';
                    html += '<img src="'+metdata[0].file_path+metdata[0].file_name+'" />';
                    html += '<div class="group_list_item group_apply_item">';
                    html += '<div class="group_particpnt">';
                    html += '<span>신청 '+metdata[0].meet_members+'</span>/'+metdata[0].number_of_people+'명';
                    html += '</div>';
                    html += '<div class="group_location">';
                    html += '<img src="/static/images/ico_location_16x16.png" />';
                    html += metdata[0].meeting_place;
                    html += '</div>';
                    html += '<p class="group_price">'+Number(metdata[0].membership_fee).toLocaleString()+'원</p>';
                    html += '<p class="group_schedule">'+formatDate(metdata[0].meeting_start_date)+'</p>';
                    html += '</div>';
                    html += '</div>';
                    html += '<hr class="hoz_part" />';
                    html += '<div class="apply_group_point">';
                    html += '<p>보유 포인트</p>';
                    html += '<h2>'+Number(data.my_point).toLocaleString()+'원</h2>';
                    html += '</div>';
                    html += '<div class="apply_group_point">';
                    html += '<p>모임 금액</p>';
                    html += '<h2 class="minus">-'+Number(metdata[0].membership_fee).toLocaleString()+' 원</h2>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="layerPopup_bottom">';
                    html += '<div class="btn_group">';
                    html += '<button class="btn type01" onclick="usePoint('+metdata[0].membership_fee+','+data.my_point+','+metdata[0].idx+');">결제</button>';
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

/*포인트사용 */
function usePoint(point,mypoint,idx){
    
    $.ajax({
        url: '/mo/usePoint',
        data:{point:point,
            mypoint:mypoint,
            meetingIdx:idx},
        type: 'post',
        success: function(data) {
            // alert(data.msg);
            var html='';
            if(data.success == true){
                msg = data.data;
                    html += '<div class="layerPopup alert middle">';
                    html += '<div class="layerPopup_wrap">';
                    html += '<div class="layerPopup_content msmall">';
                    html += '<p class="txt">모임신청</p>';
                    html += '<div class="apply_group">';
                    html += '<p>'+data.msg+'</p>';
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
            
        },
        error: function(xhr, status, error) {
            alert('zz');
            console.log(error);
        }
    });
}
function alertClose(){
    $('.alert').hide();
}
